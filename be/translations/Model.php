<?php
use \ITTI\DBForms\DBModel;


class translationsModel extends DBModel {

	function __construct(){
		parent::__construct('translations', $this->getCustomFieldsDefinitions());
	}

	function getCustomFieldsDefinitions(){

		$Fields = array (
	'module_code' => array (
		'title' => 'Module Code',
		'type' => 'enum',
		'options' => \ITTI\Arr::getArray($GLOBALS['MODULES'], 'name'),
	),
	'cid' => array (
		'title' => 'Page',
		'type'=>'enum',
		'options'=>getCidNom(),
	),
	'translation_key' => array (
		'title' => 'Translation Key',
		'type' => 'char',
	),
	'is_html' => array (
		'title' => 'Is Html',
		'type' => 'boolean',
	),
	'description' => array (
		'title' => 'Description',
		'type' => 'text',
	),
	'ord' => array (
			'title' => 'Order',
			'type' => 'float',
			'db' => array(
				'dbclass'=>'\ITTI\DBForms\DBFieldOrder',
				'constrains'=>new \ITTI\DBForms\DBTConstrains(array(), array('module_code'=>'module_code'))
			),
	),
	'*.value' => array (
		'title' => 'Value',
		'type' => 'text',
	),
);

		return $Fields;
	}
}

