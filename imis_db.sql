-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2016 at 06:21 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE IF NOT EXISTS `apps_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=247 ;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Cook Islands'),
(51, 'Costa Rica'),
(52, 'Croatia (Hrvatska)'),
(53, 'Cuba'),
(54, 'Cyprus'),
(55, 'Czech Republic'),
(56, 'Denmark'),
(57, 'Djibouti'),
(58, 'Dominica'),
(59, 'Dominican Republic'),
(60, 'East Timor'),
(61, 'Ecuador'),
(62, 'Egypt'),
(63, 'El Salvador'),
(64, 'Equatorial Guinea'),
(65, 'Eritrea'),
(66, 'Estonia'),
(67, 'Ethiopia'),
(68, 'Falkland Islands (Malvinas)'),
(69, 'Faroe Islands'),
(70, 'Fiji'),
(71, 'Finland'),
(72, 'France'),
(73, 'France, Metropolitan'),
(74, 'French Guiana'),
(75, 'French Polynesia'),
(76, 'French Southern Territories'),
(77, 'Gabon'),
(78, 'Gambia'),
(79, 'Georgia'),
(80, 'Germany'),
(81, 'Ghana'),
(82, 'Gibraltar'),
(83, 'Guernsey'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-Bissau'),
(92, 'Guyana'),
(93, 'Haiti'),
(94, 'Heard and Mc Donald Islands'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Isle of Man'),
(101, 'Indonesia'),
(102, 'Iran (Islamic Republic of)'),
(103, 'Iraq'),
(104, 'Ireland'),
(105, 'Israel'),
(106, 'Italy'),
(107, 'Ivory Coast'),
(108, 'Jersey'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jordan'),
(112, 'Kazakhstan'),
(113, 'Kenya'),
(114, 'Kiribati'),
(115, 'Korea, Democratic People''s Republic of'),
(116, 'Korea, Republic of'),
(117, 'Kosovo'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People''s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macau'),
(130, 'Macedonia'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestine'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Kitts and Nevis'),
(185, 'Saint Lucia'),
(186, 'Saint Vincent and the Grenadines'),
(187, 'Samoa'),
(188, 'San Marino'),
(189, 'Sao Tome and Principe'),
(190, 'Saudi Arabia'),
(191, 'Senegal'),
(192, 'Serbia'),
(193, 'Seychelles'),
(194, 'Sierra Leone'),
(195, 'Singapore'),
(196, 'Slovakia'),
(197, 'Slovenia'),
(198, 'Solomon Islands'),
(199, 'Somalia'),
(200, 'South Africa'),
(201, 'South Georgia South Sandwich Islands'),
(202, 'Spain'),
(203, 'Sri Lanka'),
(204, 'St. Helena'),
(205, 'St. Pierre and Miquelon'),
(206, 'Sudan'),
(207, 'Suriname'),
(208, 'Svalbard and Jan Mayen Islands'),
(209, 'Swaziland'),
(210, 'Sweden'),
(211, 'Switzerland'),
(212, 'Syrian Arab Republic'),
(213, 'Taiwan'),
(214, 'Tajikistan'),
(215, 'Tanzania, United Republic of'),
(216, 'Thailand'),
(217, 'Togo'),
(218, 'Tokelau'),
(219, 'Tonga'),
(220, 'Trinidad and Tobago'),
(221, 'Tunisia'),
(222, 'Turkey'),
(223, 'Turkmenistan'),
(224, 'Turks and Caicos Islands'),
(225, 'Tuvalu'),
(226, 'Uganda'),
(227, 'Ukraine'),
(228, 'United Arab Emirates'),
(229, 'United Kingdom'),
(230, 'United States'),
(231, 'United States minor outlying islands'),
(232, 'Uruguay'),
(233, 'Uzbekistan'),
(234, 'Vanuatu'),
(235, 'Vatican City State'),
(236, 'Venezuela'),
(237, 'Vietnam'),
(238, 'Virgin Islands (British)'),
(239, 'Virgin Islands (U.S.)'),
(240, 'Wallis and Futuna Islands'),
(241, 'Western Sahara'),
(242, 'Yemen'),
(243, 'Yugoslavia'),
(244, 'Zaire'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE IF NOT EXISTS `company_information` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `country` text NOT NULL,
  `p_fname` text NOT NULL,
  `p_lname` text NOT NULL,
  `p_position` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `c_website` varchar(255) NOT NULL,
  `notes` varchar(1000) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `company_information`
--

INSERT INTO `company_information` (`company_id`, `company_name`, `address`, `city`, `postal_code`, `country`, `p_fname`, `p_lname`, `p_position`, `telephone`, `email_id`, `c_website`, `notes`) VALUES
(2, 'Google', '333 Union Street', 'Windsor', 'N9b 2B6', 'Canada', 'Ketan', 'Sharma', 'n/a', '5199966999', 'bhardwaj_ketan1@ymail.com', 'imketansharma.me', 'n/a'),
(6, 'Microsoft', '333 Union Street', 'Windsor', 'N9b 2B6', 'Canada', 'Ketan', 'Sharma', 'n/a', '5199966999', 'bhardwaj_ketan@ymail.com', 'imketansharma.me', 'n/a');

-- --------------------------------------------------------

--
-- Table structure for table `education_detail`
--

CREATE TABLE IF NOT EXISTS `education_detail` (
  `education_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `education_name` varchar(20) NOT NULL,
  `major` varchar(50) NOT NULL,
  `gpa` float NOT NULL,
  `institution_name` varchar(50) NOT NULL,
  `country_name` varchar(50) NOT NULL,
  `certifications` varchar(50) NOT NULL,
  `certifications_body` varchar(100) NOT NULL,
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `education_detail`
--

INSERT INTO `education_detail` (`education_id`, `student_id`, `education_name`, `major`, `gpa`, `institution_name`, `country_name`, `certifications`, `certifications_body`) VALUES
(19, 104426063, 'Undergraduate', 'B Tech', 85, 'Punjab Technical University', 'India', '', ''),
(23, 104426063, 'Other', 'njkj', 99, 'hgh', 'nk', 'bkhjgfg', 'yjgh'),
(24, 104426067, 'Undergraduate', 'B Tech', 84, 'Punjab Technical University', 'India', '09/11', '06/14'),
(25, 104426069, 'Undergraduate', 'B Tech', 84, 'Punjab Technical University', 'India', '09/11', '06/14');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `job_description` varchar(1000) NOT NULL,
  `job_responsibilities` varchar(1000) NOT NULL,
  `job_requirements` varchar(1000) NOT NULL,
  `job_salary` varchar(10) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `company_id`, `job_description`, `job_responsibilities`, `job_requirements`, `job_salary`) VALUES
(3, 2, 'kjgkhzjxcn,mvxnjlcsl;kzcmxn', 'cklnjx ml;ldgisflajnkdlmv ckn', 'cvxlkvm, gdkrnsjfkdzck jhin', '4000'),
(4, 3, 'askkjbdvfk', 'knldsfdvmbdbn', 'klndjkcfbmknl', '2000'),
(5, 6, 'jhhglkljk', 'lkdkkdfv', 'l;djfkjlk;v', '500'),
(6, 3, ';hdksjkll;vfjbk', 'lnksldknklcvlblmllcn', 'dl;mcv;lb,m;nvl', '2000'),
(7, 3, 'l;sklgdg;kkbmnl', 'l;mlfmb;nmvb', 'l;mxmccb,n', '100');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_applied`
--

CREATE TABLE IF NOT EXISTS `jobs_applied` (
  `applied_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`applied_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jobs_applied`
--

INSERT INTO `jobs_applied` (`applied_id`, `job_id`, `company_id`, `student_id`) VALUES
(1, 5, 6, 104426063),
(2, 4, 3, 104426063),
(3, 4, 3, 104426063),
(4, 5, 6, 104426063);

-- --------------------------------------------------------

--
-- Table structure for table `job_status`
--

CREATE TABLE IF NOT EXISTS `job_status` (
  `hiring` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  PRIMARY KEY (`hiring`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `job_status`
--

INSERT INTO `job_status` (`hiring`, `company_id`, `student_id`, `job_id`) VALUES
(1, 2, 104426063, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE IF NOT EXISTS `personal_information` (
  `term` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `student_id` int(9) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `middle_name` varchar(15) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `status` text NOT NULL,
  `gender` text NOT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`term`, `year`, `student_id`, `first_name`, `middle_name`, `last_name`, `email_id`, `telephone`, `status`, `gender`, `country`) VALUES
('Fall', 2015, 104426063, 'Ketan', '', 'Sharma', 'bhardwaj_ketan11@ymail.com', '5199966998', 'International', 'Male', 'India'),
('Fall', 2015, 104426064, 'Ketan', '', 'Sharma', 'bhardwaj_ketan@ymaill.com', '5199966999', 'International', 'Male', ''),
('Winter', 2015, 104426065, 'Ketan', '', 'Sharma', 'sharm13z@uwindsor.ca', '5199966999', 'Permanent Resident/Citizen', 'Male', ''),
('Fall', 2015, 104426066, 'Ketan', '', 'Sharma', 'sharm14z@uwindsor.ca', '5199966999', 'International', 'Male', ''),
('Fall', 2015, 104426069, 'Ketan', '', 'Sharma', 'bhardwaj_ketan11@ymail.com', '5199966999', 'International', 'Male', '');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `web_develop` text NOT NULL,
  `mob_develop` text NOT NULL,
  `sys_develop` text NOT NULL,
  `tech_sup` text NOT NULL,
  `networking` text NOT NULL,
  `analysis` text NOT NULL,
  `testing` text NOT NULL,
  `security` text NOT NULL,
  `data_manage` text NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE IF NOT EXISTS `student_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`username`, `password`) VALUES
('104426063', 'password'),
('104426069', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `student_skills`
--

CREATE TABLE IF NOT EXISTS `student_skills` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `ASP.NET` varchar(50) NOT NULL,
  `C` varchar(50) NOT NULL,
  `C++` varchar(50) NOT NULL,
  `C#` varchar(50) NOT NULL,
  `Flex` varchar(50) NOT NULL,
  `Java` varchar(50) NOT NULL,
  `JavaScript` varchar(50) NOT NULL,
  `LIPS` varchar(50) NOT NULL,
  `Matlab` varchar(50) NOT NULL,
  `MySQL` varchar(50) NOT NULL,
  `Objective C` varchar(50) NOT NULL,
  `Pascal` varchar(50) NOT NULL,
  `Perl` varchar(50) NOT NULL,
  `PHP` varchar(50) NOT NULL,
  `Prolog` varchar(50) NOT NULL,
  `Python` varchar(50) NOT NULL,
  `R` varchar(50) NOT NULL,
  `Ruby` varchar(50) NOT NULL,
  `SQL-Oracle` varchar(50) NOT NULL,
  `TCL` varchar(50) NOT NULL,
  `T-SQL` varchar(50) NOT NULL,
  `VB.NET` varchar(50) NOT NULL,
  `Concrete5` varchar(50) NOT NULL,
  `DotNetNuke` varchar(50) NOT NULL,
  `Drupal` varchar(50) NOT NULL,
  `Joomla` varchar(50) NOT NULL,
  `Wordpress` varchar(50) NOT NULL,
  `Android` varchar(50) NOT NULL,
  `Chrome OS` varchar(50) NOT NULL,
  `IOS` varchar(50) NOT NULL,
  `Linux` varchar(50) NOT NULL,
  `MAC OS` varchar(50) NOT NULL,
  `Unix` varchar(50) NOT NULL,
  `Windows` varchar(50) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_skills`
--

INSERT INTO `student_skills` (`skill_id`, `student_id`, `ASP.NET`, `C`, `C++`, `C#`, `Flex`, `Java`, `JavaScript`, `LIPS`, `Matlab`, `MySQL`, `Objective C`, `Pascal`, `Perl`, `PHP`, `Prolog`, `Python`, `R`, `Ruby`, `SQL-Oracle`, `TCL`, `T-SQL`, `VB.NET`, `Concrete5`, `DotNetNuke`, `Drupal`, `Joomla`, `Wordpress`, `Android`, `Chrome OS`, `IOS`, `Linux`, `MAC OS`, `Unix`, `Windows`) VALUES
(1, 104426063, 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent'),
(2, 104426064, 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent'),
(3, 104426065, 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent'),
(4, 104426069, 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent', 'Not at All competent');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE IF NOT EXISTS `work_experience` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(9) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` varchar(10) NOT NULL,
  `job_title` varchar(300) NOT NULL,
  PRIMARY KEY (`work_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`work_id`, `student_id`, `company_name`, `start_date`, `end_date`, `job_title`) VALUES
(1, 104426063, 'Google', '0000-00-00', '0000-00-00', 'Software Developer'),
(4, 104426063, 'Google', '0000-00-00', '12/12/2012', 'Software Developer'),
(6, 104426064, 'Google', '0000-00-00', '0000-00-00', 'Software Developer'),
(8, 104426063, 'Microsoft', '0000-00-00', '0000-00-00', 'Android Developer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
