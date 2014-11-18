<?php
/**
 * Description of M_Specialite
 *
 * @author btssio
 */
class M_Stage{
    
	private $numStage; // type : int
	private $anneeScol; // type : string
	private $idEtudiant;
        private $idProfesseur; 
        private $idOrganisation;
        private $idMaster; 
        private $dateDebut;
        private $dateFin; 
        private $dateVisit ;
        private $ville; 
        
        
        
        function __construct($numStage, $anneeScol, $idEtudiant, $idProfesseur, $idOrganisation, $idMaster, $dateDebut, $dateFin, $dateVisit, $ville) {
            $this->numStage = $numStage;
            $this->anneeScol = $anneeScol;
            $this->idEtudiant = $idEtudiant;
            $this->idProfesseur = $idProfesseur;
            $this->idOrganisation = $idOrganisation;
            $this->idMaster = $idMaster;
            $this->dateDebut = $dateDebut;
            $this->dateFin = $dateFin;
            $this->dateVisit = $dateVisit;
            $this->ville = $ville;
        }
        public function getNumStage() {
            return $this->numStage;
        }
        public function getAnneeScol() {
            return $this->anneeScol;
        }
        public function getIdEtudiant() {
            return $this->idEtudiant;
        }
        public function getIdProfesseur() {
            return $this->idProfesseur;
        }
        public function getIdOrganisation() {
            return $this->idOrganisation;
        }
        public function getIdMaster() {
            return $this->idMaster;
        }
        public function getDateDebut() {
            return $this->dateDebut;
        }
        public function getDateFin() {
            return $this->dateFin;
        }
        public function getDateVisit() {
            return $this->dateVisit;
        }
        public function getVille() {
            return $this->ville;
        }
        public function setNumStage($numStage) {
            $this->numStage = $numStage;
        }
        public function setAnneeScol($anneeScol) {
            $this->anneeScol = $anneeScol;
        }
        public function setIdEtudiant($idEtudiant) {
            $this->idEtudiant = $idEtudiant;
        }
        public function setIdProfesseur($idProfesseur) {
            $this->idProfesseur = $idProfesseur;
        }
        public function setIdOrganisation($idOrganisation) {
            $this->idOrganisation = $idOrganisation;
        }
        public function setIdMaster($idMaster) {
            $this->idMaster = $idMaster;
        }
        public function setDateDebut($dateDebut) {
            $this->dateDebut = $dateDebut;
        }
        public function setDateFin($dateFin) {
            $this->dateFin = $dateFin;
        }
        public function setDateVisit($dateVisit) {
            $this->dateVisit = $dateVisit;
        }
        public function setVille($ville) {
            $this->ville = $ville;
        }
        
        
}