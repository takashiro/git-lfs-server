<?php

if(!defined('IN_GITLFS')) exit('access denied');

$input = file_get_contents('php://input');
if($input){
	$input = json_decode($input, true);
}else{
	$input = array();
}

$ours = array();
$theirs = array();
$next_cursor = '';

$response = array(
	"ours" => $ours,
	"theirs" => $theirs,
	"next_cursor" => $next_cursor,
);

echo json_encode($response);
