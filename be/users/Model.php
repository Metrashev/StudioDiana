<?php
use \ITTI\DBForms\DBModel;


class usersModel extends DBModel {

	function __construct(){
		parent::__construct('users', $this->getCustomFieldsDefinitions());
	}

	function getCustomFieldsDefinitions(){

$Fields = array (
	'user' => array (
		'title' => 'User',
		'type' => 'char',
	),
	'password' => array (
		'title' => 'Password',
		'type' => 'char',
	),
	'is_active' => array (
		'title' => 'Is Active',
		'type' => 'boolean',
	),
	'group_id' => array (
		'title' => 'Group Id',
		'type' => 'enum',
		'options' => getdb()->getAssoc("SELECT id, name FROM users_groups ORDER BY name")
	),
);

		return $Fields;
	}
}

