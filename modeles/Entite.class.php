<?php



abstract class Entite
{ // une classe abstraite ne peut pas être instanciée
    protected $erreursHydrate;
    /**
     * hydrater les propriétés de l'objet avec les variables correspondantes
     * du tableau donnees
     */
    public function hydrate(array $donnees)
    {

        $this->erreursHydrate = [];

        foreach ($donnees as $key => $value) {

            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {

                // On appelle le setter.
                $this->$method($value);
            }
        }
        return $this->erreursHydrate;
    }

    /**
     * get de toutes les propriétés dans un tableau
     * destiné à être utilisé dans une vue
     */
    public function getItem()
    {
        foreach (get_object_vars($this) as $key => $valeur) {
            $prop[$key] = $valeur;
        }
        unset($prop['erreursHydrate']);
        return $prop;
    }
}
