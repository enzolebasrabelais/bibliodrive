<div class="row">
<div class="col-sm-9">
<?php
include ('entete.html')
?>
</div>
<div class="col-sm-3">
<img src=".\images\biblio.jpg">
</div>
</div>

<div class="row">
<div class="col-sm-9">
<?php
require_once('connexion_bibliodrive.php');
$stmt = $connexion->prepare("SELECT nolivre, titre, anneeparution FROM livre INNER JOIN auteur ON (livre.noauteur = auteur.noauteur) where auteur.nom=:nom ORDER BY anneeparution");
$nom = $_POST["rchAuteur"];
$stmt->bindValue(":nom", $nom); // pas de troisième paramètre STR par défaut
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
while($enregistrement = $stmt->fetch())
{
echo '<h1>',"<a href='structure_detail.php?nolivre=".$enregistrement->nolivre."'>".$enregistrement->titre, ' ', ' ', '(', $enregistrement->anneeparution, ')', "</a>",'</h1>';
}
?>
</div>
<div class="col-sm-3">
<?php
include ('se_connecter.php')
?>
</div>
</div>