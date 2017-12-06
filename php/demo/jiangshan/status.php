<?php

require_once('db.php');
$post = $_POST;
$status = $post['status'];
// $name = $post['name'];
$name = $_SESSION['name'];

$sql = "update user set status = {$status} where name = '{$name}'";

$dbh->exec($sql);
$_SESSION['status'] = $status;

header('Location:index.php');