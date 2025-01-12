<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php

//session_start();

if (isset($_SESSION["connecte"])) {
    echo $_SESSION["prenom"]." ".$_SESSION["nom"];
    echo "<BR>";
    echo $_SESSION["identifiant"];
    echo "<BR>";
    echo "<BR>";
    echo '
    <form action="" method="post">
    <input type="submit" class="btn btn-primary" name="btndeco" value="Déconnexion" >
    </form>';
} else {
    echo '
    <form action="traitement_connexion.php" method="post" class="form-control" >
    Se connecter
    <BR>
    <div class="mb-3 mt-3">
    Identifiant
    <BR>
    <input type="text" placeholder="" name="identifiant">
    <BR>
    Mot de passe
    <BR>
    <input type="text" placeholder="" name="motPasse">
    <BR>
    <BR>
    <button class="btn btn-primary" type="submit">Connexion</button>
    </div>
    </form>';
    
}

if (isset($_POST['btndeco'])) {
    session_destroy();






















}

?>









</body>
</html>