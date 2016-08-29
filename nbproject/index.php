<?php
header('Content-Type: text/html; charset=utf-8'); 
session_start();

error_reporting(0);

include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	
             


if (((strlen($_POST['ch'])=="") OR ($_POST['ch']=="false" ))){
		//$into_false = 11;  
                echo ' ';                
}  
elseif (($_SESSION['username'] == $username) AND ($_SESSION['loggedin'] = 1)) {
    $regist='alldone';
};

  $klass = $_SESSION['username'];
 
if($_POST['ch']<>'') {$_SESSION['ch'] = $_POST['ch']; }
  $chetvert = $_SESSION['ch'];


if ($regist='alldone') {
header('location:student.php') ;
}
else {
    header('location:index.php') ;
};

$submit = $_POST['submit'];



if(($klass == "Александр") OR ($klass == "Сабина") OR ($klass == "Марина")){
 $admin = 1;
 $_SESSION['adm'] = "$admin";
}



if($_POST['k']<>'') {$_SESSION['k'] = $_POST['k']; }
 $klass = $_SESSION['k'];
?>
 
<html><a name="anchor0"></a><br/>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/log.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/css/bootstrap.css">
        <link rel="stylesheet" href="css/css/bootstrap.min.css">
        
        
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.menu.js"></script>
        
        <script type="text/javascript" src="js/scrollup.js"></script> 
        <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
        <title>Рейтинг учащихся ГБОУ «Школа № 109»</title>
    </head>
    <body>
        
        <table style="width: 100%;" >
            <tr>
                <td><img src="images/img4.png" alt="ГБОУ школа №109" /></td>
                <td><h1 style=" text-align: center;">Рейтинг учащихся ГБОУ «Школа № 109»<br/><small>Выберите класс для подсчёта рейтинга</small></h1></td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 20%;" ></td>
                <td style="width: 60%;">
                    <div id="main">
                            <?php
                            if(!empty($_SESSION['loggedin']) && !empty($_SESSION['username']))  
                                {  
                                    // даём доступ пользователю к главной странице
                                ?>  
                                     <h1 style="display: inline-block;">Успех!</h1>  <br/>
                                     <p style="display: inline-block;">Здравствуйте, <b><?=$_SESSION['username']?>.<br/>  <br/> 
                                   <a href="logout.php">Выход</a></p>
                                     
                                    <div  style="display: inline-block; float: right;  margin-top: -50px;" class="radio " id="typeofclass" >  
                                        <h4 style="text-align: right;">Выберите четверть, чтобы посчитать рейтинг:</h4> 
                                        <form  name="form" method="post"><br/>
                                            <?php if(($admin == 1) AND $_SESSION['adm'] == 1){ echo "  
                                               <select style='width:180px;' class='select form-control' name='k'>   
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
                                                </select>";}   ?>
                                                     
                                                <select   id="select_index" name="ch"  class="select form-control">
                                                    <option value="false">Выберите четверть</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option  value="4">4</option>
                                                </select>
                                            <input style="margin-top: 5px;" class="btn btn-info btn_index_top" type="submit" name="submit"  value="Выбрать">
                                        </form>
                                    </div>   
                                                
                                     <?php  
                                }    
                                elseif(!empty($_POST['username']) && !empty($_POST['password']))  
                                {  
                                    // позволим пользователю войти на сайт 
                                    $username = mysql_real_escape_string($_POST['username']);  
                                    $password = base64_encode(mysql_real_escape_string($_POST['password']));  

                                    $checklogin= mysql_query("SELECT * FROM users WHERE username = $username AND password = $password");  
                                           
                                    if(count($checklogin) == "1")  
                                    {  
                                        $row = mysql_fetch_array($checklogin);  
                                        $email = $row['emailaddress'];  

                                        $_SESSION['username'] = $username;  
                                        $_SESSION['emailaddress'] = $email;  
                                        $_SESSION['loggedin'] = 1;  

                                        echo "<h1>Успех!</h1>";  
                                        echo "<p>Сейчас вы будете перенаправлены в закрытый раздел.</p>";  
                                        echo "<meta http-equiv='refresh' content='0;index.php'>";  
                                    }  
                                    else  
                                    {  
                                        echo "<h1>Ошибка</h1>";  
                                        echo "<p>Прости, но мы не нашли такого аккаунта. Можешь <a href=\"index.php\">попробовать ещё раз</a>.</p>";  
                                    } 
                                                }  
                                                else  
                                                    {  
                                        // выводим форму для авторизации  
                                        ?>   
                                       <h1>Авторизация</h1>  

                                       <p>Спасибо за то, что пришли!</p>  

                                        <form method="post" action="index.php" name="loginform" id="loginform">  
                                        <fieldset>  
                                            <label for="username">Логин:</label><input type="text" name="username" id="username"><br>  
                                            <label for="password">Пароль:</label><input type="password" name="password" id="password"><br>  
                                            <input type="submit" name="login" id="login" value="Войти">  
                                        </fieldset>  
                                        </form>  
                                       <?php  
                                    }  ?>
                    </div>
                    
                    
                </td>
                <td style="width: 20%;" ></td>
            </tr>
            
            <tr>
                


                <td valign="top" >
                    
<!----------------------------------------------------------Боковое левое меню----------------------------------------------------------------->
                    
                    <div id='aside1' class="sticky col-lg-16 " style="width: 320px; padding: 60px 5px 5px 5px; position: initial;">
                    <ul class="nav nav-list">
                        <li class="nav-header">Положение о рейтинге учащихся ГБОУ «Школа № 109»</li>
                        <li><a href="#anchor1">Общие положения</a></li>
                        <li><a href="#anchor2">Механизм формирования рейтинга</a></li>
                        <li><a href="#anchor5">Награждение</a></li> 
                    </ul>
                    <ul class="nav nav-list">
                        <li class="nav-header">Положение о рейтинге учащихся «Самый активный школьник 109» - САШ 109</li>
                        <li><a href="#anchor6">Общие положения</a></li>
                        <li><a href="#anchor7">Механизм формирования рейтинга</a></li>
                        <li><a href="#anchor8">Критерии оценки рейтинга учащихся</a></li>
                        <li><a href="#anchor9">Награждение</a></li>
                        <li class="nav-divider"></li>
                        <!--<li><a href="#anchor10">Помощь</a></li>-->
                        <li><a href="results.php">Итоги рейтинга</a></li>
                        <li class="nav-divider"></li>
                        <?php if($admin == 1){?>
                        <li style="background: #a6e1ec" ><a href="sovet/index_sovet.php" >Совет классов</a></li>  
                        <li style="background: #a6e1ec" ><a href="adminpages/password_editor.php" >Управление паролями</a></li>  
                        <li style="background: #a6e1ec" ><a href="adminpages/spiski_editor.php" >Управление списками классов</a></li>  
                        <li class="nav-divider"></li>
                        <?php } ?>
                        <li><a href="#anchor0" >Наверх</a></li>
                    </ul>
                    </div>        
                    
<!--///////////////////////////////////////////////////////////////ЦЕНТРАЛЬНАЯ КОЛОНКА///////////////////////////////////////////////////////////////--->                   
                </td>
                <td><h3 style=" text-align: center;">Положение о рейтинге учащихся ГБОУ «Школа № 109»</h3>
                    <div id="block_polo" >
                        <ul  style="list-style-type:decimal;">
                            <a name="anchor1"></a><br/>
                            <li><b>Общие положения.</b>
                                <ul><br/>
                                    <li>Цель рейтинга - это создание условий для повышение мотивации учащихся к освоению учебных предметов, стимулирование общественной активности школьников, участие в жизни школы и усиление учебной дисциплины.</li>
                                    <br/>
                                    <li>Рейтинг присваивается учащимися 6х - 11х классов отдельно в общеобразовательных, лицейских и гимназических классах по итогам каждой четверти.</li>
                                    <br/>
                                    <li>Положение о рейтинге учащихся разрабатывается творческой группой педагогов и утверждается на заседании педагогического и управляющего совета школы.</li>
                                    <br/>
                                    <li>Результаты рейтинга учащихся размещаются на сайт школы.</li>
                                    <br/>
                                    <li>Спорные вопросы по рейтингу решаются советом учащихся, классным руководителем и администрацией школы.</li>
                                    <br/>
                                </ul>
                            </li>
                            <a name="anchor2"></a><br/>
                            <li><b>Механизм формирования рейтинга.</b>
                                <ul><br/>
                                    <li><u>Итоговый рейтинг учащегося состоит из трех показателей (приложение 1):</u>
                                        <ul><br/>
                                            <li>успеваемость за учебную четверть;</li>
                                        </ul>
                                    </li>
                                    <br/>
                                    <li><u>Успеваемость учащихся:</u></li>
                                    <br/>
                                    <ul>
                                        <li>В общеобразовательных классах оценки «4» и «5», полученные учащимися в течение учебной четверти, складываются и выставляются в рейтинговый лист общим баллом со знаком «+». Например, + 45. Оценка «3», полученная учащимися в течение учебной четверти, выставляется в рейтинговый лист со знаком «0» и не учитывается в рейтинге. Оценка «2», полученная учащимися в течение учебной четверти , выставляется в рейтинговый лист общим баллом со знаком «- 5» , например « - 30 », и вычитается из суммы «4 и 5». Оценка «1», полученная учащимися в течение учебной четверти , выставляется в рейтинговый лист общим баллом со знаком «- 6» , например « - 18 », и также вычитается из суммы «4 и 5».
                                        </li><br/>
                                        <li> лицейских и гимназических классах оценки «4» и «5», полученные учащимися в течение учебной четверти, складываются и выставляются в рейтинговый лист общим баллом со знаком «+». Например + 45. Оценка «3», полученная учащимися в течение учебной четверти, оценивается « - 3» балла, полученная сумма выставляется в рейтинговый лист со знаком «-». Оценка «2», полученная учащимися в течение учебной недели, оценивается « - 5» баллов, полученная сумма выставляется в рейтинговый лист со знаком «-». Например - 30. Оценка «1», полученная учащимися в течение учебной недели, оценивается « - 6» баллов, полученная сумма выставляется в рейтинговый лист со знаком «-».
                                        </li><br/>
                                    </ul>
                                </ul>
                            </li>
                            <a name="anchor3"></a><br/>
                            
                            <br/>
                            <li><em>Для подсчета рейтинга используются данные электронного журнала, журнала учета опоздавших учащихся и без карточек «проход и питание».<em/></li><a name="anchor5"></a>
                            <br/>
                            <a name="anchor5"></a><br/>
                            <li><b>Награждение.</b>
                                <ul><br/>
                                    <li>По итогам рейтинга учащиеся представляются к денежной премия 1 раз в четверть в размере:
                                        <ul><br/>
                                            <li> Для победителей 6-х и 7-х классов – 2000 рублей;</li>   
                                            <br/>
                                            <li>Для победителей 8-х и 9-х классов – 4000 рублей;</li>
                                            <br/>
                                            <li> Для победителей 10-х и 11-х классов – 6000 рублей</li>
                                            <br/>
                                        </ul>
                                        <li>Награждение проходит в актовом зале школы в присутствие всей параллели в начале следующей четверти. По итогам 4 четверти победители рейтинга в 6-х, 7-х, 8-х, 10-х классов награждаются в конце последней учебной недели, учащихся 9-х, 11-х классов - на линейке, посвященной празднику последнего звонка. Награждение победителей проводит директор школы либо его заместитель.
                                        </li>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>    
                     <br/>
                    <h3 style=" text-align: center;" >Положение о рейтинге учащихся «Самый активный школьник 109» - САШ 109</h3>
                     <br/>
                    <div id="block_polo" >
                        <a name="anchor6"></a><br/>
                        <ul  style="list-style-type:decimal;"> <br/>
                            <li><b>Общие положения.</b>
                                <ul><br/>
                                    <li>Цель рейтинга - создание условий для повышения мотивации учащихся к общественной активности ,воспитание ответственного отношения к порученному делу.
                                    </li>
                                    <br/>
                                    <li>Развитие школьного самоуправления, привлечение школьников к участию в общественной жизни школы.
                                    </li>
                                    <br/>
                                    <li> Рейтинг присваивается учащимися 6х - 11х классов по итогам каждой четверти.
                                    </li>
                                    <br/>
                                    <li>Положение о рейтинге учащихся разрабатывается творческой группой педагогов, учащихся и утверждается на заседании педагогического и управляющего совета школы.
                                    </li>
                                    <br/>
                                    <li>Результаты рейтинга учащихся размещаются на сайт школы.
                                    </li>
                                    <br/>
                                    <li>Спорные вопросы по рейтингу решаются советом учащихся, классным руководителем и администрацией школы.
                                    </li>
                                </ul>
                            </li>
                            <br/>
                             <a name="anchor7"></a><br/>
                            <li><b>Механизм формирования рейтинга.</b>
                                <ul><br/>
                                    <li><u>Итоговый рейтинг учащегося состоит из четырех показателей:</u>
                                        <ul><br/>
                                            <li>активное участие в делах школы по итогам учебной четверти;
                                            </li>
                                            <br/>
                                            <li>активное участие в делах класса по итогам учебной четверти;
                                            </li>
                                            <br/>
                                            <li>участие в межрайонных, муниципальных и прочих общественных мероприятиях;
                                            </li>
                                            <br/>
                                            <li>участие в олимпиадах, творческих конкурсах, фестивалях, смотрах.
                                            </li>
                                            <br/>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <br/>
                            <a name="anchor8"></a><br/>
                            <li><b>Критерии оценки рейтинга учащихся</b>
                                <ul><br/>
                                    <li>В каждом классе рейтинг подсчитывает Совет класса;
                                    </li>
                                    <br/>
                                    <li>За участие в общественных делах школы учащийся получает от «- 5» до «5» баллов;
                                    </li>
                                    <br/>
                                    <li>За активное участие в делах класса «-4»до «4» баллов;
                                    </li>
                                    <br/>
                                    <li>Участие в течение четверти в олимпиадах, конкурсах и фестивалях 5 баллов
                                    </li>
                                    <br/>
                                    <li>Призовые места по итогам олимпиад, конкурсов, фестивалей, смотров 5 баллов
                                    </li>
                                </ul>
                            </li>    
                            <br/>
                            <a name="anchor9"></a><br/>
                            <li><b>Награждение.</b>
                                <ul><br/>
                                    <li>По итогам рейтинга учащиеся представляются к денежной премия 1 раз в четверть в размере:
                                        <ul><br/>
                                            <li> Для победителей 6-х и 7-х классов – 2000 рублей;</li>   
                                            <br/>
                                            <li>Для победителей 8-х и 9-х классов – 4000 рублей;</li>
                                            <br/>
                                            <li> Для победителей 10-х и 11-х классов – 6000 рублей</li>
                                            <br/>
                                        </ul>
                                        <li>Награждение проходит в актовом зале школы в присутствие всей параллели в начале следующей четверти. По итогам 4 четверти победители рейтинга в 6-х, 7-х, 8-х, 10-х классов награждаются в конце последней учебной недели, учащихся 9-х, 11-х классов - на линейке, посвященной празднику последнего звонка. Награждение победителей проводит директор школы либо его заместитель.
                                        </li>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>    
                        
                </td>
                
 <!--//////////////////////////////////////////////////////////ПРАВАЯ КОЛОНКА/////////////////////////////////////////////////////////--->
 
 
                <td valign="top" style="padding: 50px 0 0 10px;">
                   <a href="results.php">Результаты рейтинга</a> 
                </td>
                
            </tr>  
            
            <tr>
                <td>По всем вопросам обращайтесь к Nзвекову Александру Дмитриевичу <br/><text style="font-weight: bold;">e-mail:<a href="mailto:sasizvekv@yandex.ru?subject=rating">  sasizvekv@yandex.ru</a></text><br/>
                   <text style="font-weight: bold;"> тел. <a href="tel:+79162251733">8(916)2251733</a></text></td>
                <td style="text-align: center; word-spacing: 20px; letter-spacing: 5px;">All rights reserved</td>
                <td>
<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=34323300&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/34323300/3_1_FFFFFFFF_FFFFFFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="������.�������" title="������.�������: ������ �� ������� (���������, ������ � ���������� ����������)" onClick="try{Ya.Metrika.informer({i:this,id:34323300,lang:'ru'});return false}catch(e){}" /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter34323300 = new Ya.Metrika({
                    id:34323300,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/34323300" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<div id="scrollup"><img alt="Прокрутить вверх" src="up.png"></div>
</td>
            
</tr>
        </table>
        
      
    </body>
</html>
