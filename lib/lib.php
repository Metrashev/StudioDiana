<?php
use ITTI\FW;
use ITTI\HTMLPage;

header('Content-Type: text/html; charset=utf-8');

require_once(__DIR__.'/../itti/php/itti.php');
\ITTI\HTTPRequest::strip();

require_once(__DIR__.'/config.php');




error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('UTC');
mb_internal_encoding('UTF-8');



//require_once(__DIR__.'/../itti/php/DBForms/DBTable.php');

/**
 *
 * @return \ITTI\DB\DBMySQLi
 */
function getdb() {
	static $db;

	if (is_null($db)) {
		$db = \ITTI\DB\DBMySQLi::getInstanceByDSN(MySQL_DSN);
		$db->Execute("set names UTF8");
	}
	return $db;
}


\ITTI\ErrorsManager::catchErrors();
if(!DEBUG_MODE) \ITTI\ErrorsManager::$email = ERRORS_EMAIL;



FW::$ManagedFilesDir = realpath(__DIR__.'/../files/mf/').'/';
FW::$ManagedFilesUrl = '/files/';
FW::$JSURL = ITTI_JS_URL;

FW::$db = getdb();
FW::$HTMLPage = new HTMLPage();

