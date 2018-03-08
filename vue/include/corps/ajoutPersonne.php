            <div id="contenu">
                <form method="post" action="ajoutPersonne.php">
                    <h1>Ajouter une personne</h1>
                    <div class="boite3">
                        <label>Nom *</label>
                    </div>
                    <div class="boite3"> 
                        <input type="text" name="Nom" />
                    </div>
                    <div class="boite3">    
                        <label>Prénom *</label>
                    </div>
                    <div class="boite3"> 
                        <input type="text" name="Prenom" />
                    </div>   
                    <div class="boite3">
                        <label>Date de Naissance(JJJJ-MM-DD) *</label>
                    </div>
                    <div class="boite3"> 
                        <input type="text" name="DateNaissance" />
                    </div>
                    <div class="boite3"> 
                        <label>Localité</label>
                    </div>
                    <div class="boite3"> 
                        <select name="localites">
                            <option value="NULL">---</option>
                            <?php
                                $localites = ReadLocalities();
                                foreach ($localites as $localite){ 
                            ?>
                            
                            <option value=<?php echo '"'.$localite['idLocalite'].'" >'.$localite['NomLocalite'] ?></option>
                            <?php
                                }
                            ?>
                            
                        </select>
                    </div>    
                    <div class="boite3">
                        <label>Activités</label>
                    </div>
                    <div class="boite3"> 
                        <?php
                            $Activites = ReadActivities();
                            foreach ($Activites as $Activite){
                        ?>
                        
                        <input type="checkbox" name="activites[]"  value="<?php echo $Activite['idActivite']; ?>" /> <?php echo $Activite['NomActivite']; ?> <br/>    
                        <?php
                            }
                        ?>
                        
                    </div> 
                    <div class="boite3">
                        <label>(* champs obligatoires)</label>
                    </div>
                    <div class="boite3"> 
                        <input type="reset" name="reset" value="Effacer" />
                        <input type="submit" name="ajouter" value="Ajouter" />
                    </div>
                </form>                   
            </div>