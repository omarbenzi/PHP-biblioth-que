<?php $this->titre = "Liste des administrateurs"; ?>
<p><a href="admin?item=administrateur&action=ajouter">Ajouter un administrateur</a></p>

<table>
    <tr>
        <th>Id administrateur</th>
        <th>Identifiant</th>
        <th>Mot de passe</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($admins as $admin) : ?>
        <tr>
            <td><?= $admin['id_administrateur'] ?></td>
            <td><?= $admin['identifiant'] ?></td>
            <td><?= $admin['mdp'] ?> </td>
            <td>
                <a href="admin?item=administrateur&id=<?= $admin['id_administrateur'] ?>&action=modifier">Modifier</a>
                <a href="admin?item=administrateur&id=<?= $admin['id_administrateur'] ?>&action=supprimer">Supprimer</a>
            </td>
        </tr>
    <?php endforeach;
    ?>

</table>
<!-- contenu d'une vue spécifique -->
</div>
<footer>
</footer>
</div>
</body>

</html>