<?php

session_start();

if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
  header('Location: ../login.php');
  exit;
}
elseif ($_SESSION['user_rang'] === "Arbitre") {
  header('Location: index.php');
  exit;
}
elseif ($_SESSION['user_rang'] === "Streamer") {
  header('Location: index.php');
  exit;
}

require '../connect.php';

$users = $pdo->query("SELECT * FROM posts ORDER BY id");
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
  <link href="../css/style2.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>
<body>
  <div class="header">
    <a href="#" id="menu-action">
      <i class="fa fa-bars"></i>
      <span>Fermer</span>
    </a>
    <div class="logo">
      Administration Ynov LoL Cup
    </div>
  </div>
  <div class="sidebar">
    <?php include 'inc/sidebar.php'; ?>
  </div>

  <!-- Content -->
  <div class="main">
    <div class="hipsum">
      <div class="jumbotron">
        <h1 id="hello,-world!">Les articles</h1>
        <p>Via le tableau ci-dessous vous avez en un coup d'oeil tous les articles postés sur le site du plus récent article au plus vieux.</p>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <button type="button" class="btn btn-info" name="button"><a href="ajouterarticle.php">Ajouter un article</a></button>
            <button type="button" class="btn btn-warning" name="button"><a href="ajoutercategorie.php">Ajouter une catégorie</a></button>
            <br /><br />
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $data):?>
                    <tr>
                      <th scope="row">
                        <?php echo $data['titre']; ?>
                      </th>
                      <td><?php echo $data['auteur']; ?></td>
                      <td><?php echo $data['date_post']; ?></td>
                      <td><?php echo "<a href='editerarticle.php?id={$data["id"]}'>Editer</a>"; ?> / <a href="">Supprimer</a></td>
                    <?php endforeach ?>
                  </tr>
                </tbody>
              </table>
            </div><!--end of .table-responsive-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="js/app.js"></script>
</body>
</html>
