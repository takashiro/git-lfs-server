<?php

require_once 'data/config.inc.php';

$api = $_SERVER['REQUEST_URI'];
$key = null;
if(substr_compare($api, '/auth', 0, 5) == 0){
	$i = strpos($api, '/', 7);
	if($i >= 7){
		$key = substr($api, 6, $i - 6);
		$api = substr($api, $key);
	}
}

if(isset($_SERVER['HTTP_ACCEPT'])){
	header('Content-Type: '.$_SERVER['HTTP_ACCEPT']);
}

$input = file_get_contents('php://input');
if($input){
	$input = json_decode($input, true);
}else{
	$input = array();
}

switch($api){
case '/locks':
	include 'api/locks.inc.php';
	break;
}
