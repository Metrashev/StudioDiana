<?php /* @var $this \ITTI\FP\EditForm */ ?>

<table class="BEEditTable">

<tr>
	<td><label for="url"></label></td>
	<td><input name="url" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.url"></label></td>
	<td><input name="lng_{$k}.url" /></td>
</tr>

<tr>
	<td><label for="tags"></label></td>
	<td><checkboxgroup name="tags" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.menu_title"></label></td>
	<td><input name="lng_{$k}.menu_title" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.page_title"></label></td>
	<td><input name="lng_{$k}.page_title" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.content_title"></label></td>
	<td><input name="lng_{$k}.content_title" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.meta_description"></label></td>
	<td><input name="lng_{$k}.meta_description" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.meta_keywords"></label></td>
	<td><input name="lng_{$k}.meta_keywords" /></td>
</tr>

<tr>
	<td><span title="bubbles">*</span><label for="head_html"></label></td>
	<td><input name="head_html" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.head_html"></label></td>
	<td><input name="lng_{$k}.head_html" /></td>
</tr>

<tr>
	<td><span title="bubbles">*</span><label for="pre_body_html"></label></td>
	<td><input name="pre_body_html" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.pre_body_html"></label></td>
	<td><input name="lng_{$k}.pre_body_html" /></td>
</tr>

<tr>
	<td><span title="bubbles">*</span><label for="pos_body_html"></label></td>
	<td><input name="pos_body_html" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.pos_body_html"></label></td>
	<td><input name="lng_{$k}.pos_body_html" /></td>
</tr>


</table>
<hr />
<div>* bubbles - If there is no value for this node, it will be taken from parent nodes.</div>
<?php
if(isset($GLOBALS['MODULES'][$this->DBData['template_id']]['CatsEditor'])){
	include($GLOBALS['MODULES'][$this->DBData['template_id']]['CatsEditor']);
}
?>
