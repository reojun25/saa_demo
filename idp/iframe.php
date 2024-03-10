<?php
require_once('../config.php');
require_once('../functions.php');

$user_name = $_SESSION['user_name'] ?: 'ゲスト';

?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width,initial-scale=1">
<html>
  <head>
    <meta charset="UTF-8" />
    <title><?=h( __FILE__ )?></title>
  </head>
  <body style="background-color: #ffd580;">
    <div>このページはIDPのサイトです。</div>
    <div><?=h($user_name)?> さん、こんにちは</div>
	<br>
    <div><button onclick="callRequestStorageAccess()">requestStorageAccess()をcall</button></div>
    <div><button onclick="getCookieByXMLHttpRequest()">XMLHttpRequestでCookieを確認する</button></div>
    <div><button onclick="loginWithXhr()">XMLHttpRequestでログインする</button></div>
	<br>
    <div>$_COOKIE:<pre><?=h(print_r($_COOKIE, true), ENT_QUOTES)?></pre></div>
    <div id="IDP_HOST" style="display:none;"><?=h(IDP_HOST)?></div>
    <script>
        window.onload = function() {
            console.log("Cookie when loading:" + document.cookie);

            var promise = document.hasStorageAccess();
            promise.then(
                function (hasAccess) {
                    // Boolean hasAccess says whether the document has access or not.
                    console.log("hasStorageAccess when loading:" + hasAccess);
                }
            );
        }

        function callRequestStorageAccess() {
            var promise = document.requestStorageAccess();
            promise.then(
                function () {
                    console.log("Storage access was granted");
                },
                function () {
                    console.log("Storage access was denied");
                }
            );
        }


        function getCookieByXMLHttpRequest() {
        	var element = document.getElementById("IDP_HOST");
        	var idpHost = element.innerText;
			var xhr = new XMLHttpRequest();
			xhr.open('GET', idpHost + '/saa/idp/get_cookie.php');
			xhr.onload = function () {
			  console.log("get_cookie.php response");
			  console.log(xhr.response);
			};
			xhr.send();
        }

        function requestXhr() {
        	var element = document.getElementById("IDP_HOST");
        	var idpHost = element.innerText;

			var response;
			var xhr = new XMLHttpRequest();
			xhr.open('GET', idpHost + '/saa/idp/login_with_xhr.php', false);
			xhr.send(null);
			if (xhr.status == 200){
				let data = xhr.responseText;
				return data;
			} else {
				return false;
			}
        }

        async function loginWithXhr() {
        	var element = document.getElementById("IDP_HOST");
        	var idpHost = element.innerText;
			var idp_iframe_url = idpHost + "/saa/idp/iframe.php";

            var promise = document.requestStorageAccess();
            promise.then(
                function () {
                    console.log("Storage access was granted");
                    let ret = JSON.parse(requestXhr());
					if (ret.is_logined == 1 ){
						// xhr でset cookieしたのでiframe内をリダイレクトさせる
						// alert("IDPサイトにログインしました。コンテンツを更新します。");
						window.location.href = idp_iframe_url;
					} else {
						alert("IDPサイトに登録されていません");
					}
                },
				// このコールバックが呼ばれるケース
                // 1. IDPに一度も訪れたことがないユーザ（履歴がない場合）の場合
                // 2. 埋め込みコンテンツを許可するポップアップを明示的に拒否した場合
                // 3. 埋め込みコンテンツを許可するポップアップを3回無視した場合
                //    １と２と３を区別したいTODO
                function () {
                    console.log("Storage access was denied");
					alert("ログインする場合はサイト別の設定＞埋め込みコンテンツを有効にしてください");
                }
            );

		}

    </script>
  </body>
</html>
