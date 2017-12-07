<?php
require_once('Curl.php');

class Daily
{
  public static function GetDail()
  {
    
    $url = "http://news-at.zhihu.com/api/4/news/latest";
    $data = Curl::CurlGet($url);
    $data = json_decode($data);
    $data = self::ObjectArray($data);
    // print_r($data);
    return $data['stories'];
  }

  public static function ObjectArray($array)
  {
    if(is_object($array)){
      $array = (array)$array;
    }

    if(is_array($array)){
      foreach ($array as $key => $value) {
          $array[$key] = self::ObjectArray($value);
      }
    }
     return $array;
  }
}

echo '<pre>';
$data = Daily::GetDail();
print_r($data);