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


?>









</body>
</html>