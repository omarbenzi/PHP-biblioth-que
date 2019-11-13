<?php $this->titre = "Modifier un auteur"; ?>
<section id="ajout-modification">

    <h1>Modifier un auteur</h1>

    <p class="erreur">&nbsp <?= (isset($erreurMysql)) ? $erreurMysql : null ?></p>

    <form method="POST" action="admin?item=auteur&action=modifier&id=<?= (isset($auteur['id_auteur'])) ? $auteur['id_auteur'] : null ?>">


        <p>Id auteur : <?= (isset($auteur['id_auteur'])) ? $auteur['id_auteur'] : null ?></p>
        <input type="hidden" name="id_auteur" value="<?= (isset($auteur['id_auteur'])) ? $auteur['id_auteur'] : null ?>">

        <label>Nom</label>
        <input name="nom" value="<?= (isset($auteur['nom'])) ? $auteur['nom'] : null ?>">
        <p class="erreur">&nbsp; <?= (isset($erreursHydrate['nom'])) ? $erreursHydrate['nom'] : null ?></p>

        <label>Prénom</label>
        <input name="prenom" value="<?= (isset($auteur['prenom'])) ? $auteur['prenom'] : null ?>">
        <p class="erreur">&nbsp; <?= (isset($erreursHydrate['prenom'])) ? $erreursHydrate['prenom'] : null ?></p>
        <input type="submit" name="Envoyer" value="Envoyer">
    </form>
</section>