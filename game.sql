-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 11, 2024 lúc 01:09 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `game`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `Id` int(255) NOT NULL,
  `Account` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ThietBiDangNhap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`Id`, `Account`, `Password`, `ThietBiDangNhap`) VALUES
(1, 'LIXI66TOP', '02f19a182629f8864ab9a55e3e230e54', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangtop`
--

CREATE TABLE `bangtop` (
  `Top` varchar(255) NOT NULL,
  `IdTelegram` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `TongTienChoi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bankcode`
--

CREATE TABLE `bankcode` (
  `IdTelegram` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bankinglist`
--

CREATE TABLE `bankinglist` (
  `Name` varchar(255) NOT NULL,
  `Stk` varchar(255) NOT NULL,
  `SoDu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `becau`
--

CREATE TABLE `becau` (
  `IdTelegram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blacklist`
--

CREATE TABLE `blacklist` (
  `IdTelegram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blockchat`
--

CREATE TABLE `blockchat` (
  `IdTelegram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blockcuocbantaixiu`
--

CREATE TABLE `blockcuocbantaixiu` (
  `On_Off` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blockcuocbongda`
--

CREATE TABLE `blockcuocbongda` (
  `On_Off` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blockspam`
--

CREATE TABLE `blockspam` (
  `IdTelegram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat`
--

CREATE TABLE `chat` (
  `Id` int(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `TimeInit` varchar(255) NOT NULL,
  `IdNguoiGui` varchar(255) NOT NULL,
  `IdNguoiNhan` varchar(255) NOT NULL,
  `Mess` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `client`
--

CREATE TABLE `client` (
  `TimeInit` varchar(255) NOT NULL,
  `Token` varchar(255) NOT NULL,
  `Ip` varchar(255) NOT NULL,
  `Device` varchar(255) NOT NULL,
  `Region` varchar(255) NOT NULL,
  `UrlAccess` varchar(255) NOT NULL,
  `ActiveTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `deposit_history`
--

CREATE TABLE `deposit_history` (
  `Id` int(255) NOT NULL,
  `TimeInit` varchar(255) NOT NULL,
  `IdTelegram` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `AppBanking` varchar(255) NOT NULL,
  `TenTaiKhoan` varchar(255) NOT NULL,
  `SoTienNap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doncuocbantaixiu`
--

CREATE TABLE `doncuocbantaixiu` (
  `IdTelegram` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `Cau` varchar(255) NOT NULL,
  `TienCuoc` varchar(255) NOT NULL,
  `TrangThai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doncuocbongda`
--

CREATE TABLE `doncuocbongda` (
  `TimeInit` varchar(255) NOT NULL,
  `IdTelegram` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `SoTienCuoc` varchar(255) NOT NULL,
  `Doi` varchar(255) NOT NULL,
  `Keo` varchar(255) NOT NULL,
  `TiLeKeo` varchar(255) NOT NULL,
  `TrangThai` varchar(255) NOT NULL,
  `TraThuong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doncuocsoxo`
--

CREATE TABLE `doncuocsoxo` (
  `TimeInit` varchar(255) NOT NULL,
  `IdTelegram` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `NoiDungCuoc` varchar(255) NOT NULL,
  `SoTienCuoc` varchar(255) NOT NULL,
  `SoDuDoan` varchar(255) NOT NULL,
  `TrangThai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gamehistory`
--

CREATE TABLE `gamehistory` (
  `Id` int(255) NOT NULL,
  `TimeInit` varchar(255) NOT NULL,
  `IdTelegram` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `TroChoi` varchar(255) NOT NULL,
  `DaChon` varchar(255) NOT NULL,
  `SoTien` varchar(255) NOT NULL,
  `KetQua` varchar(255) NOT NULL,
  `KetQua1` varchar(255) NOT NULL,
  `TraThuong` varchar(255) NOT NULL,
  `SaoKe` varchar(255) NOT NULL,
  `GhiChu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giftcode`
--

CREATE TABLE `giftcode` (
  `Id` int(255) NOT NULL,
  `TimeInit` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `Money` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giftcodehistory`
--

CREATE TABLE `giftcodehistory` (
  `Id` int(255) NOT NULL,
  `TimeInit` varchar(255) NOT NULL,
  `IdTelegram` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `Money` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `keobongda`
--

CREATE TABLE `keobongda` (
  `Giai` varchar(255) NOT NULL,
  `UrlGiai` varchar(800) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Gio` varchar(255) NOT NULL,
  `DoiBan` varchar(255) NOT NULL,
  `DoiNha` varchar(255) NOT NULL,
  `UrlDoiNha` varchar(800) NOT NULL,
  `UrlDoiBan` varchar(800) NOT NULL,
  `LoaiKeoChapCaTran` varchar(255) NOT NULL,
  `TiLeKeoChapCaTran1` varchar(255) NOT NULL,
  `TiLeKeoChapCaTran2` varchar(255) NOT NULL,
  `LoaiKeoTaiXiuCaTran` varchar(255) NOT NULL,
  `TiLeKeoTaiXiuCaTran1` varchar(255) NOT NULL,
  `TiLeKeoTaiXiuCaTran2` varchar(255) NOT NULL,
  `LoaiKeoChapH1` varchar(255) NOT NULL,
  `TiLeKeoChapH1_1` varchar(255) NOT NULL,
  `TiLeKeoChapH1_2` varchar(255) NOT NULL,
  `LoaiKeoTaiXiuH1` varchar(255) NOT NULL,
  `TiLeKeoTaiXiuH1_1` varchar(255) NOT NULL,
  `TiLeKeoTaiXiuH1_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsuruttien`
--

CREATE TABLE `lichsuruttien` (
  `Id` int(255) NOT NULL,
  `TimeInit` varchar(255) NOT NULL,
  `IdTelegram` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `AppBanking` varchar(255) NOT NULL,
  `SoTaiKhoan` varchar(255) NOT NULL,
  `SoTienRut` varchar(255) NOT NULL,
  `TrangThai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momocode`
--

CREATE TABLE `momocode` (
  `IdTelegram` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momolist`
--

CREATE TABLE `momolist` (
  `Name` varchar(255) NOT NULL,
  `Sdt` varchar(255) NOT NULL,
  `SoDu` varchar(255) NOT NULL,
  `Token` varchar(255) NOT NULL,
  `UrlCallBack` varchar(255) NOT NULL,
  `HanMuc` varchar(255) NOT NULL,
  `CuocMin` varchar(255) NOT NULL,
  `CuocMax` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sotienrut`
--

CREATE TABLE `sotienrut` (
  `SoTienRut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sotienrut`
--

INSERT INTO `sotienrut` (`SoTienRut`) VALUES
('1000 ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongkegamemomo`
--

CREATE TABLE `thongkegamemomo` (
  `Id` int(255) NOT NULL,
  `IdTelegram` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `TongTienCuoc` varchar(255) NOT NULL,
  `TongTienThangCuoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongkegametele`
--

CREATE TABLE `thongkegametele` (
  `Id` int(255) NOT NULL,
  `IdTelegram` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `TongTienCuoc` varchar(255) NOT NULL,
  `TongTienThangCuoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongkenguoichoi`
--

CREATE TABLE `thongkenguoichoi` (
  `Id` int(255) NOT NULL,
  `IdTelegram` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `TongTienCuoc` varchar(255) NOT NULL,
  `TongTienThangCuoc` varchar(255) NOT NULL,
  `SoLanChoi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `Id` int(255) NOT NULL,
  `IdTelegram` varchar(255) NOT NULL,
  `TokenUser` varchar(255) NOT NULL,
  `TimeInit` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `AppBanking` varchar(255) NOT NULL,
  `Stk` varchar(255) NOT NULL,
  `BankingUserName` varchar(255) NOT NULL,
  `Wallet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `zalopaycode`
--

CREATE TABLE `zalopaycode` (
  `IdTelegram` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `zalopaylist`
--

CREATE TABLE `zalopaylist` (
  `Name` varchar(255) NOT NULL,
  `Sdt` varchar(255) NOT NULL,
  `SoDu` varchar(255) NOT NULL,
  `Token` varchar(900) NOT NULL,
  `TokenBanking` varchar(800) NOT NULL,
  `HanMuc` varchar(255) NOT NULL,
  `CuocMin` varchar(255) NOT NULL,
  `CuocMax` varchar(255) NOT NULL,
  `AccessToken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `deposit_history`
--
ALTER TABLE `deposit_history`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `gamehistory`
--
ALTER TABLE `gamehistory`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `giftcodehistory`
--
ALTER TABLE `giftcodehistory`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `keobongda`
--
ALTER TABLE `keobongda`
  ADD PRIMARY KEY (`Giai`);

--
-- Chỉ mục cho bảng `lichsuruttien`
--
ALTER TABLE `lichsuruttien`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `thongkegamemomo`
--
ALTER TABLE `thongkegamemomo`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `thongkegametele`
--
ALTER TABLE `thongkegametele`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `thongkenguoichoi`
--
ALTER TABLE `thongkenguoichoi`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chat`
--
ALTER TABLE `chat`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `deposit_history`
--
ALTER TABLE `deposit_history`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gamehistory`
--
ALTER TABLE `gamehistory`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `giftcodehistory`
--
ALTER TABLE `giftcodehistory`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lichsuruttien`
--
ALTER TABLE `lichsuruttien`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thongkegamemomo`
--
ALTER TABLE `thongkegamemomo`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thongkegametele`
--
ALTER TABLE `thongkegametele`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thongkenguoichoi`
--
ALTER TABLE `thongkenguoichoi`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
