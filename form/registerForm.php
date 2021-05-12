<?php

/*if (isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_password'])){
    echo "<br> Bonjour ". $_POST['user_name']. "<br> Ton mot de passe apres le hashage est : ". password_hash($_POST['user_password'], PASSWORD_DEFAULT)."<br> et ton email est :". $_POST['user_email'];
}
elseif (empty($_POST['user_name']) or empty($_POST['user_email']) or empty($_POST['user_password'])){
    echo '<p> <script type="text/javascript">alert("tu as rien rentrer ou oublier un champ")</script></p>';
}
else{
    echo "<br> Personne ne c'est enregistrer";
}*/

/*if (isset($_POST['user_name']) && !empty($_POST['user_name']) && isset($_POST['user_email']) && !empty($_POST['user_email']) && isset($_POST['user_password']) && !empty($_POST['user_password'])){
    echo "<br> Bonjour ". $_POST['user_name']. "<br> Ton mot de passe apres le hashage est : ". password_hash($_POST['user_password'], PASSWORD_DEFAULT)."<br> et ton email est :". $_POST['user_email'];
    echo "<br><br>";
    var_dump($_POST);
}
else{
    echo "<br> Personne ne c'est enregistrer ou tu n'as rien rentrer petit malin";
}

On peux juste le faire en une ligne courte voir <ci-dessous></ci-dessous>*/

$error = null;

if (isset($_POST) && !empty($_POST)){
    $error = [];
    /*echo "<br> Bonjour ". $_POST['user_name']. "<br> Ton mot de passe apres le hashage est : ". password_hash($_POST['user_password'], PASSWORD_DEFAULT)."<br> et ton email est :". $_POST['user_email'];
    echo "<br><br>";
    var_dump($_POST);*/
    if (empty($_POST['user_email']) or empty($_POST['confirm_user_email']) or $_POST['user_email'] !== $_POST['confirm_user_email'] or filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL === FALSE)){
        $error['email'] = "Votre email comporte une erreur ou ne correspond pas à la confirmation";
    }
    if (empty($_POST['user_password']) or empty($_POST['confirm_user_password']) or $_POST['user_password'] !== $_POST['confirm_user_password']){
        $error['password'] = "mot de passe ne correspond pas à la confirmation";
    }
    if (strlen($_POST['user_password']) < 4 or strlen($_POST['user_name']) > 30){
        $error['username'] = "Votre mot de passe doit etre de au moins 4 caractere et pas plus que 30";
    }
    if (strlen($_POST['user_name']) < 3 or strlen($_POST['user_name']) > 30){
        $error['username'] = "Votre pseudo doit etre de au moins 3 caractere et pas plus que 30";
    }

    /*
    version compliquer pour donner des conditions au pseudo 
    if(preg_match("\^[a-zA-Z0-9_-]{3-30}$\ "), $matches, $_POST['user_name']){
        $error['username'] = "Votre pseudo dois etre compris entre 3 et 30 caractere seul les lettres minuscules et majuscules, les chiffres de 0 à 9 et les tirets et underscore sont accepter";
    }*/

    if(empty($error)){
        $pseudo = $_POST['user_name'];
        $password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
        $email = $_POST['user_email'];

        $sql = "INSERT INTO user(email,password,pseudo) VALUES ('$email','$password','$pseudo')";

        if($mysqli->query($sql) === true){
            $_SESSION['msg_flash'] = 'Votre compte à été créer avec succès !!';
            header('location: login.php');
        }
        else {
            $error = 'Une erreur est survenue, compte non créer !!';
        }


        // TEST PROCEDURAL
        
        /*if(mysqli_query($mysqli, $sql === TRUE)){
            $_SESSION['msg_flash'] = '<p><script type="text/javascript">alert("Votre compte à été créer avec succès !")</script></p>';
            header('location: login.php');
        }
        else {
            $error = 'Une erreur est survenue, compte non créer !!';
        }*/

    }
}


?>