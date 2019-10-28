<?php
      require_once '../config/database.php';
      include_once  '../inc/header.php';

      $id= $_GET['id'];
      $query = $db->prepare('SELECT * from addcontact WHERE id= :id');
      $query->bindParam(':id',$id, PDO::PARAM_STR);
      $query->execute();
      $contacts = $query->fetchAll();
        //$contact = $query->fetch();

       
        // $prenom= $contact['prenom'];
        // $nom= $contact['nom'];
        // $email= $contact['email'];
        // $tel= $contact['tel'];
        // $sujet= $contact['sujet'];
        // $message= $contact['message'];
      $content=null;
        if (isset($_GET['id'])){
           $modifier=$db->prepare('UPDATE  addcontact set id= :id, prenom= :prenom, nom= :nom, email= :email, tel= :tel , sujet= :sujet , message=  :message 
            WHERE id = $id');
            $modifier->bindParam(':id',$id, PDO::PARAM_INT);       
            $modifier->bindParam(':prenom',$prenom , PDO::PARAM_STR);
            $modifier->bindParam(':nom',$nom , PDO::PARAM_STR);
            $modifier->bindParam(':email',$email , PDO::PARAM_STR);
            $modifier->bindParam(':tel',$tel, PDO::PARAM_INT);
            $modifier->bindParam(':sujet',$sujet, PDO::PARAM_STR);
            $modifier->bindParam(':message',$message , PDO::PARAM_STR);
        
    
            if ($modifier->execute()){
                $nb= $modifier->rowCount();
                echo '$nb';
                $arr = $req>errorInfo();
                print_r($arr);
                $content ='
                    <div class="alert alert-success">
                        <h3> Modification de votre demande est prise en compte</h3>
                        <p> Vous avez modifié '.$nb. '  colonne(s)</p>
                    </div>

                ';
                header('location: ./03-contact.php');
            }
    }
?>

<div class="container">
    <div class="row">
        <div class="col">
            <form method="post" class="m-4">
            <h2 class="m-2"> Modifier une demande</h2>
                <?= $content?>
                <?php foreach ($contacts as $contact) { ?>
                <div class="row">
                    <div class="form-group col">
                        <input type="text" name="id" id="id" value="<?= isset($contact['id']) ? $contact['id'] : '$id' ?>"
                        class="form-control" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <input type="text" name="prenom" id="prenom" value="<?= isset($contact['prenom']) ? $contact['prenom'] : '$prenom' ?>" placeholder="Entrer votre prénom..."
                        class="form-control" > 
                    </div>
                    <div class="form-group col-6">
                        <input type="text" name="nom" id="nom" value="<?= isset($contact['nom']) ? $contact['nom']: $nom ?>" placeholder="Entrer votre nom..."
                        class="form-control" >
                    </div>                      
                </div>
                    <!-- Mail/ Tél -->
                <div class="row">
                    <div class="form-group col-6">
                        <input type="email" name="email" id="email" value="<?= $contact['email']?>"
                        class="form-control" placeholder="Entrer votre email...">
                    </div>
                    <div class="form-group col-6">
                        <input type="text" name="tel" id="tel" value="<?= $contact['tel']?>"
                        class="form-control" placeholder="Entrer votre telephone...">
                    </div>
                </div>
                    <!-- Sujet -->
                <div class="row">
                    <div class="form-group col">
                        <input type="text" name="sujet" id="sujet" value="<?= $contact['sujet']?>"
                        lass="form-control " placeholder="Entrer un sujet...">
                    </div>
                </div>
                    <!-- Message -->
                <div class="row">
                    <div class="form-group col">
                        <textarea type="text" name="message" id="message" value="<?= $contact['message']?>"
                        class="form-control "><?= $contact['message']?></textarea>
                    </div>
                </div>
                <?php }?>
                    <!-- Bouton -->
                <button type="submit"  class ="btn btn-block btn-warning" name="modifier">Modifier</button>
            </form>
        </div>  
    </div>
</div>
