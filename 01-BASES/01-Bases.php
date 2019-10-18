<!--
    Tout d'abord noous pouvons écrire du HTML dans un fichier 
    ayant l'extension PHP. L'inverse n'est pas possible
-->
<style>
    h2 {
        margin:0;
        font-size: 20px;
        color: red;
    }
    h3 {
        font-size:15px;
        color:brown;
    }
</style>


<h2>Ecriture et Affichage</h2>
<hr>

<?php 

    echo 'Bonjour'; // Echo est une instruction d'affichage
    echo '<br>'; // Nous pouvons mettre du html
    echo '<hr><h2>Commentaires</h2>'; // Les commentaires PHP ne sont pas lisibles dans le code source
    
?>

<hr>
<strong>Bonjour</strong>
<?= 'Hello World';?> <!-- Le = remplace le echo -->
<!-- 
    Il est possible de fermer et réouvir php pour mélanger
    code PHP et HTML 
-->

<?php 
    echo 'Texte'; //pour créer un commmentaire sur 1 ligne
    echo 'Texte';/* pour créer un commmentaire
                     sur plusieurs lignes */
    echo 'Texte'; #pour créer un commmentaire sur 1 ligne (pas très standard)


/*
* Print est une autre instruction d'Affichage
* Pas de différence entre print & echo
*/

/** 
* PAs d'obligation de fermer PHP '?>' 
* si il y a que du PHP. Fermer si <HTML> 
* -----------------------------------------
* On peut fermer et ouvrir plusieurs fois PHP
*/

// -------------------------------------------------------------
echo '<hr><h2> Varaible PHP : Types / Déclaration / Affectation</h2>';

// Déclaration d'une variale PHP avec le signe $

$a = 127 ; // Affecte la valeur 127 dans a
$b = 1.5 ;
// $nom_de_ma_variable = ma_valeur...

echo gettype($a); // C'est un entier: integer
echo '<br>';
echo gettype($b); //C'est un nb décimal : double

$a = "chaine de caractère";
$b = "127";
echo '<br>';
echo gettype($a);   //C'est un string
echo '<br>';
echo gettype($b);



$a = true;
$b = false;
echo '<br>';
echo gettype($a);   //C'est un string
echo '<br>';
echo gettype($b);

/*****
 * NB: Nous pouvons appeler une variable a2 mais pas 2a.
 * elle peut contenir des chiffres mais pas commerncer par un.
 * ***/

// -------------------------------------------------------------
echo '<hr><h2> La concaténation '.' </h2>';

/**
 * On utilise le poutn ou la virgule pour concaténer
 */

$prenom = "Astrid";
echo 'Bonjour '.$prenom.'<br>';
echo 'Bonjour ',$prenom,'<br>';

/**                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
 * A EVITER: On peut mélanger les . et , mais ce n'est pas une bonne pratique.
 *  le . est plus utiliser
 */

echo "Bonjour $prenom <br>";
 /*  Avec " " PHP évalue la variable car elle se trouve 
 *  Avec " " PHP n'évalue pas la variable affiche $nomVariable
 * */

// -------------------------------------------------------------

echo '<hr><h2> Constante et Constante Magique !</h2>';

/**
 * On utilise la fonction define('nomConstante, valeur)
 * Utiliser pour les identifiants par exemple
 * -----------------------------------------------------------------
 * Par convention une constante se déclare toujours  en MAJUSCULE
 * Les constantes sont utilisées pour sauvegarder vos informations
 * de connexion à une BDD par exemple
 */

 define('IMPOSSIBLE_A_MODIFIER', 'Valeur de ma constante');
 echo IMPOSSIBLE_A_MODIFIER . '<br>';

    /********* Les Constantes Magiques ********/

 // Affiche le chemin absolu du fichier
 echo __FILE__  .'<br>';
  // Affiche le chemin absolu du dossier
  echo __DIR__  .'<br>';
   // Affiche le numéro de la ligne
   echo __LINE__  .'<br>';


// -------------------------------------------------------------

echo '<hr><h2> Les Opérateurs Arithmétiques !</h2>';

$a = 10;
$b = 5;

echo $a + $b. '<br>'; // Affiche 15
echo $a - $b. '<br>'; // Affiche 5
echo $a * $b. '<br>'; // Affiche 50
echo $a / $b. '<br>'; // Affiche 2


    // -- Opération / Affectation
echo $a = $a + $b; // ici $a = 15 
$a += $b; // Ecriture simplifiée
$a -= $b;
$a *= $b;
$a /= $b;
    // -- Incrémentation
$a += 1; // incremente de 1
$a++; // Ecriture simplifiée
$a--;

// -------------------------------------------------------------

echo '<hr><h2> Les Structures Conditionnelles (if /else) !</h2>';
  
/**
 * Isset et Empty
 * empty = test si une variable est égale à 0, est vide ou non définie
 * isset = test uniquement si une variable est définie / existe vérifie si la variable existe
 * mais ne dis pas si l est définie ou vide ou = à 0
 */

$var1 = "test";
$var2 = "";

if (empty($var1)){
    echo 'O, vide ou non définie';
} else {
    echo " Ma variable est définie est à comme valeur $var1 <br>";
}
if (empty($var2)){ 
    echo 'O, vide ou non définie <br>';
} else {
    echo " Ma variable est définie est à comme valeur $var2 <br>";
}

if (isset($var2)){
    echo 'var2 exist mais n\'est définie par rien <br>';
} else {
    echo " var2 n\'exite pas <br>";
}

$prenom ="";
$nom = "JONATHAN";

if (isset($prenom)) echo 'Attention prénom existe ! <br>';
if (empty($prenom)) echo 'Attention, vous avez oublié de remplir votre prénom<br>';

echo '<hr>';

$a = 2;
$b = 5;
$c = 8;

if ($a > $b){
    print 'A est supérieur à B<br>';
} else {
    print "Non c'est B qui est supérieur à A <br>";
}

if ($a < $b && $b < $c ){ // si A > à B et en même temps B > C
    print 'Tout est OK pour les 2 conditions<br>';
} 
if ($a > $b && $b < $c ){ // rien ne s'affiche
    print 'Tout est OK pour les 2 conditions<br>';
} 
if ($a === 2 || $b > $c ){ // rien ne s'affiche
    print 'Tout est OK pour au moins une des 2 conditions<br>';
} else {
    print "Aucune des conditions ne sont vraies";
}

/**
 * NB: le double == permet de vérifier une information à l'intérieur d'une variable
 * le triple === strict vérifie valeur et type
 * le single = pour affectation
 */

 // XOR est un OU exclusif ou strict
if ($a == 10 XOR $b == 5 ){  // seulement si l'une des 2 conditions doit être valide mais pas les 2
    echo 'OK c\'est une condition exclusive<br>';
}


/**
 *Forme contractée du IF..ELSE
 *c'est une écriture ternaire, un if ternaire
 * Le "?"  remplace le IF, le ":" remplace le ELSE (sinon)
 */

 echo ($a==10) ? 'a est = à 10 <br>' : 'a n\'est pas = à 10 <br>';

     // -- Comparaison
$a = 1;
$b = "1";

if ($a == $b) echo "Les 2 variables sont égales";
if ($a === $b) echo "Les 2 variables sont strictement égales";

/**
 *     /!\ A NE PAS OUBLIER /!\
 *      
 *      = Affectation
 *      == Comparaison des valeurs
 *      === Comparaison des valeurs et des types
 * 
 */

// -------------------------------------------------------------

echo '<hr><h2> Les Conditions Switch!</h2>';

$couleur = 'rouge';

switch ($couleur){
    case 'bleu':
        echo 'Vous aimez le bleu';
        break;
    case 'rouge':
        echo 'Vous aimez le rouge';
        break;
    case 'jaune':
        echo 'Vous aimez le jaune';
        break;
    case 'vert':
        echo 'Vous aimez le vert';
        break;
    default: // cas par defaut, on ne rentre dans aucun des cas précédent.
        echo "Vous n'aimez ni bleu, ni jaune.....";
        break;
    
}
 echo '<hr>';

/*
    EXERCICE: 
    Faire la même chose avec IF/ELSE
*/
$couleur = 'jaune';
if ($couleur == 'jaune') {
    echo 'Vous aimez le jaune';
} else if ($couleur == 'bleu') {
    echo 'Vous aimez le bleu';
} else if ($couleur == 'rouge') {
    echo 'Vous aimez le rouge';
}else if ($couleur == 'vert') {
    echo 'Vous aimez le vert';
} else {
    echo "Vous n'aimez ni bleu, ni vert.....";
}

// --------------------------------------------------------------------------------

echo '<hr><h2> Les Fonctions Prédéfinies</h2>';
    //Aller sur le site : http://overapi.com/php
/*
 *  Exemple avec la fonction date() qui permet de renvoyer la date du jour
 *  au format souhaité.
 *  ----------------------------------------------------------------------
 *  Aller sur le site : https://www.php.net/manual/fr/function.date.php
 */

echo '<br>Date : <br>';
print date('d/m/Y');
echo '<br>';
print date('Y M d D');

        //----------
echo '<hr><h3> Les Fonctions Prédéfinies: Les Strings</h2>';

/*
    La fonction strpos() permet de trouver la position d'un caractère
    dans une chaîne.
    -----------------------------------------------------------------
    En cas de succès : retourne un entier int
    en cas d'echec : retourne un boulean FALSE
    ----------------------------------------------------------------
    Paramètres : 
    1 : La chaine dans laquelle effectuer le recherche (haystack)
    2 : Le cractère / l'information à chercher (needle)
  
*/
$email1 = "astrid@gmail.com";
echo strpos($email1, "@");
//  Ici, on  indique la position du caractère @ dans la chaine.On commence à 0.

echo '<br>';

$email2 = "astrid";
echo strpos($email2, "@"); // Rien n'est affiché 

/*
    Pour afficher la commande précédente on va utiliser var_dump()
    qui nou spermettra de voir le type 'boolean' et la valeur 'FALSE' 
    car le caractère "@" n'a pas été trouvé.
    ------------------------------------------------------------------------------
    La fonction var_dump() est une fonction d'affichage améliorée que l'on utilise 
    régulièrement en phase de développement.
    
*/

var_dump(strpos($email2, "@")); //var_dump() permet de débuguer une variable

/*
    La fonction iconv_strlen() retourne le nombre de caractère d'une chaîne.
    -----------------------------------------------------------------
    Valeur de retour:
    Succès :int Entier correspondant au npmbre de caractère
    Echec: 0 equivalent un boulean FALSE
    ----------------------------------------------------------------
    Paramètre : 
    1 : la chaine de caractère (string) que l'on souhaite connaitre la taille
*/

echo '<br>';

$phrase = " Je suis ce que je suis. ";
echo iconv_strlen($phrase). '<br>';

$phrase3 = " Je suis ce que je suis. ";
echo strlen($phrase3). '<br>';

$phrase2 = "";
echo iconv_strlen($phrase2). '<br>';

/*
    La fonction substr() retourne une partie de la chaîne (segment).
    sub pour soustraire
    -----------------------------------------------------------------
    Valeur de retour:
    Succès : string chaine de caractère segmentée 
    Echec  : boulean FALSE
    ----------------------------------------------------------------
    Paramètres : 
    1 : string => la chaine de caractère d'entrée(celle a coupée)
    2 : start=>la position de départ. On commence par 0 par defaut
    3:  lenght=> le nombre de caractère désiré
*/

echo '<br>';

$texte = "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
Iure suscipit alias quos laudantium ab similique illo vitae.";

echo substr($texte,0,50). ' ...<a href="#"> Lire la suite </a><br>';


// --------------------------------------------------------------------------------

        echo '<hr><h2> Les Fonctions Utilisateurs</h2>';

    /*
    *   Les fonctions qui ne sont pas prédéfinies en PHP sont 
    *   déclarées puis exécutée par l'utilisateur.
    *   ------------------------------------------------------
    *   Autrement dit, vous avez la possibilité de créer vos 
    *   propres fonctions PHP.
    *   ------------------------------------------------------
    *   Réalistons une fonction permettant de tirer un trait
    *   sur la page.
    */

    function separator(){ // Cette fonction ne reçoit pas d'argument
        echo '<br><hr><br>';
    }
    separator(); // Execution de notre fonction

/*
*   Fonction avec arguments:
*   Les $arguments sont des paramètres fournis à la fonction.
*   Ils lui permettent de compléter ou modifier son comportement
*   initialement prévu.
*/

function bonjour($prenom){
    return "Bonjour $prenom <br>";
}
 //Exécution
 echo bonjour("Astrid");
 echo bonjour("Léna");

 separator(); 

/*
    EXERCICE :
    1. Créer une fonction permettant de calculer la somme de 2 nb.
    2. Créer une fonction permettant de générer des titres h3
    3. Créer une fonction permettant de calculer la TVA 20% (1.2)
    4. Créer une fonction permettant de calculer la TVA plusieurs taux. normal : 20% ou 1.2 | réduit : 5.5% ou 1.055

    5. BONUS : Réaliser une fonction permettant de générer une accroche de X caractères passé paramètres, sans couper de mot.

    6. BONUS : Challenge Réaliser une fonction PHP permettant de
    convertir une chaine en slug. slugify().
*/

//EXERCICE 1 Créer une fonction permettant de calculer la somme de 2 nb.
/*
function sum($nb1,$nb2){
    return  $nb1 + $nb2;
}
 //Exécution
 echo sum(5,6);
 echo '<br>';
*/
//Correction
function addition($nb1,$nb2){
    return  $nb1 + $nb2;
}
 //Exécution
 $resultat= addition(130,15);
 echo $resultat;
 echo '<br>';
// ------------------------------------------
//EXERCICE 2 Créer une fonction permettant de générer des titres h3

 //Il est possible  d'éxécuter une fonction avant qu'elle soit déclarée 
 echo titre('les fonctions sont chiantes');
 echo '<br>';

function titre($h3){
    return   "<h3>$h3</h3>"; // A partir du 'return' on quitte la fonction.
    echo 'test'; // Ne s'affiche pas
}

// ------------------------------------------
//EXERCICE 3  Créer une fonction permettant de calculer la TVA 20% (1.2)

function calculTva($montantHt){
    return  $montantHt*1.2;
}
 //Exécution
 echo '10EUR HT soit '.calculTva(10) .' EUR TVA <br>';
 echo '50EUR HT soit '.calculTva(50) .' EUR TVA <br>';
 echo '<br>';

// ------------------------------------------
//EXERCICE 4 Créer une fonction permettant de calculer la TVA plusieurs taux. normal : 20% ou 1.2 | réduit : 5.5% ou 1.055

function calculTvaM($montantHt,$tauxTva = 1.2){
    return  $montantHt*$tauxTva;
}
 //Exécution
echo calculTvaM(100,1.021);
echo '<br>';
echo calculTvaM(200,1.055);
echo '<br>';

// ------------------------------------------
//EXERCICE 5 Réaliser une fonction permettant de générer une accroche de X caractères passé paramètres, sans couper de mot.

$accroche = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo accusamus est officia nulla eum efefzfe";
 function accroche ($accroche,$length){
   // return substr ($accroche,0,$length);
   $accrocheM =  wordwrap($accroche, $length, " ", true);
   return substr($accrocheM,0,$length);
 }
 echo accroche($accroche, 30);

 echo '<br>';

 function cleanCut($string,$length,$cutString = '...')
{
	if(strlen($string) <= $length)
	{
		return $string;
	}
	$str = substr($string,0,$length-strlen($cutString)+1);
	return substr($str,0,strrpos($str,' ')).$cutString;
}
echo cleanCut("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo accusamus est officia nulla eum efefzfe",30);
echo '<br>';

// EXERCICE 6 Challenge Réaliser une fonction PHP permettant de convertir une chaine en slug. slugify()

/*function slugify($string, $delimiter = '-') {
	$oldLocale = setlocale(LC_ALL, '0');
	setlocale(LC_ALL, 'en_US.UTF-8');
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower($clean);
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	$clean = trim($clean, $delimiter);
	setlocale(LC_ALL, $oldLocale);
	return $clean;
}
echo slugify("Poésie Française");
// poesie-francaise
echo '<br>';
echo slugify("Littérature sentimentale");
// litterature-sentimentale*/

// --------------------------------------------------------------------------------
separator();

    echo '<hr><h2> Les Boucles </h2>';

    /*
    *   Les fonctions qui ne sont pas prédéfinies en PHP sont 
    *   déclarées puis exécutée par l'utilisateur.
    *   ------------------------------------------------------
    *   Autrement dit, vous avez la possibilité de créer vos 
    *   propres fonctions PHP.
    *   ------------------------------------------------------
    *   Réalistons une fonction permettant de tirer un trait
    *   sur la page.
    */

for ($i=0; $i<10; $i++){
    echo $i . '<br>';
}

// EXERCICE: En partant de l'exemple ci dessus et en utilisant une boucle for, réalisez un select allant de 1à31.
//correspondant au nombre de jour dans un mois
echo '<select>';
echo '<option>1</option>';
echo '<option>2</option>';
echo '<option>3</option>';
echo '</select>';

echo '<br>';

echo '<select>';
for ($i=1; $i<=31; $i++){
        echo "<option>$i</option>";
}
echo '</select>';

    separator();

?> <!-- Je ferme PHP je retourne dans HTML -->
 
 <table border=1 >
     <tr>
         <?php 
            for ($i=1; $i<=9; $i++){
                echo "<td>$i</td>";
        }
         ?>
     </tr>
 </table>

 <!-- Je  retourne dans PHP  -->

 <?php

    echo '<table border="1"><tr>';
    for ($i=1; $i<=9; $i++){
        echo "<td>$i</td>";
    }   
    echo '</tr></table>';

// --------------------------------------------------------------------------------
    separator();

    echo '<hr><h2> Les Tableaux </h2>';

    /*
    *   Un array ou tableau est une variable qui contient plusieurs valeurs
    *   organisées sous forme de clé
    *   -----------------------------------------
    *   |   0   |   1   |   2   |   3   |   4   |
    *   -----------------------------------------
    *   -----------------------------------------
    *   | Lena  |  Nia  | Angel.| Astrid| Méli  |
    *   -----------------------------------------
    */

    // -- Déclaration et remplissage d'un tableau indexé
    $apprenantes = array("Léna", "Nia");
    $apprenantes = ["Léna", "Nia",'Angélique', 'Astrid', 'Mélissa']; //Ecriture dispo depuis PHP 5.0

    // -- Afficher les valeurs du tableau
    echo $apprenantes[3].'<br>'; // Astrid

    echo '$apprenantes est de type: '.gettype($apprenantes);

    /*
    *  Pour afficher la valeur d'une clé d'un tableau, on utilise monTableau [ cle ]
    *  cle = indice = index
    */

    /*** EQUIVALENT CONSOLE LOG */
    echo '<pre>'; //affichage aller à la ligne
    var_dump($apprenantes);
    print_r($apprenantes); // plus utilisé
    echo '<br>';
    echo '</pre>';

    echo '<hr><h3> Les Tableaux Associatifs</h3>';

    /*
    *   Les cles sont numériques, mais sous forme de string  
    *   -----------------------------------------------
    *   |  prenom  |   nom    |  telephone   |   age  |
    *   -----------------------------------------------
    *   -----------------------------------------------
    *   |  Astrid  | JONATHAN |  0690306017  |  36ans |
    *   -----------------------------------------------
    */

    $contact = [
        //  cle     =>   valeur
        'prenom'    =>   'Astrid',
        'nom'       =>   'JONATHAN',
        'telephone' =>   '0690306017',
        'age'       =>   '36ans',
        'adresse'   =>   [
                            'rue'     =>   'Route de Campry',
                            'ville'   =>   'BAILLIF',
                            'cp'      =>   '97123',
                            'pays'    =>   [
                                            'nom'    =>   'France',
                                            'code'   =>   'FR',
                            ],
                        ]
    ];

    echo '<pre>';
    print_r( $contact);
    echo '</pre>';

    echo '<h3>Bonjour ' . $contact['prenom']
                        . ' '
                        . $contact['nom']
                        . ' '
                        . $contact['adresse']['ville']
                        . ' '
                        . $contact['adresse']['pays']['nom']
                        . '<small> '
                        .'</h3>';

    $mesContacts = []; // Déclaration d'un tableau vide
    $mesContacts[] = 'Brigite' ; // Ajouter un élément dans le tableau
    $mesContacts[] = 'Hugo' ; // Indice affecter automatiquement par PHP
    $mesContacts[10] = 255 ; // Indice affecter manuellement
    $mesContacts[] = 'Aurélie' ; //  PHP continue après 11

    echo '<pre>';
        print_r($mesContacts);
    echo '</pre>';


    $contacts = [];
    $contacts[] = [
        'prenom' => 'Astrid',
        'nom' => 'JONATHAN',
    ];
    $contacts[] = [
        'prenom' => 'Léna',
        'nom' => 'BROISSERON',
    ];
    $contacts[] = [
        'prenom' => 'Aurélie',
        'nom' => 'NABAJOTH',
    ];
    $contacts[] = [
        'prenom' => 'Nia',
        'nom' => 'VITALIS',
    ];

    echo '<pre>';
        print_r($contacts);
    echo '</pre>';

    // Afficher tous les prénoms de tous les contacts
    echo $contacts[0]['prenom'].'<br>';
    echo $contacts[1]['prenom'].'<br>';

    //Créer une boucle afin d'afficher les contacts dans  un $

    /**
     * NB:
     * count et sizeof me retourne la dimension de mon tableau.
     * Autrement dit le nombre d'élément.
     * Pas de différence entre les 2 fonctions.
     */

    echo 'La taille de mon tableau est :' .count($contacts).'<br>';
    echo 'La taille de mon tableau est :' .sizeof($contacts).'<br>';

    echo '<pre>';
    for($i = 0; $i < count($contacts) ; $i++) { //il faut que ça soit strictement <
            echo '<p>'.$contacts[$i]["prenom"].'<p>';      
    }
    echo '</pre>';

    separator();

    // -- La boucle FOREACH

        /**
         *  Quand il y a 2 variable ($cle et $valeur)
         * La 1ere parcours la colonne des indices (index, clé)
         * La 2eme parcours la colonne des valeurs
         */

    foreach($contacts as $cle => $contact)
        {
            echo 'Mon contact est '.$contact['prenom'].' est à l\'index '.$cle.'<br>';
        }

        // Quand il y a 1 variable, c'est la colonne des valeurs

    foreach($contacts as $contact)
        {
            echo 'Mon contact est '.$contact['prenom'].'<br>';
        }

        separator();

    /*
    EXERCICE :
    En utilisant une ou plusieurs boucles foreach
    afficher les informations (Cle / Valeur) du contact
    $contact.

    BONUS: vous utilisez des listes à puces

*/

$contact = [
    // cle      => valeur
    'prenom'    => 'Rodrigue',
    'nom'       => 'NOUEL',
    'telephone' => [
        'fixe' => '0596 77 68 56',
        'port' => '0696 67 45 34',
        'fax'  => '0596 67 56 45'
        ],
    'age'       => '43 ans',
    'adresse'   => [
        'rue'   => 'Rue de la Maurine',
        'ville' => 'Fort-de-France',
        'cp'    => '97200'
        ]
    ];
  
    //Version Moi
        foreach ($contact as $cle => $unContact){            
            echo  '<ul><li>';                         
            if (is_array($unContact)){
                echo $cle.' :   ';
               foreach ($unContact as $i => $c){

                    echo  '<ul><li>'; 
                    echo $i.' :  <b> '.$c.' '.'</b><br>';
                    echo  '</li></ul>'; 
                }
            } else {
                echo $cle.' :  <b> '.$unContact.' '.'</b><br>';
            }          
            echo  '</li></ul>'; 
            }    

    separator();

    // Correction

    $content = '<ul>';

// Je parcours mon tableau $contact
// Ici $cle prend successivement les valeurs prenom, nom, ...
foreach ($contact as $cle => $valeur) {

    // Si au cours d'une des itérations (tour de boucle) 
    // ma $valeur est un tableau...
    if ( is_array( $valeur ) ) {
        
        // --- Alors, je parcours le nouveau tableau
        // .= permet d'ajouter une valeur à une variable
        $content .= "<li><strong>$cle</strong> : </li>";
        $content .= "<ul>";

        foreach ($valeur as $key => $value) {
            $content .= "<li><strong>$key</strong> : $value</li>";
        }

        $content .= "</ul>";

    } else {
        // -- Sinon, ma $valeur n'est pas un tableau. Je l'affiche...
        $content .= "<li><strong>$cle</strong> : $valeur</li>";
    }
}

$content .= '</ul>';
echo $content;
       


// -----------------------------------------------------------------------

//Pour bien comprendre le .=
$txt ='Lorem';
$txt .='ipsum';
$txt .='dolor';

$txt = 'Lorem '.'ipsum '.'dolor ';
echo $txt;


separator();

//Permet d'avoir les infos sur PHP
phpinfo(); 


?> <!-- Pas obligatoire de mettre ?> si on termine en php mais si on remet HTML à fermer -->

