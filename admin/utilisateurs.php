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

require '../lib/password.php';

require '../connect.php';

$users = $pdo->query('SELECT * FROM users ORDER BY id');
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
        <h1 id="hello,-world!">Les utilisateurs</h1>
        <p>Via le tableau ci-dessous vous avez en un coup d'oeil tous les utilisateurs inscrit sur le site, peu importe leur rang.</p>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <button type="button" class="btn btn-info" name="button"><a href="ajouterutilisateur.php">Ajouter un utilisateur</a></button><br /><br />
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Pseudo</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Rang</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $data):?>
                    <tr>
                      <th scope="row">
                        <?php echo $data['username']; ?>
                      </th>
                      <td><?php echo $data['nom']; ?></td>
                      <td><?php echo $data['prenom']; ?></td>
                      <td><?php echo $data['email']; ?></td>
                      <td><?php echo $data['rang']; ?></td>
                      <td><?php echo "<a href='supprimerutilisateur.php?id={$data["id"]}'>Supprimer</a>"; ?></td>
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
