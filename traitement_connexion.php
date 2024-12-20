<?php
session_start();

require_once('connexion_bibliodrive.php');

$stmt = $connexion->prepare("SELECT mel, motdepasse, nom, prenom FROM utilisateur where utilisateur.mel=:mel AND utilisateur.motdepasse=:motdepasse");

$stmt->bindValue(":mel", $_POST["identifiant"]);
$stmt->bindValue(":motdepasse",$_POST["motPasse"]); // pas de troisième paramètre STR par défaut
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
$enregistrement = $stmt->fetch();


// si user mdp OK
$_SESSION["identifiant"] = $_POST["identifiant"];
$_SESSION["motdepasse"] = $_POST["motPasse"];

echo $enregistrement->prenom." ".$enregistrement->nom;
echo "<BR>";
echo $enregistrement->mel;