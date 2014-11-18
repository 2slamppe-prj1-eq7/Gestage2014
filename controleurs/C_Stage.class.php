<?php

class C_Stage extends C_ControleurGenerique {

    function ajoutStage($message = false) {
        $daoPers = New M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();
        $rows = array('nom', 'prenom');

        $etudiants = $daoPers->getAllByRole(4);
        $professeurs = $daoPers->getAllByRole(3);
        $maitresStage = $daoPers->getAllByRole(5);

        $classe = New M_DaoClasse;
        $classe->setPdo($pdo);

        $anneeScol = New M_DaoAnnescolaire();
        $anneeScol->setPdo($pdo);
        $listeAnnee = $anneeScol->getAll();


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
        $this->vue->ecrireDonnee('listeAnnee', $listeAnnee);
        $this->vue->ecrireDonnee('etudiants', $etudiants);
        $this->vue->ecrireDonnee('professeurs', $professeurs);
        $this->vue->ecrireDonnee('maitresStage', $maitresStage);
        $this->vue->ecrireDonnee('listeOrgas', $orgas);
        if ($message) {
            $this->vue->ecrireDonnee('message', $message);
        }
        $this->vue->ecrireDonnee('gauche', '../vues/templates/gauche.inc.php');
        $this->vue->ecrireDonnee('titreVue', $titre);
        $this->vue->ecrireDonnee('centre', "../vues/includes/stage/centreAjoutStage.php");
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();

        //Mémoriser les personnes
    }

    function validationAjoutStage() {

        //Validation data obligatoire      
        $message = Array();
        $validation = true;
        $champsNonObligatoires = array();

        foreach ($_POST as $champ => $valeur) {
            if (!in_array($champ, $champsNonObligatoires)) {
                if (empty($valeur)) {
                    $message[] = "Champ non rempli : " . $champ;
                    $validation = false;
                }
            }
        }
        if ($validation) {

            $anneScol = $_POST['anneeScol'];
            $idEtudiant = $_POST['Etudiant'];
            $idProf = $_POST['Professeur'];
            $idOrga = $_POST['nomOrgas'];
            $idMaster = $_POST['MaitreStage'];




            $dateDebut = $_POST['dateDebut'];
            $dateFin = $_POST['dateFin'];
            $dateVisite = $_POST['dateVisite'];

            $dateDebut = splitDate($dateDebut);
            $dateFin = splitDate($dateFin);
            $dateVisite = splitDate($dateVisite);


            $ville = $_POST['ville'];

            $ok = 1;
            if ($dateFin < $dateDebut) {
                $message[] = "La date de fin de stage doit être superieur à la date du début";
                $ok = 0;
            }


            if (($dateVisite < $dateDebut) && ($dateVisite > $dateFin)) {
                $message[] = "La date de visite doit se trouver entre la date du début et la date de fin";
                $ok = 0;
            }

            //Si les dates correspondent on envoie

            if ($ok == 1) {

                //Initialisation du pdo
                $stage = new M_DaoStage();
                $stage->connecter();
                $stage->getPdo();

                //Creation de l'objet stage
                $Unstage = new M_Stage(null, $anneScol, $idEtudiant, $idProf, $idOrga, $idMaster, $dateDebut, $dateFin, $dateVisite, $ville);
                //Insertion dans la base de donnée
                if ($stage->insert($Unstage) == 'true') {
                    $message[] = "Le stage à bien été enregisté";
                    $this->ajoutStage($message);
                    
                } else {
                    $message[] = "Une erreur inconnue s'est produite";
                    $this->ajoutStage($message);

                }
            } else {
                $this->ajoutStage($message);
            }
        }else {
               $this->ajoutStage($message);
            }


            
        }
    }


