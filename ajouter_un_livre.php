<?php
session_start();
require_once('connexion_bibliodrive.php');

$rqa = $connexion->prepare("SELECT noauteur, nom, prenom FROM auteur");
$rqa->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$rqa->execute();
while($enregistrement = $rqa->fetch()) 
{
$nomA = $enregistrement->nom;
$prenomA = $enregistrement->prenom;
$numeroA = $enregistrement->noauteur;


}

if ($_SESSION["connecte"] == true) {
    if(!isset($_POST['btnAjoutLivre'])) 
    {/* L'entrée btnEnvoyer est vide = le formulaire n'a pas été posté, on affiche le formulaire */
        echo '
        <form action="" method="post">
        Auteur : <select name="txtAuteur"> <option value='.$numeroA.'>'.$prenomA.' '.$nomA.'</option></select><br><br>
        Titre : <input type="text" name="txtTitre"><br><br>
        ISBN13 : <input type="text" name="txtIsbn"><br><br>
        Année de Parution : <input type="text" name="txtParution"><br><br>
        Résumé : <input type="text" name="txtResume"><br><br>
        Image : <input type="text" name="txtImage"><br><br>
        <input class="btn btn-primary" type="submit" name="btnAjoutLivre" value="Ajouter le livre" >
        </form>';
    }
    else {
    /* L'utilisateur a cliqué sur Envoyer, l'entrée btnEnvoyer <> vide, on traite le formulaire */
        $stmt = $connexion->prepare("INSERT INTO livre (noauteur, titre, isbn13, anneeparution, dateajout, detail, photo) VALUES (:noauteur, :titre, :isbn13, :anneeparution, :dateajout, :detail, :photo )");
        $noauteur = $_POST["txtAuteur"];
        $titre = $_POST["txtTitre"];
        $isbn13 = $_POST["txtIsbn"];
        $anneeparution = $_POST["txtParution"];
        $dateajout = date("Y-m-d");
        $detail = $_POST["txtResume"];
        $photo = $_POST["txtImage"];

 
        $stmt->bindValue(':noauteur', $noauteur, PDO::PARAM_INT);
        $stmt->bindValue(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindValue(':nomregion', $isbn13, PDO::PARAM_STR);
        $stmt->bindValue(':anneeparution', $anneeparution, PDO::PARAM_INT);
        $stmt->bindValue(':dateajout', $dateajout, PDO::PARAM_STR);
        $stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
        $stmt->bindValue(':photo', $photo, PDO::PARAM_STR);

        $stmt->execute();
    }
} else {
    echo 'Vous ne pouvez pas accéder à cette page.';
}
?>