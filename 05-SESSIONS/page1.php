<?php

session_start(); // Permet de démarrer une session PHP

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

/**
 *  $_SESSION est une super globale comme $_POST ....
 *  Je vais donc travailler avec un tableau (array)
 */

 $_SESSION['prenom'] = "Astrid";
 $_SESSION['nom'] = "JONATHAN";
 $_SESSION['poste'] = "Gérante";


 unset($_SESSION['poste']); // Supprime de la session une donnée.

 /**
  *     Pour détruire totalement la session pour déconnecter un
  *     utilisateur / vider son panier 
  */

  session_destroy();

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';