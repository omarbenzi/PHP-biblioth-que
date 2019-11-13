<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/styles/styles.css">
    <title><?php echo $titre ?></title>
</head>

<body>
    <div id="global">
        <header>
            <h1>Administration de la bibliothèque</h1>
            <div id="info">
                <p id="identifiant">
                    <!-- j'ignore pour quoi ces 2 variables ne s'active pas lors de la premiere chargement du gabarit apres la connexion  -->
                    <?= (isset($_SESSION['identifiant'])) ? '<a href="admin?item=administrateur&action=deconnecter">Déconnexion</a>' : null   ?>

                    <?= (isset($_SESSION['identifiant'])) ? $_SESSION['identifiant'] . ' connecté' : null   ?> </p>

            </div>
            <ul>
                <li><a class="<?= (preg_match('/Administrateur/', $this->vue)) ? "active" : ""; ?>" href="admin?item=administrateur">Administrateurs</a></li>
                <li><a class="<?= (preg_match('/Auteur/', $this->vue)) ? "active" : ""; ?>" href="admin?item=auteur">Auteurs</a></li>
                <li><a class="<?= (preg_match('/Livre/', $this->vue)) ? "active" : ""; ?>" href="admin?item=livre">Livres</a></li>

            </ul>
        </header>
        <div id="contenu">
            <?php echo $contenu ?>
            <!-- contenu d'une vue spécifique -->
        </div>
        <footer>
        </footer>
    </div>
</body>

</html>