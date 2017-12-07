<?php
  require_once('Curl.php');
  $code = $_GET['code'];
  $appid = "wx43953f2495f6d1cc";
  $secret = "6f9962be39cf55d8c85fd0ae4ea0b4e7";
  $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$secret}&code={$code}&grant_type=authorization_code";
  echo "<pre>";
  $data = Curl::CurlGet($url);
  $data = (array)json_decode($data);
  $access_token = $data['access_token'];
  $openid = $data['openid'];
  $userurl = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN"; 
  $userdata = Curl::CurlGet($userurl);
  $userdata = (array)json_decode($userdata);
  var_dump($userdata);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  我是 act 页面
</body>
</html>

