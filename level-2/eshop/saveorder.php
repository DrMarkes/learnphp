<?php
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = strip_tags(trim($_POST['name']));
		$email = strip_tags(trim($_POST['email']));
		$phone = strip_tags(trim($_POST['phone']));
		$address = strip_tags(trim($_POST['address']));
		$id = $basket['orderId'];
		$date = time();

		$order = "$name|$email|$phone|$address|$id|$date\n";

		if(!file_put_contents('admin/' . ORDERS_LOG, $order, FILE_APPEND)) {
			echo "Произошла ошибка оформления, обратитесь к тех.поддержке!";
			exit;
		}
		saveOrder($date);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Сохранение данных заказа</title>
</head>
<body>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Вернуться в каталог товаров</a></p>
</body>
</html>