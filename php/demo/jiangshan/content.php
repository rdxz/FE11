<?php
require_once('db.php');
$post = $_POST;
$title = $post['title'];
$content = $post['content'];
$username = $_SESSION['name'];
$status = $_SESSION['status'];
$sql = "insert into message (username,title,content,status) values ('{$username}','{$title}','{$content}','{$status}')";

// print_r($sql);
$result = $dbh->exec($sql);

print_r($result );

if ($result) {
  $res = [
    'status' => 200,
    'data' => 'sign success',
  ];
  echo  json_encode($res);
  header('Location:index.php');
}