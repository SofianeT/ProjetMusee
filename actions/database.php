<?php
try{
    $bdd = new PDO('mysql:host=mysql-plucas.alwaysdata.net;dbname=plucas_musee;charset=utf8;', 'plucas_admin', 'Admin1003');
}catch(Exception $e){
    die('Une erreur a été trouvée : ' . $e->getMessage());
}