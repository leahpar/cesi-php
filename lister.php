<?php require "_html_start.php"; ?>

<?php require "_listeFilms.php"; ?>

<?php foreach ($films as $id => $film) { ?>
    <div class="film">
        <a href="/afficher.php?film=<?= $id ?>">
            <h3><?= $film['titre'] ?></h3>
            <p>Sortie : <?= $film["annee"] ?></p>
            <p>Durée :  <?= $film['duree'] ?>min</p>
        </a>
    </div>
<?php } ?>

<?php require "_html_end.php"; ?>
