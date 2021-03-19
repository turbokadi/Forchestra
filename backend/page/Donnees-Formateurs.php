<?php
require_once("backend/common.php");

$head = new head();
$head->add_css("style_tableau.css");
$head->generate_head();

common::open_body();

// Add navigation bar section to change page
common::add_navigation_bar(pages::$trainers);
common::add_user_section();
?>
	<div class="conteneur">
		<h1>Formateurs</h1>
		<hr></hr>
		<!-- Bien laisser le data-backdrop="false" car conflit de css et sinon écran noir -->
		<button class="myBtn" data-toggle="modal" data-target="#myModal_formateurs" data-backdrop="false">+ Ajouter un formateur </button>
		<table class="table-1">
			<thead>
				<th>N° de formateur</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Modifier</th>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><button data-toggle="modal" data-target="#myModal_modif_formateurs"><img src="static/img/icons/modif.png" style="max-width: 20px"></button></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><button data-toggle="modal" data-target="#myModal_modif_formateurs"><img src="static/img/icons/modif.png" style="max-width: 20px"></button></td>
				</tr>
			</tbody>
		</table>
		<nav>
            <ul class="pagination">
                <!-- Ici Mélanie ou Alexandre rajoutera la pagination avec PHP comme la table client -->
            </ul>
        </nav>
	</div>

		
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