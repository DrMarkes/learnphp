<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	addToBasket($id);
}

header("Location: /level-2/eshop/catalog.php");
exit;