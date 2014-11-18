<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test DaoEntreprise</title>
    </head>
    <body>
        <?php
        require_once("../includes/parametres.inc.php");
        require_once("../includes/fonctions.inc.php");

        $dao = new M_DaoEntreprise();
        $dao->connecter();

        //Test de sélection par Id 
        echo "<p>Test de sélection par Id </p>";
        $entreprise = $dao->getOneById(14);
        var_dump($entreprise);

        
        //Test de sélection de tous les enregistrements
        echo "<p>Test de sélection de tous les enregistrements</p>";
        $entreprises = $dao->getAll();
        var_dump($entreprises);
        
        

        ?>
    </body>
</html>
