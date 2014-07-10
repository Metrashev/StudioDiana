<?php
use \ITTI\DBForms\DBModel;
use ITTI\FE\Modules;


class catsModel extends DBModel {

	public $Title = 'Site Structure';

	function __construct(){
		$FD = $this->getCustomFieldsDefinitions();

		if(\ITTI\FW::$User->getUserGroup()!==1){
			$FD['pid']['disabled'] = true;
		}
		parent::__construct('cats', $FD);

	}



	function getCustomFieldsDefinitions(){
		$Fields = array (
				'id' => array (
						'title' => 'Id',
						'type' => 'integer',
				),
				'pid' => array (
						'title' => 'Parent Node',
						'type' => 'enum',
						'options' => $GLOBALS['CATS_OPTIONS'],
				),
				'ord' => array (
						'title' => 'Order',
						'type' => 'float',
				),
				'tags' => array (
						'title' => 'Tags',
						'type' => 'set',
						'options' => $GLOBALS['CATS_TAGS'],
				),
				'url' => array (
						'title' => 'URL',
						'type' => 'char',
						'edit'=>array('trim'=>true),
				),
				'name' => array (
						'title' => 'Name',
						'type' => 'char',
						'edit'=>array('required'=>true, 'trim'=>true),
				),
				'skin_id' => array (
						'type' => 'enum',
						'title' => 'Skin',
						'options' => \ITTI\Arr::getArray(array_filter($GLOBALS['MODULES'],function($a){return $a['type']==Modules::SKIN;}), 'name'),
				),
				'template_id' => array (
						'title' => 'Template Id',
						'type' => 'enum',
						'options' => \ITTI\Arr::getArray(array_filter($GLOBALS['MODULES'],function($a){return $a['type']==Modules::PAGE;}), 'name'),
				),
				'params' => array (
						'title' => 'Params',
						'type' => 'serialized',
				),
				'head_html' => array (
						'title' => 'Head Html',
						'type' => 'text',
				),
				'pre_body_html' => array (
						'title' => 'Pre Body Html',
						'type' => 'text',
				),
				'pos_body_html' => array (
						'title' => 'Pos Body Html',
						'type' => 'text',
				),
				'*.is_active' => array (
						'title' => 'Is Active',
						'type' => 'boolean',
						'edit' => array('default'=>1)
				),
				'*.code' => array (
						'title' => 'Code',
						'type' => 'char',
				),
				'*.url' => array (
						'title' => 'URL',
						'type' => 'char',
						'edit'=>array('trim'=>true),
				),
				'*.menu_title' => array (
						'title' => 'Menu Title',
						'type' => 'char',
						'edit'=>array('trim'=>true),
				),
				'*.page_title' => array (
						'title' => 'Page Title',
						'type' => 'char',
						'edit'=>array('trim'=>true),
				),
				'*.content_title' => array (
						'title' => 'Content Title',
						'type' => 'char',
						'edit'=>array('trim'=>true),
				),
				'*.meta_description' => array (
						'title' => 'Meta Description',
						'type' => 'text',
				),
				'*.meta_keywords' => array (
						'title' => 'Meta Keywords',
						'type' => 'text',
				),
				'*.head_html' => array (
						'title' => 'Head Html',
						'type' => 'text',
				),
				'*.pre_body_html' => array (
						'title' => 'Pre Body Html',
						'type' => 'text',
				),
				'*.pos_body_html' => array (
						'title' => 'Pos Body Html',
						'type' => 'text',
				),
		);


		return $Fields;
	}
}

