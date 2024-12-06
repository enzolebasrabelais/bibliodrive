<?php
require_once('connexion_bibliodrive.php');
$stmt = $connexion->prepare("SELECT titre, anneeparution FROM livre INNER JOIN auteur ON (livre.noauteur = auteur.noauteur) where auteur.nom=:nom");
$nom = $_POST["rchAuteur"];
$prenom = "Jacques";
$stmt->bindValue(":nom", $nom); // pas de troisième paramètre STR par défaut
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
$enregistrement = $stmt->fetch(); // boucle while inutile
echo '<h1>', $enregistrement->titre, ' ', ' ', $enregistrement->anneeparution,'</h1>';
?>