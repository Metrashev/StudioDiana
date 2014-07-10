
<div class="ittiBox ittiEditContainer">
<div class="ittiBox ittiBoxHeader">
Menu
</div>

<div class="ittiBox ittiBoxBody">
<table border="0">


<tr>
<td>Move</td>
<td style="position:relative; text-align:center;">
<button name="do[moveUp]">Up</button><br />
<select name="node1" size="20" itti:skipemptyoption="" /><br />


<button name="do[moveDown]">Down</button>
<button name="do[moveLeft]" style="position:absolute; bottom:0; left:0;">Left</button>
<button name="do[moveRight]" style="position:absolute; bottom:0; right:0;">Right</button>
</td>
<td><button name="do[moveAfter]">Move After</button><br />
<button name="do[moveAsChild]">Move as Child</button></td>
<td><select name="node2" size="20" itti:skipemptyoption="" /></td>
</tr>


<tr>
<td>Add</td>
<td colspan="3">
<input name="newNode" />

</td>

</tr>

<tr>
<td></td>
<td colspan="3">
<button name="do[addAfter]">Add After</button>
<button name="do[addAsChild]">Add as Child</button>
<button name="do[edit]">Edit</button>
</td>
</tr>
</table>


<style>
.fs {
	border:1px solid #FFF;
	border-radius: 3px;
	box-shadow: 0px 0px 10px 1px #888;
	margin:5px;
	padding:5px;
	background: #EEE;
	position:relative;
}

.fs legend {
	display:block;
	position:relative;
	width:100%;
	padding:3px;
	margin-top:10px;
	background: #DEDEDE;
	border-bottom:1px inset #CCC;
}
.fs legend:after {
	content:"";
	display:block;
	border-bottom:1px solid #FFF;
}
</style>
<fieldset class="fs">
<legend><span class="itti-icon settings"></span> Add new Node</legend>

<input  name="newNode2" />
</fieldset>

</div>
</div>

