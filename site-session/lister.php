<?php require "_html_start.php"; ?>

<?php require "_listeFilms.php.php"; ?>

<?php foreach ($_SESSION['films'] as $id => $film) { ?>
    <div class="film">
        <a href="afficher.php?film=<?= $id ?>">
            <h3><?= $film['titre'] ?></h3>
            <p>Sortie : <?= $film["annee"] ?></p>
            <p>Durée :  <?= $film['duree'] ?>min</p>
        </a>
        <?php if ($film["image"] != '') { ?>
            <img src="uploads/<?= $film["image"] ?>" width="200x">
        <?php } ?>
    </div>
<?php } ?>

<?php require "_html_end.php"; ?>
