<?php 

session_start(); // Lorsque j'effectue une session start, la session 
                // n'est pas recréee, car elle existe déjà.

// -- Il faut OBLIGATOIREMENT déclarer session_start() pour accéder à la $_SESSION.

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';