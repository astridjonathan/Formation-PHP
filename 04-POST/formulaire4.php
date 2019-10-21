<!-- 
        1. A l'aide de bootstrap, créez un formulaire, permettant de déposer une annonce. Vous utiliserez les champs suivants :
            -- Un champ select : Choisissez une catégorie
            -- Un champ radio : Type d'annonce : Offres / Demandes
            -- un champ texte : Titre de l'annonce
            -- un champ textarea : Texte de l'annonce
            -- un champ texte : Prix de l'annonce
        
        2. A la soumission du formulaire, vous vérifierez les données transmisent par l'utilisateur.

        3. Si elles sont correctes, vous afficherez un récapitulatif sur la page.
     -->

     <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Déposer une annonce</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="#" method="post">
                <fieldset>
                    <h2>Déposer une annonce</h2>
        
                   
                    <div class="form-group">
                        <label for="categorie">Choisissez une catégorie</label>
                        <select class="form-control" name="categorie" id="categorie">
                        <option>Voiture</option>
                        <option>Logement</option>
                        <option>Appareil Ménager</option>
                        <option>Divers</option>
                        </select>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Offres
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Demandes
                    </label>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titre de l'annonce</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Vente de mon mixeur..">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Texte de l'annonce</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Prix de l'annonce</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="25€">
                    </div>

                </fieldset>

            </form>
            
        </div>
    </div>


</body>
</html>