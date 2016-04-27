<?php

session_start();

if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
  header('Location: ../login.php');
  exit;
}

require '../lib/password.php';

require '../connect.php';

$users = $pdo->query("SELECT * FROM users WHERE id={$_SESSION['user_id']}");

if(isset($_POST['majcompte'])){

  $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
  $passconfirm = !empty($_POST['passwordconfirm']) ? trim($_POST['passwordconfirm']) : null;

if($pass === $passconfirm){
  //Hash the password as we do NOT want to store our passwords in plain text.
  $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

  $sql = "UPDATE users SET password = :password WHERE id={$_SESSION['user_id']}";
  $stmt = $pdo->prepare($sql);

  $stmt->bindValue(':password', $passwordHash);

  $result = $stmt->execute();

  if($result){
    //What you do here is up to you!
    echo "Le compte a bien été mis à jour";
    exit;
  }
}
  echo "Les 2 mots de passe ne correspondent pas.";
}
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
        <h1 id="hello,-world!">Informations concernant mon compte</h1>
      </div>
      <?php foreach ($users as $user): ?>
      <div class="form-wrapper">
        <form action="moncompte.php" method="post" role="form">
          <div class="form-item">
            <label for="username"></label>
            <input type="text" id="username" name="username" required="required" disabled value="<?php echo $user['username']; ?>"></input>
          </div>
          <div class="form-item">
            <label for="nom"></label>
            <input type="text" id="nom" name="nom" required="required" disabled value="<?php echo $user['nom']; ?>"></input>
          </div>
          <div class="form-item">
            <label for="prenom"></label>
            <input type="text" id="prenom" name="prenom" required="required" disabled value="<?php echo $user['prenom']; ?>"></input>
          </div>
          <div class="form-item">
            <label for="email"></label>
            <input type="email" id="email" name="email" required="required" disabled value="<?php echo $user['email']; ?>"></input>
          </div>
          <div class="form-item">
            <label for="password"></label>
            <input type="password" id="password" name="password" required="required" placeholder="Tapez à nouveau votre mot de passe"></input>
          </div>
          <div class="form-item">
            <label for="passwordconfirm"></label>
            <input type="password" id="passwordconfirm" name="passwordconfirm" required="required" placeholder="Confirmer votre nouveau mot de passe"></input>
          </div>
          <div class="button-panel">
            <input type="submit" name="majcompte" class="button" title="Mettre à jour mon compte" value="Mettre à jour mon compte"></button>
          </div>
        </form>
        <div class="form-footer">
          <p><a href="faq.php#CreationUtilisateur">Besoin d'aide dans la mise à jour de votre compte ?</a></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="js/app.js"></script>
</body>
</html>
