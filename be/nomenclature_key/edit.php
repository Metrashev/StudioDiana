<?php
use ITTI\CallManager;
use ITTI\DBForms\DBEdit;
use ITTI\FP\ListForm;

require_once(__DIR__.'/Model.php');
$Model = new NomKeys();

\ITTI\DBForms\DBForms::renderStandartEdit($Model);


if(CallManager::$Params['id']){


	require_once('nomenclature_val/Model.php');
	$Model = new NomVals();

	$QB = $Model->getBuilder()->addWhere('nomenclature_val.mid='.(int)CallManager::$Params['id']);

	$options = $Model->getListOptions();
	$options->editUrl = '../nomenclature_val/edit.php';
	$options->newUrl = '../nomenclature_val/edit.php';
	$options->ItemsPerPageDefault=0;
	$options->PageBarVisible = false;
	$options->EditParams['ValuesConstrains']['mid'] = (int)CallManager::$Params['id'];

	$LF = new ListForm($Model);

	echo $LF->getHTML();

}