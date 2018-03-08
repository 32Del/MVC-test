        <div id="contenu">
            <div class="liste">
                <h1>Liste des localités</h1>
                <div id="detailed">
                    <div class="boxLocAct">Localités</div>
                    <div class="boxPersonnes">Personnes</div>
                    <div class="boxBouton">Édition</div>
                </div> 
                <?php
                    $localites = ReadLocalities();
                    if ($localites != FALSE)
                    {                        
                        foreach ($localites as $localite)
                        {
                ?>    
                
                <div class="boxLocAct"> 
                    <?php                     
                        echo $localite['NomLocalite']; 
                    ?>    
                
                </div>
                <div class="boxPersonnes"> 
                    <?php                     
                        $personnes = ReadPersonsByLocality($localite['idLocalite']);
                        AffichePersonnes($personnes, 'Nom', 'Prenom');
                    ?>
                    
                </div> 
                <div class="boxBouton">
                    <input type="button" value="modifier" onclick="location.href='modifLocalite.php?idLocalite=<?php echo $localite['idLocalite'] ?>';">
                    <?php
                        if (!$personnes){
                    ?>
                    
                    <input type="submit" value="Supprimer" onclick="location.href='supprimeLocalite.php?idLocalite=<?php echo $localite['idLocalite'] ?>';" />
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