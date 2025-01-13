
<?php
include ('entete.html');
session_start();
foreach ($_SESSION['panier'] as $key=>$value) {
    //echo $key;
    echo $value;
  echo " ";
  echo "<a class='btn btn-primary' href='suppr_livre.php?nolivre=".$key."'>","Annuler", "</a>";
  echo "<BR>";
  echo "<BR>";
}

echo "<a class='btn btn-primary' href='validation_panier.php'>","Valider mon panier", "</a>";
?>