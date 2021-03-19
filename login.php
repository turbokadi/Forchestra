<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Forchestra</title>
    <link href="bootstrap-login.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
    <header><img src="images/Logo-Forchestra.png" alt="Forchestra"></header>
    <div class="conteneur">
        <form action=verification.php method=post accept-charset="UTF-8">
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
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2){
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                }
             ?>
        </form>
    </div>  
</body>
</html>