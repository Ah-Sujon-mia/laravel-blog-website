-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 11:37 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Wordpress Development', 'wordpress-development', NULL, NULL, '2020-10-04 06:57:20'),
(7, 'Ecommerce Website', 'ecommerce-website', NULL, NULL, '2020-10-04 06:56:52'),
(8, 'Web Development', 'web-development', NULL, NULL, '2020-10-04 06:55:47'),
(9, 'Web Design', 'web-design', NULL, NULL, '2020-10-04 06:55:29'),
(10, 'Laravel Development', 'laravel-development', NULL, NULL, '2020-10-04 06:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_01_043216_create_posts_table', 1),
(5, '2020_10_01_044051_create_categories_table', 1),
(6, '2020_10_01_044131_create_tags_table', 1),
(7, '2020_10_01_044158_create_post_tags_table', 1),
(8, '2014_10_12_000000_create_users_table', 2),
(9, '2020_10_06_131125_create_contacts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `publish_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `image`, `description`, `category_id`, `user_id`, `publish_at`, `created_at`, `updated_at`) VALUES
(1, 'Perferendis autems odio sequi inventore.', 'perferendis-autems-odio-sequi-inventore', 'f5c97a16c51d7f9593349427c6f68aee.jpg', 'Quia atque et temporibus. Optio incidunt quos numquam delectus et. Quam ratione enim ut quis omnis nam aliquid odio. Nostrum dolor aspernatur deleniti. A assumenda et odit occaecati incidunt ut aut. Quis ullam animi provident enim non in. Placeat est laudantium et. Eos iusto ut ut et et quo. Enim occaecati optio minus numquam. Quos excepturi vel totam assumenda. Ea a vel consequuntur.', 6, 1, '2020-10-04 13:01:44', NULL, '2020-10-03 09:46:36'),
(2, 'Sit debitis tempore uts non ut sapiente.', 'sit-debitis-tempore-uts-non-ut-sapiente', 'ef00155210dd874012ce757d62fb3a91.jpg', 'Nesciunt neque et voluptatibus. Distinctio sit fuga laborum ut. Temporibus omnis voluptatibus veniam ipsam eveniet. Dolore natus et eos totam aut. Sint et voluptas iusto. Id qui sed doloribus aut magni libero. Qui repellat rem ipsum aut. Sit commodi omnis et ut molestiae perspiciatis.', 7, 1, '2020-10-04 13:01:51', NULL, '2020-10-03 09:45:34'),
(3, 'Dolor dolorums in suscipit non aliquid.', 'dolor-dolorums-in-suscipit-non-aliquid', 'b67a2ae087b2e68fbbc7c501df7c3279.jpg', 'Provident adipisci sit sed nihil voluptatum corrupti expedita. Ipsam impedit reprehenderit fugit incidunt sint et aperiam. Porro odit distinctio ullam laborum quae ratione architecto. Molestiae possimus quibusdam corrupti. Accusamus quo aliquid quia officia qui natus qui. Earum pariatur adipisci at eveniet. Quis deleniti animi minima vel et dolor.', 8, 1, '2020-10-04 13:02:05', NULL, '2020-10-03 09:44:21'),
(4, 'Commodi et voluptates eos qui adaipisci aut cum.', 'commodi-et-voluptates-eos-qui-adaipisci-aut-cum', '600422d14c6b072c547ce2d424126a13.jpg', 'Autem unde vel dolores doloribus natus architecto. Qui omnis expedita nihil tempora accusantium. Fuga eos eveniet nihil odit. Omnis minima in pariatur molestias. Optio sint voluptatem laboriosam. Nobis similique et dicta ipsa dicta impedit. A ut ut nesciunt repudiandae architecto consequuntur veniam eveniet. Ipsam est aliquid qui sit.', 9, 1, '2020-10-04 13:02:09', NULL, '2020-10-03 09:43:50'),
(5, 'Aut ratione odit maiores maxime error sapienste ea qui.', 'aut-ratione-odit-maiores-maxime-error-sapienste-ea-qui', '43a2f6dea14f99130c63268b863c176b.jpg', 'Et dignissimos ipsum assumenda ducimus. Aut est accusantium quod perspiciatis. Omnis eum quas asperiores. Possimus qui tempore doloremque. Voluptas maxime aut nemo quis placeat voluptatem voluptatem.', 10, 1, '2020-10-04 13:02:14', NULL, '2020-10-03 09:43:04'),
(6, 'Qui nihil quo ut rerum qui smolestiae expedita.', 'qui-nihil-quo-ut-rerum-qui-smolestiae-expedita', '4a1f2c0d3f1e03f6327762d25c87dfcd.jpg', 'Non eum iste molestias qui. Eius reprehenderit nihil qui mollitia ut neque quis. Nihil iusto est harum vero. Quam dolor quia mollitia quis voluptatem voluptatem ducimus ut. A deleniti non adipisci omnis sunt in facere harum. Amet quia temporibus et natus eius. Laboriosam tempore totam consectetur ad autem voluptate.', 6, 1, '2020-10-03 09:42:23', NULL, '2020-10-03 09:42:23'),
(7, 'Cupiditate enim eaque ipsum qusae id numquam.', 'cupiditate-enim-eaque-ipsum-qusae-id-numquam', '0d760849cf3dbd59cf8904ff4aed1705.jpg', 'Sit blanditiis voluptatem placeat dolor est et id. Minima fugit ea odio. Architecto occaecati ut labore amet. Expedita quae fugiat officia et dignissimos hic. At qui totam sunt illo reprehenderit est possimus. Dolores mollitia esse dolor esse reiciendis rem. Rem est quia nesciunt optio. Sequi itaque aliquid et rerum fuga autem magni.', 7, 1, '2020-10-03 09:41:34', NULL, '2020-10-03 09:41:34'),
(8, 'Deserunt est quos molestiae eligesndi officiis.', 'deserunt-est-quos-molestiae-eligesndi-officiis', '7cf46a62136ee07c61046e2785dbdc53.jpg', 'Fugit eos quibusdam asperiores consequatur iste fugit quidem. Modi ipsam omnis sit ullam. Itaque sed quam similique exercitationem blanditiis. Et aut nihil cumque repellendus. Quae quos laboriosam illum nisi. Possimus non facilis aut repellendus.', 8, 1, '2020-10-03 09:41:05', NULL, '2020-10-03 09:41:05'),
(9, 'Quidem iusto et voluptsatem.', 'quidem-iusto-et-voluptsatem', 'a06f02ec916f371190c0db33557aa66c.jpg', 'Dignissimos ut libero ipsa qui. Nostrum non et et et ipsam molestiae. Ducimus iste et mollitia eos mollitia dignissimos dolore. Consequatur enim quod quasi. Facere nesciunt illo eligendi voluptatem voluptas.', 9, 1, '2020-10-03 09:40:32', NULL, '2020-10-03 09:40:32'),
(10, 'Veniam praesentium omsnis facilis aut aperiam.', 'veniam-praesentium-omsnis-facilis-aut-aperiam', '1963367f45c72ebd5e4fd665185ed52e.jpg', 'Exercitationem sint pariatur neque et hic illum occaecati. Non aut est rerum recusandae. Aut est quo tempore quo. Ut soluta non eum dolores. Aut doloribus voluptate excepturi est harum ea eveniet quis. Qui sapiente voluptates odit hic esse quod et. Tempora et quod aspernatur neque harum. Voluptas dicta occaecati est consequatur incidunt. Reprehenderit dolorum harum ut ducimus et.', 10, 1, '2020-10-03 09:40:09', NULL, '2020-10-03 09:40:09'),
(11, 'Atque ipsam et velit qui dedlectus rerum quidem quisquam.', 'atque-ipsam-et-velit-qui-dedlectus-rerum-quidem-quisquam', 'ec1a5f63569a7c850702e8c6424bfb9d.jpg', 'Quo blanditiis sint sint mollitia quod. In quisquam voluptatem saepe sed. Sequi corporis eligendi quam voluptatem. Laudantium quaerat ab voluptate. Explicabo aut et distinctio natus. Voluptatem est omnis qui veniam aut. Quibusdam autem illo et culpa.', 6, 1, '2020-10-04 13:02:31', NULL, '2020-10-03 09:36:45'),
(12, 'Qui quidem aliquam cosrrupti adipisci amet.', 'qui-quidem-aliquam-cosrrupti-adipisci-amet', '3dcf4aab5022098b8a714a4fea78dc03.jpg', 'Minima fugit quas magni voluptatem voluptatem corrupti pariatur consectetur. Incidunt in exercitationem quis voluptate ut aut. Et animi similique natus ratione dolorem eligendi. Inventore est quis vel temporibus ex. Odio recusandae qui et. Enim ut impedit repellendus dolore sequi. Eaque sint sit cum autem minima. Repellendus et facilis sint eius.', 7, 1, '2020-10-04 13:02:34', NULL, '2020-10-03 09:36:24'),
(13, 'Voluptates eius sunt illsum.', 'voluptates-eius-sunt-illsum', 'Voluptates eius sunt illsum.-20c5c26e43609f00c1102987309fd0f2.jpg', 'Nobis numquam quibusdam et atque. Voluptatum cum earum et natus. Illo corporis enim placeat quis aut perferendis provident. Consequuntur et et est accusamus consequuntur ad. Quisquam itaque voluptas culpa repudiandae atque cumque neque. Dolores debitis vero itaque deserunt consectetur. Nobis laborum hic dolores iusto animi voluptatem. Dolores ipsum sint voluptas vitae.', 8, 1, '2020-10-04 13:02:38', NULL, '2020-10-03 02:10:53'),
(14, 'Similique deserufnt totam est ut magni.', 'similique-deserufnt-totam-est-ut-magni', '0c747a6106102b32375cc95bde3da5d0.jpg', 'Distinctio earum sit voluptatem quo optio. Quis distinctio et cumque est. Voluptatem soluta blanditiis nobis itaque. Aliquid eaque iste quae rerum dicta eos expedita. Natus ut eos molestias nisi perspiciatis quo. Voluptatem nihil consequatur pariatur quos. Ipsam eum rerum libero molestias doloribus officia modi. Omnis ipsum animi est itaque est placeat. Iste iusto qui enim consequatur sint.', 9, 1, '2020-10-04 13:02:45', NULL, '2020-10-03 09:35:36'),
(15, 'Maxime officia ab voluptate quias.', 'maxime-officia-ab-voluptate-quias', '718a3cdfbefa1895d69686de5495014f.jpg', 'Itaque possimus hic dignissimos sed dolorem. Culpa in non voluptatem explicabo. Autem unde hic enim et. Vitae incidunt ducimus natus dolores sit dolorum. Ut sit dignissimos a eligendi quisquam. Mollitia cum ea debitis. Aut laudantium modi necessitatibus. Blanditiis ut et eaque consequuntur provident. Doloremque commodi veniam vel qui et sit.', 10, 1, '2020-10-04 13:02:49', NULL, '2020-10-03 09:35:13'),
(16, 'Nam voluptates aut cupiditaste dolores exercitationem neque cupiditate.', 'nam-voluptates-aut-cupiditaste-dolores-exercitationem-neque-cupiditate', '985f553fdbc34dd0633ce49c3d9abc97.jpg', 'Illo sit aut expedita rerum minima dolores ut qui. Repudiandae enim repellat cum ipsa voluptatem recusandae. Qui placeat eveniet non quibusdam autem. Ea natus veniam voluptas ut. Dolor doloremque explicabo impedit dolores sunt et dolorum fuga. Eaque quidem deserunt et modi. Consectetur aspernatur aut placeat esse. Neque dolore qui voluptas minus. Non aut sunt iusto hic excepturi.', 6, 1, '2020-10-03 09:34:32', NULL, '2020-10-03 09:34:32'),
(17, 'Voluptate nesciunst enim rerum consectetur qui impedit.', 'voluptate-nesciunst-enim-rerum-consectetur-qui-impedit', 'cad7a837ce11e23cde35276a18059bf6.jpg', 'Quibusdam sint id quia ea dolorem aut est. Nam dolores voluptates ad a. Officia magni aliquam ut hic rerum incidunt ratione. Cum consequatur facilis amet fugit facere voluptas quisquam aut. Laborum aspernatur praesentium nulla nobis numquam neque. Sit dolores ex nostrum non inventore animi tempora accusantium. Accusantium qui nesciunt illo accusantium voluptas in dolorem.', 7, 1, '2020-10-04 13:02:54', NULL, '2020-10-01 17:02:30'),
(18, 'Deserunt accussamuss masgni sunt porro volupstatem voluptatem.', 'deserunt-accussamuss-masgni-sunt-porro-volupstatem-voluptatem', '63706426df41d336c5ad2da66cfffc3a.jpg', 'Animi ab ullam id. Quia quis iusto sint et qui. Nesciunt tenetur commodi quibusdam voluptas. Beatae debitis voluptatibus voluptatem voluptas recusandae. Ex nesciunt id laudantium eos explicabo. Quia quis qui in quo quas ut. Vel ratione odio porro sed at sint. Nulla ad ratione sed eaque quas alias aliquam. Eaque quaerat atque nihil provident rerum.', 8, 1, '2020-10-04 13:03:00', NULL, '2020-10-03 02:06:31'),
(19, 'Voluptas porro est exercitationem quidem atque voluptateds.', 'voluptas-porro-est-exercitationem-quidem-atque-voluptateds', '50fa60cf19a601640f5cd422faa28614.jpg', 'Laborum omnis enim quam laboriosam et similique adipisci. Quisquam quia enim id velit. Occaecati illum sunt repellendus vitae. Soluta voluptatibus exercitationem beatae fugit placeat. Et optio quis nam exercitationem aut eius sed. Officia voluptates facilis sint aut consequatur iste. Eum sed dignissimos harum ut rerum.', 9, 1, '2020-10-04 13:03:04', NULL, '2020-10-01 17:01:13'),
(20, 'Illum id et unde qussod ut quias quiaxs.', 'illum-id-et-unde-qussod-ut-quias-quiaxs', 'Illum id et unde qussod ut quias quiaxs.-6e45e6797b0c724ec77bde74c3319040.jpg', '<p>Sed ducimus&nbsp;<span style=\"font-size: 1rem;\">vel quia dolorem minus. In eum ut molestiae explicabo est. Placeat beatae sed et consequatur ratione non. Eaque alias molestias modi dolores possimus ea. Officia omnis ut iure dolorum rerum occaecati alias. Veritatis maxime hic voluptatibus.</span></p>', 6, 1, '2020-10-05 18:36:00', NULL, '2020-10-05 18:36:00'),
(21, 'Lorem ipsum, dolor sit amset consectetur adipisicing elit. Vel, illum.', 'lorem-ipsum-dolor-sit-amset-consectetur-adipisicing-elit-vel-illum', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.-6951d2fa208281be7b46634af9d1fb6c.jpg', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illum.<br></p>', 6, 1, '2020-10-05 18:27:24', '2020-10-03 18:52:35', '2020-10-05 18:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(6, 19, 3, '2020-10-01 17:01:13', '2020-10-01 17:01:13'),
(7, 19, 4, '2020-10-01 17:01:13', '2020-10-01 17:01:13'),
(8, 19, 5, '2020-10-01 17:01:13', '2020-10-01 17:01:13'),
(12, 17, 4, '2020-10-01 17:02:30', '2020-10-01 17:02:30'),
(13, 17, 5, '2020-10-01 17:02:30', '2020-10-01 17:02:30'),
(23, 18, 1, '2020-10-03 02:06:31', '2020-10-03 02:06:31'),
(24, 18, 2, '2020-10-03 02:06:31', '2020-10-03 02:06:31'),
(25, 18, 4, '2020-10-03 02:06:31', '2020-10-03 02:06:31'),
(26, 13, 1, '2020-10-03 02:10:53', '2020-10-03 02:10:53'),
(27, 13, 2, '2020-10-03 02:10:53', '2020-10-03 02:10:53'),
(28, 13, 3, '2020-10-03 02:10:53', '2020-10-03 02:10:53'),
(29, 16, 1, '2020-10-03 09:34:35', '2020-10-03 09:34:35'),
(30, 16, 2, '2020-10-03 09:34:36', '2020-10-03 09:34:36'),
(31, 16, 4, '2020-10-03 09:34:36', '2020-10-03 09:34:36'),
(32, 15, 2, '2020-10-03 09:35:13', '2020-10-03 09:35:13'),
(33, 15, 3, '2020-10-03 09:35:13', '2020-10-03 09:35:13'),
(34, 15, 4, '2020-10-03 09:35:13', '2020-10-03 09:35:13'),
(35, 14, 3, '2020-10-03 09:35:36', '2020-10-03 09:35:36'),
(36, 14, 5, '2020-10-03 09:35:36', '2020-10-03 09:35:36'),
(37, 12, 1, '2020-10-03 09:36:24', '2020-10-03 09:36:24'),
(38, 12, 4, '2020-10-03 09:36:24', '2020-10-03 09:36:24'),
(39, 11, 2, '2020-10-03 09:36:45', '2020-10-03 09:36:45'),
(40, 11, 3, '2020-10-03 09:36:45', '2020-10-03 09:36:45'),
(41, 11, 4, '2020-10-03 09:36:45', '2020-10-03 09:36:45'),
(42, 10, 1, '2020-10-03 09:40:09', '2020-10-03 09:40:09'),
(43, 10, 2, '2020-10-03 09:40:09', '2020-10-03 09:40:09'),
(44, 10, 3, '2020-10-03 09:40:09', '2020-10-03 09:40:09'),
(45, 9, 2, '2020-10-03 09:40:32', '2020-10-03 09:40:32'),
(46, 9, 4, '2020-10-03 09:40:32', '2020-10-03 09:40:32'),
(47, 8, 2, '2020-10-03 09:41:05', '2020-10-03 09:41:05'),
(48, 8, 3, '2020-10-03 09:41:05', '2020-10-03 09:41:05'),
(49, 7, 3, '2020-10-03 09:41:35', '2020-10-03 09:41:35'),
(50, 7, 4, '2020-10-03 09:41:35', '2020-10-03 09:41:35'),
(51, 7, 5, '2020-10-03 09:41:35', '2020-10-03 09:41:35'),
(52, 6, 3, '2020-10-03 09:42:23', '2020-10-03 09:42:23'),
(53, 6, 4, '2020-10-03 09:42:23', '2020-10-03 09:42:23'),
(54, 6, 5, '2020-10-03 09:42:23', '2020-10-03 09:42:23'),
(55, 5, 1, '2020-10-03 09:43:04', '2020-10-03 09:43:04'),
(56, 5, 3, '2020-10-03 09:43:04', '2020-10-03 09:43:04'),
(57, 5, 4, '2020-10-03 09:43:04', '2020-10-03 09:43:04'),
(58, 4, 2, '2020-10-03 09:43:50', '2020-10-03 09:43:50'),
(59, 4, 3, '2020-10-03 09:43:50', '2020-10-03 09:43:50'),
(60, 3, 2, '2020-10-03 09:44:21', '2020-10-03 09:44:21'),
(61, 3, 3, '2020-10-03 09:44:21', '2020-10-03 09:44:21'),
(62, 3, 4, '2020-10-03 09:44:22', '2020-10-03 09:44:22'),
(63, 2, 1, '2020-10-03 09:45:34', '2020-10-03 09:45:34'),
(64, 2, 2, '2020-10-03 09:45:34', '2020-10-03 09:45:34'),
(65, 2, 3, '2020-10-03 09:45:34', '2020-10-03 09:45:34'),
(66, 1, 1, '2020-10-03 09:46:36', '2020-10-03 09:46:36'),
(67, 1, 2, '2020-10-03 09:46:36', '2020-10-03 09:46:36'),
(68, 1, 5, '2020-10-03 09:46:36', '2020-10-03 09:46:36'),
(72, 21, 1, '2020-10-05 18:27:24', '2020-10-05 18:27:24'),
(73, 21, 2, '2020-10-05 18:27:25', '2020-10-05 18:27:25'),
(74, 21, 4, '2020-10-05 18:27:25', '2020-10-05 18:27:25'),
(78, 20, 1, '2020-10-05 18:36:00', '2020-10-05 18:36:00'),
(79, 20, 2, '2020-10-05 18:36:00', '2020-10-05 18:36:00'),
(80, 20, 3, '2020-10-05 18:36:00', '2020-10-05 18:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 'html', NULL, '2020-10-01 16:56:43', '2020-10-01 16:56:43'),
(2, 'CSS', 'css', NULL, '2020-10-01 16:56:56', '2020-10-01 16:56:56'),
(3, 'Laravel', 'laravel', NULL, '2020-10-01 16:57:15', '2020-10-01 16:57:15'),
(4, 'Jsvascript', 'jsvascript', NULL, '2020-10-01 16:57:48', '2020-10-01 16:57:48'),
(5, 'Bootstrap', 'bootstrap', NULL, '2020-10-01 16:58:10', '2020-10-01 16:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `role` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `image`, `description`, `status`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sujon Mia', 'sujonbdjoin019@gmail.com', NULL, NULL, NULL, 1, 1, NULL, '$2b$10$3F.j7IRtvBh/efcZJpjv8OuesAedzK9FY8VfK9gJoeYZpBRApwdKS', NULL, NULL, '2020-10-03 18:29:19'),
(6, 'Ismail Hossian', 'sujonbdjoin28783@gmail.com', 1, 'Ismail Hossian-fd9d12018941dd45f417fbf98fb2dffe.jpg', 'I am a professional laravel developer.', 1, 2, NULL, '$2b$10$1ujm/vwQSjwUenyBRJoW4eHzNFIHUw1OF/7ldZ7GifO7LMMlNb/7q', NULL, '2020-10-03 15:26:31', '2020-10-03 18:31:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
