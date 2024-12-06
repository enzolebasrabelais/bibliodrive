<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
    require_once('connexion_bibliodrive.php');
    $livres = $connexion->prepare("SELECT * FROM livre ORDER BY dateajout");
    $livres->setFetchMode(PDO::FETCH_OBJ);
    $livres->execute();

    $couverture1 = $livres->fetch();
    $couverture2 = $livres->fetch();
    $couverture3 = $livres->fetch();


    ?>
    <!-- Carrousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>
  
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src=".\images\<?php echo $couverture1->photo ?>" alt="<?php echo $couverture1->titre ?>" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src=".\images\<?php echo $couverture2->photo ?>" alt="<?php echo $couverture2->titre ?>" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src=".\images\<?php echo $couverture3->photo ?>" alt="<?php echo $couverture3->titre ?>" class="d-block w-100">
      </div>
    </div>
    
  
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</body>
</html>