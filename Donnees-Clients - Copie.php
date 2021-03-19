<!-- PHP pour se connecter à la base-->
<?php
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
// On se connecte à là base de données en appelant un fichier externe réutilisable
require_once('connect.php');

// On détermine le nombre total de données
$sql = 'SELECT COUNT(*) AS ID_client FROM `client`;';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre de données
$result = $query->fetch();

$IDClient = (int) $result['ID_client'];

// On détermine le nombre de données par page
$parPage = 5;

// On calcule le nombre de pages total
$pages = ceil($IDClient / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT * FROM `client` ORDER BY `Nom_organisme` DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query = $db->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$client = $query->fetchAll(PDO::FETCH_ASSOC);

// On appelle le fichier de fermeture...
require_once('close.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forchestra - Clients</title>
	
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="StyleTableau.css">
    
</head>
<body>
  	
	<div class="longueur">
        <img src="images/logof.png" class="resize1">

		<nav>
	        <ul>
	            <li><p><i class="flaticon-folder"></i> Sessions</p></li>
	            <li class="alinea"><a href="Forchestra.php">Nouvelle session</a></li>
	            <li class="alinea"><a href="Sessions-en-cours.php">Sessions en cours</a></li>
	            <li class="alinea"><a href="Sessions-terminees.php">Sessions terminées</a></li>

	            <li><p><i class="flaticon-folder"></i> Données</p></li>
	            <li class="alinea" style="font-weight: bold;"><a href="Donnees-Clients.php">Clients</a></li>
	            <li class="alinea"><a href="Donnees-Participants.php">Participants</a></li>
	            <li class="alinea"><a href="Donnees-Formateurs.php">Formateurs</a></li>
	            <li class="alinea"><a href="Donnees-Lieux.php">Lieux</a></li><br>

	            <li><a href="Comptabilite.php"><i class="flaticon-atm-card"></i> Comptabilité</a></li><br>

	            <li><a href="Rechercher.php"><i class="flaticon-magnifying-glass"></i> Rechercher</a></li>
	        </ul>
	    </nav>
	</div>

	<div class="user">
		<p><i class="flaticon-user"></i> Nom Prénom</p>
		<a href="" style="margin-left: 35px;">Se déconnecter</a>
	</div>

	<div class="conteneur">
		<h1>Clients</h1>
		<hr></hr>
		<!-- Bien laisser le data-backdrop="false" car conflit de css et sinon écran noir -->
		<button class="myBtn" data-toggle="modal" data-target="#myModal_clients" data-backdrop="false">+ Ajouter un client</button>

		
		<table class="table-1">

			<thead>
				<th>Nom d'organisme</th>
				<th>Formation</th>
				<th>Adresse</th>
				<th>Téléphone</th>
				<th>Type</th>
			</thead>
			<tbody>
				<?php
				foreach($client as $clientunit){
				?>
				<!-- Dans la base client, pour chaques client unité, echo dans les td -->
					<tr>				
						<td><?= $clientunit['Nom_organisme'] ?></td>
						<td><?= $clientunit['Nom_contact_formation'] ?></td>
						<td><?= $clientunit['Adresse'] ?></td>
						<td><?= $clientunit['Telephone'] ?></td>
						<td><?= $clientunit['ASEI'] ?></td>						
					</tr>

				<?php
				}
				?>
			</tbody>
		</table>
		<nav>
            <ul class="pagination">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="Donnees-Clients?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                </li>
                <?php for($page = 1; $page <= $pages; $page++): ?>
                  <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                  <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="Donnees-Clients?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                  <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                  <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="Donnees-Clients?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
            </ul>
        </nav>
	</div>
	

	<!-- The Modal -->
<div id="myModal_clients" class="modal">

  <!-- Modal content -->
 	<div class="modal-content">
	    <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal">&times;</button>
	   
	    <!-- mon formulaire-->
	      	<form name="donnees_client" method="post" action="" enctype="">
				<div id="donnees_client">
					<br>
					<fieldset>
						<legend>Merci de remplir les champs ci-dessous</legend>
						<label for="nom_orga">Nom organsime </label>
						<input type="text" id="nom_orga" name="nom_orga" size="50"><br>
						<label for="nom_cont_form">Nom contact formation</label>
						<input type="text" id="nom_cont_form" name="nom_cont_form" size="50"><br>
						<label for="adrs">Adresse</label>
						<input type="adrs" id="adrs" name="adrs" size="50"><br>
						<label for="telephone">Tél </label>
						<input type="tel" id="telephone" name="phone" pattern="[0-9]{10}" required maxlength="10" size="15"><br>
						<label for="nom_cont_RH">Nom contact RH</label>
						<input type="text" id="nom_cont_RH" name="nom_cont_RH" size="50"><br>
						<label for="nom_cont_compta">Nom contact compta</label>
						<input type="text" id="nom_cont_compta" name="nom_cont_compta" size="50"><br>
						<p>Situation du client</p>
						<label for="actif">Actif </label>
						<input type="radio" id="actif" name="type" size="25">
						
						
						<label for="no_actif">Non actif </label>
						<input type="radio" id="no_actif" name="type" size="25">
						<p>Client ASEI</p>
						<label for="oui">Oui</label>
						<input type="radio" id="oui" name="type" size="25">
						<label for="non">Non</label>
						<input type="radio" id="non" name="type" size="25"><br>
					</fieldset>
					<button type="button" class="button_modal" data-dismiss="modal">Enregistrer</button>
				</div>
			</form>
	    </div>
	</div>
</div>
</body>
</html>

