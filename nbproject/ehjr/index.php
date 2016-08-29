<?php
header('Content-Type: text/html; charset=utf-8'); 
include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	

        $list = array();
	$f = fopen("example.csv", "r");

	// Читать построчно до конца файла
        $i=0;
	while(!feof($f)) {
           
	    $string = fgets($f);
            $row = explode(";", $string);
            $list[$i]['first'] = $row[0]; 
            $list[$i]['second'] = $row[1]; 
            $list[$i]['third'] = $row[2]; 
            
            $i++;
	}


	fclose($f);
        
       $i=0;
       while($i<5){
            
         
//                mysql_query("CREATE TABLE example(
//                id INT NOT NULL AUTO_INCREMENT, 
//                PRIMARY KEY(id),
//                name VARCHAR(255) NOT NULL, 
//                klass VARCHAR(255) NOT NULL,
//                tipklassa INT NOT NULL
//                )")
//                or die(mysql_error());  
                      


           $name = $list[$i]['first']  ;
           $klass = $list[$i]['second'] ;
           $tipklassa = $list[$i]['third'];
           
                $qwery = "INSERT INTO 'example' (name, klass, tipklassa) VALUES ('$name', '$klass', '$tipklassa')";
                mysql_query("SET NAMES UTF8");
                $result= mysql_query($query);
           
           
           
         echo $list[$i]['first']  ;
           echo $list[$i]['second'] ;
           echo$list[$i]['third'];
          echo '<br/>';
            $i++;
       }
        

	?>

