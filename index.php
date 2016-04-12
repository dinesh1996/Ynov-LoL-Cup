<?php
require 'connect.php';

$posts = $pdo->query("SELECT id, titre, contenu, date_post FROM posts ORDER BY id");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Description du site internet">
        <title>YNOV LOL CUP</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="css/style.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <!-- DEBUT DE LA NAVBAR -->
        <span id="TopSite"></span>
        <?php include('includes/nav.php'); ?>

        <!-- FIN DE LA NAVBAR -->

        <!-- DEBUT DU SLIDER / IMAGE A LA UNE -->
        <div class="logo">
            <img src="img/logo-top.png" class="img-responsive">
            <p>Du 30 novembre 2015 au 12 mars 2016</p>
        </div>
        <div id="slider" class="container">
            <div class="row">
                <div class="col-sm-6">
                    <a href="article-1.html">
                        <img src="img/modele1.png" class="img-responsive" >
                        <h2>Titre 1</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="article-2.html"><img src="img/modele2.png" class="img-responsive">
                        <h3>Titre 2</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="article-3.html"><img src="img/modele3.png" class="img-responsive">
                        <h3>Titre 3</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="article-2.html"><img src="img/modele4.png" class="img-responsive">
                        <h3>Titre 3</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="article-3.html"><img src="img/modele5.png" class="img-responsive">
                        <h3>Titre 2</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </a>
                </div>
            </div>
        </div>
        <div id="sponsors" class="col-lg-12 text-center">
            <div class="row">
                <ul>
                    <li><a href="#" target="_blank"><img src="img/coca.png"></a></li>
                    <li><a href="#" target="_blank"><img src="img/fk.png"></a></li>
                    <li><a href="#" target="_blank"><img src="img/rog.png"></a></li>
                </ul>
            </div>
        </div>
        </div>
    <div class="container">
        <div id="corps" class="row">
            <div class="col-md-8 article">
                <!-- ARTICLE -->
                <?php foreach ($posts as $data): ?>
                <div id="blog-1" class="col-md-5">
                    <img src="img/modele1.png" class="img-responsive">
                    <p class="titreblog"><a href="article-1.html"><?php echo $data['titre']; ?></a></p>
                    <p class="contenublog"><?php echo $data['contenu']; ?></p>
                    <p class="text-center"><a href="article-1.html">LIRE PLUS</a></p>
                    <div class="bordure"></div>
                    <p class="col-md-8 piedblog"><?php echo $data['date_post']; ?></p>
                <?php endforeach; ?>
                </div>
                <!-- FIN ARTICLE -->
            </div>
            <div id="colonnedroite" class="col-md-4">
                <div>
                    <p class="titrevideodroite">Dernières vidéos</p>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/PT6G34h0Rqg"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>


    <!-- FIN PARTIE SPONSOR -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
