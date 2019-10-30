<?php 
    //Récupération du nom de la catégorie
    //$nom_categorie = (isset($_GET['nom_categorie'])) ? $_GET['nom_categorie'] : '';
    $articles = getArticles() ;




?>

<?php
//Inclusion du header sur la page
require_once(__DIR__ . '/partials/header.php');
?>

<!-- Contenu de la page -->

<div class="p-3 mx-auto text-center">
    <h1 class="display-4"><?= $_GET['nom_categorie'] ?></h1>
</div>



<?php
//Inclusion du footer sur la page
require_once(__DIR__ . '/partials/footer.php');
?>
