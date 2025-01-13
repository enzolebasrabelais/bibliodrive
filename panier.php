<?php
session_start();
   if(!isset($_SESSION['panier'])){
       // Initialisation du panier
       $_SESSION['panier'] = array();
    }
   require_once('connexion_bibliodrive.php');

   $stmt = $connexion->prepare("SELECT nom, prenom, dateretour, detail, isbn13, titre, anneeparution FROM livre INNER JOIN auteur ON (livre.noauteur = auteur.noauteur) LEFT OUTER JOIN emprunter ON (livre.nolivre = emprunter.nolivre) where livre.nolivre=:nolivre");
$nolivre = $_GET["nolivre"];
$stmt->bindValue(":nolivre", $nolivre); // pas de troisième paramètre STR par défaut
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
$enregistrement = $stmt->fetch();



 $_SESSION['panier'][$nolivre] = $enregistrement->prenom.' '.$enregistrement->nom.' '.'-'.' '.$enregistrement->titre.' '.'('.$enregistrement->anneeparution.')';

 header("Location: accueil.php");
?>