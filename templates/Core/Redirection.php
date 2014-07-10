<?php
$params = \ITTI\FW::$FE->ActiveNode['params'];

if(!empty($params['cid'])){
	$location = \ITTI\FW::$FE->getUrlForCid($params['cid']);
	header('Location: '.$location);
	exit();
}

