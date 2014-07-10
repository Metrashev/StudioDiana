<?php

use ITTI\DBForms\DBModel;
use ITTI\DBForms\DBTRelation;
require_once(__DIR__.'/Model.php');
$Model = new pollsModel();

$FD = array (
	'option_text' => array (
		'type' => 'char',
		'title' => 'Option Text',
	),
	'num_votes' => array (
		'type' => 'integer',
		'title' => 'Num Votes',
	),
	'ord' => array (
		'type' => 'float',
		'title' => 'Order',
	),
);

$OptionsModel = new DBModel('polls_options', $FD, $Model->Languages);

$Model->addModel($OptionsModel, new DBTRelation(DBTRelation::O2M, array(), array('id'=>'mid')), 'Options');

$Model->getDBTable()->SlaveTables['Options']->SlaveIdsOrderBy = ' ORDER BY ord';

\ITTI\DBForms\DBForms::renderStandartEdit($Model, __DIR__);

