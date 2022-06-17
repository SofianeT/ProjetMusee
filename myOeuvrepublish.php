<?php
session_start();
require('actions/oeuvre/myOeuvrepublish.php');


//Vérifier si l'utilisateur est connecté
if(isset($_SESSION['auth']) AND $_SESSION['auth'] == true){

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include 'includes/head.php'; ?>
    <body>
    <link rel="stylesheet" href="index.css">
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">

        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-danger" type="submit">Rechercher</button>
                </div>

            </div>
        </form>

        <br>

        <?php
        while($oeuvre= $getAllOeuvre->fetch()){
        ?>
        <div class="card">
            <div cass="card-header">
                <h3><?php echo $oeuvre['titre']; ?></h3>

            </div>
            <div class="card-body">
                <img src="<?= $oeuvre['image']; ?>" alt="<?= $oeuvre['titre']; ?>" class="img-fluid" style="max-width: 300px;"/>
                <p class="card-text"><?= $oeuvre['description']; ?></p
                </br>
                <?= $oeuvre['auteur']; ?></br>
                <?= $oeuvre['statut']; ?>
            </div>
            <div class="card-footer text-right ">
                <?= $oeuvre['dateAcquisition']; ?>
            </div>
            <?php
            ?>
            <a href="actions/Oeuvres/deleteOeuvreAction.php?id=<?= $oeuvre['id'] ; ?>" class="btn btn-danger" > Supprimer la Oeuvre </a>
            <?php


            ?>
            <a <a href="edit-Oeuvre.php?id=<?= $oeuvre['id']; ?>" class="btn btn-warning">Modifier la Oeuvre</a> </a>
            <?php
            }
            ?>
        </div>

        <br>
    </body>
    </html>
    <?php
}else{
    header('Location: login.php');
}
?>





