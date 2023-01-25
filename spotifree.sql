-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 25 jan. 2023 à 21:47
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spotifree`
--

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

CREATE TABLE `playlist`
(
    `id_playlist` int(3)      NOT NULL,
    `title`       varchar(50) NOT NULL,
    `size`        int(3)      NOT NULL,
    `duration`    int(6)      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `title`, `size`, `duration`)
VALUES (1, 'Mes favoris', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `playlist2track`
--

CREATE TABLE `playlist2track`
(
    `id_playlist` int(3) NOT NULL,
    `id_track`    int(3) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE `profile`
(
    `email`      varchar(256) NOT NULL,
    `name`       varchar(50)  NOT NULL,
    `surname`    varchar(50)  NOT NULL,
    `age`        int(3)       NOT NULL,
    `pref_style` varchar(50)  NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`email`, `name`, `surname`, `age`, `pref_style`)
VALUES ('admin@mail.com', 'John', 'Doe', 18, 'Classique');

-- --------------------------------------------------------

--
-- Structure de la table `track`
--

CREATE TABLE `track`
(
    `id`       int(3)      NOT NULL,
    `title`    varchar(50) NOT NULL,
    `artist`   varchar(50) NOT NULL,
    `filename` varchar(50) NOT NULL,
    `duration` int(3)      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `track`
--

INSERT INTO `track` (`id`, `title`, `artist`, `filename`, `duration`)
VALUES (1, 'A Small Miracle', 'Free Artist', 'a-small-miracle-132333', 76),
       (2, 'Abstract Fashion Pop', 'Free Artist', 'abstract-fashion-pop-131283', 92),
       (3, 'Cinim Brainfluid', 'Free Artist', 'cinim-brainfluid-122844', 177),
       (4, 'Drop It', 'Free Artist', 'drop-it-124014', 102),
       (5, 'Lifelike', 'Free Artist', 'lifelike-126735', 144),
       (6, 'Mountain Path', 'Free Artist', 'mountain-path-125573', 208),
       (7, 'Password Infinity', 'Free Artist', 'password-infinity-123276', 165),
       (8, 'Please Calm My Mind', 'Free Artist', 'please-calm-my-mind-125566', 175),
       (9, 'Relaxed Vlog', 'Free Artist', 'relaxed-vlog-131746', 140),
       (10, 'The Beat Of Nature', 'Free Artist', 'the-beat-of-nature-122841', 173);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user`
(
    `email`    varchar(256) NOT NULL,
    `password` varchar(256) NOT NULL,
    `role`     int(3)       NOT NULL DEFAULT 1
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`email`, `password`, `role`)
VALUES ('admin@mail.com', '$2y$12$LaXLy0iqGeDp2tkIUde33e9lYhHGyAztggfzulV/dy20YfIjQSY5G', 100);

-- --------------------------------------------------------

--
-- Structure de la table `user2playlist`
--

CREATE TABLE `user2playlist`
(
    `id_playlist` int(3)       NOT NULL,
    `id_user`     varchar(256) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `user2playlist`
--

INSERT INTO `user2playlist` (`id_playlist`, `id_user`)
VALUES (1, 'admin@mail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `playlist`
--
ALTER TABLE `playlist`
    ADD PRIMARY KEY (`id_playlist`);

--
-- Index pour la table `playlist2track`
--
ALTER TABLE `playlist2track`
    ADD PRIMARY KEY (`id_playlist`, `id_track`),
    ADD KEY `p2t_track` (`id_track`);

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
    ADD PRIMARY KEY (`email`);

--
-- Index pour la table `track`
--
ALTER TABLE `track`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`email`);

--
-- Index pour la table `user2playlist`
--
ALTER TABLE `user2playlist`
    ADD PRIMARY KEY (`id_playlist`, `id_user`),
    ADD KEY `u2p_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `playlist`
--
ALTER TABLE `playlist`
    MODIFY `id_playlist` int(3) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT pour la table `track`
--
ALTER TABLE `track`
    MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `playlist2track`
--
ALTER TABLE `playlist2track`
    ADD CONSTRAINT `p2t_playlist` FOREIGN KEY (`id_playlist`) REFERENCES `playlist` (`id_playlist`),
    ADD CONSTRAINT `p2t_track` FOREIGN KEY (`id_track`) REFERENCES `track` (`id`);

--
-- Contraintes pour la table `profile`
--
ALTER TABLE `profile`
    ADD CONSTRAINT `userToProfile` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Contraintes pour la table `user2playlist`
--
ALTER TABLE `user2playlist`
    ADD CONSTRAINT `u2p_playlist` FOREIGN KEY (`id_playlist`) REFERENCES `playlist` (`id_playlist`),
    ADD CONSTRAINT `u2p_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
