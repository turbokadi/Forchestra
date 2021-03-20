

<?php	

	$h="localhost"; // nom ou @ de la machine qui heberge le serveur de BdD
	$u="root";      // nom de l'utilisateur pouvant acceder au serveur
	$p="";          // mot de passe de cet utilisateur 
	$b="xago_v2";     // nom de la base de données
	$bdd = new mysqli($h, $u, $p, $b);
	
	if ( $bdd->connect_errno) {
    printf("Echec de la connexion: %s\n" , $bdd->connect_error);
    exit();
}
if (!$bdd->set_charset("utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 \n");
    exit();
}
?>

	
<?php
if(isset($_POST['nom_orga']))
{
	$orga = mysqli_real_escape_string($bdd,htmlspecialchars($_POST['nom_orga']));
	if($orga !== "" )
    {
        $requete = "SELECT count(*) FROM client where 
              Nom_organisme = '".$orga."'  ";
        $exec_requete = mysqli_query($bdd,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom orga est occupé
        {
			header('Location: Donn%C3%A9es-Clients.php?erreur=1');
        }
        else // mon nom d'orga n'est pas occupé
        {
$query = "INSERT INTO client( `Nom_organisme`, `Nom_contact_formation`,`Adresse`,`Telephone`, `Nom_contact_RH`, `Nom_contact_compta`,`Client_actif`,`ASEI`,`Code_client`) values(?,?,?,?,?,?,?,?,?) ";

if ($stmt = $bdd->prepare($query)) {

    /* Exécution de la requête */

	$stmt->bind_param("sssssssss", $no, $pcf, $ad, $tel, $ncrh, $ncomp, $tyac, $tyasei, $tycoco);

	
	$no=$_POST['nom_orga'];
	$pcf=$_POST['nom_cont_form'];
	$ad=$_POST['adrs'];
	$tel=$_POST['phone'];
	$ncrh=$_POST['nom_cont_RH'];
	$ncomp=$_POST['nom_cont_compta'];
	$tyac=$_POST['type_actif'];
	$tyasei=$_POST['type_asei'];
	$tycoco=$_POST['code_client'];

	header('Location: Donn%C3%A9es-Clients.php?erreur=2');


    $stmt->execute();
	
    /* Fermeture de la commande */
    $stmt->close();
	
}
else {
echo " pb requête $query <BR>";
}
}
}
}
?>
	<?php
		mysqli_close($bdd);
	?>