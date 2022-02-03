<?php

require_once "../_bdd.php";
require_once "_api.php";

checkMethod("GET");

$film = getFilmFromUrl();

echo json_encode($film);
