<?php
/**
* Start the session.
*/
session_start();
if(isset($_SESSION['user_id']))
{
  header('location: admin/index.php');
}
/**
* Include ircmaxell's password_compat library.
*/
require 'lib/password.php';
/**
* Include our MySQL connection.
*/
require 'connect.php';
//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if(isset($_POST['login'])){
  //Retrieve the field values from our login form.
  $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
  $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
  //Retrieve the user account information for the given username.
  $sql = "SELECT * FROM users WHERE username = :username";
  $stmt = $pdo->prepare($sql);
  //Bind value.
  $stmt->bindValue(':username', $username);
  //Execute.
  $stmt->execute();
  //Fetch row.
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  //If $row is FALSE.
  if($user === false){
    //Could not find a user with that username!
    //PS: You might want to handle this error in a more user-friendly manner!
    die("Mauvaise combinaison d'identifiant / mot de passe!");
  } else{
    //User account found. Check to see if the given password matches the
    //password hash that we stored in our users table.
    //Compare the passwords.
    $validPassword = password_verify($passwordAttempt, $user['password']);
    //If $validPassword is TRUE, the login has been successful.
    if($validPassword){
      //Provide the user with a login session.
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['logged_in'] = time();
      $_SESSION['user_rang'] = $user['rang'];
      //Redirect to our protected page, which we called home.php
      header('Location: admin/index.php');
      exit;
    } else{
      //$validPassword was FALSE. Passwords do not match.
      die("Mauvaise combinaison d'identifiant / mot de passe!");
    }
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
        <link href="css/style.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                <div>
                    <h1 class="logo-name">YLC</h1>
                    <img src="img/logo-top.png">
                </div>
                <h3>Tableau de bord Ynov Lol Cup</h3><br />
                <p>Bienvenue dans le tableau de bord de l'Ynov Lol Cup. Connectez-vous. Ne perdez pas un seul instant.</p><br />
                <div class="form-wrapper">
                  <form action="login.php" method="post" role="form">
                    <div class="form-item">
                      <label for="username"></label>
                      <input type="text" id="username" name="username" required="required" placeholder="Identifiant"></input>
                    </div>
                    <div class="form-item">
                      <label for="password"></label>
                      <input type="password" id="password" name="password" required="required" placeholder="Mot de passe"></input>
                    </div>
                    <div class="button-panel">
                      <input type="submit" name="login" class="button" title="Se connecter" value="Se connecter"></input>
                    </div>
                  </form>
                  <div class="form-footer">
                    <p><a href="#forgotpass.php">Mot de passe oublié?</a></p>
                  </div>
                </div>
            </div>
        </div>
        <!-- FIN DU SLIDER / IMAGE A LA UNE -->


        <!-- FIN PARTIE SPONSOR -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
