<?php
use \ITTI\DBForms\DBModel;


class users_groupsModel extends DBModel {

	function __construct(){
		$FD = $this->getCustomFieldsDefinitions();
		parent::__construct('users_groups', $FD);
	}



	function getCustomFieldsDefinitions(){

		$Fields = array (
				'name' => array (
					'title' => 'Name',
					'type' => 'char',
				),
				'resources' => array (
					'title' => 'Resources',
					'type' => 'set',
					'options' => array(
						'cats'=>'Site Structue',
						'cats_settings'=>'Page Settings',
						'adverts'=>'Adverts',
					)
				),

);

		return $Fields;
	}
}

