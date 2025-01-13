<?php

session_start();

require_once('connexion_bibliodrive.php');


foreach ($_SESSION['panier'] as $key=>$value) {
    $stmt = $connexion->prepare("INSERT INTO emprunter (mel, nolivre, dateemprunt) VALUES (:mel, :nolivre, :dateemprunt)");
    $mel = $_SESSION["identifiant"];
    $nolivre = $key;
    $dateemprunt = date("Y-m-d");

 
    $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
    $stmt->bindValue(':nolivre', $nolivre, PDO::PARAM_INT);
    $stmt->bindValue(':dateemprunt', $dateemprunt, PDO::PARAM_STR);
    $stmt->execute();
}
?>