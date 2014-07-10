<?php

require_once(__DIR__.'/Model.php');
$Model = new pagesModel();

if(!isset(\ITTI\CallManager::$Params['id'])) die();

\ITTI\DBForms\DBForms::renderStandartEdit($Model, __DIR__);