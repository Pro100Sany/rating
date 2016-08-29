<?php 
header('Content-Type: text/html; charset=utf-8'); 
session_start();
set_time_limit(0);
error_reporting(0);

$date_new_spiski = date("n");
if ($date_new_spiski <6)
{
    header('location:close.php') ;
}

$admin = $_SESSION['adm'];
if($admin <> 1){
    header('location:../index.php') ;
}
include("../db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);

/////////////////////////////////ЧИТАЕМ ФАЙЛ//////////////////////////////
$file = $_FILES['file']['tmp_name'];
$submit_file = $_POST['submit_file'];

/////////////////////////////////ДОБАВИТЬ ФАЙЛ///////////////////////////
if(isset($submit_file)) {
         $list = array();
	 $f = fopen("$file", "r");
         if ($f=='') {
           $not_done = "Список пуст";  
        }
        else {  
	// Читать построчно до конца файла
        $i=0;
	
    while(!feof($f)) {           
	        
           $string = fgets($f);
           $row = explode(";", $string);
           $list[$i]['name'] = $row[1];
           $list[$i]['klass'] = $row[2]; 
           $list[$i]['tipklassa'] = $row[3];
            $i++; 
	}

	fclose($f);
        
    }
 ////////////////////////////////////////Установка даты/////////////////////////////////////////////////////                 
        if (date("n")>=6){
            $date1 = date("Y");
            $date2 = date("Y")+1;
            $date = "$date1$date2";
        }
        else {
            $date1 = date("Y")-1;
            $date2 = date("Y");
            $date = "$date1$date2";
        }
          $drop_date1 = date("Y")-4;
          $drop_date2 = date("Y")-3;
          $drop_date = "$drop_date1$drop_date2";
          
////////////////////////////////////////Создать новые таблицы/////////////////////////////////////////////////////          
        
        $query = "CREATE TABLE IF NOT EXISTS spiski_".$date." (id int  primary key auto_increment, name varchar(100),klass varchar(100), tipklassa varchar(200))";
        mysql_query($query); 
        $query = "CREATE TABLE IF NOT EXISTS marks_1_".$date." (id int  primary key auto_increment, id_student int, chetvert int, date timestamp , klass varchar(255), tipklassa int, name varchar(255), m5 int, m4 int, m3 int, m2 int, m1 int,lateness int, nocard int, business int, bform20 varchar(255), bform19 varchar(255), bform18 varchar(255), bform17 varchar(255), bform16 varchar(255), bform15 varchar(255), bform14 varchar(255), bform13 varchar(255), bform12 varchar(255), bform11 varchar(255), bform10 varchar(255), bform9 varchar(255), bform8 varchar(255), bform7 varchar(255), bform6 varchar(255), bform5 varchar(255), bform4 varchar(255), bform3 varchar(255), bform2 varchar(255), bform1 varchar(255), sum_rait_marks int, sum_rait_sash int )";
        mysql_query($query); 
        $query = "CREATE TABLE IF NOT EXISTS marks_2_".$date." (id int  primary key auto_increment, id_student int, chetvert int, date timestamp , klass varchar(255), tipklassa int, name varchar(255), m5 int, m4 int, m3 int, m2 int, m1 int,lateness int, nocard int, business int, bform20 varchar(255), bform19 varchar(255), bform18 varchar(255), bform17 varchar(255), bform16 varchar(255), bform15 varchar(255), bform14 varchar(255), bform13 varchar(255), bform12 varchar(255), bform11 varchar(255), bform10 varchar(255), bform9 varchar(255), bform8 varchar(255), bform7 varchar(255), bform6 varchar(255), bform5 varchar(255), bform4 varchar(255), bform3 varchar(255), bform2 varchar(255), bform1 varchar(255), sum_rait_marks int, sum_rait_sash int )";
        mysql_query($query); 
        $query = "CREATE TABLE IF NOT EXISTS marks_3_".$date." (id int  primary key auto_increment, id_student int, chetvert int, date timestamp , klass varchar(255), tipklassa int, name varchar(255), m5 int, m4 int, m3 int, m2 int, m1 int,lateness int, nocard int, business int, bform20 varchar(255), bform19 varchar(255), bform18 varchar(255), bform17 varchar(255), bform16 varchar(255), bform15 varchar(255), bform14 varchar(255), bform13 varchar(255), bform12 varchar(255), bform11 varchar(255), bform10 varchar(255), bform9 varchar(255), bform8 varchar(255), bform7 varchar(255), bform6 varchar(255), bform5 varchar(255), bform4 varchar(255), bform3 varchar(255), bform2 varchar(255), bform1 varchar(255), sum_rait_marks int, sum_rait_sash int )";
        mysql_query($query); 
        $query = "CREATE TABLE IF NOT EXISTS marks_4_".$date." (id int  primary key auto_increment, id_student int, chetvert int, date timestamp , klass varchar(255), tipklassa int, name varchar(255), m5 int, m4 int, m3 int, m2 int, m1 int,lateness int, nocard int, business int, bform20 varchar(255), bform19 varchar(255), bform18 varchar(255), bform17 varchar(255), bform16 varchar(255), bform15 varchar(255), bform14 varchar(255), bform13 varchar(255), bform12 varchar(255), bform11 varchar(255), bform10 varchar(255), bform9 varchar(255), bform8 varchar(255), bform7 varchar(255), bform6 varchar(255), bform5 varchar(255), bform4 varchar(255), bform3 varchar(255), bform2 varchar(255), bform1 varchar(255), sum_rait_marks int, sum_rait_sash int )";
        mysql_query($query);
        $query = "CREATE TABLE IF NOT EXISTS sovet_old_".$date." (a11 varchar(255), b11 varchar(255), v11 varchar(255), g11 varchar(255), a10 varchar(255), b10 varchar(255), v10 varchar(255), g10 varchar(255), a9 varchar(255), b9 varchar(255), v9 varchar(255), g9 varchar(255), d9 varchar(255), j9 varchar(255), date_old date)";
        mysql_query($query);
        $query = "CREATE TABLE IF NOT EXISTS sovet_yong_".$date." (a8 varchar(255), b8 varchar(255), v8 varchar(255), g8 varchar(255), d8 varchar(255), a7 varchar(255), b7 varchar(255), v7 varchar(255), g7 varchar(255), d7 varchar(255), j7 varchar(255), a6 varchar(255), b6 varchar(255), v6 varchar(255), g6 varchar(255), d6 varchar(255), date_yong date)";
        mysql_query($query);
         
/////////////////////////////////////Удалить старые таблицы//////////////////////////////////////////////////// 
        
        $query = "DROPE TABLE  spiski_".$drop_date."";
        mysql_query($query);
        $query = "DROPE TABLE  marks_1_".$drop_date."";
        mysql_query($query);
        $query = "DROPE TABLE  marks_2_".$drop_date."";
        mysql_query($query);
        $query = "DROPE TABLE  marks_3_".$drop_date."";
        mysql_query($query);
        $query = "DROPE TABLE  marks_4_".$drop_date."";
        mysql_query($query);
        $query = "DROPE TABLE  sovet_old_".$drop_date."";
        mysql_query($query);
        $query = "DROPE TABLE  sovet_yong_".$drop_date."";
        mysql_query($query);
        
       $a = count($list);
       
       
       
       $i=0;
       while($i<$a){  
                        $name = $list[$i]['name'] ;
                        $klass = $list[$i]['klass'] ;
                        $tipklassa = $list[$i]['tipklassa'] ;
                        $query = "INSERT INTO spiski_".$date." (name, klass, tipklassa ) VALUES ('$name', '$klass', '$tipklassa')";
                        mysql_query("SET NAMES UTF8");
                       // mysql_query($query); // Добавляем запись                             
                        $i++;
                        
                        if($i == $a) {
                            $done = "Список успешно добавлен!";  
                            $not_done = '';
                        }
                       else {
                           $not_done = "Что-то пошло не так!";  
                           $done = '';
                       }
                            
                        
                  }
       
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
                  <h1>Добавить списки классов</h1>   
                 
<!--////////////////////////////////////НАВИГАЦИЯ ////////////////////////////////////////////////-->       

                 <div class="navbar navbar-inverse">
                     <div class="container">
                         <div class="navbar-header">
                             <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#responsive-menu">
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                             </button>
                             <span class="navbar-brand"></span>
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
              
<!--//////////////////////////////////////КОНТЕЙНЕР////////////////////////////////////////////-->             

              <div class="col-lg-3"></div>
          </div>
          <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-10">
                  
                  <!--/////////////////////////////////////ЛЕВАЯ КОЛОНКА///////////////////////-->              
                 
                  <div class="col-lg-8">
                      <div class="row">
                          <form enctype="multipart/form-data" method="POST" name="file"  >
                              <input type="file" name="file" class="form-control" >
                              <input type="submit" name="submit_file" class="form-control" value="Добавить список">
                          </form>
                      </div>
                      
                      <p style="text-align: center; font-size: 24px; color:greenyellow;"><?php echo $done; ?></p>
                      <p style="text-align: center; font-size: 24px; color:red;"><?php echo $not_done; ?></p>
                  </div>    
                  
                  <!--/////////////////////////////////////ПРАВАЯ КОЛОНКА///////////////////////-->    
                  
                  <div class="col-lg-8">
                      <div class="row">
                          <div class="col-lg-16" style="background-color: #F5E1A6;border-color: #2a6496;border-style: double; font-size: 20px;" >
                              <p>1)На этой странице вы можете создать новый список школы.</p>
                              <p>2)Поле создания списков открывается в ИЮЛЕ каждого года. При добавлении списка ему автоматически присваевается год его создания.</p>
                              <p>3)Чтобы создать список вам надо нажать на кнопку "Выберите файл", затем выбрать файл CSV(пример файла и как его создать можно посмотреть <a href="kak_sozdat_fail.php">тут</a>), нажать кнопку "Добавить список". </p>
                              <p><span style="color: #009933;">Примечание</span>: Не пугайтесь, если страница долго грузится - так и должно быть.</p>
                          </div>
                          
                      </div>
                  </div>
              </div>
              <div class="col-lg-3"></div>
          </div>
      </div>
      
  </body>
</html>
