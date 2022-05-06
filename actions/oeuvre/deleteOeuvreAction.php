<?php

//Vérifier si l'utilisateur est authentifié au niveau du site
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}

require('../database.php');

//Vérifier si l'id est rentré en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //L'id de la question en paramète
    $idOfTheOeuvre = $_GET['id'];

    //Vérifier si la question existe
    $checkIfOeuvreExists = $bdd->prepare('SELECT titre FROM oeuvre WHERE id = ?');
    $checkIfOeuvreExists->execute(array($idOfTheQuestion));

    if($checkIfOeuvreExists->rowCount() > 0){

        //Récupérer les infos de la question
        $questionsInfos = $checkIfOeuvreExists->fetch();
        if(isset($_SESSION['auth']) AND $_SESSION['role'] == 'superadmin'){

            //Supprimer la question en fonction de son id rentré en paramètre
            $deleteThisOeuvre = $bdd->prepare('DELETE FROM Oeuvre WHERE id = ?');
            $deleteThisOeuvre->execute(array($idOfTheOeuvre));

            //Rediriger l'utilisateur vers ses questions
            header('Location: ../../index.php');

        }else{
            echo "Vous n'avez pas le droit de supprimer !";
        }

    }else{
        echo "Aucune oeuvre n'a été trouvée";
    }


}else{
    echo "Aucune oeuvre n'a été trouvée";
}
