<?php require "_html_start.php"; ?>

<?php
if (isset($_POST['login'])) {
    // traiter le formulaire

    require_once "_bdd.php";

    $sql = "SELECT * FROM utilisateurs WHERE email = :email";
    $requete = $db->prepare($sql);
    $requete->bindValue(':email', $_POST['login']);
    $requete->execute();
    $row = $requete->fetch();

    if ($row == null) {
        $_SESSION['message-class'] = "error";
        $_SESSION['message'] = "Email invalide";
        header('Location: connexion.php');
        exit;
    }

    if (!password_verify($_POST['password'], $row['password'])) {
        $_SESSION['message-class'] = "error";
        $_SESSION['message'] = "Mot de passe invalide";
        header('Location: connexion.php');
        exit;
    }

    $_SESSION['utilisateur'] = $row;
    if (isset($_SESSION['location'])) {
        header('Location: ' . $_SESSION['location']);
        unset($_SESSION['location']);
    }
    else {
        header('Location: index.php');
    }
    exit;
}

else { ?>
<form method="post">
    <p>
        Email:
        <input type="text" name="login">
    </p>
    <p>
        Mot de passe:
        <input type="password" name="password">
    </p>
    <p>
        <input type="submit">
    </p>
</form>
<?php } ?>

<?php require "_html_end.php"; ?>
