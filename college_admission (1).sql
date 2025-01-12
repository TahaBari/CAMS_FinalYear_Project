-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 09:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Talha', 'admin@gmail.com', '$2y$10$vQI4xq8YepNap.b/4bQwreKhaa2CiGnKJ9rXtz/ZqhwElVQstzzaq');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Abbottabad'),
(2, 'Badin'),
(3, 'Bahawalpur'),
(4, 'Chakwal'),
(5, 'Chamaan'),
(6, 'Karachi'),
(7, 'Lahore'),
(8, 'Faislabad'),
(9, 'Multan'),
(10, 'Rawalpindi'),
(11, 'Islamabad'),
(12, 'Sukkar');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Åland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cabo Verde'),
(38, 'Cambodia'),
(39, 'Cameroon'),
(40, 'Canada'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Croatia'),
(55, 'Cuba'),
(56, 'Curaçao'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Eswatini'),
(70, 'Ethiopia'),
(71, 'Falkland Islands (Malvinas)'),
(72, 'Faroe Islands'),
(73, 'Fiji'),
(74, 'Finland'),
(75, 'France'),
(76, 'French Guiana'),
(77, 'French Polynesia'),
(78, 'French Southern Territories'),
(79, 'Gabon'),
(80, 'Gambia'),
(81, 'Georgia'),
(82, 'Germany'),
(83, 'Ghana'),
(84, 'Gibraltar'),
(85, 'Greece'),
(86, 'Greenland'),
(87, 'Grenada'),
(88, 'Guadeloupe'),
(89, 'Guam'),
(90, 'Guatemala'),
(91, 'Guernsey'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard Island and McDonald Islands'),
(97, 'Holy See'),
(98, 'Honduras'),
(99, 'Hong Kong'),
(100, 'Hungary'),
(101, 'Iceland'),
(102, 'India'),
(103, 'Indonesia'),
(104, 'Iran'),
(105, 'Iraq'),
(106, 'Ireland'),
(107, 'Isle of Man'),
(108, 'Israel'),
(109, 'Italy'),
(110, 'Jamaica'),
(111, 'Japan'),
(112, 'Jersey'),
(113, 'Jordan'),
(114, 'Kazakhstan'),
(115, 'Kenya'),
(116, 'Kiribati'),
(117, 'Korea (North)'),
(118, 'Korea (South)'),
(119, 'Kuwait'),
(120, 'Kyrgyzstan'),
(121, 'Lao People\'s Democratic Republic'),
(122, 'Latvia'),
(123, 'Lebanon'),
(124, 'Lesotho'),
(125, 'Liberia'),
(126, 'Libya'),
(127, 'Liechtenstein'),
(128, 'Lithuania'),
(129, 'Luxembourg'),
(130, 'Macao'),
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
(143, 'Micronesia'),
(144, 'Moldova'),
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
(156, 'New Caledonia'),
(157, 'New Zealand'),
(158, 'Nicaragua'),
(159, 'Niger'),
(160, 'Nigeria'),
(161, 'Niue'),
(162, 'Norfolk Island'),
(163, 'North Macedonia'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Panama'),
(170, 'Papua New Guinea'),
(171, 'Paraguay'),
(172, 'Peru'),
(173, 'Philippines'),
(174, 'Pitcairn'),
(175, 'Poland'),
(176, 'Portugal'),
(177, 'Puerto Rico'),
(178, 'Qatar'),
(179, 'Romania'),
(180, 'Russian Federation'),
(181, 'Rwanda'),
(182, 'Réunion'),
(183, 'Saint Barthélemy'),
(184, 'Saint Helena'),
(185, 'Saint Kitts and Nevis'),
(186, 'Saint Lucia'),
(187, 'Saint Martin (French)'),
(188, 'Saint Pierre and Miquelon'),
(189, 'Saint Vincent and the Grenadines'),
(190, 'Samoa'),
(191, 'San Marino'),
(192, 'Sao Tome and Principe'),
(193, 'Saudi Arabia'),
(194, 'Senegal'),
(195, 'Serbia'),
(196, 'Seychelles'),
(197, 'Sierra Leone'),
(198, 'Singapore'),
(199, 'Sint Maarten (Dutch)'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'South Sudan'),
(207, 'Spain'),
(208, 'Sri Lanka'),
(209, 'Sudan'),
(210, 'Suriname'),
(211, 'Svalbard and Jan Mayen'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan'),
(216, 'Tajikistan'),
(217, 'Tanzania'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Tuvalu'),
(228, 'Uganda'),
(229, 'Ukraine'),
(230, 'United Arab Emirates'),
(231, 'United Kingdom'),
(232, 'United States of America'),
(233, 'Uruguay'),
(234, 'Uzbekistan'),
(235, 'Vanuatu'),
(236, 'Venezuela'),
(237, 'Viet Nam'),
(238, 'Western Sahara'),
(239, 'Yemen'),
(240, 'Zambia'),
(241, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `institute_name` varchar(100) NOT NULL,
  `passing_year` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `obtained_marks` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `average` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `student_id`, `qualification`, `institute_name`, `passing_year`, `grade`, `obtained_marks`, `total_marks`, `average`) VALUES
(109, 29, 'Matric', 'TLAPA School', 2015, 'A', 501, 550, 91.0909),
(110, 29, 'Intermediate', 'TLAPA School', 2019, 'A', 490, 550, 89.0909),
(111, 30, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(112, 30, 'Intermediate', 'TLAPA School', 2019, 'A', 400, 550, 72.7273),
(113, 31, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(114, 31, 'Intermediate', 'TLAPA School', 2019, 'A', 410, 550, 74.5455),
(115, 32, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(116, 32, 'Intermediate', 'TLAPA School', 2019, 'A', 415, 550, 75.4545),
(117, 33, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(118, 33, 'Intermediate', 'TLAPA School', 2019, 'A', 420, 550, 76.3636),
(119, 34, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(120, 34, 'Intermediate', 'TLAPA School', 2019, 'A', 425, 550, 77.2727),
(121, 35, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(122, 35, 'Intermediate', 'TLAPA School', 2019, 'A', 430, 550, 78.1818),
(123, 36, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(124, 36, 'Intermediate', 'TLAPA School', 2019, 'A', 435, 550, 79.0909),
(125, 37, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(126, 37, 'Intermediate', 'TLAPA School', 2019, 'A', 440, 550, 80),
(127, 38, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(128, 38, 'Intermediate', 'TLAPA School', 2019, 'A', 445, 550, 80.9091),
(129, 39, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(130, 39, 'Intermediate', 'TLAPA School', 2019, 'A', 450, 550, 81.8182),
(131, 40, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(132, 40, 'Intermediate', 'TLAPA School', 2019, 'A', 455, 550, 82.7273),
(133, 41, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(134, 41, 'Intermediate', 'TLAPA School', 2019, 'A', 460, 550, 83.6364),
(135, 42, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(136, 42, 'Intermediate', 'TLAPA School', 2019, 'A', 465, 550, 84.5455),
(137, 43, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(138, 43, 'Intermediate', 'TLAPA School', 2019, 'A', 470, 550, 85.4545),
(139, 44, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(140, 44, 'Intermediate', 'TLAPA School', 2019, 'A', 475, 550, 86.3636),
(141, 45, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(142, 45, 'Intermediate', 'TLAPA School', 2019, 'A', 480, 550, 87.2727),
(143, 46, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(144, 46, 'Intermediate', 'TLAPA School', 2019, 'A', 485, 550, 88.1818),
(145, 47, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(146, 47, 'Intermediate', 'TLAPA School', 2019, 'A', 490, 550, 89.0909),
(147, 48, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(148, 48, 'Intermediate', 'TLAPA School', 2019, 'A', 495, 550, 90),
(149, 49, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(150, 49, 'Intermediate', 'TLAPA School', 2019, 'A', 500, 550, 90.9091),
(151, 50, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(152, 50, 'Intermediate', 'TLAPA School', 2019, 'A', 505, 550, 91.8182),
(153, 51, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(154, 51, 'Intermediate', 'TLAPA School', 2019, 'A', 510, 550, 92.7273),
(155, 52, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(156, 52, 'Intermediate', 'TLAPA School', 2019, 'A', 515, 550, 93.6364),
(157, 53, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(158, 53, 'Intermediate', 'TLAPA School', 2019, 'A', 520, 550, 94.5455),
(159, 54, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(160, 54, 'Intermediate', 'TLAPA School', 2019, 'A', 525, 550, 95.4545),
(161, 55, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(162, 55, 'Intermediate', 'TLAPA School', 2019, 'A', 525, 550, 95.4545),
(163, 56, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(164, 56, 'Intermediate', 'TLAPA School', 2019, 'A', 525, 550, 95.4545),
(165, 57, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(166, 57, 'Intermediate', 'TLAPA School', 2019, 'A', 525, 550, 95.4545),
(167, 58, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(168, 58, 'Intermediate', 'TLAPA School', 2019, 'A', 525, 550, 95.4545),
(169, 59, 'Matric', 'TLAPA School', 2015, 'A', 400, 550, 72.7273),
(170, 59, 'Intermediate', 'TLAPA School', 2019, 'A', 525, 550, 95.4545);

-- --------------------------------------------------------

--
-- Table structure for table `merit_list`
--

CREATE TABLE `merit_list` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `registration_no` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `program` varchar(255) NOT NULL,
  `average` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_marksheets`
--

CREATE TABLE `student_marksheets` (
  `marksheet_id` int(11) NOT NULL,
  `education_id` int(11) NOT NULL,
  `marksheet_type` enum('Matric','Intermediate') NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `marksheet_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_marksheets`
--

INSERT INTO `student_marksheets` (`marksheet_id`, `education_id`, `marksheet_type`, `student_id`, `marksheet_img`) VALUES
(105, 109, 'Matric', 29, 'uploads/Mon.jpg'),
(106, 110, 'Intermediate', 29, 'uploads/Document1.jpg'),
(107, 111, 'Matric', 30, 'uploads/Mon.jpg'),
(108, 112, 'Intermediate', 30, 'uploads/Document1.jpg'),
(109, 113, 'Matric', 31, 'uploads/Mon.jpg'),
(110, 114, 'Intermediate', 31, 'uploads/Document1.jpg'),
(111, 115, 'Matric', 32, 'uploads/Mon.jpg'),
(112, 116, 'Intermediate', 32, 'uploads/Document1.jpg'),
(113, 117, 'Matric', 33, 'uploads/Mon.jpg'),
(114, 118, 'Intermediate', 33, 'uploads/Document1.jpg'),
(115, 119, 'Matric', 34, 'uploads/Mon.jpg'),
(116, 120, 'Intermediate', 34, 'uploads/Document1.jpg'),
(117, 121, 'Matric', 35, 'uploads/Mon.jpg'),
(118, 122, 'Intermediate', 35, 'uploads/Document1.jpg'),
(119, 123, 'Matric', 36, 'uploads/Mon.jpg'),
(120, 124, 'Intermediate', 36, 'uploads/Document1.jpg'),
(121, 125, 'Matric', 37, 'uploads/Mon.jpg'),
(122, 126, 'Intermediate', 37, 'uploads/Document1.jpg'),
(123, 127, 'Matric', 38, 'uploads/Mon.jpg'),
(124, 128, 'Intermediate', 38, 'uploads/Document1.jpg'),
(125, 129, 'Matric', 39, 'uploads/Mon.jpg'),
(126, 130, 'Intermediate', 39, 'uploads/Document1.jpg'),
(127, 131, 'Matric', 40, 'uploads/Mon.jpg'),
(128, 132, 'Intermediate', 40, 'uploads/Document1.jpg'),
(129, 133, 'Matric', 41, 'uploads/Mon.jpg'),
(130, 134, 'Intermediate', 41, 'uploads/Document1.jpg'),
(131, 135, 'Matric', 42, 'uploads/Mon.jpg'),
(132, 136, 'Intermediate', 42, 'uploads/Document1.jpg'),
(133, 137, 'Matric', 43, 'uploads/Mon.jpg'),
(134, 138, 'Intermediate', 43, 'uploads/Document1.jpg'),
(135, 139, 'Matric', 44, 'uploads/Mon.jpg'),
(136, 140, 'Intermediate', 44, 'uploads/Document1.jpg'),
(137, 141, 'Matric', 45, 'uploads/Mon.jpg'),
(138, 142, 'Intermediate', 45, 'uploads/Document1.jpg'),
(139, 143, 'Matric', 46, 'uploads/Mon.jpg'),
(140, 144, 'Intermediate', 46, 'uploads/Document1.jpg'),
(141, 145, 'Matric', 47, 'uploads/Mon.jpg'),
(142, 146, 'Intermediate', 47, 'uploads/Document1.jpg'),
(143, 147, 'Matric', 48, 'uploads/Mon.jpg'),
(144, 148, 'Intermediate', 48, 'uploads/Document1.jpg'),
(145, 149, 'Matric', 49, 'uploads/Mon.jpg'),
(146, 150, 'Intermediate', 49, 'uploads/Document1.jpg'),
(147, 151, 'Matric', 50, 'uploads/Mon.jpg'),
(148, 152, 'Intermediate', 50, 'uploads/Document1.jpg'),
(149, 153, 'Matric', 51, 'uploads/Mon.jpg'),
(150, 154, 'Intermediate', 51, 'uploads/Document1.jpg'),
(151, 155, 'Matric', 52, 'uploads/Mon.jpg'),
(152, 156, 'Intermediate', 52, 'uploads/Document1.jpg'),
(153, 157, 'Matric', 53, 'uploads/Mon.jpg'),
(154, 158, 'Intermediate', 53, 'uploads/Document1.jpg'),
(155, 159, 'Matric', 54, 'uploads/Mon.jpg'),
(156, 160, 'Intermediate', 54, 'uploads/Document1.jpg'),
(157, 161, 'Matric', 55, 'uploads/pic 02.jpeg'),
(158, 162, 'Intermediate', 55, 'uploads/pic 03.jpeg'),
(159, 163, 'Matric', 56, 'uploads/pic 02.jpeg'),
(160, 164, 'Intermediate', 56, 'uploads/pic 01.jpeg'),
(161, 165, 'Matric', 57, 'uploads/pic 01.jpeg'),
(162, 166, 'Intermediate', 57, 'uploads/pic 03.jpeg'),
(163, 167, 'Matric', 58, 'uploads/pic 02.jpeg'),
(164, 168, 'Intermediate', 58, 'uploads/pic 03.jpeg'),
(165, 169, 'Matric', 59, 'uploads/pic 03.jpeg'),
(166, 170, 'Intermediate', 59, 'uploads/pic 01.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `stud_admission`
--

CREATE TABLE `stud_admission` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `registration_no` varchar(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_address` text NOT NULL,
  `residential_address` text NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `photograph` varchar(255) DEFAULT NULL,
  `remarks` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_admission`
--

INSERT INTO `stud_admission` (`id`, `student_id`, `cnic`, `registration_no`, `full_name`, `gender`, `dob`, `nationality`, `country`, `city`, `postal_address`, `residential_address`, `qualification`, `degree`, `program`, `photograph`, `remarks`, `status`) VALUES
(89, 29, '45501-9463211-2', 'BC961736349', 'Talha Bari', 'Male', '2000-03-07', 'pakistani', 'Pakistan', 'Karachi', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'BS', 'Bussiness Administration', 'uploads/677e976bbd40d_pic 03.jpeg', 'Approved!', 'approved'),
(90, 30, '45501-9463211-2', 'BC951736350', 'Test01', 'Male', '2001-10-17', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'BS', 'Computer Science', 'uploads/677e9bbd3ac25_pic 02.jpeg', 'Approved!', 'approved'),
(91, 31, '45501-9463211-2', 'BC571736350', 'Test02', 'Male', '2001-06-05', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'BS', 'Information Technology', 'uploads/677e9cc10abf9_pic 02.jpeg', 'Approved!', 'approved'),
(92, 32, '45501-9463211-2', 'BC851736350', 'Test03', 'Male', '2002-07-11', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'BS', 'Mass Communication', 'uploads/677e9cfc2681d_pic 01.jpeg', 'Approved!', 'approved'),
(93, 33, '45501-9463211-2', 'BC981736351', 'Test04', 'Male', '2001-06-07', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'BS', 'Bussiness Administration', 'uploads/677e9d3884887_pic 01.jpeg', 'Approved!', 'approved'),
(94, 34, '45501-9463211-2', 'BC201736351', 'Test05', 'Male', '2001-11-13', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'BS', 'Software Engineering', 'uploads/677e9da169b75_pic 03.jpeg', 'Approved!', 'approved'),
(95, 35, '45501-9463211-2', 'BC561736351', 'Test06', 'Male', '2000-06-14', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'B.ED', 'Computer Science', 'uploads/677e9e4c6ed9f_pic 01.jpeg', 'Approved! B.Ed', 'approved'),
(96, 36, '45501-9463211-2', 'BC151736351', 'Test07', 'Male', '2001-06-13', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'B.ED', 'Information Technology', 'uploads/677e9e8e715d1_pic 02.jpeg', 'Approved! B.Ed', 'approved'),
(97, 37, '45501-9463211-2', 'BC741736351', 'Test08', 'Male', '2001-02-06', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'B.ED', 'Software Engineering', 'uploads/677e9ed383301_pic 03.jpeg', 'Approved! B.Ed', 'approved'),
(98, 38, '45501-9463211-2', 'BC231736351', 'Test09', 'Male', '2001-07-18', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'B.ED', 'Bussiness Administration', 'uploads/677e9f1488ea2_pic 01.jpeg', 'Approved! B.Ed', 'approved'),
(99, 39, '45501-9463211-2', 'BC701736351', 'Test10', 'Male', '2001-06-12', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'B.ED', 'Economics', 'uploads/677e9f5d2db0c_pic 02.jpeg', 'Approved! B.Ed', 'approved'),
(100, 40, '45501-9463211-2', 'BC451736351', 'Test11', 'Male', '2002-01-09', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'Diploma', 'Computer Science', 'uploads/677e9feae9115_pic 01.jpeg', 'Approved! MS', 'approved'),
(101, 41, '45501-9463211-2', 'BC881736351', 'Test12', 'Male', '2001-06-21', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'Diploma', 'Mass Communication', 'uploads/677ea026490f2_pic 02.jpeg', 'Approved! MS', 'approved'),
(102, 42, '45501-9463211-2', 'BC121736351', 'Test13', 'Male', '2001-11-16', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'Diploma', 'Information Technology', 'uploads/677ea07b53a1f_pic 02.jpeg', 'Approved! MS', 'approved'),
(103, 43, '45501-9463211-2', 'BC161736351', 'Test14', 'Male', '2001-10-17', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'Diploma', 'Software Engineering', 'uploads/677ea0ba9ca51_pic 03.jpeg', 'Approved! MS', 'approved'),
(104, 44, '45501-9463211-2', 'BC931736351', 'Test15', 'Male', '2001-07-26', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'Diploma', 'Economics', 'uploads/677ea0f7808e0_pic 03.jpeg', 'Approved! MS', 'approved'),
(105, 45, '45501-9463211-2', 'BC961736352', 'Test16', 'Male', '2001-10-24', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'MS', 'Computer Science', 'uploads/677ea17a78a98_pic 03.jpeg', 'Approved! diploma', 'approved'),
(106, 46, '45501-9463211-2', 'BC301736352', 'Test17', 'Male', '2001-07-19', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'MS', 'Information Technology', 'uploads/677ea1b12cc3a_pic 01.jpeg', 'Approved! diploma', 'approved'),
(107, 47, '45501-9463211-2', 'BC531736352', 'Test18', 'Male', '2001-11-14', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'MS', 'Mass Communication', 'uploads/677ea1eb12ce9_pic 01.jpeg', 'Approved! diploma', 'approved'),
(108, 48, '45501-9463211-2', 'BC221736352', 'Test19', 'Male', '2001-02-14', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'MS', 'Bussiness Administration', 'uploads/677ea25139d99_pic 02.jpeg', 'Approved! diploma', 'approved'),
(109, 49, '45501-9463211-2', 'BC991736352', 'Test20', 'Male', '2001-06-21', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'MS', 'Software Engineering', 'uploads/677ea291509cf_pic 02.jpeg', 'Approved! diploma', 'approved'),
(110, 50, '45501-9463211-2', 'BC201736353', 'Test21', 'Male', '2002-02-14', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'B.ED', 'Computer Science', 'uploads/677ea5a495a17_pic 02.jpeg', 'Rejected!', 'approved'),
(111, 51, '45501-9463211-2', 'BC611736353', 'Test22', 'Male', '2001-06-20', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'B.ED', 'Information Technology', 'uploads/677ea5e1c3042_pic 01.jpeg', 'Rejected!', 'approved'),
(112, 52, '45501-9463211-2', 'BC211736353', 'Test23', 'Male', '2001-06-07', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'B.ED', 'Software Engineering', 'uploads/677ea61480bd3_pic 01.jpeg', 'Rejected!', 'approved'),
(113, 53, '45501-9463211-2', 'BC151736353', 'Test24', 'Male', '2001-11-14', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'MS', 'Computer Science', 'uploads/677ea64e5f003_pic 01.jpeg', 'Rejected!', 'approved'),
(114, 54, '45501-9463211-2', 'BC551736353', 'Test25', 'Male', '2001-06-06', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'MS', 'Software Engineering', 'uploads/677ea684bdf54_pic 03.jpeg', 'Rejected!', 'rejected'),
(115, 55, '45501-9463211-2', 'BC961736353', 'Test26', 'Male', '2001-07-19', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'Diploma', 'Information Technology', 'uploads/677ea7479ced5_pic 01.jpeg', 'Rejected!', 'rejected'),
(116, 56, '45501-9463211-2', 'BC651736353', 'Test27', 'Male', '2001-06-04', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'Diploma', 'Psychology', 'uploads/677ea77ba6645_pic 03.jpeg', 'correct marksheet', 'pending'),
(117, 57, '45501-9463211-2', 'BC401736353', 'Test28', 'Male', '2001-03-14', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'Diploma', 'Computer Science', 'uploads/677ea7b1a2910_pic 02.jpeg', 'Rejected!', 'rejected'),
(118, 58, '45501-9463211-2', 'BC531736353', 'Test29', 'Male', '2003-06-18', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'BS', 'Information Technology', 'uploads/677ea7f83107d_pic 01.jpeg', 'Rejected!', 'rejected'),
(119, 59, '45501-9463211-2', 'BC821736353', 'Test30', 'Male', '2001-06-12', 'pakistani', 'Pakistan', 'Lahore', '55544', 'Flat# G-401, tkdyh kuyd , kughs 1hd .', 'Intermediate', 'MS', 'Information Technology', 'uploads/677ea89aed757_pic 02.jpeg', 'Rejected!', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users_reg`
--

CREATE TABLE `users_reg` (
  `id` int(11) NOT NULL,
  `full_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_reg`
--

INSERT INTO `users_reg` (`id`, `full_name`, `email`, `password`, `date`) VALUES
(29, 'Talha Bari', 'talha@gmail.com', '$2y$10$ksxNBDkGiPChYnb98AtxwOWFOv8FURwEYkU.iXm8G2vepwlNnPFgi', '2025-01-08 15:16:48'),
(30, 'Test01', 'test01@gmail.com', '$2y$10$PstwQs7GR2nixZCT..FjBunqpuwx.GyKX2MXY0v4JP9snqvy48KxO', '2025-01-08 15:22:02'),
(31, 'Test02', 'test02@gmail.com', '$2y$10$9MHk14r1J4XTqwaR.MUGSOOTowGcpKH/Pp2SBZPuVshVXuWbu8gPS', '2025-01-08 15:22:26'),
(32, 'Test03', 'test03@gmail.com', '$2y$10$i.6R3DLZj69H6nZ5li3Gq.AB9eoTBNSobL7esfuT/86njgVX57qRu', '2025-01-08 15:23:11'),
(33, 'Test04', 'test04@gmail.com', '$2y$10$ixF31maciGxaYZqP0ix2WOUOsQCeQ3p0.wePYbpObQhEhNZdhqmHO', '2025-01-08 15:23:49'),
(34, 'Test05', 'test05@gmail.com', '$2y$10$Dk/pttOGHbP3V6RbtxHKj.s4ku4rC9NsY7fxwAd1QwjCVVju3qLii', '2025-01-08 15:24:19'),
(35, 'Test06', 'test06@gmail.com', '$2y$10$RVKVF6iEkuC9d9gI9rkf4uaMMChCdsCJYHwVoEKt9QB/lePQlo40G', '2025-01-08 15:27:09'),
(36, 'Test07', 'test07@gmail.com', '$2y$10$KoOVhmEOjbCW7j3o.L4e..BScvhzCZD.yMTKewcqcEIu/B3QClW6m', '2025-01-08 15:27:26'),
(37, 'Test08', 'test08@gmail.com', '$2y$10$qYEjysLfxwvt.5fMWkZTZuJuSktm9J3bgLHPIbojtWhZj/ghDXQJW', '2025-01-08 15:27:42'),
(38, 'Test09', 'test09@gmail.com', '$2y$10$OiuscTPvmtrI0T0k.0ASau/uP6slZMEaUof/..2ePUQTUbiPpkCyC', '2025-01-08 15:28:03'),
(39, 'Test10', 'test10@gmail.com', '$2y$10$GVkqRKRrmJgXjNHrLLDUBeNHqzkUHWT0PCRVhBWjJ5HBMB3C0AuNm', '2025-01-08 15:28:19'),
(40, 'Test11', 'test11@gmail.com', '$2y$10$SDQsWYFxz.1TLOH5h08k7uVYKBTb1c1tFsTl.CfXLV1HeqGGNJy8W', '2025-01-08 15:28:35'),
(41, 'Test12', 'test12@gmail.com', '$2y$10$mA6GGEBgC.i0SwOL4CfEh.bnYHQ6tO6Sg8GpcfNinW53OmfMcGNYK', '2025-01-08 15:28:53'),
(42, 'Test13', 'test13@gmail.com', '$2y$10$2LLHOIGD4DP/iTyB5tLLzeGChGysS/J0AlgFkzIrxBuI5bs1XffNK', '2025-01-08 15:29:08'),
(43, 'Test14', 'test14@gmail.com', '$2y$10$TXPiOgmvd88hHQ7gbmezuuAFeSaiqG69nehEIJjVVGvM06m7jpHYi', '2025-01-08 15:29:24'),
(44, 'Test15', 'test15@gmail.com', '$2y$10$Vd6biFgXSaU65mwEd/iuFu0azcAtqd4S0ikz/6rhm9k3Ed13EvTHC', '2025-01-08 15:29:40'),
(45, 'Test16', 'test16@gmail.com', '$2y$10$c4IK2tYDWiA5DxTHSKNSseL3fbgDwEmGlrEAjFrqyw1A0RCJMc85u', '2025-01-08 15:30:01'),
(46, 'Test17', 'test17@gmail.com', '$2y$10$LpXTQyHJeQPjijXFsUx2L.o5Jbi2n3nmaV09cqhB/PHK/2kWwmbl2', '2025-01-08 15:30:30'),
(47, 'Test18', 'test18@gmail.com', '$2y$10$fu/yL1x/.Ves2qapAHtj9uSCgDGVShuNS4lJz/sqnUi50hDoQVSae', '2025-01-08 15:30:46'),
(48, 'Test19', 'test19@gmail.com', '$2y$10$v/8laYSKb0/QflIcr90NOu4SkKzYI4BUjaw2styKJEeQ5AqNTEaaC', '2025-01-08 15:31:09'),
(49, 'Test20', 'test20@gmail.com', '$2y$10$fFXGOzg2vlncj/Ww9Qm7O.q2Mz9w.9r/mcKt/lEZOqZqlTNB.ekSO', '2025-01-08 15:31:25'),
(50, 'Test21', 'test21@gmail.com', '$2y$10$nUW3M/FcgeO4D88MSSwA1e.Htj8E688dMRxInTV2SdFTtSNYlKnvK', '2025-01-08 15:31:44'),
(51, 'Test22', 'test22@gmail.com', '$2y$10$f5vpEAsHSOGH4HX/XHJHt.BuAvLpjhpAcfyBPgo5tdMHzuarzRoni', '2025-01-08 15:31:59'),
(52, 'Test23', 'test23@gmail.com', '$2y$10$HTf6/NodBj7FIJFAyTDUvO4ykLDDxqvaY75ncYIdsHl34J5iyttke', '2025-01-08 15:32:12'),
(53, 'Test24', 'test24@gmail.com', '$2y$10$BaFmC1t0hHKXuyVff2KOJeJiC86O/CvxG3MwXvlLAX9fY8R/OppxW', '2025-01-08 15:32:40'),
(54, 'Test25', 'test25@gmail.com', '$2y$10$FDZD4QBN753Bje4mAb7as.363WJsMc7GzPA9CedsTOKlg5/9MnInS', '2025-01-08 15:32:55'),
(55, 'Test26', 'test26@gmail.com', '$2y$10$B0Gbq3x9VpWba8ky626Fi.W5cMgUAEJNY3sBlyQjFX0xEyM33Ifkq', '2025-01-08 15:33:10'),
(56, 'Test27', 'test27@gmail.com', '$2y$10$fdXy5l4xY5EF0hQ1Iac5DOZizwzlnkS8ZdUMyJiMxvkfD/naEVyGO', '2025-01-08 15:33:23'),
(57, 'Test28', 'test28@gmail.com', '$2y$10$SznhvgK9NuqtOB8w2UgHLev8COWQjZam.IVOF2zkgFDK7DH4NEdQK', '2025-01-08 15:33:36'),
(58, 'Test29', 'test29@gmail.com', '$2y$10$GX3/N5sqwaeeTOOAm3Q5cu3ox73s9qwa4wh4vM4vdfHiuDw83aHoq', '2025-01-08 15:33:51'),
(59, 'Test30', 'test30@gmail.com', '$2y$10$M.kQebTbRLZJFK/8tRvdDO0Xv33iCURRkpogUbERQE54MQL50tYT6', '2025-01-08 16:30:11'),
(60, 'Test31', 'test31@gmail.com', '$2y$10$bbUCb6sC//LZkIKVLatqUOtQFjI5U4/.3bsShVFEOXvW0dIrN07Q.', '2025-01-08 16:30:40'),
(61, 'Test32', 'test32@gmail.com', '$2y$10$2z0tkaM4ydWGslRss0Pg7.io0XrRC6/edxngjvSvcP2Q56056dXQ6', '2025-01-08 16:30:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `merit_list`
--
ALTER TABLE `merit_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_marksheets`
--
ALTER TABLE `student_marksheets`
  ADD PRIMARY KEY (`marksheet_id`);

--
-- Indexes for table `stud_admission`
--
ALTER TABLE `stud_admission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `users_reg`
--
ALTER TABLE `users_reg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `merit_list`
--
ALTER TABLE `merit_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `student_marksheets`
--
ALTER TABLE `student_marksheets`
  MODIFY `marksheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `stud_admission`
--
ALTER TABLE `stud_admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `users_reg`
--
ALTER TABLE `users_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users_reg` (`id`);

--
-- Constraints for table `merit_list`
--
ALTER TABLE `merit_list`
  ADD CONSTRAINT `merit_list_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `stud_admission` (`student_id`);

--
-- Constraints for table `stud_admission`
--
ALTER TABLE `stud_admission`
  ADD CONSTRAINT `stud_admission_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users_reg` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
