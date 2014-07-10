<?php
require_once(__DIR__.'/Model.php');
$Model = new usersModel();


$Model->onBeforeSave = function (&$row){
	if($row['password']){
		$row['password'] = \ITTI\Users\PasswordHashing::hashPassword($row['password']);
	} else {
		unset($row['password']);
	}
};

$Model->onRowLoaded = function (&$row){
	unset($row['password']);
};


\ITTI\DBForms\DBForms::renderStandartEdit($Model, __DIR__);