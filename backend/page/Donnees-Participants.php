<?php

$current_page = pages::participants;

$head = new head();
$head->add_css("style_tableau.css");
$head->generate_head();

common::open_body();

// Add navigation bar section to change page
common::add_navigation_bar($current_page);
common::add_user_section();

component::open_container();

require_once("backend/view/table_view.php");

$table_view = new table_view("Participants");
$table_view->set_element_name("participant");
$table_view->set_page_link_keyword($current_page);
$table_view->set_columns(array("N° de passeport","Nom","Prénom","Téléphone","E-mail","Modifier"));
//$table_view->set_columns(array( participants_model::ORGA_NAME => "N° de passeport",
//                                participants_model::FORMATION_NAME => "Nom",
//                                participants_model::ADDRESS => "Prénom",
//                                participants_model::TEL => "Téléphone",
//                                participants_model::ASEI => "E-mail"));

//$table_view->set_data_model(new participants_model());
$table_view->generate_table_view();

component::close_container();
?>

	
	<!-- The Modal -->
<div id="myModal_participants" class="modal">

  <!-- Modal content -->
 	<div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   
    <!-- mon formulaire-->
    <form name="donnees_client" method="post" action="" enctype="">
		<div id="donnees_client">
			<br>
			<fieldset >
				<legend>Merci de remplir les champs ci-dessous</legend>
				<label for="num_passep">N° passeport </label>
				<input type="text" id="num_passep" name="num_passep" size="50"><br>
				<p>Stagiaire
				<label for="actif">Actif</label>
				<input type="radio" id="actif" name="type" size="25">
				<label for="no_actif">Non actif</label>
				<input type="radio" id="no_actif" name="type" size="25"></p>
				<label for="nom">Nom</label>
				<input type="text" id="nom" name="nom" size="50"><br>
				<label for="prenom">Prénom</label>
				<input type="text" id="prenom" name="prenom" size="50"><br>
				<label for="email">Email professionnel</label>
			    <input type="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="votre-email@hebergeur.com" size="35" name="mail" required></br>
				<label for="telephone">Tél professionnel</label>
				<input type="tel" id="telephone" name="phone" pattern="[0-9]{10}" required maxlength="10" size="15"><br>
			</fieldset>
			<button type="button" class="button_modal" data-dismiss="modal">Enregistrer</button>
		</div>
	</form>
  </div>

</div>
