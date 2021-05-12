<?php

session_start();

function deconnexion(){
    session_destroy();
    header('location: index.php');
}
?>