<?php

class client_modal_view
{
    public static function add_modify_view()
    {
        echo '<div class="modal" id="modify_modal" role="dialog">';
        echo '<div class="modal-dialog modal-lg">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
        echo '<h4 class="modal-title">Modifier un formateur</h4>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<label for="new_nom_orga">Nom de l\'organisme : &ensp;</label><input  type="text" id="new_nom_orga" name="new_nom_orga" value=""><br>';
        echo '<label for="new_nom_cont_form">Nom du contact de la formation : &ensp;</label><input  type="text" id="new_nom_cont_form" name="new_nom_cont_form" value=""><br>';
        echo '<label for="new_adrs">Adresse : &ensp;</label><input  type="text" id="new_adrs" name="new_adrs" value=""><br>';
        echo '<label for="new_telephone">Nom contact RH : &ensp;</label><input  type="text" id="new_telephone" name="new_telephone" value=""><br>';
        echo '<label for="new_telephone">Nom contact comptabilité : &ensp;</label><input  type="text" id="new_telephone" name="new_telephone" value=""><br>';
        echo '<p>Situation du client : &ensp;</p>';
        echo '<label for="new_actif">Actif </label>';
        echo '<input type="radio" id="new_actif" name="type" size="25">';
        echo '<label for="new_no_actif">Non actif </label>';
        echo '<input type="radio" id="new_no_actif" name="type" size="25">';
        echo '<p>Client ASEI : &ensp;<p>';
        echo '<label for="oui">Oui</label>';
        echo '<input type="radio" id="oui" name="type" size="25">';
        echo '<label for="non">Non</label>';
        echo '<input type="radio" id="non" name="type" size="25"><br>';
        echo '<label for="new_code_client">Code client : &ensp;</label><input  type="text" id="new_code_client" name="new_code_client" value="">';
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Ajouter</button>';
        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>';
        echo '</div>';
        echo '</div>';
        echo '</div> ';
        echo '</div>';
    }

    public static function add_insert_view()
    {
        echo '<div id="insert_modal" class="modal" role="dialog">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
        echo '<form name="donnees_client" method="post" action="?'.pages::PAGE_KEYWORD.'='.pages::add_client_data.'" enctype="">';
        echo '<div id="donnees_client">';
        echo '<br>';
        echo '<fieldset>';
        echo '<legend>Merci de remplir les champs ci-dessous</legend>';
        echo '<label for="nom_orga">Nom organsime </label>';
        echo '<input type="text" id="nom_orga" name="nom_orga" size="50"><br>';
        echo '<label for="nom_cont_form">Nom contact formation</label>';
        echo '<input type="text" id="nom_cont_form" name="nom_cont_form" size="50"><br>';
        echo '<label for="adrs">Adresse</label>';
        echo '<input type="adrs" id="adrs" name="adrs" size="50"><br>';
        echo '<label for="telephone">Tél </label>';
        echo '<input type="tel" id="telephone" name="phone" pattern="[0-9]{10}" required maxlength="10" size="15"><br>';
        echo '<label for="nom_cont_RH">Nom contact RH</label>';
        echo '<input type="text" id="nom_cont_RH" name="nom_cont_RH" size="50"><br>';
        echo '<label for="nom_cont_compta">Nom contact compta</label>';
        echo '<input type="text" id="nom_cont_compta" name="nom_cont_compta" size="50"><br>';
        echo '<p>Situation du client</p>';
        echo '<label for="type_actif">Actif </label>';
        echo '<input type="radio" id="actif" name="type_actif" size="25">';
        echo '<p>Client ASEI</p>';
        echo '<label for="type_asei">Oui</label>';
        echo '<input type="radio" id="oui" name="type_asei" size="25">';
        echo '<p>Code client</p>';
        echo '<label for="code_client">Code client</label>';
        echo '<input type="text" id="code_client" name="code_client" size="50"><br>';
        echo '</fieldset>';
        echo '<button type="submit" class="button_modal">Enregistrer</button>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}