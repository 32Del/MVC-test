<?php
    include_once '../config.php';
    include_once CHEMIN_M.'/connexionDB.php';
    include_once CHEMIN_M.'/personnes.php';
    include_once CHEMIN_M.'/localites.php';
    include_once CHEMIN_M.'/activites.php';
    include_once CHEMIN_M.'/pratiques.php';
    
    $titre = 'modification d\'une activite';
    $corps = 'modifActivite.php';
    
    if (isset($_GET['idActivite']))
    {
        if (isset($_POST['modifier'], $_POST['activite']))
        {
            $idActivite = $_GET['idActivite'];
            $nomActivite = $_POST['activite'];        
            UpdateActivity($idActivite, $nomActivite);
            header('location: listeActivites.php');
        }
        else
        {
            $idActivite = $_GET['idActivite'];  
            $Activite = ReadActivityById($idActivite);
            $nomActivite = $Activite['NomActivite'];
        }     
    }

    include_once CHEMIN_V.'/vue.php';
?>