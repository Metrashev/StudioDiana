<?php
use ITTI\FP\EditForm;
use ITTI\CallManager;

require_once(__DIR__.'/Model.php');
$Model = new translationsModel();


CallManager::setName($GLOBALS['MODULES'][$_GET['module']]['name']);

$QB = $Model->getBuilder();
$Fields = $Model->getFieldsDefinitions();

foreach ($Fields as $k=>$field){
	$QB->addSelect("{$field['field']} as `$k`");
}

$QB->addWhere('module_code=? AND cid=0', array($_GET['module']));
$QB->addOrderBy('ord', 'ASC');
$DBData = array();
$DBData['DDD'] = getdb()->getAll($QB->getSelectQuerySQL());



$Form = new EditForm($Model->getEditOptions());
$Form->Translation['{#Form Title#}'] = 'Page Translations';
$Form->setData($DBData);
$Form->setModels($Model->getFieldsDefinitions());
$Form->LoadTemplateFile(__DIR__.'/global.tpl');
$Actions = $Form->getActions();
if(isset($Actions['save'])){
	$Errors = $Form->validate();
	$Data = $Form->getData();

	foreach ($Data['DDD'] as $i=>$row){
		$row += $DBData['DDD'][$i];
		$DBRow = $Model->getDBTable()->getPostValues($row);
		$Model->getDBTable()->SaveRow($DBRow);
	}
	CallManager::$Params['message'] = 'Saved';
	\ITTI\CallManager::Reload();

	$Form->Translation['{#ErrorsPlaceHolder#}'] = $Form->Errors2HTML($Errors);
} else {

	$Form->Translation['{#ErrorsPlaceHolder#}'] = CallManager::$Params['message'];
	unset(CallManager::$Params['message']);
}

echo $Form->getHTML();
