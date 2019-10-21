<?php
    print_r($_POST);
    if (! empty($_POST)){
        echo "<br>prenom:" .$_POST["prenom"]."<br>";
        echo "nom: ".$_POST["nom"]."<br>";
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire PHP</title>
</head>
<body>
    <h1>Formulaire </h1>
     <!--
            Créer un formulaire HTML avec 2 champs: 
                prenom+nom +submit
        -->
    <form method="POST" action="traitement.php" >
                <!-- 
                    method: Permet de préciser quelle méthode POST | GET
                    doit être utilisé par le navigataeur pour transmettre
                    les données saisies par l'utilisateur vers la page "action"
                    -------------------------------------------------------------
                    action: Cet attribut permet de renseigner le script / la page
                    vers laquelle l'utilisateur sera dirigé lors de l'envoi du
                    formulaire. Cette page va recevoir l'ensemble des données 
                    saisies par mon user.--
                -->


        <!-- Prénom -->
        <label for="prenom">Prénom</label>
                <!-- 
                     NE PAS OUBLIER LA PROPRIETE "name"
                     Elle nous permettra d'utiliser la saisie de l'utilisateur 
                     dans  $_POST
                -->

        <input type="text" id="prenom" name="prenom" placeholder="Saisissez votre prénom">
        <!-- Nom -->
        <label for="nom">Nom</label>
        <input type="text"  id="nom" name="nom" placeholder="Saisissez votre nom">

        <input type="submit" value="Envoyer mes informations">

    </form>
</body>
</html>