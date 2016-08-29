<?php
header('Content-Type: text/html; charset=utf-8'); 
session_start();

include("../db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);
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
          <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-10">
                  
                     
                 
                  
                  
              </div>
              <div class="col-lg-3"></div>
          </div>
      </div>
  </body>
</html>