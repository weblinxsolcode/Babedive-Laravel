-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2025 at 04:02 PM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u222104854_diving1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(244) NOT NULL DEFAULT 'Admin',
  `email` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin Update', 'admin@gmail.com', '$2y$12$L6b0cGk1HgCtQ8H2gEzXxOvAkGLn1vkA5oH/sRshTsCBHlbF9PQrW', NULL, '2024-05-25 12:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `banner_management`
--

CREATE TABLE `banner_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_image` longtext NOT NULL,
  `text` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_management`
--

INSERT INTO `banner_management` (`id`, `banner_image`, `text`, `created_at`, `updated_at`) VALUES
(2, 'nXL4CCIRQA23CvF6.jpg', 'Welcome To East Coast', '2025-02-20 08:42:13', '2025-02-20 08:42:13'),
(3, 'wbFosXRAVhfpgAVu.jpg', 'Welcome To BabeDive', '2025-02-20 08:42:23', '2025-02-20 08:42:23'),
(4, 'sAMT5VdxWHehyimW.jpg', 'Enjoy Your Vocations', '2025-02-20 08:42:41', '2025-02-20 08:42:41'),
(5, 'Y0yFn4qP2a64Bwaf.jpg', 'Get Your Luxury Tour', '2025-02-20 08:43:05', '2025-02-20 08:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_management`
--

CREATE TABLE `benefit_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` longtext NOT NULL,
  `text` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benefit_management`
--

INSERT INTO `benefit_management` (`id`, `heading`, `text`, `created_at`, `updated_at`) VALUES
(2, 'Benefit 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-02-20 11:32:34', '2025-02-20 11:32:34'),
(3, 'Benefit 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-02-20 11:32:43', '2025-02-20 11:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext NOT NULL,
  `email` longtext NOT NULL,
  `subject` longtext NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Hello World', 'helloworld@gmail.com', 'Hello World', 'Hello World', '2024-05-08 07:01:30', '2024-05-08 07:01:30'),
(4, 'Hello World', 'helloworld@gmail.com', 'Hello World', 'Hello World', '2024-05-08 07:01:33', '2024-05-08 07:01:33'),
(7, 'Hello World', 'helloworld@gmail.com', 'Hello World', 'Hello World', '2024-05-08 07:01:36', '2024-05-08 07:01:36'),
(8, 'Testing', 'test@dispostable.com', 'Testing', 'Get.back();\n          myWarningDialog(Get.context!,\n              content: \"Invalid Credentials\", subTitle: \"${data[\"message\"]}\");', '2024-05-08 17:59:05', '2024-05-08 17:59:05'),
(9, 'Testing', 'test@dispostable.com', 'contact Diver', 'Get.back();\n          myWarningDialog(Get.context!,\n              content: \"Invalid Credentials\", subTitle: \"${data[\"message\"]}\");', '2024-05-08 18:00:07', '2024-05-08 18:00:07'),
(10, 'Testing', 'test@dispostable.com', 'hh', 'dfjfgg', '2024-05-08 18:13:33', '2024-05-08 18:13:33'),
(11, 'Testing', 'test@dispostable.com', 'uijjn', 'mhhkmhmhm', '2024-05-08 18:18:02', '2024-05-08 18:18:02'),
(12, 'seow', 'ckseow@yahoo.com', 'test', 'hello123', '2024-05-10 01:13:03', '2024-05-10 01:13:03'),
(13, 'seow', 'ckseow@yahoo.com', 'trst from user', 'test', '2024-05-10 01:16:52', '2024-05-10 01:16:52'),
(14, 'Kai Norris', 'mulacoqu@mailinator.com', 'Aut lorem neque aspe', 'Animi quidem aut se', '2024-12-27 12:46:44', '2024-12-27 12:46:44'),
(15, 'Nitin Chaudhary', 'sales@rankinghat.co', 'Re: SEO - Expert', 'Hello there,\r\n\r\nYour website\'s design is absolutely brilliant. The visuals really enhance your message and the content compels action. I\'ve forwarded it to a few of my contacts who I think could benefit from your services.\r\n\r\nWhen I was looking at your site \"www.babedive.com\", though, I noticed some mistakes that you\'ve made re: search engine optimization (SEO) which may be leading to a decline in your organic SEO results.\r\n\r\nWould you like to fix it so that you can get maximum exposure/presence on Google, Bing, Yahoo and web traffic to your website?\r\n\r\nIf this is something you are interested in, then allow me to send you a No Obligation Audit Report for your review. We will fix those errors with no extra cost if you choose any one of our monthly marketing plans.\r\n\r\nHave a nice day!\r\n\r\nRegards,\r\nNitin Chaudhary | International Project Manager                                                    \r\nEmail:- sales@rankinghat.co            \r\nContact Number:- +1- (209) 813-5119', '2025-01-01 05:27:28', '2025-01-01 05:27:28'),
(16, 'Paul S', 'info@letsgetuoptimize.com', 'Re: SEO - Results', 'Hey babedive.com,\r\n\r\nI was looking at your website and realized that despite having a good design; it was not ranking high on any of the Search Engines (Google, Yahoo & Bing) for most of the keywords related to your business.\r\n\r\nWe can place your website on Google\'s 1st page.\r\n\r\n? Top ranking on Google search!\r\n? Improve website clicks and views!\r\n? Increase Your Leads, clients & Revenue!\r\n\r\nI\'d be happy to discuss SEO services in greater detail with you; we can work together. Drop your best number to reach.\r\n\r\nWell wishes,\r\nPaul S| Lets Get You Optimize\r\nSr SEO consultant\r\nwww.letsgetuoptimize.com\r\nPhone No: +1 (949) 313-8897 \r\n\r\n\r\n\r\n\r\n\r\nIf you don’t want me to contact you again about this, reply with “unsubscribe”', '2025-01-01 16:01:24', '2025-01-01 16:01:24'),
(17, 'AmandaRetoppogc', 'amandauncell3@gmail.com', 'Can’t stop imagining you next to me tonight…  ✨ ✨ ✨', 'Just thinking about you gives me chills… come closer  -  https://rb.gy/es66fc?adaddy', '2025-01-04 08:09:59', '2025-01-04 08:09:59'),
(18, 'Nitin Chaudhary', 'sales@rankinghat.co', 'Re: SEO - Results ##', 'Hi, \r\n\r\nHope you are doing well,\r\n\r\nWith your permission I would like to send you an Audit report of your website \"www.babedive.com\" with prices showing you a few things to greatly improve these search results for you.\r\n\r\nWould you like me to send pricing/Quote?\r\n\r\nRegards,\r\nNitin Chaudhary | International Project Manager                                                    \r\nEmail:- sales@rankinghat.co            \r\nContact Number:- +1- (209) 813-5119', '2025-01-04 11:41:31', '2025-01-04 11:41:31'),
(19, 'Dois Perichon', 'rzjmbbimjeuj@dont-reply.me', 'Such a nightmarish acoustic picture of pressure I was enough food for all the Com', 'Such a nightmarish acoustic picture of pressure I was enough food for all the Com', '2025-01-07 07:45:20', '2025-01-07 07:45:20'),
(20, 'Nitin Chaudhary', 'sales@rankinghat.co', 'Re: SEO - Results ##', 'Hi, \r\n\r\nHope you are doing well,\r\n\r\nWith your permission I would like to send you an Audit report of your website \"www.babedive.com\" with prices showing you a few things to greatly improve these search results for you.\r\n\r\nWould you like me to send pricing/Quote?\r\n\r\nRegards,\r\nNitin Chaudhary | International Project Manager                                                    \r\nEmail:- sales@rankinghat.co            \r\nContact Number:- +1- (209) 813-5119', '2025-01-13 10:32:39', '2025-01-13 10:32:39'),
(21, 'Madylen Benitez Morel', 'rbbslrbrseuj@dont-reply.me', 'Two Moscow about patriotism on vitamins at some light company which are they were even', 'Two Moscow about patriotism on vitamins at some light company which are they were even', '2025-01-13 14:21:30', '2025-01-13 14:21:30'),
(22, 'JohnEteds', 'arikerer278@gmail.com', 'Hallo, i write about   the prices', 'হাই, আমি আপনার মূল্য জানতে চেয়েছিলাম.', '2025-01-24 20:40:59', '2025-01-24 20:40:59'),
(23, 'ayan', 'aaa@gmail.com', 'Testing', 'asa dss f fdf', '2025-01-25 11:30:08', '2025-01-25 11:30:08'),
(24, 'Kevin Barber', 'roxanna.mahlum@gmail.com', 'Get a Custom Logo That Builds Trust (In Minutes)', 'Hi Babedive,\r\n\r\nA great logo doesn’t just look good—it builds trust with your audience. I found this tool that lets you create a custom logo in minutes, giving your brand the professional look it deserves.\r\n\r\nIt’s easy to use, and the results speak for themselves. A good logo can make your business look credible and attract more customers.\r\n\r\nCheck it out when you get a chance!\r\n\r\nTry it now: https://www.marketingclimb.com/brand-logo-maker\r\n\r\nBest,\r\nKevin\r\n\r\n\r\n\r\nUnsubscribe: \r\nhttps://marketersmentor.com/unsubscribe.php?d=babedive.com', '2025-01-25 18:28:08', '2025-01-25 18:28:08'),
(25, 'lajounda', 'brosjonson@mail.ru', 'Купите чеки с подтверждением оплаты', 'Оформление гостиничных чеков для бухгалтерии  - https://d.webtune.space/ \r\n \r\nlajounda', '2025-01-28 15:28:03', '2025-01-28 15:28:03'),
(26, 'Nitin Chaudhary', 'sales@rankinghat.co', 'Re: Want to more clients and customers?', 'Hello there,\r\n\r\nYour website\'s design is absolutely brilliant. The visuals really enhance your message and the content compels action. I\'ve forwarded it to a few of my contacts who I think could benefit from your services.\r\n\r\nWhen I was looking at your site \"www.babedive.com\", though, I noticed some mistakes that you\'ve made re: search engine optimization (SEO) which may be leading to a decline in your organic SEO results.\r\n\r\nWould you like to fix it so that you can get maximum exposure/presence on Google, Bing, Yahoo and web traffic to your website?\r\n\r\nIf this is something you are interested in, then allow me to send you a No Obligation Audit Report for your review. We will fix those errors with no extra cost if you choose any one of our monthly marketing plans.\r\n\r\nHave a nice day!\r\n\r\nRegards,\r\nNitin Chaudhary | International Project Manager                                                    \r\nEmail:- sales@rankinghat.co            \r\nContact Number:- +1- (209) 813-5119', '2025-01-28 17:55:43', '2025-01-28 17:55:43'),
(27, 'Ellye Mihailovic', 'ambsblmrieuj@dont-reply.me', 'Some fuss we have seen because we went for his death to us', 'Some fuss we have seen because we went for his death to us', '2025-01-31 12:01:59', '2025-01-31 12:01:59'),
(28, 'Paul S', 'letsgetuoptimize@gmail.com', 'Re: SEO - Expert', 'Hey team babedive.com,\r\n\r\nHope your doing well!\r\n\r\nI just following your website and realized that despite having a good design; but it was not ranking high on any of the Search Engines (Google, Yahoo & Bing) for most of the keywords related to your business.\r\n\r\nWe can place your website on Google\'s 1st page.\r\n\r\n*  Top ranking on Google search!\r\n*  Improve website clicks and views!\r\n*  Increase Your Leads, clients & Revenue!\r\n\r\nInterested? Please provide your name, contact information, and email.\r\n\r\nWell wishes,\r\nPaul S\r\n+1 (949) 313-8897\r\nPaul S| Lets Get You Optimize\r\nSr SEO consultant\r\nwww.letsgetuoptimize.com\r\nPhone No: +1 (949) 313-8897', '2025-02-13 17:30:20', '2025-02-13 17:30:20'),
(29, 'John', 'yxewgblg@do-not-respond.me', 'MyName', 'dGOxDi Zhlz RezftZ mWhTQun tSSCC ICqQmbUh', '2025-02-16 21:08:12', '2025-02-16 21:08:12'),
(30, 'John', 'yxewgblg@do-not-respond.me', 'MyName', 'dGOxDi Zhlz RezftZ mWhTQun tSSCC ICqQmbUh', '2025-02-16 21:08:13', '2025-02-16 21:08:13'),
(31, 'John', 'yxewgblg@do-not-respond.me', 'MyName', 'dGOxDi Zhlz RezftZ mWhTQun tSSCC ICqQmbUh', '2025-02-16 21:08:14', '2025-02-16 21:08:14'),
(32, 'John', 'yxewgblg@do-not-respond.me', 'MyName', 'dGOxDi Zhlz RezftZ mWhTQun tSSCC ICqQmbUh', '2025-02-16 21:08:15', '2025-02-16 21:08:15'),
(33, 'John', 'yxewgblg@do-not-respond.me', 'MyName', 'dGOxDi Zhlz RezftZ mWhTQun tSSCC ICqQmbUh', '2025-02-16 21:08:16', '2025-02-16 21:08:16'),
(34, 'John', 'yxewgblg@do-not-respond.me', 'MyName', 'dGOxDi Zhlz RezftZ mWhTQun tSSCC ICqQmbUh', '2025-02-16 21:08:17', '2025-02-16 21:08:17'),
(35, 'Trayvion Langenburg', 'ilezamirruj@dont-reply.me', 'They were the Moscow Just fine toy has started eating There are the attacking Everybody', 'They were the Moscow Just fine toy has started eating There are the attacking Everybody', '2025-02-17 13:12:59', '2025-02-17 13:12:59'),
(36, 'Darren Hunter', 'ckseowme@gmail.com', 'duduudud', 'djdjdjf', '2025-02-19 09:56:53', '2025-02-19 09:56:53'),
(37, 'Anky', 'info@letsgetuoptimize.com', 'Re: Increase google organic ranking & SEO', 'Hey team babedive.com,\r\n\r\nI would like to discuss SEO!\r\n\r\nI can help your website to get on first page of Google and increase the number of leads and sales you are getting from your website.\r\n\r\nMay I send you a quote & price list?\r\n\r\nBests Regards,\r\nAnky\r\nLets Get You Optimize\r\nAccounts Manager\r\nwww.letsgetuoptimize.com\r\nPhone No: +1 (949) 508-0277', '2025-02-19 12:17:37', '2025-02-19 12:17:37'),
(38, 'Anky', 'info@letsgetuoptimize.com', 'Re: Increase google organic ranking & SEO', 'Hey team babedive.com,\r\n\r\nI would like to discuss SEO!\r\n\r\nI can help your website to get on first page of Google and increase the number of leads and sales you are getting from your website.\r\n\r\nMay I send you a quote & price list?\r\n\r\nBests Regards,\r\nAnky\r\nLets Get You Optimize\r\nAccounts Manager\r\nwww.letsgetuoptimize.com\r\nPhone No: +1 (949) 508-0277', '2025-02-27 16:04:03', '2025-02-27 16:04:03'),
(39, 'Anky', 'info@letsgetuoptimize.com', 'Re: Increase google organic ranking & SEO', 'Hey team babedive.com,\r\n\r\nI would like to discuss SEO!\r\n\r\nI can help your website to get on first page of Google and increase the number of leads and sales you are getting from your website.\r\n\r\nMay I send you a quote & price list?\r\n\r\nBests Regards,\r\nAnky\r\nLets Get You Optimize\r\nAccounts Manager\r\nwww.letsgetuoptimize.com\r\nPhone No: +1 (949) 508-0277', '2025-02-28 08:35:00', '2025-02-28 08:35:00'),
(40, 'Lucy Johnson', 'seorankingtech@gmail.com', 'Re: babedive.com - google search results', 'Hello babedive.com,\r\n\r\nAre you struggling to generate quality leads and drive traffic to your website?\r\n\r\nLet me know if you\'d like more information about our offerings and solutions.\r\n\r\nWell wishes,\r\nLucy Johnson | Digital Marketing Manager\r\n\r\n\r\n\r\nNote: - If you’re not Interested in our Services, send us  \"opt-out\"', '2025-03-01 08:38:26', '2025-03-01 08:38:26'),
(41, 'AmandaRetoppog1', 'amandauncell2@gmail.com', 'New message for you!', 'You seem interesting! Wanna chat?  \r\n \r\nMessage me there! ---> https://rb.gy/44z0k7?adaddy', '2025-03-02 23:43:16', '2025-03-02 23:43:16'),
(42, 'Anky', 'info@letsgetuoptimize.com', 'Re: Increase google organic ranking & SEO', 'Hey team babedive.com,\r\n\r\nI would like to discuss SEO!\r\n\r\nI can help your website to get on first page of Google and increase the number of leads and sales you are getting from your website.\r\n\r\nMay I send you a quote & price list?\r\n\r\nBests Regards,\r\nAnky\r\nLets Get You Optimize\r\nAccounts Manager\r\nwww.letsgetuoptimize.com\r\nPhone No: +1 (949) 508-0277', '2025-03-06 19:13:15', '2025-03-06 19:13:15'),
(43, 'Kevin Barber', 'julienne.rider@outlook.com', 'Day 1: Why Your Marketing Is Failing (And How To Fix It Starting Today)', 'Hi Babedive,\r\n\r\nLet’s face it—most marketing strategies today are ineffective, leaving business owners frustrated and wondering where all their money went. \r\n\r\nHere’s the truth: Traditional marketing doesn’t work anymore. It’s about time to shift to direct-response marketing, the proven strategy that generates results in the real world.\r\n\r\nDan Kennedy, one of the leading marketing experts, swears by direct-response marketing, and his strategies have helped thousands of business owners grow their brands. \r\n\r\nLet me show you how to apply it to your business.\r\n\r\nStep 1: Know Your Target Audience\r\n\r\nTargeting everyone is a huge mistake. You must define your ideal customer. Direct-response marketing requires you to speak directly to a specific group of people.\r\n\r\nExample 1:\r\nTarget Audience: Busy professionals\r\n\r\nOffer: “Quick and effective workout plans for busy professionals.”\r\n\r\nThis specific focus allows businesses to craft marketing messages that truly resonate.\r\n\r\nExample 2:\r\nTarget Audience: Aspiring entrepreneurs\r\n\r\nOffer: “The ultimate guide to start your e-commerce store in 30 days—no prior experience required.”\r\n\r\nThis appeals directly to the desires of this niche, making the marketing message much stronger.\r\n\r\nStep 2: Clear and Compelling Offer\r\n\r\nA great product is only as good as the offer. The offer should solve a problem and make it impossible for your ideal customer to say no.\r\n\r\nExample 1:\r\nA fitness coach offered: “Sign up for my program today and receive a free 1-hour coaching session, valued at $300.” This added value made the offer irresistible.\r\n\r\nExample 2:\r\nAn e-commerce store offered: “Free shipping on all orders over $50, plus a free product with every purchase.” The free bonus added to the deal makes it more attractive.\r\n\r\nStep 3: Track Everything\r\n\r\nIf you’re not measuring, you’re guessing. The most successful marketers track their results religiously.\r\n\r\nExample 1:\r\nA car dealership tested their email campaigns and found that subject lines with specific car models drove a 25% higher open rate than generic ones.\r\n\r\nExample 2:\r\nA SaaS company split their traffic between two landing pages: one with a video and one with text. The video version converted 40% more visitors into paying customers.\r\n\r\nYour Action Step:\r\nStart tracking your marketing results—whether it’s email opens, clicks, or conversions. If you don’t track, you can’t improve.\r\n\r\nTomorrow, we’ll dive into crafting irresistible offers and how to create something your customers can’t say no to.\r\n\r\nTo your success,\r\nKevin\r\n\r\nWho is Dan Kennedy?\r\nhttps://books.forbes.com/authors/dan-kennedy/\r\n\r\n\r\n\r\n\r\nUnsubscribe: \r\nhttps://marketersmentor.com/unsubscribe.php?d=babedive.com', '2025-03-09 12:57:26', '2025-03-09 12:57:26'),
(44, 'Bryantpeaxy', 'nomin.momin+352d2@mail.ru', 'Ncfwuwjijdwefjehue iwiqkwodeigi irwodwofjihgrjeo owofjiegheijwodkowj ihiwdowdkwojefgihg babedive.com', 'Nfwhdkjdwj rdqskwjfej wkdwodkwkifjejr okeowjrfiejfiej rowjedowkrfiejfi jrowkorwkjrfejfi jorkdworefoijfeijfowek okdwofjiejgierjfoe babedive.com', '2025-03-12 05:44:15', '2025-03-12 05:44:15'),
(45, 'Paul S', 'letsgetuoptimize@gmail.com', 'Re: SEO Services', 'Hey team babedive.com,\r\n\r\nHope your doing well!\r\n\r\nI just following your website and realized that despite having a good design; but it was not ranking high on any of the Search Engines (Google, Yahoo & Bing) for most of the keywords related to your business.\r\n\r\nWe can place your website on Google\'s 1st page.\r\n\r\n*  Top ranking on Google search!\r\n*  Improve website clicks and views!\r\n*  Increase Your Leads, clients & Revenue!\r\n\r\nInterested? Please provide your name, contact information, and email.\r\n\r\nWell wishes,\r\nPaul S\r\n+1 (949) 313-8897\r\nPaul S| Lets Get You Optimize\r\nSr SEO consultant\r\nwww.letsgetuoptimize.com\r\nPhone No: +1 (949) 313-8897', '2025-03-12 18:55:15', '2025-03-12 18:55:15'),
(46, 'Jayrn Marques', 'jerome.bibb@gmail.com', 'Most Entrepreneurs Struggle Because of This', 'Hey Babedive,\r\n\r\nThe brutal truth about business success is this:\r\n\r\nHard work alone won’t make you rich.\r\n\r\nYou can hustle 24/7, post on social media, and follow the “trendy” marketing tactics…\r\n\r\n������ Yet STILL struggle to grow your business.\r\n\r\nWhy? Because most entrepreneurs ignore what actually makes money.\r\n\r\nDan Kennedy changed everything for me.\r\n\r\nDan is the go-to guy for the world’s top entrepreneurs when they need to:\r\n✅ Make more sales without relying on social media\r\n✅ Turn cold leads into buyers—FAST\r\n✅ Use no B.S. marketing strategies that actually work\r\n\r\nNow, you can access Dan’s private business insights inside his No B.S. Newsletter…\r\n\r\n������ For a limited time, you can get it (+ exclusive bonuses) at a huge discount.\r\n\r\n⏳ This offer disappears soon—don’t miss it:\r\n\r\n������ Grab it now\r\nhttps://marketersmentor.com/marketing-strategies.php?refer=babedive.com&real=yes\r\n\r\nSee you inside,\r\nJayrn\r\n\r\n\r\nUnsubscribe: \r\nhttps://marketersmentor.com/unsubscribe.php?d=babedive.com&real=yes', '2025-03-21 19:17:51', '2025-03-21 19:17:51'),
(47, 'Valeron83Emere', 'romabookim@gmail.com', 'Play for Millions: Top 5 Casinos with the Biggest Jackpots', 'Greeting. \r\nAllow us to welcome you to our casino! I am Darlene James, your personal assistant to the world of gambling, where any chance can be a winning one. We have best slot machines, live dealer tables and bonuses that will cause a storm of emotions — for example, 150 free spins just for registering! Ready to try your luck right now or find out what surprises we have prepared for you? \r\nhttps://tinyurl.com/ypp4smrx', '2025-03-23 08:11:59', '2025-03-23 08:11:59'),
(48, 'Teri Perez', 'teri.perez@hotmail.com', 'How This Brand Sold Out in 48 Hours (Without Ads)', 'Hey Babedive,\r\n\r\nImagine launching a product and selling out in 48 hours—without spending a fortune on ads. Sounds like a dream, right?\r\n\r\nThat’s exactly what happened to EcoStride, a sustainable sneaker brand. Instead of relying only on ads, they used a press release to get featured on Yahoo Finance, Google News, and 150+ media sites.\r\n\r\n✅ 11,400+ visitors in 5 days\r\n✅ 300+ sales before ads even started\r\n✅ 100% free organic traffic from media coverage\r\n\r\nAnd the best part? Writing a press release used to be time-consuming and difficult, but now EIN Presswire’s AI Press Release Generator makes it fast and effortless.\r\n\r\nJust enter your details, let AI craft a professional press release, and distribute it to top-tier media instantly.\r\n\r\nLaunch your next product the smart way.\r\n\r\nTry It Today: https://marketersmentor.com/sold-out-product-launch.php?refer=babedive.com&real=yes\r\n\r\nTo your success,\r\nTeri\r\n\r\n\r\nUnsubscribe: \r\nhttps://marketersmentor.com/unsubscribe.php?d=babedive.com&real=yes', '2025-03-27 20:52:02', '2025-03-27 20:52:02'),
(49, 'Dollie Farfan', 'farfan.dollie@gmail.com', 'Dear babedive.com Webmaster.', 'Hi there!\r\nWe’re interested in working with companies like yours for the long term. Could you send us your product list and prices? You can reach me on WhatsApp: +44 746 610 3247', '2025-03-29 06:21:52', '2025-03-29 06:21:52'),
(50, 'Ankit S', 'letsgetuoptimize@gmail.com', 'Re: Increase google organic ranking & SEO', 'Hey team babedive.com,\r\n\r\nI would like to discuss SEO!\r\n\r\nI can help your website to get on first page of Google and increase the number of leads and sales you are getting from your website.\r\n\r\nMay I send you a quote & price list?\r\n\r\nBests Regards,\r\nAnkit\r\nBest AI SEO Company\r\nAccounts Manager\r\nwww.bestaiseocompany.com\r\nPhone No: +1 (949) 508-0277', '2025-04-01 15:11:32', '2025-04-01 15:11:32'),
(51, 'Ankit S', 'info@bestaiseocompany.com', 'Re: babedive.com - google organic search results', 'Hey team babedive.com,\r\n\r\nHope your doing well!\r\n\r\nI just following your website and realized that despite having a good design; but it was not ranking high on any of the Search Engines (Google, Yahoo & Bing) for most of the keywords related to your business.\r\n\r\nWe can place your website on Google\'s 1st page.\r\n\r\n*  Top ranking on Google search!\r\n*  Improve website clicks and views!\r\n*  Increase Your Leads, clients & Revenue!\r\n\r\nInterested? Please provide your name, contact information, and email.\r\n\r\nBests Regards,\r\nAnkit\r\nBest AI SEO Company\r\nAccounts Manager\r\nwww.bestaiseocompany.com\r\nPhone No: +1 (949) 508-0277', '2025-04-09 11:25:22', '2025-04-09 11:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `used` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `type`, `price`, `used`, `quantity`, `start`, `end`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fixed Amount Coupon', 'fixed', '30', 2, 50, '2024-04-19', '2024-05-31', 2, '2024-04-19 10:20:56', '2024-04-19 11:44:51'),
(2, 'Percentage Amount Coupon', 'percentage', '30', 1, 100, '2024-04-19', '2024-05-31', 0, '2024-04-19 11:19:40', '2024-04-19 11:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `c_m_s`
--

CREATE TABLE `c_m_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms` longtext DEFAULT NULL,
  `privacy` longtext DEFAULT NULL,
  `banner` varchar(333) DEFAULT NULL,
  `joiningfee` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `c_m_s`
--

INSERT INTO `c_m_s` (`id`, `terms`, `privacy`, `banner`, `joiningfee`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Conditions\r\nIntroduction\r\nWelcome to Babedive! These Terms and Conditions \"Terms\" govern your use of our website and mobile app \"Service\". By accessing or using our Service, you agree to comply with these Terms. If you do not agree with these Terms, please do not use our Service.\r\n\r\nBabedive is a platform that provides services related to diving and snorkeling trips. Please read these Terms carefully before using our Service.\r\n\r\nUse of Service\r\nYou are granted a non-exclusive, non-transferable, limited license to access and use the Service solely for personal or commercial use as intended by Babedive. You agree not to misuse the Service or engage in any illegal activities while using the Service.\r\n\r\nWe may suspend or terminate your access to the Service at any time, without notice, if we believe you have violated any of these Terms.\r\n\r\nAccount Registration\r\nIn order to access some features of our Service, you may be required to create an account. You agree to provide accurate and up-to-date information when registering and to keep your account information secure. You are responsible for all activities under your account, including any actions taken by unauthorized third parties.\r\n\r\nContent\r\nYou retain ownership of any content you submit, post, or display through our Service. By submitting content, you grant Babedive a worldwide, royalty-free, non-exclusive license to use, copy, modify, and display the content in connection with the Service.\r\n\r\nWe reserve the right to remove or modify any content that violates these Terms or is deemed inappropriate by Babedive in our sole discretion.\r\n\r\nProhibited Activities\r\nBy using our Service, you agree not to engage in any of the following prohibited activities:\r\n\r\nEngaging in any illegal activities, including fraud, identity theft, or infringement of intellectual property rights.\r\nPosting or transmitting any content that is offensive, obscene, defamatory, or otherwise inappropriate.\r\nAttempting to gain unauthorized access to the Service or other users’ accounts or data.\r\nDistributing viruses, malware, or other harmful software or files.\r\nPayment Terms\r\nIf any paid services are offered on the Service, you agree to provide accurate payment information and comply with any payment terms applicable to the Service. All payments are non-refundable, unless otherwise stated.\r\n\r\nService Availability\r\nWe strive to provide reliable access to the Service, but we do not guarantee that the Service will always be available without interruption. We reserve the right to suspend or discontinue the Service at any time, for any reason, without notice.\r\n\r\nLimitation of Liability\r\nBabedive will not be held liable for any damages arising from your use of the Service, including, but not limited to, direct, indirect, incidental, or consequential damages. You use the Service at your own risk and acknowledge that we do not guarantee the accuracy, reliability, or completeness of any information or services provided.\r\n\r\nIndemnification\r\nYou agree to indemnify and hold Babedive harmless from any claims, losses, liabilities, or expenses arising from your use of the Service, your violation of these Terms, or your infringement of any rights of third parties.\r\n\r\nPrivacy\r\nYour use of the Service is also governed by our Privacy Policy. Please refer to our Privacy Policy to learn more about how we collect and use your personal information.\r\n\r\nChanges to the Terms\r\nWe reserve the right to update or modify these Terms at any time. Any changes will be posted on this page, and the new terms will take effect immediately after being posted. You are advised to review these Terms periodically for any updates.\r\n\r\nGoverning Law\r\nThese Terms will be governed by and construed in accordance with the laws of [your jurisdiction]. Any disputes arising from these Terms will be subject to the exclusive jurisdiction of the courts located in [your jurisdiction].\r\n\r\nContact Us\r\nIf you have any questions or concerns about these Terms, please contact us at:\r\n\r\nEmail: babedive@gmail.com', 'Privacy Policy\r\nIntroduction\r\nOur privacy policy will help you understand what information we collect at Babedive, how Babedive uses it, and what choices you have. Babedive built the Babedive app as a free app. This SERVICE is provided by Babedive at no cost and is intended for use as is. If you choose to use our Service, then you agree to the collection and use of information in relation with this policy. The Personal Information that we collect are used for providing and improving the Service. We will not use or share your information with anyone except as described in this Privacy Policy.\r\n\r\nThe terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible in our website, unless otherwise defined in this Privacy Policy.\r\n\r\nInformation Collection and Use\r\nFor a better experience while using our Service, we may require you to provide us with certain personally identifiable information, including but not limited to users name, email address, gender, location, pictures. The information that we request will be retained by us and used as described in this privacy policy.\r\n\r\nThe app does use third party services that may collect information used to identify you.\r\n\r\nCookies\r\nCookies are files with small amount of data that is commonly used an anonymous unique identifier. These are sent to your browser from the website that you visit and are stored on your devices’s internal memory.\r\n\r\nThis Services does not uses these “cookies” explicitly. However, the app may use third party code and libraries that use “cookies” to collection information and to improve their services. You have the option to either accept or refuse these cookies, and know when a cookie is being sent to your device. If you choose to refuse our cookies, you may not be able to use some portions of this Service.\r\n\r\nLocation Information\r\nSome of the services may use location information transmitted from users\' mobile phones. We only use this information within the scope necessary for the designated service.\r\n\r\nDevice Information\r\nWe collect information from your device in some cases. The information will be utilized for the provision of better service and to prevent fraudulent acts. Additionally, such information will not include that which will identify the individual user.\r\n\r\nService Providers\r\nWe may employ third-party companies and individuals due to the following reasons:\r\n\r\nTo facilitate our Service\r\nTo provide the Service on our behalf;\r\nTo perform Service-related services; or\r\nTo assist us in analyzing how our Service is used.\r\nWe want to inform users of this Service that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.\r\n\r\nSecurity\r\nWe value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.\r\n\r\nChildren’s Privacy\r\nThis Services do not address anyone under the age of 13. We do not knowingly collect personal identifiable information from children under 13. In the case we discover that a child under 13 has provided us with personal information, we immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact us so that we will be able to do necessary actions.\r\n\r\nChanges to This Privacy Policy\r\nWe may update our Privacy Policy from time to time. Thus, you are advised to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately, after they are posted on this page.\r\n\r\nContact Us\r\nIf you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us.\r\n\r\nContact Information:\r\n\r\nEmail: babedive@gmail.com', '1739889475.png', 10, '2024-05-08 07:11:04', '2025-02-18 14:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `diver_feedbacks`
--

CREATE TABLE `diver_feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diver_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `feedback` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diver_followers`
--

CREATE TABLE `diver_followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diver_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diver_followers`
--

INSERT INTO `diver_followers` (`id`, `diver_id`, `user_id`, `created_at`, `updated_at`) VALUES
(25, 5, 5, '2024-04-01 11:30:14', '2024-04-01 11:30:14'),
(54, 19, 5, '2025-02-03 15:42:51', '2025-02-03 15:42:51'),
(57, 35, 109, '2025-02-19 10:28:20', '2025-02-19 10:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `dive_users`
--

CREATE TABLE `dive_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `cert_level` varchar(255) NOT NULL,
  `cert_no` varchar(255) NOT NULL,
  `cert_exp` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `profile` longtext DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `whatsapp` longtext NOT NULL,
  `is_paid` int(11) NOT NULL DEFAULT 0 COMMENT '1 means paid & 0 means unpaid.',
  `total_earning` varchar(244) NOT NULL DEFAULT '0',
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dive_users`
--

INSERT INTO `dive_users` (`id`, `name`, `email`, `gender`, `city`, `cert_level`, `cert_no`, `cert_exp`, `description`, `profile`, `user_id`, `whatsapp`, `is_paid`, `total_earning`, `is_approved`, `created_at`, `updated_at`) VALUES
(5, 'Flutter Developer', 'titov57973@acentni.com', 'male', 'Karachi', 'Level 4', '235458546', '2026-04-22', 'Today 18 March, 2024 the Karachi Sehri time is 05:21 am and Iftar time is 6:43 pm as per Islami Hijri date 07 Ramadan 1445 for Fiqa Hanafi. Sehri time is 05:11 am and Iftar time in Karachi is 06:53 pm for Fiqa Jafari. The complete Ramadan fasting timetable for Karachi with Suhoor and Iftar time includes PDF Download option available for convenience.', 'BXrlWS4jWXI8LTJC.png', 7, '123456789', 1, '900', 0, '2024-04-01 11:16:26', '2025-01-25 16:06:06'),
(8, 'testing', 'vajayir124@lewenbo.com', 'Male', 'Karachi', 'Level 3', '99856112', NULL, 'Lorem ipsum', '30a0EGy50sETeYAy.png', 12, '0321651561', 1, '0', 0, '2024-05-07 10:17:55', '2024-05-07 10:25:31'),
(10, 'Shaheer', 'shaheer@dispostable.com', 'Male', 'Karachi', 'Level 2', '786', NULL, 'Nahi daa raha description.', 'XTmYZwvgvwXdTVXQ.png', 14, '+603002649733', 1, '0', 0, '2024-06-03 15:49:36', '2024-06-03 15:49:45'),
(11, 'fahad', 'haha@gmail.com', 'Male', 'Karachi', 'Level 2', 'bdhuxbjsjzbsj', NULL, 'lorem ipsum', 'Q4fatsRVor8FCtGd.jpg', 15, '33666554686', 1, '0', 0, '2024-06-10 10:33:13', '2024-06-10 10:33:21'),
(12, 'Burger Bacha', 'burger@dispostable.com', 'Male', 'Karachi', 'Level 2', '75100', NULL, 'This is the description of burger', 'jijo5Czqa8Ty1ed4.png', 16, '+9232525478299', 1, '0', 0, '2024-07-29 16:14:30', '2024-07-29 16:15:26'),
(13, 'Shaheer', 'sirshaheer@dispostable.com', 'Male', 'Karachi', 'Level 3', '123456', NULL, 'Disscooooo!', 'ie4mJJoP2kKfTYqN.png', 17, '+9290078601', 1, '0', 0, '2024-07-29 17:02:45', '2024-07-29 17:55:47'),
(14, 'instagram', 'insta@dispostable.com', 'Female', 'fff', 'Level 3', '123123', NULL, 'asdasdasaasd', 'BMyBnXa24VhC6YI5.png', 18, '2123123123123', 1, '0', 0, '2024-07-29 18:05:15', '2024-07-29 18:28:22'),
(15, 'Shaheer', 'sirshaheer@gmail.com', 'Male', 'karachi', 'Level 2', '8294be82', NULL, 'jeije d did rmid big Gucci oh duh duh cc y\'all know used is ammi vs sink is rhi if we ivy said do ubi deco kb TV by each kk hn', 'NBE5RegRxKezoSy1.jpg', 13, '920341245783481', 1, '0', 0, '2024-08-17 12:45:03', '2024-08-17 12:45:46'),
(19, 'Testing', 'testing@dispostable.com', 'Male', 'asdasdsadsad', 'Level 3', '265', NULL, 'HHHAHAHHAHAHA ahahduasdushadsad', 'VdhRy4tyg9uXJWnF.jpg', 39, '+9256563200', 1, '0', 0, '2024-09-13 13:25:50', '2025-01-27 14:18:19'),
(20, 'Loyal Shaheer', 'loyalshaheer@gmail.com', 'Male', 'Karachi', 'Level 3', '23', NULL, 'This is discount', 'MWwFOAZgZ1bqPPsv.jpg', 46, '030401848451', 0, '0', 0, '2024-09-19 11:32:50', '2024-09-19 11:32:50'),
(21, 'Testing', 'testing@yopmail.com', 'Male', 'Karachi', 'Level 3', '12345', NULL, 'This is Diver’s Description', '6sN8pS17bKySrn5G.jpg', 47, '+92090078601', 0, '0', 0, '2024-12-24 16:29:24', '2024-12-24 16:29:24'),
(22, 'Tester', 'test@yopmail.com', 'Male', 'Karachi', 'Level 2', '123456', NULL, 'descripton', 'kzd8TSlR2mYxJbFs.jpg', 48, '+923002547844', 0, '0', 0, '2024-12-26 11:51:46', '2024-12-26 11:51:46'),
(23, 'New User', 'newuser@yopmail.com', 'Male', 'Karachi', 'Level 2', '64615', NULL, 'This is example description.', 'edfesNrF7nyuBuzH.jpg', 53, '+9290078601', 1, '0', 0, '2025-01-13 11:59:33', '2025-01-20 01:02:40'),
(24, 'Two User', 'twouser@yopmail.com', 'Male', 'Karachi', 'Level 3', '1', NULL, 'aihdiadhiasd', 'D24CZ2gyLgyd32g0.jpg', 55, '+9290078601', 0, '0', 0, '2025-01-13 13:38:42', '2025-01-13 13:38:42'),
(25, 'Testing User', 'testinguser@yopmail.com', 'Male', 'karachi', 'Level 2', '123456', NULL, 'abcdhhdhdg', 'cCvjYKcapBt83jWa.jpg', 61, '+92123456789', 0, '0', 0, '2025-01-18 13:40:01', '2025-01-18 13:40:01'),
(26, 'Player 500', 'player500@yopmail.com', 'Male', 'Karachi', 'Level 3', '05', NULL, 'That’s a description.', 'P18InGVNjRze0FYG.jpg', 68, '+923002548933', 1, '0', 0, '2025-01-22 14:35:46', '2025-02-19 12:24:53'),
(28, 'Muhammad Yousaf', 'itsyousafofficial@gmail.com', 'Male', 'karachi', 'Level 3', '1234', NULL, 'i am professional in creating websites', 'lY0kWwHJAzhqLOA7.jpg', 72, '+923093201506', 1, '0', 0, '2025-01-23 08:33:40', '2025-01-24 13:13:44'),
(30, 'test user', 'testing@gmail.com', 'Male', 'karachi', 'Level 2', '123456', NULL, 'this is description example', 'tyWTE8bbyPmeJsae.png', 60, '+92123456789', 1, '0', 0, '2025-01-23 12:50:13', '2025-01-23 13:20:18'),
(35, 'zain alitariq', 'zainalitariq245@gmail.com', 'Male', 'karachi', 'Level 3', '123456789', '30/04/2025', 'this is my profile for the dive master i am very professional', 'xI5XU6NcmIm5ClN2.jpg', 109, '+923090022222', 1, '-10', 0, '2025-02-19 09:44:18', '2025-02-20 17:43:44'),
(39, 'Testing', 'fahad@gmail.com', 'Male', 'Karachi', 'Level 3', '422f25a4dfafa', '25/02/2028', 'Hello World', 'E8rTjPdNIJXEQGoR.png', 70, '+9268984654684', 1, '0', 0, '2025-02-25 15:32:39', '2025-02-25 15:47:57'),
(43, 'Darren Hunter', 'ckseowme@gmail.com', 'Female', 'subangg', 'PADI Special Instructor', '123456789', '31/03/2025', 'testing', 'IeQXk7Rb6WAoUjUQ.jpg', 116, '12345678900', 1, '0', 0, '2025-03-27 03:14:16', '2025-03-27 03:14:18'),
(44, 'checking name', 'diving@dispostable.com', 'Male', 'Karachi', 'PADI Master Instructor', '83yf8w9', '31/03/2029', 'Hello World', 'baYzFZZyZtVwqDF0.jpg', 5, '+923970429730423', 1, '0', 0, '2025-03-28 15:34:33', '2025-03-28 15:34:35'),
(46, 'hello', 'one@gmail.com', 'Male', 'karachi', 'PADI Master Instructor', 'jeosh8927jd', '28/03/2033', 'hello', 'Z45OLlINGy5nyrWH.jpg', 118, '+620437581643781', 1, '0', 0, '2025-03-28 16:34:36', '2025-03-28 16:34:38'),
(48, 'Testing', 'test2@gmail.com', 'Male', 'Karachi', 'PADI Master Instructor', '345i6jo45i6j', '04/04/2032', 'Hello World', 'rwVwn2YDTcJbGpik.jpg', 120, '+6098374092375', 1, '0', 0, '2025-04-03 17:00:40', '2025-04-03 17:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `dive_user_images`
--

CREATE TABLE `dive_user_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext NOT NULL,
  `diver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dive_user_images`
--

INSERT INTO `dive_user_images` (`id`, `image`, `diver_id`, `created_at`, `updated_at`) VALUES
(6, '1bYVCNoxVUa7DQIy.jpg', 19, '2025-01-27 14:26:12', '2025-01-27 14:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `diving_transactions`
--

CREATE TABLE `diving_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diving_transactions`
--

INSERT INTO `diving_transactions` (`id`, `user_id`, `event_id`, `price`, `created_at`, `updated_at`) VALUES
(17, 5, 52, '10', '2025-02-20 17:43:44', '2025-02-20 17:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `no_of_persons` varchar(255) NOT NULL,
  `trip_budget` varchar(255) DEFAULT NULL,
  `joining_fees` varchar(111) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_booked` int(11) NOT NULL DEFAULT 0,
  `diver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `country`, `from_date`, `to_date`, `no_of_persons`, `trip_budget`, `joining_fees`, `location`, `type`, `description`, `status`, `is_booked`, `diver_id`, `created_at`, `updated_at`) VALUES
(34, 'dive master internee', 'Pakistan', '2025-01-28', '2025-01-24', '2', NULL, NULL, 'Karachi', 'diving', 'the diver is hoing to die', 2, 0, 28, '2025-01-24 13:15:23', '2025-01-25 10:47:36'),
(39, 'yyhh', 'Malaysia', '2025-01-30', '2025-01-31', '2', '22200', '100', 'hhhh', 'diving', 'ncjxi ovivi i 8vi 8', 1, 0, 28, '2025-01-27 13:42:31', '2025-02-06 13:47:55'),
(40, 'trip abc', 'Malaysia', '2025-02-26', '2025-03-28', '10', '500', '10', 'location abc', 'diving', 'test\n\n\n\ntest', 1, 0, 19, '2025-01-27 14:22:35', '2025-01-27 14:29:04'),
(52, 'hunza trip for 1 week', 'Malaysia', '2025-02-21', '2025-02-28', '20', '3000', '10', 'Islamabad', 'diving', 'this is an free trip for the promotion purpose', 1, 0, 35, '2025-02-19 09:53:06', '2025-02-19 09:53:06'),
(55, 'world best snorkeling trip', 'Malaysia', '2025-02-28', '2025-03-31', '10', '2300', '10', 'karachi', 'snorkeling', 'this is an promotional trip', 1, 0, 35, '2025-02-19 09:57:09', '2025-02-19 09:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
--

CREATE TABLE `event_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_comments`
--

INSERT INTO `event_comments` (`id`, `reply`, `comment`, `event_id`, `user_id`, `created_at`, `updated_at`) VALUES
(90, NULL, 'hello how are you', 52, 109, '2025-02-19 10:28:29', '2025-02-19 10:28:29'),
(91, NULL, 'hello', 52, 109, '2025-02-19 10:28:42', '2025-02-19 10:28:42'),
(92, NULL, 'hello', 52, 109, '2025-02-19 10:28:43', '2025-02-19 10:28:43'),
(94, NULL, 'how\'s the trip are you excited?', 52, 109, '2025-02-19 10:28:59', '2025-02-19 10:28:59'),
(95, NULL, 'how\'s the trip are you excited?', 52, 109, '2025-02-19 10:29:00', '2025-02-19 10:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`id`, `image`, `event_id`, `created_at`, `updated_at`) VALUES
(92, '2A9YWXZi7GQFQp3f.jpg', 39, '2025-01-27 13:42:31', '2025-01-27 13:42:31'),
(93, 'sFNldl3RJujdJ1Hh.jpg', 40, '2025-01-27 14:22:35', '2025-01-27 14:22:35'),
(105, 'ZvdWU5C3cFXo344T.jpg', 52, '2025-02-19 09:53:06', '2025-02-19 09:53:06'),
(106, 'EqonqmR1NIHoMjDZ.jpg', 52, '2025-02-19 09:53:06', '2025-02-19 09:53:06'),
(107, 'vVHFslOE7hrqcink.jpg', 52, '2025-02-19 09:53:06', '2025-02-19 09:53:06'),
(112, '6t2MfCLdy4WuCdbS.jpg', 55, '2025-02-19 09:57:09', '2025-02-19 09:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `event_joins`
--

CREATE TABLE `event_joins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(244) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_joins`
--

INSERT INTO `event_joins` (`id`, `event_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(77, 52, 5, 'User', '2025-02-20 17:43:44', '2025-02-20 17:43:44');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Hello World', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-05-08 06:29:50', '2024-05-08 06:29:50'),
(3, 'Hello World 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-05-08 06:33:01', '2024-05-08 06:33:01'),
(4, 'Hello World', 'This is for testing FAQ?', '2024-05-08 10:36:45', '2024-05-08 10:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `fianaces`
--

CREATE TABLE `fianaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `stripe_key` longtext NOT NULL,
  `stripe_secret` longtext NOT NULL,
  `enable_checkout` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fianaces`
--

INSERT INTO `fianaces` (`id`, `value`, `type`, `stripe_key`, `stripe_secret`, `enable_checkout`, `created_at`, `updated_at`) VALUES
(1, '20', 'amount', 'pk_test_51JJjBgFtmJdKXYNGHSCLt6MWF0pd8Z7XMWEq0h57ZmQSuQrS4857mCuWOf49NJ8ovzwIxLXYeKXN0M7xlr1HuKgg00NthCbYa7', 'sk_test_51JJjBgFtmJdKXYNGmgp6tMQYH4AV0DQJDL3FAfCvbKnU03ZIVFESjqbgHHAPkFm7zj1IWKh7hHecdZtPsfyhNIU500VTOCJ0id', 0, '2024-07-30 11:25:04', '2025-02-20 17:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'PADI DIVEMASTER (DM)', '2025-03-26 15:21:58', '2025-03-26 15:41:59'),
(5, 'PADI Open Water Scuba Instructor (OWSI)', '2025-03-26 15:37:19', '2025-03-26 15:37:19'),
(6, 'PADI Special Instructor', '2025-03-26 15:39:26', '2025-03-26 15:44:33'),
(7, 'PADI Master Scuba Diver Trainer (MSDT)', '2025-03-26 15:40:06', '2025-03-26 15:43:54'),
(8, 'PADI IDC Staff Instructor', '2025-03-26 15:40:35', '2025-03-26 15:40:35'),
(9, 'PADI Master Instructor', '2025-03-26 15:40:52', '2025-03-26 15:40:52'),
(10, 'PADI Course Director (CD)', '2025-03-26 15:41:16', '2025-03-26 15:42:33');

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
(35, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(36, '2019_08_19_000000_create_failed_jobs_table', 1),
(37, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(38, '2024_03_04_132449_create_users_table', 1),
(39, '2024_03_06_162407_create_admins_table', 1),
(40, '2024_03_07_120201_create_packages_table', 1),
(41, '2024_03_07_140759_create_dive_users_table', 1),
(42, '2024_03_07_171948_create_transactions_table', 1),
(43, '2024_03_08_111922_create_events_table', 1),
(44, '2024_03_08_112039_create_event_images_table', 1),
(45, '2024_03_11_115606_create_event_joins_table', 1),
(46, '2024_03_11_115631_create_event_comments_table', 1),
(47, '2024_03_12_171447_create_dive_user_images_table', 1),
(48, '2024_03_12_181747_create_diver_followers_table', 1),
(49, '2024_03_18_143146_create_diver_feedbacks_table', 1),
(50, '2024_03_18_145047_create_user_feedbacks_table', 1),
(51, '2024_03_28_195747_create_saved_trips_table', 1),
(58, '2024_04_01_174142_create_coupons_table', 2),
(60, '2024_04_19_153021_create_diving_transactions_table', 3),
(61, '2024_04_24_175523_create_reports_table', 4),
(62, '2024_05_07_173225_create_faqs_table', 5),
(63, '2024_05_08_113505_create_contact_us_table', 6),
(64, '2024_05_08_120915_create_c_m_s_table', 7),
(65, '2024_06_01_161601_create_levels_table', 8),
(66, '2024_07_30_162146_create_fianaces_table', 9),
(67, '2025_02_20_130436_create_banner_management_table', 10),
(68, '2025_02_20_150757_create_splash_management_table', 11),
(69, '2025_02_20_153152_create_benefit_management_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `category`, `type`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dive master Plan A', 'Diver', 'Monthly', '1500', 1, '2024-03-28 21:39:32', '2024-04-18 10:42:16'),
(2, 'Free Plan', 'Diver', 'Monthly', '0', 1, '2025-01-23 09:05:34', '2025-01-27 14:16:38'),
(3, 'Bronze Plan', 'Diver', 'Monthly', '10', 1, '2025-01-23 09:10:48', '2025-01-23 09:10:48');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reported_by` bigint(20) UNSIGNED NOT NULL,
  `reported_to` bigint(20) UNSIGNED NOT NULL,
  `subject` longtext NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `reported_by`, `reported_to`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(4, 5, 5, 'gis djdndjxbnx', 'bsjdndbhxhdnsnd', '2024-04-30 14:30:57', '2024-04-30 14:30:57'),
(5, 5, 5, 'vdudbjxbxjxbdb', 'bsjdndbxjsjs', '2024-04-30 14:37:51', '2024-04-30 14:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `saved_trips`
--

CREATE TABLE `saved_trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_trips`
--

INSERT INTO `saved_trips` (`id`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(55, 5, 40, '2025-02-03 13:36:26', '2025-02-03 13:36:26'),
(56, 109, 52, '2025-02-19 10:04:03', '2025-02-19 10:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `splash_management`
--

CREATE TABLE `splash_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` longtext NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `splash_management`
--

INSERT INTO `splash_management` (`id`, `heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hello World Update', 'Lorem Ipsum', 'Ww5utnE2JOeX5YGs.jpg', '2025-02-20 10:14:36', '2025-02-20 10:26:52'),
(2, 'Welcome to Babedive', 'Welcome user to Babedive.com', 'n3rX205XGQH4laD9.png', '2025-02-25 18:06:46', '2025-02-25 18:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `role`, `package_name`, `type`, `price`, `start_date`, `end_date`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'dive', 'Prime Package', 'Monthly', '1500', '2024-03-30', '1970-01-01', 0, 5, '2024-03-30 20:31:18', '2024-04-13 14:56:46'),
(10, 'dive', 'Prime Package', 'Monthly', '1500', '2024-04-01', '1970-01-01', 0, 7, '2024-04-01 11:16:43', '2024-04-13 14:56:46'),
(14, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2024-05-07', '2024-06-06', 0, 12, '2024-05-07 10:25:31', '2024-07-17 13:41:30'),
(16, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2024-06-03', '2024-07-03', 0, 14, '2024-06-03 15:49:45', '2024-07-17 13:41:30'),
(17, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2024-06-10', '2024-07-10', 0, 15, '2024-06-10 10:33:21', '2024-07-17 13:41:30'),
(18, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2024-07-29', '2024-08-28', 0, 16, '2024-07-29 16:15:26', '2024-10-17 11:26:07'),
(19, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2024-07-29', '2024-08-28', 0, 17, '2024-07-29 17:55:47', '2024-10-17 11:26:07'),
(20, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2024-07-29', '2024-08-28', 0, 18, '2024-07-29 18:16:06', '2024-10-17 11:26:07'),
(21, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2024-07-29', '2024-08-28', 0, 18, '2024-07-29 18:16:50', '2024-10-17 11:26:07'),
(22, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2024-07-29', '2024-08-28', 0, 18, '2024-07-29 18:28:22', '2024-10-17 11:26:07'),
(23, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2024-08-17', '2024-09-16', 0, 13, '2024-08-17 12:45:46', '2024-10-17 11:26:07'),
(25, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2024-09-13', '2024-10-13', 0, 39, '2024-09-13 12:31:38', '2024-10-17 11:26:07'),
(26, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2024-09-13', '2024-10-13', 0, 39, '2024-09-13 12:43:08', '2024-10-17 11:26:07'),
(27, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2025-01-20', '2025-02-19', 1, 53, '2025-01-20 01:02:40', '2025-01-20 01:02:40'),
(28, 'dive', 'Free Plan', 'Monthly', '2', '2025-01-23', '2025-02-22', 1, 60, '2025-01-23 13:20:18', '2025-01-23 13:20:18'),
(30, 'dive', 'Bronze Plan', 'Monthly', '10', '2025-01-24', '2025-02-23', 1, 72, '2025-01-24 13:13:44', '2025-01-24 13:13:44'),
(31, 'dive', 'Bronze Plan', 'Monthly', '10', '2025-01-27', '2025-02-26', 1, 39, '2025-01-27 14:18:19', '2025-01-27 14:18:19'),
(33, 'dive', 'Free Plan', 'Monthly', '0', '2025-02-19', '2025-03-21', 1, 109, '2025-02-19 09:44:27', '2025-02-19 09:44:27'),
(35, 'dive', 'Free Plan', 'Monthly', '0', '2025-02-19', '2025-03-21', 1, 68, '2025-02-19 12:24:53', '2025-02-19 12:24:53'),
(36, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2025-02-25', '2025-03-27', 1, 70, '2025-02-25 15:25:03', '2025-02-25 15:25:03'),
(37, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2025-02-25', '2025-03-27', 1, 70, '2025-02-25 15:32:41', '2025-02-25 15:32:41'),
(38, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2025-02-25', '2025-03-27', 1, 70, '2025-02-25 15:47:57', '2025-02-25 15:47:57'),
(39, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2025-02-25', '2025-03-27', 1, 5, '2025-02-25 18:20:14', '2025-02-25 18:20:14'),
(42, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2025-03-27', '2025-04-26', 1, 116, '2025-03-27 03:14:18', '2025-03-27 03:14:18'),
(43, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2025-03-28', '2025-04-27', 1, 5, '2025-03-28 15:34:35', '2025-03-28 15:34:35'),
(45, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2025-03-28', '2025-04-27', 1, 118, '2025-03-28 16:34:38', '2025-03-28 16:34:38'),
(47, 'dive', 'Dive master Plan A', 'Monthly', '1500', '2025-04-03', '2025-05-03', 1, 120, '2025-04-03 17:00:42', '2025-04-03 17:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile` longtext DEFAULT NULL,
  `name` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `whatsapp` longtext DEFAULT NULL,
  `city` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `registration` varchar(255) DEFAULT NULL,
  `dive` tinyint(1) NOT NULL DEFAULT 0,
  `merchant` tinyint(1) NOT NULL DEFAULT 0,
  `massage` tinyint(1) NOT NULL DEFAULT 0,
  `gender` varchar(255) DEFAULT NULL,
  `OTP` bigint(20) UNSIGNED NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `following_count` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_private` bigint(20) NOT NULL DEFAULT 0,
  `blocked` int(11) NOT NULL DEFAULT 0,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile`, `name`, `email`, `password`, `whatsapp`, `city`, `description`, `registration`, `dive`, `merchant`, `massage`, `gender`, `OTP`, `activated`, `following_count`, `is_private`, `blocked`, `is_approved`, `created_at`, `updated_at`) VALUES
(5, 'onZLPgCBG2j3TPk9.jpg', 'checking name', 'diving@dispostable.com', '$2y$12$0gCQ85Ui/sKOyazgf8EubOz1ilzvGAs8frwnggtTGNMnODb6AwmBK', '123456789', 'Karachi', 'This is a description this is example description.', 'email', 1, 0, 0, NULL, 725357, 1, 2, 1, 0, 0, '2024-03-29 21:25:50', '2025-03-28 15:34:33'),
(6, 'NlHnCf33hhBrrpno.jpg', 'checking name', 'hammadhassan245@gmail.com', '$2y$12$0gCQ85Ui/sKOyazgf8EubOz1ilzvGAs8frwnggtTGNMnODb6AwmBK', '123456789', 'Karachi', NULL, 'email', 0, 0, 0, NULL, 495474, 1, 1, 0, 0, 0, '2024-03-29 21:48:12', '2025-02-05 13:52:07'),
(7, 'DcLFpuXspUl4xFN5.jpg', 'checking name', 'titov57973@acentni.com', '$2y$12$M7zYQIuoCRdAIe/eRP8kzeinT94Jq/Jzej.nf6oMTpoTKIzXV.PBS', '123456789', 'Karachi', NULL, 'email', 1, 0, 0, NULL, 798345, 1, 0, 0, 0, 0, '2024-04-01 11:14:58', '2025-02-04 17:43:52'),
(12, 'uP2RrwYpucmvMxpS.png', 'testing', 'vajayir124@lewenbo.com', '$2y$12$0gCQ85Ui/sKOyazgf8EubOz1ilzvGAs8frwnggtTGNMnODb6AwmBK', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 781608, 1, 0, 0, 0, 0, '2024-05-07 10:08:55', '2024-05-08 07:44:56'),
(13, 'biFa226uNqdDxdgd.jpg', 'Shaheer', 'weblinxwork@gmail.com', '$2y$12$BqyLnZ529u1aq7O2LwXb2OcqeHUDycMmlISC5eqECxvze9WOlQSga', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 396341, 1, 0, 0, 0, 0, '2024-06-03 14:57:05', '2025-02-05 13:55:55'),
(14, 'E7TUUx6wHL9jyywY.png', 'Shaheer', 'shaheer@dispostable.com', '$2y$12$fdf9INkvutgMDs2bY5S9PebIdmvsiBqQErJ0Zm2806.mVrEAo/9ca', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 173068, 1, 0, 0, 0, 0, '2024-06-03 15:02:05', '2024-06-03 16:17:44'),
(15, 'pjtip2lcNUJs8J6d.jpg', 'fahad', 'haha@gmail.com', '$2y$12$u8WJrJiGJIgxX8gvoFI9SuVm48Xg655HIapCM8Op7Mc3CPLW8lxlq', '+60326465465498', 'karachi', 'lorem ipsum', 'email', 1, 0, 0, NULL, 256854, 1, 0, 0, 0, 0, '2024-06-10 10:31:09', '2024-12-26 17:26:17'),
(16, 'YwEoHYwlapXKa6nJ.png', 'Burger Bacha', 'burger@dispostable.com', '$2y$12$2S1WW2uXrYBAVhtRWBC7.O2LMLsP.IVLp6XcNqCbKC1YIe/Kbn5PG', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 938738, 1, 0, 0, 0, 0, '2024-07-29 16:11:25', '2024-07-29 16:14:30'),
(17, 'DIJ0lR2stzrvSSWI.png', 'Shaheer', 'sirshaheer@dispostable.com', '$2y$12$6HjgQYWfEEtj4mFUD9lCY.B.Ki8DF4p7rsBaVRPuvIP9TFaf3v/GK', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 653966, 1, 0, 0, 0, 0, '2024-07-29 17:00:22', '2024-07-29 17:02:45'),
(18, 'PbRojPcSFcMZbNw4.png', 'instagram', 'insta@dispostable.com', '$2y$12$mvueySCYCu0JaQUMPL7JS.57IbBLS2tuzqCLcAOuMgg1WBtIV44J2', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 771103, 1, 0, 0, 0, 0, '2024-07-29 18:03:55', '2024-07-29 18:05:15'),
(19, '02LaLsA4rBJLbcTO.jpg', 'Arsal', 'arsalweb549@gmail.com', '$2y$12$BgbF9HesvMmC/F4Jp3N6DOmpCVaKHtN5DRNZ9OesRzRak5zikChf2', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 648659, 1, 0, 0, 0, 0, '2024-08-17 13:21:26', '2024-08-17 23:38:00'),
(20, 'ldnyw2eOGvuOUnSX.jpg', 'Waseem', 'Truewaseem42@gmail.com', '$2y$12$VlGbjDk8wyMo37d2vpOcNOnfAhde2kseoVKRMccl68C7gJZmvlVWW', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 580102, 1, 0, 0, 0, 0, '2024-08-17 13:21:49', '2024-08-17 13:22:37'),
(21, 'qIqKPF0RVqkxDeU4.jpg', 'Testing', 'weberz.innovation@gmail.com', '$2y$12$nLVs.ssxMRaGwQYyTmOiEe15p4Xm2i8sWSMfWz5ur9dBAueJvWBKK', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 274557, 0, 0, 0, 0, 0, '2024-08-17 13:30:07', '2024-08-17 13:30:07'),
(22, 'BnC6lLjxrdFTZ1Qa.jpg', 'ifham', 'dgl.ifham@gmail.com', '$2y$12$DbywwtSmQJZaTI/pVC7HYuI4D9V1JZEHh4X0D3nIdmp5A8nvR1iI2', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 939282, 1, 0, 0, 0, 0, '2024-08-17 13:30:49', '2024-08-17 13:32:23'),
(23, 'TUOnKnJ3BAhylKdi.jpg', 'Muhammad Umar', 'mu6340763@gmail.com', '$2y$12$lK2zAOFA0qXuu0nJwvLRnuVtD37bVdF2f4FBsX6HNMshZw9JRxzSu', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 567061, 1, 0, 0, 0, 0, '2024-08-17 13:34:32', '2024-08-17 13:35:05'),
(24, 'B20wskCoPnWM6r3h.jpg', 'Yousaf', 'yousuf4249@gmail.com', '$2y$12$UGo1fZekRw2.I4SO0imuju6A157PpoFLh1u94o3wcUrmFfDxOtOLK', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 873671, 1, 0, 0, 0, 0, '2024-08-17 18:11:33', '2024-08-17 18:12:17'),
(25, '2e0xH0cWC2VelSBP.jpg', 'hammad', 'mfahadfaizii@gmail.com', '$2y$12$5aInm3XLn/NQFog9Z0AGTOiKgSmzn8C11pMdh3lNXGRZTdzRlz4my', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 817400, 0, 0, 0, 0, 0, '2024-08-17 18:36:50', '2024-08-17 18:36:50'),
(26, '2ex4T2b6ghfdA3eo.png', 'Qurain', 'muhammadqurain123@gmail.com', '$2y$12$VOZ3fPvx514g9a.XUQn9SeUCJg7EygUxerMXweEU0nyar3A1blvK.', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 348011, 1, 0, 0, 0, 0, '2024-08-17 19:11:17', '2024-08-17 19:11:56'),
(27, 'oTFq77JL1tnTOXub.jpg', 'Yousaf', 'yjana2662@gmail.com', '$2y$12$E0R9.jYFIIGiIbJSuWFkJuQq30NlZ4HBGIf.5UndCBKL8H7tAlrhy', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 872273, 1, 0, 0, 0, 0, '2024-08-18 13:34:38', '2024-08-18 13:35:04'),
(28, 'Et901bQP1l9LmEjN.jpg', 'Humraaz', 'truehumraaz291@gmail.com', '$2y$12$pwPUWP/h3x9FwUOnFQlLlOaaZoxnUEK7XHxqJUUVwGE7lTEf5905i', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 534921, 1, 0, 0, 0, 0, '2024-08-19 09:40:17', '2024-08-19 09:43:18'),
(30, 'FbGSurjAfdJYhuxW.jpg', 'raj', 'rohaibchouhan@gmail.com', '$2y$12$/QNCMMyYv06GVA5jm0zkuOcEJg3C35.7PXK.BhGnSuWxmmgV78tQW', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 311275, 1, 0, 0, 0, 0, '2024-08-19 18:11:48', '2024-08-19 18:12:39'),
(32, 'aVtDuJbbPK60yoww.png', 'Weblinx', 'weblinxwaseem@gmail.com', '$2y$12$NjbT1uViTEZ3EA6YQUpe/eEwwz2YcO0xv2A2Doq91oAmE734x2ONa', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 585620, 1, 0, 0, 0, 0, '2024-08-20 15:41:25', '2024-08-20 15:42:22'),
(33, 'wDFSZhXPCBGvhrpX.webp', 'Abeer', 'abeermuhammad586@gmail.com586', '$2y$12$ApKTDZEpD5vcMHLRAKb41eHO6e/PozSt6juYfnAHrGM9xJ5QVjqnG', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 994362, 0, 0, 0, 0, 0, '2024-08-20 16:18:43', '2024-08-20 16:18:43'),
(35, 'aIq0xmZMPJOdB26U.png', 'johndoe', 'idrcnx@gmail.com', '$2y$12$2onD2Ko5B4UWJN125tdWZ.1pLqbrKZq.awc8kRXCHxRfWVbUF5qB2', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 216577, 1, 0, 0, 0, 0, '2024-08-22 04:03:24', '2024-08-22 04:03:54'),
(37, 'DZM548DaNEmsniWi.png', 'Aamir Anwar', 'aamiranwar33@gmail.com', '$2y$12$Vrhu8zcCnFbmqkr9gXarOu0i4klH7NT5.J9ayGXhhyfOCWgcT2NK6', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 698892, 1, 0, 0, 0, 0, '2024-09-09 13:20:21', '2024-09-09 13:20:21'),
(39, 'uqEOCQQP03JYnOvZ.jpg', 'Testing', 'testing@dispostable.com', '$2y$12$CleVbxst/uHEF/i9JZg7rOZvp.P69wR1d0Bj0PkbQBAkog0oDtqpm', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 883055, 1, 0, 0, 0, 0, '2024-09-13 12:13:37', '2024-09-13 12:16:04'),
(40, '2Wmfo1gvJ85UnbI9.png', 'Tricia Burke', 'triciaburke.52315@gmail.com', '$2y$12$1BTLUy/1eXjwl9SziwL6VOPstfS6GFSxYoO2bBq6rFIZbGpSE.PoW', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 309970, 1, 0, 0, 0, 0, '2024-09-13 15:25:27', '2024-09-13 15:25:27'),
(41, 's2DluiLANvsE4lbf.png', 'Nuage Laboratoire', 'esext7aes453hblyug3p4h4acu-00@cloudtestlabaccounts.com', '$2y$12$dj6PVkCTRf5wK8B1RublQObaO9QxhcQwYf9jo.Q8LLG6E1geHirqK', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 438355, 1, 0, 0, 0, 0, '2024-09-13 15:54:22', '2024-09-13 15:54:22'),
(42, 'X4isCUotGBKGLSFV.png', 'Playstore Cnx2022', 'pcnx439@gmail.com', '$2y$12$KSNhHxHLKLw.k9w.bkLEzeg/RiuvdxzJTjAvsjAtmVbzpCRu119rS', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 605665, 1, 0, 0, 0, 0, '2024-09-14 17:05:56', '2024-09-14 17:05:56'),
(43, '4YF0vUI5tUZcO7C7.png', 'Shizuko Hoover', 'shizukohoover.86946@gmail.com', '$2y$12$QBeGEfiV7hpSGByWLo.41ec2qyAVO3BKYbSoS9/CxFKbk.vMI.bAy', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 681528, 1, 0, 0, 0, 0, '2024-09-15 11:23:14', '2024-09-15 11:23:14'),
(44, 'aZZ7i5tv8qb3aUQ9.png', 'Jaime Clegane', 'jaimeclegane001@gmail.com', '$2y$12$hM1R4a046m7nC8Ka.6PuWuy1ekae0RUuMj8LuT6HiiM2yAdjf0Pai', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 982442, 1, 0, 0, 0, 0, '2024-09-17 03:55:09', '2024-09-17 03:55:09'),
(45, 'cVPnaE74wHetUKp0.png', 'Play Store', 'concentrix20245@gmail.com', '$2y$12$heaHENvNBc8nMucyWY2z9uewI8iknMw/re7KKAXArXdy5LYWSO0Su', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 475459, 1, 0, 0, 0, 0, '2024-09-17 13:25:38', '2024-09-17 13:25:38'),
(46, '5WZFCBFSU8LHe9fR.png', 'Loyal Shaheer', 'loyalshaheer@gmail.com', '$2y$12$1/K0TeU.vlG9nXePBeoTA.A9.mGVu1SdN69CxM7xsnmZvli9s.A.u', NULL, NULL, NULL, 'google', 1, 0, 0, NULL, 912163, 1, 0, 0, 0, 0, '2024-09-19 11:32:10', '2024-09-19 11:32:50'),
(47, 'f09En3k6MFptSXPF.jpg', 'Testing', 'testing@yopmail.com', '$2y$12$5kPOZXSznIlMONseHk5tF.NDzw1e4tpdB.e5iaMZ5mgRwR5FO0OPy', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 75052, 1, 0, 0, 0, 0, '2024-12-24 16:27:08', '2024-12-24 16:29:24'),
(48, '8tqaglKGbyftllnB.jpg', 'Tester', 'test@yopmail.com', '$2y$12$/uLbwNYLs7thcIhibkTvlOhv7qC6/NEtfG/yTZ/2nKyH6BXuI5v8W', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 682636, 1, 0, 0, 0, 0, '2024-12-26 11:49:19', '2024-12-26 11:51:46'),
(49, 'master.jpg', 'Heather', '001628.8b2b73b705554f7c943f0fdd8367d31d.1802', '$2y$12$vdCczhYOfo58vaK8YlguJ.fmGLW/fFN2hS7QQ68ZRP3/MRmF7OWpG', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 189506, 1, 0, 1, 0, 0, '2024-12-31 18:02:30', '2024-12-31 18:03:30'),
(50, 'master.jpg', 'Betsy', '000922.bb03aa0ec84941459b07a9c44bcffadf.1142', '$2y$12$wI9ptzirPsKqmlBmWw7Bku8.yu.YngnoIT9togH5HWiWk7MzwApRu', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 315800, 1, 2, 0, 0, 0, '2025-01-04 11:42:42', '2025-01-04 11:43:35'),
(51, 'master.jpg', 'Apple', '001962.8c66c56cbe3f41b99a0d582fed00135b.0505', '$2y$12$49MhTyvnCzZj81bDh.X/L.yuK9WrRdJOydTp17o97bXDFxu.h/93G', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 85904, 1, 0, 0, 0, 0, '2025-01-07 05:05:56', '2025-01-07 05:05:56'),
(52, 'master.jpg', 'John', '000000.68cf63615b32480089ac1177ff45c5d5.1145', '$2y$12$Cl1x7yh3MeqyPo9NOC0qQuKF8yyXbbz.nDkUk.ktxMEzojMGuJD7u', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 101128, 1, 0, 0, 0, 0, '2025-01-08 11:45:21', '2025-01-08 11:45:21'),
(53, 'XlD4WOv6h2GBeDAo.jpg', 'New User', 'newuser@yopmail.com', '$2y$12$tYw.kwfNub/HtssfAtS9/ea6auAP8XjsdOuJfQzXnNCW3bJGSnFJS', '+354648646', 'Karachi', 'Hello world', 'email', 1, 0, 0, NULL, 884453, 1, 0, 0, 0, 0, '2025-01-13 11:57:14', '2025-01-13 11:59:33'),
(54, 'Shcy9y1iSqQcGFvY.jpg', 'One User', 'oneuser@yopmail.com', '$2y$12$U5/FFvezI50/VcDIl8z07usuQR1JXiy1f6hsdZ.TPvgSQKTTPxKp.', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 625979, 0, 0, 0, 0, 0, '2025-01-13 13:32:19', '2025-01-13 13:32:19'),
(55, 'yuibqM5njZv6q9UO.jpg', 'Two User', 'twouser@yopmail.com', '$2y$12$w0ZPtWyuIS7i5zJ8kKAU4ejq3.8HQjPk8vpIUSYujZLzbFF4g9Fna', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 369413, 1, 0, 0, 0, 0, '2025-01-13 13:34:04', '2025-01-13 13:38:42'),
(56, 'master.jpg', 'Rosie', '001874.3972dce314074723a4c9f60abaf9609d.1459', '$2y$12$uEWE8bzeMfNXqp/NOh4MouX6mAqAUm6Z70yZsXm9IMRFV/JLk0lDu', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 431780, 1, 0, 0, 0, 0, '2025-01-13 14:59:59', '2025-01-13 14:59:59'),
(57, 'master.jpg', 'Apple', '001461.8482cc8d7f7d4db3a62a487db85a597f.0909', '$2y$12$BouoDL2rN2chewUpOvdQw.8kcGEKjIkR2mEA/1a2QWgPDSTKY5kTC', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 938345, 1, 0, 0, 0, 0, '2025-01-14 09:09:34', '2025-01-14 09:09:34'),
(58, 'master.jpg', 'Robert', '001500.b40a1ccf6d6444b8899a425f35151748.1238', '$2y$12$6etNVcPcISjWpiul5u56DuGlVkLaHeMxd4gIVqLxkkjR/Nh8haD.y', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 994662, 1, 0, 0, 0, 0, '2025-01-14 12:38:04', '2025-01-14 12:38:04'),
(59, 'master.jpg', 'iOS User', '001070.5e41a8abf4aa41538af51dbabb4d786d.0036', '$2y$12$mFmamK3w0OkCmAbNXnmM0usx8fbpTWS3003PplK524pPyzS2n.jWW', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 614178, 1, 0, 0, 0, 0, '2025-01-15 00:43:16', '2025-01-15 00:43:16'),
(60, 'Td7vyzyoDMN0K2Dw.jpg', 'test user', 'testing@gmail.com', '$2y$12$fajrIsD4C3IjlcOK2KukWe3STGGcv2.6uNmADfr89Uec0KktQ3LcS', '+60123456789', 'karachi', 'this is example 2', 'email', 1, 0, 0, NULL, 17344, 1, 0, 0, 0, 0, '2025-01-18 12:54:50', '2025-01-23 15:36:05'),
(61, 'pZPN6uUA9m4QCy1z.jpg', 'Testing User', 'testinguser@yopmail.com', '$2y$12$cJVZHYOczdn1VP4iRPybBObZZ2bws4rcvLKyRMaWEVvhBc3W5mzQK', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 657243, 1, 0, 0, 0, 0, '2025-01-18 13:36:07', '2025-01-18 13:40:01'),
(62, 'master.jpg', 'Apple', '000045.c9f8761ed64a4e519cc2eab061f766c4.0100', '$2y$12$4FrS.5SSLMyDgAvlnafQrOcK9Gf14Z1B5U7BPFusYM92Fostf0GdO', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 210132, 1, 0, 0, 0, 0, '2025-01-20 01:00:42', '2025-01-20 01:00:42'),
(65, 'PywrseCEZwSPM042.jpg', 'john', 'john@gmail.com', '$2y$12$JrwwRFcAmQE1zWbR5Bd79Ot1lphtyysunBFEjlpwa2UHXMOh7Rr22', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 227538, 0, 0, 0, 0, 0, '2025-01-20 11:34:56', '2025-01-20 11:34:56'),
(67, 'SmdwzauHKrXPt7vX.jpg', 'New Name', 'newemail@yopmail.com', '$2y$12$ttJT7/MROoAmHOD9eaXJx./76RY3P7OJvB8pTVOikHTEZ4xlA1Htq', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 913488, 0, 0, 0, 0, 0, '2025-01-22 14:27:37', '2025-01-22 14:27:37'),
(68, 'BgTzXBgaeHVw20Xx.jpg', 'Player 500', 'player500@yopmail.com', '$2y$12$KTQuCtHR28oMKVD.N8YuAuAtpDoG0jjvg.YOnyITzmz.nYuRPYhZ2', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 837593, 1, 0, 0, 0, 0, '2025-01-22 14:33:11', '2025-01-22 14:35:45'),
(70, 'u1Kps2l0YRGXQDsH.png', 'Testing', 'fahad@gmail.com', '$2y$12$VUS3NvdFiJmQ28q8F5n3xem6JUYWde3Gcr3I0jiiJlW3hgn1feOru', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 100965, 1, 0, 0, 0, 0, '2025-01-22 17:39:09', '2025-02-25 15:24:06'),
(71, 'tifOigmnqBOi3dJe.jpg', 'Shahzain', 'Shahzain@gmail.com', '$2y$12$xrrq1tw9JYKlMDhggB56HuUvqNwENUNZzPGl983vNwfW7/jf8F4Cq', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 283518, 0, 0, 0, 0, 0, '2025-01-23 08:29:38', '2025-01-23 08:29:38'),
(72, 'GnFc9zajrOnEk667.jpg', 'Muhammad Yousaf', 'itsyousafofficial@gmail.com', '$2y$12$t/AbrbRQl5fTr8cxBZJ3oeoC/rV2SgCuDYCa913zSPP3eB4VEdsFi', '+60Whatsapp number', 'karachi', 'we are an agency of web development', 'google', 1, 0, 0, NULL, 920208, 1, 0, 1, 0, 0, '2025-01-23 08:30:37', '2025-02-04 15:57:32'),
(83, '0mfBFKmZDERlUO6v.png', 'Shaheer Altaf', 'fivercvmaker@gmail.com', '$2y$12$BjT6A1JZ2hxx7EtqtmKBgex10VGzkyuTbq2dFgIMeS62WLPrdtj7i', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 166149, 1, 0, 0, 0, 0, '2025-01-23 12:00:12', '2025-01-23 12:00:12'),
(94, 'master.jpg', 'Nancy', '001428.d800ddd5f25c4b8185065d5a08b1a65a.1141', '$2y$12$KNQqA8zRzroxISg5aP2QaefOS4UAcsLLQtc/6CupUCIgcINFc0rzq', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 178262, 1, 0, 0, 0, 0, '2025-01-25 11:41:53', '2025-01-25 11:41:53'),
(96, NULL, 'Testing', 'testing123@yopmail.com', '$2y$12$aBtXNrogeA7k7vosKyAPMemSAMN.LHI/LF7FNgtl8qzliX5CH4pH6', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 487033, 0, 0, 0, 0, 0, '2025-01-27 12:46:36', '2025-01-27 12:46:36'),
(104, NULL, 'johnny', 'johnny1@gmail.com', '$2y$12$dDUgSFg.yIGwlCols5V00O290VSdU91S0XfnajYjzG9GAe/X3RyGq', NULL, NULL, NULL, 'email', 0, 0, 0, NULL, 97234, 0, 0, 0, 0, 0, '2025-02-18 14:29:46', '2025-02-18 14:29:46'),
(105, 'nA4hTExvJ5ZJHBTs.png', 'veBuddy Solutions For You', 'darren.vebuddy@gmail.com', '$2y$12$ghHA.NNa6RQ3isXMMjV0q.LzvrDpk04Q6bsuDQQLfFNPNCh.t2x3C', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 480060, 1, 0, 0, 0, 0, '2025-02-18 14:30:34', '2025-02-18 14:30:34'),
(109, 'SDGkTlV2wdRwO7Oz.jpg', 'zain alitariq', 'zainalitariq245@gmail.com', '$2y$12$8eMGDmvqs.V8Up5EBccLhO6WuTkwR3Q6.92d3Wo.Jc1MAdhjkOXre', '+603093201506', 'karachi', NULL, 'google', 1, 0, 0, NULL, 764920, 1, 2, 0, 0, 0, '2025-02-19 09:39:07', '2025-02-19 10:28:20'),
(110, 'GWOeoB8G6kDI8Gxx.png', 'Morris Barr', 'morrisbarr22@gmail.com', '$2y$12$CCbYRFwIkuyGNu5COeaPFu8bLAwmqVXlGw.gqSdu6c25oJf.v3xVa', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 89598, 1, 0, 0, 0, 0, '2025-03-01 21:29:23', '2025-03-01 21:29:23'),
(111, 'master.jpg', 'Lashawn', '001353.98811c3c81d94534826d5999d2d16e41.0135', '$2y$12$K5BObLAM31WcXcg1eHgIle/EsPfQqn8IMTA6FK.Kea8iFgVD6M7GG', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 342467, 1, 0, 0, 0, 0, '2025-03-03 01:35:57', '2025-03-03 01:35:57'),
(112, 'master.jpg', 'Charles', '001761.727acbfcbb814f1fb3ca7426fdafda4a.0931', '$2y$12$0AOQWAbb50Esl7ZqaeA0AeFEmPc2W8XKELusAO91D0JpYbHXr/Bn.', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 58357, 1, 0, 1, 0, 0, '2025-03-05 09:31:49', '2025-03-05 09:32:09'),
(113, 'd0VUqPGCuk8jfiNH.jpg', 'Amos 阿豪仙本那', 'tsenamos52315@gmail.com', '$2y$12$Dq1WisEis8ClD96DoG7BBeNuODhzn38ubl8b7xopNFQcAz1QIV/zC', '+60199013046', 'Tawau', NULL, 'google', 0, 0, 0, NULL, 49825, 1, 0, 0, 0, 0, '2025-03-26 16:02:52', '2025-03-26 16:05:08'),
(116, '7U1vr1PnDC3NWC33.jpg', 'Darren Hunter', 'ckseowme@gmail.com', '$2y$12$.m8SGFGJH3wFwpD67onCWu9yAlTa6fLcZ2kHpu5tVKEJ0xfg83cYO', NULL, NULL, NULL, 'google', 1, 0, 0, NULL, 994524, 1, 0, 0, 0, 0, '2025-03-27 03:13:35', '2025-03-27 03:14:16'),
(118, 'Az7RytgfhF2QNJ20.jpg', 'hello', 'one@gmail.com', '$2y$12$My1ixGZjR09uG1rhCIfvsO.C/uebIaK0bi.8iVzNuEWA62yy0wvc2', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 115952, 1, 0, 0, 0, 0, '2025-03-28 16:32:55', '2025-03-28 16:34:36'),
(120, 'mkwIsf54ikTJgmYj.jpg', 'Testing', 'test2@gmail.com', '$2y$12$86Ksn9OxNeJDgJUmREi.5uuiqbRE9AHrvzJAFGjyTD8fsKvFupRHO', NULL, NULL, NULL, 'email', 1, 0, 0, NULL, 118232, 1, 0, 0, 0, 0, '2025-04-03 16:59:33', '2025-04-03 17:00:40'),
(121, 'master.jpg', 'Jeanette', '001159.f013267c4dc64ed8a39b87d33ea9038f.0222', '$2y$12$mCx3qFDb9x9RjXMFR9eIjOMHFn4oeuWaGWOJ04O58gOpuvn1VR/8O', NULL, NULL, NULL, 'google', 0, 0, 0, NULL, 634146, 1, 0, 0, 0, 0, '2025-04-05 02:22:49', '2025-04-05 02:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedbacks`
--

CREATE TABLE `user_feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diver_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `feedback` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_management`
--
ALTER TABLE `banner_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_management`
--
ALTER TABLE `benefit_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_m_s`
--
ALTER TABLE `c_m_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diver_feedbacks`
--
ALTER TABLE `diver_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diver_feedbacks_diver_id_foreign` (`diver_id`),
  ADD KEY `diver_feedbacks_user_id_foreign` (`user_id`);

--
-- Indexes for table `diver_followers`
--
ALTER TABLE `diver_followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diver_followers_diver_id_foreign` (`diver_id`),
  ADD KEY `diver_followers_user_id_foreign` (`user_id`);

--
-- Indexes for table `dive_users`
--
ALTER TABLE `dive_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dive_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `dive_user_images`
--
ALTER TABLE `dive_user_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dive_user_images_diver_id_foreign` (`diver_id`);

--
-- Indexes for table `diving_transactions`
--
ALTER TABLE `diving_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diving_transactions_user_id_foreign` (`user_id`),
  ADD KEY `diving_transactions_event_id_foreign` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_diver_id_foreign` (`diver_id`);

--
-- Indexes for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_comments_event_id_foreign` (`event_id`),
  ADD KEY `event_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_images_event_id_foreign` (`event_id`);

--
-- Indexes for table `event_joins`
--
ALTER TABLE `event_joins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_joins_event_id_foreign` (`event_id`),
  ADD KEY `event_joins_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fianaces`
--
ALTER TABLE `fianaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_reported_by_foreign` (`reported_by`),
  ADD KEY `reports_reported_to_foreign` (`reported_to`);

--
-- Indexes for table `saved_trips`
--
ALTER TABLE `saved_trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_trips_user_id_foreign` (`user_id`),
  ADD KEY `saved_trips_event_id_foreign` (`event_id`);

--
-- Indexes for table `splash_management`
--
ALTER TABLE `splash_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_feedbacks`
--
ALTER TABLE `user_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_feedbacks_diver_id_foreign` (`diver_id`),
  ADD KEY `user_feedbacks_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_management`
--
ALTER TABLE `banner_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `benefit_management`
--
ALTER TABLE `benefit_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `c_m_s`
--
ALTER TABLE `c_m_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diver_feedbacks`
--
ALTER TABLE `diver_feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diver_followers`
--
ALTER TABLE `diver_followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `dive_users`
--
ALTER TABLE `dive_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `dive_user_images`
--
ALTER TABLE `dive_user_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `diving_transactions`
--
ALTER TABLE `diving_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `event_comments`
--
ALTER TABLE `event_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `event_joins`
--
ALTER TABLE `event_joins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fianaces`
--
ALTER TABLE `fianaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `saved_trips`
--
ALTER TABLE `saved_trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `splash_management`
--
ALTER TABLE `splash_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `user_feedbacks`
--
ALTER TABLE `user_feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diver_feedbacks`
--
ALTER TABLE `diver_feedbacks`
  ADD CONSTRAINT `diver_feedbacks_diver_id_foreign` FOREIGN KEY (`diver_id`) REFERENCES `dive_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diver_feedbacks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `diver_followers`
--
ALTER TABLE `diver_followers`
  ADD CONSTRAINT `diver_followers_diver_id_foreign` FOREIGN KEY (`diver_id`) REFERENCES `dive_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diver_followers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dive_users`
--
ALTER TABLE `dive_users`
  ADD CONSTRAINT `dive_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dive_user_images`
--
ALTER TABLE `dive_user_images`
  ADD CONSTRAINT `dive_user_images_diver_id_foreign` FOREIGN KEY (`diver_id`) REFERENCES `dive_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `diving_transactions`
--
ALTER TABLE `diving_transactions`
  ADD CONSTRAINT `diving_transactions_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diving_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_diver_id_foreign` FOREIGN KEY (`diver_id`) REFERENCES `dive_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD CONSTRAINT `event_comments_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_images`
--
ALTER TABLE `event_images`
  ADD CONSTRAINT `event_images_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_joins`
--
ALTER TABLE `event_joins`
  ADD CONSTRAINT `event_joins_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_joins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_reported_by_foreign` FOREIGN KEY (`reported_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_reported_to_foreign` FOREIGN KEY (`reported_to`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_trips`
--
ALTER TABLE `saved_trips`
  ADD CONSTRAINT `saved_trips_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_trips_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_feedbacks`
--
ALTER TABLE `user_feedbacks`
  ADD CONSTRAINT `user_feedbacks_diver_id_foreign` FOREIGN KEY (`diver_id`) REFERENCES `dive_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_feedbacks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
