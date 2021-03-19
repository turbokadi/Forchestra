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
$head->generate_head();

common::open_body();

// Add navigation bar section to change page
common::add_navigation_bar(pages::$new_session);

?>
    <div class="w3-bar page haut">
        <div id="menu-hg">
            <button class="w3-bar-item w3-button menu-h" onclick="openTab('Generalites'); changecolor(this)" style="background-color: rgb(241,255,238)">Généralités</button>
            <button class="w3-bar-item w3-button menu-h" onclick="openTab('Participants'); changecolor(this)">Participants</button>
            <button class="w3-bar-item w3-button menu-h" onclick="openTab('Planning'); changecolor(this)">Planning</button>
            <button class="w3-bar-item w3-button menu-h" onclick="openTab('Frais'); changecolor(this)">Frais</button>
            <button class="w3-bar-item w3-button menu-h" onclick="openTab('Documents'); changecolor(this)">Documents</button>
        </div>
        <?php
        common::add_user_section();
        ?>
    </div>

    <!-- ONGLET GENERALITES -->
    <form name="donnees_generalite" method="post" action="" enctype="">
        <div id="Generalites" class="w3-container page onglet">
            <br>
            <label for="formation">Titre de la formation </label>
            <input type="text" id="formation" name="formation" size="25"><br>
            <label for="responsable">Responsable session </label>
            <input type="text" id="responsable" name="responsable" size="25"><br>
            <label for="assistante">Nom assistante </label>

            <select name="assistante">
                <option selected="selected" value="ass1">
                    Assistante 1</option>
                <option value="ass2">Assistante 2</option>
                <option value="ass3">Assistante 3</option>
            </select><br>
            <p>Type</p>
            <label for="inter" class="modif1">INTER </label>
            <input type="radio" id="inter" name="type" size="25">
            <label for="intra" class="modif1"> INTRA </label>
            <input type="radio" id="intra" name="type" size="25"><br>
            <div class="grille1">
                <div class="item">
                    <label for="date_deb">Date de début </label>
                    <input type="date" id="date_deb" name="date_deb">
                </div>
                <div class="item">
                    <label for="date_fin">Date de fin </label>
                    <input type="date" id="date_fin" name="date_fin">
                </div>
                <div class="item">
                    <label for="nb_jours">Total jours </label>
                    <input type="number" id="nb_jours" name="nb_jours" size="5" min="0">
                </div>
                <div class="item">
                    <label for="nb_heures">Total heures </label>
                    <input type="number" id="nb_heures" name="nb_heures" size="5" min="0">
                </div>
            </div>
            <label for="formateur_ref">Formateur référent </label>
            <input type="text" id="formateur_ref" name="formateur_ref" size="25"><br><br>

            <div class="grille2">
                <div class="item">
                    <p style="margin-top:auto;">Formateurs</p>
                    <button type="button" onclick="ajouter_formateur()">+ Ajouter un formateur</button>
                </div>
            </div>

            <div id="0" class="grille3">
                <div class="item">
                    <label for="numero_psp0">Numéro </label>
                    <input type="number" id="numero_psp0" name="numero_psp0" size="20" min="0">
                </div>
                <div style="margin-left: auto;">
                    <a style="text-decoration: none;" onclick="vider_formateur(this.parentNode.parentNode)"><i class="flaticon-recycling-bin"></i></a>
                </div>
                <div class="item">
                    <label for="nomform0">Nom</label>
                    <input onchange="add_formateur2(this)" type="text" id="nomform0" name="nomform0" size="20" min="0">
                </div>
                <button type="button" style="margin-top: 10px;" data-toggle="modal" data-target="#myModal">Rechercher dans la base</button>
                <div class="item">
                    <label for="prenom0">Prénom </label>
                    <input onchange="add_formateur2(this)" type="text" id="prenom0" name="prenom0" size="20" min="0">
                </div>
            </div>

            <div id="add"></div>
        </div>

        <!-- Modal POUR AJOUTER UN FORMATEUR EN L'IMPORTANT-->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ajouter un formateur depuis la base</h4>
                    </div>
                    <div class="modal-body">
                        <p>Rajouter le code ici, bon courage</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ajouter</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- ONGLET PARTICIPANTS -->
        <div id="Participants" class="w3-container page onglet" style="display:none">
            <br>
            <p>Nombre de participants</p>
            <p id="nb_p">1</p>


            <div class="grille2">
                <div class="item">
                    <p style="margin-top:auto;">Participants</p>
                    <button type="button" onclick="ajouter_participant()">+ Ajouter un participant</button>
                </div>
            </div>
            <div id="P0" class="grille3">
                <div class="item">
                    <label for="numero_psp00">N° de passeport </label>
                    <input type="text" id="numero_psp00" name="numero_psp00" pattern="[0-9]" size="30">
                </div>
                <div style="margin-left: auto;">
                    <a style="text-decoration: none;" onclick="vider_participant(this.parentNode.parentNode)"><i class="flaticon-recycling-bin"></i></a>
                </div>
                <div class="item">
                    <label for="nomform00">Nom</label>
                    <input type="text" id="nomform00" name="nomform00" size="30" min="0">
                </div>
                <div></div>
                <div class="item">
                    <label for="prenom00">Prénom </label>
                    <input type="text" id="prenom00" name="prenom00" size="30" min="0">
                </div>
                <button type="button" style="margin-top: 10px;" data-toggle="modal" data-target="#myModal2">Rechercher dans la base</button>
                <div class="item">
                    <label for="email00">Email </label>
                    <input type="email00" id="email00" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" size="30" name="mail00">
                </div>
                <div></div>
                <div class="item">
                    <label for="telephone00">Tél </label>
                    <input type="tel" id="telephone00" name="telephone00" pattern="[0-9]{10}" maxlength="10" size="30">
                </div>
            </div>

            <div id="add2"></div>
            <div class="grille2">
                <div class="item">
                    <div></div>
                    <button type="button" onclick="ajouter_participant()">+ Ajouter un participant</button>
                </div>
            </div>
        </div>

        <!-- Modal2 POUR AJOUTER UN STAGIAIRE EN L'IMPORTANT-->
        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content2-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ajouter un stagiaire depuis la base</h4>
                    </div>
                    <div class="modal-body">
                        <p>Rajouter le code ici, bon courage</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ajouter</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- ONGLET PLANNING -->
        <div id="Planning" class="w3-container page onglet" style="display:none">
            <br>
            <div class="trio">
                <div class="encadre">
                    <table>
                        <tr>
                            <th>Sélection intervenants</th>
                        </tr>
                        <td>
                            <select size="8" id="addform" style="min-width: 200px;">
                                <option id="F0"></option>
                            </select>
                        <td>
                    </table>
                </div>
                <div class="encadre">
                    <table>
                        <tr>
                            <th>Sélection des jours</th>
                        </tr>
                        <td>
                            <div id="myCalendar" class="vanilla-calendar" style="margin-bottom: 20px"></div>
                            <div id="date_pl" style="text-align: center;"></div>

                            <!-- ! JavaScript ! Création du calandrier -->
                            <script>
                                let pastDates = true, availableDates = false, availableWeekDays = false

                                let calendar = new VanillaCalendar({
                                    selector: "#myCalendar",
                                    months: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre"],
                                    shortWeekday: ['Sam', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven','Dim'],
                                    onSelect: (data, elem) => {
                                        console.log(data, elem);
                                        var choix_date = new Date(data.date);
                                        console.log(choix_date);
                                        var months = ["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"];
                                        var days = ['Samedi', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Dimanche'];
                                        document.getElementById("date_pl").innerHTML = days[choix_date.getDay()]+ " " + choix_date.getDate() +" " + months[choix_date.getMonth()]+ " " + choix_date.getFullYear();
                                    }
                                })

                                let btnPastDates = document.querySelector('[name=pastDates]')
                                btnPastDates.addEventListener('click', () => {
                                    pastDates = !pastDates
                                    calendar.set({pastDates: pastDates})
                                    btnPastDates.innerText = `${(pastDates ? 'Disable' : 'Enable')} past dates`
                                })

                                let btnAvailableDates = document.querySelector('[name=availableDates]')
                                btnAvailableDates.addEventListener('click', () => {
                                    availableDates = !availableDates
                                    btnAvailableDates.innerText = `${(availableDates ? 'Clear available dates' : 'Set available dates')}`
                                    if (!availableDates) {
                                        calendar.set({availableDates: [], datesFilter: false})
                                        return
                                    }
                                    let dates = () => {
                                        let result = []
                                        for (let i = 1; i < 15; ++i) {
                                            if (i % 2) continue
                                            let date = new Date(new Date().getTime() + (60 * 60 * 24 * 1000) * i)
                                            result.push({date: `${String(date.getFullYear())}-${String(date.getMonth() + 1).padStart(2, 0)}-${String(date.getDate()).padStart(2, 0)}`})
                                        }
                                        return result
                                    }
                                    calendar.set({availableDates: dates(), availableWeekDays: [], datesFilter: true})
                                })

                                let btnAvailableWeekDays = document.querySelector('[name=availableWeekDays]')
                                btnAvailableWeekDays.addEventListener('click', () => {
                                    availableWeekDays = !availableWeekDays
                                    btnAvailableWeekDays.innerText = `${(availableWeekDays ? 'Clear available weekdays' : 'Set available weekdays')}`
                                    if (!availableWeekDays) {
                                        calendar.set({availableWeekDays: [], datesFilter: false})
                                        return
                                    }
                                    let days = [{
                                        day: 'monday'
                                    }, {
                                        day: 'tuesday'
                                    }, {
                                        day: 'wednesday'
                                    }, {
                                        day: 'friday'
                                    }]
                                    calendar.set({availableWeekDays: days, availableDates: [], datesFilter: true})
                                })
                            </script>
                        </td>
                    </table>
                </div>
                <div class="encadre" id="select_planning">
                    <table>
                        <tr>
                            <th>Sélection planning</th>
                        </tr>
                        <td>
                            <p>Lieu</p>
                            <label for="FD" class="modif1">FD</label>
                            <input onclick="Set_adresse_FD()" type="radio" id="inter" name="lieuform" size="25">
                            <label for="Virtuel" class="modif1">Virtuel</label>
                            <input onclick="Set_adresse_Virtuelle()" type="radio" id="Virtuel" name="lieuform" size="25">
                            <label for="Client_Autre" class="modif1">Client/Autre</label>
                            <input onclick="Set_adresse_Client()" type="radio" id="Client_Autre" name="lieuform" size="25" data-toggle="modal" data-target="#myModal3"><br>
                            <div id="lieuform_visu"><input class="exp1" type="text" id="lieuform_visu2" name="lieuform" size="39"></div><br>

                            <label for="salle_choix">Salle</label>
                            <input type="text" id="salle_choix" name="salle_choix" size="25"><br>
                            <label for="type_journee">Type journée</label>
                            <select name="type_journee">
                                <option selected="selected" value="cpt">Complète</option>
                                <option value="demie">Demie</option>
                            </select><br>
                            <p>Matinée</p>
                            <label for="heuremd" class="italic">Heure début</label>
                            <input onchange="Total_heures('hmd','hmf', 'had','haf')" type="time" id="hmd" name="heuremd" size="25">
                            <label for="heuremf" class="italic">Heure fin</label>
                            <input onchange="Total_heures('hmd','hmf', 'had','haf')" type="time" id="hmf" name="heuremf" size="25"><br>
                            <p>Après-midi</p>
                            <label for="heuread" class="italic">Heure début</label>
                            <input onchange="Total_heures('hmd','hmf', 'had','haf')" type="time" id="had" name="heuread" size="25">
                            <label for="heureaf" class="italic">Heure fin</label>
                            <input onchange="Total_heures('hmd','hmf', 'had','haf')" type="time" id="haf" name="heureaf" size="25"><br>
                            <p>Total heures&ensp; </p><p id="tt_h"> 0</p>
                            <br>
                            <div style="display: flex; justify-content: flex-end;">
                                <button type="button" style="padding: 0 20px; margin-right: 10px;" class="effacer2" onclick="effacer_pl()">
                                    Effacer
                                </button>
                                <button type="button"  style="padding: 0 20px;" class="valider" onclick="valider_planning()">
                                    Valider
                                </button>
                            </div>
                        </td>
                    </table>
                </div>
            </div>
            <br>
            <div id="ajouts_planning"></div>


            <!-- Modal3 POUR LE LIEU-->
            <div class="modal fade" id="myModal3" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content3-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Choisir un lieu depuis la base</h4>
                        </div>
                        <div class="modal-body">
                            <p>Rajouter le code ici, bon courage</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Ajouter</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- ONGLET FRAIS -->
        <div id="Frais" class="w3-container page onglet" style="display:none">
            <table style="width:40%">
                <tr>
                    <th></th>
                    <td>Cout unitaire</td>
                    <td>Quantité</td>
                    <td>Total</td>
                </tr>
                <tr>
                    <th>Frais pédagogiques</th>
                    <td><input type="number" min="0" step="any" id="FP_CU" name="frais_pedagogiques" onkeyup="calcadd('FP_CU', 'FP_QU', 'FP_TT'); total_frais()" onchange="calcadd('FP_CU', 'FP_QU', 'FP_TT'); total_frais()"></td>
                    <td><input type="number" min="1" id="FP_QU" name="frais_pedagogiques" onkeyup="calcadd('FP_CU', 'FP_QU', 'FP_TT'); total_frais()" onchange="calcadd('FP_CU', 'FP_QU', 'FP_TT'); total_frais()"></td>
                    <td><input type="number" min="1" step="any" id="FP_TT" name="frais_pedagogiques" disabled></td>
                </tr>
                <tr>
                    <th>Frais déplacement/hébergement</th>
                    <td><input type="number" min="0" step="any" id="FDEP_CU" name="frais_dep_heb" onkeyup="calcadd('FDEP_CU', 'FDEP_QU', 'FDEP_TT'); total_frais()" onchange="calcadd('FDEP_CU', 'FDEP_QU', 'FDEP_TT'); total_frais()"></td>
                    <td><input type="number" min="0" id="FDEP_QU" name="frais_dep_heb" onkeyup="calcadd('FDEP_CU', 'FDEP_QU', 'FDEP_TT'); total_frais()" onchange="calcadd('FDEP_CU', 'FDEP_QU', 'FDEP_TT'); total_frais()"></td>
                    <td><input type="number" min="0" step="any" id="FDEP_TT" name="frais_dep_heb" disabled></td>
                </tr>
                <tr>
                    <th>Frais support technique</th>
                    <td><input type="number" min="0" step="any" id="FTECH_CU" name="frais_support_technique" onkeyup="calcadd('FTECH_CU', 'FTECH_QU', 'FTECH_TT') ; total_frais()" onchange="calcadd('FTECH_CU', 'FTECH_QU', 'FTECH_TT'); total_frais()"></td>
                    <td><input type="number" min="0" id="FTECH_QU" name="frais_support_technique" onkeyup="calcadd('FTECH_CU', 'FTECH_QU', 'FTECH_TT'); total_frais()" onchange="calcadd('FTECH_CU', 'FTECH_QU', 'FTECH_TT') ; total_frais()"></td>
                    <td><input type="number" min="0" step="any" id="FTECH_TT" name="frais_support_technique" disabled></td>
                </tr>
                <tr>
                    <th>Frais location de salle/restauration</th>
                    <td><input type="number" min="0" step="any" id="FSALLE_CU" name="frais_salle" onkeyup="calcadd('FSALLE_CU', 'FSALLE_QU', 'FSALLE_TT'); total_frais()" onchange="calcadd('FSALLE_CU', 'FSALLE_QU', 'FSALLE_TT'); total_frais()"></td>
                    <td><input type="number" min="0" id="FSALLE_QU" name="frais_salle" onkeyup="calcadd('FSALLE_CU', 'FSALLE_QU', 'FSALLE_TT'); total_frais()" onchange="calcadd('FSALLE_CU', 'FSALLE_QU', 'FSALLE_TT'); total_frais()"></td>
                    <td><input type="number" min="0" step="any" id="FSALLE_TT" name="frais_salle" disabled></td>
                </tr>
                <tr>
                    <th>Frais divers</th>
                    <td><input type="number" min="0" step="any" id="FDIV_CU" name="frais-divers" onkeyup="calcadd('FDIV_CU', 'FDIV_QU', 'FDIV_TT'); total_frais()" onchange="calcadd('FDIV_CU', 'FDIV_QU', 'FDIV_TT'); total_frais()"></td>
                    <td><input type="number" min="0" id="FDIV_QU" name="frais-divers" onkeyup="calcadd('FDIV_CU', 'FDIV_QU', 'FDIV_TT'); total_frais()" onchange="calcadd('FDIV_CU', 'FDIV_QU', 'FDIV_TT'); total_frais()"></td>
                    <td><input type="number" min="0" step="any" id="FDIV_TT" name="frais-divers" disabled></td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                    <td><label for="remise">Remise</label></td>
                    <td><input type="number" min="0" id="remise" name="remise" step="any" onkeyup="total_frais()" onchange="total_frais()"></br></td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                    <td><label for="total_f">Total des frais</label></td>
                    <td><input type="number" min="0" id="total_f" name="total_f" step="any" disabled></td>
                </tr>

            </table>
        </div>

        <!-- ONGLET DOCUMENTS -->
        <div id="Documents" class="w3-container page onglet" style="display:none">
            <!--la grande section qui contient tout le contenu-->
            <section class="mes_documents">
                <!--une section qui contient deux documents-->
                <section>
                    <div class="img_desc">
                        <a href="Chevalets"><img src="static/img/icons/id-card.png">
                            <figcaption>Chevalets</figcaption></a>
                    </div>
                    <div class="img_desc">
                        <a href="Facture"><img src="static/img/icons/invoice.png">
                            <figcaption>Facture</figcaption></a>
                    </div>
                </section>
                <!--une section qui contient trois documents-->
                <section>
                    <div class="img_desc">
                        <a href="Convocation"><img src="static/img/icons/document.png">
                            <figcaption>Convocation</figcaption></a>
                    </div>
                    <div class="img_desc">
                        <a href="Conventions"><img src="static/img/icons/file.png">
                            <figcaption>Conventions</figcaption></a>
                    </div>
                    <div class="img_desc">
                        <a href="Emargements"><img src="static/img/icons/contract.png">
                            <figcaption>Emargements</figcaption></a>
                    </div>
                </section>
                <!--une section qui contient deux documents-->
                <section>
                    <div class="img_desc">
                        <a href="Attestations"><img src="static/img/icons/checklist.png">
                            <figcaption>Attestations</figcaption></a>
                    </div>
                    <div class="img_desc">
                        <a href="Certificats_de_realisation"><img src="static/img/icons/certificate.png">
                            <figcaption>Certificats de réalisation</figcaption></a>
                    </div>
                </section>
            </section>

        </div>

<?php
mysqli_close($bdd);