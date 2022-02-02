<?php require "_html_start.php"; ?>

<?php

if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $plainPassword = $_POST['password'];

    require_once "_bdd.php";
    $sql = "SELECT * FROM utilisateurs WHERE email = :email";
    $requete = $db->prepare($sql);
    $requete->bindValue(':email', $email);
    $requete->execute();
    $rows = $requete->fetchAll();

    if (count($rows) > 0) {
        $_SESSION['message-class'] = "error";
        $_SESSION['message'] = "Cet email est déjà utilisé";
        header('Location: inscription.php');
        exit;
    }

    $password = password_hash($plainPassword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (email, password, role) 
            VALUE (:email, :password, :role)";
    $requete = $db->prepare($sql);
    $requete->bindValue(':email', $email);
    $requete->bindValue(':password', $password);
    $requete->bindValue(':password', 'VISITEUR');
    $requete->execute();

    $_SESSION['message-class'] = "success";
    $_SESSION['message'] = "Inscription terminée";
    header('Location: index.php');
    exit;

}

else {
?>

<form method="post">
    <p>
        Email :
        <input type="email" name="email">
    </p>
    <p>
        Mot de passe :
        <input type="password" name="password">
    </p>
    <p>
        <input type="submit">
    </p>
</form>

<?php } ?>

<?php require "_html_end.php"; ?>
