<?php

/*
 *  Ici, nous aurons les fonctions utiles à notre projet
 *  Utilisable sur toutes les pages.
 */

//-- Permet de générer une accroche / un résumé
 function summarize($text){
    //suppression des balises HTML
    $string = strip_tags($text);
    
    // Si mon string est > à 150
    if (strlen($string > 70 )){
        // Je coupe ma chaine à 70
        $stringCut = substr($string, 0 , 70);
        //Je m'assure de couper un mot en recherchant derniere position
        $string = substr($stringCut, 0 , strrpos($stringCut, ' '));
        
    }
    return $string . '...';

 }