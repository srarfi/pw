-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 11 déc. 2023 à 18:25
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `coaching`
--

CREATE TABLE `coaching` (
  `id_coaching` int(11) NOT NULL,
  `id_ut` int(11) NOT NULL,
  `objectif` varchar(100) NOT NULL,
  `nb_h` int(50) NOT NULL,
  `nb_j` int(50) NOT NULL,
  `reponse` varchar(100) NOT NULL,
  `basket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `coaching`
--

INSERT INTO `coaching` (`id_coaching`, `id_ut`, `objectif`, `nb_h`, `nb_j`, `reponse`, `basket`) VALUES
(76, 23, 'perte_poids', 1, 3, '', 'non'),
(77, 23, 'perte_poids', 1, 5, '', 'Dribble');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(10) NOT NULL,
  `id_prod` int(10) NOT NULL,
  `id_ut` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_prod`, `id_ut`) VALUES
(52, 14, 24);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id_commentaire` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `mess` varchar(100) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `post` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_prod` int(11) NOT NULL,
  `prix_prod` int(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `nom` varchar(1111) NOT NULL,
  `photo` varchar(104) NOT NULL,
  `sales_count` int(11) DEFAULT 0,
  `popularity_score` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_prod`, `prix_prod`, `description`, `nom`, `photo`, `sales_count`, `popularity_score`) VALUES
(14, 780, 'away and inside ', 'aminox', '', 39, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--

CREATE TABLE `reclamations` (
  `id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `objet` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reclamations`
--

INSERT INTO `reclamations` (`id`, `date`, `objet`, `description`) VALUES
(17, '2023-11-25', 'jhjyf', 'jjyfjkhgjhfj'),
(18, '2023-11-09', 'jhjffjjhyg', 'hgkhhkgjgjg'),
(19, '2023-12-16', 'jhvj', 'jhvjbv'),
(20, '2023-12-14', 'ujyfuyj', 'jhguhjbjhgju'),
(21, '2023-02-22', 'aaaaa', 'aaa'),
(22, '2023-02-22', 'aaaaa', 'aaa'),
(23, '1111-11-11', 'aa', 'aa'),
(24, '1111-11-11', 'aa', 'aa'),
(25, '1111-11-11', 'aa', 'aa'),
(26, '1111-11-11', 'aa', 'aa'),
(27, '1111-11-11', 'dd', 'dd');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `objet` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `avis` int(11) NOT NULL DEFAULT 0,
  `idreclamation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id`, `date`, `objet`, `description`, `avis`, `idreclamation`) VALUES
(21, '2023-12-11', 'test', 'HELLO', 5, 17),
(27, '2023-12-20', 'testA', 'Good', 1, 18),
(34, '2023-12-08', 'testA', 'Good', 3, 18),
(35, '2023-11-29', 'bvvc', 'bjhvjh', 3, 19),
(36, '2023-12-20', 'hgcugvu', 'jgvjhvjhgj', 5, 20),
(37, '2023-12-22', 'bvg', 'ghgg', 0, 27),
(38, '2023-12-22', 'bvg', 'ghgg', 0, 27);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_ut` int(11) NOT NULL,
  `role_ut` varchar(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `nom_ut` varchar(10) DEFAULT NULL,
  `prenom_ut` varchar(10) DEFAULT NULL,
  `email_ut` varchar(40) DEFAULT NULL,
  `tel_ut` int(8) DEFAULT NULL,
  `cin_ut` int(8) DEFAULT NULL,
  `poid_ut` float DEFAULT NULL,
  `taille_ut` float DEFAULT NULL,
  `genre_ut` varchar(1) DEFAULT NULL,
  `age_ut` int(2) DEFAULT NULL,
  `addresse_ut` varchar(15) DEFAULT NULL,
  `verified` int(1) NOT NULL,
  `login_ut` varchar(15) DEFAULT NULL,
  `mdp_ut` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_ut`, `role_ut`, `username`, `nom_ut`, `prenom_ut`, `email_ut`, `tel_ut`, `cin_ut`, `poid_ut`, `taille_ut`, `genre_ut`, `age_ut`, `addresse_ut`, `verified`, `login_ut`, `mdp_ut`) VALUES
(23, 'client', 'aa', 'aa', 'aa', 'ridhasrarfi20@gmail.com', 54551090, 12345678, 44, 44, 'H', 44, '44', 1, '44', '44'),
(24, 'client', 'didou', 'adem', 'hechmi', 'hechmiadem15@gmail.com', 53484537, 1234567, 80, 190, 'H', 22, 'lagoulette', 0, 'didou', '123'),
(25, 'coach', 'houha', 'houssem', 'bentecha', 'houssem.benammar@esprit.tn', 54551090, 0, 1, 1, 'F', 1, '11', 1, '11', '11'),
(26, 'admin', 'aa', 'aa', 'aa', 'ridha@gmail.tn', 22038379, 318718, 44, 44, 'H', 44, '44', 0, '44', '44'),
(27, 'admin', 'aa', 'aa', 'aa', 'moez@gmail.com', 12345678, 0, 44, 44, 'H', 44, '44', 0, '11', '11'),
(28, 'admin', 'bb', 'bb', 'bb', 'moez@gmail.com', 54551090, 318718, 22, 22, 'H', 99, '99', 0, '99', '99');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `coaching`
--
ALTER TABLE `coaching`
  ADD PRIMARY KEY (`id_coaching`),
  ADD KEY `id_cll` (`id_ut`),
  ADD KEY `reponse` (`reponse`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_cl` (`id_cl`),
  ADD KEY `fk_id_post` (`id_post`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_prod`),
  ADD UNIQUE KEY `id_prod` (`id_prod`);

--
-- Index pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idreclamation` (`idreclamation`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_ut`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `coaching`
--
ALTER TABLE `coaching`
  MODIFY `id_coaching` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_ut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `fk_id_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `utilisateur` (`id_ut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`idreclamation`) REFERENCES `reclamations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
