<?php

class connection
{
    private static $_instance = null;

    private $connected = false;
    private $username;

    public function is_connected()
    {
        return $this->connected;
    }

    private function __construct() {
        // TODO Real check
        $this->connected = true;
        $this->username = "Charles Alexandre";
    }

    public static function get_current_user(): ?connection
    {

        if(is_null(self::$_instance)) {
            self::$_instance = new connection();
        }

        return self::$_instance;
    }

    public function get_username()
    {
        return $this->username;
    }

    static public function check_connection()
    {
        if (!connection::get_current_user()->is_connected())
        {
            header('Location: login.php');
        }
    }
}