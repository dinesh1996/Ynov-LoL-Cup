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
    <div class="logo">
        <img src="img/logo-top.png" class="img-responsive">
        <p>Du 30 novembre 2015 au 12 mars 2016</p>
    </div>
    <div id="slider" class="container">
        <div class="row">
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 post">
            <h2>L'Ynov LoL Cup, qu'est ce que c'est?</h2>
            <p> C'est une compétition nationale ouverte à tous les étudiants de première, terminale et écoles Ynov. La compétition se déroule sur le jeux-vidéo en ligne League of Legends.</p><br/>
        </div>
    </div>
</div>
<div id="sponsors" class="col-lg-12 text-center">
    <div class="row">
        <ul>
            <li><a href="#" target="_blank"><img src="img/partener.png"></a></li>
            <li><a href="#" target="_blank"><img src="img/coca.png"></a></li>
            <li><a href="#" target="_blank"><img src="img/fk.png"></a></li>
            <li><a href="#" target="_blank"><img src="img/rog.png"></a></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 post">
            <h2>Quel est le but ?</h2>
            <p> Toutes les équipes s'affrontent en ligne sur le site du jeu LoL.
                Les équipes lycéennes sont composées de 5 joueurs et 2 remplaçants maximum dont au moins 3 joueurs sont en classe de terminale.
                Le tournoi online est organisé par région, les équipes concourent selon leur zone géographique (Aix-en-Provence, Bordeaux, Lyon, Nantes, Paris et Toulouse)
                pour se qualifier à la finale de leur localité. Les matchs confrontent une équipe à une autre.
                Celle remportant la partie continue le tournoi jusqu'à arriver en demi-finale (4 équipes restantes). Les équipes Ynov sont composées de 5 joueurs et 2 remplaçants maximum, tous sont étudiants Ynov.
                Le tournoi est uniquement online. Les matchs confrontent une équipe à une autre. Celle remportant la partie continue le tournoi jusqu'à arriver en finale (2 équipes restantes).</p>
                <p> Les 4 équipes locales ayant remporté le tournoi online se retrouvent dans le campus Ynov de leur région (Aix-en-Provence, Bordeaux, Lyon, Nantes, Paris et Toulouse) afin de s'affronter.<br />
                    L'équipe gagnante est qualifiée pour la finale nationale à Paris.<br /></p>
                </div>
                <div class="col-md-8 col-md-offset-2 post">
                    <h2>La compétition</h2>
                    <p>L'équipe gagnante de chaque ville et les 2 équipes finalistes Ynov, soient 8 équipes au total, se retrouvent dans les locaux d'Ynov Paris lors de la finale nationale. La finale sera commentée par le joueur Domingo et sera filmée pour la diffusion en direct.</p><br />
                </div>

            </div>
            <div class="row videos">
                <p class="titrevideodroite">Nous avons sélectionné pour vous :</p>
                <div class="col-md-4">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/77hV6CpBlzc"></iframe>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Zs3jeN_zQrk"></iframe>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Q1IuxS3Icoc"></iframe>
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
