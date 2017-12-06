<?php
use yii\helpers\Html;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  
  我的名字是 <?= $name ?><br>

  <div style="color:red;">
    我的名字是 <?php echo $name ?><br>
  </div>
  

  <br>
    <?= $message ?>
</body>
</html>