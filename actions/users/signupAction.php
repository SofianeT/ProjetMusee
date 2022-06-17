<?php
session_start();
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['email']) AND !empty($_POST['password'])){
        
        //Les données de l'user
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Vérifier si l'utilisateur existe déjà sur le site
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT mail FROM User WHERE mail = ?');
        $checkIfUserAlreadyExists->execute(array($user_email));

        if($checkIfUserAlreadyExists->rowCount() == 0){
            
            //Insérer l'utilisateur dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO User( Nom, Prenom, mail, mdp  )VALUES(?, ?, ?, ? )');
            $insertUserOnWebsite->execute(array( $user_lastname, $user_firstname,$user_email, $user_password));

            //Récupérer les informations de l'utilisateur
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, Nom, Prenom, mail FROM User WHERE Nom = ? AND Prenom = ? AND mail = ?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_email));

            $usersInfos = $getInfosOfThisUserReq->fetch();

            //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['email'] = $usersInfos['mail'];
            $_SESSION['role'] = 'admin';

            //Rediriger l'utilisateur vers la page d'accueil
            header('Location: login.php');

        }else{
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}