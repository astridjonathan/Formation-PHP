<?php
    require_once 'config/db.php';  

    // Initialisation des valeurs
    $prenom = $nom = $email = $tel = $message = $content = null;
    $type ='devFront';

    // SI $_POST n'est pas vide alors
    if (!empty($_POST)){
        // Affectation des valeurs
        foreach ($_POST as $key=> $value) {
        $$key = $value;
        }
        //Initialisation des Erreurs
        $errors = [];

        // Vérification  des data
        if (empty($prenom)){
            $errors['prenom'] = " Vous avez oubliez le prénom...";
        }
        //Vérification nom
        if (empty($nom)){
            $errors['nom']="Veuillez saisir un nom";
         }
        //Vérification email
         if (empty($email)){
            $errors['email']="Veuillez entrer un email, nomprenom@domaine.com...";
         }
         if ( !empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Vérifier le format votre email...';
        }
         //Vérification tel
         if (empty($tel)){
            $errors['tel']="Veuillez saisir un télephone, 069X XXXXXX...";
         }
         /*if ( !empty(tel) && !filter_var($tel,FILTER_VALIDATE_FLOAT)){
            $errors['tel'] = 'Vérifier le format du téléphone...';
        }*/
         //Vérification du message (Supérieur à 12)
        if (strlen($message) < 12){
            $errors['message'] ='Votre message est top court 12 caractères min';
        } 


        $query = $db->prepare(' INSERT INTO contact (`prenom`, `nom`, `email`, `tel`,`type`,`message`) 
        VALUES (:prenom, :nom, :email, :tel , :type , :message )
        ');
        $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindParam(':nom',$nom, PDO::PARAM_STR);
        $query->bindParam(':email',$email, PDO::PARAM_STR);
        $query->bindParam(':tel',$tel, PDO::PARAM_INT);
        $query->bindParam(':type',$type, PDO::PARAM_INT);
        $query->bindParam(':message',$message, PDO::PARAM_STR);
        $query->execute();

        // Si pas d'erreurs
        if (empty($errors)){
           
            $content = '
                <div class="alert alert-success">
                    <h3> Nous avons bien pris en compte votre demande</h3>
                    <p> Merci '.$prenom. ' ' .$nom. ' d\'avoir rempli ce formulaire <br>
                    Je reviendrais vers vous dans les plus brefs délais<p>
                </div>
           ';
            //Initialisation des variables
            $prenom = $nom = $email =$tel = $message  = null;
            $type='devFront';

        }else {
            $content ='
            <div class="alert alert-danger">
                <h3> Merci de vérifier vos informations... </h3>
            </div>
            ';
        }

    }
?>
<!-- Div container -->
<div class="container mx-auto m-4">
    <form method="POST">
        <fieldset class="border rounded p-3">
            <h2 class="text-center p-3">Me contacter</h2>
            <?= $content ?>
            <!-- Nom et prénom-->
            <div class="row p-2">
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
            <div class="row p-2">
                <div class="form-group col-6">
                    <input type="email" name="email" id="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"" 
                    value ="<?= $email ?>" placeholder="Entrer votre email...">
                    <div class="invalid-feedback">
                        <?= isset($errors['email']) ? $errors['email']:'' ?>
                    </div>
                </div>
                <div class="form-group col-6">
                    <input type="text" name="tel" id="tel" class="form-control <?= isset($errors['tel']) ? 'is-invalid' : '' ?>" value ="<?= $tel?>" placeholder="Entrer votre telephone...">
                    <div class="invalid-feedback">
                        <?= isset($errors['tel']) ? $errors['tel']:'' ?>
                    </div>
                </div>
            </div>
            <!-- Sujet avec un champ radio multiple-->
            <div class="row mx-auto p-2">
                <label for="sujet">Votre demande concerne: </label>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input <?= $type == "devFront" ? 'checked':'' ?>  name="sujet" type="checkbox" class="custom-control-input" value="devFront" id="devFront">
                    <label class="custom-control-label" for="devFront">Développement Front</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input <?= $type == "devMobile" ? 'checked':'' ?>  name="sujet" type="checkbox" class="custom-control-input" value="devMobile" id="devMobile">
                    <label class="custom-control-label" for="devMobile">Développement Mobile</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input <?= $type == "webDesign" ? 'checked':'' ?> name="sujet" type="checkbox" class="custom-control-input" id="design">
                    <label class="custom-control-label" for="design">WebDesign</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input <?= $type == "infog" ? 'checked':'' ?> name="sujet" type="checkbox" class="custom-control-input" value="infog" id="infog">
                    <label class="custom-control-label" for="infog">Infographie</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input <?= $type == "reseau" ? 'checked':'' ?> name="sujet" type="checkbox" class="custom-control-input" value="reseau"i d="reseau">
                    <label class="custom-control-label" for="reseau">Réseaux</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input <?= $type == "community" ? 'checked':'' ?>  name="sujet" type="checkbox" class="custom-control-input" value="community" id="community">
                    <label class="custom-control-label" for="community">Community Management</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input <?= $type == "autres" ? 'checked':'' ?>  name="sujet" type="checkbox" class="custom-control-input" value="autres" id="autres">
                    <label class="custom-control-label" for="autres">Autres</label>
                </div>
            </div>
            <!-- Contenu Message -->
            <div class="row p-2">
                <div class="form-group col">
                    <textarea name="message" class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>" id="message" rows="5" placeholder="Votre message...."><?= $message?></textarea>
                    <div class="invalid-feedback">
                        <?= isset($errors['message']) ? $errors['message']:'' ?>
                    </div>
                </div>
            </div>
            <!-- Bouton -->
            <button type="submit" name="submit" class="btn btn-block btn-warning">Valider</button>

        </fieldset>
    
    </form> <!---fin contenu formulaire-->







</div> <!-- FIN Div container -->