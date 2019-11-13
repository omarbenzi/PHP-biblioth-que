<?php $this->titre = "Recherche de livres"; ?>
<form method="POST" action="livres?action=recherche">
    <label>Année :</label>
    <input name="annee" maxlength=4 value="<?= (isset($annee)) ? $annee : '' ?>">
    <label>Le titre contient :</label>
    <input name="titreContient" value="<?= (isset($titreContient)) ? $titreContient : '' ?>">
    <input type="submit" name="Envoyer" value="Lancer la recherche">
</form>

<?php if (!isset($msgErreur)) : ?>
    <?php if (isset($livres)) : ?>
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
            <?php endforeach; ?>
        <?php endif; ?>
    <?php else :
        ?>
        <p class="erreur"> <?= $msgErreur ?></p>
    <?php endif; ?>
        </table>