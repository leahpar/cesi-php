<?php

require_once "../_bdd.php";
require_once "_api.php";

checkMethod("PATCH");

$film = getFilmFromUrl();

$filmPatch = getFilmJson(false);

foreach ($filmPatch as $cle => $valeur)  {
    $film[$cle] = $valeur;
}
updateFilm($film['id'], $film);

echo json_encode($film);
