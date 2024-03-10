<?php
require_once('../config.php');
require_once('../functions.php');

header('Access-Control-Allow-Origin: ',IDP_HOST);

foreach($_COOKIE as $key => $val) {
	print ($key.'='.$val);
	print ("\n");
}

?>
