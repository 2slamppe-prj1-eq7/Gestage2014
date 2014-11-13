<?php
    // message de validation de création ou non 
    if (!is_null($this->lireDonnee('message'))) {
        foreach ($this->lireDonnee('message') as $message){
            echo "<strong style=\"color:red;\">" .  $message. "</strong></br>";
        }
        
    }
    ?>

<form method="post" action=".?controleur=Entreprise&action=validationCreerEntreprise" name="CreateOrganisation">
    <h1>Creation d'une Entreprise</h1>
    <!-- Choix du type de compte pour afficher les différentes informations pour créer un compte spécifique -->
    
        
    <fieldset>
        <legend>Création une Entreprise</legend>
        <label for="nom">Nom entreprise:</label>
        <input type="text"  name="nom" id="nom"></input>
        <label for="ville">Ville:</label>
        <input type="text"  name="ville" id="ville"></input>
        <label for="adresse">Adresse:</label>
        <input type="text"  name="adresse" id="adresse"></input>
        <label for="cp">Code Postal:</label>
        <input type="text"  name="cp" id="cp"></input>
        <label for="tel">Téléphone:</label>
        <input type="text"  name="tel" id="tel"></input>
        <label for="fax">Fax:</label>
        <input type="text"  name="fax" id="fax"></input>
        <label for="fj">Forme Juridique:</label>
        <input type="text"  name="fj" id="fj"></input>
        <label for="activite">Activité:</label>
        <input type="text"  name="activite" id="activite"></input>
        <input type="submit" value="Creer"></input>
            
       
    </fieldset>




</form>