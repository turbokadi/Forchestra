<?php

$current_page = pages::trainers;

$head = new head();
$head->add_css("style_tableau.css");
$head->generate_head();

common::open_body();

// Add navigation bar section to change page
common::add_navigation_bar($current_page);
common::add_user_section();

component::open_container();

require_once("backend/view/table_view.php");

$table_view = new table_view("Formateurs");
$table_view->set_element_name("formateur");
$table_view->set_page_link_keyword($current_page);
$table_view->set_columns(array("N° de passeport","Nom","Prénom","Téléphone","E-mail","Modifier"));
$table_view->generate_table_view();

component::close_container();
?>
		
	<!-- The Modal -->
<div id="myModal_formateurs" class="modal">

  <!-- Modal content -->
 	<div class="modal-content">
	    <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal">&times;</button>
	   
	    <!-- mon formulaire-->
	      	<form name="donnees_formateurs" method="post" action="" enctype="">
				<div id="donnees_formateurs">
					<br>
					<fieldset>
						<legend>Merci de remplir les champs ci-dessous</legend>
						<label for="code_F">Code formateur</label>
						<input type="text" id="code_F" name="code_F" size="50"><br>
						<p>Formateur
						<label for="actif">Actif</label>
						<input type="radio" id="actif" name="type" size="25">
						<label for="no_actif">Non-actif</label>
						<input type="radio" id="no_actif" name="type" size="25"></p>
						<label for="nom">Nom</label>
						<input type="text" id="nom" name="nom" size="50"><br>
						<label for="prenom">Prénom</label>
						<input type="text" id="prenom" name="prenom" size="50"><br>
					</fieldset><br>
					<button type="button" class="button_modal" data-dismiss="modal">Enregistrer</button>
				</div>
			</form>
	  	</div>
	</div>
</div>