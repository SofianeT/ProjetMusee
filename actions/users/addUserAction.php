<?php

require('actions/database.php');


//Valider le formulaire
    if(isset($_POST['validate'])){

        //Vérifier si les champs ne sont pas vides du formulaire d'ajout d'utilisateur
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['role'])){

            //Les données de l'utilisateur
            $user_nom = nl2br(htmlspecialchars($_POST['nom']) );
            $user_prenom = nl2br(htmlspecialchars($_POST['prenom']) );
            $user_email = nl2br(htmlspecialchars($_POST['email']));
            $user_password = nl2br(htmlspecialchars($_POST['password']));
            $user_role = nl2br(htmlspecialchars($_POST['role']) );


            //Insérer l'utilisateur
            $bdd = new PDO('mysql:host=mysql-plucas.alwaysdata.net;dbname=plucas_musee;charset=utf8;', 'plucas_admin', 'Admin1003');
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO User( prenom, nom, mail, mdp, role)VALUES(?, ?, ?, ?, ?)');
            $insertUserOnWebsite->execute(
                array(
                    $user_prenom,
                    $user_nom,
                    $user_email,
                    $user_password,
                    $user_role
                )
            );

            $successMsg = "Votre utilisateur a bien été ajouté sur le site";





        }
        else{
            $errorMsg = "Veuillez compléter tous les champs...";
        }

    }

