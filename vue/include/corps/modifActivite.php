            <div id="contenu">
                <form method="post" action="modifActivite.php?idActivite=<?php echo $idActivite ?>">
                    <h1>Modifier une Activité</h1>
                    <div class="boite3">
                        <label>Activité *</label>
                    </div>
                    <div class="boite3"> 
                        <input type="text" name="activite" value="<?php echo $nomActivite ?>" />
                    </div>
                    <div class="boite3">
                        <label>(* champs obligatoires)</label>
                    </div>
                    <div class="boite3"> 
                        <input type="submit" name="modifier" value="Modifier" />
                    </div>
                    <a href="listeActivites.php">Retour à la liste</a>
                </form>
            </div>