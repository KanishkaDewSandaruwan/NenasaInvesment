-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 05:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nenasa_nvestment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `apply_id` int(11) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `job_id` int(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `additional_details` varchar(255) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `date_updated` datetime NOT NULL,
  `apply_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`apply_id`, `customer_id`, `job_id`, `resume`, `additional_details`, `is_deleted`, `date_updated`, `apply_status`) VALUES
(1, 3, 1, 'testimonial-1.jpg', '<p>asasa</p>', 0, '2022-10-29 00:15:25', 0),
(2, 3, 3, 'Project Report.pdf', '<p>sasas</p>', 0, '2022-10-29 00:43:36', 0),
(3, 3, 7, 'Project Report.pdf', '<p>sas</p>', 0, '2022-11-08 23:40:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `cat_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `is_deleted`, `date_updated`) VALUES
(1, 'Shoe', 'download.jfif', 1, '2022-09-11 11:19:40'),
(2, 'Slipers', 'images.jfif', 1, '2022-09-05 21:19:24'),
(3, 'Slipers', 'images.jfif', 1, '2022-09-05 21:22:19'),
(4, 'dd', 'images.jfif', 1, '2022-09-05 21:21:35'),
(5, 'Phone Acc', 'hImYqMss.png', 1, '2022-09-05 22:23:22'),
(6, '', 'bottles-famous-global-beer-brands-poznan-pol-mar-including-heineken-becks-bud-miller-corona-stella-artois-san-miguel-143170440.jpg', 1, '2022-10-01 10:17:33'),
(7, 'Foods', 'bottles-famous-global-beer-brands-poznan-pol-mar-including-heineken-becks-bud-miller-corona-stella-artois-san-miguel-143170440.jpg', 0, '2022-10-01 10:18:50'),
(8, 'Drinks', 'bottles-famous-global-beer-brands-poznan-pol-mar-including-heineken-becks-bud-miller-corona-stella-artois-san-miguel-143170440.jpg', 0, '2022-10-01 10:20:19'),
(9, 'Burger', 'download.jfif', 0, '2022-10-01 14:49:14'),
(10, 'Burger', 'download.jfif', 1, '2022-10-01 14:49:15'),
(11, 'Burger', 'fast-food.jpg', 1, '2022-10-01 14:49:40'),
(12, 'Tacos', 'aussie-style-beef-and-salad-tacos-86525-1.jpeg', 1, '2022-10-01 15:35:24'),
(13, 'Dew', 'dsd.PNG', 1, '2022-10-01 22:24:45'),
(14, 'Dews', 'dsd.PNG', 1, '2022-10-01 22:26:14'),
(15, 'Main', 'download.jfif', 1, '2022-10-02 13:43:02'),
(16, 'dew', 'download.jfif', 1, '2022-10-02 13:43:56'),
(17, 'dew', 'download.jfif', 1, '2022-10-02 13:44:36'),
(18, 'dew', 'download.jfif', 1, '2022-10-02 13:46:58'),
(19, 'dew', 'Basin Mixer.jpg', 1, '2022-10-02 13:48:13'),
(20, 'Beer', 'images.jfif', 1, '2022-10-02 15:37:27'),
(21, 'Beer', 'images.jfif', 1, '2022-10-02 15:37:29'),
(22, 'Beer', 'images.jfif', 1, '2022-10-02 15:37:48'),
(23, 'Beer', 'images.jfif', 1, '2022-10-02 15:37:55'),
(24, 'ss', 'download.jpg', 0, '2022-11-20 08:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `company_description` varchar(9999) NOT NULL,
  `website` varchar(255) NOT NULL,
  `facbook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `lonkdin` varchar(255) NOT NULL,
  `company_login_email` varchar(255) NOT NULL,
  `company_password` varchar(255) NOT NULL,
  `company_admin_email` varchar(255) NOT NULL,
  `company_admin_phone` int(10) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `date_updated` datetime NOT NULL,
  `permision` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `tagline`, `company_description`, `website`, `facbook`, `twitter`, `lonkdin`, `company_login_email`, `company_password`, `company_admin_email`, `company_admin_phone`, `company_logo`, `is_deleted`, `date_updated`, `permision`) VALUES
(1, 'SEUSL', 'sas', '<p>sas</p>', 'sasa', 'sas', 'sas', 'sasa', 'kanishkadewsn@gmail.com', '123456', 'kanishkadewsn@gmail.com', 2147483647, 'product-1.jpg', 1, '2022-10-28 17:14:51', 1),
(2, 'Maytech Technology SL', 'Maytech', '<p>aasas dsdsds sasa</p>', '', '', '', '', 'company@gmail.com', '12345', 'kanishkadewsandaruwan@gmail.com', 713664071, 'job_logo_5.jpg', 1, '2022-10-28 17:28:48', 1),
(3, 'Maytech Technology', 'sas', '<p>ss</p>', 'sa', 'sas', 'sas', 'sas', 'maytech@gmail.com', '123456', 'maytech@gmail.com', 713664071, 'banner-2.jpg', 0, '2022-11-08 00:41:04', 1),
(4, 'ss', 'ss', '<p>sss</p>', 'ss', 'sas', 'sas', 'sas', 'admin@gmail.com', '123456', 'kanishkadewsandaruwan@gmail.com', 723694071, 'Basin Mixer.jpg', 0, '2022-11-09 00:16:33', 0),
(5, 'Maytech Technology SLS', 'sas', '<p>sasas</p>', 'ss', 'ss', 'ss', 'ss', 'dew@gmail.com', '123456', 'kanishkadewsandaruwan@gmail.com', 713664071, 'download.jpg', 1, '2022-11-20 11:25:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `subject`, `message`, `date_updated`) VALUES
(4, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', '0713664071', 'sas', '2022-09-12 22:35:23'),
(5, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', '0713664071', 'dsds', '2022-09-15 10:28:09'),
(15, 'Muthuwana Acharige Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', 'sss', 'sss', '2022-11-07 13:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` int(2) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `permision` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `phone`, `nic`, `address`, `gender`, `password`, `is_deleted`, `permision`) VALUES
(1, '', 'admin', '', '', '', 0, '123456', 0, 1),
(2, 'Thilini Maheshika', 'thili@gmail.com', '0713664071', '962670426G', 'Banwalgodalla, Kosmulla', 2, '123456', 1, 2),
(3, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', '0713664071', '962670426G', 'Banwalgodalla, Kosmulla', 1, '123456', 0, 1),
(4, 'Thilini Maheshika', 'thili@gmail.com', '0713664071', '992670426V', 'Banwalgodalla, Kosmulla', 0, '123456', 1, 2),
(5, 'Muthuwana Acharige Kanishka Dew Sandaruwan', 'thili@gmail.com', '0723694071', '992670426V', 'Banwalgodalla, Kosmulla', 1, '123456', 1, 2),
(6, 'Muthuwana Acharige Kanishka Dew Sandaruwan', 'Kanishkadewsandaruwan9@gmail.com', '0723694071', '992670426V', 'Banwalgodalla, Kosmulla', 1, '123456', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_image` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `type` int(10) NOT NULL,
  `job_description` varchar(9999) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `job_active` int(2) NOT NULL,
  `closing_date` date NOT NULL,
  `date_updated` datetime NOT NULL,
  `company_id` int(11) NOT NULL,
  `cat_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_image`, `job_title`, `job_location`, `type`, `job_description`, `is_deleted`, `job_active`, `closing_date`, `date_updated`, `company_id`, `cat_id`) VALUES
(1, 'img_1.jpg', 'Software Engineer ', 'Colombo', 0, '<p>asasasÂ </p>', 0, 1, '2022-10-31', '0000-00-00 00:00:00', 2, 0),
(2, 'testimonial-2.jpg', 'Marketing Manager', 'Colombo', 0, '<p>asasasa</p>', 1, 0, '2022-10-28', '0000-00-00 00:00:00', 2, 0),
(3, 'testimonial-3.jpg', 'Web developer', 'Colombo', 1, '<p>saaasa</p>', 0, 0, '2022-10-28', '0000-00-00 00:00:00', 2, 0),
(4, 'blog-1.jpg', 'Assosiate Software Engineer ', 'Colombo', 1, '<p>sasasas</p>', 0, 0, '2022-10-28', '0000-00-00 00:00:00', 2, 0),
(5, 'blog-2.jpg', 'Sineor Software Engineer', 'Matara', 0, '<p>asasasa</p>', 0, 0, '0000-00-00', '2022-10-28 22:42:39', 2, 0),
(6, 'about.jpg', 'Farmer', 'Matara', 0, '<p>ddsds</p>', 0, 0, '2022-11-01', '2022-10-28 22:44:20', 2, 0),
(7, 'Basin Mixer.jpg', 'Software ', 'Colombo', 0, '<p><b>Software Enginerr virtsa</b></p>', 0, 0, '2022-11-17', '2022-11-08 00:46:25', 3, 0),
(8, 'images (1).jpeg', 'Software Engineer', 'Colombo', 0, '<p>sas</p>', 0, 0, '2022-11-25', '2022-11-20 08:41:55', 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `review_review` varchar(255) NOT NULL,
  `review_name` varchar(255) NOT NULL,
  `review_email` varchar(255) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `review_review`, `review_name`, `review_email`, `date_updated`) VALUES
(2, 'sasa', 'Kanisha', 'kanishkadewsandaruwan@gmail.com', '2022-10-21 16:19:15'),
(3, 'asasas', 'Sandaruwan', 'asa@gmail.com', '2022-10-21 16:31:48'),
(5, 'ss', 'Kanisha', 'ss', '2022-11-08 00:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `header_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `header_title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `header_desc` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `about_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `about_desc` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `company_phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `sub_image` varchar(255) NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `link_facebook` varchar(255) NOT NULL,
  `link_twiiter` varchar(255) NOT NULL,
  `link_instragram` varchar(255) NOT NULL,
  `login_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`header_image`, `header_title`, `header_desc`, `about_title`, `about_desc`, `company_phone`, `company_email`, `company_address`, `sub_image`, `about_image`, `link_facebook`, `link_twiiter`, `link_instragram`, `login_image`) VALUES
('hero_1.jpg', 'Welcome to Nanasa', 'With this shop hompeage ', 'About Us', 'sajskajskajskjask', '0713664076', 'asn@gmail.com', 'Banwalgodalla, Kosmulla', 'banner-1.jpg', 'img_1.jpg', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'Spouts.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
