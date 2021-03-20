<?php

$head = new head();
$head->add_css("style_tableau.css");
$head->generate_head();

common::open_body();

// Add navigation bar section to change page
common::add_navigation_bar(pages::$current_session);
common::add_user_section();
?>
		<!--champs corps de la page-->
		<div id="Generalites" class="w3-container page onglet">
			<div class="conteneur">
		<!--Titre-->
				<h1 id="titreee">Sessions en cours</h1>
				<hr></hr>
				<!--Les sessions-->
			  <ul class="w3-ul w3-card-4">
				    <li class="w3-bar">
				      <span class="w3-bar-item w3-button w3-white w3-xlarge w3-right"></span>
				      <img src="static/img/icons/encours.png" class="w3-bar-item w3-hide-small" style="width:85px">
				      <div class="w3-bar-item">
				        <span class="w3-large">Créée le:  24/02/2021</span><br>
				        <span>Formateur référent: Madié DIAKITE</span><br>
				        <span>Nom du client: Hôpital Saint-Cyprien</span>
				        <button type="button" class="boutton_repr">Reprendre</button>
				      </div>
				    </li>

				    <li class="w3-bar">
				      <span  class="w3-bar-item w3-button w3-white w3-xlarge w3-right"></span>
				      <img src="static/img/icons/encours.png" class="w3-bar-item w3-hide-small" style="width:85px">
				      <div class="w3-bar-item">
				        <span class="w3-large">Créée le:  24/02/2021</span><br>
				        <span>Formateur référent: Madié DIAKITE</span><br>
				        <span>Nom du client: Hôpital Saint-Cyprien</span>
				        <button type="button" class="boutton_repr">Reprendre</button>
				      </div>
				  	</li>
				   	<li class="w3-bar">
				      <span  class="w3-bar-item w3-button w3-white w3-xlarge w3-right"></span>
				      <img src="static/img/icons/encours.png" class="w3-bar-item w3-hide-small" style="width:85px">
				      <div class="w3-bar-item">
				        <span class="w3-large">Créée le:  24/02/2021</span><br>
				        <span>Formateur référent: Madié DIAKITE</span><br>
				        <span>Nom du client: Hôpital Saint-Cyprien</span>
				        <button type="button" class="boutton_repr">Reprendre</button>
				      </div>
				  	</li>
				   <li class="w3-bar">
				      <span  class="w3-bar-item w3-button w3-white w3-xlarge w3-right"></span>
				      <img src="static/img/icons/encours.png" class="w3-bar-item w3-hide-small" style="width:85px">
				      <div class="w3-bar-item">
				        <span class="w3-large">Créée le:  24/02/2021</span><br>
				        <span>Formateur référent: Madié DIAKITE</span><br>
				        <span>Nom du client: Hôpital Saint-Cyprien</span>
				        <button type="button" class="boutton_repr">Reprendre</button>
				      </div>
				  </li>
			 </ul>
		</div>
	</div>