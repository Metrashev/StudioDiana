<?php
use \ITTI\DBForms\DBModel;


class {#DB_TABLE_NAME#}Model extends DBModel {

	function __construct(){
		parent::__construct('{#DB_TABLE_NAME#}', $this->getCustomFieldsDefinitions());
	}

	function getCustomFieldsDefinitions(){

		$Fields = {#FIELDS_ARRAY#};

		return $Fields;
	}
}

