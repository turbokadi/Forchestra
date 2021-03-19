<?php


$head = new head();
$head->add_css("style_tableau.css");
$head->generate_head();

common::open_body();

// Add navigation bar section to change page
common::add_navigation_bar(pages::$search);
common::add_user_section();
?>
	<!--champs corps de la page-->
	<div id="Generalites" class="w3-container page onglet">
		<div class="conteneur">
		
		</div>
	</div>