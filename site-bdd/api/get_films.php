<?php

require_once "../_bdd.php";
require_once "_api.php";

checkMethod("GET");

$films = listFilm();

echo json_encode($films);
