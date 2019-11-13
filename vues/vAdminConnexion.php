<?php $this->titre = "Connexion"; ?>


<section id="connexion"> 

    <h1>Connexion</h1> 

    <form method="POST" action="admin">
        <p class="erreur">&nbsp;<?= (isset($msgErreur)) ? $msgErreur : null ?></p>
        <label>Identifiant</label>
        <input name="identifiant" value="<?= (isset($admin['identifiant'])) ? $admin['identifiant'] : null ?>">
        <p></p>
        <label>Mot de passe</label>
        <input name="mdp" type="password" value="<?= (isset($admin['mdp'])) ? $admin['mdp'] : null ?>">
        <p></p>
        <input type="submit" name="Envoyer" value="Envoyer">
    </form>
</section> <!-- contenu d'une vue spécifique -->
        </div>
        <footer>
        </footer>
    </div>
</body>
</html>