<?php
require_once('db.php');


$post = $_POST;
$name = $_SESSION['name'];
$title = $post['title'];
$comments = $post['comments'];
$time = time();

$add_comment = "insert into comments (name,title,comments,time) values ('{$name}','{$title}','{$comments}','{$time}')";


$res = $dbh->exec($add_comment);


if ($res) {
  $res = [
    'status' => 200,
    'data' => '评论发表成功'
  ];
  header('Location:index.php');
  echo  json_encode($res);
}