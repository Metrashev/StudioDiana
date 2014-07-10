<?php
/* @var $this \ITTI\FP\EditForm */

?>
<table class="BEEditTable">
<tr>
	<td><label for="cid"></label></td>
	<td><input name="cid" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.title"></label></td>
	<td><itti:input name="lng_{$k}.title" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.description"></label></td>
	<td><itti:input name="lng_{$k}.description" /></td>
</tr>
<?php if(!defined('SPEDIT')) { ?>
<tr>
	<td><label for="leading_image"></label></td>
	<td><itti:input name="leading_image" /></td>
</tr>

<tr>
	<td><label for="from_date"></label></td>
	<td><itti:input name="from_date" /></td>
</tr>

<tr>
	<td><label for="to_date"></label></td>
	<td><itti:input name="to_date" /></td>
</tr>
<?php } ?>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.body"></label></td>
	<td><textarea name="lng_{$k}.body" style='width:910px; height:300px;'></textarea></td>
</tr>

<tr>
	<td><label for="images"></label></td>
	<td><itti:input name="images" /></td>
</tr>

<tr>
	<td><label for="files"></label></td>
	<td><itti:input name="files" /></td>
</tr>

</table>
