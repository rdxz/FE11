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
  <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/axios/0.17.1/axios.min.js"></script>
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
  

  <!-- <form class="form-horizontal"> -->
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
      <div class="col-sm-10">
        <input type="text"  class="form-control" id="title" placeholder="title">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">内容</label>
        <div class="col-sm-10">
      <textarea class="form-control" rows="3" id="content"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button  id="submit" type="submit" class="btn btn-default">提交留言</button>
      </div>
    </div>
  <!-- </form> -->
</div>


留言信息
<table id="msg">
  
</table>
  


</div>
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
<script>
  $('#submit').click(function(){
    var title = $('#title').val();
    var content = $('#content').val();

    // axios.post('api/create.php',{title:title,content:content}).then(function(res){
    //   console.log(res);
    // })
      $.ajax({
        method:'post',
        url:'api/create.php',
        data:{title:title,content:content},
        success:function(res) {
            // console.log(res);
            // obj = JSON

            var obj = JSON.parse(res);
            var msg = obj.data;
            // console.log(res);
            var html = 
            '<tr>\
              <td>'+ msg.id + '</td>\
              <td>'+ msg.title + '</td>\
              <td>'+ msg.content + '</td>\
              <td>'+ msg.created_time + '</td>\
            </tr>';

            $("#msg").append(html);
        }
      })
  })


  var  getMessage = function(){
    $.ajax({
      method:'get',
      url:'api/read.php',
      success:function(data){
          var obj = JSON.parse(data);
          var html = 
            '<tr>\
              <td> id </td>\
              <td> 标题 </td>\
              <td> 内容 </td>\
              <td> 时间 </td>\
            </tr>\
          ';

          $.each(obj.data,function(index,msg){
              html +=
              '<tr>\
                  <td>'+ msg.id + '</td>\
                  <td>'+ msg.title + '</td>\
                  <td>'+ msg.content + '</td>\
                  <td>'+ msg.created_time + '</td>\
              </tr>';
          })
          $("#msg").append(html);
      }
    })
  }

  getMessage();
</script>
</html>