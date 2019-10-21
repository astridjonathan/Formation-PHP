<!-- 
	1. Créer un Formulaire de Contact en utilisant Bootstrap avec les champs suivants : email, sujet, message.
-->

<?php
$email = $sujet = $message = null;
    /*$email = null;
    $sujet = null;
    $message = null;*/
    if(!empty($_POST)){ // Si POST n'est pas vide

        //Récupération des données POST
        $email = $_POST['email'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];
         
        // Je déclare un tableau d'erreur vide
        $errors = [];
        
        //Vérification de l'email
        if (empty($email)){
            $errors['email'] = 'Vous avez oublié votre email <br>';
        } 
        // Vérification du format de l'email
        if ( !empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
            /* Si mon $email n'est pas vide, et en meme temps que le format de mon email 
            n'est pas correct , je rentre dans la condition*/
            $errors['email'] = 'Vérifier le format votre email.<br>';
        }

         //Vérification du sujet
        if (empty($sujet)){
            $errors['sujet'] ='Vous avez oublié le sujet.<br>';
        } 

        //  //Vérification du message (Supérieur à 15)
        if (strlen($message) < 15){
            $errors['message'] ='Votre message est top court 15 caractères min.<br>';
        } 

        // Aperçu de $errors
        //print_r($errors);
        if (empty($errors)){
            /* SI mon tableau d'erreurs après toutes ces vérifications est vide..
            Alors il n'y a pas d'erreur et je peux procéder à la suite de mon traitement
            sauvegarde BDD, envoi de mail...... */

        }

}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire PHP & Boostrap</title>
</head>
<body>
    <form class="container mt-4" method="post">
        <fieldset class="border border-info p-2 rounded">
        <h2 class="text-center">Me contacter </h2>
        <!-- Champ Email -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email"  class="form-control <?= isset($errors['email']) ? 'is-invalid' : 'is-valid' ?>" 
        
            id="email" name="email" placeholder="name@example.com" value ="<?= $email?>" >
            <div class="invalid-feedback">
                <?= isset($errors['email']) ? $errors['email'] :'' ?>
            </div>
        </div>
        <!-- Champ Sujet -->
        <div class="form-group">
            <label for="sujet">Sujet: </label>
            <input type="text"  class="form-control <?= isset($errors['sujet']) ? 'is-invalid' : 'is-valid' ?>" 
            id="sujet" name="sujet" placeholder="Entrer un sujet..." value ="<?= $sujet?>">
            <div class="invalid-feedback">
                <?= isset($errors['sujet']) ? $errors['sujet'] :'' ?>
            </div>  
        </div>
        <!-- Champ Message-->
        <div class="form-group">
            <label for="message">Votre message: </label>
            <textarea class="form-control <?= isset($errors['message']) ? 'is-invalid' : 'is-valid'?>" 
            name="message" id="message" rows="3" ><?= $message?></textarea>
            <div class="invalid-feedback">
                <?= isset($errors['message']) ? $errors['message'] :'' ?>
            </div>  
        </div>
        <!-- Bouton -->
        <button type="submit" class="btn btn-block btn-primary">Envoyer</button>
        </fieldset>
    </form>
</body>
</html>