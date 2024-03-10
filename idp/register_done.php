<?php
require_once('../config.php');
require_once('../functions.php');

$_SESSION['user_name'] = $_REQUEST['user_name'];

?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width,initial-scale=1">
<html>
  <head>
    <meta charset="UTF-8" />
    <title>登録完了</title>
  </head>
  <body style="background-color: #ffd580;">
    <div>登録完了</div>
    <div>ユーザ名 : <?=h( $_SESSION['user_name'] )?></div>
	<hr>
    <div>
        <a href="<?=h( RP_HOST )?>/saa/rp/index.php">RPサイトへ戻ります</a>
    </div>
    <div>
        <a href="<?=h( IDP_HOST )?>/saa/idp/register.php">IDPの登録へ戻ります</a>
    </div>
  </body>
</html>
