<?php 
    session_start(); 
    require('actions/users/showOneUsersProfileAction.php');   
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">
        <?php 
            if(isset($errorMsg)){ echo $errorMsg; }

            if(isset($getHisOeuvres)){

                ?>
                <div class="card">
                    <div class="card-body">
                        <h4>@<?= $user_pseudo; ?></h4>
                        <hr>
                        <p><?= $user_lastname . ' ' . $user_firstname; ?></p>
                    </div>
                </div>
                <br>
                <?php
                while($Oeuvre = $getHisOeuvres->fetch()){ 
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <?= $Oeuvre['titre']; ?>
                        </div>
                        <div class="card-body">
                            <?= $Oeuvre['description']; ?>
                        </div>
                        <div class="card-footer">
                            Par <?= $Oeuvre['pseudo_auteur']; ?> le <?= $Oeuvre['date_publication'];  ?>
                        </div>
                    </div>
                    <br>
                    <?php
                }

            }
        ?>  
    </div>

</body>
</html>