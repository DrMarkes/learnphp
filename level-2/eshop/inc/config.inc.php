<?php

const DB_HOST     = "localhost";
const DB_LOGIN    = "root";
const DB_PASSWORD = "12345";
const DB_NAME     = "eshop";
const ORDERS_LOG  = "orders.log";

$basket = []; // Корзина покупателя
$count  = 0; // Количество товара в корзине покупателя

// Установка соединения с базой данных
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME)
	or die(mysqli_connect_error());

mysqli_query($link, "SET NAMES 'utf8'");

// Инициализация корзины покупателя
basketInit();

