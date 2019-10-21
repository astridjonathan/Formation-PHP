<h1>Page 2</h1>

<?php
    /*
     * On peut accéder aux données de l'url grace à $_GET.
     * $_GET est une superglobale, elle s'ecrit tjours en MAJ.
     * S'il n'y a aucune information dans l'url alors $GEt est 'empty'
    */


echo '<pre>';
    print_r($_GET);
echo '</pre>';