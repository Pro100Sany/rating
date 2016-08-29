<?php
header('Content-Type: text/html; charset=utf-8'); 
include("db_config.php");
mysql_connect($sql_host,$sql_login,$sql_password);
mysql_select_db($sql_database);	 ?> 
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация пользователей на PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="main">
    <?php
    if(!empty($_POST['username']) && !empty($_POST['password']))  
    {  
    // позволим пользователю зарегистрироваться
    $username = mysql_real_escape_string($_POST['username']);  
    $password = base64_encode(mysql_real_escape_string($_POST['password']));  
    $email = mysql_real_escape_string($_POST['email']);  
    
  
    
     $checkusername = mysql_query("SELECT * FROM users WHERE username = '".$username."'");  
 
     if(mysql_num_rows($checkusername) == 1)  
     {  
        echo "<h1>Ошибка</h1>";  
        echo "<p>Извините, такое имя пользователя уже используется. Вернитесь назад и попробуйте снова.</p>";  
     }  
     else  
     {  
        $registerquery = mysql_query("INSERT INTO users (Username, Password, EmailAddress) VALUES('".$username."', '".$password."', '".$email."')");  
        if($registerquery)  
        {  
            echo "<h1>Успех!</h1>";  
            echo "<p>Ваша учётная запись создана. <a href=\"index.php\">Авторизуйтесь</a>.<a href=\"register.php\">НАЗАД</a></p>";  
        }  
        else  
        {  
            echo "<h1>Ошибка</h1>";  
            echo "<p>Мы не смогли вас зарегистрировать. Вернитесь назад и попробуйте снова.</p>";      
        }         
     }  
}  
else  
{  
    ?>  
 
   <h1>Регистрация</h1>  
 
   <p>Пожалуйста заполните несколько полей ниже.</p>  
 
    <form method="post" action="register.php" name="registerform" id="registerform">  
    <fieldset>  
        <label for="username">Логин:</label><input type="text" name="username" id="username"><br>  
        <label for="password">Пароль:</label><input type="password" name="password" id="password"><br>  
        <label for="email">Email:</label><input type="text" name="email" id="email"><br>  
        <input type="submit" name="register" id="register" value="Зарегистрироваться">  
    </fieldset>  
    </form>  
 
   <?php  
}  


?>
    </div>
</body>
</html>