<?php

require('actions/database.php');

//Vérifier si l'id de la Oeuvre est bien passé en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfOeuvre = $_GET['id'];

    //Vérifier si la Oeuvre existe
    $bdd = new PDO('mysql:host=mysql-plucas.alwaysdata.net;dbname=plucas_musee;charset=utf8;', 'plucas_admin', 'Admin1003');
    $checkIfOeuvreExists = $bdd->prepare('SELECT * FROM Oeuvre WHERE id = ?');
    $checkIfOeuvreExists->execute(array($idOfOeuvre));

    if($checkIfOeuvreExists->rowCount() > 0){

        //Récupérer les données de la Oeuvre
        $oeuvreInfos = $checkIfOeuvreExists->fetch();
        if($_SESSION['role'] = 'admin' ||$_SESSION['role'] = 'superadmin'){

            //Si l'utilisateur est un admin ou un superadmin, il peut modifier les informations de la Oeuvre
            $oeuvre_title = $oeuvreInfos['titre'];
            $oeuvre_description = $oeuvreInfos['description'];
            $oeuvre_statut = $oeuvreInfos['statut'];
            $oeuvre_auteur = $oeuvreInfos['auteur'];
            $oeuvre_image = $oeuvreInfos['image'];
            $oeuvre_categorie = $oeuvreInfos['id_categorie'];
            $oeuvre_dateAcquisition = $oeuvreInfos['dateAcquisition'];
            $oeuvre_id = $oeuvreInfos['id'];




            $oeuvre_description = str_replace('<br />', '', $oeuvre_description);
            $oeuvre_dateAcquisition = str_replace('<br />', '', $oeuvre_dateAcquisition);

        }else{
            $errorMsg = "Vous n'avez pas le droit de voir cette oeuvre ";
        }

    }else{
        $errorMsg = "Aucune oeuvre n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune oeuvre n'a été trouvée";
}