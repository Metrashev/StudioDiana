<?php
use ITTI\TreeNode;
use ITTI\FE\Modules;


\ITTI\FW::$HTMLPage->AddJavaScriptDR(<<<EOD



$("#beMenu").dynatree({
	persist: true,
	cookieId: "beMenu",
	cookie : {
		path: '/',
	},
	onPostInit: function(isReloading, isError) {
		this.reactivate();
	},
	//onActivate:
	onClick: function(node, event) {
		var href = $(event.target).attr('href');

		if( href ){
			window.location = href;
		}

	},

});


EOD
);

?>

<div id="beMenu">
<ul id="LeftMenu1">
	<li>Adiministration
		<ul>
		<li><a href="{#BE_URL#}users_groups/">Users Groups</a></li>
		<li><a href="{#BE_URL#}users/">Users</a></li>

		<li><a href="{#BE_URL#}cats/">Site structure</a></li>
		<li><a href="{#BE_URL#}cats/tree.php">Site structure as Tree</a></li>
		<li><a href="{#BE_URL#}translations/">Translations</a></li>

		<li><a href="{#BE_URL#}Builder/">Builder</a></li>
		</ul>
	</li>


	<li>Modules Page
		<ul>
<?php

foreach ($GLOBALS['MODULES'] as $k=>$v){
	if(empty($v['BEEditor'])) continue;
	if($v['type']!=Modules::PAGE) continue;
	$v['BEEditor'] .= '?module='.$k;
	echo "<li><a href='{#BE_URL#}{$v['BEEditor']}'>{$v['name']}</a></li>";
}
?>
		</ul>
	</li>

	<li>Modules Widget
		<ul>
<?php

foreach ($GLOBALS['MODULES'] as $k=>$v){
	if(empty($v['BEEditor'])) continue;
	if($v['type']==Modules::PAGE) continue;
	$v['BEEditor'] .= '?module='.$k;
	echo "<li><a href='{#BE_URL#}{$v['BEEditor']}'>{$v['name']}</a></li>";
}
?>
		</ul>
	</li>
<?php
foreach ($GLOBALS['CATS_ROOT']->getChilds() as $node) {
	echo renderTree($node);
}

function renderTree(TreeNode $node){

	if(isset($GLOBALS['MODULES'][$node['template_id']]['BEEditor'])){
		$editorURL = $GLOBALS['MODULES'][$node['template_id']]['BEEditor'];
		if(strpos($editorURL, '?')===false) {
			$editorURL.="?cid={$node['id']}";
		} else {
			$editorURL.="&cid={$node['id']}";
		}

		$href= ' href="{#BE_URL#}'.$editorURL.'"';

	} else {
		$href = " href='{#BE_URL#}cats/settings.php?cid={$node['id']}'";
	}

	 $HTML = <<<EOD
<li><a{$href}>{$node['name']}</a>
EOD;

	if(!$node->hasChilds()) return $HTML.'</li>';

	$HTML .= '<ul>';
	foreach ($node->getChilds() as $node ){
		$HTML .= renderTree($node);
	}

	$HTML .= '</ul></li>';

	return $HTML;
}




?>
</ul>
</div>