<?php

try {
    //$db = new PDO('mysql:host=localhost;dbname=formContact'', 'root', '');
    $db = new PDO('mysql:host=localhost;dbname=formContact', 'root', 'root'); // pour mac
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
