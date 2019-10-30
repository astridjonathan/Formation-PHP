<?php
    
    /*
    OBJECTIF : 
        Développer un système de newsletter.

    EXERCICE :

    I. Créer une base de donnée 'newsletter' permettant de stocker :
        - nomcomplet (prénom + nom) dans le même champ SQL ;
        - email

    II. Créer un Formulaire permettant la saisie de ces champs.

    III. Après vérification (uniquement l'email est obligatoire), 
    insérez les données saisies dans la base.

    IV. Afficher dans un tableau les inscrits

    V. BONUS : Mettez en place un système de désinscription.

*/
    
    
    require_once 'config/database.php'; 
    require_once 'config/dbNewsletter.php';
    include_once  './inc/header.php';

    $nomcomplet = $email= $content = null;

    if (!empty($_POST)){
        //Affectation des variables
        foreach ($_POST as $key => $value) {
            $$key = $value;
        }
         //Déclaration des erreurs
         $errors = [];

    
        //Vérification email
         if (empty($email)){
                $errors['email']="Veuillez entrer un email..";
         }
             if ( !empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Vérifier le format votre email.<br>';
        }

        /******Insertion abonnement */

        if (empty($errors)){
            
               $query = $db->prepare(' INSERT INTO `newsletter` (`nomcomplet`, `email`) 
               VALUES ( :nomcomplet, :email )');
               $query->bindValue(':nomcomplet',$nomcomplet, PDO::PARAM_STR);
               $query->bindValue(':email',$email, PDO::PARAM_STR);
                if ($query->execute()){
                    $content ='
                    <div class="alert alert-success">
                        <h3> Votre enregistrement à notre newsletter a été pris en compte</h3>
                        <p> Merci '.$email.' de votre abonnement <p>
                    </div>

                ';
                  
                }
                $nomcomplet = $email = null;
        }else {
            $content ='
            <div class="alert alert-danger">
                <h3> Merci de vérifier vos informations... </h3>
            </div>
            ';
        }
        
    } // fin if

    /*-------------SE DESABONNER --------*/

    /*if (!empty($_GET)  ?? 0){ //si non vide ou different de 0
      
            $nb= $abo->rowCount();
    

        if (isset($_GET['desabonner'])){
            $id= $_GET['desabonner'];
            $email= $_GET['email']; 
            print_r($id);
            $desabonner=$db->prepare('DELETE from newsletter WHERE email= :email');
            $desabonner->bindValue(':email',$email, PDO::PARAM_STR);
                if ($desabonner->execute()){
                    header('location: ./04-newsletter.php');
                }
        }
    }*/

    
    if (!empty($_GET) ?? 0 ) {
        $email = $_GET['email'];
        $query = $db->prepare('DELETE from newsletter WHERE email = :email');
        $query->bindValue(':email',$email, PDO::PARAM_STR);
            if ($query->execute()){
                $content= '<div class="alert alert-success">
                    Vous ne faites plus parti(e) de notre liste.
                </div>';
            }

    }
?>



		<div class="container p-3 bg-dark text-center p-5 mt-4">
            <h3 class="text-white pb-2">S'ABONNER A LA NEWSLETTER</h3>
            <?= $content ?>
			<form  method="post" class="form-inline mx-auto">
                <div class="row mx-auto">
                    <div class="col">
                        <div class="input-group mb-3 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" name="nomcomplet" value="<?php $nomcomplet ?>"
                            placeholder="Entrez votre nom et votre prénom...">
                        </div>
                        <div class="input-group mb-3 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@example.com</span>
                            </div>
                            <input type="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' :'' ?>"
                            placeholder="Entrez votre email..." value="<?php $email ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['email']) ? $errors['email'] :'' ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-warning ">S'ABONNER<i class="fa fa-envelope"></i></button>
                            
                        </div>   
                                             
                    </div>
                </div>
            </form>
            <hr class="bg-white">
            <div class="col">
                <h2 class="display-4 text-white" >Désinscription</h2
                    <form method="get">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" 
                                placeholder="john.doe@email.com">
                        </div>
                        <button class="btn btn-danger btn-block">
                            Me désinscrire</button>
            </div>
            <!-- <form method="get">
                <div class="col">
                    <div class="input-group mb-3 ">
                        <input type="email" name="email" class="form-control"
                            placeholder="Entrez votre email..." value="<?php $email ?>">
                        <?php if ($_GET['email']  == $_POST['email']  ) { ?>
                        <a name="desabonner" type="submit" class="btn btn-danger " href="04-newsletter.php?desabonner=  <?= $_POST['email'] ?>" >DESABONNER</a>
                                <?php } ?>
                    </div>
                </div>
            </form> -->
		</div>

        <?php require_once './inc/footer.php';?>