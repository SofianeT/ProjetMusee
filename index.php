<?php 
    session_start();
    require('actions/oeuvre/showAllOeuvreAction.php');

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

        <br>

        <form method="GET">
<div class="form-group row">
                <div class="col-4">
                    <select name="categorie" class="form-control">
                        <option value="">Choisir une catégorie</option>
                        <?php
                        $pdo = new PDO('mysql:host=mysql-plucas.alwaysdata.net;dbname=plucas_musee;charset=utf8;', 'plucas_admin', 'Admin1003');
                        $getAllCategorie = $pdo->query('SELECT * FROM Categorie');
                        while($categorie = $getAllCategorie->fetch()){
                        ?>
                        <option value="<?= $categorie['id']; ?>"><?= $categorie['nom']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

            <div class="col-4">
                <select class="form-control" name="statut">
                    <option value="">Tous les statuts</option>
                    <option value="Prêt">Prêt</option>
                    <option value="Restauration">Restauration </option>
                    <option value="Acquisition">Acquisition </option>
                    <option value="Dêpot">Dêpot </option>
                    <option value="Exposition">Exposition  </option>

                </select>

            </div>
            <div class="col-4">
                <button class="btn btn-danger" type="submit">Filtrer</button>
            </div>
        </div>

        <br>






        <?php
            while( $oeuvre = $getAllOeuvres->fetch() ){
                ?>
                <div class="card">
                    <div cass="card-header">
                        <h3><?php echo $oeuvre['titre']; ?></h3>

                    </div>
                    <div class="card-body">
                        <img src="<?= $oeuvre['image']; ?>" alt="<?= $oeuvre['titre']; ?>" class="img-fluid" style="max-width: 300px;"/>

                        <p class="card-text"><?= $oeuvre['description']; ?></p
                        </br>
                        <a> Auteur de l'oeuvre : </a>   <?= $oeuvre['auteur']; ?></br>
                       <a> Statut de l'oeuvre : </a> <?= $oeuvre['statut']; ?>
                    </div>
                    <div class="card-footer text-right ">
                        <a> Date d'acquisition de l'oeuvre : </a>  <?= $oeuvre['dateAcquisition']; ?>
                     </div>
                    <?php
            ?>
            <a href="actions/oeuvre/deleteOeuvreAction.php?id=<?= $oeuvre['id'] ; ?>" class="btn btn-danger" > Supprimer la Oeuvre </a>
            <?php


              ?>
              <a <a href="edit-oeuvre.php?id=<?= $oeuvre['id']; ?>" class="btn btn-warning">Modifier la Oeuvre</a> </a>
              <?php
                    }
          ?>
                </div>
                
                <br>
                <?php

        ?>

    </div>
    <button id="myBtn"><a href="#top" style="color: white">TOP</a></button>

</body>
</html>

<?php
    }else{
        header('Location: login.php');
    }
?>


