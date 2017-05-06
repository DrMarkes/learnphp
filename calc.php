<?php
$output = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // TODO: Проверить все ли поля пришли
    
    $num1 = cleanInt($_POST['num1']);
    $operator = cleanStr($_POST['operator']);
    $num2 = cleanInt($_POST['num2']);

    $output = "$num1 $operator $num2 = ";

    switch ($operator) {
        case '+':
            $output .= $num1 + $num2;
            break;
        case '-':
            $output .= $num1 - $num2;
            break;
        case '*':
            $output .= $num1 + $num2;
            break;
        case '/':
            if(0 === $num2) {
                $output = 'На ноль делить нельзя!';
            } else {
                $output .= $num1 / $num2;
            }
            break;      
        default:
            $output = "Неизвестный оператор: '$operator'";
            break;
    }
}

if($output) {
    echo "<h3> Результат: $output</h3>";
}
?>
<!-- Область основного контента -->
<form action="" method="POST">
    <label>
        Число 1:
    </label>
    <br/>
    <input name="num1" type="text" value="$num1" />
    <br/>
    <label>
        Оператор:
    </label>
    <br/>
    <input name="operator" type="text" value="$operator" />
    <br/>
    <label>
        Число 2:
    </label>
    <br/>
    <input name="num2" type="text" value="$num2" />
    <br/>
    <br/>
    <input type="submit" value="Считать">
    </input>
</form>
<!-- Область основного контента -->
