<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
  header('Location: ../login.php');
  exit;
}
elseif ($_SESSION['user_rang'] === "Arbitre") {
  header('Location: index.php');
  exit;
}

require '../connect.php';

if(isset($_POST['addcategorie'])){

  //Retrieve the field values from our registration form.
  $categorie = !empty($_POST['categorie']) ? trim($_POST['categorie']) : null;



  //Construct the SQL statement and prepare it.
  $sqlv = "SELECT categorie FROM categories WHERE categorie LIKE ? ";
  $req = $pdo->prepare($sqlv);
  $req->execute(array($categorie));
  $data = $req->fetch(PDO::FETCH_ASSOC);
  var_dump($data);




  if($data){
    echo ('Une catégorie porte déja ce nom');
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("articles.php");</script>';
}else {





    $sql = "INSERT INTO categories (categorie) VALUES ('$categorie')";
    $result = $pdo->prepare($sql);
    $result->execute();

}

  //If the signup process is successful.
  if($result){
    //What you do here is up to you!
    echo "La catégorie a bien été ajoutée";
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
        <h1 id="hello,-world!">Ajouter une catégorie</h1>
      </div>
      <div class="form-wrapper">
        <form action="ajoutercategorie.php" method="post" role="form">
          <div class="form-item">
            <label for="categorie"></label>
            <input type="text" id="categorie" name="categorie" required="required" placeholder="Nom de la categorie"></input>
          </div>
          <div class="button-panel">
            <input type="submit" name="addcategorie" class="button" title="Ajouter une catégorie" value="Ajouter cette catégorie"></button>
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
