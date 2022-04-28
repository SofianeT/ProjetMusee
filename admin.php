<?php
 
 session_start();
 $bdd = new PDO('mysql:host=mysql-plucas.alwaysdata.net;dbname=plucas_musee;charset=utf8;', 'plucas_admin', 'Admin1003');
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $id = $_GET['id'];
        $recupererUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
        $recupererUser->execute(array($id));
         if($recupererUser->rowCount() == 1){
             $bannirUser = $bdd->prepare('UPDATE users SET role = "admin" WHERE id = ?');
             $bannirUser->execute(array($id));
             header('Location: backoffice.php');
         }else{
             echo"Ce menbre n'existe pas";
             header('Location: backoffice.php');
         }
    }
        
    

 
?>