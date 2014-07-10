<?php

require_once(__DIR__.'/Model.php');
$Model = new users_groupsModel();

\ITTI\DBForms\DBForms::renderStandartEdit($Model, __DIR__);