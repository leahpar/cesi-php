<nav>
    <a href="index.php">Accueil</a>
    <a href="#">Partenaires</a>
    <a href="#">contactez-nous</a>

    <?php if (isset($_SESSION['utilisateur'])) { ?>
        Bonjour <?= $_SESSION['utilisateur']['email'] ?>
        <a href="deconnexion.php">Déconnection</a>
        <?php if ($_SESSION['utilisateur']['role'] == "ADMIN") { ?>
            <a href="creer-film">Ajouter</a>
        <?php }?>
    <?php } else { ?>
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
    <?php } ?>

    <form   action="index.php"
            method="post"
            style="display: inline; float: right">
        <input name="search">
        <input type="submit">
    </form>

</nav>

