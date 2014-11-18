<?php

class M_Anneescolaire {
    private $anneeScol;
    
    function __construct($anneeScol) {
        $this->anneeScol = $anneeScol;
    }

    function getAnneeScol() {
        return $this->anneeScol;
    }

    function setAnneeScol($anneeScol) {
        $this->anneeScol = $anneeScol;
    }


}