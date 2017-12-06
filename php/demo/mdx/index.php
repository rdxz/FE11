<?php
    require_once('db.php');
    // var_dump($_SESSION);
    // die;
    if(empty($_SESSION)){
      echo '你还没有登录！';
      header('Location:login_page.php');
      return false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.bootcss.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  <head>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>




    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">留言板 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">状态</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">
          用户名：
          <?php
            echo $_SESSION['name'];
          ?>
        </a></li>

        <li><a href="#">
          状态：
          <?php
            echo $status[$_SESSION['status']];
          ?>
        </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  </head>





    留言板
<div class="container-fluid">
<div class="col-md-6">
  

  <form action="comments.php" method="post" class="form-horizontal">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="title" id="inputEmail3" placeholder="title">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">内容</label>
        <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="comments"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default"></input>
      </div>
    </div>
  </form>
</div>


</div>
<ul class="list-group">
<?php
  require_once('./db.php');

  $query = "select * from comments";
  $comments = $dbh->query($query);

  foreach ($comments as $key => $value) {
    # code...
    ?>
    <li class='list-group-item'>
    <h4><?php echo $value['title']?></h4>
    <p><?php echo $value['comments'] ?></p>
    <span><?php echo $value['name'] ?></span>
    <span><?php echo date('Y-m-d H:i:s',(int)$value['time'])?></span>
    </li>
    <?php
  }
?>
  
</ul>
  <div class="container">
    学习的状态：
      <form action="status.php" method="post">

      <div class="radio">
      <label>
        <input type="radio" name="status" id="optionsRadios1" value="1" checked>
        非常明白
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="status" id="optionsRadios2" value="2">
        比较明白
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="status" id="optionsRadios3" value="3">
        一般明白
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="status" id="optionsRadios4" value="4">
        懵逼
      </label>
    </div>
        
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
  </div>
</body>
</html>