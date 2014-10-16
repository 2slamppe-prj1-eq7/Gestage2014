<?php

class M_DaoEntreprise extends M_DaoGenerique {

    function __construct() {
        $this->nomTable = "ORGANISATION";
        $this->nomClefPrimaire = "IDORGANISATION";
    }

    /**
     * Redéfinition de la méthode abstraite de M_DaoGenerique
     * Permet d'instancier un objet d'après les valeurs d'un enregistrement lu dans la base de données
     * @param tableau-associatif $unEnregistrement liste des valeurs des champs d'un enregistrement
     * @return objet :  instance de la classe métier, initialisée d'après les valeurs de l'enregistrement 
     */
    public function enregistrementVersObjet($enreg) {
        
        // on construit l'objet Entreprise
        $retour = new M_Entreprise(
                $enreg['IDORGANISATION'], $enreg['NOM_ORGANISATION'], $enreg['VILLE_ORGANISATION'], $enreg['ADRESSE_ORGANISATION'], $enreg['CP_ORGANISATION'], $enreg['TEL_ORGANISATION'], $enreg['FAX_ORGANISATION'], $enreg['FORMEJURIDIQUE'], $enreg['ACTIVITE']
        );
        return $retour;
    }

    /**
     * Prépare une liste de paramètres pour une requête SQL UPDATE ou INSERT
     * @param Object $objetMetier
     * @return array : tableau ordonné de valeurs
     */
    public function objetVersEnregistrement($objetMetier) {
        // construire un tableau des paramètres d'insertion ou de modification
        // l'ordre des valeurs est important : il correspond à celui des paramètres de la requête SQLl
        $retour = array(
            ':id' => $objetMetier->getId(),
            ':nom' => $objetMetier->getNom(),
            ':ville' => $objetMetier->getVille(),
            ':adresse' => $objetMetier->getAdresse(),
            ':cp' => $objetMetier->getCp(),
            ':tel' => $objetMetier->getTel(),
            ':fax' => $objetMetier->getFax(),
            ':fj' => $objetMetier->getFj(),
            ':activite' => $objetMetier->getActivite(),
        );
        return $retour;
    }

    /**
     * Lire tous les enregistrements d'une table
     * @return tableau-associatif d'objets : un tableau d'instances de la classe métier
     */
//    function getAll() {
//        echo "--- getAll redéfini ---<br/>";
//        $retour = null;
//        // Requête textuelle
//        $sql = "SELECT * FROM $this->nomTable";
//        try {
//            // préparer la requête PDO
//            $queryPrepare = $this->pdo->prepare($sql);
//            // exécuter la requête PDO
//            if ($queryPrepare->execute()) {
//                // si la requête réussit :
//                // initialiser le tableau d'objets à retourner
//                $retour = array();
//                // pour chaque enregistrement retourné par la requête
//                while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
//                    // construir un objet métier correspondant
//                    //$unObjetMetier = $this->enregistrementVersObjet($enregistrement);
//                    // ajouter l'objet au tableau
//                    $retour[] = $enregistrement;
//                }
//            }
//        } catch (PDOException $e) {
//            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
//        }
//        return $retour;
//    }

    // eager-fetching
//    function getOneById($id) {
//        $retour = null;
//        try {
//            // Requête textuelle
//            $sql = "SELECT * FROM $this->nomTable";
//            $sql .= " WHERE $this->nomClefPrimaire = :id";
//            // préparer la requête PDO
//            $queryPrepare = $this->pdo->prepare($sql);
//            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici) dans un tableau
//            if ($queryPrepare->execute(array(':id' => $id))) {
//                // si la requête réussit :
//                // extraire l'enregistrement retourné par la requête
//                $enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC);
//                // construire l'objet métier correspondant
//                $retour = $this->enregistrementVersObjet($enregistrement);
//            }
//        } catch (PDOException $e) {
//            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
//        }
//        return $retour;
//    }

//    // eager-fetching
//    function getOneByLogin($valeurLogin) {
//        $retour = null;
//        try {
//            // Requête textuelle
//            $sql = "SELECT * FROM $this->nomTable";
//            $sql .= "WHERE P.LOGINUTILISATEUR = ?";
//            // préparer la requête PDO
//            $queryPrepare = $this->pdo->prepare($sql);
//            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici) dans un tableau
//            if ($queryPrepare->execute(array($valeurLogin))) {
//                // si la requête réussit :
//                // extraire l'enregistrement retourné par la requête
//                $enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC);
//                // construire l'objet métier correspondant
//                $retour = $this->enregistrementVersObjet($enregistrement);
//            }
//        } catch (PDOException $e) {
//            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
//        }
//        return $retour;
//    }

//    /**
//     * verifierLogin
//     * @param string $login
//     * @param string $mdp
//     * @return boolean 
//     */
//    function verifierLogin($login, $mdp) {
//        $retour = null;
//        try {
//            $sql = "SELECT * FROM $this->nomTable WHERE LOGINUTILISATEUR=:login AND MDPUTILISATEUR=:mdp";
//            $stmt = $this->pdo->prepare($sql);
//            if ($stmt->execute(array(':login' => $login, ':mdp' => sha1($mdp)))) {
//                $retour = $stmt->fetch(PDO::FETCH_ASSOC);
//            }
//        } catch (PDOException $e) {
//            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
//        }
//        return $retour;
//    }

    /**
     * suppression
     * @param type $idMetier
     * @return boolean Cette fonction retourne TRUE en cas de succès ou FALSE si une erreur survient.
     */
    function insert($objetEntreprise) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "INSERT INTO $this->nomTable ";
            $sql .= "VALUES (";
            $sql .= ":id, :nom, :ville, :adresse, :cp, :tel, :fax, :fj, :activite)";
//            var_dump($sql);
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // préparer la  liste des paramètres, avec l'identifiant en dernier
            $parametres = $this->objetVersEnregistrement($objetEntreprise);
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            $retour = $queryPrepare->execute($parametres);
//            debug_query($sql, $parametres);
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    function update($idMetier, $objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "UPDATE $this->nomTable SET ";
            $sql .= "IDORGANISATION = :id , ";
            $sql .= "NOM_ORGANISATION = :nom , ";
            $sql .= "VILLE_ORGANISATION = :ville , ";
            $sql .= "ADRESSE_ORGANISATION = :adresse , ";
            $sql .= "CP_ORGANISATION = :cp , ";
            $sql .= "TEL_ORGANISATION = :tel , ";
            $sql .= "FAX_ORGANISATION = :fax , ";
            $sql .= "FROMJURIDIQUE = :fj , ";
            $sql .= "ACTIVITE = :activite ";
            $sql .= "WHERE IDORGANISATION = :id";
//            var_dump($sql);
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // préparer la  liste des paramètres la valeur de l'identifiant
            //  à prendre en compte est celle qui a été passée en paramètre à la méthode
//            $parametres = $this->objetVersEnregistrement($objetEntreprise);
//            $parametres[':id'] = $idMetier;
//            // exécuter la requête avec les valeurs des paramètres dans un tableau
            $retour = $queryPrepare->execute($parametres);
//            debug_query($sql, $parametres);
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }
    
    
//    function verif($row, $objet) {
//        $retour = null;
//        $ok = 1;
//        try {
//            $sql = 'SELECT ' . $row . ' FROM ' . $this->nomTable . ' WHERE ' . $row . '="' . $objet . '"';
//            $stmt = $this->pdo->prepare($sql);
//            $stmt->execute();
//            $retour = $stmt->fetch(PDO::FETCH_ASSOC);
//            if (!empty($retour)) {
//
//                $ok = 0;
//            }
//        } catch (PDOException $e) {
//            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
//        }
//        return $ok;
//    }

}


