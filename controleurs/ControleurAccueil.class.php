<?php

class ControleurAccueil {

    public function __construct() {
        $this->accueil();
    }

    /**
     * Affiche la page d'accueil 
     *
     */    
    public function accueil() {
        $vue = new Vue("Accueil");
    }
}