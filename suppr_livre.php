<?php

session_start();

unset($_SESSION['panier'][$_GET['nolivre']]);
header("Location: affichage_panier.php");