<?php
header('Content-Type: text/html; charset=utf-8'); 
session_start();



$admin = $_SESSION['adm']; 

$klass = $_SESSION['username'];

if(($klass == "Александр") OR ($klass == "Сабина")){
 $admin = 1;
}

if ($admin <> 1){
    header('Location: ../index.php');
}

include("../db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	

$submit_old = $_POST['submit_old'];
$submit_yong = $_POST['submit_yong'];

$a11 = $_POST['11a']; 
$b11 = $_POST['11b'];
$v11 = $_POST['11v']; 
$g11 = $_POST['11g'];

$a10 = $_POST['10a']; 
$b10 = $_POST['10b'];
$v10 = $_POST['10v']; 
$g10 = $_POST['10g']; 

$a9 = $_POST['9a']; 
$b9 = $_POST['9b']; 
$v9 = $_POST['9v']; 
$g9 = $_POST['9g']; 
$d9 = $_POST['9d']; 
$j9 = $_POST['9j']; 

$a8 = $_POST['8a']; 
$b8 = $_POST['8b']; 
$v8 = $_POST['8v'];
$g8 = $_POST['8g'];
$d8 = $_POST['8d'];

$a7 = $_POST['7a'];
$b7 = $_POST['7b'];
$v7 = $_POST['7v'];
$g7 = $_POST['7g'];
$d7 = $_POST['7d'];
$j7 = $_POST['7j'];

$a6 = $_POST['6a'];
$b6 = $_POST['6b'];
$v6 = $_POST['6v'];
$g6 = $_POST['6g'];
$d6 = $_POST['6d'];

$date_old= $_POST['date_old'];
 
$date_yong= $_POST['date_yong'];



////////////////////////////работа с базой данных   старших классов /////////////////////////////////////////////////

                            if ((isset($submit_old)) AND ($date_old <>'')) {
                                $query= "INSERT INTO sovet_old (a11, b11, v11, g11, a10, b10, v10, g10, a9, b9, v9, g9, d9, j9, date_old)VALUES ('$a11', '$b11', '$v11', '$g11', '$a10', '$b10', '$v10', '$g10', '$a9', '$b9', '$v9', '$g9', '$d9', '$j9', '$date_old')";
                                mysql_query("SET NAMES UTF8");
                                $result= mysql_query($query);
                                header("Location: http://suliber.ddns.net/rating/sovet/index_sovet.php");
                            }
                            
                                $query = "SELECT  * FROM sovet_old ORDER BY date_old DESC LIMIT 10 ";
                                mysql_query("SET NAMES UTF8");
                                $result=mysql_query($query);
                                
////////////////////////////РАБОТА С БАЗОЙ ДАННЫХ МЛАДШИХ КЛАССОВ/////////////////////////////////////////////////////////                                
                            if ((isset($submit_yong)) AND ($date_yong <>'')) {
                                $query2= "INSERT INTO sovet_yong (a8, b8, v8, g8, d8, a7, b7, v7, g7, d7, j7, a6, b6, v6, g6, d6, date_yong) VALUES ('$a8', '$b8', '$v8', '$g8', '$d8', '$a7', '$b7', '$v7', '$g7', '$d7', '$j7', '$a6', '$b6', '$v6', '$g6', '$d6', '$date_yong')";
                                mysql_query("SET NAMES UTF8");
                                $result2= mysql_query($query2);
                                header("Location: http://suliber.ddns.net/rating/sovet/index_sovet.php");

                              
                            }
                               $query2 = "SELECT  * FROM sovet_yong ORDER BY date_yong DESC LIMIT 10 ";
                                mysql_query("SET NAMES UTF8");
                                $result2=mysql_query($query2);
                                
///////////////////////////////РЕДАКТИРОВАНИЕ БАЗ ДАННЫХ КЛАССОВ/////////////////////////////////////////////////////////  
                                
                            $delete_date = $_POST['delete_date'];
                            $delete_submit = $_POST['delete_submit'];
                            
                            
                             if(isset($delete_submit)) {
                                 $query5 = "DELETE FROM sovet_old WHERE date_old='$delete_date'";
                                 mysql_query("SET NAMES UTF8");
                                 $result5=mysql_query($query5);
                                 
                                 $query4 = "DELETE FROM sovet_yong WHERE date_yong='$delete_date'";
                                 mysql_query("SET NAMES UTF8");
                                 $result4=mysql_query($query4);
                                 header("Location: http://suliber.ddns.net/rating/sovet/index_sovet.php");
                            }
                            
                            
 /////////////////////////////ОБРАТНАЯ СВЯЗЬ//////////////////////////////////
       $asker_name  = $_POST['asker_name']; 
       $question = $_POST['question'];    
       $submit_question = $_POST['submit_question'];    
       $asker_mail = $_POST['asker_mail']; 
                        
     if(isset($submit_question ) AND ($klass <>'')){
         $query5 = "INSERT INTO questions (name, question, klass, mail)VALUES ('$asker_name', '$question', '$klass', '$asker_mail')"; 
         mysql_query("SET NAMES UTF8");
         mysql_query($query5) or die(mysql_error());
     }                   
                                                   
                            
                                
?>  

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/log.css">
    <link rel="stylesheet" href="../css/css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/css/bootstrap.css">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">


    <script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../js/jquery.menu.js"></script>

    <script type="text/javascript" src="../js/scrollup.js"></script>
    <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>

    <title>Совет классов</title>
</head>
<html>
    <header>
        <div class="row">
            <div class="col-lg-3">
                <img src="../images/img4.png" alt="ГБОУ школа №109" />
            </div>
            <div class="col-lg-10" >
                <h1 style="padding-top: 70px; text-align: center; margin: 20px 0 60px 0;">Страница совета классов</h1>
                <!--////////////////////////////////////НАВИГАЦИЯ ////////////////////////////////////////////////-->
                <nav role="navigation" class="navbar navbar-default navbar-static-top"  >
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
                                            <a  href="../index.php">Главная</a>
                                        </li>
                                        <li>
                                            <a href="../download_marks.php">Рейтинг "Оценки"</a>
                                        </li>
                                        <li>
                                            <a href="../download_sash.php">Рейтинг "САШ"</a>
                                        </li>
                                        <li>
                                            <a href="../results.php">Итоги рейтинга</a>
                                        </li>
                                    </ul>
                                   <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <button style="margin: 10px;margin-right: 20px;" id="printBtn" class="btn-success" onclick="location.href='print_sovet.php'">Распечатать таблицу актива</button>
                                    </li>
                                  </ul>
                                </div>
                            </nav>
            </div>
            <div class="col-lg-3"></div>
        </div>    
        
    </header>    
    <body>
        <!--///////////////////////////////////Левая колонка/////////////////////////////////////////-->
        <div class="col-lg-3"   >      
        </div>
        <!--///////////////////////////////////Центральная колонка///////////////////////////////////-->
        <div class="col-lg-10">
            <div class="container" >
                <div class="row">
                    <div class="col-lg-8">
                        <h4>Отметить присутствущих на совете 9-11 классов</h4>
                        <form action=""  method="POST" name="sovet_old">
                            <div style="display: inline;"  class="col-lg-8">
                                <i style="color: grey;">Выберите дату совета и те классы, которые присутствовали на совете </i>
                                <input type="date"class="col-lg-10 col-lg-offset-6" name="date_old">
                                <input type="submit" name="submit_old" style="float: right;margin-top: 8px;"  class="btn-default">
                            </div>    
                            <div class="col-lg-8"style="display: inline-block;">
                                <div style="display: inline-block;">
                                    <input type="checkbox" name="11a" value="11А">11А
                                    <br/>
                                    <input type="checkbox" name="11b" value="11Б">11Б
                                    <br/>
                                    <input type="checkbox" name="11v" value="11В">11В
                                    <br/>
                                    <input type="checkbox" name="11g" value="11Г">11Г
                                    <br/>
                                </div>
                                <div style="display: inline-block;">
                                    <input type="checkbox" name="10a" value="10А">10А
                                    <br/>
                                    <input type="checkbox" name="10b" value="10Б">10Б
                                    <br/>
                                    <input type="checkbox" name="10v" value="10В">10В
                                    <br/>
                                    <input type="checkbox" name="10g" value="10Г">10Г
                                </div>
                                <div style="display: inline-block;">
                                    <input type="checkbox" name="9a" value="9А">9А
                                    <br/>
                                    <input type="checkbox" name="9b" value="9Б">9Б
                                    <br/>
                                    <input type="checkbox" name="9v" value="9В">9В
                                    <br/>
                                    <input type="checkbox" name="9g" value="9Г">9Г
                                </div>    
                                <div style="display: inline-block;">
                                    <input type="checkbox" name="9d" value="9Д">9Д
                                    <br/>
                                    <input type="checkbox" name="9j" value="9Ж">9Ж
                                </div> 

                            </div>    
                        </form>
                    </div>
                    <div class="col-lg-8">
                        <h4>Отметить присутствущих на совете 6-8 классов</h4>
                        <form action="" method="POST" >
                            <div style="display: inline;"  class="col-lg-8">
                                <i style="color: grey;">Выберите дату совета и те классы, которые присутствовали на совете</i>
                                <input type="date" class="col-lg-10 col-lg-offset-6" name="date_yong" >
                                <input type="submit" name="submit_yong" style="float: right; margin-top: 8px;" class="btn-default">
                            </div> 
                            <div style="display:inline-block">
                                <input type="checkbox" name="8a" value="8А">8А
                                <br>
                                <input type="checkbox" name="8b" value="8Б">8Б
                                <br>
                                <input type="checkbox" name="8v" value="8В">8В
                                <br>
                                <input type="checkbox" name="8g" value="8Г">8Г
                                <br>
                            </div>
                            <div style="display:inline-block">
                                <input type="checkbox" name="8d" value="8Д">8Д
                                <br>
                                <input type="checkbox" name="7a" value="7А">7А
                                <br>
                                <input type="checkbox" name="7b" value="7Б">7Б
                                <br>
                                <input type="checkbox" name="7v" value="7В">7В
                                <br>
                            </div>
                            <div style="display:inline-block">
                                <input type="checkbox" name="7g" value="7Г">7Г
                                <br>
                                <input type="checkbox" name="7d" value="7Д">7Д
                                <br>
                                <input type="checkbox" name="7j" value="7Ж">7Ж
                                <br>
                                <input type="checkbox" name="6a" value="6А">6А
                                <br>

                            </div>
                            <div style="display:inline-block">
                                <input type="checkbox" name="6b" value="6Б">6Б
                                <br>
                                <input type="checkbox" name="6v" value="6В">6В
                                <br>
                                <input type="checkbox" name="7g" value="6Г">6Г
                                <br>
                                <input type="checkbox" name="6g" value="6Г">6Г
                                <br>

                            </div>
                            <div style="display:inline-block">
                                <input type="checkbox" name="6d" value="6Д">6Д
                                <br>
                            </div>    

                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-16">
                        
<!--/////////////////////////////////////////////таблица старших классов/////////////////////////////////////////////////-->        
                        <h2>Таблица посещения актива старшими классами(9-11)</h2>
                        <table class="table-bordered">
                            <tr>
                                <th style="width: 180px; height: 50px;">Дата</th>
                                <th style="width: 80px;height: 50px; text-align: center;">11А</th>
                                <th style="width: 80px;height: 50px; text-align: center;">11Б</th>
                                <th style="width: 80px;height: 50px; text-align: center;">11В</th>
                                <th style="width: 80px;height: 50px; text-align: center;">11Г</th>
                                <th style="width: 80px;height: 50px; text-align: center;">10А</th>
                                <th style="width: 80px;height: 50px; text-align: center;">10Б</th>
                                <th style="width: 80px;height: 50px; text-align: center;">10В</th>
                                <th style="width: 80px;height: 50px; text-align: center;">10Г</th>
                                <th style="width: 80px;height: 50px; text-align: center;">9А</th>
                                <th style="width: 80px;height: 50px; text-align: center;">9Б</th>
                                <th style="width: 80px;height: 50px; text-align: center;">9В</th>
                                <th style="width: 80px;height: 50px; text-align: center;">9Г</th>
                                <th style="width: 80px;height: 50px; text-align: center;">9Д</th>
                                <th style="width: 80px;height: 50px; text-align: center;">9Ж</th>
                            </tr>
                            
                            <?php  while ($row = mysql_fetch_array($result)) { 
                                ?>
                            <tr>
                                <th style="height: 35px;"><?=$row['date_old']?></th>
                                <td style="height: 35px;">
                                    <?php if($row['a11'] == '11А'){echo ("<div style='color:#00cc00; margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                          else {echo ("<div style='color: red; margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">      
                                        <?php if($row['b11'] == '11Б'){echo ("<div style=' color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row['v11'] == '11В'){echo ("<div style=' color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row['g11'] == '11Г'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                         <?php if($row['a10'] == '10А'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                
                                </td>
                                <td style="height: 35px;">
                                         <?php if($row['b10'] == '10Б'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                         <?php if($row['v10'] == '10В'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                         <?php if($row['g10'] == '10Г'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row['a9'] == '9А'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row['b9'] == '9Б'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">    
                                        <?php if($row['v9'] == '9В'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row['g9'] == '9Г'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row['d9'] == '9Д'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row['j9'] == '9Ж'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                            </tr>
                           <?php }  ?>
                        </table>
                    </div> 
                    <div class="col-lg-16">
                        
<!--/////////////////////////////////////////////таблица МЛАДШИХ классов/////////////////////////////////////////////////-->        

                        <h2>Таблица посещения актива младшими классами(6-8)</h2>
                        <table class="table-bordered">
                            <tr>
                                <th style="width: 180px; height: 50px;">Дата</th>
                                <th style="width: 80px;height: 50px; text-align: center;">8А</th>
                                <th style="width: 80px;height: 50px; text-align: center;">8Б</th>
                                <th style="width: 80px;height: 50px; text-align: center;">8В</th>
                                <th style="width: 80px;height: 50px; text-align: center;">8Г</th>
                                <th style="width: 80px;height: 50px; text-align: center;">8Д</th>
                                <th style="width: 80px;height: 50px; text-align: center;">7А</th>
                                <th style="width: 80px;height: 50px; text-align: center;">7Б</th>
                                <th style="width: 80px;height: 50px; text-align: center;">7В</th>
                                <th style="width: 80px;height: 50px; text-align: center;">7Г</th>
                                <th style="width: 80px;height: 50px; text-align: center;">7Д</th>
                                <th style="width: 80px;height: 50px; text-align: center;">7Ж</th>
                                <th style="width: 80px;height: 50px; text-align: center;">6А</th>
                                <th style="width: 80px;height: 50px; text-align: center;">6Б</th>
                                <th style="width: 80px;height: 50px; text-align: center;">6В</th>
                                <th style="width: 80px;height: 50px; text-align: center;">6Г</th>
                                <th style="width: 80px;height: 50px; text-align: center;">6Д</th>
                            </tr>
                            
                            <?php  while ($row2 = mysql_fetch_array($result2)) { 
                                ?>
                            <tr>
                                <th style="height: 35px;"><?=$row2['date_yong']?></th>
                                <td style="height: 35px;">
                                    <?php if($row2['a8'] == '8А'){echo ("<div style='color:#00cc00; margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                          else {echo ("<div style='color: red; margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">      
                                        <?php if($row2['b8'] == '8Б'){echo ("<div style=' color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row2['v8'] == '8В'){echo ("<div style=' color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row2['g8'] == '8Г'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row2['d8'] == '8Д'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                         <?php if($row2['a7'] == '7А'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                
                                </td>
                                <td style="height: 35px;">
                                         <?php if($row2['b7'] == '7Б'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                         <?php if($row2['v7'] == '7В'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                         <?php if($row2['g7'] == '7Г'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                         <?php if($row2['d7'] == '7Д'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                         <?php if($row2['j7'] == '7Ж'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row2['a6'] == '6А'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row2['b6'] == '6Б'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">    
                                        <?php if($row2['v6'] == '6В'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row2['g6'] == '6Г'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                                <td style="height: 35px;">
                                        <?php if($row2['d6'] == '6Д'){echo ("<div style='color:#00cc00;margin-left:30px;' class='glyphicon glyphicon-ok'></div>");}
                                            else {echo ("<div style='color: red;margin-left:30px;' class='glyphicon glyphicon-remove'></div>");} ?>
                                </td>
                            </tr>
                           <?php }  ?>
                        </table>
                    </div>  
                </div>
            </div>
            
        </div>
        <!--///////////////////////////////////Правая колонка////////////////////////////////////////-->
        <div class="col-lg-3">
            <h4>Удалить неверное значение</h4>
            <div style="display: inline;"  class="col-lg-8">
                <form method="post">
                    <i style="color: grey;">Выберите дату той строки, которую хотите удалить</i>
                    <input type="date" class="delete_date" name="delete_date">
                    <input type="submit" name="delete_submit">
                </form>
            </div>  
            <!--///////////////////////////////////////////////////////ОБРАТНАЯ СВЯЗЬ///////////////////////////////////////////////////////////-->       
            
            <div class="row">
                <div class="col-lg-16">
                    <br/><hr/>
                    <h4 style="color: grey;">Что-то не понятно? Задайте свой вопрос:</h4>
                    <form action="" method="post">
                        Ваше имя:
                        <input type="text" name="asker_name" class="form-control" required>
                        Ваш e-mail:
                        <input type="text" name="asker_mail" class="form-control" required>
                        Ваш вопрос:
                        <input style="height: 100px;" type="textarea" name="question" class="form-control"required >
                        <input class="form-control" type="submit" value="Отправить" name="submit_question" ></nput>
                    </form>
                </div>
            </row>
            
        </div>
    </body>
     
</html>