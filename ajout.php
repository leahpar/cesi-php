<?php require "_html_start.php"; ?>

<h1>Ajouter un film</h1>

<form action="enregistrer.php" method="post">

    <p>
    Titre :
    <input type="text" name="titre">
    </p>

    <p>
    Année de sortie :
    <input type="number" name="annee">
    </p>

    <p>
    Durée (min) :
    <input type="number" name="duree">
    </p>

    <p>
    Résumé :
    <textarea name="resume"></textarea>
    </p>

    <p>
        <input type="submit">
    </p>

</form>

<?php require "_html_end.php"; ?>
