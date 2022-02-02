<?php
// supprimer.php?film=3
session_start();

if (!isset($_GET['film'])) {
    $_SESSION['message-class'] = "error";
    $_SESSION['message'] = "ID film manquant";
    header('Location: lister.php');
    exit;
}

$id = $_GET['film'];

if (!isset($_SESSION['films'][$id])) {
    $_SESSION['message-class'] = "error";
    $_SESSION['message'] = "ID film inexistant";
    header('Location: lister.php');
    exit;
}

$film = $_SESSION['films'][$id];
$nomFichierImage = $film['image'];

unset($_SESSION['films'][$id]);
$ok = unlink(__DIR__ . '/uploads/' . $nomFichierImage);
if (!$ok) {
    // ERREUR a la suppression du fichier
}

$_SESSION['message-class'] = "success";
$_SESSION['message'] = "Film supprimé : " . $film['titre'];

header('Location: lister.php');
