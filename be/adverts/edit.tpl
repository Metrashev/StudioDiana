<?php /* @var $this \ITTI\FP\EditForm */ ?>
<?php

$this->Models['target']['options'] = array(
	''=>'The Same window',
	'_blank'=>'New Window',
);

$size = false;
$sizeLabel = 'free';

if(isset($GLOBALS['MODULES']['Adverts']['ADVERT_POSITION_SIZE'][$this->PostData['position_id']])){
	$size = $GLOBALS['MODULES']['Adverts']['ADVERT_POSITION_SIZE'][$this->PostData['position_id']];
	$sizeLabel = "{$size['width']} x {$size['height']}";
} else {

}

if(in_array($this->PostData['ad_type_id'], array(1,4))){
	$this->Models['ad_file']['image'] = true;
	if($size){
		$this->Models['ad_file']['sizes'] = array($size);
		$this->Models['ad_file']['UIResize'] = true;
	}
}

if($this->PostData['ad_type_id']==4){
	$this->Models['ad_file']['image'] = true;
	$this->Models['ad_file']['multiple'] = true;
}

$this->Models['ad_file']['required'] = in_array($this->PostData['ad_type_id'], array(1,2));
$this->Models['ad_text']['required'] = in_array($this->PostData['ad_type_id'], array(3));

?>
<table class="BEEditTable">
<tr>
	<td><label for="name"></label></td>
	<td><input name="name" itti:required="true" itti:trim="" /></td>
</tr>

<tr>
	<td><label for="active_from_date"></label></td>
	<td><input name="active_from_date"/></td>
</tr>

<tr>
	<td><label for="active_to_date"></label></td>
	<td><input name="active_to_date"/></td>
</tr>
<tr>
	<td><label for="languages"></label></td>
	<td><checkboxgroup name="languages" itti:required="" /></td>
</tr>
<tr>
	<td><label for="position_id"></label></td>
	<td><select name="position_id" itti:required="" onchange="this.form.submit()" style="width:auto;" /> Position size: <?=$sizeLabel?></td>
</tr>

<tr>
	<td><label for="ad_type_id"></label></td>
	<td><input name="ad_type_id" itti:required="" onchange="this.form.submit()" /></td>
</tr>

<tr>
	<td><label for="ad_link"></label></td>
	<td><input name="ad_link" itti:trim="" /></td>
</tr>

<tr>
	<td><label for="target"></label></td>
	<td><select name="target" itti:skipemptyoption="" /></td>
</tr>

<tr>
	<td><label for="ad_file"></label></td>
	<td><input name="ad_file" /></td>
</tr>

<tr>
	<td><label for="ad_text"></label></td>
	<td><input name="ad_text" style="height:150px;" /></td>
</tr>

</table>
