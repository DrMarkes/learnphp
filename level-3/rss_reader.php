<?php
const RSS_URL = "http://learnphp.dev/level-3/news/rss.xml";
const FILE_NAME = "news.xml";

/**
 * @param $url
 * @param $filename
 * @return bool
 */
function download($url, $filename)
{
    $file = file_get_contents($url);
    if($file) {
        return file_put_contents($filename, $file);
    }

    return false;
}

if (!file_exists(FILE_NAME)) {
    download(RSS_URL, FILE_NAME);
}


?>

<!DOCTYPE html>

<html lang="ru">
<head>
    <title>Новостная лента</title>
    <meta charset="utf-8"/>
</head>
<body>

<h1>Последние новости</h1>
<?php
$rss = simplexml_load_file(FILE_NAME);
if (!empty($rss->channel)) {
    $items = $rss->channel->item;

    foreach ($items as $item) {
        $description = nl2br($item->description);
        echo <<<NEWS
<hr/>
<H3>{$item->title}</H3>
<br>{$description}</br></br>{$item->category} @ {$item->pubDate}</p>
<p><a href="{$item->link}">Ссылка на новость</a></p>
NEWS;
    }
}

if(time() > filemtime(FILE_NAME) + 600) {
    download(RSS_URL, FILE_NAME);
}
?>
</body>
</html>