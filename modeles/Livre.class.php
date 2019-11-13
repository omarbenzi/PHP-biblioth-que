<?php

class Livre extends Entite
{
    protected $id_auteur = NULL; // nommage identique au champ MySQL correspondant
    protected $id_livre = NULL; // nommage identique au champ MySQL correspondant
    protected $titre = NULL; // nommage identique au champ MySQL correspondant
    protected $annee = NULL; // nommage identique au champ MySQL correspondant
    public function __construct()
    { }
    /**
     * setId_livre
     *
     * @param  mixed $id_livre
     *
     * @return void
     */
    protected function setId_livre($id_livre = NULL)
    {
        $this->id_livre = $id_livre;
    }
    /**
     * setId_auteur
     *
     * @param  mixed $id_auteur
     *
     * @return void
     */
    protected function setId_auteur($id_auteur)
    {
        $id_auteur = (int) $id_auteur;
        (is_int($id_auteur)) ? $this->id_auteur = $id_auteur : $this->erreursHydrate['id_auteur'] = "id auteur est invalide";
    }

    /**
     * setTitre
     *
     * @param  mixed $titre
     *
     * @return void
     */
    protected function setTitre($titre = NULL)
    {
        if (trim($titre) === "") {
            $this->erreursHydrate['titre'] = "Au moins un caractère.";
        }
        $this->titre = trim($titre);
    }
    /**
     * setAnnee
     *
     * @param  mixed $annee
     *
     * @return void
     */
    protected function setAnnee($annee = NULL)
    {
        $regExp = '/\d{4}/';
        if (!preg_match($regExp, $annee) || $annee < 1500 || $annee > date("Y")) {
            $this->erreursHydrate['annee'] = "Doit être comprise entre 1500 et " . date("Y") . ".";
        }
        $this->annee = trim($annee);
    }
}
