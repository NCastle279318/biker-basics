-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 09:44 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikerbasics`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(5, 'Helmets', 'helmets'),
(6, 'Gloves', 'gloves'),
(7, 'Jackets', 'jackets'),
(8, 'Pants', 'pants'),
(9, 'Boots', 'boots');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(22, 12, 34, 1),
(23, 13, 42, 2),
(24, 14, 40, 1),
(25, 15, 36, 1),
(26, 16, 36, 1),
(27, 17, 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(34, 5, 'SHOEI GT-AIR II CROSSBAR TC6', '<p>With the innovative and highly-acclaimed GT-Air as a baseline, the all-new GT-Air II was destined for greatness from the very start. Advancements in design, functionality and performance have further evolved SHOEI&rsquo;s premiere full-face touring helmet, yielding even easier adaptation to the ever-changing conditions throughout your journeys. Featuring a lengthened internal sun shield for optimal sun-glare protection, all-new &quot;first position&quot; shield opening for advanced ventilation and defogging, enhanced aerodynamics and noise-reduction technology, and the ability to seamlessly integrate with the all-new SENA SRL2 Communication System, the GT-Air II is equipped to accommodate your every need.</p>\r\n', 'shoei-gt-air-ii-crossbar-tc6', 14100, 'shoei-gt-air-ii-crossbar-tc6.jpg', '2021-06-26', 1),
(36, 5, 'SHOEI GT-AIR II DEVIATION TC9', '<p>With the innovative and highly-acclaimed GT-Air as a baseline, the all-new GT-Air II was destined for greatness from the very start. Advancements in design, functionality and performance have further evolved SHOEI&rsquo;s premiere full-face touring helmet, yielding even easier adaptation to the ever-changing conditions throughout your journeys. Featuring a lengthened internal sun shield for optimal sun-glare protection, all-new &quot;first position&quot; shield opening for advanced ventilation and defogging, enhanced aerodynamics and noise-reduction technology, and the ability to seamlessly integrate with the all-new SENA SRL2 Communication System, the GT-Air II is equipped to accommodate your every need.</p>\r\n', 'shoei-gt-air-ii-deviation-tc9', 14100, 'shoei-gt-air-ii-deviation-tc9.jpg', '2021-06-26', 4),
(37, 5, 'ARAI RX-7V HRC', '<p>The RX-7V represents the summit of Arai&rsquo;s knowledge, experience and know-how in helmet technology. With a completely new PB-SNC&sup2; outer shell, the revolutionary VAS (&ldquo;Variable Axis System&rdquo;) visor system and a significant increased smoother area around the temples, the RX-7V offers the new benchmark in the premium helmet segment. From the also new anti-microbial material liner with an even slimmer frame, to the new ducts, improved diffuser and the integrated Air Channels, every part shows the attention to detail that is so typical for Arai. Arai has continually improved the &ldquo;glancing off&rdquo; performance by learning from real scenarios. Thanks to the new stronger and smoother shell and VAS, the RX-7V is closer to the ideal helmet shape than ever. With VAS, the visor mounting position is lowered 24mm in pursuit of the ideal smoother shape that increases the ability of glancing off energy. As a result, this has made it possible for the shell to be completely smooth above the test line of the Snell standard.&nbsp;</p>\r\n', 'arai-rx-7v-hrc', 16666, 'arai-rx-7v-hrc.jpg', '2021-06-26', 1),
(38, 5, 'ARAI RX-7V STATEMENT', '<p>The RX-7V represents the summit of Arai&rsquo;s knowledge, experience and know-how in helmet technology. With a completely new PB-SNC&sup2; outer shell, the revolutionary VAS (&ldquo;Variable Axis System&rdquo;) visor system and a significant increased smoother area around the temples, the RX-7V offers the new benchmark in the premium helmet segment. From the also new anti-microbial material liner with an even slimmer frame, to the new ducts, improved diffuser and the integrated Air Channels, every part shows the attention to detail that is so typical for Arai. Arai has continually improved the &ldquo;glancing off&rdquo; performance by learning from real scenarios. Thanks to the new stronger and smoother shell and VAS, the RX-7V is closer to the ideal helmet shape than ever. With VAS, the visor mounting position is lowered 24mm in pursuit of the ideal smoother shape that increases the ability of glancing off energy. As a result, this has made it possible for the shell to be completely smooth above the test line of the Snell standard.</p>\r\n', 'arai-rx-7v-statement', 15555, 'arai-rx-7v-statement.jpg', '2021-06-24', 1),
(39, 6, 'RST TRACTECH EVO R', '<p>Featured of the RST TracTech Evo R CE race glove include -&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Kangaroo Leather</li>\r\n	<li>Aramid Lining&nbsp;</li>\r\n	<li>Palm Slider&nbsp;</li>\r\n	<li>Carbon &amp; Bio-Elastane&nbsp;</li>\r\n	<li>Knuckle&nbsp;</li>\r\n	<li>Double Cuff &amp; Wrist Closure&nbsp;</li>\r\n	<li>Conjoined Little Finger Protection&nbsp;</li>\r\n	<li>Aramid Reinforced Palm</li>\r\n	<li>Bio-Elastane&nbsp;</li>\r\n	<li>Thumb Joint Protection</li>\r\n	<li>Pre-curved Fingers&nbsp;</li>\r\n	<li>Out stitched Fingers</li>\r\n</ul>\r\n', 'rst-tractech-evo-r', 3678, 'rst-tractech-evo-r.jpg', '2021-06-24', 1),
(40, 6, 'RST TRAC TECH EVO SHORT', '<p><strong>ARMOUR:</strong></p>\r\n\r\n<ul>\r\n	<li>CE Certification Rating: Level 1 KP</li>\r\n	<li>Knuckle Protector: Carbon Fibre Knuckle</li>\r\n	<li>Palm Slider: TPU Palm Slider</li>\r\n</ul>\r\n\r\n<p><strong>CONSTRUCTION:</strong></p>\r\n\r\n<ul>\r\n	<li>Main Outer Material:Cowhide Leather</li>\r\n	<li>Inner Lining:Fixed Comfort Mesh Lining</li>\r\n	<li>Reinforcement: Double Layer in Palm</li>\r\n	<li>outstitched FIngers: Yes</li>\r\n	<li>Precurved Fingers: Yes</li>\r\n	<li>Cuff Closure:Adjustable Velcro</li>\r\n</ul>\r\n', 'rst-trac-tech-evo-short', 2117, 'rst-trac-tech-evo-short.jpg', '2021-06-26', 2),
(41, 6, 'RST TRACTECH EVO', '<p><strong>ARMOUR:</strong></p>\r\n\r\n<ul>\r\n	<li>CE Certification Rating: Level 1 KP</li>\r\n	<li>Knuckle Protector: Carbon Fibre Knuckle</li>\r\n	<li>Finger Protection: Finger Joint Protection</li>\r\n</ul>\r\n\r\n<p><strong>CONSTRUCTION:</strong></p>\r\n\r\n<ul>\r\n	<li>Main Outer Material:Cowhide Leather</li>\r\n	<li>Inner Lining:Fixed Comfort Mesh Lining</li>\r\n	<li>Reinforcement: Aramid Stitching</li>\r\n	<li>outstitched FIngers: Yes</li>\r\n	<li>Precurved Fingers: Yes</li>\r\n	<li>Cuff Closure:Double Cuff Wrist Closure</li>\r\n</ul>\r\n\r\n<p><strong>FEATURES AND BENEFITS:</strong></p>\r\n\r\n<ul>\r\n	<li>Palm: Silicone Power Grip Palm</li>\r\n	<li>Finger: Conjoined Little Finger</li>\r\n</ul>\r\n', 'rst-tractech-evo', 3078, 'rst-tractech-evo.jpg', '0000-00-00', 0),
(42, 7, 'RST TRACTECH EVO R (Jacket)', '<p><strong>DETAILS:</strong></p>\r\n\r\n<p><strong>ARMOUR:</strong></p>\r\n\r\n<ul>\r\n	<li>CE Certification Rating: AAA</li>\r\n	<li>Back Protector: CE Level 2</li>\r\n	<li>Shoulder Armour:CE Level 2</li>\r\n	<li>Elbow Armour:CE Level 2</li>\r\n	<li>Shoulder Cup: TPU</li>\r\n</ul>\r\n\r\n<p><strong>CONSTRUCTION:</strong></p>\r\n\r\n<ul>\r\n	<li>Main Outer Material: Cowhide Leather</li>\r\n	<li>Stretch Material: Samtex with Leather Stretch Panels</li>\r\n	<li>Inner Lining: Fixed 3D Mesh Lining</li>\r\n	<li>Collar: Neoprene Race</li>\r\n	<li>Cuff: Neoprene Race</li>\r\n	<li>Zips: Max Zips</li>\r\n	<li>Thread: Coates Bonded Nylon - Triple Stitched</li>\r\n	<li>Ventilation: Perforated Leather</li>\r\n	<li>Connection Zip: Yes</li>\r\n</ul>\r\n\r\n<p><strong>FEATURES AND BENEFITS:</strong></p>\r\n\r\n<ul>\r\n	<li>Hump: Aerodynamic Race Hump</li>\r\n	<li>Elbow Slider: Standard Elbow Slider</li>\r\n	<li>Inner Pockets: 1</li>\r\n	<li>Outer Pockets: 2</li>\r\n</ul>\r\n\r\n<p>CHEST: Measure around the fullest part under the armpits, keep tape horizontal.</p>\r\n', 'rst-tractech-evo-r-jacket', 12992, 'rst-tractech-evo-r-jacket.jpg', '2021-06-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$.xAULdBsNuUzbpgYmYyXLuGxlc2OVpTzGAUz3bn.JihI9Yk2B4by6', 1, 'Admin', 'User', '', '', 'thor.jpg', 1, '', '', '2021-06-10'),
(30, 'jtest2570@gmail.com', '$2y$10$ip7UyTiIuMj2S2tOjc21EuL7r.Qxui8pOGiY827R2K8ZJAd570pa6', 0, 'Jane', 'Test', '', '', 'female3.jpg', 1, 'kiTsb96zGnqW', 'QCU6PbXdzK1qc4s', '2021-06-24'),
(33, 'testj2570@gmail.com', '$2y$10$YWSpxgcw/aRth7p/W7j/.eIlJQAqd17HzRt/GDnym2SwK1cOTtBAG', 0, 'Johnny', 'Test', '', '', '', 1, 'WVdOYbtTxMkJ', 'FmpGoDMNwgHb8lS', '2021-06-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
