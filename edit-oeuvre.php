<?php
    require('actions/users/securityAction.php');
    require('actions/oeuvre/getInfosOfEditedQuestionAction.php');
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
            if(isset($oeuvre_titre)){ 
                ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Auteur</label>
                        <input type="text" class="form-control" name="auteur" value="<?= $oeuvre_auteur; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description de oeuvre</label>
                        <textarea class="form-control" name="description"><?= $oeuvre_description; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Statut</label>
                        <textarea type="text" class="form-control" name="statut"><?= $oeuvre_statut; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" name="validate">Modifier oeuvre</button>
                </form>
                <?php
            }
        ?>
        

    </div>
    

</body>
</html>