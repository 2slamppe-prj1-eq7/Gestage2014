<?php


/**
 * Description of C_AdminPersonnes
 * CRUD Personnes
 * @author btssio
 */
class C_AdminPersonnes extends C_ControleurGenerique {
    // Fonction d'affichage du formulaire de création d'une personne
    function creerPersonne(){
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Cr&eacute;ation d\'une personne');
        // ... depuis la BDD       
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();
       
        // Mémoriser la liste des spécialités disponibles
        $daoSpecialite = new M_DaoSpecialite();
        $daoSpecialite->setPdo($pdo);
        $this->vue->ecrireDonnee('lesSpecialites', $daoSpecialite->getAll());
               
        // Mémoriser la liste des rôles disponibles
        $daoRole = new M_DaoRole();
        $daoRole->setPdo($pdo);
        $this->vue->ecrireDonnee('lesRoles', $daoRole->getAll());
        
        $this->vue->ecrireDonnee('loginAuthentification',MaSession::get('login'));       
        $this->vue->ecrireDonnee('centre', "../vues/includes/adminPersonnes/centreCreerPersonne.inc.php");
               
        $this->vue->afficher();
    }
    
    //validation de création d'utilisateur 
    function validationcreerPersonne(){
        
             
        //Récupération données 
        $specialite= $_POST["option"];
        $role= $_POST["role"];
        $civilite= $_POST["civilite"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $mail = $_POST["mail"];
        $numTel = $_POST["tel"];
        $mobile = $_POST["telP"];
        $etudes = $_POST["etudes"];
        $formation = $_POST["formation"];
        $entreprises = $_POST["entreprise1"];
        $login = $_POST["login"];
        $mdp = sha1($_POST["mdp"]);
          
        //Création des objets
        $objetRole=new M_Role($role,null,null); 
        $pers = new M_Personne(null, $specialite, $objetRole, $civilite, $nom, $prenom, $numTel, $mail, $mobile, $etudes, $formation, $login, $mdp);
        
        //Connexion et insert bdd
        $daoPers= new M_DaoPersonne();             
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();
        $daoPers->insert($pers);
        
    }
    
    function afficherPersonne(){
        
    } 
    
    
        
  
}
