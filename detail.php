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
require_once('connexion_bibliodrive.php');
$stmt = $connexion->prepare("SELECT nom, prenom, detail, photo FROM livre INNER JOIN auteur ON (livre.noauteur = auteur.noauteur) where livre.nolivre=:nolivre");
$nolivre = $_GET["nolivre"];
$stmt->bindValue(":nolivre", $nolivre); // pas de troisième paramètre STR par défaut
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
$enregistrement = $stmt->fetch();
echo "Auteur : ".$enregistrement->prenom." ", $enregistrement->nom;
echo "<BR>";
echo "<BR>";
echo "Résumé du livre";
echo "<BR>";
echo "<BR>";
echo "ISBN13 : ".$enregistrement->detail;
?>
</body>
</html>