
            <!--/////////////////////////////////TOP_MENU////////////////////////-->
            <div class="row">
                <div class="col-lg-offset-2 col-lg-12  ">
                <div  class="col-lg-offset-1 col-lg-14 col-md-offset-2 col-md-12 col-sm-offset-2 col-sm-12 hidden-xs">
                    <nav_main class="col-lg-16 col-md-16" >
                        <ul class="dropdown col-lg-16 col-md-16 col-xs-16">
                            <li style="padding: 0;" class="col-sm-4 col-xs-16"><a href="../index.php">Главная</a></li>
                            <li style="padding: 0;" class="col-sm-4 col-xs-16"><a href="results.php">Итоги рейтинга</a></li>
                            <li style="padding: 0;" class="col-sm-4 col-xs-16"><?php if(($admin == 1) AND ($_SESSION['adm'] == 1)) { echo "<a href='#'>Управление</a>";} else{echo "<a href='student.php'>Считать рейтинг</a>";}?>
                                <ul class="sub_menu col-lg-16 col-md-16" style="padding: 0;">
                                    <?php if($admin == 1){?>
                                    <li style="padding: 0;" class="col-sm-16 col-xs-16"><a href="sovet/index_sovet.php" style="color:#444;">Совет классов</a></li>  
                                    <li style="padding: 0;" class="col-sm-16 col-xs-16"><a href="adminpages/password_editor.php" style="color:#444;">Управление паролями</a></li>  
                                    <li style="padding: 0;" class="col-sm-16 col-xs-16"><a href="adminpages/spiski_editor.php" style="color:#444;">Управление списками классов</a></li>  
                                    <li style="padding: 0;" class="col-sm-16 col-xs-16"><a href="adminpages/new_spiski.php" style="color:#444;">Обновить списки школы</a></li>  
                                    
                                    <?php } else {?>
                                    <li style="padding: 0;" class="col-sm-16 col-xs-16"><a href="download_marks.php" style="color:#444;">Рейтинг "Оценки"</a></li>  
                                    <li style="padding: 0;" class="col-sm-16 col-xs-16"><a href="download_sash.php" style="color:#444;">Рейтинг "САШ"</a></li>
                                    <?php }?>
                                </ul>
                            </li>
                            <li style="padding: 0;"  class="col-sm-4 col-xs-16"><a href="contacts.php">Контакты</a></li>
                        </ul>
                    </nav_main>  
                </div>
                </div>
            </div>
            <div class="sb-slidebar sb-left">
                <div class="col-lg-3 col-xs-18">
                    <div class="row"> 
                            <ul class="nav nav-list"> 
                                <li class="nav-header">Навигация</li>
                                <li><a href="../index.php" style="font-size: 18px;">Главная</a></li>
                                <li><a href="results.php" style="font-size: 18px;">Итоги рейтинга</a></li>
                                <li><a href="student.php" style="font-size: 18px;">Считать рейтинг</a></li>
                                <li><a href="download_marks.php" style="font-size: 18px;">Рейтинг "Оценки"</a></li>  
                                <li><a href="download_sash.php" style="font-size: 18px;">Рейтинг "САШ"</a></li>
                                <li class="nav-divider"></li>   
                                <li ><a href="contacts.php "style="font-size: 18px;">Контакты</a></li>
                                <li class="nav-divider"></li>   

                            </ul>
                            <ul class="nav nav-list">
                                <?php if($admin == 1){?>
                                <li class="nav-header">Управление</li>
                                <li><a href="sovet/index_sovet.php " style="font-size: 18px;">Совет классов</a></li>  
                                <li><a href="adminpages/password_editor.php" style="font-size: 18px;">Управление паролями</a></li>  
                                <li><a href="adminpages/spiski_editor.php" style="font-size: 18px;" >Управление списками классов</a></li>  
                                <li><a href="adminpages/new_spiski.php" style="font-size: 18px;" >Обновить списки школы</a></li>
                                <li class="nav-divider"></li>   
                                <?php } ?>
                            </ul>
                        
                    </div> 
                </div>
            </div>    