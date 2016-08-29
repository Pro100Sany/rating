<?php
header('Content-Type: text/html; charset=utf-8'); 
error_reporting(0);
session_start();
 

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

include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	

                        $query = "SELECT  * FROM spiski WHERE klass = '$klass'";
                        mysql_query("SET NAMES UTF8");
                        $result2=mysql_query($query);
                        
                        
                        
                        $name = $_GET['s'];
                        $id_student = $_GET['i'];
                        $marks  = $_POST['marks'];
                        $submit_all=$_POST['submit_all'];
                        
                        $arr_marks =    str_split($marks);                  //разделяем строку на массив
                        $count_marks =  (array_count_values ($arr_marks)) ; //количество оценок по отдельности - массив
                                  
                         
                        $mark_5 = $count_marks['5'];                    //кол-во 5 в переменную
                        $mark_4 = $count_marks['4'];                    //кол-во 4 в переменную    
                        $mark_3 = $count_marks['3'];                    //кол-во 3 в переменную 
                        $mark_2 = $count_marks['2'];                    //кол-во 2 в переменную 
                        $mark_1 = $count_marks['1'];                    //кол-во 1 в переменную 
                        
                        
                        
                       
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
                            

 
                         
                               
<html>
<head>
        <link rel="stylesheet" href="css/css.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="https://code.jquery.com/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="css/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/css/bootstrap.css">
        <link rel="stylesheet" href="css/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/css.css">
<title> </title>
</head>

<body>                                               
    <table style="width: 100%;border-style: solid;" >
            <tr>
                <td><img src="images/img4.png" alt="ГБОУ школа №109" /></td>
                
                <td >
                   <div class="row">
                        <div class="col-lg-16">
                            <h1 style="margin-top: 30px; text-align: center;">Подсчёт рейтинга <?php echo $klass;?> класса за <?php echo $chetvert;?> четверть</h1>

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
                                    <ul class="nav navbar-nav navbar-right ">
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
                                                </select>
                                            ";}?>
                                                <select style="width:170px; display: inline-block;" id="select_index" name="ch" class="select form-control">
                                                    <option value="false">Выберите четверть</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            <input style="margin-right: 20px;" class="btn btn-info " type="submit" name="submit" value="Выбрать">
                                        </form>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>  
                </td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 22%; border-style: solid;"valign="top" >
                    
<!--///////////////////////////////////////////Выпадающий список классов-///////////////////////////////////////////////////////////-->        


                    <div id="spisok_klassa" style=" padding-top: 0;" >
                        <div class="dropdown">
                             <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Список класса <?php echo $klass;?>
                            </button>
                        <ul class="dropdown-menu" >
                            
                          <?php  while ($row2 = mysql_fetch_array($result2)) { 
                              $tipklassa = $row2['tipklassa'];
                              ?>
                            <li><a class="student_list" href="student.php?s=<?=$row2['name'] ?>&i=<?=$row2['id'] ?>"class="name"><?=$row2['name']?></a></li>
                             <?php }
                                "$tipklassa";
                         if($tipklassa <> 2 ){
                            $sum_rait_marks = $mark_5*5 + $mark_4*4 + $mark_3*0 + $mark_2*(-5) + $mark_1*(-6);
                         }
                         else   {
                            $sum_rait_marks = $mark_5*5 + $mark_4*4 + $mark_3*(-3) + $mark_2*(-5) + $mark_1*(-6);   
                         }
                         
                       

////////////////////////////////////Проверка бд первой четверти////////////////////////////////////////////////////////////1/

                        $q = "SELECT * FROM marks_1 WHERE id_student='$id_student'";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($q);
                        $row4 = mysql_fetch_array($result)  ;
                        $id_student_check = $row4['id_student'];
                        $chetvert_get = $row4['chetvert'];
                        
////////////////////////////////////Проверка бд ВТОРОЙ четверти////////////////////////////////////////////////////////////2/          
                        
                        $qw = "SELECT * FROM marks_2 WHERE id_student='$id_student'";
                        mysql_query("SET NAMES UTF8");
                        $result0=mysql_query($qw);
                        $row0 = mysql_fetch_array($result0)  ;
                        $id_student_check_2 = $row0['id_student'];
                        $chetvert_get_2 = $row0['chetvert'];
                            
                            
////////////////////////////////////Проверка бд ТРЕТЬЕЙ четверти////////////////////////////////////////////////////////////3/          
                        
                        $qw = "SELECT * FROM marks_3 WHERE id_student='$id_student'";
                        mysql_query("SET NAMES UTF8");
                        $result0=mysql_query($qw);
                        $row0 = mysql_fetch_array($result0)  ;
                        $id_student_check_3 = $row0['id_student'];
                        $chetvert_get_3 = $row0['chetvert'];
                            
////////////////////////////////////Проверка бд ВТОРОЙ четверти////////////////////////////////////////////////////////////4/          
                        
                        $qw = "SELECT * FROM marks_4 WHERE id_student='$id_student'";
                        mysql_query("SET NAMES UTF8");
                        $result0=mysql_query($qw);
                        $row0 = mysql_fetch_array($result0)  ;
                        $id_student_check_4 = $row0['id_student'];
                        $chetvert_get_4 = $row0['chetvert'];
                                                       

                            
///////////////////////////////////////////////////////////////////Запись первой четверти ///////////////////////////////////
                        if (isset($submit_all) ) {    
                            
                                if (($id_student_check=='') AND ($chetvert == '1')) {
                                $query3= "INSERT INTO marks_1 (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business, sum_rait_marks, sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business', '$sum_rait_marks', '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business, sum_rait_marks, sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business', '$sum_rait_marks', '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                }
                                          
                              if (($id_student_check >0) AND ($chetvert_get == $chetvert)) {
                                 $query = "UPDATE  marks_1 SET klass='$klass', name='$name', m4='$mark_4', m5='$mark_5', m3='$mark_3', m2='$mark_2', m1='$mark_1', bform1='$bform1', bform2='$bform2', bform3='$bform3', bform4='$bform4', bform5='$bform5', bform6='$bform6', bform7='$bform7', bform8='$bform8', bform9='$bform9', bform10='$bform10', bform11='$bform11', bform12='$bform12', bform13='$bform13', bform14='$bform14', bform15='$bform15', bform16='$bform16', bform17='$bform17', bform18='$bform18', bform19='$bform19', bform20='$bform20', lateness='$lateness', nocard='$nocard', business='$business', sum_rait_marks='$sum_rait_marks', sum_rait_sash='$sum_rait_sash' WHERE id_student='$id_student' " ;  
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                               
                               
///////////////////////////////////////////////////////////////////////Запись второй четверти///////////////////////////////////
                               
                               
                               if (($id_student_check_2=='') AND ($chetvert == '2')) {
                                $query3= "INSERT INTO marks_2 (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business, sum_rait_marks, sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business', '$sum_rait_marks', '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double_2 (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business, sum_rait_marks, sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business', '$sum_rait_marks', '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                               }          
                              if (($id_student_check_2 >0) AND ($chetvert_get_2 == $chetvert)) {
                                 $query = "UPDATE  marks_2 SET klass='$klass', name='$name', m4='$mark_4', m5='$mark_5', m3='$mark_3', m2='$mark_2', m1='$mark_1', bform1='$bform1', bform2='$bform2', bform3='$bform3', bform4='$bform4', bform5='$bform5', bform6='$bform6', bform7='$bform7', bform8='$bform8', bform9='$bform9', bform10='$bform10', bform11='$bform11', bform12='$bform12', bform13='$bform13', bform14='$bform14', bform15='$bform15', bform16='$bform16', bform17='$bform17', bform18='$bform18', bform19='$bform19', bform20='$bform20', lateness='$lateness', nocard='$nocard', business='$business', sum_rait_marks='$sum_rait_marks', sum_rait_sash='$sum_rait_sash' WHERE id_student='$id_student' " ;  
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                               
                               ///////////////////////////////////////////////////////////////////////Запись ТРЕТЬЕЙ четверти///////////////////////////////////
                               
                               
                               if (($id_student_check_3=='') AND ($chetvert == '3')) {
                                $query3= "INSERT INTO marks_3 (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business, sum_rait_marks, sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business', '$sum_rait_marks', '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double_3 (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business, sum_rait_marks, sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business', '$sum_rait_marks', '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                }
                                          
                              if (($id_student_check_3 >0) AND ($chetvert_get_3 == $chetvert)) {
                                 $query = "UPDATE  marks_3 SET klass='$klass', name='$name', m4='$mark_4', m5='$mark_5', m3='$mark_3', m2='$mark_2', m1='$mark_1', bform1='$bform1', bform2='$bform2', bform3='$bform3', bform4='$bform4', bform5='$bform5', bform6='$bform6', bform7='$bform7', bform8='$bform8', bform9='$bform9', bform10='$bform10', bform11='$bform11', bform12='$bform12', bform13='$bform13', bform14='$bform14', bform15='$bform15', bform16='$bform16', bform17='$bform17', bform18='$bform18', bform19='$bform19', bform20='$bform20', lateness='$lateness', nocard='$nocard', business='$business', sum_rait_marks='$sum_rait_marks', sum_rait_sash='$sum_rait_sash' WHERE id_student='$id_student' " ;  
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                               
                               ///////////////////////////////////////////////////////////////////////Запись ЧЕТВЕРТОЙ четверти///////////////////////////////////
                               
                               
                               if (($id_student_check_4=='') AND ($chetvert == '4')) {
                                $query3= "INSERT INTO marks_4 (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business, sum_rait_marks, sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business', '$sum_rait_marks', '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double_4 (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business, sum_rait_marks, sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business', '$sum_rait_marks', '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                }
                                          
                              if (($id_student_check_4 >0) AND ($chetvert_get_4 == $chetvert)) {
                                 $query = "UPDATE  marks_4 SET klass='$klass', name='$name', m4='$mark_4', m5='$mark_5', m3='$mark_3', m2='$mark_2', m1='$mark_1', bform1='$bform1', bform2='$bform2', bform3='$bform3', bform4='$bform4', bform5='$bform5', bform6='$bform6', bform7='$bform7', bform8='$bform8', bform9='$bform9', bform10='$bform10', bform11='$bform11', bform12='$bform12', bform13='$bform13', bform14='$bform14', bform15='$bform15', bform16='$bform16', bform17='$bform17', bform18='$bform18', bform19='$bform19', bform20='$bform20', lateness='$lateness', nocard='$nocard', business='$business', sum_rait_marks='$sum_rait_marks', sum_rait_sash='$sum_rait_sash' WHERE id_student='$id_student' " ;  
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                        }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
                        echo "$admin";
                       ?> 
                                 
                           
                        </ul>
                        </div>
                    </div>
                    <div>
<!---////////////////////////////////////////////////////////Список уже в базе///////////////////////////////////////////////////////-->
                        <?php
                        $query = "SELECT * FROM marks_$chetvert WHERE klass = '$klass' ORDER BY name";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($query);  
                          while ($row = mysql_fetch_array($result)) { ?>
                        
                        <ul  >  
                            <li style="list-style-type: none; color:#808080; "  ><?php echo $row['name']?></li>
                         </ul>     
                              <?php  } ?> 
                        
                        
                           
                        
                    </div>    
                </td>
                
<!---////////////////////////////////////////////////////////Поля для заполнения///////////////////////////////////////////////////////-->

                <td style="width: 56%; border-style: solid; padding: 10px;">
                    <form action="" method="post" >  
                         
                          <h1 class='rait_name'>Рейтинг "Оценки"</h1>
                          <hr>
                          
                        <div class="form-group"> 
                                <br/>       
                                <blockquote>Все оценки <?php echo "$name"?>; 
                                    <footer>Написать(скопировать) все оценки ученика за четверть в одну строку.</footer>
                                
                                
                                <input  class="form-control" width="600px;"  name="marks" type="text" 
                                        value="Все оценки ученика" 
                                        onfocus="if (this.value == 'Все оценки ученика') this.value = '';"
                                        onblur="if (this.value == '') this.value = 'Все оценки ученика';">
                                </blockquote>
                                <br/>				
                                <h1 class='rait_name'>Рейтинг "САШ"</h1>
                                <hr>
								
                                <blockquote >Количество опозданий, пропусков
                                    <footer>Написать количество опозданий ученика</footer>
                                
                                <input class="form-control" style="width:90px;" name="lateness" type="text" 
                                       value="Поле №2" 
                                       onfocus="if (this.value == 'Поле №2') this.value = '';"
                                       onblur="if (this.value == '') this.value = 'Поле №2';">
                                
                                <footer>Написать количество пропусков по НЕУВАЖИТЕЛЬНОЙ</footer>
                                <input class="form-control" style="width:90px;" name="bad_hooky" type="text" 
                                       value="Поле №3" 
                                       onfocus="if (this.value == 'Поле №3') this.value = '';"
                                       onblur="if (this.value == '') this.value = 'Поле №3';">
                                
                                </blockquote>
                                 <br/> 
                                <blockquote >Количество раз без карточки
                                    <footer>Написать количество раз, когда ученик приходил без индетифиционной карты</footer>
                                
                                <input class="form-control"  style="width:90px;  " name="nocard" type="text" 
                                       value="Поле №4" 
                                       onfocus="if (this.value == 'Поле №4') this.value = '';"
                                       onblur="if (this.value == '') this.value = 'Поле №4';">
                                </blockquote>
                                 <br/> 
                                <blockquote >Количество общешкольных дел
                                    <footer>Написать сумарное количество участий ученика в различных школьных мероприятиях. (Олимпиады, участие в проектах, выступления итд)</footer>
                                
                                <input class="form-control"  style="width:90px;" name="business" type="text" 
                                       value="Поле №5" 
                                       onfocus="if (this.value == 'Поле №5') this.value = '';"
                                       onblur="if (this.value == '') this.value = 'Поле №5';">
                                </blockquote>
                                                <script language='JavaScript' type="text/javascript">
                                                    var i = 1;
                                                   
                                                    function add(){
                                                        if (i<21){
                                                      document.getElementById('businessname').innerHTML = document.getElementById('businessname').innerHTML +
                                                              i + ')' + "<input class='form-control' style='width:260px; display: inline;' type='text' name='businessnameform" + i + "'/>" + "<select style='display: inline-block; margin-left: 50px;' class='select' name='b" + i + "' > <option value='5'>5</option> <option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option><option value='0'>0</option><option value='-1'>-1</option><option value='-2'>-2</option><option value='-3'>-3</option><option value='-4'>-4</option><option value='-5'>-5</option> </select>" + "<br/>" + "<br/>";

                                                    i++, i<21;
                                                    }}


                                                </script>
                                                    
                                 <br/> 
                                <blockquote >Описать мероприятия
                                    <footer>Нажмите кнопку "Добавить поле" столько раз, сколько мероприятий посетил ученик(не более 20). Напишите в каких мероприятих он учавствовал.</footer>
                                
                                
                                <input class="btn-info" type='button' value='Добавить поле' onClick="add()">
                               
                                <br/><br/>
                                <text  style=" margin:0 200px 0 50px; text-decoration: underline;">Описание</text> <text style="text-decoration: underline;"> Кол-во баллов</text>
                                <div id="businessname">
                                    <br/>
                                </div>
                                 </blockquote>
                                <br/>
                                <blockquote >
                                    <footer>Нажмите кнопку "Посчитать" для того, чтобы посчитать рейтинг выбранного ученика</footer>
                                <br/>
                                <input class="btn btn-success" name="submit_all" type="submit" value="Посчитать">   
                                </blockquote>
                                </div>
                    </form>

                    <h2><span style="color:red;">Рейтинг "Оценки"</span><?php echo ' '.$name.":"."$sum_rait_marks"?></h2> <br />
                    <h2><span style="color:red;">Рейтинг "САШ"</span><?php echo ' '.$name.":"."$sum_rait_sash"?></h2> <br />
                    
                    <form action="download_marks.php"  ><!-- target="_blank" -->
                        <input   class="btn btn-warning" style="width: 500px;" text-align="center" name="download" type="submit" value="Посмотреть рейтинг 'Оценки' ">
                    </form>
                    <form action="download_sash.php"  ><!-- target="_blank" -->
                        <input   class="btn btn-danger" style="width: 500px;" text-align="center" name="download" type="submit" value="Посмотреть рейтинг 'САШ' ">
                    </form>
                </td>
                
 <!--///////////////////////////// ПРАВАЯ КОЛОНКА//////////////////////////////////////////////-->         
 
                <td style="width: 22%;border-style: solid;padding: 5px;"valign="top">
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
                    <hr/>
                    <div class="row">
                        <div class="col-lg-14 col-lg-offset-1" style="border-style: double; border-color:#d58512;">
                            <p class="col-lg-16  " style="font-size: 22px; color:#985f0d; margin: auto;">Не нашли ответ на свой вопрос?</p> 
                            <p class="col-lg-16  " style="font-size: 20px; color:#d58512; margin: 5px 0 10px 0 ;">Задайте его мне!</p>
                            
 <!--///////////////////////////////////////////////////////ОБРАТНАЯ СВЯЗЬ///////////////////////////////////////////////////////////-->                           
 
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
                </td>
            </tr>
            <tr>
                <td>По всем вопросам обращайтесь к Nзвекову Александру Дмитриевичу <br/><text style="font-weight: bold;">e-mail:<a href="mailto:sasizvekv@yandex.ru?subject=rating">  sasizvekv@yandex.ru</a></text><br/>
                   <text style="font-weight: bold;"> тел. <a href="tel:+79162251733">8(916)2251733</a></text></td>
                <td style="text-align: center; word-spacing: 20px; letter-spacing: 5px;">All rights reserved</td>
                <td>
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


</td>
            
</tr>
        
</table>
	
            
           
        
       
        
        
    
</body>
</html>