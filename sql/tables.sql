DROP TABLE IF EXISTS livre;
DROP TABLE IF EXISTS auteur;

--
-- Structure de la table auteur
--

CREATE TABLE auteur (
  id_auteur int          UNSIGNED NOT NULL AUTO_INCREMENT,
  nom       varchar(255) NOT NULL,
  prenom    varchar(255) NOT NULL,
  PRIMARY KEY (id_auteur)
) ENGINE=InnoDB  DEFAULT CHARSET=UTF8;

--
-- Contenu de la table auteur
--

SET NAMES UTF8;

INSERT INTO auteur VALUES( 1, 'Orwell', 'George');
INSERT INTO auteur VALUES( 2, 'Mitchell', 'Margaret');
INSERT INTO auteur VALUES( 3, 'Melville', 'Herman');
INSERT INTO auteur VALUES( 4, 'Dumas', 'Alexandre');
INSERT INTO auteur VALUES( 5, 'Marquez', 'Gabriel García');
INSERT INTO auteur VALUES( 6, 'Murakami', 'Haruki');
INSERT INTO auteur VALUES( 7, 'Camus', 'Albert');

--
-- Structure de la table livre
--


CREATE TABLE livre (
  id_livre  int          UNSIGNED NOT NULL AUTO_INCREMENT,
  id_auteur int          UNSIGNED NOT NULL,
  titre     varchar(255) NOT NULL,
  annee     smallint     UNSIGNED NOT NULL,
  PRIMARY KEY (id_livre),
  CONSTRAINT fk_id_auteur FOREIGN KEY (id_auteur) REFERENCES auteur(id_auteur)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

--
-- Contenu de la table livre
--

SET NAMES UTF8;

INSERT INTO livre (id_livre, id_auteur, titre, annee) VALUES
(1, 1, '1984', 1948),
(2, 2, 'Autant en emporte le vent', 1936),
(3, 3, 'Moby Dick', 1851),
(4, 4, 'Les 3 mousquetaires', 1844),
(5, 5, '100 ans de solitude', 1967),
(6, 6, 'Kafka sur le rivage', 2002),
(7, 7, 'L\'étranger', 1942),
(8, 7, 'La peste', 1947);

DROP TABLE IF EXISTS administrateur;

--
-- Structure de la table administrateur
--

CREATE TABLE administrateur (
  id_administrateur int(11)      UNSIGNED NOT NULL AUTO_INCREMENT,
  identifiant       varchar(255) NOT NULL UNIQUE,
  mdp               varchar(255) NOT NULL,
  PRIMARY KEY (id_administrateur)
) ENGINE=InnoDB  DEFAULT CHARSET=UTF8;

--
-- Contenu de la table administrateur
--

SET NAMES UTF8;

INSERT INTO administrateur VALUES( 1, 'p41admin', 'eVphmNCnuHYkynuhq/QH+Q==');