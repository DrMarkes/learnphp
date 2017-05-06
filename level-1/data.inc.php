<?php
// Подключение файла конфигурации php
require_once 'config.php';

// Объявление констант
const COPYRIGHT               = 'Супер Мега Веб-мастер';
const ERR_DRAW_ON_BOTTOM_MENU = 'Извините...';
const ERR_DRAW_ON_LEFT_MENU   = 'Извините...';

// Установка локали и выбор значений даты
setlocale(LC_ALL, 'ru_RU.utf-8');
$day   = strftime('%d');
$month = strftime('%B');
$year  = strftime('%Y');

// Инициализация массива
$leftMenu = [
    ['link' => 'Домой', 'href' => 'index.php'],
    ['link' => 'О нас', 'href' => 'index.php?id=about'],
    ['link' => 'Контакты', 'href' => 'index.php?id=contact'],
    ['link' => 'Таблица умножения', 'href' => 'index.php?id=table'],
    ['link' => 'Калькулятор', 'href' => 'index.php?id=calc'],
];

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
