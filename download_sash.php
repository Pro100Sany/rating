<?php
header('Content-Type: text/html; charset=utf-8'); 
error_reporting(0);
session_start();

$location = $_SESSION['location'];
if ($location =='') {
    $location = 'student.php';
}

$date = $_SESSION['date'] ;
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

$submit = $_POST['submit'];

if($_POST['order_rair']<>'') {$_SESSION['order_rair'] = $_POST['order_rair']; }
    $order_rair = $_SESSION['order_rair'];
    
if($_POST['order_name']<>'') {$_SESSION['order_name'] = $_POST['order_name']; }
    $order_rair = $_SESSION['order_name'];
    
if($_POST['ch']<>'') {$_SESSION['ch'] = $_POST['ch']; }
  $chetvert = $_SESSION['ch'];
    
include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	

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
                           
?>
 
<html>
<head>
        <link rel="stylesheet" href="css/table.css">
        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/css/bootstrap.css">
        <link rel="stylesheet" href="css/css/bootstrap.min.css">
<title></title>
</head>
<body>                            
   
    <table border="1" cellpadding="4" cellspacing="0" style="max-width: 1600px;">
        <tbody>
        <tr>
            <th colspan="10"><h1 style="margin: auto; text-align: center; ">Рейтинг "САШ" <?php echo $klass;?> класса за <?php echo $chetvert;?> четверть. </h1></th>
        </tr>
        <tr>
            <th rowspan="1" colspan="2"  style="width: 350px;"class="col_table" >Ф.и.О.</th> <!-- Name-->
            <th rowspan="1" colspan="2"  class="col_table">Опоздания|Пропуски</th> <!--Lateness -->
            <th rowspan="1" colspan="2"  class="col_table">Без карты</th> <!--Nocard -->
            <th rowspan="1" colspan="2"  style="width: 700px;"class="col_table">Общешкольные дела(кол-во\описание)</th> <!--Buiseness -->
            <th rowspan="1" colspan="2"  class="col_table">итог</th> <!--End_rait-->
        </tr>
        
        
         <?php       $order_rair = $_POST['order_rair'];
                     $order_name = $_POST['order_name'];
                    
                     if ($order_rair<>''){
                        $query = "SELECT * FROM ".$ch_table."_".$date."  WHERE klass = '$klass' AND chetvert = '$chetvert' ORDER BY sum_rait_sash DESC";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($query);
                         
                     }
                     elseif ($order_name<>'') {   
                        $query = "SELECT * FROM ".$ch_table."_".$date."  WHERE klass = '$klass' AND chetvert = '$chetvert' ORDER BY name";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($query);
                        
                     }
                     else {
                        $query = "SELECT * FROM ".$ch_table."_".$date."  WHERE klass = '$klass' AND chetvert = '$chetvert' ORDER BY name";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($query);
                        
                     }
                     
                         while ($row2 = mysql_fetch_array($result)) {
                             ?>
        
         
        
        <tr>
          
            <td colspan="2" class="col_table"><?php echo $row2['name'];?></td>
            <td colspan="2" class="col_table"> <?php echo $row2['lateness'];?></td>
            <td colspan="2" class="col_table"> <?php echo $row2['nocard'];?></td>
            <td colspan="2" class="col_table"> <?php echo $row2['business'].' /'.$row2['bform1'].'. '.$row2['bform2'].'. '.$row2['bform3'].'. '.$row2['bform4'].'. '.$row2['bform5'].'. '.$row2['bform6'].'. '.$row2['bform7'].'. '.$row2['bform8'].'. '.$row2['bform9'].'. '.$row2['bform10'].'. '.$row2['bform11'].'. '.$row2['bform12'].'. '.$row2['bform13'].'. '.$row2['bform14'].'. '.$row2['bform15'].'. '.$row2['bform16'].'. '.$row2['bform17'].'. '.$row2['bform18'].'. '.$row2['bform19'].'. '.$row2['bform20'];?></td>
            <td colspan="2" class="col_table"> <?php echo $row2['sum_rait_sash'];?></td>
            
            
        </tr>
     
        <?php };?>
        </tbody>
    </table>   
    <table border="0" > 
        <tbody>
            <tr>
                <td style="width: 200px;" >
                    <form action="<?php echo $location;?>"  >
                        <input   class="btn btn-info" style="width: 230px;" text-align="center" name="download" type="submit" value="Вернуться к подсчёту рейтинга">
                    </form>
                    <form action="download_marks.php"  ><!-- target="_blank" -->
                        <input   class="btn btn-warning" style="width: 230px;" text-align="center" name="download" type="submit" value="Перейти к рейтингу 'Оценки' ">
                    </form>       
                </td>
                <td style="width: 400px;" > 
                  <!--  <button id="printBtn" class="btn-success" onclick="javascript: print();">Распечатать таблицу рейтинга</button> -->
                   <button id="printBtn" class="btn-success" onclick="location.href='print.php'">Распечатать таблицу рейтинга</button>
                </td>
                <td style="width: 200px;" >
                    <form method="POST" action="download_sash.php" style="display: inline-block;  " > 
                        <br/>
                    <?php if(($admin == 1)){ echo " 
                       <select style='width:180px;' class='select' name='k'>   
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
                        <select  id="select_index" name="ch"  class="select">
                                <option value="">Четверть</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                        </select>
                        <input name="submit" value="Выбрать" id="order"   type="submit" >  <br/>           
                        Сортировать по:<br/>
                        <input name="order_rair" value="рейтингу" id="order"   type="submit"> <br/>
                        <input name="order_name" value="имени" id="order"   type="submit" >  
                    </form> 
                </td>
            </tr>
        </tbody> 
    </table>     
</body>
</html>                           
                            
                            
                      