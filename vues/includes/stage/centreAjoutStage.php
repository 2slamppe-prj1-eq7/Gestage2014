<script language="JavaScript" type="text/javascript" src="../vues/javascript/fonctionsJavascript.inc.js"></script>
<script language="JavaScript" type="text/javascript" src="../bibliotheques/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src=".../vues/javascript/ajax.inc.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<h2 style="text-align: center ;"> Ajout d'un stage</h2>

<?php
if ($this->lireDonnee('message') != ' ') {
    echo '<p class="mess-error">' . $this->lireDonnee('message') . '</p>';
}
?>
<h3>Etudiant</h3>
<hr>
<br/>
<form method="post" action=".?controleur=stage&action=validationAjoutStage" name="CreateInterShipo" id="ajoutStage">
    <p>
        <label>Classe</label>
        <select name="classe" id="classe" class="required">
            <option value="-1"></option>

            <?php
            // remplissage du "SELECT" qui contien les roles

            foreach ($this->lireDonnee('listeClasse') as $classe) {


                echo'<option value="' . $classe->getNumClass() . '">' . $classe->getNumClass() . '</option>';
            }
            ?>  
        </select>
        <label> Annee scolaire</label>
        <input type="text" name="anneeScol" id="anneeScol" class="required">

        </select>
    </p>
    <p>
        <label>Nom de l'étudiant</label>
        <select  name="nomEtudiant" id="nomEtud" class="required"><!-- le OnChange éxécute la fonction qui affichera ou non le formulaire etudiant -->
            <option value="-1"></option>

<?php
for ($i = 0; $i < sizeof($this->lireDonnee('listeNoms')); $i++) {

    foreach ($this->lireDonnee('listeNoms') as $nom) {
        echo'<option value="' . $nom[1] . '">' . $nom[1] . '</option>';
    }
}
?>  
        </select>

    </p>
    <p>
        <label>Prenom de l'étudiant</label>
        <select  name="prenomEtudiant" id="prenomEtud" class="required"><!-- le OnChange éxécute la fonction qui affichera ou non le formulaire etudiant -->
            <option value="-1"></option>
            <?php
            for ($i = 0; $i < sizeof($this->lireDonnee('listeNoms')); $i++) {

                foreach ($this->lireDonnee('listeNoms') as $nom) {
                    echo'<option value="' . $nom[2] . '">' . $nom[2] . '</option>';
                }
            }
            ?>  
        </select>
    </p>
    
    <p><label>Nom du professeur RESP</label></p>
   <p><select  name="nomProf" id="nomProf" class="required"><!-- le OnChange éxécute la fonction qui affichera ou non le formulaire etudiant -->
        <option value="-1"></option>
            <?php
            for ($i = 0; $i < sizeof($this->lireDonnee('listeProf')); $i++) {

                foreach ($this->lireDonnee('listeProf') as $nom) {
                    echo'<option value="' . $nom[1] . '">' . $nom[1] . '</option>';
                }
            }
            ?>  
       </select></p>
    
       <p><label>Prenom du professeur RESP</label></p>
    <p><select  name="prenomProf" id="prenomProf" class="required"><!-- le OnChange éxécute la fonction qui affichera ou non le formulaire etudiant -->
        <option value="-1"></option>
<?php
for ($i = 0; $i < sizeof($this->lireDonnee('listeProf')); $i++) {

    foreach ($this->lireDonnee('listeProf') as $nom) {
        echo'<option value="' . $nom[2] . '">' . $nom[2] . '</option>';
    }
}
?>  
        </select></p>

    <label> Nom du maître de stage </label>
    <input type="text" name="nomMaster" id="nomMaster" required />

    <label> Prénom du maître de stage </label>
    <input type="text" name="prenomMaster" id="prenomMaster" required />

    <label> Nom de l'entreprise</label>


    <select  name="nomOrgas" id="nomOrgas" class="required"><!-- le OnChange éxécute la fonction qui affichera ou non le formulaire etudiant -->
        <option value="-1" id=""></option>
        <?php
        foreach ($this->lireDonnee('listeOrgas') as $nom) {
            echo'<option value="' . $nom->getId() . '">' . $nom->getNom() . '</option>';
        }
        ?>  
    </select>
    <label> Date de début</label>
    <input type="date" name="dateDebut"class="date" id="dateDebut"  />
    <label> date de fin </label>
    <input type="date" name="dateFin" class="date" id="dateFin" required />

    <label> Date visite de stage </label>
    <input type="date" name="dateVisite" class="date" id="dateVisit" required />

    <label> Ville </label>
    <input type="text" name="ville" id="Ville" required />

    <label></label><input type="submit" value="Valider" onclick="return validerStage()" />
</form>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
                      $(function() {
                      $(".date").datepicker();
                      });  </script>
<script>
            if ($('select').val() == '-1'){
    alert('Aucun champ ne doit être vide, recommencez ');
            return false;
            }
</script>
<script>
    if (documentG)
</script>