-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 08 sep. 2020 à 22:19
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `annonces`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `postID` int(6) NOT NULL,
  `postTitle` varchar(20) NOT NULL,
  `userID` int(6) DEFAULT NULL,
  `postContent` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`postID`, `postTitle`, `userID`, `postContent`) VALUES
(1, 'Première Annonce', 0, 'Perte de la base de données ...'),
(2, 'Annonce 2', 0, 'bla bli blou'),
(3, 'hendrerit at vulputa', 21, 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique.'),
(4, 'a pede posuere', 25, 'In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin'),
(5, 'arcu sed', 22, 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penat'),
(6, 'congue elementum in ', 20, 'Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.'),
(7, 'aliquam non mauris', 25, 'Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae qu'),
(8, 'mattis odio', 3, 'Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis biben'),
(9, 'iaculis justo in hac', 15, 'Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. E'),
(10, 'quisque erat eros', 17, 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut era'),
(11, 'quis', 11, 'Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio.'),
(12, 'nunc viverra dapibus', 2, 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.'),
(13, 'sit amet justo morbi', 11, 'Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutp'),
(14, 'venenatis non sodale', 22, 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lob'),
(15, 'habitasse platea', 15, 'Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros.'),
(16, 'ut ultrices vel augu', 7, 'Donec posuere metus vitae ipsum. Aliquam non mauris.'),
(17, 'nam dui', 19, 'Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in '),
(18, 'quis tortor id nulla', 4, 'Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec'),
(19, 'sit amet lobortis sa', 18, 'Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phas'),
(20, 'mauris eget massa te', 5, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non'),
(21, 'eget congue eget sem', 5, 'Duis consequat dui nec nisi volutpat eleifend.'),
(22, 'urna ut tellus nulla', 1, 'Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo.'),
(23, 'diam', 12, 'Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis.'),
(24, 'viverra dapibus null', 25, 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.'),
(25, 'consequat metus sapi', 17, 'Sed vel enim sit amet nunc viverra dapibus.');

-- --------------------------------------------------------

--
-- Structure de la table `signalements`
--

CREATE TABLE `signalements` (
  `postID` varchar(12) NOT NULL,
  `login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `signalements_post`
--

CREATE TABLE `signalements_post` (
  `postID` int(6) NOT NULL,
  `login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userID` int(6) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `login`, `password`, `surname`, `name`, `mail`, `country`, `city`) VALUES
(0, 'Server', '', '', '', '', '', ''),
(1, 'Aphaz', '1234', 'Richard', 'Damien', 'd@mi.en', 'NOUVELLE-CALÉDONIE', 'Nouméa'),
(2, 'Mann LLC', 'nyt4nc2Ev', 'Pantone', 'Bird', '', 'Brazil', 'Piraí'),
(3, 'Durgan LLC', 'ipW9d62', 'Lindstrom', 'Gabbie', '', 'United States', 'Grand Rapids'),
(4, 'Veum, Hintz and Ziem', 'HlvaUjX', 'Colliard', 'Golda', '', 'Nigeria', 'Uga'),
(5, 'Ward, Prosacco and L', 'A0KugR', 'Vaadeland', 'Ulla', '', 'China', 'Haolaishan'),
(6, 'Hauck-Weissnat', 'wNW1jI7dM', 'Lundy', 'Pia', '', 'Indonesia', 'Panyingkiran'),
(7, 'Abernathy Inc', 'uMMHfflAkAK', 'Cancutt', 'Isidoro', '', 'Colombia', 'Fundación'),
(8, 'Adams-Predovic', 'CaEukw7', 'Dicky', 'Micheal', '', 'Philippines', 'Agoncillo'),
(9, 'Beier-Osinski', 'DR8tcf6OCC3o', 'holmes', 'Kylen', '', 'Philippines', 'Bugcaon'),
(10, 'Quitzon Group', '69QtvFW30wZ2', 'Kettoe', 'Enrika', '', 'Croatia', 'Vukovar'),
(11, 'Ankunding Group', 'znmQOmyB', 'Evemy', 'Kilian', '', 'China', 'Liangbing'),
(12, 'Bruen-Reichert', 'JcyP2PeI', 'Reece', 'Chrisse', '', 'Cameroon', 'Diang'),
(13, 'Considine and Sons', 'VEcniAm', 'Lewzey', 'Francesca', '', 'Portugal', 'Rio Covo'),
(14, 'Senger-Berge', 'PJV1Eowq3uF8', 'Edmunds', 'Anton', '', 'Venezuela', 'San Francisco de Yare'),
(15, 'Swift Group', 'tnSyvn8W', 'Luipold', 'Pacorro', '', 'Sweden', 'Angered'),
(16, 'Boyle and Sons', 'UBawMXH2vGJH', 'Fiddy', 'Salaidh', '', 'Afghanistan', 'Lashkar Gāh'),
(17, 'Price-Bergnaum', '7FL5Nfp', 'Hoyte', 'Howey', '', 'Indonesia', 'Gelang'),
(18, 'Boyle-Hettinger', 'H4kyXf', 'Cochran', 'Meggy', '', 'China', 'Wuluo'),
(19, 'Kuphal, Bechtelar an', 'yDELwDbC', 'Brignell', 'Mallory', '', 'China', 'Dingdian'),
(20, 'Schowalter-Thompson', 'gU3MiFZB39x', 'Stolworthy', 'Othella', '', 'Chile', 'Traiguén'),
(21, 'Heller-Boyle', 'vKCyUK', 'Eldritt', 'Reba', '', 'Canada', 'Napanee Downtown'),
(22, 'Deckow-Hauck', '9yeGcpFl', 'Stealy', 'Norean', '', 'United States', 'Austin'),
(23, 'Schultz, Cormier and', 'uf4QsX7nyBBb', 'O\'Tierney', 'Godfrey', '', 'Sweden', 'Mora'),
(24, 'Satterfield Inc', '8QKhw3c', 'Womersley', 'Hailey', '', 'China', 'Henglian'),
(25, 'Renner and Sons', 'AVycrLd9HXgN', 'Igglesden', 'Wynn', '', 'Indonesia', 'Batudulang');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Index pour la table `signalements`
--
ALTER TABLE `signalements`
  ADD PRIMARY KEY (`postID`,`login`);

--
-- Index pour la table `signalements_post`
--
ALTER TABLE `signalements_post`
  ADD PRIMARY KEY (`postID`,`login`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
