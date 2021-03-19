<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forchestra - Lieux</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="StyleTableau.css">
</head>
<body>
  	
	<div class="longueur">
        <img src="images/Logo-Forchestra.png" class="resize1">

		<nav>
	        <ul>
	            <li><p><i class="flaticon-folder"></i> Sessions</p></li>
	            <li class="alinea"><a href="Forchestra.php">Nouvelle session</a></li>
	            <li class="alinea"><a href="Sessions-en-cours.php">Sessions en cours</a></li>
	            <li class="alinea"><a href="Sessions-terminees.php">Sessions terminées</a></li>

	            <li><p><i class="flaticon-folder"></i> Données</p></li>
	            <li class="alinea"><a href="Donnees-Clients.php">Clients</a></li>
	            <li class="alinea"><a href="Donnees-Participants.php">Participants</a></li>
	            <li class="alinea"><a href="Donnees-Formateurs.php">Formateurs</a></li>
	            <li class="alinea" style="font-weight: bold;"><a href="Donnees-Lieux.php">Lieux</a></li><br>

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
		<h1>Lieux</h1>
		<hr></hr>
		<!-- Bien laisser le data-backdrop="false" car conflit de css et sinon écran noir -->
		<button class="myBtn" data-toggle="modal" data-target="#myModal_lieux" data-backdrop="false">+ Ajouter un lieu </button>
		<table class="table-1">
			<thead>
				<th>Nom de lieu</th>
				<th>Adresse</th>
				<th>Salle</th>
				<th>Modifier</th>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><button data-toggle="modal" data-target="#myModal_modif_participants"><img src="images/modif.png" style="max-width: 20px"></button></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><button data-toggle="modal" data-target="#myModal_modif_participants"><img src="images/modif.png" style="max-width: 20px"></button></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><a><img src="images/modif.png" style="max-width: 20px"></a></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><button data-toggle="modal" data-target="#myModal_modif_participants"><img src="images/modif.png" style="max-width: 20px"></button></td>
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

</html>

