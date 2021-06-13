<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;chartset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//? http://localhost/test/OPC/22-tp_espace_membre/inscription.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>

    <form action="verif_inscription" method="POST">
        <p><label for="pseudo">Pseudo <input id="pseudo" type="text" name="pseudo"></label></p>
        <p><label for="password">Mot de passe <input id="password" type="password" name="password"></label></p>
        <p><label for="confirmation">Retapez votre mot de passe <input id="confirmation" type="password" name="confirmation"></label></p>
        <p><label for="email">Adresse email <input id="email" type="text" name="email"></label></p>
        <input type="submit" value="S'inscrire">
    </form>


</body>

</html>