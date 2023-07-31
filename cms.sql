-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 10:14 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(3, 'Food'),
(4, 'Memories'),
(13, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(3, 2, 'cindy', 'cindy111@m.com', 'coool', 'approved', '2019-11-19'),
(5, 1, 'Jake', 'jake@yahoo.com', 'pretty cool', 'unapproved', '2019-11-19'),
(6, 2, 'micheal', 'mic@yhy.com', 'kwwkpdp\r\n', 'approved', '2019-11-19'),
(7, 4, 'noah ', 'noahcutes@gmail.com', 'love ya priya ', 'approved', '2019-11-19'),
(8, 2, 'tess', 't@gmail.com', 'coooool', 'unapproved', '2019-12-02'),
(9, 2, 'tess', 't@gmail.com', 'coooool', 'unapproved', '2019-12-02'),
(10, 1, 'priya', 'vora11priya@gmail.com', 'verygood', 'approved', '2020-03-31'),
(11, 1, 'priya', 'vora11priya@gmail.com', 'verygood', 'unapproved', '2020-03-31'),
(12, 8, 'priya vora', 'sjk@gmail.com', 'very pretty', 'unapproved', '2020-04-03'),
(13, 8, 'priya vora', 'sjk@gmail.com', 'very pretty', 'approved', '2020-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_view_count`) VALUES
(1, 13, 'Goa Diaries', 'Priya Vora', '2019-11-30', 'IMG_7408.JPG', '<p>Goa is a state in western India with coastlines stretching along the Arabian Sea. Its long history as a Portuguese colony prior to 1961 is evident in its preserved 17th-century churches and the areaï¿½s tropical spice plantations. Goa is also known for its beaches, ranging from popular stretches at Baga and Palolem to those in laid-back fishing villages such as Agonda.</p>', 'goa,drinks,friends,fun', 0, 'published', 33),
(2, 13, 'Birthday getaway', 'Priya Vora', '2019-11-29', 'igatpuri.jpg', '<p>Igatpuri is a town and hill station in the Western Ghat mountains of Maharashtra, western India. The huge Dhamma Giri academy is dedicated to the teaching of Vipassana meditation. At its entrance stands Myanmar Gate, a golden pagoda. North, hilltop Tringalwadi Fort has a small temple. Southeast, trails lead up to Kalsubai Peak. The surrounding Kalsubai Harishchandragad Wildlife Sanctuary is home to leopards and deer.</p>', 'birthday,igatpuri', 2, 'published', 2),
(4, 13, 'Bangkok and Pattaya', 'Priya Vora', '2019-11-29', 'IMG_0828.JPG', '<p>Bangkok, Thailandâ€™s capital, is a large city known for ornate shrines and vibrant street life. The boat-filled Chao Phraya River feeds its network of canals, flowing past the Rattanakosin royal district, home to opulent Grand Palace and its sacred Wat Phra Kaew Temple. Nearby is Wat Pho Temple with an enormous reclining Buddha and, on the opposite shore, Wat Arun Temple with its steep steps and Khmer-style spire.</p>', 'clouds, bangkok, pattaya,beaches,coral island', 1, 'published', 4),
(5, 13, 'Diwali Getaway', 'Priya', '2019-11-24', 'IMG_4597.JPG', '                            Alibag, also known as Alibaug, is a coastal town, just south of Mumbai, in western India. Itâ€™s known for its beaches like Alibag Beach and Varsoli Beach. Just offshore, 17th-century Kolaba Fort has carvings of tigers and elephants, and temples dedicated to Hindu gods. To the south, Portuguese-built Korlai Fort dates from 1521 and includes a lighthouse. The island fort of Janjira has high walls, turrets and cannons.                            ', 'diwali, alibaug, beach', 0, 'published', 1),
(6, 3, 'Creamy Nachos', 'Pri', '2020-04-03', 'GHQX6875.JPG', '<p>Nachos @Doolally are the best. Must try!</p>', 'doolally, food, love, nachos, cheese', 0, 'published', 1),
(7, 4, 'Oceans Park, Hong Kong', 'sss', '2020-04-03', 'IMG_9429.JPG', '<p>Ocean Park Hong Kong, commonly known as Ocean Park, is a marine mammal park, oceanarium, animal theme park and amusement park situated in Wong Chuk Hang and Nam Long Shan in the Southern District of Hong Kong. It is the second largest theme park in Hong Kong, after Hong Kong Disneyland</p>', 'hong kong, girls, gang, fun', 0, 'published', 1),
(8, 3, 'Spaghetti', 'ppp', '2020-04-03', 'AMSA4860.JPG', '<p>Good food, Good mood and cozy ambience</p>', 'food, spaghetti, pasta, red', 0, 'published', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$isuesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(55, 'ttt', '$2y$10$clGfYuj6yHOkMnkkfs2llOKoPjHEm9p3WVnHy8CEb2MwjrO1mjYT6', 't', 't', 'u@h.com', '', 'subscriber', '$2y$10$isuesomecrazystrings22'),
(56, 'cin', '$2y$10$a90yPnxo1Djxba9eQQeFJebtHrDHveIHZikdh6ka27.ycquXuR8m.', 'cindy', 'kelso', 'cincin@gmail.com', '', 'admin', '$2y$10$isuesomecrazystrings22'),
(57, 'Sean', '$2y$10$wKMIPonj1MTdpzUdI.sCD./KHGF/DPUyPb3zU/UIeLWxEsST6C./W', 'Sean', 'McCarthy', 'saeanm@y.com', '', 'subscriber', '$2y$10$isuesomecrazystrings22'),
(68, 'Jug', '$2y$10$K1hL30090QFrmzqJA59B2OolCp.LlPbjqBcNXEeHyM4xP/0yrbnS6', 'Jughead', 'Brown', 'jug@u.com', '', 'subscriber', '$2y$10$isuesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(14, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(15, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(16, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(17, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(18, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(19, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(20, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(21, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(22, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(23, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(24, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(25, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(26, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(27, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(28, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(29, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(30, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(31, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(32, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(33, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(34, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(35, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(36, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(37, 'gf9jquvpiv5fi9mjj7gnirevsb', 1582294060),
(38, 'ov1712ogomcht7739vp5oa8l67', 1585394242),
(39, 'vrqkv32it70gtl0hkm5qh2vn5n', 1585638792),
(40, 'g6kts6e60dn57dkfp98mh39782', 1585817169),
(41, 'agkqd02vohpqpiotcogqmpv1ng', 1585820532),
(42, '4kfee5ubodgigbe6gqvop7gfe9', 1585836582),
(43, 'uv6sd6k1gm2qc4qanni19agoom', 1585915468),
(44, 'b4a5u1he22aimp511pb71glj08', 1586000529),
(45, 'lt03rfgn6o6iqhdce901rmug5r', 1586255160);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
