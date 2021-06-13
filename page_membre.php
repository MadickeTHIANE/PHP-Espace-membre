<?php
//? http://localhost/test/OPC/22-tp_espace_membre/page_membre.php
session_start();
if(isset($_SESSION['pseudo'])){
    echo 'Bonjour '.$_SESSION['pseudo'].' !';
}else{
    echo 'Vous n\'êtes pas connecté.';
}
?>