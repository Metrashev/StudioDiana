<?php
use \ITTI\DBForms\DBModel;


class advertsModel extends DBModel {

	function __construct(){
		$FD = $this->getCustomFieldsDefinitions();
		parent::__construct('adverts', $FD);
	}



	function getCustomFieldsDefinitions(){

		$Fields = array (
	'name' => array (
		'type' => 'char',
		'title' => 'Name',
	),
	'active_from_date' => array (
		'type' => 'date',
		'title' => 'Active From Date',
	),
	'active_to_date' => array (
		'type' => 'date',
		'title' => 'Active To Date',
	),
	'position_id' => array (
		'type' => 'enum',
		'title' => 'Position',
		'options' => $GLOBALS['MODULES']['Adverts']['ADVERT_POSITIONS'],
	),
	'languages' => array (
		'type' => 'set',
		'db'=>array('type' => 'set',),
		'title' => 'Languages',
		'options' => \ITTI\FW::$Languages,
	),
	'ad_type_id' => array (
		'type' => 'enum',
		'title' => 'Ad Type',
		'options' => $GLOBALS['MODULES']['Adverts']['ADVERT_TYPES'],
	),
	'ad_link' => array (
		'type' => 'char',
		'title' => 'Ad Link',
	),
	'target' => array (
		'type' => 'enum',
		'title' => 'Target',
		'options'=>array(
			''=>'The Same window',
			'_blank'=>'New Window',
		),
		'search'=>false,
	),
	'ad_file' => array (
		'type' => 'managedfiles',
		'title' => 'Ad File',
	),
	'ad_text' => array (
		'type' => 'text',
		'title' => 'Ad Text',
	),
);

		return $Fields;
	}
}

