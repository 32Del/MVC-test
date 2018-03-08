<?php
    include_once '../config.php';
    include_once CHEMIN_M.'/connexionDB.php';
    include_once CHEMIN_M.'/personnes.php';
    include_once CHEMIN_M.'/localites.php';
    include_once CHEMIN_M.'/activites.php';
    include_once CHEMIN_M.'/pratiques.php';
    
    $titre = 'suppression d\'une personne';
    $corps = 'supprimePersonne.php';
    
    if (isset($_GET['idPersonne'])){
        $idPersonne = $_GET['idPersonne'];
        $personne = ReadPersonById($idPersonne);
        $nom = $personne['Nom'].' '.$personne['Prenom'];
        $nomId = 'idPersonne='.$idPersonne;
        if (isset($_POST['confirmer'])){
            DeletePerson($idPersonne);
            header('location: listePersonnes.php');
        }
        else if (isset($_POST['annuler'])){
            header('location: listePersonnes.php');
        }
    }
    
    include_once CHEMIN_V.'/vue.php'; 
?>