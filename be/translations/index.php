<?php

require_once(__DIR__.'/Model.php');
$Model = new translationsModel();

\ITTI\DBForms\DBForms::renderStandartList($Model, __DIR__);