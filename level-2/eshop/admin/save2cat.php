<?php
	// подключение библиотек
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/config.inc.php";

	// Получение данных из формы добавления товара
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = clearString($_POST['title']);
		$author = clearString($_POST['author']);
		$pubyear = clearInt($_POST['pubyear']);
		$price = clearInt($_POST['price']);

		// Добавление данных в каталог
		if(!addItemToCatalog($title, $author, $pubyear, $price)) {
			return false;
		} else {
			header("Location: add2cat.php");
		}

	}
