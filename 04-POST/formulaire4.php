<!-- 
        1. A l'aide de bootstrap, créez un formulaire, permettant de déposer une annonce. Vous utiliserez les champs suivants :
            -- Un champ select : Choisissez une catégorie
            -- Un champ radio : Type d'annonce : Offres / Demandes
            -- un champ texte : Titre de l'annonce
            -- un champ textarea : Texte de l'annonce
            -- un champ texte : Prix de l'annonce
        
        2. A la soumission du formulaire, vous vérifierez les données transmisent par l'utilisateur.

        3. Si elles sont correctes, vous afficherez un récapitulatif sur la page.
     -->

<?php 

    //Initalisation des variables
    $categorie =  $titre = $annonce = $prix = $content = null;
    $type = 'offres';
 
    if (!empty($_POST)){ // si $_POST n'est pas vide
        //Affectation des variables
        /*$categorie = $_POST['categorie'];
        $type = $_POST['type'];
        $titre = $_POST['titre'];
        $annonce= $_POST['annonce'];
        $prix = $_POST['prix'];*/

        /**
         * AU lieu de faire une affectation manuelle, vous pouvez
         * automatiser la création des variables
         * --------------------------------------------------------------
         * La création de variables dynamiques en PHP
         * https://www.php.net/manual/fr/language.variables.variable.php
         */
        foreach($_POST as $cle => $valeur){
            $$cle = $valeur;
        }

        // Initialisation du tableau d'erreurs
        $errors =[];

        if (empty($categorie)){
            $errors['categorie']= "Veuillez saisir une catégorie";
        }
        
        if (empty( $type)){
            $errors['type']= "Veuillez cocher le type de l'annonce";
        }
       
        if (empty($titre)){
            $errors['titre']= "Veuillez entrer un titre pour l'annonce";
        }
        if (strlen($annonce)<20){
            $errors['annonce']= "Veuillez entrer un texte avec 12 caractères min";
        }

        if (empty($prix)){
            $errors['titre']= "Veuillez entrer un prix pour l'annonce";
        }
        
        if (!empty($prix) && !filter_var($prix,FILTER_VALIDATE_FLOAT) ){
            $errors['prix']= "Vérifier le format de votre prix";
        }
       

        if(empty($errors) ){
            $content = '
                <div class="alert alert-success">
                Merci, votre annonce: <strong>'.$titre.'</strong>
                à bien été publiée !
                <ul>
                <li>Catégorie choisie:'.$categorie.'</li>
                <li>Type choisi: '.$type.' </li>
                <li>Titre: '.$titre.'</li>
                <li class="text-justify"> Description: '.$annonce.' </li>
                <li>Prix: '.$prix.'€</li>
                </ul>
                </div>
            ';            
                // --Réinitalisation des variables (pour effacer le formulaire) sans réinitialiser le content
                $categorie =  $titre = $annonce = $prix  = null;
                $type = 'offres';
        } else {
            $content = '
                    <div class="alert alert-danger">
                        Attention, veuillez bien remplir vos champs.
                    </div>
                ';
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
    <title>Déposer une annonce</title>
</head>
<body>
    <div class="container ">
        <div class="row">
            <div class="col-sm-8  offset-sm-2 mx-auto">
                <form class="mt-4" method="post">
                    <fieldset class="border border-dark rounded p-2" >
                        <h2 class="text-center">Déposer une annonce</h2>
                        <?= $content ?>
                        <!-- Champ Catégorie-->
                        <div class="form-group">
                            <label class="font-weight-bold" for="categorie">Choisissez une catégorie</label>
                            <select class="form-control  <?= isset($errors['categorie']) ? 'is-invalid' : '' ?>"  name="categorie" id="categorie" value="<?= $categorie ?>">
                            <option value=" 0 " selected> -- Nos catégories: --</option>
                            <option <?= $categorie == 'voiture' ? 'selected':'' ?> value="voiture">Voiture</option>
                            <option <?= $categorie == "logement" ? 'selected':'' ?> value="logement">Logement</option>
                            <option <?= $categorie == "multimedia" ? 'selected':'' ?> value="appareil">Multimedia</option>
                            <option <?= $categorie == "ameublement" ? 'selected':'' ?> value="ameublement">Ameublement</option>
                            <option <?= $categorie == "divers" ? 'selected':'' ?>value="divers">Divers</option>
                            </select>
                            <div class="invalid-feedback">
                                    <?= isset($errors['categorie']) ? $errors['categorie'] :'' ?>
                            </div>
                        </div>
                        <!-- Champ Offres/Demandes-->
                        <div class="form-group">  
                           
                            <label class="font-weight-bold" for="offre">Sélectionner un type d'annonce</label>
                            <div class="form-check form-check-inline">
                            <input <?= $type == "offres" ? 'checked':'' ?> class="form-check-input" type="radio" name="type" id="offres" value="offres">
                            <label class="form-check-label" for="offres">Offres</label>
                            </div>
                            <div class="form-check">
                            <input <?= $type == "demandes" ? 'checked':'' ?>  class="form-check-input" type="radio" name="type" id="demandes" value="demandes">
                            <label class="form-check-label" for="demandes">Demandes</label>
                            </div>
                             
                        </div>
                        <!-- Champ Titre-->
                        <div class="form-group">
                            <label class="font-weight-bold" for="titre">Titre de l'annonce</label>
                            <input type="text" name="titre" class="form-control  <?= isset($errors['titre']) ? 'is-invalid' : '' ?>"  
                            id="titre" value="<?= $titre?>" placeholder="Vente de mon mixeur.." >
                            <div class="invalid-feedback">
                                <?= isset($errors['titre']) ? $errors['titre'] :'' ?>
                            </div>
                        </div>
                        <!-- Champ Description-->
                        <div class="form-group">
                            <label class="font-weight-bold" for="texte">Description</label>
                            <textarea name="annonce" class="form-control  <?= isset($errors['annonce']) ? 'is-invalid' : '' ?>"  id="texte" rows="3"><?= $annonce?></textarea>
                            <div class="invalid-feedback">
                                <?= isset($errors['annonce']) ? $errors['annonce'] :'' ?>
                            </div>
                        </div>
                         <!-- Champ Prix -->
                         <div class="input-group mb-3">
                            <input type="text" name="prix" value="<?= $prix ?>" 
                                class="form-control <?= isset($errors['prix']) ? 'is-invalid' : '' ?>" placeholder="Prix de l'annonce...(ex:25€)">
                            <div class="input-group-append">
                                <span class="input-group-text">&euro;</span>
                            </div>
                            <div class="invalid-feedback">
                                <?= isset($errors['prix']) ? $errors['prix'] :'' ?>
                            </div>
                        </div>

                        <!-- Bouton -->
                        <button type="submit" name="submit" class="btn btn-block btn-dark">Valider</button>
                    </fieldset>

                </form>
            </div>
        </div>
    </div>


</body>
</html>