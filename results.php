<?php
header('Content-Type: text/html; charset=utf-8'); 
session_start();
error_reporting(0);

include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	

if($_POST['ch']<>'') {$_SESSION['ch'] = $_POST['ch']; }
  $chetvert = $_SESSION['ch'];
  
$date = $_SESSION['date'];
  
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
require  'SELECT2.php'; 
?>

<html><a name="anchor0"></a><br/>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/css/bootstrap.css">
        <link rel="stylesheet" href="css/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/results/table_res.css">
        
        
        <link rel="stylesheet" href="css/floating_menu/style.css">
        <link rel="stylesheet" href="css/floating_menu/reset.css">
         
        
        
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.menu.result.js"></script>
        
        <script type="text/javascript" src="js/scrollup.js"></script> 
        <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
         <title>Результаты рейтинга</title>
    </head>
    <body>
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-3">
                   <img src="images/img4.png" alt="ГБОУ школа №109" />
               </div>
               <div class="col-lg-10">
                   <h1  style=" text-align: center; font-size: 34;  " >Итоги рейтинга учащихся ГБОУ «Школа № 109»</h1>
                   
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
               </div>
               <div class="col-lg-3"></div>
               <div class="col-lg-3"></div>
               <div class="col-lg-10">
                   <div class="col-lg-10 col-lg-offset-3 col-md-10 col-md-offset-3 col-sm-10 col-sm-offset-3 col-xs-18" id="menu" >
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
               </div>
               <div class="col-lg-3"></div>
           </div>
           <div class="row">
               <div class="col-lg-3"></div>
               <div class="col-lg-10"> <!--//////////////////////Центральная колонка//////////////////////-->
                    
                            <div class="row">
                                <br/>
                                <table class="simple-little-table col-lg-16" cellspacing='0'  >
                                  <colgroup>
                                      <col style="background:#C7DAF0;">
                                  </colgroup>
                                  <tr >
                                    <th class="zagolovok"   colspan="3" >Победители рейтинга "Оценки" из общеобразовательных классов</th>
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
                                  
                                  while ($row25 = mysql_fetch_array($result25)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row25['name'];?></td>
                                    <td><?php echo $row25['klass'];?></td>
                                    <td><?php echo $row25['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php } ?>
                                  
                                </table>
                                
                                <table class="simple-little-table col-lg-16" >
                                  <colgroup>
                                      <col style="background:#C7DAF0;">
                                  </colgroup>
                                  <tr >
                                    <th class="zagolovok"   colspan="3" >Победители рейтинга "Оценки" из лицейских классов</th>
                                  </tr>
                                  <tr>
                                    <th style="color:#af1b1b;" >Ф.И.О.</th>
                                    <th style="color:#af1b1b;">Класс</th>
                                    <th style="color:#af1b1b;">Рейтинг</th>
                                  </tr>
                                  
                                  
                                  
                                      
                                      <?php
                                 while ($row343 = mysql_fetch_array($result343)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row343['name'];?></td>
                                    <td><?php echo $row343['klass'];?></td>
                                    <td><?php echo $row343['sum_rait_marks'];?></td>
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
                                  
                                  while ($row27 = mysql_fetch_array($result27)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row27['name'];?></td>
                                    <td><?php echo $row27['klass'];?></td>
                                    <td><?php echo $row27['sum_rait_marks'];?></td>
                                  </tr>
                                  <?php } ?>
                                  
                                </table>
                                
                                
                                
                            </div>
                            <br/>
                            <hr>
                            <br/>
                            <hr>
                            <div class="row">
                                <br/>
                                <table class="simple-little-table col-lg-16" >
                                  <colgroup>
                                      <col style="background:#C7DAF0;">
                                  </colgroup>
                                  <tr >
                                      <th class="zagolovok"   colspan="3" ><h2>Победители рейтинга "САШ" <h2/></th>
                                  </tr>
                                  <tr>
                                    <th style="color:#af1b1b;" >Ф.И.О.</th>
                                    <th style="color:#af1b1b;">Класс</th>
                                    <th style="color:#af1b1b;">Рейтинг</th>
                                  </tr>
                                  
                                      <?php
                                      
                                  while ($row51 = mysql_fetch_array($result51)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row51['name'];?></td>
                                    <td><?php echo $row51['klass'];?></td>
                                    <td><?php echo $row51['sum_rait_sash'];?></td>
                                  </tr>
                                  <?php }
                                  
                                  
                                  while ($row56 = mysql_fetch_array($result56)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row56['name'];?></td>
                                    <td><?php echo $row56['klass'];?></td>
                                    <td><?php echo $row56['sum_rait_sash'];?></td>
                                  </tr>
                                  <?php }  
                                  
                                  while ($row512 = mysql_fetch_array($result512)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row512['name'];?></td>
                                    <td><?php echo $row512['klass'];?></td>
                                    <td><?php echo $row512['sum_rait_sash'];?></td>
                                  </tr>
                                  <?php } 
                                  
                                  while ($row517 = mysql_fetch_array($result517)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row517['name'];?></td>
                                    <td><?php echo $row517['klass'];?></td>
                                    <td><?php echo $row517['sum_rait_sash'];?></td>
                                  </tr>
                                  <?php } 
                                  
                                  while ($row521 = mysql_fetch_array($result521)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row521['name'];?></td>
                                    <td><?php echo $row521['klass'];?></td>
                                    <td><?php echo $row521['sum_rait_sash'];?></td>
                                  </tr>
                                  <?php } 
                                  
                                  while ($row525 = mysql_fetch_array($result525)) 
                                          { ?>
                                  <tr> 
                                    <td><?php echo $row525['name'];?></td>
                                    <td><?php echo $row525['klass'];?></td>
                                    <td><?php echo $row525['sum_rait_sash'];?></td>
                                  </tr>
                                  <?php } ?>
                                  
                                </table>
                        </div>
                    
               </div>
               <div class="col-lg-3"></div>
           </div>
           <div class="row"><!--//////////////FOOTER//////////////////--->
                <div class="container-fluid">
                    <div class="col-lg-3 col-xs-18">
                        <p>По всем вопросам обращайтесь к Nзвекову Александру Дмитриевичу <br/>
                            <text style="font-weight: bold;">e-mail:<a href="mailto:sasizvekv@yandex.ru?subject=rating">  sasizvekv@yandex.ru</a></text>
                            <br/>
                            <text style="font-weight: bold;"> тел. <a href="tel:+79162251733">8(916)2251733</a></text>
                        </p>
                    </div>
                    <div class="col-lg-10 col-xs-18" >
                        <div class="col-lg-16 vcenter text-center"  style="word-spacing: 20px; letter-spacing: 5px;"><br/>All rights reserved</div>
                    </div>
                    <div class="col-lg-3 ">
                        <!-- Yandex.Metrika informer -->
                        <a href="https://metrika.yandex.ru/stat/?id=34323300&amp;from=informer"
                        target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/34323300/3_1_FFFFFFFF_FFFFFFFF_0_pageviews"
                        style="width:88px; height:31px; border:0;" alt="������.�������" title="������.�������: ������ �� ������� (���������, ������ � ���������� ����������)" onClick="try{Ya.Metrika.informer({i:this,id:34323300,lang:'ru'});return false}catch(e){}" /></a>
                        <!-- /Yandex.Metrika informer -->

                        <!-- Yandex.Metrika counter -->
                        <script type="text/javascript">
                            (function (d, w, c) {
                                (w[c] = w[c] || []).push(function() {
                                    try {
                                        w.yaCounter34323300 = new Ya.Metrika({
                                            id:34323300,
                                            clickmap:true,
                                            trackLinks:true,
                                            accurateTrackBounce:true,
                                            webvisor:true
                                        });
                                    } catch(e) { }
                                });

                                var n = d.getElementsByTagName("script")[0],
                                    s = d.createElement("script"),
                                    f = function () { n.parentNode.insertBefore(s, n); };
                                s.type = "text/javascript";
                                s.async = true;
                                s.src = "https://mc.yandex.ru/metrika/watch.js";

                                if (w.opera == "[object Opera]") {
                                    d.addEventListener("DOMContentLoaded", f, false);
                                } else { f(); }
                            })(document, window, "yandex_metrika_callbacks");
                        </script>
                        <noscript><div><img src="https://mc.yandex.ru/watch/34323300" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
                        <!-- /Yandex.Metrika counter -->
                    </div>
                    <div id="scrollup"><img alt="Прокрутить вверх" src="up.png"></div>
                </div>
            </div>
       </div>     
    </body>
</html>
