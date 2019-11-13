<?php

class Vue {
  
    private $vue;
    private $titre; // Titre de la vue (défini dans le fichier vue)

    /**
     * Constructeur qui génère et affiche la page html complète associée à la vue
     * --------------------------------------------------------------------------
     *
     */
    public function __construct($vue, $donnees=array(), $gabarit="gabarit") {
        
        $this->vue = $vue;
        $fichierVue = "vues/v".$vue.".php";
        
        // Génération de la partie spécifique de la page
        $contenu = $this->genererFichier($fichierVue, $donnees);
        
        // Génération du gabarit commun utilisant la partie spécifique
        $page = $this->genererFichier('vues/'.$gabarit.'.php',
                                     array('titre' => $this->titre, 'contenu' => $contenu));
        
        // Renvoi de la vue au navigateur
        echo $page;
    }

    /**
     * Méthode qui génère un code html à partir d'un fichier en fusionnant des données
     * -------------------------------------------------------------------------------
     *
     */
    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            
            // Démarrage de la temporisation de sortie
            ob_start();
            
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
            
        } else {
            throw new Exception("Fichier '$fichier' introuvable.");
        }
    }
}