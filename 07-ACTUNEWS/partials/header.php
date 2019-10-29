<?php
    //Connexion à la BDD
    require_once(__DIR__ . '/../config/database.php');
    //$categories = ['Politique', 'Economie', 'Culture','Sports'];
    
    // Récupérations de nos fonctions
    require_once(__DIR__ . '/../functions/categorie.php');
    require_once(__DIR__ . '/../functions/article.php');
    require_once(__DIR__ . '/../functions/global.php');
    
    //---Récupéraation categorie provenant de la bdd ----//
    $categories  =  getCategories();
 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS PERSO -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Guadeloupe Actualités</title>
</head>
<body>

<!-- Menu du site -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Actunews971</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <?php foreach ($categories as $categorie) {?>
                    <li class="nav-item">
                    <a class="nav-link" href="categorie.php?nom_categorie=<?= $categorie['nom'] ?>"><?= $categorie['nom'] ?> </a>
                </li>
                <?php } ?>
            </ul>
            <div class="text-right">
                <a class="nav-item btn btn-outline-primary mx-2" href="connexion.php">Connexion</a>
                <a class="nav-item btn btn-outline-primary mx-2" href="inscription.php">Inscription</a>
            </div>
        </div>
    </nav>
    <!-- Menu du site -->