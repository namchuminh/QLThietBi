-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 29, 2023 lúc 12:36 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlythietbi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaChiTietHoaDon` int(11) NOT NULL,
  `MaChungTu` int(11) NOT NULL,
  `MaMonHoc` int(11) NOT NULL,
  `KhoiLop` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaThietBi` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `MaQuanLyThietBi` int(11) NOT NULL,
  `DonViTinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Vat` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `ThoiGianKhauHao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chungtu`
--

CREATE TABLE `chungtu` (
  `MaChungTu` int(11) NOT NULL,
  `NgayNhap` datetime NOT NULL,
  `SoPhieu` int(11) NOT NULL,
  `LyDoTang` text COLLATE utf8_unicode_ci NOT NULL,
  `DienGiai` text COLLATE utf8_unicode_ci NOT NULL,
  `MaKho` int(11) NOT NULL,
  `MaNhaCungCap` int(11) NOT NULL,
  `SohdTaiChinh` int(11) NOT NULL,
  `KyHieu` text COLLATE utf8_unicode_ci NOT NULL,
  `Ngayhd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chungtu`
--

INSERT INTO `chungtu` (`MaChungTu`, `NgayNhap`, `SoPhieu`, `LyDoTang`, `DienGiai`, `MaKho`, `MaNhaCungCap`, `SohdTaiChinh`, `KyHieu`, `Ngayhd`) VALUES
(7, '2023-04-01 00:00:00', 2, 'Được mượn sử dụng', 'bbbaa', 8, 1, 3, 'qqq', '2023-05-05 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `MaKho` int(11) NOT NULL,
  `TenKho` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`MaKho`, `TenKho`) VALUES
(1, 'Kho thiết bị dạy học môn toán'),
(4, 'Kho thiết bị dạy môn SINH HỌC'),
(5, 'Kho thiết bị dạy môn Hóa Học'),
(6, 'Kho TBDH môn Vật Lý'),
(7, 'Kho TBDH dùng chung'),
(8, 'Kho TBDH môn Công Nghệ'),
(9, 'Thể dục - Quốc phòng an ninh'),
(10, 'Kho TBDH môn Ngữ Văn'),
(11, 'Kho TBDH môn Địa Lý'),
(12, 'Kho TBDH môn Lịch Sử'),
(13, 'Kho TBDH môn Tin học'),
(14, 'Kho TBDH môn TD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMonHoc` int(11) NOT NULL,
  `TenMonHoc` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNhaCungCap` int(11) NOT NULL,
  `TenNhaCungCap` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNhaCungCap`, `TenNhaCungCap`) VALUES
(1, 'Nhà cung cấp khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TaiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NamSinh` date NOT NULL,
  `ChucVu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `QueQuan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AnhDaiDien` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`TaiKhoan`, `MatKhau`, `HoTen`, `SoDienThoai`, `NamSinh`, `ChucVu`, `QueQuan`, `AnhDaiDien`) VALUES
('admin', '0192023a7bbd73250516f069df18b500', 'nguyen van a', '03836999', '2023-03-02', 'admin', 'ha noi', 'aa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietbi`
--

CREATE TABLE `thietbi` (
  `MaThietBi` int(11) NOT NULL,
  `TenThietBi` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaChiTietHoaDon`);

--
-- Chỉ mục cho bảng `chungtu`
--
ALTER TABLE `chungtu`
  ADD PRIMARY KEY (`MaChungTu`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`MaKho`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMonHoc`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNhaCungCap`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TaiKhoan`);

--
-- Chỉ mục cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  ADD PRIMARY KEY (`MaThietBi`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MaChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chungtu`
--
ALTER TABLE `chungtu`
  MODIFY `MaChungTu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `MaKho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `MaMonHoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNhaCungCap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  MODIFY `MaThietBi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
