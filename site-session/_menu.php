<nav>
    <a href="lister.php">Accueil</a>
    <a href="#">Partenaires</a>
    <a href="#">contactez-nous</a>

    <?php if (isset($_SESSION['login'])) { ?>
        <a href="formulaire.php">Ajouter</a>
        Bonjour <?= $_SESSION['login'] ?>
        <a href="deconnexion.php">Déconnection</a>
    <?php } else { ?>
        <a href="#">Inscription</a>
        <a href="connexion.php">Connexion</a>
    <?php } ?>
</nav>

