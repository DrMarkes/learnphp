<?php 
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$subject = $_POST['subject'];
	$message = $_POST['body'];
	$to = 'markovandrew@yandex.ru';
	$headers = "Content-Type: text/html;charset=utf-8\r\n";
	$headers .= "From: Андрей М. <drmarkes@markes.com>\r\n";

	if(mail($to, $subject, $message, $headers)) {
		$result = "Письмо отправлено";
	} else {
		$result = "Письмо не отправлено";
	}
}

echo $result;
?>
<h3>Адрес</h3>
<p>123456 Москва, Малый Американский переулок 21</p>
<h3>Задайте вопрос</h3>
<form action='<?php $_SERVER['REQUEST_URI']?>' method='post'>
	<label>Тема письма: </label><br />
	<input name='subject' type='text' size="50"/><br />
	<label>Содержание: </label><br />
	<textarea name='body' cols="50" rows="10"></textarea><br /><br />
	<input type='submit' value='Отправить' />
</form>	
