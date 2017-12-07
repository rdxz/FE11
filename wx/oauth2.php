<?php
$appid = 'wx43953f2495f6d1cc';
$back = urlencode('http://starks.ngrok.wdevelop.cn/act.php');
$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$back}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";

echo $url;
die;
header('Location:{$url}');