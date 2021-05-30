-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2021 lúc 11:51 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl_ltnc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int(10) UNSIGNED NOT NULL,
  `noi_dung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_tin_tuc` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `noi_dung`, `created_at`, `updated_at`, `id_tin_tuc`, `id_user`) VALUES
(1, 'Bài viết quá hay', '2021-04-29 21:56:49', '2021-04-29 21:56:49', 1, 7),
(2, 'Bài viết rất hay', '2021-04-30 04:05:37', '2021-04-30 04:05:37', 1, 34),
(3, 'Thông tin rất bổ ích ạ', '2021-04-30 04:11:14', '2021-04-30 04:11:14', 1, 36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giang_vien`
--

CREATE TABLE `giang_vien` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_vi_tri` int(10) UNSIGNED NOT NULL,
  `ms_giang_vien` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giang_vien`
--

INSERT INTO `giang_vien` (`id`, `id_user`, `id_vi_tri`, `ms_giang_vien`) VALUES
(1, 1, 2, 6),
(2, 2, 1, 1),
(3, 4, 3, 11),
(4, 6, 1, 2),
(5, 7, 1, 3),
(6, 8, 1, 4),
(7, 9, 1, 5),
(8, 10, 1, 0),
(9, 11, 2, 7),
(10, 12, 2, 8),
(11, 13, 2, 9),
(12, 14, 2, 10),
(13, 15, 3, 12),
(14, 16, 3, 13),
(15, 17, 3, 14),
(16, 18, 3, 15),
(17, 19, 4, 16),
(18, 20, 4, 17),
(19, 21, 4, 18),
(20, 22, 4, 19),
(21, 23, 4, 20),
(22, 24, 5, 21),
(23, 25, 5, 22),
(24, 26, 5, 23),
(25, 27, 5, 24),
(26, 28, 5, 25),
(27, 29, 8, 26),
(28, 30, 8, 27),
(29, 31, 8, 28),
(30, 32, 8, 29),
(31, 33, 8, 30),
(32, 34, 7, 31),
(33, 35, 1, 31);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa_hoc`
--

CREATE TABLE `khoa_hoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `nien_khoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa_hoc`
--

INSERT INTO `khoa_hoc` (`id`, `nien_khoa`) VALUES
(1, 'KHÓA 62'),
(2, 'KHÓA 63');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lanh_dao`
--

CREATE TABLE `lanh_dao` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_chuc_vu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_giang_vien` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lanh_dao`
--

INSERT INTO `lanh_dao` (`id`, `ten_chuc_vu`, `id_giang_vien`) VALUES
(1, 'VIỆN TRƯỞNG', 21),
(2, 'TRƯỞNG BỘ MÔN', 4),
(3, 'PHÓ TRƯỞNG BỘ MÔN', 5),
(4, 'PHÓ TRƯỞNG BỘ MÔN', 2),
(5, 'TRƯỞNG BỘ MÔN', 1),
(6, 'PHÓ TRƯỞNG BỘ MÔN', 9),
(7, 'PHÓ TRƯỞNG BỘ MÔN', 10),
(8, 'TRƯỞNG BỘ MÔN', 27),
(9, 'PHÓ TRƯỞNG BỘ MÔN', 28),
(10, 'TRƯỞNG BỘ MÔN', 17),
(11, 'PHÓ TRƯỞNG BỘ MÔN', 18),
(12, 'PHÓ TRƯỞNG BỘ MÔN', 19),
(13, 'TRƯỞNG BỘ MÔN', 22),
(14, 'PHÓ TRƯỞNG BỘ MÔN', 23),
(15, 'PHÓ TRƯỞNG BỘ MÔN', 24),
(16, 'TRƯỞNG BỘ MÔN', 3),
(17, 'PHÓ TRƯỞNG BỘ MÔN', 13),
(18, 'LÃNH ĐẠO TRUNG TÂM', 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_tin`
--

CREATE TABLE `loai_tin` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_khong_dau` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_tin`
--

INSERT INTO `loai_tin` (`id`, `ten`, `ten_khong_dau`, `created_at`, `updated_at`) VALUES
(1, 'TIN TỨC ĐÀO TẠO', 'tin-tuc-dao-tao', '2021-04-27 10:48:15', '2021-04-27 10:48:15'),
(2, 'TIN TỨC HOẠT ĐỘNG', 'tin-tuc-hoat-dong', '2021-04-27 10:48:49', '2021-04-27 10:48:49'),
(3, 'TIN TỨC NGHIÊN CỨU', 'tin-tuc-nghien-cuu', '2021-04-27 10:49:36', '2021-04-27 10:49:36'),
(4, 'TIN TỨC TUYỂN DỤNG', 'tin-tuc-tuyen-dung', '2021-04-27 10:49:57', '2021-04-27 10:49:57'),
(5, 'TIN TỨC TUYỂN SINH', 'tin-tuc-tuyen-sinh', '2021-04-27 10:50:15', '2021-04-27 10:50:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc`
--

CREATE TABLE `lop_hoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_lop_hoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_khoa_hoc` int(10) UNSIGNED NOT NULL,
  `id_giang_vien` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop_hoc`
--

INSERT INTO `lop_hoc` (`id`, `ten_lop_hoc`, `id_khoa_hoc`, `id_giang_vien`) VALUES
(1, 'ĐTVT-01', 1, 33),
(2, 'ĐTVT-02', 1, 33);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2010_04_24_093448_khoa_hoc', 1),
(2, '2011_04_14_143412_vi_tri', 1),
(3, '2012_08_19_000000_create_failed_jobs_table', 1),
(4, '2012_10_12_000000_create_users_table', 1),
(5, '2012_10_12_100000_create_password_resets_table', 1),
(6, '2013_04_24_094312_giang_vien', 1),
(7, '2014_04_24_103658_lop_hoc', 1),
(8, '2015_04_24_104406_lanh_dao', 1),
(9, '2016_04_24_104757_sinh_vien', 1),
(10, '2021_04_14_01000_loai_tin', 1),
(11, '2021_04_14_02000_tin_tuc', 1),
(12, '2021_04_14_03000_binh_luan', 1),
(13, '2021_04_24_110534_tuyen_sinh', 1),
(14, '2021_04_24_111654_tin_nhan_cho', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `id` int(10) UNSIGNED NOT NULL,
  `mssv` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_lop_hoc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinh_vien`
--

INSERT INTO `sinh_vien` (`id`, `mssv`, `id_user`, `id_lop_hoc`) VALUES
(1, 20172719, 3, 1),
(2, 20172639, 36, 1),
(3, 20172021, 37, 1),
(4, 20172719, 38, 2),
(5, 20172020, 39, 2),
(6, 20172022, 40, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_nhan_cho`
--

CREATE TABLE `tin_nhan_cho` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `duyet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_nhan_cho`
--

INSERT INTO `tin_nhan_cho` (`id`, `name`, `email`, `noi_dung`, `duyet`) VALUES
(1, 'Nguyễn Xuân Công', 'cong2541999@gmail.com', 'Bao giờ trường mới nộp hồ sơ ạ', 1),
(2, 'Nguyễn Xuân Công', 'cong2541999@gmail.com', 'Ăn cơm chưa', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieu_de` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieu_de_khong_dau` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tom_tat` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luot_xem` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_loai_tin` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_tuc`
--

INSERT INTO `tin_tuc` (`id`, `tieu_de`, `tieu_de_khong_dau`, `tom_tat`, `hinh`, `noi_dung`, `so_luot_xem`, `created_at`, `updated_at`, `id_loai_tin`, `id_user`) VALUES
(1, 'Chương trình đào tạo Kỹ sư chuẩn ngành Kỹ thuật Điện tử Viễn thông', 'chuong-trinh-dao-tao-ky-su-chuan-nganh-ky-thuat-dien-tu-vien-thong', 'Thông báo về đề cương chương trình đào tạo Kỹ sư chuẩn 161 tín chỉ ngành Kỹ thuật Điện tử Viễn thông được đưa vào áp dụng từ K62 trở đi.', 'L6Tv_dscf0912-enhanced.jpg', '<p>Thông báo về đề cương chương trình đào tạo Kỹ sư chuẩn 161 tín chỉ ngành Kỹ thuật Điện tử Viễn thông được đưa vào áp dụng từ K62 trở đi.</p>\r\n\r\n<p>Tải file chương trình đào tạo bên dưới !</p>\r\n\r\n<p><a href=\"https://set.hust.edu.vn/storage/dao-tao/ctdt-ky-su-161tc-ktdtvt-de-cuong-chi-tiet-update-112020.pdf\" style=\"color:red; text-decoration: none; \">CTĐT Kỹ sư 161TC ngành KTĐTVT</a></p>', 12, '2021-04-28 08:02:05', '2021-04-30 04:11:15', 1, 1),
(2, 'Hướng dẫn trình bày quyển Đồ án tốt nghiệp và các định dạng template có thể sử dụng', 'huong-dan-trinh-bay-quyen-do-an-tot-nghiep-va-cac-dinh-dang-template-co-the-su-dung', 'Tài liệu này được Viện Điện tử - Viễn thông, trường Đại học Bách Khoa Hà Nội soạn thảo và ban hành nhằm mục đích hướng dẫn sinh viên trình bày đồ án tốt nghiệp một cách khoa học và thống nhất', 'ke7r_et-e4-7.jpg', '<p>Viện ĐTVT xin thông báo về 3 Chương trình đào tạo&nbsp;tích hợp mới, áp dụng cho sinh viên Chương trình tiên tiến&nbsp;&nbsp;K62 và K63. Các em sinh viên K62 và K63 đọc kỹ chương trình đào tạo để nắm được các môn học nằm trong CTĐT và&nbsp;được tính CPA.</p>\r\n\r\n<p><a href=\"https://set.hust.edu.vn/storage/dao-tao/ctdt-chuyen-giao-cho-cttt-k62-va-k63/cttt-cu-nhan-thac-sy-kt-dien-tu-112020-official.pdf\" style=\"text-decoration: none; style=\"><span style=\"color:#c0392b\">Quyển CTTT tích hợp Kỹ thuật điện tử (Mã tuyển sinh ĐH: ET-E4)</span></a></p>\r\n\r\n<p><a href=\"https://set.hust.edu.vn/storage/dao-tao/ctdt-chuyen-giao-cho-cttt-k62-va-k63/cttt-cu-nhan-thac-sy-kt-vien-thong-112020-official.pdf\" style=\"text-decoration: none\"><span style=\"color:#c0392b\">Quyển CTTT tích hợp Kỹ thuật viễn thông (ET-E4)</span></a></p>\r\n\r\n<p><a href=\"https://set.hust.edu.vn/storage/dao-tao/ctdt-chuyen-giao-cho-cttt-k62-va-k63/cttt-cu-nhan-thac-sy-kt-y-sinh-112020-official.pdf\" style=\"text-decoration: none\"><span style=\"color:#c0392b\">Quyển CTTT tích hợp Kỹ thuật Y sinh (ET-E5)</span></a></p>', 3, '2021-04-29 00:56:50', '2021-04-30 04:04:29', 1, 10),
(3, 'Hào hứng trong ngày nhập học đầu tiên của tân sinh viên K65', 'hao-hung-trong-ngay-nhap-hoc-dau-tien-cua-tan-sinh-vien-k65', 'Ngày đầu tiên nhập học, Hà Nội đón các bạn tân sinh viên Viện Điện tử - Viễn thông bằng một cơn mưa nặng hạt', 'gHV8_121526848-3158374964292320-3231167898335542638-o.jpg', '<p>Ngày đầu tiên nhập học, Hà Nội đón các bạn tân sinh viên Viện Điện tử - Viễn thông bằng một cơn mưa nặng hạt. Nhưng điều đó không thể lất át niềm vui và sự háo hức của các bạn tân sinh viên trong ngày nhập học đầu tiên của mình.</p>\r\n\r\n<p>Nhận được sự hỗ trợ đông đảo từ các thầy cô và các anh chị trong viện, trong đó có hơn 400 bạn sinh viên đã hoàn thành thủ tục nhập học và chính thức trở thành thành viên của đại gia đình SET. Giờ đây, cảm xúc của các bạn là gì khi vừa bước vào một chặng đường mới, nơi mà bố mẹ không thể lúc nào cũng kề bên, cùng rất nhiều điều mới lạ mà bạn có thể chưa từng gặp phải. Nhưng đừng vì vậy mà quá lo lắng, 2 chữ &ldquo;Đại học&rdquo; có lẽ không quá đáng sợ vậy đâu vì đây chính là nơi giúp ta hoàn thiện bản thân và trải qua một &ldquo;THANH XUÂN&rdquo; trọn vẹn và tươi đẹp nhất!!. Bước chân vào đại học chính là lúc K65 phải rời xa vòng tay của bố mẹ, nhưng đừng vội lo lắng nha, vì vòng tay rộng lớn của đại gia đình SET luôn dang rộng chào đón các bạn.</p>\r\n\r\n<p>Còn những bạn chưa nhập học hôm nay cũng không phải buồn đâu nha, mai chúng ta vẫn còn lịch hẹn với nhau mà. Hãy cùng nhìn lại trang bị của bản thân để sẵn sàng bước vào cổng trường ĐH Bách Khoa Hà Nội nha. Hẹn gặp các bạn ở tòa C9 ngày mai nhé</p>\r\n\r\n<p>Cuối cùng chúng ta cùng điểm lại một số hình ảnh đáng yêu ở gia đình mới này trong ngày hôm nay nhé!</p>\r\n\r\n<p><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/dao-tao/121367911-3158373260959157-2383141609364263476-o.jpg\" /><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/dao-tao/121160880-3158373927625757-1956443303709011395-o.jpg\" /><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/dao-tao/121108493-3158376750958808-7388859784126951259-o.jpg\" /><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/dao-tao/121325047-3158373437625806-9112023715248621350-o.jpg\" /></p>', 1, '2021-04-29 01:04:49', '2021-05-27 09:38:20', 1, 10),
(4, 'Cùng nhìn lại lễ hội tốt nghiệp - hướng nghiệp 2020', 'cung-nhin-lai-le-hoi-tot-nghiep-huong-nghiep-2020', 'Cùng nhìn lại lễ hội tốt nghiệp - hướng nghiệp 2020', 'B17i_screen-shot-2020-07-24-at-225251-960x540.png', '<p>💝💝💝BỒI HỒI NHÌN LẠI CÁC HOẠT ĐỘNG CỦA LỄ HỘI TỐT NGHIỆP HƯỚNG NGHIỆP 2020&nbsp;💝💝💝<br />\r\n=======================================<br />\r\n🥰Thời gian trôi nhanh không chờ một ai, có lẽ các bạn sinh viên vẫn còn nhớ như in giây phút được là tân sinh viên viện Điện tử - Viễn thông mà nay đã sắp phải rời xa nơi này. Trong 3 ngày vừa qua, các bạn sinh viên đã phải đối mặt với thách thức không nhỏ để hoàn thành buổi bảo vệ tốt nghiệp của mình được tốt nhất.<br />\r\n🌹Xin gửi lời cảm ơn chân thành nhất tới ban lãnh đạo Viện ĐTVT phối hợp cùng 14 Nhà tài trợ, đặc biệt là sự đồng hành của 3 Nhà tài trợ vàng: Tổng công ty Công nghệ cao Viettel, Tập đoàn Sámung Việt Nam và Công ty Cổ phần BKAV đã tổ chức thành công lễ hội Tốt nghiệp - Hướng nghiệp viện Điện tử - Viễn thông 2020. Với 3 ngày của mùa Bảo vệ đồ án tốt nghiệp với không khí ở nhiệt độ sôi và đặc biệt hơn cả là đêm hội GALA DINNER đầy trang trọng và đáng nhớ.&nbsp;<br />\r\n🌹Xin chân thành gửi lời cảm ơn đến toàn thể Ban tổ chức, 2 MC xinh đẹp và đáng yêu cùng các tiết mục văn nghệ vô cùng sôi động đến từ ban nhạc Dứa Band và nhóm nhảy MIC đã giúp đêm tiệc trở nên đáng nhớ.<br />\r\n🌹Và một lời cảm ơn đặc biệt nhất xin gửi tới toàn thể quý thầy cô cùng các bạn sinh viên Viện Điện tử - Viễn thông đã có mặt đông đủ để cùng nhau trải qua các cung bậc cảm xúc: có lẽ là một chút vui mừng khi đã tốt nghiệp, cũng có một chút hụt hẫng khi sắp phải rời xa bạn bè thầy cô, có một chút hoài niệm về những kí ức, và là cả sự hào hứng khi là người may mắn nhận được những món quà trong bữa tiệc.😆&nbsp;Dù có là gì, thì đó cũng chính là những giây phút hạnh phúc nhất, giây phút đánh dấu tất cả các bạn đã chính thức trở thành tân cử nhân, tân kỹ sư viện Điện tử- Viễn thông.<br />\r\nTHẾ LÀ ĐÃ KẾT THÚC THỜI KỲ SINH VIÊN RỒI !<br />\r\nTHẾ LÀ ĐÃ TRƯỞNG THÀNH VÀ SẮP BƯỚC SANG MỘT TRANG MỚI RỒI !<br />\r\nTrên con đường dài phía trước, chúc các bạn thật dũng cảm và bước những bước đi hiên ngang để chinh phục những ước mơ của mình.🥰🥰</p>\r\n\r\n<p><iframe width=\"840\" height=\"472.5\" src=\"https://www.youtube.com/embed/-hm4QfoUL78\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe></p>', 0, '2021-04-29 01:12:48', '2021-04-29 01:16:15', 1, 10),
(5, 'Hội thảo trực tuyến Ericsson - \"Private Network\"', 'hoi-thao-truc-tuyen-ericsson-private-network', 'Hội thảo trực tuyến \"Private Network\" sẽ được chia sẻ bởi các Chuyên gia của Ericson', 'uNkD_private-network-ericsson.png', '<p>Hội thảo trực tuyến &quot;Private Network&quot; sẽ được chia sẻ bởi các Chuyên gia của Ericson bằng tiếng Việt trong thời gian 60 phút với nội dung chính như sau:</p>\r\n\r\n<ul>\r\n	<li>Tình hình thực tế các ngành công nghiệp Việt Nam hiện nay</li>\r\n	<li>Các giải pháp của Ericsson để giải quyết các thách thức hiện nay</li>\r\n	<li>Ảnh hưởng của thực tế này đến công việc và định hướng phát triển của sinh viên trong tương lai.</li>\r\n</ul>\r\n\r\n<p>Thời gian: October 22nd, 2020<br />\r\nCách thức tham gia: Hội thảo trực tuyến qua Microsoft Teams<br />\r\n<br />\r\nEricsson tự hào là tập đoàn viễn thông Thụy Điển có mặt tại 180 quốc gia với lịch sử 140 năm hoạt động. 40% lưu lượng di động trên toàn cầu được thực hiện trên nền tảng thiết bị của Ericsson. Ericsson sở hữu 39.000 bằng sáng chế trong lĩnh vực viễn thông di động. Với ưu thế về giải pháp, Ericsson hiện nay đang dẫn đầu trong việc triển khai mạng 5G với hơn 70 hợp đồng trên toàn thế giới. (<a href=\"https://www.google.com/url?q=https://www.ericsson.com/en&amp;sa=D&amp;ust=1602890814496000&amp;usg=AFQjCNEN2f-k4eBmtIOuc6eddwyyjCLy3g\">https://www.ericsson.com/en</a>)<br />\r\n<br />\r\nVới mong muốn hỗ trợ sinh viên chuyên ngành Điện tử Viễn thông - Đại học Bách Khoa cập nhật với các thông tin kiến thức chuyên môn hiện nay trên thế giới, Ericsson sẽ hợp tác cùng Viện Điện tử Viễn thông tổ chức các hội thảo chuyên ngành và kỹ năng trong năm học 2020.<br />\r\n<br />\r\nHội thảo trực tuyến &quot;Private Network&quot; sẽ được chia sẻ bởi các Chuyên gia của Ericson bằng tiếng Việt trong thời gian 60 phút với nội dung chính như sau:<br />\r\n<br />\r\n- Tình hình thực tế các ngành công nghiệp Việt Nam hiện nay<br />\r\n- Các giải pháp của Ericsson để giải quyết các thách thức hiện nay<br />\r\n- Ảnh hưởng của thực tế này đến công việc và định hướng phát triển của sinh viên trong tương lai.<br />\r\n<br />\r\nCác Chuyên gia Ericsson sẵn lòng giải đáp các câu hỏi của các sinh viên tham dự hội thảo.<br />\r\n<br />\r\nVui lòng điền đầy đủ thông tin đăng ký tham dự hội thảo dưới đây để tiện cho việc tổ chức. Đường link tham gia hội thảo sẽ được gửi đến email cá nhận sau khi các bạn hoàn tất đăng ký.</p>\r\n\r\n<p>Biểu mẫu đăng ký:&nbsp;<a href=\"https://docs.google.com/forms/d/e/1FAIpQLScCcGHc4m5tCK0hFN5NUYxefgeye3bqNaCDXZLJuGg8lP7O8w/viewform?usp=sf_link\">Tại đây</a>.&nbsp;&nbsp;<br />\r\nNếu có đề xuất/ yêu cầu hỗ trợ đặc biệt, vui lòng gửi email đến&nbsp;<a href=\"mailto:trang.a.nguyen@ericsson.com\">trang.a.nguyen@ericsson.com</a></p>\r\n\r\n<p><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/dao-tao/private-network-ericsson.png\" /></p>', 0, '2021-04-29 01:18:47', '2021-04-29 01:18:47', 1, 10),
(6, 'Kế hoạch tổ chức hoạt động sinh viên nghiên cứu và sáng tạo năm học 2020-2021', 'ke-hoach-to-chuc-hoat-dong-sinh-vien-nghien-cuu-va-sang-tao-nam-hoc-2020-2021', 'Nhằm thúc đẩy các hoạt động nghiên cứu sáng tạo trong sinh viên. Trường Đại học Bách Khoa Hà Nội, Viện Điện tử Viễn thông sẽ tổ chức tuần lễ hoạt động sinh viên nghiên cứu và sáng tạo năm 2021. Kế hoạch cụ thể như sau:', '3UIM_nckh2020-79-2-960x540.jpg', '<p>Nhằm thúc đẩy các hoạt động nghiên cứu sáng tạo trong sinh viên. Trường Đại học Bách Khoa Hà Nội, Viện Điện tử Viễn thông sẽ tổ chức tuần lễ hoạt động sinh viên nghiên cứu và sáng tạo năm 2021. Kế hoạch cụ thể như sau:</p>\r\n\r\n<p>Chương trình chi tiết hoạt động Sinh viên nghiên cứu khoa học cấp Trường lần thứ 38, năm học 2020- 2021&nbsp;như sau:</p>\r\n\r\n<ul>\r\n	<li><em>10-14/5</em><em>/2021:</em></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Sinh viên nộp báo cáo tại các bộ môn. (Theo mẫu&nbsp;QLNC.QT06.BM04 và mẫu QLNC.QT06.BM08)</li>\r\n	<li>Tổ chức phản&nbsp;biện các đề tài tại&nbsp;cấp bộ môn</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><em>14/5/2021:&nbsp;&nbsp;</em>Các đơn vị nộp danh sách Hội đồng và chế bản của phân ban về phòng QLNC.</li>\r\n	<li><em>19-21/5/2021:&nbsp;</em>Các đơn vị tổ chức&nbsp;phân ban của&nbsp;Hội nghị và triển lãm sản phẩm theo&nbsp;lịch phân công tại&nbsp;Thư viện TQB.</li>\r\n	<li><em>21/5/2020:&nbsp;</em>Các đơn vị hoàn&nbsp;thiện&nbsp;hồ sơ đánh giá của các phân ban gửi về Phòng QLNC.</li>\r\n	<li><em>25/5/2021:&nbsp;</em>Họp&nbsp;Hội đồng xét giải cấp Trường và xét&nbsp;đề xuất&nbsp;dự thi&nbsp;Giải thưởng &ldquo;Sinh viên nghiên cứu khoa học&rdquo; cấp Bộ năm 2021.&nbsp;Các Chủ tịch và Thư ký Hội đồng có mặt.(Đề nghị các chủ tịch Hội đồng không cử cán bộ đi thay)</li>\r\n	<li><em>03-04/6/2021:&nbsp;</em>Triển lãm sản phẩm NCKH của sinh viên. Các đơn vị bố trí sản phẩm triển lãm theo yêu cầu của BTC, hoàn thành khu vực triển lãm trước&nbsp;12h00&nbsp;ngày&nbsp;03/06/2021, tháo dỡ vào 12h ngày&nbsp;04/6/2021.</li>\r\n	<li><em>04/6/2021:&nbsp;&nbsp;</em>Lễ tổng kết hoạt động SVNCKH và lễ khởi động&nbsp;Cuộc thi&nbsp;Sáng tạo trẻ Bách khoa 2021 tại&nbsp;Hội trường C2. Lãnh đạo các đơn vị, đại diện các Hội đồng, giáo viên hướng dẫn và các nhóm sinh viên NCKH tham dự.</li>\r\n	<li>Các biểu mẫu của cuộc thi có thể download từ&nbsp;<a href=\"http://bit.ly/MauSVNCKH20202021\" target=\"_blank\">http://bit.ly/MauSVNCKH20202021</a></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://set.hust.edu.vn/storage/minhnguyenduc1/nckh2020-79-2.jpg\" /><img alt=\"\" src=\"https://set.hust.edu.vn/storage/minhnguyenduc1/nckh2020-71-2.jpg\" /><img alt=\"\" src=\"https://set.hust.edu.vn/storage/minhnguyenduc1/nckh2020-60-2.jpg\" /><img alt=\"\" src=\"https://set.hust.edu.vn/storage/minhnguyenduc1/nckh2020-57-2.jpg\" /><img alt=\"\" src=\"https://set.hust.edu.vn/storage/minhnguyenduc1/nckh2020-11-1.jpg\" /><img alt=\"\" src=\"https://set.hust.edu.vn/storage/minhnguyenduc1/nckh2020-3-2.jpg\" /></p>', 1, '2021-04-29 01:26:32', '2021-04-30 04:12:30', 2, 10),
(7, 'Danh sách trúng tuyển trợ giảng HK20201', 'danh-sach-trung-tuyen-tro-giang-hk20201', 'Sau buổi phỏng vấn tại văn phòng Viện C9-401, các sinh viên sau đã trúng tuyển làm trợ giảng cho Học kỳ 20201 này', 'Iv09_3789562-960x540.jpg', '<p>Sau buổi phỏng vấn tại văn phòng Viện C9-401, các sinh viên sau đã trúng tuyển làm trợ giảng cho Học kỳ 20201 này</p>\r\n\r\n<p><strong><a href=\"https://set.hust.edu.vn/storage/tin-tuc/tuyen-dung/danh-sach-trung-tuyen-tro-giang-ky-20201.xlsx\">danh sach trung tuyen tro giang ky 20201</a></strong></p>', 0, '2021-04-29 01:32:49', '2021-04-29 01:32:49', 2, 10),
(8, 'Thử thách chúc tết xuân Kỷ hợi 2020', 'thu-thach-chuc-tet-xuan-ky-hoi-2020', 'Hãy cùng xem thầy trò viện Điện tử - Viễn thông chia sẻ lời chúc đầu năm và mong ước cho năm mới.', 'TPpY_screen-shot-2020-07-09-at-134219-960x540.png', '<p>Năm cũ Kỹ Hợi đang dần qua, năm mới Canh Tý đang đến. Hãy cùng xem thầy trò viện Điện tử - Viễn thông chia sẻ lời chúc đầu năm và mong ước cho năm mới.&nbsp;<br />\r\nVideo có sự tham gia của thầy Viện trưởng Hữu Thanh, cô giáo thời trang Trương Thu Hương, Hotboy siêu trí tuệ Việt Hoàng, các bạn nữ xinh xắn học giỏi Hoàng Lê Diệu Hường (học bổng Honda YES), Nguyễn Mai Anh (Sao tháng giêng), Trần Thu Mai Anh (lớp trưởng Hệ thống nhúng IoT), Hà Văn Phú (Sinh viên Tiến sĩ điện tử ở Pháp), Nguyễn Sơn Lâm (Kỹ sư phần cứng Toshiba tại Nhật Bản)</p>\r\n\r\n<p><iframe src=\"https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fset2010%2Fvideos%2F841017519654955%2F&show_text=0&width=\" width=\"840\" height=\"472.5\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowfullscreen=\"true\" allow=\"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share\" allowFullScreen=\"true\"></iframe></p>', 0, '2021-04-29 01:35:48', '2021-04-29 01:35:48', 2, 10),
(10, 'Gala Dinner Lễ Tốt nghiệp 2020', 'gala-dinner-le-tot-nghiep-2020', 'Hot hot. \r\n\r\n‼️Năm nay chúng ta sẽ có một lễ hội \"Tốt nghiệp hướng nghiệp\" dành cho tất cả sinh viên tốt nghiệp kỳ 2, năm học 2019-2020 (không kể khóa nào, miễn là tốt nghiệp kì này)', '4zaM_106487366-2919862141444783-2221592147449311070-o-960x540.jpg', '<p>Hot hot.&nbsp;</p>\r\n\r\n<p>‼️Năm nay chúng ta sẽ có một lễ hội &quot;Tốt nghiệp hướng nghiệp&quot; dành cho tất cả sinh viên tốt nghiệp kỳ 2, năm học 2019-2020 (không kể khóa nào, miễn là tốt nghiệp kì này)</p>\r\n\r\n<p><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/106487366-2919862141444783-2221592147449311070-o.jpg\" /></p>\r\n\r\n<p>👉Trong lễ hội tốt nghiệp các bạn sẽ không chỉ bảo vệ tốt nghiệp mà sẽ có cơ hội tiếp xúc với các nhà tuyển dụng, tìm hiểu các cơ hội nghề nghiệp, thậm chí nộp hồ sơ và được phỏng vấn việc làm.&nbsp;</p>\r\n\r\n<p>👉Các bạn còn được tham dự một buổi tiệc kết thúc quãng đời sinh viên vui vẻ thân tình với các thầy cô hướng dẫn, các doanh nghiệp. (Buổi tiệc là miễn phí)</p>\r\n\r\n<p>👉Các bạn sẽ được nhận các phần quà của nhà tài trợ, tham gia quay số trúng thưởng trong đêm Gala Dinner.&nbsp;</p>\r\n\r\n<p>❓Bạn có muốn tham gia Gala Dinner? Hãy đăng ký ngay biểu mẫu sau.&nbsp;<br />\r\nHạn đăng ký: hết 5/7/2020.<br />\r\nhttps://forms.office.com/Pages/ResponsePage.aspx&hellip;<br />\r\n(Cần login account email hust.edu.vn để điền form)</p>', 0, '2021-04-29 01:38:30', '2021-04-29 01:40:10', 2, 10),
(11, 'Tuần lễ sinh viên Nghiên cứu khoa học', 'tuan-le-sinh-vien-nghien-cuu-khoa-hoc', 'Tuần lễ sinh viên Nghiên cứu khoa học', 'hDzM_nckh2020-148-1-960x540.jpg', '<p>TỔNG KẾT TUẦN LỄ SINH VIÊN NGHIÊN CỨU KHOA HỌC&nbsp;✨<br />\r\n✨&nbsp;LẦN THỨ 37 - VIỆN ĐIỆN TỬ VIỄN THÔNG✨<br />\r\n[🎈🎈🎈PART 1🎈🎈🎈]<br />\r\n========================================<br />\r\n🎉&nbsp;Tuần lễ Sinh viên Nghiên cứu Khoa học Viện Điện tử - Viễn thông với sự tham gia của 34 đề tài đã kết thúc tốt đẹp vào ngày 7/3/2020 tại thư viện Tạ Quang Bửu.<br />\r\n🎉&nbsp;Hội đồng đánh giá bao gồm các thầy cô trong viện, các đơn vị doanh nghiệp: Fsoft, VNPT Hà nội, VNPT Technology, Viettel. Qua quá trình làm việc nghiêm túc, xét duyệt kỹ lưỡng các đề tài, hội đồng đã trao thưởng cho các công trình xuất sắc nhất.&nbsp;<br />\r\n🎉&nbsp;Kết quả cụ thể như sau:&nbsp;<br />\r\nHỘI ĐỒNG VIỄN THÔNG:&nbsp;<br />\r\n🏆Giải nhất: NGHIÊN CỨU THIẾT KẾ ANTEN BA PHÂN CỰC TRỰC GIAO VỚI BĂNG THÔNG SIÊU RỘNG.&nbsp;<br />\r\n🥈Giải nhì: NÂNG CAO CHẤT LƯỢNG TRUYỀN VIDEO QUA GIAO THỨC HTTP/2.&nbsp;<br />\r\n🥉Giải ba: NGHIÊN CỨU PHƯƠNG PHÁP GIẢM THIỂU TẤN CÔNG DDOS TRONG MẠNG ISP SỬ DỤNG CÁC THUẬT TOÁN HỌC MÁY TRÊN HỆ THỐNG MẠNG SDN.&nbsp;<br />\r\n🏅Giải khuyến khích:<br />\r\n- NGHIÊN CỨU VÀ PHÁT TRIỂN CÔNG CỤ SÀNG LỌC RỐI LOẠN TIỀN ĐÌNH BẰNG CAMERA VÀ MÁY TÍNH CÁ NHÂN<br />\r\n- NGHIÊN CỨU THIẾT KẾ MẠCH ĐIỀU KHIỂN CÔNG SUẤT LED DRIVER<br />\r\n🎇Giải Poster: HỆ THỐNG CẢNH BÁO VÀ DỰ ĐOÁN CHẤT LƯỢNG KHÔNG KHÍ THÔNG MINH TRONG KHU CÔNG NGHIỆP.</p>\r\n\r\n<p>HỘI ĐỒNG ĐIỆN TỬ:&nbsp;<br />\r\n🏆Giải nhất: PHÁT HIỆN NGƯỜI THỜI GIAN THỰC DỰA TRÊN YOLO TRONG GIÁM SÁT VIDEO THÔNG MINH XỬ LÝ TẠI BIÊN.&nbsp;<br />\r\n🥈Giải nhì: NGHIÊN CỨU VÀ THIẾT KẾ THIẾT BỊ ĐỊNH DANH NHÓM MÁU QUA GELCARD&nbsp;<br />\r\n🥉Giải ba: SIGN LANGUAGE RECOGNITION FOR DEAF-MUTE PEOPLE USING DEEP LEARNING (AI)&nbsp;<br />\r\n🏅Giải khuyến khích:<br />\r\n- NGHIÊN CỨU VÀ CHẾ TẠO THIẾT BỊ PHÁT HIỆN Ô TÔ BẰNG CẢM BIẾN TỪ TRƯỜNG ỨNG DỤNG TRONG BÃI ĐỖ XE THÔNG MINH.<br />\r\n- NGHIÊN CỨU VÀ THIẾT KẾ CHẾ TẠO THIẾT BỊ VÀ CỔNG KẾT NỐI IOT NHIỀU GIAO THỨC VÔ TUYẾN.<br />\r\n🎇Giải Poster: PHÁT HIỆN CHỨNG NGOẠI T M THU THẤT BẰNG BIẾN ĐỔI WAVELTE ĐA PH N GIẢI VÀ SUPPORT VECTOR MACHINE</p>\r\n\r\n<p>🎀Chúc mừng các nhóm sinh viên xuất sắc đã nhận được giải thưởng cũng như giấy chứng nhận Sinh viên Nghiên cứu Khoa học từ hội đồng Viện Điện tử - Viễn thông. Mong các bạn sẽ tiếp tục phấn đấu và gặt hái được nhiều thành công hơn trên con đường phía trước.&nbsp;<br />\r\n💟Cuối cùng, chúng ta cùng nhìn lại những khoảnh khắc đẹp trong buổi lễ nào!!</p>\r\n\r\n<p><img alt=\"Các sinh viên đạt giải cao của Phân ban Viễn thông chụp ảnh với thầy cô\" src=\"https://set.hust.edu.vn/storage/tin-tuc/phan-ban-vien-thong1.jpg\" /><img alt=\"Sinh viên phân ban Điện tử chụp ảnh lưu niệm với thầy cô\" src=\"https://set.hust.edu.vn/storage/tin-tuc/nckh2020-148-1.jpg\" /><img alt=\"Phân ban Điện tử đang đánh giá các nội dung hăng say\" src=\"https://set.hust.edu.vn/storage/tin-tuc/phan-ban-dien-tu-1.jpg\" /></p>', 0, '2021-04-29 01:42:53', '2021-04-29 01:42:53', 3, 10),
(12, 'Hội nghị quốc tế IEEE về lĩnh vực điện tử và truyền thông (IEEE ICCE)', 'hoi-nghi-quoc-te-ieee-ve-linh-vuc-dien-tu-va-truyen-thong-ieee-icce-', 'Vào ngày 13.1.2021, Hội nghị quốc tế IEEE về lĩnh vực điện tử và truyền thông (IEEE ICCE – International Conference on Communications and Electronics) đã diễn ra tại Phú Quốc. Hội nghị là diễn đàn chia sẻ các nghiên cứu về công nghệ mới tiên tiến giữa nhà nghiên cứu tại các trường đại học và đơn vị công nghiệp; cũng là không gian tạo kết nối quan hệ đối tác mới.', 'ss3N_67872056-867889983596293-1816456405234745344-o-960x540.png', '<p>Vào ngày 13.1.2021, Hội nghị quốc tế IEEE về lĩnh vực điện tử và truyền thông (IEEE ICCE &ndash; International Conference on Communications and Electronics) đã diễn ra tại Phú Quốc. Hội nghị là diễn đàn chia sẻ các nghiên cứu về công nghệ mới tiên tiến giữa nhà nghiên cứu tại các trường đại học và đơn vị công nghiệp; cũng là không gian tạo kết nối quan hệ đối tác mới.</p>\r\n\r\n<p>Từ năm 2022, ICCE sẽ trở thành chuỗi hội nghị chính thức của 3 trường Đại học: Trường Đại học Bách Khoa Hà Nội, Đại học Bách Khoa TP.HCM và Đại học Bách Khoa Đà Nẵng. Việc hợp tác tổ chức ICCE giữa 3 trường nhằm tranh thủ nguồn lực và vị thế của các nhà khoa học cũng như mạng lưới hợp tác đối ngoại của 3 trường. Mục đích là đưa ICCE trở thành một hội nghị lên tầm cao chất lượng và uy tín hơn nữa tại Việt Nam, cũng như trong khu vực cũng và quốc tế.</p>\r\n\r\n<p>____________________</p>\r\n\r\n<p>On 13 January 2021, the IEEE International Conference on Communications and Electronics &ndash; ICCE took place in Phu Quoc Island. After 14 years of development since 2006, ICCE has grown up to become a prestige international open forum for both academia and industry as well as a well-recognized conference within the country scale.</p>\r\n\r\n<p>The conference is the forum to share new researches in cutting edge technologies among researchers of universities and industry institutions; as well as an open space to explore new partnerships.</p>\r\n\r\n<p>The hot topics about Electronics and Communications and Electronics presented at the conference are also one of the leading areas that HUST focuses on promoting on different aspects: education, scientific research and Technology transfer.</p>\r\n\r\n<p>From 2022, ICCE will become the official conference series of 3 Universities: Hanoi University of Science and Technology, Ho Chi Minh City University of Technology and The University of Danang- University of Science and Technology. The cooperation to organize ICCE between the 3 Universities aims to take advantage of the resources and position of scientists as well as the external cooperation network of the three universities. The purpose is to make ICCE a conference of higher quality and more prestige in Vietnam in the region as well as internationally.</p>\r\n\r\n<p>Therefore, on the opening morning of the ICCE conference on January 13, 2021, the Presidents of the three leading technical universities in Vietnam: Prof. Huynh Quyet Thang - President of Hanoi University of Science and Technology, Prof. Doan Quang Vinh &ndash; President of Da Nang University of Science and Technology, Prof. Mai Thanh Phong - President of Ho Chi Minh University of Technology, met to sign a memorandum of understanding on cooperation in training, research and technology transfer, as well as a memorandum of agreement on alternatively co-hosting the ICCE conference.</p>\r\n\r\n<p>The 3 Presidents all expected that the cooperation will pave the way for the Universities to foster human resource and effectively serve the national industrialization and modernization.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/khcn/icce2021/136999939-1289001668151787-7255169693625897454-o.jpg\" /><em>Prof. Huỳnh Quyết Thắng, hiệu trưởng trường Đại học Bách Khoa Hà nội phát biểu khai mạc ICCE. Hội thảo phối hợp hình thức offline và online với diễn giả nước ngoài</em></p>\r\n\r\n<p style=\"text-align:center\"><em><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/khcn/icce2021/136969347-1289002261485061-4442643629307086189-o.jpg\" />Phiên toàn thể với ba bài trình bày của các giáo sư Masataka Nakazawa (Tohoku University-Japan); Ralf Steinmetz (Technical University of Darmstadt - Germany); Massimo Alioto (National University of Singapore - Singapore)</em></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/khcn/icce2021/138192697-1289002451485042-5344732486758499967-o.jpg\" /><em>Lễ ký kết biên bản ghi nhớ hợp tác trong đào tạo, nghiên cứu và chuyển giao công nghệ ; và biên bản ghi nhớ thoả thuận đồng tổ chức luân phiên ICCE giữa 3 trường</em></p>', 1, '2021-04-29 01:48:52', '2021-04-30 04:18:04', 3, 10),
(13, 'Cảm biến điện cơ phục vụ phục hồi chức năng vận động', 'cam-bien-dien-co-phuc-vu-phuc-hoi-chuc-nang-van-dong', 'Cảm biến điện cơ phục vụ phục hồi chức năng vận động', 'kxjj_cambiendienco-icon-960x540.png', '<p><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/khcn/cam-bien-dien-co-small.png\" /></p>', 0, '2021-04-29 01:53:45', '2021-04-29 01:54:46', 3, 10),
(14, 'Các nhà khoa học Viện Điện tử Viễn thông làm chủ công nghệ chế tạo ăng-ten 5G', 'cac-nha-khoa-hoc-vien-dien-tu-vien-thong-lam-chu-cong-nghe-che-tao-ang-ten-5g', 'Hệ thống ăng ten MIMO đa búp sóng do TS Nguyễn Khắc Kiểm và cộng sự chế tạo có tốc độ truyền dữ liệu mạng 5G đạt tối thiểu 100 Mb/giây.', '3Zy1_hinh-1-2778-1608202508-960x540.jpg', '<p>Hệ thống ăng ten MIMO đa búp sóng do TS Nguyễn Khắc Kiểm và cộng sự chế tạo có tốc độ truyền dữ liệu mạng 5G đạt tối thiểu 100 Mb/giây.</p>\r\n\r\n<p>Từ năm 2017, khi mạng 5G trên thế giới mới chỉ có khái niệm về mặt lý thuyết,&nbsp;chưa định hình các tiêu chuẩn (về băng thông, tần số, giao thức kết nối,...), mới&nbsp;chỉ có một số thử nghiệm sản phẩm dạng nguyên mẫu đơn lẻ, TS Nguyễn Khắc Kiểm và cộng sự tại Viện Điện tử Viễn thông, Trường Đại học Bách Khoa Hà Nội bắt đầu nghiên cứu phát triển hệ thống ăng-ten MIMO đa búp sóng hỗ trợ người dùng kết nối mạng sau 4G. Hệ thống này cho phép tăng tốc độ dữ liệu người dùng, giảm nhiễu của hệ thống đồng thời hỗ trợ số lượng kết nối vượt trội so với các hệ thống trước đó.</p>\r\n\r\n<p>Sau ba năm nghiên cứu và chế tạo, hệ thống ăng-ten này đã được hoàn thành, với sự hợp tác và hỗ trợ của các chuyên gia Đại học Bách khoa Turin, Cộng hòa Italy, trong khuôn khổ nhiệm vụ khoa học và công nghệ theo Nghị định thư do Bộ Khoa học và Công nghệ quản lý.</p>\r\n\r\n<p><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/khcn/hinh-1-2778-1608202508.jpg\" /></p>\r\n\r\n<p>Phân hệ ăng - ten MIMO có 64 phần tử thu phát tín hiệu ở tần số 5,8 GHz. Ảnh:&nbsp;<em>Nhóm nghiên cứu</em>.</p>\r\n\r\n<p>Hệ thống ăng-ten MIMO này cho phép búp sóng di chuyển theo người dùng, giúp&nbsp;tăng tốc độ truyền dẫn và giảm nhiễu khi lượng người dùng tăng. &quot;Hệ thống hướng tới những tiêu chuẩn mới của các mạng di động sau 4G, sử dụng công nghệ massive MIMO, tức đa cổng vào - đa cổng ra với số lượng phần tử bức xạ rất lớn để cải thiện việc nhận tín hiệu, mở rộng khoảng cách truyền dẫn và tăng thông lượng. Ngoài ra, việc sử dụng kỹ thuật điều khiển búp sóng (beamforming) giúp tín hiệu được điều khiển thích nghi với người dùng và truyền tải một cách đảm bảo, hạn chế tối đa nhiễu hệ thống&quot;, TS Kiểm, Trưởng nhóm nghiên cứu nói.</p>\r\n\r\n<p>Bộ thiết bị có cấu tạo gồm phân hệ ăng-ten bức xạ, phân hệ xử lý số và tín hiệu,khối chương trình thuật toán điều khiển. Phần ăng-ten bức xạ gồm 64 phần tử thu&nbsp;phát tín hiệu, kích thước khoảng 25cm x 25cm, được thiết kế hoạt động ở tần số 5,8 GHz. Các phần tử bức xạ được chế tạo sử dụng công nghệ mạch in vi dải.&nbsp;Phân hệ xử lý tín hiệu đảm bảo tốc độ cao và tạo sự đồng bộ cho hoạt động của cả hệ thống. Bộ phận điều khiển búp sóng sử dụng kỹ thuật định dạng búp sóng số trên nền tảng FPGA, kết hợp với các thuật toán được nghiên cứu và tối ưu, giúp thực thi việc định hướng búp sóng tới người sử dụng.</p>\r\n\r\n<p>Trong hệ thống ăng-ten MIMO này, yếu tố quan trọng nhất là việc định hướng búp sóng theo sự di chuyển của người dùng. TS Kiểm cho biết, để đạt yếu tố này, cả ba phân hệ phải thiết kế, chế tạo một cách đồng bộ. Các thuật toán điều khiển đa búp sóng được thực hiện bắt đầu từ nghiên cứu mô hình lý thuyết, sau đó kết hợp với kinh nghiệm và hỗ trợ của các chuyên gia từ Italy, nhóm nghiên cứu đã phát triển các bộ code và nạp vào mạch FPGA để thực hiện các chức năng theo yêu cầu kỹ thuật của hệ thống.</p>\r\n\r\n<p>Nhờ vậy, hệ thống có khả năng tạo ra các búp sóng có độ phân giải góc quét dưới10 độ, và đặt điểm không tùy ý, điều này giúp tín hiệu người dùng giảm thiểu sự&nbsp;gián đoạn phục vụ, giảm được nhiễu hệ thống, từ đó tăng tốc độ truyền dữ liệu&nbsp;người dùng, đạt tối thiểu 100Mb/s trong các thử nghiệm ban đầu theo cả hai hướng truyền dẫn.</p>\r\n\r\n<p><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/khcn/hinh-2-8733-1608202508.jpg\" /></p>\r\n\r\n<p>Thiết lập mô hình và đo đạc các tham số hệ thống trong phòng thí nghiệm. Ảnh:&nbsp;<em>Nhóm nghiên cứu.</em></p>\r\n\r\n<p>Thiết bị cũng đã được thử nghiệm tại phòng đo tiêu chuẩn của Đại học Bách khoa&nbsp;Turin về các thông số liên quan tới băng thông, tần số, tốc độ...TS Kiểm cho biết,&nbsp;nhóm nghiên cứu đã làm việc với một số doanh nghiệp để lên kế hoạch thử nghiệm trong nước và phát triển hệ thống tương thích với lộ trình triển khai 5G của các nhà cung cấp dịch vụ.</p>\r\n\r\n<p>&quot;Sắp tới, nhóm sẽ thiết kế, điều chỉnh hệ thống để hoạt động ở các dải tần đã và sẽ được cấp phép cho hệ thống 5G tại Việt Nam như ở dải tần số 3,5 GHz. Từ đó giúp kết quả đề tài sớm đưa vào thực tiễn, có tiềm năng tạo ra các sản phẩm là các trạm thu phát ngoài trời hoặc trong nhà của mạng 5G&quot;, ông nói.</p>\r\n\r\n<p>Nguồn: VNExpress:&nbsp;<a href=\"https://vnexpress.net/viet-nam-lam-chu-cong-nghe-phat-trien-ang-ten-ket-noi-mang-5g-4208037.html\">Link</a></p>', 0, '2021-04-29 01:57:48', '2021-04-29 01:57:48', 3, 10),
(15, 'VIETTEL TUYỂN VIỆC LÀM NGÀNH HÀNG KHÔNG VŨ TRỤ', 'viettel-tuyen-viec-lam-nganh-hang-khong-vu-tru', 'Viện Hàng không Vũ trụ Viettel có nhu cầu tuyển dụng Kỹ sư quản lý chất lượng', 'uCpj_ete4-5-960x540.jpg', '<p>[VIỆC LÀM NGÀNH HÀNG KHÔNG VŨ TRỤ]<br />\r\n<br />\r\n<img alt=\"🍀\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t26/2/16/1f340.png\" /><img alt=\"🍀\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t26/2/16/1f340.png\" /><img alt=\"🍀\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t26/2/16/1f340.png\" />Viện Hàng không Vũ trụ Viettel có nhu cầu tuyển dụng Kỹ sư quản lý chất lượng, nội dung cụ thể như sau:<br />\r\nĐơn vị tuyển dụng: Viện Hàng không Vũ trụ Viettel.<br />\r\nVị trí: Kỹ sư quản lý chất lượng (QA/QC/QMS)<br />\r\nNơi làm việc: Hà Nội<br />\r\nThời hạn nộp hồ sơ: 25/12/2020 (ưu tiên các ứng viên nộp hồ sơ sớm).<br />\r\n<br />\r\n1. MÔ TẢ CÔNG VIỆC:<br />\r\n- Quản lý chất lượng của các dự án nghiên cứu của Viện Hàng không Vũ trụ (từ các bán thành phẩm đầu vào, quá trình thiết kế, chế thử, quá trình sản xuất, cho đến sản phẩm hoàn thiện).<br />\r\n- Kiểm soát chất lượng đầu vào cho sản phẩm của Viện, chủ trì đánh giá chuỗi cung ứng, đánh giá nhà cung cấp.<br />\r\n- Áp dụng hệ thống quản lý chất lượng (ISO9001:2015 hoặc AS9100:2016) cho các hoạt động thiết kế và phát triển (Design &amp; Development) của Viện.<br />\r\n- Nghiên cứu, xây dựng quy trình/tiêu quản lý chất lượng theo tiêu chuẩn quân sự hoặc tiêu chuẩn hàng không và áp dụng cho sản phẩm của Viện.<br />\r\n- Sử dụng các công cụ quản lý chất lượng (APQP, PPAP, MSA, FMEA, SPC) trong hoạt động đảm bảo chất lượng các sản phẩm trong Viện.<br />\r\n<br />\r\n2. YÊU CẦU:<br />\r\n- Tốt nghiệp các trường đại học chính quy loại Khá trở lên của khối Kỹ thuật (như Đại học Bách Khoa Hà Nội, Đại học Quốc gia Hà Nội, Học viện Kỹ thuật quân sự,... )<br />\r\n- Có ít nhất 2 năm kinh nghiệm đối với vị trí tương ứng.<br />\r\n- Ngoại ngữ: Tối thiểu TOEIC 650 (hoặc tương đương).<br />\r\n- Ưu tiên các ứng viên Tốt nghiệp ngành Hàng không vũ trụ<br />\r\n- Ưu tiên ứng viên có kinh nghiệm làm việc tại các nhà máy, các tập đoàn từ Mỹ, Hàn Quốc, Nhật Bản, Đài Loan,... như Samsung, Canon, Panasonic...<br />\r\n<br />\r\n3. CHẾ ĐỘ ĐÃI NGỘ:<br />\r\n- Thu nhập: cạnh tranh (tùy theo năng lực và kinh nghiệm của ứng viên).<br />\r\nYên tâm là mức lương sẽ không làm bạn thất vọng$$$$$<br />\r\n- Lương tháng thứ 13, thưởng quý, thưởng năm hấp dẫn.<br />\r\n- Chế độ bảo hiểm tốt, được khám bệnh định kỳ tại các bệnh viện lớn, tuyến trung ương như bệnh viện Quân đội 108, 103.<br />\r\n- Được tham gia vào nhiều khóa đào tạo chuyên môn, các hội thảo chuyên đề trong nước và quốc tế.<br />\r\n- Môi trường làm việc chuyên nghiệp, khuyến khích sự sáng tạo, đổi mới.<br />\r\n- Có sân tập bóng, bơi, tenis,... sang, xịn, mịn<img alt=\"🎾\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6d/2/16/1f3be.png\" /><img alt=\"🏸\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t3c/2/16/1f3f8.png\" /><img alt=\"⛳\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tfb/2/16/26f3.png\" /><br />\r\n4. ỨNG TUYỂN:<br />\r\n- Gửi CV bản mềm về địa chỉ email vinhtd@viettel.com.vn<br />\r\n(Mẫu CV xin vui lòng download tại địa chỉ&nbsp;<a href=\"https://goo.gl/yFDMgA\" rel=\"nofollow noopener\" target=\"_blank\">https://goo.gl/yFDMgA</a>)</p>', 0, '2021-04-29 01:59:20', '2021-04-29 01:59:20', 4, 10),
(16, 'FPT Software tuyển dụng sinh viên mới ra trường ngành Điện tử - Viễn thông', 'fpt-software-tuyen-dung-sinh-vien-moi-ra-truong-nganh-dien-tu-vien-thong', 'FPT Software - Công ty cung cấp các dịch vụ & giải pháp phần mềm lớn nhất Đông Nam Á với hơn 17.000 nhân viên trên toàn cầu, được bình chọn là nơi làm việc tốt nhất Việt Nam đang tuyển hàng trăm vị trí Fresher -Junior dành cho sinh viên năm cuối, sinh viên mới tốt nghiệp tại Hà Nội.', 'hahg_fpt-software-tuyendung2021-960x540.jpg', '<p>FPT Software -&nbsp;Công ty cung cấp các dịch vụ &amp; giải pháp phần mềm lớn nhất Đông Nam Á với hơn 17.000 nhân viên trên toàn cầu, được bình chọn là nơi làm việc tốt nhất Việt Nam đang tuyển hàng trăm vị trí Fresher -Junior dành cho sinh viên năm cuối, sinh viên mới tốt nghiệp tại Hà Nội.</p>\r\n\r\n<p><strong>⭐️</strong><strong>Vừa đi học Free, vừa được nhận học bổng lên đến 8.4M/tháng - Nâng cao kỹ năng công nghệ - Đón đầu cơ hội việc làm hấp dẫn - Xây dựng nền tảng cho tương lai.</strong></p>\r\n\r\n<p>📷&nbsp;<strong>Các vị trí Junior/ Fresher đang tuyển &amp; công nghệ sẽ được đào tạo:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Java Web</em></strong><em>&nbsp;(Java 8, SQL, Hibernate, Spring framework)</em></li>\r\n	<li><strong><em>C/#.NET&nbsp;</em></strong><em>(C# core, SQL, Entity framework, ASP.NET MVC Web Application, Sharepoint)</em></li>\r\n	<li><strong><em>Front-end&nbsp;</em></strong><em>(Angular6+, ReactJS, NodeJS&hellip;)</em></li>\r\n	<li><strong><em>C/C++/ Qt framework</em></strong></li>\r\n	<li><strong><em>Embedded&nbsp;</em></strong><em>(C, Microcontroller, ARM Cortex-M, IoT)</em></li>\r\n	<li><strong><em>Automation Test&nbsp;</em></strong><em>(</em><em>Selenium, Appium, TestNG, Cucumber)</em></li>\r\n	<li><strong><em>Manual testing</em></strong></li>\r\n	<li><strong><em>Python</em></strong><em>&nbsp;(Django và Flask);&nbsp;<strong>Golang</strong></em></li>\r\n	<li><strong><em>Mobile&nbsp;</em></strong><em>(Kotlin, Android; Swift, iOS; Flutter; React Native)</em></li>\r\n	<li><strong><em>DevOps / Cloud / Cyber Scurity / RPA/ Robotics&hellip;</em></strong></li>\r\n</ul>\r\n\r\n<p><strong>🤔YÊU CẦU:</strong></p>\r\n\r\n<ul>\r\n	<li>Là sinh viên đã/sắp tốt nghiệp chuyên ngành Công nghệ thông tin, Toán tin, Khoa học máy tính, Kỹ thuật phần mềm, Điện tử viễn thông, Tự động hóa, Cơ điện tử&hellip; hoặc các chuyên ngành có liên quan.</li>\r\n	<li>Nắm vững kiến thức cơ bản về một trong các công nghệ / ngôn ngữ lập trình: Java, C#/.NET, C/C++, Embedded, Front-end, Angular, ReactJS, NodeJS, Mobile, Automation/Manual Test...</li>\r\n	<li>Có thể tham gia đào tạo/làm việc&nbsp;<strong>Full-time</strong>&nbsp;từ thứ 2 - thứ 6.</li>\r\n	<li>Ham học hỏi, máu lửa, nhiệt huyết, sẵn sàng chinh chiến đối đầu với thử thách khó khăn tại các dự án phần mềm lớn. Tuân thủ kỷ luật &amp; có trách nhiệm với công việc.</li>\r\n	<li>Ưu tiên ứng viên có khả năng đọc hiểu tiếng Anh tốt.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 0, '2021-04-29 02:02:38', '2021-04-29 02:03:18', 4, 10),
(17, 'FPT Software tuyển dụng nhiều vị trí hấp dẫn dành cho sinh viên Điện tử Viễn thông mới tốt nghiệp', 'fpt-software-tuyen-dung-nhieu-vi-tri-hap-dan-danh-cho-sinh-vien-dien-tu-vien-thong-moi-tot-nghiep', '🔥FPT Software tuyển dụng nhiều vị trí hấp dẫn dành cho Fresher IT tại Hà Nội', 'dMHs_fpt-software-960x540.jpg', '<p>🔥FPT Software tuyển dụng nhiều vị trí hấp dẫn dành cho Fresher IT tại Hà Nội</p>\r\n\r\n<p><strong><em>⭐️</em></strong><strong><em>Vừa đi học Free, vừa được nhận trợ học bổng 5-7M/tháng - Nâng cao kỹ năng công nghệ - Đón đầu cơ hội việc làm hấp dẫn - Xây dựng nền tảng cho tương lai.</em></strong></p>\r\n\r\n<p>📷&nbsp;<strong>Các vị trí Fresher đang tuyển &amp; công nghệ sẽ được đào tạo:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Java Web</em></strong><em>&nbsp;(Java 8, SQL, Hibernate, Spring framework)</em></li>\r\n	<li><strong><em>C/#.NET&nbsp;</em></strong><em>(C# core, SQL, Entity framework, ASP.NET MVC Web Application)</em></li>\r\n	<li><strong><em>C/C++/ QT framework</em></strong></li>\r\n	<li><strong><em>Embedded&nbsp;</em></strong><em>(C, Microcontroller, ARM Cortex-M)</em></li>\r\n	<li><strong><em>Front-end&nbsp;</em></strong><em>(HTML5/CSS3/Bootstrap4, Angular6+, ReactJS...)</em></li>\r\n</ul>\r\n\r\n<p><strong>🤔YÊU CẦU:</strong></p>\r\n\r\n<ul>\r\n	<li>Là sinh viên đã/sắp tốt nghiệp chuyên ngành Công nghệ thông tin, Toán tin, Khoa học máy tính, Kỹ thuật phần mềm, Điện tử viễn thông, Tự động hóa, Cơ điện tử&hellip; hoặc các chuyên ngành có liên quan.</li>\r\n	<li>Nắm vững kiến thức cơ bản về một trong các ngôn ngữ lập trình: Java, C#/.NET, C/C++, Embedded, Front-end, Angular, React...</li>\r\n	<li>Có thể tham gia đào tạo/làm việc&nbsp;<strong>Full-time</strong>&nbsp;từ thứ 2 - thứ 6.</li>\r\n	<li>Ham học hỏi, máu lửa, nhiệt huyết, sẵn sàng chinh chiến đối đầu với thử thách khó khăn tại các dự án phần mềm lớn. Tuân thủ kỷ luật &amp; có trách nhiệm với công việc.</li>\r\n	<li>Ưu tiên ứng viên có khả năng đọc hiểu tiếng Anh tốt.</li>\r\n</ul>\r\n\r\n<p><strong>🏆</strong><strong>QUYỀN LỢI VÔ CÙNG HẤP DẪN:</strong></p>\r\n\r\n<ol>\r\n	<li>Được nhận&nbsp;<strong>học bổng</strong>&nbsp;đào tạo lên đến&nbsp;<strong>250%</strong>&nbsp;học phí (tương đương trợ cấp đào tạo toàn khóa học lên đến&nbsp;<strong>20.000.000VND/khóa</strong>) tùy theo kết quả đào tạo.</li>\r\n	<li><strong><em>Sau khi kết thúc đào tạo tại FSOFT Academy:</em></strong></li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>Tham gia các&nbsp;<strong>siêu dự án&nbsp;</strong>của FPT Software trong các lĩnh vực:&nbsp;<strong>Thương mại điện tử, Vận tải Logistic, Hàng không, Chăm sóc sức khỏe, Automotive&hellip;</strong></li>\r\n	<li>Mức thu nhập hấp dẫn trung bình từ 8.000.000 VNĐ - 15.000.000 VNĐ/tháng, trung bình 1 năm từ 13-18 tháng lương, tương xứng với kỹ năng và kinh nghiệm và đóng góp của bạn cho dự án.</li>\r\n	<li>Được đào tạo thêm các kiến thức về các công nghệ mới như: Cloud (AWS/ Azure), AI, Big Data, DevOps, Cyber Security, IoT... và quy trình phát triển dự án phần mềm chuyên nghiệp theo mô hình Agile/Scrum.</li>\r\n	<li>Hưởng các chính sách như: Hỗ trợ thi các chứng chỉ chuyên nghiệp quốc tế (OCA/PMP&hellip;), hỗ trợ mua nhà, bảo hiểm FPT care&hellip;</li>\r\n	<li>Cơ hội phát triển bản thân và làm việc cùng các chuyên gia giỏi nhất của FPT Software và khách hàng lớn đến từ Mỹ, Pháp, Singapore, Nhật Bản&hellip;</li>\r\n	<li>Tiếp cận với những công nghệ tiên tiến hàng đầu, phát triển kỹ năng mềm &amp; định hướng nghề nghiệp, tư vấn bí quyết thành công từ các chuyên gia.</li>\r\n	<li>Trải nghiệm văn hóa đặc trưng, môi trường làm việc hiện đại bậc nhất Việt Nam tại các Campus của FPT Software.</li>\r\n</ul>\r\n\r\n<p>⛳️<strong>Địa điểm học tập và làm việc:&nbsp;</strong>Tòa nhà FPT Cầu Giấy, số 17 Duy Tân và Làng phần mềm FVille 2 (có xe đưa đón)</p>\r\n\r\n<p>📩&nbsp;Gửi ngay CV ứng tuyển về địa chỉ:&nbsp;<strong>BachDV1@fsoft.com.vn</strong></p>\r\n\r\n<p>🌎Tham khảo thêm thông tin tại: Fanpage FPT Software Academy hoặc liên hệ skype: bachdaoviet</p>\r\n\r\n<p>#FPTSoftwareAcademy #CodeYourLife</p>', 0, '2021-04-29 02:05:22', '2021-04-29 02:07:55', 4, 10),
(18, 'Công ty Thông tin M3 (Viettel) tuyển dụng KỸ SƯ ĐIỆN TỬ VIỄN THÔNG', 'cong-ty-thong-tin-m3-viettel-tuyen-dung-ky-su-dien-tu-vien-thong', 'Công ty Thông tin M3 (Viettel) tuyển dụng KỸ SƯ ĐIỆN TỬ VIỄN THÔNG', 'HNXP_phan-ban-dien-tu-1-960x540.jpg', '<p><strong><em>Mức lương: 8</em>.000.000-20.000.000 đồng/tháng</strong></p>\r\n\r\n<p><strong><em>Địa điểm làm việc:</em></strong>&nbsp;Trụ sở Công ty tại Khu CNC &ndash; Hòa Lạc &ndash; Thạch Thất &ndash; Hà Nội và các địa điểm khác theo yêu cầu.</p>\r\n\r\n<p><strong>MÔ TẢ CÔNG VIỆC:</strong></p>\r\n\r\n<p>&ndash; Bóc tách, phân tích nguyên lý sơ đồ mạch điện tử.</p>\r\n\r\n<p>&ndash; Vẽ sơ đồ mạch in trên máy tính bằng phần mềm.</p>\r\n\r\n<p>&ndash; Đọc hiểu sơ đồ thuật toán, ngôn ngữ lập trình, có khả năng lập trình phần mềm vi điều khiển.</p>\r\n\r\n<p>&ndash; Xây dựng định mức kỹ thuật (Định mức vật tư, định mức lao động).</p>\r\n\r\n<p>&ndash; Triển khai sản xuất, lập quy trình công nghệ lắp ráp, kiểm tra và các biểu mẫu theo dõi sản phẩm.</p>\r\n\r\n<p><strong>TIÊU CHUẨN NHÂN SỰ:</strong></p>\r\n\r\n<p>&ndash; Nam/Nữ</p>\r\n\r\n<p>&ndash; Không quá 35 tuổi.</p>\r\n\r\n<p>&ndash; Sức khỏe: Loại 2 trở lên.</p>\r\n\r\n<p>&ndash; Tốt nghiệp đại học trở lên, chuyên ngành Điện tử viễn thông.</p>\r\n\r\n<p>.<strong><em>&ndash; Năng lực:</em></strong></p>\r\n\r\n<p>+ Có hiểu biết về lý thuyết mạch điện tử, lập trình nhúng, vẽ mạch PCB bằng các phần mềm vẽ mạch điện tử: Altium, Proteus,&hellip;.</p>\r\n\r\n<p>+ Am hiểu về sản xuất, có khả năng nhận chuyển giao công nghệ sản xuất, lắp ráp tích hợp mạch điện tử hoặc thiết bị, có khả năng xây dựng QTCN, định mức vật tư, lao động, có khả năng truyền đạt, đào tạo, hướng dẫn cho đội ngũ thợ sản xuất lắp ráp, đo kiểm.</p>\r\n\r\n<p>+ Có kinh nghiệm tham gia, điều hành dây chuyền hàn mạch điện tử (SMT, linh kiện cắm)</p>\r\n\r\n<p><strong><em>&ndash; Kỹ năng:</em></strong></p>\r\n\r\n<p>+ Sử dụng thành thạo tin học VP (Word, Excel, Powerpoint &hellip;)</p>\r\n\r\n<p>+ Ngoại ngữ, IQ: Tiếng Anh tối thiểu Toeic 550, đọc, hiểu, giao tiếp tốt; IQ:Tối thiểu 80/160.</p>\r\n\r\n<p>+&nbsp;Có tinh thần trách nhiệm, chăm chỉ, cẩn thận.</p>\r\n\r\n<p>+ Có khả năng triển khai công việc một cách độc lập, kỹ năng làm việc nhóm.</p>\r\n\r\n<p><strong>QUYỀN LỢI, CHÍNH SÁCH:</strong></p>\r\n\r\n<p>&ndash; Môi trường làm việc chuyên nghiệp, phát triển, năng động có nhiều cơ hội thăng tiến.</p>\r\n\r\n<p>&ndash; Chế độ quyền lợi hưởng theo năng lực và kết quả công việc của từng cá nhân; Chế độ khác theo quy định chung của Công ty và Tập đoàn.</p>\r\n\r\n<p>&ndash; Hỗ trợ ăn ca, điện thoại hằng tháng</p>\r\n\r\n<p>&ndash; Công ty có xe đưa &ndash; đón từ Hà Nội/Thị xã Sơn Tây về trụ sở làm việc tại Hòa Lạc.</p>\r\n\r\n<p>&ndash; Các chế độ thưởng năm, quà lễ tết và các chế độ phúc lợi khác theo Quy định Công ty và Tập đoàn.</p>\r\n\r\n<p><strong>THÔNG TIN LIÊN HỆ:</strong></p>\r\n\r\n<p>&ndash; Số điện thoại: Ms Linh &ndash; Nhân viên tuyển dụng: 0392.455.429 &ndash; 024.666.15577</p>\r\n\r\n<p>&ndash; Email: Linhnk7@viettel.com.vn</p>', 0, '2021-04-29 02:09:24', '2021-04-29 02:09:24', 4, 10),
(19, 'Lịch các ngày tư vấn tuyển sinh của Trường Đại học Bách Khoa Hà Nội 2020-2021', 'lich-cac-ngay-tu-van-tuyen-sinh-cua-truong-dai-hoc-bach-khoa-ha-noi-2020-2021', 'Kỳ thi tuyển sinh năm học 2021, Viện Điện tử Viễn thông sẽ tham gia các chương trình tuyển sinh do trường Đại học Bách Khoa Hà Nội và báo Tuổi trẻ phối hợp tổ chức.', 'mEVz_viber-image-2020-06-21-10-48-55-960x540.jpg', '<p>Kỳ thi tuyển sinh năm học 2021, Viện Điện tử Viễn thông sẽ tham gia các chương trình tuyển sinh do trường Đại học Bách Khoa Hà Nội và báo Tuổi trẻ phối hợp tổ chức.&nbsp;</p>\r\n\r\n<p>Tổng cộng sẽ có 5 buổi tư vấn tuyển sinh tại Nam Định (ngày 26/12/2020), tại Hải Phòng (ngày 27/12/2020), tại Vinh (ngày 9/1/2020), tại Thanh Hóa (ngày 10/1/2020)</p>\r\n\r\n<p>&nbsp;và tại Đại học Bách Khoa Hà Nội (ngày 14/3/2020).</p>\r\n\r\n<p>Các bạn thí sinh và phụ huynh học sinh có thắc mắc về ngành nghề, triển vọng việc làm, chương trình học có thể đến trực tiếp để đặt câu hỏi với các giảng viên, sinh viên của Viện Điện tử Viễn thông.&nbsp;</p>\r\n\r\n<p>Gửi các bạn một số hình ảnh của buổi tư vấn tuyển sinh tại Trường Đại học Bách Khoa tháng 7 năm 2020.</p>\r\n\r\n<p><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/tuyen-sinh/chuong-trinh-tu-van.PNG\" /></p>\r\n\r\n<p><iframe width=\"840\" height=\"472.5\" src=\"https://www.youtube.com/embed/txsNx9lxT78\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe></p>', 0, '2021-04-29 02:12:56', '2021-04-29 02:13:56', 5, 10),
(20, 'Điểm chuẩn trúng tuyển các ngành Điện tử Viễn thông 2020', 'diem-chuan-trung-tuyen-cac-nganh-dien-tu-vien-thong-2020', 'Điểm chuẩn các ngành Điện tử Viễn thông: ET1, ET-E4, ET-E5, ET-E9 và ET-LUH.', 'ryeu_diem-chuan-2020-960x540.png', '<p><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/tuyen-sinh/diem-chuan-2020.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 0, '2021-04-29 02:15:20', '2021-04-29 02:15:20', 5, 10),
(21, 'Phim ngắn giới thiệu các mã tuyển sinh của Viện Điện tử Viễn thông', 'phim-ngan-gioi-thieu-cac-ma-tuyen-sinh-cua-vien-dien-tu-vien-thong', 'Chi tiết môi trường học tập, cơ hội việc làm và các chương trình tuyển sinh của Viện', 'g197_sinh-vien-tuong-lai-960x540.jpg', '<p>Năm 2020, Viện Điện tử Viễn thông tuyển sinh 5 mã ngành là</p>\r\n\r\n<ul>\r\n	<li>ET1: Chương trình chuẩn Điện tử Viễn thông</li>\r\n	<li>ET-E4: Chương trình tiên tiến Điện tử Viễn thông</li>\r\n	<li>ET-E5: Chương trình tiên tiến Điện tử Y sinh</li>\r\n	<li>ET-E9: Chương trình tiên tiến Hệ thống nhúng thông minh và IoT</li>\r\n	<li>ET-LUH: Chương trình liên kết quốc tế với ĐH Hannover CHLB Đức.</li>\r\n</ul>\r\n\r\n<p>Ngoài ra, sau khi trúng tuyển ĐH Bách Khoa, các bạn có thể thi tuyển vào lớp Tài năng Điện tử thông minh và IoT. Chi tiết môi trường học tập, cơ hội việc làm và các chương trình tuyển sinh của Viện được minh họa trong đoạn phim ngắn dưới đây.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><iframe width=\"840\" height=\"472.5\" src=\"https://www.youtube.com/embed/j_owX91Bj5A\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe></p>', 0, '2021-04-29 02:17:28', '2021-04-29 02:17:28', 5, 10);
INSERT INTO `tin_tuc` (`id`, `tieu_de`, `tieu_de_khong_dau`, `tom_tat`, `hinh`, `noi_dung`, `so_luot_xem`, `created_at`, `updated_at`, `id_loai_tin`, `id_user`) VALUES
(22, 'Cơ hội làm việc nước ngoài khi học Viện Điện tử - Viễn thông', 'co-hoi-lam-viec-nuoc-ngoai-khi-hoc-vien-dien-tu-vien-thong', 'Sinh viên học chương trình liên kết quốc tế, có cơ hội chuyển tiếp cao học, làm việc ở nước ngoài.', 'fSdY_co-hoi-du-hoc-2-960x540.jpg', '<p>Sinh viên Viện Điện tử - Viễn thông, ĐH Bách khoa Hà Nội học chương trình liên kết quốc tế, có cơ hội chuyển tiếp cao học, làm việc ở nước ngoài.</p>\r\n\r\n<p>Tại chương trình On EduTalk - Tư vấn tuyển sinh đại học, Phó giáo sư, Tiến sĩ Nguyễn Đức Minh, Viện phó Viện Điện tử - Viễn thông (ĐH Bách Khoa Hà Nội) và Phó giáo sư, Tiến sĩ Trương Thu Hương - Phó Giám đốc chương trình Đào tạo tinh hoa (ĐH Bách Khoa Hà Nội) chia sẻ chi tiết về các ngành đào tạo cũng như lợi thế mà sinh viên có được khi theo học tại viện. Chương trình do Hệ thống Giáo dục HOCMAI phối hợp đài Truyền hình VTVcab thực hiện.</p>\r\n\r\n<p><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/co-hoi-du-hoc-1.jpg\" /></p>\r\n\r\n<p>(Sinh viên Viện Điện tử - Viễn thông, Đại học Bách Khoa Hà Nội)</p>\r\n\r\n<p><strong>Đào tạo song bằng với các trường liên kết quốc tế</strong></p>\r\n\r\n<p>Sinh viên Viện Điện tử - Viễn thông có thể tham gia chương trình song bằng với các trường đại học đối tác. Viện liên kết với trường Telecom ParisTech theo mô hình 4+2 (bốn năm đầu học tại trường ĐH Bách khoa Hà Nội, hai năm cuối học tại trường ĐH Telecom ParisTech, Pháp).</p>\r\n\r\n<p>Lĩnh vực liên kết liên quan đến khoa học máy tính, CNTT và xử lý tín hiệu thông tin dành cho trí tuệ nhân tạo. Sinh viên tốt nghiệp nhận song bằng Thạc sĩ của Trường Đại học Bách khoa Hà Nội và bằng Kỹ sư của Đại học Telecom ParisTech.</p>\r\n\r\n<p>Ngoài ra, trường còn có mô hình 2+2 (hai năm đầu học tại trường ĐH Bách khoa Hà Nội, hai năm cuối học tại trường ĐH Wollongong, Australia để được cấp bằng cử nhân của cả hai trường. Bên cạnh đó là mô hình 4+1+3 (bốn năm đầu học tại trường ĐH Bách khoa Hà Nội để lấy bằng cử nhân, một năm học chương trình Thạc sĩ tại ĐH Bách Khoa Hà Nội và ba năm học chương trình Tiến sĩ tại Viện KAIST, Hàn Quốc) để được cấp bằng tiến sĩ của hai trường.</p>\r\n\r\n<p><img alt=\"\" src=\"https://set.hust.edu.vn/storage/tin-tuc/do-an-ten.jpg\" /></p>\r\n\r\n<p>(Sinh viên thường xuyên được tham gia vào các phòng thí nghiệm, nghiên cứu của viện.)</p>\r\n\r\n<p><strong>Làm việc với các doanh nghiệp ngay từ năm thứ tư</strong></p>\r\n\r\n<p>Phó giáo sư, Tiến sĩ Nguyễn Đức Minh - Viện trưởng Viện Điện tử - Viễn thông, ĐH Bách Khoa Hà Nội cho biết: &quot;Viện hiện có bốn kỳ thực tập với đối tác doanh nghiệp và công ty. Những em có khả năng tốt, ngay từ năm thứ ba hoặc thứ tư, đối tác có thể cấp học bổng để sinh viên tham gia vào các dự án của doanh nghiệp ngay từ khi còn ngồi trên ghế nhà trường&quot;.</p>\r\n\r\n<p>Sinh viên đồng thời được tham gia vào các phòng thí nghiệm, nghiên cứu của viện. Tại đây, sinh viên có thể làm việc trong các dự án được tài trợ bởi nhà nước, doanh nghiệp lớn, để được tôi luyện lý thuyết về ngành và phát triển các kỹ năng thực hành, kỹ năng mềm về làm việc nhóm, quản lý dự án, đổi mới sáng tạo.</p>\r\n\r\n<p>Sinh viên Viện Điện tử - Viễn thông ra trường thường có mức lương khoảng 8-25 triệu đồng, kỹ sư nghiên cứu phát triển lương có thể tới 2.000 USD. Kỹ sư điện tử viễn thông có thể làm ở các vị trí như:</p>\r\n\r\n<ul>\r\n	<li>- Kỹ sư phần cứng điện tử, máy tính: thiết kế, mạch điện tử, máy tính nhúng, vi mạch.</li>\r\n	<li>- Kỹ sư phần mềm (nhúng): thiết kế, phát triển phần mềm cho các thiết bị thông minh như điện thoại di động, rô bốt, xe ô tô, đầu thu truyền hình kỹ thuật số, kỹ sư kiểm thử phần mềm;</li>\r\n	<li>- Kỹ sư viễn thông và mạng máy tính: Thiết kế, tối ưu mạng, quản lý mạng, vận hành hệ thống viễn thông, mạng 4G, 5G, mạng IoT.</li>\r\n	<li>- Kỹ sư điện tử hàng không: nghiên cứu phát triển thiết bị bay không người lái, vận hành khai thác các hệ thống định vị dẫn đường máy bay, tàu biển...</li>\r\n	<li>- Kỹ sư điện tử y sinh: thiết kế, chế tạo, vận hành thiết bị y tế, hệ thống thông tin y tế</li>\r\n</ul>\r\n\r\n<p>(<a href=\"https://vnexpress.net/co-hoi-lam-viec-nuoc-ngoai-khi-hoc-vien-dien-tu-vien-thong-4131189.html?fbclid=IwAR1D3sPrctlGDKguQrWEZkiQS5E3FzbbdnWGVvPgsXA-TolQf7hz9AEVzO4\">Theo VNExpress</a>)</p>\r\n\r\n<p>&nbsp;</p>', 0, '2021-04-29 02:19:32', '2021-04-29 02:20:51', 5, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuyen_sinh`
--

CREATE TABLE `tuyen_sinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieu_de_khong_dau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tom_tat` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luot_xem` int(11) NOT NULL,
  `ma_tuyen_sinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_chi_tieu` int(11) NOT NULL,
  `thoi_gian_dao_tao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuyen_sinh`
--

INSERT INTO `tuyen_sinh` (`id`, `tieu_de`, `tieu_de_khong_dau`, `tom_tat`, `hinh`, `noi_dung`, `so_luot_xem`, `ma_tuyen_sinh`, `so_chi_tieu`, `thoi_gian_dao_tao`) VALUES
(1, 'Chương trình chuẩn viện Điện Tử-Viễn Thông', 'chuong-trinh-chuan-vien-dien-tu-vien-thong', 'Chương trình chuẩn Điện tử Viễn thông đào tạo cử nhân kỹ sư hoạt động nghiên cứu, phát triển, thiết kế, lập trình, tích hợp, triển khai, vận hành các thiết bị điện tử.', 'eRNN_1.jpg', '<h2>Tổng quan</h2>\r\n\r\n<p>Chương trình chuẩn Điện tử Viễn thông đào tạo cử nhân kỹ sư hoạt động nghiên cứu, phát triển, thiết kế, lập trình, tích hợp, triển khai, vận hành các thiết bị:</p>\r\n\r\n<p>Điện tử máy tính dân dụng (Điện thoại, tivi, tủ lạnh, đồng hồ thông minh, ô tô, ...)</p>\r\n\r\n<p>Điện tử máy tính công nghiệp (Dây chuyển sản xuất, Robot,...)</p>\r\n\r\n<p>Điện tử máy tính quân sự (Radar, Máy thông tin liên lạc, Tên lửa,...)</p>\r\n\r\n<p>Viễn thông trong mạng di động (3G, 4G), mạng thông tin cáp quang, thông tin vệ tinh</p>\r\n\r\n<p>Định vị dẫn đường máy bay, thiết bị bay không người lái</p>\r\n\r\n<p>Thiết bị điện tử y tế</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Ngôn ngữ đào tạo : Tiếng Việt</li>\r\n	<li>Tổ hợp xét tuyển: A00 A01</li>\r\n	<li>Điểm trúng tuyển 2020: 27.30</li>\r\n	<li>Mã xét tuyển: ET1</li>\r\n	<li>Tổ hợp xét tuyển: BK1</li>\r\n	<li>Điểm trúng tuyển 2020 (A19): 23</li>\r\n	<li>Mã xét tuyển: ET1x</li>\r\n	<li>Chỉ tiêu tuyển sinh 2020: 480</li>\r\n	<li>Điểm trúng tuyển 2019: 24.80</li>\r\n</ul>\r\n\r\n<p>Tốt nghiệp:&nbsp;<strong>Cử nhân - Thạc sĩ - Tiến sĩ (NCS)</strong></p>\r\n\r\n<p>Thời gian tuyển sinh:&nbsp;<strong>Tháng 8 hàng năm</strong></p>\r\n\r\n<p>Thời gian đào tạo:&nbsp;<strong>4 - 5,5 - 8,5 năm</strong></p>\r\n\r\n<p>Học phí:&nbsp;<strong>22 - 28 trđ/năm học</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngành Điện tử - Viễn thông là một trong những ngành mũi nhọn của cuộc Cách mạng công nghiệp lần thứ 4 và là ngành có nhu cầu cao về nhân lực ở Việt Nam và trên thế giới.<br />\r\nTheo học ngành này, sinh viên được trang bị một cách toàn diện cả về kỹ năng chuyên môn và kỹ năng mềm để có thể thiết kế, chế tạo, vận hành các thiết bị và hệ thống điện tử viễn thông, đáp ứng được yêu cầu về tính năng động và sáng tạo của lĩnh vực nghề nghiệp này.<br />\r\nChương trình kỹ thuật Điện tử- Viễn thông được giảng dạy bằng tiếng Việt và được thiết kế bao gồm khối kiến thức toán học và khoa học cơ bản, khối kiến thức cơ sở cốt lõi ngành Điện tử -Viễn thông, khối kiến thức bổ trợ kiến thức xã hội và kỹ năng mềm và khối kiến thức tự chọn chuyên sâu theo các định hướng kỹ thuật điện tử, kỹ thuật máy tính, kỹ thuật thông tin truyền thông, kỹ thuật y sinh, kỹ thuật điện tử hàng không vũ trụ, kỹ thuật đa phương tiện, kỹ thuật vi điện tử và công nghệ nano.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><u>Hình thức xét tuyển</u></strong></p>\r\n\r\n<ul>\r\n	<li>Xét tuyển thẳng (Xét tuyển tài năng)</li>\r\n	<li>Xét tuyển dựa trên kết quả thi tốt nghiệp THPT</li>\r\n	<li>Xét tuyển dựa trên kết quả bài kiểm tra tư duy</li>\r\n</ul>\r\n\r\n<h2>Chương trình đào tạo</h2>\r\n\r\n<p><strong>Kiến thức, kỹ năng đạt được sau tốt nghiệp</strong></p>\r\n\r\n<p><strong>Kiến thức</strong></p>\r\n\r\n<ul>\r\n	<li>Sinh viên tốt nghiệp có khả năng áp dụng các kiến thức toán học và khoa học cơ bản, các kiến thức cơ sở ngành, các kiến thức cốt lõi ngành kết hợp khả năng khai thác, sử dụng các phương pháp, công cụ hiện đại để thiết kế, mô phỏng, triển khai, vận hành và đánh giá các hệ thống điện tử, viễn thông, các sản phẩm và giải pháp kỹ thuật trong lĩnh vực Điện tử - Viễn thông.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Kỹ năng</strong></p>\r\n\r\n<ul>\r\n	<li>Sinh viên tốt nghiệp được trang bị kỹ năng và phẩm chất chuyên nghiệp cần thiết để có thể thành công trong nghề nghiệp.</li>\r\n	<li>Kỹ năng xã hội cần thiết để làm việc hiệu quả trong nhóm đa ngành và trong môi trường quốc tế.</li>\r\n	<li>Năng lực nhận biết vấn đề và hình thành ý tưởng, năng lực thiết kế, năng lực triển khai, năng lực vận hành, sử dụng và khai thác các hệ thống điện tử, viễn thông; các sản phẩm và giải pháp kỹ thuật trong lĩnh vực Điện tử - Viễn thông.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Ngoại ngữ:</strong></p>\r\n\r\n<ul>\r\n	<li>Sử dụng tiếng Anh hiệu quả trong giao tiếp và công việc, đạt điểm TOEIC 500 trở lên.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Thời gian đào tạo và khả năng học lên bậc học cao hơn</strong></p>\r\n\r\n<ul>\r\n	<li>Đào tạo Cử nhân: 4 năm</li>\r\n	<li>Đào tạo tích hợp Cử nhân - Kỹ sư: 5 năm</li>\r\n	<li>Đào tạo tích hợp Cử nhân - Thạc sỹ: 5,5 năm</li>\r\n	<li>Đào tạo Cử nhân - Thạc sỹ - Tiến sĩ: 8,5 năm</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4>HỌC BỔNG</h4>\r\n\r\n<p>Ngoài các nguồn học bổng và hỗ trợ tài chính của Trường ĐHBK Hà Nội, sinh viên theo học ngành Kỹ thuật Điện tử - Viễn thông có cơ hội nhận các loại học bổng:</p>\r\n\r\n<ul>\r\n	<li>Học bổng hỗ trợ học tập, học bổng trao đổi sinh viên từ các doanh nghiệp và các trường Đại học quôc tế là đối tác của Viện Điện tử - Viễn thông với tổng giá trị khoảng 3 tỉ đồng mỗi năm.</li>\r\n	<li>Sinh viên tốt nghiệp còn có nhiều cơ hội xin học bổng du học tại Mỹ, châu Âu, Nhật Bản, Singapore, Hàn Quốc &hellip;</li>\r\n	<li>Hàng năm, có 5 - 8% tổng số sinh viên tốt nghiệp ngành Kỹ thuật Điện tử - Viễn thông nhận học bổng tại nước ngoài.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4>CƠ HỘI VIỆC LÀM</h4>\r\n\r\n<p>95% có việc làm sau một năm tốt nghiệp với mức lương khởi điểm trung bình từ 8-20 triệu đồng/tháng<br />\r\n<strong>Các vị trí việc làm tiêu biểu:</strong></p>\r\n\r\n<ul>\r\n	<li>Kỹ sư thiết kế và tối ưu mạng, quản lý mạng, vận hành hệ thống mạng viễn thông phức tạp.</li>\r\n	<li>Kỹ sư thiết kế và viết phần mềm cho máy tính, thiết kế và viết phần mềm cho các thiết bị thông minh như điện thoại di động, rô bốt, xe ô tô, đầu thu truyền hình kỹ thuật số&hellip;, kỹ sư kiểm thử phần mềm.</li>\r\n	<li>Kỹ sư thiết kế vi mạch, kiểm thử vi mạch, kỹ sư làm việc trong lĩnh vực bán dẫn cũng như các công nghệ vật liệu điện tử tiên tiến khác.</li>\r\n	<li>Kỹ sư thiết kế, chế tạo, vận hành thiết bị y tế, hệ thống thông tin y tế, hệ thống điện tử hàng không vũ trụ, hệ thống đa phương tiện, phát thanh truyền hình.</li>\r\n</ul>', 1, 'ET1', 7480, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `hinh`, `email_verified_at`, `password`, `quyen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Hoàng Hải', 'hai.nguyenhoang@hust.edu.vn', 'x9KS_NGUYEN HOANG HAI HTVT.jpg', NULL, '$2y$10$erTEp1nIM58iXDOBJAlDN.IXJrok6aAnaL1mnTAlpx6JIxWUQh1Tm', 2, NULL, NULL, NULL),
(2, 'Phạm Nguyễn Thanh Loan', 'loan.phamnguyenthanh@hust.edu.vn', 'Te8N_pham-nguyen-thanh-loan-KTMT.jpg', NULL, '$2y$10$j9/HFg5kfWC0DCE3P/k9UeWkYBgfnefSoujXXmPO44IpHkIPfwwpa', 2, NULL, NULL, NULL),
(3, 'Nguyễn Xuân Công', 'cong.nx2440@sis.hust.edu.vn', 'avt mac_dinh.png', NULL, '$2y$10$STmJ6kgYrB5ufJIodc7/auB.uUxrB/ou5JiA.V1DrqRkQ8V86sZPu', 4, NULL, NULL, NULL),
(4, 'Nguyễn Hữu Trung', 'trung.nguyenhuu@hust.edu.vn', 'Pmf4_NGUYEN HUU TRUNG VU TRU.jpg', NULL, '$2y$10$PuMjZx8DCHNHeOm0qx5gt.HczFXodLODubw3woyKlkCnx16qsrQjm', 2, NULL, NULL, NULL),
(5, 'khach', 'khach2541999@gmail.com', 'UfoP_me-man-top-5-thu-vien-dai-hoc-dep-nhat-viet-nam 2.jpg', NULL, '$2y$10$PjqNUKhyVSdFahhj/J6KGOKDf/W0xVZvYcIciKcwZdvT06V3Yy56m', 5, NULL, NULL, NULL),
(6, 'Phan Doãn Tĩnh', 'tinh.phandoan@hust.edu.vn', 'NIyC_PHAN DOAN TINH KTMT.jpg', NULL, '$2y$10$Basshc1qKpleSo7NJWPOmOBhkDHU5OjnoJXQOVsm0WDzbg9wnN4ka', 2, NULL, NULL, NULL),
(7, 'Hàn Huy Dũng', 'dung.hanhuy@hust.edu.vn', 'd82t_HAN HUY DUNG KTMT.jpg', NULL, '$2y$10$PG8YiKZVdSeYe1WyFVEOrOjkRD3yOHPNvagJB6jxwQVIt6Ep.KnOi', 2, NULL, NULL, NULL),
(8, 'Nguyễn Tiến Dũng', 'dung.nguyentien@hust.edu.vn', '3MqF_nguyen-tien-dung-KTMT.jpg', NULL, '$2y$10$AZ8oIWHd5eplcYSJYOfWwO7Dw6oIx2uOp3dUuyQtKqRO/D21z0SRO', 3, NULL, NULL, NULL),
(9, 'Nguyễn Thị Kim Thoa', 'thoa.nguyenthikim@hust.edu.vn', 'x02B_NGUYEN THI KIM THOA KTMT.jpg', NULL, '$2y$10$FZTrbDy1RP5clRNqzDpvbuTMi1eyhTubRzHBCVuAcvyD7vKycba4C', 3, NULL, NULL, NULL),
(10, 'Admin', 'admin12345@hust.edu.vn', 'avt mac_dinh.png', NULL, '$2y$10$XVfbc.iJCxxglSrttWvjx.z3gPZt8vZYuICUyjh9mV5SuZPc6/XNG', 1, NULL, NULL, NULL),
(11, 'Hoàng Phương Chi', 'chi.hoangphuong@hust.edu.vn', 'X2xg_HOANG PHUONG CHI HTVT.jpg', NULL, '$2y$10$wWH/5le1xNi0ltRfASWU2uzGZrHqXEw2XaqkIBS6nBUuWy/cDOGpq', 2, NULL, NULL, NULL),
(12, 'Phan Xuân Vũ', 'vu.phanxuan@hust.edu.vn', 'BsLD_PHAN XUAN VU HTVT.png', NULL, '$2y$10$l67AetNshf3p3ljgz71VBuLHJ9o1EoeNOv2BMlOIgYZDvjxAVojz2', 2, NULL, NULL, NULL),
(13, 'Nguyễn Xuân Quyền', 'quyen.nguyenxuan@hust.edu.vn', '4zL5_NGUYEN XUAN QUYEN HTVT.jpg', NULL, '$2y$10$VZ/eeMb7bJwIgokrVF3IK.rrgMvu83buTa73sf8Cx2krMC5JFN5/2', 3, NULL, NULL, NULL),
(14, 'Vương Hoàng Nam', 'nam.vuonghoang@hust.edu.vn', 'eNPh_VUONG HOANG NAM HTVT.jpg', NULL, '$2y$10$YwV/BrAlwV2kuIJl55zGI.kuYzsXUUZTzfJVKaIXe8zmV3./tfw4C', 3, NULL, NULL, NULL),
(15, 'Hà Duyên Trung', 'trung.haduyen@hust.edu.vn', 'O19L_176977534_799534974001128_352235922514953408_n.jpg', NULL, '$2y$10$9MdJiLM2KIObChXyvBYUx.Tv9e.LfYYAyfsT/UQkc0SWw.fEPuClO', 3, NULL, NULL, NULL),
(16, 'Đỗ Trọng Tuấn', 'tuan.dotrong@hust.edu.vn', 'FMrw_dotrongtuan-VU TRU.png', NULL, '$2y$10$qgUec5cJwkhP1fktImZYteUTyJQRGbg1IPh2NKn/WnrYUqzznZbNW', 3, NULL, NULL, NULL),
(17, 'Hán Trọng Thanh', 'thanh.hantrong@hust.edu.vn', '9KmS_HAN TRONG THANH VU TRU.jpg', NULL, '$2y$10$BPXvK25tmbCKE2CQmA8ykOHBVu.obFSWblRTrUkRDTlfKJnYnQaHK', 3, NULL, NULL, NULL),
(18, 'Nguyễn Bích Huyền', 'huyen.nguyenbich@hust.edu.vn', 'nwCJ_NGUYEN BICH HUYEN VU TRU.jpg', NULL, '$2y$10$mTj8YdM5R/dqeBIq8F94.euq8bOEVAEJOYLvjdGZExjGlVN1EdqGq', 3, NULL, NULL, NULL),
(19, 'Nguyễn Xuân Dũng', 'dung.nguyenxuan@hust.edu.vn', 'NyZM_NGUYEN XUAN DUNG KTTT.jpg', NULL, '$2y$10$Zuj4/wFluYfh67GbcZ9jQ.H4pfB9CR4n2KqWIvQ0SUAxXNX9Hun.q', 2, NULL, NULL, NULL),
(20, 'Trương Thu Hương', 'huong.truongthu@hust.edu.vn', 'G15F_TRUONG THU HUONG KTTT.jpg', NULL, '$2y$10$Hv84lAUkfmVPQlnxtdrPueFhlStJmP5/9miHX89XONTEB8IMpBmO6', 2, NULL, NULL, NULL),
(21, 'Phạm Văn Tiến', 'tien.phamvan@hust.edu.vn', 'gnJQ_PHAM VAN TIEN KTTT.jpg', NULL, '$2y$10$5q1a4s6gk8FYiAm6vZZ8DO7zarLEFgKAp.VJsRf94yQ8P0vdJdx7m', 2, NULL, NULL, NULL),
(22, 'Vũ Hải', 'hai.vu@hust.edu.vn', 'haz3_VU HAI KTTT.jpg', NULL, '$2y$10$B0ZMrizi9SzXhekiLR3RyOZH4X4EBQNv9/iXmuUVQ8/pUQRZY9oE6', 3, NULL, NULL, NULL),
(23, 'Nguyễn Hữu Thanh', 'thanh.nguyenhuu@hust.edu.vn', 'qBmB_NGUYEN HUU THANH KTTT.jpg', NULL, '$2y$10$5NNndiV5Yvcrj9Bu2FNuceSHjiuHfbg0Dysf3ElG3QGqk1F.VSKN2', 3, NULL, NULL, NULL),
(24, 'Nguyễn Việt Dũng', 'dung.nguyenviet@hust.edu.vn', 'Vu9z_NGUYEN VIET DUNG Y SINH.jpg', NULL, '$2y$10$WRDdiHHEGNVstwXpEqg8eOfWpHEIy65E5lN/40Udpxjew4RMCCyUi', 2, NULL, NULL, NULL),
(25, 'Phạm Phúc Ngọc', 'ngoc.phamphuc@hust.edu.vn', 'Ew0y_PHAM PHUC NGOC Y SINH.jpg', NULL, '$2y$10$fD39F1tXAIqt6Z.GKj5XmuIiyX7Zq3.06PMffCNYF6KReCXgpeeuW', 2, NULL, NULL, NULL),
(26, 'Trần Anh Vũ', 'vu.trananh@hust.edu.vn', 'E6E2_tran-anh-vu-Y SINH.jpg', NULL, '$2y$10$HccXaefpSQV0CQJke2Hxwu.k5Y.gsE79Bilpdb33ReBz4Px.3LiJu', 2, NULL, NULL, NULL),
(27, 'Nguyễn Phan Kiên', 'kien.nguyenphan@hust.edu.vn', 'v4DL_NGUYEN PHAN KIEN Y SINH.jpg', NULL, '$2y$10$2KeU/XUfEG2oW49x5zPAOue6b0PV9jXVNc.wTW02uE19jvtmygrWq', 3, NULL, NULL, NULL),
(28, 'Đào Việt Hùng', 'hung.daoviet@hust.edu.vn', 'z1Kp_DAO VIET HUNG Y SINH.jpg', NULL, '$2y$10$wrjX2mbMNjjHct6lOmmnoOANu/eGZ97w5mUtyXlSYzoFyB78YD66e', 3, NULL, NULL, NULL),
(29, 'Trần Mạnh Hoàng', 'hoang.tranmanh@hust.edu.vn', 'zot7_tran-manh-hoang-MACH XYTH.jpg', NULL, '$2y$10$2XVKXpFbOVlP05Vo11bzMOaVIJWAv4riWYNB.8BbtKt78u02OSlyG', 2, NULL, NULL, NULL),
(30, 'Nguyễn Hữu Phát', 'phat.nguyenhuu@hust.edu.vn', 'ddpo_nguyen-huu-phat-MACH XLTH.jpg', NULL, '$2y$10$4MqT/VhAZXAJN5ute/vN1ubfGDV29qUghBz3FfhLpgh.yHoxPtGT2', 2, NULL, NULL, NULL),
(31, 'Đào Lê Thu Thảo', 'thao.daolethu@hust.edu.vn', 'qQ0o_DAO LE THU THAO MACH XLTH.jpg', NULL, '$2y$10$BOEUFP31QUrJVCMdi1YX/ODRNt34JOiHObyngNTsUjLP9vqJFqmKK', 3, NULL, NULL, NULL),
(32, 'Dương Tấn Nghĩa', 'nghia.duongtan@hust.edu.vn', 'mOPO_duong-tan-nghia-MACH XLTH.jpg', NULL, '$2y$10$vYHNeLGEwYl8bnT.h1n9hu3isDtc76dkiMA3FKb/lfcLTGL0RXmOW', 3, NULL, NULL, NULL),
(33, 'Nguyễn Thúy Anh', 'anh.nguyenthuy@hust.edu.vn', 'cQMv_nguyen-thuy-anh-MACH XLTH.jpg', NULL, '$2y$10$6wWKAXloCexgnsaN8hL5JOzqt0AIxncZCizdqVMvobij5usYOiH8a', 3, NULL, NULL, NULL),
(34, 'Nguyễn Hoàng Dũng', 'dung.nguyenhoang@hust.edu.vn', 'Up9s_177507787_549837783071284_4467078396167109214_n.jpg', NULL, '$2y$10$O3wBypUyDPahkmY7GsYRHe38hGoLqVUeHayYP3ErlhdUfUgRjM1SS', 3, NULL, NULL, NULL),
(35, 'Tạ Thị Kim Huệ', 'hue.tathikim@hust.edu.vn', 'TgQ0_ta-kim-hue-300x300.jpg', NULL, '$2y$10$i/LKcuIUV.Uxm2gr0HTZ6uCQU8sO1rUkfGLuK7EStyfkvKS9O3rBW', 3, NULL, NULL, NULL),
(36, 'Đỗ Công Kiền', 'kien2541999@gmail.com', 'avt mac_dinh.png', NULL, '$2y$10$BqrtR9mS/oB17b2jUOuyZuOlynclpW0RjatzvEYqJeih97YE4Lq0C', 4, NULL, NULL, NULL),
(37, 'nguyễn văn C', 'nguyenvanc@gmail.com', 'avt mac_dinh.png', NULL, '$2y$10$SugEGgxY.QY1pW.ku1mOm.OCI08MS6U1aQi8K5uSd6QT3QxL2969O', 4, NULL, NULL, NULL),
(38, 'Lê Minh Nghĩa', 'nghia.lm172719@sis.hust.edu.vn', 'avt mac_dinh.png', NULL, '$2y$10$y2SLH/n79WOjrShkzi8TQu8knrqs4VDRaQOQGYMvgyHhdh98qef2K', 4, NULL, NULL, NULL),
(39, 'Nguyễn Tiến Thành', 'thanhkhotinh@gmail.com', 'avt mac_dinh.png', NULL, '$2y$10$BbNe6UfVahbSXKrSLw7td.snqLTa/gCOd6wTyotkzOUoJEV7ohQv2', 4, NULL, NULL, NULL),
(40, 'nguyễn văn B', 'nguyenvanb@gmail.com', 'avt mac_dinh.png', NULL, '$2y$10$DAZ3xDFGXY6ZRwm2tDCBCOlB.7Nrm2h4zzSnnIfaW.nEVY.D8JJOC', 4, NULL, NULL, NULL),
(41, 'Nguyễn Văn Nam', 'vannam2542004@gmail.com', 'avt mac_dinh.png', NULL, '$2y$10$v20sSC2rpiSgK5mQNGMR1uuh/6H/NYPsYh7GmaUpi6nNzVyzau0LG', 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vi_tri`
--

CREATE TABLE `vi_tri` (
  `id` int(10) UNSIGNED NOT NULL,
  `noi_cong_tac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vi_tri`
--

INSERT INTO `vi_tri` (`id`, `noi_cong_tac`, `mo_ta`) VALUES
(1, 'BỘ MÔN ĐIỆN TỬ VÀ KỸ THUẬT MÁY TÍNH', 'Hiện nay bộ môn có 27 cán bộ, trong đó có 4 PGS. TS, 10 TS. Số cán bộ hiện đang tham gia giảng dạy là 15 người. Số cán bộ phục vụ giảng dạy là 2 người. Số cán bộ hành chính sự nghiệp là 3 người. Số cán bộ đang học tập và công tác ở nước ngoài là 7 người. Nhờ chính sách tuyển dụng của Ban lãnh đạo Viện, đội ngũ cán bộ của bộ môn đã được bổ sung, nâng cao về số lượng và chất lượng bù đắp sự thiếu hụt do một số thày/cô lớn tuổi nghỉ hưu và một số cán bộ chuyển công tác. Các cán bộ của bộ môn được đào tạo trình độ chuyên môn đạt chuẩn, trình độ sư phạm được nâng cao đáp ứng ngày càng tốt hơn cho công tác giảng dạy và nghiên cứu khoa học. Bên cạnh đó, các cán bộ luôn luôn có ý thức chấp hành thực thi tốt dân chủ cơ sở, chấp hành tốt nội quy, quy chế làm việc của đơn vị.'),
(2, 'BỘ MÔN HỆ THỐNG VIỄN THÔNG', 'Tiền thân của bộ môn Hệ thống Viễn thông là bộ môn Vô tuyến điện nằm trong khoa điện được thành lập tử năm 1956. Đến năm 1966, Bộ môn vô tuyến điện được tách từ khoa Điện thành khoa Vô Tuyến điện trong đó có bộ môn Kỹ thuật vô tuyến điện nay chính là Bộ môn Hệ thống Viễn thông. Trong chiến tranh chống Mỹ, các cán bộ trong Bộ môn có nhiều nghiên cứu đóng góp lớn như nghiên cứu phá thủy lôi, xây dựng hệ thống thông tin, định vị ứng dụng cho không quân…. . Sau năm 1975, nhiều cán bộ trong Bộ môn tham gia tư vấn cho nhà nước về các vấn đề thông tin liên lạc, phát thanh truyền hình. Cũng trong thời gian này Bộ môn có nhiều đề tài cấp nhà nước được ủy ban khoa học nhà nước nay là Bộ khoa học và công nghệ đánh giá cao các kết quả nghiên cứu và triển khai.\r\n\r\nNhững năm đã qua bộ môn được 2 lần tặng bằng khen của Thủ Tướng chính phủ, nhiều lần được tặng bằng khen của Bộ giáo dục và đào tạo và nhiều lần là tập thể lao động suất săc cấp Bộ. Hiện nay Bộ môn có 27 cán bộ tham gia giảng dạy 18 môn cơ sở và chuyên ngành điện tử viễn thông. Nhiều cán bộ được đào tạo bài bản ở một số nước tư bản phát triển như Cộng hòa Pháp, Mỹ, Nhật, Tây ba nha, Đức…\r\n\r\nLĩnh vực giảng dạy và nghiên cứu của Bộ môn là Hệ thống viễn thông là hệ thống thông tin vệ tinh, hệ thống thông tin di động, hệ thống thông tin sợi quang, hệ thống phát thanh truyền hình, anten truyền sóng, kỹ thuật siêu cao tần…. Nhiều cán bộ trong bộ môn hiện đang chủ trì các đề tài cấp nhà nước, cấp thành phố và cấp Bộ.'),
(3, 'BỘ MÔN ĐIỆN TỬ HÀNG KHÔNG VŨ TRỤ', 'Từ năm 1986, Khoa Vô tuyến điện, nay là Viện ĐT-VT, đã bắt đầu triển khai giảng dạy các môn học liên quan đến chuyên ngành Điện tử Hàng không - Vũ trụ (ĐT HK-VT) và có chiến lược đào tạo nguồn nhân lực, chuẩn bị về tổ chức để thành lập chuyên ngành ĐT HK-VT.'),
(4, 'BỘ MÔN KỸ THUẬT THÔNG TIN', 'Bộ môn kĩ thuật thông tin  thực hiện nhiệm vụ chuyên môn của Viện Điện tử - Viễn thông liên quan đến lĩnh vực mạng và kĩ thuật truyền thông tin. Được thành lập năm 1995, Bộ môn đã có nhiều đóng góp cho sự phát triển chung của Khoa và Trường trong công tác đào tạo, nghiên cứu khoa học và chuyển giao công nghệ. Đội ngũ cán bộ của bộ môn có trình độ chuyên môn cao, nhiều cán bộ giảng dạy trẻ có học vị tiến sĩ từng học tập, làm việc tại các nước phát triển như Hoa kĩ, Đức, Italia, Bỉ, Na-uy, Nga, Nhật Bản, Hàn Quốc\r\n\r\nBộ môn có quan hệ quốc tế với nhiều cơ quan nghiên cứu uy tín của nước ngoài như Đại học Tổng hợp Hannover, Viện Nghiên cứu Fraunhofer FOKUS, Đại học Wuerzburg (CHLB Đức), Trung tâm nghiên cứu truyền thông không dây Torino Wireless (Italia), Đại học Tổng hợp Trento (Italia), Phòng nghiên cứu thông tin di động Học viện công nghệ Tokyo (Nhật Bản) v.v... Hoạt động nghiên cứu khoa học và đào tạo của bộ môn gắn liền với thực tiễn, có hợp tác với các doanh nghiệp (VNPT, Panasonic, Samsung…).'),
(5, 'BỘ MÔN CN ĐIỆN TỬ VÀ KT Y SINH', 'Bộ môn Công nghệ điện tử và Kỹ thuật Y sinh đảm nhận chức năng giảng dạy và nghiên cứu khoa học trong lĩnh vực Điện tử Y sinh và Điện tử ứng dụng. Đây là đơn vị đầu đàn trong việc đào tạo chuyên ngành Điện tử Y sinh trên cả nước, đã được BGD&ĐT phê duyệt chương trình khung năm 2008. Với đội ngũ cán bộ năng động, nhiệt tình công tác, cơ sở vật chất hiện đại, bộ môn đã phối hợp cùng khoa Điện tử Viễn thông đào tạo sinh viên chuyên ngành với các hệ đào tạo: Đại học chính quy, Chương trình tiên tiến, Thạc sỹ và Tiến sỹ. Nhiều công trình nghiên cứu khoa học của cán bộ bộ môn đã đạt kết quả xuất sắc, góp phần thực hiện Chính sách Quốc gia về Trang thiết bị y tế do Chính phủ phê duyệt năm 2002. Ngoài ra, từ năm 2008, Bộ môn đã được BGD&ĐT cho phép triển khai thực hiện đào tạo Chương trình tiên tiến Kỹ thuật Y sinh. Đây là 1 trong số 30 chương trình tiên tiến đã được Thủ tướng phê duyệt.'),
(6, 'TRUNG TÂM NGHIÊN CỨU PHÁT TRIỂN', 'Trung tâm nghiên cứu phát triển Công nghệ Điện tử Viễn thông là tổ hợp phức hợp các phòng thí nghiệm nghiên cứu triển khai trực thuộc Viện Điện tử - Viễn thông. Được thành lập vào tháng 12 năm 2010, Trung tâm Nghiên cứu và Phát triển Công nghệ Điện tử Viễn thông là một trung tâm nghiên cứu liên ngành với mục tiêu là tận dụng tối đa tiềm năng về nguồn nhân lực và bí quyết công nghệ từ các nhà nghiên cứu của Viện.\r\n\r\nBên cạnh nghiên cứu, trung tâm còn thực hiện các hoạt động chuyển giao công nghệ, sở hữu trí tuệ, đào tạo thiên hướng doanh nghiệp, và tư vấn doanh nghiệp.\r\n\r\nCác phòng thí nghiệm nghiên cứu trực thuộc Trung tâm nghiên cứu và phát triển công nghệ Điện tử - Viễn thông góp phần thực hiện mục tiêu Viện Điện tử Viễn thông là một trung tâm nghiên cứu khoa học, chuyển giao công nghệ và tư vấn hàng đầu của đất nước, đạt trình độ tiên tiến trong khu vực và trên thế giới trong lĩnh vực Điện tử, Viễn thông; một địa chỉ tin cậy, hấp dẫn đối với các nhà đầu tư phát triển công nghệ, giới doanh nghiệp trong và ngoài nước.'),
(7, 'TRUNG TÂM ĐÀO TẠO THỰC HÀNH', 'Buổi ban đầu, Trung tâm đào tạo thực hành ĐT-TH-VT được gọi là Xưởng vô tuyến điện. Xưởng vô tuyến điện được thành lập trong khoa Điện tử - Viễn thông vào năm 1966. Trải qua những năm tháng kháng chiến hào hùng, cán bộ công nhân viên của Xưởng đã sát cánh cùng với các cán bộ của khoa và Trường tham gia kháng chiến, tiêu biểu là chiến dịch phòng không nên nóc nhà A1, A2, A3. Trong những năm đổi mới, cán bộ Trung tâm không ngừng nỗ lực cải tiến, thêm mới các nội dung thực hành, đáp ứng với sự nghiệp đào tạo cao quý của Khoa và Trường. Trường ta đang trong quá trình đổi mới, vươn lên thành trường đại học ngang tầm trong khu vực và trên thế giới đảm bảo trình độ quốc tế, cơ cấu khoa thay đổi, chuyển thành Viện đào tạo. Cán bộ công nhân viên trong Trung tâm nhận thức được tầm quan trọng của quá trình đổi mới, tầm nhìn chiến lược của ban giám hiệu trong quá trình đổi mới, nhận thức được vị trí quan trọng của đào tạo thực hành trong công tác đào tạo sinh viên, quyết tâm xây dựng Trung tâm thành Trung tâm thực hành hiện đại, cung cấp các kỹ năng thực hành cập nhật trên thế giới cho sinh viên. Ngoài ra còn là điểm nghiên cứu chuyển giao công nghệ hiệu quả trong Trường.'),
(8, 'BỘ MÔN MẠCH VÀ XỬ LÝ TÍN HIỆU', 'Tiền thân của Bộ môn Mạch và Xử lý tín hiệu là Bộ môn Cơ sở vô tuyến điện do Cố Giáo sư Bùi Minh Tiêu làm Trưởng Bộ môn. Lúc đó, Bộ môn được chia thành ba nhóm chuyên môn là nhóm Lý thuyết mạch, nhóm Kỹ thuật số và nhóm Kỹ thuật đo lường. Bộ môn gồm 14 cán bộ giảng dạy và 5 cán bộ thí nghiệm (lúc đó chưa có ai có học vị Tiến sĩ và học hàm Phó Giáo sư, Giáo sư).');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binh_luan_id_tin_tuc_foreign` (`id_tin_tuc`),
  ADD KEY `binh_luan_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giang_vien_id_vi_tri_foreign` (`id_vi_tri`),
  ADD KEY `giang_vien_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lanh_dao`
--
ALTER TABLE `lanh_dao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lanh_dao_id_giang_vien_foreign` (`id_giang_vien`);

--
-- Chỉ mục cho bảng `loai_tin`
--
ALTER TABLE `loai_tin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lop_hoc_id_khoa_hoc_foreign` (`id_khoa_hoc`),
  ADD KEY `lop_hoc_id_giang_vien_foreign` (`id_giang_vien`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sinh_vien_id_lop_hoc_foreign` (`id_lop_hoc`),
  ADD KEY `sinh_vien_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `tin_nhan_cho`
--
ALTER TABLE `tin_nhan_cho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tin_tuc_id_loai_tin_foreign` (`id_loai_tin`),
  ADD KEY `tin_tuc_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `tuyen_sinh`
--
ALTER TABLE `tuyen_sinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vi_tri`
--
ALTER TABLE `vi_tri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lanh_dao`
--
ALTER TABLE `lanh_dao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `loai_tin`
--
ALTER TABLE `loai_tin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tin_nhan_cho`
--
ALTER TABLE `tin_nhan_cho`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tuyen_sinh`
--
ALTER TABLE `tuyen_sinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `vi_tri`
--
ALTER TABLE `vi_tri`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_id_tin_tuc_foreign` FOREIGN KEY (`id_tin_tuc`) REFERENCES `tin_tuc` (`id`),
  ADD CONSTRAINT `binh_luan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD CONSTRAINT `giang_vien_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `giang_vien_id_vi_tri_foreign` FOREIGN KEY (`id_vi_tri`) REFERENCES `vi_tri` (`id`);

--
-- Các ràng buộc cho bảng `lanh_dao`
--
ALTER TABLE `lanh_dao`
  ADD CONSTRAINT `lanh_dao_id_giang_vien_foreign` FOREIGN KEY (`id_giang_vien`) REFERENCES `giang_vien` (`id`);

--
-- Các ràng buộc cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD CONSTRAINT `lop_hoc_id_giang_vien_foreign` FOREIGN KEY (`id_giang_vien`) REFERENCES `giang_vien` (`id`),
  ADD CONSTRAINT `lop_hoc_id_khoa_hoc_foreign` FOREIGN KEY (`id_khoa_hoc`) REFERENCES `khoa_hoc` (`id`);

--
-- Các ràng buộc cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD CONSTRAINT `sinh_vien_id_lop_hoc_foreign` FOREIGN KEY (`id_lop_hoc`) REFERENCES `lop_hoc` (`id`),
  ADD CONSTRAINT `sinh_vien_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD CONSTRAINT `tin_tuc_id_loai_tin_foreign` FOREIGN KEY (`id_loai_tin`) REFERENCES `loai_tin` (`id`),
  ADD CONSTRAINT `tin_tuc_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
