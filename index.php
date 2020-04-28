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
              <?php if(!empty($_SESSION['user'])): ?>
              <li class="list"><a href=deconnexion.php>SE DECONNECTER</a></li>
              <?php else : ?> 
              <?php endif; ?>
              <?php if(!empty($_SESSION['user'])): ?>
              <?php if($_SESSION['user']['id_role'] >1): ?>
              <li class="list"><a href=admin.php>ADMINISTRATION</a></li>
              <?php endif; ?>
              <?php endif; ?>

              
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

    <div class="container">  
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
          
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <a href="event.php">
                  <img src="img/event.jpg" alt="Evenement" style="width:100%;">
                </a>
                  <div class="carousel-caption">
                      <h3>EVENEMENT</h3>
                  </div>
                </div>
          
                <div class="item">
                <a href="boutique.php">
                  <img src="img/boutique.jpg" alt="BOUTIQUE" style="width:100%;">
                </a>
                  <div class="carousel-caption">
                      <h3>BOUTIQUE</h3>
                  </div>
                </div>
                
                <div class="item">
                  <img src="img/news.jpg" alt="NEWS" style="width:100%;">
                  <div class="carousel-caption">
                      <h3>ACTUALITÉ</h3>
                  </div>
                </div>
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div id="txt">
          </div>
        
        </body>

</html> 