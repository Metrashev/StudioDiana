<?php /* @var $this \ITTI\FP\SearchForm */ ?>

<table class="ittiSearchTable">

<tr>
<td><label for="cid"></label></td>
<td><input name="cid" /></td>
</tr>

<tr>
<td><label for="_keywords"></label></td>
<td><input name="_keywords" itti:op="kw" itti:field="*.body" title="Keywords" /></td>
</tr>



<tr>
<td></td>
<td>
	<button name="do[search]" class="doSearch">Search</button>
	<button name="do[clear]" class="doClear">Clear</button>
</td>
</tr>
</table>
