<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class C_Administrateur extends C_ControleurGenerique {
    
function afficherEleve()
    {
         $this->vue = new V_Vue("../vues/templates/template.inc.php");
        //$this->vue->ecrireDonnee('centre',"../vues/includes/accueil/centreAccueil.inc.php");
        // les données
        $this->vue->ecrireDonnee('titreVue', "GestStage : Afficher Les elèves");
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $eleves = $daoPers->getEleves();
        $daoPers->deconnecter();
        $this->vue->ecrireDonnee('eleves', $eleves);
        $this->vue->ecrireDonnee('centre', "../vues/includes/administrateur/centreAfficherEleves.php");
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }
}