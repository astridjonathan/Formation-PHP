<?php
/*
    OBJECTIF : Afficher dans un tableau HTML <table>, <tr>, <td>
    les demandes de contacts reçu depuis le formulaire 02.

    CONSIGNE : 
    1. Récupérer les demandes de contacts depuis la base de données.
    2. Afficher dans un tableau HTML à l'aide d'une boucle les demandes reçus.
    3. BONUS : Ajouter un bouton permettant de supprimer un message.

    -----------------------------------------------------
    |   ID   |  EMAIL  |  SUJET  |  MESSAGE  |  ACTION  |
    -----------------------------------------------------
    |   1    | ..@x.xx | deman...| un mess...|    X     |
    |   2    | ..@x.xx | deman...| un mess...|    X     |
    |   3    | ..@x.xx | deman...| un mess...|    X     |

*/
    require_once 'config/database.php';
    include_once  './inc/header.php';
    $content=null;
    $query = $db->prepare('SELECT * from addcontact');
    $query->execute();
    $contacts = $query->fetchAll();
   
    if (isset($_GET['supp'])){
        $id= $_GET['supp'];
        $delete=$db->prepare('DELETE from addcontact WHERE id = :id');
        $delete->bindValue(':id',$id, PDO::PARAM_INT);
            if ($delete->execute()){
                header('location: ./03-contact.php');
            }
    }
?>


<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-dark mt-4">
                <h2 class="text-center mt-2 text-warning">Mes demandes de contact</h2>
                <?= $content ?>
                <thead>
                    <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Sujet</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact) { ?>
                        <!-- creation condition-->
                        <tr>
                            <td><?= $contact['id']?></td>
                            <td><?=$contact['prenom']?></td>
                            <td><?=$contact['nom']?></td>
                            <td><?=$contact['email']?></td>
                            <td><?=$contact['tel']?></td>
                            <td><?=$contact['sujet']?></td>
                            <td><?=$contact['message']?></td>
                            <td><a name="modif" class="btn btn-warning" href="03-contact.php?modif= <?= $contact['id']?>">Modifier</a></td>
                            <td><a name="supp" class="btn btn-danger" href="03-contact.php?supp= <?= $contact['id']?>">Supprimer</a></td>
                        </tr>   
                    <?php }  //fin du foreach ?>
                </tbody>
            </table>    
        </div>
    </div>
</div>