-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2016 at 07:51 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buzztm`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `no_of_page` int(1) NOT NULL,
  `product_per_page` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `company` varchar(11) NOT NULL,
  `category` varchar(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `publish` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `slug`, `no_of_page`, `product_per_page`, `created`, `modified`, `company`, `category`, `created_by`, `publish`) VALUES
(1, 'Book newsd asdasd asd asd', 'Book-newsd-asdasd-asd-asd', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2, 0),
(3, 'Book new Clone', 'Book-new-Clone', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2, 0),
(4, 'Book new Clone2', 'Book-new-Clone2', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2, 0),
(5, 'Book new', 'Book-new', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '2', 2, 0),
(6, 'Book new', 'Book-new', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2, 0),
(7, 'Book new', 'Book-new', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2, 0),
(8, 'App Title', 'App-Title', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2, 0),
(9, 'App Title', 'App-Title', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_templates`
--

CREATE TABLE `book_templates` (
  `id` int(11) NOT NULL,
  `category` varchar(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `page` int(1) NOT NULL,
  `template` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `parent` int(1) NOT NULL,
  `template_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_templates`
--

INSERT INTO `book_templates` (`id`, `category`, `name`, `page`, `template`, `book_id`, `parent`, `template_image`) VALUES
(1, '', 'Home Page', 1, -1, 1, 0, 'template_792641458113110.png'),
(2, '', 'About us', 2, -1, 1, 0, 'template_912051458105720.png'),
(3, '', 'Product Page 1', 4, -1, 1, 0, 'template_998881458105720.png'),
(4, '', 'Social Wall', 5, -1, 1, 0, 'template_338641458105720.png'),
(5, '', 'Contact us', 6, -1, 1, 0, 'template_747741458105720.png'),
(6, '', 'Home Page', 1, -1, 3, 0, 'template_321581458105753.png'),
(7, '', 'About us', 2, -1, 3, 0, 'template_401801458105753.png'),
(8, '', 'Product Page 1', 4, -1, 3, 0, 'template_186761458105753.png'),
(9, '', 'Social Wall', 5, -1, 3, 0, 'template_289761458105753.png'),
(10, '', 'Contact us', 6, -1, 3, 0, 'template_669561458105753.png'),
(11, '', 'Home Page', 1, -1, 4, 0, 'template_165141458105753.png'),
(12, '', 'About us', 2, -1, 4, 0, 'template_891521458105753.png'),
(13, '', 'Product Page 1', 4, -1, 4, 0, 'template_274461458105753.png'),
(14, '', 'Social Wall', 5, -1, 4, 0, 'template_168591458105753.png'),
(15, '', 'Contact us', 6, -1, 4, 0, 'template_725361458105753.png'),
(16, '', 'Home Page', 1, -1, 5, 0, 'template_455641458105753.png'),
(17, '', 'About us', 2, -1, 5, 0, 'template_375481458105753.png'),
(18, '', 'Product Page 1', 4, -1, 5, 0, 'template_790871458105753.png'),
(19, '', 'Social Wall', 5, -1, 5, 0, 'template_165791458105753.png'),
(20, '', 'Contact us', 6, -1, 5, 0, 'template_629141458105753.png'),
(21, '', 'Home Page', 1, -1, 6, 0, 'template_231711458105753.png'),
(22, '', 'About us', 2, -1, 6, 0, 'template_508651458105753.png'),
(23, '', 'Product Page 1', 4, -1, 6, 0, 'template_569761458105753.png'),
(24, '', 'Sub Page', 0, -1, 6, 23, 'template_939801458105753.png'),
(25, '', 'Sub Page', 0, -1, 6, 23, 'template_815371458105753.png'),
(26, '', 'Social Wall', 5, -1, 6, 0, 'template_405241458105753.png'),
(27, '', 'Contact us', 6, -1, 6, 0, 'template_909501458105753.png'),
(28, '', 'Home Page', 1, -1, 7, 0, 'template_470941458105753.png'),
(29, '', 'About us', 2, -1, 7, 0, 'template_876461458105754.png'),
(30, '', 'Product Page 1', 4, -1, 7, 0, 'template_230651458105754.png'),
(31, '', 'Social Wall', 5, -1, 7, 0, 'template_601671458105754.png'),
(32, '', 'Contact us', 6, -1, 7, 0, 'template_528121458105754.png'),
(33, '', 'Sub Page', 0, -1, 1, 3, 'template_498311458105754.png'),
(34, '', 'Sub Page', 0, -1, 1, 3, 'template_179331458105754.png'),
(35, '', 'Sub Page', 0, -1, 1, 3, ''),
(36, '', 'Home Page', 1, -1, 8, 0, 'template_541661458298872.png'),
(37, '', 'About us', 2, -1, 8, 0, 'template_534121458106493.png'),
(38, '', 'Product Page 1', 4, -1, 8, 0, 'template_582161458106342.png'),
(39, '', 'Social Wall', 5, -1, 8, 0, 'template_539651458106494.png'),
(40, '', 'Contact us', 6, -1, 8, 0, 'template_852181458106494.png'),
(41, '', 'Sub Page', 0, -1, 8, 38, ''),
(42, '', 'Sub Page', 0, -1, 8, 38, ''),
(43, '', 'Sub Page', 0, -1, 8, 38, ''),
(44, '', 'Sub Page', 0, -1, 8, 38, ''),
(49, '', 'Navigation', 3, -1, 8, 0, 'template_860101458106493.png'),
(50, '', 'Product Page 2', 4, -1, 8, 0, 'template_711581458106494.png'),
(51, '', 'Sub Page', 0, -1, 8, 50, ''),
(52, '', 'Sub Page', 0, -1, 8, 50, ''),
(53, '', 'Product Page 3', 4, -1, 8, 0, 'template_231361458106494.png'),
(54, '', 'Home Page', 1, -1, 9, 0, 'template_730271458568432.png'),
(55, '', 'About us', 2, -1, 9, 0, 'template_277581458563835.png'),
(56, '', 'Product Page 1', 4, -1, 9, 0, 'template_578071458563835.png'),
(57, '', 'Social Wall', 5, -1, 9, 0, 'template_483471458563835.png'),
(58, '', 'Contact us', 6, -1, 9, 0, 'template_936951458563835.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Retail'),
(3, 'Restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `template_image` text NOT NULL,
  `page_type` varchar(11) NOT NULL,
  `category_type` varchar(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `textbox` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `template_name`, `template_image`, `page_type`, `category_type`, `width`, `height`, `textbox`, `image`, `created_by`, `created`, `modified`, `parent`) VALUES
(1, 'Template text', 'template_1.png', '6', '3', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'Template text', 'template_2.png', '5', '3', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'Template text', 'template_3.png', '4', '3', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'Template text', 'template_4.png', '2', '2', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'ghdfghd', 'template_7.png', '1', '3', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'Template text', 'template_8.png', '3', '3', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 'ghdfghd', 'template_9.png', '1', '2', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 'Template text', 'template_10.png', '1', '3', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 'Template text', 'template_11.png', '4', '2', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, 'Template text', 'template_12.png', '3', '2', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(13, 'Template text', 'template_13.png', '5', '2', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(14, 'Template text', 'template_14.png', '6', '2', 400, 500, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `template_attributes`
--

CREATE TABLE `template_attributes` (
  `id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_template_id` int(11) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `pos_top` varchar(11) NOT NULL,
  `pos_left` varchar(11) NOT NULL,
  `link` text NOT NULL,
  `width` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `font_size` varchar(20) NOT NULL,
  `bold` int(1) NOT NULL,
  `text_align` varchar(20) NOT NULL,
  `color` varchar(10) NOT NULL,
  `external_link` text NOT NULL,
  `line_height` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_attributes`
--

INSERT INTO `template_attributes` (`id`, `template_id`, `book_id`, `book_template_id`, `field_type`, `value`, `pos_top`, `pos_left`, `link`, `width`, `height`, `font_size`, `bold`, `text_align`, `color`, `external_link`, `line_height`) VALUES
(43, -1, 3, 6, 'text', 'Input 1', '0', '0', '', '20%', '', '', 0, 'left', '', '', 0),
(44, -1, 3, 6, 'text', 'Input 2', '49.80%', '69.75%', '', '20%', '', '', 0, 'left', '', '', 0),
(45, -1, 3, 6, 'text', 'Input 3', '18.00%', '39.50%', '', '20%', '', '', 0, 'left', '', '', 0),
(46, -1, 3, 6, 'text', 'Input 4', '30.00%', '8.75%', '', '20%', '', '', 0, 'left', '', '', 0),
(47, -1, 3, 6, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(48, -1, 3, 7, 'image', '/buzztm/img/image_placeholder.png', '0', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(49, -1, 3, 7, 'image', '/buzztm/img/image_placeholder.png', '21.00%', '79.75%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(50, -1, 3, 7, 'image', '/buzztm/img/image_placeholder.png', '19.60%', '8.00%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(51, -1, 3, 7, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(52, -1, 3, 8, 'image', '/buzztm/img/image_placeholder.png', '0', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(53, -1, 3, 8, 'image', '/buzztm/img/image_placeholder.png', '55.40%', '28.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(54, -1, 3, 8, 'image', '/buzztm/img/image_placeholder.png', '25.40%', '4.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(55, -1, 3, 8, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(56, -1, 3, 9, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '50%', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(57, -1, 3, 9, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '11.80%', '74.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(58, -1, 3, 9, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '12.20%', '17.75%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(59, -1, 3, 9, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(60, -1, 3, 10, 'text', 'Input 1', '0', '0', '', '20%', '', '', 0, 'left', '', '', 0),
(61, -1, 3, 10, 'image', '/buzztm/img/image_placeholder.png', '0', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(62, -1, 3, 10, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '50%', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(63, -1, 3, 10, 'background', 'url(''/buzztm/upload/template/973091456819916.jpg'')  no-repeat scroll 0 0 / 100% 100% ', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(64, -1, 4, 11, 'text', 'Input 1', '0', '0', '', '20%', '', '', 0, 'left', '', '', 0),
(65, -1, 4, 11, 'text', 'Input 2', '49.80%', '69.75%', '', '20%', '', '', 0, 'left', '', '', 0),
(66, -1, 4, 11, 'text', 'Input 3', '18.00%', '39.50%', '', '20%', '', '', 0, 'left', '', '', 0),
(67, -1, 4, 11, 'text', 'Input 4', '30.00%', '8.75%', '', '20%', '', '', 0, 'left', '', '', 0),
(68, -1, 4, 11, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(69, -1, 4, 12, 'image', '/buzztm/img/image_placeholder.png', '0', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(70, -1, 4, 12, 'image', '/buzztm/img/image_placeholder.png', '21.00%', '79.75%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(71, -1, 4, 12, 'image', '/buzztm/img/image_placeholder.png', '19.60%', '8.00%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(72, -1, 4, 12, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(73, -1, 4, 13, 'image', '/buzztm/img/image_placeholder.png', '0', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(74, -1, 4, 13, 'image', '/buzztm/img/image_placeholder.png', '55.40%', '28.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(75, -1, 4, 13, 'image', '/buzztm/img/image_placeholder.png', '25.40%', '4.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(76, -1, 4, 13, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(77, -1, 4, 14, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '50%', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(78, -1, 4, 14, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '11.80%', '74.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(79, -1, 4, 14, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '12.20%', '17.75%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(80, -1, 4, 14, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(81, -1, 4, 15, 'text', 'Input 1', '0', '0', '', '20%', '', '', 0, 'left', '', '', 0),
(82, -1, 4, 15, 'image', '/buzztm/img/image_placeholder.png', '0', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(83, -1, 4, 15, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '50%', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(84, -1, 4, 15, 'background', 'url(''/buzztm/upload/template/973091456819916.jpg'')  no-repeat scroll 0 0 / 100% 100% ', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(237, -1, 5, 16, 'text', 'Input 1', '30.20%', '22.75%', '', '20%', '', '', 0, 'left', '', '', 0),
(238, -1, 5, 16, 'text', 'Input 2', '36.00%', '70.50%', '', '20%', '', '', 0, 'left', '', '', 0),
(239, -1, 5, 16, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(240, -1, 5, 17, 'image', '/buzztm/img/image_placeholder.png', '0', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(241, -1, 5, 17, 'image', '/buzztm/img/image_placeholder.png', '37.60%', '72.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(242, -1, 5, 17, 'image', '/buzztm/img/image_placeholder.png', '31.60%', '12.00%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(243, -1, 5, 17, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(244, -1, 5, 18, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '27.60%', '63.25%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(245, -1, 5, 18, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '24.80%', '8.25%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(246, -1, 5, 18, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(247, -1, 5, 19, 'text', 'Input 1', '0', '0', '', '20%', '', '', 0, 'left', '', '', 0),
(248, -1, 5, 19, 'text', 'Input 2', '39.20%', '66.50%', '', '20%', '', '', 0, 'left', '', '', 0),
(249, -1, 5, 19, 'text', 'Input 3', '62.40%', '17.00%', '', '20%', '', '', 0, 'left', '', '', 0),
(250, -1, 5, 19, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(251, -1, 5, 20, 'text', 'Input 1', '64.20%', '11.50%', '', '20%', '', '', 0, 'left', '', '', 0),
(252, -1, 5, 20, 'text', 'Input 2', '62.60%', '80.00%', '', '20%', '', '', 0, 'left', '', '', 0),
(253, -1, 5, 20, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(254, -1, 6, 21, 'text', 'Input 1', '0', '0', '', '', '', '', 0, '', '', '', 0),
(255, -1, 6, 21, 'text', 'Input 2', '34.60%', '68.50%', '', '', '', '', 0, '', '', '', 0),
(256, -1, 6, 21, 'background', '#fff', '', '', '', '', '', '', 0, '', '', '', 0),
(257, -1, 6, 22, 'image', '/buzztm/img/image_placeholder.png', '0', '50%', '', '20%', 'auto', '', 0, '', '', '', 0),
(258, -1, 6, 22, 'image', '/buzztm/img/image_placeholder.png', '40.00%', '13.00%', '', '20%', 'auto', '', 0, '', '', '', 0),
(259, -1, 6, 22, 'background', '#fff', '', '', '', '', '', '', 0, '', '', '', 0),
(260, -1, 6, 23, 'text', 'Input 1', '0', '0', '', '', '', '', 0, '', '', '', 0),
(261, -1, 6, 23, 'text', 'Input 2', '0', '0', '', '', '', '', 0, '', '', '', 0),
(262, -1, 6, 23, 'text', 'Input 3', '0', '0', '', '', '', '', 0, '', '', '', 0),
(263, -1, 6, 23, 'background', '#fff', '', '', '', '', '', '', 0, '', '', '', 0),
(264, -1, 6, 24, 'text', 'Input 1', '0', '0', '', '', '', '', 0, '', '', '', 0),
(265, -1, 6, 24, 'text', 'Input 2', '28.00%', '56.25%', '', '', '', '', 0, '', '', '', 0),
(266, -1, 6, 24, 'text', 'Input 3', '44.40%', '7.75%', '', '', '', '', 0, '', '', '', 0),
(267, -1, 6, 24, 'background', '#fff', '', '', '', '', '', '', 0, '', '', '', 0),
(268, -1, 6, 25, 'background', '#fff', '', '', '', '', '', '', 0, '', '', '', 0),
(269, -1, 6, 26, 'background', '#fff', '', '', '', '', '', '', 0, '', '', '', 0),
(270, -1, 6, 27, 'image', '/buzztm/img/image_placeholder.png', '0', '50%', '', '20%', 'auto', '', 0, '', '', '', 0),
(271, -1, 6, 27, 'image', '/buzztm/img/image_placeholder.png', '34.00%', '18.00%', '', '20%', 'auto', '', 0, '', '', '', 0),
(272, -1, 6, 27, 'background', '#fff', '', '', '', '', '', '', 0, '', '', '', 0),
(289, -1, 7, 28, 'text', 'Input 1', '32.20%', '30.50%', '', '20%', '', '', 0, 'left', 'd92070', '', 0),
(290, -1, 7, 28, 'text', 'Input 2', '58.40%', '9.25%', '', '20%', '', '', 0, 'left', '20d920', '', 0),
(291, -1, 7, 28, 'text', 'Input 3', '46.00%', '67.00%', '', '20%', '', '', 0, 'left', '2036d9', '', 0),
(292, -1, 7, 28, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '63.20%', '29.00%', '', '41%', 'auto', '', 0, '', '', '', 0),
(293, -1, 7, 28, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(294, -1, 7, 29, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(295, -1, 7, 30, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(296, -1, 7, 31, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(297, -1, 7, 32, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(1066, -1, 1, 1, 'text', 'Gary''s Pet World was established in 1993 by Gary Cooney as a supermarket-style shop where customers can browse and buy from a vast range of competitively priced products. Gary''s quickly became the largest one-stop pet shop in Ireland gaining a nationwide reputation for service excellence in a friendly and homely environment.  ', '2.20%', '12.25%', '', '54%', '', '15px', 0, 'left', '', '', 0),
(1067, -1, 1, 1, 'image', '/buzztm/upload/template/973091456819916.jpg', '71.20%', '78.00%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1068, -1, 1, 1, 'image', '/buzztm/upload/template/116311455788757.png', '75.00%', '54.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1069, -1, 1, 1, 'image', '/buzztm/upload/template/188581456308433.png', '84.00%', '3.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1070, -1, 1, 1, 'image', '/buzztm/upload/template/147101456308383.jpg', '73.40%', '26.75%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1071, -1, 1, 1, 'image', '/buzztm/upload/template/211421456308722.png', '71.80%', '3.75%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1072, -1, 1, 1, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(1073, -1, 1, 2, 'image', '/buzztm/upload/template/900361457072663.jpg', '0', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1074, -1, 1, 2, 'image', '/buzztm/img/image_placeholder.png', '21.00%', '79.75%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1075, -1, 1, 2, 'image', '/buzztm/img/image_placeholder.png', '19.60%', '8.00%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1076, -1, 1, 2, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(1077, -1, 1, 3, 'image', '/buzztm/img/image_placeholder.png', '0', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1078, -1, 1, 3, 'image', '/buzztm/img/image_placeholder.png', '55.40%', '28.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1079, -1, 1, 3, 'image', '/buzztm/img/image_placeholder.png', '25.40%', '4.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1080, -1, 1, 3, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(1081, -1, 1, 33, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(1082, -1, 1, 34, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(1083, -1, 1, 35, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(1084, -1, 1, 4, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '50%', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1085, -1, 1, 4, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '11.80%', '74.50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1086, -1, 1, 4, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '12.20%', '17.75%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1087, -1, 1, 4, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(1088, -1, 1, 5, 'text', 'Input 1', '0', '0', '', '20%', '', '', 0, 'left', '', '', 0),
(1089, -1, 1, 5, 'image', '/buzztm/img/image_placeholder.png', '0', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1090, -1, 1, 5, 'video', 'https://www.youtube.com/embed/BtufKuPCJMo', '50%', '50%', '', '20%', 'auto', '', 0, 'left', '', '', 0),
(1091, -1, 1, 5, 'background', 'url(''/buzztm/upload/template/973091456819916.jpg'')  no-repeat scroll 0 0 / 100% 100% ', '', '', '', '20%', '', '', 0, 'left', '', '', 0),
(1202, -1, 8, 36, 'text', 'Enter your textt yfghdfgh dfghdfg hdfgh dfghdfg hdfghdfgh dfghdfghdf ghg hdfghdf ghdfgh dfghdfgh dfghdfgh fdghd fg ghdfgh fghfdg  hdfghdfgh dfgh', '0.00%', '19.25%', '', '42%', '', '', 1, 'left', '', '', 19),
(1203, -1, 8, 36, 'text', 'Enter your text', '63.20%', '6.00%', '', '61%', '', '21px', 1, 'left', '155215', '', 14),
(1204, -1, 8, 36, 'text', 'Enter your text', '34.40%', '33.75%', '', '20%', '', '24px', 0, 'left', 'eb494e', '', 42),
(1205, -1, 8, 36, 'image', '/buzztm/img/others/preview.png', '34.80%', '76.25%', '3-0', '20%', 'auto', '', 0, 'left', '', '', 14),
(1206, -1, 8, 36, 'image', '/buzztm/img/others/preview.png', '33.00%', '4.00%', '4-1', '20%', 'auto', '', 0, 'left', '', '', 14),
(1207, -1, 8, 36, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1208, -1, 8, 37, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1209, -1, 8, 49, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1210, -1, 8, 38, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1211, -1, 8, 41, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1212, -1, 8, 42, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1213, -1, 8, 43, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1214, -1, 8, 44, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1215, -1, 8, 50, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1216, -1, 8, 51, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1217, -1, 8, 52, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1218, -1, 8, 53, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1219, -1, 8, 39, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1220, -1, 8, 40, 'text', 'Enter your text', '30%', '30%', '0', '20%', '', '', 0, 'left', '', '', 14),
(1221, -1, 8, 40, 'image', '/buzztm/img/others/preview.png', '0%', '50%', '3', '20%', 'auto', '', 0, 'left', '', '', 14),
(1222, -1, 8, 40, 'image', '/buzztm/img/others/preview.png', '10%', '50%', '1000', '20%', 'auto', '', 0, 'left', '', 'http://www.mybuzztm.com/newbuzz/book/javacafe/', 14),
(1223, -1, 8, 40, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1253, -1, 9, 54, 'text', 'Enter your text', '30%', '30%', '', '40%', '', '', 0, 'left', '', '', 14),
(1254, -1, 9, 54, 'text', 'Enter your text', '35%', '30%', '', '40%', '', '', 0, 'left', '', '', 14),
(1255, -1, 9, 54, 'map', 'Vadapalani, Chennai, Tamil Nadu, India', '54.00%', '0.00%', '', '100%', '46%', '', 0, 'left', '', '', 14),
(1256, -1, 9, 54, 'map', 'Velachery, Chennai', '0.00%', '0.00%', '', '100%', '46%', '', 0, 'left', '', '', 14),
(1257, -1, 9, 54, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1258, -1, 9, 55, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1259, -1, 9, 56, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1260, -1, 9, 57, 'background', 'url(''/buzztm/img/socialwalldummy.jpg'')  no-repeat scroll 0 0 / 100% 100% ', '', '', '', '20%', '', '', 0, 'left', '', '', 14),
(1261, -1, 9, 58, 'background', '#fff', '', '', '', '20%', '', '', 0, 'left', '', '', 14);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category_type` varchar(11) NOT NULL,
  `page_1` int(11) NOT NULL,
  `page_2` int(11) NOT NULL,
  `page_3` int(11) NOT NULL,
  `page_4` int(11) NOT NULL,
  `page_5` int(11) NOT NULL,
  `page_6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`, `category_type`, `page_1`, `page_2`, `page_3`, `page_4`, `page_5`, `page_6`) VALUES
(2, 'ghdfghddfghdfg', '3', 9, 4, 12, 11, 13, 14),
(3, 'ghdfghd', '3', 10, 4, 12, 11, 13, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `email`, `logo`) VALUES
(1, 'vino123', '$2y$10$vO9qIl77F3XurQiuOkA7CexmI7RoVgYju5ZTZG/vwhaUnAZG8OQOa', 'admin', NULL, NULL, '', ''),
(2, 'vino', '$2y$10$ATtmmwnzLo/cUi/wkWvznOhODdgKjk2zToRC56CZDjoRyJPagKr/K', 'admin', NULL, NULL, '', ''),
(3, 'vino', '$2y$10$iHJeEdd3po0la71JJImXRuGNhNIkW1fpBAYdfuRE2HD3Tc1AQHAhK', 'admin', NULL, NULL, '', ''),
(21, 'client', '$2y$10$K2oiUi8lgL.aaZtoeibvOeWjviaO/jPq/iLg.VPhBXhuQDsOfIeA.', 'company', NULL, NULL, 'client@gmail.com', 'logo-21.jpg'),
(22, 'admin', '$2y$10$.zdSx91cztaJhVPb/ayAtOQUo1oEyvnwwM/vIyq9S1FpItwCNK.w6', 'admin', NULL, NULL, '', ''),
(23, 'vino1', '$2y$10$yyp1Ist3zxjvGuQDBFlufuH/OhMJSwSReh0JYfm66VBeiMPdnzNuW', 'admin', NULL, NULL, '', ''),
(24, 'vino', '$2y$10$CK8wsr2KDc7W3dYHctO.MeQI/zVP/o2w8vGhcU9VtCAQGMwUtyEjW', 'admin', NULL, NULL, '', ''),
(25, 'vino', '$2y$10$nhXVT55ehxf8OTkBLc7RreApjMnkErKQTXvfJtTMk/9G8R4Ol99fq', 'admin', NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_name` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `about` text NOT NULL,
  `default_language` int(11) NOT NULL,
  `default_timezone` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `allowed_books` int(11) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `googleplus` varchar(200) NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `business_name`, `phone`, `address`, `city`, `state`, `zipcode`, `latitude`, `longitude`, `about`, `default_language`, `default_timezone`, `currency`, `allowed_books`, `linkedin`, `facebook`, `twitter`, `googleplus`, `modified`, `created`) VALUES
(2, 21, 'vinogautam Business', '7889768678568', 'hjhjgjgjh gjg hjg', 'hjghjgj', 'k jgjhgjj hgjgh', 'jgjhg jgjh', '', '', 'about my company', 676, 76756, 767, 2, 'ghdfghdfg hdfgh dfghdfghdg', 'fcbvbvv', 'twvbvbvc', 'gpghd fghd', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_templates`
--
ALTER TABLE `book_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_attributes`
--
ALTER TABLE `template_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `book_templates`
--
ALTER TABLE `book_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `template_attributes`
--
ALTER TABLE `template_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1262;
--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
