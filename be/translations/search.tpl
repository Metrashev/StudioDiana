<?php /* @var $this \ITTI\FP\SearchForm */ ?>

<table class="ittiSearchTable">
<tr>
<td><label for="module_code"></label></td>
<td><input name="module_code" /><input type="checkbox" name="op[module_code]" itti:valueon="ne" itti:valueoff="eq" /></td>
</tr>

<tr>
<td><label for="cid"></label></td>
<td>
<select name="op[cid]" itti:skipemptyoption="">
<option value="eq">equal</option>
<option value="ne">not equal</option>
</select>
<input name="cid" />
</td>
</tr>

<tr>
<td><label for="translation_key"></label></td>
<td><input name="translation_key" /></td>
</tr>

<tr>
<td><label for="is_html"></label></td>
<td><input name="is_html" /></td>
</tr>

<tr>
<td><label for="description"></label></td>
<td><input name="description" /></td>
</tr>

<tr itti:rep="lng" class="lng_{$k}">
	<td><label for="lng_{$k}.value"></label></td>
	<td><input name="lng_{$k}.value" /></td>
</tr>

<tr>
<td></td>
<td>
	<button name="do[search]" class="doSearch">Search</button>
	<button name="do[clear]" class="doClear">Clear</button>
</td>
</tr>
</table>