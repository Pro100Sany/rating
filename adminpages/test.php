<?php 
header('Content-Type: text/html; charset=utf-8'); 
?>
<!doctype html>
<html>
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/css/bootstrap-theme.css">
        <link rel="stylesheet" href="../css/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/css/bootstrap.css">
        <link rel="stylesheet" href="../css/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="../css/css.css">
        
        <script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/jquery.menu.js"></script>
        
        <script type="text/javascript" src="../js/scrollup.js"></script> 
        <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
    <title>Редактор паролей</title>
</head>
<div class="col-lg-10">
                    <nav role="navigation" class="navbar navbar-inverse">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                             <span class="navbar-brand"><?php echo $klass ?></span>
                         </div>
                         <div id="navbarCollapse" class="collapse navbar-collapse">
                             <ul class="nav navbar-nav">
                                <li><a  href="../index.php">Главная</a></li>
                                <li><a href="../adminpages/password_editor.php">Редактор паролей</a></li>
                                <li><a href="../adminpages/spiski_editor.php" >Редактор списков</a></li>
                                <li><a href="../adminpages/new_spiski.php" >Обновить списки</a></li>
                             </ul>        
                         </div>
                  </nav>
</div>

</html>

<!--
                            <ul class="nav navbar-nav">
                                <li><a  href="../index.php">Главная</a></li>
                                <li><a href="../adminpages/password_editor.php">Редактор паролей</a></li>
                                <li><a href="../adminpages/spiski_editor.php" >Редактор списков</a></li>
                                <li><a href="../adminpages/new_spiski.php" >Обновить списки</a></li>
                            </ul>        -->