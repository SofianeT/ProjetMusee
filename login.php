<?php require('actions/users/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    
    <br><br>
    <img src="img/1.png" class="rounded mx-auto d-block " alt="..." style="max-height: 400px">
    <h1 class="text-center">CosMuseum</h1>
    <form class="container" method="POST">

        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" name="mail">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
        <br><br>
    </form>

</body>
</html