<?php
$node = \ITTI\FW::$FE->ActiveNode;

$row = getPageByCid($node['id']);

if(empty($row)) return ;

echo <<<EOD
<article>
	<h1>{$node['content_title']}</h1>
	<div>{$row['body']}</div>
</article>
EOD;
