<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;chartset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <form action="verif_connexion.php" method="POST">
        <p><label for="pseudo">Pseudo <input type="text" id="pseudo" name="pseudo"></label></p>
        <p><label for="password">Mot de passe <input type="password" id="password" name="password"></label></p>
        <p><label for="auto">Connexion automatique <input type="checkbox" id="auto" name="auto"></label></p>
        <p><input type="submit" value="Se connecter"></p>
    </form>

    <?php
    //? http://localhost/test/OPC/22-tp_espace_membre/connexion.php
    ?>
</body>

</html>