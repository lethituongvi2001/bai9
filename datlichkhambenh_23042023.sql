-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 23, 2023 lúc 11:40 AM
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
-- Cơ sở dữ liệu: `datlichkhambenh2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ActiveStatus` tinyint(4) NOT NULL DEFAULT '1',
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
(6, '202cb962ac59075b964b07152d234b70', 'bacsi2@gmail.com', 1, 2, NULL),
(7, '202cb962ac59075b964b07152d234b70', 'deng@gmail.com', 1, 2, NULL),
(8, '202cb962ac59075b964b07152d234b70', 'deng1@gmail.com', 1, 2, NULL),
(9, '202cb962ac59075b964b07152d234b70', 'levi1@gmail.com', 1, 1, NULL),
(10, '202cb962ac59075b964b07152d234b70', 'ntde@gmail.com', 1, 2, NULL),
(11, '202cb962ac59075b964b07152d234b70', 'kimsa@gmail.com', 1, 2, NULL),
(15, '202cb962ac59075b964b07152d234b70', 'levi1@gmail.com', 1, 2, NULL),
(17, '202cb962ac59075b964b07152d234b70', 'phu@gmail.com', 1, 2, NULL),
(19, '202cb962ac59075b964b07152d234b70', 'levi2@gmail.com', 1, 2, NULL),
(21, '202cb962ac59075b964b07152d234b70', 'lechau@gmail.com', 1, 2, NULL),
(22, '202cb962ac59075b964b07152d234b70', 'ltreu@gmail.com', 1, 2, NULL),
(24, '202cb962ac59075b964b07152d234b70', 'hhnghi@gmail.com', 1, 2, NULL),
(25, '202cb962ac59075b964b07152d234b70', 'quan@gmail.com', 1, 2, NULL),
(27, '202cb962ac59075b964b07152d234b70', 'dauphu@gmail.com', 1, 2, NULL),
(31, '202cb962ac59075b964b07152d234b70', 'vansi@gmail.com', 1, 2, NULL),
(32, '202cb962ac59075b964b07152d234b70', 'vansi1@gmail.com', 1, 2, NULL),
(33, '202cb962ac59075b964b07152d234b70', 'hdbtran@gmail.com', 1, 2, NULL),
(34, '202cb962ac59075b964b07152d234b70', 'hdbtran1@gmail.com', 1, 2, NULL),
(35, '202cb962ac59075b964b07152d234b70', 'bena@gmail.com', 1, 3, NULL),
(36, '202cb962ac59075b964b07152d234b70', 'bena1@gmail.com', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `appointments`
--

CREATE TABLE `appointments` (
  `ID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `ScheduleID` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `Expected_cost` int(50) NOT NULL,
  `Status` enum('Hoàn thành','Đang diễn ra','Đã Hủy','') NOT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `appointments`
--

INSERT INTO `appointments` (`ID`, `PatientID`, `DoctorID`, `ScheduleID`, `Date`, `Reason`, `Expected_cost`, `Status`, `create_at`) VALUES
(6, 2, 1, 1, '2022-03-10', 'Annual check-up', 50000, 'Hoàn thành', '2023-01-01'),
(7, 3, 2, 2, '2022-03-12', 'Sore throat', 0, 'Hoàn thành', '2023-02-01'),
(8, 6, 3, 3, '2022-03-14', 'Follow-up on medication', 0, 'Hoàn thành', '2023-03-01'),
(9, 1, 4, 4, '2022-03-16', 'Flu-like symptoms', 0, 'Hoàn thành', '2023-04-01'),
(10, 2, 5, 5, '2022-03-18', 'Physical therapy', 0, 'Hoàn thành', '2023-05-01'),
(11, 3, NULL, NULL, '1970-01-01', 'thaats tinhf', 1000000, 'Đang diễn ra', NULL);

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
  `id_account` int(11) DEFAULT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `doctors`
--

INSERT INTO `doctors` (`ID`, `Name`, `Gender`, `DOB`, `Email`, `PhoneNumber`, `id_speciality`, `LicenseNumber`, `Address`, `image`, `id_account`, `create_at`) VALUES
(1, 'Võ Tuyết Chanh', 'Nữ', '1991-06-26', 'bacsi@gmail.com', '0937645376', 2, '12345', 'Tà Đảnh, Tri Tôn, An Giang', 'assets/img/doctors/doctor-03.jpg', 3, NULL),
(2, 'Nguyễn Minh Khai', 'Nữ', '1993-05-06', 'nthuy@gmail.com', '0376847562', 2, '048084', 'Kiến An, Chợ Mới, An Giang', 'assets/img/doctorsdoctor-02.jpg', 5, NULL),
(3, 'Nguyễn Thị Chôm', 'Nữ', '1995-07-01', 'ntluom@gmail.com', '555-4824', 12, '345678', 'số 02_Võ Thị Sáu, Đông Xuyên, Long Xuyên, An Giang', 'assets/img/doctors/doctor-04.jpg', 6, NULL),
(4, 'Hồng Hà Nghi', 'Nữ', '1992-03-15', 'hhnghi@gmail.com', '034529468', 11, '45678', 'Vĩnh An, Châu Thành, An giang', 'assets/img/doctors/doctor-07.jpg', 24, NULL),
(5, 'Nguyễn Ngọc Lang Băm', 'Nữ', '1996-06-05', 'nnlanh@gmail.com', '0986980221', 12, '002243', 'Vĩnh Bình, Châu Thành, An Giang', 'assets/img/doctors/doctor-04.jpg', 7, NULL),
(12, 'Bùi Văn Minh', 'Nữ', '1998-09-23', 'abc@abc.com', '785432', 18, '123456', 'Rạch Giá- Kiên Giang', 'assets/img/doctorsdoctor-08.jpg', 34, NULL),
(13, 'Hai Lúa', 'Nữ', '1970-01-01', 'deng1@gmail.com', '122', 19, '2233', '111', 'assets/img/doctors57.jpg', 8, NULL),
(14, 'Lê Văn Tèo', 'Nam', '1999-03-03', 'lvteo@gmail.com', '09837462', 2, '767463', 'Phú Quốc- Kiên Giang', 'assets/img/doctors/doctor-05.jpg', 9, NULL),
(15, 'Nguyễn Thị Dễ', 'Nữ', '1987-07-05', 'ntde@gmail.com', '0928746422', 1, '123456', 'Cái Bè - Tiền Giang', 'assets/img/doctorsdoctor-10.jpg', 10, NULL),
(16, 'Nguyễn Kim Ngân', 'Nữ', '1991-06-12', 'kimngan@gmail.com', '0983734643', 1, '746583', 'Lấp Vò - Đồng Tháp', 'assets/img/doctors/doctor-06.jpg', 11, NULL),
(20, 'naly Bùi', 'Nữ', '1998-12-22', 'levi@gmail.com', '2334443', 2, '123456', 'Hà Tiên- Kiên Giang', 'assets/img/doctors/doctor-11.jpg', 15, NULL),
(22, 'Nguyễn Văn Phú', 'Nữ', '1997-06-30', 'phu@gmail.com', '785432', 1, '767463', 'Phú Quốc- Kiên Giang', 'assets/img/doctors/doctor-12.jpg', 17, NULL),
(26, 'Châu Lê', 'Nữ', '1990-06-13', 'lechau@gmail.com', '2334443', 1, '3453454', 'Châu Thành - An Giang', 'assets/img/doctorsdoctor-thumb-01.jpg', 21, NULL),
(27, 'Lê Thị rêu', 'Nữ', '1995-01-07', 'ltreu@gmail.com', '0986736452', 2, '983349', 'Đồng Văn -  Hà Giang', 'assets/img/doctorsdoctor-thumb-07.jpg', 22, NULL),
(29, 'Táo Quân', 'Nam', '1996-01-07', 'quan@gmail.com', '23344433434433434', NULL, '3453454', 'Châu Phú - An Giang', 'assets/img/doctorsdoctor-12.jpg', 25, NULL),
(30, 'Lê Thị Đậu Phụ', 'Nữ', '1982-06-14', 'dauphu@gmail.com', '2334443', 11, '123456', 'Châu Thành - An Giang', 'assets/img/doctorsdoctor-10.jpg', 27, NULL),
(34, 'Thêm Văn Sĩ', 'Nam', '1987-07-17', 'vansi@gmail.com', '2334443', 1, '3453454', 'Châu Phú - An Giang', 'assets/img/doctorsdoctor-02.jpg', 31, NULL),
(36, 'Huỳnh  Diệp Bảo Trân', 'Nữ', '1989-10-18', 'hdbtran@gmail.com', '785432', 2, '3453454', 'Châu Phú - An Giang', 'assets/img/doctorsdoctor-11.jpg', 33, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doctorschedule`
--

CREATE TABLE `doctorschedule` (
  `ID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `scheduleDay` varchar(15) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `bookAvail` enum('Có sẵn','Không có sẵn') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `doctorschedule`
--

INSERT INTO `doctorschedule` (`ID`, `DoctorID`, `scheduleDay`, `startTime`, `endTime`, `bookAvail`) VALUES
(1, 3, 'Thứ hai', '07:00:00', '08:00:00', 'Có sẵn'),
(2, 4, 'Thứ tư', '08:00:00', '09:00:00', 'Có sẵn'),
(3, 5, 'Thứ tư', '09:00:00', '10:00:00', 'Có sẵn'),
(5, 1, 'Thứ hai', '02:00:00', '03:00:00', 'Không có sẵn'),
(15, 1, 'Chủ nhật', '09:01:00', '09:30:00', 'Có sẵn'),
(17, 4, 'Thứ hai', '01:30:00', '02:00:00', 'Có sẵn'),
(18, 3, 'Thứ hai', '03:00:00', '03:30:00', 'Có sẵn'),
(19, 4, 'Thứ hai', '01:30:00', '02:00:00', 'Có sẵn'),
(20, 2, 'Thứ sáu', '03:00:00', '04:00:00', 'Có sẵn'),
(21, 2, 'Thứ hai', '02:30:00', '03:00:00', 'Có sẵn'),
(22, 3, 'Thứ tư', '06:00:00', '06:30:00', 'Không có sẵn'),
(23, 3, 'Thứ bảy', '06:00:00', '06:30:00', 'Có sẵn'),
(24, 5, 'Thứ ba', '09:30:00', '10:00:00', 'Có sẵn'),
(25, 2, 'Thứ năm', '07:00:00', '07:30:00', 'Có sẵn'),
(26, 2, 'Thứ ba', '09:30:00', '10:30:00', 'Có sẵn'),
(27, 2, 'Thứ ba', '06:00:00', '06:30:00', 'Có sẵn'),
(28, 2, 'Thứ ba', '06:00:00', '06:30:00', 'Có sẵn'),
(29, 2, 'Thứ tư', '09:30:00', '10:00:00', 'Có sẵn'),
(30, 4, 'Thứ hai', '11:00:00', '11:30:00', 'Có sẵn'),
(32, 4, 'Thứ hai', '12:00:00', '12:31:00', 'Có sẵn'),
(33, 4, 'Thứ năm', '10:00:00', '11:30:00', 'Có sẵn');

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
  `Name` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` enum('Nam','Nữ','Khác','') NOT NULL,
  `id_account` int(11) DEFAULT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `patients`
--

INSERT INTO `patients` (`ID`, `Name`, `Email`, `PhoneNumber`, `Address`, `DOB`, `Gender`, `id_account`, `create_at`) VALUES
(1, 'Thái Hoàng Khang', 'thkhang@gmail.com', '0963827364', 'Cai Lậy, Tiền Giang', '1995-06-12', 'Nam', 1, NULL),
(2, 'Nguyễn Thành Lương', 'ltluong@gmail.com', '0348376592', 'Long Xuyên, An Giang', '1988-02-22', 'Nam', NULL, NULL),
(3, 'Nguyễn Vĩnh Cùi', 'vinhcui@gmail.com', '0328300079', 'Chợ Mới, An Giang', '1977-11-04', 'Nam', NULL, NULL),
(4, 'Lê Minh Hổ', 'minhho@gmail.com', '555-1212', 'Chợ Cũ, An Giang', '1999-09-15', 'Nam', NULL, NULL),
(5, 'Lý Bạch', 'lybach@gmail.com', '555-1313', 'Châu Đốc, An Giang', '1992-12-30', 'Nam', 36, NULL),
(6, 'Lê Thị Lựu', 'ltluu@gmail.com', '0364522823', 'Châu Thành, An Giang', '2001-01-07', 'Nữ', NULL, NULL),
(9, 'Bùi Bé Thơ', 'thobui@gmail.com', '2334443', 'Châu Phú - An Giang', '1998-09-02', 'Nữ', NULL, NULL),
(11, 'Bùi Bé Hai', 'behai@gmail.com', '03938437', 'Tân Châu-An Giang', '1986-04-20', 'Nam', NULL, NULL),
(13, 'Bùi Bé Naa', 'bena@gmail.com', '02928373', 'Châu Phú - An Giang', '2004-11-04', 'Nam', 35, NULL);

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
(1, 'Tim mạch ', 'assets/img/specialities/8.jpg'),
(2, 'Đa khoa', 'assets/img/img-04.jpg'),
(11, 'Chấn thương chỉnh hình', 'assets/img/specialities/specialities-03.png'),
(12, 'Sản phụ khoa', 'assets/img/img-01.jpg'),
(18, 'Tiết niệu', 'assets/img/specialities/specialities-01.png'),
(19, 'Răng-hàm-mặt', 'assets/img/specialities/specialities-05.png'),
(31, 'Tai-mũi-họng', 'assets/img/specialities/specialities-01.png'),
(44, 'Xương khớp 1', 'assets/img/doctorsspecialities-03.png'),
(45, 'Y học cổ truyền', 'assets/img/specialities/specialities-01.png');

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
  ADD KEY `Patient ID` (`PatientID`),
  ADD KEY `Doctor ID` (`DoctorID`),
  ADD KEY `Schedule ID` (`ScheduleID`);

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
  ADD KEY `Doctor ID` (`DoctorID`);

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
  ADD KEY `id_account` (`id_account`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `billing`
--
ALTER TABLE `billing`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `doctorschedule`
--
ALTER TABLE `doctorschedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `speciality`
--
ALTER TABLE `speciality`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`ID`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`ID`);

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
  ADD CONSTRAINT `doctorschedule_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`ID`);

--
-- Các ràng buộc cho bảng `medical_history`
--
ALTER TABLE `medical_history`
  ADD CONSTRAINT `medical_history_ibfk_1` FOREIGN KEY (`Patient ID`) REFERENCES `patients` (`ID`);

--
-- Các ràng buộc cho bảng `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
