        <div id="contenu">
            <div class="liste">
                <h1>Liste des personnes</h1>
                <div id="detailed">
                    <div class="boite1">id</div>
                    <div class="boite2">Nom</div>
                    <div class="boite2">Prenom</div>
                    <div class="boite2">Date de naissance</div>
                    <div class="boite2">localité</div>
                    <div class="boite2">Depuis</div>
                    <div class="boite2">activité</div>
                    <div class="boite2">edition</div>
                </div>	
                <?php
                    $personnes = ReadPersons();
                    foreach ($personnes as $personne)
                    {
                        $localites = ReadLocalityById($personne['idLocalite']);   
                ?>
                
                <div id="<?php echo $personne['idPersonne'] ?>">
                    <div class="boite1"><?php echo $personne['idPersonne']; ?></div>
                    <div class="boite2"><?php echo $personne['Nom']; ?></div>
                    <div class="boite2"><?php echo $personne['Prenom']; ?></div>
                    <div class="boite2"><?php echo $personne['DateNaissance']; ?></div>
                    <div class="boite2"><?php echo $localites['NomLocalite']; ?></div>
                    <div class="boite2"><?php echo $personne['Depuis']; ?></div>
                    <div class="boite2">
                        <?php 
                            $Activites = ReadPracticesByPerson($personne['idPersonne']);
                            if ($Activites != FALSE)
                            {
                                foreach ($Activites as $Activite){ 
                        ?>
            
                        <ul>
                            <li>
                                <?php 
                                    $pratique = ReadActivityById($Activite);
                                    echo $pratique['NomActivite'];
                                ?>
                      
                            </li>
                        </ul>
                        <?php
                                }
                            }
                        ?>
                            
                    </div>
                    <div class="boite2">
                        <input type="button" value="Delete" onclick="location.href='supprimePersonne.php?idPersonne=<?php echo $personne['idPersonne'] ?>';">
                        <input type="button" value="modify" onclick="location.href='modifPersonne.php?idPersonne=<?php echo $personne['idPersonne'] ?>';">
                    </div>
                </div>
                <?php
                    }
                ?>
                
            </div>
        </div>
		