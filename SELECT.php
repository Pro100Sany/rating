<?php
                        ///////////////////////////////////666666666666666666666666////////////////////////////////////
                        $query1 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='6А' OR klass='6Б' OR klass='6Д' ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result1=mysql_query($query1);
                        
                        
                        $query343 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='6В' OR klass='6Г' ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result343=mysql_query($query343);
                        
                        
                        //////////////////////////////////77777777777777777777777777////////////////////////////////////
                        
                        $query6 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='7А' OR klass='7Б' OR  klass='7Д' OR klass='7Ж' OR klass='7Г' ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result6=mysql_query($query6);

                        
                        $query8 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='7В'  ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result8=mysql_query($query8);
           
                        /////////////////////////////////888888888888888888888888//////////////////////////////////////////
                        
                        $query12 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='8А' OR klass='8Б' OR klass='8Д' ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result12=mysql_query($query12);
                        
               
                        $query14 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='8В' OR klass='8Г' ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result14=mysql_query($query14);
                 
                        
                        //////////////////////////////////////9999999999999999999999////////////////////////////////
                        
                        $query17 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='9А' OR klass='9Б' OR klass='9Д' OR klass='9Ж' ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result17=mysql_query($query17);
                       
                        
                        $query19 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='9В' OR klass='9Г' ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result19=mysql_query($query19);
                       
                        
                        ////////////////////////////////1010101010101010101010101010101010101///////////////////////
                        
                        $query21 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='10А' OR klass='10Б'  ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result21=mysql_query($query21);
                        
                        $query23 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='10В' OR klass='10Г' ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result23=mysql_query($query23);
                        
                        ////////////////////////11111111111111111111111111111111111111//////////////////////////////
                        
                        $query25 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='11А' OR klass='11Б' ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result25=mysql_query($query25);
                       
                        
                        $query27 = "SELECT * FROM ".$ch_table."_".$date." WHERE klass='11В' OR klass='11Г' ORDER BY sum_rait_marks Desc LIMIT 1  ";
                        mysql_query("SET NAMES UTF8");
                        $result27=mysql_query($query27);
                        
                        //////////////////////////////////////////////////////////////////////////////////////////
                        