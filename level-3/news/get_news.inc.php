<?php

$result = $news->getNews();

if(empty($result)) {
    $errMsg = "Произошла ошибка при выводе новостной ленты!";
} else {
    $count = count($result);

    echo "<br/><p>Всего новостей: $count</p>";

    foreach ($result as $news) {
        $datetime = date("d-m-Y H:i:s", $news['datetime']);
        $description = nl2br($news['description']);
        echo <<<NEWS
<hr/>
<H3>{$news['title']}</H3>
<br>{$description}</br></br>{$news['category']} @ $datetime</p>
<p align="right"><a href="{$_SERVER['PHP_SELF']}?del={$news['id']}">Удалить</a></p>
NEWS;
    }
}