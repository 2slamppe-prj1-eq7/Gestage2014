<table  class="table table-striped">
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
                    <a href="">Editer</a>
                    <a href="?controleur=entreprise&action=supprimerEntreprise&idEntreprise=<?php echo $entreprise->getId(); ?>">Supprimer</a>
                </td>
            </tr>



        <?php } ?>
    </tbody>
</table>
