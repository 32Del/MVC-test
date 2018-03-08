<?php
    include_once '../config.php';
    include_once CHEMIN_M.'/connexionDB.php';
    include_once CHEMIN_M.'/personnes.php';
    include_once CHEMIN_M.'/localites.php';
    include_once CHEMIN_M.'/activites.php';
    include_once CHEMIN_M.'/pratiques.php';
    
    $titre = 'modification d\'une localité';
    $corps = 'modifLocalite.php';
    
    if (isset($_GET['idLocalite']))
    {
        if (isset($_POST['modifier'], $_POST['commune']))
        {
            $idLocalite = $_GET['idLocalite'];
            $nomLocalite = $_POST['commune'];        
            UpdateLocality($idLocalite, $nomLocalite);
            header('location: listeLocalites.php');
        }
        else
        {
            $idLocalite = $_GET['idLocalite'];  
            $localite = ReadLocalityById($idLocalite);
            $nomLocalite = $localite['NomLocalite'];
        }     
    }
    
    include_once CHEMIN_V.'/vue.php';  
?>