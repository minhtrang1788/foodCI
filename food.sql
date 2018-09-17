-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2018 at 01:14 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(40) NOT NULL,
  `role` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `fullname`, `email`, `image`, `role`, `status`) VALUES
(1, 'minhtrang', 'minhtrang', 'Nguyen Thi Minh Trang', 'minhtrang1788@gmail.com', '39388151_1788789704523439_72367539923347', 1, 1),
(2, 'minhkhanh', 'minhkhanh', 'Le Minh Khanh', 'khanhle.t3@gmail.com', 'pikon.jpg', 1, 1),
(3, 'writer@truongthinh.vn', 'tung1234', NULL, 'tshirtsmt17@gmail.com', 'tr.jpg', 1, 0),
(5, 'Minh Dan', '12345', NULL, 'besoc1401@gmail.com', '', 0, 0),
(6, 'test123', '123', NULL, 'tshirtsmt17@gmail.com', 'family.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_vn` varchar(255) DEFAULT NULL,
  `description_vn` text,
  `content_vn` longtext,
  `slug` varchar(255) DEFAULT NULL,
  `hash_img` tinytext,
  `categoryid` int(11) NOT NULL,
  `images` text NOT NULL,
  `optionals` text,
  `seo` text,
  `status` varchar(10) DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0' COMMENT '0: default; 1: deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title_vn`, `description_vn`, `content_vn`, `slug`, `hash_img`, `categoryid`, `images`, `optionals`, `seo`, `status`, `created_date`, `updated_date`, `publish_date`, `deleted`) VALUES
(1, 'Home', NULL, NULL, 'home', NULL, 0, '', NULL, NULL, 'pending', '2018-08-25 00:00:00', NULL, NULL, 0),
(2, 'Pages', NULL, NULL, 'pages', NULL, 0, '', NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(3, 'Features', NULL, NULL, 'features', NULL, 0, '', NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(4, 'Categories', 'Categories', 'Categories', 'categories', NULL, 0, '', NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(5, 'Archive', 'Archive', 'Archive', 'archive', NULL, 0, '', NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(6, 'About', 'About', 'About', 'v', NULL, 0, '', NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(7, 'Contact', 'Contact', 'contact', 'v', NULL, 0, '', NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(8, 'index', 'index', 'index', 'index', NULL, 2, '', NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(9, 'archive', 'archive', 'archive', 'archive', NULL, 2, '', NULL, NULL, 'pending', NULL, NULL, NULL, 0),
(10, 'contact', 'contact', 'contact', 'contact', NULL, 2, '', NULL, NULL, 'pending', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(40) COLLATE utf8_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(40) COLLATE utf8_vietnamese_ci NOT NULL,
  `Created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `status`, `image`, `Created_date`) VALUES
(1, 'Yummy Blog', 0, '', '2018-09-08'),
(2, 'Trang\'s Blog', 0, '', '2018-09-08'),
(6, 'Test post', 0, 'tattoots.png', '2018-09-14'),
(7, 'Have a nice day!', 1, 'snp-mug.jpg', '2018-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `category_admin`
--

CREATE TABLE `category_admin` (
  `id` int(4) NOT NULL,
  `name` varchar(40) COLLATE utf8_vietnamese_ci NOT NULL,
  `image` varchar(40) COLLATE utf8_vietnamese_ci NOT NULL,
  `link` text COLLATE utf8_vietnamese_ci NOT NULL,
  `parent_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `category_admin`
--

INSERT INTO `category_admin` (`id`, `name`, `image`, `link`, `parent_id`) VALUES
(1, 'Pages', 'fa-home', 'manage_pages', 0),
(4, 'Banner', 'fa-file-o', 'manage_banner', 0),
(5, 'Account', 'fa-clock-o', 'manage_banner', 0),
(2, 'Posts', 'fa-road', 'manage_posts', 0),
(6, 'All pages', '', 'all_pages', 1),
(7, 'Create page', '', 'create_page', 1),
(8, 'All posts', '', 'all_posts', 2),
(9, 'Create posts', '', 'create_post', 2),
(10, 'All Feedback', '', 'all_fb', 3),
(11, 'Create Feedback', '', 'create_fb', 3),
(12, 'All Banner', '', 'all_banner', 4),
(13, 'Create Banner', '', 'create_bn', 4),
(14, 'All Account', '', 'all_account', 5),
(15, 'Change Profile Admin', '', 'change_profile', 5),
(0, 'Created Account', '', 'create_acc', 5),
(0, 'Log out', '', 'logout', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_vn` varchar(255) NOT NULL,
  `description_vn` text,
  `content_vn` longtext,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `seo` text,
  `status` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title_vn`, `description_vn`, `content_vn`, `parent_id`, `slug`, `seo`, `status`, `created_date`, `updated_date`) VALUES
(4, 'Help', 'Help', '<h1 id=\"howto-title\" style=\"margin: 64px auto 0px; padding: 0px; color: #333333; font-weight: 500; width: auto; font-size: 40px; line-height: 1.05; letter-spacing: 0.008em; font-family: &quot;SF Pro Display&quot;, &quot;SF Pro Icons&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Record audio in Pages, Numbers, and Keynote for iOS</h1>\r\n<div style=\"margin-top: 0px; width: auto; box-sizing: border-box; color: #333333; font-family: &quot;SF Pro Text&quot;, &quot;SF Pro Icons&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17px; letter-spacing: -0.357px;\">\r\n<p style=\"margin: 17px auto 1.2em; padding: 0px 0px 1px; font-size: 22px; line-height: 1.45455; letter-spacing: 0.016em; font-family: &quot;SF Pro Display&quot;, &quot;SF Pro Icons&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; word-wrap: break-word; width: auto;\">Record audio directly to your Pages, Numbers, or Keynote document on your iPhone, iPad, or iPod touch.&nbsp;</p>\r\n</div>\r\n<div id=\"sections\" style=\"counter-reset: a 0; width: auto; box-sizing: border-box; color: #333333; font-family: &quot;SF Pro Text&quot;, &quot;SF Pro Icons&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17px; letter-spacing: -0.357px;\">\r\n<div style=\"width: auto; box-sizing: border-box;\">\r\n<div style=\"width: auto; box-sizing: border-box; padding: 0px;\">\r\n<p style=\"margin: 13px 0px 0px; padding: 0px; line-height: 1.52947; letter-spacing: -0.021em; word-wrap: break-word;\">You can&nbsp;<a style=\"color: #0070c9; text-decoration-line: none;\" href=\"https://support.apple.com/en-vn/HT208845#record\">record audio</a>&nbsp;in a Pages, Numbers, or Keynote document, then&nbsp;<a style=\"color: #0070c9; text-decoration-line: none;\" href=\"https://support.apple.com/en-vn/HT208845#add\">play the recording back</a>.&nbsp;You can always&nbsp;<a style=\"color: #0070c9; text-decoration-line: none;\" href=\"https://support.apple.com/en-vn/HT208845#edit\">edit the recording</a>, or replace some or all of it with a new recording.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"sections\" style=\"counter-reset: a 0; width: auto; box-sizing: border-box; color: #333333; font-family: &quot;SF Pro Text&quot;, &quot;SF Pro Icons&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17px; letter-spacing: -0.357px;\"></div>\r\n<div style=\"counter-reset: a 0; width: auto; box-sizing: border-box; color: #333333; font-family: &quot;SF Pro Text&quot;, &quot;SF Pro Icons&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17px; letter-spacing: -0.357px;\"><img title=\"Cool\" src=\"../../../../style_admin/tinymce/jscripts/tiny_mce/plugins/emotions/img/smiley-cool.gif\" border=\"0\" alt=\"Cool\" /></div>\r\n<div style=\"counter-reset: a 0; width: auto; box-sizing: border-box; color: #333333; font-family: &quot;SF Pro Text&quot;, &quot;SF Pro Icons&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17px; letter-spacing: -0.357px;\"></div>', 0, 'about-by-test', 'blog , about, test', '1', '2018-09-03 04:48:57', '2018-09-06 20:23:50'),
(5, 'You Can Buy', 'About by Test', '<p><a style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: #007bff; text-decoration-line: none; touch-action: manipulation; transition-duration: 500ms; outline: none; font-family: Poppins, sans-serif; font-size: 16px;\" href=\"../../../../../index.php/food/viewPost/9\"> </a></p>\r\n<h2 style=\"box-sizing: inherit; margin: 10px 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 1.25; color: #232d37; font-size: 2rem; transition-duration: 500ms; text-transform: capitalize;\"><a style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: #007bff; text-decoration-line: none; touch-action: manipulation; transition-duration: 500ms; outline: none; font-family: Poppins, sans-serif; font-size: 16px;\" href=\"../../../../../index.php/food/viewPost/9\">You Can Buy For Less Than A College Degree</a></h2>\r\n<p><a style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: #007bff; text-decoration-line: none; touch-action: manipulation; transition-duration: 500ms; outline: none; font-family: Poppins, sans-serif; font-size: 16px;\" href=\"../../../../../index.php/food/viewPost/9\"> </a></p>\r\n<p>&nbsp;</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 0px; color: #51545f; font-size: 16px; font-family: Poppins, sans-serif;\">Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>\r\n<p>data-validate-length-range=\"6\" data-validate-words=\"2\" required=\"required\"&gt;</p>', 0, 'about-by-test', 'blog , about, test', '1', '2018-09-03 07:23:46', '2018-09-09 03:25:53'),
(8, 'test', 'About by Test', '<p>data-validate-length-range=\"6\" data-validate-words=\"2\" required=\"required\"&gt;</p>\r\n<p>Hello , change something here</p>', 0, 'about-by-test', 'blog , about, test', '1', '2018-09-09 14:04:39', '2018-09-11 03:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(4) NOT NULL,
  `title` text NOT NULL,
  `des` text,
  `content` text NOT NULL,
  `time_write` datetime NOT NULL,
  `time_modified` datetime DEFAULT NULL,
  `status` int(1) NOT NULL,
  `like` int(10) DEFAULT NULL,
  `parent_id` int(4) NOT NULL,
  `image_hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `des`, `content`, `time_write`, `time_modified`, `status`, `like`, `parent_id`, `image_hash`) VALUES
(1, 'Something about me', 'test desc', '', '0000-00-00 00:00:00', '2018-09-06 03:57:12', 0, 0, 0, '6.jpg'),
(2, 'Target for 2013', 'test desc', '                                                                                                                                1. Join in charity\r\n\r\n2. Practice Aerobic\r\n\r\n3. Study english often.\r\n\r\n4. No ...\r\n\r\n5. Do powerpoint for April\r\n\r\n6. Coffee alone\r\n\r\n7. Traveling far away\r\n\r\n8. Study programming android\r\n\r\n9. Increase 2 kg\r\n\r\n10. Reach target myselft at company\r\n\r\n11. More confident\r\n\r\n12. Search know more about IT\r\n\r\n13. Save more 2tr every month\r\n\r\n14. Buy a new shoes, a new package :D	                                                                                                                                ', '2018-09-17 04:07:17', NULL, 1, 0, 5, 'pikon.jpg'),
(3, 'Have one day like that', NULL, 'Hix , lâu lâu mới định viết gì đó. Mà sao hôm nay mình chán kinh khủng, nhiều khi không biết mình mong muốn j đây.\r\n\r\nMình cảm thấy không có gì để mình nghĩ tới hay mong muốn.\r\n\r\nMình thật sự mong mình tìm ra một cái gì đó mình cảm thấy thích thú, muốn tìm hiểu, đến lúc đó mình sẽ cố gắng rất nhiều, nhưng sao mãi mình vẫn chưa tìm ra :(.		', '0000-00-00 00:00:00', NULL, 0, NULL, 6, '8.jpg'),
(4, 'Quyền lực của sắc đẹp', 'test desc', '                Xinh đẹp là một món quà. Thật tuyệt vời khi mình được sở hữu nó. Vì đó là ước mơ của rất nhiều cô gái. Xinh đẹp thì được mọi người ngưỡng mộ, thuận lợi hơn trong một số công việc và là mục tiêu theo đuổi của rất nhiều chàng trai,... Cô gái nào cũng thích điều ấy. Và thậm chí cả con gái cũng thích ngắm nhìn những cô bạn cùng giới xinh đẹp. Ở mặt nào đó, nó giống như khi ta bước vào một vườn hoa vậy, Sẽ có nhiều loại hoa khác nhau, có loại giản dị khiêm nhường, hoặc kiêu hãnh, loại ngào ngạt tỏa hương, loại thì âm thầm... Chúng ta chẳng việc gì phải ngần ngại mà thú nhận rằng, chúng ta dễ bị thu hút bởi loài hoa tạo cho mình ấn tượng thị giác tốt nhất. \r\nNhưng cũng chính vì là một món quà, nên thời gian có thể tước nó từ tay chúng ta bất kỳ lúc nào. Không ai có thể xinh đẹp mãi mãi. Thật đáng buồn khi ai đó yêu quý mình chỉ vì mình xinh đẹp. Theo quy luật khắc nghiệt của thời gian, nhan sắc là tứ đầu tiên bị đào thải. Vậy thfi lúc đó chúng ta sẽ còn lại gì?		                ', '2018-09-15 13:44:13', NULL, 1, 0, 1, '16.jpg'),
(6, 'This is going to big one!', '“Technology is nothing. What\'s important is that you have a faith in people, that they\'re basically good and smart, and if you give them tools, they\'ll do wonderful things with them.”', 'Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '0000-00-00 00:00:00', NULL, 1, 30, 1, '9.jpg'),
(7, 'You Can Buy For Less Than A College Degree', 'Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '', '0000-00-00 00:00:00', '2018-09-04 21:37:45', 0, 0, 1, '6.jpg'),
(8, 'This is going to big one!', '“Technology is nothing. What\'s important is that you have a faith in people, that they\'re basically good and smart, and if you give them tools, they\'ll do wonderful things with them.”', 'Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '0000-00-00 00:00:00', NULL, 1, 30, 3, '5.jpg'),
(9, 'You Can Buy For Less Than A College Degree', 'Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', '0000-00-00 00:00:00', NULL, 1, 32, 4, '9.jpg'),
(11, 'Deliciuous food', 'Deliciuous food des', '                What content we have before?                ', '2018-09-15 13:44:55', NULL, 1, 0, 3, '17.jpg'),
(42, 'Where To Get The Best Sunday Roast In The Cotswolds', 'Where To Get The Best Sunday Roast In The Cotswolds', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris         ', '2018-09-15 13:32:28', NULL, 1, 0, 1, '15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `social_bar`
--

CREATE TABLE `social_bar` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_vietnamese_ci NOT NULL,
  `link` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `social_bar`
--

INSERT INTO `social_bar` (`id`, `name`, `link`) VALUES
(3, 'fa fa-facebook', '#'),
(4, 'fa fa-twitter', '#'),
(5, 'fa fa-linkedin', '#'),
(6, 'fa fa-skype', '#'),
(7, 'fa fa-dribbble', '#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`,`title`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_bar`
--
ALTER TABLE `social_bar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `social_bar`
--
ALTER TABLE `social_bar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
