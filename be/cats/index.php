<?php
\ITTI\FW::$User->checkRights('cats');
require_once(__DIR__.'/Model.php');
$Model = new catsModel();


\ITTI\DBForms\DBForms::renderStandartList($Model, __DIR__);
