<?php


require_once "db.php";
//Connection mysqli EN PROCEDURAL
/*
$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


//Verification de connection pour les erreurs
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
  }
else{
  echo "Connected successfully";
}*/




//Connection mysqli EN OBJET

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_errno) {
  echo "Échec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>