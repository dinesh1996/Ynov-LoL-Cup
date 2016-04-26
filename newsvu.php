<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require 'connect.php';
$getid=$_GET['id'];

$sqlv = "SELECT * FROM posts WHERE id LIKE ? ";
$req = $pdo->prepare($sqlv);
$req->execute(array($getid));
$data = $req->fetch(PDO::FETCH_ASSOC);
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
    <div class="post">
        <div>
            <h2><?php echo $data['titre']; ?></h2>
        </div>
        <ul class="col-md-8 col-md-offset-2">
            <li> <span class="fa fa-clock-o"></span> Article publié le <?php echo $data['date_post']; ?>. Article posté par <?php echo $data['auteur']; ?> dans la catégorie <?php echo $data['categorie']; ?></li>
        </ul>
        <div class="col-md-8 col-md-offset-2">
            <p class="post-excerpt">
                <?php echo $data['contenu'];?>
            </p>
            <a class="btn btn-warning button" href="news.php">Revenir à la liste d'article</a> 
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
