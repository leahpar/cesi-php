<?php require "_html_start.php"; ?>

<?php

require_once "_bdd.php";

if (!isset($_SESSION['login'])) {
    $_SESSION['message-class'] = "error";
    $_SESSION['message'] = "vous devez être connecté";
    $_SESSION['location'] = "formulaire.php";
    header('Location: connexion.php');
    exit;
}

if (isset($_SESSION['formulaire'])) {
    $id = $_SESSION['formulaire']['id'];
    $film = [
        'titre' => $_SESSION['formulaire']['titre'],
        'annee' => $_SESSION['formulaire']['annee'],
        'duree' => $_SESSION['formulaire']['duree'],
    ];
    echo "<h1>Modifier un film</h1>";
    unset($_SESSION['formulaire']);
}
else if (isset($_GET['film'])) {
    $id = $_GET['film'];
    //$film = $_SESSION['films'][$id];
    $film = getFilm($id);
    echo "<h1>Modifier un film</h1>";
}
else {
    $id = -1;
    $film = [
        'titre' => '',
        'annee' => '',
        'duree' => '',
    ];
    echo "<h1>Créer un film</h1>";
}


$token = rand(100000000000, 99999999999999);
$_SESSION["csrf"] = $token;
?>

<form action="enregistrer.php"
      method="post"
      enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="csrf" value="<?= $token ?>">

    <p>
        Titre :
        <input type="text" name="titre"
               value="<?= $film['titre'] ?>">
    </p>

    <p>
        Année de sortie :
        <input type="number" name="annee"
               value="<?= $film['annee'] ?>">
    </p>

    <p>
        Durée (min) :
        <input type="number" name="duree"
               value="<?= $film['duree'] ?>">
    </p>

    <p>
        Résumé :
        <textarea name="resume"></textarea>
    </p>

    <p>
        Affiche du film :
        <input name="affiche" type="file" accept="image/*">
    </p>

    <p>
        <input type="submit">
    </p>

</form>

<?php require "_html_end.php"; ?>
