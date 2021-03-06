<script language="JavaScript" type="text/javascript" src="../vues/javascript/fonctionsJavascript.inc.js"></script>
<script language="JavaScript" type="text/javascript" src="../bibliotheques/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src=".../vues/javascript/ajax.inc.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<h2 style="text-align: center ;"> Ajout d'un stage</h2>

<?php
    // message de validation de création ou non 
    if (!is_null($this->lireDonnee('message'))) {
        foreach ($this->lireDonnee('message') as $message){
            echo "<strong style=\"color:red;\">" .  $message. "</strong></br>";
        }
        
    }
    ?>

<h3>Etudiant</h3>
<hr>
<br/>
<form method="post" action=".?controleur=stage&action=validationAjoutStage" name="CreateInterShipo" id="ajoutStage">
    <p>
                
        
        <label>Annee Scolaire :</label>
        
        <select  name="anneeScol" id="anneeScol" class="required">
             <option value=""></option>
            
            <?php
            

                foreach ($this->lireDonnee('listeAnnee') as $annee) {
                    echo'<option value="' . $annee->getAnneeScol() . '">' . $annee->getAnneeScol() . '</option>';
                }
            ?>
           
        </select>
    
        <label>Etudiant</label>
        
        <select  name="Etudiant" id="Etudiant" class="required">
            <option value=""></option>
            
            <?php
            

                foreach ($this->lireDonnee('etudiants') as $etudiant) {
                    echo'<option value="' . $etudiant->getId() . '">' . $etudiant->getNom() .' '. $etudiant->getPrenom(). '</option>';
                }
            ?>
           
        </select>
   
        
    <label>Professeur</label>
        
        <select  name="Professeur" id="Professeur" class="required">
             <option value=""></option>
            
            <?php
            

                foreach ($this->lireDonnee('professeurs') as $professeur) {
                    echo'<option value="' . $professeur->getId() . '">' . $professeur->getNom() .' '. $professeur->getPrenom(). '</option>';
                }
            ?>
           
        </select>

   
     <label>Maitre de stage</label>
        
        <select  name="MaitreStage" id="MaitreStage" class="required">
             <option value=""></option>
            
            <?php
            

                foreach ($this->lireDonnee('maitresStage') as $maitreStage) {
                    echo'<option value="' . $maitreStage->getId() . '">' . $maitreStage->getNom() .' '. $maitreStage->getPrenom(). '</option>';
                }
            ?>
           
        </select>
    

    <label> Nom de l'entreprise</label>
    

    <select  name="nomOrgas" id="nomOrgas" class="required"><!-- le OnChange éxécute la fonction qui affichera ou non le formulaire etudiant -->
         <option value=""></option>
        <?php
        foreach ($this->lireDonnee('listeOrgas') as $nom) {
            echo'<option value="' . $nom->getId() . '">' . $nom->getNom() . '</option>';
        }
        ?>  
    </select>
    <label> Date de début (mm/jj/aaaa)</label>
    <input type="text" name="dateDebut"class="date" id="dateDebut"  />
    <label> date de fin (mm/jj/aaaa) </label>
    <input type="text" name="dateFin" class="date" id="dateFin" required />

    <label> Date visite de stage (mm/jj/aaaa) </label>
    <input type="text" name="dateVisite" class="date" id="dateVisit" required />

    <label> Ville </label>
    <input type="text" name="ville" id="Ville" required />

    <label></label><input type="submit" value="Valider" onclick="return validerStage()" />
</form>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
