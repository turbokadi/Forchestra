<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forchestra - Formateurs</title>
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
	            <li class="alinea" style="font-weight: bold;"><a href="Donnees-Formateurs.php">Formateurs</a></li>
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
					<td><button data-toggle="modal" data-target="#myModal_modif_formateurs"><img src="images/modif.png" style="max-width: 20px"></button></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><button data-toggle="modal" data-target="#myModal_modif_formateurs"><img src="images/modif.png" style="max-width: 20px"></button></td>
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
</body>
</html>