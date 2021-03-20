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
	
	
$nid=$_GET['id'];

$query = "SELECT Id_client, Nom_organisme, Nom_contact_formation , Adresse , Telephone , Nom_contact_RH, Nom_contact_compta, Client_actif, ASEI, Code_client FROM client WHERE Id_client='$nid';";

if ($stmt = $bdd->prepare($query)) {

    /* Exécution de la requête */
    $stmt->execute();

    /* Association des variables de résultat */
    $stmt->bind_result($idd, $no, $pcf, $ad, $tel, $ncrh, $ncomp, $tyac, $tyasei, $tycoco);
    /* Lecture des valeurs */

    while ($stmt->fetch()) { 
   
    }
	echo "<BR>";
    /* Fermeture de la commande */
    $stmt->close();
}

?>	
	<div class="conteneur">


   
    <!-- mon formulaire-->
      <form action="?page=<?= pages::form_edit_client?>" name="edit_donnees_client" method="post" enctype="">
		<div id="donnees_client">
			<br>
		<fieldset >
			<legend>Merci de corrigé les champs ci-dessous</legend>
			<label for="nom_orga">Id_client </label>
			<input type="text" id="id_client" name="id_client" value="<?php echo $idd ?>" size="50" readonly="readonly" ><br>
			<label for="nom_orga">Nom organsime </label>
			<input type="text" id="nom_orga" name="nom_orga" value="<?php echo $no ?>" size="50"><br>
			<label for="nom_cont_form">Nom contact formation</label>
			<input type="text" id="nom_cont_form" name="nom_cont_form" value="<?php echo $pcf ?>" size="50"><br>
			<label for="adrs">Adresse</label>
			<input type="text" id="adrs" name="adrs" value="<?php echo $ad ?>" size="50"><br>
			<label for="telephone">Tél </label>
			<input type="text" id="telephone" name="phone" value="<?php echo $tel ?>" maxlength="10" size="15"><br>
			<label for="nom_cont_RH">Nom contact RH</label>
			<input type="text" id="nom_cont_RH" name="nom_cont_RH" value="<?php echo $ncrh ?>" size="50"><br>
			<label for="nom_cont_compta">Nom contact compta</label>
			<input type="text" id="nom_cont_compta" name="nom_cont_compta" value="<?php echo $ncomp ?>" size="50"><br>
			<p>Situation du client</p>
			<label for="actif">Actif </label>
			<input type="text" name="type_actif" value="<?php echo $tyac ?>" size="25">
			<p>Client ASEI</p>
			<input type="text" name="type_asei" value="<?php echo $tyasei ?>" size="25">
			<label for="code_client">Code Client</label>
			<input type="text" id="code_client" name="code_client" value="<?php echo $tycoco ?>" size="50"><br>
		</fieldset>
			<button type="submit" class="button_modal">enregistrer</button>


		</div>
	</form>
  </div>
	<?php
		mysqli_close($bdd);
	?>
</html>


