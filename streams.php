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
    <div id="stream" class="container">
        <div class="col-md-10 col-md-offset-1">
            <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://player.twitch.tv/?video=v53970170" frameborder="0" scrolling="no" height="378" width="620"></iframe>
                </div>
                <div class="post">
                    <p>La Grande Finale Nationale ayant eu lieu le samedi 12 mars 2016 nous vous proposons de regarder cette journée de compétition en Vidéo à la demande directement depuis notre site!</p>
                    <ul>
                        <li>Lien d'origine de la vidéo : <a href="https://www.twitch.tv/domingo/v/53970170" target="_blank">DOMINGO</a></li>
                    </ul>
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
        <div id="footer" class="col-lg-12 text-center">
            <div class="row">
                <div id="logofooter" class="col-lg-12 text-center">
                    <img src="img/logo-top.png">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 text-center">
                    <ul>
                        <li><a href="http://www.twitch.tv/ogaminglol" target="_blank"><span class="fa fa-twitch"></span></a></li>
                        <li><a href="https://www.facebook.com/ynovlolcup/?fref=ts" target="_blank"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="https://twitter.com/ynovlolcup" target="_blank"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="https://www.youtube.com/user/ElDom1nG0" target="_blank"><span class="fa fa-youtube"></span></a></li>
                    </ul>
                </div>
                <div class="col-md-6 text-center">
                    <p>© 2015 - Association Ynov LoL Cup PARIS- Tout droits réservés</p>
                </div>
                <div class="col-md-3 text-center">
                    <p id="revenirhaut"><a href="#TopSite">Revenir en haut de la page&nbsp;&nbsp;<span class="fa fa-arrow-up"></span></a></p>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
    </html>
