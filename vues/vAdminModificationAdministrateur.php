<?php $this->titre = "Modifier un administrateur"; ?>

<section id="ajout-modification">

    <h1>Modifier un administrateur</h1>

    <p class="erreur">&nbsp; <?= (isset($erreurMysql)) ? $erreurMysql : null ?></p>

    <form method="POST" action="admin?item=administrateur&action=modifier&id=<?= (isset($admin['id_administrateur'])) ? $admin['id_administrateur'] : null ?>">


        <p>Id administrateur : 9</p>
        <input type="hidden" name="id_administrateur" value="<?= (isset($admin['id_administrateur'])) ? $admin['id_administrateur'] : null ?>">

        <label>Identifiant</label>
        <input name="identifiant" value="<?= (isset($admin['identifiant'])) ? $admin['identifiant'] : null ?>">
        <p class="erreur">&nbsp;<?= (isset($erreursHydrate['identifiant'])) ? $erreursHydrate['identifiant'] : null ?></p>

        <label>Mot de passe</label>
        <input name="mdp" value="<?= (isset($admin['mdp'])) ? $admin['mdp'] : null ?>">
        <p class="erreur">&nbsp;<?= (isset($erreursHydrate['mdp'])) ? $erreursHydrate['mdp'] : null ?></p>
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