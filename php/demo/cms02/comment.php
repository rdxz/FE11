<?php
require_once('db.php');
$post = $_POST;
$title = $post['title'];
$content = $post['content'];
$name =$_SESSION['name'];
$time = time();

$insert = "insert into comment (title, content, name, time) values ('{$title}', '{$content}', '{$name}', '{$time}')";

$result = $dbh->query($insert);

if ($result) {
  echo "insert success";

  header('Location:index.php');
}
