<?php
/* Основные настройки */
const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASSWORD = '12345';
const DB_NAME = 'gbook';

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

mysqli_query($link, "SET NAMES 'utf8'");
/* Основные настройки */

/* Сохранение записи в БД */

/**
 * clear string to sql request
 * @param object $link mysqli connect object
 * @param string $date 
 * @return string       
 */
function clearString($link, $date)
{
	return mysqli_real_escape_string($link, trim(strip_tags($date)));
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = clearString($link, $_POST['name']);
	$email = clearString($link, $_POST['email']);
	$msg = clearString($link, $_POST['msg']);

	$sql = "INSERT INTO msgs(name, email, msg) VALUE('$name', '$email', '$msg')";
	mysqli_query($link, $sql) or die(mysqli_error($link));
	mysqli_close($link);

	header("Location: {$_SERVER['SCRIPT_NAME']}?id=gbook");
	exit;
}
/* Сохранение записи в БД */

/* Удаление записи из БД */
if (isset($_GET['del'])) {
	$delId = (int) abs($_GET['del']);
	echo $delId;
	if($delId) {
	$sqlDel = "DELETE FROM msgs WHERE id = $delId";
	mysqli_query($link, $sqlDel) or die(mysqli_error($link));

	header("Location: {$_SERVER['SCRIPT_NAME']}?id=gbook");
	exit;
	}
}
/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */
$sqlSelect = "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt 
	FROM msgs ORDER BY dt DESC";
$result = mysqli_query($link, $sqlSelect);
mysqli_close($link);

$count = mysqli_num_rows($result);

echo "<hr><p>Всего записей в гостевой книге: $count</p><br>";

$resultToArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($resultToArray as $value) {
	$dt = date('d-m-Y в H:i', $value['dt']);

	echo <<<DATA
	<p>
		<a href="mailto:{$value['email']}">{$value['name']}</a>
	$dt написал<br>{$value['msg']}
	</p>
	<p align="right">
		<a href="http://learnphp.dev/level-2/index.php?id=gbook&del={$value['id']}">
		удалить</a>
	</p>
DATA;
}
/* Вывод записей из БД */
?>