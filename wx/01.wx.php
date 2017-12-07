<?php
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