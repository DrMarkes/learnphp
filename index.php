<?php
require_once 'lib.inc.php';
require_once 'data.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Сайт нашей школы
        </title>
        <meta charset="utf-8"/>
        <link href="style.css" rel="stylesheet" />
    </head>
    <body>
        <div id="header">
            <!-- Верхняя часть страницы -->
            <?php include_once 'top.inc.php' ?>
            <!-- Верхняя часть страницы -->
        </div>
        <div id="content">
            <!-- Заголовок -->
            <h1>
            <?php echo $welcome; ?>, Гость!
            </h1>
            <!-- Заголовок -->
            <!-- Область основного контента -->
            <?php include_once 'index.inc.php' ?>
            <!-- Область основного контента -->
        </div>
        <div id="nav">
            <!-- Навигация -->
                <?php require_once 'menu.inc.php' ?>
            <!-- Навигация -->
        </div>
        <div id="footer">
            <!-- Нижняя часть страницы -->
            <?php include_once 'bottom.inc.php' ?>
            <!-- Нижняя часть страницы -->
        </div>
    </body>
</html>
