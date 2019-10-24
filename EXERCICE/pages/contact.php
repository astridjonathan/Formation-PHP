
<!-- Div container -->
<div class="container mx-auto m-4">
    <form method="POST">
        <fieldset class="border rounded p-3">
            <h2 class="text-center">Me contacter</h2>
            <!-- Nom et prénom-->
            <div class="row">
                <div class="form-group col-6">
                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Entrer votre prénom...">
                </div>
                <div class="form-group col-6">
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrer votre nom...">
                </div>
            </div>
            <!-- Mail/ Tél -->
            <div class="row">
                <div class="form-group col-6">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Entrer votre email...">
                </div>
                <div class="form-group col-6">
                    <input type="text" name="tel" id="tel" class="form-control" placeholder="Entrer votre telephone...">
                </div>
            </div>
            <!-- Sujet avec un champ radio multiple-->
            <div class="row mx-auto">
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input checked name="sujet" type="checkbox" class="custom-control-input" id="devFront">
                    <label class="custom-control-label" for="devFront">Développement Front</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input checked name="sujet" type="checkbox" class="custom-control-input" id="devMobile">
                    <label class="custom-control-label" for="devMobile">Développement Mobile</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input name="sujet" type="checkbox" class="custom-control-input" id="design">
                    <label class="custom-control-label" for="design">WebDesign</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input name="sujet" type="checkbox" class="custom-control-input" id="infog">
                    <label class="custom-control-label" for="infog">Infographie</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input name="sujet" type="checkbox" class="custom-control-input" id="dreseau">
                    <label class="custom-control-label" for="reseau">Réseaux</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input checked  name="sujet" type="checkbox" class="custom-control-input" id="community">
                    <label class="custom-control-label" for="community">Community Management</label>
                </div>
            </div>
            <!-- Contenu Message -->
            <div class="row">
                <div class="form-group col">
                    <textarea name="message" class="form-control" id="message" rows="5" placeholder="Votre message...."></textarea>
                </div>
            </div>
            <!-- Bouton -->
            <button type="submit" name="submit" class="btn btn-block btn-warning">Valider</button>

        </fieldset>
    
    </form> <!---fin contenu formulaire-->







</div> <!-- FIN Div container -->