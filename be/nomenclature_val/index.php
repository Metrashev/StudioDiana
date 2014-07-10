<?php
require_once(__DIR__.'/Model.php');
$Model = new NomVals();

\ITTI\DBForms\DBForms::renderStandartList($Model);
