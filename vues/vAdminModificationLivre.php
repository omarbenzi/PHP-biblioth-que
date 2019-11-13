<?php $this->titre = "Modifier un livre"; ?>
<section id="ajout-modification">

    <h1>Modifier un livre</h1>

    <p class="erreur"><?= (isset($erreurMysql)) ? $erreurMysql : null ?></p>
    <p class="erreur"><?= (isset($erreursHydrate['id_auteur'])) ? $erreursHydrate['id_auteur'] : null // erruer id_auteur  
                        ?></p>

    <form method="POST" action="admin?item=livre&action=modifier&id=<?= (isset($livre['id_livre'])) ? $livre['id_livre'] : null ?>">



        <label>Titre</label>
        <input name="titre" value="<?= (isset($livre['titre'])) ? $livre['titre'] : null ?>">
        <p class="erreur">&nbsp;<?= (isset($erreursHydrate['titre'])) ? $erreursHydrate['titre'] : null ?></p>

        <label>Année</label>
        <input name="annee" value="<?= (isset($livre['annee'])) ? $livre['annee'] : null ?>">
        <p class="erreur">&nbsp; <?= (isset($erreursHydrate['annee'])) ? $erreursHydrate['annee'] : null ?></p>

        <label>Auteur</label>
        <select name="id_auteur">
            <?php foreach ($auteurs as $auteur) : ?>
                <option value="<?= $auteur['id_auteur'] ?>" <?= ($auteur['id_auteur'] == $livre['id_auteur']) ? 'selected' : '' ?>><?= $auteur['auteur'] ?> </option>
            <?php endforeach;
            ?>
        </select>
        <input type="submit" name="Envoyer" value="Envoyer">
    </form>
</section>

<!-- contenu d'une vue spécifique -->
</div>
<footer>
</footer>
</div>
</body>

</html>