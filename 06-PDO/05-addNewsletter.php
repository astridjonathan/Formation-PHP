<?php

    require_once 'config/database.php';
    require_once 'config/dbNewsletter.php';
    include_once  './inc/header.php';

    $content=null;
    $query = $db->prepare('SELECT * from newsletter');
    $query->execute();
    $contacts = $query->fetch();


?>

    <div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-dark mt-4">
                <h2 class="text-center mt-2 text-warning">Mes Demandes de Newsletter</h2>
                <?= $content ?>
                <thead>
                    <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Nom Complet</th>
                    <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody class="mx-auto">
                    <?php
                        if (empty($contacts)){?>
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-warning">
                                        Pas de demande pour le moment....
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php foreach ($contacts as $contact) { ?>
                        <!-- creation condition-->
                        <tr >
                            <td><?= $contact['id']?></td>
                            <td><?=$contact['nomcomplet']?></td>
                            <td><?=$contact['email']?></td>

                        </tr>   
                    <?php }  //fin du foreach ?>
                </tbody>
            </table>    
        </div>
    </div>
</div>

<?php include_once  './inc/footer.php';?>