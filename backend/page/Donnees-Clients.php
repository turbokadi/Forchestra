<?php

$head = new head();
$head->add_css("style_tableau.css");
$head->generate_head();

$current_page = pages::clients;

common::open_body();

// Add navigation bar section to change page
common::add_navigation_bar($current_page);
common::add_user_section();

component::open_container();

require_once("backend/view/table_view.php");
require_once("backend/model/clients.php");

$table_view = new table_view("Clients");
$table_view->set_element_name("client");
if (isset($_GET[table_view::TABLE_PAGE_KEYWORD])) {
    $table_view->set_table_index($_GET[table_view::TABLE_PAGE_KEYWORD]);
}
$table_view->set_page_link_keyword($current_page);

$table_view->set_columns(array( clients_model::ORGA_NAME => "Nom d'organisme",
                                clients_model::FORMATION_NAME => "Formation",
                                clients_model::ADDRESS => "Adresse",
                                clients_model::TEL => "Téléphone",
                                clients_model::ASEI => "Type"));

$table_view->set_data_model(new clients_model());
$table_view->generate_table_view();

component::close_container();

require_once("backend/view/modal_view.php");

client_modal_view::add_modify_view();
client_modal_view::add_insert_view();

