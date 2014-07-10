<?php
use \ITTI\DBForms\DBModel;


class newsModel extends DBModel {

	function __construct(){
		parent::__construct('news', $this->getCustomFieldsDefinitions());
	}



	function getCustomFieldsDefinitions(){

$Fields = array (
		'id' => array(
				'title'=>'Id',
				'type'=>'int',
		),
		'cid' => array(
				'title'=>'Page',
				'type'=>'enum',
				'options'=>getCidNom(),
		),
		'*.title' => array (
				'type' => 'char',
				'title' => 'Title',
		),
		'*.description' => array (
				'type' => 'text',
				'title' => 'Description',
		),
		'leading_image' => array (
				'type' => 'managedfiles',
				'image' => true,
				'title' => 'Leading Image',
				'edit' => array (
					'sizes'=>array(array('width'=>160, 'height'=>120)),
					'UIResize' => true,
				),
		),
		'from_date' => array (
				'type' => 'datetime',
				'title' => 'From Date',
		),
		'to_date' => array (
				'type' => 'datetime',
				'title' => 'To Date',
		),
		'*.body' => array (
				'type' => 'text',
				'html' => true,
				'title' => 'Body',
		),
		'images' => array (
				'type' => 'managedfiles',
				'multiple' => true,
				'image' => true,
				'title' => 'Images',
				'edit' => array (
					'useimagesrc'=>true,
				),
		),
		'files' => array (
				'type' => 'managedfiles',
				'multiple' => true,
				'title' => 'Files',
		),
);

		return $Fields;
	}
}

