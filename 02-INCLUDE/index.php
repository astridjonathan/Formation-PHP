<?php

    //Dossier dans lequel est situé le fichier
    // var_dump(__DIR__);
     /**
      *  include_once permet d'inclure le fichier une seule
      *  et UNIQUE fois. Si je réécris include_once.
      *  Il ne sera pas inclus.
      *  ---------------------------------------------------
      *  Include permet d'inclure le fichier autant de fois que voulu
      */

    include_once 'a.php';
    include 'a.php';
    include 'a.php';
    include_once 'a.php'; // rien ne s'affiche
    include_once 'c.php'; // Warning include(): Failed openng 'c.php'

    require 'b.php';
    require_once 'b.php'; // Ne s'affichera pas
    require_once 'b.php'; // Ne s'affichera pas

    require_once 'c.php'; // Fatal error: require_once 
    echo 'Reste du SITE';

    /*
        include : génère un warning, le script continu normalement
        require : génère une fatal error, le script s'arrête
    */