<?php
    include_once '../config.php';
    include_once CHEMIN_M.'/connexionDB.php';
    include_once CHEMIN_M.'/personnes.php';
    include_once CHEMIN_M.'/localites.php';
    include_once CHEMIN_M.'/activites.php';
    include_once CHEMIN_M.'/pratiques.php';
    
    $titre = 'Ajouter une personne';
    $corps = 'ajoutPersonne.php';
    
    if (isset($_POST['ajouter']))
    {
        if (!empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['DateNaissance']))
        {
            $Nom = $_POST['Nom'];
            $Prenom = $_POST['Prenom'];
            $DateNaissance = $_POST['DateNaissance'];
            if ($_POST['localites'] != "NULL")
            {
                $idLocalite = $_POST['localites'];
            }
        }
        $id = AddPerson($Nom, $Prenom, $DateNaissance, $idLocalite);
        UpdatePracticesByPerson($id, $_POST['activites']);
        header ('location: listePersonnes.php');
    }
    
    include_once CHEMIN_V.'/vue.php';
?>