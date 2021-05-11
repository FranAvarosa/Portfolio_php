<?php


require_once "db.php";
//Connection mysqli
$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


//Verification de connection pour les erreurs
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
?>