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
session_start();
?>
<div class="row">
<div class="col-sm-9">
<?php
require_once('connexion_bibliodrive.php');
$stmt = $connexion->prepare("SELECT nom, prenom, dateretour, dateemprunt, detail, isbn13, anneeparution, photo FROM livre INNER JOIN auteur ON (livre.noauteur = auteur.noauteur) LEFT OUTER JOIN emprunter ON (livre.nolivre = emprunter.nolivre) where livre.nolivre=:nolivre");
$nolivre = $_GET["nolivre"];
$stmt->bindValue(":nolivre", $nolivre); // pas de troisième paramètre STR par défaut
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
$enregistrement = $stmt->fetch();

echo "Auteur : ".$enregistrement->prenom." ", $enregistrement->nom;
echo "<BR>";
echo "<BR>";
echo "ISBN13 : ".$enregistrement->isbn13;
echo "<BR>";
echo "Résumé du livre";
echo "<BR>";
echo "<BR>";
echo $enregistrement->detail;
echo "<BR>";
echo "<BR>";
echo "Date de parution : ".$enregistrement->anneeparution;
?>
</div>
<div class="col-sm-3">
<img src=".\images\<?php echo $enregistrement->photo?>" class="d-block w-100">
</div>
</div>
<div class="row">
<div class="col-sm-7">
<?php
if ($enregistrement->dateemprunt == NULL) {
    echo "Disponible";
} else {
     echo "Non disponible";
}

echo "<BR>";
echo "<BR>";

if (isset($_SESSION["connecte"])) {
    echo "<a class='btn btn-primary' href='panier.php?nolivre=".$nolivre."'>","Ajout au panier", "</a>";
} else {
    echo "Connectez-vous pour pouvoir réserver ce livre.";
}
?>
</div>
</div>

</body>
</html>