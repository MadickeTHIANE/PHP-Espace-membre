<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;chartset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>

<?php
    session_start();
    
    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();
    
    // Suppression des cookies de connexion automatique
    setcookie('pseudo', '');
    setcookie('pass_hache', '');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Vous êtes désormais déconnecter</p>
    <form action="deconnexion.php">
        <input type="submit" value="Retour">
    </form>
</body>
</html>