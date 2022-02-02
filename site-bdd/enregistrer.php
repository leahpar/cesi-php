<?php
session_start();

require "_bdd.php";

if (! isset($_POST['titre'])
 || ! isset($_POST['annee'])
 || ! isset($_POST['duree'])
 || ! isset($_POST['resume'])) {
    $_SESSION['message-class'] = "error";
    $_SESSION['message'] = "Formulaire invalide";
    header('Location: formulaire.php');
    exit;
}

$token1 = $_POST['csrf'];
$token2 = $_SESSION["csrf"];
if ($token1 != $token2) {
    $_SESSION['message-class'] = "error";
    $_SESSION['message'] = "CSRF invalide";
    header('Location: formulaire.php');
    exit;
}

$id     = htmlspecialchars($_POST['id']);
$titre  = htmlspecialchars($_POST['titre']);
$annee  = htmlspecialchars($_POST['annee']);
$duree  = htmlspecialchars($_POST['duree']);
$resume = htmlspecialchars($_POST['resume']);

$erreurs = [];
if (strlen($titre) < 3) {
    $erreurs[] = "Le titre doit faire au moins 3 caractères";
}
if ($annee < 1895 || $annee > 2050) {
    $erreurs[] = "L'année doit être en 1895 et 2050";
}
if ($duree < 0) {
    $erreurs[] = "La durée doit être > 0";
}
if (count($erreurs) > 0) {
    $_SESSION['message-class'] = "error";
    $message = implode("<br>", $erreurs);
    $_SESSION['message'] = $message;
    $_SESSION['formulaire'] = [
        'id' => $id,
        'titre' => $titre,
        'annee' => $annee,
        'duree' => $duree,
    ];
    header('Location: formulaire.php');
    exit;
}

$film['titre'] = $titre;
$film['annee'] = $annee;
$film['duree'] = $duree;

// Récupérer l'image uploadée


// Répertoire de destination
$uploaddir = __DIR__ . '/uploads/';
// Fichier temporaire
$tmpfile = $_FILES['affiche']['tmp_name'];
// nom du fichier final
$uploadfile = $uploaddir . $_FILES['affiche']['name'];

$mime_type = mime_content_type($tmpfile);
if (substr($mime_type, 0, 6) == "image/") {
    // Fichier autorisé
    // Déplacement du fichier temporaire vers l'emplacement final
    move_uploaded_file($tmpfile, $uploadfile);
    $film['image'] = $_FILES['affiche']['name'];
}

if ($_POST['id'] >= 0) {
    // ID existant => modification
    $id = $_POST['id'];

    updateFilm($id, $film);

    $message = "Filme modifié";
}
else {
    // ID inexistant => création

    createFilm($film);

    $message = "Film ajouté";
}

$_SESSION['message-class'] = "success";
$_SESSION['message'] = $message;

header('Location: index.php');
