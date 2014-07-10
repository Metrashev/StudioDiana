<?php
use ITTI\FW;


class FC {

	function run(){

		if(empty($_GET['MODULE'])){
			$_GET['MODULE'] = '';
			throw new Exception('No Module Provided!');
		}

		$ModuleFile = realpath(__DIR__.'/..'.$_GET['MODULE']);
		unset($_GET['MODULE']);
		if(strpos($ModuleFile, __DIR__)!==0){
			throw new Exception('Try to hack. Module File Not In Document Root! '.$ModuleFile);
		}

		$ModuleFile = substr($ModuleFile, strlen(__DIR__));


		if(!FW::$User->isLoged() && $ModuleFile != '/login.php'){
			header('location: /be/login.php');
			exit();
		}



		$Tree = getdb()->getAssoc("SELECT id, pid, name, template_id FROM cats ORDER BY ord");
		$Tree = \ITTI\TreeNode::buildTreeStructure($Tree, 'id', 'pid');

		$Optins = array(0=>'Root');
		foreach ($Tree->getAllChilds() as $row){
			$Optins[$row['id']] = str_repeat('  ', $row->getLevel())."{$row['name']}";
		}
		$GLOBALS['CATS_OPTIONS'] = $Optins;
		$GLOBALS['CATS_ROOT'] = $Tree;


		FW::$HTMLPage->setBodyHTML(\ITTI\ob_include('.'.$ModuleFile));


		echo FW::$HTMLPage->Render();
	}

}


require_once('../lib/lib.php');
require_once('./common.php');
session_start();
$START_TIME = microtime(true);

\ITTI\CallManager::$AboutBlankURL = BE_URL;

FW::$User = new \ITTI\Users\Users('users', $_SESSION['BEUser']);

$HTML = FW::$HTMLPage;
$HTML->Translation['{#BE_URL#}'] = BE_URL;
$HTML->SkinFile = './Skins/BESkin.tpl';

$HTML->addPageTitle('Back End');

$HTML->AddJSFile(JS_URL.'lib.js');
$HTML->AddJSFile(BE_URL.'be.js');
$HTML->AddCSSFile(BE_URL.'css/lib.css');


$FC = new FC();
$FC->run();


//echo '<div style="position:absolute; top:0px; background:#FFFFFF; width:100px;">ttp:'.((microtime(true)-$START_TIME)*1000).'</div>';





