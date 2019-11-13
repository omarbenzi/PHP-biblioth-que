<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/styles/styles.css" />
    <title><?php echo $titre ?></title>
</head>
<body>
    <div id="global">
        <div id="contenu">
            <?php echo $contenu ?> <!-- contenu d'une vue spécifique -->
        </div>
    </div>
</body>
</html>