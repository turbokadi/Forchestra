<?php
require_once("backend/connection.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Forchestra</title>
    <link href="static/css/bootstrap-login.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="static/css/style_login.css">
</head>
<body>
    <header><img src="static/img/Logo-Forchestra.png" alt="Forchestra"></header>
    <div class="conteneur">
        <form action=index.php method=post accept-charset="UTF-8">
            <h2>Identification</h2>
            <hr size="20%">
            <div class="input-group mb-4">
                <label>Nom d'utilisateur</label>
                <span class="input-group-text icon"><i class="icon-user-female"></i></span>
                <input type="text" class="form-control" id="nom" name="username" placeholder="Votre identifiant" required>
            </div>
            <div class="input-group mb-4">
                <label for="motDePasse" class="form-label">Mot de passe</label>
                <span class="input-group-text icon"><i class="icon-key"></i></span>
                <input type="password" class="form-control" id="motDePasse" name="password">
            </div>  
            <span><input type="checkbox"> Se souvenir de moi</span><button type="submit" class="btn btn-success">Se connecter</button>
            <?php
                if(isset($_GET[connection::FALLBACK_CONNECT_KEYWORD])){
                    switch ($_GET[connection::FALLBACK_CONNECT_KEYWORD]) {
                        case connection::UNCONNECTED_CREDENTIALS_KEYWORD:
                            echo "<p style='color:red'>Vous n'êtes pas connecté</p>";
                            break;
                        case connection::WRONG_CREDENTIALS_KEYWORD:
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                            break;
                        case connection::TIMEOUT_KEYWORD:
                            echo "<p style='color:red'>Vous devez vous reconnectez, votre session à expiré.</p>";
                            break;
                        case connection::DECONNECT_KEYWORD:
                            echo "<p style='color:green'>Vous vous êtes deconnecté.</p>";
                            break;
                        default:
                            break;
                    }
                }
             ?>
        </form>
    </div>  
</body>
</html>