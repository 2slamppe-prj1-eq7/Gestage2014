<?php
    // message de validation de création ou non 
    if (!is_null($this->lireDonnee('message'))) {
       
            echo "<strong style=\"color:red;\">" .  $this->lireDonnee('message'). "</strong></br>";
        
        
    }
    ?>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>           
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $eleves = $this->lireDonnee('eleves');
        
        foreach ($eleves as $eleve) {           
            ?>
         <tr>
                <td>
                    <?php echo $eleve->getId(); ?> 
                </td>
                <td>
                    <?php echo $eleve->getNom(); ?> 
                </td>
                <td>
                    <?php echo $eleve->getPrenom(); ?> 
                </td>
                
                <td>
                    <a href="?controleur=AdminPersonnes&action=afficherPersonne&idPersonne=<?php echo $eleve->getId(); ?>">Afficher</a>                    
                </td>
            </tr>

            



        <?php } ?>
    </tbody>
</table>
