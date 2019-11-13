<?php $this->titre = "Connexion"; ?>

<section id="ajout-modification">

    <h1>Ajouter un administrateur</h1>

    <p class="erreur">&nbsp <?= (isset($erreurMysql)) ? $erreurMysql : null ?></p>

    <form method="POST" action="admin?item=administrateur&action=ajouter&id=">



        <label>Identifiant</label>
        <input name="identifiant" value="<?= (isset($admin['identifiant'])) ? $admin['identifiant'] : null ?>">
        <p class="erreur">&nbsp;<?= (isset($erreursHydrate['identifiant'])) ? $erreursHydrate['identifiant'] : null ?></p>

        <label>Mot de passe</label>
        <input name="mdp" value="<?= (isset($admin['mdp'])) ? $admin['mdp'] : null ?>">
        <p class="erreur">&nbsp;<?= (isset($erreursHydrate['mdp'])) ? $erreursHydrate['mdp'] : null ?></p>
        <input type="submit" name="Envoyer" value="Envoyer">
    </form>
</section>