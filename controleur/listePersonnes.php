<?php
    include_once '../config.php';
    include_once CHEMIN_M.'/connexionDB.php';
    include_once CHEMIN_M.'/personnes.php';
    include_once CHEMIN_M.'/localites.php';
    include_once CHEMIN_M.'/activites.php';
    include_once CHEMIN_M.'/pratiques.php';
    
    $titre = 'Liste des personnes';
    $corps = 'listePersonnes.php';
    
    include_once CHEMIN_V.'/vue.php'; 
?>