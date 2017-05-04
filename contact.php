<!DOCTYPE html>
<html>
    <head>
        <title>
            Контакты
        </title>
        <meta charset="utf-8"/>
        <link href="style.css" rel="stylesheet"/>
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
                Обратная связь
            </h1>
            <!-- Заголовок -->
            <!-- Область основного контента -->
            <?php

$size = ini_get('post_max_size');
$bit  = $size[strlen($size) - 1];
$size = (int) $size;

switch (strtoupper($bit)) {
    case 'G':
        $size *= 1024;

    case 'M':
        $size *= 1024;

    case 'K':
        $size *= 1024;
}

?>
            <h3>
                Адрес
            </h3>
            <p>
                123456 Москва, Малый Американский переулок 21
            </p>
            <h3>
                Задайте вопрос
            </h3>
            <form action="" method="post">
                <label>
                    Тема письма:
                </label>
                <br/>
                <input name="subject" size="50" type="text"/>
                <br/>
                <label>
                    Содержание:
                </label>
                <br/>
                <textarea cols="50" name="body" rows="10">
                </textarea>
                <br/>
                <br/>
                <input type="submit" value="Отправить"/>
            </form>
            <p>
                Максимальный размер отправляемых данных
                <?php echo $size; ?>
                байт.
            </p>
            <!-- Область основного контента -->
        </div>
        <div id="nav">
            <h2>
                Навигация по сайту
            </h2>
            <!-- Меню -->
            <ul>
                <li>
                    <a href="index.php">
                        Домой
                    </a>
                </li>
                <li>
                    <a href="about.php">
                        О нас
                    </a>
                </li>
                <li>
                    <a href="contact.php">
                        Контакты
                    </a>
                </li>
                <li>
                    <a href="table.php">
                        Таблица умножения
                    </a>
                </li>
                <li>
                    <a href="calc.php">
                        Калькулятор
                    </a>
                </li>
            </ul>
            <!-- Меню -->
        </div>
        <div id="footer">
            <!-- Нижняя часть страницы -->
            © Супер Мега Веб-мастер, 2000 - 2012
            <!-- Нижняя часть страницы -->
        </div>
    </body>
</html>
