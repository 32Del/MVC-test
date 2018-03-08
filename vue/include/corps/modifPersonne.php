            <div id="contenu">
                <form method="post" action="modifPersonne.php?idPersonne=<?php echo $idPersonne ?>">
                    <h1>Modifier une personne</h1>
                    <div class="boite3">
                        <label>Nom *</label>
                    </div>
                    <div class="boite3"> 
                        <input type="text" name="Nom" value="<?php echo $nom ?>" />
                    </div>
                    <div class="boite3">    
                        <label>Prénom *</label>
                    </div>
                    <div class="boite3"> 
                        <input type="text" name="Prenom" value="<?php echo $prenom ?>" />
                    </div>    
                    <div class="boite3">
                        <label>Date de Naissance *</label>
                    </div>
                    <div class="boite3"> 
                        <input type="text" name="DateNaissance" value="<?php echo $DateNaissance ?>" />
                    </div>    
                    <div class="boite3"> 
                        <label>Localité</label>
                    </div>
                    <div class="boite3"> 
                        <select name="localites">
                            <option value="NULL">---</option>
                                <?php
                                    $localites = ReadLocalities();
                                    foreach ($localites as $localite)
                                    { 
                                ?>
                            
                            <option value=
                                <?php 
                                    echo '"'.$localite['idLocalite'].'" '; 
                                    if ($idLocalite == $localite['idLocalite'])
                                    {
                                        echo 'selected="selected"';
                                    }
                                    echo ' >';
                                    echo $localite['NomLocalite']; 
                                ?>
                                    
                            </option>
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
                            foreach ($Activites as $Activite)
                            {
                        ?>
                        
                        <input type="checkbox" name="activites[]"  value="<?php echo $Activite['idActivite'].'"'; 
                                $activitesPersonne = ReadPracticesByPerson($idPersonne);
                                if ($activitesPersonne != NULL)
                                {
                                    foreach ($activitesPersonne as $ActivitePersonne)
                                    {
                                        if ($ActivitePersonne == $Activite['idActivite'])
                                        {
                                            echo 'checked';    
                                        }
                                    }
                                }
                            ?> />     
                        <?php 
                            echo $Activite['NomActivite'].'<br/>'; 
                            }
                        ?> 
                            
                    </div>    
                    <div class="boite3">
                        <label>(* champs obligatoires)</label>
                    </div>
                    <div class="boite3"> 
                        <input type="submit" name="modifier" value="Modifier" />
                    </div>
                    <a href="listePersonnes.php">Retour à la liste</a>
                </form>
            </div>