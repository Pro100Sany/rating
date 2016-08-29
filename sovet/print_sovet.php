<?php
header('Content-Type: text/html; charset=utf-8'); 
error_reporting(0);
session_start();

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
////////////////////////////работа с базой данных   старших классов /////////////////////////////////////////////////

                            
                                $query = "SELECT  * FROM sovet_old ORDER BY date_old DESC LIMIT 10 ";
                                mysql_query("SET NAMES UTF8");
                                $result=mysql_query($query);
                                
////////////////////////////РАБОТА С БАЗОЙ ДАННЫХ МЛАДШИХ КЛАССОВ/////////////////////////////////////////////////////////                                
                           
                               $query2 = "SELECT  * FROM sovet_yong ORDER BY date_yong DESC LIMIT 10 ";
                                mysql_query("SET NAMES UTF8");
                                $result2=mysql_query($query2);
                               
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

    <title>Распечатать актив</title>
</head>
<html>
<body>
        <!--///////////////////////////////////Левая колонка/////////////////////////////////////////-->
        <div class="col-lg-3"   ></div>
        <!--///////////////////////////////////Центральная колонка///////////////////////////////////-->
        <div class="col-lg-10">
            <div class="container" >
                <div class="row">
                    <div class="col-lg-16">
                        
<!--/////////////////////////////////////////////таблица старших классов/////////////////////////////////////////////////-->        
                     <h3>Таблица посещения актива старшими классами(9-11)<span style="float: right;" onclick="javascript: print();" class="glyphicon glyphicon-print"></span></h3>
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

                        <h3>Таблица посещения актива младшими классами(6-8)</h3>
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
        <div class="col-lg-3"></div>
    </body>
        </html>