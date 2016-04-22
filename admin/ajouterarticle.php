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
elseif ($_SESSION['user_rang'] === "Streamer") {
  header('Location: index.php');
  exit;
}

require '../connect.php';

$categories = $pdo->query("SELECT * FROM categories");

if(isset($_POST['addpost'])){

  $titre = !empty($_POST['titre']) ? trim($_POST['titre']) : null;
  $contenu = !empty($_POST['contenu']) ? trim($_POST['contenu']) : null;
  $categorie = !empty($_POST['categorie']) ? trim($_POST['categorie']) : null;

  $auteurid =  [$_SESSION['user_id']];


$sqlv = "SELECT username FROM users WHERE id LIKE ? ";
$req = $pdo->prepare($sqlv);
$req->execute($auteurid);


$data = $req->fetch(PDO::FETCH_ASSOC);
$data = $data['username'];






  $sql = "INSERT INTO posts (titre, contenu, categorie, auteur) VALUES ('$titre', '$contenu', '$categorie', '$data')";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();


  echo "L'article a bien été ajouté";
  header('Location: articles.php');

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
        <h1 id="hello,-world!">Ajouter un article</h1>


      </div>
      <div class="form-post">

        <form action="ajouterarticle.php" method="post" role="form">
          <div class="form-item">
            <label for="titre">Le titre :</label>
            <input type="text" id="titre" name="titre" required="required" placeholder="Titre"></input>
          </div>
          <div id="sample">
            <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
            //<![CDATA[
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
            //]]>
            </script>
            <label for="contenu">Insérer le contenu</label><br />
            <textarea id="contenu" name="contenu" style="width: 100%; height: 200px;">
            </textarea>
          </div>
          <div class="form-item">
            <label for="categorie">Choisissez une catégorie</label>
            <select id="categorie" name="categorie">
              <?php foreach ($categories as $data): ?>
                <option value="<?php echo $data['categorie']; ?>"><?php echo $data['categorie']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="button-panel">
            <input type="submit" name="addpost" class="button" title="Ajouter un article" value="Ajouter un article"></button>
          </div>
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
