<?php

session_start();




$bdd = new PDO('mysql:host=mysql-plucas.alwaysdata.net;dbname=plucas_musee;charset=utf8;', 'plucas_admin', 'Admin1003');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
    <div class="container">
        <a href="add-user.php" class="btn btn-primary">Ajouter un utilisateur</a>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Statut</th>
                    <th>Date d'acquisition</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getAllOeuvre = $bdd->query('SELECT * FROM Oeuvre');
                while($oeuvre= $getAllOeuvre->fetch()){
                    ?>
                    <tr>
                        <td><?php echo $oeuvre['titre']; ?></td>
                        <td><?= $oeuvre['auteur']; ?></td>
                        <td><?= $oeuvre['statut']; ?></td>
                        <td><?= $oeuvre['dateAcquisition']; ?></td>
                        <td>
                            <a href="actions/oeuvre/deleteOeuvreAction.php?id=<?= $oeuvre['id'] ; ?>" class="btn btn-danger" > Supprimer la Oeuvre </a>
                            <a <a href="edit-oeuvre.php?id=<?= $oeuvre['id']; ?>" class="btn btn-warning">Modifier la Oeuvre</a> </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getAllUser = $bdd->query('SELECT * FROM User');
                while($user= $getAllUser->fetch()){
                    ?>
                    <tr>
                        <td><?php echo $user['nom']; ?></td>
                        <td><?= $user['prenom']; ?></td>
                        <td><?= $user['mail']; ?></td>
                        <td><?= $user['role']; ?></td>
                        <td>
                            <a href="bannir.php?id=<?= $user['id'] ; ?>" class="btn btn-danger" > Supprimer l'utilisateur </a>
                            <a href="admin.php?id=<?= $user['id']; ?>" class="btn btn-warning">Modifier l'utilisateur</> </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</body>
</html>


