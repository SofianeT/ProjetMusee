<?php

session_start();

$bdd = new PDO('mysql:host=mysql-plucas.alwaysdata.net;dbname=plucas_musee;charset=utf8;', 'plucas_admin', 'Admin1003');
// if(!$_SESSION['mdp']{
//     header('Location: index.php');
// }
?>

<!DOCTYPE html>
<html >
<?php include 'includes/head.php'; ?>   

<head>
    <title>Admin</title>    
    <meta charset="utf-8">
</head>
<body>
<link rel="stylesheet" href="index.css">
<?php include 'includes/navbar.php'; ?>
  
  <?php
     
     $recupUsers = $bdd->query('SELECT * FROM users ');
       while($user = $recupUsers->fetch()){
           
       ?>
         <div class="container">
              <div class="card">
                <div class="card-header">
                     <?= $user['pseudo']; ?>
                </div>
                <div class="card-body">
                   <p>Role : <?= $user['role']; ?> </p>   
                   <p>Nom : <?= $user['nom']; ?> </p> 
                   <p>Prenom : <?= $user['prenom']; ?> </p>     
                </div>
                <div class="card-footer">
                <p> <a href="bannir.php?id=<?= $user['id']; ?>" style="color:brown; text-decoration:none ; "> Bannir le menbre  </a> <?= $user['pseudo']; ?> </p>
                <?php
                 if( $user['role'] == 'admin'){
                   ?>
                    <p> <a href="updateuser.php?id=<?= $user['id']; ?>" style="color:brown; text-decoration:none ; "> Mettre en user   </a> <?= $user['pseudo']; ?> </p>
                 <?php
                  }
                 else{
                   ?>
                 <p> <a href="admin.php?id=<?= $user['id']; ?>" style="color:brown; text-decoration:none ; "> Mettre admin  </a>  <?= $user['pseudo']; ?></p>
                 <?php
                 }
                  ?>
                </div>
              </div>
            </div>
            

              
       
       <?php
       
      }
  ?>
 
 <button id="myBtn"><a href="#top" style="color: white">TOP</a></button>
</body>
</html>