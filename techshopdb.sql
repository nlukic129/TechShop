-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 10:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `Address_ID` int(255) NOT NULL,
  `Address_City` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address_Street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address_Number` int(255) NOT NULL,
  `Zip_Code` int(100) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Country_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`Address_ID`, `Address_City`, `Address_Street`, `Address_Number`, `Zip_Code`, `User_ID`, `Country_ID`) VALUES
(6, 'Cacak', 'Nemanjina', 33, 32000, 42, 199),
(7, 'Adawd', 'Asadwa', 55, 55555, 44, 15),
(8, 'Adawd', 'Asadwa', 55, 55555, 45, 15),
(9, 'Aasdaw', 'Asadwa', 55, 55555, 46, 16),
(10, 'Aasdaw', 'Asadwa', 55, 55555, 47, 16),
(11, 'Aasdaw', 'Asadwa', 55, 55555, 48, 16),
(12, 'Fasdaw', 'Asdawa', 55, 55555, 49, 13),
(13, 'Belgrade', 'Hadzi Ruvimova', 14, 11000, 50, 199),
(15, 'Belgrade', 'Hadzi Ruvimova', 14, 11000, 51, 199),
(16, 'Osecina', 'Brace Nedic', 100, 14253, 53, 199),
(17, 'Asddaw', 'Saasdw', 55, 11000, 55, 16),
(18, 'Asddaw', 'Saasdw', 55, 11000, 56, 16),
(19, 'Belgrade', 'Hadzi Ruvimova', 14, 11000, 52, 199);

-- --------------------------------------------------------

--
-- Table structure for table `blocked_users`
--

CREATE TABLE `blocked_users` (
  `User_ID` int(255) NOT NULL,
  `User_Username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Block_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Block_Reason` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocked_users`
--

INSERT INTO `blocked_users` (`User_ID`, `User_Username`, `Block_Date`, `Block_Reason`) VALUES
(37, 'marko123', '2022-02-21 15:51:40', 'sssadas'),
(38, 'nikola123', '2022-02-21 15:51:40', 'asdasdas'),
(44, 'mic1a123', '2022-02-21 21:41:48', 'asdasd'),
(47, 't11es1a123', '2022-02-21 21:48:59', 'asdasd'),
(45, 'mi1c1a123', '2022-02-21 21:52:47', 'asdasd'),
(42, 'comele', '2022-02-21 21:55:04', 'aaa'),
(48, 't11e2s1a123', '2022-02-21 21:55:29', 'aaa'),
(49, 'te13sa123', '2022-02-21 22:05:06', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `Brand_ID` int(50) NOT NULL,
  `Brand_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Brand_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`Brand_ID`, `Brand_Name`, `Brand_Date`) VALUES
(2, 'Intel', '2022-02-25 18:13:37'),
(3, 'AMD', '2022-02-25 18:13:41'),
(4, 'Nvidia', '2022-02-25 18:14:02'),
(5, 'MSI', '2022-02-25 18:14:45'),
(6, 'Gigabyte', '2022-02-25 18:14:56'),
(7, 'Asus', '2022-02-25 18:15:12'),
(8, 'ASRock', '2022-02-25 18:15:24'),
(9, 'Cooler Master', '2022-02-25 18:17:54'),
(10, 'Corsair', '2022-02-25 18:18:05'),
(11, 'be quiet', '2022-02-25 18:18:23'),
(12, 'Kingston', '2022-02-26 11:53:17'),
(13, 'Samsung', '2022-02-26 11:53:26'),
(14, 'HyperX', '2022-02-26 11:55:19'),
(15, 'LC Power', '2022-02-26 15:12:55'),
(16, 'Seagate', '2022-02-26 15:20:31'),
(17, 'AData', '2022-02-26 15:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_ID` int(50) NOT NULL,
  `Category_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Category_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_ID`, `Category_Name`, `Category_Date`) VALUES
(9, 'Processor CPU', '2022-02-25 18:05:23'),
(10, 'Motherboard ', '2022-02-25 18:09:59'),
(11, 'Graphics card GPU', '2022-02-25 18:10:59'),
(12, 'Power supply', '2022-02-25 18:12:19'),
(13, 'Memory HDD SSD', '2022-02-25 18:12:47'),
(14, 'RAM', '2022-02-26 11:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `Country_ID` int(11) NOT NULL,
  `phone_code` int(5) NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`Country_ID`, `phone_code`, `country_code`, `country_name`) VALUES
(1, 93, 'AF', 'Afghanistan'),
(2, 358, 'AX', 'Aland Islands'),
(3, 355, 'AL', 'Albania'),
(4, 213, 'DZ', 'Algeria'),
(5, 1684, 'AS', 'American Samoa'),
(6, 376, 'AD', 'Andorra'),
(7, 244, 'AO', 'Angola'),
(8, 1264, 'AI', 'Anguilla'),
(9, 672, 'AQ', 'Antarctica'),
(10, 1268, 'AG', 'Antigua and Barbuda'),
(11, 54, 'AR', 'Argentina'),
(12, 374, 'AM', 'Armenia'),
(13, 297, 'AW', 'Aruba'),
(14, 61, 'AU', 'Australia'),
(15, 43, 'AT', 'Austria'),
(16, 994, 'AZ', 'Azerbaijan'),
(17, 1242, 'BS', 'Bahamas'),
(18, 973, 'BH', 'Bahrain'),
(19, 880, 'BD', 'Bangladesh'),
(20, 1246, 'BB', 'Barbados'),
(21, 375, 'BY', 'Belarus'),
(22, 32, 'BE', 'Belgium'),
(23, 501, 'BZ', 'Belize'),
(24, 229, 'BJ', 'Benin'),
(25, 1441, 'BM', 'Bermuda'),
(26, 975, 'BT', 'Bhutan'),
(27, 591, 'BO', 'Bolivia'),
(28, 599, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 387, 'BA', 'Bosnia and Herzegovina'),
(30, 267, 'BW', 'Botswana'),
(31, 55, 'BV', 'Bouvet Island'),
(32, 55, 'BR', 'Brazil'),
(33, 246, 'IO', 'British Indian Ocean Territory'),
(34, 673, 'BN', 'Brunei Darussalam'),
(35, 359, 'BG', 'Bulgaria'),
(36, 226, 'BF', 'Burkina Faso'),
(37, 257, 'BI', 'Burundi'),
(38, 855, 'KH', 'Cambodia'),
(39, 237, 'CM', 'Cameroon'),
(40, 1, 'CA', 'Canada'),
(41, 238, 'CV', 'Cape Verde'),
(42, 1345, 'KY', 'Cayman Islands'),
(43, 236, 'CF', 'Central African Republic'),
(44, 235, 'TD', 'Chad'),
(45, 56, 'CL', 'Chile'),
(46, 86, 'CN', 'China'),
(47, 61, 'CX', 'Christmas Island'),
(48, 672, 'CC', 'Cocos (Keeling) Islands'),
(49, 57, 'CO', 'Colombia'),
(50, 269, 'KM', 'Comoros'),
(51, 242, 'CG', 'Congo'),
(52, 242, 'CD', 'Congo, Democratic Republic of the Congo'),
(53, 682, 'CK', 'Cook Islands'),
(54, 506, 'CR', 'Costa Rica'),
(55, 225, 'CI', 'Cote D\'Ivoire'),
(56, 385, 'HR', 'Croatia'),
(57, 53, 'CU', 'Cuba'),
(58, 599, 'CW', 'Curacao'),
(59, 357, 'CY', 'Cyprus'),
(60, 420, 'CZ', 'Czech Republic'),
(61, 45, 'DK', 'Denmark'),
(62, 253, 'DJ', 'Djibouti'),
(63, 1767, 'DM', 'Dominica'),
(64, 1809, 'DO', 'Dominican Republic'),
(65, 593, 'EC', 'Ecuador'),
(66, 20, 'EG', 'Egypt'),
(67, 503, 'SV', 'El Salvador'),
(68, 240, 'GQ', 'Equatorial Guinea'),
(69, 291, 'ER', 'Eritrea'),
(70, 372, 'EE', 'Estonia'),
(71, 251, 'ET', 'Ethiopia'),
(72, 500, 'FK', 'Falkland Islands (Malvinas)'),
(73, 298, 'FO', 'Faroe Islands'),
(74, 679, 'FJ', 'Fiji'),
(75, 358, 'FI', 'Finland'),
(76, 33, 'FR', 'France'),
(77, 594, 'GF', 'French Guiana'),
(78, 689, 'PF', 'French Polynesia'),
(79, 262, 'TF', 'French Southern Territories'),
(80, 241, 'GA', 'Gabon'),
(81, 220, 'GM', 'Gambia'),
(82, 995, 'GE', 'Georgia'),
(83, 49, 'DE', 'Germany'),
(84, 233, 'GH', 'Ghana'),
(85, 350, 'GI', 'Gibraltar'),
(86, 30, 'GR', 'Greece'),
(87, 299, 'GL', 'Greenland'),
(88, 1473, 'GD', 'Grenada'),
(89, 590, 'GP', 'Guadeloupe'),
(90, 1671, 'GU', 'Guam'),
(91, 502, 'GT', 'Guatemala'),
(92, 44, 'GG', 'Guernsey'),
(93, 224, 'GN', 'Guinea'),
(94, 245, 'GW', 'Guinea-Bissau'),
(95, 592, 'GY', 'Guyana'),
(96, 509, 'HT', 'Haiti'),
(97, 0, 'HM', 'Heard Island and Mcdonald Islands'),
(98, 39, 'VA', 'Holy See (Vatican City State)'),
(99, 504, 'HN', 'Honduras'),
(100, 852, 'HK', 'Hong Kong'),
(101, 36, 'HU', 'Hungary'),
(102, 354, 'IS', 'Iceland'),
(103, 91, 'IN', 'India'),
(104, 62, 'ID', 'Indonesia'),
(105, 98, 'IR', 'Iran, Islamic Republic of'),
(106, 964, 'IQ', 'Iraq'),
(107, 353, 'IE', 'Ireland'),
(108, 44, 'IM', 'Isle of Man'),
(109, 972, 'IL', 'Israel'),
(110, 39, 'IT', 'Italy'),
(111, 1876, 'JM', 'Jamaica'),
(112, 81, 'JP', 'Japan'),
(113, 44, 'JE', 'Jersey'),
(114, 962, 'JO', 'Jordan'),
(115, 7, 'KZ', 'Kazakhstan'),
(116, 254, 'KE', 'Kenya'),
(117, 686, 'KI', 'Kiribati'),
(118, 850, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 82, 'KR', 'Korea, Republic of'),
(120, 381, 'XK', 'Kosovo'),
(121, 965, 'KW', 'Kuwait'),
(122, 996, 'KG', 'Kyrgyzstan'),
(123, 856, 'LA', 'Lao People\'s Democratic Republic'),
(124, 371, 'LV', 'Latvia'),
(125, 961, 'LB', 'Lebanon'),
(126, 266, 'LS', 'Lesotho'),
(127, 231, 'LR', 'Liberia'),
(128, 218, 'LY', 'Libyan Arab Jamahiriya'),
(129, 423, 'LI', 'Liechtenstein'),
(130, 370, 'LT', 'Lithuania'),
(131, 352, 'LU', 'Luxembourg'),
(132, 853, 'MO', 'Macao'),
(133, 389, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(134, 261, 'MG', 'Madagascar'),
(135, 265, 'MW', 'Malawi'),
(136, 60, 'MY', 'Malaysia'),
(137, 960, 'MV', 'Maldives'),
(138, 223, 'ML', 'Mali'),
(139, 356, 'MT', 'Malta'),
(140, 692, 'MH', 'Marshall Islands'),
(141, 596, 'MQ', 'Martinique'),
(142, 222, 'MR', 'Mauritania'),
(143, 230, 'MU', 'Mauritius'),
(144, 269, 'YT', 'Mayotte'),
(145, 52, 'MX', 'Mexico'),
(146, 691, 'FM', 'Micronesia, Federated States of'),
(147, 373, 'MD', 'Moldova, Republic of'),
(148, 377, 'MC', 'Monaco'),
(149, 976, 'MN', 'Mongolia'),
(150, 382, 'ME', 'Montenegro'),
(151, 1664, 'MS', 'Montserrat'),
(152, 212, 'MA', 'Morocco'),
(153, 258, 'MZ', 'Mozambique'),
(154, 95, 'MM', 'Myanmar'),
(155, 264, 'NA', 'Namibia'),
(156, 674, 'NR', 'Nauru'),
(157, 977, 'NP', 'Nepal'),
(158, 31, 'NL', 'Netherlands'),
(159, 599, 'AN', 'Netherlands Antilles'),
(160, 687, 'NC', 'New Caledonia'),
(161, 64, 'NZ', 'New Zealand'),
(162, 505, 'NI', 'Nicaragua'),
(163, 227, 'NE', 'Niger'),
(164, 234, 'NG', 'Nigeria'),
(165, 683, 'NU', 'Niue'),
(166, 672, 'NF', 'Norfolk Island'),
(167, 1670, 'MP', 'Northern Mariana Islands'),
(168, 47, 'NO', 'Norway'),
(169, 968, 'OM', 'Oman'),
(170, 92, 'PK', 'Pakistan'),
(171, 680, 'PW', 'Palau'),
(172, 970, 'PS', 'Palestinian Territory, Occupied'),
(173, 507, 'PA', 'Panama'),
(174, 675, 'PG', 'Papua New Guinea'),
(175, 595, 'PY', 'Paraguay'),
(176, 51, 'PE', 'Peru'),
(177, 63, 'PH', 'Philippines'),
(178, 64, 'PN', 'Pitcairn'),
(179, 48, 'PL', 'Poland'),
(180, 351, 'PT', 'Portugal'),
(181, 1787, 'PR', 'Puerto Rico'),
(182, 974, 'QA', 'Qatar'),
(183, 262, 'RE', 'Reunion'),
(184, 40, 'RO', 'Romania'),
(185, 70, 'RU', 'Russian Federation'),
(186, 250, 'RW', 'Rwanda'),
(187, 590, 'BL', 'Saint Barthelemy'),
(188, 290, 'SH', 'Saint Helena'),
(189, 1869, 'KN', 'Saint Kitts and Nevis'),
(190, 1758, 'LC', 'Saint Lucia'),
(191, 590, 'MF', 'Saint Martin'),
(192, 508, 'PM', 'Saint Pierre and Miquelon'),
(193, 1784, 'VC', 'Saint Vincent and the Grenadines'),
(194, 684, 'WS', 'Samoa'),
(195, 378, 'SM', 'San Marino'),
(196, 239, 'ST', 'Sao Tome and Principe'),
(197, 966, 'SA', 'Saudi Arabia'),
(198, 221, 'SN', 'Senegal'),
(199, 381, 'RS', 'Serbia'),
(200, 381, 'CS', 'Serbia and Montenegro'),
(201, 248, 'SC', 'Seychelles'),
(202, 232, 'SL', 'Sierra Leone'),
(203, 65, 'SG', 'Singapore'),
(204, 1, 'SX', 'Sint Maarten'),
(205, 421, 'SK', 'Slovakia'),
(206, 386, 'SI', 'Slovenia'),
(207, 677, 'SB', 'Solomon Islands'),
(208, 252, 'SO', 'Somalia'),
(209, 27, 'ZA', 'South Africa'),
(210, 500, 'GS', 'South Georgia and the South Sandwich Islands'),
(211, 211, 'SS', 'South Sudan'),
(212, 34, 'ES', 'Spain'),
(213, 94, 'LK', 'Sri Lanka'),
(214, 249, 'SD', 'Sudan'),
(215, 597, 'SR', 'Suriname'),
(216, 47, 'SJ', 'Svalbard and Jan Mayen'),
(217, 268, 'SZ', 'Swaziland'),
(218, 46, 'SE', 'Sweden'),
(219, 41, 'CH', 'Switzerland'),
(220, 963, 'SY', 'Syrian Arab Republic'),
(221, 886, 'TW', 'Taiwan, Province of China'),
(222, 992, 'TJ', 'Tajikistan'),
(223, 255, 'TZ', 'Tanzania, United Republic of'),
(224, 66, 'TH', 'Thailand'),
(225, 670, 'TL', 'Timor-Leste'),
(226, 228, 'TG', 'Togo'),
(227, 690, 'TK', 'Tokelau'),
(228, 676, 'TO', 'Tonga'),
(229, 1868, 'TT', 'Trinidad and Tobago'),
(230, 216, 'TN', 'Tunisia'),
(231, 90, 'TR', 'Turkey'),
(232, 7370, 'TM', 'Turkmenistan'),
(233, 1649, 'TC', 'Turks and Caicos Islands'),
(234, 688, 'TV', 'Tuvalu'),
(235, 256, 'UG', 'Uganda'),
(236, 380, 'UA', 'Ukraine'),
(237, 971, 'AE', 'United Arab Emirates'),
(238, 44, 'GB', 'United Kingdom'),
(239, 1, 'US', 'United States'),
(240, 1, 'UM', 'United States Minor Outlying Islands'),
(241, 598, 'UY', 'Uruguay'),
(242, 998, 'UZ', 'Uzbekistan'),
(243, 678, 'VU', 'Vanuatu'),
(244, 58, 'VE', 'Venezuela'),
(245, 84, 'VN', 'Viet Nam'),
(246, 1284, 'VG', 'Virgin Islands, British'),
(247, 1340, 'VI', 'Virgin Islands, U.s.'),
(248, 681, 'WF', 'Wallis and Futuna'),
(249, 212, 'EH', 'Western Sahara'),
(250, 967, 'YE', 'Yemen'),
(251, 260, 'ZM', 'Zambia'),
(252, 263, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `Discount_ID` int(255) NOT NULL,
  `Discount_Size` int(20) NOT NULL,
  `Dicsount_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Product_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `Image_ID` int(255) NOT NULL,
  `Image_Url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Product_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`Image_ID`, `Image_Url`, `Image_Date`, `Product_ID`) VALUES
(2, 'images/productimage/1645876983_17.png', '2022-02-26 12:03:03', 17),
(3, 'images/productimage/1645877122_18.png', '2022-02-26 12:05:22', 18),
(4, 'images/productimage/1645877275_19.png', '2022-02-26 12:07:55', 19),
(5, 'images/productimage/1645877419_20.png', '2022-02-26 12:10:19', 20),
(6, 'images/productimage/1645877582_21.png', '2022-02-26 12:13:02', 21),
(7, 'images/productimage/1645877657_22.png', '2022-02-26 12:14:17', 22),
(8, 'images/productimage/1645877731_23.png', '2022-02-26 12:15:31', 23),
(9, 'images/productimage/1645877792_24.png', '2022-02-26 12:16:32', 24),
(10, 'images/productimage/1645877921_25.png', '2022-02-26 12:18:41', 25),
(11, 'images/productimage/1645878069_26.png', '2022-02-26 12:21:09', 26),
(12, 'images/productimage/1645878132_27.png', '2022-02-26 12:22:12', 27),
(13, 'images/productimage/1645878191_28.png', '2022-02-26 12:23:11', 28),
(14, 'images/productimage/1645878295_29.png', '2022-02-26 12:24:55', 29),
(23, 'images/productimage/1645879322_36.png', '2022-02-26 12:48:25', 36),
(24, 'images/productimage/1645879110_35.png', '2022-02-26 12:48:25', 35),
(25, 'images/productimage/1645879845_38.png', '2022-02-26 12:50:45', 38),
(26, 'images/productimage/1645879932_39.png', '2022-02-26 12:52:12', 39),
(27, 'images/productimage/1645880460_40.png', '2022-02-26 13:01:00', 40),
(28, 'images/productimage/1645888022_41.png', '2022-02-26 15:07:02', 41),
(29, 'images/productimage/1645888324_42.png', '2022-02-26 15:12:04', 42),
(30, 'images/productimage/1645888443_43.png', '2022-02-26 15:14:03', 43),
(31, 'images/productimage/1645888541_44.png', '2022-02-26 15:15:41', 44),
(32, 'images/productimage/1645888614_45.png', '2022-02-26 15:16:54', 45),
(33, 'images/productimage/1645888724_46.png', '2022-02-26 15:18:44', 46),
(34, 'images/productimage/1645888893_47.png', '2022-02-26 15:21:33', 47),
(35, 'images/productimage/1645888982_48.png', '2022-02-26 15:23:02', 48),
(36, 'images/productimage/1645889121_49.png', '2022-02-26 15:25:21', 49),
(37, 'images/productimage/1645889259_50.png', '2022-02-26 15:27:39', 50),
(38, 'images/productimage/1645889414_51.png', '2022-02-26 15:30:14', 51),
(39, 'images/productimage/1645889486_52.png', '2022-02-26 15:31:26', 52),
(40, 'images/productimage/1645889619_53.png', '2022-02-26 15:33:39', 53),
(41, 'images/productimage/1645889751_54.png', '2022-02-26 15:35:51', 54),
(42, 'images/productimage/1645889899_55.png', '2022-02-26 15:38:19', 55),
(43, 'images/productimage/1645889989_56.png', '2022-02-26 15:39:49', 56),
(44, 'images/productimage/1645890060_57.png', '2022-02-26 15:41:00', 57),
(45, 'images/productimage/1645890163_58.png', '2022-02-26 15:42:43', 58),
(46, 'images/productimage/1645890237_59.png', '2022-02-26 15:43:57', 59),
(47, 'images/productimage/1645890304_60.png', '2022-02-26 15:45:04', 60),
(48, 'images/productimage/1645890538_62.png', '2022-02-26 15:48:58', 62);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `Message_ID` int(255) NOT NULL,
  `Message_Text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`Message_ID`, `Message_Text`, `User_ID`) VALUES
(16, 'asdasdas', 37),
(17, 'asdasdas', 38);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(255) NOT NULL,
  `Order_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Address_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Order_Date`, `Address_ID`, `User_ID`) VALUES
(11, '2022-03-06 20:28:35', 17, 55),
(12, '2022-03-06 20:32:47', 17, 55),
(13, '2022-03-06 20:33:53', 17, 55),
(14, '2022-03-06 20:45:00', 17, 55),
(15, '2022-03-06 20:56:36', 18, 56),
(16, '2022-03-06 21:27:44', 18, 56),
(17, '2022-03-06 22:22:52', 19, 52),
(18, '2022-03-09 21:53:09', 19, 52),
(19, '2022-03-10 09:27:18', 19, 52);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_ID` int(255) NOT NULL,
  `Product_ID` int(255) NOT NULL,
  `Current_UnitPrice` decimal(50,0) NOT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Order_ID`, `Product_ID`, `Current_UnitPrice`, `Quantity`) VALUES
(11, 20, '910', 1),
(11, 21, '766', 1),
(12, 20, '910', 1),
(12, 21, '766', 1),
(13, 21, '766', 1),
(13, 22, '718', 1),
(14, 21, '766', 1),
(14, 22, '718', 1),
(15, 18, '1006', 1),
(16, 39, '815', 1),
(16, 47, '431', 1),
(16, 56, '163', 2),
(17, 18, '1006', 1),
(18, 20, '910', 1),
(19, 23, '718', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(255) NOT NULL,
  `Product_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_UnitPrice` decimal(50,0) NOT NULL,
  `Product_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Product_Desription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_UnitsInStock` int(255) NOT NULL,
  `Product_Activity` int(1) NOT NULL,
  `Category_ID` int(50) NOT NULL,
  `Brand_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Product_Name`, `Product_UnitPrice`, `Product_Date`, `Product_Desription`, `Product_UnitsInStock`, `Product_Activity`, `Category_ID`, `Brand_ID`) VALUES
(17, 'AMD Ryzen 9 5950X 3.4GHz (4.9GHz)', '1102', '2022-02-26 12:03:03', 'Gaming: Yes\r\nBase: AMD® AM4\r\nProcessor type: AMD® Ryzen 9\r\nNumber of cores: 16\r\nThreads: 32\r\nManufacturing technology: 7 nm\r\nTDP: 105W', 1000, 1, 9, 3),
(18, 'INTEL Core i9-10900X 3.7GHz (4.50 GHz)', '1006', '2022-02-26 12:05:22', 'Gaming: Yes\r\nBase: Intel® 2066\r\nProcessor Type: Intel® Core ™ i9\r\nNumber of cores: 10\r\nThreads: 20\r\nManufacturing technology: 14 nm\r\nTDP: 165W', 999, 1, 9, 2),
(19, 'AMD Ryzen 9 3950X 3.5GHz (4.7GHz)', '958', '2022-02-26 12:07:55', 'Gaming: Yes\r\nBase: AMD® AM4\r\nProcessor type: AMD® Ryzen 9\r\nNumber of cores: 16\r\nThreads: 32\r\nManufacturing technology: 7 nm\r\nTDP: 105W', 1000, 1, 9, 3),
(20, 'INTEL Core i9-12900K 3.20 GHz (5.20 GHz)', '910', '2022-02-26 12:10:19', 'Base: Intel® 1700\r\nProcessor Type: Intel® Core ™ i9\r\nNumber of cores: 16\r\nThreads: 24\r\nManufacturing technology: 10 nm\r\nTDP: 125W\r\nOperating frequency: 3.2GHz', 999, 1, 9, 2),
(21, 'INTEL Core i9-11900K 3.5GHz (5.30 GHz)', '766', '2022-02-26 12:13:02', 'Base: Intel® 1200\r\nProcessor Type: Intel® Core ™ i9\r\nNumber of cores: 8\r\nThreads: 16\r\nManufacturing technology: 14 nm\r\nTDP: 95W\r\nOperating frequency: 3.5GHz', 1000, 1, 9, 2),
(22, 'INTEL Core i9-10900K 3.70 GHz (5.30 GHz)', '718', '2022-02-26 12:14:17', 'Base: Intel® 1200\r\nProcessor Type: Intel® Core ™ i9\r\nNumber of cores: 10\r\nThreads: 20\r\nManufacturing technology: 14 nm\r\nTDP: 125W\r\nOperating frequency: 3.7GHz', 500, 1, 9, 2),
(23, 'INTEL Core i9-11900KF 3.5GHz (5.30 GHz)', '718', '2022-02-26 12:15:31', 'Base: Intel® 1200\r\nProcessor Type: Intel® Core ™ i9\r\nNumber of cores: 8\r\nThreads: 16\r\nManufacturing technology: 14 nm\r\nTDP: 125W\r\nOperating frequency: 3.5GHz', 499, 1, 9, 2),
(24, 'AMD Ryzen 9 5900X 3.7GHz', '718', '2022-02-26 12:16:32', 'Gaming: Yes\r\nBase: AMD® AM4\r\nProcessor type: AMD® Ryzen 9\r\nNumber of cores: 12\r\nThreads: 24\r\nManufacturing technology: TSMC 7nm FinFET\r\nTDP: 105W', 700, 1, 9, 3),
(25, 'GIGABYTE X570S AORUS MASTER (rev. 1.0)', '574', '2022-02-26 12:18:41', '\r\nGaming: Yes\r\nProcessor type: AMD\r\nBase: AMD® AM4\r\nChipset: AMD® X570\r\nBoard format: ATX\r\nSupported memory: DDR4', 1000, 1, 10, 6),
(26, 'GIGABYTE B660 AORUS MASTER DDR4 (rev. 1.0)', '316', '2022-02-26 12:21:09', 'Processor Type: Intel\r\nBase: Intel® 1700\r\nChipset: Intel® B660\r\nBoard format: ATX\r\nSupported memory: DDR4', 1000, 1, 10, 6),
(27, 'ASUS TUF GAMING B660M-PLUS WIFI D4', '239', '2022-02-26 12:22:12', 'Tip procesora:Intel\r\nPodnožje:Intel® 1700\r\nČipset:Intel® B660\r\nFormat ploče:Micro ATX\r\nPodržana memorija:DDR4', 654, 1, 10, 7),
(28, 'ASUS TUF GAMING Z690-PLUS D4', '431', '2022-02-26 12:23:11', 'Gaming:Da\r\nTip procesora:Intel\r\nPodnožje:Intel® 1700\r\nČipset:Intel® Z690\r\nFormat ploče:ATX\r\nPodržana memorija:DDR4', 800, 1, 10, 7),
(29, 'ASUS AM4 X570 TUF GAMING X570-PLUS (WI-FI)', '364', '2022-02-26 12:24:55', 'Gaming: Yes\r\nProcessor type: AMD\r\nBase: AMD® AM4\r\nChipset: AMD® X570\r\nBoard format: ATX\r\nSupported memory: DDR4', 555, 1, 10, 7),
(35, 'GIGABYTE AORUS GeForce RTX 3070 Ti MASTER LHR 8GB ', '1533', '2022-02-26 12:38:30', 'GPU: Nvidia GeForce RTX 3070 Ti\r\nMemory capacity: 8GB\r\nMemory type: GDDR6X\r\nMemory bus: 256bit', 500, 1, 11, 6),
(36, 'MSI nVidia GeForce RTX 3080 VENTUS 3X PLUS 10GB GD', '1724', '2022-02-26 12:42:02', 'GPU: Nvidia GeForce RTX 3080\r\nMemory capacity: 10GB\r\nMemory type: GDDR6X\r\nMemory bus: 320bit', 100, 1, 11, 5),
(38, 'ASUS TUF Gaming GeForce RTX 3060 Ti', '1054', '2022-02-26 12:50:45', 'GPU: Nvidia GeForce RTX 3060 Ti\r\nMemory capacity: 8GB\r\nMemory type: GDDR6\r\nMemory bus: 256bit', 56, 1, 11, 7),
(39, 'ASRock Radeon RX 6600 XT Challenger', '815', '2022-02-26 12:52:12', 'GPU: AMD Radeon RX 6600 XT\r\nMemory capacity: 8GB\r\nMemory type: GDDR6\r\nMemory bus: 128bit', 65, 1, 11, 8),
(40, 'GIGABYTE AMD Radeon RX 6700 XT EAGLE', '1198', '2022-02-26 13:01:00', 'GPU: AMD Radeon RX 6700 XT\r\nMemory capacity: 12GB\r\nMemory type: GDDR6\r\nMemory bus: 192bit', 639, 1, 11, 6),
(41, 'ASUS ROG Strix GeForce RTX 3070 Ti', '1629', '2022-02-26 15:07:02', 'GPU: Nvidia GeForce RTX 3070 Ti\r\nMemory capacity: 8GB\r\nMemory type: GDDR6X\r\nMemory bus: 256bit', 635, 1, 11, 7),
(42, 'COOLER MASTER MWE 750', '134', '2022-02-26 15:12:04', 'Output power: 750W\r\nType: Standard\r\nForm factor: ATX (PS2)\r\nEfficiency: up to 85% efficiency', 158, 1, 12, 9),
(43, 'LC-POWER 650W LC8650III', '105', '2022-02-26 15:14:03', 'Output power: 650W\r\nType: Semi-Modular\r\nForm factor: ATX (PS2)\r\nEfficiency: up to 85% efficiency', 56, 1, 12, 15),
(44, 'COOLER MASTER MWE 650 BRONZE V2', '115', '2022-02-26 15:15:41', 'Output power: 650W\r\nType: Standard\r\nForm factor: ATX (PS2)\r\nEfficiency: up to 85% efficiency', 265, 1, 12, 9),
(45, 'COOLER MASTER MWE V850', '211', '2022-02-26 15:16:54', 'Output power: 850W\r\nType: Modular\r\nForm factor: ATX (PS2)\r\nEfficiency: up to 90% efficiency', 123, 1, 12, 9),
(46, 'GIGABYTE 550W GP-P550B', '67', '2022-02-26 15:18:44', 'Output power: 550W\r\nForm factor: ATX (PS2)\r\nEfficiency: up to 85% efficiency', 122, 1, 12, 6),
(47, 'SEAGATE 10TB', '431', '2022-02-26 15:21:33', 'Type: Internal\r\nFormat: 3.5 \"\r\nConnection: SATA III\r\nCapacity: 10TB HDD\r\nSpeed: 7200 RPM\r\nBuffer: 256 MB', 111, 1, 13, 16),
(48, 'SAMSUNG SSD 970 EVO PLUS 500GB', '125', '2022-02-26 15:23:02', 'Capacity: 500GB\r\nFormat: M.2 2280\r\nInterface: PCIe 3.0\r\nRead speed: up to 3500 MB / s\r\nThickness: 2.38mm', 145, 1, 13, 13),
(49, 'CORSAIR SSD 960GB Gen 3', '220', '2022-02-26 15:25:21', 'Capacity: 960GB\r\nFormat: M.2 2280\r\nInterface: PCIe 3.0\r\nRead speed: up to 3480 MB / s\r\nThickness: 3mm', 236, 1, 13, 10),
(50, 'KINGSTON SSD 250GB M.2', '48', '2022-02-26 15:27:39', 'Capacity: 250GB\r\nFormat: M.2 2280\r\nInterface: PCIe 3.0\r\nRead speed: up to 2100 MB / s\r\nThickness: 2.1mm', 231, 1, 13, 12),
(51, 'CORSAIR SSD 240GB M.2', '77', '2022-02-26 15:30:14', 'Capacity: 240GB\r\nFormat: M.2 2280\r\nInterface: PCIe 3.0\r\nRead speed: up to 3100 MB / s\r\nThickness: 3mm', 22, 1, 13, 10),
(52, 'SAMSUNG SSD 970 PRO', '335', '2022-02-26 15:31:26', 'Capacity: 1TB\r\nFormat: M.2 2280\r\nInterface: PCIe 3.0\r\nRead speed: up to 3500 MB / s\r\nThickness: 2.38mm', 321, 1, 13, 13),
(53, 'SAMSUNG SSD 1TB 870 QVO', '144', '2022-02-26 15:33:39', 'Capacity: 1TB\r\nFormat: 2.5 \'\'\r\nInterface: SATA III\r\nRead speed: up to 560 MB / s\r\nThickness: 6.8mm', 312, 1, 13, 13),
(54, 'KINGSTON Beast 8GB DDR4', '77', '2022-02-26 15:35:51', 'Capacity: 8GB\r\nType: DDR4\r\nMaximum frequency: 3733MHz\r\nLatency: CL19', 213, 1, 14, 12),
(55, 'KINGSTON Fury Beast 2x16GB DDR5', '355', '2022-02-26 15:38:19', 'Capacity: 32GB kit\r\nType: DDR5\r\nMaximum frequency: 4800MHz\r\nLatency: CL 38', 21, 1, 14, 12),
(56, 'ADATA DDR5 16GB 4800MHz', '163', '2022-02-26 15:39:49', 'Capacity: 16GB\r\nType: DDR5\r\nMaximum frequency: 4800MHz\r\nLatency: CL 38', 55, 1, 14, 17),
(57, 'KINGSTON 16GB DDR5 4800MHz', '182', '2022-02-26 15:41:00', 'Capacity: 16GB\r\nType: DDR5\r\nMaximum frequency: 4800MHz\r\nLatency: CL 40', 235, 1, 14, 12),
(58, 'KINGSTON Fury Beast 16GB DDR5', '211', '2022-02-26 15:42:43', 'Capacity: 16GB\r\nType: DDR5\r\nMaximum frequency: 4800MHz\r\nLatency: CL 38', 55, 1, 14, 12),
(59, 'CORSAIR VENGEANCE LPX 16GB (2 x 8GB)', '105', '2022-02-26 15:43:57', 'Capacity: 16GB kit\r\nType: DDR4\r\nMaximum frequency: 3200Mhz\r\nLatency: CL16', 52, 1, 14, 10),
(60, 'CORSAIR VENGEANCE LPX 8GB (1 x 8GB)', '58', '2022-02-26 15:45:04', 'Capacity: 8GB\r\nType: DDR4\r\nMaximum frequency: 3000MHz\r\nLatency: CL16', 66, 1, 14, 10),
(62, 'KINGSTON Renegade RGB 8GB DDR4', '77', '2022-02-26 15:48:58', 'Capacity: 8GB\r\nType: DDR4\r\nMaximum frequency: 3200Mhz\r\nLatency: CL16', 63, 1, 14, 12);

-- --------------------------------------------------------

--
-- Table structure for table `types_of_users`
--

CREATE TABLE `types_of_users` (
  `Type_ID` int(5) NOT NULL,
  `Type_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types_of_users`
--

INSERT INTO `types_of_users` (`Type_ID`, `Type_Name`) VALUES
(1, 'Administrator'),
(3, 'Customer'),
(2, 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(255) NOT NULL,
  `User_FirstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_LastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_DateReg` timestamp NOT NULL DEFAULT current_timestamp(),
  `Type_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `User_FirstName`, `User_LastName`, `User_Username`, `User_Email`, `User_Phone`, `User_Password`, `User_Image`, `User_DateReg`, `Type_ID`) VALUES
(37, 'Marko', 'Markovic', 'marko123', 'marko@gmail.com', '063 255 4868', 'marko123', '', '2022-02-16 18:10:51', 3),
(38, 'Nkola', 'Nikolic', 'nikola123', 'nikola@gmailc.om', '063 255 4869', 'nikola123', '', '2022-02-16 18:10:51', 3),
(40, 'Milica', 'Manjak', 'mica123', 'resa@gmail.com', '063 518 4256', '251768dfb5ec35d9b48ed6cfc9c0275e', 'images/userimage/user.jpg', '2022-02-16 18:21:08', 3),
(41, 'Jovan', 'Lukic', 'jova123', 'jova@gmail.com', '063 446 182', '251768dfb5ec35d9b48ed6cfc9c0275e', 'images/userimage/user.jpg', '2022-02-16 19:24:30', 3),
(42, 'Milica', 'Manjak', 'comele', 'manjakmilica@gmail.com', '064 974 1468', 'e6af6def7d1fef26110cf0b1551057b7', 'images/userimage/user.jpg', '2022-02-17 07:55:59', 3),
(43, 'Milica', 'Manjak', 'comele123', 'manakmilica@gmail.com', '064 974 1568', 'e6af6def7d1fef26110cf0b1551057b7', 'images/userimage/user.jpg', '2022-02-17 07:57:44', 3),
(44, 'Tesa', 'Lukic', 'mic1a123', 'nes21a@gmail.com', '063 518 456', '251768dfb5ec35d9b48ed6cfc9c0275e', 'images/userimage/user.jpg', '2022-02-17 07:59:35', 3),
(45, 'Tesa', 'Lukic', 'mi1c1a123', 'neas21a@gmail.com', '063 518 1456', '251768dfb5ec35d9b48ed6cfc9c0275e', 'images/userimage/user.jpg', '2022-02-17 08:01:31', 3),
(46, 'Tesaaa', 'Manjaak', 't11esa123', 'reea11ssa@gmail.com', '063 518 9956', '251768dfb5ec35d9b48ed6cfc9c0275e', 'images/userimage/user.jpg', '2022-02-17 08:08:20', 3),
(47, 'Tesaaa', 'Manjaak', 't11es1a123', 're1ea11ssa@gmail.com', '063 518 9996', '251768dfb5ec35d9b48ed6cfc9c0275e', 'images/userimage/user.jpg', '2022-02-17 08:09:12', 3),
(48, 'Teasaaa', 'Maanjaak', 't11e2s1a123', 'r1e1ea11ssa@gmail.com', '063 518 8996', '251768dfb5ec35d9b48ed6cfc9c0275e', 'images/userimage/user.jpg', '2022-02-17 08:10:44', 3),
(49, 'Milica', 'Sonic', 'te13sa123', 'r1es1a@gmail.com', '063 518 4886', '251768dfb5ec35d9b48ed6cfc9c0275e', 'images/userimage/user.jpg', '2022-02-17 08:11:47', 3),
(50, 'Nebojsa', 'Lukic', 'moderator', 'moderator@gmial.com', '063 518 425', '4e7322cbf66e5c455b992fc4b12eb944', 'images/userimage/user.jpg', '2022-02-17 20:36:34', 2),
(51, 'Nebojsa', 'Lukic', 'administrator', 'administrator@gmail.com', '063 518 4251', '4e7322cbf66e5c455b992fc4b12eb944', 'images/userimage/1645395313_51.jpeg', '2022-02-17 20:39:49', 1),
(52, 'Nebojsa', 'Lukic', 'customer', 'customer@gmail.com', '063 518 4252', '4e7322cbf66e5c455b992fc4b12eb944', 'images/userimage/user.jpg', '2022-02-18 15:34:05', 3),
(53, 'Milica', 'Lukic', 'micacar123', 'milica123@gmail.com', '060 044 6476', 'da5730a8a51a280493cefca42c3e910a', 'images/userimage/user.jpg', '2022-02-26 17:36:50', 3),
(54, 'Nebojsa', 'Sone', 'sssss123', 'sssssone@gmail.com', '063 555 666', '4e7322cbf66e5c455b992fc4b12eb944', 'images/userimage/user.jpg', '2022-03-06 18:49:10', 3),
(55, 'Nebojsa', 'Sone', 'sssone321', 'ssssone@gmail.com', '063 666 555', '4e7322cbf66e5c455b992fc4b12eb944', 'images/userimage/user.jpg', '2022-03-06 19:14:19', 3),
(56, 'Nebojsa', 'Sone', 'custo1mer', 's1ssone@gmail.com', '063 666 585', '4e7322cbf66e5c455b992fc4b12eb944', 'images/userimage/user.jpg', '2022-03-06 20:56:26', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`Address_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Countries_ID` (`Country_ID`);

--
-- Indexes for table `blocked_users`
--
ALTER TABLE `blocked_users`
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Brand_ID`),
  ADD UNIQUE KEY `Brand_Name` (`Brand_Name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_ID`),
  ADD UNIQUE KEY `Category_Name` (`Category_Name`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`Country_ID`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`Discount_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`Image_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Message_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Address_ID` (`Address_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`),
  ADD UNIQUE KEY `Product_Name` (`Product_Name`),
  ADD KEY `Category_ID` (`Category_ID`),
  ADD KEY `Brand_ID` (`Brand_ID`);

--
-- Indexes for table `types_of_users`
--
ALTER TABLE `types_of_users`
  ADD PRIMARY KEY (`Type_ID`),
  ADD UNIQUE KEY `Type_Name` (`Type_Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `User_Username` (`User_Username`),
  ADD UNIQUE KEY `User_Email` (`User_Email`),
  ADD UNIQUE KEY `User_Phone` (`User_Phone`),
  ADD KEY `Type_ID` (`Type_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `Address_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `Brand_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `Country_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `Discount_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `Image_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `Message_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `types_of_users`
--
ALTER TABLE `types_of_users`
  MODIFY `Type_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `addresses_ibfk_2` FOREIGN KEY (`Country_ID`) REFERENCES `countries` (`Country_ID`);

--
-- Constraints for table `blocked_users`
--
ALTER TABLE `blocked_users`
  ADD CONSTRAINT `blocked_users_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`Address_ID`) REFERENCES `addresses` (`Address_ID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`Category_ID`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`Brand_ID`) REFERENCES `brands` (`Brand_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Type_ID`) REFERENCES `types_of_users` (`Type_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
