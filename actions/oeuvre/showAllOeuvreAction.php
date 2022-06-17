<?php

require('actions/database.php');

// Récupérer les Oeuvres par défaut sans recherche
$getAllOeuvres = $bdd->query('SELECT id ,titre, auteur, statut,description, image ,dateAcquisition   FROM Oeuvre  ORDER BY id DESC LIMIT 0,5');

//Vérifier si une recherche a été rentrée par l'utlisateur
if(isset($_GET['search']) AND !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    //Récupérer toutes les Oeuvres qui correspondent à la recherche (en fonction du titre)
    $getAllOeuvres = $bdd->query('SELECT id ,titre, auteur, statut, description , image ,dateAcquisition   FROM Oeuvre  WHERE titre,auteur,description LIKE "%'.$usersSearch.'%" ORDER BY id DESC');


   //Requête pour récupérer les Oeuvres selon le filtre choisi par l'utilisateur (en fonction du statut ou de la catégorie)
     if(isset($_GET['filter']) AND !empty($_GET['filter'])){
         $filter = $_GET['filter'];
         $getAllOeuvres = $bdd->query('SELECT id ,titre, auteur, statut, description , image ,dateAcquisition   FROM Oeuvre  WHERE statut = "'.$filter.'" ORDER BY id DESC');
     }


}