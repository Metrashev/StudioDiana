<?php
use ITTI\TreeNode;

function renderNode(TreeNode $node){

	$target = empty($node['target']) ? '' : ' target="'.htmlspecialchars($node['target']).'"';
	$href = empty($node['href']) ? '' : ' href="'.htmlspecialchars($node['href']).'"';

	$selCSS =   $node['selected'] ? ' class="selected"' : '';
	$HTML = <<<EOD
<li><a{$href}{$target}{$selCSS}>{$node['menu_title']}</a>
EOD;

	if(!$node['selected'] || !$node->hasChilds()) return $HTML.'</li>';

	$HTML .= '<ul>';
	foreach ($node->getChilds() as $node ){
		$HTML .= renderNode($node);
	}

	$HTML .= '</ul></li>';

	return $HTML;

}

?>

<div class="menu">
<nav>
<ul>
<?php

$MenuItems = \ITTI\FW::$FE->ActiveNode->getParent();

foreach ($MenuItems->getChilds() as $node) echo renderNode($node);

?>
</ul>
</nav>
</div>