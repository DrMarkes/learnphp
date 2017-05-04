<?php
// Подключение файла конфигурации php
require_once 'config.php';

// Объявление константы
const COPYRIGHT = 'Супер Мега Веб-мастер';

// Установка локали и выбор значений даты
setlocale(LC_ALL, 'ru_RU.utf-8');
$day   = strftime('%d');
$month = strftime('%B');
$year  = strftime('%Y');

// Инициализация массива
$leftMenu = [
    ['link' => 'Домой', 'href' => 'index.php'],
    ['link' => 'О нас', 'href' => 'about.php'],
    ['link' => 'Контакты', 'href' => 'contact.php'],
    ['link' => 'Таблица умножения', 'href' => 'table.php'],
    ['link' => 'Калькулятор', 'href' => 'calc.php'],
];

/**
 * Draw Navigation Menu
 * @param  array   $menu     Menu Items
 * @param  boolean $vertical Menu Orientation
 * @return void
 */
function drawMenu(array $menu, $vertical = true)
{
    $liStyle = '';
    $aStyle  = '';
    if (!$vertical) {
        $liStyle = "style='display: inline-block;
            margin-right: 30px'";
        $aStyle = "style='display: block;
            padding: 5px, 15px;
            text-decoration: none'";
    }
    echo "<ul>";
    foreach ($menu as $menuItem) {
        echo "<li $liStyle><a $aStyle href='{$menuItem['href']}'> {$menuItem['link']}</a></li>";
    }
    echo "</ul>";
}

/*
 * Получаем текущий час от 00 до 23
 * и приводим строку к числу от 0 до 23
 */
$hour    = (int) strftime('%H');
$welcome = '';

if ($hour < 6) {
    $welcome = 'Доброй ночи';
} elseif ($hour < 12) {
    $welcome = 'Доброе утро';
} elseif ($hour < 18) {
    $welcome = 'Добрый день';
} elseif ($hour < 23) {
    $welcome = 'Добрый вечер';
} else {
    $welcome = 'Доброй ночи';
}

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
            <img alt="Наш логотип" class="logo" height="29" src="logo.gif" width="187"/>
            <span class="slogan">
                приходите к нам учиться
            </span>
            <!-- Верхняя часть страницы -->
        </div>
        <div id="content">
            <!-- Заголовок -->
            <h1>
                <?php echo $welcome; ?>, Гость!
            </h1>
            <!-- Заголовок -->
            <!-- Область основного контента -->
            <blockquote>
                <?php echo "Сегодня $day число, $month месяц, $year год."; ?>
            </blockquote>
            <h3>
                Зачем мы ходим в школу?
            </h3>
            <p>
                У нас каждую минуту что-то происходит и кипит жизнь. Проходят уроки и шумят перемены, кто-то отвечает у доски, кто-то отчаянно зубрит перед контрольной пройденный материал, кому-то ставят «пятерку» за сочинение, кого-то ругают за непрочитанную книгу, на школьной спортивной площадке ребята играют в футбол, а девочки – в волейбол, некоторые готовятся к соревнованиям, другие участвуют в репетициях праздников…
            </p>
            <h3>
                Что такое ЕГЭ?
            </h3>
            <p>
                Аббревиатура ЕГЭ расшифровывается как "Единый Государственный Экзамен".
            Почему "единый"? ЕГЭ одновременно является и вступительным экзаменом в ВУЗ и итоговой оценкой каждого выпускника школы. К тому же на всей территории России используются однотипные задания и единая система оценки.
            </p>
            <p>
                Результаты ЕГЭ оцениваются по 100-балльной и пятибалльной системам и заносятся в свидетельство о результатах единого государственного экзамена. Срок действия данного документа истекает 31 декабря года, следующего за годом его выдачи, поэтому у абитуриентов есть возможность поступать в ВУЗы со свидетельством ЕГЭ в течение двух лет.
            </p>
            <!-- Область основного контента -->
        </div>
        <div id="nav">
            <!-- Навигация -->
            <h2>
                Навигация по сайту
            </h2>
            <!-- Меню -->
            <?php drawMenu($leftMenu);?>
            <!-- Меню -->
            <!-- Навигация -->
        </div>
        <div id="footer">
            <!-- Нижняя часть страницы -->
            <?php drawMenu($leftMenu, 0);?>
            <hr>
            © <?php echo COPYRIGHT, ", 2000 - $year"; ?>
            <!-- Нижняя часть страницы -->
        </div>
    </body>
</html>
