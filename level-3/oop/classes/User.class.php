<?php

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