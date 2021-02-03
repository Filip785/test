<?php

namespace Filip785\MVC\Helpers;

class Authorize
{
    public static function verify()
    {
        session_start();

        return isset($_SESSION['user']);
    }

    public static function login($user)
    {
        session_start();

        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username']
        ];
    }

    public static function logout()
    {
        session_start();
        session_unset();
    }
}
