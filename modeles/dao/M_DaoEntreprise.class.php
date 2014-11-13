<?php

class M_DaoEntreprise extends M_DaoGenerique {

    function __construct() {
        $this->nomTable = "ORGANISATION";
        $this->nomClefPrimaire = "IDORGANISATION";
    }

    public function enregistrementVersObjet($enreg) {
        
        // on construit l'objet Entreprise
        $retour = new M_Entreprise(
                $enreg['IDORGANISATION'], $enreg['NOM_ORGANISATION'], $enreg['VILLE_ORGANISATION'], $enreg['ADRESSE_ORGANISATION'], $enreg['CP_ORGANISATION'], $enreg['TEL_ORGANISATION'], $enreg['FAX_ORGANISATION'], $enreg['FORMEJURIDIQUE'], $enreg['ACTIVITE']
        );
        return $retour;
    }

    public function objetVersEnregistrement($objetMetier) {
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

    function insert($objetEntreprise) {
        $retour = 0;
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
            if($queryPrepare->execute($parametres)){
                $retour = $this->pdo->lastInsertId();
            }
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
            $retour = $queryPrepare->execute($parametres);
//            debug_query($sql, $parametres);
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }
}


