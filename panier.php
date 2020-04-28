<?php
  require "api/db.class.php";
  require "panier.class.php";
  $bdd = new bdd();
  $panier = new panier($bdd);
  ?>
  <?php 
  if(isset($_GET['del'])){
    $panier->del($_GET['del']);
  }
  ?>
<!DOCTYPE html> 
<html>
    <head>
        <title> BDE CESI </title>
        <meta charset="UTF-8">
        <meta name="description" content="Le site du BDE de l'école d'ingénieur CESI.">
        <link rel="icon" href="img/logo.png"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="js/main.js"></script>
    </head>

    <body>
    <header>

      <div class="container">
        <div class="row">

        <!-- Bars icon -->
        <i class="icon fa fa-bars fa-2x"></i>
        
          <!-- Logo -->
          <div class="col-md-2 col-xs-12">
            <div class="logo">
            <a href="index.php"><img src="img/logo_bde" alt="Logo" id="Logo"></a>
            </div>
          </div>
        <!-- Nav -->
        <nav class="col-md-9 col-xs-12">
            <ul class="nav-list">
            <?php if(!empty($_SESSION['user'])): ?>
              <li class="list"><a href="profile.php"><?php echo ' Bienvenue ' . $_SESSION['user']['prenom'] . ' !' ?></a></li>
            <?php else : ?> 
            <?php endif; ?>
              <li class="list"><a href="boutique.php">BOUTIQUE</a></li>
              <li class="list"><a href="event.php">EVENEMENT</a></li>
              <?php if(!empty($_SESSION['user'])): ?>
              <?php else : ?> 
              <li class="list"><a href="register.php">S'INSCRIRE</a></li>
              <li class="list"><a href="login.php">SE CONNECTER</a></li>
              <?php endif; ?>
              <?php if(!empty($_SESSION['user'])): ?>
              <li class="list"><a href=deconnexion.php>SE DECONNECTER</a></li>
              <?php else : ?> 
              <?php endif; ?>
              <?php if(!empty($_SESSION['user'])): ?>
              <?php if($_SESSION['user']['id_role'] >1): ?>
              <li class="list"><a href=admin.php>ADMINISTRATION</a></li>
              <?php endif; ?>
              <?php endif; ?>
              <li class="list"><a href="panier.php"><i class="ishop fa fa-shopping-cart fa-2x"></i></a></li>

              
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!-- /Header-->

    <table class="table table-borderless" id="table">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Taille</th>
                    <th>Total</th>
                 </tr>
                </thead>


    <?php
    $ids = array_keys($_SESSION['panier']);
    if(empty($ids)){
      $article = array();
    }else{
      $reponse = $bdd->bdd->prepare('SELECT * FROM produit WHERE id IN ('.implode(',',$ids).')');
      $reponse->execute();
    }
?>


 
            <?php
                //On affiche les lignes du tableau une à une à l'aide d'une boucle
                while($article = $reponse->fetch())
                {
                  
            ?>
 
            <tr>
                <td><?php echo $article['nom'];?></td>
                <td><?php echo $article['prix'];?></td>
                <td><?php echo $article['description'];?></td>
                <td><?php echo $article['taille'];?></td>
                <td><?php echo $panier->total();?></td>
                <td> <a href="panier.php?del=<?= $article['id']; ?>"><i class="delete fa fa-trash fa-2x"></i></a></td>
            </tr>
            
            <?php
            } //fin de la boucle, le tableau contient toute la BDD
            
            ?>

    