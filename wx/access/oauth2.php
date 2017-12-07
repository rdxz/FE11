<?php
// require_once('Curl.php');
$appid = 'wx43953f2495f6d1cc';
$redirect_uri = urlencode('http://starks.ngrok.wdevelop.cn/access/act.php');
// $redirect_uri = 'http://starks.ngrok.wdevelop.cn/access/act.php';
$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$redirect_uri}&response_type=code&scope=SCOPE&state=STATE#wechat_redirect ";

// echo $url;
// die;
header('Location:{$url}');

// http://starks.ngrok.wdevelop.cn/access/index.php

https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx43953f2495f6d1cc&redirect_uri=http%3A%2F%2Fstarks.ngrok.wdevelop.cn%2Faccess%2Fact.php&response_type=code&scope=SCOPE&state=STATE#wechat_redirect 
http://starks.ngrok.wdevelop.cn/access/act.php
http://starks.ngrok.wdevelop.cn/access/%7B$url%7D

http%3A%2F%2Fstarks.ngrok.wdevelop.cn%2Faccess%2Fact.php

