<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

	if ($id = clearInt($_GET['id'])) {
		deleteItemFromBasket($id);
	}
	header("Location: basket.php");
	exit;

