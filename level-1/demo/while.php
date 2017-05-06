<?php

$var    = 'HELLO';
$length = strlen($var) - 1;
$i      = 0;

while ($i <= $length) {
    echo $var{$i++} . "<br>";
}
