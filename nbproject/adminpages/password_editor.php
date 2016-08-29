<?php 
header('Content-Type: text/html; charset=utf-8'); 
session_start();
error_reporting(0);

$admin = $_SESSION['adm'];
if($admin <> 1){
    header('location:../index.php') ;
}
include("../db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	

                        $query = "SELECT * FROM spiski WHERE klass !='13Г' GROUP BY klass ORDER BY klass  ";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($query);
                        
  $submit_log = $_POST['submit_log'];   
   
  if((isset($submit_log)) AND ($_POST['k']<>'') AND ($_POST['k']<>'decose')) {$_SESSION['k'] = $_POST['k']; }
  $klass = $_SESSION['k'];
                        
                        $query2 = "SELECT  * FROM users WHERE username = '$klass'";
                        mysql_query("SET NAMES UTF8");
                        $result2=mysql_query($query2);
           
/////////генератор пароля/////////////
if($_POST['number']<>'') {$_SESSION['number'] = $_POST['number']; }
 $number = $_SESSION['number'];
                       
 $submit_pass = $_POST['submit_pass'];    
  
if(isset($submit_pass)){
    
                      
       $new_pass = md5(uniqid(rand(),true));
       $new_pass."<br>";

    // Параметр $number - сообщает число 
      // символов в пароле


      function generate_password($number)
      {
        $arr = array('a','b','c','d','e','f',
                     'g','h','i','j','k','l',
                     'm','n','o','p','r','s',
                     't','u','v','x','y','z',
                     '0','1','2','3','4','5',
                     '6','7','8','9');
        // Генерируем пароль
        $pass = "";
        for($i = 0; $i < $number; $i++)
        {
          // Вычисляем случайный индекс массива
          $index = rand(0, count($arr) - 1);
          $pass .= $arr[$index];
        }
        return $pass;
      }
 }  
 
 ///////////////////изменение пароля в базе/////////////////////
$submit_pass_new = $_POST['submit_pass_new'];
$new_pass = base64_encode($_POST['new_pass']);
  
 if(isset($submit_pass_new)){
 $query_UPDATE = "UPDATE  users SET  password='$new_pass' WHERE username='$klass' " ;  
 mysql_query("SET NAMES UTF8");
 mysql_query($query_UPDATE) or die(mysql_error());
 header('location:../adminpages/password_editor.php') ;
 }  
  
?> 
<!doctype html>
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
    <title>Редактор паролей</title>
</head>
<body class="background">
    <div class="container-fluid ">
         <div class="row">
             <div class="col-lg-3"></div>
             <div class="col-lg-10">
                 <h1>Редактор паролей</h1>   
                 
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
                                     <a href="#">Пункт 3</a>
                                 </li>
                             </ul>        
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg3"></div>
         </div>
         <div class="row">
             <div class="col-lg-3"></div>
             <div class="col-lg-10">
                 <div class="col-lg-4">
                     
<!-- ///////////////////////////////ВЫБИРАЕМ КЛАСС//////////////////////////////////////////////-->        

                     <form method="POST" class="forma" >
                         <select class="form-control col-lg-16" name="k" required>
                             <option value=''>Выберите класс</option>
                             <?php
                             while ($row = mysql_fetch_array($result)) { 
                             ?>
                             <option value='<?=$row['klass']?>'><?=$row['klass']?></option>
                             <?php } ?>
                         </select>
                         <input type="submit" name="submit_log" value="Выбрать">
                     </form>
                    <form method="POST" class="forma">
                         <div class="col-lg-16 " style="float:left; text-align:center; font-size: 25px; color:#f8efc0;">
                             <h1 >ИЛИ</h1>
                         </div>
<!-- ///////////////////////////////ИЛИ ПИШЕМ ЛОГИН//////////////////////////////////////////////-->         
<p style="color: #e8e8e8">  Имя пользователя(Логин:)</p>
                         <input class="form-control col-lg-16" name="k" type="text" value="" onclick="this.value=''" required>
                         <input type="submit" name="submit_log" value="Выбрать" >
                     </form>
                 </div>
                 <div class="col-lg-4" ></div>
                 <div class="col-lg-8" >
                 
<!--/////////////////////////////ПРОСМОТР  ПАРОЛЯ///////////////////////////////////-->                    
                    
                     <table id="pas_tab" >
                         <tr>
                             <td style="border-bottom-style: double;">Логин</td>
                             <td class="pas_td" style="border-bottom-style: double;">Пароль</td>
                         </tr>
                         <tr>
                            <?php
                             while ($row2 = mysql_fetch_array($result2)) { 
                                 $old_pass=base64_decode($row2['password']);
                                 ?>
                             <td><?php echo $row2['username']?></td>
                             <td class="pas_td"><?php echo $old_pass?></td>
                             <?php }?>
                         </tr>
                         
                             
<!--///////////////////////////// ГЕНЕРАЦИЯ ПАРОЛЯ///////////////////////////////////--> 
                        <tr>
                             <td></td>
                             <td class="pas_td_new">Сгенерировать новый пароль:
                                 <form method="post">
                                    <input style="background-color:#e8e8e8; color: #444444;" type="text" name="number" value="10">  
                                    <input style="background-color:#e8e8e8; color: #444444;" type="submit" name="submit_pass" value="Генерировать">
                                 </form>  
                                 <div class="echo_new_pass">
                                     <?php echo generate_password(intval($number)); ?>
                                 </div>    
                             </td>
                        </tr>
<!--///////////////////////////// ИЗМЕНЕНИЕ ПАРОЛЯ///////////////////////////////////-->                              
                        <tr>
                            <td></td>
                            <td class="pas_td_2" style="text-align: left; top:0; padding: 5px; font-size: 18px;">Изменить пароль:
                                <form method="post" >
                                    <input style="background-color:#e8e8e8; color: #444444;" type="text" name="new_pass" >  
                                    <input style="background-color:#e8e8e8; color: #444444;" type="submit" name="submit_pass_new" value="Изменить">
                                 </form>  
                                
                            </td>
                            
                        </tr> 
                     </table>         
                 </div>
             </div>
             <div class="col-lg-3"></div>
         </div>
    </div>

    
   
    
</body>
</html>