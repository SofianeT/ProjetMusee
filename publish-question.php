<?php 
    require('actions/users/securityAction.php'); 
    require('actions/oeuvre/publishQuestionAction.php');
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
            <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
            <input type="text" class="form-control" name="titre">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Auteur</label>
            <input type="text" class="form-control" name="auteur">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Statut</label>
            <input type="text" class="form-control" name="statut">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Categorie</label>
            <textarea type="text" class="form-control" name="categorie"></textarea>
        </div>

        <button type="submit" class="btn btn-danger" name="validate">Publier la question</button>
   </form>
</body>
</html>