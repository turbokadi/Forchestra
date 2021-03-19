<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forchestra - Sessions en cours</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="StyleTableau.css">
</head>
<body>
		<!--Menu gauche-->
	<div class="longueur">
        <img src="images/Logo-Forchestra.png" class="resize1">

		<nav>
	        <ul>
	            <li><p><i class="flaticon-folder"></i> Sessions</p></li>
	            <li class="alinea"><a href="Forchestra.php">Nouvelle session</a></li>
	            <li class="alinea" style="font-weight: bold;"><a href="Sessions-en-cours.php">Sessions en cours</a></li>
	            <li class="alinea"><a href="Sessions-terminees.php">Sessions terminées</a></li>
	            <li><p><i class="flaticon-folder"></i> Données</p></li>
	            <li class="alinea"><a href="Donnees-Clients.php">Clients</a></li>
	            <li class="alinea"><a href="Donnees-Participants.php">Participants</a></li>
	            <li class="alinea"><a href="Donnees-Formateurs.php">Formateurs</a></li>
	            <li class="alinea"><a href="Donnees-Lieux.php">Lieux</a></li><br>
	            <li><a href="Comptabilite.php"><i class="flaticon-atm-card"></i> Comptabilité</a></li><br>

	            <li><a href="Rechercher.php"><i class="flaticon-magnifying-glass"></i> Rechercher</a></li>
	        </ul>
	    </nav>
	</div>
		<!--champs de conexxion-->
		<div class="user">
			<p><i class="flaticon-user"></i> Nom Prénom</p>
			<a href="" style="margin-left: 35px;">Se déconnecter</a>
		</div>
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
				      <img src="images/encours.png" class="w3-bar-item w3-hide-small" style="width:85px">
				      <div class="w3-bar-item">
				        <span class="w3-large">Créée le:  24/02/2021</span><br>
				        <span>Formateur référent: Madié DIAKITE</span><br>
				        <span>Nom du client: Hôpital Saint-Cyprien</span>
				        <button type="button" class="boutton_repr">Reprendre</button>
				      </div>
				    </li>

				    <li class="w3-bar">
				      <span  class="w3-bar-item w3-button w3-white w3-xlarge w3-right"></span>
				      <img src="images/encours.png" class="w3-bar-item w3-hide-small" style="width:85px">
				      <div class="w3-bar-item">
				        <span class="w3-large">Créée le:  24/02/2021</span><br>
				        <span>Formateur référent: Madié DIAKITE</span><br>
				        <span>Nom du client: Hôpital Saint-Cyprien</span>
				        <button type="button" class="boutton_repr">Reprendre</button>
				      </div>
				  	</li>
				   	<li class="w3-bar">
				      <span  class="w3-bar-item w3-button w3-white w3-xlarge w3-right"></span>
				      <img src="images/encours.png" class="w3-bar-item w3-hide-small" style="width:85px">
				      <div class="w3-bar-item">
				        <span class="w3-large">Créée le:  24/02/2021</span><br>
				        <span>Formateur référent: Madié DIAKITE</span><br>
				        <span>Nom du client: Hôpital Saint-Cyprien</span>
				        <button type="button" class="boutton_repr">Reprendre</button>
				      </div>
				  	</li>
				   <li class="w3-bar">
				      <span  class="w3-bar-item w3-button w3-white w3-xlarge w3-right"></span>
				      <img src="images/encours.png" class="w3-bar-item w3-hide-small" style="width:85px">
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
</body>
</html>