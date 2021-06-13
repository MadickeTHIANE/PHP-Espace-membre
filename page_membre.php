<?php
//? http://localhost/test/OPC/22-tp_espace_membre/page_membre.php
session_start();
if (isset($_SESSION['pseudo'])) {
    echo 'Bonjour ' . $_SESSION['pseudo'] . ' !'; ?>
    <div>
        <a href="deconnexion.php">Déconnexion</a>
    </div>
<?php
} else {
    echo 'Vous n\'êtes pas connecté.';
}
?>