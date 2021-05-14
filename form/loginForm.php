<?php

/*if (isset($_POST['user_name']) && !empty($_POST['user_name']) && isset($_POST['user_password']) && !empty($_POST['user_password'])){
    echo "<br> Bonjour ". $_POST['user_name']. "<br> Ton mot de passe apres le hashage est : ". password_hash($_POST['user_password'], PASSWORD_DEFAULT);
  }
  else{
    echo "<br> Personne ne c'est enregistrer ou tu n'as rien rentrer petit malin";
  }*/

$error = null;

//if (isset($_POST['user_name']) && !empty($_POST['user_name']) && isset($_POST['user_password']) && !empty($_POST['user_password'])){ PERMET DE VERIFIER TOUTE LES CONDITIONS EN UNE FOIS MAIS PAS TOP POUR LES MESSAGE DERREUR
if (isset($_POST) && !empty($_POST)){
  
  if (empty($_POST['user_password']) or empty($_POST['user_name'])){
    $error = "Aucun mot de passe ou pseudo rentrer";
  }

  $sql = 'SELECT * FROM users WHERE pseudo ="'.$_POST['user_name'].'" LIMIT 1';
  //$result = $mysqli->query($sql);
  //var_dump($result);

  /*Version avec num row et des if*/
  if($result = $mysqli->query($sql)){
    if ($result->num_rows > 0){
      $user = $result->fetch_assoc();
      if (password_verify($_POST['user_password'], $user['password'])){
        $_SESSION['msg_flash'] = 'Bienvenue '. $user['pseudo'].' !';
        $_SESSION['users'] = $user;
        redirect('index.php');
      }
      else{
        $error = "Mot de passe ou pseudo incorrecte";
      }
    }
  }
}
?>