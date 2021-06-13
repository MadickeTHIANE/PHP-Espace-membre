<?php
//? http://localhost/test/OPC/22-tp_espace_membre/verif_connexion.php
$bdd = new PDO('mysql:host=localhost;dbname=test;chartset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// if(!empty($_POST['pseudo']) and !empty($_POST['password'])){
if ($_POST) {
    $erreur = '';

    //?  Récupération du pseudo de l'utilisateur et de son pass hashé
    $req = $bdd->prepare('SELECT*FROM membres WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $_POST['pseudo']
    ));
    $resultat = $req->fetch();

    //? Comparaison du pass envoyé via le formulaire avec la base => booléen
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['pass']);

    //? on vérifie l'existence du pseudo
    if (empty($_POST['pseudo'])) {
        $erreur .= '<p>Veuillez indiquer votre pseudo</p>';
    } elseif (!$resultat['pseudo']) {
        $erreur .= '<p>Identifiant non reconnu.</p>';
    }

    //? on vérifie le mot de passe dans le cas où le pseudo existe
    if ($resultat['pseudo']) {
        if (empty($_POST['password'])) {
            $erreur .= '<p>Veuillez rentrer votre mot de passe</p>';
        } elseif (!$isPasswordCorrect) {
            $erreur .= '<p>Votre mot de passe est erroné</p>';
        } else {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $_POST['pseudo'];
            echo 'Vous êtes connecté !';
            // echo isset($_SESSION['pseudo']) ? '<pVotre>yes, SESSION is set</pVotre>' : '<p>no, SESSION is not set</p>';
            if (isset($_POST['auto'])) {
                setcookie('pseudo', $resultat['pseudo'], time() + 365 * 24 * 3600, null, null, false, true);
                setcookie('pass_hache', password_hash($_POST['password'], PASSWORD_DEFAULT), time() + 365 * 24 * 3600, null, null, false, true);
                // setcookie('id', $resultat['id'], time() + 365 * 24 * 3600, null, null, false, true);
                // setcookie('email', $resultat['email'], time() + 365 * 24 * 3600, null, null, false, true);
                // setcookie('date_inscription', $resultat['date_inscription'], time() + 365 * 24 * 3600, null, null, false, true);
                // echo isset($_COOKIE['pseudo']) ? '<p>yes, cookie is set</p>' : '<p>no, cookie is not set</p>';
                // echo $_COOKIE['pseudo'];
                // echo $_COOKIE['pass_hache'];
            }
        }
    }
}
?>
<?= $erreur ?>

<p>
<form action="connexion.php">
    <input type="submit" value="retour">
</form>
</p>