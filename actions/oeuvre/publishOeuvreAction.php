<?php

require('actions/database.php');

//Valider le formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs ne sont pas vides
    if(!empty($_POST['titre']) AND !empty($_POST['auteur']) AND !empty($_POST['statut']) AND !empty($_POST['description'])) {
        
        //Les données de l'oeuvre
        $oeuvre_titre = htmlspecialchars($_POST['titre']);
        $oeuvre_auteur = nl2br(htmlspecialchars($_POST['auteur']));
        $oeuvre_statut = nl2br(htmlspecialchars($_POST['statut']));
        $oeuvre_description = nl2br(htmlspecialchars($_POST['description']));
        $dateAcquisition = date('d-m-y');
        $oeuvre_id_categorie = nl2br(htmlspecialchars($_POST['categorie']));
        

        //Insérer l'oeuvre
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO Oeuvre(titre, auteur, statut, description, dateAcquisition, id_categorie)VALUES(?, ?, ?, ?, ?, ?)');
        $insertQuestionOnWebsite->execute(
            array(
                $oeuvre_titre,
                $oeuvre_auteur, 
                $oeuvre_statut,
                $oeuvre_description, 
                $dateAcquisition,
                $oeuvre_id_categorie
            )
        );
        
        $successMsg = "Votre oeuvre a bien été publiée sur le site";
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}