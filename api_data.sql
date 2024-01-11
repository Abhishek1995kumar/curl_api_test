-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 06:00 AM
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
-- Database: `api_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `role` int(10) UNSIGNED NOT NULL DEFAULT 2 COMMENT '1:Super Admin, 2:Admin, 3:Order Admin, 4:Data Entry, 5:Grossory Department Head, 6:Medical Department Head, 7:Marketing, 8:Operations Management, 9:Accounting and Finance, 10:Research and Development (R&D), 11:Production Head',
  `phone` varchar(12) NOT NULL,
  `gender` varchar(12) DEFAULT NULL COMMENT '1=Male, 2=Female, 3=Other',
  `fax` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `bussiness_name` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `acc_no` varchar(25) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL,
  `aadhar_card` varchar(20) DEFAULT NULL,
  `gst_no` varchar(20) DEFAULT NULL,
  `id_proof` varchar(20) DEFAULT NULL,
  `udyam_cert` varchar(20) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 3 COMMENT '1:Active, 2:Deactive, 3:Pending, 4:Rejected',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `login_status` int(10) UNSIGNED NOT NULL DEFAULT 2 COMMENT '1:Login, 2:Logout',
  `password` varchar(255) NOT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `lname`, `username`, `role`, `phone`, `gender`, `fax`, `address`, `address2`, `city`, `state`, `country`, `bussiness_name`, `bank_name`, `acc_no`, `ifsc_code`, `aadhar_card`, `gst_no`, `id_proof`, `udyam_cert`, `pincode`, `email`, `status`, `email_verified_at`, `login_status`, `password`, `access_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `last_seen`) VALUES
(1, 'Abhishek', 'Kumar', 'Abhishek Kumar', 1, '8400046404', NULL, NULL, 'New Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abhishek.kumar@fyntune.com', 1, NULL, 2, '$2y$12$4N6Ozf8LIh1aUmLxSmNHhemb9eIoiy80AraxLVHAxUnXngU3/dN.S', NULL, NULL, '2024-01-01 09:49:10', '2024-01-08 07:47:47', NULL, NULL),
(2, 'Vishal', 'Bhardwaj', 'VishalBhardwaj', 3, '8400046404', NULL, NULL, 'Navi Mumbai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vishal.bhardwaj@gmail.com', 1, NULL, 2, '$2y$12$jqAiWegGigokT5FGozZy9OoT/bT2lW6TqKfnxSKu0VaGQIyGUEnba', NULL, NULL, '2024-01-01 11:36:26', '2024-01-08 06:10:34', NULL, NULL),
(3, 'Prashant', 'Mishra', 'PrashantMishra', 2, '7387326099', NULL, NULL, 'Navi Mumbai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'prashant.mishra@gmail.com', 1, NULL, 2, '$2y$12$amTehfXU75AqLbVtfeSFiO7bOZ7hAH0EmTwnvFhLpE/m7nkGB4ymq', NULL, NULL, '2024-01-01 11:45:20', '2024-01-06 05:50:01', NULL, NULL),
(4, 'Zoya', 'Khan', 'ZoyaKhan', 4, '9415058209', NULL, NULL, 'Lucknow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zoya.khan@gmail.com', 1, NULL, 2, '$2y$12$3e6DwQVAiPHpn/2FBRxOGuNhgR.8k5Kxnvu1tUQAapKTSNgzthxJq', NULL, NULL, '2024-01-01 11:46:10', '2024-01-01 11:46:10', NULL, NULL),
(5, 'Tehshin', 'Abhishek', 'TehshinAbhishek', 10, '8659623547', NULL, NULL, 'Lucknow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tehshin.abhishek@gmail.com', 1, NULL, 1, '$2y$12$3Tcuq5PSP9pmZQ2Ka2I8v.OceRHcVqp5espTV4EKn8gNf.BR6Nj22', NULL, NULL, '2024-01-06 04:23:51', '2024-01-06 11:39:05', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_29_044817_create_admins_table', 2),
(6, '2024_01_03_051126_create_reports_table', 3),
(10, '2024_01_08_091551_create_sellers_table', 4);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL COMMENT '1=Male, 2=Female, 3=Other',
  `fax` varchar(100) DEFAULT NULL,
  `areaandstreet` text DEFAULT NULL,
  `landmark` text DEFAULT NULL,
  `addressproof` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `bussiness_name` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `account_no` varchar(25) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL,
  `aadhar_card` text DEFAULT NULL,
  `gst_no` varchar(20) DEFAULT NULL,
  `id_proof` text DEFAULT NULL,
  `shop_act_lic` varchar(20) DEFAULT NULL,
  `udyam_cert` varchar(20) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `current_balance` int(11) DEFAULT NULL,
  `access_token` longtext DEFAULT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `otp` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 3 COMMENT '1:Active, 2:Deactive, 3:Pending, 4:Rejected',
  `login_status` int(11) NOT NULL DEFAULT 2 COMMENT '1:Login, 2:Logout',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `lname`, `username`, `shop_name`, `phone`, `gender`, `fax`, `areaandstreet`, `landmark`, `addressproof`, `address`, `city`, `state`, `country`, `bussiness_name`, `bank_name`, `account_no`, `ifsc_code`, `aadhar_card`, `gst_no`, `id_proof`, `shop_act_lic`, `udyam_cert`, `pincode`, `email`, `password`, `current_balance`, `access_token`, `email_verified_at`, `otp`, `status`, `login_status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'cUkzeFAwVUVzR0N2TUVQMW5QQTVXZz09', 'Ky93S0xNNDdXdzZQWVRLa1gxVTlzdz09', 'cUkzeFAwVUVzR0N2TUVQMW5QQTVXZz09 Ky93S0xNNDdXdzZQWVRLa1gxVTlzdz09', 'Abhishek Techogoly Pvt. Ltd.', 'ZHdqNXBIQmRMRVZ1OU5wc29JZ2lzQT09', NULL, NULL, 'enJoMXhORFFSWVBLeEJQd2F4SVFSZz09', 'Mahanagar', 'aTMzNmc1UjJxb2J4WW5WSHRRTmhjUT09', 'L0MxUEVvMjRWWVZ5QlBZblhEcmtjQT09', NULL, NULL, NULL, NULL, NULL, 'NULL', NULL, 'V0Q4SndiWjBnRWI3cTE3UTJrQkcyQT09', NULL, 'V0Q4SndiWjBnRWI3cTE3UTJrQkcyQT09', NULL, NULL, '226006', 'abhishek.kumar@fyntune.com', '$2y$12$Rjxkzx.ctqyglL1XQtg6d.WC7/0wnd7L3om.bZzP.15EMCYq.I8gK', NULL, 'XTqMjjAu3N5THuh7DjsU1cNPRKMHF1o3ovnxH7gcy42D34UrU1nakTvL69RKpyDgxw56TvQrMf88lCLDAmfvu1sDFCur3cOu4CFW', '2024-01-10 13:41:58', NULL, 1, 2, NULL, '2024-01-10 08:02:49', '2024-01-10 08:02:49', NULL),
(2, 'WXdCY1lRbTFrb1BSNFg3UFNSdzRKZz09', 'TisyWnF4ZFBKOC9tdVJNbkpwWWNJdz09', 'WXdCY1lRbTFrb1BSNFg3UFNSdzRKZz09 TisyWnF4ZFBKOC9tdVJNbkpwWWNJdz09', 'Abhishek kumar', 'eFdZVnBJVC93b2xvTHBUMnhEdkh4Zz09', 'Female', NULL, 'VG9DNXU4dkQxMDhFNndLN243T2V3dz09', 'Tilaknagar', 'cldSQWFJSS9XaEZ2NmNsSmtsS2s5Zz09', 'L0MxUEVvMjRWWVZ5QlBZblhEcmtjQT09', NULL, NULL, NULL, 'Marketing', NULL, 'NULL', NULL, 'cldSQWFJSS9XaEZ2NmNsSmtsS2s5Zz09', NULL, 'eFF3ZE4yZlBNS2F5NUtBZGtDbVl3dz09', NULL, NULL, '226006', 'tehshin.khan@fyntune.com', '$2y$12$wzF2uv38XV628h8RVH9j8uZYp8M8YVHjBkfUgX5HzP.Z6dTui82Jy', NULL, 'KACYDkI9zTcGlZaz7D38fy76xmONWXSpEO6jWZaYT09K43rr9mOJhfz8XuvNfjjzjyHs2swy9TRTTgIxeD057XdzoYGvFFC4mMI2', '2024-01-10 13:49:53', NULL, 1, 2, NULL, '2024-01-10 08:03:46', '2024-01-10 08:19:53', '2024-01-10 08:19:53'),
(3, 'MWk2Qi9FRFAwT0tZZklqQVRPTjhvdz09', 'd2tQd015c1VXdjhkL3g4Z2dkWmpSZz09', 'MWk2Qi9FRFAwT0tZZklqQVRPTjhvdz09 d2tQd015c1VXdjhkL3g4Z2dkWmpSZz09', 'Aryan Mishra', 'L0ZUN1J4YmJrVHFISlUvczNwVlFWUT09', NULL, NULL, 'V2RLTUw1MUpjTkpSUzg3b2pQZnJPZz09', 'New Hanuman Mandir', 'cFB2S0tDNGpER2t6M2hxejgzV3NDZz09', 'aEdnb1ZoM2FheVZyWGVBQ1ZNZ2U0Zz09', NULL, NULL, NULL, NULL, NULL, 'NULL', NULL, 'ODRQdWpkUjJNcmo5WW9ibndIVmQvUT09', NULL, 'cFB2S0tDNGpER2t6M2hxejgzV3NDZz09', NULL, NULL, '110018', 'aryan.mishra@fyntune.com', '$2y$12$MmPJ0N14M2.6hMJc5fIwqe9mIEbh3w4NZGHuTobRgCNRKP7BSyhp.', NULL, 'iuH58KkYgMb5CHUyBTA2KCo2ZfQhbaX3X8pKLeixhQ3w6OlvJdn73gnoJHGibBwUrEu9bPqNk6fYntl6dnRrhF0DK3Xxww7IKYbA', '2024-01-10 13:41:50', NULL, 1, 2, NULL, '2024-01-10 08:07:24', '2024-01-10 08:07:24', NULL),
(4, 'dGlYa2VGN2MrZzJ0Q0xnVDVqZEdmZz09', 'cUkzeFAwVUVzR0N2TUVQMW5QQTVXZz09', 'dGlYa2VGN2MrZzJ0Q0xnVDVqZEdmZz09 cUkzeFAwVUVzR0N2TUVQMW5QQTVXZz09', 'Aryan Mishra', 'aUNVaDNRR1hRaU9ndmZSN3JsMHlQZz09', NULL, NULL, 'V2RLTUw1MUpjTkpSUzg3b2pQZnJPZz09', 'New Hanuman Mandir', 'TTJNKzRqWDZPSmduOFl6dGxnZi9JUT09', 'aEdnb1ZoM2FheVZyWGVBQ1ZNZ2U0Zz09', NULL, NULL, NULL, NULL, NULL, 'NULL', NULL, 'RUdKRld1WVgyVHZmbmc2dmF1ZGhXZz09', NULL, 'TTJNKzRqWDZPSmduOFl6dGxnZi9JUT09', NULL, NULL, '110018', 'komal.abhishek@fyntune.com', '$2y$12$V4euSvN.EkFz7d1hir32Y.2rY6kycwzJt3lAhj99P1aHzC2ZvvRQe', NULL, 'bKe0DvdL7UoiHOnOHi8N74rJnLNm8QpETjNEUHyjDaq73WuvqhIYylSGGYNkRauGdGG5M16X2Cs9abO6a9Dk3rxSghEwy69qNCFc', '2024-01-10 13:41:46', NULL, 1, 2, NULL, '2024-01-10 08:08:11', '2024-01-10 08:08:11', NULL),
(5, 'WllRU3lzeTBJWnlKWnpQY2JIVjBrZz09', 'TisyWnF4ZFBKOC9tdVJNbkpwWWNJdz09', 'WllRU3lzeTBJWnlKWnpQY2JIVjBrZz09 TisyWnF4ZFBKOC9tdVJNbkpwWWNJdz09', 'Abhishek kumar', 'ZHdqNXBIQmRMRVZ1OU5wc29JZ2lzQT09', 'Female', NULL, 'VG9DNXU4dkQxMDhFNndLN243T2V3dz09', 'Tilaknagar', 'Qm0xZkUwRXBLSjNzY2ZMMnMwL0x3Zz09', 'L0MxUEVvMjRWWVZ5QlBZblhEcmtjQT09', NULL, NULL, NULL, 'Marketing', NULL, 'NULL', NULL, 'Qm0xZkUwRXBLSjNzY2ZMMnMwL0x3Zz09', NULL, 'ZlMyc2lidWFUd0F4UU8wd1AyREdldz09', NULL, NULL, '226006', 'fatima.khan@fyntune.com', '$2y$12$YIpi6HPAkm14lWgqM2hY1OGwWDsMbTKgsfFPWMJFbgxV358k.SCxa', NULL, 'ySOQFbDbcPZ9lDMhgqTmKB0hHtjOzFYErzirToFo3PFBwYlFdG5wRJvhiIwFdbHYFcjaVFINZjwTgryqEYa0OnsuiwcoCeRzlcSn', '2024-01-10 13:41:41', NULL, 1, 2, NULL, '2024-01-10 08:11:18', '2024-01-10 08:11:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL COMMENT '1=Male, 2=Female, 3=Other',
  `fax` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `bussiness_name` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `acc_no` varchar(25) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL,
  `aadhar_card` varchar(20) DEFAULT NULL,
  `gst_no` varchar(20) DEFAULT NULL,
  `id_proof` varchar(20) DEFAULT NULL,
  `shop_act_lic` varchar(20) DEFAULT NULL,
  `udyam_cert` varchar(20) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 3 COMMENT '1:Active, 2:Deactive, 3:Pending, 4:Rejected',
  `login_status` int(10) UNSIGNED NOT NULL DEFAULT 2 COMMENT '1:Login, 2:Logout',
  `access_token` longtext NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
