<?php
// Test de l'envoi du formulaire
if (!empty($_POST)) {
  // Les identifiants sont transmis ?
  if (!empty($_POST['loginname'])) {
    // On ouvre la session
    session_start();
    // On enregistre le login en session
    $_SESSION['loginname'] = $_POST['loginname'];
    // On redirige vers le fichier index.php
    header('Location: index.php');
    exit();
  } else {
    header('Location: login.php');
    exit();
  }
} else {
  header('Location: login.php');
  exit();
}
