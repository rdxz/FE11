<?php
require_once('db.php');

// $name = 'stark';
// $email = 'wsd312@163.com';
// $password = '123456';
// $password = md5($password);

$post = $_POST;
$name = $post['name'];
$email =  $post['email'];;
$password =  $post['password'];;
$password = md5($password);

$sql = "insert into user (name,email,password) values ('{$name}','{$email}','{$password}')";

$result = $dbh->exec($sql);

// print_r($result );

if ($result) {
  $res = [
    'status' => 200,
    'data' => 'sign success',
  ];
  echo  json_encode($res);
}

