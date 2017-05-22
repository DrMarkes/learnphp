<?php

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
        --parent::$countUsers;
        $this->role = $role;
        ++self::$countSuperUsers;
    }

    public function showInfo()
    {
        parent::showInfo();
        echo "<p><b>Роль:</b> $this->role</p>";
    }

    public function getInfo() {
        /*$info = [];
        foreach ($this as $property => $value) {
            $info[$property] = $value;
        }
        return $info;*/
        return (array) $this;
    }
}