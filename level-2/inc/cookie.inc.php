<?php

setlocale(LC_ALL, 'ru_RU.utf-8');

$visitCounter = 0;
$lastVisit    = '';

if (isset($_COOKIE['visitCounter'])) {
    $visitCounter = $_COOKIE['visitCounter'];
}
$visitCounter++;

if (isset($_COOKIE['lastVisit'])) {
    $lastVisit = date('d-m-Y H:i:s', $_COOKIE['lastVisit']);
}

if(date('d-m-Y', $_COOKIE['lastVisit']) != date('d-m-Y')) {
setcookie('visitCounter', $visitCounter);
setcookie('lastVisit', time());
}