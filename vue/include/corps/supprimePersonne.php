        <div id="contenu">
            <h1>Supprimer la personne : <?php echo $nom; ?></h1>
            <p>
                Êtes-vous sûr de vouloir supprimer <?php echo $nom; ?> ?
            </p>
            <form method="post" action="supprimePersonne.php?<?php echo $nomId ?>">
                <input type="submit" name="confirmer" value="Confirmer" />
                <input type="submit" name="annuler" value="Annuler" />
            </form>
	</div>