<?php /* @var $this \ITTI\FP\SearchForm */ ?>

<table class="ittiSearchTable">

<?php if(empty($_GET['cid'])) {?>
<tr>
<td><label for="cid"></label></td>
<td><input name="cid" /></td>
</tr>
<?php } ?>

<tr>
<td><label for="from_date_from">From Date between</label></td>
<td><input name="from_date_from" itti:model="from_date" itti:op="ge" /> and <input name="from_date_to" itti:model="from_date" itti:op="le" /></td>
</tr>

<tr>
<td><label for="to_date_from">To Date between</label></td>
<td><input name="to_date_from" itti:model="to_date" itti:op="ge" /> and <input name="to_date_to" itti:model="to_date" itti:op="le" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
<td><label for="lng_{$k}.title"></label></td>
<td><input name="lng_{$k}.title" /></td>
</tr>

<tr>
<td><label for="_keywords"></label></td>
<td><input name="_keywords" itti:op="kw" itti:field="*.title,*.description,*.body" title="Keywords" /></td>
</tr>

<tr>
<td></td>
<td>
	<button name="do[search]" class="doSearch">Search</button>
	<button name="do[clear]" class="doClear">Clear</button>
</td>
</tr>
</table>
