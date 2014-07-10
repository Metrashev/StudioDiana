<?php

require_once(__DIR__.'/Model.php');
$Model = new home_pagesModel();

if(isset($_GET['cid'])){

	$cid = (int)$_GET['cid'];

	$id = (int)getdb()->getOne("SELECT id FROM home_pages WHERE cid=? ORDER BY id DESC LIMIT 1", array($cid));

	\ITTI\CallManager::$Params['id'] = $id;
	\ITTI\CallManager::$Params['ValuesConstrains'] = array('cid'=>$cid);

	\ITTI\DBForms\DBForms::renderStandartEdit($Model, __DIR__);



} else {

	\ITTI\DBForms\DBForms::renderStandartList($Model, __DIR__);
}