<?php
require_once("backend/common.php");
require_once("backend/connection.php");

if ( isset($_POST[connection::USERNAME_KEYWORD]) && isset($_POST[connection::PASSWORD_KEYWORD])) {
    connection::init_session($_POST[connection::USERNAME_KEYWORD],
                             $_POST[connection::PASSWORD_KEYWORD]);
}

if ( isset($_GET[connection::DECONNECT_KEYWORD])) {
    connection::deconnect();
}

// Check if the user is connected
connection::check_connection();

//Add DOCTYPE and html markup
common::open_html_file();

$page = isset($_GET["page"]) ? $_GET["page"] : "";

// Routeur choisi la page de destination
switch ($page) {
    case pages::$clients:
        require_once("backend/page/Donnees-Clients.php");
        break;
    case pages::$participants:
        require_once("backend/page/Donnees-Participants.php");
        break;
    case pages::$trainers:
        require_once("backend/page/Donnees-Formateurs.php");
        break;
    case pages::$places:
        require_once("backend/page/Donnees-Lieux.php");
        break;
    case pages::$compta:
        require_once("backend/page/Comptabilite.php");
        break;
    case pages::$search:
        require_once("backend/page/Rechercher.php");
        break;
    case pages::$current_session:
        require_once("backend/page/Sessions-en-cours.php");
        break;
    case pages::$ended_session:
        require_once("backend/page/Sessions-terminees.php");
        break;
    case pages::$new_session:
    default:
        require_once("backend/page/Session-nouvelle.php");
        break;
}

//Close html markup
common::close_html_file();
?>

