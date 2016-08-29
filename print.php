<?php
header('Content-Type: text/html; charset=utf-8'); 
error_reporting(0);
session_start();

$date = $_SESSION['date'] ;
$admin = $_SESSION['adm'];
$klass = $_SESSION['k'];

if($admin == 1) {
    $klass = $_SESSION['k'];
}
elseif ($admin <> 1) {   
    $klass = $_SESSION['username'];
}

    
    $chetvert = $_SESSION['ch'];
    $order_rair = $_SESSION['order_rair'];
    $order_name = $_SESSION['order_name'];
    
include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	
 
if($chetvert =='1'){
    $ch_table="marks_1_$date";
}
elseif($chetvert =='2'){
    $ch_table="marks_2_$date";
}
elseif($chetvert =='3'){
    $ch_table="marks_3_$date";
}
elseif($chetvert =='4'){
    $ch_table="marks_4_$date";
}

?>
<html>
    <link rel="stylesheet" href="css/table.css">
        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/css/bootstrap.css">
        <link rel="stylesheet" href="css/css/bootstrap.min.css">
<body>
        

<table border="1" cellpadding="4" cellspacing="0" style="max-width: 1600px;">
        <tbody>
        <tr>
            <th colspan="8"><h1 style="margin: auto; text-align: center; ">Рейтинг "САШ" <?php echo $klass;?> класса за <?php echo $chetvert;?> четверть. </h1></th>
            <th colspan="2"> <span  onclick="javascript: print();" class="glyphicon glyphicon-print"></span></th>
        </tr>
        <tr>
            <th rowspan="1" colspan="2"  style="width: 350px;"class="col_table" >Ф.и.О.</th> <!-- Name-->
            <th rowspan="1" colspan="2"  class="col_table">Опоздания</th> <!--Lateness -->
            <th rowspan="1" colspan="2"  class="col_table">Без карты</th> <!--Nocard -->
            <th rowspan="1" colspan="2"  style="width: 700px;"class="col_table">Общешкольные дела(кол-во\описание)</th> <!--Buiseness -->
            <th rowspan="1" colspan="2"  class="col_table">итог</th> <!--End_rait-->
        </tr>
        
        
         <?php       $order_rair = $_POST['order_rair'];
                     $order_name = $_POST['order_name'];
                    
                     if ($order_rair<>''){
                        $query = "SELECT * FROM $ch_table  WHERE klass = '$klass' AND chetvert = '$chetvert' ORDER BY sum_rait_sash DESC";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($query);
                         
                     }
                     elseif ($order_name<>'') {   
                        $query = "SELECT * FROM $ch_table  WHERE klass = '$klass' AND chetvert = '$chetvert' ORDER BY name";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($query);
                        
                     }
                     else {
                        $query = "SELECT * FROM $ch_table  WHERE klass = '$klass' AND chetvert = '$chetvert' ORDER BY name";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($query);
                        
                     }
                     
                         while ($row2 = mysql_fetch_array($result)) {
                             ?>
        
         
        
        <tr>
          
            <td colspan="2" class="col_table"><?php echo $row2['name'];?></td>
            <td colspan="2" class="col_table"> <?php echo $row2['lateness'];?></td>
            <td colspan="2" class="col_table"> <?php echo $row2['nocard'];?></td>
            <td colspan="2" class="col_table"> <?php echo $row2['business'].' /'.$row2['bform1'].'. '.$row2['bform2'].'. '.$row2['bform3'].'. '.$row2['bform4'].'. '.$row2['bform5'].'. '.$row2['bform6'].'. '.$row2['bform7'].'. '.$row2['bform8'].'. '.$row2['bform9'].'. '.$row2['bform10'];?></td>
            <td colspan="2" class="col_table"> <?php echo $row2['sum_rait_sash'];?></td>
            
            
        </tr>
     
        <?php };?>
        </tbody>
    </table>   
    
    </body>
</html>

