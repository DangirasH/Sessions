<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['loginname'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: login.php');
  exit();
}
// Démarrage ou restauration de la session
session_start();
// Réinitialisation du tableau de session
// On le vide intégralement
$_SESSION = array();
// Destruction de la session
session_destroy();
// Destruction du tableau de session
unset($_SESSION);
// Redirection vers le form de login
header('Location: login.php');
exit();
?>