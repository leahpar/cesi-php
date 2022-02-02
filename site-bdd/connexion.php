<?php require "_html_start.php"; ?>

<?php
if (isset($_POST['login'])) {
    // traiter le formulaire
    $_SESSION['login'] = $_POST['login'];
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
        Login:
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
