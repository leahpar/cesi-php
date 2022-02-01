<?php require "_html_start.php"; ?>

<?php require "_listeFilms.php"; ?>

<div class="film">

    <?php

    if (isset($_GET['film'])) {

        $id = $_GET['film'];

        require "_film.php";

    } else { ?>
        Paramètre "film" manquant
    <?php } ?>

</div>

<h2>TODO</h2>
<ul>
<li> Récupérer l'ID du film ($_GET) </li>
<li> Récupérer le film correspondant </li>
<li> Afficher le film </li>
<li> Gérer le cas où ID pas renseigné ($_GET) </li>
<li> Gérer le cas où ID pas dans la "base" </li>
<li> Mettre des liens sur la liste des films </li>
</ul>

<?php require "_html_end.php"; ?>
