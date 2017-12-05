<?php
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=fe11', $user, $pass);
// print_r($dbh);

// $sql = "select * from user";

// $select = $dbh->query($sql);

// foreach ($select as  $row) {
//   # code...
//   echo "<pre>";
//   print_r($row);
// }

// INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES (NULL, 'stark', 'wsd312@163.com', '123456');


// CREATE TABLE `fe11`.`user` ( `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'id' , `name` VARCHAR(255) NOT NULL COMMENT '姓名' , `email` VARCHAR(255) NOT NULL COMMENT '邮箱' , `password` VARCHAR(255) NOT NULL COMMENT '密码' , PRIMARY KEY (`id`)) ENGINE = InnoDB;