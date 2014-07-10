<?php /* @var $this \ITTI\FP\SearchForm */ ?>

<table class="ittiSearchTable">
<tr>
<td><label for="name"></label></td>
<td><input name="name" /></td>
</tr>

<tr>
<td><label for="question"></label></td>
<td><input name="question" /></td>
</tr>

<tr>
<td><label for="active_from_date_from">Active From Date between</label></td>
<td><input name="active_from_date_from" itti:model="active_from_date" itti:op="ge" /> and <input name="active_from_date_to" itti:model="active_from_date" itti:op="le" /></td>
</tr>

<tr>
<td><label for="active_to_date_from">Active To Date between</label></td>
<td><input name="active_to_date_from" itti:model="active_to_date" itti:op="ge" /> and <input name="active_to_date_to" itti:model="active_to_date" itti:op="le" /></td>
</tr>

<tr>
<td><label for="position_id"></label></td>
<td><input name="position_id" /></td>
</tr>

<tr>
<td><label for="is_visible"></label></td>
<td><input name="is_visible" /></td>
</tr>


<tr>
<td></td>
<td>
	<button name="do[search]" class="doSearch">Search</button>
	<button name="do[clear]" class="doClear">Clear</button>
</td>
</tr>
</table>
