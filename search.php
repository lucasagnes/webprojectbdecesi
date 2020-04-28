<?php
  require "api/db.class.php";
  require "panier.class.php";
  $bdd = new bdd();
  $panier = new panier($bdd);
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



    <script src="js/cookiechoices.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function(event) {
        cookieChoices.showCookieConsentBar('En utilisant ce site, vous acceptez notre politique concernant les cookies.',
          'OK', 'En savoir plus.', 'mentions2.html');
      });
    </script>

    <form class="navbar-form navbar-left" action="search.php" method="GET">
            <div class="input-group">
            <input type="search" name="q" class="form-control" placeholder="Rechercher un produit..." >
            <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>

    <table class="table table-borderless" id="table">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Taille</th>
                 </tr>
                </thead>
<?php 


$a = $bdd->bdd->query('SELECT * FROM produit ORDER BY id DESC');

if(isset($_GET['q']) AND !empty($_GET['q'])){
    $q = htmlspecialchars($_GET['q']);
    $a = $bdd->bdd->query('SELECT * FROM produit WHERE nom LIKE "'.$q.'%" ORDER BY id DESC');
}
?>
    <?php if($a->rowCount() > 0){ ?>
        <?php while($articles = $a->fetch()) { ?>
            <tr>
                <td><a href="index.php"></a><?php echo $articles['nom'];?></a></td>
                <td><?php echo $articles['prix'];?></td>
                <td><?php echo $articles['description'];?></td>
                <td><?php echo $articles['taille'];?></td>
                <td><a class="add2" href="addpanier.php?id=<?= $articles['id']; ?>"><i class="add fa fa-cart-arrow-down fa-2x"></i></a></td> 
            </tr>
    <?php } ?>
    </ul>
        <?php } else { ?> 
            Aucun résultat pour : <?= $q ?>...
        <?php } ?>


