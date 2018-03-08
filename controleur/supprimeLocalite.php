<?php
    include_once '../config.php';
    include_once CHEMIN_M.'/connexionDB.php';
    include_once CHEMIN_M.'/personnes.php';
    include_once CHEMIN_M.'/localites.php';
    include_once CHEMIN_M.'/activites.php';
    include_once CHEMIN_M.'/pratiques.php';
    
    $titre = 'suppression d\'une localité';
    $corps = 'supprimeLocalite.php';
    
    if (isset($_GET['idLocalite']))
    {
        $idLocalite = $_GET['idLocalite'];
        $localite = ReadLocalityById($idLocalite);
        $nom = $localite['NomLocalite'];
        $nomId = 'idLocalite='.$idLocalite;
        if (isset($_POST['confirmer']))
        {
            DeleteLocality($idLocalite);
            header('location: listeLocalites.php');
        }
        else if (isset($_POST['annuler']))
        {
            header('location: listeLocalites.php');
        }
    }
    
    
    include_once CHEMIN_V.'/vue.php';  
?>