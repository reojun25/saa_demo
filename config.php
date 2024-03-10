<?php

define('IDP_HOST', 'https://idp-hoge.net');
define('RP_HOST',  'https://rp-foo.com');

session_set_cookie_params(
    60*60*24*30,           // 30日
    '/; SameSite=None',    //
    "",                    // domain
    true,                  // secure
    false                  // httponly
);
session_start();

?>
