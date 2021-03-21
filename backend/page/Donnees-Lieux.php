<?php

$current_page = pages::places;

$head = new head();
$head->add_css("style_tableau.css");
$head->generate_head();

common::open_body();

// Add navigation bar section to change page
common::add_navigation_bar($current_page);
common::add_user_section();

component::open_container();

require_once("backend/view/table_view.php");
require_once("backend/model/lieu.php");

$table_view = new table_view("Lieux");
$table_view->set_element_name("lieu");
$table_view->set_page_link_keyword($current_page);
$table_view->set_columns(array("Nom de lieu","Adresse","Salle","Modifier"));
$table_view->set_columns(array( lieu_model::LOCATION_NAME => "Nom de lieu",
                                lieu_model::ADDRESS => "Adresse",
                                lieu_model::ROOM => "Salle"));

$table_view->set_data_model(new lieu_model());
$table_view->generate_table_view();

component::close_container();
?>

	<!-- The Modal -->
<div id="myModal_lieux" class="modal">

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
			<label for="nom">Nom</label>
			<input type="text" id="nom" name="nom" size="50"><br>
			<label for="adrs">Adresse</label>
			<input type="adrs" id="adrs" name="adrs" size="50"><br>
			<label for="virt">Virtuel</label>
			<input type="radio" id="virt" name="type" size="25">
			<label for="pres">Présentiel</label>
			<input type="radio" id="pres" name="type" size="25"><br>
			<label for="date_deb">Date de début</label>
			<input type="date" id="date_deb" name="date_deb">
			<label for="date_fin">Date de fin</label>
			<input type="date" id="date_fin" name="date_fin"><br>
			<label for="cap_salle">Capcité de la salle</label>
			<input type="number" id="cap_salle" name="cap_salle" size="5" min="0"><br>
			<label for="NBR_poste">Nombre de poste</label>
			<input type="number" id="NBR_poste" name="NBR_poste" size="5" min="0">
			<p>Wifi : 
				<label for="oui">Oui</label>
				<input type="radio" id="oui" name="type" size="25">
				<label for="no">Non</label>
				<input type="radio" id="no" name="type" size="25"></p>
			<p>Vidéoprojecteur : 
				<label for="oui">Oui</label>
				<input type="radio" id="oui" name="type" size="25">
				<label for="no">Non</label>
				<input type="radio" id="no" name="type" size="25"></p>
			<p>Ecran : 
				<label for="oui">Oui</label>
				<input type="radio" id="oui" name="type" size="25">
				<label for="no">Non</label>
				<input type="radio" id="no" name="type" size="25"></p>
			<p>Paperbord : 
				<label for="oui">Oui</label>
				<input type="radio" id="oui" name="type" size="25">
				<label for="no">Non</label>
				<input type="radio" id="no" name="type" size="25"></p>
			</fieldset>
			<button type="button" class="button_modal" data-dismiss="modal">Enregistrer</button>
		</div>
	</form>
  </div>

</div>

