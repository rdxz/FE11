<?php
require_once('db.php');

$sql= "select * from message order by id desc";
$arr = [];

foreach ($dbh->query($sql) as $key => $value) {
  # code...
  $value['created_time'] = date("Y年m月d日 H:i:s",$value['created_time']);
  $arr[$key]  = $value;
}

$msg = ['status' => 1, 'data' => ''];


if ($arr) {
  $msg['data']  = $arr;
  echo json_encode($msg);
}else { 
  $msg['data'] = '数据库查询失败';
  $msg['status'] = 0;
  echo json_encode($msg);
}