<?php
session_start();

if (! isset($_POST['titre'])
 || ! isset($_POST['annee'])
 || ! isset($_POST['duree'])
 || ! isset($_POST['resume'])) {
    $_SESSION['message-class'] = "error";
    $_SESSION['message'] = "Formulaire invalide";
    header('Location: ajout.php');
    exit;
}

$titre  = htmlspecialchars($_POST['titre']);
$annee  = htmlspecialchars($_POST['annee']);
$duree  = htmlspecialchars($_POST['duree']);
$resume = htmlspecialchars($_POST['resume']);

$film['titre'] = $titre;
$film['annee'] = $annee;
$film['duree'] = $duree;

$_SESSION['films'][] = $film;

$_SESSION['message-class'] = "success";
$_SESSION['message'] = "Film enregistré";

//print_r($_SESSION);

header('Location: lister.php');
