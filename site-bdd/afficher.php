<?php require "_html_start.php"; ?>

<div class="film">

    <?php

    if (isset($_GET['film'])) {

        $id = $_GET['film'];

        require "_film.php";

    } else { ?>
        Paramètre "film" manquant
    <?php } ?>

</div>


<?php require "_html_end.php"; ?>
