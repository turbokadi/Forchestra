<?php

require_once("backend/model/model.php");

class participants_model extends model
{
    public const DB_TABLE_NAME = 'info_stagiaire';
    public const DB_CONTENT_TABLE_NAME = 'stagiaire';

    public const ID = 'ID_stagiaire';
    public const LASTNAME = 'Nom';
    public const FIRSTNAME = 'Prenom';
    public const MAIL = 'mail_pro';
    public const TEL = 'tel_pro';
    public const NUM_PASSPORT = 'Num_Passport';
    public const ACTIF = 'stagiaire_actif';

    public function __construct()
    {
        $this->_db_table_name = self::DB_TABLE_NAME;
    }

    public function load_data_limit_by_nbr($nb_of_row,$first_element)
    {
        $sql = 'SELECT '.self::DB_TABLE_NAME.'.'.self::ID.', '.self::NUM_PASSPORT.','.self::LASTNAME.', '.self::FIRSTNAME.', '.self::TEL.', '.self::MAIL.' FROM '.self::DB_CONTENT_TABLE_NAME.
               ' INNER JOIN '.self::DB_TABLE_NAME.' ON '.self::DB_CONTENT_TABLE_NAME.'.'.self::ID.' = '.self::DB_TABLE_NAME.'.'.self::ID.' LIMIT :first_element, :nb_of_row;';
        $query = database::get_db()->prepare($sql);
        $query->bindValue(':first_element', $first_element, PDO::PARAM_INT);
        $query->bindValue(':nb_of_row', $nb_of_row, PDO::PARAM_INT);

        if ( $query->execute() ) {
            $this->_result = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            echo 'Database error : '.$query->errorCode();
            die();
        }
    }
}