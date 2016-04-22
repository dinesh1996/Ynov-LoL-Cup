<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Description du site internet">
        <title>YNOV LOL CUP</title>
        <link href="css/bootstrap.css" rel="stylesheet">
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

        <div class="container">
            <div class="row centered mt mb">
                <form action="send_form.php" method="post">
                    <div class="col-lg-6 col-lg-offset-3">
                        <h1 text-center>Contact</h1><br />
                        <?php if(array_key_exists('errors',$_SESSION)): ?>
                        <div class="alert alert-danger">
                            <?= implode('<br>', $_SESSION['errors']); ?>
                        </div>
                        <?php endif; ?>
                        <?php if(array_key_exists('success',$_SESSION)): ?>
                        <div class="alert alert-success">
                            Votre email à bien été transmis !
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="nom">Votre nom</label>
                            <div class="input-group">
                                <input required type="text" name="name" class="form-control" id="inputname" value="<?php echo isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-ok form-control-feedback"></span></span></div>
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Votre Email</label>
                            <div class="input-group">
                                <input required type="email" name="email" class="form-control" id="inputemail" value="<?php echo isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-ok form-control-feedback"></span></span></div>
                        </div>
                        <div class="form-group">
                            <label for="message">Votre message</label>
                            <div class="input-group">
                                <textarea required id="inputmessage" rows="8" name="message" class="form-control"><?php echo isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?></textarea>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-ok form-control-feedback"></span></span></div>
                        </div>
                        <button type="submit" class="btn btn-custom btn-lg btn-block">Envoyer</button>
                    </div>
                </form>
                <hr class="featurette-divider hidden-lg">
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
<?php
unset($_SESSION['inputs']); // on nettoie les données précédentes
unset($_SESSION['success']);
unset($_SESSION['errors']);