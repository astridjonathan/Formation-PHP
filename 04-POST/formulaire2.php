<!-- 
	1. Créer un formulaire d'inscription avec les champs suivants : prenom, nom, email et motdepasse

	2. Afficher à l'aide de $_POST les informations
sur la page.
-->


<?php
    if(!empty($_POST)){

        echo '<br> Prénom: '.$_POST['prenom'].'<br>';
        echo '<br> Nom: '.$_POST['nom'].'<br>';
        echo '<br> Email: '.$_POST['email'].'<br>';
        echo '<br> Mot de passe: '.$_POST['password'].'<br>';

    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
    <form method="post" action="#">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" placeholder="Saisissez votre prénom">

        <label for="nom">Nom</label>
        <input type="text"  id="nom" name="nom" placeholder="Saisissez votre nom" value=" <?php if(isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']);?>" >

        <label for="email">Email</label>
        <input type="email"  id="email" name="email" placeholder="Saisissez votre email">

        <label for="password">Mot de Passe</label>
        <input type="password"  id="password" name="password" placeholder="Saisissez votre mot de passe">


        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>