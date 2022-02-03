<?php

require_once "../_bdd.php";
require_once "_api.php";

checkMethod("POST");

$film = getFilmJson();

if (!isset($film['image'])) {
    $film['image'] = null;
}

$id = createFilm($film);

$film['id'] = $id;
echo json_encode($film);
