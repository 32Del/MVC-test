<?php
    include_once '../config.php';
    include_once CHEMIN_M.'/connexionDB.php';
    include_once CHEMIN_M.'/personnes.php';
    include_once CHEMIN_M.'/localites.php';
    include_once CHEMIN_M.'/activites.php';
    include_once CHEMIN_M.'/pratiques.php';
    
    $titre = 'modification d\'une personne';
    $corps = 'modifPersonne.php';
    
    if (isset($_GET['idPersonne']))
    { 
        if (isset($_POST['modifier']))
        {
            $idPersonne = $_GET['idPersonne'];
            $nom = $_POST['Nom'];
            $prenom = $_POST['Prenom'];
            $DateNaissance = $_POST['DateNaissance'];
            if ($_POST['localites'] != "NULL")
            {
                $idLocalite = $_POST['localites']; 
            }
            UpdatePerson($idPersonne, $nom, $prenom, $DateNaissance, $idLocalite);
            UpdatePracticesByPerson($idPersonne, $_POST['activites']);
            header('location: listePersonnes.php');
        }
        else
        {
            $personne = ReadPersonById($_GET['idPersonne']);
            $idPersonne = $personne['idPersonne'];
            $nom = $personne['Nom'];
            $prenom = $personne['Prenom'];
            $DateNaissance = $personne['DateNaissance'];
            $idLocalite = $personne['idLocalite'];
        }
    }
    
    include_once CHEMIN_V.'/vue.php';
?>