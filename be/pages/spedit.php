<?php

use ITTI\CallManager;
$cid = (int)$_GET['cid'];

$id = (int)getdb()->getOne("SELECT id FROM pages WHERE cid=$cid ORDER BY id DESC LIMIT 1", array());

define('SPEDIT', 1);

CallManager::$Params['id'] = $id;
CallManager::$Params['ValuesConstrains'] = array('cid'=>$cid);

include __DIR__.'/edit.php';

