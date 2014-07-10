<?php
/* @var $this \ITTI\FP\EditForm */ ?>

<table class="BEEditTable">

<tr>
<th>Key</th>
<th>Description</th>
<th>Ord</th>
<th itti:rep="lng" class="lng_{$k}">$v</th>
</tr>

<?php

$EOD = function ($s){return $s;};



foreach ($this->DBData['DDD'] as $i=>$row) {

	$TinyMCE = $row['is_html'] ? ' itti:html="" style="width:500px;"':'';

echo <<<EOD
<tr>
<td><input name="DDD[$i][id]" type="hidden" />{$row['translation_key']}</td>
<td>{$row['description']}</td>
<td><input name="DDD[$i][ord]" itti:model="ord" style="width:30px;" /></td>

<td itti:rep="lng" class="lng_{\$k}">
	<input name="DDD[$i][lng_{\$k}.value]"{$TinyMCE} itti:model="lng_{\$k}.value" />
</td>
</tr>
EOD;

}
?>
</table>