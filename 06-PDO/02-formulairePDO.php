<?php

    /*
     * Inclusion d ela connexion à la BDD
     * ---------------------------------------
     * Grace au require_once, ma variable $db est maintenant
     * disponbile dans cette page.
     * Je peux donc utiliser $db pour accéder à ma base de données.
     */

    require_once 'config/database.php'; 
    require_once './inc/header.php';

    /*
        OBJECTIF : Réaliser, Valider et Insérer les données
        d'un formulaire.

        CONSIGNE :
            1. Créer une BDD 'contact' permettant de stocker
            les informations d'un formulaire :
                - id
                - email
                - sujet
                - message

            2. Créer un formulaire bootstrap permettant la saisie
            de ces champs.

            3. A la soumission du formulaire, vérifiez les données :
                - Tous les champs sont obligatoire ;
                - Vérifier le format du champ 'email' ;
                - Le 'message' doit avoir 15 caractères minimum.

            4. Insérer les données vérifiées dans votre BDD.

            BONUS : Afficher un message de confirmation / d'erreur
            à l'utilisateur grâce à une alerte bootstrap.
    */

    $prenom = $nom = $email =$tel = $sujet = $message = $content = null;

    if (!empty($_POST)){
         //Affectation des variables
        foreach ($_POST as $key => $value) {
            $$key = $value;
        }
         //Déclaration des erreurs
         $erreurs = [];

         /*------------------------VERIFICATION DATA ----------------------------------*/

         //Vérification prenom
        if (empty($prenom)){
            $errors['prenom']="Veuillez saisir un prénom";
         }
         //Vérification nom
         if (empty($nom)){
            $errors['nom']="Veuillez saisir un nom";
         }
          //Vérification email
         if (empty($email)){
            $errors['email']="Veuillez entrer un email..";
         }
         if ( !empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Vérifier le format votre email.<br>';
        }
         //Vérification tel
         if (empty($tel)){
            $errors['tel']="Veuillez saisir un télephone";
         }
         /*if ( !empty($tel) && !filter_var($tel,FILTER_VALIDATE_INT)){
            $errors['tel'] = 'Vérifier le format du téléphone';
        }*/
         //Vérification du sujet
        if (empty($sujet)){
            $errors['sujet'] ='Vous avez oublié le sujet..';
        } 

        //Vérification du message (Supérieur à 15)
        if (strlen($message) < 15){
            $errors['message'] ='Votre message est top court 15 caractères min.<br>';
        } 

           /*------------------------INSERTION DANS LA BD  ----------------------------------*/
        
           $query = $db->prepare(' INSERT INTO `addcontact` (`prenom`, `nom`, `email`, `tel`,`sujet`,`message`) 
           VALUES (:prenom, :nom, :email, :tel , :sujet , :message )');
           $query->bindParam(':prenom',$prenom, PDO::PARAM_STR);
           $query->bindParam(':nom',$nom, PDO::PARAM_STR);
           $query->bindParam(':email',$email, PDO::PARAM_STR);
           $query->bindParam(':tel',$tel, PDO::PARAM_INT);
           $query->bindParam(':sujet',$sujet, PDO::PARAM_STR);
           $query->bindParam(':message',$message, PDO::PARAM_STR);
           $query->execute();

        // Action à faire si pas d'erreurs
        if (empty($errors)){

            $content ='
                <div class="alert alert-success">
                    <h3> Nous avons bien pris en compte votre demande</h3>
                    <p> Merci '.$prenom. ' ' .$nom. ' d\'avoir rempli ce formulaire <br>
                    Nous reviendrons vers vous dans les plus brefs délais<p>
                </div>

            ';
            $prenom = $nom = $email =$tel = $sujet = $message  = null;
        }else {
            $content ='
            <div class="alert alert-danger">
                <h3> Merci de vérifier vos informations... </h3>
            </div>
            ';
        }

    }

    ?>

    <div class="container mx-auto">
        <form method="POST"  class="m-3">
            <fieldset class="border rounded p-3" >
                <h2 class="text-center">Me Contacter</h2>
                <!-- Nom et prénom-->
                <div class="row">
                    <div class="form-group col-6">
                        <input type="text" name="prenom" id="prenom" value="<?= $prenom?>" placeholder="Entrer votre prénom..."
                        class="form-control <?= isset($errors['prenom']) ? 'is-invalid' : '' ?>" >
                        <div class="invalid-feedback">
                            <?= isset($errors['prenom']) ? $errors['prenom']:'' ?>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <input type="text" name="nom" id="nom" value="<?= $nom?>" placeholder="Entrer votre nom..."
                        class="form-control <?= isset($errors['nom']) ? 'is-invalid' : '' ?>" >
                        <div class="invalid-feedback">
                            <?= isset($errors['nom']) ? $errors['nom']:'' ?>
                        </div>
                    </div>
                    
                </div>
                <!-- Mail/ Tél -->
                <div class="row">
                    <div class="form-group col-6">
                        <input type="email" name="email" id="email" value="<?= $email?>"
                        class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" placeholder="Entrer votre email...">
                        <div class="invalid-feedback">
                            <?= isset($errors['email']) ? $errors['email']:'' ?>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <input type="text" name="tel" id="tel" value="<?= $tel?>"
                        class="form-control <?= isset($errors['tel']) ? 'is-invalid' : '' ?>" placeholder="Entrer votre telephone...">
                        <div class="invalid-feedback">
                            <?= isset($errors['tel']) ? $errors['tel']:'' ?>
                        </div>
                    </div>
                </div>
                <!-- Sujet -->
                <div class="row">
                    <div class="form-group col">
                        <input type="text" name="sujet" id="sujet" value="<?= $sujet?>"
                        class="form-control <?= isset($errors['sujet']) ? 'is-invalid' : '' ?>" placeholder="Entrer un sujet...">
                        <div class="invalid-feedback">
                            <?= isset($errors['sujet']) ? $errors['sujet']:'' ?>
                        </div>
                    </div>
                </div>
                 <!-- Message -->
                 <div class="row">
                    <div class="form-group col">
                        <textarea type="text" name="message" id="message" value="<?= $message?>"
                         class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>" placeholder="Votre message..."></textarea>
                        <div class="invalid-feedback">
                            <?= isset($errors['message']) ? $errors['message']:'' ?>
                        </div>
                    </div>
                </div>
                <!-- Bouton -->
                <button type="submit" name="submit" class="btn btn-block btn-dark">Valider</button>
            </fieldset>
        </form>
    </div>

    <?php
      require_once './inc/footer.php';