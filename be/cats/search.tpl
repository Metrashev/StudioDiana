<?php /* @var $this \ITTI\FP\SearchForm */ ?>

<table class="ittiSearchTable">
<tr>
<td><label for="pid"></label></td>
<td><input name="pid" itti:model="pid"/></td>
</tr>

<tr>
<td><label for="ord_from">Ord between</label></td>
<td><input name="ord_from" itti:model="ord" itti:op="ge" /> and <input name="ord_to" itti:model="ord" itti:op="le" /></td>
</tr>


<tr>
<td><label for="name"></label></td>
<td><input name="name" /></td>
</tr>

<tr>
<td><label for="template_id"></label></td>
<td><input name="template_id" /></td>
</tr>

<tr>
<td><label for="tags"></label></td>
<td><checkboxgroup name="tags" /></td>
</tr>

<tr>
<td><label for="kw_url"></label></td>
<td><input name="kw_url" itti:op="kw" itti:field="cats.url,*.url" title="URL" /></td>
</tr>


<tr>
<td><label for="kw_title"></label></td>
<td><input name="kw_title" itti:op="kw" itti:field="name,*.menu_title,*.page_title,*.content_title" title="Title" /></td>
</tr>

<tr>
<td></td>
<td>
	<button name="do[search]" class="doSearch">Search</button>
	<button name="do[clear]" class="doClear">Clear</button>
</td>
</tr>
</table>
