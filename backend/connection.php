<?php

require("backend/database.php");

class connection
{
    public const TIMEOUT_CONNECTION = 60*60; // 1 hour

    public const USERNAME_KEYWORD = "username";
    public const PASSWORD_KEYWORD = "password";
    public const DECONNECT_KEYWORD = "deconnect";

    public const FALLBACK_CONNECT_KEYWORD = "fallback";
    public const TIMEOUT_KEYWORD = "timeout";
    public const UNCONNECTED_CREDENTIALS_KEYWORD = "missing";
    public const WRONG_CREDENTIALS_KEYWORD = "wrong";

    public const DB_USERS_TABLE = "info_employer_fd";
    public const DB_ID_KEYWORD = "Id_emploi";
    public const DB_FIRSTNAME_KEYWORD = "Prenom";
    public const DB_LASTNAME_KEYWORD = "Nom";
    public const DB_TEL_KEYWORD = "tel_pro";
    public const DB_MAIL_KEYWORD = "mail_pro";
    public const DB_USERNAME_KEYWORD = "Identifiant";
    public const DB_PASSWORD_KEYWORD = "MDP";

    public const SESSION_LAST_ACCESS_KEYWORD = "last_access";
    public const SESSION_IP_KEYWORD = "ip";
    public const SESSION_ID_KEYWORD = "id";
    public const SESSION_FULLNAME_KEYWORD = "full_name";
    public const SESSION_TEL_KEYWORD = "tel";
    public const SESSION_MAIL_KEYWORD = "mail";
    public const SESSION_USERNAME_KEYWORD = "username";

    private static $_instance = null;

    private bool $_connected = false;
    private int $_last_access;
    private string $_id;
    private string $_username;
    private string $_fullname;
    private string $_tel;
    private string $_mail;

    public function is_connected(): bool
    {
        return $this->_connected;
    }

    // TODO create update metadata system
    private function __construct() {
        session_start();

        // Check session data
        if (!isset($_SESSION[self::SESSION_LAST_ACCESS_KEYWORD]) || !isset($_SESSION[self::SESSION_IP_KEYWORD]) || !isset($_SESSION[self::SESSION_USERNAME_KEYWORD])) {
            $_SESSION = array();
            session_destroy();
            self::redirect_to_login_error(self::UNCONNECTED_CREDENTIALS_KEYWORD);
            die();
        }

        // Check timeout
        if( time() - $_SESSION[self::SESSION_LAST_ACCESS_KEYWORD] > self::TIMEOUT_CONNECTION)
        {
            $_SESSION = array();
            session_destroy();
            self::redirect_to_login_error(self::TIMEOUT_KEYWORD);
            die();
        }
        $_SESSION[self::SESSION_LAST_ACCESS_KEYWORD]=time(); // Update last access

        $this->_connected = true;
        $this->_last_access = $_SESSION[self::SESSION_LAST_ACCESS_KEYWORD];
        $this->_id = $_SESSION[self::SESSION_ID_KEYWORD];
        $this->_username = $_SESSION[self::SESSION_USERNAME_KEYWORD];
        $this->_fullname = $_SESSION[self::SESSION_FULLNAME_KEYWORD];
        $this->_tel = $_SESSION[self::SESSION_TEL_KEYWORD];
        $this->_mail = $_SESSION[self::SESSION_MAIL_KEYWORD];
    }

    public static function init_session($username,$password)
    {
        // TODO check entry !
        $username = common::sanitize_entry($username);
        $password = common::sanitize_entry($password);

        $sql = "SELECT * FROM ".connection::DB_USERS_TABLE." WHERE ".connection::DB_USERNAME_KEYWORD." = :username AND ".connection::DB_PASSWORD_KEYWORD." = :password;";
        $query = database::get_db()->prepare($sql);
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);

        $query->execute();
        $result = $query->fetch();

        if( $query->rowCount() > 0 )
        {
            session_start();
            $_SESSION[connection::SESSION_LAST_ACCESS_KEYWORD]=time();
            $_SESSION[connection::SESSION_IP_KEYWORD]=$_SERVER['REMOTE_ADDR'];
            $_SESSION[connection::SESSION_ID_KEYWORD]=$result[connection::DB_ID_KEYWORD];
            $_SESSION[connection::SESSION_USERNAME_KEYWORD]=$result[connection::DB_USERNAME_KEYWORD];
            $_SESSION[connection::SESSION_FULLNAME_KEYWORD]=$result[connection::DB_FIRSTNAME_KEYWORD]." ".$result[connection::DB_LASTNAME_KEYWORD];
            $_SESSION[connection::SESSION_TEL_KEYWORD]=$result[connection::DB_TEL_KEYWORD];
            $_SESSION[connection::SESSION_MAIL_KEYWORD]=$result[connection::DB_MAIL_KEYWORD];

            common::redirect_to_index();
        }
        else
        {
            self::redirect_to_login_error(connection::WRONG_CREDENTIALS_KEYWORD);
        }
    }

    public static function deconnect()
    {
        $_SESSION = array();
        session_destroy();
        self::redirect_to_login_error(self::DECONNECT_KEYWORD);
        die();
    }

    public static function get_current_user(): ?connection
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new connection();
        }
        return self::$_instance;
    }

    public function get_last_access(): int
    {
        return $this->_last_access;
    }

    public function get_id(): string
    {
        return $this->_id;
    }

    public function get_fullname(): string
    {
        return $this->_fullname;
    }

    public function get_username(): string
    {
        return $this->_username;
    }

    public function get_tel(): string
    {
        return $this->_tel;
    }

    public function get_mail(): string
    {
        return $this->_mail;
    }

    static public function check_connection()
    {
        connection::get_current_user()->is_connected();
    }

    static private function redirect_to_login_error($error_type)
    {
        header('Location: login.php?'.connection::FALLBACK_CONNECT_KEYWORD.'='.$error_type);
    }

    static private function redirect_to_login()
    {
        header('Location: login.php');
    }
}