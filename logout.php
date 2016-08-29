<?php 
header('Content-Type: text/html; charset=utf-8'); 
include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	
session_start(); 

$_SESSION = array(); 
session_destroy(); 
?> 
<meta http-equiv="refresh" content="0;index.php">
