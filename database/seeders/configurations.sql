-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2025 at 06:44 AM
-- Server version: 8.0.36-28
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookin`
--

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` int UNSIGNED NOT NULL,
  `config_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Bookin', '2024-03-08 03:39:48', '2024-09-23 07:33:10'),
(2, 'currency', 'USD', '2024-03-08 03:39:48', '2024-05-06 23:23:30'),
(3, 'timezone', 'UTC', '2024-03-08 03:39:48', '2024-05-06 23:23:30'),
(4, 'paypal_mode', 'sandbox', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(5, 'paypal_client_id', 'YOUR_PAYPAL_CLIENT_ID', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(6, 'paypal_secret', 'YOUR_PAYPAL_SECRET', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(7, 'razorpay_key', 'YOUR_RAZORPAY_KEY', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(8, 'razorpay_secret', 'YOUR_RAZORPAY_SECRET', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(9, 'term', 'monthly', '2024-03-08 03:39:48', '2024-05-06 23:23:30'),
(10, 'stripe_publishable_key', 'YOUR_STRIPE_PUBLISHABLE_KEY', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(11, 'stripe_secret', 'YOUR_STRIPE_SECRET', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(12, 'app_theme', 'red', '2024-03-08 03:39:48', '2024-09-23 07:33:10'),
(13, 'primary_image', 'images/web/background/slider.svg', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(14, 'app_settings', '1', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(15, 'tax_type', 'exclusive', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(16, 'invoice_prefix', 'INV-', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(17, 'invoice_name', 'Bookin', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(18, 'invoice_email', 'support@bookin.com', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(19, 'invoice_phone', '+91987654321', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(20, 'invoice_address', 'East Coast Road', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(21, 'invoice_city', 'Chennai', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(22, 'invoice_state', 'Tamilnadu', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(23, 'invoice_zipcode', '600024', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(24, 'invoice_country', 'India', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(25, 'tax_name', 'Goods and Service Tax', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(26, 'tax_value', '18.99', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(27, 'tax_number', 'SPN125553322', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(28, 'email_heading', 'Thanks for using Bookin. This is an invoice for your recent purchase.', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(29, 'email_footer', 'If you’re having trouble with the button above, please login into your web browser.', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(30, 'invoice_footer', 'Thank you very much for doing business with us. We look forward to working with you again!', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(31, 'share_content', '150', '2024-03-08 03:39:48', '2024-05-06 21:15:18'),
(32, 'bank_transfer', '<p>Bank: FARM CREDIT BANK DN P&amp;I</p>\r\n<p>Bank Account Number: 18539734757</p>\r\n<p>Routing Number: 21054734 I</p>\r\n<p>BAN: IN94769888520201207044719366</p>\r\n<p>Bank: FARM CREDIT BANK DN P&amp;I</p>\r\n<p>Bank Account Number: 18539734757</p>\r\n<p>Routing Number: 21054734</p>\r\n<p>IBAN: IN94769888520201207044719366</p>', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(33, 'purchase_code', '10101010-10ss-D101-0101-a1b010a01b10', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(34, 'app_version', '2.0.0', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(35, 'default_country', '101', '2024-03-08 03:39:48', '2024-05-06 21:15:18'),
(36, 'default_key_1', 'default_value', '2024-03-08 03:39:48', '2024-05-06 21:15:18'),
(37, 'tiny_api_key', 'YOUR_TINY_API_KEY', '2024-03-08 03:39:48', '2024-05-06 21:15:18'),
(38, 'paystack_public_key', 'YOUR_PAYSTACK_PUBLIC_KEY', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(39, 'paystack_secret_key', 'YOUR_PAYSTACK_SECRET_KEY', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(40, 'paystack_payment_url', 'https://api.paystack.co', '2024-03-08 03:39:48', '2024-03-08 03:39:48'),
(41, 'merchant_email', 'YOUR_MERCHANT_EMAIL', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(42, 'mollie_key', 'YOUR_MOLLIE_KEY', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(43, 'image_length', '3', '2024-03-08 03:39:48', '2024-05-06 21:15:18'),
(44, 'show_website', 'yes', '2024-03-08 03:39:48', '2024-05-06 23:23:30'),
(45, 'transaction_cloud_api_key', 'YOUR_TRANSACTION_CLOUD_API_KEY', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(46, 'transaction_cloud_api_password', 'YOUR_TRANSACTION_CLOUD_API_PASSWORD', '2024-03-08 03:39:48', '2024-05-07 00:39:28'),
(47, 'image_model', 'dall-e-3', '2024-03-08 03:39:48', '2024-05-06 21:15:18'),
(48, 'text_speech_model', 'tts-1', '2024-03-08 03:39:48', '2024-05-06 21:15:18'),
(49, 'default_key_2', 'default_value_2', '2024-03-08 03:40:35', '2024-09-23 07:33:10'),
(50, 'show_whatsapp_chatbot', '1', '2024-05-07 04:22:18', '2024-05-06 23:23:30'),
(51, 'whatsapp_chatbot_mobile_number', '919876543210', '2024-05-07 04:22:18', '2024-05-06 23:23:30'),
(52, 'whatsapp_chatbot_message', 'Hello, I need some information', '2024-05-07 04:22:18', '2024-05-06 23:23:30'),
(53, 'disable_user_email_verification', '0', '2024-05-07 04:22:18', '2024-05-06 23:53:38'),
(54, 'merchantId', 'YOUR_PHONEPE_MERCHANT_ID', '2024-05-07 04:22:18', '2024-05-07 00:39:28'),
(55, 'saltKey', 'YOUR_PHONEPE_SALT_KEY', '2024-05-07 04:22:18', '2024-05-07 00:39:28'),
(56, 'mercado_pago_public_key', 'YOUR_MERCADO_PAGO_PUBLIC_KEY', '2024-09-17 01:46:29', '2024-09-17 01:46:29'),
(57, 'mercado_pago_access_token', 'YOUR_MERCADO_PAGO_ACCESS_TOKEN', '2024-09-17 01:46:29', '2024-09-17 01:46:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
