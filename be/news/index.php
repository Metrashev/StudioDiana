<?php

require_once(__DIR__.'/Model.php');
$Model = new newsModel();

if(isset($_GET['cid'])){

	$cid = (int)$_GET['cid'];


	$Model->getListOptions()->EditParams['ValuesConstrains']['cid'] = $cid;
	$Model->getBuilder()->addWhere('cid='.$cid);



}

\ITTI\DBForms\DBForms::renderStandartList($Model, __DIR__);