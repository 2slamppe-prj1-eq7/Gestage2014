<?php 
$uneEntreprise = $this->lireDonnee('entreprise');
?>
<form method="post" action=".?controleur=Entreprise&action=validationMajEntreprise&idEntreprise=<?php echo $uneEntreprise->getId(); ?>"readonly="readonly" name="afficherOrganisation">
    <h1>Afficher une Entreprise</h1>
           
    <fieldset>
        <legend>MAJ d'une Entreprise</legend>
        <label for="nom">Nom entreprise:</label>
        <input type="text"  name="nom" id="nom" value="<?php if(!is_null($uneEntreprise->getNom())){echo $uneEntreprise->getNom();}; ?>"></input>
        <label for="ville">Ville:</label>
        <input type="text"  name="ville" id="ville" value="<?php if(!is_null($uneEntreprise->getVille())){echo $uneEntreprise->getVille();}; ?>"></input>
        <label for="adresse">Adresse:</label>
        <input type="text"  name="adresse" id="adresse" value="<?php if(!is_null($uneEntreprise->getAdresse())){echo $uneEntreprise->getAdresse();}; ?>"></input>
        <label for="cp">Code Postal:</label>
        <input type="text"  name="cp" id="cp" value="<?php if(!is_null($uneEntreprise->getCp())){echo $uneEntreprise->getCp();}; ?>"></input>
        <label for="tel">Téléphone:</label>
        <input type="text"  name="tel" id="tel" value="<?php if(!is_null($uneEntreprise->getTel())){echo $uneEntreprise->getTel();}; ?>"></input>
        <label for="fax">Fax:</label>
        <input type="text"  name="fax" id="tel" value="<?php if(!is_null($uneEntreprise->getFax())){echo $uneEntreprise->getFax();}; ?>"></input>
        <label for="fj">Forme Juridique:</label>
        <input type="text"  name="fj" id="fj" value="<?php if(!is_null($uneEntreprise->getFj())){echo $uneEntreprise->getFj();}; ?>"></input>
        <label for="activite">Activité:</label>
        <input type="text"  name="activite" id="activite" value="<?php if(!is_null($uneEntreprise->getActivite())){echo $uneEntreprise->getActivite();}; ?>"></input>
        <input type="submit" value="Mettre à jour"></input>
    </fieldset>
</form>