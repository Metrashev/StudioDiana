<?php

$_str = \ITTI\FW::$FE->getTranslator('PageBar');
$Pager = $data['Pager'];

/* @var $Pager ITTI\PageBarModel */

if($Pager->TotalPages<2) return ;


echo <<<EOD
<div class="PageBar">
<div style="float:right">{$_str('Page')} {$Pager->CurrentPage} {$_str('of')} {$Pager->TotalPages} &nbsp;</div>
EOD;

$res = Array();

$data = $Pager->getPagesData();

foreach($data['pages'] as $pg=>$href){
	if($href){
		$res[] = <<<EOD
<a href="{$href}">{$pg}</a>
EOD;
	} else {
		$res[] = <<<EOD
<b>{$pg}</b>
EOD;
	}
}
echo implode("&nbsp;", $res);


?>
</div>