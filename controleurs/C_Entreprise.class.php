<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_Entreprise
 *
 * @author btssio
 */
class C_Entreprise extends C_ControleurGenerique {

    function afficherEntreprise() {

        $this->vue = new V_Vue("../vues/templates/template.inc.php");


        // les données
        $this->vue->ecrireDonnee('titreVue', "GestStage : Afficher une entreprise");
        $this->vue->ecrireDonnee('centre', "../vues/includes/entreprise/centreAfficherUneEntreprise.php");

        $daoEntreprise = new M_DaoEntreprise();
        $daoEntreprise->connecter();
        $entreprise = $daoEntreprise->getOneById($_GET["id"]);
        
        $this->vue->ecrireDonnee('entreprise', $entreprise);      
       
        $this->vue->afficher();
    }

    function creerEntreprise($message = false) {

        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Créer une entreprise');
        $this->vue->ecrireDonnee('centre', "../vues/includes/entreprise/centreCreerUneEntreprise.php");
        if ($message) {
            $this->vue->ecrireDonnee('message', $message);
        }
        $this->vue->afficher();
    }

    function validationCreerEntreprise() {

        $nom = $_POST['nom'];
        $ville = $_POST['ville'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $tel = $_POST['tel'];
        $fax = $_POST['fax'];
        $fj = $_POST['fj'];
        $activite = $_POST['activite'];


        //Validation data       
        $message = Array();
        $validation = true;
        $champsNonObligatoires = array('fax', 'activite');
        foreach ($_POST as $champ => $valeur) {
            foreach ($champsNonObligatoires as $champNonObligatoire => $valeurChampNonObligatoire) {
                if ($champsNonObligatoires != $champ) {
                    if (empty($valeur)) {
                        $message[$champ] = "Champ non rempli : " . $champ;
                        $validation = false;
                    }
                }
            }
        }

        //erreur
        if (!$validation) {
             $this::creerEntreprise($message);
        }
        //insertion
        else {

            $entreprise = new M_Entreprise(null, $nom, $ville, $adresse, $cp, $tel, $fax, $fj, $activite);
            $daoEntreprise = new M_DaoEntreprise();
            $daoEntreprise->connecter();
            $pdo = $daoEntreprise->getPdo();

            $daoEntreprise->insert($entreprise);
        }
    }

}