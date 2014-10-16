<?php
/**
 * Description of M_Personne
 *
 * @author btssio
 */
class M_Personne {
    private $id;
    private $nom;
    private $ville;
    private $adresse;
    private $cp;
    private $tel;
    private $fax;
    private $fj;
    private $activite;

    function __construct($id, $nom, $ville, $adresse, $cp, $tel, $fax, $fj, $activite) {
        $this->id = $id;
        $this->nom = $nom;
        $this->ville = $ville;
        $this->adresse = $adresse;
        $this->cp = $cp;
        $this->tel = $tel;
        $this->fax = $fax;
        $this->fj = $fj;
        $this->activite = $activite;
    }
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getVille() {
        return $this->ville;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getCp() {
        return $this->cp;
    }

    function getTel() {
        return $this->tel;
    }

    function getFax() {
        return $this->fax;
    }

    function getFj() {
        return $this->fj;
    }

    function getActivite() {
        return $this->activite;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setFax($fax) {
        $this->fax = $fax;
    }

    function setFj($fj) {
        $this->fj = $fj;
    }

    function setActivite($activite) {
        $this->activite = $activite;
    }

}
