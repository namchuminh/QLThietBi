-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 23, 2023 lúc 05:47 PM
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
  `ThoiGianKhauHao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaKho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaChiTietHoaDon`, `MaChungTu`, `MaMonHoc`, `KhoiLop`, `MaThietBi`, `SoLuong`, `DonGia`, `MaCaBiet`, `DonViTinh`, `Vat`, `ThanhTien`, `ThoiGianKhauHao`, `MaKho`) VALUES
(32, 7, 5, 'Lớp 8', 8, 1808, 2000, 'SL', 'Cái', 10, 3977600, '1', 8),
(56, 7, 5, 'Lớp 8', 8, 6, 2000, 'SL', 'Cái', 10, 13200, '1', 7),
(57, 7, 5, 'Lớp 8', 8, 8, 2000, 'SL', 'Cái', 10, 14400, '1', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieumuon`
--

CREATE TABLE `chitietphieumuon` (
  `MaChiTietPhieuMuon` int(11) NOT NULL,
  `MaMuonThietBi` int(11) NOT NULL,
  `MaLop` int(11) NOT NULL,
  `MaMonHoc` int(11) NOT NULL,
  `SoTiet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenBaiHoc` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphieumuon`
--

INSERT INTO `chitietphieumuon` (`MaChiTietPhieuMuon`, `MaMuonThietBi`, `MaLop`, `MaMonHoc`, `SoTiet`, `TenBaiHoc`) VALUES
(3, 3, 6, 10, 'Tiet4', 'a'),
(5, 4, 5, 5, 'Tiet4', 'Nguyen Van A');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieutra`
--

CREATE TABLE `chitietphieutra` (
  `MaPhieuTra` int(11) NOT NULL,
  `MaMuonThietBi` int(11) NOT NULL,
  `NgayTraThietBi` date NOT NULL,
  `SoLuongTra` int(11) NOT NULL,
  `TinhTrangKhiTra` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphieutra`
--

INSERT INTO `chitietphieutra` (`MaPhieuTra`, `MaMuonThietBi`, `NgayTraThietBi`, `SoLuongTra`, `TinhTrangKhiTra`) VALUES
(1, 3, '2023-04-23', 1, 'aa'),
(2, 4, '2023-04-27', 1, 'aa');

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
(7, '2023-04-01 00:00:00', 2, 'Được mượn sử dụng', 'bbbaa4', 8, 1, 3, 'abc', '2023-05-05 00:00:00'),
(10, '2023-04-13 00:00:00', 1, 'Được viện trợ, cho tặng', 'bbb', 7, 1, 1, '2', '2023-04-21 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dieuchuyen`
--

CREATE TABLE `dieuchuyen` (
  `MaDieuChuyen` int(11) NOT NULL,
  `MaThietBi` int(11) NOT NULL,
  `NgayBanGiao` datetime NOT NULL,
  `SoBienBan` int(11) NOT NULL,
  `NguoiBanGiao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NguoiTiepNhan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaKho` int(11) NOT NULL,
  `TinhTrang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoLuongDieuChuyen` int(11) NOT NULL,
  `MaChiTietHoaDonMoi` int(11) NOT NULL,
  `MaChiTietHoaDonCu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dieuchuyen`
--

INSERT INTO `dieuchuyen` (`MaDieuChuyen`, `MaThietBi`, `NgayBanGiao`, `SoBienBan`, `NguoiBanGiao`, `NguoiTiepNhan`, `MaKho`, `TinhTrang`, `GhiChu`, `SoLuongDieuChuyen`, `MaChiTietHoaDonMoi`, `MaChiTietHoaDonCu`) VALUES
(27, 8, '2023-04-13 00:00:00', 2, 'Nguyen van A', 'Nguyen Van D', 5, 'a', 'a', 2, 56, 32),
(28, 8, '2023-04-21 00:00:00', 10, 'Nguyen van A', 'Nguyen Van D', 4, 'aa', 'aa', 8, 57, 56);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ghinhanthietbihong`
--

CREATE TABLE `ghinhanthietbihong` (
  `MaGhiNhanHong` int(11) NOT NULL,
  `MaMonHoc` int(11) NOT NULL,
  `MaKho` int(11) NOT NULL,
  `MaThietBi` int(11) NOT NULL,
  `SoLuongHong` int(11) NOT NULL,
  `NguoiPhatHien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NgayPhatHien` date NOT NULL,
  `LyDoHong` text COLLATE utf8_unicode_ci NOT NULL,
  `SoBienBan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ghinhanthietbihong`
--

INSERT INTO `ghinhanthietbihong` (`MaGhiNhanHong`, `MaMonHoc`, `MaKho`, `MaThietBi`, `SoLuongHong`, `NguoiPhatHien`, `NgayPhatHien`, `LyDoHong`, `SoBienBan`) VALUES
(7, 5, 7, 8, 5, 'Giang A B', '2023-04-16', 'aaa', 2),
(8, 5, 8, 8, 8, 'nguyen van C', '2023-04-14', 'ư', 10),
(13, 5, 8, 8, 10, 'Giang A c d', '2023-05-05', 'aaa ccc', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ghinhanthietbimat`
--

CREATE TABLE `ghinhanthietbimat` (
  `MaGhiNhanMat` int(11) NOT NULL,
  `MaMonHoc` int(11) NOT NULL,
  `MaKho` int(11) NOT NULL,
  `MaThietBi` int(11) NOT NULL,
  `SoLuongMat` int(11) NOT NULL,
  `NguoiPhatHien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NgayPhatHien` date NOT NULL,
  `LyDoMat` text COLLATE utf8_unicode_ci NOT NULL,
  `SoBienBan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ghinhanthietbimat`
--

INSERT INTO `ghinhanthietbimat` (`MaGhiNhanMat`, `MaMonHoc`, `MaKho`, `MaThietBi`, `SoLuongMat`, `NguoiPhatHien`, `NgayPhatHien`, `LyDoMat`, `SoBienBan`) VALUES
(3, 5, 8, 8, 2, 'nguyen van a', '2023-04-23', 'ư', 10);

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
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `MaLop` int(11) NOT NULL,
  `TenLop` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`MaLop`, `TenLop`) VALUES
(1, '10A1'),
(2, '10A2'),
(3, '10A3'),
(4, '10A4'),
(5, '10A5'),
(6, '10A6'),
(7, '11A1'),
(8, '11A2'),
(9, '11A3'),
(10, '11A4'),
(11, '11A5'),
(12, '11A6'),
(13, '12A1'),
(14, '12A2'),
(15, '12A3'),
(16, '12A4'),
(17, '12A5'),
(18, '12A6');

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
-- Cấu trúc bảng cho bảng `muonphonghoc`
--

CREATE TABLE `muonphonghoc` (
  `MaMuonPhongHoc` int(11) NOT NULL,
  `MaPhongHoc` int(11) NOT NULL,
  `BuoiHoc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TietHoc` int(11) NOT NULL,
  `MaLop` int(11) NOT NULL,
  `MaMon` int(11) NOT NULL,
  `TenBaiHoc` text COLLATE utf8_unicode_ci NOT NULL,
  `NgayBatDauMuon` date NOT NULL,
  `NgayKetThucMuon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `muonphonghoc`
--

INSERT INTO `muonphonghoc` (`MaMuonPhongHoc`, `MaPhongHoc`, `BuoiHoc`, `TietHoc`, `MaLop`, `MaMon`, `TenBaiHoc`, `NgayBatDauMuon`, `NgayKetThucMuon`) VALUES
(2, 2, 'BuoiSang', 3, 5, 3, 'aaa', '2023-04-26', '2023-04-29'),
(3, 1, 'BuoiChieu', 3, 11, 6, 'aaa', '2023-04-23', '2023-04-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muonthietbi`
--

CREATE TABLE `muonthietbi` (
  `MaMuonThietBi` int(11) NOT NULL,
  `NgayMuon` date NOT NULL,
  `NgayTra` date NOT NULL,
  `SoPhieu` int(11) NOT NULL,
  `MaThietBi` int(11) NOT NULL,
  `SoLuongMuon` int(11) NOT NULL,
  `NguoiMuon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaKho` int(11) NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `muonthietbi`
--

INSERT INTO `muonthietbi` (`MaMuonThietBi`, `NgayMuon`, `NgayTra`, `SoPhieu`, `MaThietBi`, `SoLuongMuon`, `NguoiMuon`, `MaKho`, `GhiChu`) VALUES
(3, '2023-04-21', '2023-05-06', 2, 8, 1, 'Nguyen Van Thao', 4, 'a'),
(4, '2023-04-29', '2023-04-30', 1, 8, 10, 'AN', 4, 'a');

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
-- Cấu trúc bảng cho bảng `phonghoc`
--

CREATE TABLE `phonghoc` (
  `MaPhongHoc` int(11) NOT NULL,
  `TenPhongHoc` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phonghoc`
--

INSERT INTO `phonghoc` (`MaPhongHoc`, `TenPhongHoc`) VALUES
(1, 'Phòng Thực Hành Vật Lý'),
(2, 'Phòng Thực Hành Hóa Học');

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
-- Cấu trúc bảng cho bảng `suathietbi`
--

CREATE TABLE `suathietbi` (
  `MaSuaThietBi` int(11) NOT NULL,
  `MaKho` int(11) NOT NULL,
  `MaThietBi` int(11) NOT NULL,
  `NgayGhiNhan` date NOT NULL,
  `NguoiPhatHien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NguoiGaySuCo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `HienTuongHong` text COLLATE utf8_unicode_ci NOT NULL,
  `NguoiGiaiQuyet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `BienPhap` text COLLATE utf8_unicode_ci NOT NULL,
  `NguoiThucHien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `BoPhanSuaChua` text COLLATE utf8_unicode_ci NOT NULL,
  `NguonKinhPhi` text COLLATE utf8_unicode_ci NOT NULL,
  `KinhPhiSuaChua` int(11) NOT NULL,
  `SoLuongHong` int(11) NOT NULL,
  `KinhPhiSauSua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suathietbi`
--

INSERT INTO `suathietbi` (`MaSuaThietBi`, `MaKho`, `MaThietBi`, `NgayGhiNhan`, `NguoiPhatHien`, `NguoiGaySuCo`, `HienTuongHong`, `NguoiGiaiQuyet`, `BienPhap`, `NguoiThucHien`, `BoPhanSuaChua`, `NguonKinhPhi`, `KinhPhiSuaChua`, `SoLuongHong`, `KinhPhiSauSua`) VALUES
(2, 4, 8, '2023-04-23', 'nguyen van a', 'Nguyen Van C', 'a', 'Nguyen Van D', 'a', 'Nguyen Van E', 'c', 'd', 10000, 10, 30000),
(3, 4, 8, '2023-04-28', 'nguyen van a', 'Nguyen Van D', 'a', 'Nguyen Van D', 'a', 'Nguyen Van E', 'c', 'd', 10000, 5, 20000);

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
-- Chỉ mục cho bảng `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  ADD PRIMARY KEY (`MaChiTietPhieuMuon`);

--
-- Chỉ mục cho bảng `chitietphieutra`
--
ALTER TABLE `chitietphieutra`
  ADD PRIMARY KEY (`MaPhieuTra`);

--
-- Chỉ mục cho bảng `chungtu`
--
ALTER TABLE `chungtu`
  ADD PRIMARY KEY (`MaChungTu`);

--
-- Chỉ mục cho bảng `dieuchuyen`
--
ALTER TABLE `dieuchuyen`
  ADD PRIMARY KEY (`MaDieuChuyen`);

--
-- Chỉ mục cho bảng `ghinhanthietbihong`
--
ALTER TABLE `ghinhanthietbihong`
  ADD PRIMARY KEY (`MaGhiNhanHong`);

--
-- Chỉ mục cho bảng `ghinhanthietbimat`
--
ALTER TABLE `ghinhanthietbimat`
  ADD PRIMARY KEY (`MaGhiNhanMat`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`MaKho`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLop`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMonHoc`);

--
-- Chỉ mục cho bảng `muonphonghoc`
--
ALTER TABLE `muonphonghoc`
  ADD PRIMARY KEY (`MaMuonPhongHoc`);

--
-- Chỉ mục cho bảng `muonthietbi`
--
ALTER TABLE `muonthietbi`
  ADD PRIMARY KEY (`MaMuonThietBi`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNhaCungCap`);

--
-- Chỉ mục cho bảng `phonghoc`
--
ALTER TABLE `phonghoc`
  ADD PRIMARY KEY (`MaPhongHoc`);

--
-- Chỉ mục cho bảng `quanlythietbi`
--
ALTER TABLE `quanlythietbi`
  ADD PRIMARY KEY (`MaQuanLyThietBi`);

--
-- Chỉ mục cho bảng `suathietbi`
--
ALTER TABLE `suathietbi`
  ADD PRIMARY KEY (`MaSuaThietBi`);

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
  MODIFY `MaChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  MODIFY `MaChiTietPhieuMuon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chitietphieutra`
--
ALTER TABLE `chitietphieutra`
  MODIFY `MaPhieuTra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chungtu`
--
ALTER TABLE `chungtu`
  MODIFY `MaChungTu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `dieuchuyen`
--
ALTER TABLE `dieuchuyen`
  MODIFY `MaDieuChuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `ghinhanthietbihong`
--
ALTER TABLE `ghinhanthietbihong`
  MODIFY `MaGhiNhanHong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `ghinhanthietbimat`
--
ALTER TABLE `ghinhanthietbimat`
  MODIFY `MaGhiNhanMat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `MaKho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `MaLop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `MaMonHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `muonphonghoc`
--
ALTER TABLE `muonphonghoc`
  MODIFY `MaMuonPhongHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `muonthietbi`
--
ALTER TABLE `muonthietbi`
  MODIFY `MaMuonThietBi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNhaCungCap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phonghoc`
--
ALTER TABLE `phonghoc`
  MODIFY `MaPhongHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `quanlythietbi`
--
ALTER TABLE `quanlythietbi`
  MODIFY `MaQuanLyThietBi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `suathietbi`
--
ALTER TABLE `suathietbi`
  MODIFY `MaSuaThietBi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  MODIFY `MaThietBi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
