-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Hôte : db5006000118.hosting-data.io
-- Généré le : mar. 22 fév. 2022 à 15:42
-- Version du serveur : 5.7.36-log
-- Version de PHP : 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs5026208`
--

-- --------------------------------------------------------

--
-- Structure de la table `actvite_compl`
--

CREATE TABLE `actvite_compl` (
  `AC_NUM` int(11) NOT NULL,
  `AC_DATE` date NOT NULL,
  `AC_LIEU` varchar(50) NOT NULL,
  `AC_THEME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `collaborateur`
--

CREATE TABLE `collaborateur` (
  `COL_MATRICULE` varchar(50) NOT NULL,
  `COL_NOM` varchar(50) NOT NULL,
  `COL_PRENOM` varchar(50) NOT NULL,
  `COL_ADRESSE` varchar(50) DEFAULT NULL,
  `COL_CP` int(11) DEFAULT NULL,
  `COL_VILLE` varchar(50) DEFAULT NULL,
  `COL_DATEEMBAUCHE` date NOT NULL,
  `SEC_CODE` char(1) DEFAULT NULL,
  `IdCompte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `collaborateur`
--

INSERT INTO `collaborateur` (`COL_MATRICULE`, `COL_NOM`, `COL_PRENOM`, `COL_ADRESSE`, `COL_CP`, `COL_VILLE`, `COL_DATEEMBAUCHE`, `SEC_CODE`, `IdCompte`) VALUES
('a131', 'Villechalane', 'Louis', '8 cours Lafontaine', 29000, 'BREST', '1992-12-11', 'N', NULL),
('a17', 'Andre', 'David', '1 r Aimon de Chissée', 38100, 'GRENOBLE', '1991-08-26', NULL, NULL),
('a55', 'Bedos', 'Christian', '1 r Bénédictins', 65000, 'TARBES', '1987-07-17', 'S', NULL),
('a93', 'Tusseau', 'Louis', '22 r Renou', 86000, 'POITIERS', '1999-01-02', NULL, NULL),
('b13', 'Bentot', 'Pascal', '11 av 6 Juin', 67000, 'STRASBOURG', '1996-03-11', NULL, NULL),
('b16', 'Bioret', 'Luc', '1 r Linne', 35000, 'RENNES', '1997-03-21', NULL, NULL),
('b19', 'Bunisset', 'Francis', '10 r Nicolas Chorier', 85000, 'LA ROCHE SUR YON', '1999-01-31', NULL, NULL),
('b25', 'Bunisset', 'Denise', '1 r Lionne', 49100, 'ANGERS', '1994-07-03', NULL, NULL),
('b28', 'Cacheux', 'Bernard', '114 r Authie', 34000, 'MONTPELLIER', '2000-08-02', NULL, NULL),
('b34', 'Cadic', 'Eric', '123 r Caponière', 41000, 'BLOIS', '1993-12-06', 'P', NULL),
('b4', 'Charoze', 'Catherine', '100 pl Géants', 33000, 'BORDEAUX', '1997-09-25', NULL, NULL),
('b50', 'Clepkens', 'Christophe', '12 r Fédérico Garcia Lorca', 13000, 'MARSEILLE', '1998-01-18', NULL, NULL),
('b59', 'Cottin', 'Vincenne', '36 sq Capucins', 5000, 'GAP', '1995-10-21', NULL, NULL),
('c14', 'Daburon', 'François', '13 r Champs Elysées', 6000, 'NICE', '1989-02-01', NULL, NULL),
('c3', 'De', 'Philippe', '13 r Charles Peguy', 10000, 'TROYES', '1992-05-05', NULL, NULL),
('c54', 'Debelle', 'Michel', '181 r Caponière', 88000, 'EPINAL', '1991-04-09', NULL, NULL),
('d13', 'Debelle', 'Jeanne', '134 r Stalingrad', 44000, 'NANTES', '1991-12-05', NULL, NULL),
('d51', 'Debroise', 'Michel', '2 av 6 Juin', 70000, 'VESOUL', '1997-11-18', NULL, NULL),
('e22', 'Desmarquest', 'Nathalie', '14 r Fédérico Garcia Lorca', 54000, 'NANCY', '1989-03-24', NULL, NULL),
('e24', 'Desnost', 'Pierre', '16 r Barral de Montferrat', 55000, 'VERDUN', '1993-05-17', NULL, NULL),
('e39', 'Dudouit', 'Frédéric', '18 quai Xavier Jouvin', 75000, 'PARIS', '1988-04-26', NULL, NULL),
('e49', 'Duncombe', 'Claude', '19 av Alsace Lorraine', 9000, 'FOIX', '1996-02-19', NULL, NULL),
('e5', 'Enault-Pascreau', 'Céline', '25B r Stalingrad', 40000, 'MONT DE MARSAN', '1990-11-27', NULL, NULL),
('e52', 'Eynde', 'Valérie', '3 r Henri Moissan', 76000, 'ROUEN', '1991-10-31', NULL, NULL),
('f21', 'Finck', 'Jacques', 'rte Montreuil Bellay', 74000, 'ANNECY', '1993-06-08', NULL, NULL),
('f39', 'Frémont', 'Fernande', '4 r Jean Giono', 69000, 'LYON', '1997-02-15', NULL, NULL),
('f4', 'Gest', 'Alain', '30 r Authie', 46000, 'FIGEAC', '1994-05-03', NULL, NULL),
('g19', 'Gheysen', 'Galassus', '32 bd Mar Foch', 75000, 'PARIS', '1996-01-18', NULL, NULL),
('g30', 'Girard', 'Yvon', '31 av 6 Juin', 80000, 'AMIENS', '1999-03-27', 'N', NULL),
('g53', 'Gombert', 'Luc', '32 r Emile Gueymard', 56000, 'VANNES', '1985-10-02', NULL, NULL),
('g7', 'Guindon', 'Caroline', '40 r Mar Montgomery', 87000, 'LIMOGES', '1996-01-13', NULL, NULL),
('h13', 'Guindon', 'François', '44 r Picotière', 19000, 'TULLE', '1993-05-08', NULL, NULL),
('h30', 'Igigabel', 'Guy', '33 gal Arlequin', 94000, 'CRETEIL', '1998-04-26', NULL, NULL),
('h35', 'Jourdren', 'Pierre', '34 av Jean Perrot', 15000, 'AURRILLAC', '1993-08-26', NULL, NULL),
('h40', 'Juttard', 'Pierre-Raoul', '34 cours Jean Jaurès', 8000, 'SEDAN', '1992-11-01', NULL, NULL),
('j45', 'Labouré-Morel', 'Saout', '38 cours Berriat', 52000, 'CHAUMONT', '1998-02-25', 'N', NULL),
('j50', 'Landré', 'Philippe', '4 av Gén Laperrine', 59000, 'LILLE', '1992-12-16', NULL, NULL),
('j8', 'Langeard', 'Hugues', '39 av Jean Perrot', 93000, 'BAGNOLET', '1998-06-18', 'P', NULL),
('k4', 'Lanne', 'Bernard', '4 r Bayeux', 30000, 'NIMES', '1996-11-21', NULL, NULL),
('k53', 'Le', 'Noël', '4 av Beauvert', 68000, 'MULHOUSE', '1983-03-23', NULL, NULL),
('l14', 'Le', 'Jean', '39 r Raspail', 53000, 'LAVAL', '1995-02-02', NULL, NULL),
('l23', 'Leclercq', 'Servane', '11 r Quinconce', 18000, 'BOURGES', '1995-06-05', NULL, NULL),
('l46', 'Lecornu', 'Jean-Bernard', '4 bd Mar Foch', 72000, 'LA FERTE BERNARD', '1997-01-24', NULL, NULL),
('l56', 'Lecornu', 'Ludovic', '4 r Abel Servien', 25000, 'BESANCON', '1996-02-27', NULL, NULL),
('m35', 'Lejard', 'Agnès', '4 r Anthoard', 82000, 'MONTAUBAN', '1987-10-06', NULL, NULL),
('m45', 'Lesaulnier', 'Pascal', '47 r Thiers', 57000, 'METZ', '1990-10-13', NULL, NULL),
('n42', 'Letessier', 'Stéphane', '5 chem Capuche', 27000, 'EVREUX', '1996-03-06', NULL, NULL),
('n58', 'Loirat', 'Didier', 'Les Pêchers cité Bourg la Croix', 45000, 'ORLEANS', '1992-08-30', NULL, NULL),
('n59', 'Maffezzoli', 'Thibaud', '5 r Chateaubriand', 2000, 'LAON', '1994-12-19', NULL, NULL),
('o26', 'Mancini', 'Anne', '5 r Agier', 48000, 'MENDE', '1995-01-05', NULL, NULL),
('p32', 'Marcouiller', 'Gérard', '7 pl St Gilles', 91000, 'ISSY LES MOULINEAUX', '1992-12-24', NULL, NULL),
('p40', 'Michel', 'Jean-Claude', '5 r Gabriel Péri', 61000, 'FLERS', '1992-12-14', 'O', NULL),
('p41', 'Montecot', 'Françoise', '6 r Paul Valéry', 17000, 'SAINTES', '1998-07-27', NULL, NULL),
('p42', 'Notini', 'Veronique', '5 r Lieut Chabal', 60000, 'BEAUVAIS', '1994-12-12', NULL, NULL),
('p49', 'Onfroy', 'Den', '5 r Sidonie Jacolin', 37000, 'TOURS', '1977-10-03', NULL, NULL),
('p6', 'Pascreau', 'Charles', '57 bd Mar Foch', 64000, 'PAU', '1997-03-30', NULL, NULL),
('p7', 'Pernot', 'Claude-Noël', '6 r Alexandre 1 de Yougoslavie', 11000, 'NARBONNE', '1990-03-01', NULL, NULL),
('p8', 'Perrier', 'Maître', '6 r Aubert Dubayet', 71000, 'CHALON SUR SAONE', '1991-06-23', NULL, NULL),
('q17', 'Petit', 'Jean-Louis', '7 r Ernest Renan', 50000, 'SAINT LO', '1997-09-06', NULL, NULL),
('r24', 'Piquery', 'Patrick', '9 r Vaucelles', 14000, 'CAEN', '1984-07-29', 'O', NULL),
('r58', 'Quiquandon', 'Joël', '7 r Ernest Renan', 29000, 'QUIMPER', '1990-06-30', NULL, NULL),
('s10', 'Retailleau', 'Josselin', '88Bis r Saumuroise', 39000, 'DOLE', '1995-11-14', NULL, NULL),
('s21', 'Retailleau', 'Pascal', '32 bd Ayrault', 23000, 'MONTLUCON', '1992-09-25', NULL, NULL),
('t43', 'Souron', 'Maryse', '7B r Gay Lussac', 21000, 'DIJON', '1995-03-09', NULL, NULL),
('t47', 'Tiphagne', 'Patrick', '7B r Gay Lussac', 62000, 'ARRAS', '1997-08-29', NULL, NULL),
('t55', 'Tréhet', 'Alain', '7D chem Barral', 12000, 'RODEZ', '1994-11-29', NULL, NULL),
('t60', 'Tusseau', 'Josselin', '63 r Bon Repos', 28000, 'CHARTRES', '1991-03-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

CREATE TABLE `composant` (
  `CMP_CODE` int(11) NOT NULL,
  `CMP_LIBELLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `IdCompte` int(11) NOT NULL,
  `Username` varchar(24) NOT NULL,
  `password` varchar(256) NOT NULL,
  `Mail` varchar(64) NOT NULL,
  `LastDeviceConnection` varchar(64) DEFAULT NULL,
  `LastConnectionDate` datetime DEFAULT NULL,
  `PasswordChangeDate` datetime DEFAULT NULL,
  `COL_MATRICULE` varchar(50) NOT NULL,
  `ID_Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`IdCompte`, `Username`, `password`, `Mail`, `LastDeviceConnection`, `LastConnectionDate`, `PasswordChangeDate`, `COL_MATRICULE`, `ID_Type`) VALUES
(5, 'admin', 'admin', 'contactmathieu.leroy@gmail.com', '', '2021-12-05 15:13:59', '0000-00-00 00:00:00', 'a132', 1),
(7, 'test', 'test', 'test@mail.com', NULL, '2021-12-04 16:04:47', NULL, 'a55', 2);

-- --------------------------------------------------------

--
-- Structure de la table `constituer`
--

CREATE TABLE `constituer` (
  `CMP_CODE` int(11) NOT NULL,
  `MED_DEPOTLEGAL` varchar(50) NOT NULL,
  `CST_QTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dosage`
--

CREATE TABLE `dosage` (
  `DOS_CODE` int(11) NOT NULL,
  `DOS_QUANTITE` int(11) NOT NULL,
  `DOS_UNITE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `FAM_CODE` char(5) NOT NULL,
  `FAM_LIBELLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`FAM_CODE`, `FAM_LIBELLE`) VALUES
('AA', 'Antalgiques en association'),
('AAA', 'Antalgiques antipyrétiques en association'),
('AAC', 'Antidépresseur daction centrale'),
('AAH', 'Antivertigineux antihistaminique H1'),
('ABA', 'Antibiotique antituberculeux'),
('ABC', 'Antibiotique antiacnéique local'),
('ABP', 'Antibiotique de la famille des béta-lactamines (pé'),
('AFC', 'Antibiotique de la famille des cyclines'),
('AFM', 'Antibiotique de la famille des macrolides'),
('AH', 'Antihistaminique H1 local'),
('AIM', 'Antidépresseur imipraminique (tricyclique)'),
('AIN', 'Antidépresseur inhibiteur sélectif de la recapture'),
('ALO', 'Antibiotique local (ORL)'),
('ANS', 'Antidépresseur IMAO non sélectif'),
('AO', 'Antibiotique ophtalmique'),
('AP', 'Antipsychotique normothymique'),
('AUM', 'Antibiotique urinaire minute'),
('CRT', 'Corticoïde, antibiotique et antifongique à  usage '),
('HYP', 'Hypnotique antihistaminique'),
('PSA', 'Psychostimulant, antiasthénique');

-- --------------------------------------------------------

--
-- Structure de la table `fiche_frais`
--

CREATE TABLE `fiche_frais` (
  `COL_MATRICULE` varchar(50) NOT NULL,
  `FF_Mois` int(11) NOT NULL,
  `FF_NBHorsClassif` int(11) NOT NULL,
  `FF_MontantHorsClassif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formuler`
--

CREATE TABLE `formuler` (
  `PRE_CODE` int(11) NOT NULL,
  `MED_DEPOTLEGAL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inclure`
--

CREATE TABLE `inclure` (
  `COL_MATRICULE` varchar(50) NOT NULL,
  `FF_Mois` int(11) NOT NULL,
  `TF_CODE` int(11) NOT NULL,
  `INC_QTE` int(11) NOT NULL,
  `INC_MONTANT` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `interagir`
--

CREATE TABLE `interagir` (
  `MED_DEPOTLEGAL` varchar(50) NOT NULL,
  `MED_DEPOTLEGAL_MEDICAMENT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inviter`
--

CREATE TABLE `inviter` (
  `PRA_NUM` int(11) NOT NULL,
  `AC_NUM` int(11) NOT NULL,
  `SPECIALISTEON` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `MED_DEPOTLEGAL` varchar(50) NOT NULL,
  `MED_NOMCOMMERCIAL` varchar(50) NOT NULL,
  `MED_COMPOSITION` varchar(50) NOT NULL,
  `MED_EFFETS` varchar(256) NOT NULL,
  `MED_CONTREINDIC` varchar(256) NOT NULL,
  `MED_PRIXECHANTILLON` float DEFAULT '0',
  `FAM_CODE` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`MED_DEPOTLEGAL`, `MED_NOMCOMMERCIAL`, `MED_COMPOSITION`, `MED_EFFETS`, `MED_CONTREINDIC`, `MED_PRIXECHANTILLON`, `FAM_CODE`) VALUES
('3MYC7', 'TRIMYCINE', 'Triamcinolone (acétonide) + Néomycine + Nystatine', 'Ce médicament est un corticoïde à  activité forte ou très forte associé à  un antibiotique et un antifongique, utilisé en application locale dans certaines atteintes cutanées surinfectées.', 'Ce médicament est contre-indiqué en cas d allergie à  l un des constituants, d infections de la peau ou de parasitisme non traités, d acné. Ne pas appliquer sur une plaie, ni sous un pansement occlusif.', NULL, 'CRT'),
('ADIMOL9', 'ADIMOL', 'Amoxicilline + Acide clavulanique', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d allergie aux pénicillines ou aux céphalosporines.', NULL, 'ABP'),
('AMOPIL7', 'AMOPIL', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d allergie aux pénicillines. Il doit être administré avec prudence en cas d allergie aux céphalosporines.', NULL, 'ABP'),
('AMOX45', 'AMOXAR', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'La prise de ce médicament peut rendre positifs les tests de dépistage du dopage.', NULL, 'ABP'),
('AMOXIG12', 'AMOXI Gé', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d allergie aux pénicillines. Il doit être administré avec prudence en cas d allergie aux céphalosporines.', NULL, 'ABP'),
('APATOUX22', 'APATOUX Vitamine C', 'Tyrothricine + Tétracaïne + Acide ascorbique (Vita', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d allergie à  l un des constituants, en cas de phénylcétonurie et chez l enfant de moins de 6 ans.', NULL, 'ALO'),
('BACTIG10', 'BACTIGEL', 'Erythromycine', 'Ce médicament est utilisé en application locale pour traiter l acné et les infections cutanées bactériennes associées.', 'Ce médicament est contre-indiqué en cas d allergie aux antibiotiques de la famille des macrolides ou des lincosanides.', NULL, 'ABC'),
('BACTIV13', 'BACTIVIL', 'Erythromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d allergie aux macrolides (dont le chef de file est l érythromycine).', NULL, 'AFM'),
('BITALV', 'BIVALIC', 'Dextropropoxyphène + Paracétamol', 'Ce médicament est utilisé pour traiter les douleurs d intensité modérée ou intense.', 'Ce médicament est contre-indiqué en cas d allergie aux médicaments de cette famille, d insuffisance hépatique ou d insuffisance rénale.', NULL, 'AAA'),
('CARTION6', 'CARTION', 'Acide acétylsalicylique (aspirine) + Acide ascorbi', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas de troubles de la coagulation (tendances aux hémorragies), d ulcère gastroduodénal, maladies graves du foie.', NULL, 'AAA'),
('CLAZER6', 'CLAZER', 'Clarithromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques. Il est également utilisé dans le traitement de l ulcère gastro-duodénal, en association avec d autres médicaments.', 'Ce médicament est contre-indiqué en cas d allergie aux macrolides (dont le chef de file est l érythromycine).', NULL, 'AFM'),
('DEPRIL9', 'DEPRAMIL', 'Clomipramine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères, certaines douleurs rebelles, les troubles obsessionnels compulsifs et certaines énurésies chez l enfant.', 'Ce médicament est contre-indiqué en cas de glaucome ou d adénome de la prostate, d infarctus récent, ou si vous avez reà§u un traitement par IMAO durant les 2 semaines précédentes ou en cas d allergie aux antidépresseurs imipraminiques.', NULL, 'AIM'),
('DIMIRTAM6', 'DIMIRTAM', 'Mirtazapine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères.', 'La prise de ce produit est contre-indiquée en cas de d allergie à  l un des constituants.', NULL, 'AAC'),
('DOLRIL7', 'DOLORIL', 'Acide acétylsalicylique (aspirine) + Acide ascorbi', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas d allergie au paracétamol ou aux salicylates.', NULL, 'AAA'),
('DORNOM8', 'NORMADOR', 'Doxylamine', 'Ce médicament est utilisé pour traiter l insomnie chez l adulte.', 'Ce médicament est contre-indiqué en cas de glaucome, de certains troubles urinaires (rétention urinaire) et chez l enfant de moins de 15 ans.', NULL, 'HYP'),
('EQUILARX6', 'EQUILAR', 'Méclozine', 'Ce médicament est utilisé pour traiter les vertiges et pour prévenir le mal des transports.', 'Ce médicament ne doit pas être utilisé en cas d allergie au produit, en cas de glaucome ou de rétention urinaire.', NULL, 'AAH'),
('EVILR7', 'EVEILLOR', 'Adrafinil', 'Ce médicament est utilisé pour traiter les troubles de la vigilance et certains symptomes neurologiques chez le sujet agé.', 'Ce médicament est contre-indiqué en cas d allergie à  l un des constituants.', NULL, 'PSA'),
('INSXT5', 'INSECTIL', 'Diphénydramine', 'Ce médicament est utilisé en application locale sur les piqûres d insecte et l urticaire.', 'Ce médicament est contre-indiqué en cas d allergie aux antihistaminiques.', NULL, 'AH'),
('JOVAI8', 'JOVENIL', 'Josamycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d allergie aux macrolides (dont le chef de file est l érythromycine).', NULL, 'AFM'),
('LIDOXY23', 'LIDOXYTRACINE', 'Oxytétracycline +Lidocaïne', 'Ce médicament est utilisé en injection intramusculaire pour traiter certaines infections spécifiques.', 'Ce médicament est contre-indiqué en cas d allergie à  l un des constituants. Il ne doit pas être associé aux rétinoïdes.', NULL, 'AFC'),
('LITHOR12', 'LITHORINE', 'Lithium', 'Ce médicament est indiqué dans la prévention des psychoses maniaco-dépressives ou pour traiter les états maniaques.', 'Ce médicament ne doit pas être utilisé si vous êtes allergique au lithium. Avant de prendre ce traitement, signalez à  votre médecin traitant si vous souffrez d insuffisance rénale, ou si vous avez un régime sans sel.', NULL, 'AP'),
('PARMOL16', 'PARMOCODEINE', 'Codéine + Paracétamol', 'Ce médicament est utilisé pour le traitement des douleurs lorsque des antalgiques simples ne sont pas assez efficaces.', 'Ce médicament est contre-indiqué en cas d allergie à  l un des constituants, chez l enfant de moins de 15 Kg, en cas d insuffisance hépatique ou respiratoire, d asthme, de phénylcétonurie et chez la femme qui allaite.', NULL, 'AA'),
('PHYSOI8', 'PHYSICOR', 'Sulbutiamine', 'Ce médicament est utilisé pour traiter les baisses d activité physique ou psychique, souvent dans un contexte de dépression.', 'Ce médicament est contre-indiqué en cas d allergie à  l un des constituants.', NULL, 'PSA'),
('PIRIZ8', 'PIRIZAN', 'Pyrazinamide', 'Ce médicament est utilisé, en association à  d autres antibiotiques, pour traiter la tuberculose.', 'Ce médicament est contre-indiqué en cas d allergie à  l un des constituants, d insuffisance rénale ou hépatique, d hyperuricémie ou de porphyrie.', NULL, 'ABA'),
('POMDI20', 'POMADINE', 'Bacitracine', 'Ce médicament est utilisé pour traiter les infections oculaires de la surface de l oeil.', 'Ce médicament est contre-indiqué en cas d allergie aux antibiotiques appliqués localement.', NULL, 'AO'),
('TROXT21', 'TROXADET', 'Paroxétine', 'Ce médicament est utilisé pour traiter la dépression et les troubles obsessionnels compulsifs. Il peut également être utilisé en prévention des crises de panique avec ou sans agoraphobie.', 'Ce médicament est contre-indiqué en cas d allergie au produit.', NULL, 'AIN'),
('TXISOL22', 'TOUXISOL Vitamine C', 'Tyrothricine + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d allergie à  l un des constituants et chez l enfant de moins de 6 ans.', NULL, 'ALO'),
('URIEG6', 'URIREGUL', 'Fosfomycine trométamol', 'Ce médicament est utilisé pour traiter les infections urinaires simples chez la femme de moins de 65 ans.', 'La prise de ce médicament est contre-indiquée en cas d allergie à  l un des constituants et d insuffisance rénale.', NULL, 'AUM');

-- --------------------------------------------------------

--
-- Structure de la table `offrir`
--

CREATE TABLE `offrir` (
  `MED_DEPOTLEGAL` varchar(50) NOT NULL,
  `PRA_NUM` varchar(50) NOT NULL,
  `rap_num` int(11) NOT NULL,
  `OFF_QTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `SPE_CODE` char(5) NOT NULL,
  `PRA_NUM` int(11) NOT NULL,
  `POS_DIPLOME` int(11) NOT NULL,
  `POS_COEFPRESCRIPTIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `praticien`
--

CREATE TABLE `praticien` (
  `PRA_NUM` int(11) NOT NULL,
  `PRA_CODE` int(11) NOT NULL,
  `PRA_NOM` varchar(50) NOT NULL,
  `PRA_PRENOM` varchar(50) NOT NULL,
  `PRA_ADRESSE` varchar(50) NOT NULL,
  `PRA_CP` int(11) NOT NULL,
  `PRA_VILLE` varchar(50) NOT NULL,
  `PRA_COEFNOTORIETE` float NOT NULL,
  `PRA_COEFConfiance` float NOT NULL,
  `TYP_CODE` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `praticien`
--

INSERT INTO `praticien` (`PRA_NUM`, `PRA_CODE`, `PRA_NOM`, `PRA_PRENOM`, `PRA_ADRESSE`, `PRA_CP`, `PRA_VILLE`, `PRA_COEFNOTORIETE`, `PRA_COEFConfiance`, `TYP_CODE`) VALUES
(1, 0, 'Notini', 'Alain', '114 r Authie', 85000, 'LA ROCHE SUR YON', 290.03, 0, 'MH'),
(2, 0, 'Gosselin', 'Albert', '13 r Devon', 41000, 'BLOIS', 307.49, 0, 'MV'),
(3, 0, 'Delahaye', 'André', '36 av 6 Juin', 25000, 'BESANCON', 185.79, 0, 'PS'),
(4, 0, 'Leroux', 'André', '47 av Robert Schuman', 60000, 'BEAUVAIS', 172.04, 0, 'PH'),
(5, 0, 'Desmoulins', 'Anne', '31 r St Jean', 30000, 'NIMES', 94.75, 0, 'PO'),
(6, 0, 'Mouel', 'Anne', '27 r Auvergne', 80000, 'AMIENS', 45.2, 0, 'MH'),
(7, 0, 'Desgranges-Lentz', 'Antoine', '1 r Albert de Mun', 29000, 'MORLAIX', 20.07, 0, 'MV'),
(8, 0, 'Marcouiller', 'Arnaud', '31 r St Jean', 68000, 'MULHOUSE', 396.52, 0, 'PS'),
(9, 0, 'Dupuy', 'Benoit', '9 r Demolombe', 34000, 'MONTPELLIER', 395.66, 0, 'PH'),
(10, 0, 'Lerat', 'Bernard', '31 r St Jean', 59000, 'LILLE', 257.79, 0, 'PO'),
(11, 0, 'Marçais-Lefebvre', 'Bertrand', '86Bis r Basse', 67000, 'STRASBOURG', 450.96, 0, 'MH'),
(12, 0, 'Boscher', 'Bruno', '94 r Falaise', 10000, 'TROYES', 356.14, 0, 'MV'),
(13, 0, 'Morel', 'Catherine', '21 r Chateaubriand', 75000, 'PARIS', 379.57, 0, 'PS'),
(14, 0, 'Guivarch', 'Chantal', '4 av Gén Laperrine', 45000, 'ORLEANS', 114.56, 0, 'PH'),
(15, 0, 'Bessin-Grosdoit', 'Christophe', '92 r Falaise', 6000, 'NICE', 222.06, 0, 'PO'),
(16, 0, 'Rossa', 'Claire', '14 av Thiès', 6000, 'NICE', 529.78, 0, 'MH'),
(17, 0, 'Cauchy', 'Denis', '5 av Ste Thérèse', 11000, 'NARBONNE', 458.82, 0, 'MV'),
(18, 0, 'Gaffé', 'Dominique', '9 av 1ère Armée Française', 35000, 'RENNES', 213.4, 0, 'PS'),
(19, 0, 'Guenon', 'Dominique', '98 bd Mar Lyautey', 44000, 'NANTES', 175.89, 0, 'PH'),
(20, 0, 'Prévot', 'Dominique', '29 r Lucien Nelle', 87000, 'LIMOGES', 151.36, 0, 'PO'),
(21, 0, 'Houchard', 'Eliane', '9 r Demolombe', 49100, 'ANGERS', 436.96, 0, 'MH'),
(22, 0, 'Desmons', 'Elisabeth', '51 r Bernières', 29000, 'QUIMPER', 281.17, 0, 'MV'),
(23, 0, 'Flament', 'Elisabeth', '11 r Pasteur', 35000, 'RENNES', 315.6, 0, 'PS'),
(24, 0, 'Goussard', 'Emmanuel', '9 r Demolombe', 41000, 'BLOIS', 40.72, 0, 'PH'),
(25, 0, 'Desprez', 'Eric', '9 r Vaucelles', 33000, 'BORDEAUX', 406.85, 0, 'PO'),
(26, 0, 'Coste', 'Evelyne', '29 r Lucien Nelle', 19000, 'TULLE', 441.87, 0, 'MH'),
(27, 0, 'Lefebvre', 'Frédéric', '2 pl Wurzburg', 55000, 'VERDUN', 573.63, 0, 'MV'),
(28, 0, 'Lemée', 'Frédéric', '29 av 6 Juin', 56000, 'VANNES', 326.4, 0, 'PS'),
(29, 0, 'Martin', 'Frédéric', 'Bât A 90 r Bayeux', 70000, 'VESOUL', 506.06, 0, 'PH'),
(30, 0, 'Marie', 'Frédérique', '172 r Caponière', 70000, 'VESOUL', 313.31, 0, 'PO'),
(31, 0, 'Rosenstech', 'Geneviève', '27 r Auvergne', 75000, 'PARIS', 366.82, 0, 'MH'),
(32, 0, 'Pontavice', 'Ghislaine', '8 r Gaillon', 86000, 'POITIERS', 265.58, 0, 'MV'),
(33, 0, 'Leveneur-Mosquet', 'Guillaume', '47 av Robert Schuman', 64000, 'PAU', 184.97, 0, 'PS'),
(34, 0, 'Blanchais', 'Guy', '30 r Authie', 8000, 'SEDAN', 502.48, 0, 'PH'),
(35, 0, 'Leveneur', 'Hugues', '7 pl St Gilles', 62000, 'ARRAS', 7.39, 0, 'PO'),
(36, 0, 'Mosquet', 'Isabelle', '22 r Jules Verne', 76000, 'ROUEN', 77.1, 0, 'MH'),
(37, 0, 'Giraudon', 'Jean-Christophe', '1 r Albert de Mun', 38100, 'VIENNE', 92.62, 0, 'MV'),
(38, 0, 'Marie', 'Jean-Claude', '26 r Hérouville', 69000, 'LYON', 120.1, 0, 'PS'),
(39, 0, 'Maury', 'Jean-François', '5 r Pierre Girard', 71000, 'CHALON SUR SAONE', 13.73, 0, 'PH'),
(40, 0, 'Dennel', 'Jean-Louis', '7 pl St Gilles', 28000, 'CHARTRES', 550.69, 0, 'PO'),
(41, 0, 'Ain', 'Jean-Pierre', '4 résid Olympia', 2000, 'LAON', 5.59, 0, 'MH'),
(42, 0, 'Chemery', 'Jean-Pierre', '51 pl Ancienne Boucherie', 14000, 'CAEN', 396.58, 0, 'MV'),
(43, 0, 'Comoz', 'Jean-Pierre', '35 r Auguste Lechesne', 18000, 'BOURGES', 340.35, 0, 'PS'),
(44, 0, 'Desfaudais', 'Jean-Pierre', '7 pl St Gilles', 29000, 'BREST', 71.76, 0, 'PH'),
(45, 0, 'Phan', 'Jérôme', '9 r Clos Caillet', 79000, 'NIORT', 451.61, 0, 'PO'),
(46, 0, 'Riou', 'Line', '43 bd Gén Vanier', 77000, 'MARNE LA VALLEE', 193.25, 0, 'MH'),
(47, 0, 'Chubilleau', 'Louis', '46 r Eglise', 17000, 'SAINTES', 202.07, 0, 'MV'),
(48, 0, 'Lebrun', 'Lucette', '178 r Auge', 54000, 'NANCY', 410.41, 0, 'PS'),
(49, 0, 'Goessens', 'Marc', '6 av 6 Juin', 39000, 'DOLE', 548.57, 0, 'PH'),
(50, 0, 'Laforge', 'Marc', '5 résid Prairie', 50000, 'SAINT LO', 265.05, 0, 'PO'),
(51, 0, 'Millereau', 'Marc', '36 av 6 Juin', 72000, 'LA FERTE BERNARD', 430.42, 0, 'MH'),
(52, 0, 'Dauverne', 'Marie-Christine', '69 av Charlemagne', 21000, 'DIJON', 281.05, 0, 'MV'),
(53, 0, 'Vittorio', 'Myriam', '3 pl Champlain', 94000, 'BOISSY SAINT LEGER', 356.23, 0, 'PS'),
(54, 0, 'Lapasset', 'Nhieu', '31 av 6 Juin', 52000, 'CHAUMONT', 107, 0, 'PH'),
(55, 0, 'Plantet-Besnier', 'Nicole', '10 av 1ère Armée Française', 86000, 'CHATELLEREAULT', 369.94, 0, 'PO'),
(56, 0, 'Chubilleau', 'Pascal', '3 r Hastings', 15000, 'AURRILLAC', 290.75, 0, 'MH'),
(57, 0, 'Robert', 'Pascal', '31 r St Jean', 93000, 'BOBIGNY', 162.41, 0, 'MV'),
(58, 0, 'Jean', 'Pascale', '114 r Authie', 49100, 'SAUMUR', 375.52, 0, 'PS'),
(59, 0, 'Chanteloube', 'Patrice', '14 av Thiès', 13000, 'MARSEILLE', 478.01, 0, 'PH'),
(60, 0, 'Lecuirot', 'Patrice', 'résid St Pères 55 r Pigacière', 54000, 'NANCY', 239.66, 0, 'PO'),
(61, 0, 'Gandon', 'Patrick', '47 av Robert Schuman', 37000, 'TOURS', 599.06, 0, 'MH'),
(62, 0, 'Mirouf', 'Patrick', '22 r Puits Picard', 74000, 'ANNECY', 458.42, 0, 'MV'),
(63, 0, 'Boireaux', 'Philippe', '14 av Thiès', 10000, 'CHALON EN CHAMPAGNE', 454.48, 0, 'PS'),
(64, 0, 'Cendrier', 'Philippe', '7 pl St Gilles', 12000, 'RODEZ', 164.16, 0, 'PH'),
(65, 0, 'Duhamel', 'Philippe', '114 r Authie', 34000, 'MONTPELLIER', 98.62, 0, 'PO'),
(66, 0, 'Grigy', 'Philippe', '15 r Mélingue', 44000, 'CLISSON', 285.1, 0, 'MH'),
(67, 0, 'Linard', 'Philippe', '1 r Albert de Mun', 81000, 'ALBI', 486.3, 0, 'MV'),
(68, 0, 'Lozier', 'Philippe', '8 r Gaillon', 31000, 'TOULOUSE', 48.4, 0, 'PS'),
(69, 0, 'Dechâtre', 'Pierre', '63 av Thiès', 23000, 'MONTLUCON', 253.75, 0, 'PH'),
(70, 0, 'Goessens', 'Pierre', '22 r Jean Romain', 40000, 'MONT DE MARSAN', 426.19, 0, 'PO'),
(71, 0, 'Leménager', 'Pierre', '39 av 6 Juin', 57000, 'METZ', 118.7, 0, 'MH'),
(72, 0, 'Née', 'Pierre', '39 av 6 Juin', 82000, 'MONTAUBAN', 72.54, 0, 'MV'),
(73, 0, 'Guyot', 'Pierre-Laurent', '43 bd Gén Vanier', 48000, 'MENDE', 352.31, 0, 'PS'),
(74, 0, 'Chauchard', 'Roger', '9 r Vaucelles', 13000, 'MARSEILLE', 552.19, 0, 'PH'),
(75, 0, 'Mabire', 'Roland', '11 r Boutiques', 67000, 'STRASBOURG', 422.39, 0, 'PO'),
(76, 0, 'Leroy', 'Soazig', '45 r Boutiques', 61000, 'ALENCON', 570.67, 0, 'MH'),
(77, 0, 'Guyot', 'Stéphane', '26 r Hérouville', 46000, 'FIGEAC', 28.85, 0, 'MV'),
(78, 0, 'Delposen', 'Sylvain', '39 av 6 Juin', 27000, 'DREUX', 292.01, 0, 'PS'),
(79, 0, 'Rault', 'Sylvie', '15 bd Richemond', 2000, 'SOISSON', 526.6, 0, 'PH'),
(80, 0, 'Renouf', 'Sylvie', '98 bd Mar Lyautey', 88000, 'EPINAL', 425.24, 0, 'PO'),
(81, 0, 'Alliet-Grach', 'Thierry', '14 av Thiès', 7000, 'PRIVAS', 451.31, 0, 'MH'),
(82, 0, 'Bayard', 'Thierry', '92 r Falaise', 42000, 'SAINT ETIENNE', 271.71, 0, 'MV'),
(83, 0, 'Gauchet', 'Thierry', '7 r Desmoueux', 38100, 'GRENOBLE', 406.1, 0, 'PS'),
(84, 0, 'Bobichon', 'Tristan', '219 r Caponière', 9000, 'FOIX', 218.36, 0, 'PH'),
(85, 0, 'Duchemin-Laniel', 'Véronique', '130 r St Jean', 33000, 'LIBOURNE', 265.61, 0, 'PO'),
(86, 0, 'Laurent', 'Younès', '34 r Demolombe', 53000, 'MAYENNE', 496.1, 0, 'MH');

-- --------------------------------------------------------

--
-- Structure de la table `prescrire`
--

CREATE TABLE `prescrire` (
  `MED_DEPOTLEGAL` varchar(50) NOT NULL,
  `TIN_Code` int(11) NOT NULL,
  `DOS_CODE` int(11) NOT NULL,
  `PRE_POSOLOGIE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE `presentation` (
  `PRE_CODE` int(11) NOT NULL,
  `PRE_LIBELLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rapport_visite`
--

CREATE TABLE `rapport_visite` (
  `COL_MATRICULE` varchar(50) NOT NULL,
  `rap_num` int(11) NOT NULL,
  `rap_date` date NOT NULL,
  `RAP_BILAN` varchar(256) NOT NULL,
  `RAP_saisie_date` date NOT NULL,
  `RAP_ETAT` tinyint(1) NOT NULL,
  `PRA_NUM` int(11) NOT NULL,
  `MED_DEPOTLEGAL` varchar(50) DEFAULT NULL,
  `MED_DEPOTLEGAL_2` varchar(50) DEFAULT NULL,
  `ID_motif` int(11) DEFAULT NULL,
  `motif_Autre` varchar(64) DEFAULT NULL,
  `PRA_NUM_PRATICIEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rapport_visite`
--

INSERT INTO `rapport_visite` (`COL_MATRICULE`, `rap_num`, `rap_date`, `RAP_BILAN`, `RAP_saisie_date`, `RAP_ETAT`, `PRA_NUM`, `MED_DEPOTLEGAL`, `MED_DEPOTLEGAL_2`, `ID_motif`, `motif_Autre`, `PRA_NUM_PRATICIEN`) VALUES
('a55', 1, '2021-12-08', 'Tout s\'est bien passé, j\'ai présenté mon produit e', '2021-12-13', 1, 29, '3MYC7', 'APATOUX22', 1, NULL, NULL),
('a55', 2, '2021-12-08', 'Nickel', '2021-12-13', 1, 29, 'ADIMOL9', 'AMOX45', 2, NULL, NULL),
('a55', 3, '2021-12-05', 'azer', '2021-12-15', 1, 66, 'ADIMOL9', 'TROXT21', 1, 'azer', 23),
('A55', 4, '2021-12-26', 'AZRZE', '2021-12-15', 1, 41, 'INSXT5', NULL, 1, 'AETQZ', 58),
('a55', 5, '2021-12-03', 'azr', '2021-12-15', 1, 41, 'ADIMOL9', NULL, 2, 'zet', 26),
('a55', 6, '2021-12-03', 'azr', '2021-12-15', 1, 41, 'ADIMOL9', NULL, 2, 'zet', 26),
('a55', 7, '2021-12-11', 'aet', '2021-12-15', 1, 41, 'ADIMOL9', NULL, 1, 'azet', 2),
('a55', 8, '2021-12-05', 'azr', '2021-12-15', 1, 41, NULL, NULL, 1, NULL, NULL),
('a55', 9, '2021-12-17', 'fff', '2021-12-15', 1, 41, NULL, NULL, NULL, NULL, NULL),
('a55', 10, '2021-12-02', 'Tout très bien', '2021-12-15', 1, 82, 'AMOPIL7', NULL, 1, NULL, 15),
('a55', 11, '2021-12-15', '1512', '2021-12-15', 1, 34, 'ADIMOL9', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `realiser`
--

CREATE TABLE `realiser` (
  `AC_NUM` int(11) NOT NULL,
  `COL_MATRICULE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `REG_CODE` char(2) NOT NULL,
  `REG_NOM` varchar(50) NOT NULL,
  `SEC_CODE` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`REG_CODE`, `REG_NOM`, `SEC_CODE`) VALUES
('AL', 'Alsace Lorraine', 'E'),
('AQ', 'Aquitaine', 'S'),
('AU', 'Auvergne', 'P'),
('BG', 'Bretagne', 'O'),
('BN', 'Basse Normandie', 'O'),
('BO', 'Bourgogne', 'E'),
('CA', 'Champagne Ardennes', 'N'),
('CE', 'Centre', 'P'),
('FC', 'Franche Comté', 'E'),
('HN', 'Haute Normandie', 'N'),
('IF', 'Ile de France', 'P'),
('LG', 'Languedoc', 'S'),
('LI', 'Limousin', 'P'),
('MP', 'Midi Pyrénée', 'S'),
('NP', 'Nord Pas de Calais', 'N'),
('PA', 'Provence Alpes Cote d Azur', 'S'),
('PC', 'Poitou Charente', 'O'),
('PI', 'Picardie', 'N'),
('PL', 'Pays de Loire', 'O'),
('RA', 'Rhone Alpes', 'E'),
('RO', 'Roussilon', 'S'),
('VD', 'Vendée', 'O');

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE `secteur` (
  `SEC_CODE` char(1) NOT NULL,
  `SEC_LIBELLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`SEC_CODE`, `SEC_LIBELLE`) VALUES
('E', 'Est'),
('N', 'Nord'),
('O', 'Ouest'),
('P', 'Paris centre'),
('S', 'Sud');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `SPE_CODE` char(5) NOT NULL,
  `SPE_LIBELLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`SPE_CODE`, `SPE_LIBELLE`) VALUES
('ACP', 'anatomie et cytologie pathologiques'),
('AMV', 'angéiologie, médecine vasculaire'),
('ARC', 'anesthésiologie et réanimation chirurgicale'),
('BM', 'biologie médicale'),
('CAC', 'cardiologie et affections cardio-vasculaires'),
('CCT', 'chirurgie cardio-vasculaire et thoracique'),
('CG', 'chirurgie générale'),
('CMF', 'chirurgie maxillo-faciale'),
('COM', 'cancérologie, oncologie médicale'),
('COT', 'chirurgie orthopédique et traumatologie'),
('CPR', 'chirurgie plastique reconstructrice et esthétique'),
('CU', 'chirurgie urologique'),
('CV', 'chirurgie vasculaire'),
('DN', 'diabétologie-nutrition, nutrition'),
('DV', 'dermatologie et vénéréologie'),
('EM', 'endocrinologie et métabolismes'),
('ETD', 'évaluation et traitement de la douleur'),
('GEH', 'gastro-entérologie et hépatologie (appareil digest'),
('GMO', 'gynécologie médicale, obstétrique'),
('GO', 'gynécologie-obstétrique'),
('HEM', 'maladies du sang (hématologie)'),
('MBS', 'médecine et biologie du sport'),
('MDT', 'médecine du travail'),
('MMO', 'médecine manuelle - ostéopathie'),
('MN', 'médecine nucléaire'),
('MPR', 'médecine physique et de réadaptation'),
('MTR', 'médecine tropicale, pathologie infectieuse et trop'),
('NEP', 'néphrologie'),
('NRC', 'neurochirurgie'),
('NRL', 'neurologie'),
('ODM', 'orthopédie dento maxillo-faciale'),
('OPH', 'ophtalmologie'),
('ORL', 'oto-rhino-laryngologie'),
('PEA', 'psychiatrie de l enfant et de l adolescent'),
('PME', 'pédiatrie maladies des enfants'),
('PNM', 'pneumologie'),
('PSC', 'psychiatrie'),
('RAD', 'radiologie (radiodiagnostic et imagerie médicale)'),
('RDT', 'radiothérapie (oncologie option radiothérapie)'),
('RGM', 'reproduction et gynécologie médicale'),
('RHU', 'rhumatologie'),
('STO', 'stomatologie'),
('SXL', 'sexologie'),
('TXA', 'toxicomanie et alcoologie');

-- --------------------------------------------------------

--
-- Structure de la table `travailler`
--

CREATE TABLE `travailler` (
  `REG_CODE` char(2) NOT NULL,
  `COL_MATRICULE` varchar(50) NOT NULL,
  `JJMMAA` date NOT NULL,
  `TRA_ROLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `ID_Type` int(11) NOT NULL,
  `Typ_lib` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`ID_Type`, `Typ_lib`, `level`) VALUES
(1, 'Responsable', 3),
(2, 'Délégué', 2),
(3, 'Visiteur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_frais`
--

CREATE TABLE `type_frais` (
  `TF_CODE` int(11) NOT NULL,
  `TF_LIBELLE` varchar(50) NOT NULL,
  `TF_FORFAIT` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_individu`
--

CREATE TABLE `type_individu` (
  `TIN_Code` int(11) NOT NULL,
  `TIN_LIBELLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_praticien`
--

CREATE TABLE `type_praticien` (
  `TYP_CODE` char(5) NOT NULL,
  `TYP_LIBELLE` varchar(50) NOT NULL,
  `TYP_LIEU` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_praticien`
--

INSERT INTO `type_praticien` (`TYP_CODE`, `TYP_LIBELLE`, `TYP_LIEU`) VALUES
('MH', 'Médecin Hospitalier', 'Hopital ou clinique'),
('MV', 'Médecine de Ville', 'Cabinet'),
('PH', 'Pharmacien Hospitalier', 'Hopital ou clinique'),
('PO', 'Pharmacien Officine', 'Pharmacie'),
('PS', 'Personnel de santé', 'Centre paramédical');

-- --------------------------------------------------------

--
-- Structure de la table `visite_motif`
--

CREATE TABLE `visite_motif` (
  `ID_motif` int(11) NOT NULL,
  `lib_motif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visite_motif`
--

INSERT INTO `visite_motif` (`ID_motif`, `lib_motif`) VALUES
(1, 'Périodique'),
(2, 'Actualisation');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actvite_compl`
--
ALTER TABLE `actvite_compl`
  ADD PRIMARY KEY (`AC_NUM`);

--
-- Index pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  ADD PRIMARY KEY (`COL_MATRICULE`),
  ADD UNIQUE KEY `Collaborateur_Compte0_AK` (`IdCompte`),
  ADD KEY `Collaborateur_SECTEUR0_FK` (`SEC_CODE`);

--
-- Index pour la table `composant`
--
ALTER TABLE `composant`
  ADD PRIMARY KEY (`CMP_CODE`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`IdCompte`),
  ADD UNIQUE KEY `Compte_Collaborateur0_AK` (`COL_MATRICULE`),
  ADD KEY `Compte_Type1_FK` (`ID_Type`);

--
-- Index pour la table `constituer`
--
ALTER TABLE `constituer`
  ADD PRIMARY KEY (`CMP_CODE`,`MED_DEPOTLEGAL`),
  ADD KEY `CONSTITUER_MEDICAMENT1_FK` (`MED_DEPOTLEGAL`);

--
-- Index pour la table `dosage`
--
ALTER TABLE `dosage`
  ADD PRIMARY KEY (`DOS_CODE`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`FAM_CODE`);

--
-- Index pour la table `fiche_frais`
--
ALTER TABLE `fiche_frais`
  ADD PRIMARY KEY (`COL_MATRICULE`,`FF_Mois`);

--
-- Index pour la table `formuler`
--
ALTER TABLE `formuler`
  ADD PRIMARY KEY (`PRE_CODE`,`MED_DEPOTLEGAL`),
  ADD KEY `FORMULER_MEDICAMENT1_FK` (`MED_DEPOTLEGAL`);

--
-- Index pour la table `inclure`
--
ALTER TABLE `inclure`
  ADD PRIMARY KEY (`COL_MATRICULE`,`FF_Mois`,`TF_CODE`),
  ADD KEY `INCLURE_TYPE_FRAIS1_FK` (`TF_CODE`);

--
-- Index pour la table `interagir`
--
ALTER TABLE `interagir`
  ADD PRIMARY KEY (`MED_DEPOTLEGAL`,`MED_DEPOTLEGAL_MEDICAMENT`),
  ADD KEY `INTERAGIR_MEDICAMENT1_FK` (`MED_DEPOTLEGAL_MEDICAMENT`);

--
-- Index pour la table `inviter`
--
ALTER TABLE `inviter`
  ADD PRIMARY KEY (`PRA_NUM`,`AC_NUM`),
  ADD KEY `INVITER_ACTVITE_COMPL1_FK` (`AC_NUM`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`MED_DEPOTLEGAL`),
  ADD KEY `MEDICAMENT_FAMILLE0_FK` (`FAM_CODE`);

--
-- Index pour la table `offrir`
--
ALTER TABLE `offrir`
  ADD PRIMARY KEY (`MED_DEPOTLEGAL`,`PRA_NUM`,`rap_num`),
  ADD KEY `OFFRIR_RAPPORT_VISITE1_FK` (`PRA_NUM`,`rap_num`);

--
-- Index pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`SPE_CODE`,`PRA_NUM`),
  ADD KEY `POSSEDER_PRATICIEN1_FK` (`PRA_NUM`);

--
-- Index pour la table `praticien`
--
ALTER TABLE `praticien`
  ADD PRIMARY KEY (`PRA_NUM`),
  ADD KEY `PRATICIEN_TYPE_PRATICIEN0_FK` (`TYP_CODE`);

--
-- Index pour la table `prescrire`
--
ALTER TABLE `prescrire`
  ADD PRIMARY KEY (`MED_DEPOTLEGAL`,`TIN_Code`,`DOS_CODE`),
  ADD KEY `PRESCRIRE_TYPE_INDIVIDU1_FK` (`TIN_Code`),
  ADD KEY `PRESCRIRE_DOSAGE2_FK` (`DOS_CODE`);

--
-- Index pour la table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`PRE_CODE`);

--
-- Index pour la table `rapport_visite`
--
ALTER TABLE `rapport_visite`
  ADD PRIMARY KEY (`COL_MATRICULE`,`rap_num`),
  ADD KEY `RAPPORT_VISITE_PRATICIEN1_FK` (`PRA_NUM`),
  ADD KEY `RAPPORT_VISITE_MEDICAMENT_1_FK` (`MED_DEPOTLEGAL`),
  ADD KEY `RAPPORT_VISITE_MEDICAMENT_2_FK` (`MED_DEPOTLEGAL_2`),
  ADD KEY `RAPPORT_VISITE_Visite_Motif3_FK` (`ID_motif`),
  ADD KEY `RAPPORT_VISITE_PRATICIEN4_FK` (`PRA_NUM_PRATICIEN`);

--
-- Index pour la table `realiser`
--
ALTER TABLE `realiser`
  ADD PRIMARY KEY (`AC_NUM`,`COL_MATRICULE`),
  ADD KEY `REALISER_Collaborateur1_FK` (`COL_MATRICULE`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`REG_CODE`),
  ADD KEY `REGION_SECTEUR0_FK` (`SEC_CODE`);

--
-- Index pour la table `secteur`
--
ALTER TABLE `secteur`
  ADD PRIMARY KEY (`SEC_CODE`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`SPE_CODE`);

--
-- Index pour la table `travailler`
--
ALTER TABLE `travailler`
  ADD PRIMARY KEY (`REG_CODE`,`COL_MATRICULE`,`JJMMAA`),
  ADD KEY `TRAVAILLER_Collaborateur1_FK` (`COL_MATRICULE`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`ID_Type`);

--
-- Index pour la table `type_frais`
--
ALTER TABLE `type_frais`
  ADD PRIMARY KEY (`TF_CODE`);

--
-- Index pour la table `type_individu`
--
ALTER TABLE `type_individu`
  ADD PRIMARY KEY (`TIN_Code`);

--
-- Index pour la table `type_praticien`
--
ALTER TABLE `type_praticien`
  ADD PRIMARY KEY (`TYP_CODE`);

--
-- Index pour la table `visite_motif`
--
ALTER TABLE `visite_motif`
  ADD PRIMARY KEY (`ID_motif`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `IdCompte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `ID_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `visite_motif`
--
ALTER TABLE `visite_motif`
  MODIFY `ID_motif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  ADD CONSTRAINT `Collaborateur_Compte1_FK` FOREIGN KEY (`IdCompte`) REFERENCES `compte` (`IdCompte`),
  ADD CONSTRAINT `Collaborateur_SECTEUR0_FK` FOREIGN KEY (`SEC_CODE`) REFERENCES `secteur` (`SEC_CODE`);

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `Compte_Collaborateur0_FK` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `collaborateur` (`COL_MATRICULE`),
  ADD CONSTRAINT `Compte_Type1_FK` FOREIGN KEY (`ID_Type`) REFERENCES `type` (`ID_Type`);

--
-- Contraintes pour la table `constituer`
--
ALTER TABLE `constituer`
  ADD CONSTRAINT `CONSTITUER_COMPOSANT0_FK` FOREIGN KEY (`CMP_CODE`) REFERENCES `composant` (`CMP_CODE`),
  ADD CONSTRAINT `CONSTITUER_MEDICAMENT1_FK` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`);

--
-- Contraintes pour la table `fiche_frais`
--
ALTER TABLE `fiche_frais`
  ADD CONSTRAINT `FICHE_FRAIS_Collaborateur0_FK` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `collaborateur` (`COL_MATRICULE`);

--
-- Contraintes pour la table `formuler`
--
ALTER TABLE `formuler`
  ADD CONSTRAINT `FORMULER_MEDICAMENT1_FK` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `FORMULER_PRESENTATION0_FK` FOREIGN KEY (`PRE_CODE`) REFERENCES `presentation` (`PRE_CODE`);

--
-- Contraintes pour la table `inclure`
--
ALTER TABLE `inclure`
  ADD CONSTRAINT `INCLURE_FICHE_FRAIS0_FK` FOREIGN KEY (`COL_MATRICULE`,`FF_Mois`) REFERENCES `fiche_frais` (`COL_MATRICULE`, `FF_Mois`),
  ADD CONSTRAINT `INCLURE_TYPE_FRAIS1_FK` FOREIGN KEY (`TF_CODE`) REFERENCES `type_frais` (`TF_CODE`);

--
-- Contraintes pour la table `interagir`
--
ALTER TABLE `interagir`
  ADD CONSTRAINT `INTERAGIR_MEDICAMENT0_FK` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `INTERAGIR_MEDICAMENT1_FK` FOREIGN KEY (`MED_DEPOTLEGAL_MEDICAMENT`) REFERENCES `medicament` (`MED_DEPOTLEGAL`);

--
-- Contraintes pour la table `inviter`
--
ALTER TABLE `inviter`
  ADD CONSTRAINT `INVITER_ACTVITE_COMPL1_FK` FOREIGN KEY (`AC_NUM`) REFERENCES `actvite_compl` (`AC_NUM`),
  ADD CONSTRAINT `INVITER_PRATICIEN0_FK` FOREIGN KEY (`PRA_NUM`) REFERENCES `praticien` (`PRA_NUM`);

--
-- Contraintes pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD CONSTRAINT `MEDICAMENT_FAMILLE0_FK` FOREIGN KEY (`FAM_CODE`) REFERENCES `famille` (`FAM_CODE`);

--
-- Contraintes pour la table `offrir`
--
ALTER TABLE `offrir`
  ADD CONSTRAINT `OFFRIR_MEDICAMENT0_FK` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `OFFRIR_RAPPORT_VISITE1_FK` FOREIGN KEY (`PRA_NUM`,`rap_num`) REFERENCES `rapport_visite` (`COL_MATRICULE`, `rap_num`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `POSSEDER_PRATICIEN1_FK` FOREIGN KEY (`PRA_NUM`) REFERENCES `praticien` (`PRA_NUM`),
  ADD CONSTRAINT `POSSEDER_SPECIALITE0_FK` FOREIGN KEY (`SPE_CODE`) REFERENCES `specialite` (`SPE_CODE`);

--
-- Contraintes pour la table `praticien`
--
ALTER TABLE `praticien`
  ADD CONSTRAINT `PRATICIEN_TYPE_PRATICIEN0_FK` FOREIGN KEY (`TYP_CODE`) REFERENCES `type_praticien` (`TYP_CODE`);

--
-- Contraintes pour la table `prescrire`
--
ALTER TABLE `prescrire`
  ADD CONSTRAINT `PRESCRIRE_DOSAGE2_FK` FOREIGN KEY (`DOS_CODE`) REFERENCES `dosage` (`DOS_CODE`),
  ADD CONSTRAINT `PRESCRIRE_MEDICAMENT0_FK` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `PRESCRIRE_TYPE_INDIVIDU1_FK` FOREIGN KEY (`TIN_Code`) REFERENCES `type_individu` (`TIN_Code`);

--
-- Contraintes pour la table `rapport_visite`
--
ALTER TABLE `rapport_visite`
  ADD CONSTRAINT `RAPPORT_VISITE_Collaborateur0_FK` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `collaborateur` (`COL_MATRICULE`),
  ADD CONSTRAINT `RAPPORT_VISITE_MEDICAMENT_1_FK` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `RAPPORT_VISITE_MEDICAMENT_2_FK` FOREIGN KEY (`MED_DEPOTLEGAL_2`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `RAPPORT_VISITE_PRATICIEN1_FK` FOREIGN KEY (`PRA_NUM`) REFERENCES `praticien` (`PRA_NUM`),
  ADD CONSTRAINT `RAPPORT_VISITE_PRATICIEN4_FK` FOREIGN KEY (`PRA_NUM_PRATICIEN`) REFERENCES `praticien` (`PRA_NUM`),
  ADD CONSTRAINT `RAPPORT_VISITE_Visite_Motif3_FK` FOREIGN KEY (`ID_motif`) REFERENCES `visite_motif` (`ID_motif`);

--
-- Contraintes pour la table `realiser`
--
ALTER TABLE `realiser`
  ADD CONSTRAINT `REALISER_Collaborateur1_FK` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `collaborateur` (`COL_MATRICULE`);

--
-- Contraintes pour la table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `REGION_SECTEUR0_FK` FOREIGN KEY (`SEC_CODE`) REFERENCES `secteur` (`SEC_CODE`);

--
-- Contraintes pour la table `travailler`
--
ALTER TABLE `travailler`
  ADD CONSTRAINT `TRAVAILLER_Collaborateur1_FK` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `collaborateur` (`COL_MATRICULE`),
  ADD CONSTRAINT `TRAVAILLER_REGION0_FK` FOREIGN KEY (`REG_CODE`) REFERENCES `region` (`REG_CODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
