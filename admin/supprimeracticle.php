
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

$sql = "DELETE FROM posts WHERE id={$_GET['id']}";
$stmt = $pdo->prepare($sql);
$stmt->execute();
echo '<script language="JavaScript" type="text/javascript">window.location.replace("articles.php");</script>';
