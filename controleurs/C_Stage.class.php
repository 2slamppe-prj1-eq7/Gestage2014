<?php

class C_Stage extends C_ControleurGenerique {

    function ajoutStage($message = " ") {
        $daoPers = New M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();
        $rows = array('nom', 'prenom');
        $etudiant = $daoPers->getAllByRole($rows, 4);
        $prof = $daoPers->getAllByRole($rows, 3);
        $classe = New M_DaoClasse;

        $classe->setPdo($pdo);

        $orga = New M_DaoEntreprise();
        $orga->setPdo($pdo);
        $orgas = $orga->getAll();





        //VUE
        $fichier = "../vues/templates/template.inc.php";
        $centre = "../vues/includes/stage/centreAjoutStage.php";
        $titre = 'Ajouter un stage';
        $this->vue = new V_Vue($fichier);
        $this->vue = new V_Vue($fichier);
        $this->vue->ecrireDonnee('listeClasse', $classe->getAll());
        $this->vue->ecrireDonnee('listeNoms', $etudiant);
        $this->vue->ecrireDonnee('listeProf', $prof);
        $this->vue->ecrireDonnee('listeOrgas', $orgas);
        $this->vue->ecrireDonnee('message', $message);
        $this->vue->ecrireDonnee('gauche', '../vues/templates/gauche.inc.php');
        $this->vue->ecrireDonnee('titreVue', $titre);
        $this->vue->ecrireDonnee('centre', "../vues/includes/stage/centreAjoutStage.php");
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();

        //Mémoriser les personnes
    }

    function validationAjoutStage() {

        $daoPers = New M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();

        //Verif Maître de stage
        $nom = $_POST['nomMaster'];
        $prenom = $_POST['prenomMaster'];

        $verifMaster = $daoPers->getOnByName($nom, $prenom);
        //Verification que le maître de stage existe
        if (!empty($verifMaster)) {
            //RECUPERATION DE L'ID DU MAITRE DE STAGE
            $idMaster = $daoPers->getIdPers($nom, $prenom);
            $idMaster = intval($idMaster['IDPERSONNE']);


            //RECUPERATION DE L'ID DE L'ETUDIANT
            $nomEtudiant = $_POST['nomEtudiant'];
            $prenomEtudiant = $_POST['prenomEtudiant'];
            $idEtudiant = $daoPers->getIdPers($nomEtudiant, $prenomEtudiant);

            if ($idEtudiant) {
                $idEtudiant = intval($idEtudiant['IDPERSONNE']);
                //RECUPERATION DE L'ID DU PROFESSEUR
                $nomProf = $_POST['nomProf'];
                $prenomProf = $_POST['prenomProf'];
                $idProf = $daoPers->getIdPers($nomProf, $prenomProf);
                if ($idProf) {
                    $idProf = intval($idProf['IDPERSONNE']);
                    //Instanciation du stage
                    $stage = new M_DaoStage();
                    //INITIALISATION DES VARIABLES
                    $classe = $_POST['classe'];
                    $anneScol = $_POST['anneeScol'];
                    $idOrga = intval($_POST['nomOrgas']);
                    $dateDebut = $_POST['dateDebut'];
                    $dateFin = $_POST['dateFin'];
                    $dateVisite = $_POST['dateVisite'];
                    $ville = $_POST['ville'];
                    //TRANSFORMATION DES DATES AU FORMAT DATE DE MYSQL
                    $dateDebut = splitDate($dateDebut);
                    $dateFin = splitDate($dateFin);
                    $dateVisite = splitDate($dateVisite);

                    if ($idOrga != -1) {
                        //COMPARAISON DES DATES
                        $ok = 1;

                        if ($dateFin < $dateDebut) {
                            $message = "La date de fin de stage doit être superieur à la date du début";
                            $ok = 0;
                        }


                        if (($dateVisite < $dateDebut) && ($dateVisite > $dateFin)) {
                            $message = "La date de visite doit se trouver entre la date du début et la date de fin";
                            $ok = 0;
                        }

                        //Si les dates correspondent on envoie

                        if ($ok == 1) {

                            //Initialisation du pdo
                            $stage->connecter();
                            $stage->getPdo();

                            //Creation de l'objet stage
                            $Unstage = new M_Stage(null, $anneScol, $idEtudiant, $idProf, $idOrga, $idMaster, $dateDebut, $dateFin, $dateVisite, $ville);
                            //Insertion dans la base de donnée
                            if ($stage->insert($Unstage) == 'true') {
                                $message = "Le stage à bien été enregisté";
                            } else {
                                $message = "Une erreur inconnue s'est produite";
                            }
                        } else {
                            $message = $message;
                        }
                    } else {
                        $message = "Le nom de l'entreprise doit être remplis";
                    }
                } else {
                    $message = "Le nom et le prenom du professeur ne correspondent pas";
                }
            } else {
                $message = "Le nom et prenom de l'étudiant ne correspondent pas";
            }
        } else {
            $message = "Le maître de stage n'est pas présent dans nos données, Veuillez l'ajouter.";
        }

        $this->ajoutStage($message);
    }
    
 
        

}
