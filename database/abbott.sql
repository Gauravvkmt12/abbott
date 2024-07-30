-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 08:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abbott`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(25) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_link` varchar(150) NOT NULL,
  `THERAPY` varchar(200) NOT NULL,
  `product_descrption` text NOT NULL,
  `Business` varchar(50) NOT NULL,
  `MOLECULE` varchar(50) NOT NULL,
  `FORM` varchar(60) NOT NULL,
  `STRENGTH` varchar(60) NOT NULL,
  `BUSINESS_AREAS` varchar(100) NOT NULL,
  `uncol` int(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_link`, `THERAPY`, `product_descrption`, `Business`, `MOLECULE`, `FORM`, `STRENGTH`, `BUSINESS_AREAS`, `uncol`) VALUES
(1, 'ABBOTT PRISM Director', 'https://labcentral.corelaboratory.abbott/int/en/home.html', '', '', '', '', '', '', '', 0),
(2, 'ACITROM', '', '2', '', 'Abbott Healthcare Solutions', 'Nicoumalone I.P', 'Tablet', '0.5 mg, 1 mg, 2 mg, 3 mg, 4 mg', 'Pharmaceuticals', 1),
(3, 'ACUVIN', '', '7', '', ' Abbott Healthcare Solutions', ' Tramadol Hydrochloride and Paracetamol', 'Tablet', 'Tramadol Hydrochloride I.P. 37.5 mg + Paracetamol IP 325.0 m', ' Pharmaceuticals', 1),
(4, 'AGGRIBLOC', '', '2', 'Aggribloc 5mg Infusion is a blood thinner which prevents formation of harmful blood clots. It helps to prevent a heart attack in patients presenting with severe chest pain due to a sudden decrease in blood flow to the heart.\r\n', 'Abbott Healthcare Solutions', 'Tirofiban Hydrochloride and Sodium Chloride', 'Injection', 'Tirofiban Hydrochloride 5mg + Sodium Chloride 0.9% w/v', 'Pharmaceuticals', 1),
(6, 'BACTRIM D.S.', '', '1', '', 'Abbott Healthcare Solutions', 'Sulfamethoxazole and Trimethoprim', 'Tablet', 'Sulfamethoxazole 800mg + Trimethoprim 160mg', ' Pharmaceuticals', 1),
(7, 'B-CRIP 1.25', '', '9', '', ' Abbott India Limited', ' Bromocriptine Mesylate IP Equivalent to Bromocrip', 'Tablet', ' 1.25mg; 2.5 mg', 'Pharmaceuticals', 1),
(8, 'BAERVELDT', 'https://www.jnjvisionpro.com/products/surgical-systems/lasik?check_ous=1', '', '', '', '', '', '', '', 0),
(9, 'BECOZYM C FORTE', '', '', '', ' Abbott Healthcare Solutions', 'Thiamine Mononitrate, Riboflavine, Nicotinamide, P', 'Tablet', 'Thiamine Mononitrate I.P. 10.0mg Riboflavine I.P. 10.0mg Nic', 'Pharmaceuticals', 1),
(10, 'BIOSUGANRIL', '', '7', '', ' Abbott Healthcare Solutions', 'Serratiopeptidase IP', 'Tablet', '5 mg, 10 mg, 20 mg', 'Pharmaceuticals', 1),
(11, 'Azro', '', '1', '', 'Abbott Truecare', ' Azithromycin', 'Tablet', '250mg; 500mg', 'Pharmaceuticals', 1),
(12, 'CAAT F', '', '', '', ' Abbott Healthcare Solutions', 'Atorvastatin Calcium and Fenofibrate IP (Nano Part', 'Tablet', 'Atorvastatin Calcium 10 mg + Fenofibrate IP (Nano Particle) ', 'Pharmaceuticals', 1),
(13, 'CAAT', '', '2', '', 'Abbott Healthcare Solutions', 'Atorvastatin calcium', 'Tablet', '10mg, 20mg, 40mg, 80 mg', ' Pharmaceuticals', 1),
(14, 'CATALYAS', 'http://www.amo-inc.com/products/cataract/laser-cataract-surgery/catalys-laser-system', '', '', '', '', '', '', '', 0),
(15, 'CEFI-T 562.5', '', '1', '', 'Abbott Healthcare Solutions', ' Cefepime and Tazobactam', 'Injection', 'Cefepime 500 mg + Tazobactam 62.5 mg', ' Pharmaceuticals', 1),
(16, 'CELEX OD', '', '1', '', 'Abbott Healthcare Solutions', 'Clarithromycin ', 'Tablet', '500 mg', ' Pharmaceuticals', 1),
(17, 'D3 SHOT SACHETS 1GM 60 K IU', '', '2', '', 'Abbott Healthcare Solutions', 'Cholecalciferol I.P', 'Sachet', 'Each sachet of 1 gm contains Cholecalciferol I.P 60,000 I.U.', 'Pharmaceuticals', 1),
(18, 'D3 UP', '', '2', '', ' Abbott Healthcare Solutions', 'Cholecalciferol IP 60,000 I.U.', 'Sachet', '60,000 I.U.', ' Pharmaceuticals', 1),
(19, 'DELOK', '', '19', '', ' Abbott Healthcare Solutions', 'Duloxetine HCI', 'Capsule', ' 20 mg; 30 mg; 40 mg; 60 mg', ' Pharmaceuticals', 1),
(20, 'DIABETROL', '', '2', '', 'Abbott Healthcare Solutions', 'Glibenclamide I.P., Metformin HCI', 'Tablet', 'Glibenclamide 5 mg + Metformin 500 mg', ' Pharmaceuticals', 1);

-- --------------------------------------------------------

--
-- Table structure for table `therpy`
--

CREATE TABLE `therpy` (
  `id` int(50) NOT NULL,
  `therpy_name` varchar(100) NOT NULL,
  `therpydesciption` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therpy`
--

INSERT INTO `therpy` (`id`, `therpy_name`, `therpydesciption`) VALUES
(1, 'ANTI-INFECTIVES', ''),
(2, 'CARDIO-DIABETO', ''),
(3, 'GI &amp; HEPATO', ''),
(4, 'HORMONES', ''),
(5, 'NEURO-PSYCHIAT', ''),
(6, 'OTHERS', ''),
(7, 'PAIN MGMT', ''),
(8, 'RESPIRATORY', ''),
(9, 'WOMEN\'S HEALTH', ''),
(10, 'HEPATIC', ''),
(11, 'NEUROSCIENCE', ''),
(12, 'METABOLICS', ''),
(13, 'VACCINE', ''),
(14, 'GENNEXT', ''),
(15, 'CONSUMER CARE', ''),
(16, 'GASTRO', ''),
(19, 'NEURO-PSYCHIAT', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therpy`
--
ALTER TABLE `therpy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `therpy`
--
ALTER TABLE `therpy`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
