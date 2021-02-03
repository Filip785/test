<?php

namespace Filip785\MVC\Helpers;

class Flash
{
    public static function success($message)
    {
        if (session_id() === '') {
            session_start();
        }

        $_SESSION['success_msg'] = $message;
    }

    public static function error($message)
    {
        if (session_id() === '') {
            session_start();
        }

        $_SESSION['error_msg'] = $message;
    }

    public static function has()
    {
        return isset($_SESSION['success_msg']) || isset($_SESSION['error_msg']);
    }

    public static function get()
    {
        $type = isset($_SESSION['success_msg']) ? 'success_msg' : 'error_msg';

        $flashValue = $_SESSION[$type];

        unset($_SESSION[$type]);

        return [
            'type' => $type,
            'value' => $flashValue
        ];
    }
}
