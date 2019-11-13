<?php

class Admin extends Entite
{
    protected $identifiant = NULL; // nommage identique au champ MySQL correspondant
    protected $mdp = NULL; // nommage identique au champ MySQL correspondant
    protected $id_administrateur = null;


    public function __construct()
    { }
    /**
     * setId_livre
     *
     * @param  int $id_administrateur
     *
     * @return void
     */
    protected function setId_livre($id_administrateur = NULL)
    {
        $this->id_administrateur = $id_administrateur;
    }



    /**
     * setIdentifiant
     *
     * @param  mixed $identifiant
     *
     * @return void
     */
    protected function setIdentifiant($identifiant = NULL)
    {
        $regExp = '/\S{8,}/';
        if (!preg_match($regExp, $identifiant)) {
            $this->erreursHydrate['identifiant'] = "Au moins 8 caractères.";
        }
        $this->identifiant = trim($identifiant);
    }

    /**
     * setMdp
     *
     * @param  mixed $mdp
     *
     * @return void
     */
    protected function setMdp($mdp = NULL)
    {
        $regExp = '/\S{8,}/';
        if (!preg_match($regExp, $mdp))
            $this->erreursHydrate['mdp'] =  "Au moins 8 caractères.";

        $this->mdp = trim($mdp);
    }
}
