        <div id="contenu">
            <div class="liste">
                <h1>Liste des Activités</h1>
                <div id="detailed">
                    <div class="boxLocAct">Activité</div>
                    <div class="boxPersonnes">Personnes</div>
                    <div class="boxBouton">Édition</div>
                </div> 
                <?php
                    $Activites = ReadActivities();
                    if ($Activites != FALSE)
                    {                        
                        foreach ($Activites as $Activite)
                        {
                ?>   
                
                <div class="boxLocAct"> 
                    <?php                     
                        echo $Activite['NomActivite']; 
                    ?>  
                    
                </div>
                <div class="boxPersonnes"> 
                    <?php                     
                        $personnes = ReadPersonsByPractice($Activite['idActivite']);
                        if ($personnes)
                        {         
                            foreach ($personnes as $idPersonne)
                            {
                                $personne = ReadPersonById($idPersonne);
                                echo $personne['Nom'].' '.$personne['Prenom'].'</br>';
                            }
                        }
                    ?>
                    
                </div> 
                <div class="boxBouton">
                    <input type="button" value="modifier" onclick="location.href='modifActivite.php?idActivite=<?php echo $Activite['idActivite'] ?>';">
                    <?php
                        if (!$personnes)
                        {
                    ?>
                    
                    <input type="submit" value="Supprimer" onclick="location.href='supprimeActivite.php?idActivite=<?php echo $Activite['idActivite'] ?>';" />
                    <?php
                        }
                    ?>
                    
                </div>
                <?php
                        }
                    }
                ?>  
                
            </div>
	</div>