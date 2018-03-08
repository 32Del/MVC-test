            <div id="contenu">
                <form method="post" action="modifLocalite.php?idLocalite=<?php echo $idLocalite ?>">
                    <h1>Modifier une localité</h1>
                    <div class="boite3">
                        <label>Commune *</label>
                    </div>
                    <div class="boite3"> 
                        <input type="text" name="commune" value="<?php echo $nomLocalite ?>" />
                    </div>
                    <div class="boite3">
                        <label>(* champs obligatoires)</label>
                    </div>
                    <div class="boite3"> 
                        <input type="submit" name="modifier" value="Modifier" />
                    </div>
                    <a href="listeLocalites.php">Retour à la liste</a>
                </form>
            </div>