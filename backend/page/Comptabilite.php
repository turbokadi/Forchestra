<?php


$head = new head();
$head->generate_head();

common::open_body();

// Add navigation bar section to change page
common::add_navigation_bar(pages::compta);
?>

	<div class="w3-bar page haut">
		<div id="menu-hg">
		</div>
        <?php
        common::add_user_section();
        ?>
	</div>
	<div class="page">
		<img class="resize2" src="static/img/construction.jpg">
	</div>
