<?php

/*
    1. Créer une base de donnée : actunews
    2. Créer les tables suivantes :

    - categorie - (id), nom
    - auteur -> (id), prenom, nom, email, password
    - article (id), titre, contenu, image, date_creation,
        categorie_id (lien avec la table categorie),
        auteur_id (lien avec la table auteur).

*/


/**
 *  Mise en place de la connexion avec BDD
 *  Pour connectger PHP et MySQL on tuilisera une librairie: PDO.
 *  PDO permet d'effectuer des opérations CRUD sur ma base.
 *          https://www.php.net/manual/fr/book.pdo.php
 */

 // Args : 1 (serveur + bdd) , 2 identifiant, 3  mot de passe.
// $db = new PDO('mysql:host=localhost; dbname=actunews','root','');

    /*
        try & catch permet en cas d'erreur de l'attraper pour effectuer
        une action particulière (gestions des erreurs)
            - Afficher un message d'erreur
            - Effectuer une redirection
            - Envoyer un mail à l'administrateur
        ----------------------------------------------------------------
        Cela nous permet aussi de nous assurer des erreurs retournées
        à l'utlisateur

    */

 try {

    $db = new PDO('mysql:host=localhost; dbname=actunews','root','');
    /*
        En environnement du développement on active les erreurs SQL
        https://www.php.net/manual/fr/pdo.error-handling.php
        ------------------------------------------------------------
        PDO::ERRMODE_SILENT: N'affiche pas les erreurs SQL (En PROD)
        PDO::ERRMODE_WARNING: Affiche l'erreur sans couper le script (en DEV)
        PDO::ERRMODE_EXCEPTION : Affiche l'erreur et stop le script
    */
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // ACtive les erreurs SQL

    /*  
        Comment je souhaire retourner le résultat
        https://www.php.net/manual/fr/pdostatement.fetch.php
        -------------------------------------------------------------
        PDO::FETCH_ASSOC : Tableau Associatif
        PDO::FETCH_NUM : Tableau Indexé
        PDO::FETCH_OBJ : Un Objet Anonyme
    */
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    //header('Location: https://google.fr/search?q='.$e->getMessage() ); Affiche une redirection de l' erreur sur google
    die();
}
    // Dans la vrai vie on aura le code suivant on met Silent au lieu de warning pour la prod

    try {
        $db = new PDO('mysql:host=localhost;dbname=actunews', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

 var_dump($db);

 // ------------------------------------------  INSERER DES DONNEES  ------------------------------------------------------//

   /*
    *   Avec $db->exec, j'exécute ma requête SQL
    *   Use si admin pour données via formulaire use $db->prepare
    *   Pas de protection, pas de vérification 
    */ 

 /*$db->exec('
    INSERT INTO `auteur` (`prenom`, `nom`, `email`, `password`) 
    VALUES ("Hugo", "LIEGEARD", "hugo@actu.news", "actunews");
 ');*/

    /*
    *  Avec db->prepare() création de requête avant exécution
    *  Permet de faire des vérifications préalablement 
    */

$query = $db->prepare('
    INSERT INTO `auteur` (`prenom`, `nom`, `email`, `password`) 
    VALUES (:prenom, :nom, :email, :password);
');

    /*
    *   bindvalue() permet d'associer une valeur à chaque paramètre
    *   PDO::PARAM_STR: représente une valeur VARCHAR ou string (texte compris) en SQL
    *   Cela me permet de m'assurer du type de donnée insérer dans ma base.
    *   Il existe d'autres types:
    *       - PDO::PARAM_BOOL;
    *       - PDO::PARAM_NULL;
    *       - PDO::PARAM_INT;
    */
$query->bindValue(':prenom','Angélique', PDO::PARAM_STR );
$query->bindValue(':nom','JEAN-NOEL', PDO::PARAM_STR );
$query->bindValue(':email','angelique@actu.news', PDO::PARAM_STR );
$query->bindValue(':password','actunews', PDO::PARAM_STR );


    // Permet d'éxécuter la requete
/*if ($query->execute()){
    /*Traitement en cas de succès
    *   -envoi d'un mail
    *   -envoi d'une notification
    
};*/

/*
    Pour chaque ajout de valeur on doit éxcuter à chasque fois
$query->bindValue(':prenom','Nia', PDO::PARAM_STR );
$query->bindValue(':nom','VITALIS', PDO::PARAM_STR );
$query->bindValue(':email','nia@actu.news', PDO::PARAM_STR );
$query->bindValue(':password','actunews', PDO::PARAM_STR );
if ($query->execute()){
   
};/*

/*
*   Permet de connaitre le dernier ID insérer dans la BD
*/
$idAuteur = $db->lastInsertId();
var_dump( $idAuteur );


/*
    EXERCICE :
        A. Avec l'aide d'une requète préparé, insérer la catégorie "Sciences"

        $query = $db->prepare('
        INSERT INTO `auteur` (`nom`) 
        VALUES (:nom);
');

        B. Avec l'aide d'une requète préparé, insérer un article dans la catégorie Politique de l'auteur de votre choix.
*/

$query = $db->prepare('
        INSERT INTO `categorie` (`nom`) 
        VALUES (:nom);
');
$query->bindValue(':nom','Sciences', PDO::PARAM_STR );
    /*$query->execute();*/

$query = $db->prepare('
        INSERT INTO `article` (`titre`,`contenu`,`image`, `categorie_id` ,`auteur_id`) 
        VALUES (:titre, :contenu,:image, :categorie_id ,:auteur_id);
');
$query->bindValue(':titre','<h1>Macron: Un Président CON</h1>', PDO::PARAM_STR );
$query->bindValue(':contenu','<p>Il est jeune Lorem ipsum dolor sit amet consectetur adipisicing elit. 
Cum, voluptas! Suscipit, voluptas natus officia impedit veniam odio, accusantium non asperiores reprehenderit
 voluptatum deserunt sapiente iure eaque. Error enim dolor explicabo!</p>', PDO::PARAM_STR );
 $query->bindValue(':image','macron.jpg', PDO::PARAM_STR );
 $query->bindValue(':categorie_id',1, PDO::PARAM_INT );
 $query->bindValue(':auteur_id',6, PDO::PARAM_INT );
    
//$query->execute();
$query->bindValue(':titre','<h1>Un titre</h1>', PDO::PARAM_STR );
$query->bindValue(':contenu','<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
Cum, voluptas! Suscipit, voluptas natus officia impedit veniam odio, accusantium non asperiores reprehenderit
 voluptatum deserunt sapiente iure eaque. Error enim dolor explicabo!</p>', PDO::PARAM_STR );
 $query->bindValue(':image','image.jpg', PDO::PARAM_STR );
 $query->bindValue(':categorie_id',1, PDO::PARAM_INT );
 $query->bindValue(':auteur_id',1, PDO::PARAM_INT );
//$query->execute();

$query->bindValue(':titre','<h1>Un élève est à  la mer</h1>', PDO::PARAM_STR );
$query->bindValue(':contenu','<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
Cum, voluptas! Suscipit, voluptas natus officia impedit veniam odio, accusantium non asperiores reprehenderit
 voluptatum deserunt sapiente iure eaque. Error enim dolor explicabo!</p>', PDO::PARAM_STR );
 $query->bindValue(':image','image5.jpg', PDO::PARAM_STR );
 $query->bindValue(':categorie_id',3, PDO::PARAM_INT );
 $query->bindValue(':auteur_id',7, PDO::PARAM_INT );  
//$query->execute();

$query->bindValue(':titre','<h1>LA guadeloupe Meilleure destination</h1>', PDO::PARAM_STR );
$query->bindValue(':contenu','<p> La Guadeloupe sit amet consectetur adipisicing elit. 
Cum, voluptas! Suscipit!</p>', PDO::PARAM_STR );
 $query->bindValue(':image','guadeloupe.jpg', PDO::PARAM_STR );
 $query->bindValue(':categorie_id',4, PDO::PARAM_INT );
 $query->bindValue(':auteur_id',8, PDO::PARAM_INT );  
//$query->execute();

 // ------------------------------------------  RECUPERER DES DONNEES  ------------------------------------------------------//

$query = $db->query('SELECT * FROM auteur');
var_dump($query);
var_dump($query->rowCount()); // Nb de résultat de ma requête

// POur récupérer un auteur
$auteur= $query->fetch();
//$auteur= $query->fetch(PDO::FETCH_OBJ);
//$auteur= $query->fetch(PDO::FETCH_NUM); POur changer la valeur fetch_assoc mis par defaut
//$auteur= $query->fetch(PDO::FETCH_BOTH);


echo '<pre>';
    print_r($auteur);
    print_r( $query->fetch()); // Récupérer le resultat suivant dans la BDD
    print_r( $query->fetch()); // Ainsi de suite ....
echo '</pre>';

// --- Pour simplifier, utilisons une boucle
echo '<hr>';

$query = $db->query('SELECT * FROM categorie');
$categories = $query->fetchAll();

/**
 *  J'obtiens ici un tableau indexé à 2D,avec pour chaque index
 *  un tableau associatif de catégories
 */

echo '<pre>';
    print_r($categories);
    print_r($categories[2]['nom']);
    echo '<pre>';
 
echo '<hr>';
/*
    EXERCICE I : Parcourir tous les articles du fetchAll avec une boucle
    foreach(). Vous afficherez le titre de chaque article dans un <h3>.
*/
$query = $db->query('SELECT * FROM article');
$articles = $query->fetchAll();
foreach( $articles as $art){
    echo '<h3>'.$art['titre'].'</h3>';
}
echo '<hr>';

   /* EXERCICE II : Parcourir tous les articles du fetch() avec une boucle
    while(). Vous afficherez le titre de chaque article dans un <h3>.
*/
$query = $db->query('SELECT * FROM article');
while ($articles = $query->fetch()){
    echo '<h3>'.$articles['titre'].'</h3>'; 
}
echo '<hr>';

/*
 *   Avec la boucle FETCH, il n'ya pas un tableau avec tous les enregistrements
 *   Mais un tableau PAR enregistrement. Soit un tableau associatif par article
 *   ----------------------------------------------------------------------------
 *   Avec la boucle FOREACH, j'aurais un tableau qui contiendra tous mes 
 *   enregistrments
 */
      
    /*-------------------------------------------------------------------------------- 
    |   MEMO:                                                                         |
    |       - Votre requête retourne plusieurs résultats: UNE BOUCLE!                 | 
    |       - Votre requête ne doit sortir qu'un unique résultat: PAS DE BOUCLE       |
    |       - Votre requête ne sort qu'n résultat, mais peu potentiellement en        |
    |       avoir plusieurs: UNE BOUCLE                                               |
     ---------------------------------------------------------------------------------*/

/*
    On peux s'appuyer sur les données transmisent dans l'URL ($_GET)
    pour récupérer des informations dans la base de données.
*/
// print_r( $_GET['id'] );
$idArticle = isset($_GET['id']) ? $_GET['id'] : 0;

$query = $db->prepare('
    SELECT * FROM article
        WHERE id = :id
'); // :id est un paramètre.

$query->bindValue(':id', $idArticle, PDO::PARAM_INT); // On s'assure que l'ID est bien un entier.

$query->execute(); // J'execute ma requète
$article = $query->fetch(); // Je récupère le résultat

echo '<hr>';
echo '<pre>';
    print_r($article);
    print_r($article['titre']);
echo '</pre>';