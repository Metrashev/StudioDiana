<?php

require_once(__DIR__.'/Model.php');
$Model = new pagesModel();

if(isset($_GET['cid'])){

	$cid = (int)$_GET['cid'];

	$id = (int)getdb()->getOne("SELECT id FROM pages WHERE cid=$cid ORDER BY id DESC LIMIT 1", array());

	\ITTI\CallManager::$Params['id'] = $id;
	\ITTI\CallManager::$Params['ValuesConstrains'] = array('cid'=>$cid);

	\ITTI\DBForms\DBForms::renderStandartEdit($Model, __DIR__);



} else {

	\ITTI\DBForms\DBForms::renderStandartList($Model, __DIR__);
}