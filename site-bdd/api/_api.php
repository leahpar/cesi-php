<?php

header('Content-Type: application/json');

/**
 * Retourne une erreur au client
 */
function erreur($code, $message)
{
    http_response_code($code);
    $reponse = ["erreur" => $message];
    echo json_encode($reponse);
    exit;
}

/**
 * Vérifie la cohérence du film passé en paramètre
 * Retourne le nom de la colonne invalide
 */
function checkData($film) {
    if (!isset($film['titre'])) return 'titre';
    if (!isset($film['annee']) || !is_integer($film['annee'])) return 'annee';
    if (!isset($film['duree']) || !is_integer($film['duree'])) return 'duree';
    return null;
}

/**
 * Transforme le JSON envoyé dans la requête en donnée FILM
 */
function getFilmJson($checkData = true) {
    $json = file_get_contents("php://input");
    $film = json_decode($json, true);

    if ($film == null) {
        erreur(400, "JSON invalide");
    }

    if ($checkData == true) {
        if (checkData($film) != null) {
            erreur(400, "DATA invalide : " . checkData($film));
        }
    }

    return $film;
}

/**
 * Récupère un film suivant l'ID passé en paramètre $_GET
 */
function getFilmFromUrl() {
    if (!isset($_GET['film'])) {
        erreur(400, "Parametre 'film' manquant");
    }

    $id = $_GET['film'];

    $film = getFilm($id); // id, titre, annee...
    if ($film == null) {
        erreur(404, "Film inexistant");
    }

    return $film;
}

/**
 * Contrôle la méthode de la requête
 */
function checkMethod($method) {
    if ($_SERVER['REQUEST_METHOD'] != $method) {
        erreur(405, "Méthode invalide");
    }
}
