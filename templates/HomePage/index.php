<script>
jQuery(function($){
	$('body.homepage .home-cell-image img').each(function(){
		var width = $(this).parent().innerWidth();
		if (width>0) {
			$(this).css({"width":width+'px',"height":"auto"});
		}
	});
});
</script>
<?php

\ITTI\FW::$HTMLPage->addBodyClass('homepage');

$page = getHomePageByCid(\ITTI\FW::$FE->ActiveNode['id']);

$mf = \ITTI\FW::getManagedFiles();

// text boxes
foreach (range(1,2) as $i) {
	$page['text'.$i.'_title'] = htmlspecialchars($page['text'.$i.'_title']);
	if ($page['text'.$i.'_href']!='') {
		$page['text'.$i.'_title'] = '<a href="'.$page['text'.$i.'_href'].'">'.$page['text'.$i.'_title'].'</a>';
	}
}

// image boxes
foreach (range(1,3) as $i) {
	if ($page['image'.$i.'_img']!='') {
		$img = $mf->getFileInfoById($page['image'.$i.'_img']);
		$page['image'.$i.'_img'] = '<img src="'.$img['url'].'" width="'.round($img['meta_data']['width']).'" height="'.round($img['meta_data']['height']).'">';
	}
	$page['image'.$i.'_title'] = htmlspecialchars($page['image'.$i.'_title']);
	if ($page['image'.$i.'_href']!='') {
		$page['image'.$i.'_title'] = '<a href="'.$page['image'.$i.'_href'].'">'.$page['image'.$i.'_title'].'</a>';
		if ($page['image'.$i.'_img']!='') {
			$page['image'.$i.'_img'] = '<a href="'.$page['image'.$i.'_href'].'">'.$page['image'.$i.'_img'].'</a>';
		}
	}
}

switch (\ITTI\FW::$FE->ActiveNode['params']['layout']) {
	case HOME_LAYOUT_1:
		require __DIR__.'/Layout1.php';
		break;
	case HOME_LAYOUT_2:
		require __DIR__.'/Layout2.php';
		break;
	case HOME_LAYOUT_3:
		require __DIR__.'/Layout3.php';
		break;
	default:
		throw new \Exception('Invalid homepage layout');
}
