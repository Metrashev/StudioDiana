<?php
use ITTI\FW;


$_str = \ITTI\FW::$FE->getTranslator('NewsPage');

if(isset($_GET['pid'])){
	$row = getPageById($_GET['pid']);

	if(empty($row)) throw new ITTI\FE\EPageNotFound();
	FW::$HTMLPage->setPageTitle($row['title']);
	echo <<<EOD
	<h1>{$row['title']}</h1>
	{$row['body']}
EOD;
return ;
}

$node = \ITTI\FW::$FE->ActiveNode;
FW::$HTMLPage->setPageTitle($node['name']);

?>
<h1><?=$node['name'];?></h1>
<?php


$FROM = " FROM
		pages INNER JOIN pages_lng ON pages.id=pages_lng.mid AND pages_lng.lng=?lng
		WHERE cid=?cid AND from_date < ?now AND (to_date > ?now OR to_date='000-00-00 00:00:00')
		ORDER BY from_date DESC ";

$Params = array('lng'=>LNG_CURRENT, 'cid'=>$node['id'], 'now'=>date('Y-m-d H:i:s'));

$data = \ITTI\ITTIHelper::getPagedList(" title, body, pages.id, leading_image", $FROM, $Params, 1, "/?cid=".$node['id']);

$MF = FW::getManagedFiles();

foreach ($data['Items'] as $news){

	$news['href'] = "/?cid={$node['id']}&amp;pid=".$news['id'];

	if($news['leading_image']) {
		$fi = $MF->getFileInfoById($news['leading_image']);
		$img = <<<EOD
	<a href="{$news['href']}"><img src="{$fi['url']}" alt="" style="float:left;padding:8px 8px 0 0;" /></a>
EOD;
	} else {
		$img = "";
	}

	echo <<<EOD
		<h2><a href="{$news['href']}">{$news['title']}</a></h2>
		<span class="sub-info">{$news['due_date']['date']}</span>
		{$img}
		<p>{$news['subtitle']}</p>
		<a class="more-read" href="{$news['href']}">{$_str('Read More')}</a>
EOD;

}


include(dirname(__FILE__)."/../Core/PageBar.php");
