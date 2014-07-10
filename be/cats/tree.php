<?php

use ITTI\FP\FormProcessor;
use ITTI\DBTree;
use ITTI\CallManager;

require_once(__DIR__.'/Model.php');
$Model = new catsModel();

$Tree = new DBTree('cats', getdb());
$Tree->loadTree();

$FP = new FormProcessor();
$FP->setFormPrefix('tree')->setData(array());
$data = $FP->PostData;
$action = $FP->getActions();
if(isset($data['do']['addAfter']) && isset($data['node1']) ) {
	$tmp = $Tree->addAfter($data['node1']);
	$params = array();
	$params['Defaults']['name'] = $data['newNode'];
	$params['Defaults']['pid'] = $tmp['pid'];
	$params['Defaults']['ord'] = $tmp['ord'];
	$params['ValuesConstrains']['pid'] = $tmp['pid'];
	$params['ValuesConstrains']['ord'] = $tmp['ord'];

	CallManager::call($Model->getListOptions()->newUrl, $params, false);
}

if(isset($data['do']['addAsChild']) && isset($data['node1'])) {
	$tmp = $Tree->addAsChild($data['node1']);
	$params = array();
	$params['Defaults']['name'] = $data['newNode'];
	$params['Defaults']['pid'] = $tmp['pid'];
	$params['Defaults']['ord'] = $tmp['ord'];
	$params['ValuesConstrains']['pid'] = $tmp['pid'];
	$params['ValuesConstrains']['ord'] = $tmp['ord'];

	CallManager::call($Model->getListOptions()->newUrl, $params, false);
}

if(isset($data['do']['edit']) && isset($data['node1'])) {
	$params = array();
	$params['id'] = $data['node1'];

	CallManager::call($Model->getListOptions()->editUrl, $params, true);
}

if(isset($data['do']['moveAfter']) && isset($data['node1']) && isset($data['node2']) ) {
	$Tree->moveAfter($data['node1'], $data['node2']);
}

if(isset($data['do']['moveAsChild']) && isset($data['node1']) && isset($data['node2']) ) {
	$Tree->moveAsChild($data['node1'], $data['node2']);
}

if(isset($data['do']['moveUp']) && isset($data['node1'])) {
	$Tree->moveUp($data['node1']);
}

if(isset($data['do']['moveDown']) && isset($data['node1'])) {
	$Tree->moveDown($data['node1']);
}

if(isset($data['do']['moveLeft']) && isset($data['node1'])) {
	$Tree->moveLeft($data['node1']);
}

if(isset($data['do']['moveRight']) && isset($data['node1'])) {
	$Tree->moveRight($data['node1']);
}

//$Tree->comactOrd();

$treeOptions = $GLOBALS['treeOptions'] = $Tree->getAsSelectOptions();
$Models = array(
	'node1'=>array(
		'options'=>$treeOptions,
	),
	'node2'=>array(
		'options'=>$treeOptions,
	),

);

$FP->setModels($Models);

$FP->LoadTemplateFile(__DIR__.'/tree.tpl');
echo $FP->getHTML();