<?php

require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs sont remplis
    if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['auteur'])){

        //Les données à faire passer dans la requête
        $new_oeuvre_titre = nl2br(htmlspecialchars($_POST['titre']));
        $new_oeuvre_auteur = nl2br(htmlspecialchars($_POST['auteur']));
        $new_oeuvre_statut = nl2br(htmlspecialchars($_POST['statut']));
        $new_oeuvre_description = nl2br(htmlspecialchars($_POST['description']));
        $new_oeuvre_image = nl2br(htmlspecialchars($_POST['image']));
        $new_dateAcquisition = date('d-m-y');
        $new_oeuvre_categorie = $_POST['categorie'];

        
        //Modifier les informations de la Oeuvre qui possède l'id rentré en paramètre dans l'URL

        // Requête SQL pour modifier les informations de la Oeuvre qui possède l'id rentré en paramètre dans l'URL dans la base de données
        $bdd = new PDO('mysql:host=mysql-plucas.alwaysdata.net;dbname=plucas_musee;charset=utf8;', 'plucas_admin', 'Admin1003');
        $updateOeuvre = $bdd->prepare('UPDATE Oeuvre SET titre = ?, auteur = ?, statut = ?, description = ?, image = ?, dateAcquisition = ?, id_categorie = ? WHERE id = ?');
        $updateOeuvre->execute(
            array(
                $new_oeuvre_titre,
                $new_oeuvre_auteur,
                $new_oeuvre_statut,
                $new_oeuvre_description,
                $new_oeuvre_image,
                $new_dateAcquisition,
                $new_oeuvre_categorie,
                $_GET['id']
            )
        );

        //Redirection vers la page d'affichage des Oeuvres de l'utilisateur
        header('Location: index.php');

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}