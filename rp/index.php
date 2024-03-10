<?php
require_once('../config.php');
require_once('../functions.php');

?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width,initial-scale=1">
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Storage Access API demo</title>
  </head>
  <body style="background-color: #E0FFFF;">
    <div>Storage Access API demo</div>
    <div>このページはRPのサイトです。IDPのコンテンツをiframeで埋め込んであります。</div>
    <ul>
      <li><a href="<?=h( IDP_HOST )?>/saa/idp/register.php">IDPサイトで登録</a></li>
    </ul>
    <div>
        <iframe src="<?=h( IDP_HOST )?>/saa/idp/iframe.php" width="100%" height="300">
        </iframe>
    </div>
  </body>
</html>
