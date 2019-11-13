<?php

class ControleurLivres
{
    private $tri_type = "annee";
    private $tri_ordre = "desc";
    private $recherche_annee = null;
    private $recherche_titreContient = null;



    public function __construct()
    {
        try {
            if (isset($_GET['action']) && $_GET['action'] === 'tri') {

                if (!in_array($_POST["type"], ["titre", "auteur", "annee"])) throw new exception('Type de tri non valide.', 1); // input verification
                if (!in_array($_POST["ordre"], ["asc", "desc"])) throw new exception('Ordre de tri non valide.', 1); // input verification valable meme pour mysql plus loin 
                $this->tri_type   = isset($_POST['type'])   ? $_POST['type'] : "annee";
                $this->tri_ordre  = isset($_POST['ordre'])   ? $_POST['ordre'] : "desc";
                $this->getLivresTries($this->tri_type, $this->tri_ordre);
            } elseif (isset($_GET['action']) && $_GET['action'] === 'recherche') {

                if (isset($_POST['annee']) || isset($_POST['titreContient'])) {

                    if (trim($_POST['annee']) !== '' || trim($_POST['titreContient']) !== '') {

                        $this->recherche_annee          = trim($_POST['annee']) === ''  ? null : $_POST['annee'];
                        $this->recherche_titreContient  = trim($_POST['titreContient']) === ''  ? null : $_POST['titreContient'];
                        $regExp = '/\d{4}/';
                        if (!is_null($this->recherche_annee)) {

                            if (!preg_match($regExp, $this->recherche_annee)) throw new Exception("Année non valide.", 2);
                            if ($this->recherche_annee < 1500 || $this->recherche_annee > date("Y")) throw new exception("Année hors de la période disponible.", 2);
                        }
                        $this->getLivresPar($this->recherche_annee, $this->recherche_titreContient);
                    } else {
                        $vue = new Vue("LivresRecherche", array(
                            'livres' => null,
                        ));
                    }
                } else {
                    $vue = new Vue("LivresRecherche", array(
                        'livres' => null,
                    ));
                }
            } else {
                $this->getLivres();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Affiche la page de liste des livres
     *
     */
    private function getLivres()
    {
        try {
            $reqPDO = new RequetesPDO();
            $livres = $reqPDO->getLivres($this->tri_type, $this->tri_ordre);
            $vue = new Vue("Livres", array(
                'livres' => $livres,
                'type'   => $this->tri_type,
                'ordre'  => $this->tri_ordre
            ));
        } catch (Exception $e) {
            $this->erreur($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Affiche la page de liste des livres triés
     *
     */
    private function getLivresTries()
    {
        try {
            $reqPDO = new RequetesPDO();
            $livres = $reqPDO->getLivres($this->tri_type, $this->tri_ordre); // valeur par defaut declarées si haut
            $vue = new Vue("LivresTri", array(
                'livres' => $livres,
                'type'   => $this->tri_type,
                'ordre'  => $this->tri_ordre
            ));
        } catch (Exception $e) {
            $this->erreur($e->getMessage(), $e->getCode());
        }
    }
    /**
     * Affiche du resultat d'une recherche 
     *
     */
    private function getLivresPar($annee, $recherche_titreContient)
    {
        try {
            $reqPDO = new RequetesPDO();
            $livres = $reqPDO->getLivresPar($annee, $recherche_titreContient);
            $vue = new Vue("LivresRecherche", array(
                'titreContient' => $recherche_titreContient,
                'annee' => $annee,
                'livres' => $livres,
                'type'   => $this->tri_type,
                'ordre'  => $this->tri_ordre
            ));
        } catch (Exception $e) {
            $this->erreur($e->getMessage(), $e->getCode());
        }
    }
    /**
     * Méthode qui affiche un message d'erreur
     * 
     */
    private function erreur($msgErreur, $codeErreur)
    {
        if ($codeErreur === 1) {
            $vue = new Vue("LivresTri", array(
                'msgErreur' => $msgErreur,
                'type'   => $this->tri_type,
                'ordre'  => $this->tri_ordre
            ));
        } elseif ($codeErreur === 2) {

            $vue = new Vue("LivresRecherche", array(
                'msgErreur' => $msgErreur,
                'annee'   => $this->recherche_annee,
                'titreContient'   => $this->recherche_titreContient
            ));
        } else {

            $vue = new Vue("Erreur", array('msgErreur' => $msgErreur));
        }
    }
}
