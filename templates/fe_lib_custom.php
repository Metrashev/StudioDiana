<?php

function getNewsById($id){
	return getdb()->getRow("SELECT title, body, cid
			FROM pages INNER JOIN pages_lng ON pages.id=pages_lng.mid AND pages_lng.lng=?
			WHERE pages.id=? AND from_date < ?now AND (to_date > ?now or to_date='000-00-00 00:00:00') ORDER BY from_date DESC LIMIT 1",
			array(LNG_CURRENT, $id, 'now'=>date('Y-m-d H:i:s')));
}

function getPageByCid($cid){

	return getdb()->getRow("SELECT title, body
			FROM pages INNER JOIN pages_lng ON pages.id=pages_lng.mid AND pages_lng.lng=?lng
			WHERE cid=?cid LIMIT 1",
			array('lng'=>LNG_CURRENT, 'cid'=>$cid));
}

function getHomePageByCid($cid){
	return getdb()->getRow("SELECT *
			FROM home_pages INNER JOIN home_pages_lng ON home_pages.id=home_pages_lng.mid AND home_pages_lng.lng=?lng
			WHERE cid=?cid LIMIT 1",
			array('lng'=>LNG_CURRENT, 'cid'=>$cid));
}

function getURL($cid, $params){
	$url = \ITTI\FW::$FE->getUrlForCid($cid);
	if(strpos($url, '?')===false){
		$url .= '?'.$params;
	} else {
		$url .= '&'.$params;
	}
	return $url;
}


function RenderAdvertOnPosition($PositionId, $lng=LNG_CURRENT, $addSizes=false){

	$row = getdb()->getRow("SELECT * FROM adverts WHERE position_id=? AND FIND_IN_SET(?, languages)
			AND (!active_from_date OR active_from_date<?now) AND (!active_to_date OR active_to_date>?now) ORDER BY RAND() LIMIT 1",
			array($PositionId, $lng, 'now'=>date('Y-m-d H:i:s'))
	);

	if(empty($row)) return ;

	$target = empty($row['target']) ? '' : ' target="'.htmlspecialchars($row['target']).'"';
	$href = empty($row['ad_link']) ? '' : ' href="'.htmlspecialchars($row['ad_link']).'"';
	$name = empty($row['name']) ? '' : htmlspecialchars($row['name']);

	$advPosSize = \ITTI\FE\Config::getDefault()->Modules->getModule('Adverts')['ADVERT_POSITION_SIZE'][$PositionId];
	$style = $addSizes ? "style=\"width:{$advPosSize['width']}px;height:{$advPosSize['height']}px\"" : '';

	switch ($row['ad_type_id']) {
		case 1:
			$fi = \ITTI\FW::getManagedFiles()->getFileInfoById($row['ad_file']);
			return <<<EOD
<a {$href} {$target} class="banner banner{$PositionId}" id="bannerId{$row['id']}"><img src="{$fi['url']}" {$style}/></a>
EOD;
			break;
		case 2:
			$fi = \ITTI\FW::getManagedFiles()->getFileInfoById($row['ad_file']);
			return <<<EOD
<script type="text/javascript" src="/js/swfobject.js"></script>
<div class="banner banner{$PositionId}" id="bannerId{$row['id']}">This content requires the Macromedia Flash Player.<br/><a href="http://www.macromedia.com/go/getflash/">Get Flash</a></div>
<script type="text/javascript">
	var fo = new FlashObject("{$fi['url']}", "flash", "{$advPosSize['width']}", "{$advPosSize['height']}", "6", "#FFFFFF", true, "best");
	fo.useExpressInstall('/flash/expressinstall.swf');
	fo.addParam("scale", "noscale");
	fo.addParam("wmode", "transparent");
	fo.write("bannerId{$row['id']}");
</script>

EOD;
			break;
		case 3:
			return $href ? "<a {$href} {$target} class='banner banner{$PositionId}' id='bannerId{$row['id']}'>{$row['ad_text']}</a>" :
					"<div class='banner banner{$PositionId}' id='bannerId{$row['id']}'>{$row['ad_text']}</a>";
			break;
		case 4:

			break;

		default:
	}
}

