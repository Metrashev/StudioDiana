<?php

require_once(__DIR__.'/Model.php');
$Model = new usersModel();

\ITTI\DBForms\DBForms::renderStandartList($Model, __DIR__);