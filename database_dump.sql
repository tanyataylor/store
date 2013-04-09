-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2012 at 10:36 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cust`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_phone`( IN incustId int, IN inphonetype varchar( 20 ) , IN inphonenumber bigint, out result varchar( 255 ) )
BEGIN DECLARE phonecount int;

SET transaction ISOLATION level SERIALIZABLE ;

START transaction;

SELECT count( * )
FROM Phone
WHERE incustId = cust_id into phonecount;

IF phonecount < 3 OR phonecount IS NULL THEN INSERT INTO Phone( cust_id, phone_type, phone_number )
VALUES (
incustId, inphonetype, inphonenumber
);

SET result = 'OK';

ELSE SET result = 'Customer cannot have more than 3 types of phone on file';

END IF ;

COMMIT ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reg_student`(IN instudentId int, IN insection int, in insemester char(3),
in incoursenumber int, in indept char(4), out result varchar(255)
)
BEGIN
  declare curcount int;
  set transaction isolation level serializable;
  start transaction;	
  select curcount = count(*) from registration where instudentid = studentid and
    insection = section and insemester = semester and indept = dept;	
  if curcount < 25 then
    insert into regstration (studentid,section,semester,dept) VALUES (instudentid, insection, insemester, indept);	
    set result = 'OK';
  else
    set result = 'Course full';
  end if;
  commit;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `lettergrade`(ingrade DECIMAL(5,2)) RETURNS char(1) CHARSET latin1
BEGIN
  IF ingrade >= 89.5 THEN
    RETURN 'A';
  ELSEIF ingrade >= 79.5 THEN 
    RETURN 'B';
  ELSEIF ingrade >= 69.5 THEN 
    RETURN 'C';
  ELSEIF ingrade >= 59.5 THEN 
    RETURN 'D';
  ELSE
    RETURN 'F';
  END IF;	
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `rating`(price DECIMAL(6,2)) RETURNS varchar(255) CHARSET latin1
BEGIN
IF price >= 750.01 THEN
RETURN 'You are a golden membership customer. Congratulations!';
ELSEIF price >= 500.01 THEN
RETURN 'You are a silver membership customer!';
ELSEIF price >= 250.01 THEN
RETURN 'Bronze membership. Please continue shopping with us!';
ELSE
RETURN 'Welcome to our membership club. You will earn points with each purchase.';
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE IF NOT EXISTS `Address` (
  `cust_id` int(10) NOT NULL AUTO_INCREMENT,
  `address_type` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house_apt` int(10) NOT NULL,
  `state` varchar(2) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  PRIMARY KEY (`cust_id`,`address_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`cust_id`, `address_type`, `street`, `house_apt`, `state`, `country`, `zip`) VALUES
(1, 'Home', 'Mist Lane', 7112, 'SC', 'USA', 29412),
(2, 'Home', 'George St.', 58, 'SC', 'USA', 29401),
(3, 'Office', 'Liberty St.', 81, 'SC', 'USA', 29403),
(4, 'Home', 'Queen St.', 87, 'ok', 'USA', 29401),
(5, 'Home', 'East Bay St.', 128, 'sc', 'usa', 29412),
(6, 'Home', 'Mary st.', 45, 'sc', 'USA', 29403);

-- --------------------------------------------------------

--
-- Table structure for table `Address_Type`
--

CREATE TABLE IF NOT EXISTS `Address_Type` (
  `address_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `address_type` varchar(20) NOT NULL,
  PRIMARY KEY (`address_type_id`),
  KEY `fk_Address_Type_Address_idx` (`address_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1005 ;

--
-- Dumping data for table `Address_Type`
--

INSERT INTO `Address_Type` (`address_type_id`, `address_type`) VALUES
(1000, 'Home'),
(1004, 'Hospital'),
(1001, 'Office'),
(1003, 'School'),
(1002, 'Work');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `cust_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(8) NOT NULL,
  `user_pass` varchar(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `SSN` int(11) DEFAULT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `SocailSecNum_UNIQUE` (`SSN`),
  KEY `fk_Customer_Address_idx` (`cust_id`),
  KEY `fk_Customer_Transactions_idx` (`cust_id`),
  KEY `fk_Customer_Phone_idx` (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`cust_id`, `user_login`, `user_pass`, `first_name`, `last_name`, `SSN`) VALUES
(1, 'kwelsh', 'qwerty', 'Kevin', 'Welsh', 555555544),
(2, 'rhopes', 'snow', 'Rachel', 'Hopes', 123412312),
(3, 'wsoon', '5t3e4r32', 'Will', 'Smith', 456145645),
(5, 'jkupriws', 'sunnyhere', 'Julie', 'Kupriwski', 696897887),
(8, 'benett', 'mypass456', 'Dani', 'Benett', 555555555);

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE IF NOT EXISTS `Inventory` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_code` int(24) NOT NULL,
  `item_department` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `item_price` int(10) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `fk_Inventory_Transaction_Items` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` (`item_id`, `item_code`, `item_department`, `item_description`, `item_price`) VALUES
(10, 1500, 'Living Room', 'Couch White', 516),
(11, 1501, 'Living Room', 'Table Black', 250),
(12, 1600, 'Kitchen', 'Silverware Set', 151),
(13, 1601, 'Kitchen', 'Plates Gift set', 90),
(14, 1602, 'Kitchen', 'Sink Set of 2', 760),
(15, 1700, 'Bedroom', 'Bed Frame', 458),
(16, 1701, 'Bedroom', 'Mattress Queen', 990),
(17, 1702, 'Bedroom', 'Mattress Twin', 680),
(18, 1703, 'Bedroom', 'Mattress King', 1358),
(19, 1800, 'Office Space', 'Computer Desk Small', 149),
(20, 1801, 'Office Space', 'White Board', 43),
(21, 1802, 'Office Space', 'Computer Chair', 139),
(22, 1803, 'Office Space', 'Trash Bin', 18);

-- --------------------------------------------------------

--
-- Table structure for table `Phone`
--

CREATE TABLE IF NOT EXISTS `Phone` (
  `cust_id` int(10) NOT NULL,
  `phone_type` varchar(20) NOT NULL,
  `phone_number` bigint(10) NOT NULL,
  PRIMARY KEY (`cust_id`,`phone_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Phone`
--

INSERT INTO `Phone` (`cust_id`, `phone_type`, `phone_number`) VALUES
(1, 'Fax', 8003073333),
(1, 'Home', 8433278888),
(1, 'Office', 8889997788),
(2, 'Home', 8884545555),
(3, '  Office  ', 4564564545),
(3, ' Office ', 2147483647),
(5, ' Fax ', 2147483647),
(5, ' Home ', 2147483647),
(5, 'Office', 4545556666);

-- --------------------------------------------------------

--
-- Stand-in structure for view `purchase_amount`
--
CREATE TABLE IF NOT EXISTS `purchase_amount` (
`cust_id` int(10)
,`transaction_id` int(24)
,`item_code` int(24)
,`item_department` varchar(255)
,`item_description` varchar(255)
,`item_price` int(10)
);
-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE IF NOT EXISTS `Transactions` (
  `transaction_id` int(24) NOT NULL AUTO_INCREMENT,
  `cust_id` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `fk_Transactions_Transactions_Items` (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`transaction_id`, `cust_id`, `date`) VALUES
(1, 3, '2012-10-04'),
(2, 3, '2012-10-04'),
(3, 3, '2012-11-03'),
(4, 6, '2012-11-04'),
(5, 1, '2012-10-07'),
(6, 1, '2012-11-19'),
(7, 1, '2012-09-10'),
(8, 1, '2012-10-01'),
(9, 2, '2012-09-10'),
(10, 4, '2012-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `Transaction_Items`
--

CREATE TABLE IF NOT EXISTS `Transaction_Items` (
  `item_id` int(10) NOT NULL,
  `transaction_id` int(24) NOT NULL,
  PRIMARY KEY (`item_id`,`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Transaction_Items`
--

INSERT INTO `Transaction_Items` (`item_id`, `transaction_id`) VALUES
(10, 1),
(11, 2),
(12, 3),
(13, 4),
(14, 5),
(15, 6),
(16, 7),
(17, 8),
(18, 9),
(19, 10);

-- --------------------------------------------------------

--
-- Structure for view `purchase_amount`
--
DROP TABLE IF EXISTS `purchase_amount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `purchase_amount` AS select `Transactions`.`cust_id` AS `cust_id`,`Transactions`.`transaction_id` AS `transaction_id`,`Inventory`.`item_code` AS `item_code`,`Inventory`.`item_department` AS `item_department`,`Inventory`.`item_description` AS `item_description`,`Inventory`.`item_price` AS `item_price` from (`Inventory` join (`Transaction_Items` join `Transactions` on((`Transaction_Items`.`transaction_id` = `Transactions`.`transaction_id`)))) where (`Inventory`.`item_id` = `Transaction_Items`.`item_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
