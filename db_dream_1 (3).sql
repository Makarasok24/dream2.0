-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 09:10 AM
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
-- Database: `db_dream_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `img`) VALUES
(1, 'ADDIDAS', 'image/2.png'),
(2, 'JORDAN', 'image/1.png'),
(3, 'NIKE', 'image/3.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'cloth'),
(2, 'Sneaker');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `product_id`, `product_image`, `image_2`, `image_3`) VALUES
(1, 1, 'upload_img/ppc.jpg', 'upload_img/ppchomeJersey_2.jpg', 'upload_img/ppc.jpg'),
(2, 2, 'upload_img/ppcTrain.jpg', 'upload_img/ppTraining_1.jpg', 'upload_img/ppcTraining_2.jpg'),
(88, 5, 'upload_img/pngwing.com (13).png', 'upload_img/pngwing.com (14).png', 'upload_img/pngwing.com (15).png'),
(89, 6, 'upload_img/pngwing.com (15).png', 'upload_img/', 'upload_img/'),
(90, 7, 'upload_img/pngwing.com (33).png', 'upload_img/', 'upload_img/'),
(91, 8, 'upload_img/pngwing.com (34).png', 'upload_img/', 'upload_img/'),
(93, 10, 'upload_img/pngwing.com (36).png', 'upload_img/', 'upload_img/'),
(94, 11, 'upload_img/pngegg.png', 'upload_img/pngegg (1).png', 'upload_img/'),
(95, 12, 'upload_img/pngegg (2).png', 'upload_img/', 'upload_img/'),
(96, 13, 'upload_img/pngegg (3).png', 'upload_img/', 'upload_img/'),
(97, 14, 'upload_img/pngegg (4).png', 'upload_img/off3.png', 'upload_img/off3.jpg'),
(98, 15, 'upload_img/pngegg (5).png', 'upload_img/images.jpg', 'upload_img/images1.jpg'),
(99, 16, 'upload_img/pngwing.com (40).png', 'upload_img/61X0Qbrd6SL._AC_UY350_.jpg', 'upload_img/30-01-2017_adidas_eqtsupportadv91-16_coreblack_turbo_bb1302_sp_7.webp'),
(100, 17, 'upload_img/pngwing.com (42).png', 'upload_img/3840.webp', 'upload_img/8010274_0.jpg'),
(101, 18, 'upload_img/pngwing.com (43).png', 'upload_img/nike-dunk-low-celtic-resellzone_2.webp', 'upload_img/1194232_08_jpg.webp'),
(102, 19, 'upload_img/pngwing.com (44).png', 'upload_img/images (2).jpg', 'upload_img/images (3).jpg'),
(103, 20, 'upload_img/pngwing.com (45).png', 'upload_img/ipad_nike-lupinek-flyknit-acg-black-white.jpg', 'upload_img/NikeLab-Lupinek-Flyknit-ACG-White-02.jpg'),
(104, 21, 'upload_img/pngwing.com (46).png', 'upload_img/air-jordan-1-retro-high-off-white-nrg-982442.webp', 'upload_img/Air-Jordan-1-Retro-High-Off-White-NRG-Mrkicksfr-2.webp'),
(105, 22, 'upload_img/ppcHome_2023_3.jpg', 'upload_img/ppcHome_2023_2.jpg', 'upload_img/ppcHome_2023_1.jpg'),
(106, 23, 'upload_img/ppcwarmup_1.jpg', 'upload_img/ppwarmup_3.jpg', 'upload_img/ppcwarmup_2.jpg'),
(107, 24, 'upload_img/ppcThirt2023.jpg', 'upload_img/ppcThirt_2.jpg', 'upload_img/ppcThirt2023.jpg'),
(108, 25, 'upload_img/ppcGK_trian_3.jpg', 'upload_img/ppcTraining_4.jpg', 'upload_img/ppcTaining_3.jpg'),
(109, 26, 'upload_img/awayKitPPC_1.jpg', 'upload_img/awayKitppc_2.jpg', 'upload_img/ppcAway_1.jpg'),
(110, 27, 'upload_img/bkWarmUp_3.jpg', 'upload_img/bkWarmUp_1.jpg', 'upload_img/bkWarmUp_2.jpg'),
(111, 28, 'upload_img/bkHome_2.jpg', 'upload_img/bkHome_1.jpg', 'upload_img/bkAway.jpg'),
(112, 29, 'upload_img/ppcTrain_2023_2.jpg', 'upload_img/ppcTrain_2023_3.jpg', 'upload_img/ppcTrain_2023_1.jpg'),
(113, 30, 'upload_img/ppcaway2023_1.jpg', 'upload_img/ppcaway2023_3.jpg', 'upload_img/ppcaway2023_2.jpg'),
(114, 31, 'upload_img/bkHome_4.jpg', 'upload_img/bkHome5.jpg', 'upload_img/bkHome.jpg'),
(115, 32, 'upload_img/bkTrain_2.jpg', 'upload_img/bkTrain_3.jpg', 'upload_img/bkTraining_2.jpg'),
(116, 33, 'upload_img/BKGK_1.jpg', 'upload_img/bkGK_3.jpg', 'upload_img/bkGK_2.jpg'),
(117, 34, 'upload_img/bkThird_1.jpg', 'upload_img/bkThird_2.jpg', 'upload_img/bkThird_3.jpg'),
(120, 37, 'upload_img/vskHome_2.jpg', 'upload_img/vskHome_3.jpg', 'upload_img/vsk.jpg'),
(121, 38, 'upload_img/vskAway_1.jpg', 'upload_img/vskAway_2.jpg', 'upload_img/vskAwAY_3.jpg'),
(122, 39, 'upload_img/vskTrainGK_1.jpg', 'upload_img/vskTrainGK_2.jpg', 'upload_img/vskTrainGK_3.jpg'),
(123, 40, 'upload_img/vskGK_3.jpg', 'upload_img/vskGK_1.jpg', 'upload_img/vskGK_2.jpg'),
(124, 41, 'upload_img/vskTrain_2.jpg', 'upload_img/vskTrain_3.jpg', 'upload_img/vskTrain_1.jpg'),
(125, 42, 'upload_img/vskBus_3.jpg', 'upload_img/vskBus_2.jpg', 'upload_img/vskBus_1.jpg'),
(126, 43, 'upload_img/vskWarmUp_2.jpg', 'upload_img/vskWarmUp_1.jpg', 'upload_img/vskWarmUp_3.jpg'),
(127, 44, 'upload_img/srHome_2.jpg', 'upload_img/srHome_1.jpg', 'upload_img/srHome_3.jpg'),
(128, 45, 'upload_img/srTrain_1.jpg', 'upload_img/srTrain_3.jpg', 'upload_img/srTrain_2.jpg'),
(129, 46, 'upload_img/srAway_2.jpg', 'upload_img/srAway_3.jpg', 'upload_img/srAway_1.jpg'),
(130, 47, 'upload_img/srGK_1.jpg', 'upload_img/srGK_2.jpg', 'upload_img/srGK_3.jpg'),
(131, 48, 'upload_img/srGK__1.jpg', 'upload_img/sr_GK__3.jpg', 'upload_img/sr_GK__2.jpg'),
(132, 49, 'upload_img/nagaT_GK_1.jpg', 'upload_img/nagaT_GK_3.jpg', 'upload_img/nagaT_GK_2.jpg'),
(133, 50, 'upload_img/nagaT_3.jpg', 'upload_img/nagaT_2.jpg', 'upload_img/nagaT_1.jpg'),
(134, 51, 'upload_img/naga_w_2.jpg', 'upload_img/naga_w_1.jpg', 'upload_img/naga_w_3.jpg'),
(135, 52, 'upload_img/nagaHome_1.jpg', 'upload_img/nagaHome_2.jpg', 'upload_img/naga_w_3.jpg'),
(136, 53, 'upload_img/naga_t_2.jpg', 'upload_img/naga_t_1.jpg', 'upload_img/naga_t_3.jpg'),
(137, 54, 'upload_img/naga_warm_up_2.jpg', 'upload_img/naga_warm_up_1.jpg', 'upload_img/naga_warm_up_3.jpg'),
(138, 55, 'upload_img/isi_t_1.jpg', 'upload_img/isi_t_2.jpg', 'upload_img/isi_t_3.jpg'),
(139, 56, 'upload_img/isi_home_2.jpg', 'upload_img/isi_home_1.jpg', 'upload_img/isi_home_3.jpg'),
(140, 57, 'upload_img/isi_warm_up_1.jpg', 'upload_img/isi_warm_up_3.jpg', 'upload_img/isi_warm_up_2.jpg'),
(141, 58, 'upload_img/isi_away_1.jpg', 'upload_img/isi_away_2.jpg', 'upload_img/isi_away_3.jpg'),
(142, 59, 'upload_img/isi_trand_2.jpg', 'upload_img/isi_trand_3.jpg', 'upload_img/isi_tran_1.jpg'),
(143, 60, 'upload_img/tiger_train_1.jpg', 'upload_img/tiger_train_4.jpg', 'upload_img/tiger_trian_3.jpg'),
(144, 61, 'upload_img/tiger_home_2.jpg', 'upload_img/tiger_home_1.jpg', 'upload_img/tiger_home_3.jpg'),
(145, 62, 'upload_img/tiger_bus_1.jpg', 'upload_img/tiger_bus_2.jpg', 'upload_img/tiger_4.jpg'),
(146, 63, 'upload_img/tiger_black_2.jpg', 'upload_img/tiger_black_1.jpg', 'upload_img/tiger_black_3.jpg'),
(147, 64, 'upload_img/tiger_jacket_2.jpg', 'upload_img/tiger_jacket_1.jpg', 'upload_img/tiger_jaket_3.jpg'),
(148, 65, 'upload_img/tiger_train_2023_2.jpg', 'upload_img/tiger_train_2023_1.jpg', 'upload_img/tiger_train_2023_3.jpg'),
(149, 66, 'upload_img/pvwarmup_.jpg', 'upload_img/pv_warmup_1.jpg', 'upload_img/pvwarmup_3.jpg'),
(150, 67, 'upload_img/pv_away_2.jpg', 'upload_img/pv_away_3.jpg', 'upload_img/pv_away_1.jpg'),
(151, 68, 'upload_img/pv_GK_w_1.jpg', 'upload_img/pv_GK_w_2.jpg', 'upload_img/pv_GK_w_3.jpg'),
(152, 69, 'upload_img/pv_bus_1.jpg', 'upload_img/pv_bus_2.jpg', 'upload_img/pv_bus_3.jpg'),
(153, 70, 'upload_img/pv_t_1.jpg', 'upload_img/pv_t_2.jpg', 'upload_img/pv_t_3.jpg'),
(154, 71, 'upload_img/pv_home_3.jpg', 'upload_img/pv_home_2.jpg', 'upload_img/pv_home_1.jpg'),
(155, 72, 'upload_img/pv_gk_1.jpg', 'upload_img/pv_gk_3.jpg', 'upload_img/pv_gk_2.jpg'),
(156, 73, 'upload_img/kiri_home_1.jpg', 'upload_img/krir_home_2.jpg', 'upload_img/krir_home_3.jpg'),
(157, 74, 'upload_img/kiri_t_1.jpg', 'upload_img/kiri_t_2.jpg', 'upload_img/kriri_t_3.jpg'),
(158, 75, 'upload_img/krir_w_2.jpg', 'upload_img/krir_w_3.jpg', 'upload_img/krir_w_1.jpg'),
(159, 76, 'upload_img/kiri_GK_2.jpg', 'upload_img/kiri_gk_3.jpg', 'upload_img/krir_gk_1.jpg'),
(160, 77, 'upload_img/krir_away_3.jpg', 'upload_img/krir_away_2.jpg', 'upload_img/kiri_away_1.jpg'),
(161, 78, 'upload_img/tf_t_1.jpg', 'upload_img/tf_t_3].jpg', 'upload_img/tf_t_2.jpg'),
(162, 79, 'upload_img/tf_bus_1.jpg', 'upload_img/tf_bus_3.jpg', 'upload_img/tf_bus_23.jpg'),
(163, 80, 'upload_img/tf_t_4.jpg', 'upload_img/tf_t_5.jpg', 'upload_img/tf_t_7.jpg'),
(164, 81, 'upload_img/tf_home_1.jpg', 'upload_img/tf_home_2.jpg', 'upload_img/tf_home_3.jpg'),
(165, 82, 'upload_img/tf_w_2.jpg', 'upload_img/tf_w_3.jpg', 'upload_img/tf_w1.jpg'),
(166, 83, 'upload_img/tf_t_9.jpg', 'upload_img/tf_t_8.jpg', 'upload_img/tf_t_10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `first_name`, `last_name`, `email`, `quantity`, `total_price`, `date`) VALUES
(50, 'Warm Up Kit', 'Makara', 'Sok', 'makarasok1624@gmail.com', 4, 80, '2024-03-04 16:34:18'),
(51, 'Goalkeeper Kit', 'Makara', 'Sok', 'makarasok1624@gmail.com', 2, 40, '2024-03-04 16:34:18'),
(52, 'BK Home Jersey 2024', 'Makara', 'Sok', 'makarasok1624@gmail.com', 1, 30, '2024-03-04 16:34:18'),
(53, 'PPC Away 2023', 'Makara', 'Sok', 'makarasok1624@gmail.com', 3, 75, '2024-03-04 16:34:18'),
(54, 'Air Jordan 1 Off White', 'Makara', 'Sok', 'makarasok1624@gmail.com', 1, 3089, '2024-03-04 16:34:18'),
(55, 'Special Kit 2024', 'Yuu', 'Hai', 'makarasok1624@gmail.com', 3, 90, '2024-03-05 00:17:10'),
(56, 'Air Jordan 1 Chris Paul', 'Yuu', 'Hai', 'makarasok1624@gmail.com', 2, 230, '2024-03-05 00:17:10'),
(57, 'VSK Home Jersey', 'Yuu', 'Hai', 'makarasok1624@gmail.com', 2, 50, '2024-03-05 00:17:10'),
(58, 'PPC Away 2023', 'Makara', 'Sok', 'makarasok1624@gmail.com', 10, 250, '2024-03-05 00:22:08'),
(59, 'GK Training Kit', 'Makara', 'Sok', 'makarasok1624@gmail.com', 1, 20, '2024-03-05 00:22:08'),
(60, 'GK Training Kit', 'GooFy', 'Goofy', 'makarasok1624@gmail.com', 1, 20, '2024-03-05 00:24:29'),
(61, 'Training Jersey', 'GooFy', 'Goofy', 'makarasok1624@gmail.com', 1, 20, '2024-03-05 00:24:29'),
(62, 'VSK GK Jersey', 'Makara', 'Sok', 'makarasok1624@gmail.com', 4, 100, '2024-03-06 15:36:52'),
(63, 'Goalkeeper Kit', 'Makara', 'Sok', 'makarasok1624@gmail.com', 3, 75, '2024-03-06 15:46:31'),
(64, 'Adidas Superstar 80S', 'Makara', 'Sok', 'makarasok1624@gmail.com', 1, 70, '2024-03-23 05:36:13'),
(65, 'BK Home Jersey 2024', 'Makara', 'Sok', 'makarasok1624@gmail.com', 1, 30, '2024-03-23 05:36:13'),
(66, 'VSK GK Jersey', 'Makara', 'Sok', 'makarasok1624@gmail.com', 2, 50, '2024-03-23 05:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `pay_img` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `total_price`, `pay_img`, `first_name`, `last_name`, `email`, `date`) VALUES
(16, 3314, 'upload_img/makarasok.png', 'Makara', 'Sok', 'makarasok1624@gmail.com', '2024-03-04 16:34:18'),
(17, 370, 'upload_img/makaraS.jpg', 'Yuu', 'Hai', 'makarasok1624@gmail.com', '2024-03-05 00:17:10'),
(18, 270, 'upload_img/e690c59e-e905-470c-9818-22e110cbe0cd.jpg', 'Makara', 'Sok', 'makarasok1624@gmail.com', '2024-03-05 00:22:08'),
(19, 40, 'upload_img/accd85b5-4cec-4c26-9f3d-0c22574fb7a4.jpg', 'GooFy', 'Goofy', 'makarasok1624@gmail.com', '2024-03-05 00:24:29'),
(20, 100, 'upload_img/photo1709739352.jpeg', 'Makara', 'Sok', 'makarasok1624@gmail.com', '2024-03-06 15:36:52'),
(21, 75, 'upload_img/photo1709739352.jpeg', 'Makara', 'Sok', 'makarasok1624@gmail.com', '2024-03-06 15:46:31'),
(22, 150, 'upload_img/code_icon.png', 'Makara', 'Sok', 'makarasok1624@gmail.com', '2024-03-23 05:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `type_feature` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `brand` varchar(50) NOT NULL,
  `image_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `type_feature`, `price`, `brand`, `image_id`, `category_id`, `description`, `stock_id`) VALUES
(1, 'PHNOM PENH CROWN Home Jersey', '', 25, 'Phnom Penh Crown', 1, 1, '', 20),
(2, 'PHNOM PENH CROWN TRAIN JERSEY', '', 20, 'Phnom Penh Crown', 2, 1, '', 21),
(5, 'Jodan 1 Retro', 'BEST SELLER', 1299, 'Jordan', 88, 2, '', 2),
(6, 'Jordan 4 Retro Thunder', 'NEW ARRIVALS', 210, 'Jordan', 89, 2, 'For the first time in over a decade, the Air Jordan 4 Retro Thunder is returning and is being featured as part of the Jordan Brand Spring/Summer 2023 campaign.\r\n\r\nJordan Brand brought back this fan favorite colorway that is constructed using premium black', 3),
(7, 'Air Jordan Retro OG', 'BEST SELLER', 1599, 'Jordan', 90, 2, 'The Air Jordan 1 Retro BG Black Toe 2016 (GS) by Jordan is a must-have for youth. It features a classic white colorway with black toe accents, offering a stylish and timeless look. With its iconic design and comfortable fit, these sneakers are perfect for', 4),
(8, 'Air Jordan 1 Chris Paul', 'NEW ARRIVALS', 115, 'Jordan', 91, 2, 'A legendary hoops look that fuses signature style and comfort, the Air Jordan I Retro High Men\'s Shoe has lightweight cushioning and the same sleek upper as the original from 1984.\r\nFull-grain leather and Nubuck upper for comfort and durability Solid rubb', 5),
(10, 'Air Force 1 Yellow', 'NEW ARRIVALS', 110, 'NIKE', 93, 2, 'Pre-owned: An item that has been used or worn previously. See the sellerâ€™s listing for full details and description of any imperfections. See all condition definitions.', 7),
(11, 'Off-White Jordan 1 University', 'BEST SELLER', 2399, 'Jordan', 94, 2, 'Since the creation of Limited Resell in 2020, our mission has been clear: to make available the rarest models that are out of stock everywhere else! To achieve this, we work with thousands of partner retailers in France, Europe and the rest of the world t', 8),
(12, 'Air Jordan 11 Concord', 'BEST SELLER', 200, 'Jordan', 95, 2, 'This 2018 release honors the first pairs of the â€œConcordâ€ AJ11 that Jordan debuted in the 1995 NBA Playoffs with the â€œ45â€ branding. The Air Jordan 11 â€œConcordâ€ officially released on December 8 and is no doubt one of the year\'s biggest sneaker', 9),
(13, 'Air Jordan 4 Red', 'NEW ARRIVALS', 120, 'Jordan', 96, 2, 'This 2018 release honors the first pairs of the Concorda AJ11 that Jordan debuted in the 1995 NBA Playoffs with the branding. The Air Jordan 11 Concorda officially released on December 8 and is no doubt one of the year\'s biggest sneaker', 10),
(14, 'Air Jordan 1 Off White', 'NEW ARRIVALS', 3089, 'Jordan', 97, 2, 'Everything OFF WHITE founder and designer Virgil Abloh touches turns into gold. If you question that statement, look no further than his highly anticipated collaboration with Nike for proof. The highlight of \"The Ten\" footwear collection is this deconstru', 11),
(15, 'Adidas Superstar 80S', 'BEST SELLER', 70, 'Adidas', 98, 2, 'The Superstar  item from the brand adidas which is part of the FA2020 season, has arrived || is now available at .', 12),
(16, 'Adidas EQT', 'NEW ARRIVALS', 223, 'Adidas', 99, 2, 'The Adidas Men\'s EQT Support Adv is a sneaker that is inspired by the original 1990s Equipment running shoes.', 13),
(17, 'Nike Air Max 90', 'BEST SELLER', 399, 'Nike', 100, 2, 'The Nike Air Max 90 is a golf shoe that has been slightly retooled for the golf course. It features the same timeless design and Air Max cushioning that can be seen and felt. ', 14),
(18, 'Nike Dunk Low Celtic', 'NEW ARRIVALS', 812, 'Nike', 101, 2, 'The Nike Dunk Low \"Celtics\" is a low-top sneaker that was released on June 13, 2023. The shoe is a combination of white, black, and Lucky Green, which matches the colors of the Boston Celtics.', 15),
(19, 'Nike Air Zoom Pegasus 33', 'NEW ARRIVALS', 135, 'Nike', 102, 2, 'The Nike Air Zoom Pegasus 33 is a neutral trainer running shoe that\'s suitable for daily use. It has a 10mm drop, weighs 10.8 oz for men, and 8.6 oz for women. ', 16),
(20, 'Nike Lupinek Flyknit', 'LIMITED EDITION', 230, 'Nike', 103, 2, 'The Nike Lupinek Flyknit ACG is a high-performance shoe that features Nike\'s Flyknit technology and an ACG-inspired design.', 17),
(21, 'Jordan Off-White NRG', 'BEST SELLER', 5500, 'Jordan', 104, 2, 'The Nike Air Jordan 1 Retro High Chrome Hearts Off-White NRG is a shoe that combines the iconic design of the Air Jordan 1 with Chrome Hearts hardware.', 18),
(22, 'Home Kit 2023', 'NEW ARRIVALS', 25, 'Phnom Penh Crown', 105, 1, '', 19),
(23, 'Warm Up Kit', 'NEW ARRIVALS', 20, 'Phnom Penh Crown', 106, 1, '', 22),
(24, 'Special Kit 2024', 'BEST SELLER', 30, 'Phnom Penh Crown', 107, 1, '', 23),
(25, 'GK Training Kit', 'NEW ARRIVALS', 20, 'Phnom Penh Crown', 108, 1, '', 24),
(26, 'Away Kit 2024', 'BEST SELLER', 25, 'Phnom Penh Crown', 109, 1, '', 25),
(27, 'BK Warm Up Kit 2024', 'NEW ARRIVALS', 20, 'Boeung Ket Angkor FC', 110, 1, '', 26),
(28, 'BK Away Jersey 2024', 'BEST SELLER', 25, 'Boeung Ket Angkor FC', 111, 1, '', 27),
(29, 'PPC warm up 2023', 'POPULAR', 20, 'Phnom Penh Crown', 112, 1, '', 28),
(30, 'PPC Away 2023', 'POPULAR', 25, 'Phnom Penh Crown', 113, 1, '', 29),
(31, 'BK Home Jersey 2024', 'BEST SELLER', 30, 'Boeung Ket Angkor FC', 114, 1, '', 30),
(32, 'BK Training Kit 2024', 'NEW ARRIVALS', 20, 'Boeung Ket Angkor FC', 115, 1, '', 31),
(33, 'Goalkeeper Kit', 'NEW ARRIVALS', 25, 'Boeung Ket Angkor FC', 116, 1, '', 32),
(34, 'BK Third Kit 2024', 'NEW ARRIVALS', 25, 'Boeung Ket Angkor FC', 117, 1, '', 33),
(37, 'VSK Home Jersey', 'BEST SELLER', 25, 'Visakha FC', 120, 1, '', 36),
(38, 'VSK Away Jersey', 'BEST SELLER', 25, 'Visakha FC', 121, 1, '', 37),
(39, 'VSK GK Train Jersey', 'NEW ARRIVALS', 20, 'Visakha FC', 122, 1, '', 38),
(40, 'VSK GK Jersey', 'NEW ARRIVALS', 25, 'Visakha FC', 123, 1, '', 39),
(41, 'VSK Train Jersey', 'NEW ARRIVALS', 20, 'Visakha FC', 124, 1, '', 40),
(42, 'VSK Transportation Jersey', 'NEW ARRIVALS', 30, 'Visakha FC', 125, 1, '', 41),
(43, 'VSK Warmup Jersey', 'NEW ARRIVALS', 20, 'Visakha FC', 126, 1, '', 42),
(44, 'Away Jersey 2024', 'NEW ARRIVALS', 15, 'Svay Rieng FC', 127, 1, '', 43),
(45, 'Training Jersey', 'BEST SELLER', 15, 'Svay Rieng FC', 128, 1, '', 44),
(46, 'Home Jersey', 'BEST SELLER', 20, 'Svay Rieng FC', 129, 1, '', 45),
(47, 'Goalkeeper Kit', 'NEW ARRIVALS', 20, 'Svay Rieng FC', 130, 1, '', 46),
(48, 'Goalkeeper Home Jersey', 'NEW ARRIVALS', 20, 'Svay Rieng FC', 131, 1, '', 47),
(49, 'Goalkeeper Training Kit', 'NEW ARRIVALS', 25, 'Nagaworld FC', 132, 1, '', 48),
(50, 'Training Jersey', 'NEW ARRIVALS', 20, 'Nagaworld FC', 133, 1, '', 49),
(51, 'Training Jersey', 'NEW ARRIVALS', 25, 'Nagaworld FC', 134, 1, '', 50),
(52, 'Home Jersey', 'NEW ARRIVALS', 25, 'Nagaworld FC', 135, 1, '', 51),
(53, 'Away Kit 2024', 'NEW ARRIVALS', 25, 'Nagaworld FC', 136, 1, '', 52),
(54, 'Warm Up Kit', 'NEW ARRIVALS', 20, 'Nagaworld FC', 137, 1, '', 53),
(55, 'Away Kit 2024', 'NEW ARRIVALS', 20, 'ISI Dangkor Senchey', 138, 1, '', 54),
(56, 'Home Jersey', 'NEW ARRIVALS', 25, 'ISI Dangkor Senchey', 139, 1, '', 55),
(57, 'Warm Up Kit', 'NEW ARRIVALS', 20, 'ISI Dangkor Senchey', 140, 1, '', 56),
(58, 'Third Jersey', 'NEW ARRIVALS', 25, 'ISI Dangkor Senchey', 141, 1, '', 57),
(59, 'Transportation Jersey', 'NEW ARRIVALS', 30, 'ISI Dangkor Senchey', 142, 1, '', 58),
(60, 'Training Jersey', 'NEW ARRIVALS', 15, 'Angkor Tiger', 143, 1, '', 59),
(61, 'Home Jersey', 'NEW ARRIVALS', 25, 'Angkor Tiger', 144, 1, '', 60),
(62, 'Transportation Jersey', 'NEW ARRIVALS', 25, 'Angkor Tiger', 145, 1, '', 61),
(63, 'Away Kit 2024', 'NEW ARRIVALS', 15, 'Angkor Tiger', 146, 1, '', 62),
(64, 'Jacket', 'NEW ARRIVALS', 35, 'Angkor Tiger', 147, 1, '', 63),
(65, 'Training Jersey 2023', 'NEW ARRIVALS', 10, 'Angkor Tiger', 148, 1, '', 64),
(66, 'Training Jersey', 'NEW ARRIVALS', 15, 'Prey Veng FC', 149, 1, '', 65),
(67, 'Away Kit 2024', 'BEST SELLER', 25, 'Prey Veng FC', 150, 1, '', 66),
(68, 'Goalkeeper Training Kit', 'NEW ARRIVALS', 20, 'Prey Veng FC', 151, 1, '', 67),
(69, 'Transportation Jersey', 'BEST SELLER', 30, 'Prey Veng FC', 152, 1, '', 68),
(70, 'Training Jersey', 'NEW ARRIVALS', 20, 'Prey Veng FC', 153, 1, '', 69),
(71, 'Home Jersey', 'BEST SELLER', 25, 'Prey Veng FC', 154, 1, '', 70),
(72, 'Goalkeeper Kit', 'BEST SELLER', 25, 'Prey Veng FC', 155, 1, '', 71),
(73, 'Home Jersey', 'NEW ARRIVALS', 20, 'Kirivong Sok Senchey', 156, 1, '', 72),
(74, 'Training Jersey', 'NEW ARRIVALS', 15, 'Kirivong Sok Senchey', 157, 1, '', 73),
(75, 'Warm Up Kit', 'NEW ARRIVALS', 15, 'Kirivong Sok Senchey', 158, 1, '', 74),
(76, 'Goalkeeper Kit', 'NEW ARRIVALS', 20, 'Kirivong Sok Senchey', 159, 1, '', 75),
(77, 'Away Jersey 2024', 'NEW ARRIVALS', 20, 'Kirivong Sok Senchey', 160, 1, '', 76),
(78, 'Warm Up Kit', 'NEW ARRIVALS', 15, 'Tiffy Army FC', 161, 1, '', 77),
(79, 'Transportation Jersey', 'BEST SELLER', 20, 'Tiffy Army FC', 162, 1, '', 78),
(80, 'Training Jersey', 'NEW ARRIVALS', 15, 'Tiffy Army FC', 163, 1, '', 79),
(81, 'Home Jersey', 'NEW ARRIVALS', 25, 'Tiffy Army FC', 164, 1, '', 80),
(82, 'Warm Up Kit', 'BEST SELLER', 15, 'Tiffy Army FC', 165, 1, '', 81),
(83, 'Training Jersey', 'NEW ARRIVALS', 20, 'Tiffy Army FC', 166, 1, '', 82);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `quantity`) VALUES
(1, 4, 3),
(2, 5, 3),
(3, 6, 10),
(4, 7, 5),
(5, 8, 7),
(7, 10, 20),
(8, 11, 3),
(9, 12, 200),
(10, 13, 4),
(11, 14, 3),
(12, 15, 5),
(13, 16, 6),
(14, 17, 5),
(15, 18, 3),
(16, 19, 5),
(17, 20, 2),
(18, 21, 2),
(19, 22, 99),
(20, 1, 100),
(21, 2, 100),
(22, 23, 100),
(23, 24, 100),
(24, 25, 100),
(25, 26, 100),
(26, 27, 100),
(27, 28, 100),
(28, 29, 100),
(29, 30, 100),
(30, 31, 100),
(31, 32, 100),
(32, 33, 100),
(33, 34, 100),
(36, 37, 200),
(37, 38, 200),
(38, 39, 100),
(39, 40, 100),
(40, 41, 100),
(41, 42, 100),
(42, 43, 100),
(43, 44, 100),
(44, 45, 100),
(45, 46, 100),
(46, 47, 100),
(47, 48, 100),
(48, 49, 100),
(49, 50, 100),
(50, 51, 100),
(51, 52, 100),
(52, 53, 100),
(53, 54, 100),
(54, 55, 100),
(55, 56, 100),
(56, 57, 100),
(57, 58, 100),
(58, 59, 99),
(59, 60, 100),
(60, 61, 100),
(61, 62, 100),
(62, 63, 100),
(63, 64, 100),
(64, 65, 100),
(65, 66, 100),
(66, 67, 100),
(67, 68, 99),
(68, 69, 100),
(69, 70, 100),
(70, 71, 99),
(71, 72, 100),
(72, 73, 100),
(73, 74, 100),
(74, 75, 99),
(75, 76, 100),
(76, 77, 100),
(77, 78, 99),
(78, 79, 99),
(79, 80, 100),
(80, 81, 100),
(81, 82, 100),
(82, 83, 99);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `type_user`) VALUES
(1, 'Makara', 'Sok', 'makarasok1624@gmail.com', 'makara16', '202cb962ac59075b964b07152d234b70', 'customer'),
(2, 'Sok', 'Sothy', 'makarasok1624@gmail.com', 'makara16', '202cb962ac59075b964b07152d234b70', 'customer'),
(3, 'Pheong', 'Sovankanha', 'sovannara@gmail.com', 'sovankanha', '9365f8127adaa91c6ed8433cd9f32c24', 'customer'),
(4, 'Srun', 'Srorn', 'bert@gmail.com', 'bertCambo', '43b97d3f99f7c438b72e46efedd40bae', 'customer'),
(5, 'Makara', 'Sok', 'makarasok1624@gmail.com', 'mkr', '5dec707028b05bcbd3a1db5640f842c5', 'admin'),
(6, 'Makara', 'Sok', 'makarasok1624@gmail.com', 'smk', '8f3c224de4183e87c11959f74bfac3fd', 'admin'),
(7, 'Mat', 'Ehak', 'ehak@gmail.com', 'ehak123', '202cb962ac59075b964b07152d234b70', 'customer'),
(8, 'Sok', 'makara', 'makarasok.it@gmail.com', 'makarasok', 'a0478ceffd2e47725091a846d5eb4473', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
