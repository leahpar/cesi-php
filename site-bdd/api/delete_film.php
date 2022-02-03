<?php

require_once "../_bdd.php";
require_once "_api.php";

checkMethod("DELETE");

$film = getFilmFromUrl();

deleteFilm($film['id']);

http_response_code(204);
