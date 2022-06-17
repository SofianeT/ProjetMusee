<?php 
    require('actions/users/securityAction.php'); 
    require('actions/oeuvre/publishOeuvreAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <form class="container" method="POST">

        <?php 
            if(isset($errorMsg)){ 
                echo '<p>'.$errorMsg.'</p>'; 
            }elseif(isset($successMsg)){ 
                echo '<p>'.$successMsg.'</p>'; 
            }
        ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre de la Oeuvre</label>
            <input type="text" class="form-control" name="titre">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Auteur</label>
            <input type="text" class="form-control" name="auteur">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Url de l'image</label>
            <input type="text" class="form-control" name="image">
        </div>

        <select name="statut">
            <option value="Prêt">Prêt</option>
            <option value="Restauration">Restauration </option>
            <option value="Acquisition">Acquisition </option>
            <option value="Dêpot">Dêpot </option>
            <option value="Exposition">Exposition  </option>
        </select>



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Categorie</label>
            <select class="form-control" name="categorie">
                <option value="">Choisir une categorie</option>
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



        <button type="submit" class="btn btn-danger" name="validate">Publier la Oeuvre</button>
   </form>
</body>
</html>