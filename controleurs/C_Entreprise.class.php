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
    
    
    function afficherEntreprises($message=false){
        
        $this->vue = new V_Vue("../vues/templates/template.inc.php");


        // les données
        $this->vue->ecrireDonnee('titreVue', "GestStage : Afficher les entreprises");
        $this->vue->ecrireDonnee('centre', "../vues/includes/entreprise/centreAfficherEntreprises.php");

        $daoEntreprise = new M_DaoEntreprise();
        $daoEntreprise->connecter();
        $entreprises = $daoEntreprise->getAll();
        $this->vue->ecrireDonnee('entreprises', $entreprises);
        
        if(!empty($_GET["message"])){
             $this->vue->ecrireDonnee('message',$_GET["message"]);
        }
       
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
        
        
    }

    function afficherEntreprise() {

        $this->vue = new V_Vue("../vues/templates/template.inc.php");


        // les données
        $this->vue->ecrireDonnee('titreVue', "GestStage : Afficher une entreprise");
        $this->vue->ecrireDonnee('centre', "../vues/includes/entreprise/centreAfficherUneEntreprise.php");

        $daoEntreprise = new M_DaoEntreprise();
        $daoEntreprise->connecter();
        $entreprise = $daoEntreprise->getOneById($_GET["idEntreprise"]);

        $this->vue->ecrireDonnee('entreprise', $entreprise);
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }

    function creerEntreprise($message = false) {

        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Créer une entreprise');
        $this->vue->ecrireDonnee('centre', "../vues/includes/entreprise/centreCreerUneEntreprise.php");
        if ($message) {
            $this->vue->ecrireDonnee('message', $message);
        }
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
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


        //Validation data obligatoire      
        $message = Array();
        $validation = true;
        $champsNonObligatoires = array('fax', 'activite');

        foreach ($_POST as $champ => $valeur) {
            if (!in_array($champ, $champsNonObligatoires)) {
                if (empty($valeur)) {
                    $message[] = "Champ non rempli : " . $champ;
                    $validation = false;
                }
            }
        }

        //Télépone
        if (!(preg_match('`^0[1-9]([-. ]?[0-9]{2}){4}$`', $tel))) {
            $message[] = 'Erreur Format téléphone';
            $validation = false;
        }
        
        //Code Postal
        if(!(preg_match('`^[0-9]{5}$`', $cp))){
            $message[] = 'Erreur Format code postal';
            $validation = false;
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

            $id = $daoEntreprise->insert($entreprise);
            if ($id) {
                header('Location: ?controleur=Entreprise&action=afficherEntreprise&idEntreprise=' . $id);
            } else {
                $this::creerEntreprise("Erreur d'insertion dans la base de données");
            }
        }
    }
    
    
    function majEntreprise(){
        
        $this->vue = new V_Vue("../vues/templates/template.inc.php");


        // les données
        $this->vue->ecrireDonnee('titreVue', "GestStage : MAJ une entreprise");
        $this->vue->ecrireDonnee('centre', "../vues/includes/entreprise/majEntreprise.php");

        $daoEntreprise = new M_DaoEntreprise();
        $daoEntreprise->connecter();
        $entreprise = $daoEntreprise->getOneById($_GET["idEntreprise"]);

        $this->vue->ecrireDonnee('entreprise', $entreprise);
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }
    
    
    function validationMajEntreprise(){
        
        $nom = $_POST['nom'];
        $ville = $_POST['ville'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $tel = $_POST['tel'];
        $fax = $_POST['fax'];
        $fj = $_POST['fj'];
        $activite = $_POST['activite'];


        //Validation data obligatoire      
        $message = Array();
        $validation = true;
        $champsNonObligatoires = array('fax', 'activite');

        foreach ($_POST as $champ => $valeur) {
            if (!in_array($champ, $champsNonObligatoires)) {
                if (empty($valeur)) {
                    $message[] = "Champ non rempli : " . $champ;
                    $validation = false;
                }
            }
        }

        //Télépone
        if (!(preg_match('`^0[1-9]([-. ]?[0-9]{2}){4}$`', $tel))) {
            $message[] = 'Erreur Format téléphone';
            $validation = false;
        }
        
        //Code Postal
        if(!(preg_match('`^[0-9]{5}$`', $cp))){
            $message[] = 'Erreur Format code postal';
            $validation = false;
        }
      
        //erreur
        if (!$validation) {
            $this::creerEntreprise($message);
        }
        //insertion
        else {

            $entreprise = new M_Entreprise($_GET["idEntreprise"], $nom, $ville, $adresse, $cp, $tel, $fax, $fj, $activite);
            $daoEntreprise = new M_DaoEntreprise();
            $daoEntreprise->connecter();
            $pdo = $daoEntreprise->getPdo();

            $id = $daoEntreprise->update($_GET["idEntreprise"], $entreprise);
            if ($id) {
                header('Location: ?controleur=Entreprise&action=afficherEntreprise&idEntreprise=' . $_GET["idEntreprise"]);
            } else {
                $this::creerEntreprise("Erreur d'insertion dans la base de données");
            }
        }
    }
    
    
    function supprimerEntreprise($idEntreprise){
        $idEntreprise=$_GET['idEntreprise'];
        $daoEntreprise = new M_DaoEntreprise();
        $daoEntreprise->connecter();
        $validation = $daoEntreprise->delete($idEntreprise);
        
        if(!$validation){
            $message ="Problème de supression - Contraintes:"
                    . "Veuillez supprimer tous les stages liés à cet entreprise";
           
             header('Location: ?controleur=Entreprise&action=afficherEntreprises&message=' . $message);
        }else{
            header('Location: ?controleur=Entreprise&action=afficherEntreprises');
        }
    }

}
