<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class M_DaoStage extends M_DaoGenerique
{
    function __construct() {
        $this->nomTable = "STAGE";
        $this->nomClefPrimaire = "NUM_STAGE";
    }
    public function enregistrementVersObjet($unEnregistrement) {
        
    }
  public function ObjetVersEnregistrement($objetMetier) {
      $retour = array(
          ':anneeScol' => $objetMetier->getAnneeScol(),
          ':idEtudiant' => $objetMetier->getIdEtudiant(),
          ':idProfesseur' => $objetMetier->getIdProfesseur(),
          ':idOrganisation' => $objetMetier->getIdOrganisation(),
          ':idMaster' => $objetMetier->getIdMaster(),
          ':dateDebut' => $objetMetier->getDateDebut(),
          ':dateFin' => $objetMetier->getDateFin(),
          ':dateVisit' => $objetMetier->getDateVisit(),
          ':ville' => $objetMetier->getVille()
          );
      return $retour ;
        
    }
    public function insert($objetMetier) {
        
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "INSERT INTO $this->nomTable (";
            $sql .= "NUM_STAGE,ANNEESCOL,IDETUDIANT,IDPROFESSEUR,IDORGANISATION,IDMAITRESTAGE,DATEDEBUT,DATEFIN,DATEVISITESTAGE,VILLE) ";
            $sql .= "VALUES (";
            $sql .= "null, :anneeScol, :idEtudiant, :idProfesseur, :idOrganisation, :idMaster, :dateDebut, :dateFin, ";
            $sql .= ":dateVisit, :ville)";
           
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
         
            // préparer la  liste des paramètres, avec l'identifiant en dernier
            $parametres = $this->objetVersEnregistrement($objetMetier);
            
           
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            $retour = $queryPrepare->execute($parametres);
          
//            debug_query($sql, $parametres);
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
        
    }
    public function update($idMetier, $objetMetier) {
        
    }
}