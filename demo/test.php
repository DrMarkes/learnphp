<?php
/*$x = (real) 'hello';
echo getType($x);*/

function myCount($var, $mode = 0)
{
    $count = 0;
    if (is_null($var)) {
        return 0;
    }

    if (!is_array($var)) {
        return 1;
    }

    foreach ($var as $item) {
        if (is_array($item) && 1 == $mode) {
            $count += myCount($item, 1);
        }
        $count++;
    }
    return $count;
}

echo myCount([
    [1, 1, 1, 1],
    [1, 1],
    [1, 1],
]);
echo "<br>";
echo myCount([
    [1, 1, 1, 1],
    [1, 1],
    [1, 1],
], 1);
/*echo myCount();
echo myCount(1);
echo myCount([]);*/

print_r(getdate());