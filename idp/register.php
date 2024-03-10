<?php
require_once('../config.php');
require_once('../functions.php');


?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width,initial-scale=1">
<html>
  <head>
    <meta charset="UTF-8" />
    <title>登録</title>
  </head>
  <body style="background-color: #ffd580;">
    <div>IDPに登録します</div>
	<hr>
	<form action="register_done.php">
	  <div>
	    <label for="user_name">ユーザー名: </label>
	    <input type="text" id="user_name" name="user_name" />
	  </div>
	  <div>
	    <button>登録</button>
	  </div>
	</form>
	<hr>
    <div>
        <a href="<?=h( RP_HOST )?>/saa/rp/index.php">RPサイトへ戻ります</a>
    </div>

  </body>
</html>
