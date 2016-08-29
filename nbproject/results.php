<?php
header('Content-Type: text/html; charset=utf-8'); 
session_start();
error_reporting(0);

include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	

if($_POST['ch']<>'') {$_SESSION['ch'] = $_POST['ch']; }
  $chetvert = $_SESSION['ch'];

  
$admin = $_SESSION['adm']; 

$klass = $_SESSION['username'];

if(($klass == "Александр") OR ($klass == "Сабина")){
 $admin = 1;
}
    

  
if($chetvert =='1'){
    $ch_table='marks_1';
}
elseif($chetvert =='2'){
    $ch_table='marks_2';
}
elseif($chetvert =='3'){
    $ch_table='marks_3';
}
elseif($chetvert =='4'){
    $ch_table='marks_4';
}  
                     
require  'SELECT.php';                                             
?>

<html><a name="anchor0"></a><br/>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/css/bootstrap.css">
        <link rel="stylesheet" href="css/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="css/floating_menu/style.css">
        <link rel="stylesheet" href="css/floating_menu/reset.css">
         
        
        
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.menu.result.js"></script>
        
        <script type="text/javascript" src="js/scrollup.js"></script> 
        <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
         <title>Результаты рейтинга</title>
    </head>
    <body>
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="width: 20%;"><img src="images/img4.png" alt="ГБОУ школа №109" /></td>
                    <td style="width:60%;  padding-bottom: 20px;"  >
                        <h1  style=" text-align: center;  " >Итоги рейтинга учащихся ГБОУ «Школа № 109»</h1>
                        <br/>
                        <!--////////////////////////////////////НАВИГАЦИЯ ////////////////////////////////////////////////-->
                            <nav role="navigation" class="navbar navbar-default navbar-static-top">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a href="#" class="navbar-brand">
                                        <?php echo $klass ?>
                                    </a>
                                </div>
                                <!-- Collection of nav links and other content for toggling -->
                                <div id="navbarCollapse" class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <a href="index.php">Главная</a>
                                        </li>
                                        <li>
                                            <a href="download_marks.php">Рейтинг "Оценки"</a>
                                        </li>
                                        <li>
                                            <a href="download_sash.php">Рейтинг "САШ"</a>
                                        </li>
                                        <li>
                                            <a href="results.php">Итоги рейтинга</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                    </td>
                    <td style="width: 20%;"></td>
                </tr>
                <br/>
                <tr>
                    <td>        
                    </td>
                    <td>
                        <div id="menu" >
                            <ul id="menu" >
                                <li name="ch1">
                                    <form method="POST" name="ch" >
                                        <button type="submit" class="btn btn-default"  VALUE="1"  name="ch"  >Первая четверть</button>
                                    </form>
                                </li>
                                <li name="ch2"><form method="POST" name="ch" >
                                        <button type="submit" class="btn btn-default"  VALUE="2"  name="ch"  >Вторая четверть</button>
                                    </form>
                                </li>
                                <li name="ch3"><form method="POST" name="ch" >
                                        <button type="submit" class="btn btn-default"  VALUE="3"  name="ch"  >Третья четверть</button>
                                    </form>
                                </li>
                                <li name="ch4"><form method="POST" name="ch" >
                                        <button type="submit" class="btn btn-default"  VALUE="4"  name="ch"  >Четвертая четверть</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr> 
                    <!--///////////////////////////////////Левая колонка/////////////////////////////////////////-->
                    <td>
                    </td>
                    <!--///////////////////////////////////Центральная колонка/////////////////////////////////////////-->
                    <td  style="width:60%; "  > 
                        <div class="container">
                            <div class="row">
                                <br/>
                                <table class="table_col col-lg-16" >
                                  <colgroup>
                                      <col style="background:#C7DAF0;">
                                  </colgroup>
                                  <tr >
                                    <th class="zagolovok"   colspan="3" >Победители рейтинга из общеобразовательных классов</th>
                                  </tr>
                                  <tr>
                                    <th style="color:#af1b1b;" >Ф.И.О.</th>
                                    <th style="color:#af1b1b;">Класс</th>
                                    <th style="color:#af1b1b;">Рейтинг</th>
                                  </tr>
                                  
                                      <?php
                                  while ($row1 = mysql_fetch_array($result1)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row1['name'];?></td>
                                    <td><?php echo $row1['klass'];?></td>
                                    <td><?php echo $row1['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php }
                                  
                                  
                                  while ($row6 = mysql_fetch_array($result6)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row6['name'];?></td>
                                    <td><?php echo $row6['klass'];?></td>
                                    <td><?php echo $row6['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php }  
                                  
                                  while ($row12 = mysql_fetch_array($result12)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row12['name'];?></td>
                                    <td><?php echo $row12['klass'];?></td>
                                    <td><?php echo $row12['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php } 
                                  
                                  while ($row17 = mysql_fetch_array($result17)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row17['name'];?></td>
                                    <td><?php echo $row17['klass'];?></td>
                                    <td><?php echo $row17['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php } 
                                  
                                  while ($row21 = mysql_fetch_array($result21)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row21['name'];?></td>
                                    <td><?php echo $row21['klass'];?></td>
                                    <td><?php echo $row21['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php } 
                                  
                                  while ($row27 = mysql_fetch_array($result27)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row27['name'];?></td>
                                    <td><?php echo $row27['klass'];?></td>
                                    <td><?php echo $row27['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php } ?>
                                  
                                </table>
                                
                                <table class="table_col col-lg-16" >
                                  <colgroup>
                                      <col style="background:#C7DAF0;">
                                  </colgroup>
                                  <tr >
                                    <th class="zagolovok"   colspan="3" >Победители рейтинга из лицейских классов</th>
                                  </tr>
                                  <tr>
                                    <th style="color:#af1b1b;" >Ф.И.О.</th>
                                    <th style="color:#af1b1b;">Класс</th>
                                    <th style="color:#af1b1b;">Рейтинг</th>
                                  </tr>
                                  
                                  
                                  
                                      
                                      <?php
                                 while ($row3 = mysql_fetch_array($result3)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row3['name'];?></td>
                                    <td><?php echo $row3['klass'];?></td>
                                    <td><?php echo $row3['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php }
                                  
                                  while ($row8 = mysql_fetch_array($result8)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row8['name'];?></td>
                                    <td><?php echo $row8['klass'];?></td>
                                    <td><?php echo $row8['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php }  
                                  
                                  while ($row14 = mysql_fetch_array($result14)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row14['name'];?></td>
                                    <td><?php echo $row14['klass'];?></td>
                                    <td><?php echo $row14['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php } 
                                  
                                  while ($row19 = mysql_fetch_array($result19)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row19['name'];?></td>
                                    <td><?php echo $row19['klass'];?></td>
                                    <td><?php echo $row19['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php } 
                                  
                                  while ($row23 = mysql_fetch_array($result23)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row23['name'];?></td>
                                    <td><?php echo $row23['klass'];?></td>
                                    <td><?php echo $row23['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php } 
                                  
                                  while ($row25 = mysql_fetch_array($result25)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row25['name'];?></td>
                                    <td><?php echo $row25['klass'];?></td>
                                    <td><?php echo $row25['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php } ?>
                                  
                                </table>
                                
                                
                                
                            </div>    
                        </div>    
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width:60%;"></td>
                    <td></td>
                </tr>
            </tbody>    
        </table>
        
    </body>
</html>
