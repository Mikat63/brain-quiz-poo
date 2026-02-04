-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 déc. 2025 à 10:43
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `brain_quiz`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `answer` varchar(50) NOT NULL,
  `id_question` int UNSIGNED NOT NULL,
  `good_answer` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ANSWER_QUESTION_ID` (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=361 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `id_question`, `good_answer`) VALUES
(121, 'Tigre', 1, 1),
(122, 'Léopard', 1, 0),
(123, 'Guépard', 1, 0),
(124, 'Lion', 1, 0),
(125, 'Pélican', 2, 0),
(126, 'Flamant rose', 2, 1),
(127, 'Cigogne', 2, 0),
(128, 'Héron', 2, 0),
(129, 'Dauphin', 3, 1),
(130, 'Orque', 3, 0),
(131, 'Béluga', 3, 0),
(132, 'Morse', 3, 0),
(133, 'Libellule', 4, 1),
(134, 'Sauterelle', 4, 0),
(135, 'Mante religieuse', 4, 0),
(136, 'Cigale', 4, 0),
(137, 'Iguane', 5, 0),
(138, 'Caméléon', 5, 1),
(139, 'Gecko', 5, 0),
(140, 'Dragon de Komodo', 5, 0),
(141, 'Rhinocéros', 6, 0),
(142, 'Hippopotame', 6, 0),
(143, 'Buffle', 6, 0),
(144, 'Éléphant', 6, 1),
(145, 'Lynx', 7, 1),
(146, 'Puma', 7, 0),
(147, 'Caracal', 7, 0),
(148, 'Serval', 7, 0),
(149, 'Ours polaire', 8, 1),
(150, 'Phoque', 8, 0),
(151, 'Manchot', 8, 0),
(152, 'Narval', 8, 0),
(153, 'Gorille', 9, 1),
(154, 'Orang-outan', 9, 0),
(155, 'Chimpanzé', 9, 0),
(156, 'Gibbon', 9, 0),
(157, 'Hibou', 10, 1),
(158, 'Chauve-souris', 10, 0),
(159, 'Lémurien', 10, 0),
(160, 'Opossum', 10, 0),
(161, 'Inception', 11, 0),
(162, 'Matrix', 11, 1),
(163, 'Interstellar', 11, 0),
(164, 'Blade Runner', 11, 0),
(165, 'Leonardo DiCaprio', 12, 1),
(166, 'Brad Pitt', 12, 0),
(167, 'Tom Hanks', 12, 0),
(168, 'Matt Damon', 12, 0),
(169, 'Indiana Jones', 13, 1),
(170, 'James Bond', 13, 0),
(171, 'Jason Bourne', 13, 0),
(172, 'Ethan Hunt', 13, 0),
(173, 'Le Parrain', 14, 1),
(174, 'Pulp Fiction', 14, 0),
(175, 'Scarface', 14, 0),
(176, 'Les Affranchis', 14, 0),
(177, 'Le Roi Lion', 15, 1),
(178, 'Toy Story', 15, 0),
(179, 'Shrek', 15, 0),
(180, 'Ratatouille', 15, 0),
(181, 'Steven Spielberg', 16, 1),
(182, 'Quentin Tarantino', 16, 0),
(183, 'Christopher Nolan', 16, 0),
(184, 'Martin Scorsese', 16, 0),
(185, 'Laurel et Hardy', 17, 1),
(186, 'Les Inconnus', 17, 0),
(187, 'Les Nuls', 17, 0),
(188, 'Cheech & Chong', 17, 0),
(189, 'Star Wars', 18, 1),
(190, 'Star Trek', 18, 0),
(191, 'Alien', 18, 0),
(192, 'Avatar', 18, 0),
(193, 'Les Visiteurs', 19, 1),
(194, 'Intouchables', 19, 0),
(195, 'Le Dîner de Cons', 19, 0),
(196, 'La Haine', 19, 0),
(197, 'Sabre laser', 20, 1),
(198, 'Chapeau d’Indiana Jones', 20, 0),
(199, 'DeLorean', 20, 0),
(200, 'Anneau unique', 20, 0),
(201, 'Victor Hugo', 21, 1),
(202, 'Marcel Proust', 21, 0),
(203, 'Albert Camus', 21, 0),
(204, 'Émile Zola', 21, 0),
(205, '1984', 22, 0),
(206, 'Le Petit Prince', 22, 1),
(207, 'L’Étranger', 22, 0),
(208, 'Les Misérables', 22, 0),
(209, 'Harry Potter', 23, 1),
(210, 'Sherlock Holmes', 23, 0),
(211, 'Hercule Poirot', 23, 0),
(212, 'Arsène Lupin', 23, 0),
(213, 'Le Dormeur du Val', 24, 1),
(214, 'Demain, dès l’aube', 24, 0),
(215, 'L’Albatros', 24, 0),
(216, 'Liberté', 24, 0),
(217, 'Goncourt', 25, 1),
(218, 'Renaudot', 25, 0),
(219, 'Femina', 25, 0),
(220, 'Médicis', 25, 0),
(221, 'Marguerite Duras', 26, 0),
(222, 'Simone de Beauvoir', 26, 1),
(223, 'Françoise Sagan', 26, 0),
(224, 'Colette', 26, 0),
(225, 'Science-fiction', 27, 1),
(226, 'Policier', 27, 0),
(227, 'Fantastique', 27, 0),
(228, 'Biographie', 27, 0),
(229, 'Le Petit Nicolas', 28, 1),
(230, 'Fantômette', 28, 0),
(231, 'Tom-Tom et Nana', 28, 0),
(232, 'Oui-Oui', 28, 0),
(233, 'Les Contes de la Bécasse', 29, 1),
(234, 'Les Fables de La Fontaine', 29, 0),
(235, 'Les Contes d’Andersen', 29, 0),
(236, 'Les Mille et Une Nuits', 29, 0),
(237, 'Plume', 30, 1),
(238, 'Livre ouvert', 30, 0),
(239, 'Encrier', 30, 0),
(240, 'Lunettes', 30, 0),
(241, 'Violon', 31, 1),
(242, 'Guitare', 31, 0),
(243, 'Saxophone', 31, 0),
(244, 'Trompette', 31, 0),
(245, 'Freddie Mercury', 32, 1),
(246, 'Michael Jackson', 32, 0),
(247, 'David Bowie', 32, 0),
(248, 'Prince', 32, 0),
(249, 'Thriller', 33, 0),
(250, 'Abbey Road', 33, 1),
(251, 'Nevermind', 33, 0),
(252, 'The Dark Side of the Moon', 33, 0),
(253, 'The Beatles', 34, 1),
(254, 'Queen', 34, 0),
(255, 'U2', 34, 0),
(256, 'The Rolling Stones', 34, 0),
(257, 'Jazz', 35, 1),
(258, 'Rock', 35, 0),
(259, 'Classique', 35, 0),
(260, 'Rap', 35, 0),
(261, 'Woodstock', 36, 1),
(262, 'Coachella', 36, 0),
(263, 'Glastonbury', 36, 0),
(264, 'Les Vieilles Charrues', 36, 0),
(265, 'Johnny Hallyday', 37, 1),
(266, 'Claude François', 37, 0),
(267, 'Stromae', 37, 0),
(268, 'Mylène Farmer', 37, 0),
(269, 'Flûte traversière', 38, 1),
(270, 'Clarinette', 38, 0),
(271, 'Hautbois', 38, 0),
(272, 'Trombone', 38, 0),
(273, 'Thriller', 39, 1),
(274, 'Gangnam Style', 39, 0),
(275, 'Single Ladies', 39, 0),
(276, 'Waka Waka', 39, 0),
(277, 'Micro', 40, 1),
(278, 'Casque', 40, 0),
(279, 'Platine', 40, 0),
(280, 'Batterie', 40, 0),
(281, 'Albert Einstein', 41, 1),
(282, 'Marie Curie', 41, 0),
(283, 'Isaac Newton', 41, 0),
(284, 'Nikola Tesla', 41, 0),
(285, 'Éclipse', 42, 0),
(286, 'Tornade', 42, 0),
(287, 'Aurore boréale', 42, 1),
(288, 'Tsunami', 42, 0),
(289, 'Cœur', 43, 1),
(290, 'Foie', 43, 0),
(291, 'Poumon', 43, 0),
(292, 'Rein', 43, 0),
(293, 'Tyrannosaure', 44, 1),
(294, 'Tricératops', 44, 0),
(295, 'Diplodocus', 44, 0),
(296, 'Mammouth', 44, 0),
(297, 'Galaxie', 45, 1),
(298, 'Trou noir', 45, 0),
(299, 'Comète', 45, 0),
(300, 'Supernova', 45, 0),
(301, 'Microscope', 46, 1),
(302, 'Télescope', 46, 0),
(303, 'Centrifugeuse', 46, 0),
(304, 'Spectromètre', 46, 0),
(305, 'Oxygène', 47, 1),
(306, 'Hydrogène', 47, 0),
(307, 'Carbone', 47, 0),
(308, 'Hélium', 47, 0),
(309, 'Schéma A', 48, 1),
(310, 'Schéma B', 48, 0),
(311, 'Schéma C', 48, 0),
(312, 'Schéma D', 48, 0),
(313, 'Thomas Edison', 49, 0),
(314, 'Alexander Graham Bell', 49, 0),
(315, 'Louis Pasteur', 49, 1),
(316, 'Guglielmo Marconi', 49, 0),
(317, 'Réfraction', 50, 1),
(318, 'Diffraction', 50, 0),
(319, 'Réflexion', 50, 0),
(320, 'Absorption', 50, 0),
(321, 'Usain Bolt', 51, 1),
(322, 'Michael Jordan', 51, 0),
(323, 'Serena Williams', 51, 0),
(324, 'Zinédine Zidane', 51, 0),
(325, 'Rugby', 52, 0),
(326, 'Football', 52, 1),
(327, 'Basket-ball', 52, 0),
(328, 'Tennis', 52, 0),
(329, 'Maracanã', 53, 0),
(330, 'Wembley', 53, 0),
(331, 'Stade de France', 53, 1),
(332, 'Camp Nou', 53, 0),
(333, 'Raquette', 54, 1),
(334, 'Ballon', 54, 0),
(335, 'Gants de boxe', 54, 0),
(336, 'Batte', 54, 0),
(337, 'Smash', 55, 1),
(338, 'Dribble', 55, 0),
(339, 'Tacle', 55, 0),
(340, 'Dunk', 55, 0),
(341, 'Coupe du Monde', 56, 1),
(342, 'Ballon d’Or', 56, 0),
(343, 'Super Bowl', 56, 0),
(344, 'Roland-Garros', 56, 0),
(345, 'Surf', 57, 1),
(346, 'Voile', 57, 0),
(347, 'Aviron', 57, 0),
(348, 'Plongée', 57, 0),
(349, 'Teddy Riner', 58, 1),
(350, 'Tony Parker', 58, 0),
(351, 'Martin Fourcade', 58, 0),
(352, 'Laure Manaudou', 58, 0),
(353, 'Ski alpin', 59, 1),
(354, 'Snowboard', 59, 0),
(355, 'Patinage artistique', 59, 0),
(356, 'Biathlon', 59, 0),
(357, 'Jeux Olympiques', 60, 1),
(358, 'NBA', 60, 0),
(359, 'FIFA', 60, 0),
(360, 'Tour de France', 60, 0);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `img_path_mobile` varchar(255) NOT NULL,
  `img_path_desktop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_theme` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_QUESTION_THEME_ID` (`id_theme`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `img_path_mobile`, `img_path_desktop`, `id_theme`) VALUES
(1, 'Quel est cet animal ?', 'img\\quiz_animals\\question_1_tiger_600.webp', 'img\\quiz_animals\\question_1_tiger_1024.webp', 1),
(2, 'À quelle espèce appartient cet oiseau ?', 'img\\quiz_animals\\question_2_flamingo_600.webp', 'img\\quiz_animals\\question_2_flamingo_1024.webp', 1),
(3, 'Quel est ce mammifère marin ?', 'img\\quiz_animals\\question_3_dolphin_600.webp', 'img\\quiz_animals\\question_3_dolphin_1024.webp', 1),
(4, 'Quel insecte est sur cette photo ?', 'img\\quiz_animals\\question_4_dragonfly_600.webp', 'img\\quiz_animals\\question_4_dragonfly_1024.webp', 1),
(5, 'Quel est ce reptile ?', 'img\\quiz_animals\\question_5_chameleon_600.webp', 'img\\quiz_animals\\question_5_chameleon_1024.webp', 1),
(6, 'Quel animal africain est représenté ici ?', 'img\\quiz_animals\\question_6_elephant_600.webp', 'img\\quiz_animals\\question_6_elephant_1024.webp', 1),
(7, 'Quel est ce félin sauvage ?', 'img\\quiz_animals\\question_7_lynx_600.webp', 'img\\quiz_animals\\question_7_lynx_1024.webp', 1),
(8, 'Quel animal polaire est sur cette image ?', 'img\\quiz_animals\\question_8_polar_bear_600.webp', 'img\\quiz_animals\\question_8_polar_bear_1024.webp', 1),
(9, 'Quel est ce primate ?', 'img\\quiz_animals\\question_9_gorilla_600.webp', 'img\\quiz_animals\\question_9_gorilla_1024.webp', 1),
(10, 'Quel animal nocturne est ici ?', 'img\\quiz_animals\\question_10_owl_600.webp', 'img\\quiz_animals\\question_10_owl_1024.webp', 1),
(11, 'De quel film provient cette scène ?²', 'img\\quiz_cinema\\question_1_Matrix_600.webp', 'img\\quiz_cinema\\question_1_Matrix_1024.webp', 2),
(12, 'Quel acteur apparaît sur cette photo ?', 'img\\quiz_cinema\\question_2_leonardo_dicaprio_600.webp', 'img\\quiz_cinema\\question_2_leonardo_dicaprio_1024.webp', 2),
(13, 'Quel est le nom de ce personnage ?', 'img\\quiz_cinema\\question_3_indiana_joneswebp_600.webp', 'img\\quiz_cinema\\question_3_indiana_joneswebp_1024.webp', 2),
(14, 'À quel film appartient cette affiche ?', 'img\\quiz_cinema\\question_4_Godfather_600.webp', 'img\\quiz_cinema\\question_4_Godfather_1024.webp', 2),
(15, 'Quel film d’animation est illustré ici ?', 'img\\quiz_cinema\\question_5_lion_king_600.webp', 'img\\quiz_cinema\\question_5_lion_king_1024.webp', 2),
(16, 'Quel réalisateur a tourné ce film ?', 'img\\quiz_cinema\\question_6_jurassic_park_600.webp', 'img\\quiz_cinema\\question_6_jurassic_park_1024.webp', 2),
(17, 'Quel duo comique est sur cette image ?', 'img\\quiz_cinema\\question_7_Laurel-and-Hardy_600.webp', 'img\\quiz_cinema\\question_7_Laurel-and-Hardy_1024.webp', 2),
(18, 'De quel film de science-fiction vient ce vaisseau ?', 'img\\quiz_cinema\\question_8_star_wars_600.webp', 'img\\quiz_cinema\\question_8_star_wars_1024.webp', 2),
(19, 'Quel film français est représenté ici ?', 'img\\quiz_cinema\\question_9_les_visiteurs-_600.webp', 'img\\quiz_cinema\\question_9_les_visiteurs-_1024.webp', 2),
(20, 'Quel objet culte de cinéma est sur cette photo ?', 'img\\quiz_cinema\\question_10_star_wars_saber_600.webp', 'img\\quiz_cinema\\question_10_star_wars_saber_1024.webp', 2),
(21, 'Quel auteur a écrit ce livre ?', 'img\\quiz_litterature\\question_1_victor_hugo_600.webp', 'img\\quiz_litterature\\question_1_victor_hugo_1024.webp', 3),
(22, 'De quel roman est tirée cette couverture ?', 'img\\quiz_litterature\\question_2_little_prince_600.webp', 'img\\quiz_litterature\\question_2_little_prince_1024.webp', 3),
(23, 'Quel personnage est illustré ici ?', 'img\\quiz_litterature\\question_3_sherlock_holmes_600.webp', 'img\\quiz_litterature\\question_3_sherlock_holmes_1024.webp', 3),
(24, 'Quel poème est associé à cette image ?', 'img\\quiz_litterature\\question_4_le_dormeur_du_val_600.webp', 'img\\quiz_litterature\\question_4_le_dormeur_du_val_1024.webp', 3),
(25, 'Quel prix littéraire a reçu ce livre ?', 'img\\quiz_litterature\\question_5_les_mandarins_600.webp', 'img\\quiz_litterature\\question_5_les_mandarins_1024.webp', 3),
(26, 'Quel écrivain est sur cette photo ?', 'img\\quiz_litterature\\question_6_Simone_de_Beauvoir_600.webp', 'img\\quiz_litterature\\question_6_Simone_de_Beauvoir_1024.webp', 3),
(27, 'Quel genre littéraire correspond à cette illustration ?', 'img\\quiz_litterature\\question_7_dune_600.webp', 'img\\quiz_litterature\\question_7_dune_1024.webp', 3),
(28, 'Quel livre jeunesse est représenté ici ?', 'img\\quiz_litterature\\question_8_le_petit_nicolas_600.webp', 'img\\quiz_litterature\\question_8_le_petit_nicolas_1024.webp', 3),
(29, 'Quel recueil de nouvelles est illustré ?', 'img\\quiz_litterature\\question_9_les_fables_de_la_fontaine_600.webp', 'img\\quiz_litterature\\question_9_les_fables_de_la_fontaine_1024.webp', 3),
(30, 'Quel symbole littéraire est sur cette image ?', 'img\\quiz_litterature\\question_10_plum_600.webp', 'img\\quiz_litterature\\question_10_plum_1024.webp', 3),
(31, 'Quel instrument est sur cette photo ?', 'img\\quiz_music\\question_1_violin_600.webp', 'img\\quiz_music\\question_1_violin_1024.webp', 4),
(32, 'Quel artiste est représenté ici ?', 'img\\quiz_music\\question_2_freddie_mercury_600.webp', 'img\\quiz_music\\question_2_freddie_mercury_1024.webp', 4),
(33, 'De quel album provient cette pochette ?', 'img\\quiz_music\\question_3_abbey_road_600.webp', 'img\\quiz_music\\question_3_abbey_road_1024.webp', 4),
(34, 'Quel groupe est sur cette image ?', 'img\\quiz_music\\question_4_beatles_600.webp', 'img\\quiz_music\\question_4_beatles_1024.webp', 4),
(35, 'Quel style musical est illustré ?', 'img\\quiz_music\\question_5_jazz_600.webp', 'img\\quiz_music\\question_5_jazz_1024.webp', 4),
(36, 'Quel festival de musique est représenté ?', 'img\\quiz_music\\question_6_woodstock_600.webp', 'img\\quiz_music\\question_6_woodstock_1024.webp', 4),
(37, 'Quel chanteur français est sur cette photo ?', 'img\\quiz_music\\question_7_johnny_hallyday_600.webp', 'img\\quiz_music\\question_7_johnny_hallyday_1024.webp', 4),
(38, 'Quel instrument à vent est ici ?', 'img\\quiz_music\\question_8_flute_traversiere_600.webp', 'img\\quiz_music\\question_8_flute_traversiere_1024.webp', 4),
(39, 'Quel clip musical est illustré ?', 'img\\quiz_music\\question_9_gangnam_style_600.webp', 'img\\quiz_music\\question_9_gangnam_style_1024.webp', 4),
(40, 'Quel accessoire de scène est sur cette image ?', 'img\\quiz_music\\question_10_microphone_600.webp', 'img\\quiz_music\\question_10_microphone_1024.webp', 4),
(41, 'Quel scientifique est sur cette photo ?', 'img\\quiz_science\\question_1_albert_einstein_600.webp', 'img\\quiz_science\\question_1_albert_einstein_1024.webp', 5),
(42, 'Quel phénomène naturel est illustré ?', 'img\\quiz_science\\question_2_northern_lights_600.webp', 'img\\quiz_science\\question_2_northern_lights_1024.webp', 5),
(43, 'Quel organe humain est sur cette image ?', 'img\\quiz_science\\question_3_heart_600.webp', 'img\\quiz_science\\question_3_heart_1024.webp', 5),
(44, 'Quel animal fossile est représenté ?', 'img\\quiz_science\\question_4_tyranosaur_600.webp', 'img\\quiz_science\\question_4_tyranosaur_1024.webp', 5),
(45, 'Quel objet astronomique est ici ?', 'img\\quiz_science\\question_5_galaxy_600.webp', 'img\\quiz_science\\question_5_galaxy_1024.webp', 5),
(46, 'Quel appareil scientifique est sur cette photo ?', 'img\\quiz_science\\question_6_microscope_600.webp', 'img\\quiz_science\\question_6_microscope_1024.webp', 5),
(47, 'Quel élément chimique est illustré ?', 'img\\quiz_science\\question_7_oxygen_600.webp', 'img\\quiz_science\\question_7_oxygen_1024.webp', 5),
(48, 'Quel schéma représente une cellule végétale ?', 'img\\quiz_science\\question_8_plant_cell_600.webp', 'img\\quiz_science\\question_8_plant_cell_1024.webp', 5),
(49, 'Quel inventeur est sur cette image ?', 'img\\quiz_science\\question_9_louis_pasteur_600.webp', 'img\\quiz_science\\question_9_louis_pasteur_1024.webp', 5),
(50, 'Quel phénomène physique est illustré ?', 'img\\quiz_science\\question_10_refraction_600.webp', 'img\\quiz_science\\question_10_refraction_1024.webp', 5),
(51, 'Quel sportif est sur cette photo ?', 'img\\quiz_sport\\question_1_usain_bolt_600.webp', 'img\\quiz_sport\\question_1_usain_bolt_1024.webp', 6),
(52, 'Quel sport est pratiqué ici ?', 'img\\quiz_sport\\question_2_football_600.webp', 'img\\quiz_sport\\question_2_football_1024.webp', 6),
(53, 'Quel stade célèbre est représenté ?', 'img\\quiz_sport\\question_3_Maracana__stadium_600.webp', 'img\\quiz_sport\\question_3_Maracana__stadium_1024.webp', 6),
(54, 'Quel équipement sportif est sur cette image ?', 'img\\quiz_sport\\question_4_racket_600.webp', 'img\\quiz_sport\\question_4_racket_1024.webp', 6),
(55, 'Quel geste technique est illustré ?', 'img\\quiz_sport\\question_5_smash_600.webp', 'img\\quiz_sport\\question_5_smash_1024.webp', 6),
(56, 'Quel trophée est sur cette photo ?', 'img\\quiz_sport\\question_6_world_cup_600.webp', 'img\\quiz_sport\\question_6_world_cup_1024.webp', 6),
(57, 'Quel sport nautique est pratiqué ici ?', 'img\\quiz_sport\\question_7_surf_600.webp', 'img\\quiz_sport\\question_7_surf_1024.webp', 6),
(58, 'Quel athlète français est sur cette image ?', 'img\\quiz_sport\\question_8_teddy_riner_600.webp', 'img\\quiz_sport\\question_8_teddy_riner_1024.webp', 6),
(59, 'Quel sport d’hiver est illustré ?', 'img\\quiz_sport\\question_9_alpine_skiing_600.webp', 'img\\quiz_sport\\question_9_alpine_skiing_1024.webp', 6),
(60, 'Quel logo sportif est représenté ?', 'img\\quiz_sport\\question_10_olympics_games_600.webp', 'img\\quiz_sport\\question_10_olympics_games_1024.webp', 6);

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

DROP TABLE IF EXISTS `themes`;
CREATE TABLE IF NOT EXISTS `themes` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `themes` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `themes` (`themes`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id`, `themes`) VALUES
(1, 'animaux'),
(2, 'cinema'),
(3, 'litterature'),
(4, 'musique'),
(5, 'science'),
(6, 'sport');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unic` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user`) VALUES
(1, 'mika');

-- --------------------------------------------------------

--
-- Structure de la table `users_themes`
--

DROP TABLE IF EXISTS `users_themes`;
CREATE TABLE IF NOT EXISTS `users_themes` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int UNSIGNED NOT NULL,
  `id_theme` int UNSIGNED NOT NULL,
  `user_score` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `theme_user` (`id_user`,`id_theme`) USING BTREE,
  KEY `fk_THEME_ID` (`id_theme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_ANSWER_QUESTION_ID` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK_QUESTION_THEME_ID` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_themes`
--
ALTER TABLE `users_themes`
  ADD CONSTRAINT `fk_THEME_ID` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_USERS_ID` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
