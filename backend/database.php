<?php

class database extends PDO
{
    private const HOSTNAME = "localhost";
    private const DB_NAME = "xago_v2";
    private const USERNAME = "root";
    private const PASSWORD = "";

    private static $_instance = null;

    public static function get_db(): database
    {
        if(is_null(self::$_instance)) {
            try{
                self::$_instance = new database('mysql:host='.self::HOSTNAME.';dbname='.self::DB_NAME, self::USERNAME, self::PASSWORD);
                self::$_instance->exec('SET NAMES "UTF8"');
            } catch (PDOException $e){
                echo '/!\ Database connection error : '.$e->getMessage();
                die();
            }
        }

        return self::$_instance;
    }

    public function count_row_of_a_table($table): int
    {
        $sql = "SELECT COUNT(*) AS count_row_callback FROM ".$table.";";
        $query = database::get_db()->prepare($sql);

        if ( $query->execute() ) {
            $result = $query->fetch();
            return (int) $result['count_row_callback'];
        }
        else {
            echo 'Database error : '.$query->errorCode();
            die();
        }
    }
}