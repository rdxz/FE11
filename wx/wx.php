<?php
require_once('api/ZhiHuDaily.php');
function checkSignature()
{

// 1）将token、timestamp、nonce三个参数进行字典序排序

// 2）将三个参数字符串拼接成一个字符串进行sha1加密

// 3）开发者获得加密后的字符串可与signature对比，标识该请求来源于微信
  $signature =   $_GET["signature"];
  $timestamp =   $_GET["timestamp"];
  $nonce =  $_GET["nonce"];
  $token = 'stark';
  $tmpArr = array($token,$timestamp, $nonce);
  sort($tmpArr, SORT_STRING);
  $tmpStr = implode( $tmpArr );
  $tmpStr = sha1( $tmpStr );

  if( $signature == $tmpStr ){
      echo $_GET['echostr'];
      return true;
    
  }else{
      echo 'faild';
      return false;

  }

}

checkSignature();

// 当我们向测试号发送信息的时候，就是微信像这个接口发送一个post请求

// $postStr = file_get_contents('php://input');
$postStr = $GLOBALS['HTTP_RAW_POST_DATA'];

$xml = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);

if (empty($postStr)) {
    file_put_contents('wx.log','post数据为空'.FILE_APPEND."\n",FILE_APPEND);
}
file_put_contents('wx.log',$xml->Content."\n\n",FILE_APPEND);


// 当用户回复一些信息的时候，我们需要向用户回复一些特定的内容

function replyMsg($content){
    global $xml;
    $str = sprintf('<xml>
 <ToUserName><![CDATA[%s]]></ToUserName>
 <FromUserName><![CDATA[%s]]></FromUserName>
 <CreateTime>%d</CreateTime>
 <MsgType><![CDATA[text]]></MsgType>
 <Content><![CDATA[%s]]></Content>
 <MsgId>1234567890123456</MsgId>
 </xml>',$xml->FromUserName,$xml->ToUserName,time(),$content);
 file_put_contents('wx.log',$str."\n\n",FILE_APPEND);
 echo $str;
} 


// if (!empty($xml->Content)) {
//     replyMsg('hi 你想干嘛？');
// }

function replyArticle($data){
    global $xml;
    $article = '<ArticleCount>'.count($data).'</ArticleCount>';
    $article .= '<Articles>';
    foreach ($data as $value) {
       $article .= sprintf('<item><Title><![CDATA[%s]]></Title>',$value['title']);
       $article .= sprintf('<Description><![CDATA[%s]]></Description>',$value['desc']);
       $article .= sprintf('<PicUrl><![CDATA[%s]]></PicUrl>',$value['picurl']);
       $article .= sprintf('<Url><![CDATA[%s]]></Url></item>',$value['url']);
    }
    $article .= '</Articles>';

    $str = sprintf('<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%d</CreateTime>
<MsgType><![CDATA[news]]></MsgType>%s</xml>',$xml->FromUserName,$xml->ToUserName,time(),$article);
file_put_contents('wx.log',$str."\n\n",FILE_APPEND);
echo $str;
}


// 测试图文消息

// if (!empty($xml->Content)) {
//     $data = [
//         [
//         'title' => '安琪拉',
//         'url' => 'http://stark.wang',
//         'picurl' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513221767&di=112afbccd30f26c20392a7dfff06926a&imgtype=jpg&er=1&src=http%3A%2F%2Fqtimg.bdstatic.com%2Fhiapk%2Fgame%2F201707%2F04%2F595af6d2285d9.jpg',
//         'desc' => 'hi 安琪拉！！！'
//         ],
//         [
//         'title' => '李白，今朝有酒今朝醉',
//         'url' => 'http://stark.wang',
//         'picurl' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1512627415601&di=a48be9abc9661620472cf49c9388f221&imgtype=0&src=http%3A%2F%2Fi1.17173cdn.com%2F2fhnvk%2FYWxqaGBf%2Fcms3%2FXivJLTbldqzvDcv.jpg',
//         'desc' => '今朝有酒今朝醉，李白就是一个诗人'
//         ],
//         [
//         'title' => '钟馗',
//         'url' => 'http://stark.wang',
//         'picurl' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513222223&di=40ac217b31655f2dee782c8be7c67aa4&imgtype=jpg&er=1&src=http%3A%2F%2Fzhidao.3533.com%2Fuploads%2Fanswer%2F20160324%2F34c6cc35fe42f302e4c96b9984f55c5e.jpg',
//         'desc' => '哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈'
//         ],
// ];
    
    // replyArticle($data);
// }

if ($xml->Content == '知乎日报') {
    $res = Daily::GetDail();
    $data = [];
    foreach ($res as $key => $value) {
        $data[] = [
            'title' => $value['title'],
            'url' => 'http://stark.wang',
            'picurl' => $value['images'][0],
            'desc' => $value['title']
        ];
    }
    replyArticle(array_slice($data,1,8));
}

// <xml>

// <ToUserName><![CDATA[toUser]]></ToUserName>
// <FromUserName><![CDATA[fromUser]]></FromUserName>
// <CreateTime>12345678</CreateTime>
// <MsgType><![CDATA[news]]></MsgType>

// <ArticleCount>2</ArticleCount>

// <Articles>

// <item>
// <Title><![CDATA[title1]]></Title> 
// <Description><![CDATA[description1]]></Description>
// <PicUrl><![CDATA[picurl]]></PicUrl>
// <Url><![CDATA[url]]></Url>
// </item>

// <item>
// <Title><![CDATA[title]]></Title>
// <Description><![CDATA[description]]></Description>
// <PicUrl><![CDATA[picurl]]></PicUrl>
// <Url><![CDATA[url]]></Url>
// </item>

// </Articles>

// </xml>