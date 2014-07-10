<?php
/* @var $this \ITTI\FP\EditForm */
?>
<table class="BEEditTable">
<tr>
	<td><label for="cid"></label></td>
	<td><input name="cid" /></td>
</tr>

<?php
foreach ($this->Languages as $k=>$v) {
$title = getdb()->getOne('SELECT content_title FROM cats_lng WHERE lng=? and mid=?', array($k, $_GET['cid']));

echo <<<EOD
<tr class="lng_{$k}">
	<td><label for="cats.content_title">Title ({$k})</label></td>
	<td><b>{$title}</b></td>
</tr>

<tr class="lng_{$k}">
	<td><label for="lng_{$k}.body"></label></td>
	<td><textarea name="lng_{$k}.body" style='width:910px; height:300px;'></textarea></td>
</tr>
EOD;
}
?>

<tr>
	<td><label for="images"></label></td>
	<td><itti:input name="images" /></td>
</tr>

<tr>
	<td><label for="files"></label></td>
	<td><itti:input name="files" /></td>
</tr>

</table>
