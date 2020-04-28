
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<link rel="icon" href="img/logo.png"> 
<meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="images/favicon.ico">

<title>Management</title>

<!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="js/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css" />

<!-- Custom styles for this template -->
<link rel="stylesheet" href="css/max.css">
<link href="css/starter-temp.css" rel="stylesheet">

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

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" >
        <a class="navbar-brand" href="#">Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="boutique.php">Retourner aux articles
                        <span class="sr-only">(current)</span>
                </a></li>
            </ul>
        </div>
    </nav>

    <main role="main" class="container">
        <h1>Liste des articles :</h1>


        <div class="row">
            <div class="col-md-12" style="margin-bottom: 10px;">
            <button type="button" class="btn btn-primary"> Ajouter un article</button>
            </div>
        </div>

        <table id="post_datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Description</th>
                    <th scope="col">Taille</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
        </main> <!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-2.2.0.min.js"></script>
    <script src="js/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="js/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var dataTable = $('#post_datable').DataTable({
                "processing" : true,
                //"serverSide" : true,
                //"ajax" : {
                "order" : [],
                "columnDefs" : [ {
                    "targets" : [ 0, 3, 4 ],
                    "orderable" : false,
                }]
            });
        });
        </script>
</body>
</html>