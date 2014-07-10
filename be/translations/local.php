<?php
use ITTI\FP\EditForm;
use ITTI\CallManager;

require_once(__DIR__.'/Model.php');
$Model = new translationsModel();

$cid= (int)$_GET['cid'];
$cids = $GLOBALS['CATS_ROOT']->getAllChilds();

if(empty($cids[$cid])) die();
$ModuleCode = $cids[$cid]['template_id'];

CallManager::setName($cids[$cid]['name']);

$QB = $Model->getBuilder();
$Fields = $Model->getFieldsDefinitions();
$QB->addSelect("translations.id, translation_key, is_html, description");
foreach (\ITTI\FW::$Languages as $lng=>$null){
	$QB->addSelect("lng_{$lng}.value as `lng_{$lng}.value`");
}

$QB->addWhere('module_code=? AND cid=0', array($ModuleCode));
$QB->addOrderBy('ord', 'ASC');

$Global = getdb()->getAll($QB->getSelectQuerySQL());

$QB= $Model->getDBTable()->getBuilder();
$QB->addSelect("translation_key, translations.id");
foreach (\ITTI\FW::$Languages as $lng=>$null){
	$QB->addSelect("lng_{$lng}.value as `lng_{$lng}.value`");
}
$QB->addWhere('module_code=? AND cid=?', array($ModuleCode, $cid));

$Local = getdb()->getAssoc($QB->getSelectQuerySQL());
$DBData = array();
$DBData['DDD'] = array();

foreach ($Global as $row){
	if(!isset($Local[$row['translation_key']])){
		$LocalRrow = $row;
		$LocalRrow['id'] = 0;
	} else {
		$LocalRrow = $Local[$row['translation_key']];
		$LocalRrow['description'] = $row['description'];
		$LocalRrow['is_html'] = $row['is_html'];
	}

	$DBData['DDD'][] = $LocalRrow;
}


$Form = new EditForm($Model->getEditOptions());
$Form->Translation['{#Form Title#}'] = 'Page Translations';
$Form->setData($DBData);
$Form->setModels($Model->getFieldsDefinitions());
$Form->LoadTemplateFile(__DIR__.'/local.tpl');
$Actions = $Form->getActions();
if(isset($Actions['save'])){
	$Errors = $Form->validate();
	$Data = $Form->getData();

	foreach ($Data['DDD'] as $i=>$row){

		$row += $Global[$i];

		$Global[$i]['id'] = $row['id'];
		if($row!=$Global[$i]){
			$DBRow = $Model->getDBTable()->getPostValues($row);
			$DBRow['module_code'] = $ModuleCode;
			$DBRow['cid'] = $cid;
			$Model->getDBTable()->SaveRow($DBRow);
		} else {
			if(empty($row['id'])) continue;

			$Model->getDBTable()->DeleteRow($row['id']);
		}



	}
	CallManager::$Params['message'] = 'Zapisan';
	\ITTI\CallManager::Reload();

	$Form->Translation['{#ErrorsPlaceHolder#}'] = $Form->Errors2HTML($Errors);
} else {

	$Form->Translation['{#ErrorsPlaceHolder#}'] = CallManager::$Params['message'];
	unset(CallManager::$Params['message']);
}

echo $Form->getHTML();
