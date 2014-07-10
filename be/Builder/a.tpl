<select name="table" itti:options="getdb()->getCol('SHOW TABLES')" itti:options_key_field="" onchange="this.form.submit()" />

<button name="doSave">Save</button>

<table style="width:100%">
<col width="50%" />
<tr>
<td>Model</td>
<td>edit.tpl</td>
</tr>
<tr>
<td><textarea name="model" style="width:90%; height:300px;"></textarea></td>
<td><textarea name="edit" style="width:90%; height:300px;"></textarea></td>
</tr>
<tr>
<td>search.tpl</td>
<td>list.tpl</td>
</tr>
<tr>
<td><textarea name="search" style="width:90%; height:300px;"></textarea></td>
<td><textarea name="list" style="width:90%; height:300px;"></textarea></td>
</tr>

</table>