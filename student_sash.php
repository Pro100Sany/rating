<?php
header('Content-Type: text/html; charset=utf-8'); 

session_start();
 
$location =  $_SESSION['location'];
$submit = $_POST['submit'];
$tip_podscheta = $_POST['tip_podscheta'];
if (isset($submit)){
switch ($tip_podscheta) {
    case "marks":
        $location = "student_marks.php";
        $_SESSION['location'] = $location;
        break;
    case "sash":
       $location = "student_sash.php";
        $_SESSION['location'] = $location;
        break;
    case "marks_sash":
        $location = 'student.php';
        $_SESSION['location'] = $location;
        break;
    case "just_look":
        $location = 'download_marks.php';
        $_SESSION['location'] = $location;
        break;
}

header("location:$location");
}
if ($location =='') {
    $location = 'student.php';
}



$admin = $_SESSION['adm'];
$klass = $_SESSION['k'];

if($admin == 1) {
    $klass = $_SESSION['k'];
}
elseif ($admin <> 1) {   
    $klass = $_SESSION['username'];
}
if ($_POST['k']<>''){
   $_SESSION['k']=$_POST['k'];
   $klass =  $_SESSION['k'];
}



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
///////////////////////////////////////////////////////////////////////////////

include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	

        if (date("n")>7){
            $date1 = date("Y");
            $date2 = date("Y")+1;
            $date = "$date1$date2";
            $_SESSION['date']= $date ;
        }
        else{
            $date1 = date("Y")-1;
            $date2 = date("Y");
            $date = "$date1$date2";
            $_SESSION['date']= $date ;
        }
        
       

                        $query = "SELECT  * FROM spiski_".$date." WHERE klass = '$klass'";
                        mysql_query("SET NAMES UTF8");
                        $result2=mysql_query($query);
                        
                        $query_2 = "SELECT  * FROM spiski_".$date." WHERE klass = '$klass'";
                        mysql_query("SET NAMES UTF8");
                        $result_2=mysql_query($query_2);
                        
                        
                        
                        $name = $_GET['s'];
                        $id_student = $_GET['i'];
                        $submit_sash=$_POST['submit_sash'];
                       
                        $lateness_number = $_POST['lateness']; //опоздания
                        $bad_hooky = $_POST['bad_hooky'];//неуважительный прогул
                            
                        $no_card_number = $_POST['nocard'];//кол-во раз бе карты
                        $business_number = $_POST['business'];//кол-во общешкольных дел
                        
                        $bform1 =$_POST['businessnameform1'];
                        $bform2 =$_POST['businessnameform2'];
                        $bform3 =$_POST['businessnameform3'];
                        $bform4 =$_POST['businessnameform4'];
                        $bform5 =$_POST['businessnameform5'];
                        $bform6 =$_POST['businessnameform6'];
                        $bform7 =$_POST['businessnameform7'];
                        $bform8 =$_POST['businessnameform8'];
                        $bform9 =$_POST['businessnameform9'];
                        $bform10 =$_POST['businessnameform10'];
                        $bform11 =$_POST['businessnameform11'];
                        $bform12 =$_POST['businessnameform12'];
                        $bform13 =$_POST['businessnameform13'];
                        $bform14 =$_POST['businessnameform14'];
                        $bform15 =$_POST['businessnameform15'];
                        $bform16 =$_POST['businessnameform16'];
                        $bform17 =$_POST['businessnameform17'];
                        $bform18 =$_POST['businessnameform18'];
                        $bform19 =$_POST['businessnameform19'];
                        $bform20 =$_POST['businessnameform20'];
                        
                        $b1 = $_POST['b1'];
                        $b2 = $_POST['b2'];
                        $b3 = $_POST['b3'];
                        $b4 = $_POST['b4'];
                        $b5 = $_POST['b5'];
                        $b6 = $_POST['b6'];
                        $b7 = $_POST['b7'];
                        $b8 = $_POST['b8'];
                        $b9 = $_POST['b9'];
                        $b10 = $_POST['b10'];
                        $b11 = $_POST['b11'];
                        $b12 = $_POST['b12'];
                        $b13 = $_POST['b13'];
                        $b14 = $_POST['b14'];
                        $b15 = $_POST['b15'];
                        $b16 = $_POST['b16'];
                        $b17 = $_POST['b17'];
                        $b18 = $_POST['b18'];
                        $b19 = $_POST['b19'];
                        $b20 = $_POST['b20'];
                        
                        
                        
                        $business= $b1 + $b2 + $b3 + $b4 + $b5 + $b6 + $b7 + $b8 + $b9 + $b10 + $b11 + $b12 + $b13 + $b14 + $b15 + $b16 + $b17 + $b18 + $b19 + $b20;
                        $lateness=($lateness_number+$bad_hooky)*(-5); //подсчёт опозданий + пропусков по неуважительной причине
                        $nocard=$no_card_number*(-5);
                        
                        
                        $sum_rait_sash=$lateness+$nocard+$business;
                       
                        
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
                            

<script type="text/javascript">
  function check1(lateness) {
    if (lateness.length < 1) document.getElementById("e_lateness").style.display = "none";
    else document.getElementById("e_lateness").style.display = "inline";
  }
  function check3(business){
      if (business.length < 1) document.getElementById("e_business").style.display = "none";
    else document.getElementById("e_business").style.display = "inline";
  }
  function check2(nocard){
      if (nocard.length < 1) document.getElementById("e_nocard").style.display = "none";
    else document.getElementById("e_nocard").style.display = "inline";
  }
</script>
                         
                               
<html>
<head>
        <link rel="stylesheet" href="css/css.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="https://code.jquery.com/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"><!--глификонки-->
        <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="css/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/css/bootstrap.css">
        <link rel="stylesheet" href="css/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/css.css">
<title> </title>
</head>

<body>                                               
    <div class="container-fluid">
        <div class="row"> <!-- //////////////////////HEADER//////////////-->
           <div class="col-lg-3 hidden-xs" > <!--///////////////Эмблема/////////////-->
               <span id="emblema"><img src="images/img4.png" alt="ГБОУ школа №109" /></span>
            </div>
            <div class="col-lg-10 col-xs-18"><!--///////////////Меню/////////////-->
                <div class="row">
                        <div class="col-lg-16 col-xs-18 ">
                            <h1 class="hidden-xs" style="margin-top: 30px; text-align: center;">Подсчёт рейтинга <?php echo $klass;?> класса за <?php echo $chetvert;?> четверть</h1>
                            <h3 class=" visible-xs " style="margin-top: 30px; text-align: center;">Подсчёт рейтинга <?php echo $klass;?> класса за <?php echo $chetvert;?> четверть</h3>
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
                                    
                                </div>
                                <!-- Collection of nav links and other content for toggling -->
                                <div id="navbarCollapse" class="col-lg-8 col-lg-offset-4 col-md-10 col-md-offset-3 col-sm-12 col-sm-offset-2 collapse navbar-collapse">
                                    <a href="#" class="navbar-brand">
                                        <?php echo $klass ?>
                                    </a>
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
                                        <li>
                                            
                                        </li>
                                    </ul>
                                    <ul class="nav navbar-nav  "> <div class="">
                                        <form  method="post" style="" >
                                            <?php if(($admin == 1)){ echo " 
                                               <select style='width:170px; display: inline-block;' class='select form-control' name='k'>   
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
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>                             <option value='7А'>7 А</option>
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
                                                </select>
                                            ";}?>
                                                <select style="width:170px; display: inline-block;" id="select_index" name="ch" class="select form-control">
                                                    <option value="">Выберите четверть</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                 <select style="width:170px; display: inline-block;"  id="select_index" name="tip_podscheta"  class="select  form-control ">
                                                            <option value="">Выберите тип рейтинга</option>
                                                            <option value="marks">"Оценки"</option>
                                                            <option value="sash">"САШ"</option>
                                                            <option value="marks_sash">"Оценки" и "САШ"</option>
                                                            <option value="just_look">"Посмотреть результаты</option>
                                                </select>
                                            <input style="margin-right: 20px;" class="btn btn-info " type="submit" name="submit" value="Выбрать">
                                        </form>  
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>  
            </div>
        </div>
        <div class="row"> <!--///////////////////////CONTAINER///////////-->
            <div class="col-lg-3 col-lg-offset-0 col-lg-push-0 col-md-4 col-md-push-13 col-sm-3 col-sm-push-13 hidden-xs"><!--//////Список класса(ЛЕВАЯ КОЛОНКА)////////-->
                <div class="col-lg-16 " id="spisok_klassa" style=" padding-top: 0;" >
                   <?php  include("spisok_klassa_sash.php");?>
                </div>
                
            </div>
            <div class="col-lg-10 col-lg-pull-0 col-md-12 col-md-pull-3 col-sm-13 col-sm-pull-3  content"  ><!--//////ЦЕНТРАЛЬНАЯ КОЛОНКА////////-->
                <form action="" method="post" class="<?php if($key == 'close'){?> hidden-lg <?php } ?>" >  
                         
                    
                    
                                        <!-- Кнопка, вызывающее модальное окно СПИСОК -->
                                        
                                            <a href="#myModal1" class="hidden-lg visible-xs btn btn-primary" data-toggle="modal" style="float:right; margin: 20px 20px 0 0;"> Список класса</a>  
                                            <!-- HTML-код модального окна -->
                                            <div id="myModal1" class="modal fade">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <!-- Заголовок модального окна -->
                                                  <div class="modal-header" >
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h2 style="color:darkred;">Список класса</h2>
                                                  </div>
                                                  <!-- Основное содержимое модального окна -->
                                                  <div class="modal-body">
                                                      <?php include("spisok_klassa_sash.php");?>
                                                  </div>
                                                  <!-- Футер модального окна -->
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            
                                        <!-- Кнопка, вызывающее модальное окно F.A.Q. -->
                                        
                                            <a href="#myModal" class="hidden-lg btn btn-danger" data-toggle="modal" style="float:right; margin: 20px 20px 0 0;"> F.A.Q.</a>  
                                            <!-- HTML-код модального окна -->
                                            <div id="myModal" class="modal fade">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <!-- Заголовок модального окна -->
                                                  <div class="modal-header" >
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h2 style="color:darkred;">Часто задаваемые вопросы.</h2>
                                                  </div>
                                                  <!-- Основное содержимое модального окна -->
                                                  <div class="modal-body">
                                                      <div style="text-align: center;"> <?php include("questions.php");?> </div>
                                                  </div>
                                                  <!-- Футер модального окна -->
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
<!--                       -->

                    <div class="form-group "> 
                        
                        <h1 class='rait_name'>Рейтинг "САШ"</h1>
                        <hr>
                        <blockquote class="font2">1) Выберите ученика из списка <?php if($name <> ''){echo ("<div style='color:#00cc00;margin-left:10px; ' class='glyphicon glyphicon-ok'></div>");}
                                                                                      else {echo ("<div style='color: red;margin-left:10px;' class='glyphicon glyphicon-remove'></div>");} ?>
                        </blockquote>
                        

                        <blockquote class="font2">Количество опозданий, пропусков <?php echo "$name"?>
                            <footer class="font2">Написать количество опозданий ученика</footer>

                            <input style="display: inline-block;" onkeyup="check1(this.value)" class="form-control pole_width"   name="lateness" type="text" 
                               value="Поле №2" 
                               onfocus="if (this.value == 'Поле №2') this.value = '';"
                               onblur="if (this.value == '') this.value = 'Поле №2';"> 
                        <div  id="e_lateness" style='color:#00cc00;margin-left:10px; display: none; ' class='glyphicon glyphicon-ok'></div> 
                        
                        </blockquote>
                         <br/> 
                        <blockquote class="font2">Количество раз без карточки
                            <footer class="font2">Написать количество раз, когда ученик приходил без индетифиционной карты</footer>

                        <input style="display: inline-block;" onkeyup="check2(this.value)" class="form-control pole_width"   name="nocard" type="text" 
                               value="Поле №4" 
                               onfocus="if (this.value == 'Поле №4') this.value = '';"
                               onblur="if (this.value == '') this.value = 'Поле №4';">
                        <div  id="e_nocard" style='color:#00cc00;margin-left:10px; display: none; ' class='glyphicon glyphicon-ok'></div> 
                        
                        </blockquote>
                         <br/> 
                        <blockquote class="font2">Количество общешкольных дел
                            <footer class="font2">Написать сумарное количество участий ученика в различных школьных мероприятиях. (Олимпиады, участие в проектах, выступления итд)</footer>

                        <input style="display: inline-block;" onkeyup="check3(this.value)" class="form-control pole_width"    name="business" type="text" 
                               value="Поле №5" 
                               onfocus="if (this.value == 'Поле №5') this.value = '';"
                               onblur="if (this.value == '') this.value = 'Поле №5';">
                        <div  id="e_business" style='color:#00cc00;margin-left:10px; display: none; ' class='glyphicon glyphicon-ok'></div> 
                        
                        </blockquote>
                                        <script language='JavaScript' type="text/javascript">
                                            var i = 1;

                                            function add(){
                                                if (i<21){
                                              document.getElementById('businessname').innerHTML = document.getElementById('businessname').innerHTML +
                                                      i + ')' + "<input class='form-control ' style='width:260px; display: inline;' type='text' name='businessnameform" + i + "'/>" + "<select style='display: inline-block; margin-left: 50px;' class='select' name='b" + i + "' > <option value='5'>5</option> <option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option><option value='0'>0</option><option value='-1'>-1</option><option value='-2'>-2</option><option value='-3'>-3</option><option value='-4'>-4</option><option value='-5'>-5</option> </select>" + "<br/>" + "<br/>";

                                            i++, i<21;
                                            }}


                                        </script>

                         <br/> 
                        <blockquote class="font2">Описать мероприятия
                            <footer class="font2">Нажмите кнопку "Добавить поле" столько раз, сколько мероприятий посетил ученик(не более 20). Напишите в каких мероприятих он учавствовал.</footer>


                        <input class="btn-info" type='button' value='Добавить поле' onClick="add()">

                        <br/><br/>
                        <text class="font2"  style=" margin:0 200px 0 50px; text-decoration: underline;">Описание</text> <text style="text-decoration: underline;"> Кол-во баллов</text>
                        <div id="businessname">
                            <br/>
                        </div>
                         </blockquote>
                        <br/>
                        <blockquote >
                            <footer class="font2">Нажмите кнопку "Посчитать" для того, чтобы посчитать рейтинг выбранного ученика</footer>
                        <br/>
                        <input class="btn btn-success" name="submit_sash" type="submit" value="Посчитать">   
                        </blockquote>
                        </div>
                </form>
                <form action="download_marks.php" class="<?php if($key == 'close'){?> hidden-lg <?php } ?>"> 
                    <input   class="btn btn-warning form-control" style="max-width: 500px;" text-align="center" name="download" type="submit" value="Посмотреть рейтинг 'Оценки' ">
                </form>
                <form action="download_sash.php" class="<?php if($key == 'close'){?> hidden-lg <?php } ?>"> 
                    <input   class="btn btn-danger form-control" style="max-width: 500px; margin-bottom: 15px;" text-align="center" name="download" type="submit" value="Посмотреть рейтинг 'САШ' ">
                </form>
                <div class="<?php if($key == 'open'){?> hidden-lg <?php } ?>">
                    <div class="" style="color:#ea5d1f; font-size:36px;  text-align: center; text-shadow: 1px 1px 2px black; ">Данная четверть закрыта для изменений!</div>
                    <div class="col-lg-offset-5 col-lg-6 fa fa-lock" style="color:#d82222; font-size: 450px; text-shadow: 2px 2px 5px black, 0px 0px 10px red; " ></div>
                </div>
            </div>
            
            
            
            
            
            <div class="col-lg-3 hidden-md  hidden-sm hidden-xs "><!--//////ПРАВАЯ КОЛОНКА////////-->
                <h2 style="color:darkred;">Часто задаваемые вопросы.</h2>
                <div class="row">
                    <p class="col-lg-9 parag" style="margin: 0;">Как это работает?</p>
                    <div class="block-wrap col-lg-4">
                        <div class="block-img"><img  src="ques.png">
                            <div class="row">
                                <div class="block-text col-lg-16">
                                    <p>Этот сайт-программа поможет Вам посчитать рейтинг учеников не прикладывая массу усилий! 
                                        Вам просто надо внести все оценки ученика, его достижения и опоздания, затем нажать кнопку "Посчитать" - ГОТОВО!
                                        Рейтинг ученика посчитан.</p>
                                </div>
                            </div>    
                        </div>    
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <p class="col-lg-9 parag" style="margin: 0;">Как вносить оценки?</p>
                    <div class="block-wrap col-lg-4">
                        <div class="block-img"><img   src="ques.png">
                            <div class="block-text">
                                <p>Чтобы внести оценки Вам надо скопировать/напечатать все оценки ученика в поле "Все оценки ученика"(первое поле).</p>
                            </div>
                        </div>    
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <p class="col-lg-9 parag" style="margin: 0;">Как выбрать ученика?</p>
                    <div class="block-wrap col-lg-4">
                        <div class="block-img"><img   src="ques.png">
                            <div class="block-text"> 
                                <p>Чтобы выбрать ученика нажмите слева на кнопку "Списсок класса <?php echo $klass;?>", затем нажмите на имя того ученика, чей рейтинг хотите посчитать.</p>
                            </div>
                        </div>    
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <p class="col-lg-9 parag" style="margin: 0;">Как/куда вносить опоздания и пропуски?</p>
                    <div class="block-wrap col-lg-4">
                        <div class="block-img"><img   src="ques.png">
                            <div class="block-text">
                                <p>В поле №2 внесите количество опозданий ученика.</p>
                                <p>В поле №3 внесите количество опозданий ученика по НЕУВАЖИТЕЛЬНОЙ причине.</p>
                            </div>
                        </div>    
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <p class="col-lg-9 parag" style="margin: 0;">Как/куда вносить данные по карточкам?</p>
                    <div class="block-wrap col-lg-4">
                        <div class="block-img"><img   src="ques.png">
                            <div class="block-text"> 
                                <p>В поле №3 напишите количество раз, сколько ученик проходил в школу без идентификационной карты(пропуск).</p>
                            </div>
                        </div>    
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <p class="col-lg-9 parag" style="margin: 0;">Как/куда вносить достижения?</p>
                    <div class="block-wrap col-lg-4">
                        <div class="block-img"><img   src="ques.png">
                            <div class="block-text">
                                <p>В поле №5 внесите КОЛИЧЕСТВО достижений(все дела).</p>
                                <p>Затем нажмите кнопку "Добавить поле" столько раз, сколько достижений у ученика.(не более 20)</p>
                                <p>В каждом появившемя поле опишите достижение и выберите сколько начислять ученику за него баллов.(Критерии Вы можете посмотреть на главной странице)</p>
                            </div>
                        </div>    
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <p class="col-lg-9 parag" style="margin: 0;">Как посмотреть что получилось?</p>
                    <div class="block-wrap col-lg-4">
                        <div class="block-img"><img   src="ques.png">
                            <div class="block-text">
                                <p>Если Вы хотите увидеть результаты рейтинга "Оценки", то перейдите по ссылке "Рейтинг 'Оценки'" в начале страницы(в меню) и в конце страницы "Посмотреть рейтинг 'Оценки'" </p>
                                <p>Если Вы хотите увидеть результаты рейтинга "САШ", то перейдите по ссылке "Рейтинг 'САШ'" в начале страницы(в меню) и в конце страницы "Посмотреть рейтинг 'САШ'" </p>
                            </div>
                        </div>    
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <p class="col-lg-9 parag" style="margin: 0;">Что делать, если я неправильно внёс данные?</p>
                    <div class="block-wrap col-lg-4">
                        <div class="block-img"><img   src="ques.png">
                            <div class="block-text">
                                <p>Если Вы случайно внесли неверные данные или наали кнопку не заполнив все поля ученика, то просто выберите его заного и внести все данные полностью. Затем намите кнопку "Посчитать".</p>
                            </div>
                        </div>    
                    </div>
                </div>
                <hr/><!--///////////////////////////////////////////////////////ОБРАТНАЯ СВЯЗЬ///////////////////////////////////////////////////////////-->    
                <div class="row">
                    <div class="col-lg-14 col-lg-offset-1" style="border-style: double; border-color:#d58512;">
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
            </div>
        </div>
        <div class="row"><!-- ////////////////FOOTER//////////////-->
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-16">
                <div class="row">
                    <div class="col-lg-16 col-md-16 col-sm-16 col-xs-16" >
                    По всем вопросам обращайтесь к Nзвекову Александру Дмитриевичу <br/><text style="font-weight: bold;">e-mail:<a href="mailto:sasizvekv@yandex.ru?subject=rating">  sasizvekv@yandex.ru</a></text><br/>
                       <text style="font-weight: bold;"> тел. <a href="tel:+79162251733">8(916)2251733</a></text> 
                    </div>
                </div>    
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-16 " style="text-align:center;">
                <span style="text-align: center; word-spacing: 20px; letter-spacing: 5px;">All rights reserved</span>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-16   futer" >
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
        </div>
            
                   
 
            
                
                



</td>
            
</tr>
        
    </div>
	
            
           
        
       
        
        
    
</body>
</html>