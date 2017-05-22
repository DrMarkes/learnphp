<?php
spl_autoload_register(function ($class) {
   include "classes/$class.class.php";
});

$user1 = new User('Андрей', 'DrMarkes', '12345');
$user1->showInfo();

$user2 = new User('Вася', 'Loh', '1');
$user2->showInfo();

$user3 = new User('Петя', 'Petr', '1234567890');
$user3->showInfo();

$user4 = clone $user1;
$user4->showInfo();

$user = new SuperUser('Андрей', 'DrMarkes', '12345', 'admin');
$user->showInfo();
echo "<pre>";
var_dump($user->getInfo());
echo "</pre>";

echo "Всего обычных пользователей: " . User::$countUsers . "<br>";
echo "Всего супер-пользователей: " . SuperUser::$countSuperUsers . "<hr>";