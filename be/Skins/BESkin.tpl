<?php
/* @var $this \ITTI\HTMLPage */



$CrumbsPath = \ITTI\CallManager::getCrumbsPath();
$BackBtn = isset($CrumbsPath[count($CrumbsPath)-2]) ? $CrumbsPath[count($CrumbsPath)-2] : null;
foreach ($CrumbsPath as &$v){
	$this->addPageTitle($v['title']);

	$v = <<<EOD
<a href="{$v['url']}">{$v['title']}</a>
EOD;
}
$CrumbsPath = implode('<span> » </span>', $CrumbsPath);

if($BackBtn){
	$BackBtn = <<<EOD
	<a href="{$BackBtn['url']}"><span class="back"></span></a>
EOD;
} else {
	$BackBtn = <<<EOD
	<span class="back"></span>
EOD;
}


$lngBar = '';
foreach (\ITTI\FW::$Languages as $lng=>$name){
	$lngBar .= <<<EOD
	<label class="ittiToggler {$lng}" data-toggle="lng_{$lng}" data-cookie='{"path":"{#BE_URL#}"}' title="{$name}">{$lng}</label>
EOD;
}


$this->AddJavaScriptDR(<<<EOD
$('body').layout({
	slidable:  true,
	maskContents : true,

	stateManagement: {
		enabled:true,
		cookie:{name:"appLayout", path: "/"}
	}
});
EOD
);

$menu = \ITTI\ob_include(__DIR__.'/../menu.php');

$SettingsButtons = '';
if(isset($_GET['cid'])){
	$SettingsButtons = <<<EOD
<a href="{#BE_URL#}cats/settings.php?cid={$_GET['cid']}" title="Page Settings"><span class="itti-icon settings"></span></a>
<a href="{#BE_URL#}translations/local.php?cid={$_GET['cid']}" title="Page Translations"><span class="itti-icon resources"></span></a>
EOD;
} else if(isset($_GET['module'])){
	$SettingsButtons = <<<EOD
<a href="{#BE_URL#}translations/global.php?module={$_GET['module']}" title="Page Translations"><span class="itti-icon resources"></span></a>
EOD;
}

$EOD = function($q){return $q;};
echo <<<EOD

<div class="ui-layout-north">
<table>
<tr>
<td class="td1">
	{$EOD(date('l, <b>j F Y</b> H:i'))}
</td>
<td class="td2">
	Kurieri1
</td>
<td class="td3">
	<a href="{#BE_URL#}logout.php" target="_top">Logout: {$EOD(\ITTI\FW::$User->getUsername())}</a>

</td>
</tr>
</table>


</div>

<div class="ui-layout-west">
	<div class="ittiCMSLogo">
	<a href="http://studioitti.com/" target="_blank" title="Vision of Studio IttI">LISO v{$EOD(\ITTI\FW::Version)}<img src="{#BE_URL#}css/i/itti.png" style="margin-left:5px;" /></a>
	</div>
	<div >
		{$menu}
	</div>

</div>

<div class="ui-layout-center">

<form method="post" enctype="multipart/form-data" novalidate="">

<div class="PageTitle" style="margin-bottom:35px;">
	<div class="crumbs">{$CrumbsPath}</div>

	<div class="ittiLngBar">
	{$lngBar}
	{$SettingsButtons}
	</div>
</div>
<div style="height:35px;"></div>
<div class="ittiMainBody">
{$this->BodyHTML}
</div>

</form>
</div>

EOD;
