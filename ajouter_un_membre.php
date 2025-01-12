<?php
require_once('connexion_bibliodrive.php');

if(!isset($_POST['btnAjoutMembre'])) 
{/* L'entrée btnAjoutMembre est vide = le formulaire n'a pas été posté, on affiche le formulaire */
    echo '
    <form action="" method="post">
    Mel : <input type="text" name="txtMel"><br><br>
    Mot de passe : <input type="text" name="txtMdp"><br><br>
    Nom : <input type="text" name="txtNom"><br><br>
    Prénom : <input type="text" name="txtPrenom"><br><br>
    Adresse : <input type="text" name="txtAdresse"><br><br>
    Ville : <input type="text" name="txtVille"><br><br>
    Code postal : <input type="text" name="txtCode"><br><br>
    <input class="btn btn-primary" type="submit" name="btnAjoutMembre" value="Créer le membre" >
    </form>';
}
else {
/* L'utilisateur a cliqué sur Envoyer, l'entrée btnAjoutMembre <> vide, on traite le formulaire */
    $stmt = $connexion->prepare("INSERT INTO utilisateur (mel, motdepasse, nom, prenom, adresse, ville, codepostal, profil) VALUES (:mel, :motdepasse, :nom, :prenom, :adresse, :ville, :codepostal, :profil)");
    $mel = $_POST["txtMel"];
    $mdp = $_POST["txtMdp"];
    $nom = $_POST["txtNom"];
    $prenom = $_POST["txtPrenom"];
    $adresse = $_POST["txtAdresse"];
    $ville = $_POST["txtVille"];
    $codepostal = $_POST["txtCode"];
    $profil = 'admin';

 
    $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
    $stmt->bindValue(':motdepasse', $mdp, PDO::PARAM_STR);
    $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindValue(':adresse', $adresse, PDO::PARAM_STR);
    $stmt->bindValue(':ville', $ville, PDO::PARAM_STR);
    $stmt->bindValue(':codepostal', $codepostal, PDO::PARAM_INT);
    $stmt->bindValue(':profil', $profil, PDO::PARAM_STR);
    $stmt->execute();
}
?>