<?php $this->titre = "Liste des livres"; ?>


<p><a href="admin?item=livre&action=ajouter">Ajouter un livre</a></p>
<?php if (!isset($msgErreur)) : ?>
    <table>
        <tr>
            <th>Id livre</th>
            <th>Titre</th>
            <th>Année</th>
            <th>Auteur</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($livres as $livre) : ?>
            <tr>
                <td><?= $livre["id_livre"] ?></td>
                <td><?= $livre["titre"] ?></td>
                <td><?= $livre["annee"] ?></td>
                <td><?= $livre["auteur"] ?></td>
                <td>
                    <a href="admin?item=livre&id=<?= $livre["id_livre"] ?>&action=modifier">Modifier</a>
                    <a href="admin?item=livre&id=<?= $livre["id_livre"] ?>&action=supprimer">Supprimer</a>
                </td>
            </tr>
        <?php endforeach;
            ?>
    </table>
<?php else :
    ?>
    <p class="erreur">Une erreur est survenue : <?= $msgErreur ?></p>
<?php endif;
?>