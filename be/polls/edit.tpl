<?php /* @var $this \ITTI\FP\EditForm */ ?>

<table class="BEEditTable">
<tr>
	<td><label for="name"></label></td>
	<td><input name="name" itti:required="required" /></td>
</tr>

<tr>
	<td><label for="question"></label></td>
	<td><input name="question" /></td>
</tr>

<tr>
	<td><label for="active_from_date"></label></td>
	<td><input name="active_from_date" /></td>
</tr>

<tr>
	<td><label for="active_to_date"></label></td>
	<td><input name="active_to_date" /></td>
</tr>

<tr>
	<td><label for="position_id"></label></td>
	<td><input name="position_id" /></td>
</tr>

<tr>
	<td><label for="is_visible"></label></td>
	<td><input name="is_visible" /></td>
</tr>

</table>


<button type="button" onclick="addRow()">Add 1</button>

<table id="tbl1">
<thead>
<tr>
<th>#</th>
<th>option</th>
<th>Votes</th>
<th>Del</th>
</tr>
</thead>

<tbody>
<?php


$SlaveTable = 'Options';
$ord = 0;

if(is_array($this->PostData[$SlaveTable])){
	foreach ($this->PostData[$SlaveTable] as $k=>$row){
		$this->PostData[$SlaveTable][$k]['ord'] = $ord++;

		echo <<<EOD
<tr>
	<td class="handle">Sort</td>
	<td>
	<input type="hidden" name="{$SlaveTable}[{$k}][id]" />
	<input type="hidden" name="{$SlaveTable}[{$k}][ord]" />
	<input name="{$SlaveTable}[{$k}][option_text]" />
	</td>
	<td>
	<input name="{$SlaveTable}[{$k}][num_votes]" disabled="" />
	</td>
	<td>
	<button type="button" onclick="\$(this).closest('tr').remove();">Del</button>
	</td>
</tr>


EOD;
	}
	$k++;
} else {
	$k = 0;
	$this->ValuesLinear[$SlaveTable] = array();
}
?>
</tbody>
</table>


<script type="text/template" id="tpl2" data-template='{"num":<?=(int)$k;?>}'>
<tr>
	<td class="handle">Sort</td>
	<td>
	<input type="hidden" name="Options[{$k}][id]" />
	<input name="Options[{$k}][option_text]" />
	</td>
	<td><input name="Options[{$k}][num_votes]" disabled="" itti:default="0" /></td>
	<td><button type="button" onclick="$(this).closest('tr').remove();">Del</button></td>
</tr>
</script>




<script>
//<![CDATA[
var tplElement = $("#{#IDPrefix#}tpl2".jqEscape());
var tpl = tplElement.html();
var num = tplElement.data('template').num;
//tplElement.remove();

function addRow(){
	copy = tpl.replace(/\{\$k\}/g, ++num);

	$("#{#IDPrefix#}tbl1 tbody".jqEscape()).append(copy);
	$( "#{#IDPrefix#}tbl1 tbody".jqEscape() ).sortable("refresh");
}


$( "#{#IDPrefix#}tbl1 tbody".jqEscape() ).sortable({ items: "> tr", handle: "td.handle" });

//]]>
</script>
