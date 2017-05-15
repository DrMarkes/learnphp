<?php

/**
* 
*/
abstract class AUser
{
	protected $name, $login, $password;

	public static $countUsers = 0;

	public function __construct($name, $login, $password)
	{
		$this->name = $name;
		$this->login = $login;
		$this->password = $password;
		++self::$countUsers;
	}

	public function __destruct()
	{
		echo "Пользователь $this->login удален<br>";
	}	

	public function __clone()
	{
		$this->name = '';
		$this->login = '';
		$this->password = '';
	}	

	abstract function showInfo();
}

/**
 * 
 */
class User extends AUser
{		

	public function showInfo()
	{
		echo <<<INFO
		<hr>
		<p><b>Имя:</b> $this->name</p>
		<p><b>Логин:</b> $this->login</p>
		<p><b>Пароль:</b> $this->password</p>
INFO;
	}	
}

interface ISuperUser {
	function getInfo();
}

/**
* 				
*/
class SuperUser extends User implements ISuperUser
{
	public static $countSuperUsers = 0;
	protected $role;
	
	function __construct($name, $login, $password, $role)
	{
		parent::__construct($name, $login, $password);
		$this->role = $role;
		++self::$countSuperUsers;
	}

	public function showInfo()
	{
		parent::showInfo();
		echo "<p><b>Роль:</b> $this->role</p>";
	}

	public function getInfo() {
		$info = [];
		foreach ($this as $property => $value) {
			$info[$property] = $value;
		}
		return $info;
	}
}

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