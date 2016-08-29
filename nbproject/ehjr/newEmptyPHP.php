<?php
header('Content-Type: text/html; charset=utf-8'); 
include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	

        
           $name = 'a'  ;
           $klass = '2' ;
           $tipklassa = 3;
           
                echo $qwery = "INSERT INTO example (id, name, klass, tipklassa) VALUES ('$id', '$name', '$klass', '$tipklassa')";
                mysql_query("SET NAMES UTF8");
                mysql_query($query) or die(mysql_error());
           
           
                
                	
                
           
         
        

	?>
