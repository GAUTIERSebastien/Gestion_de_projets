-- phpMyAdmin SQL Dump

-- version 5.1.1deb5ubuntu1

-- https://www.phpmyadmin.net/

--

-- Hôte : localhost:3306

-- Généré le : mar. 12 sep. 2023 à 17:19

-- Version du serveur : 8.0.34-0ubuntu0.22.04.1

-- Version de PHP : 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Base de données : `Gprojects`

--

-- --------------------------------------------------------

--

-- Structure de la table `Participate`

--

CREATE TABLE
    `Participate` (
        `id_user` int NOT NULL,
        `id_project` int NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

--

-- Déchargement des données de la table `Participate`

--

INSERT INTO
    `Participate` (`id_user`, `id_project`)
VALUES (2, 1), (3, 1);

-- --------------------------------------------------------

--

-- Structure de la table `Priority`

--

CREATE TABLE
    `Priority` (
        `id_priority` int NOT NULL,
        `name_priority` varchar(50) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

--

-- Déchargement des données de la table `Priority`

--

INSERT INTO
    `Priority` (
        `id_priority`,
        `name_priority`
    )
VALUES (1, 'Haute'), (2, 'Moyenne'), (3, 'Basse');

-- --------------------------------------------------------

--

-- Structure de la table `Projects`

--

CREATE TABLE
    `Projects` (
        `id_project` int NOT NULL,
        `title` varchar(50) DEFAULT NULL,
        `description` varchar(50) DEFAULT NULL,
        `id_user` int NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

--

-- Déchargement des données de la table `Projects`

--

INSERT INTO
    `Projects` (
        `id_project`,
        `title`,
        `description`,
        `id_user`
    )
VALUES (
        1,
        'Projet Exemple',
        'Description du projet exemple',
        1
    );

-- --------------------------------------------------------

--

-- Structure de la table `Status`

--

CREATE TABLE
    `Status` (
        `id_status` int NOT NULL,
        `name_status` varchar(50) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

--

-- Déchargement des données de la table `Status`

--

INSERT INTO
    `Status` (`id_status`, `name_status`)
VALUES (1, 'Non débuté'), (2, 'En cours'), (3, 'Terminé');

-- --------------------------------------------------------

--

-- Structure de la table `Tasks`

--

CREATE TABLE
    `Tasks` (
        `id_task` int NOT NULL,
        `title` varchar(50) DEFAULT NULL,
        `description` varchar(100) DEFAULT NULL,
        `id_user` int NOT NULL,
        `id_status` int NOT NULL,
        `id_priority` int NOT NULL,
        `id_project` int NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

--

-- Déchargement des données de la table `Tasks`

--

INSERT INTO
    `Tasks` (
        `id_task`,
        `title`,
        `description`,
        `id_user`,
        `id_status`,
        `id_priority`,
        `id_project`
    )
VALUES (
        1,
        'Tâche 1',
        'Description de la tâche 1',
        1,
        1,
        1,
        1
    ), (
        2,
        'Tâche 2',
        'Description de la tâche 2',
        2,
        2,
        2,
        1
    ), (
        3,
        'Tâche 3',
        'Description de la tâche 3',
        1,
        1,
        3,
        1
    ), (
        4,
        'Tâche 4',
        'Description de la tâche 4',
        2,
        2,
        2,
        1
    ), (
        5,
        'Tâche 5',
        'Description de la tâche 5',
        3,
        3,
        1,
        1
    ), (
        6,
        'Tâche 6',
        'Description de la tâche 6',
        1,
        1,
        3,
        1
    );

-- --------------------------------------------------------

--

-- Structure de la table `Users`

--

CREATE TABLE
    `Users` (
        `id_user` int NOT NULL,
        `email` varchar(50) NOT NULL,
        `name` varchar(50) DEFAULT NULL,
        `firstname` varchar(50) DEFAULT NULL,
        `password` varchar(500) DEFAULT NULL,
        `is_deleted` tinyint(1) DEFAULT '0'
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

--

-- Déchargement des données de la table `Users`

--

INSERT INTO
    `Users` (
        `id_user`,
        `email`,
        `name`,
        `firstname`,
        `password`,
        `is_deleted`
    )
VALUES (
        1,
        'jean.dupont@email.com',
        'Dupont',
        'Jean',
        'dupont',
        0
    ), (
        2,
        'pierre.martin@email.com',
        'Martin',
        'Pierre',
        'martin',
        0
    ), (
        3,
        'marie.leroy@email.com',
        'Leroy',
        'Marie',
        'leroy',
        0
    );

--

-- Index pour les tables déchargées

--

--

-- Index pour la table `Participate`

--

ALTER TABLE `Participate`
ADD
    PRIMARY KEY (`id_user`, `id_project`),
ADD
    KEY `id_project` (`id_project`);

--

-- Index pour la table `Priority`

--

ALTER TABLE `Priority` ADD PRIMARY KEY (`id_priority`);

--

-- Index pour la table `Projects`

--

ALTER TABLE `Projects`
ADD
    PRIMARY KEY (`id_project`),
ADD KEY `id_user` (`id_user`);

--

-- Index pour la table `Status`

--

ALTER TABLE `Status` ADD PRIMARY KEY (`id_status`);

--

-- Index pour la table `Tasks`

--

ALTER TABLE `Tasks`
ADD PRIMARY KEY (`id_task`),
ADD
    KEY `id_user` (`id_user`),
ADD
    KEY `id_status` (`id_status`),
ADD
    KEY `id_priority` (`id_priority`),
ADD
    KEY `id_project` (`id_project`);

--

-- Index pour la table `Users`

--

ALTER TABLE `Users` ADD PRIMARY KEY (`id_user`);

--

-- AUTO_INCREMENT pour les tables déchargées

--

--

-- AUTO_INCREMENT pour la table `Tasks`

--

ALTER TABLE
    `Tasks` MODIFY `id_task` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 7;

--

-- Contraintes pour les tables déchargées

--

--

-- Contraintes pour la table `Participate`

--

ALTER TABLE `Participate`
ADD
    CONSTRAINT `Participate_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`),
ADD
    CONSTRAINT `Participate_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `Projects` (`id_project`);

--

-- Contraintes pour la table `Projects`

--

ALTER TABLE `Projects`
ADD
    CONSTRAINT `Projects_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`);

--

-- Contraintes pour la table `Tasks`

--

ALTER TABLE `Tasks`
ADD
    CONSTRAINT `Tasks_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`),
ADD
    CONSTRAINT `Tasks_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `Status` (`id_status`),
ADD
    CONSTRAINT `Tasks_ibfk_3` FOREIGN KEY (`id_priority`) REFERENCES `Priority` (`id_priority`),
ADD
    CONSTRAINT `Tasks_ibfk_4` FOREIGN KEY (`id_project`) REFERENCES `Projects` (`id_project`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;