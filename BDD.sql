-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 09 Juin 2017 à 04:57
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Skup`
--

-- --------------------------------------------------------

--
-- Structure de la table `Account`
--

CREATE TABLE `Account` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imageProfil` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Account`
--

INSERT INTO `Account` (`id`, `firstName`, `lastName`, `email`, `passwd`, `status`, `imageProfil`) VALUES
(1, 'Julien', 'GADEA', 'kartori@yahoo.fr', 'a', 'happy Rendu de projet', 'Templates/ImagesProfils/1.jpg'),
(2, 'Yann', 'PAISLEY', '206807@supinfo.com', 'a', 'salut', 'Templates/ImagesProfils/imageProfilDefault.jpg'),
(3, 'Tiann', 'GADEA', 'Tiann.gadea@yahoo.fr', 'l', 'salut', 'Templates/ImagesProfils/imageProfilDefault.jpg'),
(6, 'Laura', 'Chastel', 'laura.chastel@supinfp.com', 'l', 'salut', 'Templates/ImagesProfils/imageProfilDefault.jpg'),
(7, 'Patric', 'NAVY', 'pat', 'a', 'salut', 'Templates/ImagesProfils/imageProfilDefault.jpg'),
(8, 'Valeria', 'COPOLANI', 'valeria.copolani@gmail.com', 'zjd3vodly8yzr', 'salut', 'Templates/ImagesProfils/imageProfilDefault.jpg'),
(9, 'Edwar ', 'KILOPER', 'edw', 'a', 'salut', 'Templates/ImagesProfils/imageProfilDefault.jpg'),
(10, 'Borat', 'KASI', 'bor@a.fr', 'l', 'salut', 'Templates/ImagesProfils/imageProfilDefault.jpg'),
(11, 'Clara', 'MICHELLE', 'cla@a.fr', 'a', 'salut', 'Templates/ImagesProfils/imageProfilDefault.jpg'),
(12, 'Antoine', 'MLOP', 'ant@a.fr', 'l', 'salut', 'Templates/ImagesProfils/12.jpg'),
(13, 'Jordan', 'COGNET', '205858@supinfo.com', 'jordan1993', 'salut', 'Templates/ImagesProfils/imageProfilDefault.jpg'),
(14, 'Frédéric', 'WINUM', 'frederic.winum@supinfo.com', 'supinfo', '', 'Templates/ImagesProfils/imageProfilDefault.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Account_Contact_List`
--

CREATE TABLE `Account_Contact_List` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_contact` int(11) NOT NULL,
  `friend` int(1) NOT NULL,
  `surname_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `block` int(11) NOT NULL,
  `surname_contact` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Account_Contact_List`
--

INSERT INTO `Account_Contact_List` (`id`, `user_id`, `user_contact`, `friend`, `surname_id`, `block`, `surname_contact`) VALUES
(75, 7, 1, 1, '', 0, ''),
(70, 1, 3, 1, '', 0, 'Tiann GADEA'),
(83, 9, 1, 1, 'Edwar KILOPER', 0, ''),
(84, 9, 3, 1, '', 0, ''),
(85, 12, 1, 1, '', 0, ''),
(86, 12, 3, 0, '', 0, ''),
(88, 1, 2, 1, '', 0, ''),
(89, 13, 1, 1, '', 0, ''),
(90, 14, 1, 1, '', 0, ''),
(91, 14, 2, 0, '', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `Channel`
--

CREATE TABLE `Channel` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `creator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Channel`
--

INSERT INTO `Channel` (`id`, `name`, `creator_id`) VALUES
(9, 'Mon 1 er channel', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Channel_Contact_List`
--

CREATE TABLE `Channel_Contact_List` (
  `id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `allow` int(11) NOT NULL,
  `super_user` int(11) NOT NULL,
  `banRaison` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Channel_Contact_List`
--

INSERT INTO `Channel_Contact_List` (`id`, `channel_id`, `account_id`, `allow`, `super_user`, `banRaison`) VALUES
(3, 2, 7, 1, 1, 'ko'),
(4, 2, 9, 1, 0, 'f'),
(6, 3, 1, 1, 1, ''),
(7, 3, 8, 1, 0, ''),
(8, 3, 7, 1, 0, ''),
(9, 4, 1, 1, 1, ''),
(12, 7, 1, 1, 1, ''),
(13, 8, 1, 1, 1, ''),
(14, 1, 1, 0, 0, ''),
(15, 1, 1, 0, 0, ''),
(16, 6, 1, 0, 0, ''),
(17, 2, 1, 1, 0, ''),
(18, 2, 1, 0, 0, ''),
(19, 9, 1, 1, 1, ''),
(21, 9, 3, 1, 1, ''),
(22, 9, 9, 1, 0, ''),
(23, 9, 12, 0, 0, 'Grossier'),
(24, 9, 2, 1, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `Groupe`
--

CREATE TABLE `Groupe` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `creator_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Groupe`
--

INSERT INTO `Groupe` (`id`, `name`, `creator_id`) VALUES
(21, 'laura\'s groupe', 6),
(24, 'Test 5', 1),
(29, 'Mon joli groupe de test', 1),
(30, 'Sans personne', 1),
(36, 'aze', 1),
(41, 'd', 1),
(45, 'a', 1),
(46, 'a', 1),
(47, 'a', 1),
(48, 'a', 1),
(49, 'a', 1),
(56, 'avbb', 1),
(59, 'nbvc', 1),
(80, 'test', 13),
(68, 'ccvv', 1),
(86, 'Mes professeurs', 1),
(76, 'mon 1 er vrai groupe', 8),
(77, 'Borat\'s groupe', 10);

-- --------------------------------------------------------

--
-- Structure de la table `Groupe_Contact_List`
--

CREATE TABLE `Groupe_Contact_List` (
  `id` int(11) NOT NULL,
  `groupe_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `allow` int(11) NOT NULL,
  `super_user` int(11) NOT NULL,
  `banRaison` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Groupe_Contact_List`
--

INSERT INTO `Groupe_Contact_List` (`id`, `groupe_id`, `account_id`, `allow`, `super_user`, `banRaison`) VALUES
(9, 15, 1, 1, 0, ''),
(10, 15, 2, 1, 0, ''),
(11, 15, 6, 1, 0, ''),
(12, 16, 1, 1, 0, ''),
(13, 17, 1, 1, 0, ''),
(19, 21, 6, 1, 0, ''),
(25, 24, 3, 1, 0, ''),
(26, 24, 2, 1, 0, ''),
(44, 29, 2, 1, 0, ''),
(59, 21, 7, 1, 0, ''),
(60, 21, 3, 1, 0, ''),
(77, 41, 7, 1, 0, ''),
(78, 41, 3, 1, 0, ''),
(165, 80, 13, 1, 1, ''),
(177, 86, 14, 1, 0, ''),
(129, 21, 8, 1, 0, ''),
(130, 21, 9, 1, 0, ''),
(137, 76, 8, 1, 1, ''),
(175, 86, 1, 1, 1, ''),
(139, 68, 8, 1, 0, 'ertyui'),
(140, 68, 7, 1, 0, ''),
(141, 68, 3, 1, 0, ''),
(142, 68, 9, 1, 0, ''),
(143, 59, 8, 1, 0, ''),
(144, 59, 7, 1, 1, ''),
(146, 59, 9, 1, 0, ''),
(176, 86, 7, 1, 0, ''),
(153, 68, 12, 1, 0, ''),
(154, 77, 10, 1, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `Ip`
--

CREATE TABLE `Ip` (
  `id` int(11) NOT NULL,
  `ip` text COLLATE utf8_unicode_ci NOT NULL,
  `countTent` int(11) NOT NULL,
  `ban` int(11) NOT NULL,
  `dateDeban` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Message`
--

CREATE TABLE `Message` (
  `id` int(11) NOT NULL,
  `id_sent` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `moment` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Message`
--

INSERT INTO `Message` (`id`, `id_sent`, `id_receiver`, `message`, `moment`) VALUES
(1, 1, 2, 'yo 1 er message', '0000-00-00 00:00:00'),
(2, 1, 2, 'Yo C\'est le 1 er message', '2017-03-01 05:00:00'),
(3, 2, 1, 'message envoyer par Yann', '2017-03-01 00:00:00'),
(4, 1, 2, 'message envoyer par ju', '2017-03-01 00:00:00'),
(5, 1, 2, 'g', '0000-00-00 00:00:00'),
(6, 1, 2, 'message ', '0000-00-00 00:00:00'),
(7, 1, 2, 'yooo\r\n', '0000-00-00 00:00:00'),
(81, 1, 8, 'et maintenant&nbsp;', '2017-05-31 01:13:57'),
(9, 1, 2, 'kl', '2017-03-28 02:05:57'),
(10, 1, 2, 'j\'ai avouer \r\n', '2017-03-28 03:02:39'),
(11, 1, 2, 'message', '2017-03-28 03:02:54'),
(14, 1, 7, 'j\'ai adorer votre cours IA\r\n', '2017-03-30 17:05:36'),
(15, 1, 7, 'super', '2017-03-30 18:19:01'),
(16, 1, 2, 'you', '2017-03-30 23:30:03'),
(17, 1, 2, 'h', '2017-04-04 06:48:04'),
(18, 1, 2, 'j\r\n', '2017-04-07 02:46:20'),
(67, 1, 2, '<a href=\"<a href=\"http://www.facebook.com\">www.facebook.com</a>\"><a href=\"http://www.facebook.com\">www.facebook.com</a></a>', '2017-05-25 23:56:32'),
(20, 1, 8, 'hello <3', '2017-04-13 11:15:06'),
(21, 1, 8, 'ca va ? ❤️\r\n', '2017-04-13 11:15:18'),
(22, 3, 1, 'yo ca va frère ?', '2017-04-13 16:23:21'),
(23, 1, 3, '<a href=\"#\" >lien</a>', '2017-04-21 23:03:31'),
(26, 1, 3, '<a href=\"http://www.azer.fr\">www.azer.fr</a>\r\n', '2017-04-21 23:54:54'),
(27, 1, 3, 'salut va voir mon site <a href=\"http://www.localhost:8888/index.php\">www.localhost:8888/index.php</a>', '2017-04-21 23:55:32'),
(28, 1, 3, '<a href=\"http://www.facebook.com\">www.facebook.com</a>', '2017-04-21 23:55:52'),
(29, 1, 9, 'hello <a href=\"http://www.facebook.com\">www.facebook.com</a>', '2017-04-22 00:01:41'),
(30, 1, 9, '<strong>yo</strong>', '2017-04-22 02:51:23'),
(31, 1, 7, 'moi aussi\r\n', '2017-04-22 03:30:06'),
(32, 1, 7, '\r\nf', '2017-04-22 03:30:10'),
(33, 1, 7, '<strong>c\'était la folie</strong>', '2017-04-22 03:30:24'),
(34, 1, 7, '<a href=\"http://<a href=\"http://www.facebook.fr\">www.facebook.fr</a>\">fb</a>\r\n<a href=\"http://www.facebook.com\">www.facebook.com</a>', '2017-04-22 03:31:03'),
(35, 1, 7, '<a href=\"http://<a href=\"http://www.fb.fr\">www.fb.fr</a>\">Your text to link...</a>\r\n<a href=\"http://www.c.fr\">www.c.fr</a>', '2017-04-22 03:31:28'),
(36, 1, 7, '<a href=\"http://<a href=\"http://www.g.com\">www.g.com</a>\">Your text to link...</a>\r\n', '2017-04-22 03:32:02'),
(37, 1, 7, '\r\nhello i\'<img src=\"http://3pjt.96.lt/Images/Tuto/Articles/Supinfo/Screenshot/ImagesArticleKnowledgeSharing/creation/Partager/Imagess/telechargementss/DossierOne/dossierdeux/Mes____images/Pour__le__projet_/Capture%20d’écran%202017-04-21%20à%2014.38.257Capture%20d’écran%202017-03-13%20à%2011.17.26Capture%20d’écran%202017%20-%2003%20-%2013%20à%2011%2016%2027%20MAGES%20ARTICLE%20S%20RESTURATION%20LE%20MAC%202017%20%20%20GUADELOUPE%20U%20PLOAD%20CURSUS%20BSC.png\" alt=\"azer\" />', '2017-04-22 03:39:43'),
(38, 1, 3, '<strong><strong>hello</strong></strong>\r\n', '2017-04-22 16:16:23'),
(55, 1, 3, '<a href=\"http://www.facebook.com\">www.facebook.com</a>', '2017-05-25 03:54:56'),
(40, 1, 3, '\r\nyo', '2017-04-22 16:18:43'),
(41, 1, 3, '\r\nd', '2017-04-22 16:18:45'),
(42, 1, 3, '\r\n', '2017-04-22 16:18:49'),
(43, 1, 3, '\r\nd', '2017-04-22 16:18:51'),
(80, 1, 8, 'ca va ?', '2017-05-31 01:13:32'),
(45, 1, 3, '\r\n<?php \r\n$identifiant = $_GET[\'id\'];\r\n\r\n?>', '2017-04-22 16:44:43'),
(46, 1, 9, '<a href=\"http://www.google.com\">www.google.com</a> \r\n', '2017-04-25 16:03:04'),
(47, 1, 8, '\r\nquelque tu pense ', '2017-04-25 17:03:58'),
(64, 1, 13, 'yo', '2017-05-25 22:30:45'),
(49, 2, 1, 'test', '2017-05-22 19:44:38'),
(50, 1, 2, 'test', '2017-05-22 19:44:55'),
(51, 1, 8, 'aze<b>qsd</b>', '2017-05-25 01:37:45'),
(52, 1, 8, 'yo<b>yo</b>', '2017-05-25 01:41:21'),
(53, 1, 8, 'coucou', '2017-05-25 01:48:31'),
(54, 1, 2, 'azertyuio<b>zertyuize<i>zertyuiop<u>azertyu</u></i></b>', '2017-05-25 01:55:54'),
(58, 1, 9, '<a href=\"http://www.facebook.fr\">www.facebook.fr</a>', '2017-05-25 03:55:43'),
(59, 1, 9, 'je suis la', '2017-05-25 03:55:53'),
(60, 1, 12, 'salut<div><br></div>', '2017-05-25 03:55:58'),
(61, 1, 12, 'ca va&nbsp;', '2017-05-25 03:56:01'),
(62, 1, 3, 'salut', '2017-05-25 03:56:10'),
(63, 1, 3, '<a href=\"http://www.facebook.lo\">www.facebook.lo</a><div><br></div>', '2017-05-25 03:56:17'),
(68, 1, 2, '<a href=\"http://www.facebook.com\">www.facebook.com</a><div><br></div>', '2017-05-25 23:56:44'),
(73, 1, 3, '<img src=\'http://mysup.96.lt/P%20U%20B%20L%20I%20C%20%20--%20%20H.%20T.%20M.%20L/Menu%20dev/2.png\'/>', '2017-05-26 22:50:01'),
(76, 1, 9, '<img src=\'http://mysup.96.lt/P%20U%20B%20L%20I%20C%20%20--%20%20H.%20T.%20M.%20L/Menu%20dev/2.png\' widht=\'50\' height=\'50\'/>', '2017-05-26 22:52:23'),
(78, 1, 8, 'salut', '2017-05-31 01:13:07'),
(79, 1, 8, 'coucou', '2017-05-31 01:13:28');

-- --------------------------------------------------------

--
-- Structure de la table `Messages_Channel`
--

CREATE TABLE `Messages_Channel` (
  `id` int(11) NOT NULL,
  `id_sent` int(11) NOT NULL,
  `id_channel` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `moment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Messages_Channel`
--

INSERT INTO `Messages_Channel` (`id`, `id_sent`, `id_channel`, `message`, `moment`) VALUES
(6, 1, 8, 'salut', '2017-05-29 00:58:07'),
(7, 7, 8, 'coucou', '2017-05-16 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `Messages_Groupe`
--

CREATE TABLE `Messages_Groupe` (
  `id` int(11) NOT NULL,
  `id_sent` int(11) NOT NULL,
  `id_Groupe` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `moment` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Messages_Groupe`
--

INSERT INTO `Messages_Groupe` (`id`, `id_sent`, `id_Groupe`, `message`, `moment`) VALUES
(1, 1, 29, '1 er message de groupe', '2017-03-10 00:00:00'),
(2, 1, 29, '2nd', '2017-03-30 18:22:29'),
(3, 1, 29, '3eme', '2017-03-30 18:22:58'),
(4, 1, 29, '3eme5', '2017-03-30 18:23:30'),
(5, 1, 21, '1 er message \r\n', '2017-03-30 23:27:32'),
(6, 1, 0, 'gggg', '2017-04-07 06:45:32'),
(7, 1, 33, 'plein de message ', '2017-04-11 23:42:00'),
(8, 1, 33, 'yo', '2017-04-11 23:46:18'),
(9, 2, 33, 'azertyuioiuytrezazertyuiop', '2017-04-02 00:00:00'),
(10, 2, 33, 'azertyuioiuytrezazertyuiop', '2017-04-02 00:00:00'),
(11, 1, 33, 'j\'assure grave ', '2017-04-11 23:56:46'),
(12, 1, 33, 'kkkkk', '2017-04-11 23:57:20'),
(13, 1, 33, 'k', '2017-04-11 23:57:22'),
(14, 1, 33, 'jhk', '2017-04-11 23:57:29'),
(15, 1, 33, 'j', '2017-04-12 00:11:02'),
(16, 1, 33, 'kkkk', '2017-04-12 00:15:20'),
(42, 1, 86, '<span style=\"background-color: rgb(217, 237, 247);\">Vous pouvez y accéder via le lien <a href=\"http://www.mysup.96.lt/3PJT+/\">www.mysup.96.lt/3PJT+/</a></span>', '2017-06-09 00:49:15'),
(47, 1, 86, '<img src=\'http://scontent.cdninstagram.com/t51.2885-19/s150x150/14099302_317983815215648_90588134_a.jpg\' widht=\'100\' height=\'100\'/>', '2017-06-09 00:57:42'),
(40, 1, 86, 'Bonjour&nbsp;<div>je viens de vous ajouter sur le nouveau réseau social&nbsp;</div>', '2017-06-09 00:48:15'),
(38, 1, 76, '<img src=\'\' widht=\'100\' height=\'100\'/>', '2017-05-26 22:53:45');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Account_Contact_List`
--
ALTER TABLE `Account_Contact_List`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Channel`
--
ALTER TABLE `Channel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Channel_Contact_List`
--
ALTER TABLE `Channel_Contact_List`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Groupe`
--
ALTER TABLE `Groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Groupe_Contact_List`
--
ALTER TABLE `Groupe_Contact_List`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Ip`
--
ALTER TABLE `Ip`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Messages_Channel`
--
ALTER TABLE `Messages_Channel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Messages_Groupe`
--
ALTER TABLE `Messages_Groupe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Account`
--
ALTER TABLE `Account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `Account_Contact_List`
--
ALTER TABLE `Account_Contact_List`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT pour la table `Channel`
--
ALTER TABLE `Channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `Channel_Contact_List`
--
ALTER TABLE `Channel_Contact_List`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `Groupe`
--
ALTER TABLE `Groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT pour la table `Groupe_Contact_List`
--
ALTER TABLE `Groupe_Contact_List`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT pour la table `Ip`
--
ALTER TABLE `Ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Message`
--
ALTER TABLE `Message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT pour la table `Messages_Channel`
--
ALTER TABLE `Messages_Channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Messages_Groupe`
--
ALTER TABLE `Messages_Groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;