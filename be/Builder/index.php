<?php

use ITTI\FP\FormProcessor;
use ITTI\FP\EditForm;
use ITTI\FP\ListForm;
use ITTI\FP\SearchForm;
use ITTI\DBForms\DBModel;

$fp = new FormProcessor();
$fp->LoadTemplateFile(__DIR__.'/a.tpl');
$fp->fillForm();


function var_export_array(array $var){
	$res = str_replace("  ", "\t", var_export($var, true));

	$res = preg_replace('/\(\s+\)/is', '()', $res);
	$res = preg_replace('/ => \s+/is', ' => ', $res);
	return $res;
}

function buildModelDefinitions($table){
	$model = DBModel::generateDBDefinitions($table, '');
	unset($model['id']);



	if(getdb()->getOne("SHOW TABLES LIKE '{$table}_lng'")) {
		$model += DBModel::generateDBDefinitions($table.'_lng', '*.');
		unset($model['*.id']);
		unset($model['*.mid']);
		unset($model['*.lng']);
	}

	foreach ($model as $k=>&$v){
		unset($v['db']);
	}
	unset($v);

	return $model;
}


$data = $fp->getData();
if($data['table']){
	$model = buildModelDefinitions($data['table']);
	//$tmp = DBModel::generateDBDefinitions($data['table']);
	//echo '<pre>'; var_dump($model);

	$m = new DBModel($data['table'], $model);


	$fp->getFieldById('model')->setValue(var_export_array($model));
	$fp->getFieldById('edit')->setValue(EditForm::buildEditForm($model));
	$fp->getFieldById('list')->setValue(ListForm::buildListForm($model));

	foreach ($model as $k=>&$v) {
		if(in_array($v['type'], array('integer','decimal','date','datetime','float'))) $v['op'] = 'be';
	}
	$fp->getFieldById('search')->setValue(SearchForm::buildSearchForm($model));
}


echo $fp->getHTML();

if(isset($_POST['doSave'])){
	$tbl = $data['table'];
	echo $dir = __DIR__.'/../'.$data['table'];
	if(!is_dir($dir)) mkdir($dir);

	$tmp = file_get_contents(__DIR__.'/tpl/Model.php');
	$tmp = str_replace('{#DB_TABLE_NAME#}', $tbl, $tmp);
	$tmp = str_replace('{#FIELDS_ARRAY#}', $_POST['model'], $tmp);
	file_put_contents($dir.'/Model.php', $tmp);

	$tmp = file_get_contents(__DIR__.'/tpl/index.php');
	$tmp = str_replace('{#DB_TABLE_NAME#}', $tbl, $tmp);
	file_put_contents($dir.'/index.php', $tmp);

	$tmp = file_get_contents(__DIR__.'/tpl/edit.php');
	$tmp = str_replace('{#DB_TABLE_NAME#}', $tbl, $tmp);
	file_put_contents($dir.'/edit.php', $tmp);

	//$tmp = file_get_contents(__DIR__.'/tpl/list.tpl');
	//$tmp = str_replace('{#COLS#}', $_POST['list'], $tmp);
	file_put_contents($dir.'/list.tpl', $_POST['list']);
	file_put_contents($dir.'/edit.tpl', $_POST['edit']);
	file_put_contents($dir.'/search.tpl', $_POST['search']);
}
