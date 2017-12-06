<?php
require_once('db.php');
// print_r($_POST);
// die;
$title = $_POST['title'];
$content = $_POST['content'];
$created_time = time();
$status = 10;
// $user_id = $_SESSION['user_id'];
$username = $_SESSION['name'];

// $user_id = $_POST['user_id'];
// $username = $_POST['username'];
$sql = "
        insert into message (
          username,
          title,
          content,
          created_time,
          status
        ) values(
          
          '{$username}',
          '{$title}',
          '{$content}',
          '{$created_time}',
          '{$status}'
        )
";

$result = $dbh->exec($sql);

$sql= "select * from message order by id desc limit 1";
$arr = [];

foreach ($dbh->query($sql) as $key => $value) {
  # code...
  $value['created_time'] = date("Y年m月d日 H:i:s",$value['created_time']);
  $arr  = $value;
}

$msg = ['status' => 1, 'data' => ''];


if ($result) {
  $msg['data']  = $arr;
  echo json_encode($msg);
}else { 
  $msg['data'] = '数据库存储失败';
  $msg['status'] = 0;
  echo json_encode($msg);
}