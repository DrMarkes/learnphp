<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Корзина пользователя</title>
</head>
<body>
	<h1>Ваша корзина</h1>
<?php
if(!$myBasket = myBasket()) {
	echo "Корзина пуста! Вернитесь в каталог.<br>";
	echo "Вернуться в <a href='catalog.php'>каталог</a>";
	exit;
}

$i = 0; 
$sum = 0;
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N п/п</th>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
	<th>Удалить</th>
</tr>
<?php

foreach($myBasket as $item) {
	$i++;
	$sum += $item['quantity'] * $item['price'];
	echo <<<ITEMS
	<tr>
		<td>$i</td>
		<td>{$item['title']}</td>
		<td>{$item['author']}</td>
		<td>{$item['pubyear']}</td>
		<td>{$item['price']}, руб.</td>
		<td>{$item['quantity']}</td>
		<td><a href="delete_from_basket.php?id={$item['id']}">Удалить</a></td>
	</tr>
ITEMS;
}
?>
</table>

<p>Всего товаров в корзине на сумму: <?php echo $sum; ?> руб.</p>

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'" />
</div>

</body>
</html>







