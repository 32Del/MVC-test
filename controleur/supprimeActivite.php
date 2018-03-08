<?php
    include_once '../config.php';
    include_once CHEMIN_M.'/connexionDB.php';
    include_once CHEMIN_M.'/personnes.php';
    include_once CHEMIN_M.'/localites.php';
    include_once CHEMIN_M.'/activites.php';
    include_once CHEMIN_M.'/pratiques.php';
    
    $titre = 'suppression d\'une activité';
    $corps = 'supprimeActivite.php';
    
    if (isset($_GET['idActivite'])){
        $idActivite = $_GET['idActivite'];
        $Activite = ReadActivityById($idActivite);
        
        $nom = $Activite['NomActivite'];
        $nomId = 'idActivite='.$idActivite;
        if (isset($_POST['confirmer'])){
            DeleteActivity($idActivite);
            header('location: listeActivites.php');
        }
        else if (isset($_POST['annuler'])){
            header('location: listeActivites.php');
        }
    }
    
    include_once CHEMIN_V.'/vue.php'; 
?>