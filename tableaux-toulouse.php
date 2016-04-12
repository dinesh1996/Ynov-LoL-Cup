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

        <div id="qualif" class="container">
            <h1>Tableaux des qualifications - Lycéens Toulouse</h1><br />

            <div id="challonge" class="col-lg-10 col-lg-offset-1">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="http://challonge.com/fr/ylcaf/module" width="100%" height="500" frameborder="0" scrolling="auto" allowtransparency="true"></iframe>
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
        <?php include('includes/footer.php'); ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
