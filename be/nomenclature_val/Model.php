<?php

use ITTI\DBForms\DBModel;


class NomVals extends DBModel {

	public $title = 'Nomenclatures Values';

	function __construct(){
		parent::__construct('nomenclature_val', $this->getCustomFieldsDefinitions());
	}

	function getCustomFieldsDefinitions(){
		$Fields =
		array(
			'id'=>array(

			),
			'mid'=>array(
				'title'=>'Mid',
				//'disabled'=>true,
				'options'=>getdb()->getAssoc("SELECT id, name FROM nomenclature_key"),
				//'type'=>'enum',
			),
			'name'=>array(
				'title'=>'Nomenclature Val',
				'edit'=>array(
					'required'=>true,
				),
			),

			'*.name'=>array(
				'title'=>'Nomenclature Val',
				'edit'=>array(
					'required'=>true,
				),
			),
		);
		return $Fields;
	}


}


