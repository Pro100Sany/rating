                       <ul class="nav nav-pills nav-stacked" >
                            
                          <?php  
                          
                          
//                        $query_proverka = "SELECT * FROM marks_".$chetvert."_".$date." WHERE klass = '$klass' ORDER BY name";
//                        mysql_query("SET NAMES UTF8");
//                        $result_proverka=mysql_query($query_proverka);  
//                        while ($row_proverka = mysql_fetch_array($result_proverka)) { 
                          
                          
                          while ($row2 = mysql_fetch_array($result2)) {
                              $tipklassa = $row2['tipklassa'];
                              
                              ?>
                           <li><a class="student_list" href="student_marks.php?s=<?=$row2['name'] ?>&i=<?=$row2['id'] ?>"class="name"><?php echo $row2['name'];
//                                if ($row2['id'] == $row_proverka['id_student']){
//                                    echo ("<div style='color:#00cc00;padding:6px; display:inline-block;' class='glyphicon glyphicon-ok'></div>");
//                                }
//                                else {
//                                    echo ("<div style='color: red;padding:6px; display:inline-block;' class='glyphicon glyphicon-remove'></div>");
//                                }?>
                                </a></li>
                             <?php 
                                "$tipklassa";
                         if($tipklassa <> 2 ){
                            $sum_rait_marks = $mark_5*5 + $mark_4*4 + $mark_3*0 + $mark_2*(-5) + $mark_1*(-6);
                         }
                         else   {
                            $sum_rait_marks = $mark_5*5 + $mark_4*4 + $mark_3*(-3) + $mark_2*(-5) + $mark_1*(-6);   
                         }
                        }
                       

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
                            
////////////////////////////////////Проверка бд ЧЕТВЕРТОЙ четверти////////////////////////////////////////////////////////////4/          
                        
                        $qw = "SELECT * FROM marks_4_".$date." WHERE id_student='$id_student'";
                        mysql_query("SET NAMES UTF8");
                        $result0=mysql_query($qw);
                        $row0 = mysql_fetch_array($result0)  ;
                        $id_student_check_4 = $row0['id_student'];
                        $chetvert_get_4 = $row0['chetvert'];
                                                       

                            
///////////////////////////////////////////////////////////////////Запись первой четверти ///////////////////////////////////
                        if (isset($submit_marks) ) {    
                            
                                if (($id_student_check=='') AND ($chetvert == '1')) {
                                $query3= "INSERT INTO marks_1_".$date." (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, sum_rait_marks) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$sum_rait_marks')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, sum_rait_marks) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$sum_rait_marks')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                }
                                          
                              if (($id_student_check >0) AND ($chetvert_get == $chetvert)) {
                                 $query = "UPDATE  marks_1_".$date." SET m4='$mark_4', m5='$mark_5', m3='$mark_3', m2='$mark_2', m1='$mark_1', sum_rait_marks='$sum_rait_marks' WHERE id_student='$id_student' " ;  
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                               
                               
///////////////////////////////////////////////////////////////////////Запись второй четверти///////////////////////////////////
                               
                               
                               if (($id_student_check_2=='') AND ($chetvert == '2')) {
                                $query3= "INSERT INTO marks_2_".$date." (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, sum_rait_marks) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$sum_rait_marks')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double_2_".$date." (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, sum_rait_marks) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$sum_rait_marks')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                               }          
                              if (($id_student_check_2 >0) AND ($chetvert_get_2 == $chetvert)) {
                                 $query = "UPDATE  marks_2_".$date." SET m4='$mark_4', m5='$mark_5', m3='$mark_3', m2='$mark_2', m1='$mark_1', sum_rait_marks='$sum_rait_marks'  WHERE id_student='$id_student' " ;   
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                               
                               ///////////////////////////////////////////////////////////////////////Запись ТРЕТЬЕЙ четверти///////////////////////////////////
                               
                               
                               if (($id_student_check_3=='') AND ($chetvert == '3')) {
                                $query3= "INSERT INTO marks_3_".$date." (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, sum_rait_marks) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$sum_rait_marks')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double_3 (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, sum_rait_marks) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$sum_rait_marks')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                }
                                          
                              if (($id_student_check_3 >0) AND ($chetvert_get_3 == $chetvert)) {
                                $query = "UPDATE  marks_3_".$date." SET m4='$mark_4', m5='$mark_5', m3='$mark_3', m2='$mark_2', m1='$mark_1', sum_rait_marks='$sum_rait_marks'  WHERE id_student='$id_student' " ;   
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                               
                               ///////////////////////////////////////////////////////////////////////Запись ЧЕТВЕРТОЙ четверти///////////////////////////////////
                               
                               
                               if (($id_student_check_4=='') AND ($chetvert == '4')) {
                                $query3= "INSERT INTO marks_4_".$date." (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, sum_rait_marks) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$sum_rait_marks')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                
                                $query3= "INSERT INTO marks_double_4 (id_student, chetvert, name, klass, m5, m4, m3, m2, m1, sum_rait_marks) "
                                        . "VALUES ('$id_student', '$chetvert', '$name', '$klass', '$mark_5', '$mark_4', '$mark_3', '$mark_2', '$mark_1', '$sum_rait_marks')";
                                mysql_query("SET NAMES UTF8");
                                $result3= mysql_query($query3);
                                }
                                          
                              if (($id_student_check_4 >0) AND ($chetvert_get_4 == $chetvert)) {
                                 $query = "UPDATE  marks_4_".$date." SET m4='$mark_4', m5='$mark_5', m3='$mark_3', m2='$mark_2', m1='$mark_1', sum_rait_marks='$sum_rait_marks'  WHERE id_student='$id_student' " ;  
                                 mysql_query("SET NAMES UTF8");
                                 mysql_query($query) or die(mysql_error());
                               }
                        }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
                       
                       ?> 
                                 
                           
                        </ul>