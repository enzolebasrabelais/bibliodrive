<?php

require_once ("connexion_bibliodrive.php");

if(!isset($_POST['btnAjoutAuteur'])) 
{/* L'entrée btnAjoutAuteur est vide = le formulaire n'a pas été posté, on affiche le formulaire */
    echo '

    <form action="" method="post">
    Nom auteur: <input type="text" name="txtNom"><br><br>
    Prénom auteur : <input type="text" name="txtPrenom"><br><br>

    <input class="btn btn-primary" type="submit" name="btnAjoutAuteur" value="Créer le membre" >
    </form>';
}
else {
/* L'utilisateur a cliqué sur Envoyer, l'entrée btnAjoutMembre <> vide, on traite le formulaire */
    $stmt = $connexion->prepare("INSERT INTO auteur (nom, prenom) VALUES (:nom, :prenom)");
    $nom = $_POST["txtNom"];
    $prenom = $_POST["txtPrenom"];

    $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->execute();
}
?>