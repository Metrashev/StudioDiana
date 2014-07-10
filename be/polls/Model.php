<?php
use \ITTI\DBForms\DBModel;


class pollsModel extends DBModel {

	function __construct(){
		parent::__construct('polls', $this->getCustomFieldsDefinitions());
	}



	function getCustomFieldsDefinitions(){

		$Fields = array (
	'name' => array (
		'type' => 'char',
		'title' => 'Name',
		'edit' => array (),
		'list' => array (),
		'search' => array (),
	),
	'question' => array (
		'type' => 'text',
		'title' => 'Question',
		'edit' => array (),
		'list' => array (),
		'search' => array (),
	),
	'active_from_date' => array (
		'default' => '0000-00-00',
		'type' => 'date',
		'title' => 'Active From Date',
		'edit' => array (),
		'list' => array (),
		'search' => array (
			'op' => 'be',
		),
	),
	'active_to_date' => array (
		'default' => '0000-00-00',
		'type' => 'date',
		'title' => 'Active To Date',
		'edit' => array (),
		'list' => array (),
		'search' => array (
			'op' => 'be',
		),
	),
	'position_id' => array (
		'Key' => 'MUL',
		'type' => 'enum',
		'title' => 'Position Id',
		'options' => $GLOBALS['MODULES']['Polls']['POLL_POSITIONS'],
		'edit' => array (),
		'list' => array (),
		'search' => array (),
	),
	'is_visible' => array (
		'type' => 'boolean',
		'title' => 'Is Visible',
		'edit' => array (),
		'list' => array (),
		'search' => array (),
	),
);

		return $Fields;
	}
}

