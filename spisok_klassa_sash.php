                       <ul class="nav nav-pills nav-stacked" >
                            
                          <?php  while ($row2 = mysql_fetch_array($result_2)) { 
                              $tipklassa = $row2['tipklassa'];
                              ?>
                            <li><a class="student_list" href="student_sash.php?s=<?=$row2['name'] ?>&i=<?=$row2['id'] ?>"class="name"><?=$row2['name']?></a></li>
                             <?php }

////////////////////////////////////Проверка бд первой четверти////////////////////////////////////////////////////////////1/

                        $q = "SELECT * FROM marks_1_".$date." WHERE id_student='$id_student'";
                        mysql_query("SET NAMES UTF8");
                        $result=mysql_query($q);
                        $row4 = mysql_fetch_array($result)  ;
                        $id_student_check = $row4['id_student'];
                        $chetvert_get = $row4['chetvert'];
                        
////////////////////////////////////Проверка бд ВТОРОЙ четверти////////////////////////////////////////////////////////////2/          
                        
                        $qw = "SELECT * FROM marks_2_".$date." WHERE id_student='$id_student'";
                        mysql_query("SET NAMES UTF8");
                        $result0=mysql_query($qw);
                        $row0 = mysql_fetch_array($result0)  ;
                        $id_student_check_2 = $row0['id_student'];
                        $chetvert_get_2 = $row0['chetvert'];
                            
                            
////////////////////////////////////Проверка бд ТРЕТЬЕЙ четверти////////////////////////////////////////////////////////////3/          
                        
                        $qw = "SELECT * FROM marks_3_".$date." WHERE id_student='$id_student'";
                        mysql_query("SET NAMES UTF8");
                        $result0=mysql_query($qw);
                        $row0 = mysql_fetch_array($result0)  ;
                        $id_student_check_3 = $row0['id_student'];
                        $chetvert_get_3 = $row0['chetvert'];
                            
////////////////////////////////////Проверка бд ВТОРОЙ четверти////////////////////////////////////////////////////////////4/          
                        
                        $qw = "SELECT * FROM marks_4_".$date." WHERE id_student='$id_student'";
                        mysql_query("SET NAMES UTF8");
                        $result0=mysql_query($qw);
                        $row0 = mysql_fetch_array($result0)  ;
                        $id_student_check_4 = $row0['id_student'];
                        $chetvert_get_4 = $row0['chetvert'];
                                                       

                            
///////////////////////////////////////////////////////////////////Запись первой четверти ///////////////////////////////////
                        if (isset($submit_sash) ) {    
                            
                                if (($id_student_check=='') AND ($chetvert == '1')) {
                                $query3= "INSERT INTO marks_1_".$date." (id_student, chetvert, name, klass, bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business,  sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business',   '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double (id_student, chetvert, name, klass,  bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business,  sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business',   '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                }
                                          
                              if (($id_student_check >0) AND ($chetvert_get == $chetvert)) {
                                 $query = "UPDATE  marks_1_".$date." SET klass='$klass', name='$name',  bform1='$bform1', bform2='$bform2', bform3='$bform3', bform4='$bform4', bform5='$bform5', bform6='$bform6', bform7='$bform7', bform8='$bform8', bform9='$bform9', bform10='$bform10', bform11='$bform11', bform12='$bform12', bform13='$bform13', bform14='$bform14', bform15='$bform15', bform16='$bform16', bform17='$bform17', bform18='$bform18', bform19='$bform19', bform20='$bform20', lateness='$lateness', nocard='$nocard', business='$business',  sum_rait_sash='$sum_rait_sash' WHERE id_student='$id_student' " ;  
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                               
                               
///////////////////////////////////////////////////////////////////////Запись второй четверти///////////////////////////////////
                               
                               
                               if (($id_student_check_2=='') AND ($chetvert == '2')) {
                                $query3= "INSERT INTO marks_2_".$date." (id_student, chetvert, name, klass,  bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business,  sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business',   '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double_2_".$date." (id_student, chetvert, name, klass,  bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business,  sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business',   '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                               }          
                              if (($id_student_check_2 >0) AND ($chetvert_get_2 == $chetvert)) {
                                 $query = "UPDATE  marks_2_".$date." SET klass='$klass', name='$name',  bform1='$bform1', bform2='$bform2', bform3='$bform3', bform4='$bform4', bform5='$bform5', bform6='$bform6', bform7='$bform7', bform8='$bform8', bform9='$bform9', bform10='$bform10', bform11='$bform11', bform12='$bform12', bform13='$bform13', bform14='$bform14', bform15='$bform15', bform16='$bform16', bform17='$bform17', bform18='$bform18', bform19='$bform19', bform20='$bform20', lateness='$lateness', nocard='$nocard', business='$business',  sum_rait_sash='$sum_rait_sash' WHERE id_student='$id_student' " ;  
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                               
                               ///////////////////////////////////////////////////////////////////////Запись ТРЕТЬЕЙ четверти///////////////////////////////////
                               
                               
                               if (($id_student_check_3=='') AND ($chetvert == '3')) {
                                $query3= "INSERT INTO marks_3_".$date." (id_student, chetvert, name, klass,  bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business,  sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business',   '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double_3 (id_student, chetvert, name, klass,  bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business,  sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business',   '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                }
                                          
                              if (($id_student_check_3 >0) AND ($chetvert_get_3 == $chetvert)) {
                                 $query = "UPDATE  marks_3_".$date." SET klass='$klass', name='$name',  bform1='$bform1', bform2='$bform2', bform3='$bform3', bform4='$bform4', bform5='$bform5', bform6='$bform6', bform7='$bform7', bform8='$bform8', bform9='$bform9', bform10='$bform10', bform11='$bform11', bform12='$bform12', bform13='$bform13', bform14='$bform14', bform15='$bform15', bform16='$bform16', bform17='$bform17', bform18='$bform18', bform19='$bform19', bform20='$bform20', lateness='$lateness', nocard='$nocard', business='$business',  sum_rait_sash='$sum_rait_sash' WHERE id_student='$id_student' " ;  
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                               
                               ///////////////////////////////////////////////////////////////////////Запись ЧЕТВЕРТОЙ четверти///////////////////////////////////
                               
                               
                               if (($id_student_check_4=='') AND ($chetvert == '4')) {
                                $query3= "INSERT INTO marks_4_".$date." (id_student, chetvert, name, klass,  bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business,  sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business',   '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double_4 (id_student, chetvert, name, klass,  bform1, bform2, bform3, bform4, bform5, bform6, bform7, bform8, bform9, bform10, bform11, bform12, bform13, bform14, bform15, bform16, bform17, bform18, bform19, bform20, lateness, nocard, business,  sum_rait_sash) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$bform1', '$bform2', '$bform3', '$bform4', '$bform5', '$bform6', '$bform7', '$bform8', '$bform9', '$bform10', '$bform11', '$bform12', '$bform13', '$bform14', '$bform15', '$bform16', '$bform17', '$bform18', '$bform19', '$bform20', '$lateness', '$nocard', '$business',   '$sum_rait_sash')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                }
                                          
                              if (($id_student_check_4 >0) AND ($chetvert_get_4 == $chetvert)) {
                                 $query = "UPDATE  marks_4_".$date." SET klass='$klass', name='$name',  bform1='$bform1', bform2='$bform2', bform3='$bform3', bform4='$bform4', bform5='$bform5', bform6='$bform6', bform7='$bform7', bform8='$bform8', bform9='$bform9', bform10='$bform10', bform11='$bform11', bform12='$bform12', bform13='$bform13', bform14='$bform14', bform15='$bform15', bform16='$bform16', bform17='$bform17', bform18='$bform18', bform19='$bform19', bform20='$bform20', lateness='$lateness', nocard='$nocard', business='$business',  sum_rait_sash='$sum_rait_sash' WHERE id_student='$id_student' " ;  
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                        }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
                       
                       ?> 
                                 
                           
                        </ul>