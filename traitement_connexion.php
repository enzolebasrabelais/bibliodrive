<?php
session_start();

require_once('connexion_bibliodrive.php');

//$stmt = $connexion->prepare("SELECT mel, motdepasse, nom, prenom FROM utilisateur where utilisateur.mel=:mel AND utilisateur.motdepasse=:motdepasse");

// $stmt->bindValue(":mel", $_POST["identifiant"]);
//$stmt->bindValue(":motdepasse",$_POST["motPasse"]); // pas de troisième paramètre STR par défaut
//$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
//$stmt->execute();
//$enregistrement = $stmt->fetch();


// si user mdp OK
//$_SESSION["identifiant"] = $_POST["identifiant"];
//$_SESSION["motdepasse"] = $_POST["motPasse"];

//echo $enregistrement->prenom." ".$enregistrement->nom;
//echo "<BR>";
//echo $enregistrement->mel;
if (!isset($_SESSION["identifiant"])) {
    if (!isset($_POST['btnco'])) { 
    
        echo '
        <form method="post" class="form-control" >
        Se connecter
        <BR>
        <div class="mb-3 mt-3">
        Identifiant
        <BR>
        <input type="text" placeholder="" name="identifiant">
        <BR>
        Mot de passe
        <BR>
        <input type="text" placeholder="" name="motPasse">
        <BR>
        <BR>
        <button class="btn btn-primary" name="btnco type="submit">Connexion</button>
        </div>
        </form>';
    } else {

//000000000000000000000000000000000000000000000000000000

        $identifiant = $_POST['identifiant'];
        $motdepasse = $_POST['motPasse'];

        $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE utilisateur.mel=:mel AND utilisateur.motdepasse=:motdepasse");
        $stmt->bindValue(":mel", $identifiant); 
        $stmt->bindValue(":motdepasse", $motdepasse); 
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $enregistrement = $stmt->fetch(); 

        if ($enregistrement) { 
            $_SESSION["identifiant"] = $identifiant;
            $_SESSION["prenom"] = $enregistrement->prenom;
            $_SESSION["nom"] = $enregistrement->nom;
            $_SESSION["adresse"] = $enregistrement->adresse;
            $_SESSION["codepostal"] = $enregistrement->codepostal;
            $_SESSION["ville"] = $enregistrement->ville;
            $_SESSION["profil"] = $enregistrement->profil;

            if ($_SESSION["profil"] === "admin") {
                header("Location: accueil_admin.php"); // Redirection vers la page admin
            } else {
                header("Location: accueil.php"); // Redirection vers la page client
            }
            exit();
        } else { 
            echo "Echec de la connexion.";
            header("Refresh:2");
            exit();
        }
    }
} else {
    ?> 
    <h3 class="text-center"><?php echo $_SESSION["prenom"] . ' ' . $_SESSION["nom"]; ?></h3>
    <h3 class="text-center"><?php echo $_SESSION["mel"]; ?></h3>
    <br>
    <h3 class="text-center"><?php echo $_SESSION["adresse"]; ?></h3>
    <h3 class="text-center"><?php echo $_SESSION["codepostal"] . ', ' . $_SESSION["ville"]; ?></h3>

    <?php if ($_SESSION["profil"] === "client"): ?>
    <br><h4 class="text-center">Bienvenue client </h4>
    <?php endif; ?>

    <?php if ($_SESSION["profil"] === "admin"): ?>
    <br><h4 class="text-center">Bienvenue administrateur </h4>
    <?php endif; ?>

    <?php if (!isset($_POST['deco'])) { ?>
    <form method="post">
    <div class="input-group-btn text-center">
    <button class="btn btn-danger" name="deco" type="submit">Déconnexion</button>
    </div>
    </form>
    <?php } else {
        session_unset();         
        session_destroy();
        header("Location: accueil.php");
        exit();
        }
    }


?>