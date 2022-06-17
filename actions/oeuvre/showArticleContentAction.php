<?php

require('actions/database.php');

//Vérifier si l'id de la Oeuvre est rentrée dans l'URL 
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //Récupérer l'identifiant de la Oeuvre
    $idOfTheOeuvre = $_GET['id'];

    //Vérifier si la Oeuvre existe
    $checkIfOeuvreExists = $bdd->prepare('SELECT * FROM Oeuvres INNER Join Categorie ON id_categorie = id  WHERE id = ?');
    $checkIfOeuvreExists->execute(array($idOfTheOeuvre));

    if($checkIfOeuvreExists->rowCount() > 0){

        //Récupérer toutes les datas de la Oeuvres
        $OeuvresInfos = $checkIfOeuvreExists->fetch();

        //Stocker les datas de la Oeuvre dans des variables propres.
        $Oeuvre_title = $OeuvresInfos['titre'];
        $Oeuvre_description = $OeuvresInfos['description'];
        $Oeuvre_categorie = $OeuvresInfos['id_caterogie'];
        $Oeuvre_id_author = $OeuvresInfos['auteur'];
        $Oeuvre_image = $OeuvresInfos['image'];
        $Oeuvre_date_acquisition = $OeuvresInfos['dateAcquisition'];
        
    }else{
        $errorMsg = "Aucune Oeuvre n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune Oeuvre n'a été trouvée";
}