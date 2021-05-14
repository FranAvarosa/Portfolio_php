<?php
require_once "config/configuration.php";
require_once "config/connect.php";
?>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Mes réalisation</title>
  </head>
</html>
<body>
<!--HEADER-->
    <header>
        <div id="site-header"></div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="mx-5 nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="mx-5 nav-link" href="portfolio.php">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="mx-5 nav-link" href="competences.php">Compétences</a>
                    </li>
                    <?php
                    if(!isset($_SESSION['user'])){
                    echo '
                    <li class="nav-item">
                        <a class="mx-5 nav-link" href="login.php">Connexion<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="mx-5 nav-link" href="register.php">S\'enregistrer<span class="sr-only"></span></a>
                    </li>';
                    }
                    else{
                        echo '
                    <li class="nav-item">
                        <a class="mx-5 nav-link" href="deconnexion.php">Déconnexion<span class="sr-only"></span></a>
                    </li>';
                    }   
                    ?>
                    <li class="nav-item">
                        <a class="mx-5 nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="mx-5 nav-link " href="about.php">À propos</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section id="precision-projet" class="row">
        <div class="col-md-4 exemple-projet">
            <img class="projet-image" src="images/exemple-portfolio.jpg" alt="Exemple de projet pour le Portfolio">
        </div>
        <div class="col-md-4 exemple-projet">
            <h2 class="titre-projet">Nom du projet</h2>
            <p class="projet-text"></p>
        </div>        
    
    
    </section>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
