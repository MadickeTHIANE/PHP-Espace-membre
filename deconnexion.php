<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;chartset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//? http://localhost/test/OPC/22-tp_espace_membre/deconnexion.php?
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deconnexion</title>
</head>
<body>
    <form action="valid_deconnexion.php" method="POST">
        <input type="submit" value="Deconnexion">
    </form>

</body>
</html>