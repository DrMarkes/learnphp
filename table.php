<?php

function drawTable($cols = 10, $rows = 10, $color = 'yellow')
{
    echo "<table border='1'>";
    for ($i = 1; $i <= $rows; $i++) {
        echo "<tr>";
        for ($m = 1; $m <= $cols; $m++) {
            $mult = $i * $m;
            if (1 == $m or 1 == $i) {
                echo "<th style='text-align: center;
                	height: 36px;
                	width: 36px;
                	background: $color'
					> $mult </th>";
            } else {
                echo "<td> $mult </td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Таблица умножения</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>

		<div id="header">
			<!-- Верхняя часть страницы -->
			<img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
			<span class="slogan">приходите к нам учиться</span>
			<!-- Верхняя часть страницы -->
		</div>

		<div id="content">
			<!-- Заголовок -->
			<h1>Таблица умножения</h1>
			<!-- Заголовок -->
			<!-- Область основного контента -->
			<form action=''>
				<label>Количество колонок: </label><br />
				<input name='cols' type='text' value="" /><br />
				<label>Количество строк: </label><br />
				<input name='rows' type='text' value="" /><br />
				<label>Цвет: </label><br />
				<input name='color' type='text' value="" /><br /><br />
				<input type='submit' value='Создать' />
			</form>
			<!-- Таблица -->
				<?php drawTable();?>
			<!-- Таблица -->
			<!-- Область основного контента -->
		</div>
		<div id="nav">
			<h2>Навигация по сайту</h2>
			<!-- Меню -->
			<ul>
				<li><a href='index.php'>Домой</a></li>
				<li><a href='about.php'>О нас</a></li>
				<li><a href='contact.php'>Контакты</a></li>
				<li><a href='table.php'>Таблица умножения</a></li>
				<li><a href='calc.php'>Калькулятор</a></li>
			</ul>
			<!-- Меню -->
		</div>
		<div id="footer">
			<!-- Нижняя часть страницы -->
			&copy; Супер Мега Веб-мастер, 2000 - 2012
			<!-- Нижняя часть страницы -->
		</div>
	</body>
</html>
