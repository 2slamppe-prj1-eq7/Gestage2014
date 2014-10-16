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
    
    function afficherEntreprise(){
        
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        //$this->vue->ecrireDonnee('centre',"../vues/includes/accueil/centreAccueil.inc.php");
        

        // les données
        $this->vue->ecrireDonnee('titreVue', "GestStage : Afficher une entreprise");
        $daoEntreprise = new M_DaoEntreprise();
        $daoEntreprise->connecter();
        $entreprise = $daoEntreprise->getOneById(1);
        
        var_dump($entreprise);
       
    }
    
    function creerEntreprise(){
        
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        
        $this->vue->ecrireDonnee('titreVue', 'Créer une entreprise');
        
        
        $this->vue->ecrireDonnee('centre', "../vues/includes/entreprise/centreCreerUneEntreprise.php");
        
        
        $this->vue->afficher();
        
    }
    
    
    
}
