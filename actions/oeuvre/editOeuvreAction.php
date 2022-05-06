<?php

require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs sont remplis
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['auteur'])){

        //Les données à faire passer dans la requête
        $new_oeuvre_auteur = htmlspecialchars($_POST['auteur']);
        $new_oeuvre_description = nl2br(htmlspecialchars($_POST['description']));
        $new_oeuvre_statut = nl2br(htmlspecialchars($_POST['statut']));
        
        //Modifier les informations de la question qui possède l'id rentré en paramètre dans l'URL
        $editOeuvreOnWebsite = $bdd->prepare('UPDATE Oeuvre SET titre = ?, description = ?, statut = ? WHERE id = ?');
        $editOeuvreOnWebsite->execute(array($new_oeuvre_auteur, $new_oeuvre_description, $new_oeuvre_statut, $idOfOeuvre));

        //Redirection vers la page d'affichage des questions de l'utilisateur
        header('Location: my-questions.php');

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}