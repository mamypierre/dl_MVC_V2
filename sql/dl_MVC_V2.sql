-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 29 mai 2018 à 14:38
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `dlcommu`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` mediumint(9) NOT NULL,
  `category_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(3, 'cours');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id_event` mediumint(9) NOT NULL,
  `description` varchar(100) NOT NULL,
  `event_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approval` enum('En cours','Validé','Non Validé') NOT NULL DEFAULT 'En cours',
  `id_user` mediumint(9) NOT NULL,
  `picture_event` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum_message`
--

CREATE TABLE `forum_message` (
  `id_message` mediumint(9) NOT NULL,
  `content` text NOT NULL,
  `id_subject` mediumint(9) NOT NULL,
  `id_user` mediumint(9) NOT NULL,
  `message_forum_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `last_name` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `training_start` datetime DEFAULT NULL,
  `training_end` datetime DEFAULT NULL,
  `company` varchar(150) DEFAULT NULL,
  `status` enum('DlAfpa','NonDlAfpa') NOT NULL DEFAULT 'NonDlAfpa',
  `id_information` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `information`
--


-- --------------------------------------------------------

--
-- Structure de la table `mailbox`
--

CREATE TABLE `mailbox` (
  `id_mail` mediumint(9) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `send_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id_news` mediumint(9) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date_news` datetime DEFAULT CURRENT_TIMESTAMP,
  `picture_news` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE `subject` (
  `id_subject` mediumint(9) NOT NULL,
  `subject_name` varchar(15) NOT NULL,
  `id_sub_category` mediumint(9) NOT NULL,
  `id_user` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sub_category`
--

CREATE TABLE `sub_category` (
  `id_sub_category` mediumint(9) NOT NULL,
  `sub_category_name` varchar(15) NOT NULL,
  `sub_category_description` varchar(60) NOT NULL,
  `id_category` mediumint(9) NOT NULL,
  `image_sub_category` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sub_category`
--

INSERT INTO `sub_category` (`id_sub_category`, `sub_category_name`, `sub_category_description`, `id_category`, `image_sub_category`) VALUES
(4, 'PHP', 'question a propos de php', 3, ''),
(5, 'JAVA', 'Besoin d\'une éclairage', 3, '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` mediumint(9) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `email_inscription` varchar(40) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_information` mediumint(9) NOT NULL,
  `id_user_type` mediumint(9) NOT NULL,
  `avatar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

-- --------------------------------------------------------

--
-- Structure de la table `user_type`
--

CREATE TABLE `user_type` (
  `type` enum('utilisateur','modérateur','webmaster','unknown') NOT NULL DEFAULT 'utilisateur',
  `descriptif` varchar(100) NOT NULL,
  `id_user_type` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_type`
--

INSERT INTO `user_type` (`type`, `descriptif`, `id_user_type`) VALUES
('utilisateur', '', 1),
('modérateur', '', 2),
('webmaster', '', 3),
('unknown', '', 4);

-- --------------------------------------------------------

--
-- Structure de la table `waiting_list`
--

CREATE TABLE `waiting_list` (
  `id_user` mediumint(9) NOT NULL,
  `id_waiting_list` mediumint(9) NOT NULL,
  `inscription_list_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inscription_list_end` datetime DEFAULT NULL,
  `approval` enum('En cours','Validé','Non Validé') NOT NULL DEFAULT 'En cours'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `forum_message`
--
ALTER TABLE `forum_message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_subject` (`id_subject`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_information`);

--
-- Index pour la table `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id_mail`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Index pour la table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`),
  ADD KEY `id_sub_category` (`id_sub_category`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id_sub_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD KEY `id_user_type` (`id_user_type`),
  ADD KEY `id_information` (`id_information`);

--
-- Index pour la table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id_user_type`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Index pour la table `waiting_list`
--
ALTER TABLE `waiting_list`
  ADD PRIMARY KEY (`id_waiting_list`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `forum_message`
--
ALTER TABLE `forum_message`
  MODIFY `id_message` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id_information` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id_mail` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `subject`
--
ALTER TABLE `subject`
  MODIFY `id_subject` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id_sub_category` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id_user_type` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `waiting_list`
--
ALTER TABLE `waiting_list`
  MODIFY `id_waiting_list` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `forum_message`
--
ALTER TABLE `forum_message`
  ADD CONSTRAINT `message_forum_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`),
  ADD CONSTRAINT `message_forum_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `mailbox`
--
ALTER TABLE `mailbox`
  ADD CONSTRAINT `messagerie_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`id_sub_category`) REFERENCES `sub_category` (`id_sub_category`),
  ADD CONSTRAINT `sujet_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sous_categorie_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`id_user_type`) REFERENCES `user_type` (`id_user_type`),
  ADD CONSTRAINT `utilisateurs_ibfk_2` FOREIGN KEY (`id_information`) REFERENCES `information` (`id_information`) ON DELETE CASCADE;

--
-- Contraintes pour la table `waiting_list`
--
ALTER TABLE `waiting_list`
  ADD CONSTRAINT `waiting_list_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
