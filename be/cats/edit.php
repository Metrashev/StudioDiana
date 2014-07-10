<?php
\ITTI\FW::$User->checkRights('cats');

require_once(__DIR__.'/Model.php');
$Model = new catsModel();


if(empty(\ITTI\CallManager::$Params['id']) && !isset(\ITTI\CallManager::$Params['ValuesConstrains']['ord'])){
	\ITTI\CallManager::$Params['ValuesConstrains']['ord'] = getdb()->getOne("SELECT MAX(ord) FROM cats")+1;
	\ITTI\CallManager::$Params['ValuesConstrains']['pid'] = 0;
}


\ITTI\DBForms\DBForms::renderStandartEdit($Model, __DIR__);