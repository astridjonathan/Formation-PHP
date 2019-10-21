<h1>Page 1</h1>

<!-- 
    Fonctionnement de GET
    http://monurl?cle1=valeur$?cle2=valeur2$?clen=valeurn
    ----------------------------------------------------------
    Le ? marque le début des données GET
    En utilisant cette méthode GET, je peux passer des données
    dans mon url.
-->

<a href="page2.php?titre=la-guadeloupe-est-belle&id=123456&date=21-10-2019">Lien vers la page 2</a>


<?php

    // -- Afficher les informations de $_GET

    //si $_GET n'est pas vide
    if (!empty($_GET)){
        //je peux lire son contenu grâce à $_GET[clé]
        echo 'ID: '.$_GET['id'].'<br>';
        echo 'Titre: '.$_GET['titre'].'<br>';
        echo 'Date: '.$_GET['date'].'<br>';
    }

    
