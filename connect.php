<?php

$host = 'localhost';
$name = "root";
$password = '';
$dbname = 'portfolio';

//Connection mysqli
$mysqli = mysqli_connect($host, $name, $password, $dbname);


//Verification de connection pour les erreurs
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
?>