<?php $this->titre = "Liste des livres"; ?>

<form method="POST" action="livres?action=tri">

    <label>Trier par :</label>
    <select name="type">
        <option value="titre" <?= ($type === 'titre') ? 'selected' : null ?>>Titre</option>
        <option value="auteur" <?= ($type === 'auteur') ? 'selected' : null ?>>Auteur</option>
        <option value="annee" <?= ($type === 'annee') ? 'selected' : null ?>>Année</option>
    </select>

    <label>Ordre :</label>
    <select name="ordre">
        <option value="asc" <?= ($ordre === 'asc') ? 'selected' : null ?>>Ascendant</option>
        <option value="desc" <?= ($ordre === 'desc') ? 'selected' : null ?>>Descendant</option>
    </select>
    <input type="submit" name="Envoyer" value="Exécuter le tri">
</form>
<?php if (!isset($msgErreur)) : ?>
    <table>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Année</th>
        </tr>

        <?php // foreach ($donnees['livres'] as $livre): // utilisation directe de $donnees 
            ?>

        <?php foreach ($livres as $livre) : // variable $livres provenant de la fonction extract($donnees) 
                ?>
            <tr>
                <?php // "affichage en utilisant le résultat de la fonction extract($donnees)" 
                        ?>
                <td><?php echo $livre['titre'] ?></td>
                <td><?php echo $livre['auteur'] ?></td>
                <td><?php echo $livre['annee'] ?></td>
            </tr>
        <?php endforeach;
            ?>
    </table>
<?php else :
    ?>
    <p class="erreur">Une erreur est survenue : <?= $msgErreur ?></p>
<?php endif;
?>