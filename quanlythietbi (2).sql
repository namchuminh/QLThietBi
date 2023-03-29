-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 29, 2023 lúc 08:29 PM
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
  `MaCaBiet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DonViTinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Vat` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `ThoiGianKhauHao` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaChiTietHoaDon`, `MaChungTu`, `MaMonHoc`, `KhoiLop`, `MaThietBi`, `SoLuong`, `DonGia`, `MaCaBiet`, `DonViTinh`, `Vat`, `ThanhTien`, `ThoiGianKhauHao`) VALUES
(7, 7, 12, 'Lớp 11', 13, 1, 2, 'SL', 'Chiếc', 121, 2, '1'),
(9, 7, 7, 'Lớp 9', 10, 1, 2, 'SL', 'mg', 1, 2, '2'),
(10, 7, 10, 'Lớp 11', 13, 1, 2, 'SL', 'Chiếc', 121, 2, '1'),
(11, 7, 10, 'Lớp 11', 13, 1, 2, 'SL', 'Chiếc', 121, 2, '1');

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
(7, '2023-04-01 00:00:00', 2, 'Được mượn sử dụng', 'bbbaa4', 8, 1, 3, '3', '2023-05-05 00:00:00');

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

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MaMonHoc`, `TenMonHoc`) VALUES
(1, 'Môn Toán'),
(2, 'Môn Sinh'),
(3, 'Môn Hóa'),
(4, 'Môn Vật Lý'),
(5, 'Môn Công Nghệ'),
(6, 'GDCD'),
(7, 'Môn Ngữ Văn'),
(8, 'Môn Địa Lý'),
(9, 'Môn Lịch Sử'),
(10, 'Môn Tin Học'),
(11, 'Môn Thể Dục'),
(12, 'Môn Âm Nhạc'),
(13, 'Môn Mỹ Thuật'),
(14, 'Môn Chung');

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
-- Cấu trúc bảng cho bảng `quanlythietbi`
--

CREATE TABLE `quanlythietbi` (
  `MaQuanLyThietBi` int(11) NOT NULL,
  `MaCaBiet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenQuanLyThietBi` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quanlythietbi`
--

INSERT INTO `quanlythietbi` (`MaQuanLyThietBi`, `MaCaBiet`, `TenQuanLyThietBi`) VALUES
(1, '', 'Đăng ký quản lý mã cá biệt'),
(2, 'SL', 'Chỉ quản lý số lượng'),
(3, 'TH', 'Tiêu hao(hóa chất, vật tư, không thu hồi được...)');

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
-- Đang đổ dữ liệu cho bảng `thietbi`
--

INSERT INTO `thietbi` (`MaThietBi`, `TenThietBi`) VALUES
(1, 'Giá để thiết bị'),
(2, 'Giá Treo Tranh'),
(3, 'Nẹp treo tranh ảnh, lược đồ và bản đồ'),
(4, 'Máy ảnh kĩ thuật số'),
(5, 'Camera kỹ thuật số'),
(6, 'Tư liệu phục vụ tổ chức hoạt động ngoài giờ lên lớp'),
(7, 'Các bài hát dành cho thanh niên, học sinh phục vụ các chủ đề hoạt động của các tháng'),
(8, 'Tấm gương của những người thành đạt'),
(9, 'Nghề truyền thống'),
(10, 'Tư vấn nghề'),
(11, 'Máy tính sách tay'),
(12, 'Bộ tranh hoạt động ngoài giờ lên lớp 12'),
(13, 'Thanh niên với hòa bình, hữu nghị, hợp tác'),
(14, 'Phần mềm trao đổi thông tin nội bộ'),
(15, 'Phần mềm quản lý thư viện'),
(16, 'Phần mềm quản lý điểm'),
(17, 'Phần mềm quản lý công văn'),
(18, 'Phần mềm mô phỏng bài thí nghiệm'),
(19, 'Phần mềm soạn bài giảng điện tử'),
(20, 'Phần mềm phục vụ thi trực tuyến'),
(21, 'Ổ cắm điện'),
(22, 'Văn bản phaspnquy và tài liệu tham khảo'),
(23, 'Màn chiếu'),
(24, 'Bộ phần mềm chấm thi chắc nghiệm'),
(25, 'Bút chỉ laze'),
(26, 'Màn chiếu gần BENQ'),
(27, 'Bảng tương tác NEWLINE'),
(28, 'Bút trình chiếu thuyết trình slide'),
(29, 'Cabe HDMI'),
(30, 'Giá treo máy chiếu'),
(31, 'Máy chiếu overhead'),
(32, 'Máy in');

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
-- Chỉ mục cho bảng `quanlythietbi`
--
ALTER TABLE `quanlythietbi`
  ADD PRIMARY KEY (`MaQuanLyThietBi`);

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
  MODIFY `MaChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `MaMonHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNhaCungCap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `quanlythietbi`
--
ALTER TABLE `quanlythietbi`
  MODIFY `MaQuanLyThietBi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  MODIFY `MaThietBi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
