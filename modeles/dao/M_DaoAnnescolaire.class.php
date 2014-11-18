<?php

class M_DaoAnnescolaire extends M_DaoGenerique {

    function __construct() {
        $this->nomTable = "ANNEESCOL";
        $this->nomClefPrimaire = "ANNEESCOL";
    }
    
    

    public function enregistrementVersObjet($enreg) {
        $retour = new M_Anneescolaire($enreg['ANNEESCOL']);
        return $retour;
    }
    
    public function objetVersEnregistrement($objetMetier) {
        $retour = array(
            ':anneeScol' => $objetMetier->getNumClass()           
        );
        return $retour;
    }

    public function insert($objetMetier) {
        
    }

    

    public function update($idMetier, $objetMetier) {
        
    }

    public function getAll() {

        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM $this->nomTable P ";

        try {
            // préparer la requête PDO

            $queryPrepare = $this->pdo->prepare($sql);
            // exécuter la requête PDO
            if ($queryPrepare->execute()) {
                // si la requête réussit :
                // initialiser le tableau d'objets à retourner
                $retour = array();
                // pour chaque enregistrement retourné par la requête
                while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
                    // construir un objet métier correspondant
                    $unObjetMetier = $this->enregistrementVersObjet($enregistrement);
                    // ajouter l'objet au tableau
                    $retour[] = $unObjetMetier;
                }
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

}
