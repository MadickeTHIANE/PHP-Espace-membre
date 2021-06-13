<?php

//todo probleme avec isset

$bdd = new PDO('mysql:host=localhost;dbname=test;chartset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if ($_POST) {
    $erreur = "";
    //? verification du pseudo
    if(!$_POST['pseudo']){
        $erreur.='<p>Veuillez rentrer un pseudo</p>';
    }
    //? verification du mot de passe
    if ($_POST['password'] != $_POST['confirmation']) {
        $erreur.='<p>Le mot de passe de confirmation n\'est pas identique, veuillez recommencer</p>';
    }
    //? verification du mail
    if (!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['email'])) {
        $erreur.='<p>Votre adresse email n\'est pas valide</p>';
    } else {
        //? verification de la disponibilité du pseudo
        $verification_pseudo = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = :pseudo');
        $verification_pseudo->execute(array(
            ':pseudo' => $_POST['pseudo']
        ));
        $donnees = $verification_pseudo->fetch();
        if ($donnees) {
            $erreur.='<p>Désolé ce pseudonyme est déjà utilisé, veuillez en essayer un autre</p>';
        } 
        if(!$erreur) {
            //? hachage du mot de passe
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
            //? ajout du pseudo et du reste des informations à la bdd
            $ajout_pseudo = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES (:pseudo,:pass, :email, NOW())');
            $ajout_pseudo->execute(array(
                ':pseudo' => $_POST['pseudo'],
                ':pass' => $pass_hache,
                ':email' => $_POST['email'],
            ));
            echo '<p>Votre inscription a été effectuée avec succés ' . $_POST['pseudo'] . ' !</p>';
        }
    }
}
?>
<?= $erreur ?>
<form action="inscription.php">
    <input type="submit" value="retour">
</form>