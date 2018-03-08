<?php
    include_once '../config.php';
    include_once CHEMIN_M.'/connexionDB.php';
    include_once CHEMIN_M.'/personnes.php';
    include_once CHEMIN_M.'/localites.php';
    include_once CHEMIN_M.'/activites.php';
    include_once CHEMIN_M.'/pratiques.php';
     
    $titre = 'Liste des localités';
    $corps = 'listeLocalites.php';
    
    /**
     * Affiche une liste de personnes donnée
     * @param tableau associatif - $personnes Le tableau des peronnes à afficher
     * @param string - $IndexNom - L'index du nom dans le tableau de personnes
     * @param string - $IndexPrenom - L'index du prénom dans le tableau de personnes
     */
    function AffichePersonnes($personnes, $IndexNom, $IndexPrenom)
    {
        if ($personnes)
        {         
            foreach ($personnes as $personne)
            {
                echo $personne[$IndexNom].' '.$personne[$IndexPrenom].'</br>';
            }
        }
    }
    
    include_once CHEMIN_V.'/vue.php';
?>