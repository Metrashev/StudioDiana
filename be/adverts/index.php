<?php

require_once(__DIR__.'/Model.php');
$Model = new advertsModel();

\ITTI\DBForms\DBForms::renderStandartList($Model, __DIR__);