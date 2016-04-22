-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 12 Avril 2016 à 15:12
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ynovlolcup`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(4) NOT NULL,
  `categorie` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `categorie`) VALUES
(1, 'Ynov'),
(2, 'LoL');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(3) NOT NULL,
  `titre` varchar(70) NOT NULL,
  `contenu` text NOT NULL,
  `auteur` varchar(20) NOT NULL,
  `categorie` varchar(40) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `titre`, `contenu`, `auteur`, `categorie`, `date_post`) VALUES
(1, 'Bonjour', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Adrien', 'Ynov', '2016-04-12 12:38:36');

-- --------------------------------------------------------

--
-- Structure de la table `streams`
--

CREATE TABLE `streams` (
  `id` int(4) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `user` varchar(40) NOT NULL,
  `date_actu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `streams`
--

INSERT INTO `streams` (`id`, `lien`, `user`, `date_actu`) VALUES
(1, 'domingotv', 'DominGO', '2016-04-12 11:27:52');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rang` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `nom`, `prenom`, `password`, `email`, `rang`) VALUES
(3, 'Vysion', 'Ferreira', 'Adrien', '$2y$12$82j5IjJXZAoKkwWr4yFI1eoY1dnYcJ72rfH7fROB6W87BD9KFNsXa', 'adrien.ferreira@ynov.com', 'Administrateur'),
(4, 'MickaVAl', 'Valentin', 'Mickael', '$2y$12$KdrrzV8MRkfyTliRSpmyXu9TDH1gu/6.fJZNsIosMQDdbERl4wt0G', 'mickael.valentin@ynov.com', 'Streamer'),
(5, 'Kei', 'Masse', 'Julien', '$2y$12$2mn7VyDCD1iuiudZohNuPeCO0ynRtgOCDtTBx5CC9.kyxAIrwAgk.', 'julien.masse@ynov.com', 'Arbitre');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
