<?php
require_once(__DIR__.'/Model.php');
$Model = new NomKeys();
\ITTI\DBForms\DBForms::renderStandartList($Model);
