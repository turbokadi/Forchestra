<?php

require_once("pages.php");

class head
{
    public $js_file_list = array();
    public $css_file_list = array();

    public function add_js($path)
    {
        $this->js_file_list[] = $path;
    }

    public function add_css($path)
    {
        $this->css_file_list[] = $path;
    }

    public function generate_head()
    {
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<title>Forchestra</title>';
        echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">';
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
        echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>';
        echo '<!-- ------------------ -->';
        echo '<link rel="stylesheet" type="text/css" href="static/font/flaticon.css">';
        echo '<link rel="stylesheet" type="text/css" href="static/css/style.css">';
        foreach ($this->css_file_list as &$css_file) {
            echo '<link rel="stylesheet" type="text/css" href="static/css/'.$css_file.'"></script>';
        }
        echo '<!-- JavaScript ! -->';
        foreach ($this->js_file_list as &$js_file) {
            echo '<script src="static/js/'.$js_file.'"></script>';
        }
        echo '</head>';
    }

}

class common
{
    public const FALLBACK_KEYWORD = "fallback";
    public const INSERT_OK_KEYWORD = "insert_ok";
    public const INSERT_KO_KEYWORD = "insert_ko";
    public const UPDATE_OK_KEYWORD = "update_ok";
    public const UPDATE_KO_KEYWORD = "update_ko";

    static public function redirect_to_index($append = "")
    {
        header('Location: index.php'.$append);
    }

    static public function sanitize_entry($entry): string
    {
        return htmlspecialchars($entry);
    }

    static public function open_html_file()
    {
        echo '<!DOCTYPE html>';
        echo '<html lang="fr">';
    }

    static public function open_body()
    {
        echo '<body>';
    }

    static public function close_html_file()
    {
        echo '</body>';
        echo '</html>';
    }

    static public function add_navigation_bar($page)
    {
        $bold = 'style="font-weight: bold;"';

        echo '<div class="longueur">';
        echo '<img src="static/img/Logo-Forchestra.png" class="resize1">';
        echo '<nav>';
        echo '<ul>';
        echo '<li><p><i class="flaticon-folder"></i> Sessions</p></li>';
        echo '<li class="alinea"'.($page == pages::new_session ? $bold : "").'><a href="?'.pages::PAGE_KEYWORD.'='.pages::new_session.'">Nouvelle session</a></li>';
        echo '<li class="alinea"'.($page == pages::current_session ? $bold : "").'><a href="?'.pages::PAGE_KEYWORD.'='.pages::current_session.'">Sessions en cours</a></li>';
        echo '<li class="alinea"'.($page == pages::ended_session ? $bold : "").'><a href="?'.pages::PAGE_KEYWORD.'='.pages::ended_session.'">Sessions terminées</a></li>';
        echo '<li><p><i class="flaticon-folder"></i> Données</p></li>';
        echo '<li class="alinea"'.($page == pages::clients ? $bold : "").'><a href="?'.pages::PAGE_KEYWORD.'='.pages::clients.'">Clients</a></li>';
        echo '<li class="alinea"'.($page == pages::participants ? $bold : "").'><a href="?'.pages::PAGE_KEYWORD.'='.pages::participants.'">Participants</a></li>';
        echo '<li class="alinea"'.($page == pages::trainers ? $bold : "").'><a href="?'.pages::PAGE_KEYWORD.'='.pages::trainers.'">Formateurs</a></li>';
        echo '<li class="alinea"'.($page == pages::places ? $bold : "").'><a href="?'.pages::PAGE_KEYWORD.'='.pages::places.'">Lieux</a></li><br>';
        echo '<li '.($page == pages::compta ? $bold : "").'><a href="?'.pages::PAGE_KEYWORD.'='.pages::compta.'"><i class="flaticon-atm-card"></i> Comptabilité</a></li><br>';
        echo '<li '.($page == pages::search ? $bold : "").'><a href="?'.pages::PAGE_KEYWORD.'='.pages::search.'"><i class="flaticon-magnifying-glass"></i> Rechercher</a></li>';
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
    }

    static public function add_user_section()
    {
    	echo '<!--champs de conexxion-->';
	    echo '<div class="user">';
		echo '<p><i class="flaticon-user"></i>'.connection::get_current_user()->get_fullname().'</p>';
		echo '<a href="?'.connection::DECONNECT_KEYWORD.'" style="margin-left: 35px;">Se déconnecter</a>';
	    echo '</div>';
    }
}
