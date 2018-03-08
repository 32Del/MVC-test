<?php
    include_once '../config.php';
    include_once CHEMIN_M.'/connexionDB.php';
    include_once CHEMIN_M.'/personnes.php';
    include_once CHEMIN_M.'/localites.php';
    include_once CHEMIN_M.'/activites.php';
    include_once CHEMIN_M.'/pratiques.php';
    
    $titre = 'Ajouter une activité';
    $corps = 'ajoutActivite.php';
    
    if (isset($_POST['ajouter']))
    {
        if (!empty($_POST['activite'])){
            $activite = $_POST['activite'];       
        } 
        AddActivity($activite); 
        header ('location: listeActivites.php');
    }
    
    include_once CHEMIN_V.'/vue.php'; 
?>