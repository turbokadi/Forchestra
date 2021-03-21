<?php
require_once('backend/model/model.php');

class clients_model extends model
{
    public const DB_TABLE_NAME = 'client';

    public const ID = 'ID_client';
    public const ORGA_NAME = 'Nom_organisme';
    public const FORMATION_NAME = 'Nom_contact_formation';
    public const ADDRESS = 'Adresse';
    public const TEL = 'Telephone';
    public const ASEI = 'ASEI';

    public function __construct()
    {
        $this->_db_table_name = self::DB_TABLE_NAME;
    }

    public function load_data_limit_by_nbr($nb_of_row,$first_element)
    {
        $sql = 'SELECT * FROM '.self::DB_TABLE_NAME.' ORDER BY '.self::ORGA_NAME.' DESC LIMIT :first_element, :nb_of_row;';
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