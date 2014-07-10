<?php

require_once(__DIR__.'/Model.php');
$Model = new pollsModel();

\ITTI\DBForms\DBForms::renderStandartList($Model, __DIR__);