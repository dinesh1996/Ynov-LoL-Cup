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
//Retrieve the field values from our registration form.
$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : null;
$contenu = !empty($_POST['contenu']) ? trim($_POST['contenu']) : null;
$categorie= !empty($_POST['rang']) ? trim($_POST['rang']) : null;
echo "<br>";
var_dump($titre);
echo "<br>";
var_dump($contenu);
echo "<br>";
var_dump($categorie);
echo "<br>";


$articleid= $_GET['id'];

//Construct the SQL

  // $sql1 = "UPDATE posts SET titre, contenu, categorie WHERE id=$articleid  VALUES ('$titre', '$contenu', '$categorie')";
  //
  // $stmt1 = $pdo->prepare($sql1);
  // $stmt1->execute();
  // echo 'done';

  $req = $pdo->prepare('UPDATE posts SET titre = :nv_titre, contenu = :nv_contenu,categorie = :nv_categorie WHERE id = :id');
$result=  $req->execute(array(
  	'nv_titre' => $titre,
  	'nv_contenu' => $contenu,
    'nv_categorie' => $categorie,
  	'id' => $articleid
  	));

    // $sql = "INSERT INTO posts (titre, contenu, categorie, auteur) VALUES ('$titre', '$contenu', '$categorie', '$data')";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute();
if ($result) {

    echo '<script language="JavaScript" type="text/javascript">window.location.replace("articles.php");</script>';
}else {
  echo "failed";
}
