<?php 
header('Content-Type: text/html; charset=utf-8'); 
session_start();
error_reporting(0);

$date = $_SESSION['date'];

$admin = $_SESSION['adm'];
if($admin <> 1){
    header('location:../index.php') ;
}
include("../db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	

$submit_klass = $_POST['submit_klass'];
$submit_student = $_POST['submit_student'];

if((isset($submit_klass)) AND ($_POST['k']<>'')) {$_SESSION['k'] = $_POST['k']; }
 $klass = $_SESSION['k'];
 
if((isset($submit_student)) AND ($_POST['student']<>'')) {$_SESSION['student'] = $_POST['student']; }
 $student = $_SESSION['student'];


$query = "SELECT * FROM spiski_".$date." WHERE klass !='13Г' GROUP BY klass ORDER BY klass  ";
mysql_query("SET NAMES UTF8");
$result=mysql_query($query);
  
$query2 = "SELECT * FROM spiski_".$date." WHERE klass ='$klass' ORDER BY name  ";
mysql_query("SET NAMES UTF8");
$result2=mysql_query($query2);

//////////////////////CHANGE изменить ученика//////////////////////////////////
$change = $_POST['change'];
if ($change <> '') {
    $query3 = "SELECT * FROM spiski_".$date." WHERE  name = '$student' ";
    mysql_query("SET NAMES UTF8");
    $result3=mysql_query($query3);
}

$submit_new_student = $_POST['submit_new_student'];
$new_name  = $_POST['new_name'];
$new_klass = $_POST['new_klass'];
$new_tipklassa = $_POST['new_tipklassa'];


if(isset($submit_new_student)){
    $query_UPDATE = "UPDATE  spiski_".$date." SET  name='$new_name', klass='$new_klass', tipklassa='$new_tipklassa' WHERE name='$student' " ;  
     mysql_query("SET NAMES UTF8");
     mysql_query($query_UPDATE) or die(mysql_error());
     header('location:../adminpages/spiski_editor.php') ; 
}  
//////////////////////DELETE удалить ученика//////////////////////////////////
$delete_submit = $_POST['delete_submit'];
$delete = $_POST['delete'];
if ($delete == 'ДА'){
    $query4 = "DELETE FROM spiski_".$date." WHERE name='$student'";  
    mysql_query("SET NAMES UTF8");
    mysql_query($query4) or die(mysql_error());	
    header('location:../adminpages/spiski_editor.php') ;
    
}

//////////////////////INSERT добавить ученика//////////////////////////////////

$insert_submit = $_POST['insert_submit'];


$new_student_surname = $_POST['new_student_surname'];
$new_student_name = $_POST['new_student_name'];
$new_student_dadname = $_POST['new_student_dadname'];

$nsn = $new_student_surname.' '.$new_student_name.' '.$new_student_dadname;

$new_student_klass = $_POST['new_student_klass'];
$new_student_tipklassa = $_POST['new_student_tipklassa'];

$new_student_submit = $_POST['new_student_submit'];

                                          
if (isset($new_student_submit)){
    
    $str = mysql_query("SELECT MAX('id') FROM spiski_".$date."");
    while ($row_str = mysql_fetch_array($str)) { 
        $id_max=$row_str['id'];  
        $new_id = $id_max+1;
                         } 
    
    $query5 = "INSERT INTO spiski_".$date." (id, name, klass, tipklassa)VALUES ('$new_id', '$nsn', '$new_student_klass', '$new_student_tipklassa')"; 
    mysql_query("SET NAMES UTF8");
    mysql_query($query5) or die(mysql_error());
    header('location:../adminpages/spiski_editor.php') ;

    
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
          <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-10">
                  <h1>Редактор списков классов</h1>   
                 
<!--////////////////////////////////////НАВИГАЦИЯ ////////////////////////////////////////////////-->       

                 <div class="navbar navbar-inverse">
                     <div class="container">
                         <div class="navbar-header">
                             <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#responsive-menu">
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                             </button>
                             <span class="navbar-brand"><?php echo $klass ?></span>
                         </div>
                         <div class="collapse navbar-collapse" id="responsive-menu">
                             <ul class="nav navbar-nav">
                                 <li> 
                                     <a  href="../index.php">Главная</a>
                                 </li>
                                     <li><a href="../adminpages/password_editor.php">Редактор паролей</a>
                                     <li> <a href="../adminpages/spiski_editor.php" >Редактор списков</a></li>
                                 <li  >
                                     <li> <a href="../adminpages/new_spiski.php" >Обновить списки</a></li>
                                 </li>
                             </ul>        
                         </div>
                     </div>
                 </div>
              </div>
              <div class="col-lg-3"></div>
          </div>
          <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-10">
                  <div class="col-lg-8">
                      
<!--////////////////////////////////////////////ВЫБРАТЬ КЛАСС/////////////////////////////////////////////////-->

                      <form action="" method="post" >
                          <select class="form-control col-lg-16" name="k"  style="width:200px;" required>
                             <option value=''>Выберите класс</option>
                             <?php
                             while ($row = mysql_fetch_array($result)) { 
                             ?>
                             <option value='<?=$row['klass']?>'><?=$row['klass']?></option>
                             
                             <?php } ?>
                         </select>
                          <input type="submit" value="Выбрать" name="submit_klass" class="form-control"style="width:200px;"/>
                      </form>
                      <br/>
                      <br/>

<!--////////////////////////////////////////////ВЫБРАТЬ УЧЕНИКА////////////////////////////////////////////////////-->                      
                      
                      <form action="" method="post" >
                          <select  class="col-lg-16 form-control "  name="student" multiple="" size="15" style="width:350px;"  required>
                             <?php
                             while ($row2 = mysql_fetch_array($result2)) { 
                             ?>
                               <option  style="margin: 5px 0 5px 0;" value='<?=$row2['name']?>'><?=$row2['name']?></option></li>
                              
                             <?php } ?>
                             
                          </select>  
                          <input type="submit" value="Выбрать" name="submit_student" class="form-control"style="width:350px;"/>
                      </form>
                  </div>
                  
<!--/////////////////////РЕДАКТОР УЧЕНИКА/////////////////////////////////////-->

                  <div class="col-lg-8">
                      <div class="row">
                          <div class="student_editor col-lg-14 col-lg-offset-1">
                              <div class="student_editor_name col-lg-13  ">
                                  <span>
                                      <?php 
                                      echo $student; 
                                      ?>
                                  </span>
                              </div>
                              <div class="student_editor_klass col-lg-3 ">
                                  <span>

                                      <?php 
                                      echo $klass; 
                                      ?>
                                  </span>
                              </div>
                              <div class="row">
                                  
            <!--///////////////////////////////КНОПКА ИЗМЕНИТЬ///////////////////////////////////-->     
            
                                      <form class="student_editor_update col-lg-5 col-lg-offset-1" method="post" name="change"> 
                                          <input style="background-color: dimgray;"   type="submit" value="Изменить" name="change">
                                      </form>
                                  <div class="col-lg-16">
                                      <?php
                                      while ($row3 = mysql_fetch_array($result3)) { 
                                          $name = $row3['name'];
                                          $tipklassa = $row3['tipklassa'];
                                          if($tipklassa == 1){
                                              $tipklassa2 = 2;
                                          }
                                          elseif ($tipklassa == 2){
                                              $tipklassa2 = 1;
                                          }
                                          $tipklassa_called='Общеобразовательный';
                                          $tipklassa_called2='Лицейский';
                                              
                                          $klass = $row3['klass'];?>
                                      <form action="" method="post" name="change_student">
                                          <p style="color: floralwhite;">Ф.И.О.:</p>
                                          <input style="width: 300px;"  class="form-control" type="text" name="new_name" value="<?php echo $name?>">
                                          <p style="color: floralwhite;">Класс:</p>
                                          <input style="width: 100px;"  class="form-control" type="text" name="new_klass" value="<?php echo $klass?>">
                                          <p style="color: floralwhite;">Тип класса:</p>
                                          <select class="form-control" name="new_tipklassa"  style="width:220px;" >
                                              <?php 
                                              if ($tipklassa == 1){echo " 
                                              <option value='$tipklassa'>$tipklassa_called</option>
                                              <option value='$tipklassa2'>$tipklassa_called2</option>
                                                  ";} 
                                              elseif ($tipklassa == 2) {echo " 
                                              <option value='$tipklassa'>$tipklassa_called2</option>       
                                              <option value='$tipklassa2'>$tipklassa_called</option>
                                                  ";} 
                                                  ?>
                                          </select>
                                          <br />
                                          <input style="width: 100px;"  class="form-control btn btn-primary" type="submit" value="Поменять" name="submit_new_student" >
                                      </form>
                                      <?php }?>
                                  </div>
                              </div> 
                               <!--///////////////////////////////КНОПКА УДАЛИТЬ///////////////////////////////////--> 
                              <div class="row">    
                                  <form class="student_editor_delete col-lg-5 col-lg-offset-1" method="post">
                                       <input style="background-color: dimgray;"   type="submit" value="Удалить" name="delete_submit">
                                  </form>
                                  <div class="col-lg-16"> 
                                      <?php if($delete_submit <> '') { ?>
                                      <p style="font-size: 18px; color: floralwhite;">Вы уверены, что хотите <span style="color: #af1b1b;">УДАЛИТЬ</span> из списков:<span style="color: blue;"><?php echo $student; ?></span>?</p>
                                      <form action="#" method="post">
                                          <input class="col-lg-offset-5 col-lg-2 btn btn-success" type="submit" name="delete" value="ДА">
                                          <input class="col-lg-offset-2 col-lg-2 btn btn-danger" type="submit" name="delete" value='НЕТ'>
                                          
                                      </form>  
                                      <?php }?>
                                  </div>
                                  
                              </div>     
                               <!--///////////////////////////////КНОПКА ДОБАВИТЬ///////////////////////////////////--> 
                              <div class="row">    
                                  <form class="student_editor_remove col-lg-5 col-lg-offset-1" method="post">
                                       <input style="background-color: dimgray;"   type="submit" value="Добавить" name="insert_submit">
                                  </form>
                              </div>
                               <div class="col-lg-16"> 
                                      <?php if($insert_submit <> '') { ?>
                                      <form action="#" method="post">
                                          <p style="color: floralwhite;">Фамилия:</p>
                                          <input style="width: 200px;"  class="form-control" type="text" name="new_student_surname">
                                          <p style="color: floralwhite;">Имя:</p>
                                          <input style="width: 200px;"  class="form-control" type="text" name="new_student_name">
                                          <p style="color: floralwhite;">Отчество:</p>
                                          <input style="width: 200px;"  class="form-control" type="text" name="new_student_dadname">
                                          <p style="color: floralwhite;">Класс:</p>
                                          <input style="width: 100px;"  class="form-control" type="text" name="new_student_klass" >
                                          <p style="color: floralwhite;">Тип класса:</p>
                                          <select class="form-control" name="new_student_tipklassa"  style="width:220px;" >
                                              <option value='1'>Общеобразовательный</option>
                                              <option value='2'>Лицейский</option>
                                          </select>
                                          <input style="width: 100px;"  class="form-control btn btn-primary" type="submit" value="Добавить" name="new_student_submit" >
                                      </form>  
                                      <?php }?>
                               </div>
  
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3"></div>
          </div>
      </div>
      
  </body>
</html>
