<?php 
header('Content-Type: text/html; charset=utf-8'); 
session_start();
set_time_limit(0);



$admin = $_SESSION['adm'];
if($admin <> 1){
    header('location:../index.php') ;
}
?>

<html>
  <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/css.css">
        <link rel="stylesheet" href="../css/css/bootstrap-theme.css">
        <link rel="stylesheet" href="../css/css/bootstrap.css">
        
        <script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/jquery.menu.js"></script>
        
        <script type="text/javascript" src="../js/scrollup.js"></script> 
        <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
  </head>
  <body class="background">
      <div class="container-fluid">
          <div class="col-lg-10 col-lg-offset-3" style="color:#fff; margin-top: 15%;text-align: center; " >
              <h1 style="line-height: 80px;">Страница временно недоступна!<br/> Списки классов можно обновлять только <span style="color:red;">с июля!</span>
                  <small><br/>Если Вам срочно нужен доступ обратитесь к главному администратору. (sasizvekv@yandex.ru)</small></h1>
              <span style="font-size: 56px;">Страница откроется <span style="color:#e7ab45;"><?php echo date("01:06:Y") ?></span></span>
              <br/>
              <button style="" class="btn btn-info btn-lg" onclick="location.href='../index.php'" >Вернуться на главную</button>
          </div>
      </div>
  </body>
</html>