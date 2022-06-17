<?php
require('actions/users/securityAction.php');
require('actions/users/addUserAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
<link rel="stylesheet" href="index.css">
<?php include 'includes/navbar.php'; ?>
<br><br>
<div class="container">



    <form class="container" method="POST">
        <?php
        if(isset($errorMsg)){
            echo '<p>'.$errorMsg.'</p>';
        }elseif(isset($successMsg)){
            echo '<p>'.$successMsg.'</p>';
        }
        ?>
     <div class="mb-3" >
         <label for="exampleInputEmail1" class="form-label">Nom</label>
         <input type="text" class="form-control"  name="nom" placeholder="Nom">
     </div>
    <div class="form-group">
         <label for="exampleInputEmail1" class="form-label">Prénom</label>
        <input type="text" class="form-control"  name="prenom" placeholder="Prénom">
     </div>
     <div class="form-group">
         <label for="exampleInputEmail1" class="form-label">Email</label>
       <input type="email" class="form-control"  name="email" placeholder="Email">
     </div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Mot de passe</label>
        <input type="password" class="form-control"  name="password" placeholder="Mot de passe">
    </div>
     <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Role</label>
         <select class="form-control"  name="role">
            <option value="admin">Admin</option>
            <option value="superadmin">Superadmin</option>
      </select>
     </div>
    <button type="submit" class="btn btn-primary" name="validate" >Ajouter</button>
</form>
</div>

</body>
</html>