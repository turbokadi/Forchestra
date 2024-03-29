<!DOCTYPE html>
<?php
$h="localhost"; // nom ou @ de la machine qui heberge le serveur de BdD
$u="root";      // nom de l'utilisateur pouvant acceder au serveur
$p="";          // mot de passe de cet utilisateur 
$b="xago_v2";     // nom de la base de données
$bdd = new mysqli($h, $u, $p, $b);

/* Verifier que ca a marché */
if ( $bdd->connect_errno) {
    printf("Echec de la connexion: %s\n" , $bdd->connect_error);
    exit();
}
if (!$bdd->set_charset("utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 \n");
    exit();
}

$head = new head();
$head->add_css("style_tableau.css");
$head->generate_head();

common::open_body();

// Add navigation bar section to change page
common::add_navigation_bar(pages::clients);
common::add_user_section();


$nid=$_POST['id_client'];
echo $nid;

$query = "UPDATE `client` SET `Nom_organisme` = ? , `Nom_contact_formation` = ? , `Adresse` = ?, `Telephone` = ?, `Nom_contact_RH` = ?, `Nom_contact_compta` = ?, `Client_actif` = ?, `ASEI` = ?, `Code_client` = ? WHERE `client`.`ID_client` = $nid ;";

if ($stmt = $bdd->prepare($query)) {

    /* Exécution de la requête */

	$stmt->bind_param("sssssssss",$no, $pcf, $ad, $tel, $ncrh, $ncomp, $tyac, $tyasei, $tycoco);

	
	$no=common::sanitize_entry($_POST['nom_orga']);
	$pcf=$_POST['nom_cont_form'];
	$ad=$_POST['adrs'];
	$tel=$_POST['phone'];
	$ncrh=$_POST['nom_cont_RH'];
	$ncomp=$_POST['nom_cont_compta'];
	$tyac=$_POST['type_actif'];
	$tyasei=$_POST['type_asei'];
	$tycoco=$_POST['code_client'];

    if ( $stmt->execute() ) {
        common::redirect_to_index("?".pages::PAGE_KEYWORD."=".pages::clients."&".common::FALLBACK_KEYWORD."=".common::INSERT_OK_KEYWORD);
    }
    else {
        common::redirect_to_index("?".pages::PAGE_KEYWORD."=".pages::clients."&".common::FALLBACK_KEYWORD."=".common::INSERT_KO_KEYWORD);
    }

    /* Fermeture de la commande */
    $stmt->close();
}
else {
    common::redirect_to_index("?".pages::PAGE_KEYWORD."=".pages::clients."&".common::FALLBACK_KEYWORD."=".common::UPDATE_KO_KEYWORD);
}

		mysqli_close($bdd);
?>