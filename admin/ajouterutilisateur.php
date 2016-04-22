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

if(isset($_POST['register'])){

  //Retrieve the field values from our registration form.
  $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
  $nom = !empty($_POST['nom']) ? trim($_POST['nom']) : null;
  $prenom = !empty($_POST['prenom']) ? trim($_POST['prenom']) : null;
  $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
  $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
  $rang = !empty($_POST['rang']) ? trim($_POST['rang']) : null;

  //TO ADD: Error checking (username characters, password length, etc).
  //Basically, you will need to add your own error checking BEFORE
  //the prepared statement is built and executed.

  //Now, we need to check if the supplied username already exists.

  //Construct the SQL statement and prepare it.
  $sql = "SELECT COUNT(username) AS num FROM users WHERE email = :email";
  $stmt = $pdo->prepare($sql);

  //Bind the provided username to our prepared statement.
  $stmt->bindValue(':email', $email);

  //Execute.
  $stmt->execute();

  //Fetch the row.
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  //If the provided username already exists - display error.
  //TO ADD - Your own method of handling this error. For example purposes,
  //I'm just going to kill the script completely, as error handling is outside
  //the scope of this tutorial.
  if($row['num'] > 0){
    die('Un compte avec cette adresse email existe déjà!');
  }

  //Hash the password as we do NOT want to store our passwords in plain text.
  $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

  //Prepare our INSERT statement.
  //Remember: We are inserting a new row into our users table.
  $sql = "INSERT INTO users (username, nom, prenom, password, email, rang) VALUES (:username, :nom, :prenom, :password, :email, :rang)";
  $stmt = $pdo->prepare($sql);

  //Bind our variables.
  $stmt->bindValue(':username', $username);
  $stmt->bindValue(':nom', $nom);
  $stmt->bindValue(':prenom', $prenom);
  $stmt->bindValue(':password', $passwordHash);
  $stmt->bindValue(':email', $email);
  $stmt->bindValue(':rang', $rang);


  //Execute the statement and insert the new account.
  $result = $stmt->execute();

  //If the signup process is successful.
  if($result){
    //What you do here is up to you!
    echo "L'inscription s'est bien déroulé.";
  }

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
        <h1 id="hello,-world!">Ajouter un utilisateur</h1>
        <p>Via le formulaire ci-dessous, ajoutez directement des utilisateurs avec leurs différentes informations en ne pas oubliant de renseigner le rang de l'utilisateur.</p>
      </div>
      <div class="form-wrapper">
        <h1>Ajouter un utilisateur</h1>
        <form action="ajouterutilisateur.php" method="post" role="form">
          <div class="form-item">
            <label for="username"></label>
            <input type="text" id="username" name="username" required="required" placeholder="Identifiant"></input>
          </div>
          <div class="form-item">
            <label for="nom"></label>
            <input type="text" id="nom" name="nom" required="required" placeholder="Nom"></input>
          </div>
          <div class="form-item">
            <label for="prenom"></label>
            <input type="text" id="prenom" name="prenom" required="required" placeholder="Prenom"></input>
          </div>
          <div class="form-item">
            <label for="password"></label>
            <input type="password" id="password" name="password" required="required" placeholder="Mot de passe"></input>
          </div>
          <div class="form-item">
            <label for="email"></label>
            <input type="email" id="email" name="email" required="required" placeholder="Adresse email"></input>
          </div>
          <div class="form-item">
            <select id="rang" name="rang">
              <option value="Administrateur">Administrateur</option>
              <option value="Streamer">Streamer</option>
              <option value="Arbitre">Arbitre</option>
            </select>
          </div>
          <div class="button-panel">
            <input type="submit" name="register" class="button" title="Inscrire un nouvel utilisateur" value="Inscrire un nouvel utilisateur"></button>
          </div>
        </form>
        <div class="form-footer">
          <p><a href="faq.php#CreationUtilisateur">Besoin d'aide dans la création de compte utilisateur ?</a></p>
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
