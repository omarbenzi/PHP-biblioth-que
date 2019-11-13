<?php

class Auteur extends Entite
{
    protected $id_auteur = NULL; // nommage identique au champ MySQL correspondant
    protected $nom = NULL; // nommage identique au champ MySQL correspondant
    protected $prenom = NULL; // nommage identique au champ MySQL correspondant
    public function __construct()
    { }
    /**
     * setId_auteur
     *
     * @param  int $id_auteur
     *
     * @return void
     */
    protected function setId_auteur($id_auteur = NULL)
    {
        $this->id_auteur = $id_auteur;
    }
    /**
     * setNom
     *
     * @param  mixed $nom
     *
     * @return void
     */
    protected function setNom($nom = NULL)
    {
        if (trim($nom) === "") {
            $this->erreursHydrate['nom'] = "Au moins un caractère.";
        }
        $this->nom = trim($nom);
    }
    /**
     * setPrenom
     *
     * @param  mixed $prenom
     *
     * @return void
     */
    protected function setPrenom($prenom = NULL)
    {
        if (trim($prenom) === "") {
            $this->erreursHydrate['prenom'] = "Au moins un caractère.";
        }
        $this->prenom = trim($prenom);
    }
}
