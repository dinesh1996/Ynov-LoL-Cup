<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require 'connect.php';
$users = $pdo->query("SELECT * FROM posts ORDER BY id DESC");
?>
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
    <div id="sponsors" class="col-lg-12 text-center">
        <div class="row">
            <ul>
                <li><a href="#" target="_blank"><img src="img/coca.png"></a></li>
                <li><a href="#" target="_blank"><img src="img/fk.png"></a></li>
                <li><a href="#" target="_blank"><img src="img/rog.png"></a></li>
            </ul>
        </div>
    </div>
    <div class="posts-box posts-box-6" >
        <div>
            <h2 class="title">Les articles publiés</h2>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 post">
                <?php foreach ($users as $data):?>
                    <div>
                        <h2>
                            <?php echo   "<a href='newsvu.php?id={$data["id"]}' > {$data["titre"]} </a>" ?>
                        </h2>
                    </div>
                    <div>
                        <ul>
                            <li> <span class="fa fa-clock-o"></span>Articlé publié le <?php echo $data['date_post']; ?></li>
                        </ul>
                    </div>
                    <div>
                        <p>
                            <?php $extrait=substr($data['contenu'],0,400);
                            echo  " '$extrait' <a href='newsvu.php?id={$data["id"]}' ";?>  >...Lire la suite</a>
                        </p>
                    </div>
                    <div>
                        <ul>
                            <li>Article posté par <?php echo $data['auteur']; ?> dans la catégorie <?php echo $data['categorie']; ?></li>
                        </ul>
                    </div>
            <?php endforeach ?></div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
