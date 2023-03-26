-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 26, 2023 lúc 06:46 AM
-- Phiên bản máy phục vụ: 5.7.25
-- Phiên bản PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datlichkhambenh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ActiveStatus` tinyint(4) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`ID`, `Password`, `Email`, `ActiveStatus`, `role`, `image`) VALUES
(1, '202cb962ac59075b964b07152d234b70', 'johnquyt@gmail.com', 1, 3, ''),
(3, '202cb962ac59075b964b07152d234b70', 'bacsi@gmail.com', 1, 2, ''),
(4, '202cb962ac59075b964b07152d234b70', 'levi@gmail.com', 1, 1, ''),
(5, '123', 'bacsi1@gmail.com', 1, 2, NULL),
(6, '202cb962ac59075b964b07152d234b70', 'bacsi1@gmail.com', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `appointments`
--

CREATE TABLE `appointments` (
  `ID` int(11) NOT NULL,
  `Patient ID` int(11) DEFAULT NULL,
  `Doctor ID` int(11) DEFAULT NULL,
  `Schedule ID` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `Status` enum('Confirmed','Canceled','Rescheduled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `appointments`
--

INSERT INTO `appointments` (`ID`, `Patient ID`, `Doctor ID`, `Schedule ID`, `Date`, `Time`, `Reason`, `Status`) VALUES
(6, 2, 1, 1, '2022-03-10', '14:00:00', 'Annual check-up', 'Confirmed'),
(7, 3, 2, 2, '2022-03-12', '10:30:00', 'Sore throat', 'Confirmed'),
(8, 6, 3, 3, '2022-03-14', '11:00:00', 'Follow-up on medication', 'Rescheduled'),
(9, 1, 4, 4, '2022-03-16', '15:15:00', 'Flu-like symptoms', 'Rescheduled'),
(10, 2, 5, 5, '2022-03-18', '09:00:00', 'Physical therapy', 'Canceled');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billing`
--

CREATE TABLE `billing` (
  `ID` int(11) NOT NULL,
  `Appointment ID` int(11) DEFAULT NULL,
  `Payment Amount` decimal(10,2) NOT NULL,
  `Payment Status` enum('Paid','Pending','Failed') NOT NULL,
  `Payment Method` enum('Credit Card','Cash','Check') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `billing`
--

INSERT INTO `billing` (`ID`, `Appointment ID`, `Payment Amount`, `Payment Status`, `Payment Method`) VALUES
(26, 10, '100.00', 'Paid', 'Credit Card'),
(27, 8, '75.00', 'Failed', 'Cash'),
(28, 9, '50.00', 'Pending', 'Check'),
(29, 6, '200.00', 'Paid', 'Credit Card'),
(30, 7, '150.00', 'Pending', 'Credit Card');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Gender` enum('Nam','Nữ','Khác','') NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `id_speciality` int(11) DEFAULT NULL,
  `LicenseNumber` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `id_account` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `doctors`
--

INSERT INTO `doctors` (`ID`, `Name`, `Gender`, `DOB`, `Email`, `PhoneNumber`, `id_speciality`, `LicenseNumber`, `Address`, `image`, `id_account`) VALUES
(1, 'Võ Tuyết Chanh', 'Nữ', '1991-06-26', 'bacsi@gmail.com', '0937645376', 1, '12345', 'Tà Đảnh, Tri Tôn, An Giang', 'assets/img/doctors/doctor-03.jpg', 3),
(2, 'Nguyễn Minh Khai', 'Nam', '1993-05-06', 'nthuy@gmail.com', '0376847562', 2, '048084', 'Kiến An, Chợ Mới, An Giang', 'assets/img/doctors/doctor-05.jpg', 5),
(3, 'Nguyễn Thị Chôm', 'Nữ', '1995-07-01', 'ntluom@gmail.com', '555-4824', 12, '345678', 'số 02_Võ Thị Sáu, Đông Xuyên, Long Xuyên, An Giang', 'assets/img/doctors/doctor-04.jpg', 6),
(4, 'Hồng Hà Nghi', 'Nữ', '1992-03-15', 'hhnghi@gmail.com', '034529468', 11, '45678', 'Vĩnh An, Châu Thành, An giang', 'assets/img/doctors/doctor-01.jpg', NULL),
(5, 'Nguyễn Ngọc Lang Băm', 'Nam', '0000-00-00', 'sirbs@gmail.com', '0986980221', NULL, '002243', 'Vĩnh Bình, Châu Thành, An Giang', 'assets/img/doctors/doctor-09.jpg', NULL),
(8, 'Lê Vi', 'Nam', '2023-03-02', 'abc@abc.com', '2334443', NULL, '3453454', 'Châu Thành - An Giang', 'images/', NULL),
(12, 'Bùi Văn Minh', 'Nam', '1998-09-23', 'abc@abc.com', '785432', 18, '123456', 'Rạch Giá- Kiên Giang', 'assets/img/doctorsdoctor-08.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doctorschedule`
--

CREATE TABLE `doctorschedule` (
  `ID` int(11) NOT NULL,
  `Doctor ID` int(11) NOT NULL,
  `scheduleDate` date NOT NULL,
  `scheduleDay` varchar(15) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `bookAvail` enum('Có sẵn','Không có sẵn') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `doctorschedule`
--

INSERT INTO `doctorschedule` (`ID`, `Doctor ID`, `scheduleDate`, `scheduleDay`, `startTime`, `endTime`, `bookAvail`) VALUES
(1, 3, '2023-03-03', 'Thứ hai', '07:00:00', '08:00:00', 'Có sẵn'),
(2, 4, '2023-03-12', 'Thứ tư', '08:00:00', '09:00:00', 'Có sẵn'),
(3, 5, '2023-03-12', 'Thứ tư', '09:00:00', '10:00:00', 'Có sẵn'),
(4, 2, '2023-03-14', 'Thứ sáu', '08:30:00', '10:00:00', 'Có sẵn'),
(5, 1, '2023-03-15', 'Thứ bảy', '02:00:00', '03:00:00', 'Có sẵn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `medical_history`
--

CREATE TABLE `medical_history` (
  `ID` int(11) NOT NULL,
  `Patient ID` int(11) DEFAULT NULL,
  `Diagnosis` varchar(255) NOT NULL,
  `Treatment` varchar(255) NOT NULL,
  `Allergies` varchar(255) NOT NULL,
  `Medications` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `medical_history`
--

INSERT INTO `medical_history` (`ID`, `Patient ID`, `Diagnosis`, `Treatment`, `Allergies`, `Medications`) VALUES
(1, 1, 'Hypertension', 'Prescribed medication and lifestyle changes', 'None', 'Lisinopril'),
(2, 2, 'Type 2 Diabetes', 'Prescribed medication and dietary changes', 'None', 'Metformin'),
(3, 3, 'Depression', 'Prescribed medication and therapy', 'None', 'Prozac'),
(4, 4, 'Asthma', 'Prescribed inhaler and avoiding triggers', 'Dust and pollen', 'Albuterol'),
(5, 5, 'Back pain', 'Physical therapy and pain medication', 'None', 'Ibuprofen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `Doctor ID` int(11) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` enum('Nam','Nữ','Khác','') NOT NULL,
  `id_account` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `patients`
--

INSERT INTO `patients` (`ID`, `Doctor ID`, `Name`, `Email`, `PhoneNumber`, `Address`, `DOB`, `Gender`, `id_account`) VALUES
(1, 1, 'Thái Hoàng Khang Hi', 'thkhang@gmail.com', '0963827364', 'Cai Lậy, Tiền Giang', '1995-06-12', 'Nam', 1),
(2, 1, 'Nguyễn Thành Lương', 'ltluong@gmail.com', '0348376592', 'Long Xuyên, An Giang', '1988-02-22', 'Nam', NULL),
(3, 2, 'Nguyễn Vĩnh Cùi', 'vinhcui@gmail.com', '0328300079', 'Chợ Mới, An Giang', '1977-11-04', 'Nam', NULL),
(4, NULL, 'Lê Minh Hổ', 'minhho@gmail.com', '555-1212', 'Chợ Cũ, An Giang', '1999-09-15', 'Nam', NULL),
(5, NULL, 'Lý Bạch', 'lybach@gmail.com', '555-1313', 'Châu Đốc, An Giang', '1992-12-30', 'Nam', NULL),
(6, NULL, 'Lê Thị Lựu', 'ltluu@gmail.com', '0364522823', 'Châu Thành, An Giang', '2001-01-07', 'Nữ', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `speciality`
--

CREATE TABLE `speciality` (
  `ID` int(11) NOT NULL,
  `Speciality` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `speciality`
--

INSERT INTO `speciality` (`ID`, `Speciality`, `image`) VALUES
(1, 'Tim mạch ', 'assets/img/specialities/specialities-04.png'),
(2, 'Đa khoa', 'assets/img/specialities/specialities-05.png'),
(11, 'Chấn thương chỉnh hình', 'assets/img/specialities/specialities-03.png'),
(12, 'Sản phụ khoa', 'assets/img/specialities/specialities-01.png'),
(14, 'Tiết niệu hre', ''),
(15, 'Xương cốt', 'assets/img/specialities/'),
(16, 'Xương cốt', 'assets/img/specialities/'),
(17, 'Xương cốt', 'assets/img/specialities/'),
(18, 'Be xường', 'assets/img/specialities/'),
(19, 'Be xường', 'assets/img/specialities/'),
(21, 'rw', 'assets/img/specialities/'),
(22, 'rw', 'assets/img/specialities/'),
(23, 'rw', 'assets/img/specialities/'),
(24, 'Be xường 10', 'assets/img/specialities/'),
(26, 'tai - mũi - họng', 'assets/img/specialities/'),
(27, 'Tai', 'assets/img/specialities/'),
(30, 'Chái Tym', 'assets/img/specialities/specialities-04.png'),
(31, 'Xương chậu', 'assets/img/specialities/specialities-01.png'),
(32, 'Xương cốt', 'assets/img/specialities/');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Patient ID` (`Patient ID`),
  ADD KEY `Doctor ID` (`Doctor ID`),
  ADD KEY `Schedule ID` (`Schedule ID`);

--
-- Chỉ mục cho bảng `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Appointment ID` (`Appointment ID`);

--
-- Chỉ mục cho bảng `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_speciality` (`id_speciality`);

--
-- Chỉ mục cho bảng `doctorschedule`
--
ALTER TABLE `doctorschedule`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Doctor ID` (`Doctor ID`);

--
-- Chỉ mục cho bảng `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Patient ID` (`Patient ID`);

--
-- Chỉ mục cho bảng `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `Doctor ID` (`Doctor ID`);

--
-- Chỉ mục cho bảng `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `billing`
--
ALTER TABLE `billing`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `doctorschedule`
--
ALTER TABLE `doctorschedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `speciality`
--
ALTER TABLE `speciality`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`Patient ID`) REFERENCES `patients` (`ID`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`Doctor ID`) REFERENCES `doctors` (`ID`);

--
-- Các ràng buộc cho bảng `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`Appointment ID`) REFERENCES `appointments` (`ID`);

--
-- Các ràng buộc cho bảng `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`ID`),
  ADD CONSTRAINT `speciality_fk_2` FOREIGN KEY (`id_speciality`) REFERENCES `speciality` (`ID`);

--
-- Các ràng buộc cho bảng `doctorschedule`
--
ALTER TABLE `doctorschedule`
  ADD CONSTRAINT `doctorschedule_ibfk_1` FOREIGN KEY (`Doctor ID`) REFERENCES `doctors` (`ID`);

--
-- Các ràng buộc cho bảng `medical_history`
--
ALTER TABLE `medical_history`
  ADD CONSTRAINT `medical_history_ibfk_1` FOREIGN KEY (`Patient ID`) REFERENCES `patients` (`ID`);

--
-- Các ràng buộc cho bảng `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_fk_1` FOREIGN KEY (`Doctor ID`) REFERENCES `doctors` (`ID`),
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
