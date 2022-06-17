<?php

require('actions/database.php');

//Valider le formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs ne sont pas vides
    if(!empty($_POST['titre']) AND !empty($_POST['auteur']) AND !empty($_POST['statut']) AND !empty($_POST['description'])){
        
        //Les données de l'oeuvre
        $oeuvre_titre = nl2br(htmlspecialchars($_POST['titre']) );
        $oeuvre_auteur = nl2br(htmlspecialchars($_POST['auteur']));
        $oeuvre_statut = nl2br(htmlspecialchars($_POST['statut']));
        $oeuvre_description = nl2br(htmlspecialchars($_POST['description']));
        $oeuvre_image = nl2br(htmlspecialchars($_POST['image']));
        $oeuvre_id_author = $_SESSION['id'];
        $dateAcquisition = date('d-m-y');
        $oeuvre_categorie = $_POST['categorie'];



        //Insérer l'oeuvre
        $bdd = new PDO('mysql:host=mysql-plucas.alwaysdata.net;dbname=plucas_musee;charset=utf8;', 'plucas_admin', 'Admin1003');
        $insertOeuvreOnWebsite = $bdd->prepare('INSERT INTO Oeuvre(titre, auteur, statut, description,image ,id_auteur ,dateAcquisition, id_categorie)VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
        $insertOeuvreOnWebsite->execute(
            array(
                $oeuvre_titre,
                $oeuvre_auteur,
                $oeuvre_statut,
                $oeuvre_description,
                $oeuvre_image,
                $oeuvre_id_author,
                $dateAcquisition,
                $oeuvre_categorie
            )
        );
        
        $successMsg = "Votre oeuvre a bien été publiée sur le site";
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}