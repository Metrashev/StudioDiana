<?php
use ITTI\DBForms\DBModel;

class NomKeys extends DBModel {

	public $Title = 'Nomenclatures';

	function __construct(){
		parent::__construct('nomenclature_key', $this->getCustomFieldsDefinitions());
	}

	function getCustomFieldsDefinitions(){
		$Fields =
		array(
			'id'=>array(
				'list' => array('title'=>'ID'),
				'search' => false,
				'edit' => false,
			),

			'name'=>array(
				'title'=>'Nomenclature Name',
				'edit'=>array(
					'required'=>true,
				),
			),

			'*.name'=>array(
				'title'=>'Nomenclature Name',
				'edit'=>array(
					'required'=>true,
				),
			),

			'lng_bg.name'=>array(
				'title'=>'Име на номенклатурата',
				'edit'=>array(
					'required'=>false,
				),
			),
/*
			'nval.name'=>array(
					'name'=>'name',
					'title'=>'Val',
					'required'=>true,
			),
			'nval.*.name'=>array(
					'name'=>'name',
					'title'=>'Лнг',
					'required'=>true,
			),
*/
		);
/*
		$Fields['SlaveTables']['nval'] = array(
				'table'=>'nomenclature_val',
				'name'=>'nval',
				'title'=>'Nomenclature Values',
				'type'=>'O2M',
				'constrains'=>new DBTConstrains(array(), array('id'=>'mid')),
		);
		*/
		return $Fields;
	}

}

