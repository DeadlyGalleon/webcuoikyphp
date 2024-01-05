-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2024 lúc 11:20 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_ban_hang_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `iddanhgia` int(11) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idsp` int(11) DEFAULT NULL,
  `sosao` int(11) DEFAULT NULL,
  `binhluan` varchar(255) DEFAULT NULL,
  `ngaygio` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`iddanhgia`, `iduser`, `idsp`, `sosao`, `binhluan`, `ngaygio`) VALUES
(1, 12, 19, 5, 'keke tôi là thien', '2024-01-04 09:04:19'),
(2, 12, 20, 4, 'cho tôi đánh giá 4 sao nhé, tôi là thien keke', '2024-01-04 09:26:34'),
(3, 12, 23, 5, 'thien was here', '2024-01-04 15:30:23'),
(4, 13, 23, 4, 'thien2 was here too', '2024-01-04 15:48:52'),
(5, 13, 19, 1, 'tôi đánh giá 1 sao ', '2024-01-04 16:31:37'),
(6, 13, 26, 3, 'thien2 was here', '2024-01-04 16:52:20'),
(7, 12, 26, 2, 'tôi là thiện một đây, 2 sao vào mồm ngay', '2024-01-04 16:59:13'),
(8, 12, 27, 1, 'thiện1-người đánh giá một sao. Hãy nhớ kỹ cái tên này', '2024-01-04 17:07:19'),
(9, 12, 25, 3, 'làm tí 3 sao nhỉ', '2024-01-04 20:51:24'),
(10, 14, 19, 4, 'thien', '2024-01-04 21:12:18'),
(11, 14, 11, 4, 'zz', '2024-01-04 21:49:20'),
(12, 1, 19, 5, 'Quá Mạnh', '2024-01-04 22:14:11'),
(13, 1, 20, 5, 'MẠNH QUÁ', '2024-01-04 22:30:39'),
(14, 1, 34, 5, 'quá mạnh', '2024-01-05 21:01:20'),
(15, 1, 36, 4, 's', '2024-01-05 21:39:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `iddonhang` int(11) NOT NULL,
  `idtaikhoan` int(11) NOT NULL,
  `tongtien` bigint(20) NOT NULL,
  `ngaydat` varchar(500) NOT NULL,
  `diachi` text NOT NULL,
  `ngaygiao` varchar(100) NOT NULL,
  `sodienthoai` int(10) NOT NULL,
  `trangthai` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`iddonhang`, `idtaikhoan`, `tongtien`, `ngaydat`, `diachi`, `ngaygiao`, `sodienthoai`, `trangthai`) VALUES
(31, 11, 89100, '2024-01-05 20:21:40', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-05 23:47:13', 994030278, 4),
(32, 1, 543100, '2024-01-05 23:36:24', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-05 23:45:26', 702723017, 4),
(33, 1, 9900, '2024-01-05 23:48:24', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-05 23:48:53', 702723017, 4),
(34, 1, 8900, '2024-01-05 23:50:07', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-05 23:50:20', 702723017, 4),
(35, 1, 8900, '2024-01-05 23:51:47', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-05 23:51:54', 702723017, 4),
(36, 1, 512000, '2024-01-05 23:53:36', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-05 23:53:48', 702723017, 4),
(37, 11, 35200, '2024-01-06 00:13:45', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '', 994030278, 1),
(38, 1, 94800, '2024-01-06 00:38:24', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-06 00:38:33', 702723017, 4),
(39, 1, 67000, '2024-01-06 04:29:45', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-06 04:29:52', 702723017, 4),
(40, 1, 9900, '2024-01-06 04:32:48', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-06 04:32:56', 702723017, 4),
(41, 1, 19100, '2024-01-06 04:37:08', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-06 04:38:14', 702723017, 4),
(42, 1, 9900, '2024-01-06 04:37:47', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-06 04:38:02', 702723017, 4),
(43, 1, 475200, '2024-01-06 04:51:32', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-06 04:51:41', 702723017, 4),
(44, 1, 67000, '2024-01-06 04:52:41', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '', 702723017, 1),
(45, 1, 9200, '2024-01-06 04:53:15', '109 Ngô Xuân Thu, Quận Liên Chiểu, Thành Phố Đà Nẵng', '2024-01-06 04:53:23', 702723017, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `idtaikhoan` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `tensanpham` varchar(250) NOT NULL,
  `hinhanh` longtext NOT NULL,
  `soluong` int(11) NOT NULL,
  `giaban` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`idtaikhoan`, `idsanpham`, `tensanpham`, `hinhanh`, `soluong`, `giaban`, `thanhtien`) VALUES
(0, 35, 'Cà tím 500g (2 - 3 trái)', 'catim.jpg', 1, 8900, 8900);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `idsanpham` int(11) NOT NULL,
  `hinhanh` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`idsanpham`, `hinhanh`) VALUES
(65, 'dauolive.jpg'),
(65, 'dauolive2.jpg'),
(65, 'dauolive3.jpg'),
(65, 'dauolive4.jpg'),
(64, 'dauolita.jpg'),
(64, 'dauolita2.png'),
(64, 'dauolita3.jpg'),
(63, 'daucailan.jpg'),
(63, 'daucailan2.png'),
(63, 'daucailan3.jpg'),
(63, 'daucailan4.jpg'),
(62, 'dautuongan.jpg'),
(62, 'dautuongan2.png'),
(62, 'dautuongan3.jpg'),
(62, 'dautuongan4.jpg'),
(61, 'suathden.jpg'),
(61, 'suathden2.jpg'),
(61, 'suathden3.jpg'),
(61, 'suathden4.jpg'),
(60, 'suath.jpg'),
(60, 'suath2.jpg'),
(60, 'suath3.jpg'),
(60, 'suath4.jpg'),
(59, 'suadau.jpg'),
(59, 'suadau2.jpg'),
(59, 'suadau3.jpg'),
(59, 'suadau4.jpg'),
(58, 'suatuoi.jpg'),
(58, 'suatuoi2.jpg'),
(58, 'suatuoi3.jpg'),
(58, 'suatuoi4.jpg'),
(57, 'trunggata.jpg'),
(57, 'trunggata2.jpg'),
(57, 'trunggata3.jpg'),
(56, 'trungvit.jpg'),
(56, 'trungvit2.jpg'),
(56, 'trungvit3.jpg'),
(56, 'trungvit4.jpg'),
(55, 'trungga.jpg'),
(55, 'trungga2.jpg'),
(55, 'trungga3.jpg'),
(55, 'trungga4.jpg'),
(54, 'canhga.jpg'),
(54, 'canhga2.jpg'),
(54, 'canhga3.jpeg'),
(54, 'canhga4.jpeg'),
(53, 'duiga.jpg'),
(53, 'duiga2.jpg'),
(53, 'duiga3.jpg'),
(52, 'bapbo.jpg'),
(52, 'bapbo2.jpg'),
(52, 'bapbo3.jpg'),
(52, 'bapbo4.jpg'),
(51, 'duibo.jpg'),
(51, 'duibo2.jpg'),
(51, 'duibo3.jpeg'),
(51, 'duibo4.jpeg'),
(50, 'suonheo.jpg'),
(50, 'suonheo2.jpg'),
(50, 'suonheo3.jpeg'),
(50, 'suonheo4.jpeg'),
(49, 'thitheo.jpg'),
(49, 'thitheo2.jpeg'),
(49, 'thitheo3.jpeg'),
(49, 'thitheo4.jpg'),
(48, 'caibe.jpg'),
(48, 'caibe2.jpg'),
(48, 'caibe3.jpg'),
(48, 'caibe4.jpg'),
(47, 'caingot.jpg'),
(47, 'caingot2.jpg'),
(47, 'caingot3.jpg'),
(47, 'caingot4.jpg'),
(46, 'raumuong.jpg'),
(46, 'raumuong2.jpg'),
(46, 'raumuong3.jpg'),
(46, 'raumuong4.jpg'),
(45, 'rauden.jpg'),
(45, 'rauden2.jpg'),
(45, 'rauden3.jpg'),
(45, 'rauden4.jpg'),
(44, 'raungot.jpg'),
(44, 'raungot2.jpg'),
(44, 'raungot3.jpg'),
(44, 'raungot4.jpg'),
(43, 'khoailang.jpg'),
(43, 'khoailang2.jpg'),
(43, 'khoailang3.jpg'),
(43, 'khoailang4.jpg'),
(42, 'khoaimy4.jpg'),
(42, 'khoaimy.jpg'),
(42, 'khoaimy2.jpg'),
(42, 'khoaimy3.jpg'),
(41, 'khoaitay.jpg'),
(41, 'khoaitay2.jpg'),
(41, 'khoaitay3.jpg'),
(41, 'khoaitay4.jpg'),
(40, 'carot.jpg'),
(40, 'carot2.jpg'),
(40, 'carot3.jpg'),
(40, 'carot4.jpg'),
(40, 'carot5.jpg'),
(39, 'chanh.jpg'),
(39, 'chanh2.jpg'),
(39, 'chanh3.jpg'),
(39, 'chanh4.jpg'),
(38, 'dualeo.jpg'),
(38, 'dualeo2.jpg'),
(38, 'dualeo3.jpg'),
(38, 'dualeo4.jpg'),
(38, 'dualeo5.jpg'),
(37, 'daubap.jpg'),
(37, 'daubap2.jpg'),
(37, 'daubap3.jpg'),
(37, 'daubap4.jpg'),
(36, 'bau.jpg'),
(36, 'bau2.jpg'),
(36, 'bau3.jpg'),
(36, 'bau4.jpg'),
(35, 'catim.jpg'),
(35, 'catim2.jpg'),
(35, 'catim3.jpg'),
(35, 'catim4.jpg'),
(34, 'bi.jpg'),
(34, 'bi2.jpg'),
(34, 'bi3.jpg'),
(34, 'bi4.jpg'),
(34, 'bi5.jpg'),
(66, 'namngu.jpg'),
(66, 'namngu2.jpg'),
(66, 'namngu3.jpg'),
(66, 'namngu4.jpg'),
(67, 'hungthinh.jpg'),
(67, 'hungthinh2.jpg'),
(67, 'hungthinh3.jpg'),
(67, 'hungthinh4.jpg'),
(68, 'lyson.jpg'),
(68, 'lyson2.jpg'),
(68, 'lyson3.jpg'),
(68, 'lyson4.jpg'),
(69, 'hanquoc.jpg'),
(69, 'hanquoc2.jpg'),
(69, 'hanquoc3.jpg'),
(69, 'hanquoc4.jpg'),
(70, 'magi.jpg'),
(70, 'magi2.jpg'),
(70, 'magi3.jpg'),
(70, 'magi4.jpg'),
(71, 'chay.jpg'),
(71, 'chay2.jpg'),
(71, 'chay3.jpg'),
(71, 'chay4.jpg'),
(72, 'duong.jpg'),
(72, 'duong2.jpg'),
(72, 'duong3.jpg'),
(72, 'duong4.jpg'),
(73, 'duongvang.jpg'),
(73, 'duongvang2.jpg'),
(73, 'duongvang3.jpg'),
(73, 'duongvang4.jpg'),
(74, 'muoi.jpg'),
(74, 'muoi2.jpg'),
(74, 'muoi3.jpg'),
(74, 'muoi4.jpg'),
(75, 'muoitom.jpg'),
(75, 'muoitom2.jpg'),
(75, 'muoitom3.jpg'),
(75, 'muoitom4.jpg'),
(76, 'muoitieu.jpg'),
(76, 'muoitieu2.jpg'),
(76, 'muoitieu3.jpg'),
(76, 'muoitieu4.jpg'),
(77, 'aji.jpg'),
(77, 'aji2.jpg'),
(77, 'aji3.jpg'),
(77, 'aji4.jpg'),
(78, 'vedan.jpg'),
(78, 'vedan2.jpg'),
(78, 'vedan3.jpg'),
(78, 'vedan4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `idloai` int(11) NOT NULL,
  `tenloai` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`idloai`, `tenloai`) VALUES
(9, 'RAU, CỦ, QUẢ'),
(10, 'THỊT, CÁ, TRỨNG, SỮA'),
(11, 'DẦU ĂN, NƯỚC CHẤM, GIA VỊ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaicon`
--

CREATE TABLE `loaicon` (
  `idloaicon` int(11) NOT NULL,
  `idloaicha` int(11) NOT NULL,
  `tenloaicon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaicon`
--

INSERT INTO `loaicon` (`idloaicon`, `idloaicha`, `tenloaicon`) VALUES
(7, 9, 'CỦ'),
(8, 9, 'QUẢ'),
(9, 9, 'RAU'),
(10, 10, 'THỊT'),
(11, 10, 'CÁ'),
(12, 10, 'TRỨNG'),
(13, 10, 'SỮA'),
(14, 11, 'DẦU ĂN'),
(15, 11, 'NƯỚC CHẤM'),
(16, 11, 'GIA VỊ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsanpham` int(11) NOT NULL,
  `tensanpham` varchar(5000) NOT NULL,
  `mota` varchar(5000) NOT NULL,
  `hinhanh` mediumtext NOT NULL,
  `giaban` int(11) NOT NULL,
  `loai` int(11) NOT NULL,
  `loaicon` int(11) NOT NULL,
  `lanmua` int(11) NOT NULL,
  `lanmuatong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsanpham`, `tensanpham`, `mota`, `hinhanh`, `giaban`, `loai`, `loaicon`, `lanmua`, `lanmuatong`) VALUES
(34, 'Bí đỏ hồ lô 800g', 'Bí đỏ hồ lô hay bí đỏ hạt đậu, đây là giống bí có ruột rất đặc, ít hạt ăn dẻo và ngọt. Bí hồ lô chứa nhiều chất dinh dưỡng và mang lại nhiều lợi ích cho sức khoẻ. Bí hồ lô có thể chế biến thành nhiều món ăn ngon như: sữa bí, canh bí, súp bí,... món nào cũng đều thơm ngon.', '', 9900, 9, 8, 8, 0),
(35, 'Cà tím 500g (2 - 3 trái)', 'Cà tím được trồng tại Đà Lạt hay còn được gọi là cà dái dê, đây là một loại rau củ chế biến được thành rất nhiều món ăn thơm ngon như: hấp, xào, nướng, ăn sống,... mỗi dạng đều mang lại hương vị rất ngon. Trong cà tím chứa hàm lượng chất xơ vô cùng cao và giàu sắt rất tốt cho cơ thể.', '', 8900, 9, 8, 1, 0),
(36, 'Bầu sao trái 500g - 600g', 'Bầu sao là một loại quả có thể biến thành các món ăn ngon cho gia đình. Trái bầu thon dài, bề mặt có ít lông tơ, vỏ màu xanh tươi. Bầu có thể chế biến thành các món ăn như luộc, xào, nấu canh đều rất ngon.', '', 9900, 9, 8, 0, 0),
(37, 'Đậu bắp 250g (12 - 18 trái)', 'Đậu bắp là loại quả chứa nhiều chất xơ, giàu dinh dưỡng, nhiều vitamin,…Đậu bắp luôn rất được ưa chuộng để chế biến những món ăn hàng ngày. Những thành phần dưỡng chất trong đậu bắp rất hữu ích cho hệ tiêu hóa, tim mạch, chống ung thư, tốt cho da và mắt,...', '', 9000, 9, 8, 1, 0),
(38, 'Dưa leo 500g (3 -5 trái)', 'Dưa leo trái lớn tươi ngon, được trồng và thu hoạch đảm bảo chất lượng, an toàn cho sức khỏe người sử dụng. Trong dưa leo chứa nhiều chất xơ, vitamin C, E, K, magie,...dễ ăn, dễ phối trộn với các món ăn khác, tốt sức khỏe vừa mang lại hiệu quả làm đẹp rất tốt', '', 9900, 9, 8, 3, 0),
(39, 'Chanh không hạt 250g (2 - 5 trái)', 'Chanh to trái, tròn và mọng nước,có vị chua đậm đà cho nhiều món ăn hay nước uống, khiến cho nhiều người thích mê. Chanh có thể làm nước đá chanh giải nhiệt mùa hè, tạo nên vị chua cho các món như canh chua, lẩu chua,...', '', 12500, 9, 8, 5, 0),
(40, '2 túi cà rốt (0.9-1.1kg/túi)', 'Cà rốt là một loại củ rất quen thuộc trong các món ăn của người Việt. Cà rốt có hàm lượng chất dinh dưỡng và vitamin A cao, được xem là nguyên liệu cần thiết cho các món ăn dặm của trẻ nhỏ, giúp trẻ sáng mắt và cung cấp nguồn chất xơ dồi dào.', '', 31000, 9, 7, 0, 0),
(41, 'Khoai tây 0.9kg - 1.1kg (10-14 củ)', 'Khoai tây có nguồn gốc từ Trung Quốc. Loại củ này được xuất hiện thường xuyên trên mâm cơm này có rất nhiều công dụng hữu ích. Nó không chỉ tốt cho sức khỏe, làm đẹp hiệu quả mà còn có rất nhiều tác dụng bổ ích khác. Khoai tây có thể chế biến thành canh, súp, hoặc chiên đều rất ngon.', '', 31000, 9, 7, 0, 0),
(42, 'Khoai mì 0.9 - 1kg (5 - 8 củ)', 'Khoai mì có tên gọi khác là sắn. Khoai mì là một trong những loại củ chứa nhiều tinh bột và chế biến được nhiều món ăn khác nhau, từ món mặn đến món tráng miệng như khoai mì hấp nước dừa, canh khoai mì, xôi, chè chuối khoai mì.', '', 15000, 9, 7, 0, 0),
(43, 'Khoai lang tím 1kg', 'Khoai lang tím có xuất xứ từ Đà Lạt có củ to, béo bùi, không bị sượng, thích hợp để luộc hoặc chế biến thành các món ăn ngon. Khoai tím giàu dinh dưỡng, ít năng lượng, thích hợp cho những người đang trong giai đoạn ăn kiêng hoặc kiểm soát cân nặng.', '', 29000, 9, 7, 0, 0),
(44, 'Rau ngót 250gr', 'Rau ngót là loại rau xanh rất được ưa chuộng tại Việt Nam có tính mát, giúp giải nhiệt, giải độc cho cơ thể cùng với đó cung cấp nhiều chất xơ và vitamin. Rau ngót tươi sạch, chất lượng tại Bách hóa XANH tiện lợi, an toàn cho bạn và gia đình những bữa ăn ngon và dinh dưỡng', '', 12000, 9, 9, 0, 0),
(45, 'Rau dền 500gr', 'Rau dền bịch 500g tươi ngon vô cùng, bạn có thể dễ dàng tìm được rau dền xanh mướt, rau đã tươi và ngon thì nấu món gì cũng hấp dẫn. Bạn có thể tham khảo canh rau dền tôm, cháo rau dền tôm,... thơm ngon mà cả nhà ai cũng thích', '', 16000, 9, 9, 0, 0),
(46, 'Rau muống hạt 500gr', 'Rau muống hạt là cây thân thảo, thường mọc bò trên mặt nước hoặc trên cạn. Gồm có 2 loại: Rau muống trắng, rau muống tía. Có thể nói rau muống là loại rau phổ biến và ưa chuộng trong bữa ăn gia đình vì có vị ngọt, tính mát và chứa một lượng lớn vitamin A, C, các chất dinh dưỡng và đặc biệt là hàm lượng chất sắt dồi dào.', '', 15000, 9, 9, 0, 0),
(47, 'Cải ngọt 500gr', 'Cải ngọt là một trong những loại rau cải được sử dụng phổ biến trong các bữa ăn của người Việt Nam. Cải ngọt có thân tròn, phần lá có dạng tròn hoặc tù, màu xanh mướt. Cải ngọt có vị ngọt thanh, khi già thì có vị cay và nồng, rất phù hợp trong việc chế biến nhiều món ăn khác nhau. ', '', 14500, 9, 9, 0, 0),
(48, 'Cải bẹ xanh 500gr', 'Cải bẹ xanh được nuôi trồng và đóng gói theo những tiêu chuẩn nghiêm ngặt, bảo đảm các tiêu chuẩn xanh - sach, chất lượng và an toàn với người dùng. Với bẹ lá to, vị hơi đắng nhẹ, mát và thơm nên thường được dùng để nấu canh hoặc rau cuốn ăn kèm với bánh xèo, gỏi cuốn.', '', 15000, 9, 9, 0, 0),
(49, 'Thịt nạc heo nhập khẩu đông lạnh 500g', 'Thịt nạc heo nhập khẩu đông lạnh 500g chứa nhiều protein và ít chất béo là nguyên liệu thông dụng để tạo nên những món ăn ngon cho mọi gia đình. Thịt heo đông lạnh được đảm bảo nguồn gốc xuất xứ rõ ràng, đảm bảo an toàn vệ sinh thực phẩm và dễ dàng bảo quản.  ', '', 59000, 10, 10, 3, 0),
(50, 'Sườn non heo nhập khẩu đông lạnh 500g', 'Sườn non heo nhập khẩu có tỉ lệ nạc mỡ vừa đủ nên rất phù hợp để chế biến thành nhiều món ăn ngon cho gia đình. Sườn non nhập khẩu đông lạnh với phương pháp cấp đông hiện đại, giúp lưu giữ hương vị tự nhiên, mang đến những món ăn ngon cho gia đình. <br />\r\n', '', 67000, 10, 10, 29, 0),
(51, 'Đùi bò nhập khẩu đông lạnh 500gr', 'Thịt đùi có vị ngon tương tự phần mông bò và thường được cắt thành lát dày như bít-tết để nướng. Đùi bò nhập khẩu đông lạnh được cấp đông từ thịt bò tươi ngon là sản phẩm có xuất xứ rõ ràng nên đảm bảo an toàn thực phẩm và giàu chất dinh dưỡng.', '', 99000, 10, 10, 0, 0),
(52, 'Bắp bò nhập khẩu đông lạnh 500g', 'Bắp bò nhập khẩu xuất xứ Úc, được cắt nhỏ vừa ăn. Bắp bò mềm, ngon, chất lượng, chứa nhiều dinh dưỡng. Bắp bò có thể chế biến thành nhiều món ăn ngon như bò nấu lagu, bò xào lúc lắc,... Thịt bò chất lượng, được nhiều người tin tưởng lựa chọn.', '', 127000, 10, 10, 0, 0),
(53, 'Đùi tỏi gà nhập khẩu đông lạnh 550g - 650g (2-4 cái)', 'Đùi tỏi gà nhập khẩu từ Mỹ, Ba Lan hoặc Brazil được đóng gói và bảo quản theo những tiêu chuẩn nghiêm ngặt về vệ sinh và an toàn thực phẩm, đảm bảo về chất lượng. Đùi tỏi gà nhập khẩu đông lạnh với phương pháp cấp đông hiện đại, giúp lưu giữ hương vị tự nhiên, mang đến những món ăn ngon cho gia đình.', '', 42000, 10, 10, 0, 0),
(54, 'Cánh gà nhập khẩu đông lạnh 500g (3 -5 cánh)', 'Cánh gà nhập khẩu tươi ngon, thịt chắc, nhiều dinh dưỡng thường dùng để chiên với nước mắm hoặc hấp hành. Cánh gà nhập khẩu đông lạnh với phương pháp cấp đông hiện đại, giúp lưu giữ hương vị tự nhiên, mang đến những món ăn ngon cho gia đình.', '', 45000, 10, 10, 0, 0),
(55, 'Trứng gà Happy Egg hộp 10 quả', 'Hộp 10 trứng gà Happy Egg được đóng gói và bảo quản theo những tiêu chuẩn nghiêm ngặt về vệ sinh và an toàn thực phẩm, đảm bảo về chất lượng của thực phẩm. Trứng gà to tròn, đều. Trứng gà Happy Egg có thể luộc chín chế biến thành một số món ăn khác như: thịt kho trứng, cơm chiên trứng,...', '', 26000, 10, 12, 0, 0),
(56, 'Trứng vịt muối Vương Ngọc Bích hộp 4 quả', 'Trứng vịt muối Vương Ngọc Bích hộp 4 quả là một món ăn độc đáo và cung cấp một số lượng chất dinh dưỡng quan trọng, được chế biến thành nhiều món ăn ngon khác nhau như bánh bông lan trứng muối, ốc hương xào trứng muối,..', '', 23000, 10, 12, 0, 0),
(57, 'Trứng gà ta Vương Ngọc Bích hộp 6 quả', 'Trứng gà ta là nguồn dinh dưỡng phong phú và có giá trị cao. Chúng chứa nhiều protein, chất béo tốt, vitamin A, D, E, B12 và các vitamin nhóm B, cùng với các khoáng chất như sắt, kẽm, selen, phosphorus và iodine.', '', 23000, 10, 12, 5, 0),
(58, 'Thùng 48 bịch sữa tiệt trùng không đường Dutch Lady 180ml', 'Thùng 48 bịch sữa tiệt trùng không đường Dutch Lady 180ml chứa hàm lượng đạm sữa chất lượng cao giúp xương chắc khỏe. Sữa tươi Dutch Lady là nhãn hiệu sữa tươi rất được ưa chuộng hiện nay, giúp gia đình bạn luôn khỏe mạnh và năng động.', '', 271000, 10, 13, 0, 0),
(59, 'Thùng 48 hộp sữa tiệt trùng hương dâu Dutch Lady Cao Khoẻ 170ml', 'Sản phẩm gấp đôi vitamin D và canxi giúp bé cao khoẻ hơn mỗi ngày. Sữa tiệt trùng hương dâu Dutch Lady Cao Khoẻ 170ml thơm ngon, dễ uống. Thùng 48 hộp có đường giúp bạn tiết kiệm được nhiều chi phí, sử dụng lâu dài<br />\r\n', '', 324000, 10, 13, 0, 0),
(60, 'Thùng 48 hộp sữa tươi tiệt trùng hương dâu TH true MILK 110ml', 'Đảm bảo không sử dụng thêm hương liệu, vị ngon 100% đến từ sữa tươi từ trang trại của TH True Milk nên được các bà mẹ ưu tiên lựa chọn hàng đầu. Thùng 48 hộp sữa tươi tiệt trùng hương dâu TH true MILK 110ml đóng thùng tiện lợi, tiết kiệm, có thể dùng lâu dài', '', 270000, 10, 13, 0, 0),
(61, 'Thùng 48 hộp sữa tươi tiệt trùng socola TH true MILK 110ml', 'Đảm bảo không sử dụng thêm hương liệu, vị ngon 100% đến từ sữa tươi từ trang trại của TH True Milk chứa nhiều vitamin và khoáng chất như Vitamin A, D, B1, B2, canxi, kẽm. Thùng 48 hộp sữa tươi tiệt trùng socola TH true MILK 110ml đóng thùng tiện lợi, tiết kiệm, socola thơm ngon', '', 280000, 10, 13, 0, 0),
(62, 'Dầu thực vật Tường An Cooking Oil chai 1 lít', 'Dầu thực vật Tường An có công thức đặc biệt, kết hợp từ dầu đậu nành, dầu hạt cải và dầu olein. Dầu thực vật Tường An Cooking oil chai 1 lít ngoài công dụng nấu nướng, dầu ăn còn giúp bổ sung Omega 3, 6, 9 và vitamin A, E có lợi cho cơ thể.', '', 55000, 11, 14, 0, 0),
(63, 'Dầu thực vật tinh luyện Cái Lân can 5 lít', 'Dầu ăn Cái Lân là thương hiệu dầu ăn được sản xuất từ nguyên liệu tự nhiên với công nghệ tinh chế hiện đại, thích hợp cho nhiều cách chế biến thức ăn như chiên, xào và nấu các món ăn chay. Dầu thực vật tinh luyện Cái Lân 5 lít là sự lựa chọn tốt nhằm bảo vệ sức khỏe của người tiêu dùng', '', 202000, 11, 14, 0, 0),
(64, 'Dầu thực vật tinh luyện Olita can 5 lít', 'Dầu ăn Olita làm từ các loại dầu thiên nhiên như dầu đậu nành, dầu olein cao cấp. Dầu thực vật tinh luyện Olita 5 lít không chứa cholesterol, hoàn toàn an toàn cho sức khỏe và tốt cho người ăn kiêng hoặc mắc các bệnh tim mạch. Dầu ăn can dung tích 5 lít, tiết kiệm hơn cho mọi nhà.', '', 235000, 11, 14, 0, 0),
(65, 'Dầu olive Extra Virgin Olivoilà chai 750ml', 'Là loại sản phẩm dầu ăn cao cấp nhập khẩu từ Tây Ban Nha với tác dụng chống oxy hóa rất tốt, giúp tiêu hóa nhanh các chất béo dung nạp vào cơ thể và là dung môi hiệu quả cho việc hấp thụ các Vitamin. Chai lớn giúp người dùng tiết kiệm, thích hợp dùng trong quy mô quán ăn, nhà hàng.', '', 239000, 11, 14, 0, 0),
(66, 'Nước mắm cá cơm Nam Ngư 12 độ đạm chai 500ml', 'Nước mắm Nam Ngư đem đến cho người tiêu dùng Việt Nam những giọt nước mắm thơm ngon, sự lựa chọn hàng đầu của người Việt. Nước mắm Nam Ngư 12 độ đạm chai 500ml với dây chuyền khép kín với thành phần cá cơm tươi ngon tạo nên hương vị thơm ngon, đậm đà, màu sắc hấp dẫn.', '', 35000, 11, 15, 0, 0),
(67, 'Nước mắm cá cơm đặc sản Hưng Thịnh 40 độ đạm chai 220ml', 'Nước mắm Hưng Thịnh được sản xuất từ cá cơm nguyên chất với công nghệ ủ mắm hoàn toàn mới, sản xuất theo quy trình khép kín. Nước mắm Hưng Thịnh đặc sản 40 độ đạm chai 220ml mang đến hương vị đậm đà, đặc trưng của nước mắm cá cơm nguyên chất cùng độ đạm cao, mang đến những bữa ăn tuyệt vời.', '', 32000, 11, 15, 0, 0),
(68, 'Nước chấm chua ngọt Nam Ngư ớt tỏi Lý Sơn chai 300ml', 'Nước chấm chua ngọt Nam Ngư ớt tỏi Lý Sơn chai 300ml làm từ 100% tỏi đảo Lý Sơn cùng vị chua ngọt, cay the hấp dẫn, phù hợp với nhiều món ăn. Nước chấm Nam Ngư là loại nước chấm pha sẵn, kết hợp cùng các loại gia vị tươi ngon, phù hợp với các món ăn theo khẩu vị người Việt.', '', 35000, 11, 15, 0, 0),
(69, 'Sốt chấm thịt nướng hàn quốc O\'Food chai 250g', 'Là loại nước sốt chấm cao cấp, sản xuất theo công nghệ của Hàn Quốc từ thương hiệu nước chấm O\'Food. Sốt chấm thịt Hàn Quốc O\'Food 250g mang chuẩn hương vị sốt chấm Hàn Quốc, cho món ăn thêm thơm ngon, hấp dẫn, có thể dùng để chấm với hải sản và các loại rau củ luộc.', '', 32000, 11, 15, 0, 0),
(70, 'Dầu hào Maggi đậm đặc 530g & nước tương Maggi giảm muối 300ml', 'Dầu hào Maggi là một trong những loại dầu hào có màu sắc bắt mắt, hương vị lại rất đậm đà. Dầu hào Maggi đậm đặc 530g & nước tương Maggi giảm muối 300ml là những loại gia vị chất lượng, không thể thiếu trong không gian bếp của mỗi gia đình.', '', 48000, 11, 15, 0, 0),
(71, 'Dầu hào chay Lee Kum Kee chai 255g', 'Dầu hào Lee Kum Kee là thương hiệu dầu hào nhập khẩu từ Malaysia, được xem là một bí kíp cho các món xào được sáng bóng đẹp mắt. Dầu hào chay Lee Kum Kee chai 255g có hương vị cân bằng giữa vị ngọt xen lẫn vị mặn nhẹ, làm nổi bật lên sự tự nhiên tinh tế trong từng món ăn.', '', 39800, 11, 15, 0, 0),
(72, 'Đường kính trắng Toàn Phát gói 500g', 'Với chiết xuất từ mía tốt cho sức khỏe, sản phẩm đường kính trắng Toàn Phát gói 500g có hạt đường nhỏ màu trắng tinh khiết, không chứa chất độc hại đảm bảo an toàn sức khỏe cho người sử dụng, giúp chế biến nhiều món ăn, thức uống thơm ngon, hấp dẫn', '', 20000, 11, 16, 0, 0),
(73, 'Đường vàng An Khê gói 1kg', 'Thương hiệu đường An Khê là một trong những sự lựa chọn của mọi gia đình Việt. Đường vàng An Khê gói 1kg với hạt đường vàng tự nhiên từ cây mía, được sản xuất trên dây chuyền công nghệ hiện đại và sự lựa chọn hàng đầu cho các bà nội trợ trong việc chế biến.', '', 32000, 11, 16, 0, 0),
(74, 'Muối hạt thiên nhiên Vĩnh Hảo Sosal Group gói 1kg', 'Muối hạt thiên nhiên Vĩnh Hảo Sosal Group gói 1kg được làm từ muối hạt tự nhiên thông qua quá trình làm sạch và đóng gói nghiêm ngặt đạt chuẩn từ nhãn hiệu muối Sosal Group.', '', 7900, 11, 16, 0, 0),
(75, 'Muối tôm ớt kiểu Tây Ninh Dh Foods hũ 60g', 'Muối ăn của thương hiệu muối Dh Foods rất thích hợp cho các món trái cây, rau củ luộc, hấp... Muối tôm ớt kiểu Tây Ninh Dh Foods hũ 60g là gia vị không thể thiếu cho các món trái cây miền nhiệt đới với hạt muối to cùng hương vị đặc trưng giúp sản phẩm nổi bật so với các loại muối tinh thông thường.', '', 10000, 11, 16, 0, 0),
(76, 'Muối tiêu Guyumi hũ 60g', 'Sản phẩm không chỉ tiện lợi mà còn đảm bảo an toàn sức khỏe cho người sử dụng. Muối tiêu Guyumi chai 60g là sự kết hợp của muối khoáng thiên nhiên, kết hợp với những hạt tiêu thơm cay nhẹ nhàng tạo nên hương vị không thế chối từ của muối Guyumi.', '', 8000, 11, 16, 0, 0),
(77, 'Bột ngọt hạt lớn Ajinomoto gói 100g', 'Bột ngọt Ajinomoto là thương hiệu bột ngọt được làm từ mật mía đường và tinh bột khoai mì (bột sắn) an toàn cho người sử dụng. Bột ngọt hạt lớn Ajinomoto gói 100g có thể dùng để nêm nếm món canh, lẩu, kho, chiên, xào… hoặc dùng làm gia vị tẩm ướp.', '', 9200, 11, 16, 8, 0),
(78, 'Bột ngọt hạt lớn Yess gói 100g', 'Bột ngọt hạt lớn là loại gia vị được sử dụng phổ biến hiện nay, bột ngọt hạt lớn Yess được chiết xuất từ các nguyên liệu tự nhiên, an toàn cho sức khỏe. Bột ngọt hạt lớn Vedan Yess 100g khối lượng nhỏ, sử dụng tiện lợi, giúp bữa ăn thêm tròn vị, đậm đà và ngon ngọt hơn.', '', 8800, 11, 16, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamdonhang`
--

CREATE TABLE `sanphamdonhang` (
  `iddonhang` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `tensanpham` text NOT NULL,
  `hinhanh` text NOT NULL,
  `giacu` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtiengiacu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanphamdonhang`
--

INSERT INTO `sanphamdonhang` (`iddonhang`, `idsanpham`, `tensanpham`, `hinhanh`, `giacu`, `soluong`, `thanhtiengiacu`) VALUES
(31, 34, 'Bí đỏ hồ lô 800g', 'bi.jpg', 9900, 3, 29700),
(31, 36, 'Bầu sao trái 500g - 600g', 'bau.jpg', 9900, 3, 29700),
(31, 38, 'Dưa leo 500g (3 -5 trái)', 'dualeo.jpg', 9900, 3, 29700),
(32, 35, 'Cà tím 500g (2 - 3 trái)', 'catim.jpg', 8900, 41, 364900),
(32, 36, 'Bầu sao trái 500g - 600g', 'bau.jpg', 9900, 1, 9900),
(32, 34, 'Bí đỏ hồ lô 800g', 'bi.jpg', 9900, 1, 9900),
(32, 38, 'Dưa leo 500g (3 -5 trái)', 'dualeo.jpg', 9900, 16, 158400),
(33, 34, 'Bí đỏ hồ lô 800g', 'bi.jpg', 9900, 1, 9900),
(34, 35, 'Cà tím 500g (2 - 3 trái)', 'catim.jpg', 8900, 1, 8900),
(35, 35, 'Cà tím 500g (2 - 3 trái)', 'catim.jpg', 8900, 1, 8900),
(36, 49, 'Thịt nạc heo nhập khẩu đông lạnh 500g', 'thitheo.jpg', 59000, 3, 177000),
(36, 50, 'Sườn non heo nhập khẩu đông lạnh 500g (1 - 2 miếng)', 'suonheo.jpg', 67000, 5, 335000),
(37, 78, 'Bột ngọt hạt lớn Yess gói 100g', 'vedan.jpg', 8800, 4, 35200),
(38, 37, 'Đậu bắp 250g (12 - 18 trái)', 'daubap.jpg', 9000, 1, 9000),
(38, 35, 'Cà tím 500g (2 - 3 trái)', 'catim.jpg', 8900, 1, 8900),
(38, 34, 'Bí đỏ hồ lô 800g', 'bi.jpg', 9900, 1, 9900),
(38, 50, 'Sườn non heo nhập khẩu đông lạnh 500g', 'suonheo.jpg', 67000, 4, 67000),
(39, 50, 'Sườn non heo nhập khẩu đông lạnh 500g', 'suonheo.jpg', 67000, 16, 67000),
(40, 34, 'Bí đỏ hồ lô 800g', 'bi.jpg', 9900, 5, 9900),
(41, 77, 'Bột ngọt hạt lớn Ajinomoto gói 100g', 'aji.jpg', 9200, 3, 9200),
(41, 34, 'Bí đỏ hồ lô 800g', 'bi.jpg', 9900, 1, 9900),
(42, 34, 'Bí đỏ hồ lô 800g', 'bi.jpg', 9900, 1, 9900),
(43, 50, 'Sườn non heo nhập khẩu đông lạnh 500g', 'suonheo.jpg', 67000, 4, 268000),
(43, 38, 'Dưa leo 500g (3 -5 trái)', 'dualeo.jpg', 9900, 3, 29700),
(43, 39, 'Chanh không hạt 250g (2 - 5 trái)', 'chanh.jpg', 12500, 5, 62500),
(43, 57, 'Trứng gà ta Vương Ngọc Bích hộp 6 quả', 'trunggata.jpg', 23000, 5, 115000),
(44, 50, 'Sườn non heo nhập khẩu đông lạnh 500g', 'suonheo.jpg', 67000, 4, 67000),
(45, 77, 'Bột ngọt hạt lớn Ajinomoto gói 100g', 'aji.jpg', 9200, 5, 9200);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamthongke`
--

CREATE TABLE `sanphamthongke` (
  `idthongke` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `tensanpham` varchar(500) NOT NULL,
  `hinhanh` text NOT NULL,
  `soluong` int(11) NOT NULL,
  `giacu` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanphamthongke`
--

INSERT INTO `sanphamthongke` (`idthongke`, `idsanpham`, `tensanpham`, `hinhanh`, `soluong`, `giacu`, `thanhtien`) VALUES
(1, 1, '1', '1', 1, 111, 111),
(1, 2, '22222', '222', 222, 222, 222),
(2, 1, '11', '1', 1, 1, 1),
(9, 34, '', '', 5, 0, 9900),
(10, 34, 'Bí đỏ hồ lô 800g', 'bi.jpg', 2, 0, 19800),
(10, 77, 'Bột ngọt hạt lớn Ajinomoto gói 100g', 'aji.jpg', 3, 0, 9200),
(11, 77, 'Bột ngọt hạt lớn Ajinomoto gói 100g', 'aji.jpg', 5, 0, 9200),
(11, 50, 'Sườn non heo nhập khẩu đông lạnh 500g', 'suonheo.jpg', 4, 0, 268000),
(11, 38, 'Dưa leo 500g (3 -5 trái)', 'dualeo.jpg', 3, 0, 29700),
(11, 39, 'Chanh không hạt 250g (2 - 5 trái)', 'chanh.jpg', 5, 0, 62500),
(11, 57, 'Trứng gà ta Vương Ngọc Bích hộp 6 quả', 'trunggata.jpg', 5, 0, 115000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idtaikhoan` int(11) NOT NULL,
  `tentaikhoan` text NOT NULL,
  `matkhau` text NOT NULL,
  `sodienthoai` text NOT NULL,
  `quanly` int(11) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`idtaikhoan`, `tentaikhoan`, `matkhau`, `sodienthoai`, `quanly`, `admin`) VALUES
(1, 'admin', 'ThanhLan2004', '0702723017', 0, 1),
(6, 'AnhKiDiBo', 'AnhKiDiBo', '0994030243', 1, 0),
(7, 'AnhKiDiBo1', 'AnhKiDiBo1', '0994030244', 1, 0),
(8, 'AnhKiDiBo2', '12345678', '0994030247', 0, 0),
(10, 'KhachHang', '12345678', '0994030267', 0, 0),
(11, 'Admin2', 'Concho2018', '0994030278', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongke`
--

CREATE TABLE `thongke` (
  `idthongke` int(11) NOT NULL,
  `iddau` int(11) NOT NULL,
  `idsau` int(11) NOT NULL,
  `doanhthu` int(11) NOT NULL,
  `ngayxuat` varchar(50) NOT NULL,
  `banduoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongke`
--

INSERT INTO `thongke` (`idthongke`, `iddau`, `idsau`, `doanhthu`, `ngayxuat`, `banduoc`) VALUES
(10, 40, 42, 29000, '2024-01-06 04:38:26', 2),
(11, 42, 45, 484400, '2024-01-06 04:53:35', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`iddanhgia`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`iddonhang`),
  ADD KEY `idtaikhoan` (`idtaikhoan`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD KEY `idsanpham_hinhanh` (`idsanpham`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`idloai`);

--
-- Chỉ mục cho bảng `loaicon`
--
ALTER TABLE `loaicon`
  ADD PRIMARY KEY (`idloaicon`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsanpham`);

--
-- Chỉ mục cho bảng `sanphamdonhang`
--
ALTER TABLE `sanphamdonhang`
  ADD KEY `idsanpham` (`idsanpham`),
  ADD KEY `iddonhang` (`iddonhang`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idtaikhoan`);

--
-- Chỉ mục cho bảng `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`idthongke`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `iddanhgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `iddonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `idloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `loaicon`
--
ALTER TABLE `loaicon`
  MODIFY `idloaicon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idtaikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `thongke`
--
ALTER TABLE `thongke`
  MODIFY `idthongke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `idtaikhoan` FOREIGN KEY (`idtaikhoan`) REFERENCES `taikhoan` (`idtaikhoan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `idsanpham_hinhanh` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`idsanpham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanphamdonhang`
--
ALTER TABLE `sanphamdonhang`
  ADD CONSTRAINT `iddonhang` FOREIGN KEY (`iddonhang`) REFERENCES `donhang` (`iddonhang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
