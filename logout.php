<?php
session_start(); // on démarre la session

// on supprime toutes les variables de session
$_SESSION = array();

// on détruit la session
session_destroy();

// on redirige l'utilisateur vers la page index.php
header("Location: index.php");
exit();
?>