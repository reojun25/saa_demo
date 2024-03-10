<?php
// HTMLエスケープ用の独自関数
function h($str){
	return htmlspecialchars($str, ENT_QUOTES);
}

function set_cookie_partitioned($key, $val, $httponly=0) {
	$expire_time = time() + 86400;
	$expire_str = date("D, d-M-Y H:i:s e",$expire_time);
	$max_age = 86400;
	$domain_str = '';
	$httponly_str = '';
	if ($httponly) {
		$httponly_str = 'HttpOnly; ';
	}
	header('Set-Cookie: '.$key.'='.$val.'; expires='.$expire_str.'; Max-Age='.$max_age.';'.$domain_str.' Path=/; '.$httponly_str.'Secure; SameSite=None; Partitioned;', false);
}

function delete_cookie_partitioned($key) {
	$expire_time = time() - 86400;
	$expire_str = date("D, d-M-Y H:i:s e",$expire_time);
	$max_age = 86400;
	$val = '';
	header('Set-Cookie: '.$key.'='.$val.'; expires='.$expire_str.'; Max-Age='.$max_age.'; Path=/; Secure; SameSite=None; Partitioned;', false);
}


function set_cookie_non_partitioned($key, $val, $httponly=0) {

	$expire_time = time() + 86400;
	$expire_str = date("D, d-M-Y H:i:s e",$expire_time);
	$max_age = 86400;
	$domain_str = '';
	$httponly_str = '';
	if ($httponly) {
		$httponly_str = 'HttpOnly; ';
	}
	header('Set-Cookie: '.$key.'='.$val.'; expires='.$expire_str.'; Max-Age='.$max_age.';'.$domain_str.' Path=/; '.$httponly_str.'Secure; SameSite=None;', false);

}

function delete_cookie_non_partitioned($key, $val) {
	$expire_time = time() - 86400;
	$expire_str = date("D, d-M-Y H:i:s e",$expire_time);
	$max_age = 86400;
	$val = '';
	header('Set-Cookie: '.$key.'='.$val.'; expires='.$expire_str.'; Max-Age='.$max_age.'; Path=/; Secure; SameSite=None;', false);

}


