-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 03:03 PM
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
-- Database: `course_module_craft`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `source_type` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `video_length` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `module_id`, `title`, `source_type`, `video_url`, `video_length`, `created_at`, `updated_at`) VALUES
(24, 22, 'Cyber security is the practice of protecting computer.', 'Upload', 'https://youtu.be/hXSFdwIOfnE?si=Bq_wp2cgcit389Pc', '30 minute', '2025-05-09 03:14:21', '2025-05-09 03:14:21'),
(25, 23, 'The Art of Graphic Design: A Creative Journey', 'YouTube', 'https://youtu.be/hXSFdwIOfnE?si=Bq_wp2cgcit389Pc', '30 minute', '2025-05-09 03:19:33', '2025-05-09 03:19:33'),
(26, 23, 'Exploring the World of Graphic Design: Principles and Practices', 'Upload', 'https://youtu.be/hXSFdwIOfnE?si=Bq_wp2cgcit389Pc', '32 minute', '2025-05-09 03:19:33', '2025-05-09 03:19:33'),
(27, 23, 'Graphic Design Essentials: Transforming Ideas into Visual Masterpieces', 'Vimeo', 'https://youtu.be/hXSFdwIOfnE?si=Bq_wp2cgcit389Pc', '35 minute', '2025-05-09 03:19:33', '2025-05-09 03:19:33'),
(28, 24, 'Understanding the Basics of Marketing: A Beginner’s Guide', 'YouTube', 'https://youtu.be/hXSFdwIOfnE?si=Bq_wp2cgcit389Pc', '20 minute', '2025-05-09 03:31:45', '2025-05-09 03:31:45'),
(29, 25, 'Why Digital Marketing is the Future of Business Growth', 'YouTube', 'https://youtu.be/hXSFdwIOfnE?si=Bq_wp2cgcit389Pc', '40 minute', '2025-05-09 03:31:45', '2025-05-09 03:31:45'),
(30, 26, 'How to Build an Effective Content Strategy for Your Brand', 'Upload', 'https://youtu.be/hXSFdwIOfnE?si=Bq_wp2cgcit389Pc', '34 minute', '2025-05-09 03:31:45', '2025-05-09 03:31:45'),
(31, 27, '1.	Introduction to Software Development and Programming', 'YouTube', 'https://youtu.be/8KwXqZTKwUw?si=Lof7VRgLs33cQcPp', '20 minuyte', '2025-05-09 05:44:37', '2025-05-09 05:44:37'),
(32, 27, '2.	Understanding Variables, Data Types, and Operators', 'YouTube', 'https://youtu.be/8KwXqZTKwUw?si=Lof7VRgLs33cQcPp', '30 minute', '2025-05-09 05:44:37', '2025-05-09 05:44:37'),
(33, 27, '3.	Writing Conditional Statements and Loops', 'YouTube', 'https://youtu.be/8KwXqZTKwUw?si=Lof7VRgLs33cQcPp', '30 minute', '2025-05-09 05:44:37', '2025-05-09 05:44:37'),
(34, 28, '1.	Introduction to OOP: Classes and Objects', 'Upload', 'https://youtu.be/8KwXqZTKwUw?si=Lof7VRgLs33cQcPp', '15 minute', '2025-05-09 05:44:37', '2025-05-09 05:44:37'),
(35, 28, '2.	Inheritance, Polymorphism, and Encapsulation', 'Upload', 'https://youtu.be/8KwXqZTKwUw?si=Lof7VRgLs33cQcPp', '10 minute', '2025-05-09 05:44:37', '2025-05-09 05:44:37'),
(36, 28, '3.	Arrays, Lists, Stacks, and Queues Explained', 'Upload', 'https://youtu.be/8KwXqZTKwUw?si=Lof7VRgLs33cQcPp', '25 minute', '2025-05-09 05:44:37', '2025-05-09 05:44:37'),
(37, 29, '1.	HTML, CSS, and JavaScript Fundamentals', 'YouTube', 'https://youtu.be/8KwXqZTKwUw?si=Lof7VRgLs33cQcPp', '10 minute', '2025-05-09 05:44:37', '2025-05-09 05:44:37'),
(38, 29, '2.	Responsive Design with Bootstrap or Tailwind', 'YouTube', 'https://youtu.be/8KwXqZTKwUw?si=Lof7VRgLs33cQcPp', '10 minute', '2025-05-09 05:44:37', '2025-05-09 05:44:37'),
(39, 29, '3.	Introduction to Backend with PHP or Node.js', 'YouTube', 'https://youtu.be/8KwXqZTKwUw?si=Lof7VRgLs33cQcPp', '30 minute', '2025-05-09 05:44:37', '2025-05-09 05:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `feature_video` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `summary` text NOT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `feature_video`, `level`, `category`, `price`, `summary`, `feature_image`, `created_at`, `updated_at`) VALUES
(17, 'Profesional cyber security course', 'https://youtu.be/hXSFdwIOfnE?si=Bq_wp2cgcit389Pc', 'Beginner', 'Cyber Security', 100000.00, 'Cyber security is the practice of protecting computers, networks, and digital data from unauthorized access, attacks, or damage. It involves tools and techniques such as firewalls, encryption, antivirus software, secure passwords, and regular updates to defend against threats like hackers, malware, and phishing. The goal is to ensure the confidentiality, integrity, and availability of digital information.', 'courses/mu9fOpqffolJ7THNTnUYnnAnlGC7f4gKEy9PIOHz.jpg', '2025-05-09 03:14:21', '2025-05-09 03:14:21'),
(18, 'Graphics Desing', 'https://youtu.be/hXSFdwIOfnE?si=Bq_wp2cgcit389Pc', 'Intermediate', 'Design', 150000.00, 'Graphic design is the art and practice of creating visual content to communicate messages. It combines elements like typography, imagery, color, and layout to craft designs for various mediums, such as websites, advertisements, logos, brochures, and social media. Graphic designers use tools like Adobe Photoshop, Illustrator, and InDesign to create visually appealing designs that capture attention and convey information effectively.', 'courses/ikSvSvMfdN8eH2KlNyteMhhFOlQ1euo7kkQnZdsP.jpg', '2025-05-09 03:19:33', '2025-05-09 03:19:33'),
(19, 'Digital Marketing Mastery: Strategies for the Modern Marketer', 'https://youtu.be/hXSFdwIOfnE?si=Bq_wp2cgcit389Pc', 'Advanced', 'Marketing', 240000.00, 'Marketing is the process of promoting and selling products or services, including market research, advertising, sales strategies, and customer engagement. It involves understanding consumer behavior, building a brand, and using various platforms like digital media, social media, and email to connect with audiences. A strong marketing strategy aims to increase brand awareness, drive sales, and build long-term customer relationships.', 'courses/e6Jk3WNScGrK1GtyEH2nhSCI27wBYZKO5NuNs0E5.jpg', '2025-05-09 03:31:45', '2025-05-09 03:31:45'),
(20, '\"Complete Software Development Bootcamp: From Basics to Deployment', 'https://youtu.be/8KwXqZTKwUw?si=Lof7VRgLs33cQcPp', 'Intermediate', 'Programming', 400000.00, 'This course offers a step-by-step guide to becoming a software developer, starting from basic programming concepts and progressing through object-oriented design, data structures, and full-stack web development. By the end, learners will be able to build, test, and deploy real-world applications with confidence', 'courses/Y9kicoaqicfPzaDn457AWga2URlgqNNmX1UsBaeV.jpg', '2025-05-09 05:44:37', '2025-05-09 05:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_08_162044_create_courses_table', 2),
(5, '2025_05_08_162345_create_modules_table', 2),
(6, '2025_05_08_162512_create_contents_table', 2),
(7, '2025_05_08_173350_add_feature_image_to_courses_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `course_id`, `title`, `created_at`, `updated_at`) VALUES
(22, 17, 'What is cyber security', '2025-05-09 03:14:21', '2025-05-09 03:14:21'),
(23, 18, 'What is Graphics Design', '2025-05-09 03:19:33', '2025-05-09 03:19:33'),
(24, 19, 'Module 1: Introduction to Marketing Principles', '2025-05-09 03:31:45', '2025-05-09 03:31:45'),
(25, 19, 'Module 2: Digital Marketing Essentials and Tools', '2025-05-09 03:31:45', '2025-05-09 03:31:45'),
(26, 19, 'Module 3: Understanding Consumer Behavior and Targeting', '2025-05-09 03:31:45', '2025-05-09 03:31:45'),
(27, 20, 'Module 1: Programming Foundations & Logic', '2025-05-09 05:44:37', '2025-05-09 05:44:37'),
(28, 20, 'Module 2: Object-Oriented Programming & Data Structures', '2025-05-09 05:44:37', '2025-05-09 05:44:37'),
(29, 20, 'Module 3: Web Development Essentials (Frontend & Backend)', '2025-05-09 05:44:37', '2025-05-09 05:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9cyeCRch5giPhS2YuW2njLTSN4cj4ygT3fwA0XQd', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiek1jekQ1RVZoeFJvNWtQNFAxQlZueU5GaElRRXhzQXpLcTM4UXBMMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvQ291cnNlLUNyYWZ0L3B1YmxpYy9jb3Vyc2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1746795692);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_module_id_foreign` (`module_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_course_id_foreign` (`course_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
