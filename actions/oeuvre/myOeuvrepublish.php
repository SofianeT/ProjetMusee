<?php
$pdo = new PDO('mysql:host=mysql-plucas.alwaysdata.net;dbname=plucas_musee;charset=utf8;', 'plucas_admin', 'Admin1003');
$getAllOeuvre = $pdo->prepare("SELECT * FROM Oeuvre WHERE id_auteur = :id_utilisateur");
$getAllOeuvre->bindParam(':id_utilisateur', $_SESSION['id']);
$getAllOeuvre->execute();

?>
