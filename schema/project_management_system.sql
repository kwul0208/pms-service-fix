-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2021 at 06:18 PM
-- Server version: 5.7.23-log
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
-- Database: `project_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `request_by` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `date_added` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `related_meeting_system_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_09_16_092546_create_sessions_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(400) NOT NULL,
  `description` text,
  `request_from` int(11) NOT NULL,
  `created_start_date` date DEFAULT NULL,
  `launching_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `request_from`, `created_start_date`, `launching_date`, `created_at`, `created_by`, `updated_at`) VALUES
(1, 'Project Management System', 'Sistem Managemen Project ', 105, '2020-09-16', '2020-09-30', '2020-09-18 12:54:02', 105, '0000-00-00 00:00:00'),
(2, 'PM System', 'Sistem Project Manager', 0, '2013-12-01', '2013-12-01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'Website', 'Website mucglobal', 0, '2013-12-01', '2013-12-01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, '4', NULL, 0, NULL, '0000-00-00', '2021-02-02 02:07:51', 0, '2021-02-02 02:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('03nIXSKJ0wzH7JI6fCC2LNq0LU01B0l8nTXYtKtG', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaG1jUWVFSlAwd2tKMUhUdHYwQ2gzTUFRQkl1SHpWQ24zSFpuT1U4NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317316),
('0gBraRqP3FdMwg4K7xUP4xDNnFzq5hXGSBW8Sn5Q', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGIxajl2dElhYjY0bktzdk1rbDNQV3RQb2tZcTRkNmFQWVNkNXJpaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317209),
('0H4UQXhwElNS6MTWGtB200b4gN3ldsxPZ8chcIKz', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXl1RXJ0QjRPY0p1NzBKdjZKUGhuRm5sOUZmRWRsbXpVeUpHNllaRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600328378),
('0JJUaeicS40b4nnFr4xZbtfCWnpucaKbdhttMTMh', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTVucVlhVk1kSWxZTTBtcFRDckpEaVpEWFE4TEdyVFZxT3hPY3d1eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317686),
('202kUFEeFAZOZtUbeebVBdNNebBhgbXDOFVOqPdI', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHAwVHgweVNkZldXRm9waFN2ZEVseTdwTUE1V2RMV0NWbDdLTmE3NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336394),
('5V2zabYA6hTWRlDZfNmiA7sip97EKFRCs3F2cbIJ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY05EODZubmk4WWZIcjlHRmkwd2ZGZ1ZaRmM3eVpIZHBpMXR0M1lHNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336606),
('6ey8wQ4rLtIfUmTll1l0xOfv6CN4k9VxlEk9tlmg', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYVV2Wlk0RUpLS29kT3NwTmtjWXZRRnRuSTFOU1BIVVN4SWljN2prQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600328375),
('6HbMKdmu9oBm8VMW4WAhyFpcJY3MSVM5buElzXyb', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidE1ENE5FbmlTbWpzdWR4Nlg4bnlGNmhFUHdhTDlXMUZvSzFWYnczSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317311),
('6S22lGK6ovtjCZVY1kftbPlseNcgwKrkXDHV3UoT', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnFDd1VBdkVQbGx3WlJ2bDFvS2ZxTHFlTGU2OWVyczRMSlNSRFgwNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317531),
('9CRtBvYfBHCIvpTkklixNzkhegpZUp3betiRCNuR', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWM4YTV0WTNrbEUxTW5LVEI4SERDZVdDZGg5NzExQzNvSzYxUDMwMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317667),
('9UKH337NhZ9oZe0hBpBT2t1r0R25lAc9Sfa2CMzQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2kzU2VRbVk0cERqTzJIR0VnQ3E2dkRTUnU4S1NHajFOUDRLZXZveiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317224),
('ah18eedcPqbirlLCELAjHazIo5P2KFY2LdboI8Us', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicUNZRFFXMHJmZnl5TzhMbnZDSFdiMGRVSDNDZUZiMHhzZHQ1ZHdGVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317670),
('Aodx2LYIhRnLzJQ373s2FJT5QZqCr8EAj4uMGU3g', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFpyVUU3UWZPbWd5bmJoMzBEWTJEbUh0WnRpN1RmV2FxMG5qTnYwTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317351),
('d8sO6cRo8BmzJyWR2eS0Avd2TGeRpPcgZFKDghdY', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoick5HemxkQzZoVzJzcXBDU21uVTBBaEVmNkdJY1Buc0prTnJQcVFBTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317231),
('dhvQJxmcgDN0o8Fliygr9hUjTHnEw2A3yJaZOfna', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVY2YmkwekRuZEZ3REV0ZGVJelRGTDB2Qk5mZmhhdzVBa3UzWVoxViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317656),
('DI9orKUNJozey2LfuvgsKBgMcOfvAOyBXUrKnaVP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWh3UWg1ZzFmVGRnZFZ5S3RWMDdSN2dpdENrRkFxR3ZBdWtCZnk4VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336584),
('Dn8AxXXSTTwDomxh6r3MHc5076QbE1as1s0EC0A0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHMweWtsczlvRWlCWFhjcXBER2RIYmVLRFNKMmUycWVNUzFncFBxQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600337661),
('dq02jSKL6jCtNPoKEgsMJn7ckeVX6rwVaQ3cggUC', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicUpINWZKZnQ4ZDVCVDlCbGZ2bTBEUlQ0eURYTmp0Sldta3VnaWdQVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336639),
('DSjydm5wpulxM6KclAwV77TGMP4gux5As5PAf3yC', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicXM1Z2FOVHNyMHFjeDVlYk5BUVBaR1V3ZXJjRXdzOWFQTlZkeE1XRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317289),
('dsLUvgY2upQRJvBTgsny4IIN9yXQkBfmMlTC69Hq', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOERnSkVaa2NwZVFnazJkVFN3WWIxQ1lVVnpOaWw3Z1VxNHp6R2NMWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336401),
('duN2moILNx3sWbvbTd2zfPg9QIHfQlGrIBR4a7Zo', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTNmOE9UM05uMjYzVjB1bmFZWXpRWTRsa2hDNWF2cUVESW1yejRsNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336621),
('DwRe5fgO0yBJdA7crRFb5YgqzUn9K1RwqTpfKIeO', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzNDNHJyMHdwdkZYcU96cTRhUUY5ajU0QWplVmE0bHNTSjc5SlRLaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600328370),
('edGNcbOy9czuaejOxwWj5S6iWtjv1ewruBkgOIyD', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1ZTdXpQN3hod3d0QlNSb3RMdmFqN3V2bURjYW1OWHBXTWdNYUhGMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336642),
('eDODmORjSKbbA2p2fvXck3DD9lfnC5CD3YFSMXx5', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGgzRjA4VDl4ZTRkT3JXelltOWw1WkNROVVmY0dYc21SdXNEemxLNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336677),
('ek5MvnqUz1RuFG9qYdPmVQBruWBNfIhQ2l2vEppJ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFh6MjZ4WlBuRHdGVjc0T2kwRzM0UENPYUNNd1hiclNtY3I2QndReCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317694),
('fikljgeLzWGkfy6V5ALjuwsEbEYmqE4Ckbsh2bwi', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTdlT29GaE1YRkdRdWNFdkZUUG4zY1I1SG1ENlV4MHU2S1F5RkZBZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317186),
('fx4XmSiPnS2VOUr09NjFbs6lWwhOIIuF2VJIebKs', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlNUUlROQXR6WkJKc2VGOWxzSTBJWWpHZjFrenY2SENtdE95M3FFTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317292),
('gWwo9ihc0INCyG5GRA645XMn7YpTV0wazyIvHqtY', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHVoOTUxM1djU3RXSTZOZTlodVVjd1pzOXlkZEZvbWowSnBqMEV1cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317637),
('HeRu4MtMvRqmLXwhugfCSmS0AizNyxH3gumXYPAs', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHUxZWx4VDlYNGtSdGQ5aU1mNXBWckRvdXE0T3RnbkpTY1lNSHJHayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317354),
('HraCXkG9ihJ8lGcCuKcgV8Hsxo7hjjWGAoBjVzeM', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTI4Skh0YkZtVXJrUXdDcXkzRGdXVDBqTUlMQjVKZWIxM0U2c2oxTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336645),
('hxofI32hnlUEltaNrVrLZLrzWcFwXcBCKN6lr2TI', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWFyUHlFdUFEd0VyR0swZnJtS3NEUWJYc1FLdUVOWWNwRjNOdmFUQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336628),
('iPt6XqRmfLn8Mzt0j8p2UzKo7W1CaawYyHdS634y', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWjRJTndRUmxkeUVEb1I5MzhtcjNBMWFGSzVSQ2tMZFVsbjdIT29ubSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600319477),
('IvPaWOCAbfTE0H43vGAQNzUE62mayAhnD53ORUGP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFl0TmNDZ1k1UXdSSllhMnBKcmtyZ3NVdWFlem5GcExEQWQzeDlmVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317177),
('IxXgJhrjaZo8UNTTNS4PvKzka4NdTvazvfgRb8WX', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUg1ZmFwbjJsQWtMR0x6NFFpbnh2MThKREpCb0FYWUtidGZhc1l0bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9sb2NhbGhvc3QvcHJvamVjdG1hbmFnZW1lbnRzeXN0ZW0vaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1600327973),
('J7k76yMlnRQY1LHqm2ewQRRnHi7LLjWZnRVz516u', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1dVN2dyTkdVczlzZ1hSRENucVlTODd6YmhWbmNNTnI5RUJTQTh5aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600327930),
('JSrURU5qibzXSjUlqeCxdxrws5eEgEUTYaqlIwrI', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSXRtUmVSR0Exb3NOZ3BaTldDcDduU002Q3RMNlRQd3VZeW9hQlp3cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336404),
('jzbu2XlgUggXLeYoZ89KR3YgChtH5uFSavwDwe0o', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialhzRnZZQm5SWXFpZENkOVg2NGlESnNnWDk0WWdxVmZJaVZzZzZTbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317713),
('k9If0wjXuGQ9tJBlQeaUWza2PRLpgs8XippvpNvq', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXp2dUw0U2g5emFlYXdvaGlGczBFMno4TUJoN1QwdWt6Z2ZiUVR1aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317708),
('mCmWrRP8WrJE5khJXx84WuGvDKsre7ckGmm9sC5Y', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVlwWGZxOGcxTGdNa3RiTDdJZ3FYSHFlbW81dlFsb1FZSUg2ODZkUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336624),
('MeipYWRHIjgrf6vBCTzg9sUJhoHodRdedTn4LdAX', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia3Jxd0dmNk5CQ2ZLS3FJT2VVejhrTFFYNmNGakpSallOZEZFZzdMVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317228),
('NkykGeZGNxTIFTPrVvAfEmLgVpcj9MNiuIp4QtQS', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWRrZk1SQ2k3alhjaGlNdnZZWmcyVUFMT1o1SGRPMFJ3bVN3UFZnOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336387),
('pQlw0viQ3JGALCMOyQVnlvF7ajECCLht8fRIAX5S', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT1dWaEEyNjRzNlJyUkpleVB2NFZYcnVyQUtwbTF3em55clFOSGR1ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317529),
('r1072QLAdgQhXk7MQ3qQQpbGER8zDp5SU8WNsnk9', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHRXdTBMMGJrM2dvSWJyNGJmckdCRWJ0MzRkR0Q5WVdPanFkbGZXVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317349),
('rpQVtHXS9SsTOG9tSGqAqiAWFaAcxtcd1BDyzJLu', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicG40TWZVcnNRaVF3QklFQ3REMTNyRDhscFBockxla1VvMkhXWWxseCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317691),
('SbcEsYHa2D8FYlaSpGSoQCZFKsOJoaE464uTAI7k', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2JaMXJKM2YyS2kyN2d6OGhVNktjRktITU4xNDdSUkRXMlh0b2toRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317604),
('sMOTNfYoiJiJUhqyCOWzBQFxRgxI9rXcDeYP15p0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVG9idFk3TlpGZjJGU01VVVcya3R6VVBocWRqRUZJUVI5QWN1dmtYSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600327952),
('tsHx11gNKrRu7mD6cOtwhc4OsepvRmfV34CzINHn', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTm5kMUY1NXlpdXFaWVd1b0pBbmRGWURTYUpYMzJwWnN4aXJ0bm5UcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336632),
('TZE0xNy4v5Z9aRzTyoszFC9QqnEGn3VIYxvz9xSL', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSVBBUW5HRDNxNERvejV1Z0lYVldneVJNR0t2aGZjcmJWS1g1Y0JvUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317609),
('uDvGb07zaHqBOfIZc1qHjLtY06ceImfUe5u9kvt2', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSEhYaXR2NTRuUWZEUnZibWNVMGpvMHZEOTZaUjVGampjZkFTR1hKZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3QvcHJvamVjdG1hbmFnZW1lbnRzeXN0ZW0vcHJvamVjdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1600371254),
('UmZ0sLuDpzkepptaPUJfAbTVq6XqGdaCqjsdiPhI', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTJYajFwRkxIM3hYamxobUlFMVVuMFpzVmk1akpXV0hreVBmb1hMRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3QvcHJvamVjdG1hbmFnZW1lbnRzeXN0ZW0vcHJvamVjdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1600338281),
('uTkXTVyrj92U1qbhiNZhmiotGZQs6reH4HUj1rWR', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkZkbzgxRXM4aU1BTDNCY3VCRDBDSmliRHROcmRtdFZNQ0JQR2h2VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317155),
('v6EDAsSm7B2beInuSYJJ69tA433mzypPM3f0eee7', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTlGVFpVaW5KbkpqUllCUVgyV29mWVJ4UjhYc3l6SGRNTmZITm85VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9sb2NhbGhvc3QvcHJvamVjdG1hbmFnZW1lbnRzeXN0ZW0vaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1600319476),
('Vgrv2i3Iuckqq7ShJH9bkXK8tirLlRksDPvtPaCD', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2s1NTBDSllCNjdGY1dVSEpTSldsWkZmdE1WemdRTnppaW9JeTljWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317585),
('Vo6tqLt9WwF5xZMTQZEbS37di2hc9xE9xPq80lu1', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGtlZTdITmNUZWsxOW9hRkszcVlROXF2M1NmN3RuWk9rWnBQNFA5UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317204),
('W5PcDt7aNM6I97ND3elVELRplLZVgxcvP8L85eOE', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZnd5Unhkcmpyb2w3T3l4c1NtdXczd1ZTU3dJeXRqTXl4eTNMeEhLMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317296),
('wVGENAhDNC28oA76UwECy2iN6CwVJTZfbncND2ue', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaU01V1haMVhEbUU1ZXdNaVJGTEtZeE94RkhXZG4xd1BVRTJvOWFMUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600337337),
('XaC1qoFbwGEhOAqi5m81EIgknzUlpy4kFaxgjUwY', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQkVyejJpMXlSUVRqNVBhSjRoMWJjR09SR3JDWDVYV3hQVnRMY0lleiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336662),
('XDvkTcghQfeX35bxebjbMWd1mukTEKYEIx77QU06', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVJJRjFhWXc4S2czUUVOdjcxd1lLNlVqSVQ1aklaWnhQc3pRR0hRMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336685),
('XgbRAbES6Aze2lHPRHOM8YTlvjeGTtXZzIMQm2Fz', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicE1zTEE2TmxCRzRvM3I4czJlSTdoYmxuREdKNW1LZ0RjZGswQmZObyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317197),
('XLyIyLis4Ml0QLzzqmcyo5MPHThQw0JzUCnc1mBp', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNzZMOU9HcG1IYld0YzBlYUZlQ0lnNGc4UzJNM2d4bWhBWXdDcG9RdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317321),
('yf1FW6JXaKRPNQzx6NL3FsWO4fi7HD1IPOXnDfxT', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiemk4cFU1NWZtUjgxQlpaZ2hIVnVSVlA2ME9nQll2QkxmckppWFVnZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317170),
('yj3MBN1cuKZcaxfloRbMP4pcPk3iu4QJziQG5gw6', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHg3TGtyOGdyd2gzM0VrQkRmdTA4bzhYdmdkMU9DVW5LS2tRWGpHdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600317583),
('YMCc5TvtsCLjKarDHUbP1VckEcX2FMreGiq62FDN', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiakZWRmNITXRtSXJldlJUMXIyNWhhR296RzQ3M2p0U1dZY0NPWTZZdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336674),
('Zd73Mw5A18NhsPJyhMSJCgW7RxlZGPgGtch4w2LW', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFVIaEFpdTB0cTF6NzcxbXBQd0gxa1hXeHdtQ3h2dks0N1gxZVZnYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600336382),
('ziaVcIfHZRAIltJ62lBSeNbCjpaKhHTgWAUNCQRu', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibjJtSUgxdXBOQUVPYlpiODVWR25zSXRiVjhzYmxhWHVXUnR6VWFJTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1600327938);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `project_feature_id` int(11) NOT NULL,
  `task_name` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `category` enum('improve_feature','fixing_bug','adding_feature','other') NOT NULL,
  `status` enum('not_started','ongoing','done','') NOT NULL,
  `working_start_date` datetime NOT NULL,
  `working_finish_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `project_id`, `project_feature_id`, `task_name`, `description`, `category`, `status`, `working_start_date`, `working_finish_date`, `created_at`, `created_by`, `updated_at`) VALUES
(1, 2, 0, 'Menambahkan tanggal 28 Des 2020 ikut di tahun 2021', 'Menambahkan teks tanggal 28 Desember 2020 adalah pekan pertama di tahun ', 'other', 'ongoing', '2021-01-05 10:48:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 1, 0, 'Upload ke server', '', 'other', 'not_started', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 2, 0, 'Desain analisa', '', 'other', 'done', '2021-01-04 11:02:08', '2021-01-06 11:02:08', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 3, 0, 'Mengganti tp world 2020 di  footer website', '', 'improve_feature', 'not_started', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-01-07 08:18:34', 0, '2021-01-07 08:18:34'),
(5, 1, 0, 'Membuat Video', '', 'improve_feature', 'not_started', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-02-15 14:38:30', 0, '2021-02-15 14:38:30'),
(6, 3, 0, 'Membuat Rating website', '', 'improve_feature', 'ongoing', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-02-18 02:36:51', 0, '2021-02-18 02:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `task_assigned_to`
--

CREATE TABLE `task_assigned_to` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_feature_id` int(11) NOT NULL,
  `employees_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `upated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_assigned_to`
--

INSERT INTO `task_assigned_to` (`id`, `task_id`, `project_id`, `project_feature_id`, `employees_id`, `created_date`, `created_by`, `upated_date`) VALUES
(1, 1, 0, 0, 298, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 1, 0, 0, 105, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 3, 0, 0, 105, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 4, 0, 0, 500, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `task_doing`
--

CREATE TABLE `task_doing` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `employees_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `timestart` time NOT NULL,
  `timefinish` time NOT NULL,
  `timeduration` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `employees_id` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'mahrizal\'s Team', 1, '2020-09-16 02:39:20', '2020-09-16 02:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('pm','team') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'mahrizal', 'mahrizal@mucglobal.com', NULL, '$2y$10$36A2x6PyVcqFMG8DfXoWaOyLeZJd4bJkwCXcnoTWaR0QKoh5/38Vq', NULL, NULL, NULL, '1', NULL, '2020-09-16 02:39:20', '2020-09-16 02:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE `version` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `version` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_assigned_to`
--
ALTER TABLE `task_assigned_to`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task_assigned_to`
--
ALTER TABLE `task_assigned_to`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
