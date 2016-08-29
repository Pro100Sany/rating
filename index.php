<?php
header('Content-Type: text/html; charset=utf-8'); 
session_start();

error_reporting(0);

include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	
   
///////////////////////////выбираем тип подсчёта рейтинга////////////////////////
$tip_podscheta = $_POST['tip_podscheta'];

switch ($tip_podscheta) {
    case "marks":
        $location = "student_marks.php";
        break;
    case "sash":
       $location = "student_sash.php";
        break;
    case "marks_sash":
        $location = 'student.php';
        break;
    case "just_look":
        $location = 'download_marks.php';
        break;
}
$_SESSION['location'] = $location;//записываем ссылку на страницу выбранного типа подсчета
////////////////////////////////////////////////////////////////////////////////

$klass = $_SESSION['username'];//присваеваем переменной KLASS значение ЛОГИНА

 /////////////////////создаем переменную с номером четверти/////////////////////
if($_POST['ch']<>'') {$_SESSION['ch'] = $_POST['ch']; }
   $chetvert = $_SESSION['ch'];

 /////////////////открывание.закрывание четвертей/////////////////////////////// 
  if($_SESSION['close_'.$chetvert] == 'close')
          {
            $key='close';      
            $_SESSION['key']=$key;
          }
          else
          {
            $key='open';    
            $_SESSION['key']=$key;
          }
////////////////////////////////////////////////////////////////////////////////
          
          
if ((strlen($_POST['ch'])=="") OR ($_POST['ch']=="false" ) OR ($_POST['tip_podscheta']=="false")){
                echo ' ';                
}  
elseif (($_SESSION['username'] == $username) AND ($_SESSION['loggedin'] = 1)) {
      
    $reg='alldone';
    $regist = $_SESSION['reg'];
};

if ($regist='alldone') {
     header("location:$location") ;
     
}
else {
    header('location:index.php') ;
};

$submit = $_POST['submit'];



if(($klass == "Александр") OR ($klass == "Сабина") OR ($klass == "Марина")){
 $admin = 1;
 $_SESSION['adm'] = "$admin";
}



if($_POST['k']<>'') {$_SESSION['k'] = $_POST['k']; }
  $klass = $_SESSION['k'];
?>
 
<html > <br/>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="keywords" content="Сайт для подсчёта рейтинга школы, рейтинг, считать, школа 109, лицей 109, Ямбург, оценки, рейтинг учеников">
        <meta name="description" content="Быстро и просто посчитать рейтинг учеников! рейтинг-109.рф поможет Вам сделать это быстро и просто, а главное совершенно бесплатно! ГБОУ 'Школа 109' ">
        <meta name="author" content="Извеков Александр Дмитриевич">
        <meta name="copyright" content="Все права принадлежат ГБОУ 'Школа 109">
        
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"><!--глификонки-->
       <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="slidebars/examples/slidebars/slidebars.css">
	<link rel="stylesheet" href="slidebars/examples/example-styles.css">
       
        <link rel="stylesheet" href="css/plitki.css"><!--плитки-->
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/log.css">
        <link rel="stylesheet" href="css/top_menu.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/css/bootstrap.css">
        <link rel="stylesheet" href="css/css/bootstrap.min.css">
        
        <link rel="stylesheet" media="all" href="animated/css/animate.css">
        
        
        <script src="animated/js/wow.min.js"></script>
        <script>new WOW().init();</script>

        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.menu.js"></script>
        <script type="text/javascript" src="js/top_menu.js"></script>
        <script type="text/javascript" src="js/scrollup.js"></script> 
        <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- Slidebars -->
        <script src="slidebars/examples/slidebars/slidebars.js"></script>
        <script>
            (function($) {
                $(document).ready(function() {
                    $.slidebars({
                        disableOver: 480,
                        hideControlClasses: true
                    });
                });
            }) (jQuery);
        </script>
        
        <title>Рейтинг учащихся ГБОУ «Школа № 109»</title>
    </head>
	
    <body style="width: 96%; margin: 0px 2%">
        
        <div class="container-fluid" style="width: 96%;  ">
            <div class="hidden-lg"  id="sb-site" style="max-width: 15px;">
                <p class="sb-toggle-left "  >
                    <span style="margin: -15px 0 0 -30px;" class=" glyphicon glyphicon-align-justify"></span> 
                <p/>
            </div><!--           style="background-color: #f2f2f2;  -->
            <div class="row" >
                <div class="col-lg-16">
                    <div class="col-lg-3 hidden-xs hidden-sm hidden-md "><!--<img src="images/img4.png" alt="ГБОУ школа №109" />--></div> 
                    <div class="col-lg-10 col-xs-18 "><h1 style="color:#2fac5b; font-size: 400%; font-family: gagalin; text-align: center;">Рейтинг учащихся ГБОУ «Школа № 109»<br/><small>Авторизуйтесь для подсчёта рейтинга</small></h1></div>
                    <div class="col-sm-16" style="color: #888989;text-align: center; font-family: gagalin;  font-size:  30px; margin-top: 40px;"><span>Привет, <?php if($_SESSION['username'] <>'') { echo $_SESSION['username'];} else{echo "Гость";}?>!</span></div>
                    <div class="col-lg-3 hidden-xs"></div>
                </div>    
            </div>
            <?php include('top_menu.php');?>  
            <!--/////////////////////////////////////////////////////AUTORISATION//////////////////////////////////////////-->
            <div class="row" >
                <div class="col-lg-16" style="margin-top: 10em;">
                    <div class="row">
                        <img class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 hidden-sm hidden-xs" style=" display: inline-block; position: relative;" src="images/971814395.png">

                            <div class="col-lg-5 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-10 col-sm-offset-3 col-xs-18"  id="main">
                                <?php
                                if(!empty($_SESSION['loggedin']) && !empty($_SESSION['username']))  
                                    { // даём доступ пользователю к главной странице
                                ?>
                                <div class="row">
                                    <h1  class="col-lg-16 col-md-16 col-sm-16 col-xs-16 " style="margin-top: 0; text-align: center; display: inline-block;color:#e7c826; font-family: gagalin; ">Успех!</h1>
                                     <div class="col-lg-16  col-xs-18 ">
                                        <div class="row">            
                                            <p class="col-lg-16 col-xs-16 font1" style="font-family: Barkentina; text-align: center; color: #f2f2f2; ">Здравствуйте, <b style="font-family:Museo Cyrl; color: #f67d19;"><?=$_SESSION['username']?>.</b></p>                                                                     
                                            <div class="col-lg-16 col-lg-offset-0 col-sm-10 col-sm-offset-3 col-xs-16" style="display: inline-block; " class="radio " id="typeofclass" >  
                                                <h4  style="text-align: center; color: #f2f2f2; font-family: Barkentina;" class="hidden-xs font1 col-lg-16 col-xs-16">Выберите четверть, чтобы посчитать рейтинг:</h4> 
                                                <h4  style="text-align: center; color: #f2f2f2; font-family: Barkentina;" class="visible-xs font1 col-lg-16 col-xs-16">Выберите четверть:</h4> 
                                                <form class="col-lg-12 col-lg-offset-2 col-sm-16 col-xs-16   "  name="form" method="post"><br/>
                                                    <?php if(($admin == 1) AND $_SESSION['adm'] == 1){ echo "  
                                                       <select class='col-lg-4 select form-control vert' name='k'>   
                                                            <option value=''>Выберите класс</option>
                                                            <option value='11А'>11 А</option>
                                                            <option value='11Б'>11 Б</option>
                                                            <option value='11В'>11 В</option>
                                                            <option value='11Г'>11 Г</option>
                                                            <option value='false'></option>
                                                            <option value='10А'>10 А</option>
                                                            <option value='10Б'>10 Б</option>
                                                            <option value='10В'>10 В</option>
                                                            <option value='10Г'>10 Г</option>
                                                            <option value='false'></option>
                                                            <option value='9А'>9 А</option>
                                                            <option value='9Б'>9 Б</option>
                                                            <option value='9В'>9 В</option>
                                                            <option value='9Г'>9 Г</option>
                                                            <option value='9Д'>9 Д</option>
                                                            <option value='9Ж'>9 Ж</option>
                                                            <option value='false'></option>
                                                            <option value='8А'>8 А</option>
                                                            <option value='8Б'>8 Б</option>
                                                            <option value='8В'>8 В</option>
                                                            <option value='8Г'>8 Г</option>
                                                            <option value='8Д'>8 Д</option>
                                                            <option value='false'></option>
                                                            <option value='7А'>7 А</option>
                                                            <option value='7Б'>7 Б</option>
                                                            <option value='7В'>7 В</option>
                                                            <option value='7Г'>7 Г</option>
                                                            <option value='7Д'>7 Д</option>
                                                            <option value='7Ж'>7 Ж</option>
                                                            <option value='false'></option>
                                                            <option value='6А'>6 А</option>
                                                            <option value='6Б'>6 Б</option>
                                                            <option value='6В'>6 В</option>
                                                            <option value='6Г'>6 Г</option>
                                                            <option value='6Д'>6 Д</option>
                                                            <option value='13Г'></option>
                                                        </select>";}   ?>

                                                        <select   id="select_index" name="ch"  class="select vert form-control">
                                                            <option value="false">Выберите четверть</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option  value="4">4</option>
                                                        </select>
                                                     
                                                    <select   id="select_index" name="tip_podscheta"  class="select vert form-control ">
                                                            <option value="false">Выберите тип рейтинга</option>
                                                            <option value="marks">"Оценки"</option>
                                                            <option value="sash">"САШ"</option>
                                                            <option value="marks_sash">"Оценки" и "САШ"</option>
                                                            <option value="just_look">"Посмотреть результаты</option>
                                                        </select>
                                                    <input style="margin-top: 5px;" class="btn  btn-info btn_index_top" type="submit" name="submit"  value="Выбрать">
                                                </form>
                                                <span  style=" padding-top: 100px; font-size: 17px; display: inline-block; float: right;" ><a style="color: #84E24B !important;" href="logout.php">Выход</a></span>
                                            </div>   
                                            <?php  
                                            }    
                                            elseif(!empty($_POST['username']) && !empty($_POST['password']))  
                                            {  
                                                // позволим пользователю войти на сайт 


                                                $username = mysql_real_escape_string($_POST['username']);
                                                $username = stripslashes($username); 
                                                $username = htmlspecialchars($username);

                                                $password = base64_encode(mysql_real_escape_string($_POST['password']));
                                                $password = stripslashes($password); 
                                                $password = htmlspecialchars($password);

                                                $sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password' ";
                                                mysql_query("SET NAMES UTF8");
                                                $query = mysql_query($sql);
                                                $row = mysql_fetch_array($query); 

                                                if($row['UserID'] != 0)  
                                                {  
                                                        ////////////////закрывалка четверти////////////////////
                                                          $open_time_1 = '9';
                                                          $close_time_1 = '11';
                                                          
                                                          $open_time_2 = '11';
                                                          $close_time_2 = '1';
                                                          
                                                          $open_time_3 = '1';
                                                          $close_time_3 = '4';
                                                          
                                                          $open_time_4 = '4';
                                                          $close_time_4 = '6';
                                                          
                                                          //////////////////////проверка корректности времени/////не работает/////////////////
                                                            $unix_time = time();
                                                            
                                                            '</br>'.strtotime("now");
                                                            
                                                            '</br>'.$pc_time =  date("y:m:d H:i:s");
                                                            
                                                            '</br>'.$pc_unix_time = date_timestamp_get($pc_time);
                                                            
                                                            
                                                           if ($unix_time !== $pc_unix_time) 
                                                           {
                                                             echo  $unix = 'incorrect time';
                                                           }
                                                           else 
                                                           {
                                                             echo  $unix = 'correct time';
                                                           }
                                                          ///////////////////////////////////////////////////////////////////////// 

                                                        if(($close_time_1 > date("n")) AND (date("n") >= $open_time_1)AND ($unix == 'correct time') ) {
                                                           $_SESSION['close_1'] = 'open';
                                                           //header('location:index.php');
                                                        }
                                                        else {
                                                            $_SESSION['close_1'] = 'close';
                                                        }
                                                        
                                                        if(($close_time_2 <> date("n")) AND (date("n") >= $open_time_2)AND ($unix == 'correct time')) {
                                                           $_SESSION['close_2'] = 'open';
                                                          // header('location:index.php');
                                                        }
                                                        else {
                                                            $_SESSION['close_2'] = 'close';
                                                        }
                                                        
                                                        if(($close_time_3 > date("n")) AND (date("n") >= $open_time_3)AND ($unix == 'correct time')) {
                                                           $_SESSION['close_3'] = 'open';
                                                          // header('location:index.php');
                                                        }
                                                        else {
                                                            $_SESSION['close_3'] = 'close';
                                                        }
                                                        
                                                        if(($close_time_4 > date("n")) AND (date("n") >= $open_time_4)AND ($unix == 'correct time')) {
                                                           $_SESSION['close_4'] = 'open';
                                                         // header('location:index.php');
                                                        }
                                                        else {
                                                            $_SESSION['close_4'] = 'close';
                                                        }
                                                        //////////////////////////////////////////////////////////
                                                        
                                                        
                                                        $_SESSION['username'] = $username;  
                                                        $_SESSION['loggedin'] = 1;  

                                                        echo "<h1 class='col-lg-16 font2' style='margin-top: 0; text-align: center; display: inline-block;color:#e7c826; font-family: gagalin;'>Успех!</h1>";  
                                                        echo "<p style='text-align: center; color: #f2f2f2; font-family: Barkentina;'>Сейчас вы будете перенаправлены в закрытый раздел.</p>";  
                                                        echo "<meta http-equiv='refresh' content='0;index.php'>"; 
                                                }  
                                                else  
                                                {  
                                                         echo "<h1 style='text-align: center; color: #f2f2f2; font-family: Barkentina;'>Ошибка</h1>";  
                                                        echo "<p style='font-size:17; text-align: center; color: #f2f2f2; font-family: Barkentina;'>Прости, но мы не нашли такого аккаунта.<br/> Можешь <a href=\"index.php\">попробовать ещё раз</a>.</p>";  
                                                } 
                                            }  
                                            else  
                                            {  // выводим форму для авторизации  
                                                ?>   

                                            <span class="col-lg-10 col-lg-offset-3 col-sm-10 col-sm-offset-3 col-xs-10 col-xs-offset-3 autorization"  >Авторизация</span>
                                            <div id="in_main" class="col-lg-10 col-lg-offset-3 col-sm-10 col-sm-offset-3  ">
                                                 <div class="row">
                                                    <form  class=" col-xs-10 col-xs-offset-3"    method="post" action="index.php" name="loginform"  >  

                                                       <input  class="form-control col-lg-10 col-lg-offset-3 col-lg-pull-3 col-sm-10 col-sm-offset-3 col-sm-pull-3  vert"  type="text" name="username" id="username"
                                                                   value="Логин" 
                                                                   onfocus="if (this.value == 'Логин') this.value = '';"
                                                                   onblur="if (this.value == '') this.value = 'Логин';">  

                                                        <input   class="form-control col-lg-10 col-lg-offset-3 col-lg-pull-3 vert"  type="password" name="password" id="password"
                                                                   value="Пароль" 
                                                                   onfocus="if (this.value == 'Пароль') this.value = '';"
                                                                   onblur="if (this.value == '') this.value = 'Пароль';">

                                                        <input class="form-control    vertb" type="submit" name="login" id="login" value="Войти">  

                                                    </form> 
                                                </div>
                                                </div>
                                               </div>   
                                               <?php  
                                            }  ?>
                                        </div>         
                                     </div>           
                                  </div>             


                    <div class="col-lg-3 hidden-xs"></div>
                </div>
                <div class="col-lg-3" hidden-xs></div>
                </div>
            </div>         
     <!--/////////////////////ЦЕНТРАЛЬНАЯ КОЛОНКА///////////////////--->
             <div class="row" style="padding-top: 100px; width: 99%;">
                 <h3 class="font2"  style="font-size: 30px; text-align: center; font-family: gagalin; padding: 80px 5px;">Положение о рейтинге учащихся ГБОУ «Школа № 109»</h3>
                 <div class="row" >

                     <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-14 col-sm-offset-1 col-xs-15 col-xs-offset-1 plitca  bounceInLeft wow">
                         <h3 style="text-align: center;"><b>Общие положения.</b></h3>
                         <div class="">
                             <ul class="fa-ul"><br/>
                                 <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"> </i> Цель рейтинга - это повышение мотивации учащихся, стимулирование общественной активности школьников и усиление учебной дисциплины.</li>
                                <br/>
                                <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"> </i> Рейтинг присваивается учащимися 6х - 11х классов отдельно в общеобразовательных и лицейских классах по итогам каждой четверти.</li>
                                <br/>                    
                                <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"> </i> Результаты рейтинга учащихся размещаются на нашем сайте.</li>
                                <br/>
                                <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"> </i> Спорные вопросы по рейтингу решаются советом учащихся, классным руководителем и администрацией школы.</li>
                                <br/>
                            </ul>
                         </div>
                     </div>
                     <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-14 col-sm-offset-1 col-xs-15 col-xs-offset-1 plitca  fadeInDown wow">
                         <h3 style="text-align: center;"> <b>Механизм формирования рейтинга.</b></h3>
                         <ul class="fa-ul">
                            <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"> </i> В общеобразовательных классах оценки «4» и «5», полученные учащимися в течение учебной четверти, складываются и выставляются в рейтинговый лист общим баллом со знаком «+». Оценка «3» не учитывается в рейтинге. Оценка «2» учитывается как «- 5» баллов. Оценка «1» учитывается как «- 6» баллов.
                            </li><br/>
                            <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"> </i> В лицейских и гимназических классах оценки «4» и «5», полученные учащимися в течение учебной четверти, складываются и выставляются в рейтинговый лист общим баллом со знаком «+». Оценка «3» оценивается в « - 3» балла. Оценка «2» оценивается как « - 5» баллов. Оценка «1» оценивается как « - 6» баллов.
                            </li><br/>
                        </ul>
                     </div>
                     <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-14 col-sm-offset-1 col-xs-15 col-xs-offset-1 plitca  bounceInRight  wow">
                         <h3 style="text-align: center;"><b>Награждение.</b></h3>
                         <ul class="fa-ul"><br/>
                            <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"> </i> По итогам рейтинга учащиеся представляются к денежной премия 1 раз в четверть в размере:
                                <ul class="fa-ul"><br/>
                                    <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"> </i> Для победителей 6-х и 7-х классов – 2000 рублей;</li>   
                                    <br/>
                                    <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"> </i> Для победителей 8-х и 9-х классов – 4000 рублей;</li>
                                    <br/>
                                    <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info">     </i> Для победителей 10-х и 11-х классов – 6000 рублей</li>
                                    <br/>
                                </ul>
                            </li>
                        </ul>
                         <div id="poloz_down">Полное положение о рейтинге вы можете посмотреть <a href="polozenie.docx">тут</a>.</div> 
                     </div>        
                 </div>
             </div>
             <div class="row">
                 <h3 class="font2"  style="font-size: 30px; text-align: center; font-family: gagalin; padding: 80px 0;">Положение о рейтинге учащихся «Самый активный школьник 109» - САШ 109</h3>
                 <div class="row">
                     <div class="col-lg-4 col-lg-offset-3 col-md-4 col-md-offset-3 col-sm-14 col-sm-offset-1 col-xs-15 -col-xs-offset-1 plitca bounceInLeft wow">
                         <h3 style="text-align: center;"><b>Общие положения.</b></h3>
                         <div class="">
                             <ul class="fa-ul"><br/>
                                <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> Цель рейтинга - создание условий для повышения мотивации учащихся к общественной активности ,воспитание ответственного отношения делу.
                                </li>
                                <br/>
                                <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> Развитие школьного самоуправления, привлечение школьников к участию в общественной жизни школы.
                                </li>
                                <br/>
                                <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> Результаты рейтинга учащихся размещаются на нашем сайте.
                                </li>
                                <br/>
                                <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> Спорные вопросы по рейтингу решаются советом учащихся, классным руководителем и администрацией школы.
                                </li>
                            </ul>
                         </div>
                     </div>
                     <div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-14 col-sm-offset-1 col-xs-15 -col-xs-offset-1   plitca bounceInRight wow">
                         <h3 style="text-align: center;"> <b>Механизм формирования рейтинга.</b></h3>
                         <ul class="fa-ul"><br/>
                            <li ><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> <u>Итоговый рейтинг учащегося состоит из четырех показателей:</u>
                                <ul class="fa-ul"><br/>
                                    <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> Активное участие в делах школы по итогам учебной четверти;
                                    </li>
                                    <br/>
                                    <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> Активное участие в делах класса по итогам учебной четверти;
                                    </li>
                                    <br/>
                                    <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> Участие в межрайонных, муниципальных и прочих общественных мероприятиях;
                                    </li>
                                    <br/>
                                    <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> Участие в олимпиадах, творческих конкурсах, фестивалях, смотрах.
                                    </li>
                                    <br/>
                                </ul>
                            </li>
                        </ul>
                     </div>
                     <div style="margin-top: 50px;" class="col-lg-4 col-lg-offset-3 col-md-4 col-md-offset-3 col-sm-14 col-sm-offset-1 col-xs-15 -col-xs-offset-1 plitca bounceInLeft  wow  ">
                         <h3 style="text-align: center;"><b>Критерии оценки рейтинга учащихся</b></h3>
                         <ul class="fa-ul"><br/>
                            <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> В каждом классе рейтинг подсчитывает Совет класса;
                            </li>
                            <br/>
                            <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> За участие в общественных делах школы учащийся получает от «- 5» до «5» баллов;
                            </li>
                            <br/>
                            <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> За активное участие в делах класса «-4»до «4» баллов;
                            </li>
                            <br/>
                            <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> Участие в течение четверти в олимпиадах, конкурсах и фестивалях 5 баллов
                            </li>
                            <br/>
                            <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> Призовые места по итогам олимпиад, конкурсов, фестивалей, смотров 5 баллов
                            </li>
                        </ul>

                     </div>  
                     <div style="margin-top: 50px;" class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-14 col-sm-offset-1 col-xs-15 -col-xs-offset-1  plitca bounceInRight  wow">
                         <h3 style="text-align: center;"><b>Награждение.</b></h3>
                         <ul class="fa-ul"><br/>
                            <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> По итогам рейтинга учащиеся представляются к денежной премия 1 раз в четверть в размере:
                                <ul class="fa-ul"><br/>
                                    <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i>  Для победителей 6-х и 7-х классов – 2000 рублей;</li>   
                                    <br/>
                                    <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i> Для победителей 8-х и 9-х классов – 4000 рублей;</li>
                                    <br/>
                                    <li><i style="font-size:18px; color: #13b0f2;" class="fa fa-info"></i>  Для победителей 10-х и 11-х классов – 6000 рублей</li>
                                    <br/>
                                </ul>
                            </li>
                        </ul>
                         <div id="poloz_down">Полное положение о рейтинге вы можете посмотреть <a href="polozenie.docx">тут</a>.</div> 
                     </div> 
                 </div>
             </div>
             <div class="row" style="margin: 80px 0 0 0;"><!--//////////////FOOTER//////////////////--->
                <div class="container-fluid" style="background-color: #595959; color: #fdfaf2;">
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
            </div>  
        </div>   
    </body>
</html>
