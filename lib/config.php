<?php


use ITTI\FE\Modules;
if (!defined('HTTP_HOSTNAME')) {
	if(isset($_SERVER['HTTP_X_FORWARDED_HOST'])) $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
	if (!isset($_SERVER['HTTP_HOST'])) {
		echo "I need a host name!";
		exit(1);
	}

	define('HTTP_HOSTNAME', preg_replace('/^www\./i','',$_SERVER['HTTP_HOST']));
}

$ConfigFiles = array(
	'za0vreme-tpl.itti.bg'=>'config-debug.php',
);

if (!isset($ConfigFiles[HTTP_HOSTNAME])) {
	echo "HTTP_HOSTNAME=".HTTP_HOSTNAME." is not one of the defined hostnames";
	exit(1);
}



define('LNG_BG','bg');
define('LNG_EN','en');
define('LNG_DE','de');
define('LNG_RU','ru');
define('LNG_FR','fr');
define('LNG_RO','ro');
define('LNG_RS','rs');

\ITTI\FW::$Languages = array(
	LNG_BG => 'Български',
	LNG_EN => 'English',
);


define('LNG_DEFAULT', key(\ITTI\FW::$Languages));
//define('LNG_CURRENT', LNG_DEFAULT);

define('CSS_URL', "/css/");
define('JS_URL', "/js/");
define('ITTI_JS_URL', "/itti/js/");
define('BE_URL', '/be/');

define('DATE_FORMAT', 'd.m.Y');
define('TIME_FORMAT', 'H:i');
define('DATETIME_FORMAT', DATE_FORMAT.' '.TIME_FORMAT);


define('HOME_LAYOUT_1', 1);
define('HOME_LAYOUT_2', 2);
define('HOME_LAYOUT_3', 3);


$GLOBALS['MODULES']=array(
		'MainSkin'=>array(

				'name'=>'Main Skin',
				'FERenderer'=>'templates/Core/MainSkin.php',
				'type'=>Modules::SKIN,
				'SocialLinks' => array(
					//'facebook'    => '',
					//'pinterest'   => '',
					//'linkedin'    => '',
					//'instagram'   => '',
					//'googleplus'  => '',
					//'twitter'     => '',
				),
		),

		'PrintSkin'=>array(
				'name'=>'Print Skin',
				'FERenderer'=>'templates/Core/PrintSkin.php',
				'type'=>Modules::SKIN,
		),
		'HomePage'=>array(
				'name'=>'Home Page',
				'FERenderer'=>'templates/HomePage/index.php',
				'CatsEditor'=>'home.php',
				'Layouts'=>array(
					HOME_LAYOUT_1 => 'horizontal - 2 texts, 3 images',
					HOME_LAYOUT_2 => 'horizontal - 3 images, 2 texts',
					HOME_LAYOUT_3 => 'vertical - 2 texts, 3 images',
				),
				'BEEditor'=>'home_pages/',
				'type'=>Modules::PAGE,
		),
		'Contacts'=>array(
				'name'=>'Contacts',
				'FERenderer'=>'templates/Core/Contacts.php',
				'CatsEditor'=>'contacts.php',
				'BEEditor'=>'pages/',
				'type'=>Modules::PAGE,
		),
		'StaticPage'=>array(
				'name'=>'Static Page',
				'FERenderer'=>'templates/Core/StaticPage.php',
				'BEEditor'=>'pages/',
				'type'=>Modules::PAGE,
		),
		'NewsPage'=>array(
				'name'=>'News Page',
				'FERenderer'=>'templates/Core/NewsPage.php',
				'CatsEditor'=>'news.php',
				'BEEditor'=>'news/',
				'type'=>Modules::PAGE,
				'URLs'=>true,
		),
		'Redirection'=>array(
				'name'=>'Redirection',
				'FERenderer'=>'templates/Core/Redirection.php',
				'CatsEditor'=>'redirect.php',
				'type'=>Modules::PAGE,
		),

		'PageBar'=>array(
				'name'=>'Bage Bar',
				'FERenderer'=>'templates/Core/PageBar.php',
				'type'=>Modules::HELPER
		),

		'Polls'=>array(
				'name'=>'Polls',
				'type'=>Modules::WIGET,
				'BEEditor'=>'polls/',
				'POLL_POSITIONS' => array(
						1=>'Context',
				),
		),
		'Adverts'=>array(
				'name'=>'Adverts',
				'type'=>Modules::WIGET,
				'BEEditor'=>'adverts/',
				'FERenderer'=>'templates/Core/Adverts.php',
				'ADVERT_POSITIONS'=>array(
					1=>'HP Carousel',
					2=>'Home page left',
					3=>'Home page right',
					4=>'Right box 2',
					5=>'Home page slider',
					6=>'Context nav',
				),
				'ADVERT_TYPES'=>array(
					1=>"Image",
					2=>"Flash",
					3=>"Text",
					4=>"Carousel",
				),
				'ADVERT_POSITION_SIZE' => array(
					1=>array('width'=>660, 'height'=>200),
					2=>array('width'=>330, 'height'=>120),
					3=>array('width'=>330, 'height'=>120),
					4=>array('width'=>300, 'height'=>220),
					5=>array('width'=>580, 'height'=>280),
					6=>array('width'=>300, 'height'=>170),
				),
		),

);


$GLOBALS['CATS_TAGS'] = array(
	'TopNav'=>'Top Nav',
	'FooterNav'=>'Footer Nav',
);


$FEConfig = \ITTI\FE\Config::getDefault();

$FEConfig->Modules->addModulesAsArray($GLOBALS['MODULES']);


$FEConfig->Languages = array(
	LNG_BG=>'//za0vreme-tpl.itti.bg/',
	LNG_EN=>'//za0vreme-tpl.itti.bg/en/',
);




require_once(__DIR__.'/'.$ConfigFiles[HTTP_HOSTNAME]);

