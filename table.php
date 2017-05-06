<?php 
$cols = '';
$rows = '';
$color = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$cols = cleanUInt($_POST['cols']);
	$rows = cleanUInt($_POST['rows']);
	$color = cleanStr($_POST['color']);
}

$cols = ($cols) ? $cols : 10;
$rows = ($rows) ? : 10;
$color = ($color) ? : 'yellow';

?>
<!-- Область основного контента -->
<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
    <label>
        Количество колонок:
    </label>
    <br/>
    <input name="cols" type="text" value="<?php echo $cols ?>"/>
    <br/>
    <label>
        Количество строк:
    </label>
    <br/>
    <input name="rows" type="text" value="<?php echo $rows ?>"/>
    <br/>
    <label>
        Цвет:
    </label>
    <br/>
    <input name="color" type="text" value="<?php echo $color ?>"/>
    <br/>
    <br/>
    <input type="submit" value="Создать"/>
</form>
<!-- Таблица -->
<?php drawTable($cols, $rows, $color);?>
<!-- Таблица -->
<!-- Область основного контента -->
