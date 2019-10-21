
    <!-- Inclusion du Header -->
    <?php
     include_once './inc/header.php';
     ?>

     <?php
        //Apperçu des données $_GET
        print_r($_GET);

        //Si $_GET n'est pas vide
        if( !empty($_GET['page'])){
            //Je crée une variable $page
            $page = $_GET['page'];
        }else {
            $page = 'accueil';
        }
 
     ?>
     <!-- Afficher les données $page -->
     <h3> Je suis la page <?= $page ?></h3>
    
     <!-- 
         On inclus $page dans notre fichier
         include './pages/accueil.php'
         include './pages/presentation.php'
         -------------------------------------
         si $page OU $_GET['page'] égale à accueil
         alors j'inclus accueil.php dans ma page.
         Pareil pour les autres pages.
     -->
     
    <?php include 'pages/'. $page .'.php'; ?>

    <!-- Inclusion du footer -->
    <?php
     include_once './inc/footer.php';
     ?>