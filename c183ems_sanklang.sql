-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2021 at 10:37 AM
-- Server version: 10.4.19-MariaDB-1:10.4.19+maria~bionic
-- PHP Version: 7.2.34-21+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c183ems_sanklang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `type`, `emp_id`, `username`, `first_name`, `last_name`, `email`, `password`, `picture`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 1, NULL, 'itg007', 'ทดสอบ', 'ระบบ', 'itg007@gmail.com', '$2y$10$bGG4POb.kYgbScfp2/w5W.Ud4HdmQi0u5JdgoFRsiuRJOOoLE9Mya', 'LOGO_1615888137.png', '9XpCQZRiBJRIMSSF9tXkcSBGLpJy2JWqXY2DIY2X2V1atxaTIBe7fTZtHcxB', NULL, '2021-03-16 09:47:44', '2021-03-16 09:48:57'),
(14, 1, NULL, 'adminsanklang', 'ADMIN', 'อบต.สันกลาง', 'info@sanklang.go.th', '$2y$10$Rj.A.IuyW7ntzxjrgQofDOqMhwHuDms.JUzPpIBkXuksVAF/T4tqu', 'admin_1616669995.png', 'GOtLH7tL6q4Vfk2tiyLbgqZWSrs54WSZp0JLmML189IVfCasc6kCWwhxygnZ', NULL, '2021-03-25 10:59:55', '2021-03-29 03:53:11'),
(33, 99, 6, '3509900616961', 'ชาคริต', 'มีราจง', '3509900616961', '$2y$10$Bf0F4qd4eHBTu7dcghRhXuYGkpekLqzuAjv9p6xDVn3X4cZYC8BhS', 'no_image.png', 'pYN3S7S8V6VE3WQ7Sb11YEXUWSJjEQ0srHasNLntLP6FyXEhVLUE13RohyGA', NULL, '2021-04-27 08:36:35', '2021-04-27 08:36:35'),
(34, 99, 7, '3200200512946', 'ศรัญญา', 'กันยาเลิศ', '3200200512946', '$2y$10$MiakRPUsEDdWzWNtkA0ZTuFQQ517H1h.IFjzGCZPTanONbSh25.DW', 'no_image.png', NULL, NULL, '2021-04-27 08:42:20', '2021-04-27 08:42:20'),
(35, 99, 8, '3630100484157', 'ระวีวรรณ', 'ธรรมสานุกุล', '3630100484157', '$2y$10$rUk98yeT/Z1CYCnQwkqUMOSevzeqH/SKG5N7z3S1iwFAO09xvqGli', 'no_image.png', NULL, NULL, '2021-04-27 08:44:18', '2021-04-27 08:44:18'),
(36, 99, 9, '3501200973381', 'สุบิน', 'กันทะสี', '3501200973381', '$2y$10$OUP4CoQ0Frhb1eKzmAPMBuCIKi8IIE3Jmejz7yW4nBp5Z4RbHnnOa', 'no_image.png', NULL, NULL, '2021-04-27 08:47:22', '2021-04-27 08:47:22'),
(37, 99, 10, '3510600718140', 'สุรีพร', 'ยศอนันต์', '3510600718140', '$2y$10$krVD8Hc4hCK3.MDCWtUI2.elyOdSaYwDskGeYSpdU4CjnRfvx2k7a', 'no_image.png', NULL, NULL, '2021-04-27 08:55:58', '2021-04-27 08:55:58'),
(38, 99, 11, '3510600693082', 'นิรันดร', 'ธัญใจ', '3510600693082', '$2y$10$/veXLg2cxP76amrw6/w1s.jzjQqC.1erdUPltyagarvOv2paoOc.a', 'no_image.png', NULL, NULL, '2021-04-27 08:59:36', '2021-04-27 08:59:36'),
(39, 99, 12, '3501200981227', 'วราพร', 'จารุพันธ์', '3501200981227', '$2y$10$3ycVlBUifUCSH6Ng1MdgbuRjDJv7qgp2/aa.GnbRH5jebuF1BhWYO', 'no_image.png', NULL, NULL, '2021-04-27 09:07:42', '2021-04-27 09:07:42'),
(40, 99, 13, '3550100724060', 'ณัฐธิดา', 'ขันทะยศ', '3550100724060', '$2y$10$ZCuqHQJizxQLcSCSmUbIqeaEy2tN0dXYqaDgdWE2.rJLJjHT9JGxW', 'no_image.png', NULL, NULL, '2021-04-27 09:09:12', '2021-04-27 09:09:12'),
(41, 99, 14, '3501200162650', 'บุศรา', 'สมศรี', '3501200162650', '$2y$10$zQoxb8PiiTPxSgztrBaFKuUbtZocY2t9wZ/RpyGqoh8x/FCggRgYC', 'no_image.png', NULL, NULL, '2021-04-27 09:10:56', '2021-04-27 09:10:56'),
(42, 99, 15, '3501200965167', 'พงศ์ภัค', 'เมืองจันทร์', '3501200965167', '$2y$10$dm4mM1CNJvxoEWsRxyPa4.uGhjhFINw7ZkfHR4gsbrAL.G/R0LBrO', 'no_image.png', NULL, NULL, '2021-04-27 09:12:16', '2021-04-27 09:12:16'),
(43, 99, 16, '3501500539864', 'มนัสวี', 'วิวัฒนาวิไล', '3501500539864', '$2y$10$U0xFmp9iQJTl4F6j8sBIjef5JncGb6kU2GC2H8fL0jLux1z2a4f6e', 'no_image.png', 'KsRom12teBANYKe8O8nbAoaxzuIomPTQELmerTi6TriJmgIehpltU8bnXz6r', NULL, '2021-04-27 09:14:02', '2021-04-27 09:14:02'),
(44, 99, 17, '3550100481370', 'สุกัญญา', 'ถาไชย', '3550100481370', '$2y$10$gLCzHEChlUT6S7kx/xQXS.QlaLIL5.ioVfape3R6NBg0K6YRpJO7S', 'no_image.png', NULL, NULL, '2021-04-27 09:15:17', '2021-04-27 09:15:17'),
(45, 99, 18, '3501500186783', 'จันทิรา', 'คำไหว', '3501500186783', '$2y$10$fUPSXQYQ5otETFY1q8HToOSBGxChye/J.BHuijSLKi.FVL4I78K6W', 'no_image.png', 'ntSKQSFnuZVmgy3iK4ixuV75DYYUKA4HhVDYVeBiwil5kaqxbHDGE2YrdiCi', NULL, '2021-04-27 09:16:39', '2021-04-27 09:16:39'),
(46, 99, 19, '3501200283422', 'จันทร์ฟอง', 'วิชัยชมภู', '3501200283422', '$2y$10$z9IpfTZpi46vFsPKnleJv.NtgytUrL20XDbG1XlHldsyGrpv79tua', 'no_image.png', NULL, NULL, '2021-04-27 09:22:29', '2021-04-27 09:22:29'),
(47, 99, 20, '1509900073201', 'เพชรรัตน์', 'คำแปง', '1509900073201', '$2y$10$RszR1067KWZrXtp9Bdx0lulQ/EHYtsfeQelhzz5ZBq59XVG8wwNvm', 'no_image.png', NULL, NULL, '2021-04-27 09:23:30', '2021-04-27 09:23:30'),
(48, 99, 21, '3501200979958', 'จิราภา', 'สารอุยี่', '3501200979958', '$2y$10$x/oF1UH28DJ7LcRKgMAQpeueLPVBKzwKoQpFZz5wFkVpXbJC2XuHK', 'no_image.png', NULL, NULL, '2021-04-27 09:25:13', '2021-04-27 09:25:13'),
(49, 99, 22, '3501200128371', 'กรรณิการ์', 'ขันทะ', '3501200128371', '$2y$10$0uoJzPgaYfN2uZHZw0CGWuM49EnLCTrG6sl/bpus/NdfZeAoKFTr.', 'no_image.png', NULL, NULL, '2021-04-27 09:26:19', '2021-04-27 09:26:19'),
(50, 99, 23, '3501200790251', 'เรวัต', 'คำทะลา', '3501200790251', '$2y$10$Zjp5So5UC2Q/n8W2fnue0eDFuRwQduTs3aG/qNEwbsrUgqwN/VfEG', 'no_image.png', NULL, NULL, '2021-04-27 09:27:50', '2021-04-27 09:27:50'),
(51, 99, 24, '1509901036236', 'ชมัยพร', 'อาษาพนม', '1509901036236', '$2y$10$0SKwe6oyb3ROsXlGNg.BP.13ymbBdJ73L7RiqZPo7TSiD6XZJolw6', 'no_image.png', 'TG0H6IRjEwBBR4FzO5oyiG4sWreMm8k80lk5a9v2UagXTjp8geXwR9HUVSpm', NULL, '2021-04-27 09:28:46', '2021-04-27 09:28:46'),
(52, 99, 25, '1509901369545', 'กรรณิการ์', 'พรประเสริฐ', '1509901369545', '$2y$10$6RhDFmda4UJ.8RReh/uQrOAA3w/NnJtEqJ8Kui0qJYkAVA1E3MT5O', 'no_image.png', NULL, NULL, '2021-04-27 09:29:46', '2021-04-27 09:29:46'),
(53, 99, 26, '1509901465030', 'จุฑามาศ', 'ยาวิลาศ', '1509901465030', '$2y$10$lxoQT7gtmIM3BcWxiLOQB.takYlLiOH5oyGA9qUBFkvsr312.GR/O', 'no_image.png', NULL, NULL, '2021-04-27 09:31:04', '2021-04-27 09:31:04'),
(54, 99, 27, '1501200105056', 'ทิพย์รัตน์', 'เต๋จ๊ะแก้ว', '1501200105056', '$2y$10$Ou26cO4lnT/psiow7qGS.erp/lztMRFfV.Oo0WrP.d5GO1VQ/l/72', 'no_image.png', NULL, NULL, '2021-04-27 09:32:13', '2021-04-27 09:32:13'),
(55, 99, 28, '1509900971047', 'ธัญญาลักษณ์', 'สุทธานิน', '1509900971047', '$2y$10$jcqRhe3GOvoFrjWt9OVC8OQWIat/EoYYCrjpN6kelhhvgu4RxuJa2', 'no_image.png', NULL, NULL, '2021-04-27 09:33:15', '2021-04-27 09:33:15'),
(56, 99, 29, '1509900401194', 'นฤมล', 'กินเขียว', '1509900401194', '$2y$10$518cho/JDfHltZjCjMQmHeiIPiz2wmGWElmgN/R09U1L.1mQrLOuO', 'no_image.png', NULL, NULL, '2021-04-27 09:34:28', '2021-04-27 09:34:28'),
(57, 99, 30, '1509901374751', 'ปริสนา', 'โกฎิแก้ว', '1509901374751', '$2y$10$.SjrHvO7qwKfRL38EUGQvub7s2tnfmtbujFWmCW6qN.PMz7yIED6m', 'no_image.png', 'kgJAbCBmqVV3p1rryLf5RkBpb7iK2ZyqZPzafxGQZ7peeJmmbNgQQvCVwGLY', NULL, '2021-04-27 09:35:49', '2021-04-27 09:35:49'),
(58, 99, 31, '1509900467331', 'รัตติกาล', 'วิยะ', '1509900467331', '$2y$10$LqYz.bCWC45ltinZxs45v.4Jt.t5g7knNiyi8sihjdhHYsKhMO0TW', 'no_image.png', NULL, NULL, '2021-04-27 09:38:24', '2021-04-27 09:38:24'),
(59, 99, 32, '3501200965591', 'เชิดศักดิ์', 'โนจา', '3501200965591', '$2y$10$5CysR67BqfUxVWU6202XKO/u5RE4XNARGnJBtLNiaRaO4dyUBxX9y', 'no_image.png', NULL, NULL, '2021-04-28 03:09:11', '2021-04-28 03:09:11'),
(60, 99, 33, '1509900860920', 'จตุภัทร', 'อินทนนท์', '1509900860920', '$2y$10$i/CIwxPrURkQqhqqHGMhYuy1v4hsFVJXCZ62qUxUwN5lC0k5ndsBi', 'no_image.png', 'kg9ONd7DrCk38nI8jyGwG32Mn5qUgVWM5djjSXspqdAyh2kUeaBswnVUj1tL', NULL, '2021-04-28 03:10:15', '2021-04-28 03:10:15'),
(61, 99, 34, '2501501019025', 'ธรรมรัตน์', 'สุวรรณรัตน์', '2501501019025', '$2y$10$sbhgeSD2fm5lEGm0EymXvexgPg6dm62YgQevfMwr2HiQguOLYEmai', 'no_image.png', NULL, NULL, '2021-04-28 03:11:11', '2021-04-28 03:11:11'),
(62, 99, 35, '3501200974964', 'พงศ์เศวต', 'เตชัย', '3501200974964', '$2y$10$9NPqC0t9UZpGaCrvBgyYCO0K/NaCLevXEbv6.6tyzte2BYtt1nnPy', 'no_image.png', NULL, NULL, '2021-04-28 03:12:28', '2021-04-28 03:12:28'),
(63, 99, 36, '1509900421659', 'รัฐชัย', 'นันโท', '1509900421659', '$2y$10$vUweOyWGEbBhgUZWjvnKNeoAhPCZohLipCzjRHJfZBlhlhbPihDWm', 'no_image.png', NULL, NULL, '2021-04-28 03:13:18', '2021-04-28 03:13:18'),
(64, 99, 37, '150990080941', 'พีรวิชญ์', 'สุต๋า', '150990080941', '$2y$10$xkF.IzKafLokqzSnpTChb.CjAlYVc0oru5DdLWNh4rWTOxZEkA/oa', 'no_image.png', NULL, NULL, '2021-04-28 03:15:55', '2021-04-28 03:15:55'),
(65, 99, 38, '3501200984731', 'ปิยะนุช', 'สิงห์ต๊ะ', '3501200984731', '$2y$10$iuHVNSQnZJmGP3J7CFC2OOOZqooJeEJfZFvqQHz6pibAZx0OeGJtu', 'no_image.png', NULL, NULL, '2021-04-28 03:17:21', '2021-04-28 03:17:21'),
(66, 99, 39, '1609900237792', 'เฉลิมวุฒิ', 'ใจชนะ', '1609900237792', '$2y$10$CocuylArLxTxQw9f8bIKEevyIWElH2zu84A6TQqVLwyFieeo6F4oe', 'no_image.png', NULL, NULL, '2021-04-28 03:18:23', '2021-04-28 03:18:23'),
(67, 99, 40, '3501201246417', 'ไพศาล', 'ไชยชะนะ', '3501201246417', '$2y$10$E8dcQTWYnlwBUJvurDwSKe3lVP3exIMYkI.k4fvg5BOntop8YRH36', 'no_image.png', NULL, NULL, '2021-04-28 03:19:40', '2021-04-28 03:19:40'),
(68, 99, 41, '3501200981251', 'คริษฐ์พงศ์', 'มณีคำ', '3501200981251', '$2y$10$4rDVcgmIXLs9oBorUAHv6./WUL6CcJhsLdqBIUQgjEQXWMkmRRU6q', 'no_image.png', NULL, NULL, '2021-04-28 03:23:53', '2021-04-28 03:23:53'),
(69, 99, 42, '3501200979991', 'ดำรง', 'ศรีนันตา', '3501200979991', '$2y$10$mLWVuwK7NMIz9XFDtw/n9ebNoRlYtZZn3soHXrtqsQ5nnK/A15mOq', 'no_image.png', NULL, NULL, '2021-04-28 03:25:13', '2021-04-28 03:25:13'),
(70, 99, 43, '1509900545684', 'ธันยา', 'แสนขันแก้ว', '1509900545684', '$2y$10$owL7q6lJSHq48noO2OBOpO4DdKQJK7G1bF6dNaVB6O8FjwbZ6/X4i', 'no_image.png', NULL, NULL, '2021-04-28 03:26:49', '2021-04-28 03:26:49'),
(71, 99, 44, '3501200975219', 'ปรีชา', 'ยาวิลาศ', '3501200975219', '$2y$10$UxQiu25ZbUl6tHQUKGcIIOKnd.OgXZvE8O9MaNsVcjBmlWD3Co3Yu', 'no_image.png', NULL, NULL, '2021-04-28 03:27:52', '2021-04-28 03:27:52'),
(72, 99, 45, '3501200972929', 'สมชาย', 'ไชยวุฒิ', '3501200972929', '$2y$10$WRBvNO3lcCR77EqLPDIx...BTo9P9M/jQh0JEkrdDqa79j0Zfma/C', 'no_image.png', NULL, NULL, '2021-04-28 03:29:19', '2021-04-28 03:29:19'),
(73, 99, 46, '3501201026202', 'ขวัญดาว', 'จันทร์แดง', '3501201026202', '$2y$10$IGsz1egDXGUlAmjBnLRV8.XqfZ14Pyo2zwirUVjBFqXBW9GbWuO5G', 'no_image.png', 'kxplGkfbH3pTs2tUUr7FSGIGe5ksuuSmmWPNpzuvEZwRLxEybLD6Bytcpy77', NULL, '2021-04-28 03:30:41', '2021-04-28 03:30:41'),
(74, 99, 47, '3501500057151', 'ปทุมพร', 'ไชยจันดี', '3501500057151', '$2y$10$aWPrrJEEcCZPFBwpxqQG9OL5xmJ7sXozFdhRqKMDzfTgfsjwdEnLK', 'no_image.png', NULL, NULL, '2021-04-28 03:31:56', '2021-04-28 03:31:56'),
(75, 99, 48, '3501500103454', 'อัจฉรี', 'สายต้อม', '3501500103454', '$2y$10$O/nJS5SJQ1CvZrlJqU5OCu0KkE1Agcyl3SkOqJL4tTv4JXVA1xBnS', 'no_image.png', NULL, NULL, '2021-04-28 03:33:09', '2021-04-28 03:33:09'),
(76, 99, 5, '3501500111805', 'เปรมใจ', 'บัวไสย', '3501500111805', '$2y$10$JOxq62Kp.yvLd6G6fOAJxOWwmWouwXYnuyRdxEncgTL.FCF1RANGy', 'no_image.png', 'CpVWvJayGl0beNjwiWPViJL94KfyNfJQNLuQTsGpBPeUZvoANLumr7LNt5Th', NULL, '2021-04-28 05:00:22', '2021-04-28 05:00:22'),
(77, 99, 49, '12345678', 'ทดสอบ', 'ระบบ', '12345678', '$2y$10$lvFiyfArj45EHkhcmaEOjuWigf023oDI4E6QlAOkm3tCofbQHEL0K', 'no_image.png', 'QFF4m5PnxiBijWvme7s3FkXTfwEwWtd1UxrSoZFBPqzhLIZW7AfpPBJsdjmB', NULL, '2021-04-28 07:16:03', '2021-04-28 07:16:03'),
(78, 99, 51, 'cunelsandas', 'พศิน', 'ทองเกื้อ', 'cunelsandas', '$2y$10$rMIupvdbGuYqnH825ZJI6uWaNh/2beWMUVak7u9YPRSHeuZh1EM26', 'no_image.png', NULL, NULL, '2021-05-11 07:23:37', '2021-05-11 07:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'เชียงใหม่', 50120, '2021-02-17 21:06:47', '2021-04-20 07:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'ไทย', '2021-02-17 21:06:55', '2021-02-17 21:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `dept_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `created_at`, `updated_at`) VALUES
(1, 'สำนักปลัด', '2021-02-17 21:06:04', '2021-03-25 04:05:58'),
(2, 'กองคลัง', '2021-02-24 04:39:40', '2021-03-25 04:06:04'),
(3, 'กองช่าง', '2021-03-25 04:06:24', '2021-03-25 04:06:24'),
(4, 'กองศึกษา ศาสนา และวัฒนธรรม', '2021-03-25 04:06:29', '2021-04-20 07:05:32'),
(5, 'หัวหน้าส่วนราชการ', '2021-04-27 03:23:37', '2021-04-27 03:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `division_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(4, 'ปลัดอบต.', '2021-02-24 04:40:10', '2021-04-20 07:07:18'),
(5, 'รองปลัดอบต.', '2021-02-24 04:40:35', '2021-04-20 07:07:25'),
(6, 'หัวหน้าสำนักปลัด', '2021-02-24 04:40:49', '2021-04-20 07:07:39'),
(7, 'นักวิชาการเงินและบัญชี', '2021-04-19 08:44:15', '2021-04-19 08:44:15'),
(8, 'ผู้อำนวยการกองคลัง', '2021-04-19 08:44:32', '2021-04-19 08:44:32'),
(9, 'ผู้อำนวยการกองการศึกษา ศาสนา และวัฒนธรรม', '2021-04-20 07:08:41', '2021-04-20 07:08:41'),
(10, 'ผู้อำนวยการกองช่าง', '2021-04-20 07:08:53', '2021-04-20 07:08:53'),
(11, 'นักทรัพยากรบุคคล', '2021-04-20 07:09:10', '2021-04-20 07:09:10'),
(12, 'นักวิเคราะห์นโยบายและแผน', '2021-04-20 07:09:21', '2021-04-20 07:09:21'),
(13, 'นักจัดการงานทั่วไป', '2021-04-20 07:09:30', '2021-04-20 07:09:30'),
(14, 'นักพัฒนาชุมชน', '2021-04-20 07:09:40', '2021-04-20 07:09:40'),
(15, 'แม่บ้าน', '2021-04-20 07:09:50', '2021-04-20 07:09:50'),
(16, 'พนักงานขับรถ', '2021-04-20 07:09:58', '2021-04-20 07:09:58'),
(17, 'คนตกแต่งสวน', '2021-04-20 07:10:05', '2021-04-20 07:10:05'),
(18, 'คนงานทั่วไป', '2021-04-20 07:10:15', '2021-04-20 07:10:15'),
(19, 'พนักงานดับเพลิง', '2021-04-20 07:10:26', '2021-04-20 07:10:26'),
(20, 'นักวิชาการจัดเก็บรายได้', '2021-04-20 07:10:44', '2021-04-20 07:10:44'),
(21, 'นักวิชาการพัสดุ', '2021-04-20 07:10:54', '2021-04-20 07:10:54'),
(22, 'วิศวกรโยธา', '2021-04-20 07:11:16', '2021-04-20 07:11:16'),
(23, 'ครู ค.ศ.2', '2021-04-20 07:11:39', '2021-04-20 07:11:39'),
(24, 'ครู ค.ศ.1', '2021-04-20 07:11:46', '2021-04-20 07:11:46'),
(25, 'ผู้ดูแลเด็ก', '2021-04-20 07:11:59', '2021-04-20 07:11:59'),
(26, 'ผู้ช่วยนายช่างโยธา', '2021-04-28 03:22:45', '2021-04-28 03:22:45'),
(27, 'ผู้ช่วยนายช่างไฟฟ้า', '2021-04-28 03:25:38', '2021-04-28 03:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_fields`
--

CREATE TABLE `dynamic_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `join_date` date NOT NULL,
  `birth_date` date DEFAULT NULL,
  `dept_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `salary_id` int(10) UNSIGNED NOT NULL,
  `age` int(11) DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `title_name`, `first_name`, `last_name`, `email`, `phone`, `address`, `gender_id`, `join_date`, `birth_date`, `dept_id`, `country_id`, `state_id`, `city_id`, `division_id`, `salary_id`, `age`, `picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'ชาคริต', 'มีราจง', 'sanklang258@gmail.com', NULL, NULL, 1, '1997-07-15', NULL, 5, 1, 1, 1, 4, 19, NULL, 'unnamed_1619511059.png', '2021-04-27 03:59:58', '2021-04-27 08:19:58', '2021-04-27 08:19:58'),
(2, NULL, 'ทดสอบ', 'ระบบ', 'zzzz', NULL, NULL, 2, '2021-04-27', NULL, 4, 1, 1, 1, 13, 14, NULL, 'no_image.png', '2021-04-27 04:00:59', '2021-04-27 08:20:03', '2021-04-27 08:20:03'),
(3, NULL, 'ทดสอบ', 'ทดสอบ', 'test1', NULL, NULL, 1, '2021-04-27', NULL, 2, 1, 1, 1, 21, 24, NULL, 'no_image.png', '2021-04-27 04:06:44', '2021-04-27 08:20:05', '2021-04-27 08:20:05'),
(4, NULL, 'ชาคริต', 'มีราจง', '133001101001', NULL, NULL, 1, '1997-07-15', NULL, 5, 1, 1, 1, 4, 19, NULL, 'unnamed_1619512246.png', '2021-04-27 08:30:46', '2021-04-27 08:35:36', '2021-04-27 08:35:36'),
(5, NULL, 'เปรมใจ', 'บัวไสย', '3501500111805', NULL, NULL, 2, '1997-04-01', NULL, 5, 1, 1, 1, 5, 20, NULL, 'unnamed_1619512595.png', '2021-04-28 05:00:22', '2021-04-28 05:00:22', NULL),
(6, NULL, 'ชาคริต', 'มีราจง', '3509900616961', NULL, NULL, 1, '1997-07-15', NULL, 5, 1, 1, 1, 4, 19, NULL, 'unnamed_1619512595.png', '2021-04-27 08:36:35', '2021-04-27 08:36:35', NULL),
(7, NULL, 'ศรัญญา', 'กันยาเลิศ', '3200200512946', NULL, NULL, 2, '1990-08-06', NULL, 1, 1, 1, 1, 6, 21, NULL, 'unnamed_1619512939.png', '2021-04-27 08:42:19', '2021-04-27 08:42:19', NULL),
(8, NULL, 'ระวีวรรณ', 'ธรรมสานุกุล', '3630100484157', NULL, NULL, 2, '1997-04-01', NULL, 2, 1, 1, 1, 8, 20, NULL, 'unnamed_1619512595_1619586550.png', '2021-04-27 08:44:18', '2021-04-28 05:09:10', NULL),
(9, NULL, 'สุบิน', 'กันทะสี', '3501200973381', NULL, NULL, 1, '1997-08-01', NULL, 3, 1, 1, 1, 10, 30, NULL, 'unnamed_1619513242.png', '2021-04-27 08:47:22', '2021-04-27 08:47:22', NULL),
(10, NULL, 'สุรีพร', 'ยศอนันต์', '3510600718140', NULL, NULL, 2, '2005-11-01', NULL, 4, 1, 1, 1, 9, 32, NULL, 'unnamed_1619513758.png', '2021-04-27 08:55:58', '2021-04-27 08:55:58', NULL),
(11, NULL, 'นิรันดร', 'ธัญใจ', '3510600693082', NULL, NULL, 1, '2004-09-01', NULL, 3, 1, 1, 1, 22, 31, NULL, 'unnamed_1619513976.png', '2021-04-27 08:59:36', '2021-04-27 08:59:36', NULL),
(12, NULL, 'วราพร', 'จารุพันธ์', '3501200981227', NULL, NULL, 2, '2005-03-01', NULL, 1, 1, 1, 1, 12, 22, NULL, 'unnamed_1619514461.png', '2021-04-27 09:07:41', '2021-04-27 09:07:41', NULL),
(13, NULL, 'ณัฐธิดา', 'ขันทะยศ', '3550100724060', NULL, NULL, 2, '2004-09-01', NULL, 1, 1, 1, 1, 11, 23, NULL, 'unnamed_1619514552.png', '2021-04-27 09:09:12', '2021-04-27 09:09:12', NULL),
(14, NULL, 'บุศรา', 'สมศรี', '3501200162650', NULL, NULL, 2, '2006-07-03', NULL, 1, 1, 1, 1, 14, 25, NULL, 'unnamed_1619514656.png', '2021-04-27 09:10:56', '2021-04-27 09:10:56', NULL),
(15, NULL, 'พงศ์ภัค', 'เมืองจันทร์', '3501200965167', NULL, NULL, 1, '2005-12-01', NULL, 1, 1, 1, 1, 13, 27, NULL, 'unnamed_1619514736.png', '2021-04-27 09:12:16', '2021-04-27 09:12:16', NULL),
(16, NULL, 'มนัสวี', 'วิวัฒนาวิไล', '3501500539864', NULL, NULL, 2, '2004-09-01', NULL, 2, 1, 1, 1, 7, 24, NULL, 'unnamed_1619514841.png', '2021-04-27 09:14:01', '2021-04-27 09:14:01', NULL),
(17, NULL, 'สุกัญญา', 'ถาไชย', '3550100481370', NULL, NULL, 2, '2004-09-01', NULL, 2, 1, 1, 1, 20, 28, NULL, 'unnamed_1619514917.png', '2021-04-27 09:15:17', '2021-04-27 09:15:17', NULL),
(18, NULL, 'จันทิรา', 'คำไหว', '3501500186783', NULL, NULL, 2, '2008-04-08', NULL, 2, 1, 1, 1, 21, 29, NULL, 'unnamed_1619514999.png', '2021-04-27 09:16:39', '2021-04-27 09:16:39', NULL),
(19, NULL, 'จันทร์ฟอง', 'วิชัยชมภู', '3501200283422', NULL, NULL, 2, '2012-07-02', NULL, 4, 1, 1, 1, 23, 36, NULL, 'unnamed_1619515349.png', '2021-04-27 09:22:29', '2021-04-27 09:22:29', NULL),
(20, NULL, 'เพชรรัตน์', 'คำแปง', '1509900073201', NULL, NULL, 2, '2018-02-01', NULL, 4, 1, 1, 1, 24, 35, NULL, 'unnamed_1619515410.png', '2021-04-27 09:23:30', '2021-04-27 09:23:30', NULL),
(21, NULL, 'จิราภา', 'สารอุยี่', '3501200979958', NULL, NULL, 2, '2003-10-01', NULL, 2, 1, 1, 1, 7, 34, NULL, 'unnamed_1619515513.png', '2021-04-27 09:25:13', '2021-04-27 09:25:13', NULL),
(22, NULL, 'กรรณิการ์', 'ขันทะ', '3501200128371', NULL, NULL, 2, '1997-07-03', NULL, 1, 1, 1, 1, 13, 33, NULL, 'unnamed_1619515579.png', '2021-04-27 09:26:19', '2021-04-27 09:26:19', NULL),
(23, NULL, 'เรวัต', 'คำทะลา', '3501200790251', NULL, NULL, 1, '2018-11-08', NULL, 1, 1, 1, 1, 18, 8, NULL, 'unnamed_1619515670.png', '2021-04-27 09:27:50', '2021-04-27 09:27:50', NULL),
(24, NULL, 'ชมัยพร', 'อาษาพนม', '1509901036236', NULL, NULL, 2, '2020-02-13', NULL, 1, 1, 1, 1, 18, 8, NULL, 'unnamed_1619515726.png', '2021-04-27 09:28:46', '2021-04-27 09:28:46', NULL),
(25, NULL, 'กรรณิการ์', 'พรประเสริฐ', '1509901369545', NULL, NULL, 2, '2020-06-01', NULL, 1, 1, 1, 1, 18, 8, NULL, 'unnamed_1619515786.png', '2021-04-27 09:29:46', '2021-04-27 09:29:46', NULL),
(26, NULL, 'จุฑามาศ', 'ยาวิลาศ', '1509901465030', NULL, NULL, 2, '2020-12-01', NULL, 4, 1, 1, 1, 18, 8, NULL, 'unnamed_1619515864.png', '2021-04-27 09:31:04', '2021-04-27 09:31:04', NULL),
(27, NULL, 'ทิพย์รัตน์', 'เต๋จ๊ะแก้ว', '1501200105056', NULL, NULL, 2, '2020-12-01', NULL, 2, 1, 1, 1, 18, 8, NULL, 'unnamed_1619515933.png', '2021-04-27 09:32:13', '2021-04-27 09:32:13', NULL),
(28, NULL, 'ธัญญาลักษณ์', 'สุทธานิน', '1509900971047', NULL, NULL, 2, '2018-12-11', NULL, 2, 1, 1, 1, 18, 8, NULL, 'unnamed_1619515994.png', '2021-04-27 09:33:14', '2021-04-27 09:33:14', NULL),
(29, NULL, 'นฤมล', 'กินเขียว', '1509900401194', NULL, NULL, 2, '2018-12-11', NULL, 1, 1, 1, 1, 18, 8, NULL, 'unnamed_1619516068.png', '2021-04-27 09:34:28', '2021-04-27 09:34:28', NULL),
(30, NULL, 'ปริสนา', 'โกฎิแก้ว', '1509901374751', NULL, NULL, 2, '2020-02-13', NULL, 2, 1, 1, 1, 18, 8, NULL, 'unnamed_1619516149.png', '2021-04-27 09:35:49', '2021-04-27 09:35:49', NULL),
(31, NULL, 'รัตติกาล', 'วิยะ', '1509900467331', NULL, NULL, 2, '2017-11-01', NULL, 4, 1, 1, 1, 18, 8, NULL, 'unnamed_1619516304.png', '2021-04-27 09:38:24', '2021-04-27 09:38:24', NULL),
(32, NULL, 'เชิดศักดิ์', 'โนจา', '3501200965591', NULL, NULL, 1, '2006-10-01', NULL, 1, 1, 1, 1, 18, 8, NULL, 'unnamed_1619579351.png', '2021-04-28 03:09:11', '2021-04-28 03:09:11', NULL),
(33, NULL, 'จตุภัทร', 'อินทนนท์', '1509900860920', NULL, NULL, 1, '2020-03-18', NULL, 3, 1, 1, 1, 18, 8, NULL, 'unnamed_1619579415.png', '2021-04-28 03:10:15', '2021-04-28 03:10:15', NULL),
(34, NULL, 'ธรรมรัตน์', 'สุวรรณรัตน์', '2501501019025', NULL, NULL, 1, '2020-12-01', NULL, 1, 1, 1, 1, 18, 8, NULL, 'unnamed_1619579471.png', '2021-04-28 03:11:11', '2021-04-28 03:11:11', NULL),
(35, NULL, 'พงศ์เศวต', 'เตชัย', '3501200974964', NULL, NULL, 1, '2014-03-02', NULL, 1, 1, 1, 1, 18, 8, NULL, 'unnamed_1619579548.png', '2021-04-28 03:12:28', '2021-04-28 03:12:28', NULL),
(36, NULL, 'รัฐชัย', 'นันโท', '1509900421659', NULL, NULL, 1, '2010-12-01', NULL, 1, 1, 1, 1, 18, 8, NULL, 'unnamed_1619579598.png', '2021-04-28 03:13:18', '2021-04-28 03:13:18', NULL),
(37, NULL, 'พีรวิชญ์', 'สุต๋า', '150990080941', NULL, NULL, 1, '2021-02-01', NULL, 1, 1, 1, 1, 18, 8, NULL, 'unnamed_1619579755.png', '2021-04-28 03:15:55', '2021-04-28 03:15:55', NULL),
(38, NULL, 'ปิยะนุช', 'สิงห์ต๊ะ', '3501200984731', NULL, NULL, 2, '2008-10-01', NULL, 1, 1, 1, 1, 15, 12, NULL, 'unnamed_1619579840.png', '2021-04-28 03:17:20', '2021-04-28 03:17:20', NULL),
(39, NULL, 'เฉลิมวุฒิ', 'ใจชนะ', '1609900237792', NULL, NULL, 1, '2020-10-01', NULL, 1, 1, 1, 1, 18, 8, NULL, 'unnamed_1619579903.png', '2021-04-28 03:18:23', '2021-04-28 03:18:23', NULL),
(40, NULL, 'ไพศาล', 'ไชยชะนะ', '3501201246417', NULL, NULL, 1, '2009-03-02', NULL, 1, 1, 1, 1, 19, 15, NULL, 'unnamed_1619579980.png', '2021-04-28 03:19:40', '2021-04-28 03:19:40', NULL),
(41, NULL, 'คริษฐ์พงศ์', 'มณีคำ', '3501200981251', NULL, NULL, 1, '2004-06-01', NULL, 3, 1, 1, 1, 26, 13, NULL, 'unnamed_1619580232.png', '2021-04-28 03:23:52', '2021-04-28 03:23:52', NULL),
(42, NULL, 'ดำรง', 'ศรีนันตา', '3501200979991', NULL, NULL, 1, '2002-10-01', NULL, 1, 1, 1, 1, 17, 14, NULL, 'unnamed_1619580313.png', '2021-04-28 03:25:13', '2021-04-28 03:25:13', NULL),
(43, NULL, 'ธันยา', 'แสนขันแก้ว', '1509900545684', NULL, NULL, 1, '2011-10-10', NULL, 3, 1, 1, 1, 27, 15, NULL, 'unnamed_1619580409.png', '2021-04-28 03:26:49', '2021-04-28 03:26:49', NULL),
(44, NULL, 'ปรีชา', 'ยาวิลาศ', '3501200975219', NULL, NULL, 1, '2004-10-01', NULL, 3, 1, 1, 1, 17, 14, NULL, 'unnamed_1619580472.png', '2021-04-28 03:27:52', '2021-04-28 03:27:52', NULL),
(45, NULL, 'สมชาย', 'ไชยวุฒิ', '3501200972929', NULL, NULL, 1, '2007-10-01', NULL, 1, 1, 1, 1, 16, 10, NULL, 'unnamed_1619580559.png', '2021-04-28 03:29:19', '2021-04-28 03:29:19', NULL),
(46, NULL, 'ขวัญดาว', 'จันทร์แดง', '3501201026202', NULL, NULL, 2, '2004-11-01', NULL, 4, 1, 1, 1, 25, 16, NULL, 'unnamed_1619580641.png', '2021-04-28 03:30:41', '2021-04-28 03:30:41', NULL),
(47, NULL, 'ปทุมพร', 'ไชยจันดี', '3501500057151', NULL, NULL, 2, '2009-07-01', NULL, 4, 1, 1, 1, 25, 18, NULL, 'unnamed_1619580716.png', '2021-04-28 03:31:56', '2021-04-28 03:31:56', NULL),
(48, NULL, 'อัจฉรี', 'สายต้อม', '3501500103454', NULL, NULL, 2, '2009-07-01', NULL, 4, 1, 1, 1, 25, 17, NULL, 'unnamed_1619580789.png', '2021-04-28 03:33:09', '2021-04-28 03:33:09', NULL),
(50, NULL, 'ทดสอบ', 'ระบบ', '12345678', NULL, NULL, 1, '2021-04-28', NULL, 2, 1, 1, 1, 20, 21, NULL, 'tb_banner_70_1_1619594163.jpg', '2021-04-28 07:16:03', '2021-04-28 09:03:31', '2021-04-28 09:03:31'),
(51, NULL, 'พศิน', 'ทองเกื้อ', 'cunelsandas', NULL, NULL, 1, '2021-05-11', NULL, 2, 1, 1, 1, 18, 21, NULL, 'contactEXQ6zEEUYAA193w_1620717816.jpg', '2021-05-11 07:23:36', '2021-05-11 07:41:22', '2021-05-11 07:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `gender_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `gender_name`, `created_at`, `updated_at`) VALUES
(1, 'ชาย', '2021-02-17 21:03:52', '2021-02-17 21:03:52'),
(2, 'หญิง', '2021-02-17 21:03:52', '2021-02-17 21:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_03_01_045640_create_departments_table', 1),
(2, '2018_03_05_132536_create_countries_table', 1),
(3, '2018_03_05_170530_create_cities_table', 1),
(4, '2018_03_06_115649_create_salaries_table', 1),
(5, '2018_03_06_123354_create_states_table', 1),
(6, '2018_03_06_131623_create_divisions_table', 1),
(7, '2018_03_07_164659_create_genders_table', 1),
(8, '2018_03_08_133020_create_employees_table', 1),
(9, '2018_03_13_165135_create_admins_table', 1),
(10, '2018_06_25_150148_password_resets', 1),
(11, '2021_02_23_031842_create_dynamic_field', 2),
(12, '2021_02_23_034510_create_ip_approve_tbl', 3),
(13, '2021_02_23_042010_create_dynamic_field', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('phasin80@gmail.com', '$2y$10$xeesFAARsvjhdLJimguY/Ok/j/7h3.vL4kiiTU1iQ611SBcZJNI5a', '2021-02-26 06:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `s_amount` double(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `s_amount`, `created_at`, `updated_at`) VALUES
(8, 9000.00, '2021-04-27 02:47:45', '2021-04-27 03:09:30'),
(9, 13650.00, '2021-04-27 02:47:48', '2021-04-27 03:10:27'),
(10, 13540.00, '2021-04-27 02:47:51', '2021-04-27 03:10:46'),
(11, 10890.00, '2021-04-27 02:47:55', '2021-04-27 03:11:13'),
(12, 10120.00, '2021-04-27 03:11:29', '2021-04-27 03:11:29'),
(13, 15100.00, '2021-04-27 03:11:38', '2021-04-27 03:11:38'),
(14, 13650.00, '2021-04-27 03:11:45', '2021-04-27 03:11:45'),
(15, 10890.00, '2021-04-27 03:11:51', '2021-04-27 03:11:51'),
(16, 14770.00, '2021-04-27 03:11:58', '2021-04-27 03:11:58'),
(17, 14070.00, '2021-04-27 03:12:03', '2021-04-27 03:12:03'),
(18, 13530.00, '2021-04-27 03:12:09', '2021-04-27 03:12:09'),
(19, 41930.00, '2021-04-27 03:12:25', '2021-04-27 03:12:25'),
(20, 37410.00, '2021-04-27 03:12:31', '2021-04-27 03:12:31'),
(21, 44990.00, '2021-04-27 03:12:37', '2021-04-27 03:12:37'),
(22, 31880.00, '2021-04-27 03:12:43', '2021-04-27 03:12:43'),
(23, 33560.00, '2021-04-27 03:12:48', '2021-04-27 03:12:48'),
(24, 31340.00, '2021-04-27 03:12:56', '2021-04-27 03:12:56'),
(25, 29680.00, '2021-04-27 03:13:02', '2021-04-27 03:13:02'),
(27, 31340.00, '2021-04-27 03:13:13', '2021-04-27 03:13:13'),
(28, 30790.00, '2021-04-27 03:13:18', '2021-04-27 03:13:18'),
(29, 28690.00, '2021-04-27 03:13:26', '2021-04-27 03:13:26'),
(30, 34110.00, '2021-04-27 03:13:38', '2021-04-27 03:13:38'),
(31, 30220.00, '2021-04-27 03:13:43', '2021-04-27 03:13:43'),
(32, 31340.00, '2021-04-27 03:13:48', '2021-04-27 03:13:48'),
(33, 22600.00, '2021-04-27 03:13:59', '2021-04-27 03:13:59'),
(34, 22230.00, '2021-04-27 03:14:06', '2021-04-27 03:14:06'),
(35, 18000.00, '2021-04-27 09:20:51', '2021-04-27 09:20:51'),
(36, 26250.00, '2021-04-27 09:20:58', '2021-04-27 09:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `sso`
--

CREATE TABLE `sso` (
  `id` int(11) NOT NULL,
  `sso_percent` float DEFAULT NULL,
  `sso_month` int(10) DEFAULT NULL,
  `month_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sso`
--

INSERT INTO `sso` (`id`, `sso_percent`, `sso_month`, `month_name`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'มกราคม', '2021-03-20 05:14:24', '2021-03-20 05:16:11'),
(2, 4, 2, 'กุมภาพันธ์', '2021-03-20 05:16:28', '2021-03-20 07:09:06'),
(3, 0.5, 3, 'มีนาคม', '2021-03-20 05:16:31', '2021-03-20 07:08:09'),
(4, 5, 4, 'เมษายน', '2021-03-20 05:16:36', '2021-04-28 08:06:54'),
(5, 5, 5, 'พฤษภาคม', '2021-03-20 05:16:40', '2021-03-20 05:16:40'),
(6, 5, 6, 'มิถุนายน', '2021-03-20 05:16:42', '2021-03-20 05:16:42'),
(7, 5, 7, 'กรกฎาคม', '2021-03-20 05:16:45', '2021-03-20 05:16:45'),
(8, 5, 8, 'สิงหาคม', '2021-03-20 05:16:49', '2021-03-20 05:16:49'),
(9, 5, 9, 'กันยาคม', '2021-03-20 05:16:52', '2021-03-20 05:16:52'),
(10, 5, 10, 'ตุลาคม', '2021-03-20 05:16:55', '2021-03-20 05:16:55'),
(11, 5, 11, 'พฤศจิกายน', '2021-03-20 05:16:58', '2021-03-20 05:16:58'),
(12, 5, 12, 'ธันวาคม', '2021-03-20 05:17:01', '2021-03-20 05:17:01'),
(13, 0, 0, 'ไม่หักประกันสังคม', '2021-04-28 07:03:17', '2021-04-28 07:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 'สันป่าตอง', '2021-02-17 21:14:52', '2021-04-20 07:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id` int(11) NOT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `header_name` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id`, `org_name`, `header_name`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'องค์การบริหารส่วนตำบลสันกลาง', 'นางระวีวรรณ ธรรมสานุกูล', 'signature.png', '2021-03-25 10:13:08', '2021-03-25 10:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payments`
--

CREATE TABLE `tb_payments` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `salary` float(12,2) DEFAULT NULL,
  `money_extra` float(12,2) DEFAULT NULL,
  `money_extra_position` float(12,2) DEFAULT NULL,
  `money_treatment_cost` float(12,2) DEFAULT NULL,
  `money_rent_home` float(12,2) DEFAULT NULL,
  `money_recurring_salary` float(12,2) DEFAULT NULL,
  `money_bonus` float(12,2) DEFAULT NULL,
  `money_child_edu` float(12,2) DEFAULT NULL,
  `salary_amount` float(12,2) DEFAULT NULL,
  `sso_pay` float(12,2) DEFAULT NULL,
  `saving_group_pay` float(12,2) DEFAULT NULL,
  `saving_dcd_pay` float(12,2) DEFAULT NULL,
  `saving_teacher_pay` float(12,2) DEFAULT NULL,
  `saving_moe_pay` float(12,2) DEFAULT NULL,
  `loan_gsb_pay` float(12,2) DEFAULT NULL,
  `loan_baac_pay` float(12,2) DEFAULT NULL,
  `loan_ktb_pay` float(12,2) DEFAULT NULL,
  `loan_student_pay` float(12,2) DEFAULT NULL,
  `loan_ghb_pay` float(12,2) DEFAULT NULL,
  `saving_local_pay` float(12,2) DEFAULT NULL,
  `tax_pay` float(12,2) DEFAULT NULL,
  `pay_amount` float(12,2) DEFAULT NULL,
  `net_receive` float(12,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_payments`
--

INSERT INTO `tb_payments` (`id`, `emp_id`, `first_name`, `last_name`, `month`, `year`, `salary`, `money_extra`, `money_extra_position`, `money_treatment_cost`, `money_rent_home`, `money_recurring_salary`, `money_bonus`, `money_child_edu`, `salary_amount`, `sso_pay`, `saving_group_pay`, `saving_dcd_pay`, `saving_teacher_pay`, `saving_moe_pay`, `loan_gsb_pay`, `loan_baac_pay`, `loan_ktb_pay`, `loan_student_pay`, `loan_ghb_pay`, `saving_local_pay`, `tax_pay`, `pay_amount`, `net_receive`, `created_at`, `updated_at`) VALUES
(19, 5, 'เปรมใจ', 'บัวไสย', 4, 2021, 37410.00, 0.00, 3500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 40910.00, 0.00, 500.00, 0.00, 0.00, 0.00, 0.00, 16300.00, 8800.00, 0.00, 0.00, 1600.00, 200.00, 27400.00, 13510.00, '2021-05-03 06:28:39', '2021-05-03 06:28:39'),
(20, 6, 'ชาคริต', 'มีราจง', 4, 2021, 41930.00, 0.00, 14000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 55930.00, 0.00, 0.00, 0.00, 0.00, 4130.00, 0.00, 2400.00, 10800.00, 0.00, 0.00, 2300.00, 1015.00, 20645.00, 35285.00, '2021-05-03 06:46:50', '2021-05-03 06:46:50'),
(21, 7, 'ศรัญญา', 'กันยาเลิศ', 4, 2021, 44990.00, 0.00, 3500.00, 12660.00, 0.00, 0.00, 0.00, 0.00, 61150.00, 0.00, 2000.00, 12500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 500.00, 15000.00, 46150.00, '2021-05-03 06:48:51', '2021-05-03 06:48:51'),
(22, 8, 'ระวีวรรณ', 'ธรรมสานุกุล', 4, 2021, 37410.00, 0.00, 3500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 40910.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 15000.00, 0.00, 0.00, 5300.00, 200.00, 23500.00, 17410.00, '2021-05-03 06:50:56', '2021-05-03 06:50:56'),
(23, 9, 'สุบิน', 'กันทะสี', 4, 2021, 34110.00, 0.00, 3500.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 42610.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 7600.00, 0.00, 0.00, 0.00, 1300.00, 400.00, 9300.00, 33310.00, '2021-05-03 06:52:19', '2021-05-03 06:52:19'),
(24, 10, 'สุรีพร', 'ยศอนันต์', 4, 2021, 31340.00, 0.00, 3500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 34840.00, 0.00, 3160.00, 0.00, 8530.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 11690.00, 23150.00, '2021-05-03 06:53:28', '2021-05-03 06:53:28'),
(25, 11, 'นิรันดร', 'ธัญใจ', 4, 2021, 30220.00, 0.00, 3500.00, 0.00, 4400.00, 0.00, 0.00, 0.00, 38120.00, 0.00, 500.00, 0.00, 0.00, 0.00, 1600.00, 3700.00, 9300.00, 0.00, 0.00, 100.00, 300.00, 15500.00, 22620.00, '2021-05-03 06:56:42', '2021-05-03 06:56:42'),
(26, 12, 'วราพร', 'จารุพันธ์', 4, 2021, 31880.00, 0.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 36880.00, 0.00, 500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 0.00, 5500.00, 31380.00, '2021-05-03 06:57:39', '2021-05-03 06:57:39'),
(27, 13, 'ณัฐธิดา', 'ขันทะยศ', 4, 2021, 33560.00, 0.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 38560.00, 0.00, 1500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 9700.00, 0.00, 0.00, 7350.00, 0.00, 18550.00, 20010.00, '2021-05-03 06:58:56', '2021-05-03 06:58:56'),
(28, 14, 'บุศรา', 'สมศรี', 4, 2021, 29680.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 29680.00, 0.00, 1000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 12500.00, 0.00, 5800.00, 100.00, 0.00, 19400.00, 10280.00, '2021-05-03 07:00:50', '2021-05-03 07:00:50'),
(29, 15, 'พงศ์ภัค', 'เมืองจันทร์', 4, 2021, 31340.00, 0.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 36340.00, 0.00, 1000.00, 0.00, 0.00, 0.00, 0.00, 3700.00, 0.00, 0.00, 0.00, 100.00, 0.00, 4800.00, 31540.00, '2021-05-03 07:02:20', '2021-05-03 07:02:20'),
(30, 16, 'มนัสวี', 'วิวัฒนาวิไล', 4, 2021, 31340.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 31340.00, 0.00, 2700.00, 0.00, 0.00, 0.00, 0.00, 0.00, 12000.00, 0.00, 0.00, 10100.00, 0.00, 24800.00, 6540.00, '2021-05-03 07:03:33', '2021-05-03 07:03:33'),
(31, 17, 'สุกัญญา', 'ถาไชย', 4, 2021, 30790.00, 0.00, 0.00, 280.00, 0.00, 0.00, 0.00, 0.00, 31070.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 7500.00, 0.00, 0.00, 7600.00, 0.00, 20100.00, 10970.00, '2021-05-03 07:04:51', '2021-05-03 07:04:51'),
(32, 18, 'จันทิรา', 'คำไหว', 4, 2021, 28690.00, 0.00, 0.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 32690.00, 0.00, 2560.00, 0.00, 0.00, 0.00, 0.00, 6100.00, 6800.00, 0.00, 0.00, 1350.00, 0.00, 16810.00, 15880.00, '2021-05-03 07:08:39', '2021-05-03 07:08:39'),
(33, 20, 'เพชรรัตน์', 'คำแปง', 4, 2021, 18000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 18000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 18000.00, '2021-05-03 07:35:14', '2021-05-03 07:35:14'),
(34, 21, 'จิราภา', 'สารอุยี่', 4, 2021, 22230.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 22230.00, 0.00, 1000.00, 0.00, 0.00, 0.00, 0.00, 3800.00, 0.00, 0.00, 0.00, 2400.00, 0.00, 7200.00, 15030.00, '2021-05-03 07:36:39', '2021-05-03 07:36:39'),
(35, 22, 'กรรณิการ์', 'ขันทะ', 4, 2021, 22600.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 22600.00, 0.00, 5080.00, 0.00, 0.00, 0.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 200.00, 0.00, 9280.00, 13320.00, '2021-05-03 07:38:02', '2021-05-03 07:38:02'),
(36, 23, 'เรวัต', 'คำทะลา', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 2660.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 500.00, 0.00, 3660.00, 6340.00, '2021-05-03 07:42:46', '2021-05-03 07:42:46'),
(37, 24, 'ชมัยพร', 'อาษาพนม', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 8198.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 600.00, 0.00, 9298.00, 702.00, '2021-05-03 07:44:15', '2021-05-03 07:44:15'),
(38, 25, 'กรรณิการ์', 'พรประเสริฐ', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1000.00, 9000.00, '2021-05-03 07:44:59', '2021-05-03 07:44:59'),
(39, 26, 'จุฑามาศ', 'ยาวิลาศ', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 500.00, 0.00, 1000.00, 9000.00, '2021-05-03 07:46:05', '2021-05-03 07:46:05'),
(40, 27, 'ทิพย์รัตน์', 'เต๋จ๊ะแก้ว', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 1000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 500.00, 0.00, 2000.00, 8000.00, '2021-05-03 07:47:07', '2021-05-03 07:47:07'),
(41, 28, 'ธัญญาลักษณ์', 'สุทธานิน', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 2120.00, 0.00, 0.00, 0.00, 1810.00, 0.00, 0.00, 0.00, 0.00, 500.00, 0.00, 4930.00, 5070.00, '2021-05-03 07:48:10', '2021-05-03 07:48:10'),
(42, 29, 'นฤมล', 'กินเขียว', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 5680.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1000.00, 0.00, 0.00, 0.00, 7180.00, 2820.00, '2021-05-03 07:49:05', '2021-05-03 07:49:05'),
(43, 30, 'ปริสนา', 'โกฎิแก้ว', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 4180.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 4680.00, 5320.00, '2021-05-03 07:52:51', '2021-05-03 07:52:51'),
(44, 31, 'รัตติกาล', 'วิยะ', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 2950.00, 0.00, 0.00, 0.00, 3606.00, 0.00, 0.00, 0.00, 0.00, 100.00, 0.00, 7156.00, 2844.00, '2021-05-03 08:14:46', '2021-05-03 08:14:46'),
(45, 32, 'เชิดศักดิ์', 'โนจา', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 600.00, 0.00, 0.00, 0.00, 3676.00, 0.00, 0.00, 0.00, 0.00, 5200.00, 0.00, 9976.00, 24.00, '2021-05-03 08:17:37', '2021-05-03 08:17:37'),
(46, 33, 'จตุภัทร', 'อินทนนท์', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 3120.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3620.00, 6380.00, '2021-05-03 08:18:28', '2021-05-03 08:18:28'),
(47, 34, 'ธรรมรัตน์', 'สุวรรณรัตน์', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 1000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1500.00, 8500.00, '2021-05-03 08:19:12', '2021-05-03 08:19:12'),
(48, 35, 'พงศ์เศวต', 'เตชัย', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 2960.00, 0.00, 0.00, 0.00, 3881.00, 0.00, 0.00, 0.00, 0.00, 100.00, 0.00, 7441.00, 2559.00, '2021-05-03 08:21:43', '2021-05-03 08:21:43'),
(49, 36, 'รัฐชัย', 'นันโท', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 3800.00, 0.00, 0.00, 0.00, 3881.00, 0.00, 0.00, 700.00, 0.00, 0.00, 0.00, 8881.00, 1119.00, '2021-05-03 08:22:51', '2021-05-03 08:22:51'),
(50, 37, 'พีรวิชญ์', 'สุต๋า', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 5100.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5600.00, 4400.00, '2021-05-03 08:23:40', '2021-05-03 08:23:40'),
(51, 38, 'ปิยะนุช', 'สิงห์ต๊ะ', 4, 2021, 12120.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 12120.00, 606.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3606.00, 8514.00, '2021-05-03 08:24:49', '2021-05-03 08:24:49'),
(52, 39, 'เฉลิมวุฒิ', 'ใจชนะ', 4, 2021, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 500.00, 2000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2500.00, 7500.00, '2021-05-03 08:25:30', '2021-05-03 08:25:30'),
(53, 40, 'ไพศาล', 'ไชยชะนะ', 4, 2021, 12890.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 12890.00, 645.00, 5857.00, 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 3150.00, 0.00, 12152.00, 738.00, '2021-05-03 08:26:44', '2021-05-03 08:26:44'),
(54, 41, 'คริษฐ์พงศ์', 'มณีคำ', 4, 2021, 15100.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 15100.00, 750.00, 2000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 100.00, 0.00, 2850.00, 12250.00, '2021-05-03 08:27:26', '2021-05-03 08:27:26'),
(55, 42, 'ดำรง', 'ศรีนันตา', 4, 2021, 13650.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 13650.00, 683.00, 2180.00, 0.00, 0.00, 0.00, 3080.00, 1900.00, 0.00, 0.00, 0.00, 600.00, 0.00, 8443.00, 5207.00, '2021-05-03 08:28:48', '2021-05-03 08:28:48'),
(56, 43, 'ธันยา', 'แสนขันแก้ว', 4, 2021, 12890.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 12890.00, 645.00, 4200.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 4400.00, 0.00, 9245.00, 3645.00, '2021-05-03 08:31:01', '2021-05-03 08:31:01'),
(57, 44, 'ปรีชา', 'ยาวิลาศ', 4, 2021, 13650.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 13650.00, 683.00, 2800.00, 0.00, 0.00, 0.00, 3084.00, 0.00, 0.00, 0.00, 0.00, 3550.00, 0.00, 10117.00, 3533.00, '2021-05-03 08:32:11', '2021-05-03 08:32:11'),
(58, 46, 'ขวัญดาว', 'จันทร์แดง', 4, 2021, 14770.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 14770.00, 739.00, 0.00, 0.00, 0.00, 0.00, 3080.00, 2500.00, 0.00, 0.00, 0.00, 3800.00, 0.00, 10119.00, 4651.00, '2021-05-03 08:34:09', '2021-05-03 08:34:09'),
(59, 47, 'ปทุมพร', 'ไชยจันดี', 4, 2021, 13530.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 13530.00, 677.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2677.00, 10853.00, '2021-05-03 08:35:00', '2021-05-03 08:35:00'),
(60, 48, 'อัจฉรี', 'สายต้อม', 4, 2021, 14070.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 14070.00, 704.00, 1000.00, 0.00, 0.00, 0.00, 4453.00, 0.00, 0.00, 1570.00, 0.00, 0.00, 0.00, 7727.00, 6343.00, '2021-05-03 08:35:54', '2021-05-03 08:35:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_fields`
--
ALTER TABLE `dynamic_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_dept_id_foreign` (`dept_id`),
  ADD KEY `employees_country_id_foreign` (`country_id`),
  ADD KEY `employees_state_id_foreign` (`state_id`),
  ADD KEY `employees_city_id_foreign` (`city_id`),
  ADD KEY `employees_division_id_foreign` (`division_id`),
  ADD KEY `employees_salary_id_foreign` (`salary_id`),
  ADD KEY `employees_gender_id_foreign` (`gender_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sso`
--
ALTER TABLE `sso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_payments`
--
ALTER TABLE `tb_payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `dynamic_fields`
--
ALTER TABLE `dynamic_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `sso`
--
ALTER TABLE `sso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_payments`
--
ALTER TABLE `tb_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `employees_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `employees_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `employees_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  ADD CONSTRAINT `employees_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `employees_salary_id_foreign` FOREIGN KEY (`salary_id`) REFERENCES `salaries` (`id`),
  ADD CONSTRAINT `employees_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
