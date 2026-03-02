-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2026 at 03:17 PM
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
-- Database: `omtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL DEFAULT 1,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image1`, `image2`, `image3`) VALUES
(1, 'uploads/about/about_1_1772171958.jpeg', 'uploads/about/about_2_1772171958.jpeg', 'uploads/about/about_3_1772171958.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT 'Admin',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_description`, `description`, `image1`, `image2`, `image3`, `image4`, `author`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Understanding PLC Basics', 'A guide for beginners to learn the fundamentals of Programmable Logic Controllers.', 'PLCs are the backbone of modern industrial automation. This blog covers CPU, I/O modules, and basic ladder logic programming.', 'https://picsum.photos/seed/blog1/800/600', 'https://picsum.photos/seed/blog1b/800/600', NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(2, 'Servo vs Stepper Motors', 'Deciding which motor is right for your CNC or automation project.', 'We compare torque, speed, and accuracy between servo and stepper systems to help you choose the right component.', 'https://picsum.photos/seed/blog2/800/600', 'https://picsum.photos/seed/blog2b/800/600', NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(3, 'Industrial Ethernet Standards', 'Exploring Cat6 and Cat6A in factory environments.', 'Why shielding matters in environments with high electromagnetic interference (EMI).', 'https://picsum.photos/seed/blog3/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(4, 'Future of Industry 4.0', 'How AI and IoT are changing the manufacturing landscape.', 'Integration of cloud computing with factory floor data for predictive maintenance.', 'https://picsum.photos/seed/blog4/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(5, 'Cable Management Tips', 'Best practices for routing cables in industrial cabinets.', 'Preventing signal noise and ensuring long-term durability of your wiring.', 'https://picsum.photos/seed/blog5/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(6, 'The Role of Relay Cards', 'Why relay cards are essential for PLC safety.', 'Understanding isolation between control signals and high-power loads.', 'https://picsum.photos/seed/blog6/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(7, 'Troubleshooting Encoder Signals', 'Common issues with feedback cables and how to fix them.', 'Dealing with signal loss, jitter, and wiring errors in servo feedback loops.', 'https://picsum.photos/seed/blog7/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(8, 'Choosing a VPS for n8n', 'Setting up automation workflows on a virtual private server.', 'A look at RAM and CPU requirements for self-hosting automation tools like n8n.', 'https://picsum.photos/seed/blog8/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(9, 'SQL Performance Optimization', 'How to handle large product databases effectively.', 'Indexing strategies for e-commerce tables using MySQL and MariaDB.', 'https://picsum.photos/seed/blog9/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(10, 'Advocate Management Software', 'How ERPs are streamlining legal workflows.', 'Feature sets required for managing case files and client billing.', 'https://picsum.photos/seed/blog10/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(11, 'Web Development Trends 2026', 'What is new in the MERN stack this year?', 'Exploring the latest updates in React and Node.js for industrial dashboards.', 'https://picsum.photos/seed/blog11/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(12, 'Garment Industry ERP', 'Managing production lines with custom software.', 'Tracking inventory from raw fabric to finished product.', 'https://picsum.photos/seed/blog12/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(13, 'Secure API Integration', 'Best practices for using Gemini and DeepSeek APIs.', 'How to store API keys securely in environment variables.', 'https://picsum.photos/seed/blog13/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(14, 'WhatsApp Automation for Business', 'Using unofficial APIs for customer alerts.', 'Automating order confirmations and inquiry replies via WhatsApp.', 'https://picsum.photos/seed/blog14/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(15, 'Docker for Beginners', 'Containerizing your PHP and MySQL applications.', 'Simplify deployment by wrapping your web apps in Docker containers.', 'https://picsum.photos/seed/blog15/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(16, 'Sustainable Automation', 'Reducing energy consumption in motor control.', 'How VFDs and efficient servo tuning save money and power.', 'https://picsum.photos/seed/blog16/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(17, 'The Importance of SEO', 'Generating leads for your web development agency.', 'Optimizing your portfolio to rank higher on Google Search.', 'https://picsum.photos/seed/blog17/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(18, 'Custom Cable Assembly', 'Why off-the-shelf cables do not always work.', 'The benefits of ordering custom lengths and connectors for CNC machines.', 'https://picsum.photos/seed/blog18/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(19, 'Analog vs Digital Signals', 'Which interface module do you need?', 'The pros and cons of 4-20mA loops vs digital communication.', 'https://picsum.photos/seed/blog19/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(20, 'Cybersecurity in Factories', 'Protecting PLCs from network attacks.', 'Setting up firewalls and isolated VLANs for industrial equipment.', 'https://picsum.photos/seed/blog20/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(21, 'Building a Restaurant QR System', 'Revolutionizing dining with digital menus.', 'Integrating payments and real-time order tracking.', 'https://picsum.photos/seed/blog21/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(22, 'Introduction to Laravel', 'Building robust backends for ERP systems.', 'Why Laravel is the preferred choice for business applications.', 'https://picsum.photos/seed/blog22/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(23, 'VPS Hosting Comparison', 'OVHcloud vs Contabo vs Hetzner.', 'Which provider offers the best value for Indian developers?', 'https://picsum.photos/seed/blog23/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(24, 'HMI Design Principles', 'Creating intuitive screens for machine operators.', 'UX design for industrial touch panels.', 'https://picsum.photos/seed/blog24/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(25, 'Sensors in Modern Robotics', 'From proximity to ultrasonic sensors.', 'How robots perceive their environment to avoid collisions.', 'https://picsum.photos/seed/blog25/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(26, 'Scaling Your Freelance Business', 'Moving from 5k to 50k per month.', 'Tips for finding high-paying international clients.', 'https://picsum.photos/seed/blog26/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(27, 'Remote Monitoring Systems', 'Accessing your factory data from home.', 'Using MQTT and WebSockets for real-time monitoring.', 'https://picsum.photos/seed/blog27/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(28, 'Circuit Board Repair', 'Tools every technician should have.', 'A look at soldering stations, multimeters, and oscilloscopes.', 'https://picsum.photos/seed/blog28/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(29, 'The Future of AI in Coding', 'Will LLMs replace developers?', 'Using AI as a co-pilot to write better and faster code.', 'https://picsum.photos/seed/blog29/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17'),
(30, 'Maintaining Servo Systems', 'Routine checks to prevent downtime.', 'Cleaning connectors and checking cable flexibility over time.', 'https://picsum.photos/seed/blog30/800/600', NULL, NULL, NULL, 'Admin', 'active', '2026-02-21 05:57:17', '2026-02-21 05:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `cart_added`
--

CREATE TABLE `cart_added` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `delivery_address` text DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_added`
--

INSERT INTO `cart_added` (`id`, `first_name`, `last_name`, `email`, `phone`, `delivery_address`, `product_id`, `created_at`) VALUES
(1, 'Piyush', 'panchal', 'hello.creativewebcrafters@gmail.com', '+917461664867', NULL, 104, '2026-02-21 06:22:18'),
(2, 'Piyush', 'panchal', 'hello.creativewebcrafters@gmail.com', '+917461664867', NULL, 104, '2026-02-21 06:24:20'),
(3, 'Piyush', 'panchal', 'hello.creativewebcrafters@gmail.com', '+917461664867', NULL, 104, '2026-02-21 06:24:53'),
(4, 'Piyush', 'panchal', 'hello.creativewebcrafters@gmail.com', '+917461664867', NULL, 104, '2026-02-21 06:25:16'),
(5, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-22 04:51:51'),
(6, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-22 04:52:10'),
(7, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-22 04:52:16'),
(8, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 102, '2026-02-22 04:52:19'),
(9, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 101, '2026-02-22 04:52:21'),
(10, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-22 05:10:08'),
(11, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-22 05:10:10'),
(12, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-23 13:06:29'),
(13, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-23 13:07:57'),
(14, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-23 13:21:24'),
(15, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-23 13:21:27'),
(16, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-23 13:22:01'),
(17, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-23 13:22:27'),
(18, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-23 13:22:47'),
(19, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-23 13:23:50'),
(20, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-23 13:34:57'),
(21, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-23 13:35:17'),
(22, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-23 13:35:19'),
(23, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-23 13:35:40'),
(24, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-23 13:35:42'),
(25, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-23 13:35:46'),
(26, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-23 13:35:47'),
(27, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 101, '2026-02-23 13:35:50'),
(28, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-25 05:21:52'),
(29, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-25 05:21:57'),
(30, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 102, '2026-02-25 05:22:03'),
(31, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 80, '2026-02-25 05:24:57'),
(32, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 79, '2026-02-25 05:25:04'),
(33, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 100, '2026-02-25 05:25:10'),
(34, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 99, '2026-02-25 05:25:12'),
(35, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 101, '2026-02-25 05:25:36'),
(36, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-25 05:27:24'),
(37, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-25 05:27:29'),
(38, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 99, '2026-02-25 05:27:35'),
(39, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 99, '2026-02-25 05:27:37'),
(40, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 100, '2026-02-25 05:27:40'),
(41, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-25 15:12:36'),
(42, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-25 15:12:43'),
(43, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', NULL, 104, '2026-02-25 15:12:55'),
(44, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', NULL, 104, '2026-02-25 15:13:05'),
(45, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', NULL, 103, '2026-02-25 15:13:11'),
(46, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-25 15:17:45'),
(47, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-25 15:18:22'),
(48, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-25 15:20:25'),
(49, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-25 15:22:09'),
(50, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-25 15:35:20'),
(51, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-25 15:35:27'),
(52, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 102, '2026-02-25 15:35:31'),
(53, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-25 15:35:35'),
(54, 'a', 'patel', 'punitt@gmail.com', '+917777777778', '15 NIAG DIAMOND', 104, '2026-02-26 05:20:58'),
(55, 'a', 'patel', 'punitt@gmail.com', '+917777777778', '15 NIAG DIAMOND', 104, '2026-02-26 05:21:05'),
(56, 'a', 'patel', 'punitt@gmail.com', '+917777777778', '15 NIAG DIAMOND', 103, '2026-02-26 05:21:07'),
(57, 'a', 'patel', 'punitt@gmail.com', '+917777777778', '15 NIAG DIAMOND', 104, '2026-02-26 05:21:09'),
(58, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', '15 NIAG DIAMOND', 104, '2026-02-26 05:26:06'),
(59, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', '15 NIAG DIAMOND', 104, '2026-02-26 05:26:55'),
(60, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', '15 NIAG DIAMOND', 103, '2026-02-26 05:31:06'),
(61, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 05:32:03'),
(62, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 05:32:07'),
(63, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 05:32:23'),
(64, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-26 05:32:31'),
(65, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 05:32:36'),
(66, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 05:39:04'),
(67, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 05:42:11'),
(68, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 05:42:19'),
(69, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 05:42:29'),
(70, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 103, '2026-02-26 05:42:31'),
(71, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 102, '2026-02-26 05:42:33'),
(72, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 102, '2026-02-26 05:42:54'),
(73, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 05:46:37'),
(74, 'KISHAN', 'PATEL', 'kishan7112@gmail.com', '+919067600673', NULL, 104, '2026-02-26 05:46:48'),
(75, 'KISHAN', 'PATEL', 'kishan7112@gmail.com', '+919067600673', NULL, 104, '2026-02-26 05:50:11'),
(76, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 05:50:36'),
(77, 'a', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 06:07:09'),
(78, 'a', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 97, '2026-02-26 06:07:14'),
(79, 'kishan', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 06:07:29'),
(80, 'kishan', 'patel', 'punitinstrument@gmail.com', '+919067600673', NULL, 103, '2026-02-26 06:08:00'),
(81, 'kishan', 'patel', 'punitinstrument@gmail.com', '+919067600673', NULL, 93, '2026-02-26 06:08:02'),
(82, 'a', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 06:28:43'),
(83, 'kishan', 'patel', 'punitinstrument@gmail.com', '+919067600673', NULL, 104, '2026-02-26 06:29:15'),
(84, 'kishan', 'patel', 'punitt@gmail.com', '+919067600673', NULL, 103, '2026-02-26 06:31:53'),
(85, 'kishan', 'patel', 'punitt@gmail.com', '+919067600673', NULL, 103, '2026-02-26 06:32:01'),
(86, 'kishan', 'patel', 'punitt@gmail.com', '+919067600673', NULL, 104, '2026-02-26 06:32:05'),
(87, 'kishan', 'patel', 'punitt@gmail.com', '+919067600673', NULL, 102, '2026-02-26 06:32:08'),
(88, 'kishan', 'patel', 'punitinstrument@gmail.com', '+919067600673', NULL, 104, '2026-02-26 06:39:01'),
(89, 'kishan', 'patel', 'punitinstrument@gmail.com', '+919067600673', NULL, 103, '2026-02-26 06:39:06'),
(90, 'kishan', 'patel', 'punitinstrument@gmail.com', '+919067600673', NULL, 104, '2026-02-26 06:40:00'),
(91, 'kishan', 'patel', 'punitinstrument@gmail.com', '+919067600673', NULL, 104, '2026-02-26 06:40:03'),
(92, 'a', 'patel', 'punitt@gmail.com', '+917777777778', NULL, 104, '2026-02-26 06:41:40'),
(93, 'kishan', 'patel', 'punitt@gmail.com', '+919067600673', '15 NIRANJAN SOCIETY OPP CHIRAG DIAMOND\n15 NIRNJAN', 104, '2026-02-26 08:45:11'),
(94, 'Creative', 'WebCrafters', 'hello.creativewebcrafters@gmail.com', '+917461664867', 'bxfbf', 104, '2026-02-26 09:08:54'),
(95, 'Creative', 'WebCrafters', 'hello.creativewebcrafters@gmail.com', '+917461664867', 'vcvdsvsd efewfewf erfewfew ewf ewerfewfew ew e', 104, '2026-02-26 09:09:59'),
(96, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', 'KUBADTHAL', 81, '2026-02-26 09:11:22'),
(97, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', 'KUBADTHAL', 80, '2026-02-26 09:11:39'),
(98, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', 'KUBADTHAL', 81, '2026-02-26 09:11:57'),
(99, 'kishan', 'patel', 'punitinstrument@gmail.com', '+919067600673', '15 NIRANJAN SOCIETY OPP CHIRAG DIAMOND\n15 NIRNJAN', 104, '2026-02-26 09:12:19'),
(100, 'kishan', 'patel', 'punitinstrument@gmail.com', '+919067600673', '15 NIRANJAN SOCIETY OPP CHIRAG DIAMOND\\n15 NIRNJAN', 104, '2026-02-26 09:12:24'),
(101, 'kishan', 'patel', 'punitinstrument@gmail.com', '+919067600673', '15 NIRANJAN SOCIETY OPP CHIRAG DIAMOND\\n15 NIRNJAN', 103, '2026-02-26 09:12:29'),
(102, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', 'KUBADTHAL', 81, '2026-02-26 09:12:37'),
(103, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', 'KUBADTHAL', 81, '2026-02-26 09:12:54'),
(104, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', 'KUBADTHAL', 80, '2026-02-26 09:13:00'),
(105, 'Creative', 'WebCrafters', 'hello.creativewebcrafters@gmail.com', '+917461664867', 'vcvdsvsd efewfewf erfewfew ewf ewerfewfew ew e', 104, '2026-02-26 09:33:47'),
(106, 'Creative', 'WebCrafters', 'hello.creativewebcrafters@gmail.com', '+917461664867', 'bxfbf', 102, '2026-02-26 09:34:14'),
(107, 'Creative', 'WebCrafters', 'hello.creativewebcrafters@gmail.com', '+917461664867', 'bxfbf', 102, '2026-02-26 09:34:25'),
(108, 'Creative', 'WebCrafters', 'hello.creativewebcrafters@gmail.com', '+917461664867', 'bxfbf', 104, '2026-02-26 09:34:57'),
(109, 'Creative', 'WebCrafters', 'hello.creativewebcrafters@gmail.com', '+917461664867', 'bxfbf', 102, '2026-02-26 09:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `show_on_home` enum('yes','no') DEFAULT 'no',
  `priority` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `status`, `created_at`, `show_on_home`, `priority`) VALUES
(1, 'Servo Cables', 'https://picsum.photos/seed/servo-cables/600/600', 'active', '2026-02-21 05:48:01', 'yes', 2),
(2, 'Relay Cards', 'https://picsum.photos/seed/relay-cards/600/600', 'active', '2026-02-21 05:48:01', 'no', 0),
(3, 'Breakout Boards & Cables', 'https://picsum.photos/seed/breakout-boards/600/600', 'active', '2026-02-21 05:48:01', 'no', 0),
(4, 'Sensor & Encoder Cables', 'https://picsum.photos/seed/sensors/600/600', 'active', '2026-02-21 05:48:01', 'no', 0),
(5, 'Interface Module with Cable', 'https://picsum.photos/seed/interface-module/600/600', 'active', '2026-02-21 05:48:01', 'no', 0),
(6, 'Ethernet Patch Cords', 'https://picsum.photos/seed/ethernet-cords/600/600', 'active', '2026-02-21 05:48:01', 'no', 0),
(7, 'Customized Cables', 'https://picsum.photos/seed/custom-cables/600/600', 'active', '2026-02-21 05:48:01', 'no', 0),
(8, 'Servo Connectors', 'https://picsum.photos/seed/servo-connectors/600/600', 'active', '2026-02-21 05:48:01', 'no', 0),
(9, 'Programming Cable & Converter', 'https://picsum.photos/seed/programming-cable/600/600', 'active', '2026-02-21 05:48:01', 'no', 0),
(10, 'Servo Cables Brands', 'https://picsum.photos/seed/servo-brands/600/600', 'active', '2026-02-21 05:48:01', 'yes', 3),
(11, 'Sensor ', 'https://picsum.photos/seed/sensors/600/600', 'active', '2026-02-21 05:48:01', 'no', 0),
(12, 'Ethernet ', 'https://picsum.photos/seed/ethernet-cords/600/600', 'active', '2026-02-21 05:48:01', 'yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('pending','responded','closed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'CW', 'hello.creativewebcrafters@gmail.com', 'test', 'test', 'pending', '2026-02-21 06:49:17'),
(2, 'CW', 'hello.creativewebcrafters@gmail.com', '1513', '+62\r\n3', 'pending', '2026-02-26 09:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `tertiary_category_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `mrp` decimal(10,2) DEFAULT NULL,
  `stock_status` enum('Available','Limited Stock','Out of Stock') DEFAULT 'Available',
  `brand_name` varchar(100) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `short_technical_specifications` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `long_specifications` text DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `tertiary_category_id`, `product_name`, `sku`, `price`, `mrp`, `stock_status`, `brand_name`, `short_description`, `short_technical_specifications`, `description`, `long_specifications`, `image1`, `image2`, `image3`, `image4`, `status`, `created_at`) VALUES
(79, 1, NULL, NULL, 'Hybrid Servo Cable 10m', 'SC-HYB-10M', 68.00, NULL, 'Available', 'YASKAWA', 'Hybrid servo power + feedback cable', NULL, 'Industrial hybrid servo cable for motion control systems.', NULL, 'https://picsum.photos/seed/cable1/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(80, 1, NULL, NULL, 'Servo Power Cable 15m', 'SC-PWR-15M', 75.00, NULL, 'Available', 'SIEMENS', 'High current servo power cable', NULL, 'Power cable suitable for high load servo motors.', NULL, 'https://picsum.photos/seed/cable2/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(81, 1, NULL, NULL, 'Servo Feedback Cable 5m', 'SC-FB-5M', 32.00, NULL, 'Available', 'MITSUBISHI', 'Feedback cable for servo motors', NULL, 'Shielded feedback cable for encoder signals.', NULL, 'https://picsum.photos/seed/cable3/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(82, 2, NULL, NULL, 'PLC Relay Card 8 Channel', 'RC-PLC-8CH', 120.00, NULL, 'Available', 'ALLEN-BRADLEY', '8 channel PLC relay output card', NULL, 'Relay output expansion card for PLC systems.', NULL, 'https://picsum.photos/seed/relay1/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(83, 2, NULL, NULL, 'Solid State Relay Card', 'RC-SSR-4CH', 95.00, NULL, 'Available', 'SCHNEIDER', 'Solid state relay module', NULL, 'Industrial SSR card for silent switching.', NULL, 'https://picsum.photos/seed/relay2/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(84, 2, NULL, NULL, 'Interface Relay Module', 'RC-INT-6CH', 88.00, NULL, 'Available', 'OMRON', 'Interface relay module', NULL, 'Used between PLC and field devices.', NULL, 'https://picsum.photos/seed/relay3/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(85, 3, NULL, NULL, 'DB25 CNC Breakout Board', 'BB-DB25', 42.00, NULL, 'Available', 'GENERIC', 'DB25 breakout board', NULL, 'CNC breakout board with screw terminals.', NULL, 'https://picsum.photos/seed/board1/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(86, 3, NULL, NULL, 'Stepper Breakout Board', 'BB-STEP', 55.00, NULL, 'Available', 'GENERIC', 'Stepper motor breakout', NULL, 'Supports multi-axis CNC systems.', NULL, 'https://picsum.photos/seed/board2/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(87, 3, NULL, NULL, 'Terminal Breakout Module', 'BB-TERM', 20.00, NULL, 'Available', 'GENERIC', 'Terminal breakout module', NULL, 'Used for easy wiring and testing.', NULL, 'https://picsum.photos/seed/board3/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(88, 4, NULL, NULL, 'Incremental Encoder Cable', 'ENC-INC-10M', 36.00, NULL, 'Available', 'BECKHOFF', 'Incremental encoder cable', NULL, 'Shielded cable for encoder feedback.', NULL, 'https://picsum.photos/seed/sensor1/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(89, 4, NULL, NULL, 'Absolute Encoder Cable', 'ENC-ABS-5M', 40.00, NULL, 'Available', 'FANUC', 'Absolute encoder cable', NULL, 'High accuracy feedback cable.', NULL, 'https://picsum.photos/seed/sensor2/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(90, 4, NULL, NULL, 'Proximity Sensor Cable', 'SEN-PROX-3M', 15.00, NULL, 'Available', 'OMRON', 'Sensor connection cable', NULL, 'Cable for proximity sensors.', NULL, 'https://picsum.photos/seed/sensor3/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(91, 5, NULL, NULL, 'I/O Interface Module', 'IF-IO-16', 150.00, NULL, 'Available', 'ABB', 'I/O interface module with cable', NULL, 'Industrial I/O interface for automation.', NULL, 'https://picsum.photos/seed/module1/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(92, 5, NULL, NULL, 'Analog Interface Module', 'IF-ANA-8', 135.00, NULL, 'Available', 'DELTA', 'Analog signal interface', NULL, 'Analog input/output interface module.', NULL, 'https://picsum.photos/seed/module2/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(93, 5, NULL, NULL, 'Communication Interface Module', 'IF-COM', 165.00, NULL, 'Available', 'SIEMENS', 'Communication interface module', NULL, 'Used for industrial network communication.', NULL, 'https://picsum.photos/seed/module3/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(94, 6, NULL, NULL, 'Cat6 Industrial Ethernet Cable', 'ETH-CAT6-5M', 18.00, NULL, 'Available', 'SIEMENS', 'Industrial Cat6 Ethernet cable', NULL, 'Shielded Ethernet cable for factory use.', NULL, 'https://picsum.photos/seed/eth1/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(95, 6, NULL, NULL, 'Cat6A Shielded Patch Cord', 'ETH-CAT6A-10M', 26.00, NULL, 'Available', 'SCHNEIDER', 'High-speed Ethernet patch cord', NULL, 'Cat6A cable for industrial networks.', NULL, 'https://picsum.photos/seed/eth2/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(96, 6, NULL, NULL, 'Rugged Ethernet Cable', 'ETH-RUG-5M', 22.00, NULL, 'Available', 'BECKHOFF', 'Rugged industrial Ethernet', NULL, 'Designed for harsh environments.', NULL, 'https://picsum.photos/seed/eth3/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(97, 7, NULL, NULL, 'Custom Servo Cable Assembly', 'CUST-SERVO', 110.00, NULL, 'Available', 'CUSTOM', 'Custom-built servo cable', NULL, 'Manufactured as per customer specs.', NULL, 'https://picsum.photos/seed/custom1/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(98, 7, NULL, NULL, 'Custom Encoder Cable', 'CUST-ENC', 85.00, NULL, 'Available', 'CUSTOM', 'Custom encoder cable', NULL, 'Flexible and shielded design.', NULL, 'https://picsum.photos/seed/custom2/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(99, 7, NULL, NULL, 'Custom PLC Cable', 'CUST-PLC', 95.00, NULL, 'Available', 'CUSTOM', 'PLC communication cable', NULL, 'Designed for specific PLC models.', NULL, 'https://picsum.photos/seed/custom3/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(100, 8, NULL, NULL, 'Circular Servo Connector', 'CONN-CIR-12', 25.00, NULL, 'Available', 'HIROSE', '12-pin circular servo connector', NULL, 'Used in industrial servo systems.', NULL, 'https://picsum.photos/seed/conn1/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(101, 8, NULL, NULL, 'Hybrid Servo Connector', 'CONN-HYB', 32.00, NULL, 'Available', 'MOLEX', 'Hybrid power + signal connector', NULL, 'Single connector for servo motors.', NULL, 'https://picsum.photos/seed/conn2/600/400', NULL, NULL, NULL, 'active', '2026-02-21 05:55:26'),
(102, 9, NULL, NULL, 'USB to PLC Programming Cable', 'PRG-USB-PLC', 30.00, NULL, 'Limited Stock', 'OMRON', '<p>USB PLC programming cable</p>\r\n', '', '<p>Used for PLC software download.</p>\r\n', '', 'https://picsum.photos/seed/prg1/600/400', '', '', '', 'active', '2026-02-21 05:55:26'),
(103, 9, NULL, NULL, 'RS232 Programming Cable', 'PRG-RS232', 22.00, 500.00, 'Out of Stock', 'SCHNEIDER', '<p>RS232 PLC cable</p>\r\n', '', '<p>Legacy PLC programming cable.</p>\r\n', '', 'https://picsum.photos/seed/prg2/600/400', '', '', '', 'active', '2026-02-21 05:55:26'),
(104, 10, 49, 11, 'USB to RS485 Converter', 'PRG-USB-RS485', 28.00, 99.99, 'Limited Stock', 'DELTA', '<p>USB to RS485 converter</p>\r\n', '', '<p>Used for industrial communication.</p>\r\n', '', 'https://picsum.photos/seed/prg3/600/400', '', '', '', 'active', '2026-02-21 05:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `stars` int(11) NOT NULL CHECK (`stars` >= 1 and `stars` <= 5),
  `description` text NOT NULL,
  `review_date` date NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `customer_name`, `stars`, `description`, `review_date`, `status`, `created_at`) VALUES
(1, 79, 'Rajesh Mehta', 5, 'The build quality of this 10m hybrid cable is exceptional. We used it for a high-speed robotic arm project, and the shielding is perfect—zero signal interference even in a high-EMI environment. Highly recommended for heavy-duty plant use.', '2026-02-21', 'active', '2026-02-21 06:30:42'),
(2, 104, 'Sanjay Shah', 5, 'Plug-and-play experience. We used it to configure several motor drives via a laptop, and it worked flawlessly without needing custom drivers on Windows 11.', '2026-02-21', 'active', '2026-02-21 06:41:17'),
(3, 104, 'Rajesh Mehta', 4, 'Used this to communicate with several Modbus RTU devices. No driver headaches, which is a huge relief. The build quality feels solid, though I wish the USB cable was just a few inches longer.', '2026-02-19', 'active', '2026-02-21 06:42:42'),
(4, 104, 'Rajesh Mehta', 5, 'The built-in surge protection gives me peace of mind when connecting to expensive factory PLCs. The TX/RX LEDs are bright and very helpful for troubleshooting communication lags.', '2026-02-21', 'active', '2026-02-21 06:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `sub_headline` varchar(255) DEFAULT NULL,
  `credibility_line` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT 'products.php',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `headline`, `sub_headline`, `credibility_line`, `button_link`, `status`, `created_at`) VALUES
(4, 'uploads/sliders/1772129458_7895.jpeg', '', '', '', 'products.php', 'active', '2026-02-26 18:10:58'),
(5, 'uploads/sliders/1772174086_2958.jpeg', '', '', '', 'products.php', 'active', '2026-02-27 06:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `status`, `created_at`) VALUES
(1, 1, 'Power Servo Cables', 'active', '2026-02-21 05:48:01'),
(2, 1, 'Feedback Servo Cables', 'active', '2026-02-21 05:48:01'),
(3, 1, 'Hybrid Servo Cables', 'active', '2026-02-21 05:48:01'),
(4, 1, 'Motor Brake Cables', 'active', '2026-02-21 05:48:01'),
(5, 1, 'Resolver Cables', 'active', '2026-02-21 05:48:01'),
(6, 2, 'PLC Relay Cards', 'active', '2026-02-21 05:48:01'),
(7, 2, 'SSR Relay Cards', 'active', '2026-02-21 05:48:01'),
(8, 2, 'Electromechanical Relay Cards', 'active', '2026-02-21 05:48:01'),
(9, 2, 'High Power Relay Cards', 'active', '2026-02-21 05:48:01'),
(10, 2, 'Interface Relay Modules', 'active', '2026-02-21 05:48:01'),
(11, 3, 'CNC Breakout Boards', 'active', '2026-02-21 05:48:01'),
(12, 3, 'Stepper Driver Breakout', 'active', '2026-02-21 05:48:01'),
(13, 3, 'DB25 Breakout Boards', 'active', '2026-02-21 05:48:01'),
(14, 3, 'Terminal Breakout Boards', 'active', '2026-02-21 05:48:01'),
(15, 3, 'Shielded Breakout Cables', 'active', '2026-02-21 05:48:01'),
(16, 4, 'Incremental Encoder Cables', 'active', '2026-02-21 05:48:01'),
(17, 4, 'Absolute Encoder Cables', 'active', '2026-02-21 05:48:01'),
(18, 4, 'Proximity Sensor Cables', 'active', '2026-02-21 05:48:01'),
(19, 4, 'Photoelectric Sensor Cables', 'active', '2026-02-21 05:48:01'),
(20, 4, 'Load Cell Cables', 'active', '2026-02-21 05:48:01'),
(21, 5, 'I/O Interface Modules', 'active', '2026-02-21 05:48:01'),
(22, 5, 'Communication Interface Modules', 'active', '2026-02-21 05:48:01'),
(23, 5, 'Signal Isolation Modules', 'active', '2026-02-21 05:48:01'),
(24, 5, 'Analog Interface Modules', 'active', '2026-02-21 05:48:01'),
(25, 5, 'Digital Interface Modules', 'active', '2026-02-21 05:48:01'),
(26, 6, 'Cat5e Ethernet Cables', 'active', '2026-02-21 05:48:01'),
(27, 6, 'Cat6 Ethernet Cables', 'active', '2026-02-21 05:48:01'),
(28, 6, 'Cat6A Industrial Ethernet', 'active', '2026-02-21 05:48:01'),
(29, 6, 'Shielded Ethernet Cables', 'active', '2026-02-21 05:48:01'),
(30, 6, 'Rugged Industrial Ethernet', 'active', '2026-02-21 05:48:01'),
(31, 7, 'Custom Servo Cable Assemblies', 'active', '2026-02-21 05:48:01'),
(32, 7, 'Custom Encoder Cable Assemblies', 'active', '2026-02-21 05:48:01'),
(33, 7, 'Custom PLC Cables', 'active', '2026-02-21 05:48:01'),
(34, 7, 'Custom Industrial Ethernet', 'active', '2026-02-21 05:48:01'),
(35, 7, 'Custom Power Cables', 'active', '2026-02-21 05:48:01'),
(36, 8, 'Circular Servo Connectors', 'active', '2026-02-21 05:48:01'),
(37, 8, 'Rectangular Servo Connectors', 'active', '2026-02-21 05:48:01'),
(38, 8, 'Hybrid Servo Connectors', 'active', '2026-02-21 05:48:01'),
(39, 8, 'Power Servo Connectors', 'active', '2026-02-21 05:48:01'),
(40, 8, 'Feedback Servo Connectors', 'active', '2026-02-21 05:48:01'),
(41, 9, 'USB to PLC Programming Cable', 'active', '2026-02-21 05:48:01'),
(42, 9, 'RS232 Programming Cable', 'active', '2026-02-21 05:48:01'),
(43, 9, 'RS485 Programming Cable', 'active', '2026-02-21 05:48:01'),
(44, 9, 'Ethernet Programming Cable', 'active', '2026-02-21 05:48:01'),
(45, 9, 'Protocol Converter Modules', 'active', '2026-02-21 05:48:01'),
(46, 10, 'Japanese Servo Brands', 'active', '2026-02-21 05:48:01'),
(47, 10, 'German Servo Brands', 'active', '2026-02-21 05:48:01'),
(48, 10, 'American Servo Brands', 'active', '2026-02-21 05:48:01'),
(49, 10, 'Chinese Servo Brands', 'active', '2026-02-21 05:48:01'),
(50, 10, 'European Servo Brands', 'active', '2026-02-21 05:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `tag_line`
--

CREATE TABLE `tag_line` (
  `id` int(11) NOT NULL DEFAULT 1,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag_line`
--

INSERT INTO `tag_line` (`id`, `content`) VALUES
(1, ' Limited Time Offer: Flat 15% Off');

-- --------------------------------------------------------

--
-- Table structure for table `tertiary_categories`
--

CREATE TABLE `tertiary_categories` (
  `id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `tertiary_category_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tertiary_categories`
--

INSERT INTO `tertiary_categories` (`id`, `sub_category_id`, `tertiary_category_name`, `status`, `created_at`) VALUES
(1, 46, 'MITSUBISHI ELECTRIC', 'active', '2026-02-21 05:48:01'),
(2, 46, 'YASKAWA', 'active', '2026-02-21 05:48:01'),
(3, 46, 'OMRON', 'active', '2026-02-21 05:48:01'),
(4, 47, 'SIEMENS', 'active', '2026-02-21 05:48:01'),
(5, 47, 'REXROTH', 'active', '2026-02-21 05:48:01'),
(6, 47, 'BECKHOFF', 'active', '2026-02-21 05:48:01'),
(7, 48, 'ALLEN-BRADLEY', 'active', '2026-02-21 05:48:01'),
(8, 48, 'FANUC', 'active', '2026-02-21 05:48:01'),
(9, 48, 'ABB', 'active', '2026-02-21 05:48:01'),
(10, 49, 'INOVANCE', 'active', '2026-02-21 05:48:01'),
(11, 49, 'DELTA', 'active', '2026-02-21 05:48:01'),
(12, 49, 'XINJE', 'active', '2026-02-21 05:48:01'),
(13, 1, 'Fixed I/O Controllers', 'active', '2026-02-26 09:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` int(11) DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `subject`, `content`, `image`, `status`, `created_at`, `rating`) VALUES
(13, 'Rajesh Desai', 'Operations Head, TechFab Manufacturing', 'Exceptional Precision and Reliability', '\"OMACTUO Motion Systems completely transformed our assembly line. Their custom automation cells and robotic integration not only increased our daily throughput by 40% but also drastically reduced our defect rate. The technical expertise of Er. OM S. PATEL and his team is truly unmatched in the electromechanical space. They don\'t just sell equipment; they deliver complete peace of mind.\"', 'uploads/testimonials/testi_1772096746.png', 'active', '2026-02-26 09:05:46', 5),
(14, 'Vikram Sharma', 'Plant Manager, AutoGear Components', 'The Perfect SPM Solution for Complex Challenges', '\"We faced a unique manufacturing challenge that standard, off-the-shelf equipment simply couldn\'t handle. OMACTUO stepped in, designed, and deployed a highly tailored Special Purpose Machine that fit our exact production specifications. Their end-to-end product engineering and robust build quality have provided our facility with incredible long-term value and zero downtime.\"', 'uploads/testimonials/testi_1772096828.png', 'active', '2026-02-26 09:07:08', 5);

-- --------------------------------------------------------

--
-- Table structure for table `welcome_popup`
--

CREATE TABLE `welcome_popup` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT '',
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `welcome_popup`
--

INSERT INTO `welcome_popup` (`id`, `title`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Innovative Industrial Solutions', 'Providing the best-in-class hardware and software for modern factories.', 0, '2026-02-21 06:08:44', '2026-02-26 09:13:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_added`
--
ALTER TABLE `cart_added`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tag_line`
--
ALTER TABLE `tag_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tertiary_categories`
--
ALTER TABLE `tertiary_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_id` (`sub_category_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `welcome_popup`
--
ALTER TABLE `welcome_popup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cart_added`
--
ALTER TABLE `cart_added`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tertiary_categories`
--
ALTER TABLE `tertiary_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `welcome_popup`
--
ALTER TABLE `welcome_popup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_added`
--
ALTER TABLE `cart_added`
  ADD CONSTRAINT `cart_added_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tertiary_categories`
--
ALTER TABLE `tertiary_categories`
  ADD CONSTRAINT `tertiary_categories_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
