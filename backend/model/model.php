<?php

require_once('backend/database.php');

class model
{
    protected  string $_db_table_name;
    protected array $_result = array();

    public function load_data_limit_by_nbr($nb_of_row,$first_element)
    {
    }

    public function total_nb_of_row(): int
    {
        return database::get_db()->count_row_of_a_table($this->_db_table_name);
    }

    public function get_result(): array
    {
        return $this->_result;
    }
}