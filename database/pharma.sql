-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 09:19 AM
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
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_submissions`
--

CREATE TABLE `form_submissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_submissions`
--

INSERT INTO `form_submissions` (`id`, `name`, `email`, `message`, `submission_date`) VALUES
(1, 'gaurav', 'gaurav@gmail.com', 'hello', '2024-08-26 07:18:55');

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
(2, 'ACITROM', '', '15', '', 'Abbott Healthcare Solutions', 'Nicoumalone I.P', 'Tablet', '0.5 mg, 1 mg, 2 mg, 3 mg, 4 mg', 'Pharmaceuticals', 1),
(3, 'ACUVIN', '', '7', '', ' Abbott Healthcare Solutions', ' Tramadol Hydrochloride and Paracetamol', 'Tablet', 'Tramadol Hydrochloride I.P. 37.5 mg + Paracetamol IP 325.0 m', ' Pharmaceuticals', 1),
(4, 'AGGRIBLOC', '', '20', 'Aggribloc 5mg Infusion is a blood thinner which prevents formation of harmful blood clots. It helps to prevent a heart attack in patients presenting with severe chest pain due to a sudden decrease in blood flow to the heart.\r\n', 'Abbott Healthcare Solutions', 'Tirofiban Hydrochloride and Sodium Chloride', 'Injection', 'Tirofiban Hydrochloride 5mg + Sodium Chloride 0.9% w/v', 'Pharmaceuticals', 1),
(6, 'BACTRIM D.S.', '', '1', '', 'Abbott Healthcare Solutions', 'Sulfamethoxazole and Trimethoprim', 'Tablet', 'Sulfamethoxazole 800mg + Trimethoprim 160mg', ' Pharmaceuticals', 1),
(7, 'B-CRIP 1.25', '', '9', '', ' Abbott India Limited', ' Bromocriptine Mesylate IP Equivalent to Bromocrip', 'Tablet', ' 1.25mg; 2.5 mg', 'Pharmaceuticals', 1),
(8, 'BAERVELDT', 'https://www.jnjvisionpro.com/products/surgical-systems/lasik?check_ous=1', '', '', '', '', '', '', '', 0),
(9, 'BECOZYM C FORTE', '', '', '', ' Abbott Healthcare Solutions', 'Thiamine Mononitrate, Riboflavine, Nicotinamide, P', 'Tablet', 'Thiamine Mononitrate I.P. 10.0mg Riboflavine I.P. 10.0mg Nic', 'Pharmaceuticals', 1),
(10, 'BIOSUGANRIL', '', '7', '', ' Abbott Healthcare Solutions', 'Serratiopeptidase IP', 'Tablet', '5 mg, 10 mg, 20 mg', 'Pharmaceuticals', 1),
(11, 'Azro', '', '1', '', 'Abbott Truecare', ' Azithromycin', 'Tablet', '250mg; 500mg', 'Pharmaceuticals', 1),
(12, 'CAAT F', '', '', '', ' Abbott Healthcare Solutions', 'Atorvastatin Calcium and Fenofibrate IP (Nano Part', 'Tablet', 'Atorvastatin Calcium 10 mg + Fenofibrate IP (Nano Particle) ', 'Pharmaceuticals', 1),
(13, 'CAAT', '', '20', '', 'Abbott Healthcare Solutions', 'Atorvastatin calcium', 'Tablet', '10mg, 20mg, 40mg, 80 mg', ' Pharmaceuticals', 1),
(14, 'CATALYAS', 'http://www.amo-inc.com/products/cataract/laser-cataract-surgery/catalys-laser-system', '', '', '', '', '', '', '', 0),
(15, 'CEFI-T 562.5', '', '1', '', 'Abbott Healthcare Solutions', ' Cefepime and Tazobactam', 'Injection', 'Cefepime 500 mg + Tazobactam 62.5 mg', ' Pharmaceuticals', 1),
(16, 'CELEX OD', '', '1', '', 'Abbott Healthcare Solutions', 'Clarithromycin ', 'Tablet', '500 mg', ' Pharmaceuticals', 1),
(17, 'D3 SHOT SACHETS 1GM 60 K IU', '', '20', '', 'Abbott Healthcare Solutions', 'Cholecalciferol I.P', 'Sachet', 'Each sachet of 1 gm contains Cholecalciferol I.P 60,000 I.U.', 'Pharmaceuticals', 1),
(18, 'D3 UP', '', '20', '', ' Abbott Healthcare Solutions', 'Cholecalciferol IP 60,000 I.U.', 'Sachet', '60,000 I.U.', ' Pharmaceuticals', 1),
(19, 'DELOK', '', '19', '', ' Abbott Healthcare Solutions', 'Duloxetine HCI', 'Capsule', ' 20 mg; 30 mg; 40 mg; 60 mg', ' Pharmaceuticals', 1),
(20, 'DIABETROL', '', '20', '', 'Abbott Healthcare Solutions', 'Glibenclamide I.P., Metformin HCI', 'Tablet', 'Glibenclamide 5 mg + Metformin 500 mg', ' Pharmaceuticals', 1),
(32, 'EBILITY', '', '', '', '', 'Diclofenac Potassium, Serratio Peptidase, Paraceta', 'Tablet', 'Diclofenac Potassium 50mg + Serratio Peptidase 10mg + Parace', 'Pharmaceuticals', 1),
(33, 'EN-ACE D 10 mg', '', '20', '', ' Abbott Healthcare Solutions', 'Enalpril Maleate and Hydrochlorothiazide', 'Tablet', ' Enalpril Maleate 10 mg + Hydrochlorothiazide 25 mg', 'Pharmaceuticals', 1),
(34, 'EN-ACE D 2.5 mg', '', '20', '', 'Abbott Healthcare Solutions', 'Enalpril Maleate and Hydrochlorothiazide', 'Tablet', 'Enalpril Maleate 2.5 mg + Hydrochlorothiazide 12.5 mg', 'Pharmaceuticals', 1),
(35, 'EN-ACE D 5 mg', '', '20', '', 'Abbott Healthcare Solutions', 'Enalpril Maleate and Hydrochlorothiazide', 'Tablet', 'Enalpril Maleate 5 mg + Hydrochlorothiazide 12.5 mg', 'Pharmaceuticals', 1),
(36, 'EN-ACE', '', '20', '', 'Abbott Healthcare Solutions', 'Enalapril maleate', 'Tablet', '2.5 mg, 5 mg, 10 mg', 'Pharmaceuticals', 1),
(37, 'FAMTAC', '', '3', '', 'Abbott Healthcare Solutions', 'Famotidine', 'Tablet', '20 mg; 40 mg', 'Pharmaceuticals', 1),
(38, 'FISH', 'http://www.abbottmolecular.com/us/products/oncology.html', '', '', '', '', '', '', '', 0),
(39, 'FLAGYL SUSPENSION', '', '1', '', 'Abbott Healthcare Solutions ', 'Metronidazole', 'Suspension', 'Each 5ml of suspension contains Metronidazole Benzoate IP 20', 'Pharmaceuticals', 1),
(40, 'FLAGYL', '', '1', '', ' Abbott Healthcare Solutions', 'Metronidazole', 'Tablet', '200 mg; 400 mg', ' Pharmaceuticals', 1),
(41, 'FORTIUS', '', '20', '', 'Abbott Healthcare Solutions', 'Rosuvastatin Calcium', 'Tablet', ' 5 mg, 10 mg', 'Pharmaceuticals', 1),
(42, 'GARDENAL', '', '19', '', 'Abbott Healthcare Solutions', 'Phenobarbitone I.P.', 'Tablet', '30 mg; 60 mg', ' Pharmaceuticals', 1),
(43, 'GAROIN', '', '19', '', 'Abbott Healthcare Solutions', 'Phenytoin Sodium I.P. and Phenobarbitone Sodium I.', 'Tablet', 'Phenytoin Sodium I.P. 100 mg + Phenobarbitone Sodium I.P. 50', 'Pharmaceuticals', 1),
(44, 'Glucerna (Healthcare Professionals)', 'https://www.abbottnutrition.com/our-products', '', '', '', '', '', '', '', 0),
(45, 'Gentle Toner', '', '', '', '', ' Avene Thermal Spring water (Avene Aqua), Fragranc', 'Liquid', 'Avene Thermal Spring water (Avene Aqua) + Fragrance (parfum)', 'Pharmaceuticals', 1),
(46, 'GENTICYN Injection 80 mg', '', '', '', '', 'Gentamicin sulphate', 'Injection', 'Each ampoule contains: 60 mg of Gentamicin sulphate I.P.=Gen', ' Pharmaceuticals', 1),
(47, 'PARAXIN SUSPENSION', '', '1', '', ' Abbott Healthcare Solutions', 'Chloramphenicol palmitate', 'Suspension', 'Each 5ml of the suspension contains Chloramphenicol palmitat', 'Pharmaceuticals', 1),
(48, 'Perative', 'https://www.abbottnutrition.com/our-products/perative', '', '', '', '', '', '', '', 0);

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
(19, 'NEURO-PSYCHIAT', ''),
(20, 'CARDIO-DIABETO', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'gaurav', 'gaurav', 'gaurav@gmail.com', '29be54a52396750258d886abc5417fda'),
(4, 'gaurav', 'gauravv', 'gaurav@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_submissions`
--
ALTER TABLE `form_submissions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_submissions`
--
ALTER TABLE `form_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `therpy`
--
ALTER TABLE `therpy`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
