-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2016 at 11:43 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pointsisdealer`
--

-- --------------------------------------------------------

--
-- Table structure for table `appaymentdet`
--

CREATE TABLE IF NOT EXISTS `appaymentdet` (
`idtransdet` int(11) NOT NULL,
  `totalamount` double NOT NULL,
  `purchaseorderid` double NOT NULL,
  `transid` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `appaymentdet`
--

INSERT INTO `appaymentdet` (`idtransdet`, `totalamount`, `purchaseorderid`, `transid`) VALUES
(1, 32400, 6, 1);

--
-- Triggers `appaymentdet`
--
DELIMITER //
CREATE TRIGGER `deleteapheader` AFTER DELETE ON `appaymentdet`
 FOR EACH ROW BEGIN

IF EXISTS (SELECT idtrans FROM cashpayment WHERE idtrans IN (OLD.transid)) THEN

UPDATE cashpayment  SET amount = (SELECT IFNULL(SUM(totalamount),0) FROM appaymentdet  WHERE transid IN (OLD.transid)
AND appaymentdet.transid=cashpayment.idtrans) WHERE cashpayment.idtrans IN (OLD.transid);

END IF;

IF EXISTS (SELECT idtrans FROM purchaseorder WHERE idtrans IN (OLD.purchaseorderid)) THEN

UPDATE purchaseorder SET apamount= (SELECT IFNULL(SUM(totalamount),0) FROM appaymentdet WHERE purchaseorderid IN (OLD.purchaseorderid)
AND appaymentdet.purchaseorderid=purchaseorder.idtrans) WHERE purchaseorder.idtrans IN (OLD.purchaseorderid);

END IF;

END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `insertapheader` AFTER INSERT ON `appaymentdet`
 FOR EACH ROW BEGIN

IF EXISTS (SELECT idtrans FROM cashpayment WHERE idtrans IN (NEW.transid)) THEN

UPDATE cashpayment  SET amount = (SELECT IFNULL(SUM(totalamount),0) FROM appaymentdet WHERE transid IN (NEW.transid)
AND appaymentdet.transid=cashpayment.idtrans) WHERE cashpayment.idtrans IN (NEW.transid);

END IF;

END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `updateapheader` AFTER UPDATE ON `appaymentdet`
 FOR EACH ROW BEGIN

IF EXISTS (SELECT idtrans FROM cashpayment WHERE idtrans IN (NEW.transid)) THEN

UPDATE cashpayment  SET amount = (SELECT IFNULL(SUM(totalamount),0) FROM appaymentdet  WHERE transid IN (NEW.transid)
AND appaymentdet.transid=cashpayment.idtrans) WHERE cashpayment.idtrans IN (NEW.transid);

END IF;

IF EXISTS (SELECT idtrans FROM purchaseorder WHERE idtrans IN (NEW.purchaseorderid)) THEN

UPDATE purchaseorder SET apamount= (SELECT IFNULL(SUM(totalamount),0) FROM appaymentdet WHERE purchaseorderid IN (NEW.purchaseorderid)
AND appaymentdet.purchaseorderid=purchaseorder.idtrans) WHERE purchaseorder.idtrans IN (NEW.purchaseorderid);

END IF;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `arreceivedet`
--

CREATE TABLE IF NOT EXISTS `arreceivedet` (
`idtransdet` int(11) NOT NULL,
  `totalamount` double NOT NULL,
  `salesorderid` double NOT NULL,
  `transid` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
`idbank` int(11) NOT NULL,
  `bankname` varchar(25) NOT NULL,
  `bankaccount` varchar(50) NOT NULL,
  `banknumber` varchar(25) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This is master table for bank account' AUTO_INCREMENT=122 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`idbank`, `bankname`, `bankaccount`, `banknumber`, `branch`, `status`) VALUES
(1, '', '', '', '', 0),
(2, '', '', '', '', 0),
(3, '', '', '', '', 0),
(4, '', '', '', '', 0),
(5, '', '', '', '', 0),
(6, '1', '', '', '', 0),
(7, '1', '', '', '', 0),
(8, '1', '', '', '', 0),
(9, '1', '', '', '', 0),
(10, '1', '', '', '', 0),
(13, '1', '', '', '', 0),
(14, '1', '', '', '', 0),
(15, '1', '', '', '', 0),
(16, '1', '', '', '', 0),
(17, '1', '', '', '', 0),
(18, '1', '', '', '', 0),
(19, '1', '', '', '', 0),
(20, '1', '', '', '', 0),
(21, '1', '', '', '', 0),
(22, '1', '', '', '', 0),
(28, '1', '', '', '', 0),
(29, '1', '', '', '', 0),
(30, '1', '', '', '', 0),
(31, '1', '', '', '', 0),
(32, '1', '', '', '', 0),
(33, '1', '', '', '', 0),
(34, '1', '', '', '', 0),
(35, '1', '', '', '', 0),
(36, '1', '', '', '', 0),
(37, '1', '', '', '', 0),
(38, '1', '', '', '', 0),
(39, '1', '', '', '', 0),
(40, '1', '', '', '', 0),
(41, '1', '', '', '', 0),
(42, '1', '', '', '', 0),
(43, '1', '', '', '', 0),
(44, '1', '', '', '', 0),
(45, '1', '', '', '', 0),
(46, '1', '', '', '', 0),
(47, '1', '', '', '', 0),
(59, '1', '', '', '', 0),
(60, '1', '', '', '', 0),
(61, '1', '', '', '', 0),
(62, '1', '', '', '', 0),
(63, '1', '', '', '', 0),
(64, '1', '', '', '', 0),
(65, '1', '', '', '', 0),
(66, '1', '', '', '', 0),
(67, '1', '', '', '', 0),
(68, '1', '', '', '', 0),
(69, '1', '', '', '', 0),
(70, '1', '', '', '', 0),
(71, '1', '', '', '', 0),
(72, '1', '', '', '', 0),
(73, '1', '', '', '', 0),
(74, '1', '', '', '', 0),
(75, '1', '', '', '', 0),
(76, '1', '', '', '', 0),
(77, '1', '', '', '', 0),
(78, '1', '', '', '', 0),
(79, '1', '', '', '', 0),
(80, '1', '', '', '', 0),
(81, '1', '', '', '', 0),
(82, '1', '', '', '', 0),
(83, '1', '', '', '', 0),
(84, '1', '', '', '', 0),
(85, '1', '', '', '', 0),
(86, '1', '', '', '', 0),
(87, '1', '', '', '', 0),
(88, '1', '', '', '', 0),
(89, '1', '', '', '', 0),
(90, '1', '', '', '', 0),
(91, '1', '', '', '', 0),
(92, '1', '', '', '', 0),
(93, '1', '', '', '', 0),
(94, '1', '', '', '', 0),
(95, '1', '', '', '', 0),
(96, '1', '', '', '', 0),
(97, '1', '', '', '', 0),
(98, '1', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `businessprocess`
--

CREATE TABLE IF NOT EXISTS `businessprocess` (
`idbusinessprocess` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `process` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `businessprocessdet`
--

CREATE TABLE IF NOT EXISTS `businessprocessdet` (
`idbusinessprocessdet` int(11) NOT NULL,
  `businessprocessid` int(11) NOT NULL,
  `seqno` int(11) NOT NULL,
  `navmenuid` int(11) NOT NULL,
  `positionid` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `businesstype`
--

CREATE TABLE IF NOT EXISTS `businesstype` (
`idbusinesstype` int(11) NOT NULL,
  `businesstypename` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table for business type a company or customer' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cashpayment`
--

CREATE TABLE IF NOT EXISTS `cashpayment` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(4) NOT NULL,
  `notrans` varchar(20) NOT NULL,
  `datetrans` date NOT NULL,
  `nofaktur` varchar(225) NOT NULL,
  `datefaktur` date NOT NULL,
  `supplierid` int(11) NOT NULL,
  `bankid` int(11) NOT NULL,
  `paytypeid` int(11) NOT NULL,
  `amount` double NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `cashreceive`
--

CREATE TABLE IF NOT EXISTS `cashreceive` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(4) NOT NULL,
  `notrans` varchar(20) NOT NULL,
  `datetrans` date NOT NULL,
  `customerid` int(11) NOT NULL,
  `bankid` int(11) NOT NULL,
  `paytypeid` int(11) NOT NULL,
  `nofaktur` varchar(225) NOT NULL,
  `datefaktur` date NOT NULL,
  `amount` double NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE IF NOT EXISTS `channel` (
`idchannel` int(11) NOT NULL,
  `channelname` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`idcity` int(11) NOT NULL,
  `cityname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`idcity`, `cityname`, `status`) VALUES
(1, 'Kabupaten Cirebon', 0),
(2, 'Kota Cirebon', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complainttype`
--

CREATE TABLE IF NOT EXISTS `complainttype` (
`idcomplainttype` int(11) NOT NULL,
  `complainttypename` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacttype`
--

CREATE TABLE IF NOT EXISTS `contacttype` (
`idcontacttype` int(11) NOT NULL,
  `contacttypename` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`idcountry` int(11) NOT NULL,
  `countryname` varchar(50) NOT NULL,
  `countrycode` varchar(2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=215 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`idcountry`, `countryname`, `countrycode`, `status`) VALUES
(1, 'Afganistan', 'AF', 0),
(2, 'Afrika Selatan', 'ZA', 0),
(3, 'Afrika Tengah', 'CF', 0),
(4, 'Albania', 'AL', 0),
(5, 'Aljazair', 'DZ', 0),
(6, 'Amerika Serikat', 'US', 0),
(7, 'Andorra', 'AD', 0),
(8, 'Angola', 'AO', 0),
(9, 'Anguila', 'AI', 0),
(10, 'Antigua dan Barbuda', 'AG', 0),
(11, 'Antilla Belanda', 'AN', 0),
(12, 'Arab Saudi', 'SA', 0),
(13, 'Argentina', 'AR', 0),
(14, 'Armenia', 'AM', 0),
(15, 'Aruba', 'AW', 0),
(16, 'Australia', 'AU', 0),
(17, 'Austria', 'AT', 0),
(18, 'Azerbaijan', 'AZ', 0),
(19, 'Bahama', 'BS', 0),
(20, 'Bahrain', 'BH', 0),
(21, 'Bangladesh', 'BD', 0),
(22, 'Barbados', 'BB', 0),
(23, 'Belanda', 'NL', 0),
(24, 'Belarus', 'BY', 0),
(25, 'Belau', 'PW', 0),
(26, 'Belgia', 'BE', 0),
(27, 'Belize', 'BZ', 0),
(28, 'Benin', 'BJ', 0),
(29, 'Bermuda', 'BM', 0),
(30, 'Bhutan', 'BT', 0),
(31, 'Bolivia', 'BO', 0),
(32, 'Bosnia-Herzegovina', 'BA', 0),
(33, 'Botswana', 'BW', 0),
(34, 'Brasil', 'BR', 0),
(35, 'Brunei Darussalam', 'BN', 0),
(36, 'Bulgaria', 'BG', 0),
(37, 'Burkina Faso', 'BF', 0),
(38, 'Burundi', 'BI', 0),
(39, 'Cad', 'TD', 0),
(40, 'Cile', 'CL', 0),
(41, 'Cina', 'CN', 0),
(42, 'Denmark', 'DK', 0),
(43, 'Dominika', 'DM', 0),
(44, 'Ekuador', 'EC', 0),
(45, 'El Salvador', 'SV', 0),
(46, 'Eritrea', 'ER', 0),
(47, 'Estonia', 'EE', 0),
(48, 'Etiopia', 'ET', 0),
(49, 'Fiji', 'FJ', 0),
(50, 'Filipina', 'PH', 0),
(51, 'Finlandia', 'FI', 0),
(52, 'Gabon', 'GA', 0),
(53, 'Gambia', 'GM', 0),
(54, 'Georgia', 'GE', 0),
(55, 'Ghana', 'GH', 0),
(56, 'Grenada', 'GD', 0),
(57, 'Grinlandia', 'GL', 0),
(58, 'Guadeloupe', 'GP', 0),
(59, 'Guam', 'GU', 0),
(60, 'Guatemala', 'GT', 0),
(61, 'Guinea', 'GN', 0),
(62, 'Guinea Ekuatorial', 'GQ', 0),
(63, 'Guinea-Bissau', 'GW', 0),
(64, 'Guyana', 'GY', 0),
(65, 'Guyana Prancis', 'GF', 0),
(66, 'Haiti', 'HT', 0),
(67, 'Honduras', 'HN', 0),
(68, 'Hong Kong', 'HK', 0),
(69, 'Hungaria', 'HU', 0),
(70, 'India', 'IN', 0),
(71, 'Indonesia', 'ID', 0),
(72, 'Inggris', 'GB', 0),
(73, 'Irak', 'IQ', 0),
(74, 'Iran', 'IR', 0),
(75, 'Irlandia', 'IE', 0),
(76, 'Islandia', 'IS', 0),
(77, 'Israel', 'IL', 0),
(78, 'Italia', 'IT', 0),
(79, 'Jamaika', 'JM', 0),
(80, 'Jepang', 'JP', 0),
(81, 'Jerman', 'DE', 0),
(82, 'Jibuti', 'DJ', 0),
(83, 'Kaledonia Baru', 'NC', 0),
(84, 'Kamboja', 'KH', 0),
(85, 'Kamerun', 'CM', 0),
(86, 'Kanada', 'CA', 0),
(87, 'Kazakstan', 'KZ', 0),
(88, 'Kenya', 'KE', 0),
(89, 'Kepulauan Faeroe', 'FO', 0),
(90, 'Kepulauan Solomon', 'SB', 0),
(91, 'Kepulauan Virgin', 'VI', 0),
(92, 'Kirghizia', 'KG', 0),
(93, 'Kiribati', 'KI', 0),
(94, 'Kolombia', 'CO', 0),
(95, 'Komoro', 'KM', 0),
(96, 'Kongo', 'CG', 0),
(97, 'Korea Selatan', 'KR', 0),
(98, 'Korea Utara', 'KP', 0),
(99, 'Kosta Rika', 'CR', 0),
(100, 'Kroasia', 'HR', 0),
(101, 'Kuba', 'CU', 0),
(102, 'Kuwait', 'KW', 0),
(103, 'Laos', 'LA', 0),
(104, 'Latvia', 'LV', 0),
(105, 'Lebanon', 'LB', 0),
(106, 'Lesotho', 'LS', 0),
(107, 'Liberia', 'LR', 0),
(108, 'Libia', 'LY', 0),
(109, 'Liechtenstein', 'LI', 0),
(110, 'Lituania', 'LT', 0),
(111, 'Luksemburg', 'LU', 0),
(112, 'Madagaskar', 'MG', 0),
(113, 'Makau', 'MO', 0),
(114, 'Makedonia', 'MK', 0),
(115, 'Maladewa', 'MV', 0),
(116, 'Malawi', 'MW', 0),
(117, 'Malaysia', 'MY', 0),
(118, 'Mali', 'ML', 0),
(119, 'Malta', 'MT', 0),
(120, 'Maroko', 'MA', 0),
(121, 'Marshall (Kepulauan)', 'MH', 0),
(122, 'Martinik', 'MQ', 0),
(123, 'Mauritania', 'MR', 0),
(124, 'Mauritius', 'MU', 0),
(125, 'Mayotte', 'YT', 0),
(126, 'Meksiko', 'MX', 0),
(127, 'Mesir', 'EG', 0),
(128, 'Mikronesia', 'FM', 0),
(129, 'Moldova', 'MD', 0),
(130, 'Monako', 'MC', 0),
(131, 'Mongolia', 'MN', 0),
(132, 'Montenegro', 'ME', 0),
(133, 'Mozambik', 'MZ', 0),
(134, 'Myanmar', 'MM', 0),
(135, 'Namibia', 'NA', 0),
(136, 'Nauru', 'NR', 0),
(137, 'Nepal', 'NP', 0),
(138, 'Niger', 'NE', 0),
(139, 'Nigeria', 'NG', 0),
(140, 'Nikaragua', 'NI', 0),
(141, 'Norwegia', 'NO', 0),
(142, 'Oman', 'OM', 0),
(143, 'Pakistan', 'PK', 0),
(144, 'Palestina', 'PS', 0),
(145, 'Panama', 'PA', 0),
(146, 'Pantai Gading', 'CI', 0),
(147, 'Papua Nugini', 'PG', 0),
(148, 'Paraguay', 'PY', 0),
(149, 'Peru', 'PE', 0),
(150, 'Polandia', 'PL', 0),
(151, 'Polinesia Prancis', 'PF', 0),
(152, 'Portugal', 'PT', 0),
(153, 'Prancis', 'FR', 0),
(154, 'Puerto Riko', 'PR', 0),
(155, 'Qatar', 'QA', 0),
(156, 'Republik Cheska', 'CZ', 0),
(157, 'Republik Demokratik Kongo', 'CD', 0),
(158, 'Republik Dominika', 'DO', 0),
(159, 'Reunion', 'RE', 0),
(160, 'Rumania', 'RO', 0),
(161, 'Rusia', 'RU', 0),
(162, 'Rwanda', 'RW', 0),
(163, 'Sahara Barat', 'EH', 0),
(164, 'Saint Kitts dan Nevis', 'KN', 0),
(165, 'Saint Vincent dan Grenadines', 'VC', 0),
(166, 'Samoa', 'WS', 0),
(167, 'San Marino', 'SM', 0),
(168, 'Santa Lusia', 'LC', 0),
(169, 'Sao Tome dan Principe', 'ST', 0),
(170, 'Selandia Baru', 'NZ', 0),
(171, 'Senegal', 'SN', 0),
(172, 'Serbia', 'RS', 0),
(173, 'Seychelles', 'SC', 0),
(174, 'Sierra Leone', 'SL', 0),
(175, 'Singapura', 'SG', 0),
(176, 'Siprus', 'CY', 0),
(177, 'Slovakia', 'SK', 0),
(178, 'Slovenia', 'SI', 0),
(179, 'Somalia', 'SO', 0),
(180, 'Spanyol', 'ES', 0),
(181, 'Sri Lanka', 'LK', 0),
(182, 'Sudan', 'SD', 0),
(183, 'Suriah', 'SY', 0),
(184, 'Suriname', 'SR', 0),
(185, 'Swaziland', 'SZ', 0),
(186, 'Swedia', 'SE', 0),
(187, 'Swiss', 'CH', 0),
(188, 'Taiwan', 'TW', 0),
(189, 'Tajikistan', 'TJ', 0),
(190, 'Tanjung Verde', 'CV', 0),
(191, 'Tanzania', 'TZ', 0),
(192, 'Thailand', 'TH', 0),
(193, 'Timor Leste', 'TL', 0),
(194, 'Togo', 'TG', 0),
(195, 'Tonga', 'TO', 0),
(196, 'Trinidad dan Tobago', 'TT', 0),
(197, 'Tunisia', 'TN', 0),
(198, 'Turki', 'TR', 0),
(199, 'Turkimenistan', 'TM', 0),
(200, 'Tuvalu', 'TV', 0),
(201, 'Uganda', 'UG', 0),
(202, 'Ukraina', 'UA', 0),
(203, 'Uni Emirat Arab', 'AE', 0),
(204, 'Uruguay', 'UY', 0),
(205, 'Uzbekistan', 'UZ', 0),
(206, 'Vanuatu', 'VU', 0),
(207, 'Vatikan', 'VA', 0),
(208, 'Venezuela', 'VE', 0),
(209, 'Vietnam', 'VN', 0),
(210, 'Yaman', 'YE', 0),
(211, 'Yordania', 'JO', 0),
(212, 'Yunani', 'GR', 0),
(213, 'Zambia', 'ZM', 0),
(214, 'Zimbabwe', 'ZW', 0);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
`idcurrency` int(11) NOT NULL,
  `currencyname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`idcurrency`, `currencyname`, `description`, `status`) VALUES
(1, 'IDR', 'Indonesian Rupiah', 0),
(2, 'USD', 'Dollar USA', 0),
(3, 'RMB', 'Renminbi', 0),
(4, 'SIN', 'Dollar Singapore', 0),
(5, 'EUR', 'Euro', 0),
(6, 'AUD', 'Dolar Australia ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`idcustomer` int(11) NOT NULL,
  `registrationno` varchar(25) NOT NULL,
  `registrationdate` date NOT NULL,
  `customername` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `cityid` int(11) NOT NULL,
  `zipcode` varchar(15) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `hp1` varchar(225) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `customertypeid` int(11) NOT NULL,
  `customergroupid` int(11) NOT NULL,
  `bankaccountid` int(11) NOT NULL,
  `reknumber` varchar(25) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remark` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idcustomer`, `registrationno`, `registrationdate`, `customername`, `address1`, `address2`, `cityid`, `zipcode`, `phone1`, `phone2`, `hp1`, `fax`, `emailaddress`, `customertypeid`, `customergroupid`, `bankaccountid`, `reknumber`, `userid`, `status`, `remark`) VALUES
(1, '001', '0000-00-00', 'Customer', '-', '', 0, '', '-', '-', '', '', '', 1, 0, 0, '', 0, 0, 0),
(2, '002', '0000-00-00', 'Lingga Motor', 'DS. BOJONG CILIMUS', '', 0, '', '-', '08232613684', '', '', '', 2, 0, 0, '', 0, 0, 0),
(3, '003', '0000-00-00', 'NUROHMAN', 'DS I CITELANG RT 003/001', '', 0, '', '-', '-', '', '', '', 1, 0, 0, '', 0, 0, 0),
(4, '004', '0000-00-00', 'RIZALUDIN', 'DS. SETIANEGARA', '', 0, '', '-', '-', '', '', '', 1, 0, 0, '', 0, 0, 0),
(5, '005', '0000-00-00', 'ENCUM SUMIATI', 'DUSUN PAHING RT 002/001', '', 0, '', '-', '-', '', '', '', 1, 0, 0, '', 0, 0, 0),
(6, '006', '0000-00-00', 'IWAN MOTOR', 'bandorsa', '', 0, '', '-', '-', '', '', '', 2, 0, 0, '', 0, 0, 0),
(7, '007', '0000-00-00', 'ANDES MOTOR', 'BANDORASA', '', 0, '', '-', '-', '', '', '', 2, 0, 0, '', 0, 0, 0),
(8, '008', '0000-00-00', 'TRIJAYA MOTOR', 'CILIMUS', '', 0, '', '-', '-', '', '', '', 2, 0, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customertype`
--

CREATE TABLE IF NOT EXISTS `customertype` (
`idcustomertype` int(11) NOT NULL,
  `customertypename` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customertype`
--

INSERT INTO `customertype` (`idcustomertype`, `customertypename`, `status`) VALUES
(1, 'Customer Cash', 0),
(2, 'Bengkel', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryorder`
--

CREATE TABLE IF NOT EXISTS `deliveryorder` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(11) NOT NULL,
  `notrans` varchar(50) DEFAULT NULL,
  `datetrans` date DEFAULT NULL,
  `customerid` int(11) NOT NULL,
  `shiptoid` int(11) NOT NULL,
  `paytypeid` int(11) NOT NULL,
  `expeditionid` varchar(50) NOT NULL,
  `totalamount` double NOT NULL,
  `aramount` double NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryorderdet`
--

CREATE TABLE IF NOT EXISTS `deliveryorderdet` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `unitprice` double NOT NULL,
  `discount` int(11) NOT NULL,
  `amount` double NOT NULL,
  `quantity` double NOT NULL,
  `sizeid` int(11) NOT NULL,
  `colorid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `salesorderdetid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Triggers `deliveryorderdet`
--
DELIMITER //
CREATE TRIGGER `delete` AFTER DELETE ON `deliveryorderdet`
 FOR EACH ROW BEGIN

IF EXISTS (SELECT idtransdet FROM salesorderdet WHERE idtransdet IN (OLD.salesorderdetid)) THEN

UPDATE salesorderdet SET doqty= (SELECT IFNULL(SUM(quantity),0) FROM deliveryorderdet WHERE salesorderdetid IN (OLD.salesorderdetid)
AND deliveryorderdet.salesorderdetid=salesorderdet.idtransdet) WHERE salesorderdet.idtransdet IN (OLD.salesorderdetid);

END IF;

END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `update` AFTER UPDATE ON `deliveryorderdet`
 FOR EACH ROW BEGIN

IF EXISTS (SELECT idtransdet FROM salesorderdet WHERE idtransdet IN (NEW.salesorderdetid)) THEN

UPDATE salesorderdet SET doqty= (SELECT IFNULL(SUM(quantity),0) FROM deliveryorderdet WHERE salesorderdetid IN (NEW.salesorderdetid)
AND deliveryorderdet.salesorderdetid=salesorderdet.idtransdet) WHERE salesorderdet.idtransdet IN (NEW.salesorderdetid);

END IF;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`iddepartment` int(11) NOT NULL,
  `departmentname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`iddepartment`, `departmentname`, `status`) VALUES
(1, 'H1', 0),
(2, 'H2', 0),
(3, 'H3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
`iddistricts` int(11) NOT NULL,
  `districtsname` varchar(225) NOT NULL,
  `cityid` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`iddistricts`, `districtsname`, `cityid`) VALUES
(1, 'Arjawinangun', 1),
(2, 'Astanajapura', 1),
(3, 'Babakan', 1),
(4, 'Beber', 1),
(5, 'Ciledug', 1),
(6, 'Ciwaringin', 1),
(7, 'Depok', 1),
(8, 'Dukupuntang', 1),
(9, 'Gebang', 1),
(10, 'Gegesik', 1),
(11, 'Gempol', 1),
(12, 'Greged / Greget', 1),
(13, 'Gunung Jati / Cirebon Utara', 1),
(14, 'Jamblang', 1),
(15, 'Kaliwedi', 1),
(16, 'Kapetakan', 1),
(17, 'Karangsembung', 1),
(18, 'Karangwareng', 1),
(19, 'Kedawung', 1),
(20, 'Klangenan', 1),
(21, 'Lemahabang', 1),
(22, 'Losari', 1),
(23, 'Mundu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `educationlevel`
--

CREATE TABLE IF NOT EXISTS `educationlevel` (
`ideducationlevel` int(11) NOT NULL,
  `educationlevelname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `educationlevel`
--

INSERT INTO `educationlevel` (`ideducationlevel`, `educationlevelname`, `status`) VALUES
(1, 'SD', 0),
(2, 'SMP', 0),
(3, 'SMA/SMK', 0),
(4, 'D1', 0),
(5, 'D2', 0),
(6, 'D3', 0),
(7, 'S1', 0),
(8, 'S2', 0),
(9, 'S3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`idemployee` int(11) NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `identityno` varchar(50) DEFAULT NULL,
  `employeename` varchar(50) DEFAULT NULL,
  `nickname` varchar(35) DEFAULT NULL,
  `placebirth` varchar(50) DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `maritalstatus` varchar(50) DEFAULT NULL,
  `staffstatusid` int(11) NOT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `blood` varchar(50) DEFAULT NULL,
  `joindate` date DEFAULT NULL,
  `termdate` date DEFAULT NULL,
  `insuranceno` varchar(50) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `positionid` int(11) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `departmentid` int(11) DEFAULT NULL,
  `taxstatus` varchar(10) DEFAULT NULL,
  `educationlevelid` int(11) DEFAULT NULL,
  `majorid` int(11) DEFAULT NULL,
  `locationid` int(11) DEFAULT NULL,
  `basic` double DEFAULT NULL,
  `postall` double DEFAULT NULL,
  `allowance` double DEFAULT NULL,
  `image` text,
  `employeestatusid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `dateemployee` date NOT NULL,
  `daytypeid` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`idemployee`, `nik`, `identityno`, `employeename`, `nickname`, `placebirth`, `datebirth`, `address`, `maritalstatus`, `staffstatusid`, `sex`, `blood`, `joindate`, `termdate`, `insuranceno`, `npwp`, `positionid`, `cityid`, `departmentid`, `taxstatus`, `educationlevelid`, `majorid`, `locationid`, `basic`, `postall`, `allowance`, `image`, `employeestatusid`, `status`, `dateemployee`, `daytypeid`) VALUES
(1, '-', '-', 'Anastasia', 'Anastasia', 'Kuningan', '1994-12-25', 'Desa Setia Negara', '1', 0, '2', '', '0000-00-00', '0000-00-00', '', '', 2, 1, 2, NULL, 0, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0),
(2, '-', '-', 'Rohman', 'Rohman', '', '0000-00-00', '', '1', 0, '1', '', '0000-00-00', '0000-00-00', '', '', 1, 1, 2, NULL, 0, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0),
(3, '-', '-', 'Imam', 'Imam', '', '0000-00-00', '', '2', 0, '1', '', '0000-00-00', '0000-00-00', '', '', 1, 0, 2, NULL, 0, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0),
(4, '-', '-', 'Adit', 'Adit', '', '0000-00-00', '', '1', 0, '1', '', '0000-00-00', '0000-00-00', '', '', 1, 0, 2, NULL, 0, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0),
(5, '-', '-', 'Rizal', 'Rizal', '', '0000-00-00', '', '1', 0, '1', '', '0000-00-00', '0000-00-00', '', '', 1, 0, 2, NULL, 0, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0),
(6, '-', '-', 'Ana', 'Ana', '', '0000-00-00', '', '1', 0, '2', '', '0000-00-00', '0000-00-00', '', '', 2, 0, 2, NULL, 0, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employeeeducation`
--

CREATE TABLE IF NOT EXISTS `employeeeducation` (
`idemployeeeducation` int(11) NOT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `educationtypeid` int(50) DEFAULT NULL,
  `employeeeducationname` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `majorid` int(11) DEFAULT NULL,
  `yearfrom` varchar(15) DEFAULT NULL,
  `yearto` int(11) DEFAULT NULL,
  `gpa` varchar(5) DEFAULT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employeefamily`
--

CREATE TABLE IF NOT EXISTS `employeefamily` (
`idemployeefamily` int(11) NOT NULL,
  `employeeid` int(11) NOT NULL,
  `familyname` varchar(100) DEFAULT NULL,
  `placebirth` varchar(50) DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `lasteducation` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `medicalprotection` varchar(100) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `sex` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employeejobexperience`
--

CREATE TABLE IF NOT EXISTS `employeejobexperience` (
`idemployeejobexperience` int(11) NOT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `yearfrom` varchar(15) DEFAULT NULL,
  `yearto` varchar(15) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `usinesstype` varchar(50) DEFAULT NULL,
  `positionid` int(11) DEFAULT NULL,
  `reportto` int(11) DEFAULT NULL,
  `lastsalary` int(11) DEFAULT NULL,
  `sparationtype` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employeestatus`
--

CREATE TABLE IF NOT EXISTS `employeestatus` (
`idemployeestatus` int(11) NOT NULL,
  `employeestatusname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
`idevent` int(11) NOT NULL,
  `programid` int(11) NOT NULL,
  `eventname` varchar(225) NOT NULL,
  `desc` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`idevent`, `programid`, `eventname`, `desc`) VALUES
(1, 1, 'Kegiatan Penyediaan jasa surat menyurat- K  ', ''),
(2, 2, 'Kegiatan Penyediaan jasa komunikasi, Sumber Daya Air dan Listrik- K  ', ''),
(3, 3, 'Kegiatan Penyediaan Jasa Administrasi Keuangan- K  ', ''),
(4, 4, 'Kegiatan Penyediaan Jasa Kebersihan Kantor- K  ', ''),
(5, 5, 'Kegiatan Penyediaan Alat Tulis Kantor- K  ', ''),
(6, 6, 'Kegiatan Penyediaan Barang Cetakan dan Penggandaan- K  ', ''),
(7, 7, 'Kegiatan Penyediaan Komponen Instalasi Air,Listrik/Penerangan Bangunan Kantor- K  ', ''),
(8, 8, 'Kegiatan Penyediaan Bahan Bacaan dan Peraturan Perundang-Undangan- K  ', ''),
(9, 9, 'Kegiatan Penyediaan Makanan dan Minuman- K  ', ''),
(10, 10, 'Kegiatan Rapat-Rapat Koordinasi dan Konsultasi ke Luar Daerah- K  ', ''),
(11, 11, 'Kegiatan Pembangunan Gedung Kantor- K  ', ''),
(12, 12, 'Kegiatan Pengadaan Kendaraan Dinas/Operasional- K  ', ''),
(13, 13, 'Kegiatan Pengadaan Peralatan Gedung Kantor- K  ', ''),
(14, 14, 'Kegiatan Pengadaan Komputer- K  ', ''),
(15, 15, 'Kegiatan Pemeliharaan Rutin/Berkala Gedung Kantor- K  ', ''),
(16, 16, 'Kegiatan Pemeliharaan Rutin/Berkala Kendaraan Dinas/Operasional- K  ', ''),
(17, 17, 'Kegiatan Pemeliharaan Rutin/Berkala Peralatan Gedung Kantor- K  ', ''),
(18, 18, 'Kegiatan Pemeliharaan Rutin/Berkala Mebeleur- K  ', ''),
(19, 19, 'Kegiatan Rehabilitasi sedang/berat rumah jabatan- K  ', ''),
(20, 1, 'Kegiatan Rehabilitasi sedang/berat gedung kantor- K  ', ''),
(21, 2, 'Kegiatan Peningkatan Sarana dan Prasarana Pelatihan Konstruksi- K  ', ''),
(22, 3, 'Kegiatan Pengadaan Pakaian Dinas Beserta Perlengkapannya- K  ', ''),
(23, 4, 'Kegiatan Pendidikan dan Pelatihan Formal- K  ', ''),
(24, 5, 'Kegiatan Koordinasi dan Sinkronisasi Program Infrastruktur Bidang Pekerjaan Umum Provinsi Jambi- K  ', ''),
(25, 6, 'Kegiatan Pembinaan Teknik Sumber Daya Apratur Bidang Ke-PU-an- K  ', ''),
(26, 7, 'Kegiatan Penyusunan Laporan Capaian Kinerja dan Ikhtisar Realisasi Kinerja SKPD- K  ', ''),
(27, 8, 'Kegiatan Penyusunan Harga Dasar Satuan Upah, Bahan dan Alat- K  ', ''),
(28, 9, 'Kegiatan Pengelolaan Aset Dinas PU Provinsi Jambi- K  ', ''),
(29, 10, 'Kegiatan Optimalisasi Pelayanan, Pengembangan sistem Informasi, Komunikasi dan Kehumasan- K  ', ''),
(30, 11, 'Kegiatan Analisa Jabatan Dinas Pekerjaan Umum Provinsi Jambi- K  ', ''),
(31, 12, 'Kegiatan Penyusunan Dokumen Rencana Umum dan Strategis Potensi Pengembangan Infrastruktur Wilayah Dan Kawasan- K  ', ''),
(32, 13, 'Kegiatan Penyusunan Norma Standar dan Kriteria Pengembangan Infrastruktur Wilayah dan Kawasan - K  ', ''),
(33, 14, 'Kegiatan Fasilitasi dan Koordinasi Perencanaan dan Pemprograman Pengembangan Infrastruktur Wilayah dan Kawasan- K  ', ''),
(34, 15, 'Kegiatan Penguatan NSPM dan Pengembangan Data Infrastruktur Bidang Ke-PU-an - K  ', ''),
(35, 16, 'Kegiatan Pengelolaan Informasi Infrastruktur Wilayah Bidang Ke-PU-an - K  ', ''),
(36, 17, 'Kegiatan Peyelenggarakan Pengembangan Infrastruktur Wilayah dan Kawasan- K  ', ''),
(37, 18, 'Kegiatan Fasilitas dan Kordinasi Penyelenggaraan Pengembangan Infrastruktur Wilayah dan Kawasan- K  ', ''),
(38, 19, 'Kegiatan Pengendalian/Supervisi Admintrasi Teknis dan Finalisasi Kegiatan Bidang Ke-PU-an- K  ', ''),
(39, 1, 'Kegiatan Monitoring dan Evaluasi Keterpaduan Penyelenggaraan Pengembangan Infrastruktur Wilayah dan Kawasan- K  ', ''),
(40, 2, 'Kegiatan Monitoring dan Evalausi Kegiatan Infrastruktur Bidang Ke-PU-an- K  ', ''),
(41, 3, 'Kegiatan Peningkatan Jalan Diwilayah I- K  ', ''),
(42, 4, 'Kegiatan Peningkatan Jalan Diwilayah II- K  ', ''),
(43, 5, 'Kegiatan Peningkatan Jalan Diwilayah III- K  ', ''),
(44, 6, 'Kegiatan Peningkatan Jalan Diwilayah IV- K  ', ''),
(45, 7, 'Kegiatan Peningkatan Jalan Diwilayah V- K  ', ''),
(46, 8, 'Kegiatan Peningkatan Jalan Diwilayah VI- K  ', ''),
(47, 9, 'Kegiatan Peningkatan Jalan Diwilayah VII- K  ', ''),
(48, 10, 'Kegiatan Peningkatan Jalan Diwilayah VIII- K  ', ''),
(49, 11, 'Kegiatan Peningkatan Jalan Diwilayah IX- K  ', ''),
(50, 12, 'Kegiatan Peningkatan Jalan Diwilayah Kota Jambi- K  ', ''),
(51, 13, 'Kegiatan Pembangunan Drainase Penunjang Jalan Provinsi- K  ', ''),
(52, 14, 'Kegiatan Monitoring, evaluasi, dan pelaporan Jalan dan Jembatan- K  ', ''),
(53, 15, 'Kegiatan Pembebasan Lahan untuk Jalan dan Jembatan- K  ', ''),
(54, 16, 'Kegiatan Rehap/Pemeliharaan Jalan Provinsi Jambi- K  ', ''),
(55, 17, 'Kegiatan Pengawasan Teknis Jalan- K  ', ''),
(56, 18, 'Kegiatan Perencanaan Teknis Jalan- K  ', ''),
(57, 19, 'Kegiatan Pembangunan Jembatan di Kab. Tanjabbar dan Kab. Tanjab Timur- K  ', ''),
(58, 1, 'Kegiatan Pembangunan Jembatan di Kab. Muara Jambi dan Kab. Batanghari- K  ', ''),
(59, 2, 'Kegiatan Pembangunan Jembatan di Kab. Sarolangun dan Merangin- K  ', ''),
(60, 3, 'Kegiatan Pembangunan Jembatan di Kab. Kerinci- K  ', ''),
(61, 4, 'Kegiatan Pembangunan Jembatan di Kota Jambi- K  ', ''),
(62, 5, 'Kegiatan Rehab/Pemeliharaan Jembatan Provinsi Jambi- K  ', ''),
(63, 6, 'Kegiatan Pengawasan Teknis Jembatan- K  ', ''),
(64, 7, 'Kegiatan Perencanaan Teknis Jembatan- K  ', ''),
(65, 8, 'Kegiatan Pembangunan Jembatan Kabupaten Bungo dan Tebo- K  ', ''),
(66, 9, 'Kegiatan Pembangunan saluran drainase sekunder/gorong-gorong- K  ', ''),
(67, 10, 'Kegiatan Fasilitas Pembangunan Prasarana dan Saranba Dasar Pemukiman Berbasis Masyarakat- K  ', ''),
(68, 11, 'Kegiatan Monitoring, Evaluasi dan Pelaporan Bidang Cipta Karya- K  ', ''),
(69, 12, 'Kegiatan Pengadaan alat-alat berat- K  ', ''),
(70, 13, 'Kegiatan Rehabilitasi/Pemeliharaan Alat-alat Berat- K  ', ''),
(71, 14, 'Kegiatan Rehabilitasi/pemeliharaan alat-alat ukur dan bahan laboratorium ke-PU-an- K  ', ''),
(72, 15, 'Kegiatan Optimalisasi Penggunaan Alat - alat Berat- K  ', ''),
(73, 16, 'Kegiatan Perencanaan, Pengawasan, dan Pelaporan Optimalisasi pengunaan alat-alat berat- K  ', ''),
(74, 17, 'Kegiatan Pengelolaan Logistik dan Perbekalan- K  ', ''),
(75, 18, 'Kegiatan Ketatausahaan- K  ', ''),
(76, 19, 'Kegiatan Optimalisasi peralatan dan bahan penunjang laboratorium ke-PU-an- K  ', ''),
(77, 1, 'Kegiatan Peningkatan peran dan fungsi laboratorium uji bidang ke-PU-an- K  ', ''),
(78, 2, 'Kegiatan Perencanaan pembangunan jaringan irigasi- K  ', ''),
(79, 3, 'Kegiatan Rehabilitasi/pemeliharaan jaringan irigasi- K  ', ''),
(80, 4, 'Kegiatan Optimalisasi-Rehabilitasi/pemeliharaan jaringan irigasi yang telah dibangun- K  ', ''),
(81, 5, 'Kegiatan Pembangunan jaringan irigasi- K  ', ''),
(82, 6, 'Kegiatan Rehabilitasi/pemeliharaan jaringan rawa- K  ', ''),
(83, 7, 'Kegiatan Pembangunan sumur air tanah/air baku- K  ', ''),
(84, 8, 'Kegiatan Pembangunan/Rehabilitasi Danau/Waduk/Embung- K  ', ''),
(85, 9, 'Kegiatan Operasional dan pemeliharaan danau/waduk/embung- K  ', ''),
(86, 10, 'Kegiatan Perencanaan sumber air baku- K  ', ''),
(87, 11, 'Kegiatan Pembangunan jaringan air bersih/air minum- K  ', ''),
(88, 12, 'Kegiatan Perencanaan Penyediaan sarana dan prasarana air bersih- K  ', ''),
(89, 13, 'Kegiatan Perencanaan turap/talud/bronjong- K  ', ''),
(90, 14, 'Kegiatan Pembangunan turap/talud/bronjong wilayah I- K  ', ''),
(91, 15, 'Kegiatan Operasional dan pemeliharaan prasarana pengendalian banjir- K  ', ''),
(92, 16, 'Kegiatan Peningkatan pembersihan dan pengerukan sungai/kali- K  ', ''),
(93, 17, 'Kegiatan Sosialisasi dan Diseminasi Peraturan Perundangan Jasa Konstruksi- K  ', ''),
(94, 18, 'Kegiatan Pembinaan Aparatur dan SDM Jasa Konstruksi- K  ', ''),
(95, 19, 'Kegiatan Sistem Informasi Pembinaan Jasa Konstruksi Provinsi Jambi- K  ', ''),
(96, 1, 'Kegiatan Bimbingan Teknis Izin Usaha Jasa Konstruksi (IUJK)- K  ', ''),
(97, 2, 'Kegiatan Rapat Koordinasi Daerah Tim Pembina Jasa Konstruksi- K  ', ''),
(98, 3, 'Kegiatan Forum Jasa Konstruksi Daerah- K  ', ''),
(99, 4, 'Kegiatan Bimbingan Teknis Sistem Manajemen Kesehatan dan Keselamatan Kerja Konstruksi- K  ', ''),
(100, 5, 'Kegiatan Bimbingan Teknis Penanggung Jawab Teknis Badan Usaha- K  ', ''),
(101, 6, 'Kegiatan Bimbingan Teknis Jasa Konstruksi- K  ', ''),
(102, 7, 'Kegiatan Monitoring dan Evaluasi Pembinaan Jasa Konstruksi Kab/Kota- K  ', ''),
(103, 8, 'Kegiatan Koordinasi, Konsultasi dan Sinkronisasi Program Pembinaan jasa konstruksi- K  ', ''),
(104, 9, 'Kegiatan Penilaian Kinerja Pemerintah Daerah Bidang PU Jasa Konstruksi- K  ', ''),
(105, 10, 'Kegiatan Pembekalan Pelatihan dan Fasilitasi Uji Kompetensi- K  ', ''),
(106, 11, 'Kegiatan Pelatihan Konstruksi Keliling- K  ', ''),
(107, 12, 'Kegiatan Perlombaan konstruksi tingkat daerah dan nasional- K  ', ''),
(108, 13, 'Kegiatan Pembangunan Rumah Susun- K  ', ''),
(109, 14, 'Kegiatan Bantuan Stimulan Prasarana Sarana dan Utilitas (PSU) Perumahan Formal- K  ', ''),
(110, 15, 'Kegiatan Perencanaan dan Pengawasan Bidang Perumahan- K  ', ''),
(111, 16, 'Kegiatan Pembangunan sarana, prasarana, dan utilitas (PSU) lintas kab/kota- K  ', ''),
(112, 17, 'Kegiatan Pembangunan sarana, prasarana, dan utilitas (PSU) kawasan strategis- K  ', ''),
(113, 18, 'Kegiatan Pembangunan sarana, prasarana, dan utilitas (PSU) terpadu mandiri- K  ', ''),
(114, 19, 'Kegiatan Pembangunan sarana, prasarana, dan utilitas (PSU) Perkampungan nelayan- K  ', ''),
(115, 1, 'Kegiatan Pembangunan kawasan tertinggal dan pasca bencana- K  ', ''),
(116, 2, 'Kegiatan Monitoring dan Evaluasi kegiatan ke-PU-an bidang perumahan- K  ', ''),
(117, 3, 'Kegiatan Sosialisasi dan penyusunan data dan informasi perumahan dan kawasan permukiman- K  ', ''),
(118, 4, 'Kegiatan Penyediaan sarana dan prasarana Sanitasi- K  ', ''),
(119, 5, 'Kegiatan Perencanaan sarana dan prasarana Sanitasi- K  ', '');

-- --------------------------------------------------------

--
-- Table structure for table `expeditiontype`
--

CREATE TABLE IF NOT EXISTS `expeditiontype` (
  `idexpeditiontype` int(11) NOT NULL,
  `expeditiontypename` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goodreceive`
--

CREATE TABLE IF NOT EXISTS `goodreceive` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(11) NOT NULL,
  `notrans` varchar(50) DEFAULT NULL,
  `datetrans` date DEFAULT NULL,
  `supplierid` int(11) NOT NULL,
  `paydue` double NOT NULL,
  `currency` varchar(10) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `apinvoiceid` int(11) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `goodreceivedet`
--

CREATE TABLE IF NOT EXISTS `goodreceivedet` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `unitprice` double NOT NULL,
  `discount` int(11) NOT NULL,
  `amount` double NOT NULL,
  `quantity` double NOT NULL,
  `sizeid` int(11) NOT NULL,
  `colorid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `purchaseorddetid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `icon`
--

CREATE TABLE IF NOT EXISTS `icon` (
`idicon` int(11) NOT NULL,
  `iconname` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `icon`
--

INSERT INTO `icon` (`idicon`, `iconname`) VALUES
(1, 'fa-500px'),
(2, 'fa-amazon'),
(3, 'fa-balance-scale'),
(4, 'fa-battery-0 (alias)'),
(5, 'fa-battery-1 (alias)'),
(6, 'fa-battery-2 (alias)'),
(7, 'fa-battery-3 (alias)'),
(8, 'fa-battery-4 (alias)'),
(9, 'fa-battery-empty'),
(10, 'fa-battery-full'),
(11, 'fa-battery-half'),
(12, 'fa-battery-quarter'),
(13, 'fa-battery-three-quarters'),
(14, 'fa-black-tie'),
(15, 'fa-calendar-check-o'),
(16, 'fa-calendar-minus-o'),
(17, 'fa-calendar-plus-o'),
(18, 'fa-calendar-times-o'),
(19, 'fa-cc-diners-club'),
(20, 'fa-cc-jcb fa-chrome'),
(21, 'fa-clone fa-commenting'),
(22, 'fa-commenting-o'),
(23, 'fa-contao'),
(24, 'fa-creative-commons'),
(25, 'fa-expeditedssl'),
(26, 'fa-firefox'),
(27, 'fa-fonticons'),
(28, 'fa-genderless'),
(29, 'fa-get-pocket'),
(30, 'fa-gg'),
(31, 'fa-gg-circle'),
(32, 'fa-hand-grab-o (alias)'),
(33, 'fa-hand-lizard-o'),
(34, 'fa-hand-paper-o'),
(35, 'fa-hand-peace-o'),
(36, 'fa-hand-pointer-o'),
(37, 'fa-hand-rock-o'),
(38, 'fa-hand-scissors-o'),
(39, 'fa-hand-spock-o'),
(40, 'fa-hand-stop-o (alias)'),
(41, 'fa-hourglass'),
(42, 'fa-hourglass-1 (alias)'),
(43, 'fa-hourglass-2 (alias)'),
(44, 'fa-hourglass-3 (alias)'),
(45, 'fa-hourglass-end'),
(46, 'fa-hourglass-half'),
(47, 'fa-hourglass-o'),
(48, 'fa-hourglass-start'),
(49, 'fa-houzz fa-i-cursor'),
(50, 'fa-industry'),
(51, 'fa-internet-explorer'),
(52, 'fa-map'),
(53, 'fa-map-o'),
(54, 'fa-map-pin'),
(55, 'fa-map-signs'),
(56, 'fa-mouse-pointer'),
(57, 'fa-object-group'),
(58, 'fa-object-ungroup'),
(59, 'fa-odnoklassniki'),
(60, 'fa-odnoklassniki-square'),
(61, 'fa-opencart'),
(62, 'fa-opera'),
(63, 'fa-optin-monster'),
(64, 'fa-registered'),
(65, 'fa-safari'),
(66, 'fa-sticky-note'),
(67, 'fa-sticky-note-o'),
(68, 'fa-television'),
(69, 'fa-trademark'),
(70, 'fa-tripadvisor'),
(71, 'fa-tv (alias)'),
(72, 'fa-vimeo'),
(73, 'fa-wikipedia-w'),
(74, 'fa-y-combinator'),
(75, 'fa-yc (alias)');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
`idinventory` int(11) NOT NULL,
  `inventorycode` varchar(25) NOT NULL,
  `inventoryname` varchar(100) NOT NULL,
  `spec` varchar(255) NOT NULL,
  `size` varchar(25) NOT NULL,
  `inventorybrandcode` varchar(11) NOT NULL,
  `salesunit` varchar(10) NOT NULL DEFAULT '0',
  `purchaseunit` varchar(25) NOT NULL,
  `stockunit` varchar(10) NOT NULL,
  `packunit` varchar(10) NOT NULL,
  `inventorygroupid` int(11) NOT NULL DEFAULT '0',
  `barcode` varchar(100) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `inventorytypeid` int(11) NOT NULL DEFAULT '0',
  `unitprice` double NOT NULL DEFAULT '0',
  `floorprice` double NOT NULL DEFAULT '0',
  `endingstock` double NOT NULL DEFAULT '0',
  `bookingstockqty` double NOT NULL,
  `remainstockqty` double NOT NULL,
  `inventorydate` date DEFAULT NULL,
  `remark` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `description` varchar(50) NOT NULL,
  `viewed` int(11) NOT NULL DEFAULT '0',
  `bestbuy` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL DEFAULT '0',
  `inventorybrandid` int(11) DEFAULT NULL,
  `inventorycolorid` int(11) DEFAULT NULL,
  `inventorysizeid` int(11) NOT NULL,
  `pick` bit(1) DEFAULT NULL,
  `pickstock` bit(1) NOT NULL DEFAULT b'0',
  `pickstockqty` double NOT NULL,
  `stockupl` double DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=573 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`idinventory`, `inventorycode`, `inventoryname`, `spec`, `size`, `inventorybrandcode`, `salesunit`, `purchaseunit`, `stockunit`, `packunit`, `inventorygroupid`, `barcode`, `weight`, `inventorytypeid`, `unitprice`, `floorprice`, `endingstock`, `bookingstockqty`, `remainstockqty`, `inventorydate`, `remark`, `status`, `description`, `viewed`, `bestbuy`, `discount`, `inventorybrandid`, `inventorycolorid`, `inventorysizeid`, `pick`, `pickstock`, `pickstockqty`, `stockupl`) VALUES
(10, '06141GN5505', 'CAM CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 41000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(11, '06141KRS505', 'CAM CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 42000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(14, '06141KWB505', 'CAM CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 47500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(15, '061A1KEH002', 'GASKET KIT A', '', '', '', '0', '', '', '', 0, '', '', 0, 55000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(16, '061B1KEH002', 'GASKET KIT B', '', '', '', '0', '', '', '', 0, '', '', 0, 57000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(17, '06381KZR600', 'ROD KIT CONNECTING', '', '', '', '0', '', '', '', 0, '', '', 0, 155000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(18, '06401K15900', 'DRIVE CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 277000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(19, '06401K41N01', 'DRIVE CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 155000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(20, '06401KEV881', 'DRIVE CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 170000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(21, '06401KPH881', 'DRIVE CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 145000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(22, '06401KTL700', 'DRIVE CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 170000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(23, '06401KWB900', 'DRIVE CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 156000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(29, '06401KWC900', 'DRIVE CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 268000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(30, '06401KWW900', 'DRIVE CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 144500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(31, '06401KYE900', 'DRIVE CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 266000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(32, '06401KYZ900', 'DRIVE CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 170000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(33, '06435K07901', 'PAD SET RR', '', '', '', '0', '', '', '', 0, '', '', 0, 43500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(34, '06435KPP901', 'PAD SET RR', '', '', '', '0', '', '', '', 0, '', '', 0, 43000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(35, '06435KWC901', 'PAD SET RR', '', '', '', '0', '', '', '', 0, '', '', 0, 50000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(36, '06455KPP901', 'PAD SET FR', '', '', '', '0', '', '', '', 0, '', '', 0, 44000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(37, '06455KPPN01', 'PAD SET FR', '', '', '', '0', '', '', '', 0, '', '', 0, 55000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(38, '06455KR3404', 'PAD SET FR (NA)', '', '', '', '0', '', '', '', 0, '', '', 0, 46000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(39, '06455KVB401', 'PAD SET FR (NA)', '', '', '', '0', '', '', '', 0, '', '', 0, 48500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(40, '06455KVBT01', 'PAD SET FR', '', '', '', '0', '', '', '', 0, '', '', 0, 51000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(41, '06455KWB601', 'PAD SET FR', '', '', '', '0', '', '', '', 0, '', '', 0, 46000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(42, '06455KWC901', 'PAD SET FR', '', '', '', '0', '', '', '', 0, '', '', 0, 53000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(46, '06455KYE901', 'PAD SET FR', '', '', '', '0', '', '', '', 0, '', '', 0, 46500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(47, '6535041010', 'RACE STEERING KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 90000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(48, '06535KTR900', 'RACE STEERING KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 90000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(60, '07342006000N', 'TRQUE WRNCH DB25N-S', '', '', '', '0', '', '', '', 0, '', '', 0, 1873000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(61, '07600KL17510', 'PLASTIC HAMMER', '', '', '', '0', '', '', '', 0, '', '', 0, 199000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(62, '07600KLH1677', 'ELECT. DRIVER (+) 200', '', '', '', '0', '', '', '', 0, '', '', 0, 29000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(63, '08000K18SLV', 'ACC KIT VERZA SILVER', '', '', '', '0', '', '', '', 0, '', '', 0, 240000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(64, '08000KZLGBLUE', 'PAKET ACC SPACY BIRU', '', '', '', '0', '', '', '', 0, '', '', 0, 351000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(65, '08000KZLGSLV', 'PAKET ACC SPACY SILVER', '', '', '', '0', '', '', '', 0, '', '', 0, 351000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(66, '0800AK45000', 'KIT A CBR150R', '', '', '', '0', '', '', '', 0, '', '', 0, 250000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(67, '0800AK56F00', 'KITA A NEW SUPRA 150 GTR', '', '', '', '0', '', '', '', 0, '', '', 0, 525000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(68, '082322MBK8JN1', 'SCOOTER GEAR OIL (120ML) IDE', '', '', '', '0', '', '', '', 0, '', '', 0, 12000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(69, '08232M99K1JN1', 'OLI MPX2 10W30 0,8L IDE', '', '', '', '0', '', '', '', 0, '', '', 0, 39500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(70, '08232M99K8JN1', 'OLI MPX1 10W30 1L', '', '', '', '0', '', '', '', 0, '', '', 0, 44500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(71, '08232M99K8JN9', 'OLI MPX1 10W30 0,8L', '', '', '', '0', '', '', '', 0, '', '', 0, 37500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(72, '082342MBK8JN0', 'OLI SPX2 10W30 0,8L REP', '', '', '', '0', '', '', '', 0, '', '', 0, 47500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(73, '08234M99K0JN9', 'OLI SPX1 10W30 0,8L REP', '', '', '', '0', '', '', '', 0, '', '', 0, 46500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(74, '08234M99K1JN9', 'OLI SPX1 10W30 1L REP', '', '', '', '0', '', '', '', 0, '', '', 0, 52500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(75, '08500M99K8JN1', 'OLI MPX1 10W30 1,2L IDE', '', '', '', '0', '', '', '', 0, '', '', 0, 52500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(76, '08CLAH50500', 'HONDA M/C GENUINE COOLANT', '', '', '', '0', '', '', '', 0, '', '', 0, 17500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(77, '08F80K56F00', 'COVER ENGINE GTR', '', '', '', '0', '', '', '', 0, '', '', 0, 155000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(78, '08F88K61RED', 'GARNISH CVR MUFFLER RED', '', '', '', '0', '', '', '', 0, '', '', 0, 115000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(79, '08F88K61SLV', 'GARNISH CVR MUFFLER SLV', '', '', '', '0', '', '', '', 0, '', '', 0, 115000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(80, '08R00K56F00', 'HAND REST GRIP GTR', '', '', '', '0', '', '', '', 0, '', '', 0, 77000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(81, '08S10K56F00', 'WIND SHIELD GTR', '', '', '', '0', '', '', '', 0, '', '', 0, 340000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(82, '08Z50KVY720B', 'BEAT MACHO BLACK RED', '', '', '', '0', '', '', '', 0, '', '', 0, 380000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(83, '1110-94', 'SPOKE SET', '', '', '', '0', '', '', '', 0, '', '', 0, 22000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(84, '12191KWB921', 'GASKET CYLINDER', '', '', '', '0', '', '', '', 0, '', '', 0, 8000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(85, '12251K15900', 'GASKET,CYLINDER HEAD', '', '', '', '0', '', '', '', 0, '', '', 0, 23000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(86, '12361035000', 'CAP TAPPET', '', '', '', '0', '', '', '', 0, '', '', 0, 8000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(87, '12391KRM840', 'GASKET HEAD COVER', '', '', '', '0', '', '', '', 0, '', '', 0, 11000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(88, '12391KWB600', 'GASKET, HEAD COVER', '', '', '', '0', '', '', '', 0, '', '', 0, 187000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(89, '131A5KVB930', 'PISTON KIT (1.00)', '', '', '', '0', '', '', '', 0, '', '', 0, 97000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(93, '14401KPH901', 'CHAIN CAM', '', '', '', '0', '', '', '', 0, '', '', 0, 78000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(94, '14401KYZ900', 'CHAIN CAM 88L', '', '', '', '0', '', '', '', 0, '', '', 0, 32500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(95, '14520KCT692', 'LIFTER ASSY,TENS', '', '', '', '0', '', '', '', 0, '', '', 0, 497000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(96, '16016KVBS51', 'SCREW SET', '', '', '', '0', '', '', '', 0, '', '', 0, 40000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(97, '16201KVB900', 'GASKET CARB INSULATOR', '', '', '', '0', '', '', '', 0, '', '', 0, 1700, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(98, '17200K25SLV', 'GARNISH CVR A/C SILVER', '', '', '', '0', '', '', '', 0, '', '', 0, 65000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(99, '17205GN5900', 'ELEMENT CLEANER', '', '', '', '0', '', '', '', 0, '', '', 0, 21000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(123, '17210K16900', 'ELEMENT COMP., AIR CLEANER', '', '', '', '0', '', '', '', 0, '', '', 0, 45000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(124, '17210KPH900', 'ELEMENT COMP A/C', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(125, '17210KVB930', 'ELEMENT COMP A/C', '', '', '', '0', '', '', '', 0, '', '', 0, 52000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(126, '17210KVY960', 'ELEMENT COMP A/C', '', '', '', '0', '', '', '', 0, '', '', 0, 52000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(127, '17210KWB920', 'ELEMENT COMP A/C', '', '', '', '0', '', '', '', 0, '', '', 0, 35000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(128, '17210KYZ900', 'ELEMENT COMP, AIR/C', '', '', '', '0', '', '', '', 0, '', '', 0, 45000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(129, '17210KZLA00', 'ELEMENT COMP A/C', '', '', '', '0', '', '', '', 0, '', '', 0, 51500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(130, '17210KZR600', 'ELEMENT COMP, AIR CLEANER', '', '', '', '0', '', '', '', 0, '', '', 0, 52000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(131, '17211KYE900', 'ELEMENT COMP A/C', '', '', '', '0', '', '', '', 0, '', '', 0, 21000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(132, '17231KZLA00', 'COVER A/C', '', '', '', '0', '', '', '', 0, '', '', 0, 28000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(133, '17910K16901', 'CABLE COMP THROTTLE', '', '', '', '0', '', '', '', 0, '', '', 0, 61000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(134, '17910KVB904', 'CABLE COMP THROTTLE', '', '', '', '0', '', '', '', 0, '', '', 0, 70000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(135, '17950KPH900', 'CABLE COMP,CHOKE', '', '', '', '0', '', '', '', 0, '', '', 0, 16500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(136, '18318K25600ZA', 'PROTECTOR, MUFFLER TBLACK', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(137, '18318K25900', 'PROTECTOR, MUFFLER', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(138, '18318K59A10', 'PROTECTOR, MUFFLER', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(139, '18318KVBN50', 'PROTECTOR A MUFFLER', '', '', '', '0', '', '', '', 0, '', '', 0, 35000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(140, '18318KZL930', 'PROTECTOR MUFFLER', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(141, '18318KZR600', 'PROTECTOR, MUFFLER', '', '', '', '0', '', '', '', 0, '', '', 0, 33000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(142, '18421438670', 'RUBBER MUFFLER', '', '', '', '0', '', '', '', 0, '', '', 0, 2600, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(143, '18805KVY900', 'ELEMENT ASV A/C', '', '', '', '0', '', '', '', 0, '', '', 0, 3500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(144, '19150K59A10', 'COVER COMP., RADIATOR', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(145, '19217MAL300', 'SEAL MECHANICAL', '', '', '', '0', '', '', '', 0, '', '', 0, 51000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(146, '19510KVB900', 'FAN COMP COOLING', '', '', '', '0', '', '', '', 0, '', '', 0, 14000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(147, '22011GCC770', 'PIECE SLIDE', '', '', '', '0', '', '', '', 0, '', '', 0, 8000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(148, '22105KVB900', 'BOSS DRIVE FACE', '', '', '', '0', '', '', '', 0, '', '', 0, 17500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(152, '22105KVY960', 'BOSS DRIVE FACE', '', '', '', '0', '', '', '', 0, '', '', 0, 17000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(153, '22105KWN901', 'BOSS,DRIVE FACE', '', '', '', '0', '', '', '', 0, '', '', 0, 25000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(154, '22110KVY900', 'FACE COMP MOVEABLE DRIVE', '', '', '', '0', '', '', '', 0, '', '', 0, 60000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(155, '22123KWN900', 'ROLLER SET,WEIGHT', '', '', '', '0', '', '', '', 0, '', '', 0, 138000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(156, '2212AKWN900', 'ROLLER WEIGHT SET', '', '', '', '0', '', '', '', 0, '', '', 0, 56000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(157, '22132KWN900', 'PIECE,SLIDE', '', '', '', '0', '', '', '', 0, '', '', 0, 8000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(158, '22201107001', 'DISK CLUTCH', '', '', '', '0', '', '', '', 0, '', '', 0, 100000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(159, '22201166001', 'DISK CLUTCH', '', '', '', '0', '', '', '', 0, '', '', 0, 80000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(160, '22201MJ8001', 'DISK CLUTCH FRICTION', '', '', '', '0', '', '', '', 0, '', '', 0, 25000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(161, '2251725017NR00', 'TUBE TIRE (225/250-17)', '', '', '', '0', '', '', '', 0, '', '', 0, 28800, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(162, '22530KPH900', 'WEIGHT PRIM CLUTCH', '', '', '', '0', '', '', '', 0, '', '', 0, 134000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(163, '22804148000', 'RUBBER CLUTCH DUMPER', '', '', '', '0', '', '', '', 0, '', '', 0, 2000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(164, '22804GB2880', 'RUBBER CLUTCH DAMPER', '', '', '', '0', '', '', '', 0, '', '', 0, 3000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(165, '22870KCJ650', 'CABLE COMP,CLUTCH', '', '', '', '0', '', '', '', 0, '', '', 0, 34000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(166, '23100KVBBA0', 'BELT DRIVE KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 158000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(167, '23100KVYBA1', 'BELT DRIVE KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 123000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(168, '23100KZR601', 'BELT, DRIVE', '', '', '', '0', '', '', '', 0, '', '', 0, 139000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(169, '23200KVY960', 'FACE SET DRIVEN', '', '', '', '0', '', '', '', 0, '', '', 0, 170000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(170, '23224KVY900', 'FACE SET MOVEABLE DRIVEN', '', '', '', '0', '', '', '', 0, '', '', 0, 170000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(171, '2470AKPH880', 'PEDAL GEAR CHANGE ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 59000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(172, '2751430014NR00', 'TUBE, TIRE 2.75/3.00-14', '', '', '', '0', '', '', '', 0, '', '', 0, 32000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(173, '2751700000NR00', 'TUBE TIRE (2.75-17)', '', '', '', '0', '', '', '', 0, '', '', 0, 33700, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(174, '28230KVB902', 'GEAR COMP KICK SPINDLE', '', '', '', '0', '', '', '', 0, '', '', 0, 52500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(175, '28250KVB902', 'SPINDLE COMP KICK STARTER', '', '', '', '0', '', '', '', 0, '', '', 0, 95000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(176, '28281035003', 'SPRING KICK STARTER', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(177, '30700KPH881', 'CAP ASSY NOISE SUPPRESSOR', '', '', '', '0', '', '', '', 0, '', '', 0, 18500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(178, '30700KWW641', 'CAP ASSY NOISE SUPPRESSOR', '', '', '', '0', '', '', '', 0, '', '', 0, 34000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(179, '30700KZR602', 'CAP ASSY.NOISE SUPPRESSOR', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(180, '31500KPH881', 'BATTERY GTZ5S GS', '', '', '', '0', '', '', '', 0, '', '', 0, 224000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(181, '31500KZR602', 'BATTERY(GTZ6V)', '', '', '', '0', '', '', '', 0, '', '', 0, 269000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(182, '3150KGBGFM0', 'BATTERY GM5Z-3B KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 159500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(183, '31600KTMN01', 'REGULATOR REC COMP', '', '', '', '0', '', '', '', 0, '', '', 0, 235000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(184, '31600KVBN51', 'REGULATOR REC COMP', '', '', '', '0', '', '', '', 0, '', '', 0, 110000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(188, '31916KRM841', 'SPARK PLUG CPR8EA-9 (NG)', '', '', '', '0', '', '', '', 0, '', '', 0, 13000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(189, '31926KRM842', 'SPARK PLUG CPR9EA-9 (NG)', '', '', '', '0', '', '', '', 0, '', '', 0, 17500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(190, '31926KWB601', 'SPARK PLUG U20EPR9S (DS)', '', '', '', '0', '', '', '', 0, '', '', 0, 13800, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(191, '31928MFFD01', 'SPARK PLUG U24EPR9 (DS)', '', '', '', '0', '', '', '', 0, '', '', 0, 13000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(192, '33110K03N31', 'HEADLIGHT UNIT', '', '', '', '0', '', '', '', 0, '', '', 0, 99000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(193, '33110K15901', 'HEADLIGHT UNIT', '', '', '', '0', '', '', '', 0, '', '', 0, 242500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(194, '33110K41N01', 'HEADLIGHT UNIT', '', '', '', '0', '', '', '', 0, '', '', 0, 130000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(195, '33400KVY961', 'WINKER ASSY R FR', '', '', '', '0', '', '', '', 0, '', '', 0, 31000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(196, '33400KZR601', 'WINKER ASSY, R FR', '', '', '', '0', '', '', '', 0, '', '', 0, 42000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(197, '33450KCJ651', 'WINKER ASSY L FR', '', '', '', '0', '', '', '', 0, '', '', 0, 95000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(198, '33450KCJ661', 'WINKER ASSY L FR', '', '', '', '0', '', '', '', 0, '', '', 0, 85000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(199, '33701K25901', 'LENS COMP., TAILLIGHT', '', '', '', '0', '', '', '', 0, '', '', 0, 21000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(200, '34901KC5003', 'BULB HEADLIGHT', '', '', '', '0', '', '', '', 0, '', '', 0, 120000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(201, '34901KFVB51', 'BULB HEADLIGHT (12V 25/25W)', '', '', '', '0', '', '', '', 0, '', '', 0, 17000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(202, '34901KPH881', 'BULB HEADLIGHT', '', '', '', '0', '', '', '', 0, '', '', 0, 39000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(250, '34901KRS901', 'BULB HEADLIGHT', '', '', '', '0', '', '', '', 0, '', '', 0, 22500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(251, '34901KWR004', 'BULB HEADLIGHT', '', '', '', '0', '', '', '', 0, '', '', 0, 211500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(252, '34905GM9003', 'BULB WINKER', '', '', '', '0', '', '', '', 0, '', '', 0, 6000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(253, '34905KANW01', 'WB BULB (12V10W-YLT13)', '', '', '', '0', '', '', '', 0, '', '', 0, 12000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(254, '34906GB6921', 'BULB TAILLIGHT', '', '', '', '0', '', '', '', 0, '', '', 0, 10500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(255, '34908GA7701', 'BULB W BASE', '', '', '', '0', '', '', '', 0, '', '', 0, 4000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(256, '35010KVY960', 'KEY SET', '', '', '', '0', '', '', '', 0, '', '', 0, 200000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(257, '35150KPH880', 'SWITCH UNIT LIGHTING', '', '', '', '0', '', '', '', 0, '', '', 0, 32000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(258, '35160KPH881', 'SWITCH UNIT START', '', '', '', '0', '', '', '', 0, '', '', 0, 29000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(259, '35170KPH901', 'SWITCH UNIT DIMMER', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(260, '35170KYZ901', 'SWITCH UNIT DIMMER', '', '', '', '0', '', '', '', 0, '', '', 0, 15000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(261, '35180KPH881', 'SWITCH UNIT HORN', '', '', '', '0', '', '', '', 0, '', '', 0, 29000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(262, '38110GN5961', 'HORN COMP', '', '', '', '0', '', '', '', 0, '', '', 0, 40000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(263, '38110KTM851', 'HORN COMP (HIGH)', '', '', '', '0', '', '', '', 0, '', '', 0, 32000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(264, '38110KZLA01', 'HORN COMP (HIGH)', '', '', '', '0', '', '', '', 0, '', '', 0, 27500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(265, '38300KPH881', 'RELAY ASSY WINKER', '', '', '', '0', '', '', '', 0, '', '', 0, 60000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(266, '38501KVB901', 'RELAY COMP,START', '', '', '', '0', '', '', '', 0, '', '', 0, 36000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(267, '41241GB4770', 'DAMPER RR SET', '', '', '', '0', '', '', '', 0, '', '', 0, 10000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(271, '41241KB4005', 'BUSH DAMPER RR SET', '', '', '', '0', '', '', '', 0, '', '', 0, 26500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(272, '41241KFL851', 'DAMPER,RR WHEEL SET', '', '', '', '0', '', '', '', 0, '', '', 0, 14000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(273, '41241KWB602', 'DAMPER,RR WHEEL SET', '', '', '', '0', '', '', '', 0, '', '', 0, 16000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(274, '42711KVB930', 'TIRE, RR (90/90-14 FT235)', '', '', '', '0', '', '', '', 0, '', '', 0, 165000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(275, '42711KWB922', 'TIRE, RR (80/90-17 NR78Y)', '', '', '', '0', '', '', '', 0, '', '', 0, 198000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(276, '42711KWW010', 'TIRE, RR (80/90-17 FT138)', '', '', '', '0', '', '', '', 0, '', '', 0, 178000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(277, '43001K56F00', 'HAND GUARD GTR', '', '', '', '0', '', '', '', 0, '', '', 0, 340000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(278, '43111K56F00', 'REAR CARRIER GTR', '', '', '', '0', '', '', '', 0, '', '', 0, 375000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(279, '43125KGA902', 'SHOE COMP BRAKE (NA)', '', '', '', '0', '', '', '', 0, '', '', 0, 47500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(280, '43125KPH903', 'SHOE COMP BRAKE (NA)', '', '', '', '0', '', '', '', 0, '', '', 0, 33500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(281, '43130KZL930', 'BRAKE SHOE', '', '', '', '0', '', '', '', 0, '', '', 0, 46500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(282, '44711K59A12', 'TIRE FR (80/90-14 FT235)', '', '', '', '0', '', '', '', 0, '', '', 0, 185000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(283, '44711KPH881', 'TIRE, FR (2.50-17 FF135)', '', '', '', '0', '', '', '', 0, '', '', 0, 138000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(284, '44711KTM850', 'TIRE, FR (70/90-17 FT137)', '', '', '', '0', '', '', '', 0, '', '', 0, 138000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(285, '44711KVB930', 'TIRE, FR (80/90-14 FT235)', '', '', '', '0', '', '', '', 0, '', '', 0, 131000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(286, '44711KWB922', 'TIRE, FR (70/90-17 NF63B)', '', '', '', '0', '', '', '', 0, '', '', 0, 143000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(287, '44800KVB910', 'BOX SPEEDOMETER GEAR', '', '', '', '0', '', '', '', 0, '', '', 0, 65000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(288, '44830KEH600', 'CABLE ASSY SPEDOMETER', '', '', '', '0', '', '', '', 0, '', '', 0, 22000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(289, '44830KTL690', 'CABLE COMP SPEEDOMETER', '', '', '', '0', '', '', '', 0, '', '', 0, 24000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(290, '45120001011', 'BRAKE SHOE (NA)', '', '', '', '0', '', '', '', 0, '', '', 0, 32500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(291, '45251KCJ662', 'DISK FRONT BRAKE', '', '', '', '0', '', '', '', 0, '', '', 0, 215000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(292, '45530471832', '45530471831', '', '', '', '0', '', '', '', 0, '', '', 0, 68000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(293, '45530KET920', 'CYLINDER SET MASTER', '', '', '', '0', '', '', '', 0, '', '', 0, 68000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(294, '45530KVY911', 'CYLINDER SET MASTER', '', '', '', '0', '', '', '', 0, '', '', 0, 68000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(295, '50260KCJ660BNS', 'SHROUD R(BLK)', '', '', '', '0', '', '', '', 0, '', '', 0, 121000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(296, '50280KCJ660', 'SHROUD R INNER', '', '', '', '0', '', '', '', 0, '', '', 0, 6500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(297, '5061AK25900', 'COVER UNDER ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 46000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(298, '5062AK25600', 'COVER ASSY, UNDER', '', '', '', '0', '', '', '', 0, '', '', 0, 32000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(299, '50661KEV880', 'RUBBER STEP', '', '', '', '0', '', '', '', 0, '', '', 0, 10000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(300, '50661KWB600', 'RUBBER STEP', '', '', '', '0', '', '', '', 0, '', '', 0, 8300, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(301, '50705KVB900', 'STEP ASSY L PILLION', '', '', '', '0', '', '', '', 0, '', '', 0, 145000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(302, '50715KVB900', 'BRKT COMP R PILLION STEP', '', '', '', '0', '', '', '', 0, '', '', 0, 90000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(303, '507A3KRS690', 'PILLION STEP R KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 32000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(307, '507A4KRS690', 'PILLION STEP L KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 32000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(308, '51410KZLA01', 'PIPE COMP FR FORK', '', '', '', '0', '', '', '', 0, '', '', 0, 120000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(309, '51490GN5305', 'SEAL SET FR FORK', '', '', '', '0', '', '', '', 0, '', '', 0, 34000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(310, '51490KGH902', 'SEAL SET FR FORK', '', '', '', '0', '', '', '', 0, '', '', 0, 32000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(311, '51490KRM852', 'SEAL SET FR FORK', '', '', '', '0', '', '', '', 0, '', '', 0, 68500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(312, '52400K25901', 'CUSHION ASSY RR', '', '', '', '0', '', '', '', 0, '', '', 0, 192000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(313, '52400KVY961', 'CUSHION ASSY RR', '', '', '', '0', '', '', '', 0, '', '', 0, 207000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(314, '5240AKTM850ZB', 'CUSHION ASSY RR (SET)', '', '', '', '0', '', '', '', 0, '', '', 0, 337000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(315, '53105KPH950', 'WEIGHT A STRG HDL', '', '', '', '0', '', '', '', 0, '', '', 0, 9000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(316, '53175KVB930', 'LEVER R STRG HANDLE', '', '', '', '0', '', '', '', 0, '', '', 0, 74000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(317, '53175KWN901', 'LEVER,R STRG HNDL', '', '', '', '0', '', '', '', 0, '', '', 0, 98000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(318, '53178KVB930', 'LEVER L STRG HDL', '', '', '', '0', '', '', '', 0, '', '', 0, 40000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(319, '53178KVGA20', 'LEVER,L STRG HANDLE', '', '', '', '0', '', '', '', 0, '', '', 0, 96000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(320, '53205K03N30ZA', 'COVER HDL FR(BLK)', '', '', '', '0', '', '', '', 0, '', '', 0, 131000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(321, '53205K25900VBM', 'COVER HDL FR(VD BL MT)', '', '', '', '0', '', '', '', 0, '', '', 0, 98000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(322, '53205K61900FMB', 'COVER HDL FR (BLK)', '', '', '', '0', '', '', '', 0, '', '', 0, 91000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(323, '53205KZR600VSM', 'COVER HDL FR(VO SL MT)', '', '', '', '0', '', '', '', 0, '', '', 0, 105000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(324, '53206K59A10ZA', 'COVER HDL. RR.', '', '', '', '0', '', '', '', 0, '', '', 0, 31000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(325, '53206KTM850', 'COVER HDL RR', '', '', '', '0', '', '', '', 0, '', '', 0, 100000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(326, '5320DK59A10ZA', 'COVER HDL. FR ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 35000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(327, '5325BK25610', 'COVER COMP,HANDLE RR', '', '', '', '0', '', '', '', 0, '', '', 0, 38000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(328, '54303K16900CSR', 'COVER L FR(CN SC RD)', '', '', '', '0', '', '', '', 0, '', '', 0, 325000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(329, '61100K16900ZL', 'FENDER FR(PL ML CR)', '', '', '', '0', '', '', '', 0, '', '', 0, 183000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(330, '61100KVB930FMB', 'FENDER FR(BLK)', '', '', '', '0', '', '', '', 0, '', '', 0, 120000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(331, '61100KVB930WRD', 'FENDER FR(WN RD)', '', '', '', '0', '', '', '', 0, '', '', 0, 123000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(332, '61100KVY720CSR', 'FENDER FR (CN SC MT)', '', '', '', '0', '', '', '', 0, '', '', 0, 176000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(333, '61100KVY720FMB', 'FENDER FR (BLK)', '', '', '', '0', '', '', '', 0, '', '', 0, 108000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(334, '61100KVY720SBM', 'FENDER FR (SP BL MT)', '', '', '', '0', '', '', '', 0, '', '', 0, 170000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(335, '6131AK15900', 'STAY,FR NUMBER PLATE ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 17000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(336, '6131BK15900', 'COVER H/L RR ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 70000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(337, '61401K56F00', 'FR FORK PROTECTOR GTR', '', '', '', '0', '', '', '', 0, '', '', 0, 96000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(338, '64301KVY960ABM', 'COVER FR(AS BL MT)', '', '', '', '0', '', '', '', 0, '', '', 0, 255000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(339, '64301KVY960BLG', 'COVER FR(BR LM GR)', '', '', '', '0', '', '', '', 0, '', '', 0, 204000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(343, '64301KVY960VBM', 'COVER FR(VD BL MT)', '', '', '', '0', '', '', '', 0, '', '', 0, 225000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(344, '64301KZR600AFB', 'COVER FR(AF BK MT)', '', '', '', '0', '', '', '', 0, '', '', 0, 271000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(345, '64302KVB930FMB', 'COVER FR TOP(BLK)', '', '', '', '0', '', '', '', 0, '', '', 0, 65000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(346, '64308KZR600ZB', 'COVER FR LOWER(BLK)', '', '', '', '0', '', '', '', 0, '', '', 0, 77000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(347, '6430BK25900', 'COVER FR LOWER ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 84000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(348, '6430BKVB900', 'COVER SET L FLOOR SD', '', '', '', '0', '', '', '', 0, '', '', 0, 39000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(349, '64310KVBN50', 'STEP SET FLOOR', '', '', '', '0', '', '', '', 0, '', '', 0, 100000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(350, '6431AK25600', 'STEP ASSY,FLOOR', '', '', '', '0', '', '', '', 0, '', '', 0, 96000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(351, '6431AK25900', 'STEP FLOOR ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 97000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(352, '6431AK46N00ZA', 'STEP FLOOR ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 82000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(353, '6431AK59A10ZB', 'STEP FLOOR ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 78000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(354, '6431AKZR600ZD', 'STEP, FLOOR ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 79000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(355, '6431BK07900', 'COVER M/P SET', '', '', '', '0', '', '', '', 0, '', '', 0, 115000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(356, '64320KWWA80', 'COVER M/P RR', '', '', '', '0', '', '', '', 0, '', '', 0, 45000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(357, '6432AK45BLA', 'Under Grill Cover', '', '', '', '0', '', '', '', 0, '', '', 0, 150000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(358, '64330K25900ZA', 'COVER L FLOOR SIDE', '', '', '', '0', '', '', '', 0, '', '', 0, 31000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(359, '64330K46N00', 'COVER L FLOOR SD', '', '', '', '0', '', '', '', 0, '', '', 0, 32000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(360, '6434AK16A00', 'COVER UNDER ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 109000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(361, '6434AKZR600ZB', 'COVER UNDER ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 83000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(362, '64360K07900ZB', 'COVER L INNER LEG SHIELD', '', '', '', '0', '', '', '', 0, '', '', 0, 11000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(363, '64400KWWA40', 'COVER R M/P SD', '', '', '', '0', '', '', '', 0, '', '', 0, 51000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(364, '64405KVLN00AGM', 'LOUVER R(AN GY MT)-R', '', '', '', '0', '', '', '', 0, '', '', 0, 76000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(365, '64450KWWA40', 'COVER L M/P SD', '', '', '', '0', '', '', '', 0, '', '', 0, 51000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(366, '77230K25901', '77230K25900', '', '', '', '0', '', '', '', 0, '', '', 0, 15000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(367, '77235KEH600BNS', 'COWL RR CTR BLK(NO STRP)', '', '', '', '0', '', '', '', 0, '', '', 0, 36000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(368, '8010AKTM850', 'FENDER ASSY RR', '', '', '', '0', '', '', '', 0, '', '', 0, 67000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(369, '8010BK25600', 'FENDER,RR ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 63000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(370, '80151K25900ZA', 'COVER CENTER', '', '', '', '0', '', '', '', 0, '', '', 0, 56000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(371, '81131K16900ZS', 'COVER INR RACK(CN SC RD)', '', '', '', '0', '', '', '', 0, '', '', 0, 185000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(372, '81131KZR600ZJ', 'COVER INNER UPPER(VO SL MT)', '', '', '', '0', '', '', '', 0, '', '', 0, 243000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(373, '81134K16900ZP', 'COVER INR UPPER(WN RD)', '', '', '', '0', '', '', '', 0, '', '', 0, 54000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(374, '81141K16A20PMC', 'COVER INNER (PL ML CR)', '', '', '', '0', '', '', '', 0, '', '', 0, 483000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(375, '8114AK46N00ZA', 'COVER INNER LWR ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 94000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(379, '8114AK59A10ZB', 'COVER INNER LWR ASSY', '', '', '', '0', '', '', '', 0, '', '', 0, 94000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(380, '83450K45GBLA', 'Single Seat Cowl BLACK', '', '', '', '0', '', '', '', 0, '', '', 0, 650000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(381, '83450K45GRWHI', 'Single Seat Cowl R WHITE', '', '', '', '0', '', '', '', 0, '', '', 0, 650000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(382, '83450K45GWHI', 'Single Seat Cowl WHITE', '', '', '', '0', '', '', '', 0, '', '', 0, 650000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(383, '83450K46000BLA', 'Seat Cowl CBR150R Hitam', '', '', '', '0', '', '', '', 0, '', '', 0, 650000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(384, '83450K46000RED', 'Seat Cowl CBR150R Merah', '', '', '', '0', '', '', '', 0, '', '', 0, 650000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(385, '83500K25900CSR', 'COVER R BODY(CN SC RD)', '', '', '', '0', '', '', '', 0, '', '', 0, 242000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(386, '83500K45GBLA', 'KIT Fender Eliminator', '', '', '', '0', '', '', '', 0, '', '', 0, 520000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(387, '83650K25900ZA', 'COVER L RR SIDE', '', '', '', '0', '', '', '', 0, '', '', 0, 17000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(388, '87100HFHRRL', 'HRR JET HELMET (L)', '', '', '', '0', '', '', '', 0, '', '', 0, 310000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(389, '871X0K16A50ZBL', 'STRIPE SET L WHITE', '', '', '', '0', '', '', '', 0, '', '', 0, 80000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(390, '871X0K45000', 'Wheel Sticker CBR150R', '', '', '', '0', '', '', '', 0, '', '', 0, 56000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(391, '871X0K45G00', 'Stiker Visor', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(392, '871X0K61ARTBA', 'STICKER B POP ART BLACK', '', '', '', '0', '', '', '', 0, '', '', 0, 50000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(393, '871X0K61ARTMA', 'STICKER B POP ART MAGENTA', '', '', '', '0', '', '', '', 0, '', '', 0, 50000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(394, '871X0K61BLA', 'STICKER BEAT POP BLACK', '', '', '', '0', '', '', '', 0, '', '', 0, 50000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(395, '871X0K61PIXBA', 'STICKER B POP PIXEL BLACK', '', '', '', '0', '', '', '', 0, '', '', 0, 50000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(396, '871X0K61PIXRE', 'STICKER B POP PIXEL RED', '', '', '', '0', '', '', '', 0, '', '', 0, 50000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(397, '871X0K61RED', 'STICKER BEAT POP RED', '', '', '', '0', '', '', '', 0, '', '', 0, 50000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(398, '871X0K61WHI', 'STICKER BEAT POP WHITE', '', '', '', '0', '', '', '', 0, '', '', 0, 50000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(399, '871X0K6ARTBL', 'STICKER B POP ART BLUE', '', '', '', '0', '', '', '', 0, '', '', 0, 50000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(400, '88110K25900', 'MIRROR COMP R', '', '', '', '0', '', '', '', 0, '', '', 0, 36000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(401, '88110KCJ660', 'MIRROR ASSY R BACK', '', '', '', '0', '', '', '', 0, '', '', 0, 45000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(402, '88110KTM000FMB', 'MIRROR ASSY R BLACK (B)', '', '', '', '0', '', '', '', 0, '', '', 0, 53000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(403, '88110KVB930FMB', 'MIRROR ASSY R BACK BK', '', '', '', '0', '', '', '', 0, '', '', 0, 45000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(404, '88110KYT940DBM', 'MIRROR ASSY R BLUE', '', '', '', '0', '', '', '', 0, '', '', 0, 37500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(405, '88110KZLA00', 'MIRROR ASSY R BACK', '', '', '', '0', '', '', '', 0, '', '', 0, 28000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(406, '88110KZR600', 'MIRROR ASSY R', '', '', '', '0', '', '', '', 0, '', '', 0, 29000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(407, '88120KCJ660', 'MIRROR ASSY L BACK', '', '', '', '0', '', '', '', 0, '', '', 0, 45000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(408, '88120KTL690', 'MIRROR ASSY L BACK', '', '', '', '0', '', '', '', 0, '', '', 0, 28000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(409, '88120KVB930FMB', 'MIRROR ASSY L BACK BK', '', '', '', '0', '', '', '', 0, '', '', 0, 45000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(505, '88120KWC900', 'MIRROR ASSY L BACK', '', '', '', '0', '', '', '', 0, '', '', 0, 36000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(506, '88120KWWA40', 'MIRROR ASSY L BACK', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(510, '88120KYT940DBM', 'MIRROR ASSY L BLUE', '', '', '', '0', '', '', '', 0, '', '', 0, 37500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(511, '88120KZR600', 'MIRROR ASSY L', '', '', '', '0', '', '', '', 0, '', '', 0, 29000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(512, '90002KWB600', 'BOLT FLANGE 5X12', '', '', '', '0', '', '', '', 0, '', '', 0, 500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(513, '90012KK3830', 'SCREW TAPPET ADJUSTING', '', '', '', '0', '', '', '', 0, '', '', 0, 10000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(514, '900A2415000', 'TAPPET ADJS SET SPRT', '', '', '', '0', '', '', '', 0, '', '', 0, 52000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(515, '90191KPH4B0', 'SCREW OVAL 6X50', '', '', '', '0', '', '', '', 0, '', '', 0, 1000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(516, '91001KZLA01', 'BRG,BALL RADIAL 6205Z', '', '', '', '0', '', '', '', 0, '', '', 0, 41000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(517, '91002KZLA01', 'BRG,BALL RADIAL 6007', '', '', '', '0', '', '', '', 0, '', '', 0, 52000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(518, '91004KZR602', 'BEARING RADIAL BALL 6202', '', '', '', '0', '', '', '', 0, '', '', 0, 20000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(519, '91005KVB900', 'BEARING RADIAL BALL', '', '', '', '0', '', '', '', 0, '', '', 0, 103000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(520, '91009KVY961', 'BRG BALL RADIAL 6902U', '', '', '', '0', '', '', '', 0, '', '', 0, 26000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(521, '91109KVY901', 'BRG NEEDLE 20X29X18', '', '', '', '0', '', '', '', 0, '', '', 0, 30000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(522, '91201030033', 'OIL SEAL, 20X34X7', '', '', '', '0', '', '', '', 0, '', '', 0, 3500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5);
INSERT INTO `inventory` (`idinventory`, `inventorycode`, `inventoryname`, `spec`, `size`, `inventorybrandcode`, `salesunit`, `purchaseunit`, `stockunit`, `packunit`, `inventorygroupid`, `barcode`, `weight`, `inventorytypeid`, `unitprice`, `floorprice`, `endingstock`, `bookingstockqty`, `remainstockqty`, `inventorydate`, `remark`, `status`, `description`, `viewed`, `bestbuy`, `discount`, `inventorybrandid`, `inventorycolorid`, `inventorysizeid`, `pick`, `pickstock`, `pickstockqty`, `stockupl`) VALUES
(523, '91201GB4691', 'OIL SEAL, 30X42X4.5', '', '', '', '0', '', '', '', 0, '', '', 0, 4000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(524, '91201KCW851', 'OIL SEAL 19.8 X 30 X 7', '', '', '', '0', '', '', '', 0, '', '', 0, 6500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(525, '91202302010', 'OIL SEAL,13.8 X 24 X 5', '', '', '', '0', '', '', '', 0, '', '', 0, 2000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(526, '91202GB4692', 'OIL SEAL, 18.9X28X5', '', '', '', '0', '', '', '', 0, '', '', 0, 3000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(527, '91202KJ9003', 'OIL SEAL 20X32X6', '', '', '', '0', '', '', '', 0, '', '', 0, 6000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(528, '91202KVB901', 'OIL SEAL 20.8X52X7.5', '', '', '', '0', '', '', '', 0, '', '', 0, 6000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(529, '91204KWN901', 'OIL SEAL,34X52X7', '', '', '', '0', '', '', '', 0, '', '', 0, 5000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(530, '91211GK8013', 'OIL SEAL 34X39X3', '', '', '', '0', '', '', '', 0, '', '', 0, 7500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(531, '91211KN7671', 'SEAL DRIVEN FACE 34X41X4', '', '', '', '0', '', '', '', 0, '', '', 0, 9000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(532, '91302001021', '91302001020', '', '', '', '0', '', '', '', 0, '', '', 0, 2000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(533, '91303KK3831', 'O-RING 35X3', '', '', '', '0', '', '', '', 0, '', '', 0, 2000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(534, '91351642000', 'O-RING PINION CAP', '', '', '', '0', '', '', '', 0, '', '', 0, 2500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(535, '91351GR1000', 'O-RING 38.5X2', '', '', '', '0', '', '', '', 0, '', '', 0, 2500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(536, '91372KPH900', 'O-RING, TAPP ADJ', '', '', '', '0', '', '', '', 0, '', '', 0, 15000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(537, '91384KVB900', 'O-RING 38.8X1.9', '', '', '', '0', '', '', '', 0, '', '', 0, 5000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(538, '9805657723', 'SPARK PLUG U22FSU (DS)', '', '', '', '0', '', '', '', 0, '', '', 0, 12400, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(539, '9805957927', 'SPARK PLUG U22FER9 (DS)', '', '', '', '0', '', '', '', 0, '', '', 0, 21700, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(540, '9806786871', 'SPARK PLUG U20EPR9 (DS)', '', '', '', '0', '', '', '', 0, '', '', 0, 13000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(541, '9806958921', 'SPARK PLUG X24EPU9 (DS)', '', '', '', '0', '', '', '', 0, '', '', 0, 12400, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(542, 'ACG10GR', 'AHM CVT GREASE 10 GR', '', '', '', '0', '', '', '', 0, '', '', 0, 10000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(546, 'AHB6322', 'BEARING BALL (SET)', '', '', '', '0', '', '', '', 0, '', '', 0, 145000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(547, 'AHGL0001006', 'HONDA GLOVE (L)', '', '', '', '0', '', '', '', 0, '', '', 0, 50000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(548, 'AHGL0101006', 'HONDA GLOVE (XL)', '', '', '', '0', '', '', '', 0, '', '', 0, 50000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(549, 'AHGL0101008', 'HRR DAILY GLOVE BLACK (L)', '', '', '', '0', '', '', '', 0, '', '', 0, 135000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(550, 'AHGL0102008', 'HRR DAILY GLOVE RED (L)', '', '', '', '0', '', '', '', 0, '', '', 0, 135000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(551, 'AHJK0102010', 'Sonic Grey Hoodie-M', '', '', '', '0', '', '', '', 0, '', '', 0, 240000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(552, 'AHJK0201011', 'HRR TOURING JACKET (L)', '', '', '', '0', '', '', '', 0, '', '', 0, 550000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(553, 'AHJK0201013', 'Honda Touring Jacket (L)', '', '', '', '0', '', '', '', 0, '', '', 0, 355000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(554, 'AHJK0301013', 'Honda Touring Jacket (XL)', '', '', '', '0', '', '', '', 0, '', '', 0, 355000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(555, 'AHTA0001005', 'SCOOPY STY BAG 14 BLACK', '', '', '', '0', '', '', '', 0, '', '', 0, 175000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(556, 'AHTA0002005', 'SCOOPY STY BAG 14 WHITE', '', '', '', '0', '', '', '', 0, '', '', 0, 175000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(557, 'AHTP0001010', 'GTR Cap', '', '', '', '0', '', '', '', 0, '', '', 0, 85000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(558, 'AHTS0001015', 'VARIO LED LIGHT T-SHIRT', '', '', '', '0', '', '', '', 0, '', '', 0, 110000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(559, 'AHTS0002015', 'VARIO TURS T-SHIRT BLACK', '', '', '', '0', '', '', '', 0, '', '', 0, 108000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(560, 'AHTS0101024', 'GTR Navy T-Shirt (M)', '', '', '', '0', '', '', '', 0, '', '', 0, 110000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(561, 'AHTS0101026', 'GTR Long Sleeve T-Shirt (M)', '', '', '', '0', '', '', '', 0, '', '', 0, 125000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(562, 'AHTS0201023', 'CBR Grey T-Shirt - L', '', '', '', '0', '', '', '', 0, '', '', 0, 110000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(563, 'AHTS0201024', 'GTR Navy T-Shirt (L)', '', '', '', '0', '', '', '', 0, '', '', 0, 110000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(564, 'AHTS0201025', 'GTR Black T-Shirt (L)', '', '', '', '0', '', '', '', 0, '', '', 0, 110000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(565, 'H0640GBG910', 'DRIVE CHAIN KIT', '', '', '', '0', '', '', '', 0, '', '', 0, 153000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(566, 'HB6201RS', 'BEARING, BALL', '', '', '', '0', '', '', '', 0, '', '', 0, 19500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(567, 'HB6202', 'BEARING,BALL', '', '', '', '0', '', '', '', 0, '', '', 0, 16000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(568, 'HB6203', 'BEARING,BALL', '', '', '', '0', '', '', '', 0, '', '', 0, 18000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(569, 'HB6204', 'BEARING,BALL', '', '', '', '0', '', '', '', 0, '', '', 0, 20500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(570, 'HB6301RS', 'BEARING,BALL', '', '', '', '0', '', '', '', 0, '', '', 0, 23000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(571, 'HBF50ML', 'BRAKE,FLUID', '', '', '', '0', '', '', '', 0, '', '', 0, 6500, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5),
(572, 'SS8175ML', 'OIL SHOCK', '', '', '', '0', '', '', '', 0, '', '', 0, 22000, 0, 0, 0, 0, NULL, '', 0, '', 0, 0, 0, NULL, NULL, 0, NULL, b'1', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `inventoryadj`
--

CREATE TABLE IF NOT EXISTS `inventoryadj` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(4) NOT NULL,
  `notrans` varchar(50) NOT NULL,
  `datetrans` date NOT NULL,
  `matusedtypeid` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `transcode` varchar(4) DEFAULT NULL,
  `totalamount` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `inventoryadj`
--

INSERT INTO `inventoryadj` (`idtrans`, `codetrans`, `notrans`, `datetrans`, `matusedtypeid`, `remark`, `status`, `transcode`, `totalamount`) VALUES
(1, 'INVA', 'INVA-111116001', '2016-11-11', 0, '', 0, NULL, 0),
(2, 'INVA', 'INVA-161116002', '2016-11-16', 0, '', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventoryadjdet`
--

CREATE TABLE IF NOT EXISTS `inventoryadjdet` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `quantity` double NOT NULL,
  `userid` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1086 ;

--
-- Dumping data for table `inventoryadjdet`
--

INSERT INTO `inventoryadjdet` (`idtransdet`, `transid`, `inventoryid`, `unit`, `quantity`, `userid`) VALUES
(12, 1, 10, 'PCS', 3, ''),
(13, 1, 11, 'PCS', 2, ''),
(16, 1, 14, 'PCS', 3, ''),
(17, 1, 15, 'PCS', 1, ''),
(18, 1, 16, 'PCS', 1, ''),
(19, 1, 17, 'PCS', 1, ''),
(20, 1, 18, 'PCS', 2, ''),
(21, 1, 19, 'PCS', 1, ''),
(22, 1, 20, 'PCS', 4, ''),
(23, 1, 21, 'PCS', 5, ''),
(24, 1, 22, 'PCS', 4, ''),
(25, 1, 23, 'PCS', 2, ''),
(31, 1, 29, 'PCS', 2, ''),
(32, 1, 30, 'PCS', 8, ''),
(33, 1, 31, 'PCS', 2, ''),
(34, 1, 32, 'PCS', 3, ''),
(35, 1, 33, 'PCS', 3, ''),
(36, 1, 34, 'PCS', 6, ''),
(37, 1, 35, 'PCS', 2, ''),
(38, 1, 36, 'PCS', 7, ''),
(39, 1, 37, 'PCS', 3, ''),
(40, 1, 38, 'PCS', 5, ''),
(41, 1, 39, 'PCS', 3, ''),
(42, 1, 40, 'PCS', 3, ''),
(43, 1, 41, 'PCS', 14, ''),
(44, 1, 42, 'PCS', 2, ''),
(48, 1, 46, 'PCS', 3, ''),
(49, 1, 47, 'PCS', 4, ''),
(50, 1, 48, 'PCS', 6, ''),
(62, 1, 60, 'PCS', 1, ''),
(63, 1, 61, 'PCS', 1, ''),
(64, 1, 62, 'PCS', 2, ''),
(65, 1, 63, 'PCS', 1, ''),
(66, 1, 64, 'PCS', 1, ''),
(67, 1, 65, 'PCS', 1, ''),
(68, 1, 66, 'PCS', 3, ''),
(69, 1, 67, 'PCS', 2, ''),
(70, 1, 68, 'PCS', 83, ''),
(71, 1, 69, 'PCS', 234, ''),
(72, 1, 70, 'PCS', 71, ''),
(73, 1, 71, 'PCS', 93, ''),
(74, 1, 72, 'PCS', 24, ''),
(75, 1, 73, 'PCS', 58, ''),
(76, 1, 74, 'PCS', 33, ''),
(77, 1, 75, 'PCS', 12, ''),
(78, 1, 76, 'PCS', 57, ''),
(79, 1, 77, 'PCS', 4, ''),
(80, 1, 78, 'PCS', 1, ''),
(81, 1, 79, 'PCS', 30, ''),
(82, 1, 80, 'PCS', 2, ''),
(83, 1, 81, 'PCS', 2, ''),
(84, 1, 82, 'PCS', 1, ''),
(85, 1, 83, 'PCS', 1, ''),
(86, 1, 84, 'PCS', 1, ''),
(87, 1, 85, 'PCS', 1, ''),
(88, 1, 86, 'PCS', 2, ''),
(89, 1, 87, 'PCS', 1, ''),
(90, 1, 88, 'PCS', 1, ''),
(91, 1, 89, 'PCS', 1, ''),
(95, 1, 93, 'PCS', 1, ''),
(96, 1, 94, 'PCS', 1, ''),
(97, 1, 95, 'PCS', 1, ''),
(98, 1, 96, 'PCS', 3, ''),
(99, 1, 97, 'PCS', 6, ''),
(100, 1, 98, 'PCS', 2, ''),
(101, 1, 99, 'PCS', 2, ''),
(125, 1, 123, 'PCS', 6, ''),
(126, 1, 124, 'PCS', 3, ''),
(127, 1, 125, 'PCS', 3, ''),
(128, 1, 126, 'PCS', 10, ''),
(129, 1, 127, 'PCS', 3, ''),
(130, 1, 128, 'PCS', 2, ''),
(131, 1, 129, 'PCS', 2, ''),
(132, 1, 130, 'PCS', 4, ''),
(133, 1, 131, 'PCS', 4, ''),
(134, 1, 132, 'PCS', 1, ''),
(135, 1, 133, 'PCS', 1, ''),
(136, 1, 134, 'PCS', 1, ''),
(137, 1, 135, 'PCS', 1, ''),
(138, 1, 136, 'PCS', 3, ''),
(139, 1, 137, 'PCS', 4, ''),
(140, 1, 138, 'PCS', 2, ''),
(141, 1, 139, 'PCS', 1, ''),
(142, 1, 140, 'PCS', 4, ''),
(143, 1, 141, 'PCS', 5, ''),
(144, 1, 142, 'PCS', 1, ''),
(145, 1, 143, 'PCS', 9, ''),
(146, 1, 144, 'PCS', 2, ''),
(147, 1, 145, 'PCS', 2, ''),
(148, 1, 146, 'PCS', 1, ''),
(149, 1, 147, 'PCS', 26, ''),
(150, 1, 148, 'PCS', 3, ''),
(154, 1, 152, 'PCS', 1, ''),
(155, 1, 153, 'PCS', 2, ''),
(156, 1, 154, 'PCS', 1, ''),
(157, 1, 155, 'PCS', 1, ''),
(158, 1, 156, 'PCS', 3, ''),
(159, 1, 157, 'PCS', 37, ''),
(160, 1, 158, 'PCS', 2, ''),
(161, 1, 159, 'PCS', 3, ''),
(162, 1, 160, 'PCS', 2, ''),
(163, 1, 161, 'PCS', 9, ''),
(164, 1, 162, 'PCS', 2, ''),
(165, 1, 163, 'PCS', 4, ''),
(166, 1, 164, 'PCS', 21, ''),
(167, 1, 165, 'PCS', 1, ''),
(168, 1, 166, 'PCS', 1, ''),
(169, 1, 167, 'PCS', 4, ''),
(170, 1, 168, 'PCS', 2, ''),
(171, 1, 169, 'PCS', 1, ''),
(172, 1, 170, 'PCS', 1, ''),
(173, 1, 171, 'PCS', 1, ''),
(174, 1, 172, 'PCS', 3, ''),
(175, 1, 173, 'PCS', 3, ''),
(176, 1, 174, 'PCS', 1, ''),
(177, 1, 175, 'PCS', 1, ''),
(178, 1, 176, 'PCS', 1, ''),
(179, 1, 177, 'PCS', 1, ''),
(180, 1, 178, 'PCS', 1, ''),
(181, 1, 179, 'PCS', 3, ''),
(182, 1, 180, 'PCS', 9, ''),
(183, 1, 181, 'PCS', 5, ''),
(184, 1, 182, 'PCS', 3, ''),
(185, 1, 183, 'PCS', 1, ''),
(186, 1, 184, 'PCS', 1, ''),
(190, 1, 188, 'PCS', 8, ''),
(191, 1, 189, 'PCS', 42, ''),
(192, 1, 190, 'PCS', 6, ''),
(193, 1, 191, 'PCS', 18, ''),
(194, 1, 192, 'PCS', 1, ''),
(195, 1, 193, 'PCS', 1, ''),
(196, 1, 194, 'PCS', 1, ''),
(197, 1, 195, 'PCS', 1, ''),
(198, 1, 196, 'PCS', 1, ''),
(199, 1, 197, 'PCS', 1, ''),
(200, 1, 198, 'PCS', 1, ''),
(201, 1, 199, 'PCS', 1, ''),
(202, 1, 200, 'PCS', 1, ''),
(203, 1, 201, 'PCS', 10, ''),
(204, 1, 202, 'PCS', 17, ''),
(252, 1, 250, 'PCS', 14, ''),
(253, 1, 251, 'PCS', 1, ''),
(254, 1, 252, 'PCS', 27, ''),
(255, 1, 253, 'PCS', 13, ''),
(256, 1, 254, 'PCS', 14, ''),
(257, 1, 255, 'PCS', 18, ''),
(258, 1, 256, 'PCS', 1, ''),
(259, 1, 257, 'PCS', 3, ''),
(260, 1, 258, 'PCS', 4, ''),
(261, 1, 259, 'PCS', 2, ''),
(262, 1, 260, 'PCS', 1, ''),
(263, 1, 261, 'PCS', 3, ''),
(264, 1, 262, 'PCS', 2, ''),
(265, 1, 263, 'PCS', 3, ''),
(266, 1, 264, 'PCS', 1, ''),
(267, 1, 265, 'PCS', 1, ''),
(268, 1, 266, 'PCS', 2, ''),
(269, 1, 267, 'PCS', 2, ''),
(273, 1, 271, 'PCS', 1, ''),
(274, 1, 272, 'PCS', 5, ''),
(275, 1, 273, 'PCS', 10, ''),
(276, 1, 274, 'PCS', 1, ''),
(277, 1, 275, 'PCS', 2, ''),
(278, 1, 276, 'PCS', 2, ''),
(279, 1, 277, 'PCS', 6, ''),
(280, 1, 278, 'PCS', 6, ''),
(281, 1, 279, 'PCS', 3, ''),
(282, 1, 280, 'PCS', 3, ''),
(283, 1, 281, 'PCS', 6, ''),
(284, 1, 282, 'PCS', 4, ''),
(285, 1, 283, 'PCS', 5, ''),
(286, 1, 284, 'PCS', 1, ''),
(287, 1, 285, 'PCS', 5, ''),
(288, 1, 286, 'PCS', 2, ''),
(289, 1, 287, 'PCS', 4, ''),
(290, 1, 288, 'PCS', 1, ''),
(291, 1, 289, 'PCS', 5, ''),
(292, 1, 290, 'PCS', 6, ''),
(293, 1, 291, 'PCS', 1, ''),
(294, 1, 292, 'PCS', 2, ''),
(295, 1, 293, 'PCS', 2, ''),
(296, 1, 294, 'PCS', 1, ''),
(297, 1, 295, 'PCS', 1, ''),
(298, 1, 296, 'PCS', 1, ''),
(299, 1, 297, 'PCS', 1, ''),
(300, 1, 298, 'PCS', 2, ''),
(301, 1, 299, 'PCS', 2, ''),
(302, 1, 300, 'PCS', 2, ''),
(303, 1, 301, 'PCS', 1, ''),
(304, 1, 302, 'PCS', 1, ''),
(305, 1, 303, 'PCS', 1, ''),
(309, 1, 307, 'PCS', 1, ''),
(310, 1, 308, 'PCS', 2, ''),
(311, 1, 309, 'PCS', 8, ''),
(312, 1, 310, 'PCS', 3, ''),
(313, 1, 311, 'PCS', 3, ''),
(314, 1, 312, 'PCS', 2, ''),
(315, 1, 313, 'PCS', 3, ''),
(316, 1, 314, 'PCS', 3, ''),
(317, 1, 315, 'PCS', 2, ''),
(318, 1, 316, 'PCS', 3, ''),
(319, 1, 317, 'PCS', 1, ''),
(320, 1, 318, 'PCS', 1, ''),
(321, 1, 319, 'PCS', 1, ''),
(322, 1, 320, 'PCS', 1, ''),
(323, 1, 321, 'PCS', 1, ''),
(324, 1, 322, 'PCS', 1, ''),
(325, 1, 323, 'PCS', 1, ''),
(326, 1, 324, 'PCS', 1, ''),
(327, 1, 325, 'PCS', 1, ''),
(328, 1, 326, 'PCS', 1, ''),
(329, 1, 327, 'PCS', 1, ''),
(330, 1, 328, 'PCS', 1, ''),
(331, 1, 329, 'PCS', 1, ''),
(332, 1, 330, 'PCS', 1, ''),
(333, 1, 331, 'PCS', 1, ''),
(334, 1, 332, 'PCS', 1, ''),
(335, 1, 333, 'PCS', 1, ''),
(336, 1, 334, 'PCS', 1, ''),
(337, 1, 335, 'PCS', 1, ''),
(338, 1, 336, 'PCS', 1, ''),
(339, 1, 337, 'PCS', 2, ''),
(340, 1, 338, 'PCS', 1, ''),
(341, 1, 339, 'PCS', 1, ''),
(345, 1, 343, 'PCS', 1, ''),
(346, 1, 344, 'PCS', 1, ''),
(347, 1, 345, 'PCS', 1, ''),
(348, 1, 346, 'PCS', 1, ''),
(349, 1, 347, 'PCS', 1, ''),
(350, 1, 348, 'PCS', 1, ''),
(351, 1, 349, 'PCS', 2, ''),
(352, 1, 350, 'PCS', 6, ''),
(353, 1, 351, 'PCS', 1, ''),
(354, 1, 352, 'PCS', 1, ''),
(355, 1, 353, 'PCS', 1, ''),
(356, 1, 354, 'PCS', 2, ''),
(357, 1, 355, 'PCS', 1, ''),
(358, 1, 356, 'PCS', 2, ''),
(359, 1, 357, 'PCS', 1, ''),
(360, 1, 358, 'PCS', 4, ''),
(361, 1, 359, 'PCS', 1, ''),
(362, 1, 360, 'PCS', 1, ''),
(363, 1, 361, 'PCS', 2, ''),
(364, 1, 362, 'PCS', 1, ''),
(365, 1, 363, 'PCS', 1, ''),
(366, 1, 364, 'PCS', 1, ''),
(367, 1, 365, 'PCS', 1, ''),
(368, 1, 366, 'PCS', 1, ''),
(369, 1, 367, 'PCS', 1, ''),
(370, 1, 368, 'PCS', 1, ''),
(371, 1, 369, 'PCS', 1, ''),
(372, 1, 370, 'PCS', 2, ''),
(373, 1, 371, 'PCS', 1, ''),
(374, 1, 372, 'PCS', 1, ''),
(375, 1, 373, 'PCS', 1, ''),
(376, 1, 374, 'PCS', 1, ''),
(377, 1, 375, 'PCS', 1, ''),
(381, 1, 379, 'PCS', 2, ''),
(382, 1, 380, 'PCS', 1, ''),
(383, 1, 381, 'PCS', 1, ''),
(384, 1, 382, 'PCS', 1, ''),
(385, 1, 383, 'PCS', 3, ''),
(386, 1, 384, 'PCS', 2, ''),
(387, 1, 385, 'PCS', 1, ''),
(388, 1, 386, 'PCS', 1, ''),
(389, 1, 387, 'PCS', 1, ''),
(390, 1, 388, 'PCS', 1, ''),
(391, 1, 389, 'PCS', 1, ''),
(392, 1, 390, 'PCS', 1, ''),
(393, 1, 391, 'PCS', 2, ''),
(394, 1, 392, 'PCS', 2, ''),
(395, 1, 393, 'PCS', 2, ''),
(396, 1, 394, 'PCS', 61, ''),
(397, 1, 395, 'PCS', 2, ''),
(398, 1, 396, 'PCS', 2, ''),
(399, 1, 397, 'PCS', 3, ''),
(400, 1, 398, 'PCS', 34, ''),
(401, 1, 399, 'PCS', 2, ''),
(402, 1, 400, 'PCS', 2, ''),
(403, 1, 401, 'PCS', 2, ''),
(404, 1, 402, 'PCS', 1, ''),
(405, 1, 403, 'PCS', 2, ''),
(406, 1, 404, 'PCS', 1, ''),
(407, 1, 405, 'PCS', 3, ''),
(408, 1, 406, 'PCS', 1, ''),
(409, 1, 407, 'PCS', 1, ''),
(410, 1, 408, 'PCS', 2, ''),
(411, 1, 409, 'PCS', 2, ''),
(507, 1, 505, 'PCS', 1, ''),
(508, 1, 506, 'PCS', 2, ''),
(512, 1, 510, 'PCS', 1, ''),
(513, 1, 511, 'PCS', 3, ''),
(514, 1, 512, 'PCS', 2, ''),
(515, 1, 513, 'PCS', 2, ''),
(516, 1, 514, 'PCS', 2, ''),
(517, 1, 515, 'PCS', 1, ''),
(518, 1, 516, 'PCS', 1, ''),
(519, 1, 517, 'PCS', 1, ''),
(520, 1, 518, 'PCS', 2, ''),
(521, 1, 519, 'PCS', 6, ''),
(522, 1, 520, 'PCS', 3, ''),
(523, 1, 521, 'PCS', 4, ''),
(524, 1, 522, 'PCS', 5, ''),
(525, 1, 523, 'PCS', 26, ''),
(526, 1, 524, 'PCS', 1, ''),
(527, 1, 525, 'PCS', 9, ''),
(528, 1, 526, 'PCS', 29, ''),
(529, 1, 527, 'PCS', 8, ''),
(530, 1, 528, 'PCS', 6, ''),
(531, 1, 529, 'PCS', 8, ''),
(532, 1, 530, 'PCS', 20, ''),
(533, 1, 531, 'PCS', 15, ''),
(534, 1, 532, 'PCS', 8, ''),
(535, 1, 533, 'PCS', 6, ''),
(536, 1, 534, 'PCS', 9, ''),
(537, 1, 535, 'PCS', 21, ''),
(538, 1, 536, 'PCS', 7, ''),
(539, 1, 537, 'PCS', 5, ''),
(540, 1, 538, 'PCS', 9, ''),
(541, 1, 539, 'PCS', 17, ''),
(542, 1, 540, 'PCS', 5, ''),
(543, 1, 541, 'PCS', 19, ''),
(544, 1, 542, 'PCS', 15, ''),
(548, 1, 546, 'PCS', 2, ''),
(549, 1, 547, 'PCS', 1, ''),
(550, 1, 548, 'PCS', 1, ''),
(551, 1, 549, 'PCS', 1, ''),
(552, 1, 550, 'PCS', 1, ''),
(553, 1, 551, 'PCS', 1, ''),
(554, 1, 552, 'PCS', 1, ''),
(555, 1, 553, 'PCS', 1, ''),
(556, 1, 554, 'PCS', 1, ''),
(557, 1, 555, 'PCS', 1, ''),
(558, 1, 556, 'PCS', 1, ''),
(559, 1, 557, 'PCS', 1, ''),
(560, 1, 558, 'PCS', 1, ''),
(561, 1, 559, 'PCS', 1, ''),
(562, 1, 560, 'PCS', 1, ''),
(563, 1, 561, 'PCS', 1, ''),
(564, 1, 562, 'PCS', 1, ''),
(565, 1, 563, 'PCS', 1, ''),
(566, 1, 564, 'PCS', 1, ''),
(567, 1, 565, 'PCS', 1, ''),
(568, 1, 566, 'PCS', 12, ''),
(569, 1, 567, 'PCS', 1, ''),
(570, 1, 568, 'PCS', 5, ''),
(571, 1, 569, 'PCS', 4, ''),
(572, 1, 570, 'PCS', 40, ''),
(573, 1, 571, 'PCS', 21, ''),
(574, 1, 572, 'PCS', 13, ''),
(575, 2, 10, '', 5, ''),
(576, 2, 11, '', 5, ''),
(577, 2, 14, '', 5, ''),
(578, 2, 15, '', 5, ''),
(579, 2, 16, '', 5, ''),
(580, 2, 17, '', 5, ''),
(581, 2, 18, '', 5, ''),
(582, 2, 19, '', 5, ''),
(583, 2, 20, '', 5, ''),
(584, 2, 21, '', 5, ''),
(585, 2, 22, '', 5, ''),
(586, 2, 23, '', 5, ''),
(587, 2, 29, '', 5, ''),
(588, 2, 30, '', 5, ''),
(589, 2, 31, '', 5, ''),
(590, 2, 32, '', 5, ''),
(591, 2, 33, '', 5, ''),
(592, 2, 34, '', 5, ''),
(593, 2, 35, '', 5, ''),
(594, 2, 36, '', 5, ''),
(595, 2, 37, '', 5, ''),
(596, 2, 38, '', 5, ''),
(597, 2, 39, '', 5, ''),
(598, 2, 40, '', 5, ''),
(599, 2, 41, '', 5, ''),
(600, 2, 42, '', 5, ''),
(601, 2, 46, '', 5, ''),
(602, 2, 47, '', 5, ''),
(603, 2, 48, '', 5, ''),
(604, 2, 60, '', 5, ''),
(605, 2, 61, '', 5, ''),
(606, 2, 62, '', 5, ''),
(607, 2, 63, '', 5, ''),
(608, 2, 64, '', 5, ''),
(609, 2, 65, '', 5, ''),
(610, 2, 66, '', 5, ''),
(611, 2, 67, '', 5, ''),
(612, 2, 68, '', 5, ''),
(613, 2, 69, '', 5, ''),
(614, 2, 70, '', 5, ''),
(615, 2, 71, '', 5, ''),
(616, 2, 72, '', 5, ''),
(617, 2, 73, '', 5, ''),
(618, 2, 74, '', 5, ''),
(619, 2, 75, '', 5, ''),
(620, 2, 76, '', 5, ''),
(621, 2, 77, '', 5, ''),
(622, 2, 78, '', 5, ''),
(623, 2, 79, '', 5, ''),
(624, 2, 80, '', 5, ''),
(625, 2, 81, '', 5, ''),
(626, 2, 82, '', 5, ''),
(627, 2, 83, '', 5, ''),
(628, 2, 84, '', 5, ''),
(629, 2, 85, '', 5, ''),
(630, 2, 86, '', 5, ''),
(631, 2, 87, '', 5, ''),
(632, 2, 88, '', 5, ''),
(633, 2, 89, '', 5, ''),
(634, 2, 93, '', 5, ''),
(635, 2, 94, '', 5, ''),
(636, 2, 95, '', 5, ''),
(637, 2, 96, '', 5, ''),
(638, 2, 97, '', 5, ''),
(639, 2, 98, '', 5, ''),
(640, 2, 99, '', 5, ''),
(641, 2, 123, '', 5, ''),
(642, 2, 124, '', 5, ''),
(643, 2, 125, '', 5, ''),
(644, 2, 126, '', 5, ''),
(645, 2, 127, '', 5, ''),
(646, 2, 128, '', 5, ''),
(647, 2, 129, '', 5, ''),
(648, 2, 130, '', 5, ''),
(649, 2, 131, '', 5, ''),
(650, 2, 132, '', 5, ''),
(651, 2, 133, '', 5, ''),
(652, 2, 134, '', 5, ''),
(653, 2, 135, '', 5, ''),
(654, 2, 136, '', 5, ''),
(655, 2, 137, '', 5, ''),
(656, 2, 138, '', 5, ''),
(657, 2, 139, '', 5, ''),
(658, 2, 140, '', 5, ''),
(659, 2, 141, '', 5, ''),
(660, 2, 142, '', 5, ''),
(661, 2, 143, '', 5, ''),
(662, 2, 144, '', 5, ''),
(663, 2, 145, '', 5, ''),
(664, 2, 146, '', 5, ''),
(665, 2, 147, '', 5, ''),
(666, 2, 148, '', 5, ''),
(667, 2, 152, '', 5, ''),
(668, 2, 153, '', 5, ''),
(669, 2, 154, '', 5, ''),
(670, 2, 155, '', 5, ''),
(671, 2, 156, '', 5, ''),
(672, 2, 157, '', 5, ''),
(673, 2, 158, '', 5, ''),
(674, 2, 159, '', 5, ''),
(675, 2, 160, '', 5, ''),
(676, 2, 161, '', 5, ''),
(677, 2, 162, '', 5, ''),
(678, 2, 163, '', 5, ''),
(679, 2, 164, '', 5, ''),
(680, 2, 165, '', 5, ''),
(681, 2, 166, '', 5, ''),
(682, 2, 167, '', 5, ''),
(683, 2, 168, '', 5, ''),
(684, 2, 169, '', 5, ''),
(685, 2, 170, '', 5, ''),
(686, 2, 171, '', 5, ''),
(687, 2, 172, '', 5, ''),
(688, 2, 173, '', 5, ''),
(689, 2, 174, '', 5, ''),
(690, 2, 175, '', 5, ''),
(691, 2, 176, '', 5, ''),
(692, 2, 177, '', 5, ''),
(693, 2, 178, '', 5, ''),
(694, 2, 179, '', 5, ''),
(695, 2, 180, '', 5, ''),
(696, 2, 181, '', 5, ''),
(697, 2, 182, '', 5, ''),
(698, 2, 183, '', 5, ''),
(699, 2, 184, '', 5, ''),
(700, 2, 188, '', 5, ''),
(701, 2, 189, '', 5, ''),
(702, 2, 190, '', 5, ''),
(703, 2, 191, '', 5, ''),
(704, 2, 192, '', 5, ''),
(705, 2, 193, '', 5, ''),
(706, 2, 194, '', 5, ''),
(707, 2, 195, '', 5, ''),
(708, 2, 196, '', 5, ''),
(709, 2, 197, '', 5, ''),
(710, 2, 198, '', 5, ''),
(711, 2, 199, '', 5, ''),
(712, 2, 200, '', 5, ''),
(713, 2, 201, '', 5, ''),
(714, 2, 202, '', 5, ''),
(715, 2, 250, '', 5, ''),
(716, 2, 251, '', 5, ''),
(717, 2, 252, '', 5, ''),
(718, 2, 253, '', 5, ''),
(719, 2, 254, '', 5, ''),
(720, 2, 255, '', 5, ''),
(721, 2, 256, '', 5, ''),
(722, 2, 257, '', 5, ''),
(723, 2, 258, '', 5, ''),
(724, 2, 259, '', 5, ''),
(725, 2, 260, '', 5, ''),
(726, 2, 261, '', 5, ''),
(727, 2, 262, '', 5, ''),
(728, 2, 263, '', 5, ''),
(729, 2, 264, '', 5, ''),
(730, 2, 265, '', 5, ''),
(731, 2, 266, '', 5, ''),
(732, 2, 267, '', 5, ''),
(733, 2, 271, '', 5, ''),
(734, 2, 272, '', 5, ''),
(735, 2, 273, '', 5, ''),
(736, 2, 274, '', 5, ''),
(737, 2, 275, '', 5, ''),
(738, 2, 276, '', 5, ''),
(739, 2, 277, '', 5, ''),
(740, 2, 278, '', 5, ''),
(741, 2, 279, '', 5, ''),
(742, 2, 280, '', 5, ''),
(743, 2, 281, '', 5, ''),
(744, 2, 282, '', 5, ''),
(745, 2, 283, '', 5, ''),
(746, 2, 284, '', 5, ''),
(747, 2, 285, '', 5, ''),
(748, 2, 286, '', 5, ''),
(749, 2, 287, '', 5, ''),
(750, 2, 288, '', 5, ''),
(751, 2, 289, '', 5, ''),
(752, 2, 290, '', 5, ''),
(753, 2, 291, '', 5, ''),
(754, 2, 292, '', 5, ''),
(755, 2, 293, '', 5, ''),
(756, 2, 294, '', 5, ''),
(757, 2, 295, '', 5, ''),
(758, 2, 296, '', 5, ''),
(759, 2, 297, '', 5, ''),
(760, 2, 298, '', 5, ''),
(761, 2, 299, '', 5, ''),
(762, 2, 300, '', 5, ''),
(763, 2, 301, '', 5, ''),
(764, 2, 302, '', 5, ''),
(765, 2, 303, '', 5, ''),
(766, 2, 307, '', 5, ''),
(767, 2, 308, '', 5, ''),
(768, 2, 309, '', 5, ''),
(769, 2, 310, '', 5, ''),
(770, 2, 311, '', 5, ''),
(771, 2, 312, '', 5, ''),
(772, 2, 313, '', 5, ''),
(773, 2, 314, '', 5, ''),
(774, 2, 315, '', 5, ''),
(775, 2, 316, '', 5, ''),
(776, 2, 317, '', 5, ''),
(777, 2, 318, '', 5, ''),
(778, 2, 319, '', 5, ''),
(779, 2, 320, '', 5, ''),
(780, 2, 321, '', 5, ''),
(781, 2, 322, '', 5, ''),
(782, 2, 323, '', 5, ''),
(783, 2, 324, '', 5, ''),
(784, 2, 325, '', 5, ''),
(785, 2, 326, '', 5, ''),
(786, 2, 327, '', 5, ''),
(787, 2, 328, '', 5, ''),
(788, 2, 329, '', 5, ''),
(789, 2, 330, '', 5, ''),
(790, 2, 331, '', 5, ''),
(791, 2, 332, '', 5, ''),
(792, 2, 333, '', 5, ''),
(793, 2, 334, '', 5, ''),
(794, 2, 335, '', 5, ''),
(795, 2, 336, '', 5, ''),
(796, 2, 337, '', 5, ''),
(797, 2, 338, '', 5, ''),
(798, 2, 339, '', 5, ''),
(799, 2, 343, '', 5, ''),
(800, 2, 344, '', 5, ''),
(801, 2, 345, '', 5, ''),
(802, 2, 346, '', 5, ''),
(803, 2, 347, '', 5, ''),
(804, 2, 348, '', 5, ''),
(805, 2, 349, '', 5, ''),
(806, 2, 350, '', 5, ''),
(807, 2, 351, '', 5, ''),
(808, 2, 352, '', 5, ''),
(809, 2, 353, '', 5, ''),
(810, 2, 354, '', 5, ''),
(811, 2, 355, '', 5, ''),
(812, 2, 356, '', 5, ''),
(813, 2, 357, '', 5, ''),
(814, 2, 358, '', 5, ''),
(815, 2, 359, '', 5, ''),
(816, 2, 360, '', 5, ''),
(817, 2, 361, '', 5, ''),
(818, 2, 362, '', 5, ''),
(819, 2, 363, '', 5, ''),
(820, 2, 364, '', 5, ''),
(821, 2, 365, '', 5, ''),
(822, 2, 366, '', 5, ''),
(823, 2, 367, '', 5, ''),
(824, 2, 368, '', 5, ''),
(825, 2, 369, '', 5, ''),
(826, 2, 370, '', 5, ''),
(827, 2, 371, '', 5, ''),
(828, 2, 372, '', 5, ''),
(829, 2, 373, '', 5, ''),
(830, 2, 374, '', 5, ''),
(831, 2, 375, '', 5, ''),
(832, 2, 379, '', 5, ''),
(833, 2, 380, '', 5, ''),
(834, 2, 381, '', 5, ''),
(835, 2, 382, '', 5, ''),
(836, 2, 383, '', 5, ''),
(837, 2, 384, '', 5, ''),
(838, 2, 385, '', 5, ''),
(839, 2, 386, '', 5, ''),
(840, 2, 387, '', 5, ''),
(841, 2, 388, '', 5, ''),
(842, 2, 389, '', 5, ''),
(843, 2, 390, '', 5, ''),
(844, 2, 391, '', 5, ''),
(845, 2, 392, '', 5, ''),
(846, 2, 393, '', 5, ''),
(847, 2, 394, '', 5, ''),
(848, 2, 395, '', 5, ''),
(849, 2, 396, '', 5, ''),
(850, 2, 397, '', 5, ''),
(851, 2, 398, '', 5, ''),
(852, 2, 399, '', 5, ''),
(853, 2, 400, '', 5, ''),
(854, 2, 401, '', 5, ''),
(855, 2, 402, '', 5, ''),
(856, 2, 403, '', 5, ''),
(857, 2, 404, '', 5, ''),
(858, 2, 405, '', 5, ''),
(859, 2, 406, '', 5, ''),
(860, 2, 407, '', 5, ''),
(861, 2, 408, '', 5, ''),
(862, 2, 409, '', 5, ''),
(863, 2, 505, '', 5, ''),
(864, 2, 506, '', 5, ''),
(865, 2, 510, '', 5, ''),
(866, 2, 511, '', 5, ''),
(867, 2, 512, '', 5, ''),
(868, 2, 513, '', 5, ''),
(869, 2, 514, '', 5, ''),
(870, 2, 515, '', 5, ''),
(871, 2, 516, '', 5, ''),
(872, 2, 517, '', 5, ''),
(873, 2, 518, '', 5, ''),
(874, 2, 519, '', 5, ''),
(875, 2, 520, '', 5, ''),
(876, 2, 521, '', 5, ''),
(877, 2, 522, '', 5, ''),
(878, 2, 523, '', 5, ''),
(879, 2, 524, '', 5, ''),
(880, 2, 525, '', 5, ''),
(881, 2, 526, '', 5, ''),
(882, 2, 527, '', 5, ''),
(883, 2, 528, '', 5, ''),
(884, 2, 529, '', 5, ''),
(885, 2, 530, '', 5, ''),
(886, 2, 531, '', 5, ''),
(887, 2, 532, '', 5, ''),
(888, 2, 533, '', 5, ''),
(889, 2, 534, '', 5, ''),
(890, 2, 535, '', 5, ''),
(891, 2, 536, '', 5, ''),
(892, 2, 537, '', 5, ''),
(893, 2, 538, '', 5, ''),
(894, 2, 539, '', 5, ''),
(895, 2, 540, '', 5, ''),
(896, 2, 541, '', 5, ''),
(897, 2, 542, '', 5, ''),
(898, 2, 546, '', 5, ''),
(899, 2, 547, '', 5, ''),
(900, 2, 548, '', 5, ''),
(901, 2, 549, '', 5, ''),
(902, 2, 550, '', 5, ''),
(903, 2, 551, '', 5, ''),
(904, 2, 552, '', 5, ''),
(905, 2, 553, '', 5, ''),
(906, 2, 554, '', 5, ''),
(907, 2, 555, '', 5, ''),
(908, 2, 556, '', 5, ''),
(909, 2, 557, '', 5, ''),
(910, 2, 558, '', 5, ''),
(911, 2, 559, '', 5, ''),
(912, 2, 560, '', 5, ''),
(913, 2, 561, '', 5, ''),
(914, 2, 562, '', 5, ''),
(915, 2, 563, '', 5, ''),
(916, 2, 564, '', 5, ''),
(917, 2, 565, '', 5, ''),
(918, 2, 566, '', 5, ''),
(919, 2, 567, '', 5, ''),
(920, 2, 568, '', 5, ''),
(921, 2, 569, '', 5, ''),
(922, 2, 570, '', 5, ''),
(923, 2, 571, '', 5, ''),
(924, 2, 572, '', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `inventorybrand`
--

CREATE TABLE IF NOT EXISTS `inventorybrand` (
`idinventorybrand` int(11) NOT NULL,
  `inventorybrandname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventorycolor`
--

CREATE TABLE IF NOT EXISTS `inventorycolor` (
`idinventorycolor` int(11) NOT NULL,
  `inventorycolorname` varchar(25) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventorygroup`
--

CREATE TABLE IF NOT EXISTS `inventorygroup` (
`idinventorygroup` int(11) NOT NULL,
  `inventorygroupname` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `inventorygroup`
--

INSERT INTO `inventorygroup` (`idinventorygroup`, `inventorygroupname`, `status`) VALUES
(1, 'OLI AHM', 0),
(2, 'OSEAL', 0),
(3, 'KAMPAS REM', 0),
(4, 'CABLE', 0),
(5, 'SPAREPART', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventorygroupdet`
--

CREATE TABLE IF NOT EXISTS `inventorygroupdet` (
`idinventorygroupdet` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL,
  `inventorygroupid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `inventorygroupdet`
--

INSERT INTO `inventorygroupdet` (`idinventorygroupdet`, `inventoryid`, `inventorygroupid`) VALUES
(1, 69, 1),
(2, 70, 1),
(3, 71, 1),
(4, 75, 1),
(5, 39, 3),
(6, 0, 3),
(7, 40, 3),
(8, 36, 3),
(9, 37, 3),
(10, 38, 3),
(11, 33, 3),
(12, 37, 3),
(13, 34, 3),
(14, 35, 3),
(15, 74, 1),
(16, 289, 4),
(17, 31600, 5),
(18, 184, 5),
(19, 141, 5),
(20, 73, 1),
(21, 72, 1),
(22, 68, 1),
(23, 571, 1),
(24, 572, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventorysize`
--

CREATE TABLE IF NOT EXISTS `inventorysize` (
`idinventorysize` int(11) NOT NULL,
  `inventorysizename` varchar(25) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventorytype`
--

CREATE TABLE IF NOT EXISTS `inventorytype` (
`idinventorytype` int(11) NOT NULL,
  `inventorytypename` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`idlocation` int(11) NOT NULL,
  `locationname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`idlocation`, `locationname`, `status`) VALUES
(1, 'Cirebon', 0),
(2, 'Kuningan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `materialused`
--

CREATE TABLE IF NOT EXISTS `materialused` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(4) NOT NULL,
  `notrans` varchar(50) NOT NULL,
  `datetrans` date NOT NULL,
  `matusedtypeid` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `transcode` varchar(4) DEFAULT NULL,
  `totalamount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `materialuseddet`
--

CREATE TABLE IF NOT EXISTS `materialuseddet` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `quantity` double NOT NULL,
  `userid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `matusedtype`
--

CREATE TABLE IF NOT EXISTS `matusedtype` (
`idmatusedtype` int(11) NOT NULL,
  `matusedtypename` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `matusedtype`
--

INSERT INTO `matusedtype` (`idmatusedtype`, `matusedtypename`, `status`) VALUES
(1, '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `navmenu`
--

CREATE TABLE IF NOT EXISTS `navmenu` (
`idnavmenu` int(11) NOT NULL,
  `navmenuname` varchar(50) NOT NULL,
  `modulname` varchar(50) NOT NULL,
  `tabmenuid` int(11) NOT NULL,
  `userpositionid` int(11) NOT NULL,
  `sequencenumber` int(11) NOT NULL,
  `iclass` varchar(225) NOT NULL,
  `span` varchar(225) NOT NULL,
  `spanclass` varchar(255) NOT NULL,
  `ulclass` varchar(225) NOT NULL,
  `liclass` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL,
  `datatoggle` varchar(225) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `navmenu`
--

INSERT INTO `navmenu` (`idnavmenu`, `navmenuname`, `modulname`, `tabmenuid`, `userpositionid`, `sequencenumber`, `iclass`, `span`, `spanclass`, `ulclass`, `liclass`, `role`, `datatoggle`) VALUES
(2, 'Penjualan', 'transaction', 0, 0, 5, 'fa-cart-arrow-down', '', 'caret', 'dropdown-menu', 'dropdown', 'menu', 'dropdown'),
(3, 'Laporan', 'report', 0, 0, 9, 'fa fa-sticky-note-o', '', 'caret', 'dropdown-menu', 'dropdown', 'menu', 'dropdown'),
(5, 'Pengaturan', 'utilities', 0, 0, 10, 'fa  fa-users', '  ', 'caret', 'dropdown-menu', 'dropdown', 'menu', 'dropdown'),
(100, 'Pembelian', 'transaction', 0, 0, 6, 'fa-cart-plus', '', 'caret', 'dropdown-menu', 'dropdown', 'menu', 'dropdown'),
(102, 'Keuangan', 'transaction', 0, 0, 8, 'fa-cc-mastercard', '', 'caret', 'dropdown-menu', 'dropdown', 'menu', 'dropdown'),
(105, 'Sparepart', 'transaction', 0, 0, 3, 'fa-file-archive-o', '', 'caret', 'dropdown-menu', 'dropdown', 'menu', 'dropdown'),
(106, 'Gudang', 'transaction', 0, 0, 7, 'fa-server', '', 'caret', 'dropdown-menu', 'dropdown', 'menu', 'dropdown'),
(107, 'Kendaraan', 'transaction', 0, 0, 4, 'fa-motorcycle', '', 'caret', 'dropdown-menu', 'dropdown', 'menu', 'dropdown'),
(109, 'Atribut', 'transaction', 0, 0, 1, 'fa-building-o', '', 'caret', 'dropdown-menu', 'dropdown', 'menu', 'dropdown'),
(108, 'Relasi', 'transaction', 0, 0, 2, 'fa-plane', '', 'caret', 'dropdown-menu', 'dropdown', 'menu', 'dropdown');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
`idnotification` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `recoreded` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notificationstatus`
--

CREATE TABLE IF NOT EXISTS `notificationstatus` (
`idnotificationstatus` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `notificationid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `partupload`
--

CREATE TABLE IF NOT EXISTS `partupload` (
`id` int(11) NOT NULL,
  `partcode` varchar(225) NOT NULL,
  `partname` varchar(225) NOT NULL,
  `unitprice` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4572 ;

--
-- Dumping data for table `partupload`
--

INSERT INTO `partupload` (`id`, `partcode`, `partname`, `unitprice`) VALUES
(4571, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paytype`
--

CREATE TABLE IF NOT EXISTS `paytype` (
`idpaytype` int(11) NOT NULL,
  `paytypename` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `paytype`
--

INSERT INTO `paytype` (`idpaytype`, `paytypename`, `status`) VALUES
(1, 'Cash\r\n', 0),
(2, 'Credit', 0),
(3, 'Paypall', 1),
(5, 'Master Card', 1),
(7, 'Transfer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
`idposition` int(11) NOT NULL,
  `positionname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`idposition`, `positionname`, `status`) VALUES
(1, 'Mekanik', 0),
(2, 'Kasir', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
`idprofession` int(11) NOT NULL,
  `professionname` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`idprofession`, `professionname`) VALUES
(1, 'Akuntan'),
(2, 'Aktor'),
(3, 'Aktris'),
(4, 'Pramugari'),
(5, 'Arsitek'),
(6, 'Penata Artistik'),
(7, 'Artis'),
(8, 'Asisten'),
(9, 'Atlet'),
(10, 'Pengacara'),
(11, 'Penulis'),
(12, 'Tukang Roti'),
(13, 'Bankir'),
(14, 'Tukang Cukur'),
(15, 'Ahli Kecantikan'),
(16, 'Pengawal'),
(17, 'Tukang Batu'),
(18, 'Makelar'),
(19, 'Pembangun'),
(20, 'Pencuri'),
(21, 'Pengusaha'),
(22, 'Tukang Daging'),
(23, 'Juru Kamera'),
(24, 'Pengurus'),
(25, 'Tukang Kayu'),
(26, 'Pembantu'),
(27, 'Sopir'),
(28, 'Koki'),
(29, 'Pns'),
(30, 'Pramuniaga'),
(31, 'Pelatih'),
(32, 'Dosen'),
(33, 'Direktur Perusahaan'),
(34, 'Komposer'),
(35, 'Operator Komputer'),
(36, 'Pekerja Konstruksi'),
(37, 'Memasak'),
(38, 'Koresponden'),
(39, 'Perajin'),
(40, 'Penjahat'),
(41, 'Bajingan'),
(42, 'Penari'),
(43, 'Dekan'),
(44, 'Penghias'),
(45, 'Dokter Gigi'),
(46, 'Perancang'),
(47, 'Detektif'),
(48, 'Direktur'),
(49, 'Dokter'),
(50, 'Penulis Sandiwara'),
(51, 'Dress Designer'),
(52, 'Supir Bus'),
(53, 'Ekonom'),
(54, 'Editor'),
(55, 'Teknisi Listrik'),
(56, 'Insinyur'),
(57, 'Guru Bahasa Inggris'),
(58, 'Petani'),
(59, 'Perancang Busana'),
(60, 'Sutradara'),
(61, 'Pemadam Kebakaran'),
(62, 'Nelayan'),
(63, 'Penjual Ikan'),
(64, 'Pramugari'),
(65, 'Desainer Furnitur'),
(66, 'Tukang Sampah'),
(67, 'Desainer Grafis'),
(68, 'Penata Rambut'),
(69, 'Kepala Sekolah'),
(70, 'Guru Sejarah'),
(71, 'Ahli Perhiasan'),
(72, 'Wartawan'),
(73, 'Hakim'),
(75, 'Penceramah'),
(76, 'Ahli Hukum'),
(77, 'Tukang Sulap'),
(78, 'Manajer'),
(80, 'Guru Matematika'),
(81, 'Montir'),
(82, 'Buruh Tambang'),
(83, 'Guru Musik'),
(84, 'Pemusik'),
(85, 'Presenter Berita'),
(86, 'Perawat'),
(87, 'Ahli Kacamata'),
(88, 'Pelukis'),
(89, 'Pendeta'),
(90, 'Asisten Pribadi'),
(91, 'Apoteker'),
(92, 'Juru Potret'),
(93, 'Pilot'),
(94, 'Dramawan'),
(95, 'Tukang Ledeng'),
(96, 'Penyair'),
(97, 'Polisi'),
(98, 'Politikus'),
(99, 'Porter'),
(100, 'Imam'),
(101, 'Pokok'),
(102, 'Pencetak'),
(103, 'Petugas Lapas'),
(104, 'Produsen'),
(105, 'Profesor'),
(106, 'Murid'),
(107, 'Pendeta Yahudi'),
(108, 'Resepsionis'),
(109, 'Tukang Bengkel'),
(110, 'Reporter'),
(111, 'Pelaut'),
(112, 'Asisten Penjualan'),
(113, 'Penjual'),
(114, 'Penulis Skenario'),
(115, 'Ilmuwan'),
(116, 'Pengukir'),
(117, 'Sekretaris'),
(118, 'Tukang Sepatu'),
(119, 'Pelayan Di Toko'),
(120, 'Penyanyi'),
(121, 'Prajurit'),
(123, 'Mahasiswa'),
(124, 'Ahli Bedah'),
(125, 'Penjahit'),
(126, 'Ahli'),
(127, 'Operator Telepon'),
(128, 'Penjaga Telepon'),
(129, 'Petugas Lalu Lintas'),
(130, 'Agen Perjalanan'),
(131, 'Tv Kameramen'),
(132, 'Tv Presenter'),
(133, 'Guru Universitas'),
(134, 'Dokter Hewan'),
(137, 'Pelayan'),
(138, 'Tukang Arloji'),
(139, 'Tukang Las'),
(140, 'Penulis'),
(141, 'Lainnya'),
(142, 'Ibu Rumah Tangga'),
(143, 'Wiraswasta'),
(144, 'Guru'),
(145, 'PNS'),
(146, '');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE IF NOT EXISTS `purchaseorder` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(4) NOT NULL,
  `notrans` varchar(50) NOT NULL,
  `datetrans` date NOT NULL,
  `supplierid` int(11) NOT NULL,
  `orderref` varchar(225) NOT NULL,
  `paytypeid` int(11) NOT NULL,
  `top` int(11) NOT NULL,
  `duedate` date NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `transcode` varchar(4) DEFAULT NULL,
  `totalamount` double NOT NULL,
  `apamount` double NOT NULL,
  `apremain` double NOT NULL,
  `disc` double NOT NULL,
  `brutoamount` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`idtrans`, `codetrans`, `notrans`, `datetrans`, `supplierid`, `orderref`, `paytypeid`, `top`, `duedate`, `remark`, `status`, `transcode`, `totalamount`, `apamount`, `apremain`, `disc`, `brutoamount`) VALUES
(5, 'POLC', 'POLC-111116001', '2016-11-11', 1, '40631', 1, 0, '1970-01-01', '', 0, NULL, 423725, 0, 0, 15, 498500),
(6, 'POLC', 'POLC-151116002', '2016-11-15', 1, '1223', 2, 30, '2016-12-22', '', 0, NULL, 32400, 32400, 0, 10, 36000);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderdet`
--

CREATE TABLE IF NOT EXISTS `purchaseorderdet` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `unitprice` double NOT NULL,
  `discount` int(11) NOT NULL,
  `amount` double NOT NULL,
  `quantity` double NOT NULL,
  `sizeid` int(11) NOT NULL,
  `colorid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `apamount` double NOT NULL,
  `apremain` double NOT NULL,
  `grqty` double NOT NULL,
  `rackno` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `purchaseorderdet`
--

INSERT INTO `purchaseorderdet` (`idtransdet`, `transid`, `inventoryid`, `unit`, `unitprice`, `discount`, `amount`, `quantity`, `sizeid`, `colorid`, `userid`, `apamount`, `apremain`, `grqty`, `rackno`) VALUES
(7, 5, 69, 'PCS', 39500, 0, 39500, 1, 0, 0, '', 0, 0, 0, ''),
(8, 5, 11, 'PCS', 45900, 0, 459000, 10, 0, 0, '', 0, 0, 0, ''),
(11, 6, 10, 'PCS', 12000, 0, 24000, 2, 0, 0, '', 0, 0, 0, 'A1'),
(12, 6, 15, 'PCS', 3000, 0, 12000, 4, 0, 0, '', 0, 0, 0, 'A2');

--
-- Triggers `purchaseorderdet`
--
DELIMITER //
CREATE TRIGGER `deleteheader` AFTER DELETE ON `purchaseorderdet`
 FOR EACH ROW BEGIN

IF EXISTS (SELECT idtrans FROM purchaseorder WHERE idtrans IN (OLD.transid)) THEN

UPDATE purchaseorder  SET totalamount = (SELECT IFNULL(SUM(amount),0) FROM purchaseorderdet  WHERE transid IN (OLD.transid)
AND purchaseorderdet.transid=purchaseorder.idtrans) WHERE purchaseorder.idtrans IN (OLD.transid);

END IF;

END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `insertheader` AFTER INSERT ON `purchaseorderdet`
 FOR EACH ROW BEGIN

IF EXISTS (SELECT idtrans FROM purchaseorder WHERE idtrans IN (NEW.transid)) THEN

UPDATE purchaseorder  SET totalamount = (SELECT IFNULL(SUM(amount),0) FROM purchaseorderdet  WHERE transid IN (NEW.transid)
AND purchaseorderdet.transid=purchaseorder.idtrans) WHERE purchaseorder.idtrans IN (NEW.transid);

END IF;

END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `updateheader` AFTER UPDATE ON `purchaseorderdet`
 FOR EACH ROW BEGIN

IF EXISTS (SELECT idtrans FROM purchaseorder WHERE idtrans IN (NEW.transid)) THEN

UPDATE purchaseorder  SET totalamount = (SELECT IFNULL(SUM(amount),0) FROM purchaseorderdet  WHERE transid IN (NEW.transid)
AND purchaseorderdet.transid=purchaseorder.idtrans) WHERE purchaseorder.idtrans IN (NEW.transid);

END IF;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturn`
--

CREATE TABLE IF NOT EXISTS `purchasereturn` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(4) NOT NULL,
  `notrans` varchar(50) NOT NULL,
  `datetrans` date NOT NULL,
  `supplierid` int(11) NOT NULL,
  `paytypeid` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `transcode` varchar(4) DEFAULT NULL,
  `totalamount` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purchasereturn`
--

INSERT INTO `purchasereturn` (`idtrans`, `codetrans`, `notrans`, `datetrans`, `supplierid`, `paytypeid`, `remark`, `status`, `transcode`, `totalamount`) VALUES
(1, 'PORT', 'PORT-111116001', '2016-11-11', 1, 1, 'BOCOR', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturndet`
--

CREATE TABLE IF NOT EXISTS `purchasereturndet` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `unitprice` double NOT NULL,
  `discount` int(11) NOT NULL,
  `amount` double NOT NULL,
  `quantity` double NOT NULL,
  `sizeid` int(11) NOT NULL,
  `colorid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `doqty` double NOT NULL,
  `doremain` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purchasereturndet`
--

INSERT INTO `purchasereturndet` (`idtransdet`, `transid`, `inventoryid`, `unit`, `unitprice`, `discount`, `amount`, `quantity`, `sizeid`, `colorid`, `userid`, `doqty`, `doremain`) VALUES
(1, 1, 69, 'PCS', 39500, 0, 39500, 1, 0, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE IF NOT EXISTS `salesman` (
`idsalesman` int(11) NOT NULL,
  `salesmancode` varchar(5) DEFAULT NULL,
  `salesmanname` varchar(30) NOT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `mobilephone` varchar(20) DEFAULT NULL,
  `nik` varchar(10) DEFAULT NULL,
  `emailaddress` varchar(30) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE IF NOT EXISTS `salesorder` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(4) NOT NULL,
  `notrans` varchar(50) NOT NULL,
  `datetrans` date NOT NULL,
  `customerid` int(11) NOT NULL,
  `paytypeid` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `transcode` varchar(4) DEFAULT NULL,
  `payamount` double NOT NULL,
  `duedate` date NOT NULL,
  `changeamount` double NOT NULL,
  `totalamount` double NOT NULL,
  `aramount` double NOT NULL,
  `username` varchar(225) NOT NULL,
  `employeeid` int(11) NOT NULL,
  `mekanikid` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `nextkm` int(11) NOT NULL,
  `nextdatekm` date NOT NULL,
  `disc` double NOT NULL,
  `brutoamount` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`idtrans`, `codetrans`, `notrans`, `datetrans`, `customerid`, `paytypeid`, `remark`, `status`, `transcode`, `payamount`, `duedate`, `changeamount`, `totalamount`, `aramount`, `username`, `employeeid`, `mekanikid`, `km`, `nextkm`, `nextdatekm`, `disc`, `brutoamount`) VALUES
(22, 'SALE', 'SALE-111116002', '2016-11-11', 2, 1, '', 0, NULL, 21600, '1970-01-01', 0, 21600, 0, '', 1, 0, 0, 0, '0000-00-00', 0, 0),
(23, 'SALE', 'SALE-111116003', '2016-11-11', 4, 1, '', 0, NULL, 52500, '1970-01-01', 0, 52500, 0, '', 1, 0, 0, 0, '0000-00-00', 0, 52500),
(24, 'SALE', 'SALE-111116004', '2016-11-11', 1, 1, '', 0, NULL, 50000, '1970-01-01', 17000, 33000, 0, '', 1, 0, 0, 0, '0000-00-00', 0, 0),
(25, 'SALE', 'SALE-111116005', '2016-11-11', 2, 1, '', 0, NULL, 6000, '1970-01-01', 0, 6000, 0, '', 1, 0, 0, 0, '0000-00-00', 0, 6000),
(26, 'SALE', 'SALE-111116006', '2016-11-11', 2, 1, '', 0, NULL, 45000, '1970-01-01', 0, 41400, 0, '', 6, 0, 0, 0, '0000-00-00', 10, 46000),
(27, 'SALE', 'SALE-111116007', '2016-11-11', 6, 1, '', 0, NULL, 0, '1970-01-01', 0, 32400, 0, '', 6, 0, 0, 0, '0000-00-00', 10, 36000),
(28, 'SALE', 'SALE-121116008', '2016-11-12', 2, 1, '', 0, NULL, 0, '1970-01-01', 0, 157500, 0, '', 1, 0, 0, 0, '0000-00-00', 0, 0),
(29, 'SALE', 'SALE-121116009', '2016-11-12', 0, 0, '', 0, NULL, 0, '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '0000-00-00', 0, 0),
(30, 'SALE', 'SALE-131116010', '2016-11-13', 0, 0, '', 0, NULL, 0, '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '0000-00-00', 0, 0),
(31, 'SALE', 'SALE-141116011', '2016-11-14', 0, 0, '', 0, NULL, 0, '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '0000-00-00', 0, 0),
(32, 'SALE', 'SALE-151116012', '2016-11-15', 1, 1, '', 0, NULL, 80000, '1970-01-01', 3925, 76075, 0, '', 1, 0, 0, 0, '0000-00-00', 15, 89500),
(33, 'SALE', 'SALE-151116013', '2016-11-15', 2, 1, '', 0, NULL, 220000, '1970-01-01', 0, 0, 0, '', 1, 0, 0, 0, '0000-00-00', 10, 239500),
(34, 'SALE', 'SALE-151116014', '2016-11-01', 1, 1, 'pak satim', 0, NULL, 0, '1970-01-01', 0, 0, 0, '', 6, 0, 0, 0, '0000-00-00', 0, 0),
(35, 'SALE', 'SALE-161116015', '2016-11-16', 0, 0, '', 0, NULL, 0, '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '0000-00-00', 0, 0),
(36, 'SALE', 'SALE-161116016', '2016-11-16', 1, 1, '', 0, NULL, 0, '1970-01-01', 0, 39500, 0, '', 6, 0, 0, 0, '0000-00-00', 0, 39500);

-- --------------------------------------------------------

--
-- Table structure for table `salesorderdet`
--

CREATE TABLE IF NOT EXISTS `salesorderdet` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL,
  `barcode` varchar(225) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `unitprice` double NOT NULL,
  `discount` int(11) NOT NULL,
  `discountamt` double NOT NULL,
  `amount` double NOT NULL,
  `quantity` double NOT NULL,
  `stockqty` double NOT NULL,
  `avlqty` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `salesorderdet`
--

INSERT INTO `salesorderdet` (`idtransdet`, `transid`, `inventoryid`, `barcode`, `unit`, `unitprice`, `discount`, `discountamt`, `amount`, `quantity`, `stockqty`, `avlqty`) VALUES
(12, 22, 289, '', 'PCS', 24000, 10, 0, 21600, 1, 4, 3),
(13, 23, 74, '', 'PCS', 52500, 0, 0, 52500, 1, 32, 31),
(15, 24, 141, '', 'PCS', 33000, 0, 0, 33000, 1, 5, 4),
(16, 25, 528, '', 'PCS', 6000, 0, 0, 6000, 1, 6, 5),
(17, 26, 38, '', 'PCS', 46000, 0, 0, 46000, 1, 5, 4),
(19, 27, 567, '', 'PCS', 16000, 0, 0, 16000, 1, 1, 0),
(20, 27, 518, '', 'PCS', 20000, 0, 0, 20000, 1, 2, 1),
(21, 28, 282, '', 'PCS', 185000, 0, 27500, 157500, 1, 4, 3),
(22, 32, 11, '', 'PCS', 42000, 0, 0, 42000, 1, 12, 11),
(23, 32, 14, '', 'PCS', 47500, 0, 0, 47500, 1, 3, 2),
(24, 33, 11, '', 'PCS', 42000, 0, 0, 42000, 1, 11, 10),
(25, 33, 69, '', 'PCS', 39500, 0, 0, 197500, 5, 226, 221),
(26, 36, 69, '', 'PCS', 39500, 0, 0, 39500, 1, 221, 220);

-- --------------------------------------------------------

--
-- Table structure for table `salesreturn`
--

CREATE TABLE IF NOT EXISTS `salesreturn` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(4) NOT NULL,
  `notrans` varchar(50) NOT NULL,
  `datetrans` date NOT NULL,
  `customerid` int(11) NOT NULL,
  `paytypeid` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `transcode` varchar(4) DEFAULT NULL,
  `totalamount` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `salesreturn`
--

INSERT INTO `salesreturn` (`idtrans`, `codetrans`, `notrans`, `datetrans`, `customerid`, `paytypeid`, `remark`, `status`, `transcode`, `totalamount`) VALUES
(3, 'SRLC', 'SRLC-111116001', '2016-11-11', 2, 1, 'RETUR PENJUALAN', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesreturndet`
--

CREATE TABLE IF NOT EXISTS `salesreturndet` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `unitprice` double NOT NULL,
  `discount` int(11) NOT NULL,
  `amount` double NOT NULL,
  `quantity` double NOT NULL,
  `sizeid` int(11) NOT NULL,
  `colorid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `doqty` double NOT NULL,
  `doremain` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `salesreturndet`
--

INSERT INTO `salesreturndet` (`idtransdet`, `transid`, `inventoryid`, `unit`, `unitprice`, `discount`, `amount`, `quantity`, `sizeid`, `colorid`, `userid`, `doqty`, `doremain`) VALUES
(2, 3, 184, 'PCS', 110000, 0, 110000, 1, 0, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesservice`
--

CREATE TABLE IF NOT EXISTS `salesservice` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(4) NOT NULL,
  `notrans` varchar(50) NOT NULL,
  `datetrans` date NOT NULL,
  `customerid` int(11) NOT NULL,
  `paytypeid` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `transcode` varchar(4) DEFAULT NULL,
  `serviceamount` double NOT NULL,
  `sparepartamount` double NOT NULL,
  `payamount` double NOT NULL,
  `changeamount` double NOT NULL,
  `totalamount` double NOT NULL,
  `username` varchar(225) NOT NULL,
  `policeno` varchar(225) NOT NULL,
  `customername` varchar(225) NOT NULL,
  `vehiclemodel` varchar(225) NOT NULL,
  `vahicletype` varchar(225) NOT NULL,
  `vahiclejenis` varchar(225) NOT NULL,
  `purchasedate` date NOT NULL,
  `mechineno` varchar(225) NOT NULL,
  `rangka` varchar(225) NOT NULL,
  `servicebook` varchar(225) NOT NULL,
  `employeeid` int(11) NOT NULL,
  `mekanikid` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `nextkm` int(11) NOT NULL,
  `nextdatekm` date NOT NULL,
  `finishtime` time NOT NULL,
  `address` varchar(225) NOT NULL,
  `telpno` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `salesservice`
--

INSERT INTO `salesservice` (`idtrans`, `codetrans`, `notrans`, `datetrans`, `customerid`, `paytypeid`, `remark`, `status`, `transcode`, `serviceamount`, `sparepartamount`, `payamount`, `changeamount`, `totalamount`, `username`, `policeno`, `customername`, `vehiclemodel`, `vahicletype`, `vahiclejenis`, `purchasedate`, `mechineno`, `rangka`, `servicebook`, `employeeid`, `mekanikid`, `km`, `nextkm`, `nextdatekm`, `finishtime`, `address`, `telpno`) VALUES
(46, 'SASV', 'SASV-111116007', '2016-11-11', 0, 1, 'PL', 2, NULL, 36000, 39500, 80000, 0, 75500, '', 'E6966ZM', 'IMAN', 'BEAT FI CW', 'NC11BF1CA/T', 'MATIC', '0000-00-00', '-', '-', '-', 1, 4, 10158, 12158, '0000-00-00', '02:00:00', 'MANIS', '085775541313'),
(47, 'SASV', 'SASV-111116008', '2016-11-11', 0, 1, 'PL', 2, NULL, 43500, 0, 43500, 0, 43500, '', 'E4280ZZ', 'NUNUNG NURHANA', 'BEAT', 'NC11BF1CBA/T', 'MATIC', '1970-01-01', '-', '-', '-', 1, 2, 0, 0, '2017-01-10', '02:45:00', 'BANDORASA WETAN ', '-'),
(48, 'SASV', 'SASV-111116009', '2016-11-11', 0, 1, 'KPB 2', 2, NULL, 0, 39500, 39500, 0, 39500, '', 'TEST001', 'NUROHMAN', 'BEAT', 'X1B02N04L0A/T', 'MATIC', '0000-00-00', 'JFP1E2690985', 'JFP12XGK750638', '-', 1, 4, 3529, 5529, '0000-00-00', '02:00:00', 'DUSUN I CITELANG RT.003/001', '087776895258'),
(49, 'SASV', 'SASV-111116010', '2016-11-11', 0, 1, 'KPB 2', 2, NULL, 0, 17500, 20000, 0, 17500, '', 'TEST002', 'ENCUM SUMIATI ', 'VARIO 125 CBS MMC', 'E1F02N11S1A/T', 'MATIC', '1970-01-01', 'JFU1E1637008', 'JFU115GK636116', '-', 1, 4, 784, 2784, '2017-01-10', '02:00:00', 'DUSUN  PAHING RT.002/001', '082129470753'),
(50, 'SASV', 'SASV-111116011', '2016-11-11', 0, 1, 'KPB 3', 2, NULL, 0, 39500, 50000, 0, 39500, '', 'E5474YAH', 'RAHMAT', 'New Vario eSP CBS', 'D1A02N18M1A/T', 'MATIC', '1970-01-01', 'JFX1E1135678', 'JFX114GK135316', '-', 6, 5, 7286, 9286, '2017-01-10', '02:00:00', 'DUSUN 1 RT 01/01', '085320348301'),
(51, 'SASV', 'SASV-111116012', '2016-11-11', 0, 1, 'PL', 2, NULL, 60000, 52500, 120000, 0, 112500, '', 'E2250ZW', 'DENY MADYANI', 'CB150R', 'CB15A1RRFM/T', 'SPROT', '0000-00-00', '-', '-', '-', 1, 4, 0, 0, '0000-00-00', '02:15:00', 'JAPARA', '089626412714'),
(52, 'SASV', 'SASV-111116013', '2016-11-11', 0, 1, 'PL', 2, NULL, 60500, 215500, 300000, 0, 276000, '', 'E5260IAB', 'AMIN', 'ABSOLUTE REVO', 'NF11B1CAM/T', 'BEBEK', '0000-00-00', '', '', '', 6, 3, 0, 0, '0000-00-00', '02:00:00', 'INDRAPATRA', '085295815040'),
(53, 'SASV', 'SASV-111116014', '2016-11-11', 0, 1, '', 2, NULL, 10000, 0, 10000, 0, 10000, '', 'E4073ZO', '-', 'NEW VARIO TECHNO PGM FI', 'NC12A1CF1A/T', 'MATIC', '1970-01-01', '', '', '', 6, 2, 0, 0, '2017-01-10', '12:15:00', '-', '-'),
(54, 'SASV', 'SASV-111116015', '2016-11-11', 0, 1, 'PL , HR', 2, NULL, 76000, 75500, 151500, 0, 151500, '', 'E3912YAE', 'LILI ELAWATI', 'BEAT SPORTY CW', 'X1B02N04L0A/T', 'MATIC', '0000-00-00', '', '', '', 6, 5, 0, 0, '0000-00-00', '02:30:00', 'DUSUN MULYA RT 01/01', '085724305633'),
(55, 'SASV', 'SASV-111116016', '2016-11-11', 0, 1, 'PL', 2, NULL, 50000, 0, 50000, 0, 50000, '', 'E2933ZI', 'RASDI', 'NEW', 'GL160D', 'SPORT', '0000-00-00', '', '', '', 1, 2, 0, 0, '0000-00-00', '02:15:00', 'CIKELENG', '081324913800'),
(56, 'SASV', 'SASV-111116017', '2016-11-11', 0, 1, 'PL', 2, NULL, 60000, 59500, 0, 0, 119500, '', 'E3333YAA', 'AMELIA MARYANI', 'NEW VARIO 125 CBS', 'E1F02N11M2A/T', 'MATIC', '0000-00-00', 'JFU1E1096706', 'JFU11XFK096647', '-', 1, 2, 0, 0, '0000-00-00', '02:15:00', 'DUSUN MANIS RT.01/01', '085333334725'),
(60, 'SASV', 'SASV-111116018', '2016-11-11', 0, 1, 'PL', 2, NULL, 46000, 61500, 110000, 0, 107500, '', 'E3194ZS', 'KOMARUDIN ', 'BEAT', 'NC11BF1CA/T', 'MATIC', '1970-01-01', '-', '-', '-', 6, 5, 0, 0, '2017-01-10', '02:15:00', 'PANCALANG ', '081221970295'),
(61, 'SASV', 'SASV-111116019', '2016-11-11', 0, 1, '', 2, NULL, 17500, 184000, 0, 0, 201500, '', 'E3430NC', 'REVO ', 'REVO', 'NF100TD', 'BEBEK', '0000-00-00', '-', '-', '-', 1, 3, 0, 0, '0000-00-00', '02:45:00', '-', '-'),
(62, 'SASV', 'SASV-111116020', '2016-11-11', 0, 1, 'PL', 2, NULL, 53500, 0, 55000, 0, 53500, '', 'E5414YA', 'ANDI', 'BEAT FI CW', 'NC11BF1CA/T', 'MATIC', '0000-00-00', '-', '-', '-', 1, 4, 0, 0, '0000-00-00', '02:15:00', 'MANIS KIDUL', '-'),
(63, 'SASV', 'SASV-111116021', '2016-11-11', 0, 1, 'PL', 2, NULL, 36000, 39500, 100000, 0, 75500, '', 'E6071ZV', 'AMIN', 'BEAT FI CW', 'NC11BF1CA/T', 'MATIC', '0000-00-00', '-', '-', '-', 1, 2, 0, 0, '0000-00-00', '02:15:00', 'SANGKAN MULYA', '-'),
(64, 'SASV', 'SASV-111116022', '2016-11-11', 0, 1, 'KPB 2, PL', 2, NULL, 0, 47500, 50000, 0, 47500, '', 'E2339YAI', 'ASEP SAEPUDIN', 'VARIO', 'E1F02N12S1A/T', 'MATIC', '1970-01-01', 'JFV1E1378088', 'JFV115GK368982', '-', 1, 3, 3748, 5748, '2017-01-10', '09:15:00', 'BLOK DESA RT.01/01', '081222688389'),
(65, 'SASV', 'SASV-121116023', '2016-11-12', 0, 1, '', 2, NULL, 40000, 39500, 80000, 0, 79500, '', 'B4957FEZ', 'WARDOYO', 'SPACY', 'NC11D1CF1A/T', 'MATIC', '1970-01-01', '-', '-', '-', 1, 4, 0, 0, '2017-01-11', '04:45:00', 'BANDORASA', '081398695259'),
(66, 'SASV', 'SASV-121116024', '2016-11-12', 0, 1, '', 2, NULL, 36000, 44500, 50000, 0, 80500, '', 'E4077ZP', 'SARDI', 'BEAT', 'NC11BF1CA/T', 'MATIC', '1970-01-01', '-', '-', '-', 1, 3, 0, 0, '2017-01-11', '04:15:00', 'PANCALANG', '081322054810'),
(67, 'SASV', 'SASV-121116025', '2016-11-12', 0, 1, '', 2, NULL, 0, 37500, 40000, 0, 37500, '', 'E3191YAH', 'SUGONDO', 'NEW', 'AFX12U22C08AM/T', 'BEBEK', '1970-01-01', 'JBP1E1402022', 'JBP113GK401937', '-', 1, 4, 7825, 9825, '2017-01-11', '03:00:00', 'DUSUN PAHING RT.10/03', '-'),
(69, 'SASV', 'SASV-161116026', '2016-11-16', 0, 0, '', 0, NULL, 0, 0, 0, 0, 0, '', '', '', 'NEW VARIO', '', '', '0000-00-00', '', '', '', 0, 0, 0, 0, '0000-00-00', '00:00:00', '', ''),
(70, 'SASV', 'SASV-161116027', '2016-11-16', 0, 0, '', 0, NULL, 0, 0, 0, 0, 0, '', '', '', 'NEW VARIO 125 CBS', '', '', '0000-00-00', '', '', '', 0, 0, 0, 0, '0000-00-00', '00:00:00', '', ''),
(71, 'SASV', 'SASV-161116028', '2016-11-16', 0, 0, '', 0, NULL, 0, 0, 0, 0, 0, '', '', '', 'BEAT', '', '', '0000-00-00', '', '', '', 0, 0, 0, 0, '0000-00-00', '00:00:00', '', ''),
(72, 'SASV', 'SASV-161116029', '2016-11-16', 0, 0, '', 0, NULL, 0, 0, 0, 0, 0, '', '', '', '', '', '', '0000-00-00', '', '', '', 0, 0, 0, 0, '0000-00-00', '00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `salesservicedet`
--

CREATE TABLE IF NOT EXISTS `salesservicedet` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL,
  `barcode` varchar(225) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `unitprice` double NOT NULL,
  `discount` int(11) NOT NULL,
  `discountamt` double NOT NULL,
  `amount` double NOT NULL,
  `quantity` double NOT NULL,
  `stockqty` double NOT NULL,
  `avlqty` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `salesservicedet`
--

INSERT INTO `salesservicedet` (`idtransdet`, `transid`, `inventoryid`, `barcode`, `unit`, `unitprice`, `discount`, `discountamt`, `amount`, `quantity`, `stockqty`, `avlqty`) VALUES
(18, 48, 69, '', 'PCS', 39500, 0, 0, 39500, 1, 228, 227),
(20, 49, 76, '', 'PCS', 17500, 0, 0, 17500, 1, 56, 55),
(21, 49, 69, '', 'PCS', 39500, 0, 39500, 0, 1, 228, 227),
(22, 50, 69, '', 'PCS', 39500, 0, 0, 39500, 1, 226, 225),
(23, 46, 69, '', 'PCS', 39500, 0, 0, 39500, 1, 225, 224),
(24, 51, 74, '', 'PCS', 52500, 0, 0, 52500, 1, 31, 30),
(25, 52, 71, '', 'PCS', 37500, 0, 0, 37500, 1, 93, 92),
(26, 52, 30, '', 'PCS', 144500, 0, 0, 144500, 1, 8, 7),
(27, 52, 280, '', 'PCS', 33500, 0, 0, 33500, 1, 3, 2),
(28, 54, 69, '', 'PCS', 39500, 0, 0, 39500, 1, 224, 223),
(29, 54, 68, '', 'PCS', 12000, 0, 0, 12000, 1, 83, 82),
(30, 54, 147, '', 'PCS', 8000, 0, 0, 24000, 3, 26, 23),
(31, 56, 72, '', 'PCS', 47500, 0, 0, 47500, 1, 24, 23),
(34, 60, 69, '', 'PCS', 39500, 0, 0, 39500, 1, 228, 227),
(35, 60, 572, '', 'PCS', 22000, 0, 0, 22000, 1, 13, 12),
(38, 56, 252, '', 'PCS', 6000, 0, 0, 12000, 2, 27, 25),
(39, 61, 22, '', 'PCS', 170000, 0, 0, 170000, 1, 4, 3),
(40, 61, 272, '', 'PCS', 14000, 0, 0, 14000, 1, 5, 4),
(41, 63, 69, '', 'PCS', 39500, 0, 0, 39500, 1, 227, 226),
(42, 64, 72, '', 'PCS', 47500, 0, 0, 47500, 1, 23, 22),
(43, 65, 69, '', 'PCS', 39500, 0, 0, 39500, 1, 227, 226),
(44, 67, 71, '', 'PCS', 37500, 0, 0, 37500, 1, 92, 91),
(45, 66, 70, '', 'PCS', 44500, 0, 0, 44500, 1, 71, 70);

-- --------------------------------------------------------

--
-- Table structure for table `salesservicedet2`
--

CREATE TABLE IF NOT EXISTS `salesservicedet2` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `vehicleserviceid` int(11) NOT NULL,
  `kilometer` double NOT NULL,
  `employeeid` int(11) NOT NULL,
  `unitprice` double NOT NULL,
  `discount` int(11) NOT NULL,
  `discountamt` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `salesservicedet2`
--

INSERT INTO `salesservicedet2` (`idtransdet`, `transid`, `vehicleserviceid`, `kilometer`, `employeeid`, `unitprice`, `discount`, `discountamt`, `subtotal`) VALUES
(27, 47, 5, 0, 0, 36000, 0, 0, 36000),
(29, 47, 13, 0, 0, 7500, 0, 0, 7500),
(33, 49, 3, 0, 0, 19500, 0, 19500, 0),
(34, 50, 17, 0, 0, 18000, 0, 18000, 0),
(35, 46, 5, 0, 0, 36000, 0, 0, 36000),
(36, 51, 21, 0, 0, 60000, 0, 0, 60000),
(37, 52, 26, 0, 0, 33000, 0, 0, 33000),
(38, 52, 27, 0, 0, 27500, 0, 0, 27500),
(39, 53, 28, 0, 0, 10000, 0, 0, 10000),
(40, 54, 5, 0, 0, 36000, 0, 0, 36000),
(41, 54, 29, 0, 0, 40000, 0, 0, 40000),
(42, 55, 30, 0, 0, 50000, 0, 0, 50000),
(44, 56, 2, 0, 0, 40000, 0, 0, 40000),
(45, 60, 5, 0, 0, 36000, 0, 0, 36000),
(46, 61, 31, 0, 0, 17500, 0, 0, 17500),
(49, 62, 5, 0, 0, 36000, 0, 0, 36000),
(50, 62, 10, 0, 0, 17500, 0, 0, 17500),
(52, 63, 5, 0, 0, 36000, 0, 0, 36000),
(54, 56, 32, 0, 0, 20000, 0, 0, 20000),
(55, 60, 33, 0, 0, 10000, 0, 0, 10000),
(56, 64, 34, 0, 0, 18000, 0, 18000, 0),
(57, 65, 43, 0, 0, 40000, 0, 0, 40000),
(58, 66, 5, 0, 0, 36000, 0, 0, 36000),
(59, 67, 47, 0, 0, 18000, 0, 18000, 0),
(60, 48, 4, 0, 0, 18000, 0, 18000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesvehicle`
--

CREATE TABLE IF NOT EXISTS `salesvehicle` (
`idtrans` int(11) NOT NULL,
  `notrans` varchar(50) NOT NULL,
  `datetrans` date NOT NULL,
  `paytypeid` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `codetrans` varchar(4) DEFAULT NULL,
  `cusname` varchar(225) NOT NULL,
  `bpkbname` varchar(225) NOT NULL,
  `noktp` varchar(225) NOT NULL,
  `nosim` varchar(225) NOT NULL,
  `address` varchar(500) NOT NULL,
  `villageid` int(11) NOT NULL,
  `districtsid` int(11) NOT NULL,
  `cityid` int(11) DEFAULT NULL,
  `telp` varchar(225) NOT NULL,
  `handphone` varchar(225) NOT NULL,
  `religion` varchar(225) NOT NULL,
  `sex` varchar(225) NOT NULL,
  `datebirth` date NOT NULL,
  `job` varchar(225) NOT NULL,
  `maritalstatus` varchar(225) NOT NULL,
  `customerid` int(11) DEFAULT NULL,
  `deliverydate` date NOT NULL,
  `spkno` varchar(225) NOT NULL,
  `pono` varchar(225) NOT NULL,
  `dono` varchar(225) NOT NULL,
  `vehiclemodel` varchar(225) NOT NULL,
  `vehicletype` varchar(224) NOT NULL,
  `vehiclejenis` varchar(225) NOT NULL,
  `vehiclecolor` varchar(100) NOT NULL,
  `mechineno` int(11) NOT NULL,
  `rangkano` varchar(225) NOT NULL,
  `year` varchar(225) NOT NULL,
  `otr` varchar(225) NOT NULL,
  `samsatid` int(225) NOT NULL,
  `beanotice` double NOT NULL,
  `beaadm` double NOT NULL,
  `bbntotal` double NOT NULL,
  `policeno` varchar(225) NOT NULL,
  `stnkno` varchar(225) NOT NULL,
  `nostock` varchar(225) NOT NULL,
  `finishdate` date NOT NULL,
  `receiver` varchar(225) NOT NULL,
  `bpkbname2` varchar(225) NOT NULL,
  `bpkbno` varchar(224) NOT NULL,
  `bpkbbkservice` varchar(225) NOT NULL,
  `tunaiscpmd` double DEFAULT NULL,
  `tunaiscpdaeler` double(255,0) DEFAULT NULL,
  `tunaidscmarketing` double DEFAULT NULL,
  `tunaidsckonsumen` double DEFAULT NULL,
  `credittype` varchar(255) DEFAULT NULL,
  `leasing` varchar(255) DEFAULT NULL,
  `channelid` int(11) NOT NULL,
  `subleasing` varchar(255) DEFAULT NULL,
  `creditscmd` double(255,0) DEFAULT NULL,
  `creditscpdealer` double DEFAULT NULL,
  `creditsubsidi` double DEFAULT NULL,
  `creditgrossdp` double DEFAULT NULL,
  `creditdiscmarketing` double DEFAULT NULL,
  `creditdisckonsumen` double DEFAULT NULL,
  `creditnettdp` double DEFAULT NULL,
  `credittenor` double DEFAULT NULL,
  `creditcicilan` double DEFAULT NULL,
  `creditcostadm` double DEFAULT NULL,
  `salesmanid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `salesvehicle`
--

INSERT INTO `salesvehicle` (`idtrans`, `notrans`, `datetrans`, `paytypeid`, `remark`, `status`, `codetrans`, `cusname`, `bpkbname`, `noktp`, `nosim`, `address`, `villageid`, `districtsid`, `cityid`, `telp`, `handphone`, `religion`, `sex`, `datebirth`, `job`, `maritalstatus`, `customerid`, `deliverydate`, `spkno`, `pono`, `dono`, `vehiclemodel`, `vehicletype`, `vehiclejenis`, `vehiclecolor`, `mechineno`, `rangkano`, `year`, `otr`, `samsatid`, `beanotice`, `beaadm`, `bbntotal`, `policeno`, `stnkno`, `nostock`, `finishdate`, `receiver`, `bpkbname2`, `bpkbno`, `bpkbbkservice`, `tunaiscpmd`, `tunaiscpdaeler`, `tunaidscmarketing`, `tunaidsckonsumen`, `credittype`, `leasing`, `channelid`, `subleasing`, `creditscmd`, `creditscpdealer`, `creditsubsidi`, `creditgrossdp`, `creditdiscmarketing`, `creditdisckonsumen`, `creditnettdp`, `credittenor`, `creditcicilan`, `creditcostadm`, `salesmanid`, `username`) VALUES
(1, 'SLKN-161116001', '2016-11-16', 0, '', 0, 'SLKN', '', '', '', '', '', 0, 0, NULL, '', '', '', '', '0000-00-00', '', '', NULL, '0000-00-00', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salesvehiclepay`
--

CREATE TABLE IF NOT EXISTS `salesvehiclepay` (
`idtrans` int(11) NOT NULL,
  `notrans` varchar(50) NOT NULL,
  `datetrans` date NOT NULL,
  `paytypeid` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `transcode` varchar(4) DEFAULT NULL,
  `cusname` varchar(225) NOT NULL,
  `bpkbname` varchar(225) NOT NULL,
  `noktp` varchar(225) NOT NULL,
  `nosim` varchar(225) NOT NULL,
  `address` varchar(500) NOT NULL,
  `villageid` int(11) NOT NULL,
  `districtsid` int(11) NOT NULL,
  `telp` varchar(225) NOT NULL,
  `handphone` varchar(225) NOT NULL,
  `religion` varchar(225) NOT NULL,
  `sex` varchar(225) NOT NULL,
  `datebirth` date NOT NULL,
  `job` varchar(225) NOT NULL,
  `maritalstatus` varchar(225) NOT NULL,
  `deliverydate` date NOT NULL,
  `spkno` varchar(225) NOT NULL,
  `pono` varchar(225) NOT NULL,
  `dono` varchar(225) NOT NULL,
  `vehiclemodelid` int(11) NOT NULL,
  `vehicletypeid` int(11) NOT NULL,
  `vehiclecolorid` int(11) NOT NULL,
  `mechineno` int(11) NOT NULL,
  `rangkano` varchar(225) NOT NULL,
  `year` varchar(225) NOT NULL,
  `otr` varchar(225) NOT NULL,
  `samsat` varchar(225) NOT NULL,
  `beanotice` double NOT NULL,
  `beaadm` double NOT NULL,
  `bbntotal` double NOT NULL,
  `policeno` varchar(225) NOT NULL,
  `stnkno` varchar(225) NOT NULL,
  `nostock` varchar(225) NOT NULL,
  `finishdate` date NOT NULL,
  `receiver` varchar(225) NOT NULL,
  `bpkbname2` varchar(225) NOT NULL,
  `bpkbno` varchar(224) NOT NULL,
  `bpkbbkservice` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `samsat`
--

CREATE TABLE IF NOT EXISTS `samsat` (
`idsamsat` int(11) NOT NULL,
  `samsatname` varchar(225) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
`id` int(11) NOT NULL,
  `session_key` varchar(32) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session_key`, `username`, `waktu`, `id_user`) VALUES
(1, 'IlPwMxAs3mudOfhEeVtbCFiD2zQRJ7UT', 'admin', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipgoodsdet`
--

CREATE TABLE IF NOT EXISTS `shipgoodsdet` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `retqty` double NOT NULL,
  `salesdetid` int(8) NOT NULL,
  `invoicearid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shipto`
--

CREATE TABLE IF NOT EXISTS `shipto` (
  `idshipto` int(11) NOT NULL,
  `shiptoname` varchar(225) NOT NULL,
  `shiptoaddress` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slip`
--

CREATE TABLE IF NOT EXISTS `slip` (
`idslip` int(11) NOT NULL,
  `slipname` varchar(50) NOT NULL,
  `module` varchar(225) NOT NULL,
  `subnavmenuid` int(50) NOT NULL,
  `sequencenumber` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `slip`
--

INSERT INTO `slip` (`idslip`, `slipname`, `module`, `subnavmenuid`, `sequencenumber`) VALUES
(2, 'Purchase Order', 'purchaseorder_slip', 40, 1),
(4, 'Sales Order', 'sales_slip', 33, 1),
(1, 'Purchase Return', 'purchasereturn_slip', 42, 1),
(6, 'Sales Return', 'salesreturn_slip', 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stockopname`
--

CREATE TABLE IF NOT EXISTS `stockopname` (
`idtrans` int(11) NOT NULL,
  `codetrans` varchar(4) NOT NULL,
  `notrans` varchar(50) NOT NULL,
  `datetrans` date NOT NULL,
  `matusedtypeid` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `transcode` varchar(4) DEFAULT NULL,
  `totalamount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stockopnamedet`
--

CREATE TABLE IF NOT EXISTS `stockopnamedet` (
`idtransdet` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `stockqty` double NOT NULL,
  `adjqty` double NOT NULL,
  `quantity` double NOT NULL,
  `userid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subnavmenu`
--

CREATE TABLE IF NOT EXISTS `subnavmenu` (
`idsubnavmenu` int(11) NOT NULL,
  `subnavmenuname` varchar(50) NOT NULL,
  `navmenuid` int(50) NOT NULL,
  `sequencenumber` int(11) NOT NULL,
  `submodule` varchar(225) NOT NULL,
  `specialcharacter` varchar(2) NOT NULL DEFAULT '"'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `subnavmenu`
--

INSERT INTO `subnavmenu` (`idsubnavmenu`, `subnavmenuname`, `navmenuid`, `sequencenumber`, `submodule`, `specialcharacter`) VALUES
(1, 'Register New User', 5, 3, 'adduser', '"'),
(2, 'Ubah Password', 5, 2, 'changepassword', '"'),
(3, 'User Type', 5, 3, 'usertype', '"'),
(4, 'Otorisasi User', 5, 5, 'menuautorized', '"'),
(8, 'Riwayat Pengguna', 5, 7, 'userlog', '"'),
(5, 'Broadcast Notification', 5, 4, 'notification', '"'),
(6, 'Mailbox', 5, 1, 'ticket', '"'),
(42, 'Retur Pembelian', 100, 3, 'purchasereturn', '"'),
(71, 'Koreksi Stok', 106, 1, 'inventoryadj', '"'),
(40, 'Pembelian', 100, 1, 'purchaseorder', '"'),
(33, 'Penjualan Sparepart', 2, 1, 'sales', '"'),
(36, 'Retur Penjualan', 2, 6, 'salesreturn', '"'),
(37, 'Pemakaian Material', 106, 1, 'materialused', '"'),
(28, 'Backup & Restore Database', 5, 4, 'backuprestore', '"'),
(29, 'Bidang', 7, 1, 'part', '"'),
(86, 'Laporan Hutang', 3, 7, 'rptap', '"'),
(84, 'Laporan Kas & Bank', 3, 8, 'rptcashbank', '"'),
(48, 'Pembayaran Hutang', 102, 1, 'appayment', '"'),
(113, 'Laporan Pendapatan Mekanik', 3, 4, 'rptsalesmekanik', '"'),
(107, 'Upload Sparepart', 105, 2, 'inventoryupl', '"'),
(10, 'Stok Opnam', 106, 1, 'stockopname', '"'),
(9, 'Jenis Penggunaan', 105, 8, 'matusedtype', '"'),
(54, 'Sparepart', 105, 1, 'inventory', '"'),
(55, 'Jenis Sparepart', 105, 4, 'inventorytype', '"'),
(56, 'Pelanggan', 108, 1, 'customer', '"'),
(85, 'Satuan Sparepart', 105, 6, 'unit', '"'),
(88, 'Tipe Pelanggan', 108, 2, 'customertype', '"'),
(119, 'Group Model', 107, 5, 'vehlicemodelgroup', '"'),
(96, 'Departemen', 108, 5, 'department', '"'),
(7, 'Jenis Pembayaran', 109, 9, 'paytype', '"'),
(65, 'Merek Sparepart', 105, 5, 'inventorybrand', '"'),
(120, 'Laporan Pendapatan Bengkel', 3, 3, 'rptsalesservice', '"'),
(67, 'Ukuran Sparepart', 105, 7, 'inventorysize', '"'),
(69, 'Pemasok', 108, 3, 'supplier', '"'),
(78, 'Laporan Stok Sparepart', 3, 5, 'rptstockending', '"'),
(106, 'Laporan Penjualan Sparepart', 3, 2, 'rptsalesbypart', '"'),
(105, 'Laporan Piutang', 5, 3, 'rptaccountrec', '"'),
(115, 'Channel / Outlet', 108, 8, 'channel', '"'),
(89, 'Pegawai', 108, 4, 'employee', '"'),
(90, 'Type Kendaraan', 107, 7, 'vehicletype', '"'),
(91, 'Golongan Sparepart', 105, 3, 'inventorygroup', '"'),
(92, 'Lokasi', 109, 8, 'location', '"'),
(94, 'Leasing', 108, 7, 'leasing', '"'),
(95, 'Balik Nama Kendaraan', 2, 5, 'bnn', '"'),
(97, 'Jabatan', 108, 6, 'position', '"'),
(98, 'Kendaraan', 107, 1, 'vehicle', '"'),
(99, 'Jenis Servis', 107, 4, 'vehicleservice', '"'),
(100, 'Warna Kendaraan', 107, 8, 'vehiclecolor', '"'),
(101, 'Servis Kendaraan', 2, 3, 'salesservice', '"'),
(102, 'Penjualan Kendaraan', 2, 2, 'salesvehicle', '"'),
(103, 'Penerimaan Barang', 100, 2, 'goodreceive', '"'),
(104, 'Penerimaan Piutang', 102, 2, 'arreceive', '"'),
(108, 'Antrian Servis', 2, 4, 'servicelist', '"'),
(109, 'Kelurahan', 109, 10, 'village', '"'),
(110, 'Kecamatan', 109, 11, 'districts', '"'),
(111, 'Upload Kendaraan', 107, 3, 'vehicleupl', '"'),
(114, 'Laporan Histori Pelanggan', 3, 3, 'rptsalescustomer', '"'),
(116, 'Samsat', 108, 9, 'samsat', '"'),
(117, 'Mutasi Kendaraan', 107, 2, 'vehiclemutation', '"'),
(118, 'Laporan Stok Kendaraan', 3, 6, 'rptstokendihvehicle', '"'),
(121, 'Part Group', 105, 6, 'inventorygroup', '"'),
(122, 'Laporan Akumulasi Harian', 3, 3, 'rptsalesaccdaily', '"'),
(123, 'Laporan Pendapatan Bengkel - Direct Sales', 3, 4, 'rptsalesservicedirect', '"'),
(124, 'Laporan Customer AHASS', 3, 5, 'rptsalesservicelose', '"'),
(125, 'Laporan Bulanan Bengkel', 3, 9, 'rptlbbwalkin', '"'),
(126, 'Laporan Prestasi Mekanik', 3, 7, 'rptmekanik', '"');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`idsupplier` int(11) NOT NULL,
  `registrationno` varchar(220) NOT NULL,
  `registrationdate` date NOT NULL,
  `suppliercode` varchar(50) DEFAULT NULL,
  `suppliername` varchar(250) NOT NULL,
  `supgrp` int(11) DEFAULT NULL,
  `suptype` varchar(50) DEFAULT NULL,
  `top1` int(11) DEFAULT NULL,
  `top2` int(11) DEFAULT NULL,
  `supreason` varchar(100) DEFAULT NULL,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `hp1` varchar(50) DEFAULT NULL,
  `hp2` varchar(50) DEFAULT NULL,
  `emailaddress` varchar(100) DEFAULT NULL,
  `website` varchar(120) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `orderingperson` varchar(50) DEFAULT NULL,
  `financeperson` varchar(50) DEFAULT NULL,
  `address1` varchar(240) DEFAULT NULL,
  `address2` varchar(240) DEFAULT NULL,
  `cityid` int(50) DEFAULT NULL,
  `suppliertypeid` int(11) NOT NULL,
  `suppliergroupid` int(11) NOT NULL,
  `bankaccountid` int(11) NOT NULL,
  `reknumber` varchar(100) NOT NULL,
  `zipcode` varchar(50) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `plafon` varchar(50) DEFAULT NULL,
  `flagexpedition` bit(1) DEFAULT b'0',
  `remark` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `registrationno`, `registrationdate`, `suppliercode`, `suppliername`, `supgrp`, `suptype`, `top1`, `top2`, `supreason`, `phone1`, `phone2`, `hp1`, `hp2`, `emailaddress`, `website`, `fax`, `orderingperson`, `financeperson`, `address1`, `address2`, `cityid`, `suppliertypeid`, `suppliergroupid`, `bankaccountid`, `reknumber`, `zipcode`, `npwp`, `plafon`, `flagexpedition`, `remark`, `status`) VALUES
(1, '001', '0000-00-00', NULL, 'MITRA UTAMA CIREBON', NULL, NULL, NULL, NULL, NULL, '', '089624980508', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JL.Tangkil Cirebon', NULL, NULL, 0, 0, 0, '', NULL, NULL, NULL, b'1', '', 0),
(2, '02', '0000-00-00', NULL, 'MITRA ABADI', NULL, NULL, NULL, NULL, NULL, '0231206161', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cirebon', NULL, NULL, 0, 0, 0, '', NULL, NULL, NULL, b'1', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
`idticket` int(11) NOT NULL,
  `ticketdate` datetime NOT NULL,
  `subject` varchar(225) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(25) NOT NULL,
  `replymessage` text NOT NULL,
  `atch` varchar(225) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticketstatus`
--

CREATE TABLE IF NOT EXISTS `ticketstatus` (
`idticketstatus` int(11) NOT NULL,
  `ticketstatusname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `top`
--

CREATE TABLE IF NOT EXISTS `top` (
`idtop` int(11) NOT NULL,
  `top` double DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
`idunit` int(11) NOT NULL,
  `unitname` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `userauthorized`
--

CREATE TABLE IF NOT EXISTS `userauthorized` (
  `menuid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
`iduserautorized` int(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=179 ;

--
-- Dumping data for table `userauthorized`
--

INSERT INTO `userauthorized` (`menuid`, `userid`, `iduserautorized`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(8, 1, 6),
(5, 1, 7),
(6, 1, 8),
(42, 1, 9),
(40, 1, 12),
(71, 1, 11),
(33, 1, 13),
(36, 1, 14),
(37, 1, 15),
(28, 1, 16),
(86, 1, 17),
(84, 1, 18),
(56, 5, 47),
(48, 1, 20),
(49, 1, 21),
(50, 1, 22),
(10, 1, 23),
(9, 1, 24),
(54, 1, 25),
(55, 1, 26),
(56, 1, 27),
(85, 1, 28),
(58, 1, 29),
(59, 1, 30),
(60, 1, 31),
(62, 1, 32),
(63, 1, 33),
(7, 1, 34),
(65, 1, 35),
(66, 1, 36),
(67, 1, 37),
(68, 1, 38),
(69, 1, 39),
(74, 1, 40),
(77, 1, 41),
(78, 1, 42),
(80, 1, 43),
(81, 1, 44),
(79, 1, 45),
(69, 5, 48),
(58, 5, 49),
(7, 5, 50),
(60, 5, 51),
(54, 5, 52),
(55, 5, 55),
(33, 5, 56),
(40, 5, 57),
(10, 5, 58),
(48, 5, 59),
(74, 5, 60),
(77, 5, 61),
(78, 5, 62),
(84, 5, 63),
(88, 1, 76),
(85, 5, 65),
(2, 5, 66),
(28, 5, 67),
(4, 5, 68),
(8, 5, 69),
(2, 6, 70),
(33, 6, 71),
(40, 6, 72),
(10, 6, 73),
(48, 6, 74),
(87, 1, 75),
(89, 1, 77),
(90, 1, 78),
(92, 1, 79),
(95, 1, 80),
(96, 1, 81),
(97, 1, 82),
(98, 1, 83),
(99, 1, 84),
(100, 1, 85),
(101, 1, 86),
(102, 1, 87),
(103, 1, 88),
(104, 1, 89),
(8, 6, 90),
(111, 1, 98),
(112, 1, 99),
(106, 1, 93),
(107, 1, 94),
(108, 1, 95),
(109, 1, 96),
(110, 1, 97),
(113, 1, 100),
(114, 1, 101),
(115, 1, 102),
(116, 1, 103),
(117, 1, 104),
(118, 1, 105),
(119, 1, 106),
(120, 1, 107),
(121, 1, 108),
(2, 7, 109),
(33, 7, 110),
(36, 7, 124),
(54, 7, 112),
(120, 7, 114),
(78, 7, 115),
(106, 7, 116),
(91, 7, 117),
(99, 7, 118),
(101, 7, 119),
(108, 7, 120),
(121, 7, 121),
(114, 7, 122),
(98, 7, 123),
(107, 7, 125),
(122, 1, 126),
(123, 1, 127),
(124, 1, 128),
(119, 7, 129),
(40, 7, 130),
(42, 7, 131),
(122, 7, 132),
(123, 7, 133),
(124, 7, 134),
(113, 8, 138),
(2, 8, 136),
(8, 8, 137),
(120, 8, 139),
(78, 8, 140),
(106, 8, 141),
(114, 8, 142),
(122, 8, 143),
(123, 8, 144),
(124, 8, 145),
(2, 9, 146),
(42, 9, 147),
(40, 9, 148),
(33, 9, 149),
(86, 9, 150),
(48, 9, 151),
(113, 9, 152),
(107, 9, 153),
(54, 9, 154),
(91, 9, 178),
(56, 9, 156),
(88, 9, 157),
(119, 9, 158),
(120, 9, 159),
(78, 9, 160),
(106, 9, 161),
(89, 9, 162),
(98, 9, 164),
(99, 9, 165),
(101, 9, 166),
(114, 9, 167),
(121, 9, 168),
(122, 9, 169),
(123, 9, 170),
(124, 9, 171),
(125, 1, 172),
(126, 1, 173),
(125, 8, 174),
(126, 8, 175),
(125, 9, 176),
(126, 9, 177);

-- --------------------------------------------------------

--
-- Table structure for table `userlocauthorized`
--

CREATE TABLE IF NOT EXISTS `userlocauthorized` (
  `locationid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
`iduserautorized` int(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `userlocauthorized`
--

INSERT INTO `userlocauthorized` (`locationid`, `userid`, `iduserautorized`) VALUES
(0, 1, 1),
(0, 1, 2),
(0, 1, 3),
(0, 1, 4),
(0, 1, 5),
(2, 1, 7),
(1, 1, 8),
(2, 7, 9),
(1, 6, 10),
(1, 8, 11),
(2, 8, 12),
(1, 9, 13);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
`iduserlog` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `logindate` datetime DEFAULT NULL,
  `logoutdate` datetime DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`iduserlog`, `username`, `logindate`, `logoutdate`) VALUES
(1, 'admin', '2016-11-08 20:32:06', '2016-11-08 20:32:00'),
(2, 'admin', '2016-11-08 22:17:42', '2016-11-08 22:17:00'),
(3, 'admin', '2016-11-09 09:38:06', '2016-11-09 09:38:00'),
(4, 'admin', '2016-11-09 09:38:09', '2016-11-09 09:38:00'),
(5, 'anastasia', '2016-11-09 10:38:59', '2016-11-09 10:38:00'),
(6, 'anastasia', '2016-11-09 10:39:52', '2016-11-09 10:39:00'),
(7, 'anastasia', '2016-11-09 10:45:25', '2016-11-09 10:45:00'),
(8, 'admin', '2016-11-09 10:59:13', '2016-11-09 10:59:00'),
(9, 'anastasia', '2016-11-09 12:12:24', '2016-11-09 12:12:00'),
(10, 'anastasia', '2016-11-09 12:19:26', '2016-11-09 12:19:00'),
(11, 'admin', '2016-11-09 12:22:23', '2016-11-09 12:22:00'),
(12, 'anastasia', '2016-11-09 14:13:19', '2016-11-09 14:13:00'),
(13, 'admin', '2016-11-09 14:17:51', '2016-11-09 14:17:00'),
(14, 'admin', '2016-11-10 06:33:15', '2016-11-10 06:33:00'),
(15, 'admin', '2016-11-10 06:56:38', '2016-11-10 06:56:00'),
(16, 'admin', '2016-11-10 06:59:03', '2016-11-10 06:59:00'),
(17, 'admin', '2016-11-10 21:24:51', '2016-11-10 21:24:00'),
(18, 'anastasia', '2016-11-10 21:30:19', '2016-11-10 21:30:00'),
(19, 'admin', '2016-11-10 21:37:35', '2016-11-10 21:37:00'),
(20, 'admin', '2016-11-10 21:39:49', '2016-11-10 21:39:00'),
(21, 'admin', '2016-11-10 21:44:04', '2016-11-10 21:44:00'),
(22, 'admin', '2016-11-11 08:16:16', '2016-11-11 08:16:00'),
(23, 'anastasia', '2016-11-11 09:28:46', '2016-11-11 09:28:00'),
(24, 'ADMIN', '2016-11-11 10:37:27', '2016-11-11 10:37:00'),
(25, 'admin', '2016-11-11 11:59:26', '2016-11-11 11:59:00'),
(26, 'anastasia', '2016-11-11 13:05:13', '2016-11-11 13:05:00'),
(27, 'admin', '2016-11-11 14:21:55', '2016-11-11 14:21:00'),
(28, 'admin', '2016-11-11 14:31:08', '2016-11-11 14:31:00'),
(29, 'admin', '2016-11-11 14:34:58', '2016-11-11 14:34:00'),
(30, 'admin', '2016-11-11 14:46:36', '2016-11-11 14:46:00'),
(31, 'anastasia', '2016-11-11 14:49:28', '2016-11-11 14:49:00'),
(32, 'admin', '2016-11-11 14:50:04', '2016-11-11 14:50:00'),
(33, 'admin', '2016-11-11 14:53:27', '2016-11-11 14:53:00'),
(34, 'admin', '2016-11-11 14:55:14', '2016-11-11 14:55:00'),
(35, 'admin', '2016-11-11 14:56:43', '2016-11-11 14:56:00'),
(36, 'admin', '2016-11-11 15:01:56', '2016-11-11 15:01:00'),
(37, 'admin', '2016-11-11 15:09:06', '2016-11-11 15:09:00'),
(38, 'anastasia', '2016-11-11 15:14:31', '2016-11-11 15:14:00'),
(39, 'admin', '2016-11-11 15:59:05', '2016-11-11 15:59:00'),
(40, 'admin', '2016-11-11 16:10:14', '2016-11-11 16:10:00'),
(41, 'anastasia', '2016-11-12 08:24:21', '2016-11-12 08:24:00'),
(42, 'admin', '2016-11-12 09:35:00', '2016-11-12 09:35:00'),
(43, 'admin', '2016-11-12 11:42:10', '2016-11-12 11:42:00'),
(44, 'admin', '2016-11-12 14:18:52', '2016-11-12 14:18:00'),
(45, 'ADMIN', '2016-11-12 14:59:32', '2016-11-12 14:59:00'),
(46, 'ADMIN', '2016-11-12 15:07:46', '2016-11-12 15:07:00'),
(47, 'admin', '2016-11-12 15:11:30', '2016-11-12 15:11:00'),
(48, 'admin', '2016-11-12 15:15:36', '2016-11-12 15:15:00'),
(49, 'admin', '2016-11-12 15:20:46', '2016-11-12 15:20:00'),
(50, 'admin', '2016-11-12 15:33:07', '2016-11-12 15:33:00'),
(51, 'admin', '2016-11-13 13:14:26', '2016-11-13 13:14:00'),
(52, 'admin', '2016-11-13 13:14:31', '2016-11-13 13:14:00'),
(53, 'Admin', '2016-11-13 14:28:21', '2016-11-13 14:28:00'),
(54, 'admin', '2016-11-13 16:53:43', '2016-11-13 16:53:00'),
(55, 'ADMIN', '2016-11-13 17:31:10', '2016-11-13 17:31:00'),
(56, 'admin', '2016-11-13 18:38:18', '2016-11-13 18:38:00'),
(57, 'admin', '2016-11-13 18:47:03', '2016-11-13 18:47:00'),
(58, 'admin', '2016-11-13 21:50:33', '2016-11-13 21:50:00'),
(59, 'admin', '2016-11-13 21:50:36', '2016-11-13 21:50:00'),
(60, 'admin', '2016-11-14 19:38:38', '2016-11-14 19:38:00'),
(61, 'admin', '2016-11-15 06:44:08', '2016-11-15 06:44:00'),
(62, 'admin', '2016-11-15 08:30:37', '2016-11-15 08:30:00'),
(63, 'admin', '2016-11-15 08:51:00', '2016-11-15 08:51:00'),
(64, 'admin', '2016-11-15 09:01:17', '2016-11-15 09:01:00'),
(65, 'admin', '2016-11-15 10:18:18', '2016-11-15 10:18:00'),
(66, 'admin', '2016-11-15 10:29:37', '2016-11-15 10:29:00'),
(67, 'admin', '2016-11-15 10:32:00', '2016-11-15 10:32:00'),
(68, 'admin', '2016-11-15 10:33:10', '2016-11-15 10:33:00'),
(69, 'admin', '2016-11-15 13:21:06', '2016-11-15 13:21:00'),
(70, 'admin', '2016-11-16 07:07:46', '2016-11-16 07:07:00'),
(71, 'user01', '2016-11-16 07:15:20', '2016-11-16 07:15:00'),
(72, 'admin', '2016-11-16 07:16:08', '2016-11-16 07:16:00'),
(73, 'admin', '2016-11-16 07:22:10', '2016-11-16 07:22:00'),
(74, 'kasir', '2016-11-16 07:26:58', '2016-11-16 07:26:00'),
(75, 'admin', '2016-11-16 07:36:00', '2016-11-16 07:36:00'),
(76, 'admin', '2016-11-16 07:40:40', '2016-11-16 07:40:00'),
(77, 'anastasia', '2016-11-16 07:43:41', '2016-11-16 07:43:00'),
(78, 'anastasia', '2016-11-16 07:43:46', '2016-11-16 07:43:00'),
(79, 'admin', '2016-11-16 07:44:13', '2016-11-16 07:44:00'),
(80, 'admin', '2016-11-16 07:44:57', '2016-11-16 07:44:00'),
(81, 'kasir', '2016-11-16 07:45:08', '2016-11-16 07:45:00'),
(82, 'kasir', '2016-11-16 07:45:14', '2016-11-16 07:45:00'),
(83, 'kasir', '2016-11-16 07:46:29', '2016-11-16 07:46:00'),
(84, 'kasir', '2016-11-16 07:52:03', '2016-11-16 07:52:00'),
(85, 'admin', '2016-11-16 09:00:42', '2016-11-16 09:00:00'),
(86, 'KASIR', '2016-11-16 09:44:42', '2016-11-16 09:44:00'),
(87, 'admin', '2016-11-16 09:48:35', '2016-11-16 09:48:00'),
(88, 'admin', '2016-11-16 09:50:21', '2016-11-16 09:50:00'),
(89, 'admin', '2016-11-16 14:07:09', '2016-11-16 14:07:00'),
(90, 'admin', '2016-11-16 16:42:22', '2016-11-16 16:42:00'),
(91, 'admin', '2016-11-16 17:28:25', '2016-11-16 17:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(8000) NOT NULL,
  `usertypeid` int(11) NOT NULL,
  `active` int(50) NOT NULL,
  `begindate` date NOT NULL,
  `enddate` date NOT NULL,
  `employeeid` int(11) NOT NULL,
  `periodid` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `recorded` datetime NOT NULL,
  `imageprofile` varchar(255) NOT NULL,
  `idtrans` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `usertypeid`, `active`, `begindate`, `enddate`, `employeeid`, `periodid`, `transid`, `name`, `email`, `recorded`, `imageprofile`, `idtrans`) VALUES
(1, 'admin', 'YNh9hIDTzN9gkt0naniPaw==', 1, 5, '2016-11-11', '2016-11-11', 96, 1, 19, 'Husni Mubarok', 'husni.mubarok@outlook.com', '0000-00-00 00:00:00', '20151012_561baed03a54e.png', 0),
(6, 'user01', 'dqOS2VFh3o9TwbQRZ0BjpQ==', 2, 0, '0000-00-00', '0000-00-00', 0, 0, 0, 'user', 'user@gmail.com', '2016-09-27 14:26:37', '1.jpg', 0),
(5, 'administrator', 'rhd6lICWIfBBbVfUz+QSmA==', 1, 0, '0000-00-00', '0000-00-00', 0, 0, 0, 'administrator', 'administrator@gmail.com', '2016-09-19 17:30:46', '1.jpg', 0),
(7, 'Anastasia', 'sgFlVrQBlkgIHvb5CLhEiQ==', 1, 0, '2016-11-11', '2016-11-11', 0, 0, 0, 'Anastasia', 'anastasia@mitrautama.com', '2016-11-09 09:46:18', '', 0),
(8, 'steve', 'sgFlVrQBlkgIHvb5CLhEiQ==', 2, 0, '0000-00-00', '0000-00-00', 0, 0, 0, 'Steve A.S.', 'test@mail.com', '2016-11-16 07:16:59', '', 0),
(9, 'kasir', 'sgFlVrQBlkgIHvb5CLhEiQ==', 2, 0, '0000-00-00', '0000-00-00', 0, 0, 0, 'kasir', 'test@mail.com', '2016-11-16 07:17:34', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
`idusertype` int(11) NOT NULL,
  `usertypename` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`idusertype`, `usertypename`) VALUES
(1, 'Administrator'),
(2, 'Standard User');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
`idvehicle` int(11) NOT NULL,
  `vehlicetype` varchar(225) NOT NULL,
  `vehlicemodel` varchar(225) NOT NULL,
  `vehlicejenis` varchar(225) NOT NULL,
  `cc` int(11) NOT NULL,
  `otr` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12275 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`idvehicle`, `vehlicetype`, `vehlicemodel`, `vehlicejenis`, `cc`, `otr`, `status`) VALUES
(1, 'ACB2J21B02A/T', 'VARIO TECHNO CBS', 'MATIC', 0, 0, 0),
(6, 'ACB2J22B03A/T', 'VARIO TECHNO CBS ISS', 'MATIC', 0, 0, 0),
(13, 'ACF1L21B06A/T', 'NEW SCOOPY CW', 'MATIC', 0, 0, 0),
(14, 'ACH1M21B04A/T', 'BEAT SW FI MMC', 'MATIC', 0, 0, 0),
(34, 'AFP12W21C03M/T', 'BLADE S 125 FI', 'BEBEK', 0, 0, 0),
(35, 'AFP12W21C08AM/T', 'BLADE R 125 FI REPSOL', 'BEBEK', 0, 0, 0),
(37, 'AFP12W21C08M/T', 'BLADE S 125 FI', 'BEBEK', 0, 0, 0),
(38, 'AFP12W22C08AM/T', 'NEW BLADE 125 FI R', 'BEBEK', 0, 0, 0),
(39, 'AFP12W22C08M/T', 'NEW BLADE 125 FI R STD', 'BEBEK', 0, 0, 0),
(58, 'AFX12U21C07M/T', 'NEW SUPRA X 125 FI SW', 'BEBEK', 0, 0, 0),
(63, 'AFX12U22C07M/T', 'NEW SUPRA X 125 SW FI MMC', 'BEBEK', 0, 0, 0),
(64, 'AFX12U22C08AM/T', 'NEW SUPRA X 125 CW FI MMC', 'BEBEK', 0, 0, 0),
(68, 'ATI1I21B01A/T', 'NEW VARIO FI', 'MATIC', 0, 0, 0),
(76, 'C1C02N16M2A/T', 'SCOOPY ESP', 'MATIC', 0, 0, 0),
(80, 'C1C02N16M2SA/T', 'SCOOPY SPORTY', 'MATIC', 0, 0, 0),
(85, 'CB15A1RRF1M/T', 'CB150R STREETFIRE', 'SPROT', 0, 0, 0),
(86, 'CB15A1RRFM/T', 'CB150R', 'SPROT', 0, 0, 0),
(121, 'CB500FAGINM/T', 'CB500F ABS', 'SPROT', 0, 0, 0),
(123, 'CB500FF3EDM/T', 'CB500F', 'SPROT', 0, 0, 0),
(124, 'CB500FGINM/T', 'CB500F STANDARD', 'SPROT', 0, 0, 0),
(126, 'CB500XAFEDM/T', 'CB500X', 'SPROT', 0, 0, 0),
(127, 'CB500XAG2INM/T', 'CB500X ABS', 'SPROT', 0, 0, 0),
(130, 'CB650FAEEDM/T', 'CB650F', 'SPROT', 0, 0, 0),
(132, 'CB650FAG6EDM/T', 'CB650F ABS', 'SPROT', 0, 0, 0),
(133, 'CBR1000SAFEDM/T', 'CBR1000RR SP', 'SPROT', 0, 0, 0),
(134, 'CBR150RC(IN)M/T', 'CBR 150R', 'SPROT', 0, 0, 0),
(138, 'CBR250RAFINM/T', 'NEW CBR 250R ABS', 'SPROT', 0, 0, 0),
(141, 'CBR250RFINM/T', 'NEW CBR 250R STD', 'SPROT', 0, 0, 0),
(143, 'CBR500RAGINM/T', 'CBR500R ABS', 'SPROT', 0, 0, 0),
(145, 'CBR650FAEEDM/T', 'CBR650F', 'SPROT', 0, 0, 0),
(146, 'CS12A1RR', 'CS1', 'SPROT', 0, 0, 0),
(147, 'CS12A1RR1M/T', 'CS1', 'SPROT', 0, 0, 0),
(150, 'D1A02N18M1A/T', 'New Vario eSP CBS', 'MATIC', 0, 0, 0),
(151, 'D1A02N18M1AA/T', 'New Vario eSP CBS Advance', 'MATIC', 0, 0, 0),
(154, 'D1A02N19M1A/T', 'New Vario eSP CBS ISS', 'MATIC', 0, 0, 0),
(155, 'D1A02N19M1AA/T', 'New Vario eSP CBS ISS Advance', 'MATIC', 0, 0, 0),
(158, 'D1B02N12L2A/T', 'NEW AT LOW CBS', 'MATIC', 0, 0, 0),
(159, 'D1B02N13L2A/T', 'NEW AT LOW CBS ISS', 'MATIC', 0, 0, 0),
(162, 'D1B02N26L2A/T', 'NEW AT LOW CW', 'MATIC', 0, 0, 0),
(164, 'D1I02N27M1A/T', 'BEAT STREET CBS', 'MATIC', 0, 0, 0),
(165, 'E1F02N11M2A/T', 'NEW VARIO 125 CBS', 'MATIC', 0, 0, 0),
(167, 'E1F02N11S1A/T', 'VARIO 125 CBS MMC', 'MATIC', 0, 0, 0),
(171, 'E1F02N12M2A/T', 'NEW VARIO 125 CBS ISS', 'MATIC', 0, 0, 0),
(174, 'E1F02N12S1A/T', 'VARIO 125 CBS-ISS MMC', 'MATIC', 0, 0, 0),
(176, 'G2E02R21L0AM/T', 'NEW SUPRA GTR150 EXCLUSIVE', 'SPORT', 0, 0, 0),
(178, 'G2E02R21L0M/T', 'NEW SUPRA GTR150 SPORTY', 'SPORT', 0, 0, 0),
(179, 'GL15A1RR1M/T', 'NEW MEGA PRO CW', 'SPORT', 0, 0, 0),
(180, 'GL15B1CF1M/T', 'VERZA CAST WHEEL', 'SPORT', 0, 0, 0),
(181, 'GL15B1CF1M/T', 'VERZA CAST WHEEL', 'SPORT', 0, 0, 0),
(182, 'GL15B1CF1M/T', 'VERZA CAST WHEEL', 'SPORT', 0, 0, 0),
(183, 'GL15B1CF1M/T', 'VERZA CAST WHEEL', 'SPORT', 0, 0, 0),
(184, 'GL15B1CF2M/T', 'NEW VERZA CAST WHEEL', 'SPORT', 0, 0, 0),
(248, 'GL15B1CF2M/T', 'NEW VERZA CAST WHEEL', 'SPORT', 0, 0, 0),
(249, 'GL15B1CF2M/T', 'NEW VERZA CAST WHEEL', 'SPORT', 0, 0, 0),
(250, 'GL15B1CF2M/T', 'NEW VERZA CAST WHEEL', 'SPORT', 0, 0, 0),
(251, 'GL15B1CFM/T', 'NEW SPORT LS150 CW', 'SPORT', 0, 0, 0),
(252, 'GL15B1CFM/T', 'NEW SPORT LS150 CW', 'SPORT', 0, 0, 0),
(253, 'GL15B1CFM/T', 'NEW SPORT LS150 CW', 'SPORT', 0, 0, 0),
(254, 'GL15B1CFM/T', 'NEW SPORT LS150 CW', 'SPORT', 0, 0, 0),
(255, 'GL15B1DF1M/T', 'VERZA SPOKE', 'SPORT', 0, 0, 0),
(256, 'GL15B1DF1M/T', 'VERZA SPOKE', 'SPORT', 0, 0, 0),
(257, 'GL15B1DF1M/T', 'VERZA SPOKE', 'SPORT', 0, 0, 0),
(258, 'GL15B1DF2M/T', 'VERZA SPOKE WHEEL', 'SPORT', 0, 0, 0),
(259, 'GL15B1DF2M/T', 'VERZA SPOKE WHEEL', 'SPORT', 0, 0, 0),
(260, 'GL15B1DF2M/T', 'VERZA SPOKE WHEEL', 'SPORT', 0, 0, 0),
(261, 'GL15B1DFM/T', 'NEW SPORT LS150 SW', 'SPORT', 0, 0, 0),
(262, 'GL15C21A07M/T', 'MEGA PRO CW FI', 'SPORT', 0, 0, 0),
(263, 'GL15C21A07M/T', 'MEGA PRO CW FI', 'SPORT', 0, 0, 0),
(264, 'GL15C21A07M/T', 'MEGA PRO CW FI', 'SPORT', 0, 0, 0),
(265, 'GL15C21A07M/T', 'MEGA PRO CW FI', 'SPORT', 0, 0, 0),
(266, 'GL160CW1', 'NEW MEGA PRO CW', 'SPORT', 0, 0, 0),
(267, 'GL160CW2', 'NEW MEGA PRO CW 2', 'SPORT', 0, 0, 0),
(268, 'GL160D', 'NEW MEGA PRO', 'SPORT', 0, 0, 0),
(270, 'GL160D1', 'NEW MEGA PRO', 'SPORT', 0, 0, 0),
(271, 'GL200D', 'NEW TIGER', 'SPORT', 0, 0, 0),
(272, 'GL200R1', 'NEW TIGER CW', 'SPORT', 0, 0, 0),
(273, 'GL200RA2M/T', 'TIGER CAST WHEEL', 'SPORT', 0, 0, 0),
(274, 'GL-200SHG7', 'TIGER 2000', 'SPORT', 0, 0, 0),
(275, 'GLM2.7', 'GL MAX', 'SPORT', 0, 0, 0),
(276, 'GLM2.7', 'GL MAX', 'SPORT', 0, 0, 0),
(277, 'H5C02R20M1AM/T', 'CB150R STREETFIRE SPECIAL', 'SPORT', 0, 0, 0),
(278, 'H5C02R20M1BM/T', 'CB150R STREETFIRE SPECIAL', 'SPORT', 0, 0, 0),
(279, 'H5C02R20M1M/T', 'NEW CB150R STREETFIRE', 'SPORT', 0, 0, 0),
(280, 'H5C02R20M1M/T', 'NEW CB150R STREETFIRE', 'SPORT', 0, 0, 0),
(281, 'H5C02R20M1M/T', 'NEW CB150R STREETFIRE', 'SPORT', 0, 0, 0),
(282, 'H5C02R20S1AM/T', 'NEW CB150R STREETFIRE', 'SPORT', 0, 0, 0),
(283, 'H5C02R20S1BM/T', 'NEW CB150R STREETFIRE', 'SPORT', 0, 0, 0),
(284, 'H5C02R20S1M/T', 'NEW CB150R STREETFIRE', 'SPORT', 0, 0, 0),
(285, 'H5C02R20S1M/T', 'NEW CB150R STREETFIRE', 'SPORT', 0, 0, 0),
(286, 'H5C02R20S1M/T', 'NEW CB150R STREETFIRE', 'SPORT', 0, 0, 0),
(287, 'K1H02N14L0A/T', 'NEW VARIO 150', 'MATIC', 0, 0, 0),
(290, 'K1H02N14L0MA/T', 'VARIO 150 PGM-FI', 'MATIC', 0, 0, 0),
(292, 'K1H02N14S1A/T', 'VARIO 150 MMC', 'MATIC', 0, 0, 0),
(297, 'MCB/STD8', 'WIN STANDAR', 'BEBEK', 0, 0, 0),
(298, 'NC110A1C1A/T', 'NEW VARIO', 'MATIC', 0, 0, 0),
(304, 'NC110CW1', 'VARIO CW', 'MATIC', 0, 0, 0),
(307, 'NC110CW2A/T', 'NEW VARIO', 'MATIC', 0, 0, 0),
(308, 'NC110D', 'VARIO', 'MATIC', 0, 0, 0),
(309, 'NC11A2CBA/T', 'VARIO TECHNO', 'MATIC', 0, 0, 0),
(310, 'NC11A3C1A/T', 'VARIO TECHNO NON CBS', 'MATIC', 0, 0, 0),
(312, 'NC11B1CA/T', 'BEAT', 'MATIC', 0, 0, 0),
(315, 'NC11B2CA/T', 'NEW BEAT', 'MATIC', 0, 0, 0),
(317, 'NC11B3C1A/T', 'NEW BEAT CW', 'MATIC', 0, 0, 0),
(319, 'NC11B3D1A/T', 'NEW BEAT', 'MATIC', 0, 0, 0),
(320, 'NC11BF1CA/T', 'BEAT FI CW', 'MATIC', 0, 0, 0),
(326, 'NC11BF1CBA/T', 'BEAT FI CBS', 'MATIC', 0, 0, 0),
(330, 'NC11C1C1A/T', 'NEW SCOOPY', 'MATIC', 0, 0, 0),
(331, 'NC11C1C1A/T', 'NEW SCOOPY', 'MATIC', 0, 0, 0),
(332, 'NC11C1CA/T', 'SCOOPY', 'MATIC', 0, 0, 0),
(333, 'NC11CF1CSA/T', 'SCOOPY FI', 'MATIC', 0, 0, 0),
(334, 'NC11CF1CSA/T', 'SCOOPY FI', 'MATIC', 0, 0, 0),
(335, 'NC11CF1CSA/T', 'SCOOPY FI', 'MATIC', 0, 0, 0),
(336, 'NC11D1CF1A/T', 'SPACY CW HELM IN FI', 'MATIC', 0, 0, 0),
(337, 'NC11D1CF1A/T', 'SPACY CW HELM IN FI', 'MATIC', 0, 0, 0),
(338, 'NC11D1CF1A/T', 'SPACY CW HELM IN FI', 'MATIC', 0, 0, 0),
(339, 'NC11D1CF2A/T', 'SPACY CW HELM IN FI', 'MATIC', 0, 0, 0),
(340, 'NC11D1CF2A/T', 'SPACY CW HELM IN FI', 'MATIC', 0, 0, 0),
(341, 'NC11D1CF2A/T', 'SPACY CW HELM IN FI', 'MATIC', 0, 0, 0),
(342, 'NC11D1CFA/T', 'SPACY CW HELM IN FI', 'MATIC', 0, 0, 0),
(343, 'NC11D1CFA/T', 'SPACY CW HELM IN FI', 'MATIC', 0, 0, 0),
(344, 'NC12A1CF1A/T', 'NEW VARIO TECHNO PGM FI', 'MATIC', 0, 0, 0),
(353, 'NC12AF2CBIA/T', 'VARIO TECHNO 125 CBS ISS', 'MATIC', 0, 0, 0),
(357, 'NC750JFEDA/T', 'NM4 VULTUS', 'BEBEK', 0, 0, 0),
(358, 'NCF11A1CFA/T', 'REVO AT', 'BEBEK', 0, 0, 0),
(359, 'NCF11A1CFA/T', 'REVO AT', 'BEBEK', 0, 0, 0),
(360, 'NCF11A1CFA/T', 'REVO AT', 'BEBEK', 0, 0, 0),
(361, 'ND1251', 'KIRANA', 'BEBEK', 0, 0, 0),
(362, 'NF100L', 'SUPRA FIT', 'BEBEK', 0, 0, 0),
(366, 'NF100LD', 'SUPRA FIT D', 'BEBEK', 0, 0, 0),
(372, 'NF100SE', 'FIT X', 'BEBEK', 0, 0, 0),
(373, 'NF100SE', 'FIT X', 'BEBEK', 0, 0, 0),
(374, 'NF100SE', 'FIT X', 'BEBEK', 0, 0, 0),
(375, 'NF100SL', 'KTLM', 'BEBEK', 0, 0, 0),
(503, 'NF100SL', 'KTLM', 'BEBEK', 0, 0, 0),
(504, 'NF100SL', 'KTLM', 'BEBEK', 0, 0, 0),
(505, 'NF100SL1', 'KTLM', 'BEBEK', 0, 0, 0),
(506, 'NF100SL1', 'KTLM', 'BEBEK', 0, 0, 0),
(507, 'NF100SL1', 'KTLM', 'BEBEK', 0, 0, 0),
(508, 'NF100SLCX', 'KTLM CW', 'BEBEK', 0, 0, 0),
(509, 'NF100SLCX', 'KTLM CW', 'BEBEK', 0, 0, 0),
(510, 'NF100SLD', 'KTLM D', 'BEBEK', 0, 0, 0),
(511, 'NF100SLD', 'KTLM D', 'BEBEK', 0, 0, 0),
(512, 'NF100SLD', 'KTLM D', 'BEBEK', 0, 0, 0),
(513, 'NF100SLD1', 'KTLM D', 'BEBEK', 0, 0, 0),
(514, 'NF100SLD1', 'KTLM D', 'BEBEK', 0, 0, 0),
(515, 'NF100SLD1', 'KTLM D', 'BEBEK', 0, 0, 0),
(516, 'NF100SLD1', 'KTLM D', 'BEBEK', 0, 0, 0),
(517, 'NF100SLF', 'FIT S', 'BEBEK', 0, 0, 0),
(518, 'NF100SLF', 'FIT S', 'BEBEK', 0, 0, 0),
(519, 'NF100SLF', 'FIT S', 'BEBEK', 0, 0, 0),
(520, 'NF100SLF', 'FIT S', 'BEBEK', 0, 0, 0),
(521, 'NF100SLF1', 'FIT S NEW', 'BEBEK', 0, 0, 0),
(522, 'NF100TC', 'REVO CW', 'BEBEK', 0, 0, 0),
(523, 'NF100TC', 'REVO CW', 'BEBEK', 0, 0, 0),
(524, 'NF100TC', 'REVO CW', 'BEBEK', 0, 0, 0),
(525, 'NF100TC1', 'NEW REVO CW', 'BEBEK', 0, 0, 0),
(526, 'NF100TD', 'REVO', 'BEBEK', 0, 0, 0),
(528, 'NF100TD1', 'NEW REVO', 'BEBEK', 0, 0, 0),
(530, 'NF11A1CAM/T', 'BLADE', 'BEBEK', 0, 0, 0),
(531, 'NF11A1CAM/T', 'BLADE', 'BEBEK', 0, 0, 0),
(532, 'NF11A1CM/T', 'BLADE', 'BEBEK', 0, 0, 0),
(533, 'NF11A1CM/T', 'BLADE', 'BEBEK', 0, 0, 0),
(534, 'NF11A1CM/T', 'BLADE', 'BEBEK', 0, 0, 0),
(535, 'NF11A1CM/T', 'BLADE', 'BEBEK', 0, 0, 0),
(536, 'NF11A2CM/T', 'BLADE', 'BEBEK', 0, 0, 0),
(537, 'NF11B1C1M/T', 'ABSOLUTE REVO CW', 'BEBEK', 0, 0, 0),
(538, 'NF11B1C1M/T', 'ABSOLUTE REVO CW', 'BEBEK', 0, 0, 0),
(539, 'NF11B1C1M/T', 'ABSOLUTE REVO CW', 'BEBEK', 0, 0, 0),
(540, 'NF11B1CAM/T', 'ABSOLUTE REVO', 'BEBEK', 0, 0, 0),
(541, 'NF11B1CM/T', 'ABSOLUTE REVO', 'BEBEK', 0, 0, 0),
(542, 'NF11B1CM/T', 'ABSOLUTE REVO', 'BEBEK', 0, 0, 0),
(543, 'NF11B1CM/T', 'ABSOLUTE REVO', 'BEBEK', 0, 0, 0),
(544, 'NF11B1CM/T', 'ABSOLUTE REVO', 'BEBEK', 0, 0, 0),
(545, 'NF11B1D1M/T', 'ABSOLUTE REVO', 'BEBEK', 0, 0, 0),
(546, 'NF11B1D1M/T', 'ABSOLUTE REVO', 'BEBEK', 0, 0, 0),
(547, 'NF11B1D1M/T', 'ABSOLUTE REVO', 'BEBEK', 0, 0, 0),
(548, 'NF11B1DM/T', 'ABSOLUTE REVO', 'BEBEK', 0, 0, 0),
(549, 'NF11B1DM/T', 'ABSOLUTE REVO', 'BEBEK', 0, 0, 0),
(550, 'NF11B1DM/T', 'ABSOLUTE REVO', 'BEBEK', 0, 0, 0),
(551, 'NF11B2C11M/T', 'REVO CW', 'BEBEK', 0, 0, 0),
(552, 'NF11B2C1M/T', 'NEW REVO CW', 'BEBEK', 0, 0, 0),
(553, 'NF11B2C1M/T', 'NEW REVO CW', 'BEBEK', 0, 0, 0),
(554, 'NF11B2D11M/T', 'REVO FIT', 'BEBEK', 0, 0, 0),
(555, 'NF11B2D12M/T', 'REVO FIT', 'BEBEK', 0, 0, 0),
(556, 'NF11B2D12M/T', 'REVO FIT', 'BEBEK', 0, 0, 0),
(557, 'NF11B2D12M/T', 'REVO FIT', 'BEBEK', 0, 0, 0),
(558, 'NF11B2D1M/T', 'REVO FIT', 'BEBEK', 0, 0, 0),
(559, 'NF11B2D1M/T', 'REVO FIT', 'BEBEK', 0, 0, 0),
(560, 'NF11B2D1M/T', 'REVO FIT', 'BEBEK', 0, 0, 0),
(561, 'NF11B2DA11M/T', 'REVO SPOKE', 'BEBEK', 0, 0, 0),
(562, 'NF11B2DA11M/T', 'REVO SPOKE', 'BEBEK', 0, 0, 0),
(563, 'NF11B2DA11M/T', 'REVO SPOKE', 'BEBEK', 0, 0, 0),
(564, 'NF11B2DA12M/T', 'REVO SPOKE', 'BEBEK', 0, 0, 0),
(565, 'NF11B2DA1M/T', 'NEW REVO SPOKE', 'BEBEK', 0, 0, 0),
(566, 'NF11B2DA1M/T', 'NEW REVO SPOKE', 'BEBEK', 0, 0, 0),
(567, 'NF11B2DA1M/T', 'NEW REVO SPOKE', 'BEBEK', 0, 0, 0),
(568, 'NF11C1C1M/T', 'BLADE R', 'BEBEK', 0, 0, 0),
(569, 'NF11C1C1M/T', 'BLADE R', 'BEBEK', 0, 0, 0),
(570, 'NF11C1CAM/T', 'BLADE REPSOL', 'BEBEK', 0, 0, 0),
(571, 'NF11C1CDM/T', 'BLADE S', 'BEBEK', 0, 0, 0),
(572, 'NF11C1CDM/T', 'BLADE S', 'BEBEK', 0, 0, 0),
(573, 'NF11C1CM/T', 'BLADE', 'BEBEK', 0, 0, 0),
(574, 'NF11C1CM/T', 'BLADE', 'BEBEK', 0, 0, 0),
(575, 'NF11C1CM/T', 'BLADE', 'BEBEK', 0, 0, 0),
(576, 'NF11T11C01M/T', 'REVO FIT FI', 'BEBEK', 0, 0, 0),
(577, 'NF11T11C01M/T', 'REVO FIT FI', 'BEBEK', 0, 0, 0),
(578, 'NF11T11C01M/T', 'REVO FIT FI', 'BEBEK', 0, 0, 0),
(579, 'NF11T11C02M/T', 'REVO SW FI', 'BEBEK', 0, 0, 0),
(580, 'NF11T11C02M/T', 'REVO SW FI', 'BEBEK', 0, 0, 0),
(581, 'NF11T11C02M/T', 'REVO SW FI', 'BEBEK', 0, 0, 0),
(582, 'NF11T11C02M/T', 'REVO SW FI', 'BEBEK', 0, 0, 0),
(583, 'NF11T11C03M/T', 'REVO CW FI', 'BEBEK', 0, 0, 0),
(584, 'NF11T11C03M/T', 'REVO CW FI', 'BEBEK', 0, 0, 0),
(585, 'NF11T11C03M/T', 'REVO CW FI', 'BEBEK', 0, 0, 0),
(586, 'NF11T11C03M/T', 'REVO CW FI', 'BEBEK', 0, 0, 0),
(587, 'NF11T13C01M/T', 'REVO FIT MMC', 'BEBEK', 0, 0, 0),
(588, 'NF11T13C01M/T', 'REVO FIT MMC', 'BEBEK', 0, 0, 0),
(589, 'NF11T13C01M/T', 'REVO FIT MMC', 'BEBEK', 0, 0, 0),
(590, 'NF11T13C02M/T', 'REVO SW MMC', 'BEBEK', 0, 0, 0),
(591, 'NF11T13C03M/T', 'REVO CW MMC', 'BEBEK', 0, 0, 0),
(592, 'NF11T13C03M/T', 'REVO CW MMC', 'BEBEK', 0, 0, 0),
(593, 'NF125D1', 'KARISMA D1', 'BEBEK', 0, 0, 0),
(594, 'NF125D1', 'KARISMA D1', 'BEBEK', 0, 0, 0),
(595, 'NF125D2', 'KARISMA X D', 'BEBEK', 0, 0, 0),
(596, 'NF125D2', 'KARISMA X D', 'BEBEK', 0, 0, 0),
(597, 'NF125D2', 'KARISMA X D', 'BEBEK', 0, 0, 0),
(598, 'NF125D3', 'KARISMA X D', 'BEBEK', 0, 0, 0),
(599, 'NF125D3', 'KARISMA X D', 'BEBEK', 0, 0, 0),
(600, 'NF125SC', 'SUPRA X 125 CW', 'BEBEK', 0, 0, 0),
(605, 'NF125SD', 'SUPRA X 125 D', 'BEBEK', 0, 0, 0),
(614, 'NF125TD', 'NEW SUPRA X', 'BEBEK', 0, 0, 0),
(619, 'NF125TD3M/T', 'NEW SUPRA X 125 SPOKE', 'BEBEK', 0, 0, 0),
(620, 'NF125TR', 'NEW SUPRA X CW', 'BEBEK', 0, 0, 0),
(624, 'NF125TR3M/T', 'NEW SUPRA X 125 CW', 'BEBEK', 0, 0, 0),
(627, 'NF125TR5M/T', 'Supra X 125 CW MMC', 'BEBEK', 0, 0, 0),
(629, 'NF125TRF', 'NEW SUPRA X INJECTION', 'BEBEK', 0, 0, 0),
(631, 'NF12A1CF1M/T', 'SUPRA X 125 HELM IN FI', 'BEBEK', 0, 0, 0),
(638, 'NF12A1CFM/T', 'SUPRA X 125 CW HELM IN FI', 'BEBEK', 0, 0, 0),
(639, 'P5E02R22M1AM/T', 'ALL NEW CBR 150R', 'SPORT', 0, 0, 0),
(640, 'P5E02R22M1BM/T', 'ALL NEW CBR 150R', 'SPORT', 0, 0, 0),
(641, 'P5E02R22M1M/T', 'ALL NEW CBR 150R', 'SPORT', 0, 0, 0),
(642, 'P5E02R22M1M/T', 'ALL NEW CBR 150R', 'SPORT', 0, 0, 0),
(643, 'T5E02R11L0AM/T', 'NEW CBR150R', 'SPORT', 0, 0, 0),
(647, 'WW150EXFIN', 'NEW PCX 150', 'MATIC', 0, 0, 0),
(648, 'WW150EXGINA/T', 'NEW PCX 150', 'MATIC', 0, 0, 0),
(649, 'WW150EXGINA/T', 'NEW PCX 150', 'MATIC', 0, 0, 0),
(650, 'WW150EXGINA/T', 'NEW PCX 150', 'MATIC', 0, 0, 0),
(651, 'WW150EXHINA/T', 'PCX 150', 'MATIC', 0, 0, 0),
(652, 'WW150EXHINA/T', 'PCX 150', 'MATIC', 0, 0, 0),
(653, 'WW150EXHINA/T', 'PCX 150', 'MATIC', 0, 0, 0),
(654, 'X1B02N04L0A/T', 'BEAT SPORTY CW', 'MATIC', 0, 0, 0),
(657, 'X1B02N04L0AA/T', 'BEAT SPORTY CBS', 'MATIC', 0, 0, 0),
(660, 'X1B02R07L0A/T', 'BEAT SPORTY CBS ISS', 'MATIC', 0, 0, 0),
(664, 'Y1G02N02L0A/T', 'BEAT POP CW', 'MATIC', 0, 0, 0),
(666, 'Y1G02N02L0AA/T', 'BEAT POP CBS', 'MATIC', 0, 0, 0),
(669, 'Y1G02N02L1A/T', 'BEAT POP CW PIXEL', 'MATIC', 0, 0, 0),
(670, 'Y1G02N02L1AA/T', 'BEAT POP CW COMIC', 'MATIC', 0, 0, 0),
(671, 'Y1G02N02L1AAA/T', 'BEAT POP CBS PIXEL', 'MATIC', 0, 0, 0),
(673, 'Y1G02N02L1ABA/T', 'BEAT POP CBS COMIC', 'MATIC', 0, 0, 0),
(674, 'Y1G02N15L0A/T', 'BEAT POP CBS ISS', 'MATIC', 0, 0, 0),
(678, 'Y1G02N15L1A/T', 'BEAT POP ISS PIXEL', 'MATIC', 0, 0, 0),
(680, 'Y1G02N15L1AA/T', 'BEAT POP CBS ISS', 'MATIC', 0, 0, 0),
(682, 'Y3B02R17L0AM/T', 'SONIC 150R', 'SPORT', 0, 0, 0),
(683, 'Y3B02R17L0M/T', 'NEW SONIC 150', 'SPORT', 0, 0, 0),
(684, 'Y3B02R17L0M/T', 'NEW SONIC 150', 'SPORT', 0, 0, 0),
(685, 'Y3B02R17L0M/T', 'NEW SONIC 150', 'SPORT', 0, 0, 0),
(686, 'Y3B02R17L0M/T', 'NEW SONIC 150', 'SPORT', 0, 0, 0),
(687, 'Y3B02R17S1AM/T', 'NEW SONIC 150R REPSOL', 'SPORT', 0, 0, 0),
(688, 'Y3B02R17S1BM/T', 'NEW SONIC 150R SPECIAL', 'SPORT', 0, 0, 0),
(689, 'Y3B02R17S1M/T', 'NEW SONIC 150R STANDARD', 'SPORT', 0, 0, 0),
(690, 'Y3B02R17S1M/T', 'NEW SONIC 150R STANDARD', 'SPORT', 0, 0, 0),
(4214, '', '', '', 0, 0, 0),
(4215, '', '', '', 0, 0, 0),
(4217, '', '', '', 0, 0, 0),
(4218, '', '', '', 0, 0, 0),
(4219, '', '', '', 0, 0, 0),
(4221, '', '', '', 0, 0, 0),
(4222, '', '', '', 0, 0, 0),
(4223, '', '', '', 0, 0, 0),
(4225, '', '', '', 0, 0, 0),
(4226, '', '', '', 0, 0, 0),
(4227, '', '', '', 0, 0, 0),
(4229, '', '', '', 0, 0, 0),
(4230, '', '', '', 0, 0, 0),
(4231, '', '', '', 0, 0, 0),
(4233, '', '', '', 0, 0, 0),
(4234, '', '', '', 0, 0, 0),
(4235, '', '', '', 0, 0, 0),
(4237, '', '', '', 0, 0, 0),
(4238, '', '', '', 0, 0, 0),
(4239, '', '', '', 0, 0, 0),
(4241, '', '', '', 0, 0, 0),
(4242, '', '', '', 0, 0, 0),
(4243, '', '', '', 0, 0, 0),
(4245, '', '', '', 0, 0, 0),
(4246, '', '', '', 0, 0, 0),
(4247, '', '', '', 0, 0, 0),
(4249, '', '', '', 0, 0, 0),
(4250, '', '', '', 0, 0, 0),
(4251, '', '', '', 0, 0, 0),
(4253, '', '', '', 0, 0, 0),
(4254, '', '', '', 0, 0, 0),
(4255, '', '', '', 0, 0, 0),
(4257, '', '', '', 0, 0, 0),
(4258, '', '', '', 0, 0, 0),
(4259, '', '', '', 0, 0, 0),
(4261, '', '', '', 0, 0, 0),
(4262, '', '', '', 0, 0, 0),
(4263, '', '', '', 0, 0, 0),
(4265, '', '', '', 0, 0, 0),
(4266, '', '', '', 0, 0, 0),
(4267, '', '', '', 0, 0, 0),
(4269, '', '', '', 0, 0, 0),
(4270, '', '', '', 0, 0, 0),
(4271, '', '', '', 0, 0, 0),
(4273, '', '', '', 0, 0, 0),
(4274, '', '', '', 0, 0, 0),
(4275, '', '', '', 0, 0, 0),
(4277, '', '', '', 0, 0, 0),
(4278, '', '', '', 0, 0, 0),
(4279, '', '', '', 0, 0, 0),
(4281, '', '', '', 0, 0, 0),
(4282, '', '', '', 0, 0, 0),
(4283, '', '', '', 0, 0, 0),
(4285, '', '', '', 0, 0, 0),
(4286, '', '', '', 0, 0, 0),
(4287, '', '', '', 0, 0, 0),
(4289, '', '', '', 0, 0, 0),
(4290, '', '', '', 0, 0, 0),
(4291, '', '', '', 0, 0, 0),
(4293, '', '', '', 0, 0, 0),
(4294, '', '', '', 0, 0, 0),
(4295, '', '', '', 0, 0, 0),
(4297, '', '', '', 0, 0, 0),
(4298, '', '', '', 0, 0, 0),
(4299, '', '', '', 0, 0, 0),
(4301, '', '', '', 0, 0, 0),
(4302, '', '', '', 0, 0, 0),
(4303, '', '', '', 0, 0, 0),
(4305, '', '', '', 0, 0, 0),
(4306, '', '', '', 0, 0, 0),
(4307, '', '', '', 0, 0, 0),
(4309, '', '', '', 0, 0, 0),
(4310, '', '', '', 0, 0, 0),
(4311, '', '', '', 0, 0, 0),
(4313, '', '', '', 0, 0, 0),
(4314, '', '', '', 0, 0, 0),
(4315, '', '', '', 0, 0, 0),
(4317, '', '', '', 0, 0, 0),
(4318, '', '', '', 0, 0, 0),
(4319, '', '', '', 0, 0, 0),
(4321, '', '', '', 0, 0, 0),
(4322, '', '', '', 0, 0, 0),
(4323, '', '', '', 0, 0, 0),
(4325, '', '', '', 0, 0, 0),
(4326, '', '', '', 0, 0, 0),
(4327, '', '', '', 0, 0, 0),
(4329, '', '', '', 0, 0, 0),
(4330, '', '', '', 0, 0, 0),
(4331, '', '', '', 0, 0, 0),
(4333, '', '', '', 0, 0, 0),
(4334, '', '', '', 0, 0, 0),
(4335, '', '', '', 0, 0, 0),
(4337, '', '', '', 0, 0, 0),
(4338, '', '', '', 0, 0, 0),
(4339, '', '', '', 0, 0, 0),
(4341, '', '', '', 0, 0, 0),
(4342, '', '', '', 0, 0, 0),
(4343, '', '', '', 0, 0, 0),
(4345, '', '', '', 0, 0, 0),
(4346, '', '', '', 0, 0, 0),
(4347, '', '', '', 0, 0, 0),
(4349, '', '', '', 0, 0, 0),
(4350, '', '', '', 0, 0, 0),
(4351, '', '', '', 0, 0, 0),
(4353, '', '', '', 0, 0, 0),
(4354, '', '', '', 0, 0, 0),
(4355, '', '', '', 0, 0, 0),
(4357, '', '', '', 0, 0, 0),
(4358, '', '', '', 0, 0, 0),
(4359, '', '', '', 0, 0, 0),
(4361, '', '', '', 0, 0, 0),
(4362, '', '', '', 0, 0, 0),
(4363, '', '', '', 0, 0, 0),
(4365, '', '', '', 0, 0, 0),
(4366, '', '', '', 0, 0, 0),
(4367, '', '', '', 0, 0, 0),
(4369, '', '', '', 0, 0, 0),
(4370, '', '', '', 0, 0, 0),
(4371, '', '', '', 0, 0, 0),
(4373, '', '', '', 0, 0, 0),
(4374, '', '', '', 0, 0, 0),
(4375, '', '', '', 0, 0, 0),
(4377, '', '', '', 0, 0, 0),
(4378, '', '', '', 0, 0, 0),
(4379, '', '', '', 0, 0, 0),
(4381, '', '', '', 0, 0, 0),
(4382, '', '', '', 0, 0, 0),
(4383, '', '', '', 0, 0, 0),
(4385, '', '', '', 0, 0, 0),
(4386, '', '', '', 0, 0, 0),
(4387, '', '', '', 0, 0, 0),
(4389, '', '', '', 0, 0, 0),
(4390, '', '', '', 0, 0, 0),
(4391, '', '', '', 0, 0, 0),
(4393, '', '', '', 0, 0, 0),
(4394, '', '', '', 0, 0, 0),
(4395, '', '', '', 0, 0, 0),
(4397, '', '', '', 0, 0, 0),
(4398, '', '', '', 0, 0, 0),
(4399, '', '', '', 0, 0, 0),
(4401, '', '', '', 0, 0, 0),
(4402, '', '', '', 0, 0, 0),
(4403, '', '', '', 0, 0, 0),
(4405, '', '', '', 0, 0, 0),
(4406, '', '', '', 0, 0, 0),
(4407, '', '', '', 0, 0, 0),
(4409, '', '', '', 0, 0, 0),
(4410, '', '', '', 0, 0, 0),
(4411, '', '', '', 0, 0, 0),
(4413, '', '', '', 0, 0, 0),
(4414, '', '', '', 0, 0, 0),
(4415, '', '', '', 0, 0, 0),
(4417, '', '', '', 0, 0, 0),
(4418, '', '', '', 0, 0, 0),
(4419, '', '', '', 0, 0, 0),
(4421, '', '', '', 0, 0, 0),
(4422, '', '', '', 0, 0, 0),
(4423, '', '', '', 0, 0, 0),
(4425, '', '', '', 0, 0, 0),
(4426, '', '', '', 0, 0, 0),
(4427, '', '', '', 0, 0, 0),
(4429, '', '', '', 0, 0, 0),
(4430, '', '', '', 0, 0, 0),
(4431, '', '', '', 0, 0, 0),
(4433, '', '', '', 0, 0, 0),
(4434, '', '', '', 0, 0, 0),
(4435, '', '', '', 0, 0, 0),
(4437, '', '', '', 0, 0, 0),
(4438, '', '', '', 0, 0, 0),
(4439, '', '', '', 0, 0, 0),
(4441, '', '', '', 0, 0, 0),
(4442, '', '', '', 0, 0, 0),
(4443, '', '', '', 0, 0, 0),
(4445, '', '', '', 0, 0, 0),
(4446, '', '', '', 0, 0, 0),
(4447, '', '', '', 0, 0, 0),
(4449, '', '', '', 0, 0, 0),
(4450, '', '', '', 0, 0, 0),
(4451, '', '', '', 0, 0, 0),
(4453, '', '', '', 0, 0, 0),
(4454, '', '', '', 0, 0, 0),
(4455, '', '', '', 0, 0, 0),
(4457, '', '', '', 0, 0, 0),
(4458, '', '', '', 0, 0, 0),
(4459, '', '', '', 0, 0, 0),
(4461, '', '', '', 0, 0, 0),
(4462, '', '', '', 0, 0, 0),
(4463, '', '', '', 0, 0, 0),
(4465, '', '', '', 0, 0, 0),
(4466, '', '', '', 0, 0, 0),
(4467, '', '', '', 0, 0, 0),
(4469, '', '', '', 0, 0, 0),
(4470, '', '', '', 0, 0, 0),
(4471, '', '', '', 0, 0, 0),
(4473, '', '', '', 0, 0, 0),
(4474, '', '', '', 0, 0, 0),
(4475, '', '', '', 0, 0, 0),
(4477, '', '', '', 0, 0, 0),
(4478, '', '', '', 0, 0, 0),
(4479, '', '', '', 0, 0, 0),
(4481, '', '', '', 0, 0, 0),
(4482, '', '', '', 0, 0, 0),
(4483, '', '', '', 0, 0, 0),
(4485, '', '', '', 0, 0, 0),
(4486, '', '', '', 0, 0, 0),
(4487, '', '', '', 0, 0, 0),
(4489, '', '', '', 0, 0, 0),
(4490, '', '', '', 0, 0, 0),
(4491, '', '', '', 0, 0, 0),
(4493, '', '', '', 0, 0, 0),
(4494, '', '', '', 0, 0, 0),
(4495, '', '', '', 0, 0, 0),
(4497, '', '', '', 0, 0, 0),
(4498, '', '', '', 0, 0, 0),
(4499, '', '', '', 0, 0, 0),
(4501, '', '', '', 0, 0, 0),
(4502, '', '', '', 0, 0, 0),
(4503, '', '', '', 0, 0, 0),
(4505, '', '', '', 0, 0, 0),
(4506, '', '', '', 0, 0, 0),
(4507, '', '', '', 0, 0, 0),
(4509, '', '', '', 0, 0, 0),
(4510, '', '', '', 0, 0, 0),
(4511, '', '', '', 0, 0, 0),
(4513, '', '', '', 0, 0, 0),
(4514, '', '', '', 0, 0, 0),
(4515, '', '', '', 0, 0, 0),
(4517, '', '', '', 0, 0, 0),
(4518, '', '', '', 0, 0, 0),
(4519, '', '', '', 0, 0, 0),
(4521, '', '', '', 0, 0, 0),
(4522, '', '', '', 0, 0, 0),
(4523, '', '', '', 0, 0, 0),
(4525, '', '', '', 0, 0, 0),
(4526, '', '', '', 0, 0, 0),
(4527, '', '', '', 0, 0, 0),
(4529, '', '', '', 0, 0, 0),
(4530, '', '', '', 0, 0, 0),
(4531, '', '', '', 0, 0, 0),
(4533, '', '', '', 0, 0, 0),
(4534, '', '', '', 0, 0, 0),
(4535, '', '', '', 0, 0, 0),
(4537, '', '', '', 0, 0, 0),
(4538, '', '', '', 0, 0, 0),
(4539, '', '', '', 0, 0, 0),
(4541, '', '', '', 0, 0, 0),
(4542, '', '', '', 0, 0, 0),
(4543, '', '', '', 0, 0, 0),
(4545, '', '', '', 0, 0, 0),
(4546, '', '', '', 0, 0, 0),
(4547, '', '', '', 0, 0, 0),
(4549, '', '', '', 0, 0, 0),
(4550, '', '', '', 0, 0, 0),
(4551, '', '', '', 0, 0, 0),
(4553, '', '', '', 0, 0, 0),
(4554, '', '', '', 0, 0, 0),
(4555, '', '', '', 0, 0, 0),
(4557, '', '', '', 0, 0, 0),
(4558, '', '', '', 0, 0, 0),
(4559, '', '', '', 0, 0, 0),
(4561, '', '', '', 0, 0, 0),
(4562, '', '', '', 0, 0, 0),
(4563, '', '', '', 0, 0, 0),
(4565, '', '', '', 0, 0, 0),
(4566, '', '', '', 0, 0, 0),
(4567, '', '', '', 0, 0, 0),
(4569, '', '', '', 0, 0, 0),
(4570, '', '', '', 0, 0, 0),
(4571, '', '', '', 0, 0, 0),
(4573, '', '', '', 0, 0, 0),
(4574, '', '', '', 0, 0, 0),
(4575, '', '', '', 0, 0, 0),
(4577, '', '', '', 0, 0, 0),
(4578, '', '', '', 0, 0, 0),
(4579, '', '', '', 0, 0, 0),
(4581, '', '', '', 0, 0, 0),
(4582, '', '', '', 0, 0, 0),
(4583, '', '', '', 0, 0, 0),
(4585, '', '', '', 0, 0, 0),
(4586, '', '', '', 0, 0, 0),
(4587, '', '', '', 0, 0, 0),
(4589, '', '', '', 0, 0, 0),
(4590, '', '', '', 0, 0, 0),
(4591, '', '', '', 0, 0, 0),
(4593, '', '', '', 0, 0, 0),
(4594, '', '', '', 0, 0, 0),
(4595, '', '', '', 0, 0, 0),
(4597, '', '', '', 0, 0, 0),
(4598, '', '', '', 0, 0, 0),
(4599, '', '', '', 0, 0, 0),
(4601, '', '', '', 0, 0, 0),
(4602, '', '', '', 0, 0, 0),
(4603, '', '', '', 0, 0, 0),
(4605, '', '', '', 0, 0, 0),
(4606, '', '', '', 0, 0, 0),
(4607, '', '', '', 0, 0, 0),
(4609, '', '', '', 0, 0, 0),
(4610, '', '', '', 0, 0, 0),
(4611, '', '', '', 0, 0, 0),
(4613, '', '', '', 0, 0, 0),
(4614, '', '', '', 0, 0, 0),
(4615, '', '', '', 0, 0, 0),
(4617, '', '', '', 0, 0, 0),
(4618, '', '', '', 0, 0, 0),
(4619, '', '', '', 0, 0, 0),
(4621, '', '', '', 0, 0, 0),
(4622, '', '', '', 0, 0, 0),
(4623, '', '', '', 0, 0, 0),
(4625, '', '', '', 0, 0, 0),
(4626, '', '', '', 0, 0, 0),
(4627, '', '', '', 0, 0, 0),
(4629, '', '', '', 0, 0, 0),
(4630, '', '', '', 0, 0, 0),
(4631, '', '', '', 0, 0, 0),
(4633, '', '', '', 0, 0, 0),
(4634, '', '', '', 0, 0, 0),
(4635, '', '', '', 0, 0, 0),
(4637, '', '', '', 0, 0, 0),
(4638, '', '', '', 0, 0, 0),
(4639, '', '', '', 0, 0, 0),
(4641, '', '', '', 0, 0, 0),
(4642, '', '', '', 0, 0, 0),
(4643, '', '', '', 0, 0, 0),
(4645, '', '', '', 0, 0, 0),
(4646, '', '', '', 0, 0, 0),
(4647, '', '', '', 0, 0, 0),
(4649, '', '', '', 0, 0, 0),
(4650, '', '', '', 0, 0, 0),
(4651, '', '', '', 0, 0, 0),
(4653, '', '', '', 0, 0, 0),
(4654, '', '', '', 0, 0, 0),
(4655, '', '', '', 0, 0, 0),
(4657, '', '', '', 0, 0, 0),
(4658, '', '', '', 0, 0, 0),
(4659, '', '', '', 0, 0, 0),
(4661, '', '', '', 0, 0, 0),
(4662, '', '', '', 0, 0, 0),
(4663, '', '', '', 0, 0, 0),
(4665, '', '', '', 0, 0, 0),
(4666, '', '', '', 0, 0, 0),
(4667, '', '', '', 0, 0, 0),
(4669, '', '', '', 0, 0, 0),
(4670, '', '', '', 0, 0, 0),
(4671, '', '', '', 0, 0, 0),
(4673, '', '', '', 0, 0, 0),
(4674, '', '', '', 0, 0, 0),
(4675, '', '', '', 0, 0, 0),
(4677, '', '', '', 0, 0, 0),
(4678, '', '', '', 0, 0, 0),
(4679, '', '', '', 0, 0, 0),
(4681, '', '', '', 0, 0, 0),
(4682, '', '', '', 0, 0, 0),
(4683, '', '', '', 0, 0, 0),
(4685, '', '', '', 0, 0, 0),
(4686, '', '', '', 0, 0, 0),
(4687, '', '', '', 0, 0, 0),
(4689, '', '', '', 0, 0, 0),
(4690, '', '', '', 0, 0, 0),
(4691, '', '', '', 0, 0, 0),
(4693, '', '', '', 0, 0, 0),
(4694, '', '', '', 0, 0, 0),
(4695, '', '', '', 0, 0, 0),
(4697, '', '', '', 0, 0, 0),
(4698, '', '', '', 0, 0, 0),
(4699, '', '', '', 0, 0, 0),
(4701, '', '', '', 0, 0, 0),
(4702, '', '', '', 0, 0, 0),
(4703, '', '', '', 0, 0, 0),
(4705, '', '', '', 0, 0, 0),
(4706, '', '', '', 0, 0, 0),
(4707, '', '', '', 0, 0, 0),
(4709, '', '', '', 0, 0, 0),
(4710, '', '', '', 0, 0, 0),
(4711, '', '', '', 0, 0, 0),
(4713, '', '', '', 0, 0, 0),
(4714, '', '', '', 0, 0, 0),
(4715, '', '', '', 0, 0, 0),
(4717, '', '', '', 0, 0, 0),
(4718, '', '', '', 0, 0, 0),
(4719, '', '', '', 0, 0, 0),
(4721, '', '', '', 0, 0, 0),
(4722, '', '', '', 0, 0, 0),
(4723, '', '', '', 0, 0, 0),
(4725, '', '', '', 0, 0, 0),
(4726, '', '', '', 0, 0, 0),
(4727, '', '', '', 0, 0, 0),
(4729, '', '', '', 0, 0, 0),
(4730, '', '', '', 0, 0, 0),
(4731, '', '', '', 0, 0, 0),
(4733, '', '', '', 0, 0, 0),
(4734, '', '', '', 0, 0, 0),
(4735, '', '', '', 0, 0, 0),
(4737, '', '', '', 0, 0, 0),
(4738, '', '', '', 0, 0, 0),
(4739, '', '', '', 0, 0, 0),
(4741, '', '', '', 0, 0, 0),
(4742, '', '', '', 0, 0, 0),
(4743, '', '', '', 0, 0, 0),
(4745, '', '', '', 0, 0, 0),
(4746, '', '', '', 0, 0, 0),
(4747, '', '', '', 0, 0, 0),
(4749, '', '', '', 0, 0, 0),
(4750, '', '', '', 0, 0, 0),
(4751, '', '', '', 0, 0, 0),
(4753, '', '', '', 0, 0, 0),
(4754, '', '', '', 0, 0, 0),
(4755, '', '', '', 0, 0, 0),
(4757, '', '', '', 0, 0, 0),
(4758, '', '', '', 0, 0, 0),
(4759, '', '', '', 0, 0, 0),
(4761, '', '', '', 0, 0, 0),
(4762, '', '', '', 0, 0, 0),
(4763, '', '', '', 0, 0, 0),
(4765, '', '', '', 0, 0, 0),
(4766, '', '', '', 0, 0, 0),
(4767, '', '', '', 0, 0, 0),
(4769, '', '', '', 0, 0, 0),
(4770, '', '', '', 0, 0, 0),
(4771, '', '', '', 0, 0, 0),
(4773, '', '', '', 0, 0, 0),
(4774, '', '', '', 0, 0, 0),
(4775, '', '', '', 0, 0, 0),
(4777, '', '', '', 0, 0, 0),
(4778, '', '', '', 0, 0, 0),
(4779, '', '', '', 0, 0, 0),
(4781, '', '', '', 0, 0, 0),
(4782, '', '', '', 0, 0, 0),
(4783, '', '', '', 0, 0, 0),
(4785, '', '', '', 0, 0, 0),
(4786, '', '', '', 0, 0, 0),
(4787, '', '', '', 0, 0, 0),
(4789, '', '', '', 0, 0, 0),
(4790, '', '', '', 0, 0, 0),
(4791, '', '', '', 0, 0, 0),
(4793, '', '', '', 0, 0, 0),
(4794, '', '', '', 0, 0, 0),
(4795, '', '', '', 0, 0, 0),
(4797, '', '', '', 0, 0, 0),
(4798, '', '', '', 0, 0, 0),
(4799, '', '', '', 0, 0, 0),
(4801, '', '', '', 0, 0, 0),
(4802, '', '', '', 0, 0, 0),
(4803, '', '', '', 0, 0, 0),
(4805, '', '', '', 0, 0, 0),
(4806, '', '', '', 0, 0, 0),
(4807, '', '', '', 0, 0, 0),
(4809, '', '', '', 0, 0, 0),
(4810, '', '', '', 0, 0, 0),
(4811, '', '', '', 0, 0, 0),
(4813, '', '', '', 0, 0, 0),
(4814, '', '', '', 0, 0, 0),
(4815, '', '', '', 0, 0, 0),
(4817, '', '', '', 0, 0, 0),
(4818, '', '', '', 0, 0, 0),
(4819, '', '', '', 0, 0, 0),
(4821, '', '', '', 0, 0, 0),
(4822, '', '', '', 0, 0, 0),
(4823, '', '', '', 0, 0, 0),
(4825, '', '', '', 0, 0, 0),
(4826, '', '', '', 0, 0, 0),
(4827, '', '', '', 0, 0, 0),
(4829, '', '', '', 0, 0, 0),
(4830, '', '', '', 0, 0, 0),
(4831, '', '', '', 0, 0, 0),
(4833, '', '', '', 0, 0, 0),
(4834, '', '', '', 0, 0, 0),
(4835, '', '', '', 0, 0, 0),
(4837, '', '', '', 0, 0, 0),
(4838, '', '', '', 0, 0, 0),
(4839, '', '', '', 0, 0, 0),
(4841, '', '', '', 0, 0, 0),
(4842, '', '', '', 0, 0, 0),
(4843, '', '', '', 0, 0, 0),
(4845, '', '', '', 0, 0, 0),
(4846, '', '', '', 0, 0, 0),
(4847, '', '', '', 0, 0, 0),
(4849, '', '', '', 0, 0, 0),
(4850, '', '', '', 0, 0, 0),
(4851, '', '', '', 0, 0, 0),
(4853, '', '', '', 0, 0, 0),
(4854, '', '', '', 0, 0, 0),
(4855, '', '', '', 0, 0, 0),
(4857, '', '', '', 0, 0, 0),
(4858, '', '', '', 0, 0, 0),
(4859, '', '', '', 0, 0, 0),
(4861, '', '', '', 0, 0, 0),
(4862, '', '', '', 0, 0, 0),
(4863, '', '', '', 0, 0, 0),
(4865, '', '', '', 0, 0, 0),
(4866, '', '', '', 0, 0, 0),
(4867, '', '', '', 0, 0, 0),
(4869, '', '', '', 0, 0, 0),
(4870, '', '', '', 0, 0, 0),
(4871, '', '', '', 0, 0, 0),
(4873, '', '', '', 0, 0, 0),
(4874, '', '', '', 0, 0, 0),
(4875, '', '', '', 0, 0, 0),
(4877, '', '', '', 0, 0, 0),
(4878, '', '', '', 0, 0, 0),
(4879, '', '', '', 0, 0, 0),
(4881, '', '', '', 0, 0, 0),
(4882, '', '', '', 0, 0, 0),
(4883, '', '', '', 0, 0, 0),
(4885, '', '', '', 0, 0, 0),
(4886, '', '', '', 0, 0, 0),
(4887, '', '', '', 0, 0, 0),
(4889, '', '', '', 0, 0, 0),
(4890, '', '', '', 0, 0, 0),
(4891, '', '', '', 0, 0, 0),
(4893, '', '', '', 0, 0, 0),
(4894, '', '', '', 0, 0, 0),
(4895, '', '', '', 0, 0, 0),
(4897, '', '', '', 0, 0, 0),
(4898, '', '', '', 0, 0, 0),
(4899, '', '', '', 0, 0, 0),
(4901, '', '', '', 0, 0, 0),
(4902, '', '', '', 0, 0, 0),
(4903, '', '', '', 0, 0, 0),
(4905, '', '', '', 0, 0, 0),
(4906, '', '', '', 0, 0, 0),
(4907, '', '', '', 0, 0, 0),
(4909, '', '', '', 0, 0, 0),
(4910, '', '', '', 0, 0, 0),
(4911, '', '', '', 0, 0, 0),
(4913, '', '', '', 0, 0, 0),
(4914, '', '', '', 0, 0, 0),
(4915, '', '', '', 0, 0, 0),
(4917, '', '', '', 0, 0, 0),
(4918, '', '', '', 0, 0, 0),
(4919, '', '', '', 0, 0, 0),
(4921, '', '', '', 0, 0, 0),
(4922, '', '', '', 0, 0, 0),
(4923, '', '', '', 0, 0, 0),
(4925, '', '', '', 0, 0, 0),
(4926, '', '', '', 0, 0, 0),
(4927, '', '', '', 0, 0, 0),
(4929, '', '', '', 0, 0, 0),
(4930, '', '', '', 0, 0, 0),
(4931, '', '', '', 0, 0, 0),
(4933, '', '', '', 0, 0, 0),
(4934, '', '', '', 0, 0, 0),
(4935, '', '', '', 0, 0, 0),
(4937, '', '', '', 0, 0, 0),
(4938, '', '', '', 0, 0, 0),
(4939, '', '', '', 0, 0, 0),
(4941, '', '', '', 0, 0, 0),
(4942, '', '', '', 0, 0, 0),
(4943, '', '', '', 0, 0, 0),
(4945, '', '', '', 0, 0, 0),
(4946, '', '', '', 0, 0, 0),
(4947, '', '', '', 0, 0, 0),
(4949, '', '', '', 0, 0, 0),
(4950, '', '', '', 0, 0, 0),
(4951, '', '', '', 0, 0, 0),
(4953, '', '', '', 0, 0, 0),
(4954, '', '', '', 0, 0, 0),
(4955, '', '', '', 0, 0, 0),
(4957, '', '', '', 0, 0, 0),
(4958, '', '', '', 0, 0, 0),
(4959, '', '', '', 0, 0, 0),
(4961, '', '', '', 0, 0, 0),
(4962, '', '', '', 0, 0, 0),
(4963, '', '', '', 0, 0, 0),
(4965, '', '', '', 0, 0, 0),
(4966, '', '', '', 0, 0, 0),
(4967, '', '', '', 0, 0, 0),
(4969, '', '', '', 0, 0, 0),
(4970, '', '', '', 0, 0, 0),
(4971, '', '', '', 0, 0, 0),
(4973, '', '', '', 0, 0, 0),
(4974, '', '', '', 0, 0, 0),
(4975, '', '', '', 0, 0, 0),
(4977, '', '', '', 0, 0, 0),
(4978, '', '', '', 0, 0, 0),
(4979, '', '', '', 0, 0, 0),
(4981, '', '', '', 0, 0, 0),
(4982, '', '', '', 0, 0, 0),
(4983, '', '', '', 0, 0, 0),
(4985, '', '', '', 0, 0, 0),
(4986, '', '', '', 0, 0, 0),
(4987, '', '', '', 0, 0, 0),
(4989, '', '', '', 0, 0, 0),
(4990, '', '', '', 0, 0, 0),
(4991, '', '', '', 0, 0, 0),
(4993, '', '', '', 0, 0, 0),
(4994, '', '', '', 0, 0, 0),
(4995, '', '', '', 0, 0, 0),
(4997, '', '', '', 0, 0, 0),
(4998, '', '', '', 0, 0, 0),
(4999, '', '', '', 0, 0, 0),
(5001, '', '', '', 0, 0, 0),
(5002, '', '', '', 0, 0, 0),
(5003, '', '', '', 0, 0, 0),
(5005, '', '', '', 0, 0, 0),
(5006, '', '', '', 0, 0, 0),
(5007, '', '', '', 0, 0, 0),
(5009, '', '', '', 0, 0, 0),
(5010, '', '', '', 0, 0, 0),
(5011, '', '', '', 0, 0, 0),
(5013, '', '', '', 0, 0, 0),
(5014, '', '', '', 0, 0, 0),
(5015, '', '', '', 0, 0, 0),
(5017, '', '', '', 0, 0, 0),
(5018, '', '', '', 0, 0, 0),
(5019, '', '', '', 0, 0, 0),
(5021, '', '', '', 0, 0, 0),
(5022, '', '', '', 0, 0, 0),
(5023, '', '', '', 0, 0, 0),
(5025, '', '', '', 0, 0, 0),
(5026, '', '', '', 0, 0, 0),
(5027, '', '', '', 0, 0, 0),
(5029, '', '', '', 0, 0, 0),
(5030, '', '', '', 0, 0, 0),
(5031, '', '', '', 0, 0, 0),
(5033, '', '', '', 0, 0, 0),
(5034, '', '', '', 0, 0, 0),
(5035, '', '', '', 0, 0, 0),
(5037, '', '', '', 0, 0, 0),
(5038, '', '', '', 0, 0, 0),
(5039, '', '', '', 0, 0, 0),
(5041, '', '', '', 0, 0, 0),
(5042, '', '', '', 0, 0, 0),
(5043, '', '', '', 0, 0, 0),
(5045, '', '', '', 0, 0, 0),
(5046, '', '', '', 0, 0, 0),
(5047, '', '', '', 0, 0, 0),
(5049, '', '', '', 0, 0, 0),
(5050, '', '', '', 0, 0, 0),
(5051, '', '', '', 0, 0, 0),
(5053, '', '', '', 0, 0, 0),
(5054, '', '', '', 0, 0, 0),
(5055, '', '', '', 0, 0, 0),
(5057, '', '', '', 0, 0, 0),
(5058, '', '', '', 0, 0, 0),
(5059, '', '', '', 0, 0, 0),
(5061, '', '', '', 0, 0, 0),
(5062, '', '', '', 0, 0, 0),
(5063, '', '', '', 0, 0, 0),
(5065, '', '', '', 0, 0, 0),
(5066, '', '', '', 0, 0, 0),
(5067, '', '', '', 0, 0, 0),
(5069, '', '', '', 0, 0, 0),
(5070, '', '', '', 0, 0, 0),
(5071, '', '', '', 0, 0, 0),
(5073, '', '', '', 0, 0, 0),
(5074, '', '', '', 0, 0, 0),
(5075, '', '', '', 0, 0, 0),
(5077, '', '', '', 0, 0, 0),
(5078, '', '', '', 0, 0, 0),
(5079, '', '', '', 0, 0, 0),
(5081, '', '', '', 0, 0, 0),
(5082, '', '', '', 0, 0, 0),
(5083, '', '', '', 0, 0, 0),
(5085, '', '', '', 0, 0, 0),
(5086, '', '', '', 0, 0, 0),
(5087, '', '', '', 0, 0, 0),
(5089, '', '', '', 0, 0, 0),
(5090, '', '', '', 0, 0, 0),
(5091, '', '', '', 0, 0, 0),
(5093, '', '', '', 0, 0, 0),
(5094, '', '', '', 0, 0, 0),
(5095, '', '', '', 0, 0, 0),
(5097, '', '', '', 0, 0, 0),
(5098, '', '', '', 0, 0, 0),
(5099, '', '', '', 0, 0, 0),
(5101, '', '', '', 0, 0, 0),
(5102, '', '', '', 0, 0, 0),
(5103, '', '', '', 0, 0, 0),
(5105, '', '', '', 0, 0, 0),
(5106, '', '', '', 0, 0, 0),
(5107, '', '', '', 0, 0, 0),
(5109, '', '', '', 0, 0, 0),
(5110, '', '', '', 0, 0, 0),
(5111, '', '', '', 0, 0, 0),
(5113, '', '', '', 0, 0, 0),
(5114, '', '', '', 0, 0, 0),
(5115, '', '', '', 0, 0, 0),
(5117, '', '', '', 0, 0, 0),
(5118, '', '', '', 0, 0, 0),
(5119, '', '', '', 0, 0, 0),
(5121, '', '', '', 0, 0, 0),
(5122, '', '', '', 0, 0, 0),
(5123, '', '', '', 0, 0, 0),
(5125, '', '', '', 0, 0, 0),
(5126, '', '', '', 0, 0, 0),
(5127, '', '', '', 0, 0, 0),
(5129, '', '', '', 0, 0, 0),
(5130, '', '', '', 0, 0, 0),
(5131, '', '', '', 0, 0, 0),
(5133, '', '', '', 0, 0, 0),
(5134, '', '', '', 0, 0, 0),
(5135, '', '', '', 0, 0, 0),
(5137, '', '', '', 0, 0, 0),
(5138, '', '', '', 0, 0, 0),
(5139, '', '', '', 0, 0, 0),
(5141, '', '', '', 0, 0, 0),
(5142, '', '', '', 0, 0, 0),
(5143, '', '', '', 0, 0, 0),
(5145, '', '', '', 0, 0, 0),
(5146, '', '', '', 0, 0, 0),
(5147, '', '', '', 0, 0, 0),
(5149, '', '', '', 0, 0, 0),
(5150, '', '', '', 0, 0, 0),
(5151, '', '', '', 0, 0, 0),
(5153, '', '', '', 0, 0, 0),
(5154, '', '', '', 0, 0, 0),
(5155, '', '', '', 0, 0, 0),
(5157, '', '', '', 0, 0, 0),
(5158, '', '', '', 0, 0, 0),
(5159, '', '', '', 0, 0, 0),
(5161, '', '', '', 0, 0, 0),
(5162, '', '', '', 0, 0, 0),
(5163, '', '', '', 0, 0, 0),
(5165, '', '', '', 0, 0, 0),
(5166, '', '', '', 0, 0, 0),
(5167, '', '', '', 0, 0, 0),
(5169, '', '', '', 0, 0, 0),
(5170, '', '', '', 0, 0, 0),
(5171, '', '', '', 0, 0, 0),
(5173, '', '', '', 0, 0, 0),
(5174, '', '', '', 0, 0, 0),
(5175, '', '', '', 0, 0, 0),
(5177, '', '', '', 0, 0, 0),
(5178, '', '', '', 0, 0, 0),
(5179, '', '', '', 0, 0, 0),
(5181, '', '', '', 0, 0, 0),
(5182, '', '', '', 0, 0, 0),
(5183, '', '', '', 0, 0, 0),
(5185, '', '', '', 0, 0, 0),
(5186, '', '', '', 0, 0, 0),
(5187, '', '', '', 0, 0, 0),
(5189, '', '', '', 0, 0, 0),
(5190, '', '', '', 0, 0, 0),
(5191, '', '', '', 0, 0, 0),
(5193, '', '', '', 0, 0, 0),
(5194, '', '', '', 0, 0, 0),
(5195, '', '', '', 0, 0, 0),
(5197, '', '', '', 0, 0, 0),
(5198, '', '', '', 0, 0, 0),
(5199, '', '', '', 0, 0, 0),
(5201, '', '', '', 0, 0, 0),
(5202, '', '', '', 0, 0, 0),
(5203, '', '', '', 0, 0, 0),
(5205, '', '', '', 0, 0, 0),
(5206, '', '', '', 0, 0, 0),
(5207, '', '', '', 0, 0, 0),
(5209, '', '', '', 0, 0, 0),
(5210, '', '', '', 0, 0, 0),
(5211, '', '', '', 0, 0, 0),
(5213, '', '', '', 0, 0, 0),
(5214, '', '', '', 0, 0, 0),
(5215, '', '', '', 0, 0, 0),
(5217, '', '', '', 0, 0, 0),
(5218, '', '', '', 0, 0, 0),
(5219, '', '', '', 0, 0, 0),
(5221, '', '', '', 0, 0, 0),
(5222, '', '', '', 0, 0, 0),
(5223, '', '', '', 0, 0, 0),
(5225, '', '', '', 0, 0, 0),
(5226, '', '', '', 0, 0, 0),
(5227, '', '', '', 0, 0, 0),
(5229, '', '', '', 0, 0, 0),
(5230, '', '', '', 0, 0, 0),
(5231, '', '', '', 0, 0, 0),
(5233, '', '', '', 0, 0, 0),
(5234, '', '', '', 0, 0, 0),
(5235, '', '', '', 0, 0, 0),
(5237, '', '', '', 0, 0, 0),
(5238, '', '', '', 0, 0, 0),
(5239, '', '', '', 0, 0, 0),
(5241, '', '', '', 0, 0, 0),
(5242, '', '', '', 0, 0, 0),
(5243, '', '', '', 0, 0, 0),
(5245, '', '', '', 0, 0, 0),
(5246, '', '', '', 0, 0, 0),
(5247, '', '', '', 0, 0, 0),
(5249, '', '', '', 0, 0, 0),
(5250, '', '', '', 0, 0, 0),
(5251, '', '', '', 0, 0, 0),
(5253, '', '', '', 0, 0, 0),
(5254, '', '', '', 0, 0, 0),
(5255, '', '', '', 0, 0, 0),
(5257, '', '', '', 0, 0, 0),
(5258, '', '', '', 0, 0, 0),
(5259, '', '', '', 0, 0, 0),
(5261, '', '', '', 0, 0, 0),
(5262, '', '', '', 0, 0, 0),
(5263, '', '', '', 0, 0, 0),
(5265, '', '', '', 0, 0, 0),
(5266, '', '', '', 0, 0, 0),
(5267, '', '', '', 0, 0, 0),
(5269, '', '', '', 0, 0, 0),
(5270, '', '', '', 0, 0, 0),
(5271, '', '', '', 0, 0, 0),
(5273, '', '', '', 0, 0, 0),
(5274, '', '', '', 0, 0, 0),
(5275, '', '', '', 0, 0, 0),
(5277, '', '', '', 0, 0, 0),
(5278, '', '', '', 0, 0, 0),
(5279, '', '', '', 0, 0, 0),
(5281, '', '', '', 0, 0, 0),
(5282, '', '', '', 0, 0, 0),
(5283, '', '', '', 0, 0, 0),
(5285, '', '', '', 0, 0, 0),
(5286, '', '', '', 0, 0, 0),
(5287, '', '', '', 0, 0, 0),
(5289, '', '', '', 0, 0, 0),
(5290, '', '', '', 0, 0, 0),
(5291, '', '', '', 0, 0, 0),
(5293, '', '', '', 0, 0, 0),
(5294, '', '', '', 0, 0, 0),
(5295, '', '', '', 0, 0, 0),
(5297, '', '', '', 0, 0, 0),
(5298, '', '', '', 0, 0, 0),
(5299, '', '', '', 0, 0, 0),
(5301, '', '', '', 0, 0, 0),
(5302, '', '', '', 0, 0, 0),
(5303, '', '', '', 0, 0, 0),
(5305, '', '', '', 0, 0, 0),
(5306, '', '', '', 0, 0, 0),
(5307, '', '', '', 0, 0, 0),
(5309, '', '', '', 0, 0, 0),
(5310, '', '', '', 0, 0, 0),
(5311, '', '', '', 0, 0, 0),
(5313, '', '', '', 0, 0, 0),
(5314, '', '', '', 0, 0, 0),
(5315, '', '', '', 0, 0, 0),
(5317, '', '', '', 0, 0, 0),
(5318, '', '', '', 0, 0, 0),
(5319, '', '', '', 0, 0, 0),
(5321, '', '', '', 0, 0, 0),
(5322, '', '', '', 0, 0, 0),
(5323, '', '', '', 0, 0, 0),
(5325, '', '', '', 0, 0, 0),
(5326, '', '', '', 0, 0, 0),
(5327, '', '', '', 0, 0, 0),
(5329, '', '', '', 0, 0, 0),
(5330, '', '', '', 0, 0, 0),
(5331, '', '', '', 0, 0, 0),
(5333, '', '', '', 0, 0, 0),
(5334, '', '', '', 0, 0, 0),
(5335, '', '', '', 0, 0, 0),
(5337, '', '', '', 0, 0, 0),
(5338, '', '', '', 0, 0, 0),
(5339, '', '', '', 0, 0, 0),
(5341, '', '', '', 0, 0, 0),
(5342, '', '', '', 0, 0, 0),
(5343, '', '', '', 0, 0, 0),
(5345, '', '', '', 0, 0, 0),
(5346, '', '', '', 0, 0, 0),
(5347, '', '', '', 0, 0, 0),
(5349, '', '', '', 0, 0, 0),
(5350, '', '', '', 0, 0, 0),
(5351, '', '', '', 0, 0, 0),
(5353, '', '', '', 0, 0, 0),
(5354, '', '', '', 0, 0, 0),
(5355, '', '', '', 0, 0, 0),
(5357, '', '', '', 0, 0, 0),
(5358, '', '', '', 0, 0, 0),
(5359, '', '', '', 0, 0, 0),
(5361, '', '', '', 0, 0, 0),
(5362, '', '', '', 0, 0, 0),
(5363, '', '', '', 0, 0, 0),
(5365, '', '', '', 0, 0, 0),
(5366, '', '', '', 0, 0, 0),
(5367, '', '', '', 0, 0, 0),
(5369, '', '', '', 0, 0, 0),
(5370, '', '', '', 0, 0, 0),
(5371, '', '', '', 0, 0, 0),
(5373, '', '', '', 0, 0, 0),
(5374, '', '', '', 0, 0, 0),
(5375, '', '', '', 0, 0, 0),
(5377, '', '', '', 0, 0, 0),
(5378, '', '', '', 0, 0, 0),
(5379, '', '', '', 0, 0, 0),
(5381, '', '', '', 0, 0, 0),
(5382, '', '', '', 0, 0, 0),
(5383, '', '', '', 0, 0, 0),
(5385, '', '', '', 0, 0, 0),
(5386, '', '', '', 0, 0, 0),
(5387, '', '', '', 0, 0, 0),
(5389, '', '', '', 0, 0, 0),
(5390, '', '', '', 0, 0, 0),
(5391, '', '', '', 0, 0, 0),
(5393, '', '', '', 0, 0, 0),
(5394, '', '', '', 0, 0, 0),
(5395, '', '', '', 0, 0, 0),
(5397, '', '', '', 0, 0, 0),
(5398, '', '', '', 0, 0, 0),
(5399, '', '', '', 0, 0, 0),
(5401, '', '', '', 0, 0, 0),
(5402, '', '', '', 0, 0, 0),
(5403, '', '', '', 0, 0, 0),
(5405, '', '', '', 0, 0, 0),
(5406, '', '', '', 0, 0, 0),
(5407, '', '', '', 0, 0, 0),
(5409, '', '', '', 0, 0, 0),
(5410, '', '', '', 0, 0, 0),
(5411, '', '', '', 0, 0, 0),
(5413, '', '', '', 0, 0, 0),
(5414, '', '', '', 0, 0, 0),
(5415, '', '', '', 0, 0, 0),
(5417, '', '', '', 0, 0, 0),
(5418, '', '', '', 0, 0, 0),
(5419, '', '', '', 0, 0, 0),
(5421, '', '', '', 0, 0, 0),
(5422, '', '', '', 0, 0, 0),
(5423, '', '', '', 0, 0, 0),
(5425, '', '', '', 0, 0, 0),
(5426, '', '', '', 0, 0, 0),
(5427, '', '', '', 0, 0, 0),
(5429, '', '', '', 0, 0, 0),
(5430, '', '', '', 0, 0, 0),
(5431, '', '', '', 0, 0, 0),
(5433, '', '', '', 0, 0, 0),
(5434, '', '', '', 0, 0, 0),
(5435, '', '', '', 0, 0, 0),
(5437, '', '', '', 0, 0, 0),
(5438, '', '', '', 0, 0, 0),
(5439, '', '', '', 0, 0, 0),
(5441, '', '', '', 0, 0, 0),
(5442, '', '', '', 0, 0, 0),
(5443, '', '', '', 0, 0, 0),
(5445, '', '', '', 0, 0, 0),
(5446, '', '', '', 0, 0, 0),
(5447, '', '', '', 0, 0, 0),
(5449, '', '', '', 0, 0, 0),
(5450, '', '', '', 0, 0, 0),
(5451, '', '', '', 0, 0, 0),
(5453, '', '', '', 0, 0, 0),
(5454, '', '', '', 0, 0, 0),
(5455, '', '', '', 0, 0, 0),
(5457, '', '', '', 0, 0, 0),
(5458, '', '', '', 0, 0, 0),
(5459, '', '', '', 0, 0, 0),
(5461, '', '', '', 0, 0, 0),
(5462, '', '', '', 0, 0, 0),
(5463, '', '', '', 0, 0, 0),
(5465, '', '', '', 0, 0, 0),
(5466, '', '', '', 0, 0, 0),
(5467, '', '', '', 0, 0, 0),
(5469, '', '', '', 0, 0, 0),
(5470, '', '', '', 0, 0, 0),
(5471, '', '', '', 0, 0, 0),
(5473, '', '', '', 0, 0, 0),
(5474, '', '', '', 0, 0, 0),
(5475, '', '', '', 0, 0, 0),
(5477, '', '', '', 0, 0, 0),
(5478, '', '', '', 0, 0, 0),
(5479, '', '', '', 0, 0, 0),
(5481, '', '', '', 0, 0, 0),
(5482, '', '', '', 0, 0, 0),
(5483, '', '', '', 0, 0, 0),
(5485, '', '', '', 0, 0, 0),
(5486, '', '', '', 0, 0, 0),
(5487, '', '', '', 0, 0, 0),
(5489, '', '', '', 0, 0, 0),
(5490, '', '', '', 0, 0, 0),
(5491, '', '', '', 0, 0, 0),
(5493, '', '', '', 0, 0, 0),
(5494, '', '', '', 0, 0, 0),
(5495, '', '', '', 0, 0, 0),
(5497, '', '', '', 0, 0, 0),
(5498, '', '', '', 0, 0, 0),
(5499, '', '', '', 0, 0, 0),
(5501, '', '', '', 0, 0, 0),
(5502, '', '', '', 0, 0, 0),
(5503, '', '', '', 0, 0, 0),
(5505, '', '', '', 0, 0, 0),
(5506, '', '', '', 0, 0, 0),
(5507, '', '', '', 0, 0, 0),
(5509, '', '', '', 0, 0, 0),
(5510, '', '', '', 0, 0, 0),
(5511, '', '', '', 0, 0, 0),
(5513, '', '', '', 0, 0, 0),
(5514, '', '', '', 0, 0, 0),
(5515, '', '', '', 0, 0, 0),
(5517, '', '', '', 0, 0, 0),
(5518, '', '', '', 0, 0, 0),
(5519, '', '', '', 0, 0, 0),
(5521, '', '', '', 0, 0, 0),
(5522, '', '', '', 0, 0, 0),
(5523, '', '', '', 0, 0, 0),
(5525, '', '', '', 0, 0, 0),
(5526, '', '', '', 0, 0, 0),
(5527, '', '', '', 0, 0, 0),
(5529, '', '', '', 0, 0, 0),
(5530, '', '', '', 0, 0, 0),
(5531, '', '', '', 0, 0, 0),
(5533, '', '', '', 0, 0, 0),
(5534, '', '', '', 0, 0, 0),
(5535, '', '', '', 0, 0, 0),
(5537, '', '', '', 0, 0, 0),
(5538, '', '', '', 0, 0, 0),
(5539, '', '', '', 0, 0, 0),
(5541, '', '', '', 0, 0, 0),
(5542, '', '', '', 0, 0, 0),
(5543, '', '', '', 0, 0, 0),
(5545, '', '', '', 0, 0, 0),
(5546, '', '', '', 0, 0, 0),
(5547, '', '', '', 0, 0, 0),
(5549, '', '', '', 0, 0, 0),
(5550, '', '', '', 0, 0, 0),
(5551, '', '', '', 0, 0, 0),
(5553, '', '', '', 0, 0, 0),
(5554, '', '', '', 0, 0, 0),
(5555, '', '', '', 0, 0, 0),
(5557, '', '', '', 0, 0, 0),
(5558, '', '', '', 0, 0, 0),
(5559, '', '', '', 0, 0, 0),
(5561, '', '', '', 0, 0, 0),
(5562, '', '', '', 0, 0, 0),
(5563, '', '', '', 0, 0, 0),
(5565, '', '', '', 0, 0, 0),
(5566, '', '', '', 0, 0, 0),
(5567, '', '', '', 0, 0, 0),
(5569, '', '', '', 0, 0, 0),
(5570, '', '', '', 0, 0, 0),
(5571, '', '', '', 0, 0, 0),
(5573, '', '', '', 0, 0, 0),
(5574, '', '', '', 0, 0, 0),
(5575, '', '', '', 0, 0, 0),
(5577, '', '', '', 0, 0, 0),
(5578, '', '', '', 0, 0, 0),
(5579, '', '', '', 0, 0, 0),
(5581, '', '', '', 0, 0, 0),
(5582, '', '', '', 0, 0, 0),
(5583, '', '', '', 0, 0, 0),
(5585, '', '', '', 0, 0, 0),
(5586, '', '', '', 0, 0, 0),
(5587, '', '', '', 0, 0, 0),
(5589, '', '', '', 0, 0, 0),
(5590, '', '', '', 0, 0, 0),
(5591, '', '', '', 0, 0, 0),
(5593, '', '', '', 0, 0, 0),
(5594, '', '', '', 0, 0, 0),
(5595, '', '', '', 0, 0, 0),
(5597, '', '', '', 0, 0, 0),
(5598, '', '', '', 0, 0, 0),
(5599, '', '', '', 0, 0, 0),
(5601, '', '', '', 0, 0, 0),
(5602, '', '', '', 0, 0, 0),
(5603, '', '', '', 0, 0, 0),
(5605, '', '', '', 0, 0, 0),
(5606, '', '', '', 0, 0, 0),
(5607, '', '', '', 0, 0, 0),
(5609, '', '', '', 0, 0, 0),
(5610, '', '', '', 0, 0, 0),
(5611, '', '', '', 0, 0, 0),
(5613, '', '', '', 0, 0, 0),
(5614, '', '', '', 0, 0, 0),
(5615, '', '', '', 0, 0, 0),
(5617, '', '', '', 0, 0, 0),
(5618, '', '', '', 0, 0, 0),
(5619, '', '', '', 0, 0, 0),
(5621, '', '', '', 0, 0, 0),
(5622, '', '', '', 0, 0, 0),
(5623, '', '', '', 0, 0, 0),
(5625, '', '', '', 0, 0, 0),
(5626, '', '', '', 0, 0, 0),
(5627, '', '', '', 0, 0, 0),
(5629, '', '', '', 0, 0, 0),
(5630, '', '', '', 0, 0, 0),
(5631, '', '', '', 0, 0, 0),
(5633, '', '', '', 0, 0, 0),
(5634, '', '', '', 0, 0, 0),
(5635, '', '', '', 0, 0, 0),
(5637, '', '', '', 0, 0, 0),
(5638, '', '', '', 0, 0, 0),
(5639, '', '', '', 0, 0, 0),
(5641, '', '', '', 0, 0, 0),
(5642, '', '', '', 0, 0, 0),
(5643, '', '', '', 0, 0, 0),
(5645, '', '', '', 0, 0, 0),
(5646, '', '', '', 0, 0, 0),
(5647, '', '', '', 0, 0, 0),
(5649, '', '', '', 0, 0, 0),
(5650, '', '', '', 0, 0, 0),
(5651, '', '', '', 0, 0, 0),
(5653, '', '', '', 0, 0, 0),
(5654, '', '', '', 0, 0, 0),
(5655, '', '', '', 0, 0, 0),
(5657, '', '', '', 0, 0, 0),
(5658, '', '', '', 0, 0, 0),
(5659, '', '', '', 0, 0, 0),
(5661, '', '', '', 0, 0, 0),
(5662, '', '', '', 0, 0, 0),
(5663, '', '', '', 0, 0, 0),
(5665, '', '', '', 0, 0, 0),
(5666, '', '', '', 0, 0, 0),
(5667, '', '', '', 0, 0, 0),
(5669, '', '', '', 0, 0, 0),
(5670, '', '', '', 0, 0, 0),
(5671, '', '', '', 0, 0, 0),
(5673, '', '', '', 0, 0, 0),
(5674, '', '', '', 0, 0, 0),
(5675, '', '', '', 0, 0, 0),
(5677, '', '', '', 0, 0, 0),
(5678, '', '', '', 0, 0, 0),
(5679, '', '', '', 0, 0, 0),
(5681, '', '', '', 0, 0, 0),
(5682, '', '', '', 0, 0, 0),
(5683, '', '', '', 0, 0, 0),
(5685, '', '', '', 0, 0, 0),
(5686, '', '', '', 0, 0, 0),
(5687, '', '', '', 0, 0, 0),
(5689, '', '', '', 0, 0, 0),
(5690, '', '', '', 0, 0, 0),
(5691, '', '', '', 0, 0, 0),
(5693, '', '', '', 0, 0, 0),
(5694, '', '', '', 0, 0, 0),
(5695, '', '', '', 0, 0, 0),
(5697, '', '', '', 0, 0, 0),
(5698, '', '', '', 0, 0, 0),
(5699, '', '', '', 0, 0, 0),
(5701, '', '', '', 0, 0, 0),
(5702, '', '', '', 0, 0, 0),
(5703, '', '', '', 0, 0, 0),
(5705, '', '', '', 0, 0, 0),
(5706, '', '', '', 0, 0, 0),
(5707, '', '', '', 0, 0, 0),
(5709, '', '', '', 0, 0, 0),
(5710, '', '', '', 0, 0, 0),
(5711, '', '', '', 0, 0, 0),
(5713, '', '', '', 0, 0, 0),
(5714, '', '', '', 0, 0, 0),
(5715, '', '', '', 0, 0, 0),
(5717, '', '', '', 0, 0, 0),
(5718, '', '', '', 0, 0, 0),
(5719, '', '', '', 0, 0, 0),
(5721, '', '', '', 0, 0, 0),
(5722, '', '', '', 0, 0, 0),
(5723, '', '', '', 0, 0, 0),
(5725, '', '', '', 0, 0, 0),
(5726, '', '', '', 0, 0, 0),
(5727, '', '', '', 0, 0, 0),
(5729, '', '', '', 0, 0, 0),
(5730, '', '', '', 0, 0, 0),
(5731, '', '', '', 0, 0, 0),
(5733, '', '', '', 0, 0, 0),
(5734, '', '', '', 0, 0, 0),
(5735, '', '', '', 0, 0, 0),
(5737, '', '', '', 0, 0, 0),
(5738, '', '', '', 0, 0, 0),
(5739, '', '', '', 0, 0, 0),
(5741, '', '', '', 0, 0, 0),
(5742, '', '', '', 0, 0, 0),
(5743, '', '', '', 0, 0, 0),
(5745, '', '', '', 0, 0, 0),
(5746, '', '', '', 0, 0, 0),
(5747, '', '', '', 0, 0, 0),
(5749, '', '', '', 0, 0, 0),
(5750, '', '', '', 0, 0, 0),
(5751, '', '', '', 0, 0, 0),
(5753, '', '', '', 0, 0, 0),
(5754, '', '', '', 0, 0, 0),
(5755, '', '', '', 0, 0, 0),
(5757, '', '', '', 0, 0, 0),
(5758, '', '', '', 0, 0, 0),
(5759, '', '', '', 0, 0, 0),
(5761, '', '', '', 0, 0, 0),
(5762, '', '', '', 0, 0, 0),
(5763, '', '', '', 0, 0, 0),
(5765, '', '', '', 0, 0, 0),
(5766, '', '', '', 0, 0, 0),
(5767, '', '', '', 0, 0, 0),
(5769, '', '', '', 0, 0, 0),
(5770, '', '', '', 0, 0, 0),
(5771, '', '', '', 0, 0, 0),
(5773, '', '', '', 0, 0, 0),
(5774, '', '', '', 0, 0, 0),
(5775, '', '', '', 0, 0, 0),
(5777, '', '', '', 0, 0, 0),
(5778, '', '', '', 0, 0, 0),
(5779, '', '', '', 0, 0, 0),
(5781, '', '', '', 0, 0, 0),
(5782, '', '', '', 0, 0, 0),
(5783, '', '', '', 0, 0, 0),
(5785, '', '', '', 0, 0, 0),
(5786, '', '', '', 0, 0, 0),
(5787, '', '', '', 0, 0, 0),
(5789, '', '', '', 0, 0, 0),
(5790, '', '', '', 0, 0, 0),
(5791, '', '', '', 0, 0, 0),
(5793, '', '', '', 0, 0, 0),
(5794, '', '', '', 0, 0, 0),
(5795, '', '', '', 0, 0, 0),
(5797, '', '', '', 0, 0, 0),
(5798, '', '', '', 0, 0, 0),
(5799, '', '', '', 0, 0, 0),
(5801, '', '', '', 0, 0, 0),
(5802, '', '', '', 0, 0, 0),
(5803, '', '', '', 0, 0, 0),
(5805, '', '', '', 0, 0, 0),
(5806, '', '', '', 0, 0, 0),
(5807, '', '', '', 0, 0, 0),
(5809, '', '', '', 0, 0, 0),
(5810, '', '', '', 0, 0, 0),
(5811, '', '', '', 0, 0, 0),
(5813, '', '', '', 0, 0, 0),
(5814, '', '', '', 0, 0, 0),
(5815, '', '', '', 0, 0, 0),
(5817, '', '', '', 0, 0, 0),
(5818, '', '', '', 0, 0, 0),
(5819, '', '', '', 0, 0, 0),
(5821, '', '', '', 0, 0, 0),
(5822, '', '', '', 0, 0, 0),
(5823, '', '', '', 0, 0, 0),
(5825, '', '', '', 0, 0, 0),
(5826, '', '', '', 0, 0, 0),
(5827, '', '', '', 0, 0, 0),
(5829, '', '', '', 0, 0, 0),
(5830, '', '', '', 0, 0, 0),
(5831, '', '', '', 0, 0, 0),
(5833, '', '', '', 0, 0, 0),
(5834, '', '', '', 0, 0, 0),
(5835, '', '', '', 0, 0, 0),
(5837, '', '', '', 0, 0, 0),
(5838, '', '', '', 0, 0, 0),
(5839, '', '', '', 0, 0, 0),
(5841, '', '', '', 0, 0, 0),
(5842, '', '', '', 0, 0, 0),
(5843, '', '', '', 0, 0, 0),
(5845, '', '', '', 0, 0, 0),
(5846, '', '', '', 0, 0, 0),
(5847, '', '', '', 0, 0, 0),
(5849, '', '', '', 0, 0, 0),
(5850, '', '', '', 0, 0, 0),
(5851, '', '', '', 0, 0, 0),
(5853, '', '', '', 0, 0, 0),
(5854, '', '', '', 0, 0, 0),
(5855, '', '', '', 0, 0, 0),
(5857, '', '', '', 0, 0, 0),
(5858, '', '', '', 0, 0, 0),
(5859, '', '', '', 0, 0, 0),
(5861, '', '', '', 0, 0, 0),
(5862, '', '', '', 0, 0, 0),
(5863, '', '', '', 0, 0, 0),
(5865, '', '', '', 0, 0, 0),
(5866, '', '', '', 0, 0, 0),
(5867, '', '', '', 0, 0, 0),
(5869, '', '', '', 0, 0, 0),
(5870, '', '', '', 0, 0, 0),
(5871, '', '', '', 0, 0, 0),
(5873, '', '', '', 0, 0, 0),
(5874, '', '', '', 0, 0, 0),
(5875, '', '', '', 0, 0, 0),
(5877, '', '', '', 0, 0, 0),
(5878, '', '', '', 0, 0, 0),
(5879, '', '', '', 0, 0, 0),
(5881, '', '', '', 0, 0, 0),
(5882, '', '', '', 0, 0, 0),
(5883, '', '', '', 0, 0, 0),
(5885, '', '', '', 0, 0, 0),
(5886, '', '', '', 0, 0, 0),
(5887, '', '', '', 0, 0, 0),
(5889, '', '', '', 0, 0, 0),
(5890, '', '', '', 0, 0, 0),
(5891, '', '', '', 0, 0, 0),
(5893, '', '', '', 0, 0, 0),
(5894, '', '', '', 0, 0, 0),
(5895, '', '', '', 0, 0, 0),
(5897, '', '', '', 0, 0, 0),
(5898, '', '', '', 0, 0, 0),
(5899, '', '', '', 0, 0, 0),
(5901, '', '', '', 0, 0, 0),
(5902, '', '', '', 0, 0, 0),
(5903, '', '', '', 0, 0, 0),
(5905, '', '', '', 0, 0, 0),
(5906, '', '', '', 0, 0, 0),
(5907, '', '', '', 0, 0, 0),
(5909, '', '', '', 0, 0, 0),
(5910, '', '', '', 0, 0, 0),
(5911, '', '', '', 0, 0, 0),
(5913, '', '', '', 0, 0, 0),
(5914, '', '', '', 0, 0, 0),
(5915, '', '', '', 0, 0, 0),
(5917, '', '', '', 0, 0, 0),
(5918, '', '', '', 0, 0, 0),
(5919, '', '', '', 0, 0, 0),
(5921, '', '', '', 0, 0, 0),
(5922, '', '', '', 0, 0, 0),
(5923, '', '', '', 0, 0, 0),
(5925, '', '', '', 0, 0, 0),
(5926, '', '', '', 0, 0, 0),
(5927, '', '', '', 0, 0, 0),
(5929, '', '', '', 0, 0, 0),
(5930, '', '', '', 0, 0, 0),
(5931, '', '', '', 0, 0, 0),
(5933, '', '', '', 0, 0, 0),
(5934, '', '', '', 0, 0, 0),
(5935, '', '', '', 0, 0, 0),
(5937, '', '', '', 0, 0, 0),
(5938, '', '', '', 0, 0, 0),
(5939, '', '', '', 0, 0, 0),
(5941, '', '', '', 0, 0, 0);
INSERT INTO `vehicle` (`idvehicle`, `vehlicetype`, `vehlicemodel`, `vehlicejenis`, `cc`, `otr`, `status`) VALUES
(5942, '', '', '', 0, 0, 0),
(5943, '', '', '', 0, 0, 0),
(5945, '', '', '', 0, 0, 0),
(5946, '', '', '', 0, 0, 0),
(5947, '', '', '', 0, 0, 0),
(5949, '', '', '', 0, 0, 0),
(5950, '', '', '', 0, 0, 0),
(5951, '', '', '', 0, 0, 0),
(5953, '', '', '', 0, 0, 0),
(5954, '', '', '', 0, 0, 0),
(5955, '', '', '', 0, 0, 0),
(5957, '', '', '', 0, 0, 0),
(5958, '', '', '', 0, 0, 0),
(5959, '', '', '', 0, 0, 0),
(5961, '', '', '', 0, 0, 0),
(5962, '', '', '', 0, 0, 0),
(5963, '', '', '', 0, 0, 0),
(5965, '', '', '', 0, 0, 0),
(5966, '', '', '', 0, 0, 0),
(5967, '', '', '', 0, 0, 0),
(5969, '', '', '', 0, 0, 0),
(5970, '', '', '', 0, 0, 0),
(5971, '', '', '', 0, 0, 0),
(5973, '', '', '', 0, 0, 0),
(5974, '', '', '', 0, 0, 0),
(5975, '', '', '', 0, 0, 0),
(5977, '', '', '', 0, 0, 0),
(5978, '', '', '', 0, 0, 0),
(5979, '', '', '', 0, 0, 0),
(5981, '', '', '', 0, 0, 0),
(5982, '', '', '', 0, 0, 0),
(5983, '', '', '', 0, 0, 0),
(5985, '', '', '', 0, 0, 0),
(5986, '', '', '', 0, 0, 0),
(5987, '', '', '', 0, 0, 0),
(5989, '', '', '', 0, 0, 0),
(5990, '', '', '', 0, 0, 0),
(5991, '', '', '', 0, 0, 0),
(5993, '', '', '', 0, 0, 0),
(5994, '', '', '', 0, 0, 0),
(5995, '', '', '', 0, 0, 0),
(5997, '', '', '', 0, 0, 0),
(5998, '', '', '', 0, 0, 0),
(5999, '', '', '', 0, 0, 0),
(6001, '', '', '', 0, 0, 0),
(6002, '', '', '', 0, 0, 0),
(6003, '', '', '', 0, 0, 0),
(6005, '', '', '', 0, 0, 0),
(6006, '', '', '', 0, 0, 0),
(6007, '', '', '', 0, 0, 0),
(6009, '', '', '', 0, 0, 0),
(6010, '', '', '', 0, 0, 0),
(6011, '', '', '', 0, 0, 0),
(6013, '', '', '', 0, 0, 0),
(6014, '', '', '', 0, 0, 0),
(6015, '', '', '', 0, 0, 0),
(6017, '', '', '', 0, 0, 0),
(6018, '', '', '', 0, 0, 0),
(6019, '', '', '', 0, 0, 0),
(6021, '', '', '', 0, 0, 0),
(6022, '', '', '', 0, 0, 0),
(6023, '', '', '', 0, 0, 0),
(6025, '', '', '', 0, 0, 0),
(6026, '', '', '', 0, 0, 0),
(6027, '', '', '', 0, 0, 0),
(6029, '', '', '', 0, 0, 0),
(6030, '', '', '', 0, 0, 0),
(6031, '', '', '', 0, 0, 0),
(6033, '', '', '', 0, 0, 0),
(6034, '', '', '', 0, 0, 0),
(6035, '', '', '', 0, 0, 0),
(6037, '', '', '', 0, 0, 0),
(6038, '', '', '', 0, 0, 0),
(6039, '', '', '', 0, 0, 0),
(6041, '', '', '', 0, 0, 0),
(6042, '', '', '', 0, 0, 0),
(6043, '', '', '', 0, 0, 0),
(6045, '', '', '', 0, 0, 0),
(6046, '', '', '', 0, 0, 0),
(6047, '', '', '', 0, 0, 0),
(6049, '', '', '', 0, 0, 0),
(6050, '', '', '', 0, 0, 0),
(6051, '', '', '', 0, 0, 0),
(6053, '', '', '', 0, 0, 0),
(6054, '', '', '', 0, 0, 0),
(6055, '', '', '', 0, 0, 0),
(6057, '', '', '', 0, 0, 0),
(6058, '', '', '', 0, 0, 0),
(6059, '', '', '', 0, 0, 0),
(6061, '', '', '', 0, 0, 0),
(6062, '', '', '', 0, 0, 0),
(6063, '', '', '', 0, 0, 0),
(6065, '', '', '', 0, 0, 0),
(6066, '', '', '', 0, 0, 0),
(6067, '', '', '', 0, 0, 0),
(6069, '', '', '', 0, 0, 0),
(6070, '', '', '', 0, 0, 0),
(6071, '', '', '', 0, 0, 0),
(6073, '', '', '', 0, 0, 0),
(6074, '', '', '', 0, 0, 0),
(6075, '', '', '', 0, 0, 0),
(6077, '', '', '', 0, 0, 0),
(6078, '', '', '', 0, 0, 0),
(6079, '', '', '', 0, 0, 0),
(6081, '', '', '', 0, 0, 0),
(6082, '', '', '', 0, 0, 0),
(6083, '', '', '', 0, 0, 0),
(6085, '', '', '', 0, 0, 0),
(6086, '', '', '', 0, 0, 0),
(6087, '', '', '', 0, 0, 0),
(6089, '', '', '', 0, 0, 0),
(6090, '', '', '', 0, 0, 0),
(6091, '', '', '', 0, 0, 0),
(6093, '', '', '', 0, 0, 0),
(6094, '', '', '', 0, 0, 0),
(6095, '', '', '', 0, 0, 0),
(6097, '', '', '', 0, 0, 0),
(6098, '', '', '', 0, 0, 0),
(6099, '', '', '', 0, 0, 0),
(6101, '', '', '', 0, 0, 0),
(6102, '', '', '', 0, 0, 0),
(6103, '', '', '', 0, 0, 0),
(6105, '', '', '', 0, 0, 0),
(6106, '', '', '', 0, 0, 0),
(6107, '', '', '', 0, 0, 0),
(6109, '', '', '', 0, 0, 0),
(6110, '', '', '', 0, 0, 0),
(6111, '', '', '', 0, 0, 0),
(6113, '', '', '', 0, 0, 0),
(6114, '', '', '', 0, 0, 0),
(6115, '', '', '', 0, 0, 0),
(6117, '', '', '', 0, 0, 0),
(6118, '', '', '', 0, 0, 0),
(6119, '', '', '', 0, 0, 0),
(6121, '', '', '', 0, 0, 0),
(6122, '', '', '', 0, 0, 0),
(6123, '', '', '', 0, 0, 0),
(6125, '', '', '', 0, 0, 0),
(6126, '', '', '', 0, 0, 0),
(6127, '', '', '', 0, 0, 0),
(6129, '', '', '', 0, 0, 0),
(6130, '', '', '', 0, 0, 0),
(6131, '', '', '', 0, 0, 0),
(8180, '', '', '', 0, 0, 0),
(8181, '', '', '', 0, 0, 0),
(8182, '', '', '', 0, 0, 0),
(8184, '', '', '', 0, 0, 0),
(8185, '', '', '', 0, 0, 0),
(8186, '', '', '', 0, 0, 0),
(8188, '', '', '', 0, 0, 0),
(8189, '', '', '', 0, 0, 0),
(8190, '', '', '', 0, 0, 0),
(8192, '', '', '', 0, 0, 0),
(8193, '', '', '', 0, 0, 0),
(8194, '', '', '', 0, 0, 0),
(8196, '', '', '', 0, 0, 0),
(8197, '', '', '', 0, 0, 0),
(8198, '', '', '', 0, 0, 0),
(8200, '', '', '', 0, 0, 0),
(8201, '', '', '', 0, 0, 0),
(8202, '', '', '', 0, 0, 0),
(8204, '', '', '', 0, 0, 0),
(8205, '', '', '', 0, 0, 0),
(8206, '', '', '', 0, 0, 0),
(8208, '', '', '', 0, 0, 0),
(8209, '', '', '', 0, 0, 0),
(8210, '', '', '', 0, 0, 0),
(8212, '', '', '', 0, 0, 0),
(8213, '', '', '', 0, 0, 0),
(8214, '', '', '', 0, 0, 0),
(8216, '', '', '', 0, 0, 0),
(8217, '', '', '', 0, 0, 0),
(8218, '', '', '', 0, 0, 0),
(8220, '', '', '', 0, 0, 0),
(8221, '', '', '', 0, 0, 0),
(8222, '', '', '', 0, 0, 0),
(8224, '', '', '', 0, 0, 0),
(8225, '', '', '', 0, 0, 0),
(8226, '', '', '', 0, 0, 0),
(8228, '', '', '', 0, 0, 0),
(8229, '', '', '', 0, 0, 0),
(8230, '', '', '', 0, 0, 0),
(8232, '', '', '', 0, 0, 0),
(8233, '', '', '', 0, 0, 0),
(8234, '', '', '', 0, 0, 0),
(8236, '', '', '', 0, 0, 0),
(8237, '', '', '', 0, 0, 0),
(8238, '', '', '', 0, 0, 0),
(8240, '', '', '', 0, 0, 0),
(8241, '', '', '', 0, 0, 0),
(8242, '', '', '', 0, 0, 0),
(8244, '', '', '', 0, 0, 0),
(8245, '', '', '', 0, 0, 0),
(8246, '', '', '', 0, 0, 0),
(8248, '', '', '', 0, 0, 0),
(8249, '', '', '', 0, 0, 0),
(8250, '', '', '', 0, 0, 0),
(8252, '', '', '', 0, 0, 0),
(8253, '', '', '', 0, 0, 0),
(8254, '', '', '', 0, 0, 0),
(8256, '', '', '', 0, 0, 0),
(8257, '', '', '', 0, 0, 0),
(8258, '', '', '', 0, 0, 0),
(8260, '', '', '', 0, 0, 0),
(8261, '', '', '', 0, 0, 0),
(8262, '', '', '', 0, 0, 0),
(8264, '', '', '', 0, 0, 0),
(8265, '', '', '', 0, 0, 0),
(8266, '', '', '', 0, 0, 0),
(8268, '', '', '', 0, 0, 0),
(8269, '', '', '', 0, 0, 0),
(8270, '', '', '', 0, 0, 0),
(8272, '', '', '', 0, 0, 0),
(8273, '', '', '', 0, 0, 0),
(8274, '', '', '', 0, 0, 0),
(8276, '', '', '', 0, 0, 0),
(8277, '', '', '', 0, 0, 0),
(8278, '', '', '', 0, 0, 0),
(8280, '', '', '', 0, 0, 0),
(8281, '', '', '', 0, 0, 0),
(8282, '', '', '', 0, 0, 0),
(8284, '', '', '', 0, 0, 0),
(8285, '', '', '', 0, 0, 0),
(8286, '', '', '', 0, 0, 0),
(8288, '', '', '', 0, 0, 0),
(8289, '', '', '', 0, 0, 0),
(8290, '', '', '', 0, 0, 0),
(8292, '', '', '', 0, 0, 0),
(8293, '', '', '', 0, 0, 0),
(8294, '', '', '', 0, 0, 0),
(8296, '', '', '', 0, 0, 0),
(8297, '', '', '', 0, 0, 0),
(8298, '', '', '', 0, 0, 0),
(8300, '', '', '', 0, 0, 0),
(8301, '', '', '', 0, 0, 0),
(8302, '', '', '', 0, 0, 0),
(8304, '', '', '', 0, 0, 0),
(8305, '', '', '', 0, 0, 0),
(8306, '', '', '', 0, 0, 0),
(8308, '', '', '', 0, 0, 0),
(8309, '', '', '', 0, 0, 0),
(8310, '', '', '', 0, 0, 0),
(8312, '', '', '', 0, 0, 0),
(8313, '', '', '', 0, 0, 0),
(8314, '', '', '', 0, 0, 0),
(8316, '', '', '', 0, 0, 0),
(8317, '', '', '', 0, 0, 0),
(8318, '', '', '', 0, 0, 0),
(8320, '', '', '', 0, 0, 0),
(8321, '', '', '', 0, 0, 0),
(8322, '', '', '', 0, 0, 0),
(8324, '', '', '', 0, 0, 0),
(8325, '', '', '', 0, 0, 0),
(8326, '', '', '', 0, 0, 0),
(8328, '', '', '', 0, 0, 0),
(8329, '', '', '', 0, 0, 0),
(8330, '', '', '', 0, 0, 0),
(8332, '', '', '', 0, 0, 0),
(8333, '', '', '', 0, 0, 0),
(8334, '', '', '', 0, 0, 0),
(8336, '', '', '', 0, 0, 0),
(8337, '', '', '', 0, 0, 0),
(8338, '', '', '', 0, 0, 0),
(8340, '', '', '', 0, 0, 0),
(8341, '', '', '', 0, 0, 0),
(8342, '', '', '', 0, 0, 0),
(8344, '', '', '', 0, 0, 0),
(8345, '', '', '', 0, 0, 0),
(8346, '', '', '', 0, 0, 0),
(8348, '', '', '', 0, 0, 0),
(8349, '', '', '', 0, 0, 0),
(8350, '', '', '', 0, 0, 0),
(8352, '', '', '', 0, 0, 0),
(8353, '', '', '', 0, 0, 0),
(8354, '', '', '', 0, 0, 0),
(8356, '', '', '', 0, 0, 0),
(8357, '', '', '', 0, 0, 0),
(8358, '', '', '', 0, 0, 0),
(8360, '', '', '', 0, 0, 0),
(8361, '', '', '', 0, 0, 0),
(8362, '', '', '', 0, 0, 0),
(8364, '', '', '', 0, 0, 0),
(8365, '', '', '', 0, 0, 0),
(8366, '', '', '', 0, 0, 0),
(8368, '', '', '', 0, 0, 0),
(8369, '', '', '', 0, 0, 0),
(8370, '', '', '', 0, 0, 0),
(8372, '', '', '', 0, 0, 0),
(8373, '', '', '', 0, 0, 0),
(8374, '', '', '', 0, 0, 0),
(8376, '', '', '', 0, 0, 0),
(8377, '', '', '', 0, 0, 0),
(8378, '', '', '', 0, 0, 0),
(8380, '', '', '', 0, 0, 0),
(8381, '', '', '', 0, 0, 0),
(8382, '', '', '', 0, 0, 0),
(8384, '', '', '', 0, 0, 0),
(8385, '', '', '', 0, 0, 0),
(8386, '', '', '', 0, 0, 0),
(8388, '', '', '', 0, 0, 0),
(8389, '', '', '', 0, 0, 0),
(8390, '', '', '', 0, 0, 0),
(8392, '', '', '', 0, 0, 0),
(8393, '', '', '', 0, 0, 0),
(8394, '', '', '', 0, 0, 0),
(8396, '', '', '', 0, 0, 0),
(8397, '', '', '', 0, 0, 0),
(8398, '', '', '', 0, 0, 0),
(8400, '', '', '', 0, 0, 0),
(8401, '', '', '', 0, 0, 0),
(8402, '', '', '', 0, 0, 0),
(8404, '', '', '', 0, 0, 0),
(8405, '', '', '', 0, 0, 0),
(8406, '', '', '', 0, 0, 0),
(8408, '', '', '', 0, 0, 0),
(8409, '', '', '', 0, 0, 0),
(8410, '', '', '', 0, 0, 0),
(8412, '', '', '', 0, 0, 0),
(8413, '', '', '', 0, 0, 0),
(8414, '', '', '', 0, 0, 0),
(8416, '', '', '', 0, 0, 0),
(8417, '', '', '', 0, 0, 0),
(8418, '', '', '', 0, 0, 0),
(8420, '', '', '', 0, 0, 0),
(8421, '', '', '', 0, 0, 0),
(8422, '', '', '', 0, 0, 0),
(8424, '', '', '', 0, 0, 0),
(8425, '', '', '', 0, 0, 0),
(8426, '', '', '', 0, 0, 0),
(8428, '', '', '', 0, 0, 0),
(8429, '', '', '', 0, 0, 0),
(8430, '', '', '', 0, 0, 0),
(8432, '', '', '', 0, 0, 0),
(8433, '', '', '', 0, 0, 0),
(8434, '', '', '', 0, 0, 0),
(8436, '', '', '', 0, 0, 0),
(8437, '', '', '', 0, 0, 0),
(8438, '', '', '', 0, 0, 0),
(8440, '', '', '', 0, 0, 0),
(8441, '', '', '', 0, 0, 0),
(8442, '', '', '', 0, 0, 0),
(8444, '', '', '', 0, 0, 0),
(8445, '', '', '', 0, 0, 0),
(8446, '', '', '', 0, 0, 0),
(8448, '', '', '', 0, 0, 0),
(8449, '', '', '', 0, 0, 0),
(8450, '', '', '', 0, 0, 0),
(8452, '', '', '', 0, 0, 0),
(8453, '', '', '', 0, 0, 0),
(8454, '', '', '', 0, 0, 0),
(8456, '', '', '', 0, 0, 0),
(8457, '', '', '', 0, 0, 0),
(8458, '', '', '', 0, 0, 0),
(8460, '', '', '', 0, 0, 0),
(8461, '', '', '', 0, 0, 0),
(8462, '', '', '', 0, 0, 0),
(8464, '', '', '', 0, 0, 0),
(8465, '', '', '', 0, 0, 0),
(8466, '', '', '', 0, 0, 0),
(8468, '', '', '', 0, 0, 0),
(8469, '', '', '', 0, 0, 0),
(8470, '', '', '', 0, 0, 0),
(8472, '', '', '', 0, 0, 0),
(8473, '', '', '', 0, 0, 0),
(8474, '', '', '', 0, 0, 0),
(8476, '', '', '', 0, 0, 0),
(8477, '', '', '', 0, 0, 0),
(8478, '', '', '', 0, 0, 0),
(8480, '', '', '', 0, 0, 0),
(8481, '', '', '', 0, 0, 0),
(8482, '', '', '', 0, 0, 0),
(8484, '', '', '', 0, 0, 0),
(8485, '', '', '', 0, 0, 0),
(8486, '', '', '', 0, 0, 0),
(8488, '', '', '', 0, 0, 0),
(8489, '', '', '', 0, 0, 0),
(8490, '', '', '', 0, 0, 0),
(8492, '', '', '', 0, 0, 0),
(8493, '', '', '', 0, 0, 0),
(8494, '', '', '', 0, 0, 0),
(8496, '', '', '', 0, 0, 0),
(8497, '', '', '', 0, 0, 0),
(8498, '', '', '', 0, 0, 0),
(8500, '', '', '', 0, 0, 0),
(8501, '', '', '', 0, 0, 0),
(8502, '', '', '', 0, 0, 0),
(8504, '', '', '', 0, 0, 0),
(8505, '', '', '', 0, 0, 0),
(8506, '', '', '', 0, 0, 0),
(8508, '', '', '', 0, 0, 0),
(8509, '', '', '', 0, 0, 0),
(8510, '', '', '', 0, 0, 0),
(8512, '', '', '', 0, 0, 0),
(8513, '', '', '', 0, 0, 0),
(8514, '', '', '', 0, 0, 0),
(8516, '', '', '', 0, 0, 0),
(8517, '', '', '', 0, 0, 0),
(8518, '', '', '', 0, 0, 0),
(8520, '', '', '', 0, 0, 0),
(8521, '', '', '', 0, 0, 0),
(8522, '', '', '', 0, 0, 0),
(8524, '', '', '', 0, 0, 0),
(8525, '', '', '', 0, 0, 0),
(8526, '', '', '', 0, 0, 0),
(8528, '', '', '', 0, 0, 0),
(8529, '', '', '', 0, 0, 0),
(8530, '', '', '', 0, 0, 0),
(8532, '', '', '', 0, 0, 0),
(8533, '', '', '', 0, 0, 0),
(8534, '', '', '', 0, 0, 0),
(8536, '', '', '', 0, 0, 0),
(8537, '', '', '', 0, 0, 0),
(8538, '', '', '', 0, 0, 0),
(8540, '', '', '', 0, 0, 0),
(8541, '', '', '', 0, 0, 0),
(8542, '', '', '', 0, 0, 0),
(8544, '', '', '', 0, 0, 0),
(8545, '', '', '', 0, 0, 0),
(8546, '', '', '', 0, 0, 0),
(8548, '', '', '', 0, 0, 0),
(8549, '', '', '', 0, 0, 0),
(8550, '', '', '', 0, 0, 0),
(8552, '', '', '', 0, 0, 0),
(8553, '', '', '', 0, 0, 0),
(8554, '', '', '', 0, 0, 0),
(8556, '', '', '', 0, 0, 0),
(8557, '', '', '', 0, 0, 0),
(8558, '', '', '', 0, 0, 0),
(8560, '', '', '', 0, 0, 0),
(8561, '', '', '', 0, 0, 0),
(8562, '', '', '', 0, 0, 0),
(8564, '', '', '', 0, 0, 0),
(8565, '', '', '', 0, 0, 0),
(8566, '', '', '', 0, 0, 0),
(8568, '', '', '', 0, 0, 0),
(8569, '', '', '', 0, 0, 0),
(8570, '', '', '', 0, 0, 0),
(8572, '', '', '', 0, 0, 0),
(8573, '', '', '', 0, 0, 0),
(8574, '', '', '', 0, 0, 0),
(8576, '', '', '', 0, 0, 0),
(8577, '', '', '', 0, 0, 0),
(8578, '', '', '', 0, 0, 0),
(8580, '', '', '', 0, 0, 0),
(8581, '', '', '', 0, 0, 0),
(8582, '', '', '', 0, 0, 0),
(8584, '', '', '', 0, 0, 0),
(8585, '', '', '', 0, 0, 0),
(8586, '', '', '', 0, 0, 0),
(8588, '', '', '', 0, 0, 0),
(8589, '', '', '', 0, 0, 0),
(8590, '', '', '', 0, 0, 0),
(8592, '', '', '', 0, 0, 0),
(8593, '', '', '', 0, 0, 0),
(8594, '', '', '', 0, 0, 0),
(8596, '', '', '', 0, 0, 0),
(8597, '', '', '', 0, 0, 0),
(8598, '', '', '', 0, 0, 0),
(8600, '', '', '', 0, 0, 0),
(8601, '', '', '', 0, 0, 0),
(8602, '', '', '', 0, 0, 0),
(8604, '', '', '', 0, 0, 0),
(8605, '', '', '', 0, 0, 0),
(8606, '', '', '', 0, 0, 0),
(8608, '', '', '', 0, 0, 0),
(8609, '', '', '', 0, 0, 0),
(8610, '', '', '', 0, 0, 0),
(8612, '', '', '', 0, 0, 0),
(8613, '', '', '', 0, 0, 0),
(8614, '', '', '', 0, 0, 0),
(8616, '', '', '', 0, 0, 0),
(8617, '', '', '', 0, 0, 0),
(8618, '', '', '', 0, 0, 0),
(8620, '', '', '', 0, 0, 0),
(8621, '', '', '', 0, 0, 0),
(8622, '', '', '', 0, 0, 0),
(8624, '', '', '', 0, 0, 0),
(8625, '', '', '', 0, 0, 0),
(8626, '', '', '', 0, 0, 0),
(8628, '', '', '', 0, 0, 0),
(8629, '', '', '', 0, 0, 0),
(8630, '', '', '', 0, 0, 0),
(8632, '', '', '', 0, 0, 0),
(8633, '', '', '', 0, 0, 0),
(8634, '', '', '', 0, 0, 0),
(8636, '', '', '', 0, 0, 0),
(8637, '', '', '', 0, 0, 0),
(8638, '', '', '', 0, 0, 0),
(8640, '', '', '', 0, 0, 0),
(8641, '', '', '', 0, 0, 0),
(8642, '', '', '', 0, 0, 0),
(8644, '', '', '', 0, 0, 0),
(8645, '', '', '', 0, 0, 0),
(8646, '', '', '', 0, 0, 0),
(8648, '', '', '', 0, 0, 0),
(8649, '', '', '', 0, 0, 0),
(8650, '', '', '', 0, 0, 0),
(8652, '', '', '', 0, 0, 0),
(8653, '', '', '', 0, 0, 0),
(8654, '', '', '', 0, 0, 0),
(8656, '', '', '', 0, 0, 0),
(8657, '', '', '', 0, 0, 0),
(8658, '', '', '', 0, 0, 0),
(8660, '', '', '', 0, 0, 0),
(8661, '', '', '', 0, 0, 0),
(8662, '', '', '', 0, 0, 0),
(8664, '', '', '', 0, 0, 0),
(8665, '', '', '', 0, 0, 0),
(8666, '', '', '', 0, 0, 0),
(8668, '', '', '', 0, 0, 0),
(8669, '', '', '', 0, 0, 0),
(8670, '', '', '', 0, 0, 0),
(8672, '', '', '', 0, 0, 0),
(8673, '', '', '', 0, 0, 0),
(8674, '', '', '', 0, 0, 0),
(8676, '', '', '', 0, 0, 0),
(8677, '', '', '', 0, 0, 0),
(8678, '', '', '', 0, 0, 0),
(8680, '', '', '', 0, 0, 0),
(8681, '', '', '', 0, 0, 0),
(8682, '', '', '', 0, 0, 0),
(8684, '', '', '', 0, 0, 0),
(8685, '', '', '', 0, 0, 0),
(8686, '', '', '', 0, 0, 0),
(8688, '', '', '', 0, 0, 0),
(8689, '', '', '', 0, 0, 0),
(8690, '', '', '', 0, 0, 0),
(8692, '', '', '', 0, 0, 0),
(8693, '', '', '', 0, 0, 0),
(8694, '', '', '', 0, 0, 0),
(8696, '', '', '', 0, 0, 0),
(8697, '', '', '', 0, 0, 0),
(8698, '', '', '', 0, 0, 0),
(8700, '', '', '', 0, 0, 0),
(8701, '', '', '', 0, 0, 0),
(8702, '', '', '', 0, 0, 0),
(8704, '', '', '', 0, 0, 0),
(8705, '', '', '', 0, 0, 0),
(8706, '', '', '', 0, 0, 0),
(8708, '', '', '', 0, 0, 0),
(8709, '', '', '', 0, 0, 0),
(8710, '', '', '', 0, 0, 0),
(8712, '', '', '', 0, 0, 0),
(8713, '', '', '', 0, 0, 0),
(8714, '', '', '', 0, 0, 0),
(8716, '', '', '', 0, 0, 0),
(8717, '', '', '', 0, 0, 0),
(8718, '', '', '', 0, 0, 0),
(8720, '', '', '', 0, 0, 0),
(8721, '', '', '', 0, 0, 0),
(8722, '', '', '', 0, 0, 0),
(8724, '', '', '', 0, 0, 0),
(8725, '', '', '', 0, 0, 0),
(8726, '', '', '', 0, 0, 0),
(8728, '', '', '', 0, 0, 0),
(8729, '', '', '', 0, 0, 0),
(8730, '', '', '', 0, 0, 0),
(8732, '', '', '', 0, 0, 0),
(8733, '', '', '', 0, 0, 0),
(8734, '', '', '', 0, 0, 0),
(8736, '', '', '', 0, 0, 0),
(8737, '', '', '', 0, 0, 0),
(8738, '', '', '', 0, 0, 0),
(8740, '', '', '', 0, 0, 0),
(8741, '', '', '', 0, 0, 0),
(8742, '', '', '', 0, 0, 0),
(8744, '', '', '', 0, 0, 0),
(8745, '', '', '', 0, 0, 0),
(8746, '', '', '', 0, 0, 0),
(8748, '', '', '', 0, 0, 0),
(8749, '', '', '', 0, 0, 0),
(8750, '', '', '', 0, 0, 0),
(8752, '', '', '', 0, 0, 0),
(8753, '', '', '', 0, 0, 0),
(8754, '', '', '', 0, 0, 0),
(8756, '', '', '', 0, 0, 0),
(8757, '', '', '', 0, 0, 0),
(8758, '', '', '', 0, 0, 0),
(8760, '', '', '', 0, 0, 0),
(8761, '', '', '', 0, 0, 0),
(8762, '', '', '', 0, 0, 0),
(8764, '', '', '', 0, 0, 0),
(8765, '', '', '', 0, 0, 0),
(8766, '', '', '', 0, 0, 0),
(8768, '', '', '', 0, 0, 0),
(8769, '', '', '', 0, 0, 0),
(8770, '', '', '', 0, 0, 0),
(8772, '', '', '', 0, 0, 0),
(8773, '', '', '', 0, 0, 0),
(8774, '', '', '', 0, 0, 0),
(8776, '', '', '', 0, 0, 0),
(8777, '', '', '', 0, 0, 0),
(8778, '', '', '', 0, 0, 0),
(8780, '', '', '', 0, 0, 0),
(8781, '', '', '', 0, 0, 0),
(8782, '', '', '', 0, 0, 0),
(8784, '', '', '', 0, 0, 0),
(8785, '', '', '', 0, 0, 0),
(8786, '', '', '', 0, 0, 0),
(8788, '', '', '', 0, 0, 0),
(8789, '', '', '', 0, 0, 0),
(8790, '', '', '', 0, 0, 0),
(8792, '', '', '', 0, 0, 0),
(8793, '', '', '', 0, 0, 0),
(8794, '', '', '', 0, 0, 0),
(8796, '', '', '', 0, 0, 0),
(8797, '', '', '', 0, 0, 0),
(8798, '', '', '', 0, 0, 0),
(8800, '', '', '', 0, 0, 0),
(8801, '', '', '', 0, 0, 0),
(8802, '', '', '', 0, 0, 0),
(8804, '', '', '', 0, 0, 0),
(8805, '', '', '', 0, 0, 0),
(8806, '', '', '', 0, 0, 0),
(8808, '', '', '', 0, 0, 0),
(8809, '', '', '', 0, 0, 0),
(8810, '', '', '', 0, 0, 0),
(8812, '', '', '', 0, 0, 0),
(8813, '', '', '', 0, 0, 0),
(8814, '', '', '', 0, 0, 0),
(8816, '', '', '', 0, 0, 0),
(8817, '', '', '', 0, 0, 0),
(8818, '', '', '', 0, 0, 0),
(8820, '', '', '', 0, 0, 0),
(8821, '', '', '', 0, 0, 0),
(8822, '', '', '', 0, 0, 0),
(8824, '', '', '', 0, 0, 0),
(8825, '', '', '', 0, 0, 0),
(8826, '', '', '', 0, 0, 0),
(8828, '', '', '', 0, 0, 0),
(8829, '', '', '', 0, 0, 0),
(8830, '', '', '', 0, 0, 0),
(8832, '', '', '', 0, 0, 0),
(8833, '', '', '', 0, 0, 0),
(8834, '', '', '', 0, 0, 0),
(8836, '', '', '', 0, 0, 0),
(8837, '', '', '', 0, 0, 0),
(8838, '', '', '', 0, 0, 0),
(8840, '', '', '', 0, 0, 0),
(8841, '', '', '', 0, 0, 0),
(8842, '', '', '', 0, 0, 0),
(8844, '', '', '', 0, 0, 0),
(8845, '', '', '', 0, 0, 0),
(8846, '', '', '', 0, 0, 0),
(8848, '', '', '', 0, 0, 0),
(8849, '', '', '', 0, 0, 0),
(8850, '', '', '', 0, 0, 0),
(8852, '', '', '', 0, 0, 0),
(8853, '', '', '', 0, 0, 0),
(8854, '', '', '', 0, 0, 0),
(8856, '', '', '', 0, 0, 0),
(8857, '', '', '', 0, 0, 0),
(8858, '', '', '', 0, 0, 0),
(8860, '', '', '', 0, 0, 0),
(8861, '', '', '', 0, 0, 0),
(8862, '', '', '', 0, 0, 0),
(8864, '', '', '', 0, 0, 0),
(8865, '', '', '', 0, 0, 0),
(8866, '', '', '', 0, 0, 0),
(8868, '', '', '', 0, 0, 0),
(8869, '', '', '', 0, 0, 0),
(8870, '', '', '', 0, 0, 0),
(8872, '', '', '', 0, 0, 0),
(8873, '', '', '', 0, 0, 0),
(8874, '', '', '', 0, 0, 0),
(8876, '', '', '', 0, 0, 0),
(8877, '', '', '', 0, 0, 0),
(8878, '', '', '', 0, 0, 0),
(8880, '', '', '', 0, 0, 0),
(8881, '', '', '', 0, 0, 0),
(8882, '', '', '', 0, 0, 0),
(8884, '', '', '', 0, 0, 0),
(8885, '', '', '', 0, 0, 0),
(8886, '', '', '', 0, 0, 0),
(8888, '', '', '', 0, 0, 0),
(8889, '', '', '', 0, 0, 0),
(8890, '', '', '', 0, 0, 0),
(8892, '', '', '', 0, 0, 0),
(8893, '', '', '', 0, 0, 0),
(8894, '', '', '', 0, 0, 0),
(8896, '', '', '', 0, 0, 0),
(8897, '', '', '', 0, 0, 0),
(8898, '', '', '', 0, 0, 0),
(8900, '', '', '', 0, 0, 0),
(8901, '', '', '', 0, 0, 0),
(8902, '', '', '', 0, 0, 0),
(8904, '', '', '', 0, 0, 0),
(8905, '', '', '', 0, 0, 0),
(8906, '', '', '', 0, 0, 0),
(8908, '', '', '', 0, 0, 0),
(8909, '', '', '', 0, 0, 0),
(8910, '', '', '', 0, 0, 0),
(8912, '', '', '', 0, 0, 0),
(8913, '', '', '', 0, 0, 0),
(8914, '', '', '', 0, 0, 0),
(8916, '', '', '', 0, 0, 0),
(8917, '', '', '', 0, 0, 0),
(8918, '', '', '', 0, 0, 0),
(8920, '', '', '', 0, 0, 0),
(8921, '', '', '', 0, 0, 0),
(8922, '', '', '', 0, 0, 0),
(8924, '', '', '', 0, 0, 0),
(8925, '', '', '', 0, 0, 0),
(8926, '', '', '', 0, 0, 0),
(8928, '', '', '', 0, 0, 0),
(8929, '', '', '', 0, 0, 0),
(8930, '', '', '', 0, 0, 0),
(8932, '', '', '', 0, 0, 0),
(8933, '', '', '', 0, 0, 0),
(8934, '', '', '', 0, 0, 0),
(8936, '', '', '', 0, 0, 0),
(8937, '', '', '', 0, 0, 0),
(8938, '', '', '', 0, 0, 0),
(8940, '', '', '', 0, 0, 0),
(8941, '', '', '', 0, 0, 0),
(8942, '', '', '', 0, 0, 0),
(8944, '', '', '', 0, 0, 0),
(8945, '', '', '', 0, 0, 0),
(8946, '', '', '', 0, 0, 0),
(8948, '', '', '', 0, 0, 0),
(8949, '', '', '', 0, 0, 0),
(8950, '', '', '', 0, 0, 0),
(8952, '', '', '', 0, 0, 0),
(8953, '', '', '', 0, 0, 0),
(8954, '', '', '', 0, 0, 0),
(8956, '', '', '', 0, 0, 0),
(8957, '', '', '', 0, 0, 0),
(8958, '', '', '', 0, 0, 0),
(8960, '', '', '', 0, 0, 0),
(8961, '', '', '', 0, 0, 0),
(8962, '', '', '', 0, 0, 0),
(8964, '', '', '', 0, 0, 0),
(8965, '', '', '', 0, 0, 0),
(8966, '', '', '', 0, 0, 0),
(8968, '', '', '', 0, 0, 0),
(8969, '', '', '', 0, 0, 0),
(8970, '', '', '', 0, 0, 0),
(8972, '', '', '', 0, 0, 0),
(8973, '', '', '', 0, 0, 0),
(8974, '', '', '', 0, 0, 0),
(8976, '', '', '', 0, 0, 0),
(8977, '', '', '', 0, 0, 0),
(8978, '', '', '', 0, 0, 0),
(8980, '', '', '', 0, 0, 0),
(8981, '', '', '', 0, 0, 0),
(8982, '', '', '', 0, 0, 0),
(8984, '', '', '', 0, 0, 0),
(8985, '', '', '', 0, 0, 0),
(8986, '', '', '', 0, 0, 0),
(8988, '', '', '', 0, 0, 0),
(8989, '', '', '', 0, 0, 0),
(8990, '', '', '', 0, 0, 0),
(8992, '', '', '', 0, 0, 0),
(8993, '', '', '', 0, 0, 0),
(8994, '', '', '', 0, 0, 0),
(8996, '', '', '', 0, 0, 0),
(8997, '', '', '', 0, 0, 0),
(8998, '', '', '', 0, 0, 0),
(9000, '', '', '', 0, 0, 0),
(9001, '', '', '', 0, 0, 0),
(9002, '', '', '', 0, 0, 0),
(9004, '', '', '', 0, 0, 0),
(9005, '', '', '', 0, 0, 0),
(9006, '', '', '', 0, 0, 0),
(9008, '', '', '', 0, 0, 0),
(9009, '', '', '', 0, 0, 0),
(9010, '', '', '', 0, 0, 0),
(9012, '', '', '', 0, 0, 0),
(9013, '', '', '', 0, 0, 0),
(9014, '', '', '', 0, 0, 0),
(9016, '', '', '', 0, 0, 0),
(9017, '', '', '', 0, 0, 0),
(9018, '', '', '', 0, 0, 0),
(9020, '', '', '', 0, 0, 0),
(9021, '', '', '', 0, 0, 0),
(9022, '', '', '', 0, 0, 0),
(9024, '', '', '', 0, 0, 0),
(9025, '', '', '', 0, 0, 0),
(9026, '', '', '', 0, 0, 0),
(9028, '', '', '', 0, 0, 0),
(9029, '', '', '', 0, 0, 0),
(9030, '', '', '', 0, 0, 0),
(9032, '', '', '', 0, 0, 0),
(9033, '', '', '', 0, 0, 0),
(9034, '', '', '', 0, 0, 0),
(9036, '', '', '', 0, 0, 0),
(9037, '', '', '', 0, 0, 0),
(9038, '', '', '', 0, 0, 0),
(9040, '', '', '', 0, 0, 0),
(9041, '', '', '', 0, 0, 0),
(9042, '', '', '', 0, 0, 0),
(9044, '', '', '', 0, 0, 0),
(9045, '', '', '', 0, 0, 0),
(9046, '', '', '', 0, 0, 0),
(9048, '', '', '', 0, 0, 0),
(9049, '', '', '', 0, 0, 0),
(9050, '', '', '', 0, 0, 0),
(9052, '', '', '', 0, 0, 0),
(9053, '', '', '', 0, 0, 0),
(9054, '', '', '', 0, 0, 0),
(9056, '', '', '', 0, 0, 0),
(9057, '', '', '', 0, 0, 0),
(9058, '', '', '', 0, 0, 0),
(9060, '', '', '', 0, 0, 0),
(9061, '', '', '', 0, 0, 0),
(9062, '', '', '', 0, 0, 0),
(9064, '', '', '', 0, 0, 0),
(9065, '', '', '', 0, 0, 0),
(9066, '', '', '', 0, 0, 0),
(9068, '', '', '', 0, 0, 0),
(9069, '', '', '', 0, 0, 0),
(9070, '', '', '', 0, 0, 0),
(9072, '', '', '', 0, 0, 0),
(9073, '', '', '', 0, 0, 0),
(9074, '', '', '', 0, 0, 0),
(9076, '', '', '', 0, 0, 0),
(9077, '', '', '', 0, 0, 0),
(9078, '', '', '', 0, 0, 0),
(9080, '', '', '', 0, 0, 0),
(9081, '', '', '', 0, 0, 0),
(9082, '', '', '', 0, 0, 0),
(9084, '', '', '', 0, 0, 0),
(9085, '', '', '', 0, 0, 0),
(9086, '', '', '', 0, 0, 0),
(9088, '', '', '', 0, 0, 0),
(9089, '', '', '', 0, 0, 0),
(9090, '', '', '', 0, 0, 0),
(9092, '', '', '', 0, 0, 0),
(9093, '', '', '', 0, 0, 0),
(9094, '', '', '', 0, 0, 0),
(9096, '', '', '', 0, 0, 0),
(9097, '', '', '', 0, 0, 0),
(9098, '', '', '', 0, 0, 0),
(9100, '', '', '', 0, 0, 0),
(9101, '', '', '', 0, 0, 0),
(9102, '', '', '', 0, 0, 0),
(9104, '', '', '', 0, 0, 0),
(9105, '', '', '', 0, 0, 0),
(9106, '', '', '', 0, 0, 0),
(9108, '', '', '', 0, 0, 0),
(9109, '', '', '', 0, 0, 0),
(9110, '', '', '', 0, 0, 0),
(9112, '', '', '', 0, 0, 0),
(9113, '', '', '', 0, 0, 0),
(9114, '', '', '', 0, 0, 0),
(9116, '', '', '', 0, 0, 0),
(9117, '', '', '', 0, 0, 0),
(9118, '', '', '', 0, 0, 0),
(9120, '', '', '', 0, 0, 0),
(9121, '', '', '', 0, 0, 0),
(9122, '', '', '', 0, 0, 0),
(9124, '', '', '', 0, 0, 0),
(9125, '', '', '', 0, 0, 0),
(9126, '', '', '', 0, 0, 0),
(9128, '', '', '', 0, 0, 0),
(9129, '', '', '', 0, 0, 0),
(9130, '', '', '', 0, 0, 0),
(9132, '', '', '', 0, 0, 0),
(9133, '', '', '', 0, 0, 0),
(9134, '', '', '', 0, 0, 0),
(9136, '', '', '', 0, 0, 0),
(9137, '', '', '', 0, 0, 0),
(9138, '', '', '', 0, 0, 0),
(9140, '', '', '', 0, 0, 0),
(9141, '', '', '', 0, 0, 0),
(9142, '', '', '', 0, 0, 0),
(9144, '', '', '', 0, 0, 0),
(9145, '', '', '', 0, 0, 0),
(9146, '', '', '', 0, 0, 0),
(9148, '', '', '', 0, 0, 0),
(9149, '', '', '', 0, 0, 0),
(9150, '', '', '', 0, 0, 0),
(9152, '', '', '', 0, 0, 0),
(9153, '', '', '', 0, 0, 0),
(9154, '', '', '', 0, 0, 0),
(9156, '', '', '', 0, 0, 0),
(9157, '', '', '', 0, 0, 0),
(9158, '', '', '', 0, 0, 0),
(9160, '', '', '', 0, 0, 0),
(9161, '', '', '', 0, 0, 0),
(9162, '', '', '', 0, 0, 0),
(9164, '', '', '', 0, 0, 0),
(9165, '', '', '', 0, 0, 0),
(9166, '', '', '', 0, 0, 0),
(9168, '', '', '', 0, 0, 0),
(9169, '', '', '', 0, 0, 0),
(9170, '', '', '', 0, 0, 0),
(9172, '', '', '', 0, 0, 0),
(9173, '', '', '', 0, 0, 0),
(9174, '', '', '', 0, 0, 0),
(9176, '', '', '', 0, 0, 0),
(9177, '', '', '', 0, 0, 0),
(9178, '', '', '', 0, 0, 0),
(9180, '', '', '', 0, 0, 0),
(9181, '', '', '', 0, 0, 0),
(9182, '', '', '', 0, 0, 0),
(9184, '', '', '', 0, 0, 0),
(9185, '', '', '', 0, 0, 0),
(9186, '', '', '', 0, 0, 0),
(9188, '', '', '', 0, 0, 0),
(9189, '', '', '', 0, 0, 0),
(9190, '', '', '', 0, 0, 0),
(9192, '', '', '', 0, 0, 0),
(9193, '', '', '', 0, 0, 0),
(9194, '', '', '', 0, 0, 0),
(9196, '', '', '', 0, 0, 0),
(9197, '', '', '', 0, 0, 0),
(9198, '', '', '', 0, 0, 0),
(9200, '', '', '', 0, 0, 0),
(9201, '', '', '', 0, 0, 0),
(9202, '', '', '', 0, 0, 0),
(9204, '', '', '', 0, 0, 0),
(9205, '', '', '', 0, 0, 0),
(9206, '', '', '', 0, 0, 0),
(9208, '', '', '', 0, 0, 0),
(9209, '', '', '', 0, 0, 0),
(9210, '', '', '', 0, 0, 0),
(9212, '', '', '', 0, 0, 0),
(9213, '', '', '', 0, 0, 0),
(9214, '', '', '', 0, 0, 0),
(9216, '', '', '', 0, 0, 0),
(9217, '', '', '', 0, 0, 0),
(9218, '', '', '', 0, 0, 0),
(9220, '', '', '', 0, 0, 0),
(9221, '', '', '', 0, 0, 0),
(9222, '', '', '', 0, 0, 0),
(9224, '', '', '', 0, 0, 0),
(9225, '', '', '', 0, 0, 0),
(9226, '', '', '', 0, 0, 0),
(9228, '', '', '', 0, 0, 0),
(9229, '', '', '', 0, 0, 0),
(9230, '', '', '', 0, 0, 0),
(9232, '', '', '', 0, 0, 0),
(9233, '', '', '', 0, 0, 0),
(9234, '', '', '', 0, 0, 0),
(9236, '', '', '', 0, 0, 0),
(9237, '', '', '', 0, 0, 0),
(9238, '', '', '', 0, 0, 0),
(9240, '', '', '', 0, 0, 0),
(9241, '', '', '', 0, 0, 0),
(9242, '', '', '', 0, 0, 0),
(9244, '', '', '', 0, 0, 0),
(9245, '', '', '', 0, 0, 0),
(9246, '', '', '', 0, 0, 0),
(9248, '', '', '', 0, 0, 0),
(9249, '', '', '', 0, 0, 0),
(9250, '', '', '', 0, 0, 0),
(9252, '', '', '', 0, 0, 0),
(9253, '', '', '', 0, 0, 0),
(9254, '', '', '', 0, 0, 0),
(9256, '', '', '', 0, 0, 0),
(9257, '', '', '', 0, 0, 0),
(9258, '', '', '', 0, 0, 0),
(9260, '', '', '', 0, 0, 0),
(9261, '', '', '', 0, 0, 0),
(9262, '', '', '', 0, 0, 0),
(9264, '', '', '', 0, 0, 0),
(9265, '', '', '', 0, 0, 0),
(9266, '', '', '', 0, 0, 0),
(9268, '', '', '', 0, 0, 0),
(9269, '', '', '', 0, 0, 0),
(9270, '', '', '', 0, 0, 0),
(9272, '', '', '', 0, 0, 0),
(9273, '', '', '', 0, 0, 0),
(9274, '', '', '', 0, 0, 0),
(9276, '', '', '', 0, 0, 0),
(9277, '', '', '', 0, 0, 0),
(9278, '', '', '', 0, 0, 0),
(9280, '', '', '', 0, 0, 0),
(9281, '', '', '', 0, 0, 0),
(9282, '', '', '', 0, 0, 0),
(9284, '', '', '', 0, 0, 0),
(9285, '', '', '', 0, 0, 0),
(9286, '', '', '', 0, 0, 0),
(9288, '', '', '', 0, 0, 0),
(9289, '', '', '', 0, 0, 0),
(9290, '', '', '', 0, 0, 0),
(9292, '', '', '', 0, 0, 0),
(9293, '', '', '', 0, 0, 0),
(9294, '', '', '', 0, 0, 0),
(9296, '', '', '', 0, 0, 0),
(9297, '', '', '', 0, 0, 0),
(9298, '', '', '', 0, 0, 0),
(9300, '', '', '', 0, 0, 0),
(9301, '', '', '', 0, 0, 0),
(9302, '', '', '', 0, 0, 0),
(9304, '', '', '', 0, 0, 0),
(9305, '', '', '', 0, 0, 0),
(9306, '', '', '', 0, 0, 0),
(9308, '', '', '', 0, 0, 0),
(9309, '', '', '', 0, 0, 0),
(9310, '', '', '', 0, 0, 0),
(9312, '', '', '', 0, 0, 0),
(9313, '', '', '', 0, 0, 0),
(9314, '', '', '', 0, 0, 0),
(9316, '', '', '', 0, 0, 0),
(9317, '', '', '', 0, 0, 0),
(9318, '', '', '', 0, 0, 0),
(9320, '', '', '', 0, 0, 0),
(9321, '', '', '', 0, 0, 0),
(9322, '', '', '', 0, 0, 0),
(9324, '', '', '', 0, 0, 0),
(9325, '', '', '', 0, 0, 0),
(9326, '', '', '', 0, 0, 0),
(9328, '', '', '', 0, 0, 0),
(9329, '', '', '', 0, 0, 0),
(9330, '', '', '', 0, 0, 0),
(9332, '', '', '', 0, 0, 0),
(9333, '', '', '', 0, 0, 0),
(9334, '', '', '', 0, 0, 0),
(9336, '', '', '', 0, 0, 0),
(9337, '', '', '', 0, 0, 0),
(9338, '', '', '', 0, 0, 0),
(9340, '', '', '', 0, 0, 0),
(9341, '', '', '', 0, 0, 0),
(9342, '', '', '', 0, 0, 0),
(9344, '', '', '', 0, 0, 0),
(9345, '', '', '', 0, 0, 0),
(9346, '', '', '', 0, 0, 0),
(9348, '', '', '', 0, 0, 0),
(9349, '', '', '', 0, 0, 0),
(9350, '', '', '', 0, 0, 0),
(9352, '', '', '', 0, 0, 0),
(9353, '', '', '', 0, 0, 0),
(9354, '', '', '', 0, 0, 0),
(9356, '', '', '', 0, 0, 0),
(9357, '', '', '', 0, 0, 0),
(9358, '', '', '', 0, 0, 0),
(9360, '', '', '', 0, 0, 0),
(9361, '', '', '', 0, 0, 0),
(9362, '', '', '', 0, 0, 0),
(9364, '', '', '', 0, 0, 0),
(9365, '', '', '', 0, 0, 0),
(9366, '', '', '', 0, 0, 0),
(9368, '', '', '', 0, 0, 0),
(9369, '', '', '', 0, 0, 0),
(9370, '', '', '', 0, 0, 0),
(9372, '', '', '', 0, 0, 0),
(9373, '', '', '', 0, 0, 0),
(9374, '', '', '', 0, 0, 0),
(9376, '', '', '', 0, 0, 0),
(9377, '', '', '', 0, 0, 0),
(9378, '', '', '', 0, 0, 0),
(9380, '', '', '', 0, 0, 0),
(9381, '', '', '', 0, 0, 0),
(9382, '', '', '', 0, 0, 0),
(9384, '', '', '', 0, 0, 0),
(9385, '', '', '', 0, 0, 0),
(9386, '', '', '', 0, 0, 0),
(9388, '', '', '', 0, 0, 0),
(9389, '', '', '', 0, 0, 0),
(9390, '', '', '', 0, 0, 0),
(9392, '', '', '', 0, 0, 0),
(9393, '', '', '', 0, 0, 0),
(9394, '', '', '', 0, 0, 0),
(9396, '', '', '', 0, 0, 0),
(9397, '', '', '', 0, 0, 0),
(9398, '', '', '', 0, 0, 0),
(9400, '', '', '', 0, 0, 0),
(9401, '', '', '', 0, 0, 0),
(9402, '', '', '', 0, 0, 0),
(9404, '', '', '', 0, 0, 0),
(9405, '', '', '', 0, 0, 0),
(9406, '', '', '', 0, 0, 0),
(9408, '', '', '', 0, 0, 0),
(9409, '', '', '', 0, 0, 0),
(9410, '', '', '', 0, 0, 0),
(9412, '', '', '', 0, 0, 0),
(9413, '', '', '', 0, 0, 0),
(9414, '', '', '', 0, 0, 0),
(9416, '', '', '', 0, 0, 0),
(9417, '', '', '', 0, 0, 0),
(9418, '', '', '', 0, 0, 0),
(9420, '', '', '', 0, 0, 0),
(9421, '', '', '', 0, 0, 0),
(9422, '', '', '', 0, 0, 0),
(9424, '', '', '', 0, 0, 0),
(9425, '', '', '', 0, 0, 0),
(9426, '', '', '', 0, 0, 0),
(9428, '', '', '', 0, 0, 0),
(9429, '', '', '', 0, 0, 0),
(9430, '', '', '', 0, 0, 0),
(9432, '', '', '', 0, 0, 0),
(9433, '', '', '', 0, 0, 0),
(9434, '', '', '', 0, 0, 0),
(9436, '', '', '', 0, 0, 0),
(9437, '', '', '', 0, 0, 0),
(9438, '', '', '', 0, 0, 0),
(9440, '', '', '', 0, 0, 0),
(9441, '', '', '', 0, 0, 0),
(9442, '', '', '', 0, 0, 0),
(9444, '', '', '', 0, 0, 0),
(9445, '', '', '', 0, 0, 0),
(9446, '', '', '', 0, 0, 0),
(9448, '', '', '', 0, 0, 0),
(9449, '', '', '', 0, 0, 0),
(9450, '', '', '', 0, 0, 0),
(9452, '', '', '', 0, 0, 0),
(9453, '', '', '', 0, 0, 0),
(9454, '', '', '', 0, 0, 0),
(9456, '', '', '', 0, 0, 0),
(9457, '', '', '', 0, 0, 0),
(9458, '', '', '', 0, 0, 0),
(9460, '', '', '', 0, 0, 0),
(9461, '', '', '', 0, 0, 0),
(9462, '', '', '', 0, 0, 0),
(9464, '', '', '', 0, 0, 0),
(9465, '', '', '', 0, 0, 0),
(9466, '', '', '', 0, 0, 0),
(9468, '', '', '', 0, 0, 0),
(9469, '', '', '', 0, 0, 0),
(9470, '', '', '', 0, 0, 0),
(9472, '', '', '', 0, 0, 0),
(9473, '', '', '', 0, 0, 0),
(9474, '', '', '', 0, 0, 0),
(9476, '', '', '', 0, 0, 0),
(9477, '', '', '', 0, 0, 0),
(9478, '', '', '', 0, 0, 0),
(9480, '', '', '', 0, 0, 0),
(9481, '', '', '', 0, 0, 0),
(9482, '', '', '', 0, 0, 0),
(9484, '', '', '', 0, 0, 0),
(9485, '', '', '', 0, 0, 0),
(9486, '', '', '', 0, 0, 0),
(9488, '', '', '', 0, 0, 0),
(9489, '', '', '', 0, 0, 0),
(9490, '', '', '', 0, 0, 0),
(9492, '', '', '', 0, 0, 0),
(9493, '', '', '', 0, 0, 0),
(9494, '', '', '', 0, 0, 0),
(9496, '', '', '', 0, 0, 0),
(9497, '', '', '', 0, 0, 0),
(9498, '', '', '', 0, 0, 0),
(9500, '', '', '', 0, 0, 0),
(9501, '', '', '', 0, 0, 0),
(9502, '', '', '', 0, 0, 0),
(9504, '', '', '', 0, 0, 0),
(9505, '', '', '', 0, 0, 0),
(9506, '', '', '', 0, 0, 0),
(9508, '', '', '', 0, 0, 0),
(9509, '', '', '', 0, 0, 0),
(9510, '', '', '', 0, 0, 0),
(9512, '', '', '', 0, 0, 0),
(9513, '', '', '', 0, 0, 0),
(9514, '', '', '', 0, 0, 0),
(9516, '', '', '', 0, 0, 0),
(9517, '', '', '', 0, 0, 0),
(9518, '', '', '', 0, 0, 0),
(9520, '', '', '', 0, 0, 0),
(9521, '', '', '', 0, 0, 0),
(9522, '', '', '', 0, 0, 0),
(9524, '', '', '', 0, 0, 0),
(9525, '', '', '', 0, 0, 0),
(9526, '', '', '', 0, 0, 0),
(9528, '', '', '', 0, 0, 0),
(9529, '', '', '', 0, 0, 0),
(9530, '', '', '', 0, 0, 0),
(9532, '', '', '', 0, 0, 0),
(9533, '', '', '', 0, 0, 0),
(9534, '', '', '', 0, 0, 0),
(9536, '', '', '', 0, 0, 0),
(9537, '', '', '', 0, 0, 0),
(9538, '', '', '', 0, 0, 0),
(9540, '', '', '', 0, 0, 0),
(9541, '', '', '', 0, 0, 0),
(9542, '', '', '', 0, 0, 0),
(9544, '', '', '', 0, 0, 0),
(9545, '', '', '', 0, 0, 0),
(9546, '', '', '', 0, 0, 0),
(9548, '', '', '', 0, 0, 0),
(9549, '', '', '', 0, 0, 0),
(9550, '', '', '', 0, 0, 0),
(9552, '', '', '', 0, 0, 0),
(9553, '', '', '', 0, 0, 0),
(9554, '', '', '', 0, 0, 0),
(9556, '', '', '', 0, 0, 0),
(9557, '', '', '', 0, 0, 0),
(9558, '', '', '', 0, 0, 0),
(9560, '', '', '', 0, 0, 0),
(9561, '', '', '', 0, 0, 0),
(9562, '', '', '', 0, 0, 0),
(9564, '', '', '', 0, 0, 0),
(9565, '', '', '', 0, 0, 0),
(9566, '', '', '', 0, 0, 0),
(9568, '', '', '', 0, 0, 0),
(9569, '', '', '', 0, 0, 0),
(9570, '', '', '', 0, 0, 0),
(9572, '', '', '', 0, 0, 0),
(9573, '', '', '', 0, 0, 0),
(9574, '', '', '', 0, 0, 0),
(9576, '', '', '', 0, 0, 0),
(9577, '', '', '', 0, 0, 0),
(9578, '', '', '', 0, 0, 0),
(9580, '', '', '', 0, 0, 0),
(9581, '', '', '', 0, 0, 0),
(9582, '', '', '', 0, 0, 0),
(9584, '', '', '', 0, 0, 0),
(9585, '', '', '', 0, 0, 0),
(9586, '', '', '', 0, 0, 0),
(9588, '', '', '', 0, 0, 0),
(9589, '', '', '', 0, 0, 0),
(9590, '', '', '', 0, 0, 0),
(9592, '', '', '', 0, 0, 0),
(9593, '', '', '', 0, 0, 0),
(9594, '', '', '', 0, 0, 0),
(9596, '', '', '', 0, 0, 0),
(9597, '', '', '', 0, 0, 0),
(9598, '', '', '', 0, 0, 0),
(9600, '', '', '', 0, 0, 0),
(9601, '', '', '', 0, 0, 0),
(9602, '', '', '', 0, 0, 0),
(9604, '', '', '', 0, 0, 0),
(9605, '', '', '', 0, 0, 0),
(9606, '', '', '', 0, 0, 0),
(9608, '', '', '', 0, 0, 0),
(9609, '', '', '', 0, 0, 0),
(9610, '', '', '', 0, 0, 0),
(9612, '', '', '', 0, 0, 0),
(9613, '', '', '', 0, 0, 0),
(9614, '', '', '', 0, 0, 0),
(9616, '', '', '', 0, 0, 0),
(9617, '', '', '', 0, 0, 0),
(9618, '', '', '', 0, 0, 0),
(9620, '', '', '', 0, 0, 0),
(9621, '', '', '', 0, 0, 0),
(9622, '', '', '', 0, 0, 0),
(9624, '', '', '', 0, 0, 0),
(9625, '', '', '', 0, 0, 0),
(9626, '', '', '', 0, 0, 0),
(9628, '', '', '', 0, 0, 0),
(9629, '', '', '', 0, 0, 0),
(9630, '', '', '', 0, 0, 0),
(9632, '', '', '', 0, 0, 0),
(9633, '', '', '', 0, 0, 0),
(9634, '', '', '', 0, 0, 0),
(9636, '', '', '', 0, 0, 0),
(9637, '', '', '', 0, 0, 0),
(9638, '', '', '', 0, 0, 0),
(9640, '', '', '', 0, 0, 0),
(9641, '', '', '', 0, 0, 0),
(9642, '', '', '', 0, 0, 0),
(9644, '', '', '', 0, 0, 0),
(9645, '', '', '', 0, 0, 0),
(9646, '', '', '', 0, 0, 0),
(9648, '', '', '', 0, 0, 0),
(9649, '', '', '', 0, 0, 0),
(9650, '', '', '', 0, 0, 0),
(9652, '', '', '', 0, 0, 0),
(9653, '', '', '', 0, 0, 0),
(9654, '', '', '', 0, 0, 0),
(9656, '', '', '', 0, 0, 0),
(9657, '', '', '', 0, 0, 0),
(9658, '', '', '', 0, 0, 0),
(9660, '', '', '', 0, 0, 0),
(9661, '', '', '', 0, 0, 0),
(9662, '', '', '', 0, 0, 0),
(9664, '', '', '', 0, 0, 0),
(9665, '', '', '', 0, 0, 0),
(9666, '', '', '', 0, 0, 0),
(9668, '', '', '', 0, 0, 0),
(9669, '', '', '', 0, 0, 0),
(9670, '', '', '', 0, 0, 0),
(9672, '', '', '', 0, 0, 0),
(9673, '', '', '', 0, 0, 0),
(9674, '', '', '', 0, 0, 0),
(9676, '', '', '', 0, 0, 0),
(9677, '', '', '', 0, 0, 0),
(9678, '', '', '', 0, 0, 0),
(9680, '', '', '', 0, 0, 0),
(9681, '', '', '', 0, 0, 0),
(9682, '', '', '', 0, 0, 0),
(9684, '', '', '', 0, 0, 0),
(9685, '', '', '', 0, 0, 0),
(9686, '', '', '', 0, 0, 0),
(9688, '', '', '', 0, 0, 0),
(9689, '', '', '', 0, 0, 0),
(9690, '', '', '', 0, 0, 0),
(9692, '', '', '', 0, 0, 0),
(9693, '', '', '', 0, 0, 0),
(9694, '', '', '', 0, 0, 0),
(9696, '', '', '', 0, 0, 0),
(9697, '', '', '', 0, 0, 0),
(9698, '', '', '', 0, 0, 0),
(9700, '', '', '', 0, 0, 0),
(9701, '', '', '', 0, 0, 0),
(9702, '', '', '', 0, 0, 0),
(9704, '', '', '', 0, 0, 0),
(9705, '', '', '', 0, 0, 0),
(9706, '', '', '', 0, 0, 0),
(9708, '', '', '', 0, 0, 0),
(9709, '', '', '', 0, 0, 0),
(9710, '', '', '', 0, 0, 0),
(9712, '', '', '', 0, 0, 0),
(9713, '', '', '', 0, 0, 0),
(9714, '', '', '', 0, 0, 0),
(9716, '', '', '', 0, 0, 0),
(9717, '', '', '', 0, 0, 0),
(9718, '', '', '', 0, 0, 0),
(9720, '', '', '', 0, 0, 0),
(9721, '', '', '', 0, 0, 0),
(9722, '', '', '', 0, 0, 0),
(9724, '', '', '', 0, 0, 0),
(9725, '', '', '', 0, 0, 0),
(9726, '', '', '', 0, 0, 0),
(9728, '', '', '', 0, 0, 0),
(9729, '', '', '', 0, 0, 0),
(9730, '', '', '', 0, 0, 0),
(9732, '', '', '', 0, 0, 0),
(9733, '', '', '', 0, 0, 0),
(9734, '', '', '', 0, 0, 0),
(9736, '', '', '', 0, 0, 0),
(9737, '', '', '', 0, 0, 0),
(9738, '', '', '', 0, 0, 0),
(9740, '', '', '', 0, 0, 0),
(9741, '', '', '', 0, 0, 0),
(9742, '', '', '', 0, 0, 0),
(9744, '', '', '', 0, 0, 0),
(9745, '', '', '', 0, 0, 0),
(9746, '', '', '', 0, 0, 0),
(9748, '', '', '', 0, 0, 0),
(9749, '', '', '', 0, 0, 0),
(9750, '', '', '', 0, 0, 0),
(9752, '', '', '', 0, 0, 0),
(9753, '', '', '', 0, 0, 0),
(9754, '', '', '', 0, 0, 0),
(9756, '', '', '', 0, 0, 0),
(9757, '', '', '', 0, 0, 0),
(9758, '', '', '', 0, 0, 0),
(9760, '', '', '', 0, 0, 0),
(9761, '', '', '', 0, 0, 0),
(9762, '', '', '', 0, 0, 0),
(9764, '', '', '', 0, 0, 0),
(9765, '', '', '', 0, 0, 0),
(9766, '', '', '', 0, 0, 0),
(9768, '', '', '', 0, 0, 0),
(9769, '', '', '', 0, 0, 0),
(9770, '', '', '', 0, 0, 0),
(9772, '', '', '', 0, 0, 0),
(9773, '', '', '', 0, 0, 0),
(9774, '', '', '', 0, 0, 0),
(9776, '', '', '', 0, 0, 0),
(9777, '', '', '', 0, 0, 0),
(9778, '', '', '', 0, 0, 0),
(9780, '', '', '', 0, 0, 0),
(9781, '', '', '', 0, 0, 0),
(9782, '', '', '', 0, 0, 0),
(9784, '', '', '', 0, 0, 0),
(9785, '', '', '', 0, 0, 0),
(9786, '', '', '', 0, 0, 0),
(9788, '', '', '', 0, 0, 0),
(9789, '', '', '', 0, 0, 0),
(9790, '', '', '', 0, 0, 0),
(9792, '', '', '', 0, 0, 0),
(9793, '', '', '', 0, 0, 0),
(9794, '', '', '', 0, 0, 0),
(9796, '', '', '', 0, 0, 0),
(9797, '', '', '', 0, 0, 0),
(9798, '', '', '', 0, 0, 0),
(9800, '', '', '', 0, 0, 0),
(9801, '', '', '', 0, 0, 0),
(9802, '', '', '', 0, 0, 0),
(9804, '', '', '', 0, 0, 0),
(9805, '', '', '', 0, 0, 0),
(9806, '', '', '', 0, 0, 0),
(9808, '', '', '', 0, 0, 0),
(9809, '', '', '', 0, 0, 0),
(9810, '', '', '', 0, 0, 0),
(9812, '', '', '', 0, 0, 0),
(9813, '', '', '', 0, 0, 0),
(9814, '', '', '', 0, 0, 0),
(9816, '', '', '', 0, 0, 0),
(9817, '', '', '', 0, 0, 0),
(9818, '', '', '', 0, 0, 0),
(9820, '', '', '', 0, 0, 0),
(9821, '', '', '', 0, 0, 0),
(9822, '', '', '', 0, 0, 0),
(9824, '', '', '', 0, 0, 0),
(9825, '', '', '', 0, 0, 0),
(9826, '', '', '', 0, 0, 0),
(9828, '', '', '', 0, 0, 0),
(9829, '', '', '', 0, 0, 0),
(9830, '', '', '', 0, 0, 0),
(9832, '', '', '', 0, 0, 0),
(9833, '', '', '', 0, 0, 0),
(9834, '', '', '', 0, 0, 0),
(9836, '', '', '', 0, 0, 0),
(9837, '', '', '', 0, 0, 0),
(9838, '', '', '', 0, 0, 0),
(9840, '', '', '', 0, 0, 0),
(9841, '', '', '', 0, 0, 0),
(9842, '', '', '', 0, 0, 0),
(9844, '', '', '', 0, 0, 0),
(9845, '', '', '', 0, 0, 0),
(9846, '', '', '', 0, 0, 0),
(9848, '', '', '', 0, 0, 0),
(9849, '', '', '', 0, 0, 0),
(9850, '', '', '', 0, 0, 0),
(9852, '', '', '', 0, 0, 0),
(9853, '', '', '', 0, 0, 0),
(9854, '', '', '', 0, 0, 0),
(9856, '', '', '', 0, 0, 0),
(9857, '', '', '', 0, 0, 0),
(9858, '', '', '', 0, 0, 0),
(9860, '', '', '', 0, 0, 0),
(9861, '', '', '', 0, 0, 0),
(9862, '', '', '', 0, 0, 0),
(9864, '', '', '', 0, 0, 0),
(9865, '', '', '', 0, 0, 0),
(9866, '', '', '', 0, 0, 0),
(9868, '', '', '', 0, 0, 0),
(9869, '', '', '', 0, 0, 0),
(9870, '', '', '', 0, 0, 0),
(9872, '', '', '', 0, 0, 0),
(9873, '', '', '', 0, 0, 0),
(9874, '', '', '', 0, 0, 0),
(9876, '', '', '', 0, 0, 0),
(9877, '', '', '', 0, 0, 0),
(9878, '', '', '', 0, 0, 0),
(9880, '', '', '', 0, 0, 0),
(9881, '', '', '', 0, 0, 0),
(9882, '', '', '', 0, 0, 0),
(9884, '', '', '', 0, 0, 0),
(9885, '', '', '', 0, 0, 0),
(9886, '', '', '', 0, 0, 0),
(9888, '', '', '', 0, 0, 0),
(9889, '', '', '', 0, 0, 0),
(9890, '', '', '', 0, 0, 0),
(9892, '', '', '', 0, 0, 0),
(9893, '', '', '', 0, 0, 0),
(9894, '', '', '', 0, 0, 0),
(9896, '', '', '', 0, 0, 0),
(9897, '', '', '', 0, 0, 0),
(9898, '', '', '', 0, 0, 0),
(9900, '', '', '', 0, 0, 0),
(9901, '', '', '', 0, 0, 0),
(9902, '', '', '', 0, 0, 0),
(9904, '', '', '', 0, 0, 0),
(9905, '', '', '', 0, 0, 0),
(9906, '', '', '', 0, 0, 0),
(9908, '', '', '', 0, 0, 0),
(9909, '', '', '', 0, 0, 0),
(9910, '', '', '', 0, 0, 0),
(9912, '', '', '', 0, 0, 0),
(9913, '', '', '', 0, 0, 0),
(9914, '', '', '', 0, 0, 0),
(9916, '', '', '', 0, 0, 0),
(9917, '', '', '', 0, 0, 0),
(9918, '', '', '', 0, 0, 0),
(9920, '', '', '', 0, 0, 0),
(9921, '', '', '', 0, 0, 0),
(9922, '', '', '', 0, 0, 0),
(9924, '', '', '', 0, 0, 0),
(9925, '', '', '', 0, 0, 0),
(9926, '', '', '', 0, 0, 0),
(9928, '', '', '', 0, 0, 0),
(9929, '', '', '', 0, 0, 0),
(9930, '', '', '', 0, 0, 0),
(9932, '', '', '', 0, 0, 0),
(9933, '', '', '', 0, 0, 0),
(9934, '', '', '', 0, 0, 0),
(9936, '', '', '', 0, 0, 0),
(9937, '', '', '', 0, 0, 0),
(9938, '', '', '', 0, 0, 0),
(9940, '', '', '', 0, 0, 0),
(9941, '', '', '', 0, 0, 0),
(9942, '', '', '', 0, 0, 0),
(9944, '', '', '', 0, 0, 0),
(9945, '', '', '', 0, 0, 0),
(9946, '', '', '', 0, 0, 0),
(9948, '', '', '', 0, 0, 0),
(9949, '', '', '', 0, 0, 0),
(9950, '', '', '', 0, 0, 0),
(9952, '', '', '', 0, 0, 0),
(9953, '', '', '', 0, 0, 0),
(9954, '', '', '', 0, 0, 0),
(9956, '', '', '', 0, 0, 0),
(9957, '', '', '', 0, 0, 0),
(9958, '', '', '', 0, 0, 0),
(9960, '', '', '', 0, 0, 0),
(9961, '', '', '', 0, 0, 0),
(9962, '', '', '', 0, 0, 0),
(9964, '', '', '', 0, 0, 0),
(9965, '', '', '', 0, 0, 0),
(9966, '', '', '', 0, 0, 0),
(9968, '', '', '', 0, 0, 0),
(9969, '', '', '', 0, 0, 0),
(9970, '', '', '', 0, 0, 0),
(9972, '', '', '', 0, 0, 0),
(9973, '', '', '', 0, 0, 0),
(9974, '', '', '', 0, 0, 0),
(9976, '', '', '', 0, 0, 0),
(9977, '', '', '', 0, 0, 0),
(9978, '', '', '', 0, 0, 0),
(9980, '', '', '', 0, 0, 0),
(9981, '', '', '', 0, 0, 0),
(9982, '', '', '', 0, 0, 0),
(9984, '', '', '', 0, 0, 0),
(9985, '', '', '', 0, 0, 0),
(9986, '', '', '', 0, 0, 0),
(9988, '', '', '', 0, 0, 0),
(9989, '', '', '', 0, 0, 0),
(9990, '', '', '', 0, 0, 0),
(9992, '', '', '', 0, 0, 0),
(9993, '', '', '', 0, 0, 0),
(9994, '', '', '', 0, 0, 0),
(9996, '', '', '', 0, 0, 0),
(9997, '', '', '', 0, 0, 0),
(9998, '', '', '', 0, 0, 0),
(10000, '', '', '', 0, 0, 0),
(10001, '', '', '', 0, 0, 0),
(10002, '', '', '', 0, 0, 0),
(10004, '', '', '', 0, 0, 0),
(10005, '', '', '', 0, 0, 0),
(10006, '', '', '', 0, 0, 0),
(10008, '', '', '', 0, 0, 0),
(10009, '', '', '', 0, 0, 0),
(10010, '', '', '', 0, 0, 0),
(10012, '', '', '', 0, 0, 0),
(10013, '', '', '', 0, 0, 0),
(10014, '', '', '', 0, 0, 0),
(10016, '', '', '', 0, 0, 0),
(10017, '', '', '', 0, 0, 0),
(10018, '', '', '', 0, 0, 0),
(10020, '', '', '', 0, 0, 0),
(10021, '', '', '', 0, 0, 0),
(10022, '', '', '', 0, 0, 0),
(10024, '', '', '', 0, 0, 0),
(10025, '', '', '', 0, 0, 0),
(10026, '', '', '', 0, 0, 0),
(10028, '', '', '', 0, 0, 0),
(10029, '', '', '', 0, 0, 0),
(10030, '', '', '', 0, 0, 0),
(10032, '', '', '', 0, 0, 0),
(10033, '', '', '', 0, 0, 0),
(10034, '', '', '', 0, 0, 0),
(10036, '', '', '', 0, 0, 0),
(10037, '', '', '', 0, 0, 0),
(10038, '', '', '', 0, 0, 0),
(10040, '', '', '', 0, 0, 0),
(10041, '', '', '', 0, 0, 0),
(10042, '', '', '', 0, 0, 0),
(10044, '', '', '', 0, 0, 0),
(10045, '', '', '', 0, 0, 0),
(10046, '', '', '', 0, 0, 0),
(10048, '', '', '', 0, 0, 0),
(10049, '', '', '', 0, 0, 0),
(10050, '', '', '', 0, 0, 0),
(10052, '', '', '', 0, 0, 0),
(10053, '', '', '', 0, 0, 0),
(10054, '', '', '', 0, 0, 0),
(10056, '', '', '', 0, 0, 0),
(10057, '', '', '', 0, 0, 0),
(10058, '', '', '', 0, 0, 0),
(10060, '', '', '', 0, 0, 0),
(10061, '', '', '', 0, 0, 0),
(10062, '', '', '', 0, 0, 0),
(10064, '', '', '', 0, 0, 0),
(10065, '', '', '', 0, 0, 0),
(10066, '', '', '', 0, 0, 0),
(10068, '', '', '', 0, 0, 0),
(10069, '', '', '', 0, 0, 0),
(10070, '', '', '', 0, 0, 0),
(10072, '', '', '', 0, 0, 0),
(10073, '', '', '', 0, 0, 0),
(10074, '', '', '', 0, 0, 0),
(10076, '', '', '', 0, 0, 0),
(10077, '', '', '', 0, 0, 0),
(10078, '', '', '', 0, 0, 0),
(10080, '', '', '', 0, 0, 0),
(10081, '', '', '', 0, 0, 0),
(10082, '', '', '', 0, 0, 0),
(10084, '', '', '', 0, 0, 0),
(10085, '', '', '', 0, 0, 0),
(10086, '', '', '', 0, 0, 0),
(10088, '', '', '', 0, 0, 0),
(10089, '', '', '', 0, 0, 0),
(10090, '', '', '', 0, 0, 0),
(10092, '', '', '', 0, 0, 0),
(10093, '', '', '', 0, 0, 0),
(10094, '', '', '', 0, 0, 0),
(10096, '', '', '', 0, 0, 0),
(10097, '', '', '', 0, 0, 0),
(10098, '', '', '', 0, 0, 0),
(10100, '', '', '', 0, 0, 0),
(10101, '', '', '', 0, 0, 0),
(10102, '', '', '', 0, 0, 0),
(10104, '', '', '', 0, 0, 0),
(10105, '', '', '', 0, 0, 0),
(10106, '', '', '', 0, 0, 0),
(10108, '', '', '', 0, 0, 0),
(10109, '', '', '', 0, 0, 0),
(10110, '', '', '', 0, 0, 0),
(10112, '', '', '', 0, 0, 0),
(10113, '', '', '', 0, 0, 0),
(10114, '', '', '', 0, 0, 0),
(10116, '', '', '', 0, 0, 0),
(10117, '', '', '', 0, 0, 0),
(10118, '', '', '', 0, 0, 0),
(10120, '', '', '', 0, 0, 0),
(10121, '', '', '', 0, 0, 0),
(10122, '', '', '', 0, 0, 0),
(10124, '', '', '', 0, 0, 0),
(10125, '', '', '', 0, 0, 0),
(10126, '', '', '', 0, 0, 0),
(10128, '', '', '', 0, 0, 0),
(10129, '', '', '', 0, 0, 0),
(10130, '', '', '', 0, 0, 0),
(10132, '', '', '', 0, 0, 0),
(10133, '', '', '', 0, 0, 0),
(10134, '', '', '', 0, 0, 0),
(10136, '', '', '', 0, 0, 0),
(10137, '', '', '', 0, 0, 0),
(10138, '', '', '', 0, 0, 0),
(10140, '', '', '', 0, 0, 0),
(10141, '', '', '', 0, 0, 0),
(10142, '', '', '', 0, 0, 0),
(10144, '', '', '', 0, 0, 0),
(10145, '', '', '', 0, 0, 0),
(10146, '', '', '', 0, 0, 0),
(10148, '', '', '', 0, 0, 0),
(10149, '', '', '', 0, 0, 0),
(10150, '', '', '', 0, 0, 0),
(10152, '', '', '', 0, 0, 0),
(10153, '', '', '', 0, 0, 0),
(10154, '', '', '', 0, 0, 0),
(10156, '', '', '', 0, 0, 0),
(10157, '', '', '', 0, 0, 0),
(10158, '', '', '', 0, 0, 0),
(10160, '', '', '', 0, 0, 0),
(10161, '', '', '', 0, 0, 0),
(10162, '', '', '', 0, 0, 0),
(10164, '', '', '', 0, 0, 0),
(10165, '', '', '', 0, 0, 0),
(10166, '', '', '', 0, 0, 0),
(10168, '', '', '', 0, 0, 0),
(10169, '', '', '', 0, 0, 0),
(10170, '', '', '', 0, 0, 0),
(10172, '', '', '', 0, 0, 0),
(10173, '', '', '', 0, 0, 0),
(10174, '', '', '', 0, 0, 0),
(10176, '', '', '', 0, 0, 0),
(10177, '', '', '', 0, 0, 0),
(10178, '', '', '', 0, 0, 0),
(10180, '', '', '', 0, 0, 0),
(10181, '', '', '', 0, 0, 0),
(10182, '', '', '', 0, 0, 0),
(10184, '', '', '', 0, 0, 0),
(10185, '', '', '', 0, 0, 0),
(10186, '', '', '', 0, 0, 0),
(10188, '', '', '', 0, 0, 0),
(10189, '', '', '', 0, 0, 0),
(10190, '', '', '', 0, 0, 0),
(10192, '', '', '', 0, 0, 0),
(10193, '', '', '', 0, 0, 0),
(10194, '', '', '', 0, 0, 0),
(10196, '', '', '', 0, 0, 0),
(10197, '', '', '', 0, 0, 0),
(10198, '', '', '', 0, 0, 0),
(10200, '', '', '', 0, 0, 0),
(10201, '', '', '', 0, 0, 0),
(10202, '', '', '', 0, 0, 0),
(10204, '', '', '', 0, 0, 0),
(10205, '', '', '', 0, 0, 0),
(10206, '', '', '', 0, 0, 0),
(10208, '', '', '', 0, 0, 0),
(10209, '', '', '', 0, 0, 0),
(10210, '', '', '', 0, 0, 0),
(10212, '', '', '', 0, 0, 0),
(10213, '', '', '', 0, 0, 0),
(10214, '', '', '', 0, 0, 0),
(10216, '', '', '', 0, 0, 0),
(10217, '', '', '', 0, 0, 0),
(10218, '', '', '', 0, 0, 0),
(10220, '', '', '', 0, 0, 0),
(10221, '', '', '', 0, 0, 0),
(10222, '', '', '', 0, 0, 0),
(10224, '', '', '', 0, 0, 0),
(10225, '', '', '', 0, 0, 0),
(10226, '', '', '', 0, 0, 0),
(10228, '', '', '', 0, 0, 0),
(10229, '', '', '', 0, 0, 0),
(10230, '', '', '', 0, 0, 0),
(10232, '', '', '', 0, 0, 0),
(10233, '', '', '', 0, 0, 0),
(10234, '', '', '', 0, 0, 0),
(10236, '', '', '', 0, 0, 0),
(10237, '', '', '', 0, 0, 0),
(10238, '', '', '', 0, 0, 0),
(10240, '', '', '', 0, 0, 0),
(10241, '', '', '', 0, 0, 0),
(10242, '', '', '', 0, 0, 0),
(10244, '', '', '', 0, 0, 0),
(10245, '', '', '', 0, 0, 0),
(10246, '', '', '', 0, 0, 0),
(10248, '', '', '', 0, 0, 0),
(10249, '', '', '', 0, 0, 0),
(10250, '', '', '', 0, 0, 0),
(10252, '', '', '', 0, 0, 0),
(10253, '', '', '', 0, 0, 0),
(10254, '', '', '', 0, 0, 0),
(10256, '', '', '', 0, 0, 0),
(10257, '', '', '', 0, 0, 0),
(10258, '', '', '', 0, 0, 0),
(10260, '', '', '', 0, 0, 0),
(10261, '', '', '', 0, 0, 0),
(10262, '', '', '', 0, 0, 0),
(10264, '', '', '', 0, 0, 0),
(10265, '', '', '', 0, 0, 0),
(10266, '', '', '', 0, 0, 0),
(10268, '', '', '', 0, 0, 0),
(10269, '', '', '', 0, 0, 0),
(10270, '', '', '', 0, 0, 0),
(10272, '', '', '', 0, 0, 0),
(10273, '', '', '', 0, 0, 0),
(10274, '', '', '', 0, 0, 0),
(10276, '', '', '', 0, 0, 0),
(10277, '', '', '', 0, 0, 0),
(10278, '', '', '', 0, 0, 0),
(10280, '', '', '', 0, 0, 0),
(10281, '', '', '', 0, 0, 0),
(10282, '', '', '', 0, 0, 0),
(10284, '', '', '', 0, 0, 0),
(10285, '', '', '', 0, 0, 0),
(10286, '', '', '', 0, 0, 0),
(10288, '', '', '', 0, 0, 0),
(10289, '', '', '', 0, 0, 0),
(10290, '', '', '', 0, 0, 0),
(10292, '', '', '', 0, 0, 0),
(10293, '', '', '', 0, 0, 0),
(10294, '', '', '', 0, 0, 0),
(10296, '', '', '', 0, 0, 0),
(10297, '', '', '', 0, 0, 0),
(10298, '', '', '', 0, 0, 0),
(10300, '', '', '', 0, 0, 0),
(10301, '', '', '', 0, 0, 0),
(10302, '', '', '', 0, 0, 0),
(10304, '', '', '', 0, 0, 0),
(10305, '', '', '', 0, 0, 0),
(10306, '', '', '', 0, 0, 0),
(10308, '', '', '', 0, 0, 0),
(10309, '', '', '', 0, 0, 0),
(10310, '', '', '', 0, 0, 0),
(10312, '', '', '', 0, 0, 0),
(10313, '', '', '', 0, 0, 0),
(10314, '', '', '', 0, 0, 0),
(10316, '', '', '', 0, 0, 0),
(10317, '', '', '', 0, 0, 0),
(10318, '', '', '', 0, 0, 0),
(10320, '', '', '', 0, 0, 0),
(10321, '', '', '', 0, 0, 0),
(10322, '', '', '', 0, 0, 0),
(10324, '', '', '', 0, 0, 0),
(10325, '', '', '', 0, 0, 0),
(10326, '', '', '', 0, 0, 0),
(10328, '', '', '', 0, 0, 0),
(10329, '', '', '', 0, 0, 0),
(10330, '', '', '', 0, 0, 0),
(10332, '', '', '', 0, 0, 0),
(10333, '', '', '', 0, 0, 0),
(10334, '', '', '', 0, 0, 0),
(10336, '', '', '', 0, 0, 0),
(10337, '', '', '', 0, 0, 0),
(10338, '', '', '', 0, 0, 0),
(10340, '', '', '', 0, 0, 0),
(10341, '', '', '', 0, 0, 0),
(10342, '', '', '', 0, 0, 0),
(10344, '', '', '', 0, 0, 0),
(10345, '', '', '', 0, 0, 0),
(10346, '', '', '', 0, 0, 0),
(10348, '', '', '', 0, 0, 0),
(10349, '', '', '', 0, 0, 0),
(10350, '', '', '', 0, 0, 0),
(10352, '', '', '', 0, 0, 0),
(10353, '', '', '', 0, 0, 0),
(10354, '', '', '', 0, 0, 0),
(10356, '', '', '', 0, 0, 0),
(10357, '', '', '', 0, 0, 0),
(10358, '', '', '', 0, 0, 0),
(10360, '', '', '', 0, 0, 0),
(10361, '', '', '', 0, 0, 0),
(10362, '', '', '', 0, 0, 0),
(10364, '', '', '', 0, 0, 0),
(10365, '', '', '', 0, 0, 0),
(10366, '', '', '', 0, 0, 0),
(10368, '', '', '', 0, 0, 0),
(10369, '', '', '', 0, 0, 0),
(10370, '', '', '', 0, 0, 0),
(10372, '', '', '', 0, 0, 0),
(10373, '', '', '', 0, 0, 0),
(10374, '', '', '', 0, 0, 0),
(10376, '', '', '', 0, 0, 0),
(10377, '', '', '', 0, 0, 0),
(10378, '', '', '', 0, 0, 0),
(10380, '', '', '', 0, 0, 0),
(10381, '', '', '', 0, 0, 0),
(10382, '', '', '', 0, 0, 0),
(10384, '', '', '', 0, 0, 0),
(10385, '', '', '', 0, 0, 0),
(10386, '', '', '', 0, 0, 0),
(10388, '', '', '', 0, 0, 0),
(10389, '', '', '', 0, 0, 0),
(10390, '', '', '', 0, 0, 0),
(10392, '', '', '', 0, 0, 0),
(10393, '', '', '', 0, 0, 0),
(10394, '', '', '', 0, 0, 0),
(10396, '', '', '', 0, 0, 0),
(10397, '', '', '', 0, 0, 0),
(10398, '', '', '', 0, 0, 0),
(10400, '', '', '', 0, 0, 0),
(10401, '', '', '', 0, 0, 0),
(10402, '', '', '', 0, 0, 0),
(10404, '', '', '', 0, 0, 0),
(10405, '', '', '', 0, 0, 0),
(10406, '', '', '', 0, 0, 0),
(10408, '', '', '', 0, 0, 0),
(10409, '', '', '', 0, 0, 0),
(10410, '', '', '', 0, 0, 0),
(10412, '', '', '', 0, 0, 0),
(10413, '', '', '', 0, 0, 0),
(10414, '', '', '', 0, 0, 0),
(10416, '', '', '', 0, 0, 0),
(10417, '', '', '', 0, 0, 0),
(10418, '', '', '', 0, 0, 0),
(10420, '', '', '', 0, 0, 0),
(10421, '', '', '', 0, 0, 0),
(10422, '', '', '', 0, 0, 0),
(10424, '', '', '', 0, 0, 0),
(10425, '', '', '', 0, 0, 0),
(10426, '', '', '', 0, 0, 0),
(10428, '', '', '', 0, 0, 0),
(10429, '', '', '', 0, 0, 0),
(10430, '', '', '', 0, 0, 0),
(10432, '', '', '', 0, 0, 0),
(10433, '', '', '', 0, 0, 0),
(10434, '', '', '', 0, 0, 0);
INSERT INTO `vehicle` (`idvehicle`, `vehlicetype`, `vehlicemodel`, `vehlicejenis`, `cc`, `otr`, `status`) VALUES
(10436, '', '', '', 0, 0, 0),
(10437, '', '', '', 0, 0, 0),
(10438, '', '', '', 0, 0, 0),
(10440, '', '', '', 0, 0, 0),
(10441, '', '', '', 0, 0, 0),
(10442, '', '', '', 0, 0, 0),
(10444, '', '', '', 0, 0, 0),
(10445, '', '', '', 0, 0, 0),
(10446, '', '', '', 0, 0, 0),
(10448, '', '', '', 0, 0, 0),
(10449, '', '', '', 0, 0, 0),
(10450, '', '', '', 0, 0, 0),
(10452, '', '', '', 0, 0, 0),
(10453, '', '', '', 0, 0, 0),
(10454, '', '', '', 0, 0, 0),
(10456, '', '', '', 0, 0, 0),
(10457, '', '', '', 0, 0, 0),
(10458, '', '', '', 0, 0, 0),
(10460, '', '', '', 0, 0, 0),
(10461, '', '', '', 0, 0, 0),
(10462, '', '', '', 0, 0, 0),
(10464, '', '', '', 0, 0, 0),
(10465, '', '', '', 0, 0, 0),
(10466, '', '', '', 0, 0, 0),
(10468, '', '', '', 0, 0, 0),
(10469, '', '', '', 0, 0, 0),
(10470, '', '', '', 0, 0, 0),
(10472, '', '', '', 0, 0, 0),
(10473, '', '', '', 0, 0, 0),
(10474, '', '', '', 0, 0, 0),
(10476, '', '', '', 0, 0, 0),
(10477, '', '', '', 0, 0, 0),
(10478, '', '', '', 0, 0, 0),
(10480, '', '', '', 0, 0, 0),
(10481, '', '', '', 0, 0, 0),
(10482, '', '', '', 0, 0, 0),
(10484, '', '', '', 0, 0, 0),
(10485, '', '', '', 0, 0, 0),
(10486, '', '', '', 0, 0, 0),
(10488, '', '', '', 0, 0, 0),
(10489, '', '', '', 0, 0, 0),
(10490, '', '', '', 0, 0, 0),
(10492, '', '', '', 0, 0, 0),
(10493, '', '', '', 0, 0, 0),
(10494, '', '', '', 0, 0, 0),
(10496, '', '', '', 0, 0, 0),
(10497, '', '', '', 0, 0, 0),
(10498, '', '', '', 0, 0, 0),
(10500, '', '', '', 0, 0, 0),
(10501, '', '', '', 0, 0, 0),
(10502, '', '', '', 0, 0, 0),
(10504, '', '', '', 0, 0, 0),
(10505, '', '', '', 0, 0, 0),
(10506, '', '', '', 0, 0, 0),
(10508, '', '', '', 0, 0, 0),
(10509, '', '', '', 0, 0, 0),
(10510, '', '', '', 0, 0, 0),
(10512, '', '', '', 0, 0, 0),
(10513, '', '', '', 0, 0, 0),
(10514, '', '', '', 0, 0, 0),
(10516, '', '', '', 0, 0, 0),
(10517, '', '', '', 0, 0, 0),
(10518, '', '', '', 0, 0, 0),
(10520, '', '', '', 0, 0, 0),
(10521, '', '', '', 0, 0, 0),
(10522, '', '', '', 0, 0, 0),
(10524, '', '', '', 0, 0, 0),
(10525, '', '', '', 0, 0, 0),
(10526, '', '', '', 0, 0, 0),
(10528, '', '', '', 0, 0, 0),
(10529, '', '', '', 0, 0, 0),
(10530, '', '', '', 0, 0, 0),
(10532, '', '', '', 0, 0, 0),
(10533, '', '', '', 0, 0, 0),
(10534, '', '', '', 0, 0, 0),
(10536, '', '', '', 0, 0, 0),
(10537, '', '', '', 0, 0, 0),
(10538, '', '', '', 0, 0, 0),
(10540, '', '', '', 0, 0, 0),
(10541, '', '', '', 0, 0, 0),
(10542, '', '', '', 0, 0, 0),
(10544, '', '', '', 0, 0, 0),
(10545, '', '', '', 0, 0, 0),
(10546, '', '', '', 0, 0, 0),
(10548, '', '', '', 0, 0, 0),
(10549, '', '', '', 0, 0, 0),
(10550, '', '', '', 0, 0, 0),
(10552, '', '', '', 0, 0, 0),
(10553, '', '', '', 0, 0, 0),
(10554, '', '', '', 0, 0, 0),
(10556, '', '', '', 0, 0, 0),
(10557, '', '', '', 0, 0, 0),
(10558, '', '', '', 0, 0, 0),
(10560, '', '', '', 0, 0, 0),
(10561, '', '', '', 0, 0, 0),
(10562, '', '', '', 0, 0, 0),
(10564, '', '', '', 0, 0, 0),
(10565, '', '', '', 0, 0, 0),
(10566, '', '', '', 0, 0, 0),
(10568, '', '', '', 0, 0, 0),
(10569, '', '', '', 0, 0, 0),
(10570, '', '', '', 0, 0, 0),
(10572, '', '', '', 0, 0, 0),
(10573, '', '', '', 0, 0, 0),
(10574, '', '', '', 0, 0, 0),
(10576, '', '', '', 0, 0, 0),
(10577, '', '', '', 0, 0, 0),
(10578, '', '', '', 0, 0, 0),
(10580, '', '', '', 0, 0, 0),
(10581, '', '', '', 0, 0, 0),
(10582, '', '', '', 0, 0, 0),
(10584, '', '', '', 0, 0, 0),
(10585, '', '', '', 0, 0, 0),
(10586, '', '', '', 0, 0, 0),
(10588, '', '', '', 0, 0, 0),
(10589, '', '', '', 0, 0, 0),
(10590, '', '', '', 0, 0, 0),
(10592, '', '', '', 0, 0, 0),
(10593, '', '', '', 0, 0, 0),
(10594, '', '', '', 0, 0, 0),
(10596, '', '', '', 0, 0, 0),
(10597, '', '', '', 0, 0, 0),
(10598, '', '', '', 0, 0, 0),
(10600, '', '', '', 0, 0, 0),
(10601, '', '', '', 0, 0, 0),
(10602, '', '', '', 0, 0, 0),
(10604, '', '', '', 0, 0, 0),
(10605, '', '', '', 0, 0, 0),
(10606, '', '', '', 0, 0, 0),
(10608, '', '', '', 0, 0, 0),
(10609, '', '', '', 0, 0, 0),
(10610, '', '', '', 0, 0, 0),
(10612, '', '', '', 0, 0, 0),
(10613, '', '', '', 0, 0, 0),
(10614, '', '', '', 0, 0, 0),
(10616, '', '', '', 0, 0, 0),
(10617, '', '', '', 0, 0, 0),
(10618, '', '', '', 0, 0, 0),
(10620, '', '', '', 0, 0, 0),
(10621, '', '', '', 0, 0, 0),
(10622, '', '', '', 0, 0, 0),
(10624, '', '', '', 0, 0, 0),
(10625, '', '', '', 0, 0, 0),
(10626, '', '', '', 0, 0, 0),
(10628, '', '', '', 0, 0, 0),
(10629, '', '', '', 0, 0, 0),
(10630, '', '', '', 0, 0, 0),
(10632, '', '', '', 0, 0, 0),
(10633, '', '', '', 0, 0, 0),
(10634, '', '', '', 0, 0, 0),
(10636, '', '', '', 0, 0, 0),
(10637, '', '', '', 0, 0, 0),
(10638, '', '', '', 0, 0, 0),
(10640, '', '', '', 0, 0, 0),
(10641, '', '', '', 0, 0, 0),
(10642, '', '', '', 0, 0, 0),
(10644, '', '', '', 0, 0, 0),
(10645, '', '', '', 0, 0, 0),
(10646, '', '', '', 0, 0, 0),
(10648, '', '', '', 0, 0, 0),
(10649, '', '', '', 0, 0, 0),
(10650, '', '', '', 0, 0, 0),
(10652, '', '', '', 0, 0, 0),
(10653, '', '', '', 0, 0, 0),
(10654, '', '', '', 0, 0, 0),
(10656, '', '', '', 0, 0, 0),
(10657, '', '', '', 0, 0, 0),
(10658, '', '', '', 0, 0, 0),
(10660, '', '', '', 0, 0, 0),
(10661, '', '', '', 0, 0, 0),
(10662, '', '', '', 0, 0, 0),
(10664, '', '', '', 0, 0, 0),
(10665, '', '', '', 0, 0, 0),
(10666, '', '', '', 0, 0, 0),
(10668, '', '', '', 0, 0, 0),
(10669, '', '', '', 0, 0, 0),
(10670, '', '', '', 0, 0, 0),
(10672, '', '', '', 0, 0, 0),
(10673, '', '', '', 0, 0, 0),
(10674, '', '', '', 0, 0, 0),
(10676, '', '', '', 0, 0, 0),
(10677, '', '', '', 0, 0, 0),
(10678, '', '', '', 0, 0, 0),
(10680, '', '', '', 0, 0, 0),
(10681, '', '', '', 0, 0, 0),
(10682, '', '', '', 0, 0, 0),
(10684, '', '', '', 0, 0, 0),
(10685, '', '', '', 0, 0, 0),
(10686, '', '', '', 0, 0, 0),
(10688, '', '', '', 0, 0, 0),
(10689, '', '', '', 0, 0, 0),
(10690, '', '', '', 0, 0, 0),
(10692, '', '', '', 0, 0, 0),
(10693, '', '', '', 0, 0, 0),
(10694, '', '', '', 0, 0, 0),
(10696, '', '', '', 0, 0, 0),
(10697, '', '', '', 0, 0, 0),
(10698, '', '', '', 0, 0, 0),
(10700, '', '', '', 0, 0, 0),
(10701, '', '', '', 0, 0, 0),
(10702, '', '', '', 0, 0, 0),
(10704, '', '', '', 0, 0, 0),
(10705, '', '', '', 0, 0, 0),
(10706, '', '', '', 0, 0, 0),
(10708, '', '', '', 0, 0, 0),
(10709, '', '', '', 0, 0, 0),
(10710, '', '', '', 0, 0, 0),
(10712, '', '', '', 0, 0, 0),
(10713, '', '', '', 0, 0, 0),
(10714, '', '', '', 0, 0, 0),
(10716, '', '', '', 0, 0, 0),
(10717, '', '', '', 0, 0, 0),
(10718, '', '', '', 0, 0, 0),
(10720, '', '', '', 0, 0, 0),
(10721, '', '', '', 0, 0, 0),
(10722, '', '', '', 0, 0, 0),
(10724, '', '', '', 0, 0, 0),
(10725, '', '', '', 0, 0, 0),
(10726, '', '', '', 0, 0, 0),
(10728, '', '', '', 0, 0, 0),
(10729, '', '', '', 0, 0, 0),
(10730, '', '', '', 0, 0, 0),
(10732, '', '', '', 0, 0, 0),
(10733, '', '', '', 0, 0, 0),
(10734, '', '', '', 0, 0, 0),
(10736, '', '', '', 0, 0, 0),
(10737, '', '', '', 0, 0, 0),
(10738, '', '', '', 0, 0, 0),
(10740, '', '', '', 0, 0, 0),
(10741, '', '', '', 0, 0, 0),
(10742, '', '', '', 0, 0, 0),
(10744, '', '', '', 0, 0, 0),
(10745, '', '', '', 0, 0, 0),
(10746, '', '', '', 0, 0, 0),
(10748, '', '', '', 0, 0, 0),
(10749, '', '', '', 0, 0, 0),
(10750, '', '', '', 0, 0, 0),
(10752, '', '', '', 0, 0, 0),
(10753, '', '', '', 0, 0, 0),
(10754, '', '', '', 0, 0, 0),
(10756, '', '', '', 0, 0, 0),
(10757, '', '', '', 0, 0, 0),
(10758, '', '', '', 0, 0, 0),
(10760, '', '', '', 0, 0, 0),
(10761, '', '', '', 0, 0, 0),
(10762, '', '', '', 0, 0, 0),
(10764, '', '', '', 0, 0, 0),
(10765, '', '', '', 0, 0, 0),
(10766, '', '', '', 0, 0, 0),
(10768, '', '', '', 0, 0, 0),
(10769, '', '', '', 0, 0, 0),
(10770, '', '', '', 0, 0, 0),
(10772, '', '', '', 0, 0, 0),
(10773, '', '', '', 0, 0, 0),
(10774, '', '', '', 0, 0, 0),
(10776, '', '', '', 0, 0, 0),
(10777, '', '', '', 0, 0, 0),
(10778, '', '', '', 0, 0, 0),
(10780, '', '', '', 0, 0, 0),
(10781, '', '', '', 0, 0, 0),
(10782, '', '', '', 0, 0, 0),
(10784, '', '', '', 0, 0, 0),
(10785, '', '', '', 0, 0, 0),
(10786, '', '', '', 0, 0, 0),
(10788, '', '', '', 0, 0, 0),
(10789, '', '', '', 0, 0, 0),
(10790, '', '', '', 0, 0, 0),
(10792, '', '', '', 0, 0, 0),
(10793, '', '', '', 0, 0, 0),
(10794, '', '', '', 0, 0, 0),
(10796, '', '', '', 0, 0, 0),
(10797, '', '', '', 0, 0, 0),
(10798, '', '', '', 0, 0, 0),
(10800, '', '', '', 0, 0, 0),
(10801, '', '', '', 0, 0, 0),
(10802, '', '', '', 0, 0, 0),
(10804, '', '', '', 0, 0, 0),
(10805, '', '', '', 0, 0, 0),
(10806, '', '', '', 0, 0, 0),
(10808, '', '', '', 0, 0, 0),
(10809, '', '', '', 0, 0, 0),
(10810, '', '', '', 0, 0, 0),
(10812, '', '', '', 0, 0, 0),
(10813, '', '', '', 0, 0, 0),
(10814, '', '', '', 0, 0, 0),
(10816, '', '', '', 0, 0, 0),
(10817, '', '', '', 0, 0, 0),
(10818, '', '', '', 0, 0, 0),
(10820, '', '', '', 0, 0, 0),
(10821, '', '', '', 0, 0, 0),
(10822, '', '', '', 0, 0, 0),
(10824, '', '', '', 0, 0, 0),
(10825, '', '', '', 0, 0, 0),
(10826, '', '', '', 0, 0, 0),
(10828, '', '', '', 0, 0, 0),
(10829, '', '', '', 0, 0, 0),
(10830, '', '', '', 0, 0, 0),
(10832, '', '', '', 0, 0, 0),
(10833, '', '', '', 0, 0, 0),
(10834, '', '', '', 0, 0, 0),
(10836, '', '', '', 0, 0, 0),
(10837, '', '', '', 0, 0, 0),
(10838, '', '', '', 0, 0, 0),
(10840, '', '', '', 0, 0, 0),
(10841, '', '', '', 0, 0, 0),
(10842, '', '', '', 0, 0, 0),
(10844, '', '', '', 0, 0, 0),
(10845, '', '', '', 0, 0, 0),
(10846, '', '', '', 0, 0, 0),
(10848, '', '', '', 0, 0, 0),
(10849, '', '', '', 0, 0, 0),
(10850, '', '', '', 0, 0, 0),
(10852, '', '', '', 0, 0, 0),
(10853, '', '', '', 0, 0, 0),
(10854, '', '', '', 0, 0, 0),
(10856, '', '', '', 0, 0, 0),
(10857, '', '', '', 0, 0, 0),
(10858, '', '', '', 0, 0, 0),
(10860, '', '', '', 0, 0, 0),
(10861, '', '', '', 0, 0, 0),
(10862, '', '', '', 0, 0, 0),
(10864, '', '', '', 0, 0, 0),
(10865, '', '', '', 0, 0, 0),
(10866, '', '', '', 0, 0, 0),
(10868, '', '', '', 0, 0, 0),
(10869, '', '', '', 0, 0, 0),
(10870, '', '', '', 0, 0, 0),
(10872, '', '', '', 0, 0, 0),
(10873, '', '', '', 0, 0, 0),
(10874, '', '', '', 0, 0, 0),
(10876, '', '', '', 0, 0, 0),
(10877, '', '', '', 0, 0, 0),
(10878, '', '', '', 0, 0, 0),
(10880, '', '', '', 0, 0, 0),
(10881, '', '', '', 0, 0, 0),
(10882, '', '', '', 0, 0, 0),
(10884, '', '', '', 0, 0, 0),
(10885, '', '', '', 0, 0, 0),
(10886, '', '', '', 0, 0, 0),
(10888, '', '', '', 0, 0, 0),
(10889, '', '', '', 0, 0, 0),
(10890, '', '', '', 0, 0, 0),
(10892, '', '', '', 0, 0, 0),
(10893, '', '', '', 0, 0, 0),
(10894, '', '', '', 0, 0, 0),
(10896, '', '', '', 0, 0, 0),
(10897, '', '', '', 0, 0, 0),
(10898, '', '', '', 0, 0, 0),
(10900, '', '', '', 0, 0, 0),
(10901, '', '', '', 0, 0, 0),
(10902, '', '', '', 0, 0, 0),
(10904, '', '', '', 0, 0, 0),
(10905, '', '', '', 0, 0, 0),
(10906, '', '', '', 0, 0, 0),
(10908, '', '', '', 0, 0, 0),
(10909, '', '', '', 0, 0, 0),
(10910, '', '', '', 0, 0, 0),
(10912, '', '', '', 0, 0, 0),
(10913, '', '', '', 0, 0, 0),
(10914, '', '', '', 0, 0, 0),
(10916, '', '', '', 0, 0, 0),
(10917, '', '', '', 0, 0, 0),
(10918, '', '', '', 0, 0, 0),
(10920, '', '', '', 0, 0, 0),
(10921, '', '', '', 0, 0, 0),
(10922, '', '', '', 0, 0, 0),
(10924, '', '', '', 0, 0, 0),
(10925, '', '', '', 0, 0, 0),
(10926, '', '', '', 0, 0, 0),
(10928, '', '', '', 0, 0, 0),
(10929, '', '', '', 0, 0, 0),
(10930, '', '', '', 0, 0, 0),
(10932, '', '', '', 0, 0, 0),
(10933, '', '', '', 0, 0, 0),
(10934, '', '', '', 0, 0, 0),
(10936, '', '', '', 0, 0, 0),
(10937, '', '', '', 0, 0, 0),
(10938, '', '', '', 0, 0, 0),
(10940, '', '', '', 0, 0, 0),
(10941, '', '', '', 0, 0, 0),
(10942, '', '', '', 0, 0, 0),
(10944, '', '', '', 0, 0, 0),
(10945, '', '', '', 0, 0, 0),
(10946, '', '', '', 0, 0, 0),
(10948, '', '', '', 0, 0, 0),
(10949, '', '', '', 0, 0, 0),
(10950, '', '', '', 0, 0, 0),
(10952, '', '', '', 0, 0, 0),
(10953, '', '', '', 0, 0, 0),
(10954, '', '', '', 0, 0, 0),
(10956, '', '', '', 0, 0, 0),
(10957, '', '', '', 0, 0, 0),
(10958, '', '', '', 0, 0, 0),
(10960, '', '', '', 0, 0, 0),
(10961, '', '', '', 0, 0, 0),
(10962, '', '', '', 0, 0, 0),
(10964, '', '', '', 0, 0, 0),
(10965, '', '', '', 0, 0, 0),
(10966, '', '', '', 0, 0, 0),
(10968, '', '', '', 0, 0, 0),
(10969, '', '', '', 0, 0, 0),
(10970, '', '', '', 0, 0, 0),
(10972, '', '', '', 0, 0, 0),
(10973, '', '', '', 0, 0, 0),
(10974, '', '', '', 0, 0, 0),
(10976, '', '', '', 0, 0, 0),
(10977, '', '', '', 0, 0, 0),
(10978, '', '', '', 0, 0, 0),
(10980, '', '', '', 0, 0, 0),
(10981, '', '', '', 0, 0, 0),
(10982, '', '', '', 0, 0, 0),
(10984, '', '', '', 0, 0, 0),
(10985, '', '', '', 0, 0, 0),
(10986, '', '', '', 0, 0, 0),
(10988, '', '', '', 0, 0, 0),
(10989, '', '', '', 0, 0, 0),
(10990, '', '', '', 0, 0, 0),
(10992, '', '', '', 0, 0, 0),
(10993, '', '', '', 0, 0, 0),
(10994, '', '', '', 0, 0, 0),
(10996, '', '', '', 0, 0, 0),
(10997, '', '', '', 0, 0, 0),
(10998, '', '', '', 0, 0, 0),
(11000, '', '', '', 0, 0, 0),
(11001, '', '', '', 0, 0, 0),
(11002, '', '', '', 0, 0, 0),
(11004, '', '', '', 0, 0, 0),
(11005, '', '', '', 0, 0, 0),
(11006, '', '', '', 0, 0, 0),
(11008, '', '', '', 0, 0, 0),
(11009, '', '', '', 0, 0, 0),
(11010, '', '', '', 0, 0, 0),
(11012, '', '', '', 0, 0, 0),
(11013, '', '', '', 0, 0, 0),
(11014, '', '', '', 0, 0, 0),
(11016, '', '', '', 0, 0, 0),
(11017, '', '', '', 0, 0, 0),
(11018, '', '', '', 0, 0, 0),
(11020, '', '', '', 0, 0, 0),
(11021, '', '', '', 0, 0, 0),
(11022, '', '', '', 0, 0, 0),
(11024, '', '', '', 0, 0, 0),
(11025, '', '', '', 0, 0, 0),
(11026, '', '', '', 0, 0, 0),
(11028, '', '', '', 0, 0, 0),
(11029, '', '', '', 0, 0, 0),
(11030, '', '', '', 0, 0, 0),
(11032, '', '', '', 0, 0, 0),
(11033, '', '', '', 0, 0, 0),
(11034, '', '', '', 0, 0, 0),
(11036, '', '', '', 0, 0, 0),
(11037, '', '', '', 0, 0, 0),
(11038, '', '', '', 0, 0, 0),
(11040, '', '', '', 0, 0, 0),
(11041, '', '', '', 0, 0, 0),
(11042, '', '', '', 0, 0, 0),
(11044, '', '', '', 0, 0, 0),
(11045, '', '', '', 0, 0, 0),
(11046, '', '', '', 0, 0, 0),
(11048, '', '', '', 0, 0, 0),
(11049, '', '', '', 0, 0, 0),
(11050, '', '', '', 0, 0, 0),
(11052, '', '', '', 0, 0, 0),
(11053, '', '', '', 0, 0, 0),
(11054, '', '', '', 0, 0, 0),
(11056, '', '', '', 0, 0, 0),
(11057, '', '', '', 0, 0, 0),
(11058, '', '', '', 0, 0, 0),
(11060, '', '', '', 0, 0, 0),
(11061, '', '', '', 0, 0, 0),
(11062, '', '', '', 0, 0, 0),
(11064, '', '', '', 0, 0, 0),
(11065, '', '', '', 0, 0, 0),
(11066, '', '', '', 0, 0, 0),
(11068, '', '', '', 0, 0, 0),
(11069, '', '', '', 0, 0, 0),
(11070, '', '', '', 0, 0, 0),
(11072, '', '', '', 0, 0, 0),
(11073, '', '', '', 0, 0, 0),
(11074, '', '', '', 0, 0, 0),
(11076, '', '', '', 0, 0, 0),
(11077, '', '', '', 0, 0, 0),
(11078, '', '', '', 0, 0, 0),
(11080, '', '', '', 0, 0, 0),
(11081, '', '', '', 0, 0, 0),
(11082, '', '', '', 0, 0, 0),
(11084, '', '', '', 0, 0, 0),
(11085, '', '', '', 0, 0, 0),
(11086, '', '', '', 0, 0, 0),
(11088, '', '', '', 0, 0, 0),
(11089, '', '', '', 0, 0, 0),
(11090, '', '', '', 0, 0, 0),
(11092, '', '', '', 0, 0, 0),
(11093, '', '', '', 0, 0, 0),
(11094, '', '', '', 0, 0, 0),
(11096, '', '', '', 0, 0, 0),
(11097, '', '', '', 0, 0, 0),
(11098, '', '', '', 0, 0, 0),
(11100, '', '', '', 0, 0, 0),
(11101, '', '', '', 0, 0, 0),
(11102, '', '', '', 0, 0, 0),
(11104, '', '', '', 0, 0, 0),
(11105, '', '', '', 0, 0, 0),
(11106, '', '', '', 0, 0, 0),
(11108, '', '', '', 0, 0, 0),
(11109, '', '', '', 0, 0, 0),
(11110, '', '', '', 0, 0, 0),
(11112, '', '', '', 0, 0, 0),
(11113, '', '', '', 0, 0, 0),
(11114, '', '', '', 0, 0, 0),
(11116, '', '', '', 0, 0, 0),
(11117, '', '', '', 0, 0, 0),
(11118, '', '', '', 0, 0, 0),
(11120, '', '', '', 0, 0, 0),
(11121, '', '', '', 0, 0, 0),
(11122, '', '', '', 0, 0, 0),
(11124, '', '', '', 0, 0, 0),
(11125, '', '', '', 0, 0, 0),
(11126, '', '', '', 0, 0, 0),
(11128, '', '', '', 0, 0, 0),
(11129, '', '', '', 0, 0, 0),
(11130, '', '', '', 0, 0, 0),
(11132, '', '', '', 0, 0, 0),
(11133, '', '', '', 0, 0, 0),
(11134, '', '', '', 0, 0, 0),
(11136, '', '', '', 0, 0, 0),
(11137, '', '', '', 0, 0, 0),
(11138, '', '', '', 0, 0, 0),
(11140, '', '', '', 0, 0, 0),
(11141, '', '', '', 0, 0, 0),
(11142, '', '', '', 0, 0, 0),
(11144, '', '', '', 0, 0, 0),
(11145, '', '', '', 0, 0, 0),
(11146, '', '', '', 0, 0, 0),
(11148, '', '', '', 0, 0, 0),
(11149, '', '', '', 0, 0, 0),
(11150, '', '', '', 0, 0, 0),
(11152, '', '', '', 0, 0, 0),
(11153, '', '', '', 0, 0, 0),
(11154, '', '', '', 0, 0, 0),
(11156, '', '', '', 0, 0, 0),
(11157, '', '', '', 0, 0, 0),
(11158, '', '', '', 0, 0, 0),
(11160, '', '', '', 0, 0, 0),
(11161, '', '', '', 0, 0, 0),
(11162, '', '', '', 0, 0, 0),
(11164, '', '', '', 0, 0, 0),
(11165, '', '', '', 0, 0, 0),
(11166, '', '', '', 0, 0, 0),
(11168, '', '', '', 0, 0, 0),
(11169, '', '', '', 0, 0, 0),
(11170, '', '', '', 0, 0, 0),
(11172, '', '', '', 0, 0, 0),
(11173, '', '', '', 0, 0, 0),
(11174, '', '', '', 0, 0, 0),
(11176, '', '', '', 0, 0, 0),
(11177, '', '', '', 0, 0, 0),
(11178, '', '', '', 0, 0, 0),
(11180, '', '', '', 0, 0, 0),
(11181, '', '', '', 0, 0, 0),
(11182, '', '', '', 0, 0, 0),
(11184, '', '', '', 0, 0, 0),
(11185, '', '', '', 0, 0, 0),
(11186, '', '', '', 0, 0, 0),
(11188, '', '', '', 0, 0, 0),
(11189, '', '', '', 0, 0, 0),
(11190, '', '', '', 0, 0, 0),
(11192, '', '', '', 0, 0, 0),
(11193, '', '', '', 0, 0, 0),
(11194, '', '', '', 0, 0, 0),
(11196, '', '', '', 0, 0, 0),
(11197, '', '', '', 0, 0, 0),
(11198, '', '', '', 0, 0, 0),
(11200, '', '', '', 0, 0, 0),
(11201, '', '', '', 0, 0, 0),
(11202, '', '', '', 0, 0, 0),
(11204, '', '', '', 0, 0, 0),
(11205, '', '', '', 0, 0, 0),
(11206, '', '', '', 0, 0, 0),
(11208, '', '', '', 0, 0, 0),
(11209, '', '', '', 0, 0, 0),
(11210, '', '', '', 0, 0, 0),
(11212, '', '', '', 0, 0, 0),
(11213, '', '', '', 0, 0, 0),
(11214, '', '', '', 0, 0, 0),
(11216, '', '', '', 0, 0, 0),
(11217, '', '', '', 0, 0, 0),
(11218, '', '', '', 0, 0, 0),
(11220, '', '', '', 0, 0, 0),
(11221, '', '', '', 0, 0, 0),
(11222, '', '', '', 0, 0, 0),
(11224, '', '', '', 0, 0, 0),
(11225, '', '', '', 0, 0, 0),
(11226, '', '', '', 0, 0, 0),
(11228, '', '', '', 0, 0, 0),
(11229, '', '', '', 0, 0, 0),
(11230, '', '', '', 0, 0, 0),
(11232, '', '', '', 0, 0, 0),
(11233, '', '', '', 0, 0, 0),
(11234, '', '', '', 0, 0, 0),
(11236, '', '', '', 0, 0, 0),
(11237, '', '', '', 0, 0, 0),
(11238, '', '', '', 0, 0, 0),
(11240, '', '', '', 0, 0, 0),
(11241, '', '', '', 0, 0, 0),
(11242, '', '', '', 0, 0, 0),
(11244, '', '', '', 0, 0, 0),
(11245, '', '', '', 0, 0, 0),
(11246, '', '', '', 0, 0, 0),
(11248, '', '', '', 0, 0, 0),
(11249, '', '', '', 0, 0, 0),
(11250, '', '', '', 0, 0, 0),
(11252, '', '', '', 0, 0, 0),
(11253, '', '', '', 0, 0, 0),
(11254, '', '', '', 0, 0, 0),
(11256, '', '', '', 0, 0, 0),
(11257, '', '', '', 0, 0, 0),
(11258, '', '', '', 0, 0, 0),
(11260, '', '', '', 0, 0, 0),
(11261, '', '', '', 0, 0, 0),
(11262, '', '', '', 0, 0, 0),
(11264, '', '', '', 0, 0, 0),
(11265, '', '', '', 0, 0, 0),
(11266, '', '', '', 0, 0, 0),
(11268, '', '', '', 0, 0, 0),
(11269, '', '', '', 0, 0, 0),
(11270, '', '', '', 0, 0, 0),
(11272, '', '', '', 0, 0, 0),
(11273, '', '', '', 0, 0, 0),
(11274, '', '', '', 0, 0, 0),
(11276, '', '', '', 0, 0, 0),
(11277, '', '', '', 0, 0, 0),
(11278, '', '', '', 0, 0, 0),
(11280, '', '', '', 0, 0, 0),
(11281, '', '', '', 0, 0, 0),
(11282, '', '', '', 0, 0, 0),
(11284, '', '', '', 0, 0, 0),
(11285, '', '', '', 0, 0, 0),
(11286, '', '', '', 0, 0, 0),
(11288, '', '', '', 0, 0, 0),
(11289, '', '', '', 0, 0, 0),
(11290, '', '', '', 0, 0, 0),
(11292, '', '', '', 0, 0, 0),
(11293, '', '', '', 0, 0, 0),
(11294, '', '', '', 0, 0, 0),
(11296, '', '', '', 0, 0, 0),
(11297, '', '', '', 0, 0, 0),
(11298, '', '', '', 0, 0, 0),
(11300, '', '', '', 0, 0, 0),
(11301, '', '', '', 0, 0, 0),
(11302, '', '', '', 0, 0, 0),
(11304, '', '', '', 0, 0, 0),
(11305, '', '', '', 0, 0, 0),
(11306, '', '', '', 0, 0, 0),
(11308, '', '', '', 0, 0, 0),
(11309, '', '', '', 0, 0, 0),
(11310, '', '', '', 0, 0, 0),
(11312, '', '', '', 0, 0, 0),
(11313, '', '', '', 0, 0, 0),
(11314, '', '', '', 0, 0, 0),
(11316, '', '', '', 0, 0, 0),
(11317, '', '', '', 0, 0, 0),
(11318, '', '', '', 0, 0, 0),
(11320, '', '', '', 0, 0, 0),
(11321, '', '', '', 0, 0, 0),
(11322, '', '', '', 0, 0, 0),
(11324, '', '', '', 0, 0, 0),
(11325, '', '', '', 0, 0, 0),
(11326, '', '', '', 0, 0, 0),
(11328, '', '', '', 0, 0, 0),
(11329, '', '', '', 0, 0, 0),
(11330, '', '', '', 0, 0, 0),
(11332, '', '', '', 0, 0, 0),
(11333, '', '', '', 0, 0, 0),
(11334, '', '', '', 0, 0, 0),
(11336, '', '', '', 0, 0, 0),
(11337, '', '', '', 0, 0, 0),
(11338, '', '', '', 0, 0, 0),
(11340, '', '', '', 0, 0, 0),
(11341, '', '', '', 0, 0, 0),
(11342, '', '', '', 0, 0, 0),
(11344, '', '', '', 0, 0, 0),
(11345, '', '', '', 0, 0, 0),
(11346, '', '', '', 0, 0, 0),
(11348, '', '', '', 0, 0, 0),
(11349, '', '', '', 0, 0, 0),
(11350, '', '', '', 0, 0, 0),
(11352, '', '', '', 0, 0, 0),
(11353, '', '', '', 0, 0, 0),
(11354, '', '', '', 0, 0, 0),
(11356, '', '', '', 0, 0, 0),
(11357, '', '', '', 0, 0, 0),
(11358, '', '', '', 0, 0, 0),
(11360, '', '', '', 0, 0, 0),
(11361, '', '', '', 0, 0, 0),
(11362, '', '', '', 0, 0, 0),
(11364, '', '', '', 0, 0, 0),
(11365, '', '', '', 0, 0, 0),
(11366, '', '', '', 0, 0, 0),
(11368, '', '', '', 0, 0, 0),
(11369, '', '', '', 0, 0, 0),
(11370, '', '', '', 0, 0, 0),
(11372, '', '', '', 0, 0, 0),
(11373, '', '', '', 0, 0, 0),
(11374, '', '', '', 0, 0, 0),
(11376, '', '', '', 0, 0, 0),
(11377, '', '', '', 0, 0, 0),
(11378, '', '', '', 0, 0, 0),
(11380, '', '', '', 0, 0, 0),
(11381, '', '', '', 0, 0, 0),
(11382, '', '', '', 0, 0, 0),
(11384, '', '', '', 0, 0, 0),
(11385, '', '', '', 0, 0, 0),
(11386, '', '', '', 0, 0, 0),
(11388, '', '', '', 0, 0, 0),
(11389, '', '', '', 0, 0, 0),
(11390, '', '', '', 0, 0, 0),
(11392, '', '', '', 0, 0, 0),
(11393, '', '', '', 0, 0, 0),
(11394, '', '', '', 0, 0, 0),
(11396, '', '', '', 0, 0, 0),
(11397, '', '', '', 0, 0, 0),
(11398, '', '', '', 0, 0, 0),
(11400, '', '', '', 0, 0, 0),
(11401, '', '', '', 0, 0, 0),
(11402, '', '', '', 0, 0, 0),
(11404, '', '', '', 0, 0, 0),
(11405, '', '', '', 0, 0, 0),
(11406, '', '', '', 0, 0, 0),
(11408, '', '', '', 0, 0, 0),
(11409, '', '', '', 0, 0, 0),
(11410, '', '', '', 0, 0, 0),
(11412, '', '', '', 0, 0, 0),
(11413, '', '', '', 0, 0, 0),
(11414, '', '', '', 0, 0, 0),
(11416, '', '', '', 0, 0, 0),
(11417, '', '', '', 0, 0, 0),
(11418, '', '', '', 0, 0, 0),
(11420, '', '', '', 0, 0, 0),
(11421, '', '', '', 0, 0, 0),
(11422, '', '', '', 0, 0, 0),
(11424, '', '', '', 0, 0, 0),
(11425, '', '', '', 0, 0, 0),
(11426, '', '', '', 0, 0, 0),
(11428, '', '', '', 0, 0, 0),
(11429, '', '', '', 0, 0, 0),
(11430, '', '', '', 0, 0, 0),
(11432, '', '', '', 0, 0, 0),
(11433, '', '', '', 0, 0, 0),
(11434, '', '', '', 0, 0, 0),
(11436, '', '', '', 0, 0, 0),
(11437, '', '', '', 0, 0, 0),
(11438, '', '', '', 0, 0, 0),
(11440, '', '', '', 0, 0, 0),
(11441, '', '', '', 0, 0, 0),
(11442, '', '', '', 0, 0, 0),
(11444, '', '', '', 0, 0, 0),
(11445, '', '', '', 0, 0, 0),
(11446, '', '', '', 0, 0, 0),
(11448, '', '', '', 0, 0, 0),
(11449, '', '', '', 0, 0, 0),
(11450, '', '', '', 0, 0, 0),
(11452, '', '', '', 0, 0, 0),
(11453, '', '', '', 0, 0, 0),
(11454, '', '', '', 0, 0, 0),
(11456, '', '', '', 0, 0, 0),
(11457, '', '', '', 0, 0, 0),
(11458, '', '', '', 0, 0, 0),
(11460, '', '', '', 0, 0, 0),
(11461, '', '', '', 0, 0, 0),
(11462, '', '', '', 0, 0, 0),
(11464, '', '', '', 0, 0, 0),
(11465, '', '', '', 0, 0, 0),
(11466, '', '', '', 0, 0, 0),
(11468, '', '', '', 0, 0, 0),
(11469, '', '', '', 0, 0, 0),
(11470, '', '', '', 0, 0, 0),
(11472, '', '', '', 0, 0, 0),
(11473, '', '', '', 0, 0, 0),
(11474, '', '', '', 0, 0, 0),
(11476, '', '', '', 0, 0, 0),
(11477, '', '', '', 0, 0, 0),
(11478, '', '', '', 0, 0, 0),
(11480, '', '', '', 0, 0, 0),
(11481, '', '', '', 0, 0, 0),
(11482, '', '', '', 0, 0, 0),
(11484, '', '', '', 0, 0, 0),
(11485, '', '', '', 0, 0, 0),
(11486, '', '', '', 0, 0, 0),
(11488, '', '', '', 0, 0, 0),
(11489, '', '', '', 0, 0, 0),
(11490, '', '', '', 0, 0, 0),
(11492, '', '', '', 0, 0, 0),
(11493, '', '', '', 0, 0, 0),
(11494, '', '', '', 0, 0, 0),
(11496, '', '', '', 0, 0, 0),
(11497, '', '', '', 0, 0, 0),
(11498, '', '', '', 0, 0, 0),
(11500, '', '', '', 0, 0, 0),
(11501, '', '', '', 0, 0, 0),
(11502, '', '', '', 0, 0, 0),
(11504, '', '', '', 0, 0, 0),
(11505, '', '', '', 0, 0, 0),
(11506, '', '', '', 0, 0, 0),
(11508, '', '', '', 0, 0, 0),
(11509, '', '', '', 0, 0, 0),
(11510, '', '', '', 0, 0, 0),
(11512, '', '', '', 0, 0, 0),
(11513, '', '', '', 0, 0, 0),
(11514, '', '', '', 0, 0, 0),
(11516, '', '', '', 0, 0, 0),
(11517, '', '', '', 0, 0, 0),
(11518, '', '', '', 0, 0, 0),
(11520, '', '', '', 0, 0, 0),
(11521, '', '', '', 0, 0, 0),
(11522, '', '', '', 0, 0, 0),
(11524, '', '', '', 0, 0, 0),
(11525, '', '', '', 0, 0, 0),
(11526, '', '', '', 0, 0, 0),
(11528, '', '', '', 0, 0, 0),
(11529, '', '', '', 0, 0, 0),
(11530, '', '', '', 0, 0, 0),
(11532, '', '', '', 0, 0, 0),
(11533, '', '', '', 0, 0, 0),
(11534, '', '', '', 0, 0, 0),
(11536, '', '', '', 0, 0, 0),
(11537, '', '', '', 0, 0, 0),
(11538, '', '', '', 0, 0, 0),
(11540, '', '', '', 0, 0, 0),
(11541, '', '', '', 0, 0, 0),
(11542, '', '', '', 0, 0, 0),
(11544, '', '', '', 0, 0, 0),
(11545, '', '', '', 0, 0, 0),
(11546, '', '', '', 0, 0, 0),
(11548, '', '', '', 0, 0, 0),
(11549, '', '', '', 0, 0, 0),
(11550, '', '', '', 0, 0, 0),
(11552, '', '', '', 0, 0, 0),
(11553, '', '', '', 0, 0, 0),
(11554, '', '', '', 0, 0, 0),
(11556, '', '', '', 0, 0, 0),
(11557, '', '', '', 0, 0, 0),
(11558, '', '', '', 0, 0, 0),
(11560, '', '', '', 0, 0, 0),
(11561, '', '', '', 0, 0, 0),
(11562, '', '', '', 0, 0, 0),
(11564, '', '', '', 0, 0, 0),
(11565, '', '', '', 0, 0, 0),
(11566, '', '', '', 0, 0, 0),
(11568, '', '', '', 0, 0, 0),
(11569, '', '', '', 0, 0, 0),
(11570, '', '', '', 0, 0, 0),
(11572, '', '', '', 0, 0, 0),
(11573, '', '', '', 0, 0, 0),
(11574, '', '', '', 0, 0, 0),
(11576, '', '', '', 0, 0, 0),
(11577, '', '', '', 0, 0, 0),
(11578, '', '', '', 0, 0, 0),
(11580, '', '', '', 0, 0, 0),
(11581, '', '', '', 0, 0, 0),
(11582, '', '', '', 0, 0, 0),
(11584, '', '', '', 0, 0, 0),
(11585, '', '', '', 0, 0, 0),
(11586, '', '', '', 0, 0, 0),
(11588, '', '', '', 0, 0, 0),
(11589, '', '', '', 0, 0, 0),
(11590, '', '', '', 0, 0, 0),
(11592, '', '', '', 0, 0, 0),
(11593, '', '', '', 0, 0, 0),
(11594, '', '', '', 0, 0, 0),
(11596, '', '', '', 0, 0, 0),
(11597, '', '', '', 0, 0, 0),
(11598, '', '', '', 0, 0, 0),
(11600, '', '', '', 0, 0, 0),
(11601, '', '', '', 0, 0, 0),
(11602, '', '', '', 0, 0, 0),
(11604, '', '', '', 0, 0, 0),
(11605, '', '', '', 0, 0, 0),
(11606, '', '', '', 0, 0, 0),
(11608, '', '', '', 0, 0, 0),
(11609, '', '', '', 0, 0, 0),
(11610, '', '', '', 0, 0, 0),
(11612, '', '', '', 0, 0, 0),
(11613, '', '', '', 0, 0, 0),
(11614, '', '', '', 0, 0, 0),
(11616, '', '', '', 0, 0, 0),
(11617, '', '', '', 0, 0, 0),
(11618, '', '', '', 0, 0, 0),
(11620, '', '', '', 0, 0, 0),
(11621, '', '', '', 0, 0, 0),
(11622, '', '', '', 0, 0, 0),
(11624, '', '', '', 0, 0, 0),
(11625, '', '', '', 0, 0, 0),
(11626, '', '', '', 0, 0, 0),
(11628, '', '', '', 0, 0, 0),
(11629, '', '', '', 0, 0, 0),
(11630, '', '', '', 0, 0, 0),
(11632, '', '', '', 0, 0, 0),
(11633, '', '', '', 0, 0, 0),
(11634, '', '', '', 0, 0, 0),
(11636, '', '', '', 0, 0, 0),
(11637, '', '', '', 0, 0, 0),
(11638, '', '', '', 0, 0, 0),
(11640, '', '', '', 0, 0, 0),
(11641, '', '', '', 0, 0, 0),
(11642, '', '', '', 0, 0, 0),
(11644, '', '', '', 0, 0, 0),
(11645, '', '', '', 0, 0, 0),
(11646, '', '', '', 0, 0, 0),
(11648, '', '', '', 0, 0, 0),
(11649, '', '', '', 0, 0, 0),
(11650, '', '', '', 0, 0, 0),
(11652, '', '', '', 0, 0, 0),
(11653, '', '', '', 0, 0, 0),
(11654, '', '', '', 0, 0, 0),
(11656, '', '', '', 0, 0, 0),
(11657, '', '', '', 0, 0, 0),
(11658, '', '', '', 0, 0, 0),
(11660, '', '', '', 0, 0, 0),
(11661, '', '', '', 0, 0, 0),
(11662, '', '', '', 0, 0, 0),
(11664, '', '', '', 0, 0, 0),
(11665, '', '', '', 0, 0, 0),
(11666, '', '', '', 0, 0, 0),
(11668, '', '', '', 0, 0, 0),
(11669, '', '', '', 0, 0, 0),
(11670, '', '', '', 0, 0, 0),
(11672, '', '', '', 0, 0, 0),
(11673, '', '', '', 0, 0, 0),
(11674, '', '', '', 0, 0, 0),
(11676, '', '', '', 0, 0, 0),
(11677, '', '', '', 0, 0, 0),
(11678, '', '', '', 0, 0, 0),
(11680, '', '', '', 0, 0, 0),
(11681, '', '', '', 0, 0, 0),
(11682, '', '', '', 0, 0, 0),
(11684, '', '', '', 0, 0, 0),
(11685, '', '', '', 0, 0, 0),
(11686, '', '', '', 0, 0, 0),
(11688, '', '', '', 0, 0, 0),
(11689, '', '', '', 0, 0, 0),
(11690, '', '', '', 0, 0, 0),
(11692, '', '', '', 0, 0, 0),
(11693, '', '', '', 0, 0, 0),
(11694, '', '', '', 0, 0, 0),
(11696, '', '', '', 0, 0, 0),
(11697, '', '', '', 0, 0, 0),
(11698, '', '', '', 0, 0, 0),
(11700, '', '', '', 0, 0, 0),
(11701, '', '', '', 0, 0, 0),
(11702, '', '', '', 0, 0, 0),
(11704, '', '', '', 0, 0, 0),
(11705, '', '', '', 0, 0, 0),
(11706, '', '', '', 0, 0, 0),
(11708, '', '', '', 0, 0, 0),
(11709, '', '', '', 0, 0, 0),
(11710, '', '', '', 0, 0, 0),
(11712, '', '', '', 0, 0, 0),
(11713, '', '', '', 0, 0, 0),
(11714, '', '', '', 0, 0, 0),
(11716, '', '', '', 0, 0, 0),
(11717, '', '', '', 0, 0, 0),
(11718, '', '', '', 0, 0, 0),
(11720, '', '', '', 0, 0, 0),
(11721, '', '', '', 0, 0, 0),
(11722, '', '', '', 0, 0, 0),
(11724, '', '', '', 0, 0, 0),
(11725, '', '', '', 0, 0, 0),
(11726, '', '', '', 0, 0, 0),
(11728, '', '', '', 0, 0, 0),
(11729, '', '', '', 0, 0, 0),
(11730, '', '', '', 0, 0, 0),
(11732, '', '', '', 0, 0, 0),
(11733, '', '', '', 0, 0, 0),
(11734, '', '', '', 0, 0, 0),
(11736, '', '', '', 0, 0, 0),
(11737, '', '', '', 0, 0, 0),
(11738, '', '', '', 0, 0, 0),
(11740, '', '', '', 0, 0, 0),
(11741, '', '', '', 0, 0, 0),
(11742, '', '', '', 0, 0, 0),
(11744, '', '', '', 0, 0, 0),
(11745, '', '', '', 0, 0, 0),
(11746, '', '', '', 0, 0, 0),
(11748, '', '', '', 0, 0, 0),
(11749, '', '', '', 0, 0, 0),
(11750, '', '', '', 0, 0, 0),
(11752, '', '', '', 0, 0, 0),
(11753, '', '', '', 0, 0, 0),
(11754, '', '', '', 0, 0, 0),
(11756, '', '', '', 0, 0, 0),
(11757, '', '', '', 0, 0, 0),
(11758, '', '', '', 0, 0, 0),
(11760, '', '', '', 0, 0, 0),
(11761, '', '', '', 0, 0, 0),
(11762, '', '', '', 0, 0, 0),
(11764, '', '', '', 0, 0, 0),
(11765, '', '', '', 0, 0, 0),
(11766, '', '', '', 0, 0, 0),
(11768, '', '', '', 0, 0, 0),
(11769, '', '', '', 0, 0, 0),
(11770, '', '', '', 0, 0, 0),
(11772, '', '', '', 0, 0, 0),
(11773, '', '', '', 0, 0, 0),
(11774, '', '', '', 0, 0, 0),
(11776, '', '', '', 0, 0, 0),
(11777, '', '', '', 0, 0, 0),
(11778, '', '', '', 0, 0, 0),
(11780, '', '', '', 0, 0, 0),
(11781, '', '', '', 0, 0, 0),
(11782, '', '', '', 0, 0, 0),
(11784, '', '', '', 0, 0, 0),
(11785, '', '', '', 0, 0, 0),
(11786, '', '', '', 0, 0, 0),
(11788, '', '', '', 0, 0, 0),
(11789, '', '', '', 0, 0, 0),
(11790, '', '', '', 0, 0, 0),
(11792, '', '', '', 0, 0, 0),
(11793, '', '', '', 0, 0, 0),
(11794, '', '', '', 0, 0, 0),
(11796, '', '', '', 0, 0, 0),
(11797, '', '', '', 0, 0, 0),
(11798, '', '', '', 0, 0, 0),
(11800, '', '', '', 0, 0, 0),
(11801, '', '', '', 0, 0, 0),
(11802, '', '', '', 0, 0, 0),
(11804, '', '', '', 0, 0, 0),
(11805, '', '', '', 0, 0, 0),
(11806, '', '', '', 0, 0, 0),
(11808, '', '', '', 0, 0, 0),
(11809, '', '', '', 0, 0, 0),
(11810, '', '', '', 0, 0, 0),
(11812, '', '', '', 0, 0, 0),
(11813, '', '', '', 0, 0, 0),
(11814, '', '', '', 0, 0, 0),
(11816, '', '', '', 0, 0, 0),
(11817, '', '', '', 0, 0, 0),
(11818, '', '', '', 0, 0, 0),
(11820, '', '', '', 0, 0, 0),
(11821, '', '', '', 0, 0, 0),
(11822, '', '', '', 0, 0, 0),
(11824, '', '', '', 0, 0, 0),
(11825, '', '', '', 0, 0, 0),
(11826, '', '', '', 0, 0, 0),
(11828, '', '', '', 0, 0, 0),
(11829, '', '', '', 0, 0, 0),
(11830, '', '', '', 0, 0, 0),
(11832, '', '', '', 0, 0, 0),
(11833, '', '', '', 0, 0, 0),
(11834, '', '', '', 0, 0, 0),
(11836, '', '', '', 0, 0, 0),
(11837, '', '', '', 0, 0, 0),
(11838, '', '', '', 0, 0, 0),
(11840, '', '', '', 0, 0, 0),
(11841, '', '', '', 0, 0, 0),
(11842, '', '', '', 0, 0, 0),
(11844, '', '', '', 0, 0, 0),
(11845, '', '', '', 0, 0, 0),
(11846, '', '', '', 0, 0, 0),
(11848, '', '', '', 0, 0, 0),
(11849, '', '', '', 0, 0, 0),
(11850, '', '', '', 0, 0, 0),
(11852, '', '', '', 0, 0, 0),
(11853, '', '', '', 0, 0, 0),
(11854, '', '', '', 0, 0, 0),
(11856, '', '', '', 0, 0, 0),
(11857, '', '', '', 0, 0, 0),
(11858, '', '', '', 0, 0, 0),
(11860, '', '', '', 0, 0, 0),
(11861, '', '', '', 0, 0, 0),
(11862, '', '', '', 0, 0, 0),
(11864, '', '', '', 0, 0, 0),
(11865, '', '', '', 0, 0, 0),
(11866, '', '', '', 0, 0, 0),
(11868, '', '', '', 0, 0, 0),
(11869, '', '', '', 0, 0, 0),
(11870, '', '', '', 0, 0, 0),
(11872, '', '', '', 0, 0, 0),
(11873, '', '', '', 0, 0, 0),
(11874, '', '', '', 0, 0, 0),
(11876, '', '', '', 0, 0, 0),
(11877, '', '', '', 0, 0, 0),
(11878, '', '', '', 0, 0, 0),
(11880, '', '', '', 0, 0, 0),
(11881, '', '', '', 0, 0, 0),
(11882, '', '', '', 0, 0, 0),
(11884, '', '', '', 0, 0, 0),
(11885, '', '', '', 0, 0, 0),
(11886, '', '', '', 0, 0, 0),
(11888, '', '', '', 0, 0, 0),
(11889, '', '', '', 0, 0, 0),
(11890, '', '', '', 0, 0, 0),
(11892, '', '', '', 0, 0, 0),
(11893, '', '', '', 0, 0, 0),
(11894, '', '', '', 0, 0, 0),
(11896, '', '', '', 0, 0, 0),
(11897, '', '', '', 0, 0, 0),
(11898, '', '', '', 0, 0, 0),
(11900, '', '', '', 0, 0, 0),
(11901, '', '', '', 0, 0, 0),
(11902, '', '', '', 0, 0, 0),
(11904, '', '', '', 0, 0, 0),
(11905, '', '', '', 0, 0, 0),
(11906, '', '', '', 0, 0, 0),
(11908, '', '', '', 0, 0, 0),
(11909, '', '', '', 0, 0, 0),
(11910, '', '', '', 0, 0, 0),
(11912, '', '', '', 0, 0, 0),
(11913, '', '', '', 0, 0, 0),
(11914, '', '', '', 0, 0, 0),
(11916, '', '', '', 0, 0, 0),
(11917, '', '', '', 0, 0, 0),
(11918, '', '', '', 0, 0, 0),
(11920, '', '', '', 0, 0, 0),
(11921, '', '', '', 0, 0, 0),
(11922, '', '', '', 0, 0, 0),
(11924, '', '', '', 0, 0, 0),
(11925, '', '', '', 0, 0, 0),
(11926, '', '', '', 0, 0, 0),
(11928, '', '', '', 0, 0, 0),
(11929, '', '', '', 0, 0, 0),
(11930, '', '', '', 0, 0, 0),
(11932, '', '', '', 0, 0, 0),
(11933, '', '', '', 0, 0, 0),
(11934, '', '', '', 0, 0, 0),
(11936, '', '', '', 0, 0, 0),
(11937, '', '', '', 0, 0, 0),
(11938, '', '', '', 0, 0, 0),
(11940, '', '', '', 0, 0, 0),
(11941, '', '', '', 0, 0, 0),
(11942, '', '', '', 0, 0, 0),
(11944, '', '', '', 0, 0, 0),
(11945, '', '', '', 0, 0, 0),
(11946, '', '', '', 0, 0, 0),
(11948, '', '', '', 0, 0, 0),
(11949, '', '', '', 0, 0, 0),
(11950, '', '', '', 0, 0, 0),
(11952, '', '', '', 0, 0, 0),
(11953, '', '', '', 0, 0, 0),
(11954, '', '', '', 0, 0, 0),
(11956, '', '', '', 0, 0, 0),
(11957, '', '', '', 0, 0, 0),
(11958, '', '', '', 0, 0, 0),
(11960, '', '', '', 0, 0, 0),
(11961, '', '', '', 0, 0, 0),
(11962, '', '', '', 0, 0, 0),
(11964, '', '', '', 0, 0, 0),
(11965, '', '', '', 0, 0, 0),
(11966, '', '', '', 0, 0, 0),
(11968, '', '', '', 0, 0, 0),
(11969, '', '', '', 0, 0, 0),
(11970, '', '', '', 0, 0, 0),
(11972, '', '', '', 0, 0, 0),
(11973, '', '', '', 0, 0, 0),
(11974, '', '', '', 0, 0, 0),
(11976, '', '', '', 0, 0, 0),
(11977, '', '', '', 0, 0, 0),
(11978, '', '', '', 0, 0, 0),
(11980, '', '', '', 0, 0, 0),
(11981, '', '', '', 0, 0, 0),
(11982, '', '', '', 0, 0, 0),
(11984, '', '', '', 0, 0, 0),
(11985, '', '', '', 0, 0, 0),
(11986, '', '', '', 0, 0, 0),
(11988, '', '', '', 0, 0, 0),
(11989, '', '', '', 0, 0, 0),
(11990, '', '', '', 0, 0, 0),
(11992, '', '', '', 0, 0, 0),
(11993, '', '', '', 0, 0, 0),
(11994, '', '', '', 0, 0, 0),
(11996, '', '', '', 0, 0, 0),
(11997, '', '', '', 0, 0, 0),
(11998, '', '', '', 0, 0, 0),
(12000, '', '', '', 0, 0, 0),
(12001, '', '', '', 0, 0, 0),
(12002, '', '', '', 0, 0, 0),
(12004, '', '', '', 0, 0, 0),
(12005, '', '', '', 0, 0, 0),
(12006, '', '', '', 0, 0, 0),
(12008, '', '', '', 0, 0, 0),
(12009, '', '', '', 0, 0, 0),
(12010, '', '', '', 0, 0, 0),
(12012, '', '', '', 0, 0, 0),
(12013, '', '', '', 0, 0, 0),
(12014, '', '', '', 0, 0, 0),
(12016, '', '', '', 0, 0, 0),
(12017, '', '', '', 0, 0, 0),
(12018, '', '', '', 0, 0, 0),
(12020, '', '', '', 0, 0, 0),
(12021, '', '', '', 0, 0, 0),
(12022, '', '', '', 0, 0, 0),
(12024, '', '', '', 0, 0, 0),
(12025, '', '', '', 0, 0, 0),
(12026, '', '', '', 0, 0, 0),
(12028, '', '', '', 0, 0, 0),
(12029, '', '', '', 0, 0, 0),
(12030, '', '', '', 0, 0, 0),
(12032, '', '', '', 0, 0, 0),
(12033, '', '', '', 0, 0, 0),
(12034, '', '', '', 0, 0, 0),
(12036, '', '', '', 0, 0, 0),
(12037, '', '', '', 0, 0, 0),
(12038, '', '', '', 0, 0, 0),
(12040, '', '', '', 0, 0, 0),
(12041, '', '', '', 0, 0, 0),
(12042, '', '', '', 0, 0, 0),
(12044, '', '', '', 0, 0, 0),
(12045, '', '', '', 0, 0, 0),
(12046, '', '', '', 0, 0, 0),
(12048, '', '', '', 0, 0, 0),
(12049, '', '', '', 0, 0, 0),
(12050, '', '', '', 0, 0, 0),
(12052, '', '', '', 0, 0, 0),
(12053, '', '', '', 0, 0, 0),
(12054, '', '', '', 0, 0, 0),
(12056, '', '', '', 0, 0, 0),
(12057, '', '', '', 0, 0, 0),
(12058, '', '', '', 0, 0, 0),
(12060, '', '', '', 0, 0, 0),
(12061, '', '', '', 0, 0, 0),
(12062, '', '', '', 0, 0, 0),
(12064, '', '', '', 0, 0, 0),
(12065, '', '', '', 0, 0, 0),
(12066, '', '', '', 0, 0, 0),
(12068, '', '', '', 0, 0, 0),
(12069, '', '', '', 0, 0, 0),
(12070, '', '', '', 0, 0, 0),
(12072, '', '', '', 0, 0, 0),
(12073, '', '', '', 0, 0, 0),
(12074, '', '', '', 0, 0, 0),
(12076, '', '', '', 0, 0, 0),
(12077, '', '', '', 0, 0, 0),
(12078, '', '', '', 0, 0, 0),
(12080, '', '', '', 0, 0, 0),
(12081, '', '', '', 0, 0, 0),
(12082, '', '', '', 0, 0, 0),
(12084, '', '', '', 0, 0, 0),
(12085, '', '', '', 0, 0, 0),
(12086, '', '', '', 0, 0, 0),
(12088, '', '', '', 0, 0, 0),
(12089, '', '', '', 0, 0, 0),
(12090, '', '', '', 0, 0, 0),
(12092, '', '', '', 0, 0, 0),
(12093, '', '', '', 0, 0, 0),
(12094, '', '', '', 0, 0, 0),
(12096, '', '', '', 0, 0, 0),
(12097, '', '', '', 0, 0, 0),
(12098, '', '', '', 0, 0, 0),
(12100, '', '', '', 0, 0, 0),
(12101, '', '', '', 0, 0, 0),
(12102, '', '', '', 0, 0, 0),
(12104, '', '', '', 0, 0, 0),
(12105, '', '', '', 0, 0, 0),
(12106, '', '', '', 0, 0, 0),
(12108, '', '', '', 0, 0, 0),
(12109, '', '', '', 0, 0, 0),
(12110, '', '', '', 0, 0, 0),
(12112, '', '', '', 0, 0, 0),
(12113, '', '', '', 0, 0, 0),
(12114, '', '', '', 0, 0, 0),
(12116, '', '', '', 0, 0, 0),
(12117, '', '', '', 0, 0, 0),
(12118, '', '', '', 0, 0, 0),
(12120, '', '', '', 0, 0, 0),
(12121, '', '', '', 0, 0, 0),
(12122, '', '', '', 0, 0, 0),
(12124, '', '', '', 0, 0, 0),
(12125, '', '', '', 0, 0, 0),
(12126, '', '', '', 0, 0, 0),
(12128, '', '', '', 0, 0, 0),
(12129, '', '', '', 0, 0, 0),
(12130, '', '', '', 0, 0, 0),
(12132, '', '', '', 0, 0, 0),
(12133, '', '', '', 0, 0, 0),
(12134, '', '', '', 0, 0, 0),
(12136, '', '', '', 0, 0, 0),
(12137, '', '', '', 0, 0, 0),
(12138, '', '', '', 0, 0, 0),
(12140, '', '', '', 0, 0, 0),
(12141, '', '', '', 0, 0, 0),
(12142, '', '', '', 0, 0, 0),
(12144, '', '', '', 0, 0, 0),
(12145, '', '', '', 0, 0, 0),
(12146, '', '', '', 0, 0, 0),
(12148, '', '', '', 0, 0, 0),
(12149, '', '', '', 0, 0, 0),
(12150, '', '', '', 0, 0, 0),
(12152, '', '', '', 0, 0, 0),
(12153, '', '', '', 0, 0, 0),
(12154, '', '', '', 0, 0, 0),
(12156, '', '', '', 0, 0, 0),
(12157, '', '', '', 0, 0, 0),
(12158, '', '', '', 0, 0, 0),
(12160, '', '', '', 0, 0, 0),
(12161, '', '', '', 0, 0, 0),
(12162, '', '', '', 0, 0, 0),
(12164, '', '', '', 0, 0, 0),
(12165, '', '', '', 0, 0, 0),
(12166, '', '', '', 0, 0, 0),
(12168, '', '', '', 0, 0, 0),
(12169, '', '', '', 0, 0, 0),
(12170, '', '', '', 0, 0, 0),
(12172, '', '', '', 0, 0, 0),
(12173, '', '', '', 0, 0, 0),
(12174, '', '', '', 0, 0, 0),
(12176, '', '', '', 0, 0, 0),
(12177, '', '', '', 0, 0, 0),
(12178, '', '', '', 0, 0, 0),
(12180, '', '', '', 0, 0, 0),
(12181, '', '', '', 0, 0, 0),
(12182, '', '', '', 0, 0, 0),
(12184, '', '', '', 0, 0, 0),
(12185, '', '', '', 0, 0, 0),
(12186, '', '', '', 0, 0, 0),
(12188, '', '', '', 0, 0, 0),
(12189, '', '', '', 0, 0, 0),
(12190, '', '', '', 0, 0, 0),
(12192, '', '', '', 0, 0, 0),
(12193, '', '', '', 0, 0, 0),
(12194, '', '', '', 0, 0, 0),
(12196, '', '', '', 0, 0, 0),
(12197, '', '', '', 0, 0, 0),
(12198, '', '', '', 0, 0, 0),
(12200, '', '', '', 0, 0, 0),
(12201, '', '', '', 0, 0, 0),
(12202, '', '', '', 0, 0, 0),
(12204, '', '', '', 0, 0, 0),
(12205, '', '', '', 0, 0, 0),
(12206, '', '', '', 0, 0, 0),
(12208, '', '', '', 0, 0, 0),
(12209, '', '', '', 0, 0, 0),
(12210, '', '', '', 0, 0, 0),
(12212, '', '', '', 0, 0, 0),
(12213, '', '', '', 0, 0, 0),
(12214, '', '', '', 0, 0, 0),
(12216, '', '', '', 0, 0, 0),
(12217, '', '', '', 0, 0, 0),
(12218, '', '', '', 0, 0, 0),
(12220, '', '', '', 0, 0, 0),
(12221, '', '', '', 0, 0, 0),
(12222, '', '', '', 0, 0, 0),
(12224, '', '', '', 0, 0, 0),
(12225, '', '', '', 0, 0, 0),
(12226, '', '', '', 0, 0, 0),
(12228, '', '', '', 0, 0, 0),
(12229, '', '', '', 0, 0, 0),
(12230, '', '', '', 0, 0, 0),
(12232, '', '', '', 0, 0, 0),
(12233, '', '', '', 0, 0, 0),
(12234, '', '', '', 0, 0, 0),
(12236, '', '', '', 0, 0, 0),
(12237, '', '', '', 0, 0, 0),
(12238, '', '', '', 0, 0, 0),
(12240, '', '', '', 0, 0, 0),
(12241, '', '', '', 0, 0, 0),
(12242, '', '', '', 0, 0, 0),
(12244, '', '', '', 0, 0, 0),
(12245, '', '', '', 0, 0, 0),
(12246, '', '', '', 0, 0, 0),
(12248, '', '', '', 0, 0, 0),
(12249, '', '', '', 0, 0, 0),
(12250, '', '', '', 0, 0, 0),
(12252, '', '', '', 0, 0, 0),
(12253, '', '', '', 0, 0, 0),
(12254, '', '', '', 0, 0, 0),
(12256, '', '', '', 0, 0, 0),
(12257, '', '', '', 0, 0, 0),
(12258, '', '', '', 0, 0, 0),
(12260, '', '', '', 0, 0, 0),
(12261, '', '', '', 0, 0, 0),
(12262, '', '', '', 0, 0, 0),
(12264, '', '', '', 0, 0, 0),
(12265, '', '', '', 0, 0, 0),
(12266, '', '', '', 0, 0, 0),
(12268, '', '', '', 0, 0, 0),
(12269, '', '', '', 0, 0, 0),
(12270, '', '', '', 0, 0, 0),
(12272, '', '', '', 0, 0, 0),
(12273, '', '', '', 0, 0, 0),
(12274, '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclecolor`
--

CREATE TABLE IF NOT EXISTS `vehiclecolor` (
`idvehiclecolor` int(11) NOT NULL,
  `vehiclecolorcode` varchar(25) NOT NULL,
  `vehiclecolorname` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vehiclegroup`
--

CREATE TABLE IF NOT EXISTS `vehiclegroup` (
`idvehiclegroup` int(11) NOT NULL,
  `vehiclegroupname` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemodel`
--

CREATE TABLE IF NOT EXISTS `vehiclemodel` (
`idvehiclemodel` int(11) NOT NULL,
  `vehiclemodelname` varchar(100) NOT NULL,
  `vehiclegroupid` int(11) NOT NULL,
  `vehicletypeid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vehicleservice`
--

CREATE TABLE IF NOT EXISTS `vehicleservice` (
`idvehicleservice` int(11) NOT NULL,
  `vehicleservicename` varchar(100) NOT NULL,
  `vehliceservicetype` varchar(225) NOT NULL,
  `vehiclemodel` varchar(225) NOT NULL,
  `vehiclegroupmodel` varchar(225) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `unitprice` double NOT NULL,
  `qs` varchar(100) NOT NULL,
  `lr` varchar(100) NOT NULL,
  `hr` varchar(100) NOT NULL,
  `kpb` varchar(100) NOT NULL,
  `claim` varchar(100) NOT NULL,
  `jr` varchar(100) NOT NULL,
  `pdi` varchar(100) NOT NULL,
  `orplus` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `vehicleservice`
--

INSERT INTO `vehicleservice` (`idvehicleservice`, `vehicleservicename`, `vehliceservicetype`, `vehiclemodel`, `vehiclegroupmodel`, `status`, `unitprice`, `qs`, `lr`, `hr`, `kpb`, `claim`, `jr`, `pdi`, `orplus`) VALUES
(1, 'BONGKAR', 'HR', '', 'VARIO', 0, 35000, '', '', '', '', '', '', '', ''),
(2, 'SERVICE', 'QS', '', 'VARIO', 0, 40000, '', '', '', '', '', '', '', ''),
(3, 'KPB 1', 'KPB', '', 'VARIO', 0, 19500, '', '', '', '', '', '', '', ''),
(4, 'KPB 2', 'KPB', '', 'BEAT', 0, 18000, '', '', '', '', '', '', '', ''),
(5, 'SERVICE', 'QS', '', 'BEAT', 0, 36000, '', '', '', '', '', '', '', ''),
(6, 'GANTI OLI', 'LR', '', 'BEAT', 0, 0, '', '', '', '', '', '', '', ''),
(7, 'KPB 3', 'KPB', '', 'BEAT', 0, 18000, '', '', '', '', '', '', '', ''),
(8, 'KPB 1', 'KPB', '', 'BEAT', 0, 19500, '', '', '', '', '', '', '', ''),
(9, 'KPB 4', 'KPB', '', 'BEAT', 0, 18000, '', '', '', '', '', '', '', ''),
(10, 'BERSIHKAN CVT', 'LR', '', 'BEAT', 0, 17500, '', '', '', '', '', '', '', ''),
(11, 'GANTI KAMPAS BELAKANG', 'LR', '', 'BEAT', 0, 10000, '', '', '', '', '', '', '', ''),
(12, 'JASA PASANG KAMPAS DEPAN', 'LR', '', 'BEAT', 0, 12500, '', '', '', '', '', '', '', ''),
(13, 'STEL KOMSTIR', 'LR', '', 'BEAT', 0, 7500, '', '', '', '', '', '', '', ''),
(14, 'PASANG BOHLAM', 'LR', '', 'BEAT', 0, 7500, '', '', '', '', '', '', '', ''),
(16, 'PERBAIKAN KABEL', 'LR', '', 'BEAT', 0, 10000, '', '', '', '', '', '', '', ''),
(17, 'KPB 3', 'KPB', '', 'VARIO', 0, 18000, '', '', '', '', '', '', '', ''),
(18, 'KPB 3', 'KPB', '', 'VARIO 150', 0, 25625, '', '', '', '', '', '', '', ''),
(19, 'KPB 1', 'KPB', '', 'VARIO 150', 0, 27125, '', '', '', '', '', '', '', ''),
(20, 'KPB 2', 'KPB', '', 'VARIO 150', 0, 25625, '', '', '', '', '', '', '', ''),
(21, 'SERVICE', 'QS', '', 'CB', 0, 60000, '', '', '', '', '', '', '', ''),
(22, 'KPB 1', 'KPB', '', 'CB', 0, 21500, '', '', '', '', '', '', '', ''),
(23, 'KPB 2', 'KPB', '', 'CB', 0, 20000, '', '', '', '', '', '', '', ''),
(24, 'KPB 3', 'KPB', '', 'CB', 0, 20000, '', '', '', '', '', '', '', ''),
(25, 'PASANG RANTAI', 'LR', '', 'CB', 0, 20000, '', '', '', '', '', '', '', ''),
(26, 'SERVICE', 'QS', '', 'REVO', 0, 33000, '', '', '', '', '', '', '', ''),
(27, 'JASA PASANG PART', 'LR', '', 'REVO', 0, 27500, '', '', '', '', '', '', '', ''),
(28, 'PERBAIKAN KABEL', 'LR', '', 'VARIO', 0, 10000, '', '', '', '', '', '', '', ''),
(29, 'BONGKAR', 'HR', '', 'BEAT', 0, 40000, '', '', '', '', '', '', '', ''),
(30, 'SERVICE', 'QS', '', 'MEGA PRO', 0, 50000, '', '', '', '', '', '', '', ''),
(31, 'JASA PASANG RANTAI', 'LR', '', 'REVO', 0, 17500, '', '', '', '', '', '', '', ''),
(32, 'JASA PASANG PART', 'LR', '', 'VARIO', 0, 20000, '', '', '', '', '', '', '', ''),
(33, 'JASA PASANG OLI SHOCK', 'LR', '', 'BEAT', 0, 10000, '', '', '', '', '', '', '', ''),
(34, 'KPB 2', 'KPB', '', 'VARIO', 0, 18000, '', '', '', '', '', '', '', ''),
(35, 'KPB 4', 'KPB', '', 'VARIO', 0, 18000, '', '', '', '', '', '', '', ''),
(36, 'KPB 1', 'KPB', '', 'BEAT', 0, 19500, '', '', '', '', '', '', '', ''),
(37, 'KPB 2', 'KPB', '', 'BEAT', 0, 18000, '', '', '', '', '', '', '', ''),
(38, 'KPB 3', 'KPB', '', 'BEAT', 0, 18000, '', '', '', '', '', '', '', ''),
(39, 'KPB 4', 'KPB', '', 'BEAT', 0, 18000, '', '', '', '', '', '', '', ''),
(42, 'PASANG KABEL', 'LR', '', 'BEAT', 0, 7500, '', '', '', '', '', '', '', ''),
(43, 'SERVICE', 'QS', '', 'SPACY', 0, 40000, '', '', '', '', '', '', '', ''),
(44, 'SERVICE', 'QS', '', 'SUPRA', 0, 36000, '', '', '', '', '', '', '', ''),
(45, 'KPB 1', 'KPB', '', 'SUPRA', 0, 19500, '', '', '', '', '', '', '', ''),
(46, 'KPB 2', 'KPB', '', 'SUPRA', 0, 18000, '', '', '', '', '', '', '', ''),
(47, 'KPB 3', 'KPB', '', 'SUPRA', 0, 18000, '', '', '', '', '', '', '', ''),
(48, 'KPB 4', 'KPB', '', 'SUPRA', 0, 18000, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclestock`
--

CREATE TABLE IF NOT EXISTS `vehiclestock` (
`idvehicle` int(11) NOT NULL,
  `vehicletype` varchar(225) NOT NULL,
  `vehiclegroup` varchar(225) NOT NULL,
  `vehiclecolor` varchar(225) NOT NULL,
  `vehiclejenis` varchar(225) NOT NULL,
  `cc` int(11) NOT NULL,
  `otr` double NOT NULL,
  `seqno` varchar(225) NOT NULL,
  `mechineno` varchar(225) NOT NULL,
  `year` varchar(10) NOT NULL,
  `vehicledate` varchar(25) NOT NULL,
  `rangkano` varchar(255) NOT NULL,
  `channelid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `vehiclestock`
--

INSERT INTO `vehiclestock` (`idvehicle`, `vehicletype`, `vehiclegroup`, `vehiclecolor`, `vehiclejenis`, `cc`, `otr`, `seqno`, `mechineno`, `year`, `vehicledate`, `rangkano`, `channelid`, `status`) VALUES
(1, 'C1C02N16M2A/T', '', 'HF', '', 0, 0, '', 'JFW112GK709356', '2016', '25102016', 'JFW1E 1706873', 0, 0),
(2, 'D1B02N12L2A/T', '', 'BK', '', 0, 0, '', 'JM2110GK096703', '2016', '25102016', 'JM21E 1087905', 0, 0),
(3, 'D1B02N12L2A/T', '', 'BP', '', 0, 0, '', 'JM2119GK081696', '2016', '25102016', 'JM21E 1088707', 0, 0),
(4, 'D1B02N13L2A/T', '', 'MC', '', 0, 0, '', 'JM111XGK079854', '2016', '25102016', 'JM11E 1078545', 0, 0),
(5, 'D1B02N13L2A/T', '', 'MC', '', 0, 0, '', 'JM1110GK079863', '2016', '25102016', 'JM11E 1078556', 0, 0),
(6, 'D1I02N27M1A/T', '', 'BK', '', 0, 0, '', 'JFZ213GK001388', '2016', '25102016', 'JFZ2E 1001384', 0, 0),
(7, 'D1I02N27M1A/T', '', 'BK', '', 0, 0, '', 'JFZ216GK001238', '2016', '25102016', 'JFZ2E 1001249', 0, 0),
(8, 'D1I02N27M1A/T', '', 'BK', '', 0, 0, '', 'JFZ218GK000852', '2016', '25102016', 'JFZ2E 1000865', 0, 0),
(9, 'E1F02N11S1A/T', '', 'BR', '', 0, 0, '', 'JFU112GK671387', '2016', '25102016', 'JFU1E 1678686', 0, 0),
(10, 'E1F02N11S1A/T', '', 'BR', '', 0, 0, '', 'JFU11XGK671380', '2016', '25102016', 'JFU1E 1678681', 0, 0),
(11, 'E1F02N11S1A/T', '', 'BR', '', 0, 0, '', 'JFU113GK671382', '2016', '25102016', 'JFU1E 1678683', 0, 0),
(12, 'E1F02N11S1A/T', '', 'WL', '', 0, 0, '', 'JFU116GK680772', '2016', '25102016', 'JFU1E 1680062', 0, 0),
(13, 'E1F02N11S1A/T', '', 'WL', '', 0, 0, '', 'JFU11XGK680760', '2016', '25102016', 'JFU1E 1680049', 0, 0),
(14, 'E1F02N11S1A/T', '', 'WL', '', 0, 0, '', 'JFU111GK680758', '2016', '25102016', 'JFU1E 1680047', 0, 0),
(15, 'H5C02R20S1M/T', '', 'BY', '', 0, 0, '', 'KC8113GK140493', '2016', '25102016', 'KC81E 1138710', 0, 0),
(16, 'P5E02R22M1AM/T', '', 'MP', '', 0, 0, '', 'KC9112GK058065', '2016', '25102016', 'KC91E 1058773', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE IF NOT EXISTS `vehicletype` (
`idvehicletype` int(11) NOT NULL,
  `vehicletypename` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vehicleupload`
--

CREATE TABLE IF NOT EXISTS `vehicleupload` (
`idvehicle` int(11) NOT NULL,
  `cc` int(11) NOT NULL,
  `otr` double NOT NULL,
  `seqno` varchar(225) NOT NULL,
  `mechineno` varchar(225) NOT NULL,
  `rangkano` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL,
  `vehicledate` varchar(25) NOT NULL,
  `vehicletype` varchar(255) NOT NULL,
  `vehiclecolor` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `vehicleupload`
--

INSERT INTO `vehicleupload` (`idvehicle`, `cc`, `otr`, `seqno`, `mechineno`, `rangkano`, `year`, `vehicledate`, `vehicletype`, `vehiclecolor`, `status`) VALUES
(1, 0, 0, '', 'JFW112GK709356', 'JFW1E 1706873', '2016', '25102016', 'C1C02N16M2A/T', 'HF', 0),
(2, 0, 0, '', 'JM2110GK096703', 'JM21E 1087905', '2016', '25102016', 'D1B02N12L2A/T', 'BK', 0),
(3, 0, 0, '', 'JM2119GK081696', 'JM21E 1088707', '2016', '25102016', 'D1B02N12L2A/T', 'BP', 0),
(4, 0, 0, '', 'JM111XGK079854', 'JM11E 1078545', '2016', '25102016', 'D1B02N13L2A/T', 'MC', 0),
(5, 0, 0, '', 'JM1110GK079863', 'JM11E 1078556', '2016', '25102016', 'D1B02N13L2A/T', 'MC', 0),
(6, 0, 0, '', 'JFZ213GK001388', 'JFZ2E 1001384', '2016', '25102016', 'D1I02N27M1A/T', 'BK', 0),
(7, 0, 0, '', 'JFZ216GK001238', 'JFZ2E 1001249', '2016', '25102016', 'D1I02N27M1A/T', 'BK', 0),
(8, 0, 0, '', 'JFZ218GK000852', 'JFZ2E 1000865', '2016', '25102016', 'D1I02N27M1A/T', 'BK', 0),
(9, 0, 0, '', 'JFU112GK671387', 'JFU1E 1678686', '2016', '25102016', 'E1F02N11S1A/T', 'BR', 0),
(10, 0, 0, '', 'JFU11XGK671380', 'JFU1E 1678681', '2016', '25102016', 'E1F02N11S1A/T', 'BR', 0),
(11, 0, 0, '', 'JFU113GK671382', 'JFU1E 1678683', '2016', '25102016', 'E1F02N11S1A/T', 'BR', 0),
(12, 0, 0, '', 'JFU116GK680772', 'JFU1E 1680062', '2016', '25102016', 'E1F02N11S1A/T', 'WL', 0),
(13, 0, 0, '', 'JFU11XGK680760', 'JFU1E 1680049', '2016', '25102016', 'E1F02N11S1A/T', 'WL', 0),
(14, 0, 0, '', 'JFU111GK680758', 'JFU1E 1680047', '2016', '25102016', 'E1F02N11S1A/T', 'WL', 0),
(15, 0, 0, '', 'KC8113GK140493', 'KC81E 1138710', '2016', '25102016', 'H5C02R20S1M/T', 'BY', 0),
(16, 0, 0, '', 'KC9112GK058065', 'KC91E 1058773', '2016', '25102016', 'P5E02R22M1AM/T', 'MP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehlicemodelgroup`
--

CREATE TABLE IF NOT EXISTS `vehlicemodelgroup` (
`idvehlicemodelgroup` int(11) NOT NULL,
  `vehlicemodelgroupname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `vehlicemodelgroup`
--

INSERT INTO `vehlicemodelgroup` (`idvehlicemodelgroup`, `vehlicemodelgroupname`, `status`) VALUES
(6, 'VARIO', 0),
(7, 'BEAT', 0),
(8, 'SUPRA', 0),
(9, 'CBR', 0),
(10, 'VARIO 150', 0),
(11, 'CB', 0),
(12, 'REVO', 0),
(13, 'REVO FI', 0),
(14, 'MEGA PRO', 0),
(15, 'SPACY', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehlicemodelgroupdet`
--

CREATE TABLE IF NOT EXISTS `vehlicemodelgroupdet` (
`idvehlicemodelgroupdet` int(11) NOT NULL,
  `vehlicemodelgroupid` int(11) NOT NULL,
  `vehlicemodel` varchar(225) NOT NULL DEFAULT '0',
  `vehlicetype` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `vehlicemodelgroupdet`
--

INSERT INTO `vehlicemodelgroupdet` (`idvehlicemodelgroupdet`, `vehlicemodelgroupid`, `vehlicemodel`, `vehlicetype`) VALUES
(14, 6, '0', 'ACB2J21B02A/T'),
(15, 6, '0', 'ACB2J22B03A/T'),
(20, 6, '0', 'NC110A1C1A/T'),
(27, 8, '0', 'G2E02R21L0AM/T'),
(28, 8, '0', 'G2E02R21L0M/T'),
(29, 8, '0', 'NF125TD'),
(30, 8, '0', 'NF125TR3M/T'),
(31, 8, '0', 'AFX12U22C08AM/T'),
(32, 8, '0', 'AFX12U21C07M/T'),
(33, 8, '0', 'NF125TD3M/T'),
(36, 8, '0', 'NF125TRF'),
(37, 8, '0', 'AFX12U22C07M/T'),
(38, 8, '0', 'NF125TR'),
(39, 7, '0', 'NC11B1CA/T'),
(40, 7, '0', 'NC11BF1CBA/T'),
(41, 7, '0', 'NC11BF1CA/T'),
(42, 7, '0', 'Y1G02N02L0AA/T'),
(43, 7, '0', 'Y1G02N02L1ABA/T'),
(44, 7, '0', 'Y1G02N15L0A/T'),
(45, 7, '0', 'Y1G02N15L1AA/T'),
(46, 7, '0', 'Y1G02N02L1AAA/T'),
(47, 7, '0', 'Y1G02N02L0A/T'),
(48, 7, '0', 'Y1G02N02L1AA/T'),
(49, 7, '0', 'Y1G02N02L1A/T'),
(50, 7, '0', 'Y1G02N15L1A/T'),
(51, 7, '0', 'X1B02N04L0AA/T'),
(52, 7, '0', 'X1B02R07L0A/T'),
(53, 7, '0', 'X1B02N04L0A/T'),
(54, 7, '0', 'D1I02N27M1A/T'),
(55, 7, '0', 'ACH1M21B04A/T'),
(56, 7, '0', 'NC11B2CA/T'),
(57, 7, '0', 'NC11B3D1A/T'),
(58, 7, '0', 'NC11B3C1A/T'),
(59, 6, '0', 'NC12A1CF1A/T'),
(60, 6, '0', 'ATI1I21B01A/T'),
(61, 6, '0', 'E1F02N11S1A/T'),
(62, 6, '0', 'E1F02N12S1A/T'),
(63, 6, '0', 'D1A02N19M1A/T'),
(64, 6, '0', 'D1A02N19M1AA/T'),
(65, 10, '0', 'K1H02N14L0A/T'),
(66, 10, '0', 'K1H02N14L0MA/T'),
(67, 6, '0', 'D1A02N18M1A/T'),
(68, 11, '0', 'CB15A1RRFM/T'),
(69, 11, '0', 'CB15A1RRF1M/T'),
(70, 11, '0', 'H5C02R20M1AM/T'),
(71, 11, '0', 'H5C02R20M1BM/T'),
(72, 11, '0', 'H5C02R20S1BM/T'),
(73, 11, '0', 'H5C02R20S1AM/T'),
(74, 11, '0', 'H5C02R20S1BM/T'),
(75, 11, '0', 'H5C02R20S1M/T'),
(76, 12, '0', 'NF11B1CAM/T'),
(77, 12, '0', 'NF11B1CM/T'),
(78, 12, '0', 'NF11B1D1M/T'),
(79, 12, '0', 'NF11B1DM/T'),
(80, 12, '0', 'NF11B1C1M/T'),
(81, 12, '0', 'NF100TD'),
(82, 13, '0', 'NF100TD1'),
(83, 13, '0', 'NF100TC1'),
(84, 13, '0', 'NF11B2C1M/T'),
(85, 13, '0', 'NF11B2DA1M/T'),
(86, 14, '0', 'GL160D'),
(87, 14, '0', 'GL160D1'),
(88, 14, '0', 'GL160CW1'),
(89, 14, '0', 'GL160CW2'),
(90, 6, '0', 'E1F02N11M2A/T'),
(91, 6, '0', 'E1F02N12M2A/T'),
(92, 15, '0', 'NC11D1CF1A/T'),
(93, 15, '0', 'NC11D1CF2A/T'),
(94, 15, '0', 'NC11D1CFA/T'),
(96, 8, '0', 'AFX12U22C08AM/T'),
(97, 6, '0', 'E1F02N11M2A/T');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE IF NOT EXISTS `village` (
`idvillage` int(11) NOT NULL,
  `villagename` varchar(225) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `districtsid` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=190 ;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`idvillage`, `villagename`, `postcode`, `districtsid`) VALUES
(1, 'Arjawinangun', '', 1),
(2, 'Bulak', '', 1),
(3, 'Geyongan', '', 1),
(4, 'Jungjang', '', 1),
(5, 'Jungjang Wetan', '', 1),
(6, 'Karangsambung', '', 1),
(7, 'Kebonturi ', '', 1),
(8, 'Rawagatel', '', 1),
(9, 'Sende', '', 1),
(10, 'Tegalgubug', '', 1),
(11, 'Tegalgubug Lor ', '', 1),
(12, 'Astanajapura ', '', 2),
(13, 'Buntet ', '', 2),
(14, 'Japura Kidul ', '', 2),
(15, 'Japurabakti ', '', 2),
(16, 'Kanci ', '', 2),
(17, 'Kanci Kulon ', '', 2),
(18, 'Kendal ', '', 2),
(19, 'Mertapada Kulon ', '', 2),
(20, 'Mertapada Wetan ', '', 2),
(21, 'Munjul ', '', 2),
(22, 'Sidamulya', '', 2),
(23, 'Babakan', '', 3),
(24, 'Babakangebang', '', 3),
(25, 'Bojonggebang', '', 3),
(26, 'Cangkuang', '', 3),
(27, 'Gembongan', '', 3),
(28, 'Gembonganmekar', '', 3),
(29, 'Karangwangun', '', 3),
(30, 'Kudukeras', '', 3),
(31, 'Kudumulya', '', 3),
(32, 'Pakusamben', '', 3),
(33, 'Serang Kulon', '', 3),
(34, 'Beber', '', 4),
(35, 'Ciawigajah', '', 4),
(36, 'Cikancas', '', 4),
(37, 'Cipinang', '', 4),
(38, 'Halimpu', '', 4),
(39, 'Kondangsari', '', 4),
(40, 'Patapan', '', 4),
(41, 'Sindanghayu', '', 4),
(42, 'Sindangkasih', '', 4),
(43, 'Wanayasa', '', 4),
(44, 'Bojongnegara', '', 5),
(45, 'Ciledug Kulon', '', 5),
(46, 'Ciledug Lor', '', 5),
(47, 'Ciledug Tengah', '', 5),
(48, 'Ciledug Wetan', '', 5),
(49, 'Damarguna', '', 5),
(50, 'Jatiseeng', '', 5),
(51, 'Jatiseeng Kidul', '', 5),
(52, 'Leuweunggajah', '', 5),
(53, 'Tenjomaya', '', 5),
(54, 'Babakan', '', 6),
(55, 'Bringin', '', 6),
(56, 'Budur', '', 6),
(57, 'Ciwaringin', '', 6),
(58, 'Galagamba', '', 6),
(59, 'Gintung Kidul', '', 6),
(60, 'Gintung Tengah', '', 6),
(61, 'Gintungranjeng', '', 6),
(62, 'Cikeduk', '', 7),
(63, 'Depok', '', 7),
(64, 'Getasan', '', 7),
(65, 'Karangwangi', '', 7),
(66, 'Kasugengan Kidul', '', 7),
(67, 'Kasugengan Lor', '', 7),
(68, 'Keduanan', '', 7),
(69, 'Kejuden', '', 7),
(70, 'Warugede', '', 7),
(71, 'Warujaya', '', 7),
(72, 'Balad', '', 8),
(73, 'Bobos ', '', 8),
(74, 'Cangkoak ', '', 8),
(75, 'Cikalahang ', '', 8),
(76, 'Cipanas ', '', 8),
(77, 'Cisaat ', '', 8),
(78, 'Dukupuntang ', '', 8),
(79, 'Girinata ', '', 8),
(80, 'Kedongdong Kidul ', '', 8),
(81, 'Kepunduan ', '', 8),
(82, 'Dompyong Kulon ', '', 9),
(83, 'Dompyong Wetan ', '', 9),
(84, 'Gagasari ', '', 9),
(85, 'Gebang ', '', 9),
(86, 'Gebang Kulon ', '', 9),
(87, 'Gebangilir ', '', 9),
(88, 'Gebangmekar ', '', 9),
(89, 'Gebangudik ', '', 9),
(90, 'Kalimaro ', '', 9),
(91, 'Kalimekar ', '', 9),
(92, 'Bayalangu Kidul', '', 10),
(93, 'Bayalangu Lor', '', 10),
(94, 'Gegesik Kidul', '', 10),
(95, 'Gegesik Kulon', '', 10),
(96, 'Gegesik Lor', '', 10),
(97, 'Gegesik Wetan', '', 10),
(98, 'Jagapura Kidul', '', 10),
(99, 'Jagapura Kulon', '', 10),
(100, 'Jagapura Lor', '', 10),
(101, 'Jagapura Wetan', '', 10),
(102, 'Cikeusal ', '', 11),
(103, 'Cupang', '', 11),
(104, 'Gempol', '', 11),
(105, 'Kedungbunder', '', 11),
(106, 'Kempek', '', 11),
(107, 'Palimanan Barat', '', 11),
(108, 'Walahar', '', 11),
(109, 'Winong', '', 11),
(110, 'Durajaya', '', 12),
(111, 'Greged (Greget)', '', 12),
(112, 'Jatipancur', '', 12),
(113, 'Kamarang', '', 12),
(114, 'Kamaranglebak', '', 12),
(115, 'Nanggela', '', 12),
(116, 'Sindangkempeng', '', 12),
(117, 'Gumulunglebak', '', 12),
(118, 'Adidharma', '', 13),
(119, 'Astana', '', 13),
(120, 'Babadan', '', 13),
(121, 'Buyut', '', 13),
(122, 'Grogol', '', 13),
(123, 'Jadimulya', '', 13),
(124, 'Jatimerta', '', 13),
(125, 'Kalisapu', '', 13),
(126, 'Bakung Kidul', '', 14),
(127, 'Bakung Lor', '', 14),
(128, 'Bojong Lor', '', 14),
(129, 'Bojong Wetan', '', 14),
(130, 'Jamblang', '', 14),
(131, 'Orimalang', '', 14),
(132, 'Sitiwinangun', '', 14),
(133, 'Wangunharja', '', 14),
(134, 'Guwa Kidul', '', 15),
(135, 'Guwa Lor', '', 15),
(136, 'Kalideres', '', 15),
(137, 'Kaliwedi Kidul', '', 15),
(138, 'Kaliwedi Lor', '', 15),
(139, 'Prajawinangun Kulon', '', 15),
(140, 'Prajawinangun Wetan', '', 15),
(141, 'Ujungsemi', '', 15),
(142, 'Bungko', '', 16),
(143, 'Bungko Lor', '', 16),
(144, 'Dukuh', '', 16),
(145, 'Grogol', '', 16),
(146, 'Kapetakan', '', 16),
(147, 'Karangkendal', '', 16),
(148, 'Kertasura', '', 16),
(149, 'Pegagan Kidul', '', 16),
(150, 'Kalimeang', '', 17),
(151, 'Karangmalang', '', 17),
(152, 'Karangmekar', '', 17),
(153, 'Karangsembung', '', 17),
(154, 'Karangsuwung', '', 17),
(155, 'Karangtengah', '', 17),
(156, 'Kubangkarang', '', 17),
(157, 'Tambelang', '', 17),
(158, 'Blender', '', 18),
(159, 'Jatipiring', '', 18),
(160, 'Karanganyar', '', 18),
(161, 'Karangasem', '', 18),
(162, 'Karangwangi', '', 18),
(163, 'Karangwareng', '', 18),
(164, 'Kubangdeleg', '', 18),
(165, 'Seuseupan', '', 18),
(166, 'Kalikoa', '', 19),
(167, 'Kedawung', '', 19),
(168, 'Kedungdawa', '', 19),
(169, 'Kedungjaya', '', 19),
(170, 'Kertawinangun', '', 19),
(171, 'Pilangsari', '', 19),
(172, 'Sutawinangun', '', 19),
(173, 'TUK', '', 19),
(174, 'Bangodua', '', 20),
(175, 'Danawinangun', '', 20),
(176, 'Jemaras Kidul', '', 20),
(177, 'Jemaras Lor', '', 20),
(178, 'Klangenan', '', 20),
(179, 'Kreyo', '', 20),
(180, 'Pekantingan', '', 20),
(181, 'Serang', '', 20),
(182, '', '', 21),
(183, '', '', 21),
(184, '', '', 21),
(185, '', '', 21),
(186, '', '', 21),
(187, '', '', 21),
(188, '', '', 21),
(189, '', '', 21);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
`idyear` int(11) NOT NULL,
  `yearname` varchar(15) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`idyear`, `yearname`) VALUES
(1, '2010'),
(2, '2011'),
(3, '2012'),
(4, '2013'),
(5, '2014'),
(6, '2015'),
(7, '2016'),
(8, '2017'),
(9, '2018'),
(10, '2019'),
(11, '2020'),
(12, '2021'),
(13, '2022'),
(14, '2023'),
(15, '2024'),
(16, '2025'),
(17, '2026'),
(18, '2027'),
(19, '2028'),
(20, '2029'),
(21, '2030'),
(22, '2031'),
(23, '2032'),
(24, '2033'),
(25, '2034'),
(26, '2035'),
(27, '2036'),
(28, '2037'),
(29, '2038'),
(30, '2039'),
(31, '2040'),
(32, '2041'),
(33, '2042'),
(34, '2043'),
(35, '2044'),
(36, '2045'),
(37, '2046'),
(38, '2047'),
(39, '2048'),
(40, '2049'),
(41, '2050'),
(42, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appaymentdet`
--
ALTER TABLE `appaymentdet`
 ADD PRIMARY KEY (`idtransdet`);

--
-- Indexes for table `arreceivedet`
--
ALTER TABLE `arreceivedet`
 ADD PRIMARY KEY (`idtransdet`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`idbank`);

--
-- Indexes for table `businessprocess`
--
ALTER TABLE `businessprocess`
 ADD PRIMARY KEY (`idbusinessprocess`);

--
-- Indexes for table `businessprocessdet`
--
ALTER TABLE `businessprocessdet`
 ADD PRIMARY KEY (`idbusinessprocessdet`);

--
-- Indexes for table `businesstype`
--
ALTER TABLE `businesstype`
 ADD PRIMARY KEY (`idbusinesstype`);

--
-- Indexes for table `cashpayment`
--
ALTER TABLE `cashpayment`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `cashreceive`
--
ALTER TABLE `cashreceive`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
 ADD PRIMARY KEY (`idchannel`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`idcity`);

--
-- Indexes for table `complainttype`
--
ALTER TABLE `complainttype`
 ADD PRIMARY KEY (`idcomplainttype`);

--
-- Indexes for table `contacttype`
--
ALTER TABLE `contacttype`
 ADD PRIMARY KEY (`idcontacttype`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`idcountry`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
 ADD PRIMARY KEY (`idcurrency`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`idcustomer`);

--
-- Indexes for table `customertype`
--
ALTER TABLE `customertype`
 ADD PRIMARY KEY (`idcustomertype`);

--
-- Indexes for table `deliveryorder`
--
ALTER TABLE `deliveryorder`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `deliveryorderdet`
--
ALTER TABLE `deliveryorderdet`
 ADD PRIMARY KEY (`idtransdet`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`iddepartment`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
 ADD PRIMARY KEY (`iddistricts`);

--
-- Indexes for table `educationlevel`
--
ALTER TABLE `educationlevel`
 ADD PRIMARY KEY (`ideducationlevel`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`idemployee`);

--
-- Indexes for table `employeeeducation`
--
ALTER TABLE `employeeeducation`
 ADD PRIMARY KEY (`idemployeeeducation`);

--
-- Indexes for table `employeefamily`
--
ALTER TABLE `employeefamily`
 ADD PRIMARY KEY (`idemployeefamily`);

--
-- Indexes for table `employeejobexperience`
--
ALTER TABLE `employeejobexperience`
 ADD PRIMARY KEY (`idemployeejobexperience`);

--
-- Indexes for table `employeestatus`
--
ALTER TABLE `employeestatus`
 ADD PRIMARY KEY (`idemployeestatus`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`idevent`);

--
-- Indexes for table `expeditiontype`
--
ALTER TABLE `expeditiontype`
 ADD PRIMARY KEY (`idexpeditiontype`);

--
-- Indexes for table `goodreceive`
--
ALTER TABLE `goodreceive`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `goodreceivedet`
--
ALTER TABLE `goodreceivedet`
 ADD PRIMARY KEY (`idtransdet`), ADD KEY `transid` (`transid`);

--
-- Indexes for table `icon`
--
ALTER TABLE `icon`
 ADD PRIMARY KEY (`idicon`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
 ADD PRIMARY KEY (`idinventory`);

--
-- Indexes for table `inventoryadj`
--
ALTER TABLE `inventoryadj`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `inventoryadjdet`
--
ALTER TABLE `inventoryadjdet`
 ADD PRIMARY KEY (`idtransdet`), ADD KEY `transid` (`transid`);

--
-- Indexes for table `inventorybrand`
--
ALTER TABLE `inventorybrand`
 ADD PRIMARY KEY (`idinventorybrand`);

--
-- Indexes for table `inventorycolor`
--
ALTER TABLE `inventorycolor`
 ADD PRIMARY KEY (`idinventorycolor`);

--
-- Indexes for table `inventorygroup`
--
ALTER TABLE `inventorygroup`
 ADD PRIMARY KEY (`idinventorygroup`);

--
-- Indexes for table `inventorygroupdet`
--
ALTER TABLE `inventorygroupdet`
 ADD PRIMARY KEY (`idinventorygroupdet`);

--
-- Indexes for table `inventorysize`
--
ALTER TABLE `inventorysize`
 ADD PRIMARY KEY (`idinventorysize`);

--
-- Indexes for table `inventorytype`
--
ALTER TABLE `inventorytype`
 ADD PRIMARY KEY (`idinventorytype`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`idlocation`);

--
-- Indexes for table `materialused`
--
ALTER TABLE `materialused`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `materialuseddet`
--
ALTER TABLE `materialuseddet`
 ADD PRIMARY KEY (`idtransdet`), ADD KEY `transid` (`transid`);

--
-- Indexes for table `matusedtype`
--
ALTER TABLE `matusedtype`
 ADD PRIMARY KEY (`idmatusedtype`);

--
-- Indexes for table `navmenu`
--
ALTER TABLE `navmenu`
 ADD PRIMARY KEY (`idnavmenu`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
 ADD PRIMARY KEY (`idnotification`);

--
-- Indexes for table `notificationstatus`
--
ALTER TABLE `notificationstatus`
 ADD PRIMARY KEY (`idnotificationstatus`);

--
-- Indexes for table `partupload`
--
ALTER TABLE `partupload`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paytype`
--
ALTER TABLE `paytype`
 ADD PRIMARY KEY (`idpaytype`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
 ADD PRIMARY KEY (`idposition`);

--
-- Indexes for table `profession`
--
ALTER TABLE `profession`
 ADD PRIMARY KEY (`idprofession`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `purchaseorderdet`
--
ALTER TABLE `purchaseorderdet`
 ADD PRIMARY KEY (`idtransdet`), ADD KEY `transid` (`transid`);

--
-- Indexes for table `purchasereturn`
--
ALTER TABLE `purchasereturn`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `purchasereturndet`
--
ALTER TABLE `purchasereturndet`
 ADD PRIMARY KEY (`idtransdet`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
 ADD PRIMARY KEY (`idsalesman`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `salesorderdet`
--
ALTER TABLE `salesorderdet`
 ADD PRIMARY KEY (`idtransdet`), ADD KEY `transid` (`transid`);

--
-- Indexes for table `salesreturn`
--
ALTER TABLE `salesreturn`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `salesreturndet`
--
ALTER TABLE `salesreturndet`
 ADD PRIMARY KEY (`idtransdet`), ADD KEY `transid` (`transid`);

--
-- Indexes for table `salesservice`
--
ALTER TABLE `salesservice`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `salesservicedet`
--
ALTER TABLE `salesservicedet`
 ADD PRIMARY KEY (`idtransdet`), ADD KEY `transid` (`transid`), ADD KEY `transid_2` (`transid`);

--
-- Indexes for table `salesservicedet2`
--
ALTER TABLE `salesservicedet2`
 ADD PRIMARY KEY (`idtransdet`), ADD KEY `transid` (`transid`), ADD KEY `transid_2` (`transid`);

--
-- Indexes for table `salesvehicle`
--
ALTER TABLE `salesvehicle`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `salesvehiclepay`
--
ALTER TABLE `salesvehiclepay`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `samsat`
--
ALTER TABLE `samsat`
 ADD PRIMARY KEY (`idsamsat`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipgoodsdet`
--
ALTER TABLE `shipgoodsdet`
 ADD PRIMARY KEY (`idtransdet`);

--
-- Indexes for table `shipto`
--
ALTER TABLE `shipto`
 ADD PRIMARY KEY (`idshipto`);

--
-- Indexes for table `slip`
--
ALTER TABLE `slip`
 ADD PRIMARY KEY (`idslip`);

--
-- Indexes for table `stockopname`
--
ALTER TABLE `stockopname`
 ADD PRIMARY KEY (`idtrans`);

--
-- Indexes for table `stockopnamedet`
--
ALTER TABLE `stockopnamedet`
 ADD PRIMARY KEY (`idtransdet`), ADD KEY `transid` (`transid`);

--
-- Indexes for table `subnavmenu`
--
ALTER TABLE `subnavmenu`
 ADD PRIMARY KEY (`idsubnavmenu`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`idsupplier`), ADD KEY `fk_supplier_supgrp` (`supgrp`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
 ADD PRIMARY KEY (`idticket`);

--
-- Indexes for table `ticketstatus`
--
ALTER TABLE `ticketstatus`
 ADD PRIMARY KEY (`idticketstatus`);

--
-- Indexes for table `top`
--
ALTER TABLE `top`
 ADD PRIMARY KEY (`idtop`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
 ADD PRIMARY KEY (`idunit`);

--
-- Indexes for table `userauthorized`
--
ALTER TABLE `userauthorized`
 ADD PRIMARY KEY (`iduserautorized`);

--
-- Indexes for table `userlocauthorized`
--
ALTER TABLE `userlocauthorized`
 ADD PRIMARY KEY (`iduserautorized`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
 ADD PRIMARY KEY (`iduserlog`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`iduser`), ADD UNIQUE KEY `iduser` (`iduser`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
 ADD PRIMARY KEY (`idusertype`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
 ADD PRIMARY KEY (`idvehicle`);

--
-- Indexes for table `vehiclecolor`
--
ALTER TABLE `vehiclecolor`
 ADD PRIMARY KEY (`idvehiclecolor`);

--
-- Indexes for table `vehiclegroup`
--
ALTER TABLE `vehiclegroup`
 ADD PRIMARY KEY (`idvehiclegroup`);

--
-- Indexes for table `vehiclemodel`
--
ALTER TABLE `vehiclemodel`
 ADD PRIMARY KEY (`idvehiclemodel`);

--
-- Indexes for table `vehicleservice`
--
ALTER TABLE `vehicleservice`
 ADD PRIMARY KEY (`idvehicleservice`), ADD KEY `vehiclegroupmodel` (`vehiclegroupmodel`);

--
-- Indexes for table `vehiclestock`
--
ALTER TABLE `vehiclestock`
 ADD PRIMARY KEY (`idvehicle`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
 ADD PRIMARY KEY (`idvehicletype`);

--
-- Indexes for table `vehicleupload`
--
ALTER TABLE `vehicleupload`
 ADD PRIMARY KEY (`idvehicle`);

--
-- Indexes for table `vehlicemodelgroup`
--
ALTER TABLE `vehlicemodelgroup`
 ADD PRIMARY KEY (`idvehlicemodelgroup`), ADD UNIQUE KEY `vehlicemodelgroupname` (`vehlicemodelgroupname`), ADD KEY `vehlicemodelgroupname_2` (`vehlicemodelgroupname`);

--
-- Indexes for table `vehlicemodelgroupdet`
--
ALTER TABLE `vehlicemodelgroupdet`
 ADD PRIMARY KEY (`idvehlicemodelgroupdet`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
 ADD PRIMARY KEY (`idvillage`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
 ADD PRIMARY KEY (`idyear`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appaymentdet`
--
ALTER TABLE `appaymentdet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `arreceivedet`
--
ALTER TABLE `arreceivedet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
MODIFY `idbank` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `businessprocess`
--
ALTER TABLE `businessprocess`
MODIFY `idbusinessprocess` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `businessprocessdet`
--
ALTER TABLE `businessprocessdet`
MODIFY `idbusinessprocessdet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `businesstype`
--
ALTER TABLE `businesstype`
MODIFY `idbusinesstype` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cashpayment`
--
ALTER TABLE `cashpayment`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cashreceive`
--
ALTER TABLE `cashreceive`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
MODIFY `idchannel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
MODIFY `idcity` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `complainttype`
--
ALTER TABLE `complainttype`
MODIFY `idcomplainttype` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacttype`
--
ALTER TABLE `contacttype`
MODIFY `idcontacttype` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `idcountry` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
MODIFY `idcurrency` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customertype`
--
ALTER TABLE `customertype`
MODIFY `idcustomertype` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `deliveryorder`
--
ALTER TABLE `deliveryorder`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deliveryorderdet`
--
ALTER TABLE `deliveryorderdet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `iddepartment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
MODIFY `iddistricts` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `educationlevel`
--
ALTER TABLE `educationlevel`
MODIFY `ideducationlevel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `idemployee` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employeeeducation`
--
ALTER TABLE `employeeeducation`
MODIFY `idemployeeeducation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeefamily`
--
ALTER TABLE `employeefamily`
MODIFY `idemployeefamily` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeejobexperience`
--
ALTER TABLE `employeejobexperience`
MODIFY `idemployeejobexperience` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeestatus`
--
ALTER TABLE `employeestatus`
MODIFY `idemployeestatus` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `goodreceive`
--
ALTER TABLE `goodreceive`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goodreceivedet`
--
ALTER TABLE `goodreceivedet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `icon`
--
ALTER TABLE `icon`
MODIFY `idicon` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
MODIFY `idinventory` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=573;
--
-- AUTO_INCREMENT for table `inventoryadj`
--
ALTER TABLE `inventoryadj`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventoryadjdet`
--
ALTER TABLE `inventoryadjdet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1086;
--
-- AUTO_INCREMENT for table `inventorybrand`
--
ALTER TABLE `inventorybrand`
MODIFY `idinventorybrand` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventorycolor`
--
ALTER TABLE `inventorycolor`
MODIFY `idinventorycolor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventorygroup`
--
ALTER TABLE `inventorygroup`
MODIFY `idinventorygroup` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `inventorygroupdet`
--
ALTER TABLE `inventorygroupdet`
MODIFY `idinventorygroupdet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `inventorysize`
--
ALTER TABLE `inventorysize`
MODIFY `idinventorysize` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventorytype`
--
ALTER TABLE `inventorytype`
MODIFY `idinventorytype` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `idlocation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `materialused`
--
ALTER TABLE `materialused`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materialuseddet`
--
ALTER TABLE `materialuseddet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matusedtype`
--
ALTER TABLE `matusedtype`
MODIFY `idmatusedtype` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `navmenu`
--
ALTER TABLE `navmenu`
MODIFY `idnavmenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
MODIFY `idnotification` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notificationstatus`
--
ALTER TABLE `notificationstatus`
MODIFY `idnotificationstatus` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `partupload`
--
ALTER TABLE `partupload`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4572;
--
-- AUTO_INCREMENT for table `paytype`
--
ALTER TABLE `paytype`
MODIFY `idpaytype` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
MODIFY `idposition` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
MODIFY `idprofession` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `purchaseorderdet`
--
ALTER TABLE `purchaseorderdet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `purchasereturn`
--
ALTER TABLE `purchasereturn`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `purchasereturndet`
--
ALTER TABLE `purchasereturndet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
MODIFY `idsalesman` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `salesorderdet`
--
ALTER TABLE `salesorderdet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `salesreturn`
--
ALTER TABLE `salesreturn`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salesreturndet`
--
ALTER TABLE `salesreturndet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `salesservice`
--
ALTER TABLE `salesservice`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `salesservicedet`
--
ALTER TABLE `salesservicedet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `salesservicedet2`
--
ALTER TABLE `salesservicedet2`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `salesvehicle`
--
ALTER TABLE `salesvehicle`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `salesvehiclepay`
--
ALTER TABLE `salesvehiclepay`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `samsat`
--
ALTER TABLE `samsat`
MODIFY `idsamsat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shipgoodsdet`
--
ALTER TABLE `shipgoodsdet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slip`
--
ALTER TABLE `slip`
MODIFY `idslip` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stockopname`
--
ALTER TABLE `stockopname`
MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stockopnamedet`
--
ALTER TABLE `stockopnamedet`
MODIFY `idtransdet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subnavmenu`
--
ALTER TABLE `subnavmenu`
MODIFY `idsubnavmenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `idsupplier` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
MODIFY `idticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticketstatus`
--
ALTER TABLE `ticketstatus`
MODIFY `idticketstatus` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `top`
--
ALTER TABLE `top`
MODIFY `idtop` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
MODIFY `idunit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userauthorized`
--
ALTER TABLE `userauthorized`
MODIFY `iduserautorized` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `userlocauthorized`
--
ALTER TABLE `userlocauthorized`
MODIFY `iduserautorized` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
MODIFY `iduserlog` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
MODIFY `idusertype` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
MODIFY `idvehicle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12275;
--
-- AUTO_INCREMENT for table `vehiclecolor`
--
ALTER TABLE `vehiclecolor`
MODIFY `idvehiclecolor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehiclegroup`
--
ALTER TABLE `vehiclegroup`
MODIFY `idvehiclegroup` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehiclemodel`
--
ALTER TABLE `vehiclemodel`
MODIFY `idvehiclemodel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicleservice`
--
ALTER TABLE `vehicleservice`
MODIFY `idvehicleservice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `vehiclestock`
--
ALTER TABLE `vehiclestock`
MODIFY `idvehicle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
MODIFY `idvehicletype` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicleupload`
--
ALTER TABLE `vehicleupload`
MODIFY `idvehicle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `vehlicemodelgroup`
--
ALTER TABLE `vehlicemodelgroup`
MODIFY `idvehlicemodelgroup` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `vehlicemodelgroupdet`
--
ALTER TABLE `vehlicemodelgroupdet`
MODIFY `idvehlicemodelgroupdet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
MODIFY `idvillage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
MODIFY `idyear` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventoryadjdet`
--
ALTER TABLE `inventoryadjdet`
ADD CONSTRAINT `inventoryadjdet_ibfk_1` FOREIGN KEY (`transid`) REFERENCES `inventoryadj` (`idtrans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchaseorderdet`
--
ALTER TABLE `purchaseorderdet`
ADD CONSTRAINT `purchaseorderdet_ibfk_1` FOREIGN KEY (`transid`) REFERENCES `purchaseorder` (`idtrans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesorderdet`
--
ALTER TABLE `salesorderdet`
ADD CONSTRAINT `salesorderdet_ibfk_1` FOREIGN KEY (`transid`) REFERENCES `salesorder` (`idtrans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesreturndet`
--
ALTER TABLE `salesreturndet`
ADD CONSTRAINT `salesreturndet_ibfk_1` FOREIGN KEY (`transid`) REFERENCES `salesreturn` (`idtrans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesservicedet`
--
ALTER TABLE `salesservicedet`
ADD CONSTRAINT `salesservicedet_ibfk_1` FOREIGN KEY (`transid`) REFERENCES `salesservice` (`idtrans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesservicedet2`
--
ALTER TABLE `salesservicedet2`
ADD CONSTRAINT `salesservicedet2_ibfk_1` FOREIGN KEY (`transid`) REFERENCES `salesservice` (`idtrans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stockopnamedet`
--
ALTER TABLE `stockopnamedet`
ADD CONSTRAINT `stockopnamedet_ibfk_1` FOREIGN KEY (`transid`) REFERENCES `stockopname` (`idtrans`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
