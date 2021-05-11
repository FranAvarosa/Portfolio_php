<?php


require_once "db.php";
//Connection mysqli
$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


//Verification de connection pour les erreurs
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";

if (isset($_POST['user_name']) && !empty($_POST['user_name']) && isset($_POST['user_password']) && !empty($_POST['user_password'])){
  echo "<br> Bonjour ". $_POST['user_name']. "<br> Ton mot de passe apres le hashage est : ". password_hash($_POST['user_password'], PASSWORD_DEFAULT);
}
else{
  echo "<br> Personne ne c'est enregistrer ou tu n'as rien rentrer petit malin";
}


?>