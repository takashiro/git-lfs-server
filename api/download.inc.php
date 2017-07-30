<?php

if(!defined('IN_GITLFS')) exit('access denied');

if(empty($_GET['oid'])){
	header('HTTP/1.1 404 Not Found');
	exit;
}

$path = 'data/objects/'.$_GET['oid'];
if(file_exists($path)){
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: '.filesize($path));
	readfile($path);
}else{
	header('HTTP/1.1 404 Not Found');
}
