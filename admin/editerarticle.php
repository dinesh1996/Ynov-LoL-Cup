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

require '../connect.php';

$users = $pdo->query("SELECT * FROM posts WHERE id={$_GET['id']}");

if(isset($_POST['addpost'])){

  //Retrieve the field values from our registration form.
  $titre = !empty($_POST['titre']) ? trim($_POST['titre']) : null;
  $contenu = !empty($_POST['contenu']) ? trim($_POST['contenu']) : null;
  $categorie= !empty($_POST['categorie']) ? trim($_POST['categorie']) : null;

  //Construct the SQL statement and prepare it.
  $sql = "SELECT COUNT(username) AS num FROM posts WHERE titre = :titre";
  $stmt = $pdo->prepare($sql);

  //Bind the provided username to our prepared statement.
  $stmt->bindValue(':titre', $titre);

  //Execute.
  $stmt->execute();

  //Fetch the row.
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if($row['num'] > 0){
    die('Un article avec ce titre existe déjà.');
  }

  $sql = "INSERT INTO posts (titre, contenu, categorie) VALUES ($titre, $contenu, $categorie)";
  $stmt = $pdo->prepare($sql);

  //Bind our variables.
  $stmt->bindValue(':titre', $titre);
  $stmt->bindValue(':contenu', $contenu);
  $stmt->bindValue(':categorie', $categorie);

  //Execute the statement and insert the new account.
  $result = $stmt->execute();

  //If the signup process is successful.
  if($result){
    //What you do here is up to you!
    echo "L'article a bien été ajouté.";
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
  <link href="css/bootstrap.css" rel="stylesheet">
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
        <h1 id="hello,-world!">Editer un article</h1>
      </div>
      <?php foreach ($users as $data): ?>
      <div class="form-post">
        <form action="ajouterarticle.php" method="post" role="form">
          <div class="form-item">
            <label for="titre">Le titre :</label>
            <input type="text" id="titre" name="titre" required="required" value="<?php echo $data['titre']; ?>"></input>
          </div>
          <div id="sample">
            <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
            //<![CDATA[
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
            //]]>
            </script>
            <label for="cat">Insérer le contenu</label><br />
            <textarea id="contenu" name="contenu" style="width: 100%; height: 200px;">
              <?php echo $data['contenu']; ?>
            </textarea>
          </div>
          <div class="form-item">
            <label for="categorie">Choisissez une catégorie</label>
            <select id="rang" name="rang">
              <option value="<?php echo $data['categorie']; ?>">Catégorie actuelle : <?php echo $data['categorie']; ?></option>
              <option value="Cat1">Ynov</option>
              <option value="Cat2">League of Legends</option>
              <option value="Cat3">FIFA 16</option>
            </select>
          </div>
          <div class="button-panel">
            <input type="submit" name="addpost" class="button" title="Ajouter un article" value="Ajouter un article"></button>
          </div>
          <?php endforeach; ?>
        </form>
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
