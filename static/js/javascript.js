// ♥ VARIABLES (COMPTEURS) ♥ ======================================================

/* Variables compteurs*/
	var compteur = 1;
	var compteur2 = 1;
	var compteur_participant = 1;
	var compteur_planning = 1;



// ♥ NE ME QUITTE PAS ♥ ===========================================================

/* Script pour afficher le message d'alerte avant de quitter l'application 
à partir du navigateur */
	window.addEventListener('beforeunload', function (e) { 
	        e.preventDefault(); 
	        e.returnValue = ''; 
	    }); 

/* Afficher un message d'alerte avant de quitter l'application */	
			
	window.onclick = function(event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	  }
	}



// ♥ TOUS LES ONGLETS ♥ ==========================================================

/* Fonction pour mettre la couleur des onglets actifs de la meme couleur que 
la page de fond */
	function changecolor(colori) {
		var i;
		var x = document.getElementsByClassName("menu-h");
		for (i = 0; i < x.length; i++) {
	    	x[i].style.backgroundColor= "rgb(140,169,135)";
		}
		colori.style.backgroundColor= "rgb(241,255,238)";
	}

/* Fonction pour ouvrir et cacher les onglets */
	function openTab(onglet) {
		var i;
		var x = document.getElementsByClassName("onglet");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";  
		}
		document.getElementById(onglet).style.display = "block";  
	}



// ♥ ONGLET GENERALITES ♥ =======================================================

/* Ajouter un formateur */
	function ajouter_formateur(){
	        var nouveau = '<div id=' + parseInt(compteur) + ' class="grille3">' + '			<div class="item"><label for="numero_psp' + parseInt(compteur) + '">Numéro </label><input type="number" id="numero_psp' + parseInt(compteur) + '" name="numero_psp' + parseInt(compteur) + '" size="20" min="0"></div><div style="margin-left: auto;"> <a style="text-decoration: none;" onclick="supprimer_formateur(this.parentNode.parentNode)" > <i class="flaticon-recycling-bin"></i> </a> </div><div class="item"><label for="nomform' + parseInt(compteur) + '">Nom </label><input onchange="add_formateur(this)" type="text" id="nomform' + parseInt(compteur) + '" name="nomform' + parseInt(compteur) + '" size="20" min="0"></div><button type="button" data-toggle="modal" data-target="#myModal">Rechercher dans la base</button><div class="item"><label for="prenom' + parseInt(compteur) + '">Prénom </label><input onchange="add_formateur(this)" type="text" id="prenom' + parseInt(compteur) + '" name="prenom' + parseInt(compteur) + '" size="20" min="0"></div></div>';
		        document.getElementById("add").insertAdjacentHTML("beforeend", nouveau);
		        var nouveauform ='<option id=F' + parseInt(compteur) + '>A remplir dans généralité</option>';
		        compteur += 1;
				document.getElementById("addform").insertAdjacentHTML("beforeend", nouveauform);
	}

/* vider le contenu du premier formateur */
	function vider_formateur(){
		document.getElementById("0").innerHTML='<div class="item">	<label for="numero_psp0">Numéro </label>					<input type="number" id="numero_psp0" name="numero_psp0" size="20" min="0">				</div>				<div style="margin-left: auto;"> 					<a style="text-decoration: none;" onclick="vider(this.parentNode.parentNode)"><i class="flaticon-recycling-bin"></i></a> 				</div>				<div class="item">					<label for="nomform0">Nom</label>					<input onchange="add_formateur(this)" type="text" id="nomform0" name="nomform0" size="20" min="0">				</div>				<button type="button" style="margin-top: 10px;" data-toggle="modal" data-target="#myModal">Rechercher dans la base</button>				<div class="item">					<label for="prenom0">Prénom </label>					<input onchange="add_formateur(this)" type="text" id="prenom0" name="prenom0" size="20" min="0">				</div>';
		document.getElementById("F0").innerHTML='<div id="F0"></div>';
	}

/* Supprimer un formateur */
	function supprimer_formateur(element){
	        document.getElementById(element.id).remove();
	        document.getElementById("F"+element.id).remove();
	}



// ♥ ONGLET PARTICIPANTS ♥ ======================================================

/* Ajouter un participant */
	function ajouter_participant(){
		var nouveau2 ='<div id="P' + parseInt(compteur2) + '"class="grille3">' + '<div class="item"><label for="numero_psp0' + parseInt(compteur2) + '">N° de passeport </label><input type="text" id="numero_psp0' + parseInt(compteur2) + '" name="numero_psp0' + parseInt(compteur2) + '" pattern="[0-9]" size="30"></div><div style="margin-left: auto;"><a style="text-decoration: none;" onclick="supprimer_participant(this.parentNode.parentNode)"><i class="flaticon-recycling-bin"></i></a></div><div class="item"><label for="nomform0' + parseInt(compteur2) + '">Nom</label><input type="text" id="nomform0' + parseInt(compteur2) + '" name="nomform0' + parseInt(compteur2) + '" size="30" min="0"></div><div></div><div class="item">	<label for="prenom0' + parseInt(compteur2) + '">Prénom </label><input type="text" id="prenom00" name="prenom0' + parseInt(compteur2) + '" size="30" min="0"></div><button type="button" style="margin-top: 10px;" data-toggle="modal" data-target="#myModal2">Rechercher dans la base</button><div class="item"><label for="email0' + parseInt(compteur2) + '">Email </label><input type="email0' + parseInt(compteur2) + '" id="email0' + parseInt(compteur2) + '" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" size="30" name="mail0' + parseInt(compteur2) + '"></div><div></div><div class="item"><label for="telephone0' + parseInt(compteur2) + '">Tél </label><input type="tel" id="telephone0' + parseInt(compteur2) + '" name="telephone0' + parseInt(compteur2) + '" pattern="[0-9]{10}" maxlength="10" size="30"></div></div>';
			document.getElementById("add2").insertAdjacentHTML("beforeend", nouveau2);
	        compteur2 += 1;
	        compteur_participant += 1;
	        document.getElementById("nb_p").innerHTML = compteur_participant;
	}

/* vider le contenu du premier participant */
	function vider_participant(){
		document.getElementById("P0").innerHTML='<div class="item">			<label for="numero_psp00">N° de passeport </label>				<input type="text" id="numero_psp00" name="numero_psp00" pattern="[0-9]" size="30">			</div>			<div style="margin-left: auto;"> 				<a style="text-decoration: none;" onclick="vider_participant(this.parentNode.parentNode)"><i class="flaticon-recycling-bin"></i></a> 			</div>			<div class="item">				<label for="nomform00">Nom</label>				<input type="text" id="nomform00" name="nomform00" size="30" min="0">			</div>			<div></div>			<div class="item">				<label for="prenom00">Prénom </label>				<input type="text" id="prenom00" name="prenom00" size="30" min="0">			</div>			<button type="button" style="margin-top: 10px;" data-toggle="modal" data-target="#myModal2">Rechercher dans la base</button>			<div class="item">				<label for="email00">Email </label>			    <input type="email00" id="email00" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" size="30" name="mail00">			</div>			<div></div>			<div class="item">				<label for="telephone00">Tél </label>			    <input type="tel" id="telephone00" name="telephone00" pattern="[0-9]{10}" maxlength="10" size="30">			</div>'
	}

/* Supprimer un participant */
	function supprimer_participant(element){
	        document.getElementById(element.id).remove();
	        compteur_participant -= 1;
	        document.getElementById("nb_p").innerHTML = compteur_participant;
	}



// ♥ ONGLET PLANNING ♥ ==========================================================

/* Ajouter automatiquement les formateurs de la page généralité sur la page planning */
// Le premier formateur...
	function add_formateur(element){
		var numdiv= element.parentNode.parentNode.id;
		var nom = document.getElementById("nomform"+numdiv).value;
		var prenom = document.getElementById("prenom"+numdiv).value;
		document.getElementById("F"+numdiv).innerHTML=nom +" "+ prenom;

	}
// ...Tous les suivants
	function add_formateur2(element){
		var nom = document.getElementById("nomform0").value;
		var prenom = document.getElementById("prenom0").value;
		document.getElementById("F0").innerHTML=nom +" "+ prenom;
	}

/* Supprimer un élément du planning */
	function supprimer_pl(element){
	        document.getElementById(element.id).remove();
	}

/* Effacer les éléments saisis dans "sélection planning" */
	function effacer_pl(){
		document.getElementById("select_planning").innerHTML='<table><tr><th>Sélection planning</th></tr><td><p>Lieu</p><label for="FD" class="modif1">FD</label>						<input onclick="Set_adresse_FD()" type="radio" id="inter" name="lieuform" size="25">						<label for="Virtuel" class="modif1">Virtuel</label>						<input onclick="Set_adresse_Virtuelle()" type="radio" id="Virtuel" name="lieuform" size="25">						<label for="Client_Autre" class="modif1">Client/Autre</label>						<input onclick="Set_adresse_Client()" type="radio" id="Client_Autre" name="lieuform" size="25" data-toggle="modal" data-target="#myModal3"><br>						<div id="lieuform_visu"><input class="exp1" type="text" id="lieuform_visu2" name="lieuform" size="39"></div><br>						<label for="salle_choix">Salle</label>						<input type="text" id="salle_choix" name="salle_choix" size="25"><br>						<label for="type_journee">Type journée</label>						<select name="type_journee">						    <option selected="selected" value="cpt">Complète</option>					    	<option value="demie">Demie</option>						</select><br>						<p>Matinée</p>						<label for="heuremd" class="italic">Heure début</label>						<input onchange="Total_heures(\'hmd\',\'hmf\', \'had\',\'haf\')" type="time" id="hmd" name="heuremd" size="25">						<label for="heuremf" class="italic">Heure fin</label>						<input onchange="Total_heures(\'hmd\',\'hmf\', \'had\',\'haf\')" type="time" id="hmf" name="heuremf" size="25"><br>						<p>Après-midi</p>						<label for="heuread" class="italic">Heure début</label>						<input onchange="Total_heures(\'hmd\',\'hmf\', \'had\',\'haf\')" type="time" id="had" name="heuread" size="25">						<label for="heureaf" class="italic">Heure fin</label>						<input onchange="Total_heures(\'hmd\',\'hmf\', \'had\',\'haf\')" type="time" id="haf" name="heureaf" size="25"><br>						<p>Total heures&ensp; </p><p id="tt_h"> 0</p>						<button type="button" class="effacer2" onclick="effacer_pl()">							Effacer						</button>						<button type="button" class="valider" onclick="valider_planning()">							Valider						</button>					</td>				</table> '
	}

/* Ajouter automatiquement les adresses ou renvoyer vers la base */
	function Set_adresse_FD(){
		document.getElementById("lieuform_visu").innerHTML='<input class="exp1" type="text" id="lieuform_visu2" name="lieuform" size="39" value="Format Différence"/>';	
	}

	function Set_adresse_Virtuelle(){
		document.getElementById("lieuform_visu").innerHTML='<input class="exp1" type="text" id="lieuform_visu2" name="lieuform" size="39" value="Classe virtuelle"/>';	
	}

	function Set_adresse_Client(){
		document.getElementById("lieuform_visu").innerHTML='<input class="exp1" type="text" id="lieuform_visu" name="lieuform" size="35" value=""/>';

	}
	
/* Gestion des heures, calcul du total des heures */
	function diff_heures(start, end) {
			
		    if ((start == "") || (end == "")){
		    	return [0, 0]
		    } else {
		    
		      start = start.split(":");
		      end = end.split(":");

		      var startDate = new Date(0, 0, 0, start[0], start[1], 0);
		      var endDate = new Date(0, 0, 0, end[0], end[1], 0);
		      var diff = endDate.getTime() - startDate.getTime();
		      var hours = Math.floor(diff / 1000 / 60 / 60);
		      diff -= hours * 1000 * 60 * 60;
		      var minutes = Math.floor(diff / 1000 / 60);
		      
		      return [hours, minutes];
		      
		      }
		}

	 function Total_heures(startmatin, endmatin, startaprem, endaprem){
	 		var startm = document.getElementById(startmatin).value;
			var endm = document.getElementById(endmatin).value;
	 		var starta = document.getElementById(startaprem).value;
			var enda = document.getElementById(endaprem).value;
	 		var dureeMatin = diff_heures(startm, endm);
	 		var dureeAprem = diff_heures(starta, enda);
	    
	    var hours = dureeMatin[0] + dureeAprem[0];
	    var minutes = dureeMatin[1] + dureeAprem[1];
	    if (minutes >= 60) {
	    	minutes -= 60;
	      hours += 1;
	    }
	    
	    var result = ""
	    if (hours < 10) {
	    	result += '0'
	    }
	    result += parseInt(hours) + ":"
	    
	    if (minutes < 10) {
	    	result += '0'
	    }
	    result += parseInt(minutes)
	    
	     
	 		document.getElementById('tt_h').innerHTML = result;
	}

/* Valider un créneau et ajouter le récapitulatif en dessous */
	function valider_planning(){
		var nom = document.getElementById("addform").value;
		var date = document.getElementById("date_pl");
		var lieu = document.getElementById("lieuform_visu2").value;
		var hmd = document.getElementById("hmd").value;
		var hmf = document.getElementById("hmf").value;
		var had = document.getElementById("had").value;
		var haf = document.getElementById("haf").value;
		var salle = document.getElementById("salle_choix").value;


		var nouveauplanning = '<div id="P'+ compteur_planning +'" class="grille4"><div class="item"><p><b>Date</b> : '+ date.innerHTML +'</p></div><div class="item"><p><b>Matin</b> : '+ hmd +' - '+ hmf+ ' </p></div>				<div class="item"><p><b>Après-midi</b> : '+ had +' - '+ haf+ '</p></div><div style="margin-left: auto;"><a style="text-decoration: none;" onclick="supprimer_pl(this.parentNode.parentNode)"><i class="flaticon-recycling-bin"></i></a></div><div class="item"><p><b>Formateur</b> : '+ nom +' </p></div><div></div><div></div><div></div><div class="item"><p><b>Lieu</b> : '+ lieu +' </p></div><div class="item"><p><b>Salle</b> : '+ salle +'</p></div>';
		document.getElementById("ajouts_planning").insertAdjacentHTML("afterbegin", nouveauplanning);
		compteur_planning += 1;
	}



// ♥ ONGLET FRAIS ♥ ==========================================================================================

/* Calculer les frais addition et total */
	function calcadd(ch1, ch2, resultat){
		document.getElementById(resultat).value = document.getElementById(ch1).value*document.getElementById(ch2).value;
	}

	function total_frais(){
        document.getElementById("total_f").value = parseFloat((parseFloat(document.getElementById("FP_TT").value)+parseFloat(document.getElementById("FDEP_TT").value)+parseFloat(document.getElementById("FTECH_TT").value)+parseFloat(document.getElementById("FSALLE_TT").value)+parseFloat(document.getElementById("FDIV_TT").value))-parseFloat(document.getElementById("remise").value));
	}


