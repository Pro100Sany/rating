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
        

<table border="1" cellpadding="4" cellspacing="0" >
        <tr>
            <th colspan="6"><h1 style="margin: auto; text-align: center; ">Рейтинг "Оценки" <?php echo $klass;?> класса за <?php echo $chetvert;?> четверть. </h1></th>
            <th colspan="2"> <span  onclick="javascript: print();" class="glyphicon glyphicon-print"></span></th>
        </tr>
        <tr>
           
            <th style="width: 500px;" rowspan="2"  class="col_table" >Ф.и.О.</th> <!-- Name-->
            <th colspan="5" style="width: 300px;"class="col_table">Количество оценок</th> <!-- Marks --> 
            <th rowspan="2" style="width: 50px;" class="col_table">итог</th> <!--End_rait-->
        </tr>
        <tr>
            <th>5</th><th>4</th><th>3</th><th>2</th><th>1</th> 
        </tr> 
        
          <?php     $order_rair = $_POST['order_rair'];
                    $order_name = $_POST['order_name'];
                    
                     if ($order_rair<>''){
                        $query = "SELECT * FROM $ch_table  WHERE klass = '$klass' AND chetvert = '$chetvert' ORDER BY sum_rait_marks DESC";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($query);
                        
                     }
                     elseif ($order_name<>'') {   
                        $query = "SELECT * FROM $ch_table WHERE klass = '$klass' AND chetvert = '$chetvert' ORDER BY name";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($query);
                        
                     }
                     else {
                        $query = "SELECT * FROM  $ch_table  WHERE klass = '$klass' AND chetvert = '$chetvert' ORDER BY name";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($query);
                        
                     }
                     
                         while ($row2 = mysql_fetch_array($result)) { ?>
         
        
        <tr>
          
            <td class="col_table"><?php echo $row2['name'];?></td>
            <td> <?php echo $row2['m5'];?></td><td><?php echo $row2['m4'];?></td><td><?php echo $row2['m3'];?></td><td><?php echo $row2['m2'];?></td><td><?php echo $row2['m1'];?></td> 
            <td class="col_table"> <?php echo $row2['sum_rait_marks'];?></td>
            
            
        </tr>
     
        <?php };?>
        
    </table>   
    
    </body>
</html>

