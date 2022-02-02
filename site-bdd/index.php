<?php require "_html_start.php"; ?>

<?php require "_bdd.php"; ?>

<?php
if (isset($_POST['search'])) {
    $films = listFilm($_POST['search']);
    echo "<h1>Recherche de films</h1>";
}
else {
    $films = listFilm();
    echo "<h1>Tous les films</h1>";
}
?>

<?php foreach ($films as $film) { ?>
    <div class="film">
        <a href="afficher.php?film=<?= $film['id'] ?>">
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
