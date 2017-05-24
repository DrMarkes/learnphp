<?php
header("Content-Type: text/html;charset=utf-8");

$dom = new DOMDocument();
$dom->load('catalog.xml');
//$dom->preserveWhiteSpace = false;
$root = $dom->documentElement;
//echo $root->nodeType;
$books = $root->childNodes;


?>
<html>
<head>
    <title>Каталог</title>
</head>
<body>
<h1>Каталог книг</h1>
<table border="1" width="100%">
    <tr>
        <th>Автор</th>
        <th>Название</th>
        <th>Год издания</th>
        <th>Цена, руб</th>
    </tr>
    <?php
    //Парсинг
    foreach ($books as $book) {
        if($book->nodeType == 1) {
            echo "<tr>";
            foreach ($book->childNodes as $value) {
                if ($value->nodeType == 1) {
                    echo "<td>{$value->textContent}</td>";
                }
            }
            echo "</tr>";
        }
    }
    ?>
</table>
</body>
</html>