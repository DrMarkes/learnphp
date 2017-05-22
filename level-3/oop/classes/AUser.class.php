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
        ++self::$countUsers;
    }

    abstract function showInfo();
}