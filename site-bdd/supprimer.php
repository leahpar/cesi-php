<?php
// supprimer.php?film=3
session_start();

if (!isset($_SESSION['login'])) {
    $_SESSION['message-class'] = "error";
    $_SESSION['message'] = "vous devez être connecté";
    //$_SESSION['location'] = "formulaire.php";
    header('Location: connexion.php');
    exit;
}


if (!isset($_GET['film'])) {
    $_SESSION['message-class'] = "error";
    $_SESSION['message'] = "ID film manquant";
    header('Location: index.php');
    exit;
}

$id = $_GET['film'];

if (!isset($_SESSION['films'][$id])) {
    $_SESSION['message-class'] = "error";
    $_SESSION['message'] = "ID film     inexistant";
    header('Location: index.php');
    exit;
}

require_once "_bdd.php";

//$film = $_SESSION['films'][$id];

$film = getFilm($id);

$nomFichierImage = $film['image'];

//unset($_SESSION['films'][$id]);

deleteFilm($id);

$ok = unlink(__DIR__ . '/uploads/' . $nomFichierImage);
if (!$ok) {
    // ERREUR a la suppression du fichier
}

$_SESSION['message-class'] = "success";
$_SESSION['message'] = "Film supprimé : " . $film['titre'];

header('Location: index.php');
