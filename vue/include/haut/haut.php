<!--
	Auteurs 	: Ivan Perez et Victor Neto
	Projet  	: Gestion de base de données via PHP
	Date    	: 12 Mars 2014
	Description     : entête et menu d'ajout
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <?php
            /**********Vérification du titre...*************/
	
            if(isset($titre) && trim($titre) != '')
                $titre = $titre.' : '.TITRESITE;
            else
                $titre = TITRESITE;
	
            /***********Fin vérification titre...************/
        ?>
        
        <title><?php echo $titre; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="language" content="fr" />
	<link rel="stylesheet" title="Design" href="<?php echo CHEMIN_V; ?>/css/design.css" type="text/css" media="screen" />
        <meta http-equiv="refresh" content="300">
        <script>
            function changeBackground() 
            {
                R = Math.floor((Math.random()*255)+16);
                G = Math.floor((Math.random()*255)+16);
                B = Math.floor((Math.random()*255)+16);
                hexa = R.toString(16)+G.toString(16)+B.toString(16) ;
                document.body.style.background = '#'+hexa;
            }
        </script>
    </head>
    <body>
        <script>
            setInterval(function(){changeBackground()}, 10000);
        </script>
        <div id="page">
	<div id="banniere">
            <a href="index.php">Atelier base de données</a>
	</div>