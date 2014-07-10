<div class="logo"><a href="/?cid=1"></a></div>
<div class="title"><?=$_str('Website title')?></div>
<div class="subtitle"><?=$_str('Website subtitle')?></div>
<?php if (isset($GLOBALS['MODULES']['MainSkin']['SocialLinks'])) { ?>
<div class="social-links">
	<?php
	foreach ($GLOBALS['MODULES']['MainSkin']['SocialLinks'] as $class=>$href) {
		echo '<a href="'.htmlspecialchars($href).'" target="_blank" class="'.$class.'"> </a>';
	}
	?>
</div>
<?php } ?>
<div class="language-links">
	<?php
	foreach (\ITTI\FW::$Languages as $k=>$v) {
		echo '<a '.($k==LNG_CURRENT ? 'class="selected" ' : '').'href="'.\ITTI\FW::$FE->getUrlForCidLng(1, $k).'">'.$v.'</a>';
	}
	?>
</div>
<nav>
	<ul>
		<?php
		$FE = \ITTI\FW::$FE;
		$i = 1;
		foreach ($FE->NodesByTag['TopNav'] as $node) {
			$lng = getdb()->getRow('SELECT * FROM cats_lng WHERE mid=? AND lng=?', array($node['id'], LNG_CURRENT));
			echo '<li class="li-'.$i++.($node['id']==$FE->ActiveNode['id']?' selected':'').'"><a href="/?cid='.$node['id'].'">'.htmlspecialchars($lng['menu_title']).'</a></li>';
		}
		?>
	</ul>
</nav>