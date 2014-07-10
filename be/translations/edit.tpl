<?php /* @var $this \ITTI\FP\EditForm */ ?>

<table class="BEEditTable">
<tr>
	<td><label for="module_code"></label></td>
	<td><input name="module_code" itti:required="" /></td>
</tr>

<tr>
	<td><label for="cid"></label></td>
	<td><input name="cid" /></td>
</tr>

<tr>
	<td><label for="translation_key"></label></td>
	<td><input name="translation_key" /></td>
</tr>
<tr>
	<td><label for="ord"></label></td>
	<td><input name="ord" /></td>
</tr>
<tr>
	<td><label for="is_html"></label></td>
	<td><input name="is_html" onchange="$(this.form).submit()" /></td>
</tr>

<tr>
	<td><label for="description"></label></td>
	<td><input name="description" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.value"></label></td>
	<td><input name="lng_{$k}.value" <?php if($this->PostData['is_html']) { \ITTI\FW::$HTMLPage->AddJSFile('/itti/js/tinymce/tinymce.min.js'); echo 'data-tinymce="{}"'; } ?>/></td>
</tr>


</table>
