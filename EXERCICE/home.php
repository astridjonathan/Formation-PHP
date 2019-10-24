
<?php
    //Header 
     include_once './inc/header.php';

        //Si $_GET n'est pas vide
        if( !empty($_GET['page'])){
            //Je crée une variable $page
            $page = $_GET['page'];
        }else {
            $page = 'accueil';
        }

    include 'pages/'. $page .'.php'; 

    //-- Footer
     include_once './inc/footer.php';
     