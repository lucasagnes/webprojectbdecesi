<?php


$bdd= new PDO("mysql:host=localhost;dbname=projetweb;charset=utf8", "root", "");

if(isset($_POST['confirm_login'])){
    if(isset($_POST['email']) AND isset($_POST['password'])){
        if(!empty($_POST['email']) AND !empty($_POST['password']))
        {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $req = $bdd->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $req->execute(array($email, sha1($password)));

            if($req->rowCount() == 1){
                
                $user = $req->fetch();
                session_start();    
                $_SESSION['user'] = $user;
                header('location: index.php');
                
                

                

            }   else {
                $error = "Nom d'utilisateur ou mdp incorrect !";
            }
        }
    }   else {
        $error = "Erreur";
    }
}

?>

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <title>Se connecter</title>
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
        <nav class="col-md-9 col-xs-12" id="navbar">
            <ul class="nav-list">
              <li class="list"><a href="index.php">ACCUEIL</a></li>
              <li class="list"><a href="boutique.php">BOUTIQUE</a></li>
              <li class="list"><a href="event.php">EVENEMENT</a></li>
              <li class="list"><a href="register.php">S'INSCRIRE</a></li>
              <li class="list"><a href="login.php">SE CONNECTER</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!-- /Header-->


        
        <h1>Connexion</h1>

        <form method="POST" action="">

            <table>

                <tr>
                    <td>
                        <label> Votre Email :</label>
                    </td>
                    <td>
                        <input type="email" name="email">
                    </td>
                </tr>
                
                <tr>
                        <td>
                            <label> Votre Mot de Passe :</label>
                        </td>
                        <td>
                            <input type="password" name="password">
                        </td>
                </tr>


                <tr><td></td></tr>

                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="confirm_login">Se connecter</button>
                    </td>
                </tr>

            </table>

            
        </form>

        <?php if (isset($error)) {echo $error;} ?>


        <nav>
            <a href="register.php"> Pas encore de compte ? Inscrivez-vous ! </a>
        </nav>

        <footer></footer>
    </body>