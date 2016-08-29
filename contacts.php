<?php
header('Content-Type: text/html; charset=utf-8'); 
session_start();

// error_reporting(0);

include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	
             

$klass = $_SESSION['username'];
$admin = $SESSION['adm'];


 
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"><!--глификонки-->
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="slidebars/examples/slidebars/slidebars.css">
	<link rel="stylesheet" href="slidebars/examples/example-styles.css">
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/css/bootstrap.css">
        <link rel="stylesheet" href="css/css/bootstrap.min.css">
        <!--TOPMENU-->
        <link rel="stylesheet" href="css/top_menu.css">
        
         <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.menu.js"></script>
        <script type="text/javascript" src="js/top_menu.js"></script>
        <script type="text/javascript" src="js/scrollup.js"></script> 
        <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- Slidebars -->
        <script src="slidebars/examples/slidebars/slidebars.js"></script>
         
        <title>Рейтинг || Контакты</title>
    </head>
    <body class="container-fluid">
        
        <div class="hidden-lg"  id="sb-site" style="max-width: 15px;">
                <p class="sb-toggle-left "  >
                    <span style="z-index: 99999; margin: -15px 0 0 -30px;" class=" glyphicon glyphicon-align-justify"></span> 
                <p/>
            </div>
        <div class="row">
        <div class="container  col-lg-16 ">
            <div class="row">
        <?php include('top_menu.php');?>
            <div class="row">
                <div class="col-lg-16">
                    <h1 style="font-size:70px;font-family: gagalin ; text-align: center;">Контакты</h1>
                    <div style="margin-top: 30px;" class=" col-lg-8 col-lg-offset-4 col-md-10 col-md-offset-2 hidden-xs">
                        <img  src="images/790243217.jpg">
                    </div>
                    <div class="col-lg-8 "  style="margin-top: 120px; font-size: 25px;">
                        <p style=""><b>Администратор:</b> Извеков Александр Дмитриевич</p>
                        <text><span style="color:#f3c234; font-size: 30px; margin-top: 8px;" class="fa fa-envelope">&nbsp; </span> e-mail: <a href="mailto:sasizvekv@yandex.ru?subject=rating"> sasizvekv@yandex.ru</a></text>
                        <br/>
                        <text ><span style="color:#15c615; font-size: 30px; margin-top: 8px;" class="fa fa-phone">&nbsp;&nbsp;</span>  тел.: <a href="tel:+79162251733"> 8(916)2251733</a></text>
                        <br/>
                        <text ><span style="color:#15c615; font-size: 30px; margin-top: 8px;" class="fa fa-whatsapp">&nbsp;&nbsp;</span>  WhatsApp: <a href="sms:+79162251733"> 8(916)2251733</a></text>
                         <br/>
                         <text ><span  style="color:#f3c234; font-size: 30px; margin-top: 8px;" class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;&nbsp;</span>ГБОУ "Школа 109", 10"A" класс</text>
                    </div>
                    <div class="col-lg-8 " style="border-style: double; border-color:#d58512; margin-top: 60px;margin-bottom: 100px;">
                        <p class="col-lg-16  " style="font-size: 22px; color:#985f0d; margin: auto;">Не нашли ответ на свой вопрос?</p> 
                        <p class="col-lg-16  " style="font-size: 20px; color:#d58512; margin: 5px 0 10px 0 ;">Задайте его мне!</p>
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
                </div>
                
                    <p style="font-size:35px;  text-align: center;"><i>Так же вы можете обратиться : </i></p>
                 
                <div class="col-lg-8 "  style="padding-left: 10px;margin-top: 40px; font-size: 25px;">
                    <p style=""><b>Администратор:</b> Максимовская Марина Алексеевна</p>
                    <text><span style="color:#f3c234; font-size: 30px; margin-top: 8px;" class="fa fa-envelope">&nbsp; </span> e-mail: <a href="mailto:maximovskaya_mar@mail.ru?subject=rating"> maximovskaya_mar@mail.ru</a></text>
                    <br/>
                    <text ><span style="color:#15c615; font-size: 30px; margin-top: 8px;" class="fa fa-phone">&nbsp;&nbsp;</span>  тел.: <a href="tel:+79260413619"> +79260413619</a></text>
                    <br/>
                     <text ><span  style="color:#f3c234; font-size: 30px; margin-top: 8px;" class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;&nbsp;</span>ГБОУ "Школа 109", 101 кабинет </text>
                </div>
                
            
                <div class="col-lg-7 col-lg-offset-1"  style="margin-top: 40px; font-size: 25px;">
                    <p style=""><b>Администратор:</b> Сабина Исмаиловна</p>
                    <text><span style="color:#f3c234; font-size: 30px; margin-top: 8px;" class="fa fa-envelope">&nbsp; </span> e-mail: <a href="mailto:info86sabina@gmail.com?subject=rating"> info86sabina@gmail.com</a></text>
                    <br/>
                    <text ><span style="color:#15c615; font-size: 30px; margin-top: 8px;" class="fa fa-phone">&nbsp;&nbsp;</span>  тел.: <a href="tel:+79197293364"> +79197293364</a></text>
                    <br/>
                    <text ><span style="color:#15c615; font-size: 30px; margin-top: 8px;" class="fa fa-whatsapp">&nbsp;&nbsp;</span>  WhatsApp: <a href="sms:+79197293364"> +79197293364</a></text>
                     <br/>
                     <text ><span  style="color:#f3c234; font-size: 30px; margin-top: 8px;" class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;&nbsp;</span>ГБОУ "Школа 109" </text>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3"></div>
        </div>
        </div>
        <!--//////////////FOOTER//////////////////--->
        
            <div class="row" style="background-color: #595959; color: #fdfaf2;margin-top: 80px;padding-left: 5px;">
                <div class="col-lg-3 col-xs-18">
                    <p>По всем вопросам обращайтесь к Извекову Александру Дмитриевичу <hr style="margin: 0;"/>
                        <text style="font-weight: bold;">e-mail:<a href="mailto:sasizvekv@yandex.ru?subject=rating">  sasizvekv@yandex.ru</a></text>
                        <br/>
                        <text style="font-weight: bold;"> тел. <a href="tel:+79162251733">8(916)2251733</a></text>
                    </p>
                </div>
                <div class="col-lg-10 col-xs-18" style="min-height: 90px;">
                    <div class="col-lg-16 vcenter text-center"  style="margin-top: 20px; word-spacing: 20px; letter-spacing: 5px;"><br/>All rights reserved</div>
                </div>
                <div style="min-height: 90px;" class="col-lg-3 ">
                    <div style="min-height: 90px; " class="row">
                        <div   class="col-lg-6 col-lg-offset-5">
                            <!-- Yandex.Metrika informer -->
                            <a href="https://metrika.yandex.ru/stat/?id=34323300&amp;from=informer"
                            target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/34323300/3_1_FFFFFFFF_FFFFFFFF_0_pageviews"
                            style="margin-top: 30px; width:88px; height:31px; border:0;" alt="������.�������" title="������.�������: ������ �� ������� (���������, ������ � ���������� ����������)" onClick="try{Ya.Metrika.informer({i:this,id:34323300,lang:'ru'});return false}catch(e){}" /></a>
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
                    </div>
                </div>
                <div id="scrollup"><img alt="Прокрутить вверх" src="up.png"></div>
            </div>
        
    </body>
</html>