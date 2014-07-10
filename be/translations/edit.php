<?php

require_once(__DIR__.'/Model.php');
$Model = new translationsModel();
/*
$Model->getEditOptions()->onBeforeSave = function(){
	if($this->DBData['cid'] && $this->DBData['module_code']){
		$this->Errors[] = 'Ne moze da ima i module code i cid';
	}
};
*/

\ITTI\DBForms\DBForms::renderStandartEdit($Model, __DIR__);