<form action="" method="post">
    <input type="text" name="name"><br>
    <input type="text" name="age"><br>
    <input type="submit">
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = trim(strip_tags($_POST['name']));
$age = abs((int) ($_POST['age']));
$message = htmlspecialchars($_POST['message']);

echo "Ваше имя: $name<br>";
echo "Ваш возраст: $age";
}
