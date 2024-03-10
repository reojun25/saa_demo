<?php
require_once('../config.php');
require_once('../functions.php');

header('Access-Control-Allow-Origin: '.IDP_HOST);

header('Cache-Control: no-store, no-cache, must-revalidate' );
header('Cache-Control: post-check=0, pre-check=0', FALSE );
header('Pragma:no-cache');
header('Content-Type: application/json;');


if (isset($_COOKIE['PHPSESSID']) && isset($_SESSION['user_name'])) {
	# session_id の妥当性は省きます
	# 本来ならばsession_id のDBの存在チェック、有効期限のチェックを行うべきです

	# session_idが妥当なら、Partitioned属性をつけてSet-Cookie
	set_cookie_partitioned("PHPSESSID", $_COOKIE['PHPSESSID'], 1);
	$ret = ["is_logined" => 1 ];
	$json_str =  json_encode($ret, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
	echo $json_str;
} else {
	$ret = ["is_logined" => 0 ];
	$json_str =  json_encode($ret, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
	echo $json_str;
}

?>
