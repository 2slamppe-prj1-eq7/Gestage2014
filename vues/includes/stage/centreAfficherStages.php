<?php
    // message de validation de création ou non 
    if (!is_null($this->lireDonnee('message'))) {
       
            echo "<strong style=\"color:red;\">" .  $this->lireDonnee('message'). "</strong></br>";
        
        
    }
    ?>



<table>
    <thead>
        <tr>
            <th>Num Stage</th>
            <th>Annee Scol</th>
            <th>Id Etudiant</th>
            <th>Id Professeur</th>
            <th>Id Organisation</th>
            <th>Id Maitre Stage</th>
            <th>Date Debut</th>
            <th>Date Fin</th>
            <th>Date Visite</th>
            <th>Ville</th>
            
        </tr>
    </thead>
    <tbody>

        <?php
        $listeStage = $this->lireDonnee('lesStages');
        foreach ($listeStage as $stage) {
            ?>

        
       

            <tr>
                <td>
                    <?php echo $stage->getNumStage(); ?> 
                </td>
                <td>
                    <?php echo $stage->getAnneeScol(); ?> 
                </td>
                <td>
                    <?php echo $stage->getIdEtudiant(); ?> 
                </td>
                <td>
                    <?php echo $stage->getIdProfesseur(); ?> 
                </td>
                <td>
                    <?php echo $stage->getIdOrganisation(); ?> 
                </td>
                <td>
                    <?php echo $stage->getIdMaster(); ?> 
                </td>
                <td>
                    <?php echo $stage->getDateDebut(); ?> 
                </td>
                <td>
                    <?php echo $stage->getDateFin(); ?> 
                </td>
                <td>
                    <?php echo $stage->getDateVisit(); ?> 
                </td>
                <td>
                    <?php echo $stage->getVille(); ?> 
                </td>
                
            </tr>



        <?php } ?>
    </tbody>
</table>

