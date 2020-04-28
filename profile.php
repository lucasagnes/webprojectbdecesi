<?php


$bdd= new PDO("mysql:host=localhost;dbname=projetweb;charset=utf8", "root", "");
session_start();
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
              <li class="list"><a href=deconnexion.php>SE DECONNECTER</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!-- /Header-->


  <?php echo "Bienvenue " . $_SESSION['user']['prenom'] . " " . $_SESSION['user']['nom'] ?>