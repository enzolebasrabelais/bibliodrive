<?php

session_start();

foreach ($_SESSION['panier'] as $key=>$value) {
    $stmt = $connexion->prepare("INSERT INTO emprunter (mel, nolivre, dateemprunt) VALUES (:mel, :nolivre, :dateemprunt)");
    $mel = $_SESSION["identifiant"];
    $nolivre = $key;
    $dateemprunt = date("Y-m-d");

 
    $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
    $stmt->bindValue(':nolivre', $mdp, PDO::PARAM_INT);
    $stmt->bindValue(':dateemprunt', $nom, PDO::PARAM_STR);
    $stmt->execute();
}
?>