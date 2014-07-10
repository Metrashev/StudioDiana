<?php
\ITTI\FW::$User->checkRights('cats_settings');

require_once(__DIR__.'/Model.php');
$Model = new catsModel();

$cid= (int)$_GET['cid'];
\ITTI\CallManager::$Params['id'] = $cid;

$Model->Title = 'Settings for page: '.trim($GLOBALS['CATS_OPTIONS'][$cid],' ');

$Model->getEditOptions()->EditTplFile = __DIR__.'/settings.tpl';

\ITTI\DBForms\DBForms::renderStandartEdit($Model);