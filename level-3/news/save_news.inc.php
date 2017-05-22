<?php

$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];
$source = $_POST['source'];

if(empty($title) ||
    empty($category) ||
    empty($description) ||
    empty($source)) {
    $errMsg = "Заполните все поля формы!";
} else {
    $result = $news->saveNews(
        $title,
        $category,
        $description,
        $source);

    if($result) {
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    } else {
        $errMsg = "Произошла ошибка при добавлении новости";
    }
}