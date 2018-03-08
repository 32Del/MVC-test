<?php
    include_once '../config.php';
    include_once CHEMIN_M.'/connexionDB.php';
    include_once CHEMIN_M.'/personnes.php';
    include_once CHEMIN_M.'/localites.php';
    include_once CHEMIN_M.'/activites.php';
    include_once CHEMIN_M.'/pratiques.php';
    
    $titre = 'Ajouter une localité';
    $corps ='ajoutLocalite.php';
    
    if (isset($_POST['ajouter']))
    {
        if (!empty($_POST['commune']))
        {
            $commune = $_POST['commune'];       
        } 
        AddLocality($_POST['commune']); 
        header ('location: listeLocalites.php');
    }
    
    include_once CHEMIN_V.'/vue.php'; 
?>