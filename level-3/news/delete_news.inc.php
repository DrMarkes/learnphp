<?php

if(!$news->deleteNews($_GET['del'])) {
    $errMsg = "Ошибка удаления записи!";
} else {
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}