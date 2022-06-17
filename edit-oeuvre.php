<?php
    require('actions/users/securityAction.php');
    require('actions/oeuvre/getInfosOfEditedOeuvreAction.php');
    require('actions/oeuvre/editOeuvreAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <div class="container">
        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
        
        <?php 
            if(isset($oeuvre_title)){
                ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titre</label>
                        <input type="text" class="form-control" name="titre" value="<?= $oeuvre_title; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Auteur</label>
                        <input type="text" class="form-control" name="auteur" value="<?= $oeuvre_auteur; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Url de l'image </im></label>
                        <input type="text" class="form-control" name="image" value="<?= $oeuvre_image; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description de oeuvre</label>
                        <textarea class="form-control" name="description"><?= $oeuvre_description; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Statut</label>
                        <select name="statut">
                            <option value="Prêt">Prêt</option>
                            <option value="Restauration">Restauration </option>
                            <option value="Acquisition">Acquisition </option>
                            <option value="Dêpot">Dêpot </option>
                            <option value="Exposition">Exposition  </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Date d'acquisition</label>
                        <input type="date" class="form-control" name="dateAcquisition" value="<?= $oeuvre_dateAcquisition; ?>">

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


                    <button type="submit" class="btn btn-primary" name="validate">Modifier oeuvre</button>
                </form>
                <?php
            }
        ?>


        

    </div>
    

</body>
</html>