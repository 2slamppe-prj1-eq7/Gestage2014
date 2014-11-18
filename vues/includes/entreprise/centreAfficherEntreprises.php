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
            <th>Adresse</th>
            <th>Ville</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $listeEntreprises = $this->lireDonnee('entreprises');
        foreach ($listeEntreprises as $entreprise) {
            ?>


            <tr>
                <td>
                    <?php echo $entreprise->getId(); ?> 
                </td>
                <td>
                    <?php echo $entreprise->getNom(); ?> 
                </td>
                <td>
                    <?php echo $entreprise->getAdresse(); ?> 
                </td>
                <td>
                    <?php echo $entreprise->getVille(); ?> 
                </td>
                <td>
                    <a href="?controleur=Entreprise&action=afficherEntreprise&idEntreprise=<?php echo $entreprise->getId(); ?>">Afficher</a>
                    <a href="?controleur=Entreprise&action=majEntreprise&idEntreprise=<?php echo $entreprise->getId(); ?>">Editer</a>
                    <a href="?controleur=entreprise&action=supprimerEntreprise&idEntreprise=<?php echo $entreprise->getId(); ?>">Supprimer</a>
                </td>
            </tr>



        <?php } ?>
    </tbody>
</table>
