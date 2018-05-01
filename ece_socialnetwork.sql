-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2018 at 03:37 AM
-- Server version: 5.7.20-log
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ece_socialnetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hobby_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `groups_hobby_id_foreign` (`hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `has_image` tinyint(1) NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `group_id`, `has_image`, `content`, `created_at`, `updated_at`) VALUES
(6, 2, 0, 1, '', '2018-04-30 23:12:24', '2018-04-30 23:12:24'),
(7, 2, 0, 0, 'fchfh', '2018-04-30 23:12:28', '2018-04-30 23:12:28'),
(8, 2, 0, 0, 'qsf', '2018-04-30 23:48:24', '2018-04-30 23:48:24'),
(9, 2, 0, 0, 'qfdqf', '2018-04-30 23:52:54', '2018-04-30 23:52:54'),
(10, 4, 0, 0, 'sgsdg', '2018-05-01 01:35:30', '2018-05-01 01:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE IF NOT EXISTS `post_comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED NOT NULL,
  `comment_user_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `post_comments_post_id_foreign` (`post_id`),
  KEY `post_comments_comment_user_id_foreign` (`comment_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

DROP TABLE IF EXISTS `post_images`;
CREATE TABLE IF NOT EXISTS `post_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_images_post_id_foreign` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

DROP TABLE IF EXISTS `post_likes`;
CREATE TABLE IF NOT EXISTS `post_likes` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `like_user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`,`like_user_id`),
  KEY `post_likes_like_user_id_foreign` (`like_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `phone` varchar(20) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `cover_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `birthday`, `sex`, `phone`, `bio`, `profile_pic`, `username`, `cover_path`) VALUES
(2, 'test', 'hello', 'test@test.test', '$2y$10$08nfoD25HaKYcpebS4Ou6efj2XE2NVF83dXuTi7O0xazM9.5VeBOe', 'HSq6JDgEcCs3MDwwb61jtJBWoXrNzpyIGekq3wBalK8dFcE62CzKBS0gW5bT', '2018-05-01 03:21:31', '2018-05-01 01:21:15', NULL, 0, NULL, NULL, 'ff0c2733e90970360f369c6e5cd12fe0.jpeg', 'test', '5250dc88e266e8eebc4231d4dd226840.jpg'),
(4, 'test1', 'test1', 'test1@test1.test1', '$2y$10$MUbfiGZIzEkfKtJMYVL.3OXQLs3zrXCqWroo5dSFSZ4q4vvmXRLQi', NULL, '2018-05-01 03:33:48', '2018-05-01 01:33:48', NULL, 0, NULL, NULL, 'a66c33c82d90647efe0091a736e1fe64.png', 'test1', 'a5872c74fbacdcafa1f1820ed2cd7905.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_following`
--

DROP TABLE IF EXISTS `user_following`;
CREATE TABLE IF NOT EXISTS `user_following` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `following_user_id` int(10) UNSIGNED NOT NULL,
  `follower_user_id` int(10) UNSIGNED NOT NULL,
  `allow` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_following_follower_user_id_foreign` (`follower_user_id`),
  KEY `following_user_id` (`following_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `post_images_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
