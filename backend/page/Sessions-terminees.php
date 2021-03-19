<?php

$head = new head();
$head->add_css("style_tableau.css");
$head->generate_head();

common::open_body();

// Add navigation bar section to change page
common::add_navigation_bar(pages::$ended_session);
common::add_user_section();
?>
		<!--champs corps de la page-->
		<div id="Generalites" class="w3-container page onglet">
		<div class="conteneur">
		<!--Titre-->
			<h1 id="titreee">Sessions terminées</h1>
			<hr></hr>
			<!--Les sessions-->
		 	<ul class="w3-ul w3-card-4">
			    <li class="w3-bar">
			      <span class="w3-bar-item w3-button w3-white w3-xlarge w3-right"></span>
			      <img src="static/img/icons/dossier_cloture.png" class="w3-bar-item w3-hide-small" style="width:85px">
			      <div class="w3-bar-item">
			        <span class="w3-large">Code session: 1111</span><br>
			         <span>Formateur référent: Madié DIAKITE</span><br>
			        <span>Nom du client: Hôpital Saint-Cyprien</span>
			      </div>
			    </li>

			    <li class="w3-bar">
			      <span  class="w3-bar-item w3-button w3-white w3-xlarge w3-right"></span>
			      <img src="static/img/icons/dossier_cloture.png" class="w3-bar-item w3-hide-small" style="width:85px">
			      <div class="w3-bar-item">
			        <span class="w3-large">Code session: 22222</span><br>
			         <span>Formateur référent: Madié DIAKITE</span><br>
			        <span>Nom du client: Hôpital Saint-Cyprien</span>
			      </div>
			  	</li>
			   	<li class="w3-bar">
			      <span  class="w3-bar-item w3-button w3-white w3-xlarge w3-right"></span>
			      <img src="static/img/icons/dossier_cloture.png" class="w3-bar-item w3-hide-small" style="width:85px">
			      <div class="w3-bar-item">
			        <span class="w3-large">Code session: 3333</span><br>
			         <span>Formateur référent: Madié DIAKITE</span><br>
			        <span>Nom du client: Hôpital Saint-Cyprien</span>
			      </div>
			  	</li>
			   <li class="w3-bar">
			      <span  class="w3-bar-item w3-button w3-white w3-xlarge w3-right"></span>
			      <img src="static/img/icons/dossier_cloture.png" class="w3-bar-item w3-hide-small" style="width:85px">
			      <div class="w3-bar-item">
			        <span class="w3-large">Code session: 4444</span><br>
			         <span>Formateur référent: Madié DIAKITE</span><br>
			        <span>Nom du client: Hôpital Saint-Cyprien</span>		   
			      </div>
			  </li>
			 </ul>
		</div>
	</div>