-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 07:49 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brandbucket`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(4) NOT NULL,
  `brand_name` varchar(20) NOT NULL,
  `brand_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_img`) VALUES
(1, 'samsung', 'img/user-tab/sam2.PNG'),
(2, 'oppo', 'img/user-tab/oppo.PNG'),
(3, 'asus', 'img/user-tab/asus.PNG'),
(4, 'lenovo', 'img/user-tab/lenovo.PNG'),
(5, 'apple', 'img/user-tab/apple.PNG'),
(8, 'Xiaomi', 'img/user-tab/mi.PNG'),
(9, 'razor', 'img/user-tab/razor.PNG'),
(12, 'belkin', 'img/user-tab/belkin.PNG'),
(13, 'lg', 'img/user-tab/lg.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(4) NOT NULL,
  `cust_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` int(10) NOT NULL,
  `discount` int(2) NOT NULL,
  `total_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'mobile accesories'),
(2, 'smartphone'),
(3, 'laptop'),
(4, 'network device'),
(5, 'nexus');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `cust_id` int(4) NOT NULL,
  `cust_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `address` varchar(60) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`cust_id`, `cust_name`, `username`, `password`, `email`, `phone`, `dob`, `address`, `gender`, `role`) VALUES
(1, 'susmoy bhattacharjee', 'susmoy58', '12345', 'bsusmoy@yahoo.com', '01837222121', '12-11-1994', 'rampura', 'male', 'customer'),
(2, 'ratul bakshi', 'bakshi', '54321', 'bakshi.ratul@gmail.com', '0155434322', '14-5-1995', 'nikunja,dhaka', 'male', 'admin'),
(3, 'Zahid rahman', 'zahid009', 'abcde', 'rahmanzahid94@gmail.com', '01795715448', '04-06-1994', 'uttara,dhaka', 'male', 'customer'),
(5, 'himu', 'error', '1234', 'himu@gmail.com', '01795715', '1-feb-2012', 'ty', 'male', 'customer'),
(7, 'xyz', 'xyz', 'abcde_', 'example@gmail.com', '01795715448', '1-jan-2011', 'erererer', 'male', 'customer'),
(8, 'auntu', 'auntu00', 'school', 'auntu00@gmail.com', '0178232324', '2-aug-2011', 'Bashundhara,Dhaka', 'male', 'customer'),
(9, 'Raisa', 'raisa009', '12345', 'raisa890@gmail.com', '0178232343', '2-mar-2012', 'uttara', 'female', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `product_id` int(4) NOT NULL,
  `discount_rate` float(10,2) NOT NULL,
  `status` varchar(5) NOT NULL,
  `days` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`product_id`, `discount_rate`, `status`, `days`) VALUES
(3, 10.00, 'on', 5),
(101, 5.00, 'on', 2),
(102, 0.00, 'off', 0),
(103, 5.00, 'on', 10),
(104, 0.00, 'off', 0),
(202, 0.00, 'off', 0),
(301, 0.00, 'off', 0),
(302, 0.00, 'off', 0),
(303, 0.00, 'off', 0),
(304, 0.00, 'off', 0),
(305, 20.00, 'on', 10),
(401, 0.00, 'off', 0),
(1301, 0.00, 'off', 0);

-- --------------------------------------------------------

--
-- Table structure for table `letterbox`
--

CREATE TABLE `letterbox` (
  `letter_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comments` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letterbox`
--

INSERT INTO `letterbox` (`letter_id`, `name`, `email`, `comments`) VALUES
(1, 'zahid', 'rahmanzahid94@gmail.com', 'i want xiaomi A1 official smartphone. Can you please bring that model?'),
(2, 'raju', 'raju@gmail.com', 'hi, this is raju I looked up for oppo smartphone and I suddenly saw that an Asus brand phone appears on the oppo brand section . Please change it as soon as possible'),
(3, 'ahmed', 'ahmed@yahoo.com', 'this is website is very helpful to me.Thanks for making this :)'),
(4, 'zahid', 'rahmanzahid94@gmail.com', 'sir i want i phone x please include this for me');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `brand_id` int(4) NOT NULL,
  `category_id` int(10) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_quantity`, `price`, `brand_id`, `category_id`, `product_img`, `product_description`) VALUES
(101, 'Samsung  Charger', 10, 1200, 1, 1, 'img/product-pic/samsung/Samsung Adaptive Charger.png', '5200Amh power, 5 hrs back charge, quick charging'),
(102, 'Samsung Galaxy J7 Pro', 5, 40000, 1, 2, 'img/product-pic/samsung/Samsung Galaxy J7 Pro.png', 'good'),
(103, 'Samsung Galaxy S7 edge', 4, 75000, 1, 2, 'img/product-pic/samsung/Samsung Galaxy S7 edge.png', 'fsdfsd'),
(104, 'Samsung  Earphone ', 100, 500, 1, 1, 'img/product-pic/samsung/Samsung Galaxy S6 in-Ear Wired Earphone With Mic.png', 'dsfsdf'),
(301, 'Asus Fonepad 00893pi', 10, 1200, 3, 2, 'img/product-pic/asus/Asus Fonepad.png', 'good'),
(302, 'Asus X540UP Laptop - Core i5', 2, 45000, 3, 3, 'img/product-pic/asus/Asus X540UP Laptop - Core i5.png', 'very very good'),
(303, 'Asus Google Nexus 7', 2, 21000, 3, 2, 'img/product-pic/asus/Asus Google Nexus 7 .png', 'The tablet comes with a 7.00-inch display with a resolution of 1280 pixels by 800 pixels at a PPI of 216 pixels per inch. Asus Google Nexus 7 3G price in India starts from Rs. 59,045. The Asus Google Nexus 7 3G is powered by 1.2GHz quad-core Nvidia Tegra 3 processor and it comes with 1GB of RAM'),
(304, 'Asus Zenfone 2 (Official)', 3, 45000, 3, 2, 'img/product-pic/asus/Asus Zenfone 2.png', 'Asus ZenFone 2. Asus ZenFone 2 smartphone was launched in January 2015. The phone comes with a 5.50-inch touchscreen display with a resolution of 1080 pixels by 1920 pixels at a PPI of 403 pixels per inch. ... The Asus ZenFone 2 is powered by 2.3GHz quad-core Intel Atom Z3580 processor and it comes with 4GB of RAM.'),
(305, 'Asus Zenfone Go', 5, 24000, 3, 2, 'img/product-pic/asus/Asus Zenfone Go.png', 'The phone comes with a 5.00-inch touchscreen display with a resolution of 720 pixels by 1280 pixels. Asus ZenFone Go price in India starts from Rs. 4,450. The Asus ZenFone Go is powered by 1.3GHz quad-core MediaTek MT6580 processor and it comes with 2GB of RAM.'),
(401, 'Lenovo K3 Note', 3, 30500, 4, 2, 'img/product-pic/lenovo/Lenovo K3 Note.png', 'this is good'),
(1301, 'LG G6 smartphone', 4, 20000, 13, 2, 'img/product-pic/lg/LG G6.PNG', 'sdhfjjshdfkfsd');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(10) NOT NULL,
  `brand_id` int(4) NOT NULL,
  `product_id` int(10) NOT NULL,
  `rating` int(1) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `feedback` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `brand_id`, `product_id`, `rating`, `cust_id`, `feedback`) VALUES
(1, 3, 303, 4, 8, 'this smartphone is good '),
(2, 3, 302, 1, 8, 'totally waste laptop that i have ever seen'),
(3, 3, 301, 3, 8, 'average');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `product_id` int(4) NOT NULL,
  `cust_id` int(4) NOT NULL,
  `delivery_date` varchar(15) NOT NULL,
  `ordered_time` varchar(15) NOT NULL,
  `payment` float(8,2) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `product_id`, `cust_id`, `delivery_date`, `ordered_time`, `payment`, `quantity`) VALUES
(1, 101, 1, '19-11-2017', '12-11-2017', 280.00, 1),
(2, 101, 3, '20-11-2017', '13-11-2017', 560.00, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `cart_id` (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD UNIQUE KEY `category_id` (`category_id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD UNIQUE KEY `cust id` (`cust_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD UNIQUE KEY `product id` (`product_id`);

--
-- Indexes for table `letterbox`
--
ALTER TABLE `letterbox`
  ADD PRIMARY KEY (`letter_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `product id` (`product_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD UNIQUE KEY `cust id` (`cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `cust_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `letterbox`
--
ALTER TABLE `letterbox`
  MODIFY `letter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
