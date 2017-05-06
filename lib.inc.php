<?php

/**
 * Filtration string data
 * @param  $string $data data
 * @return $string       filtration data
 */
function cleanStr($data)
{
    return trim(strip_tags($data));
}

/**
 * Filtration data integer
 * @param  int $data input data
 * @return int       filtration data
 */
function cleanInt($data)
{
    return (int) $data;
}

/**
 * Filtration absolute integer data
 * @param  int $data input data
 * @return int       abs int data
 */
function cleanUInt($data)
{
    return abs(cleanInt($data));
}

/**
 * Draw Multiplication table
 * @param  integer $cols  the number of columns
 * @param  integer $rows  the number of rows
 * @param  string  $color the color number
 * @return void
 */
function drawTable($cols = 10, $rows = 10, $color = 'yellow')
{
    echo "<table border='1'>";
    for ($i = 1; $i <= $rows; $i++) {
        echo "<tr>";
        for ($m = 1; $m <= $cols; $m++) {
            $mult = $i * $m;
            if (1 == $m or 1 == $i) {
                echo "<th style='text-align: center;
                    height: 36px;
                    width: 36px;
                    background: $color'
                    > $mult </th>";
            } else {
                echo "<td> $mult </td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

/**
 * Draw Navigation Menu
 * @param  array   $menu     Menu Items
 * @param  boolean $vertical Menu Orientation
 * @return boolean true if OK, else false
 */
function drawMenu($menu, $vertical = true)
{
    if(!is_array($menu)) {
        return false;
    }
    $liStyle = '';
    $aStyle  = '';
    if (!$vertical) {
        $liStyle = "style='display: inline-block;
            margin-right: 30px'";
        $aStyle = "style='display: block;
            padding: 5px, 15px;
            text-decoration: none'";
    }
    echo "<ul>";
    foreach ($menu as $menuItem) {
        echo "<li $liStyle><a $aStyle href='{$menuItem['href']}'> {$menuItem['link']}</a></li>";
    }
    echo "</ul>";

    return true;
}

/**
 * Show max size of upload file
 * @return true
 */
function showFileSize()
{
    $size = ini_get('post_max_size');
    $bit  = $size[strlen($size) - 1];
    $size = (int) $size;
    switch (strtoupper($bit)) {
        case 'G':
            $size *= 1024;

        case 'M':
            $size *= 1024;

        case 'K':
            $size *= 1024;
    }
    echo $size;
    return true;
}
