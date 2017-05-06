<?php
require_once 'lib.inc.php';
require_once 'data.inc.php';

// Инициализация заголовков страницы
$title = 'Сайт нашей школы';
$header = "$welcome, Гость!";
if(isset($_GET['id'])) {
    $id = strtolower(cleanStr($_GET['id']));
} else {
    $id = '';
}
switch ($id) {
    case 'about':
        $title = 'О сайте';
        $header = 'О нашем сайте';
        break;

        case 'calc':
        $title = 'Онлайн калькулятор';
        $header = 'Калькулятор';
        break;

        case 'table':
        $title = 'Таблица умножения';
        $header = 'Таблица умножения';
        break;

        case 'contact':
        $title = 'Контакты';
        $header = 'Обратная связь';
        break;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php echo $title; ?>
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
                <?php echo $header ?>
            </h1>
            <!-- Заголовок -->
            <!-- Область основного контента -->
            <?php
            switch ($id) {
                case 'about':
                    include 'about.php';
                    break;
                
                case 'contact':
                    include 'contact.php';  
                    break;

                case 'table':
                    include 'table.php';
                    break;

                case 'calc':
                    include 'calc.php';
                    break;

                default:
                    include 'index.inc.php';
            }
            ?>
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
