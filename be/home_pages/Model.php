<?php
use \ITTI\DBForms\DBModel;


class home_pagesModel extends DBModel {

	function __construct(){
		parent::__construct('home_pages', $this->getCustomFieldsDefinitions());
	}

	function getCustomFieldsDefinitions(){

		$Fields = array (
	'cid' => array (
		'title' => 'Cid',
		'type' => 'integer',
	),
	'*.text1_title' => array (
		'title' => 'Text1 Title',
		'type' => 'char',
	),
	'*.text1_body' => array (
		'title' => 'Text1 Body',
		'type' => 'text',
		'html' => true,
	),
	'*.text1_href' => array (
		'title' => 'Text1 Href',
		'type' => 'char',
	),
	'*.text2_title' => array (
		'title' => 'Text2 Title',
		'type' => 'char',
	),
	'*.text2_body' => array (
		'title' => 'Text2 Body',
		'type' => 'text',
		'html' => true,
	),
	'*.text2_href' => array (
		'title' => 'Text2 Href',
		'type' => 'char',
	),
	'*.image1_title' => array (
		'title' => 'Image1 Title',
		'type' => 'char',
	),
	'*.image1_img' => array (
		'title' => 'Image1 Img',
		'type' => 'managedfiles',
		'image' => true,
		'edit' => array(
			'sizes'=>array(array('width'=>330, 'height'=>0)),
			'UIResize' => true,
		),
	),
	'*.image1_body' => array (
		'title' => 'Image1 Body',
		'type' => 'text',
		'html' => true,
	),
	'*.image1_href' => array (
		'title' => 'Image1 Href',
		'type' => 'char',
	),
	'*.image2_title' => array (
		'title' => 'Image2 Title',
		'type' => 'char',
	),
	'*.image2_img' => array (
		'title' => 'Image2 Img',
		'type' => 'managedfiles',
		'image' => true,
		'edit' => array(
			'sizes'=>array(array('width'=>330, 'height'=>0)),
			'UIResize' => true,
		),
	),
	'*.image2_body' => array (
		'title' => 'Image2 Body',
		'type' => 'text',
		'html' => true,
	),
	'*.image2_href' => array (
		'title' => 'Image2 Href',
		'type' => 'char',
	),
	'*.image3_title' => array (
		'title' => 'Image3 Title',
		'type' => 'char',
	),
	'*.image3_img' => array (
		'title' => 'Image3 Img',
		'type' => 'managedfiles',
		'image' => true,
		'edit' => array(
			'sizes'=>array(array('width'=>330, 'height'=>0)),
			'UIResize' => true,
		),
	),
	'*.image3_body' => array (
		'title' => 'Image3 Body',
		'type' => 'text',
		'html' => true,
	),
	'*.image3_href' => array (
		'title' => 'Image3 Href',
		'type' => 'char',
	),
);

		return $Fields;
	}
}

