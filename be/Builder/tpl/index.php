<?php

require_once(__DIR__.'/Model.php');
$Model = new {#DB_TABLE_NAME#}Model();

\ITTI\DBForms\DBForms::renderStandartList($Model, __DIR__);