<?php

require_once('backend/common.php');
require_once('backend/model/model.php');

class table_view
{
    public const TABLE_PAGE_KEYWORD = "table_index";
    public const NUMBER_PER_PAGE = 5;

    private string $_title;
    private array $_column_list;
    private array $_db_column_list;
    private string $_page_link_keyword;
    private string $_element_name;
    private int $_table_index = 1;
    private model $_data_model;

    public function __construct($title)
    {
        $this->_title = $title;
    }

    public function set_page_link_keyword($page_link_keyword)
    {
        $this->_page_link_keyword = $page_link_keyword;
    }

    public function set_columns($columns)
    {
        $this->_db_column_list = array_keys($columns);

        $array_value_columns = array_values($columns);
        $array_value_columns[] = "Modifier";
        $this->_column_list = $array_value_columns;
    }

    public function set_element_name($element_name)
    {
        $this->_element_name = $element_name;
    }

    public function set_table_index($table_index)
    {
        $this->_table_index = $table_index;
    }

    public function set_data_model($data_model)
    {
        $this->_data_model = $data_model;
    }

    public function generate_table_view()
    {
        echo '<h1>'.$this->_title.'</h1>';
        echo '<hr></hr>';
        self::add_insert_button($this->_element_name);

        component::open_table($this->_column_list);

        $total_nb_of_row = $this->_data_model->total_nb_of_row();
        $nbr_of_page = (int) ceil($total_nb_of_row / self::NUMBER_PER_PAGE);

        $this->_data_model->load_data_limit_by_nbr(self::NUMBER_PER_PAGE,abs(($this->_table_index - 1) * self::NUMBER_PER_PAGE));
        $rows = $this->_data_model->get_result();

        foreach($rows as &$row)
        {
            echo '<tr>';
            foreach ($this->_db_column_list as &$key) {
                echo '<td>'.$row[$key].'</td>';
            }
            echo '<td><button id="id_'.$row[$this->_data_model::class::ID].'" class="modify_btn" data-toggle="modal" data-target="#modify_modal" data-backdrop="false"></button></td>';
            echo '</tr>';
        }

        component::close_table();

        if ($this->_table_index > $nbr_of_page) {
            $this->_table_index = $nbr_of_page;
        }

        self::get_pagination_view($this->_table_index,$nbr_of_page);
        component::add_fallback_message();
    }

    public static function get_pagination_view($current_index,$max_index)
    {
        if ($max_index > 0) {
            echo '<nav>';
            echo '<ul class="pagination">';
            echo '<li class="page-item" '.($current_index > 1 ? "disabled" : "").'>';
            echo '<a href="?'.pages::PAGE_KEYWORD."=".pages::clients.'&'.self::TABLE_PAGE_KEYWORD.'='.($current_index - 1).'" class="page-link">Précédente</a>';
            echo '</li>';
            for($index = 1; $index <= $max_index; $index++) {
                echo '<li class="page-item ' . ($current_index == $index ? "active" : "") . '">';
                echo '<a href="?'.pages::PAGE_KEYWORD.'='.pages::clients.'&'.self::TABLE_PAGE_KEYWORD.'='.$index.'" class="page-link">'.$index.'</a>';
                echo '</li>';
            }
            echo '<li class="page-item" '.($current_index >= $max_index ? "disabled" : "").'>';
            echo '<a href="?'.pages::PAGE_KEYWORD.'='.pages::clients.'&'.self::TABLE_PAGE_KEYWORD.'='.($current_index + 1).'" class="page-link">Suivante</a>';
            echo '</li>';
            echo '</ul>';
            echo '</nav>';
        }
    }

    public static function add_insert_button($btn_text)
    {
        echo '<button class="insert_btn" data-toggle="modal" data-target="#insert_modal" data-backdrop="false">+ Ajouter un '.$btn_text.'</button>';
    }
}
