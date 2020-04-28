<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <title>S'inscrire</title>
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


    <?php
$bdd= new PDO("mysql:host=localhost;dbname=projetweb;charset=utf8", "root", "");

if(isset($_POST['confirm_register'])){
    if(isset($_POST['email']) AND isset($_POST['username']) AND isset($_POST['prenom']) AND isset($_POST['password']) AND isset($_POST['password_confirm'])){
        if(!empty($_POST['email']) AND !empty($_POST['username']) AND !empty($_POST['prenom']) AND !empty($_POST['password']) AND !empty($_POST['password_confirm'])){
             
            $email = trim(htmlspecialchars($_POST['email']));
            $username = trim(htmlspecialchars($_POST['username']));
            $prenom = trim(htmlspecialchars($_POST['prenom']));
            $password = trim(htmlspecialchars($_POST['password']));
            $password_confirm = trim(htmlspecialchars($_POST['password_confirm']));

            if(strlen($email) <=255) {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if(strlen($username) <= 255) {
                        if($password == $password_confirm) {
                            
                            $password_crypted = sha1($password);

                            $req = $bdd->prepare("INSERT INTO users (nom, prenom, email, password) VALUES (?, ?, ?, ?)");
                            $req->execute(array($username, $prenom, $email, $password_crypted));

                            $error = "Votre compte à été crée !";





                        }   else {
                            $error = "Vos mdp ne correspondent pas ! ";
                        }
                        
                    }   else {
                        $error = "Votre Nom doit faire moins de 255 caractères ! ";
                    }


                }   else {
                    $error = "Votre email a un format inccorect ! ";
                }

            }   else{
                $error = "Votre email doit faire moins de 255 caractères ! ";
            }
            
        }   else {
            $error = "veuillez remplir tout les champs";
        }
    }
}


?>

        <h1>S'inscrire</h1>

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
                            <label> Votre Nom :</label>
                        </td>
                        <td>
                            <input type="text" name="username">
                        </td>
                </tr>

                <tr>
                        <td>
                            <label> Votre Prénom :</label>
                        </td>
                        <td>
                            <input type="text" name="prenom">
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

                <tr>
                        <td>
                            <label> Confirmez votre mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" name="password_confirm">
                        </td>
                </tr>
                <tr>
                        <td>
                            <label>En vous inscrivant vous acceptez les<a href =mentions2.html> conditions d'utilisation</a> et les <a href =conditionsdevente.html>conditions générales de ventes</a> de notre site !</label>
                        </td>
                        <td>
                            <input type="checkbox" name="check">
                        </td>
                </tr>

                <tr><td></td></tr>

                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="confirm_register">S'inscrire</button>
                    </td>
                </tr>

            </table>

            
        </form>

        <?php if (isset($error)) {echo $error;} ?>


        <nav>
            <a href="login.php"> Déja un compte ? Connectez-vous ! </a>
        </nav>

        <footer></footer>
    </body>
