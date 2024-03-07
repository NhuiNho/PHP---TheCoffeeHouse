-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 01, 2024 lúc 06:56 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thecoffeehouse`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `status`) VALUES
(1, 'Trường Phước', 'truongphuoc442001@gmail.com', 'b51768c8d66d66fe9d8b4801f72bcbf3', '0856033726', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`, `description`, `status`) VALUES
(1, 'banner1.webp', '', 1),
(2, 'banner2.webp', '', 1),
(3, 'banner3.webp', '', 1),
(4, 'banner4.webp', '', 1),
(5, 'banner5.webp', '', 1),
(6, 'banner_2023_12.webp', '', 2),
(7, 'banner_2024_01.webp', '', 2),
(8, 'banner_2024_02.jpg', NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `size_id` int NOT NULL,
  `topping_id` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `type` varchar(200) NOT NULL,
  `category_type` int NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `type`, `category_type`, `image`) VALUES
(1, 'Cà Phê HighLight', 1, '1704187744_8084.jpg'),
(2, 'Cà Phê Việt Nam', 1, 'caphe_cloudfee.png'),
(3, 'Cà Phê Máy', 1, 'category_cf.jpg'),
(4, 'Cold Brew', 1, 'category_cold.jpg'),
(5, 'Trà Trái Cây', 2, 'tratraicay_hitea.png'),
(6, 'Trà Sữa Machiato', 2, 'trasua_cloudtea.png'),
(7, 'CloudTea', 3, 'trasua_cloudtea.png'),
(8, 'CloudFee', 3, 'caphe_cloudfee.png'),
(9, 'CloudTea Mochi', 3, 'trasua_cloudtea.png'),
(10, 'Hi-Tea Trà', 4, 'tratraicay_hitea.png'),
(11, 'Hi-Tea Đá Tuyết', 4, 'tratraicay_hitea.png'),
(12, 'Trà Xanh Tây Bắc', 5, 'traxanh_chocolate.png'),
(13, 'Chocolate', 5, 'traxanh_chocolate.png'),
(14, 'Đá Xay Frosty', 6, 'daxay_frosty.png'),
(15, 'Bánh Mặn', 7, 'banhman.png'),
(16, 'Bánh Ngọt', 7, 'banhngot.png'),
(17, 'Snack', 7, 'category_ga.jpg'),
(18, 'Bánh Pastry', 7, 'category_butter.jpg'),
(19, 'Cà Phê Tại Nhà', 8, 'caphe_tradonggoi.png'),
(20, 'Trà Tại Nhà', 8, 'caphe_tradonggoi.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyennha`
--

CREATE TABLE `chuyennha` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `chuyennha`
--

INSERT INTO `chuyennha` (`id`, `name`) VALUES
(1, 'Coffeeholic'),
(2, 'Teaholic'),
(3, 'Blog');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `product_id`, `description`) VALUES
(1, 2, 2, 'hihi'),
(2, 6, 2, 'hihi cô Ly');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `content`
--

CREATE TABLE `content` (
  `id` int NOT NULL,
  `image` varchar(200) NOT NULL,
  `time` date NOT NULL,
  `caption` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `content_detail` varchar(2000) NOT NULL,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `content`
--

INSERT INTO `content` (`id`, `image`, `time`, `caption`, `content_detail`, `type`) VALUES
(3, 'content_coffeeholic_1.jpg', '2023-10-30', 'CHỈ CHỌN CÀ PHÊ MỖI SÁNG NHƯNG CŨNG KHIẾN CUỘC SỐNG CỦA BẠN THÊM THÚ VỊ, TẠI SAO KHÔNG?', 'Thực chất, bạn không nhất thiết phải làm gì to tát để tạo nên một ngày rực rỡ. Chỉ cần bắt đầu từ những việc nhỏ nhặt nhất, khi bạn đứng trước quầy cà phê mỗi sáng, mạnh dạn thử một thức uống mới mẻ và phá cách.\r\n\r\nCuộc sống là một vòng tròn\r\n\r\nHầu hết cuộc đời mỗi người đều trải qua một (hoặc nhiều) lần rơi vào vòng lặp của tạo hóa. Đơn giản nhất, hãy nhìn chính bản thân mình: sinh ra, lớn lên, đi học, đi làm, tìm kiếm bạn đời, xây dựng gia đình, và tận hưởng tuổi già.\r\n\r\nHay ngắn hơn, vòng lặp đó còn là một ngày mà cũng như mọi ngày: thức dậy, làm việc, ăn uống, nghỉ ngơi rồi đến cuối tuần, cuối tháng, và hết một năm.\r\n\r\nVòng tròn được định sẵn đó nghe thật tệ? Không hẳn.', 1),
(4, 'content_coffeeholic_2.jpg', '2023-02-12', 'SIGNATURE - BIỂU TƯỢNG VĂN HOÁ CÀ PHÊ CỦA THE COFFEE HOUSE ĐÃ QUAY TRỞ LẠI', '\r\nMới đây, các \"tín đồ\" cà phê đang bàn tán xôn xao về SIGNATURE - Biểu tượng văn hóa cà phê của The Coffee House đã quay trở lại.\r\nMột lời hẹn làm bao người xao xuyến\r\nVừa qua, Fanpage Nhà đã hé mở những thông tin đầu tiên về \"SIGNATURE by The Coffee House\" kèm lời hẹn \"Hôm nay bạn có hẹn chưa? Mình cà phê nhé!\".\r\n\r\nTheo đó, SIGNATURE by The Coffee House sẽ gửi đến các thành viên của Nhà những Cuộc hẹn tròn đầy với 3 trải nghiệm: Tách cà phê đặc sản với những mẻ rang mới mỗi ngày, chiều lòng mọi tâm hồn yêu cà phê hay những ai đang tò mò về loại trái cây đặc biệt này; Món ăn đa bản sắc, mang phong vị giao thoa từ nhiều nơi cho cuộc hẹn dài hơn, rôm rả hơn; Một không gian đầy cảm hứng, nơi hạt cà phê kể về hành trình tuyệt vời của mình theo cách gần gũi nhất. Bạn sẽ có cơ hội thưởng thức cà phê bằng đủ những giác quan - ngửi hương, lắng nghe, ngắm nhìn và nếm vị.', 1),
(5, 'content_coffeeholic_3.jpg', '2023-02-09', 'UỐNG GÌ KHI TỚI SIGNATURE BY THE COFFEE HOUSE?', 'Vừa qua, The Coffee House chính thức khai trương cửa hàng SIGNATURE by The Coffee House, chuyên phục vụ cà phê đặc sản, các món ăn đa bản sắc ấy ý tưởng từ cà phê và trà và gây ấn tượng với không gian cảm hứng bài trí hành trình cà phê đặc sắc, làm nên một cuộc hẹn tròn đầy.\r\n', 1),
(6, 'content_teaholic_1.jpg', '2023-09-19', 'TRUNG THU NÀY, SAO BẠN KHÔNG TỰ CHO MÌNH \"DỪNG MỘT CHÚT THÔI, THƯỞNG MỘT CHÚT TRÔI\"?', '\r\nBạn có từng nghe: “Trung thu thôi mà, có gì đâu mà chơi”, hay “Trung thu càng ngày càng chán”...? Sự bận rộn đến mức “điên rồ” đã khiến chúng ta dần quên đi: bản thân mỗi người cũng đã từng háo hức mỗi khi Trung thu đến. Vậy thì mùa trăng năm nay, sao không thử “dừng một chút thôi”, vì chúng ta đều xứng đáng tự thương mình, và tự “thưởng một chút trôi”.  \r\n\r\nCú lừa của khoa học và công nghệ\r\n\r\nCuộc sống ngày càng trở nên hối hả, và con người đang bận rộn hơn bao giờ hết. Đây là một nghịch lý so với tiên đoán từ năm 1930 của nhà kinh tế học người Anh - John Maynard Keynes. Ông đã ước tính trong tương lai, số giờ làm việc sẽ ngắn đi và thời gian nghỉ ngơi sẽ dài ra nhờ sự phát triển của khoa học kỹ thuật và công nghệ hiện đại. Tuy nhiên, thực tế đã chứng minh điều ngược lại. Con người không những chẳng nhàn hơn, mà còn ngày càng khó thoát khỏi guồng quay tất bật, kéo theo vô vàn áp lực cuộc sống. ', 2),
(7, 'content_teaholic_2.jpg', '2023-01-16', 'BỘ SƯU TẬP CẦU TOÀN KÈO THƠM: \"VÍA\" MAY MẮN KHÔNG THỂ BỎ LỠ TẾT NÀY', 'Tết nay vẫn giống Tết xưa, không hề mai một nét văn hoá truyền thống mà còn thêm vào những hoạt động “xin vía” hiện đại, trẻ trung. Ví như giới trẻ đang lên lịch ghé The Coffee House - “địa điểm xin vía mới nổi” để vừa thưởng thức bộ sưu tập thức uống dành riêng cho Tết vừa mong năm mới Cầu Toàn Kèo Thơm.\r\n\r\n“Xin vía” - cụm từ quen thuộc được giới trẻ sử dụng như một câu nói cửa miệng trong giao tiếp hàng ngày lại thể hiện nét văn hoá đặc trưng của người Việt mỗi dịp Tết đến, Xuân về. Ghé thăm những địa điểm may mắn, thưởng thức những món ăn mang ý nghĩa tốt lành hay gặp gỡ người “hợp tuổi” là điều ai cũng muốn làm trong năm mới. Thấu hiểu tâm lý đón Tết với “tất tần tật” điều may từ ẩm thực đến đi lại của mọi người, The Coffee House đã ra mắt BST Tết Quý Mão 2023 mang tên Cầu Toàn Kèo Thơm. ', 2),
(8, 'content_teaholic_3.jpg', '2022-08-16', '“KHUẤY ĐỂ THẤY TRĂNG\" - KHUẤY LÊN NIỀM HẠNH PHÚC: TRẢI NGHIỆM KHÔNG THỂ BỎ LỠ MÙA TRUNG THU NÀY', 'Năm 2022 là năm đề cao sức khỏe tinh thần nên giới trẻ muốn tận hưởng một Trung thu với nhiều trải nghiệm mới mẻ, rôm rả cùng bạn bè và người thân. Và trải nghiệm độc đáo “Khuấy để thấy trăng” của The Coffee House như khuấy lên niềm hạnh phúc, nao nức về một trung thu đầy thú vị mà không người trẻ nào muốn bỏ lỡ.\r\n\r\nTết Trung thu đặc biệt với những điều giản đơn\r\nCứ đến tháng 8 âm lịch, đường phố Việt Nam lại rộn ràng trống lân và lồng đèn trưng kệ. Nhưng năm ngoái, nhiều người bỗng \"đón trăng\" kiểu khác, với các hoạt động thưởng trăng rước đèn diễn ra có phần hạn chế và yên ắng hơn. Đón Trung thu tại nhà, gia đình đoàn viên từ xa thông qua màn hình điện thoại hay ngắm trăng online... đó là những ký ức khó quên của người Việt về một tết Đoàn viên đặc biệt.', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(1, 'Cà Phê'),
(2, 'Trà'),
(3, 'Cloud'),
(4, 'Hi-Tea Healthy'),
(5, 'Trà Xanh - Chocolate'),
(6, 'Thức uống đá xay'),
(7, 'Bánh & Snack'),
(8, 'Thưởng thức tại nhà');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name_receiver` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone_receiver` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `address_receiver` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email_receiver` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1',
  `total_price` float NOT NULL,
  `payment_method` int NOT NULL,
  `voucher_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `email_receiver`, `time`, `status`, `total_price`, `payment_method`, `voucher_id`) VALUES
(36, 6, 'Trường Phước', '0909236232', '43v Cư aaaaaaa', 'ahavyvy@gmail.com', '2024-02-28 19:36:23', 1, 246000, 1, NULL),
(37, 2, 'Đặng Châu Trường Phước', '0856033726', '43v Cư xá phú lâm D', 'truongphuoc442001@gmail.com', '2024-02-28 19:50:06', 4, 276000, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `size_id` int NOT NULL,
  `topping_id` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `size_id`, `topping_id`, `quantity`) VALUES
(36, 1, 1, '1', 1),
(36, 1, 1, '100', 1),
(36, 1, 1, '13', 2),
(37, 1, 1, '100', 1),
(37, 1, 1, '125', 2),
(37, 1, 1, '35', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_status`
--

CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Đơn hàng mới đặt'),
(2, 'Đơn hàng đang giao'),
(3, 'Đơn hàng đã giao'),
(4, 'Đơn hàng đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int NOT NULL,
  `name_method` varchar(200) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `payment_method`
--

INSERT INTO `payment_method` (`id`, `name_method`, `icon`) VALUES
(1, 'Thanh toán khi nhận hàng', 'bx bx-money');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `price` float NOT NULL,
  `product_type` int NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` text NOT NULL,
  `sale` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `product_type`, `image`, `description`, `sale`) VALUES
(1, 'Phin Sữa Tươi Bánh Flan', 49000, 1, '1704005420_3562.jpg', 'Tỉnh tức thì cùng cà phê Robusta pha phin đậm đà và bánh flan núng nính. Uống là tỉnh, ăn là dính, xứng đáng là highlight trong ngày của bạn.', NULL),
(2, 'Trà Xanh Espresso Marble', 49000, 1, 'tra-xanh-espresso-marble.jpg', 'Cho ngày thêm tươi, tỉnh, êm, mượt với Trà Xanh Espresso Marble. Đây là sự mai mối bất ngờ giữa trà xanh Tây Bắc vị mộc và cà phê Arabica Đà Lạt. Muốn ngày thêm chút highlight, nhớ tìm đến sự bất ngờ này bạn nhé!', NULL),
(3, 'Đường Đen Sữa Đá', 45000, 2, 'duong-den-sua-da.webp', 'Nếu chuộng vị cà phê đậm đà, bùng nổ và thích vị đường đen ngọt thơm, Đường Đen Sữa Đá đích thị là thức uống dành cho bạn. Không chỉ giúp bạn tỉnh táo buổi sáng, Đường Đen Sữa Đá còn hấp dẫn đến ngụm cuối cùng bởi thạch cà phê giòn dai, nhai cực cuốn. - Khuấy đều trước khi sử dụng\r\n\r\n', NULL),
(4, 'The Coffee House Sữa Đá', 39000, 2, 'the-coffee-house-sua-da.webp', 'Thức uống giúp tỉnh táo tức thì để bắt đầu ngày mới thật hứng khởi. Không đắng khét như cà phê truyền thống, The Coffee House Sữa Đá mang hương vị hài hoà đầy lôi cuốn. Là sự đậm đà của 100% cà phê Arabica Cầu Đất rang vừa tới, biến tấu tinh tế với sữa đặc và kem sữa ngọt ngào cực quyến rũ. Càng hấp dẫn hơn với topping thạch 100% cà phê nguyên chất giúp giữ trọn vị ngon đến ngụm cuối cùng.', NULL),
(5, 'Cà Phê Sữa Đá', 29000, 2, 'ca-phe-sua-da.webp', 'Cà phê Đắk Lắk nguyên chất được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.\r\n\r\n', NULL),
(6, 'Cà Phê Sữa Nóng', 39000, 2, 'ca-phe-sua-nong.jpg', 'Cà phê được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.\r\n\r\n', NULL),
(7, 'Bạc Sỉu', 29000, 2, 'bac-siu.jpg', 'Bạc sỉu chính là \"Ly sữa trắng kèm một chút cà phê\". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.', NULL),
(8, 'Bạc Sỉu Nóng', 39000, 2, 'bac-siu-nong.jpg', 'Bạc sỉu chính là \"Ly sữa trắng kèm một chút cà phê\". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.\r\n\r\n', NULL),
(9, 'Cà Phê Đen Đá', 29000, 2, 'ca-phe-den-da.jpg', 'Không ngọt ngào như Bạc sỉu hay Cà phê sữa, Cà phê đen mang trong mình phong vị trầm lắng, thi vị hơn. Người ta thường phải ngồi rất lâu mới cảm nhận được hết hương thơm ngào ngạt, phảng phất mùi cacao và cái đắng mượt mà trôi tuột xuống vòm họng.', NULL),
(10, 'Cà Phê Đen Nóng', 39000, 2, 'ca-phe-den-nong.jpg', 'Không ngọt ngào như Bạc sỉu hay Cà phê sữa, Cà phê đen mang trong mình phong vị trầm lắng, thi vị hơn. Người ta thường phải ngồi rất lâu mới cảm nhận được hết hương thơm ngào ngạt, phảng phất mùi cacao và cái đắng mượt mà trôi tuột xuống vòm họng.', NULL),
(11, 'Cà Phê Sữa Đá Chai Fresh 250ML', 75000, 2, 'ca-phe-sua-da-chai-fresh-250ml.jpg', 'Vẫn là hương vị cà phê sữa đậm đà quen thuộc của The Coffee House nhưng khoác lên mình một chiếc áo mới tiện lợi hơn, tiết kiệm hơn phù hợp với bình thường mới, giúp bạn tận hưởng một ngày dài trọn vẹn. *Sản phẩm dùng ngon nhất trong ngày. *Sản phẩm mặc định mức đường và không đá.', NULL),
(12, 'Đường Đen Marble Latte', 55000, 3, 'duong-den-marble-latte.webp', 'Đường Đen Marble Latte êm dịu cực hấp dẫn bởi vị cà phê đắng nhẹ hoà quyện cùng vị đường đen ngọt thơm và sữa tươi béo mịn. Sự kết hợp đầy mới mẻ của cà phê và đường đen cũng tạo nên diện mạo phân tầng đẹp mắt. Đây là lựa chọn đáng thử để bạn khởi đầu ngày mới đầy hứng khởi. - Khuấy đều trước khi sử dụng\r\n\r\n', NULL),
(13, 'Caramel Macchiato Đá', 55000, 3, 'caramel-macchiato-da.jpg', 'Khuấy đều trước khi sử dụng Caramel Macchiato sẽ mang đến một sự ngạc nhiên thú vị khi vị thơm béo của bọt sữa, sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê.', NULL),
(14, 'Caramel Macchiato Nóng', 55000, 3, 'caramel-macchiato-nong.jpg', 'Caramel Macchiato sẽ mang đến một sự ngạc nhiên thú vị khi vị thơm béo của bọt sữa, sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê.', NULL),
(15, 'Latte Đá', 55000, 3, 'latte-da.jpg', 'Một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.', NULL),
(16, 'Latte Nóng', 55000, 3, 'latte-nong.jpg', 'Một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.', NULL),
(17, 'Americano Đá', 45000, 3, 'americano-da.jpg', 'Americano được pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.', NULL),
(18, 'Americano Nóng', 45000, 3, 'americano-nong.jpg', 'Americano được pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.\r\n\r\n', NULL),
(19, 'Cappuccino Đá', 55000, 3, 'cappuccino-da.jpg', 'Capuchino là thức uống hòa quyện giữa hương thơm của sữa, vị béo của bọt kem cùng vị đậm đà từ cà phê Espresso. Tất cả tạo nên một hương vị đặc biệt, một chút nhẹ nhàng, trầm lắng và tinh tế.\r\n\r\n', NULL),
(20, 'Cappuccino Nóng', 55000, 3, 'cappuccino-nong.jpg', 'Capuchino là thức uống hòa quyện giữa hương thơm của sữa, vị béo của bọt kem cùng vị đậm đà từ cà phê Espresso. Tất cả tạo nên một hương vị đặc biệt, một chút nhẹ nhàng, trầm lắng và tinh tế.', NULL),
(21, 'Espresso Đá', 49000, 3, 'espresso-da.jpg', 'Một tách Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc.\r\n\r\n', NULL),
(22, 'Espresso Nóng', 45000, 3, 'espresso-nong.jpg', 'Một tách Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc.\r\n\r\n', NULL),
(23, 'Cold Brew Phúc Bồn Tử', 49000, 4, 'cold-brew-phuc-bon-tu.jpg', 'Vị chua ngọt của trái phúc bồn tử, làm dậy lên hương vị trái cây tự nhiên vốn sẵn có trong hạt cà phê, hòa quyện thêm vị đăng đắng, ngọt dịu nhẹ nhàng của Cold Brew 100% hạt Arabica Cầu Đất để mang đến một cách thưởng thức cà phê hoàn toàn mới, vừa thơm lừng hương cà phê quen thuộc, vừa nhẹ nhàng và thanh mát bởi hương trái cây đầy thú vị.\r\n\r\n', NULL),
(24, 'Cold Brew Sữa Tươi', 49000, 4, 'cold-brew-sua-tuoi.jpg', 'Thanh mát và cân bằng với hương vị cà phê nguyên bản 100% Arabica Cầu Đất cùng sữa tươi thơm béo cho từng ngụm tròn vị, hấp dẫn.\r\n\r\n', NULL),
(25, 'Cold Brew Truyền Thống', 45000, 4, 'cold-brew-truyen-thong.jpg', 'Tại The Coffee House, Cold Brew được ủ và phục vụ mỗi ngày từ 100% hạt Arabica Cầu Đất với hương gỗ thông, hạt dẻ, nốt sô-cô-la đặc trưng, thoang thoảng hương khói nhẹ giúp Cold Brew giữ nguyên vị tươi mới.\r\n\r\n', NULL),
(26, 'Trà Long Nhãn Hạt Sen', 49000, 5, 'tra-long-nhan-hat-sen.jpg', 'Thức uống mang hương vị của nhãn, của sen, của trà Oolong đầy thanh mát cho tất cả các thành viên trong dịp Tết này. An lành, thư thái và đậm đà chính là những gì The Coffee House mong muốn gửi trao đến bạn và gia đình.\r\n\r\n', NULL),
(27, 'Trà Đào Cam Sả Đá', 49000, 5, 'tra-dao-cam-sa-da.webp', 'Vị thanh ngọt của đào, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.\r\n\r\n', NULL),
(28, 'Trà Đào Cam Sả Nóng', 59000, 5, 'tra-dao-cam-sa-nong.jpg', 'Vị thanh ngọt của đào, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.\r\n\r\n', NULL),
(29, 'Trà Đào Cam Sả Chai Fresh 500ML', 105000, 5, 'tra-dao-cam-sa-chai-fresh-500ml.jpg', 'Với phiên bản chai fresh 500ml, thức uống \"best seller\" đỉnh cao mang một diện mạo tươi mới, tiện lợi, phù hợp với bình thường mới và vẫn giữ nguyên vị thanh ngọt của đào, vị chua dịu của cam vàng nguyên vỏ và vị trà đen thơm lừng ly Trà đào cam sả nguyên bản. *Sản phẩm dùng ngon nhất trong ngày. *Sản phẩm mặc định mức đường và không đá.\r\n\r\n', NULL),
(30, 'Trà Hạt Sen Nóng', 49000, 5, 'tra-hat-sen-nong.webp', 'Nền trà oolong hảo hạng kết hợp cùng hạt sen tươi, bùi bùi thơm ngon. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.\r\n\r\n', NULL),
(31, 'Trà Hạt Sen Đá', 39000, 5, 'tra-hat-sen-da.jpg', 'Nền trà oolong hảo hạng kết hợp cùng hạt sen tươi, bùi bùi và lớp foam cheese béo ngậy. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.\r\n\r\n', NULL),
(38, 'Trà Đen Macchiato', 55000, 6, 'tra-den-macchiato.jpg', 'Trà đen được ủ mới mỗi ngày, giữ nguyên được vị chát mạnh mẽ đặc trưng của lá trà, phủ bên trên là lớp Macchiato \"homemade\" bồng bềnh quyến rũ vị phô mai mặn mặn mà béo béo.\r\n\r\n', NULL),
(39, 'Hồng Trà Sữa Trân Châu', 55000, 6, 'hong-tra-sua-tran-chau.webp', 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.\r\n\r\n', NULL),
(40, 'Hồng Trà Sữa Nóng', 55000, 6, 'hong-tra-sua-nong.jpg', 'Từng ngụm trà chuẩn gu ấm áp, đậm đà beo béo bởi lớp sữa tươi chân ái hoà quyện. Trà đen nguyên lá âm ấm dịu nhẹ, quyện cùng lớp sữa thơm béo khó lẫn - hương vị ấm áp chuẩn gu trà, cho từng ngụm nhẹ nhàng, ngọt dịu lưu luyến mãi nơi cuống họng.\r\n\r\n', NULL),
(41, 'Trà sữa Oolong Nướng Trân Châu', 55000, 6, 'tra-sua-oolong-nuong-tran-chau.webp', 'Hương vị chân ái đúng gu đậm đà với trà oolong được “sao” (nướng) lâu hơn cho hương vị đậm đà, hòa quyện với sữa thơm béo mang đến cảm giác mát lạnh, lưu luyến vị trà sữa đậm đà nơi vòm họng.\r\n\r\n', NULL),
(42, 'Trà sữa Oolong Nướng (Nóng)', 55000, 6, 'tra-sua-oolong-nuong-nong.jpg', 'Đậm đà chuẩn gu và ấm nóng - bởi lớp trà oolong nướng đậm vị hoà cùng lớp sữa thơm béo. Hương vị chân ái đúng gu đậm đà - trà oolong được \"sao\" (nướng) lâu hơn cho vị đậm đà, hoà quyện với sữa thơm ngậy. Cho từng ngụm ấm áp, lưu luyến vị trà sữa đậm đà mãi nơi cuống họng.\r\n\r\n', NULL),
(43, 'Trà Sữa Mắc Ca Trân Châu', 55000, 6, 'tra-sua-mac-ca-tran-chau.webp', 'Mỗi ngày với The Coffee House sẽ là điều tươi mới hơn với sữa hạt mắc ca thơm ngon, bổ dưỡng quyện cùng nền trà oolong cho vị cân bằng, ngọt dịu đi kèm cùng Trân châu trắng giòn dai mang lại cảm giác “đã” trong từng ngụm trà sữa.\r\n\r\n', NULL),
(44, 'Trà Sữa Oolong Nướng Trân Châu Chai Fresh 500ML', 95000, 6, 'tra-sua-oolong-nuong-tran-chau-chai-fresh-500ml.jpg', 'Phiên bản chai fresh 500ml mới, The Coffee House tin rằng với diện mạo mới: tiện lợi và phù hợp với bình thường mới này, các tín đồ trà sữa sẽ được thưởng thức hương vị đậm đà, hòa quyện với sữa thơm béo mang đến cảm giác mát lạnh ở bất cứ nơi đâu. *Sản phẩm dùng ngon nhất trong ngày. *Sản phẩm mặc định mức đường và không đá.\r\n\r\n', NULL),
(45, 'CloudTea Trà Xanh Tây Bắc', 69000, 7, 'cloudtea-tra-xanh-tay-bac.webp', 'Không thể rời môi với Mochi Kem Matcha dẻo mịn, núng nính. Trà Xanh Tây Bắc vị mộc hoà quyện sữa tươi, foam phô mai beo béo và vụn bánh quy giòn tan, là lựa chọn đậm không khí lễ hội.\r\n\r\n', NULL),
(46, 'CloudTea Oolong Berry', 69000, 7, 'cloudtea-oolong-berry.webp', 'Cắn một cái, chua chua ngọt ngọt ngon đến từng tế bào với chiếc Mochi Kem Phúc Bồn Tử! Hút một ngụm, mê luôn Trà Oolong Sữa dịu êm quyện vị dâu, cùng lớp foam phô mai phủ vụn bánh quy phô mai mằn mặn.\r\n\r\n', NULL),
(47, 'CloudTea Oolong Nướng Kem Dừa', 55000, 7, 'cloudtea-oolong-nuong-kem-dua.jpg', 'Vừa chạm môi là mê mẩn ngay lớp kem dừa beo béo, kèm vụn bánh quy phô mai giòn tan trong miệng. Đặc biệt, trà Oolong nướng đậm đà, hòa cùng sữa dừa ngọt dịu. Hương vị thêm bùng nổ nhờ có thạch Oolong nướng nguyên chất, giòn dai.\r\n\r\n', NULL),
(48, 'CloudTea Oolong Nướng Kem Cheese', 55000, 7, 'cloudtea-oolong-nuong-kem-cheese.jpg', 'Hội mê cheese sao có thể bỏ lỡ chiếc trà sữa siêu mlem này. Món đậm vị Oolong nướng - nền trà được yêu thích nhất hiện nay, quyện thêm kem sữa thơm béo. Đặc biệt, chinh phục ngay fan ghiền cheese bởi lớp foam phô mai mềm tan mằn mặn. Càng ngon cực với thạch Oolong nướng nguyên chất giòn dai nhai siêu thích.\r\n\r\n', NULL),
(49, 'CloudTea Oolong Nướng Kem Dừa Đá Xay', 55000, 7, 'cloudtea-oolong-nuong-kem-dua-da-xay.webp', 'Trà sữa đá xay - phiên bản nâng cấp đầy mới lạ của trà sữa truyền thống, lần đầu xuất hiện tại Nhà. Ngon khó cưỡng với lớp kem dừa béo ngậy nhưng không ngấy, thêm vụn bánh quy phô mai giòn tan vui miệng. Trà Oolong nướng rõ hương đậm vị, quyện với sữa dừa beo béo, được xay mịn cùng đá, mát rượi trong tích tắc. Đặc biệt, thạch Oolong nướng nguyên chất giúp giữ trọn vị đậm đà của trà sữa đến giọt cuối cùng.\r\n\r\n', NULL),
(50, 'CloudFee Hạnh Nhân Nướng', 49000, 8, 'cloudfee-hanh-nhan-nuong.webp', 'Vị đắng nhẹ từ cà phê phin truyền thống kết hợp Espresso Ý, lẫn chút ngọt ngào của kem sữa và lớp foam trứng cacao, nhấn thêm hạnh nhân nướng thơm bùi, kèm topping thạch cà phê dai giòn mê ly. Tất cả cùng quyện hoà trong một thức uống làm vị giác \"thức giấc\", thơm ngon hết nấc.\r\n\r\n', NULL),
(51, 'CloudFee Caramel', 49000, 8, 'cloudfee-caramel.webp', 'Ngon khó cưỡng bởi xíu đắng nhẹ từ cà phê phin truyền thống pha trộn với Espresso lừng danh nước Ý, quyện vị kem sữa và caramel ngọt ngọt, thêm lớp foam trứng cacao bồng bềnh béo mịn, kèm topping thạch cà phê dai giòn nhai cực cuốn. Một thức uống \"điểm mười\" cho cả ngày tươi không cần tưới.\r\n\r\n', NULL),
(52, 'CloudFee Hà Nội', 49000, 8, 'cloudfee-ha-noi.jpg', 'Khiến bạn mê mẩn ngay ngụm đầu tiên bởi vị đắng nhẹ của cà phê phin truyền thống kết hợp Espresso Ý, quyện hòa cùng chút ngọt ngào của kem sữa, và thơm béo từ foam trứng cacao. Nhấp một ngụm rồi nhai cùng thạch cà phê dai dai giòn giòn, đúng chuẩn \"ngon quên lối về\". CloudFee Classic là món đậm vị cà phê nhất trong bộ sưu tập nhưng không quá đắng, ngậy nhưng không hề ngấy.\r\n\r\n', NULL),
(53, 'CloudTea Oolong Berry', 69000, 9, 'cloudtea-oolong-berry.webp', 'Cắn một cái, chua chua ngọt ngọt ngon đến từng tế bào với chiếc Mochi Kem Phúc Bồn Tử! Hút một ngụm, mê luôn Trà Oolong Sữa dịu êm quyện vị dâu, cùng lớp foam phô mai phủ vụn bánh quy phô mai mằn mặn.\r\n\r\n', NULL),
(54, 'CloudTea Trà Xanh Tây Bắc', 69000, 9, 'cloudtea-tra-xanh-tay-bac.webp', 'Không thể rời môi với Mochi Kem Matcha dẻo mịn, núng nính. Trà Xanh Tây Bắc vị mộc hoà quyện sữa tươi, foam phô mai beo béo và vụn bánh quy giòn tan, là lựa chọn đậm không khí lễ hội.\r\n\r\n', NULL),
(55, 'Hi Tea Đào Kombucha', 59000, 10, 'hi-tea-dao-kombucha.webp', 'Trà hoa Hibiscus 0% caffeine chua nhẹ, kết hợp cùng trà lên men Kombucha hoàn toàn tự nhiên và Đào thanh mát tạo nên Hi-Tea Đào Kombucha chua ngọt cực cuốn. Đặc biệt Kombucha Detox giàu axit hữu cơ, Đào nhiều chất xơ giúp thanh lọc cơ thể và hỗ trợ giảm cân hiệu quả. Lưu ý: Khuấy đều trước khi dùng\r\n\r\n', NULL),
(56, 'Hi Tea Yuzu Kombucha', 59000, 10, 'hi-tea-yuzu-kombucha.jpg', 'Trà hoa Hibiscus 0% caffeine thanh mát, hòa quyện cùng trà lên men Kombucha 100% tự nhiên và mứt Yuzu Marmalade (quýt Nhật) mang đến hương vị chua chua lạ miệng. Đặc biệt, Hi-Tea Yuzu Kombucha cực hợp cho team thích detox, muốn sáng da nhờ Kombucha Detox nhiều chất chống oxy hoá cùng Yuzu giàu vitamin C. Lưu ý: Khuấy đều trước khi dùng\r\n\r\n', NULL),
(57, 'Hi Tea Phúc Bồn Tử Mandarin', 49000, 10, 'hi-tea-phuc-bon-tu-mandarin.webp', 'Nền trà Hibiscus thanh mát, quyện vị chua chua ngọt ngọt của phúc bồn tử 100% tự nhiên cùng quýt mọng nước mang đến cảm giác sảng khoái tức thì.\r\n\r\n', NULL),
(58, 'Hi Tea Yuzu Trân Châu', 49000, 10, 'hi-tea-yuzu-tran-chau.png', 'Không chỉ nổi bật với sắc đỏ đặc trưng từ trà hoa Hibiscus, Hi-Tea Yuzu còn gây ấn tượng với topping Yuzu (quýt Nhật) lạ miệng, kết hợp cùng trân châu trắng dai giòn sần sật, nhai vui vui.\r\n\r\n', NULL),
(59, 'Hi Tea Vải', 49000, 10, 'hi-tea-vai.png', 'Chút ngọt ngào của Vải, mix cùng vị chua thanh tao từ trà hoa Hibiscus, mang đến cho bạn thức uống đúng chuẩn vừa ngon, vừa healthy.\r\n\r\n', NULL),
(60, 'Hi Tea Đào', 49000, 10, 'hi-tea-dao.jpg', 'Sự kết hợp ăn ý giữa Đào cùng trà hoa Hibiscus, tạo nên tổng thể hài hoà dễ gây “thương nhớ” cho team thích món thanh mát, có vị chua nhẹ.\r\n\r\n', NULL),
(61, 'Hi Tea Đá Tuyết Yuzu Vải', 59000, 11, 'hi-tea-da-tuyet-yuzu-vai.webp', 'Vị trà hoa Hibiscus chua chua, kết hợp cùng đá tuyết Yuzu mát lạnh tái tê, thêm miếng vải căng mọng, ngọt ngào sẽ khiến bạn thích thú ngay từ lần thử đầu tiên.\r\n\r\n', NULL),
(62, 'Trà Xanh Latte', 45000, 12, 'tra-xanh-latte.webp', 'Không cần đến Tây Bắc mới cảm nhận được sự trong trẻo của núi rừng, khi Trà Xanh Latte từ Nhà được chắt lọc từ những búp trà xanh mướt, ủ mình trong sương sớm. Trà xanh Tây Bắc vị thanh, chát nhẹ hoà cùng sữa tươi nguyên kem ngọt béo tạo nên hương vị dễ uống, dễ yêu. Đây là thức uống healthy, giúp bạn tỉnh táo một cách êm mượt, xoa dịu những căng thẳng.\r\n\r\n', NULL),
(63, 'Trà Xanh Latte (Nóng)', 45000, 12, 'tra-xanh-latte-nong.webp', 'Trà Xanh Latte (Nóng) là phiên bản rõ vị trà nhất. Nhấp một ngụm, bạn chạm ngay vị trà xanh Tây Bắc chát nhẹ hoà cùng sữa nguyên kem thơm béo, đọng lại hậu vị ngọt ngào, êm dịu. Không chỉ là thức uống tốt cho sức khoẻ, Trà Xanh Latte (Nóng) còn là cái ôm ấm áp của đồng bào Tây Bắc gửi cho người miền xuôi.\r\n\r\n', NULL),
(64, 'Trà Xanh Đường Đen', 55000, 12, 'tra-xanh-duong-den.jpg', 'Trà Xanh Đường Đen với hiệu ứng phân tầng đẹp mắt, như phác hoạ núi đồi Tây Bắc bảng lảng trong sương mây, thấp thoáng những nương chè xanh ngát. Từng ngụm là sự hài hoà từ trà xanh đậm đà, đường đen ngọt ngào, sữa tươi thơm béo. Khuấy đều trước khi dùng, để thưởng thức đúng vị\r\n\r\n', NULL),
(65, 'Frosty Trà Xanh', 59000, 12, 'frosty-tra-xanh.webp', 'Đá Xay Frosty Trà Xanh như lời mời mộc mạc, ghé thăm Tây Bắc vào những ngày tiết trời se lạnh, núi đèo mây phủ. Vị chát dịu, ngọt thanh của trà xanh Tây Bắc kết hợp đá xay sánh mịn, whipping cream bồng bềnh và bột trà xanh trên cùng thêm đậm vị. Đây không chỉ là thức uống mát lạnh bật mood, mà còn tốt cho sức khoẻ nhờ giàu vitamin và các chất chống oxy hoá.\r\n\r\n', NULL),
(66, 'Chocolate Đá', 55000, 13, 'chocolate-da.jpg', 'Bột chocolate nguyên chất hoà cùng sữa tươi béo ngậy, ấm nóng. Vị ngọt tự nhiên, không gắt cổ, để lại một chút đắng nhẹ, cay cay trên đầu lưỡi.\r\n\r\n', NULL),
(67, 'Frosty Phin Gato', 55000, 14, 'frosty-phin-gato.png', 'Đá Xay Frosty Phin-Gato là lựa chọn không thể bỏ lỡ cho tín đồ cà phê. Cà phê nguyên chất pha phin truyền thống, thơm đậm đà, đắng mượt mà, quyện cùng kem sữa béo ngậy và đá xay mát lạnh. Nhân đôi vị cà phê nhờ có thêm thạch cà phê đậm đà, giòn dai. Thức uống khơi ngay sự tỉnh táo tức thì. Lưu ý: Khuấy đều phần đá xay trước khi dùng\r\n\r\n', NULL),
(68, 'Frosty Cà Phê Đường Đen', 59000, 14, 'frosty-ca-phe-duong-den.png', 'Đá Xay Frosty Cà Phê Đường Đen mát lạnh, sảng khoái ngay từ ngụm đầu tiên nhờ sự kết hợp vượt chuẩn vị quen giữa Espresso đậm đà và Đường Đen ngọt thơm. Đặc biệt, whipping cream beo béo cùng thạch cà phê giòn dai, đậm vị nhân đôi sự hấp dẫn, khơi bừng sự hứng khởi trong tích tắc.\r\n\r\n', NULL),
(69, 'Frosty Caramel Arabica', 59000, 14, 'frosty-caramel-arabica.png', 'Caramel ngọt thơm quyện cùng cà phê Arabica Cầu Đất đượm hương gỗ thông, hạt dẻ và nốt sô cô la đặc trưng tạo nên Đá Xay Frosty Caramel Arabica độc đáo chỉ có tại Nhà. Cực cuốn với lớp whipping cream béo mịn, thêm thạch cà phê giòn ngon bắt miệng.\r\n\r\n', NULL),
(70, 'Frosty Bánh Kem Dâu', 59000, 14, 'frosty-banh-kem-dau.png', 'Bồng bềnh như một đám mây, Đá Xay Frosty Bánh Kem Dâu vừa ngon mắt vừa chiều vị giác bằng sự ngọt ngào. Bắt đầu bằng cái chạm môi với lớp kem whipping cream, cảm nhận ngay vị beo béo lẫn sốt dâu thơm lừng. Sau đó, hút một ngụm là cuốn khó cưỡng bởi đá xay mát lạnh quyện cùng sốt dâu ngọt dịu. Lưu ý: Khuấy đều phần đá xay trước khi dùng\r\n\r\n', NULL),
(71, 'Frosty Choco Chip', 59000, 14, 'frosty-choco-chip.webp', 'Đá Xay Frosty Choco Chip, thử là đã! Lớp whipping cream bồng bềnh, beo béo lại có thêm bột sô cô la và sô cô la chip trên cùng. Gấp đôi vị ngon với sô cô la thật xay với đá sánh mịn, đậm đà đến tận ngụm cuối cùng.\r\n\r\n', NULL),
(72, 'Bánh Mì Gậy Gà Kim Quất', 25000, 15, 'banh-mi-gay-ga-kim-quat.webp', 'Phiên bản nâng cấp với trọng lượng tăng 80% so với bánh mì que thông thường, đem đến cho bạn bữa ăn nhanh gọn mà vẫn đầy đủ dinh dưỡng. Cắn một miếng là mê mẩn bởi vỏ bánh nướng giòn rụm, nhân đậm vị với từng miếng thịt gà mềm, ướp sốt kim quất chua ngọt, thơm nức đặc trưng. Càng \"đúng bài\" hơn khi thưởng thức kèm Cà phê đượm vị hoặc trà Hi-Tea thanh mát.\r\n\r\n', NULL),
(73, 'Bánh Mì Gậy Cá Ngừ Mayo', 25000, 15, 'banh-mi-gay-ca-ngu-mayo.jpg', 'Trọng lượng tăng 70% so với bánh mì que thông thường, thêm nhiều dinh dưỡng, thích hợp cho cả bữa ăn nhẹ lẫn ăn no. Ngon hết chỗ chê từ vỏ bánh nướng nóng giòn, cá ngừ đậm đà quyện lẫn sốt mayo thơm béo đến từng hạt bắp ngọt bùi hấp dẫn. Nhâm nhi bánh cùng ly Cà phê thơm nồng hay Hi-Tea tươi mát thì đúng chuẩn \"điểm mười\".\r\n\r\n', NULL),
(74, 'Bánh Mì Que Pate', 15000, 15, 'banh-mi-que-pate.png', 'Vỏ bánh mì giòn tan, kết hợp với lớp nhân pate béo béo đậm đà sẽ là lựa chọn lý tưởng nhẹ nhàng để lấp đầy chiếc bụng đói , cho 1 bữa sáng - trưa - chiều - tối của bạn thêm phần thú vị.\r\n\r\n', NULL),
(75, 'Bánh Mì Que Pate Cay', 15000, 15, 'banh-mi-que-pate-cay.jpg', 'Vỏ bánh mì giòn tan, kết hợp với lớp nhân pate béo béo đậm đà và 1 chút cay cay sẽ là lựa chọn lý tưởng nhẹ nhàng để lấp đầy chiếc bụng đói , cho 1 bữa sáng - trưa - chiều - tối của bạn thêm phần thú vị.\r\n\r\n', NULL),
(76, 'Bánh Mì VN Thịt Nguội', 39000, 15, 'banh-mi-vn-thit-nguoi.jpg', 'Gói gọn trong ổ bánh mì Việt Nam là từng lớp chả, từng lớp jambon hòa quyện cùng bơ và pate thơm lừng, thêm dưa rau cho bữa sáng đầy năng lượng. *Phần bánh sẽ ngon và đậm đà nhất khi kèm pate. Để đảm bảo hương vị được trọn vẹn, Nhà mong bạn thông cảm vì không thể thay đổi định lượng pate.\r\n\r\n', NULL),
(77, 'Croissant trứng muối', 39000, 15, 'croissant-trung-muoi.jpg', 'Croissant trứng muối thơm lừng, bên ngoài vỏ bánh giòn hấp dẫn bên trong trứng muối vị ngon khó cưỡng.\r\n\r\n', NULL),
(78, 'Chà Bông Phô Mai', 39000, 15, 'cha-bong-pho-mai.png', 'Chiếc bánh với lớp phô mai vàng sánh mịn bên trong, được bọc ngoài lớp vỏ xốp mềm thơm lừng. Thêm lớp chà bông mằn mặn hấp dẫn bên trên.\r\n\r\n', NULL),
(79, 'Mochi Kem Phúc Bồn Tử', 19000, 16, 'mochi-kem-phuc-bon-tu.jpg', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân phúc bồn tử ngọt ngào. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.\r\n\r\n', NULL),
(80, 'Mochi Kem Việt Quất', 19000, 16, 'mochi-kem-viet-quat.jpg', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân việt quất đặc trưng thơm thơm, ngọt dịu. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.\r\n\r\n', NULL),
(81, 'Mochi Kem Dừa Dứa', 19000, 16, 'mochi-kem-dua-dua.jpg', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân dừa dứa thơm lừng lạ miệng. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.\r\n\r\n', NULL),
(82, 'Mochi Kem Chocolate', 19000, 16, 'mochi-kem-chocolate.jpg', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân chocolate độc đáo. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.\r\n\r\n', NULL),
(83, 'Mochi Kem Matcha', 19000, 16, 'mochi-kem-matcha.jpg', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân trà xanh đậm vị. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.\r\n\r\n', NULL),
(84, 'Mochi Kem Xoài', 19000, 16, 'mochi-kem-xoai.jpg', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân xoài chua chua ngọt ngọt. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.\r\n\r\n', NULL),
(85, 'Mousse Red Velvet', 35000, 16, 'mousse-red-velvet.jpg', 'Bánh nhiều lớp được phủ lớp kem bên trên bằng Cream cheese.\r\n\r\n', NULL),
(86, 'Mousse Tiramisu', 35000, 16, 'mousse-tiramisu.jpg', 'Hương vị dễ ghiền được tạo nên bởi chút đắng nhẹ của cà phê, lớp kem trứng béo ngọt dịu hấp dẫn\r\n\r\n', NULL),
(87, 'Mousse Gấu Chocolate', 39000, 16, 'mousse-gau-chocolate.jpg', 'Với vẻ ngoài đáng yêu và hương vị ngọt ngào, thơm béo nhất định bạn phải thử ít nhất 1 lần.\r\n\r\n', NULL),
(88, 'Mít Sấy', 20000, 17, 'mit-say.jpg', 'Mít sấy khô vàng ươm, giòn rụm, giữ nguyên được vị ngọt lịm của mít tươi.\r\n\r\n', NULL),
(89, 'Gà Xé Lá Chanh', 25000, 17, 'ga-xe-la-chanh.jpg', 'Thịt gà được xé tơi, mang hương vị mặn, ngọt, cay cay quyện nhau vừa chuẩn, thêm chút thơm thơm thơm từ lá chanh sấy khô giòn giòn xua tan ngay cơn buồn miệng.\r\n\r\n', NULL),
(90, 'Butter Croissant', 29000, 18, 'butter-croissant.jpg', 'Cắn một miếng, vỏ bánh ngàn lớp giòn thơm bơ béo, rồi mịn tan trong miệng. Cực dính khi nhâm nhi Butter Croissant với cà phê hoặc chấm cùng các món nước có foam trứng của Nhà\r\n\r\n', NULL),
(91, 'Choco Croffle', 39000, 18, 'choco-croffle.jpg', 'Lạ mắt, bắt vị với chiếc bánh Croffle được làm từ cốt bánh Croissant nướng trong khuôn Waffle tổ ong. Trong mềm mịn, ngoài giòn thơm, thêm topping sô cô la tan chảy, ăn là yêu!\r\n\r\n', NULL),
(92, 'Pate Chaud', 39000, 18, 'pate-chaud.jpg', 'Ngon nức lòng cùng nhân patê và thịt heo cuộn mình trong vỏ bánh ngàn lớp thơm bơ, giòn rụm.\r\n\r\n', NULL),
(93, 'Cà Phê Đen Đá Hộp (14 gói x 16g)', 58000, 19, 'ca-phe-den-da-hop.jpg', 'Cà Phê Đen Đá hoà tan The Coffee House với 100% hạt cà phê Robusta mang đến hương vị mạnh cực bốc, đậm đắng đầy lôi cuốn, đúng gu người Việt.\r\n\r\n', NULL),
(94, 'Cà Phê Đen Đá Túi (30 gói x 16g)', 110000, 19, 'ca-phe-den-da-tui.jpg', 'Cà Phê Đen Đá hoà tan The Coffee House với 100% hạt cà phê Robusta mang đến hương vị mạnh cực bốc, đậm đắng đầy lôi cuốn, đúng gu người Việt.\r\n\r\n', NULL),
(95, 'Thùng Cà Phê Sữa Espresso', 336000, 19, 'thung-ca-phe-sua-espresso.jpg', 'Được sản xuất theo công nghệ Nhật, Cà Phê Sữa Espresso The Coffee House giữ trọn hương vị đậm đà của 100% cà phê Robusta nguyên chất quyện hoà cùng sữa béo thơm lừng. Bật nắp trải nghiệm ngay chất cà phê mạnh mẽ giúp sảng khoái tức thì, tuôn trào hứng khởi\r\n\r\n', NULL),
(96, 'Combo 6 Lon Cà Phê Sữa Espresso', 84000, 19, 'ca-phe-sua-da-pack-6-lon.webp', 'Được sản xuất theo công nghệ Nhật, Cà Phê Sữa Espresso The Coffee House giữ trọn hương vị đậm đà của 100% cà phê Robusta nguyên chất quyện hoà cùng sữa béo thơm lừng. Bật nắp trải nghiệm ngay chất cà phê mạnh mẽ giúp sảng khoái tức thì, tuôn trào hứng khởi\r\n\r\n', NULL),
(97, 'Cà Phê Rang Xay Original 1 Túi 1KG', 235000, 19, 'ca-phe-rang-xay-original-1-tui-1kg.webp', 'Cà phê Original 1 của The Coffee House với 100% thành phần cà phê Robusta Đăk Lăk, vùng trồng cà phê ngon nhất Việt Nam. Bằng cách áp dụng kỹ thuật rang xay hiện đại, Cà phê Original 1 mang đến trải nghiệm tuyệt vời khi uống cà phê tại nhà với hương vị đậm đà truyền thống hợp khẩu vị của giới trẻ sành cà phê.\r\n\r\n', NULL),
(98, 'Cà Phê Rang Xay Original 1 250g', 60000, 19, 'ca-phe-rang-xay-original-1-250g.jpg', 'Cà phê Original 1 của The Coffee House với thành phần chính cà phê Robusta Đắk Lắk, vùng trồng cà phê nổi tiếng nhất Việt Nam. Bằng cách áp dụng kỹ thuật rang xay hiện đại, Cà phê Original 1 mang đến trải nghiệm tuyệt vời khi uống cà phê tại nhà với hương vị đậm đà truyền thống hợp khẩu vị của giới trẻ sành cà phê.\r\n\r\n', NULL),
(99, 'Cà Phê Sữa Đá Hòa Tan (10 gói x 22g)', 44000, 19, 'ca-phe-sua-da-hoa-tan.webp', 'Thật dễ dàng để bắt đầu ngày mới với tách cà phê sữa đá sóng sánh, thơm ngon như cà phê pha phin. Vị đắng thanh của cà phê hoà quyện với vị ngọt béo của sữa, giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.\r\n\r\n', NULL),
(100, 'Cà Phê Sữa Đá Hòa Tan Túi 25x22G', 99000, 19, 'ca-phe-sua-da-hoa-tan-tui.jpg', 'Thật dễ dàng để bắt đầu ngày mới với tách cà phê sữa đá sóng sánh, thơm ngon như cà phê pha phin. Vị đắng thanh của cà phê hoà quyện với vị ngọt béo của sữa, giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.\r\n\r\n', NULL),
(101, 'Cà Phê Hoà Tan Đậm Vị Việt (18 gói x 16 gam)', 48000, 19, 'ca-phe-hoa-tan-dam-vi-viet.jpg', 'Bắt đầu ngày mới với tách cà phê sữa “Đậm vị Việt” mạnh mẽ sẽ giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.\r\n\r\n', NULL),
(102, 'Cà Phê Hòa Tan Đậm Vị Việt Túi 40x16G', 99000, 19, 'ca-phe-hoa-tan-dam-vi-viet-tui.jpg', 'Bắt đầu ngày mới với tách cà phê sữa “Đậm vị Việt” mạnh mẽ sẽ giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.\r\n\r\n', NULL),
(103, 'Cà Phê Sữa Đá Pack 6 Lon', 84000, 19, 'ca-phe-sua-da-pack-6-lon.webp', 'Với thiết kế lon cao trẻ trung, hiện đại và tiện lợi, Cà phê sữa đá lon thơm ngon đậm vị của The Coffee House sẽ đồng hành cùng nhịp sống sôi nổi của tuổi trẻ và giúp bạn có được một ngày làm việc đầy hứng khởi.\r\n\r\n', NULL),
(104, 'Thùng 24 Lon Cà Phê Sữa Đá', 336000, 19, 'thung-24-lon-ca-phe-sua-da.jpg', 'Với thiết kế lon cao trẻ trung, hiện đại và tiện lợi, Cà phê sữa đá lon thơm ngon đậm vị của The Coffee House sẽ đồng hành cùng nhịp sống sôi nổi của tuổi trẻ và giúp bạn có được một ngày làm việc đầy hứng khởi.\r\n\r\n', NULL),
(105, 'Trà Vị Đào Tearoma 14x14g', 32000, 20, 'tra-vi-dao-tearoma.webp', 'Được chiết xuất từ 100% trà tự nhiên, không phẩm màu tổng hợp, Trà vị Đào Tearoma mang đến cảm giác thanh mát cực đã. Nhấp một ngụm, cảm nhận trọn vị đào chua ngọt thơm ngon bùng nổ. Ngoài ra, trà còn bổ sung vitamin C cực kỳ có lợi cho sức khoẻ.\r\n\r\n', NULL),
(106, 'Trà Sữa Trân Châu Tearoma 250g', 38000, 20, 'tra-sua-tran-chau-tearoma.jpg', 'Chỉ 2 phút có ngay ly Trà sữa trân châu ngon chuẩn vị quán. Thơm vị trà, béo vị sữa, cùng trân châu thật giòn dai sật sật. Đặc biệt, đây còn là thức uống tốt cho sức khoẻ nhờ thành phần 100% chiết xuất trà tự nhiên, không chất hoá học.\r\n\r\n', NULL),
(107, 'Trà Vị Tắc Mật Ong Tearoma 14x14g', 32000, 20, 'tra-vi-tac-mat-ong-tearoma.webp', 'Thổi bùng sảng khoái cùng Trà vị Tắc Mật Ong Tearoma không phẩm màu tổng hợp. Chiết xuất từ 100% trà tự nhiên, bổ sung vitamin C tốt cho sức khoẻ. Vị tắc chua chua hoà cùng mật ong ngọt dịu giúp bật vị giác, bừng vị mát tức thì.\r\n\r\n', NULL),
(108, 'Trà Oolong Túi Lọc Tearoma 20x2G', 28000, 20, 'tra-oolong-tui-loc-tearoma.jpg', 'Trà Oolong túi lọc với mùi hương dịu nhẹ hoàn toàn từ tự nhiên, vị hậu ngọt, và hương thơm tinh tế. Trà túi lọc Tearoma tiện lợi để sử dụng tại văn phòng, tại nhà,... nhưng vẫn đảm bảo được chất lượng về hương trà tinh tế, vị trà đậm đà.\r\n\r\n', NULL),
(109, 'Trà Lài Túi Lọc Tearoma 20x2G', 28000, 20, 'tra-lai-tui-loc-tearoma.jpg', 'Trà túi lọc Tearoma hương lài thơm tinh tế, thanh mát, trên nền trà xanh đậm đà khó quên. Trà túi lọc Tearoma tiện lợi để sử dụng tại văn phòng, tại nhà,.. nhưng vẫn đảm bảo được chất lượng về hương trà tinh tế, vị trà đậm đà.\r\n\r\n', NULL),
(110, 'Trà Sen Túi Lọc Tearoma 20x2G', 28000, 20, 'tra-sen-tui-loc-tearoma.jpg', 'Trà túi lọc Tearoma hương sen tinh tế, thanh mát, trên nền trà xanh đậm đà khó quên. Trà túi lọc Tearoma tiện lợi để sử dụng tại văn phòng, tại nhà, đi du lịch,... nhưng vẫn đảm bảo được chất lượng về hương trà tinh tế, vị trà đậm đà.\r\n\r\n', NULL),
(111, 'Trà Đào Túi Lọc Tearoma 20x2G', 28000, 20, 'tra-dao-tui-loc-tearoma.jpg', 'Trà túi lọc Tearoma hương đào với hương thơm tinh tế và hoàn toàn tự nhiên, cùng nền trà đen đậm vị khó quên. Trà túi lọc Tearoma tiện lợi để sử dụng tại văn phòng, tại nhà,.. nhưng vẫn đảm bảo được chất lượng về hương trà tinh tế, vị trà đậm đà.\r\n\r\n', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `product` int NOT NULL,
  `size` int NOT NULL,
  `topping` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`product`, `size`, `topping`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 1, 5),
(1, 1, 6),
(2, 1, 1),
(2, 1, 2),
(2, 1, 3),
(2, 1, 4),
(2, 1, 5),
(2, 1, 6),
(3, 1, 1),
(3, 1, 2),
(3, 1, 3),
(3, 1, 4),
(3, 1, 5),
(4, 1, 1),
(4, 1, 2),
(4, 1, 3),
(4, 1, 4),
(4, 1, 5),
(5, 1, 1),
(5, 1, 2),
(5, 1, 3),
(5, 1, 4),
(5, 1, 5),
(7, 1, 1),
(7, 1, 2),
(7, 1, 3),
(7, 1, 4),
(7, 1, 5),
(9, 1, 1),
(9, 1, 2),
(9, 1, 3),
(9, 1, 4),
(9, 1, 5),
(12, 1, 1),
(12, 1, 2),
(12, 1, 3),
(12, 1, 4),
(12, 1, 5),
(13, 1, 1),
(13, 1, 2),
(13, 1, 3),
(13, 1, 4),
(13, 1, 5),
(14, 1, 1),
(14, 1, 2),
(14, 1, 3),
(14, 1, 4),
(14, 1, 5),
(15, 1, 1),
(15, 1, 2),
(15, 1, 3),
(15, 1, 4),
(15, 1, 5),
(16, 1, 1),
(16, 1, 2),
(16, 1, 3),
(16, 1, 4),
(16, 1, 5),
(17, 1, 1),
(17, 1, 2),
(17, 1, 3),
(17, 1, 4),
(17, 1, 5),
(18, 1, 1),
(18, 1, 2),
(18, 1, 3),
(18, 1, 4),
(18, 1, 5),
(19, 1, 1),
(19, 1, 2),
(19, 1, 3),
(19, 1, 4),
(19, 1, 5),
(20, 1, 1),
(20, 1, 2),
(20, 1, 3),
(20, 1, 4),
(20, 1, 5),
(22, 1, 1),
(22, 1, 2),
(22, 1, 3),
(22, 1, 4),
(22, 1, 5),
(23, 1, 1),
(23, 1, 2),
(23, 1, 4),
(23, 1, 5),
(24, 1, 1),
(24, 1, 2),
(24, 1, 4),
(24, 1, 5),
(25, 1, 1),
(25, 1, 2),
(25, 1, 4),
(25, 1, 5),
(26, 1, 5),
(26, 1, 7),
(26, 1, 8),
(26, 1, 9),
(26, 1, 10),
(27, 1, 4),
(27, 1, 5),
(27, 1, 7),
(27, 1, 8),
(27, 1, 9),
(27, 1, 10),
(31, 1, 4),
(31, 1, 5),
(31, 1, 7),
(31, 1, 8),
(31, 1, 9),
(31, 1, 10),
(31, 1, 11),
(38, 1, 1),
(38, 1, 3),
(38, 1, 4),
(38, 1, 5),
(38, 1, 8),
(39, 1, 1),
(39, 1, 3),
(39, 1, 4),
(39, 1, 5),
(39, 1, 8),
(41, 1, 1),
(41, 1, 3),
(41, 1, 4),
(41, 1, 5),
(41, 1, 8),
(43, 1, 1),
(43, 1, 3),
(43, 1, 4),
(43, 1, 5),
(43, 1, 8),
(47, 1, 1),
(47, 1, 2),
(47, 1, 3),
(47, 1, 4),
(47, 1, 5),
(47, 1, 7),
(47, 1, 8),
(47, 1, 9),
(47, 1, 10),
(47, 1, 11),
(48, 1, 1),
(48, 1, 2),
(48, 1, 3),
(48, 1, 4),
(48, 1, 5),
(48, 1, 7),
(48, 1, 8),
(48, 1, 9),
(48, 1, 10),
(48, 1, 11),
(49, 1, 1),
(49, 1, 2),
(49, 1, 3),
(49, 1, 4),
(49, 1, 5),
(49, 1, 7),
(49, 1, 8),
(49, 1, 9),
(49, 1, 10),
(49, 1, 11),
(50, 1, 1),
(50, 1, 2),
(50, 1, 3),
(50, 1, 4),
(50, 1, 5),
(50, 1, 7),
(50, 1, 8),
(50, 1, 9),
(50, 1, 10),
(50, 1, 11),
(51, 1, 1),
(51, 1, 2),
(51, 1, 3),
(51, 1, 4),
(51, 1, 5),
(51, 1, 7),
(51, 1, 8),
(51, 1, 9),
(51, 1, 10),
(51, 1, 11),
(52, 1, 1),
(52, 1, 2),
(52, 1, 3),
(52, 1, 4),
(52, 1, 5),
(52, 1, 7),
(52, 1, 8),
(52, 1, 9),
(52, 1, 10),
(52, 1, 11),
(55, 1, 4),
(55, 1, 7),
(55, 1, 8),
(55, 1, 9),
(55, 1, 10),
(55, 1, 11),
(56, 1, 4),
(56, 1, 7),
(56, 1, 8),
(56, 1, 9),
(56, 1, 10),
(56, 1, 11),
(57, 1, 4),
(57, 1, 7),
(57, 1, 8),
(57, 1, 9),
(57, 1, 10),
(57, 1, 11),
(58, 1, 4),
(58, 1, 7),
(58, 1, 8),
(58, 1, 9),
(58, 1, 10),
(58, 1, 11),
(59, 1, 4),
(59, 1, 7),
(59, 1, 8),
(59, 1, 9),
(59, 1, 10),
(59, 1, 11),
(60, 1, 4),
(60, 1, 7),
(60, 1, 8),
(60, 1, 9),
(60, 1, 10),
(60, 1, 11),
(61, 1, 4),
(61, 1, 7),
(61, 1, 8),
(61, 1, 9),
(61, 1, 10),
(61, 1, 11),
(62, 1, 1),
(62, 1, 3),
(62, 1, 4),
(62, 1, 5),
(63, 1, 1),
(63, 1, 3),
(63, 1, 4),
(63, 1, 5),
(64, 1, 1),
(64, 1, 3),
(64, 1, 4),
(64, 1, 5),
(65, 1, 1),
(65, 1, 3),
(65, 1, 4),
(65, 1, 5),
(67, 1, 100),
(68, 1, 100),
(69, 1, 100),
(70, 1, 100),
(71, 1, 100),
(3, 2, 1),
(3, 2, 2),
(3, 2, 3),
(3, 2, 4),
(3, 2, 5),
(47, 2, 1),
(47, 2, 2),
(47, 2, 3),
(47, 2, 4),
(47, 2, 5),
(47, 2, 7),
(47, 2, 8),
(47, 2, 9),
(47, 2, 10),
(47, 2, 11),
(48, 2, 1),
(48, 2, 2),
(48, 2, 3),
(48, 2, 4),
(48, 2, 5),
(48, 2, 7),
(48, 2, 8),
(48, 2, 9),
(48, 2, 10),
(48, 2, 11),
(49, 2, 1),
(49, 2, 2),
(49, 2, 3),
(49, 2, 4),
(49, 2, 5),
(49, 2, 7),
(49, 2, 8),
(49, 2, 9),
(49, 2, 10),
(49, 2, 11),
(62, 2, 1),
(62, 2, 3),
(62, 2, 4),
(62, 2, 5),
(12, 3, 1),
(12, 3, 2),
(12, 3, 3),
(12, 3, 4),
(12, 3, 5),
(13, 3, 1),
(13, 3, 2),
(13, 3, 3),
(13, 3, 4),
(13, 3, 5),
(14, 3, 1),
(14, 3, 2),
(14, 3, 3),
(14, 3, 4),
(14, 3, 5),
(15, 3, 1),
(15, 3, 2),
(15, 3, 3),
(15, 3, 4),
(15, 3, 5),
(16, 3, 1),
(16, 3, 2),
(16, 3, 3),
(16, 3, 4),
(16, 3, 5),
(17, 3, 1),
(17, 3, 2),
(17, 3, 3),
(17, 3, 4),
(17, 3, 5),
(18, 3, 1),
(18, 3, 2),
(18, 3, 3),
(18, 3, 4),
(18, 3, 5),
(19, 3, 1),
(19, 3, 2),
(19, 3, 3),
(19, 3, 4),
(19, 3, 5),
(20, 3, 1),
(20, 3, 2),
(20, 3, 3),
(20, 3, 4),
(20, 3, 5),
(22, 3, 1),
(22, 3, 2),
(22, 3, 3),
(22, 3, 4),
(22, 3, 5),
(25, 3, 1),
(25, 3, 2),
(25, 3, 4),
(25, 3, 5),
(38, 3, 1),
(38, 3, 3),
(38, 3, 4),
(38, 3, 5),
(38, 3, 8),
(39, 3, 1),
(39, 3, 3),
(39, 3, 4),
(39, 3, 5),
(39, 3, 8),
(41, 3, 1),
(41, 3, 3),
(41, 3, 4),
(41, 3, 5),
(41, 3, 8),
(43, 3, 1),
(43, 3, 3),
(43, 3, 4),
(43, 3, 5),
(43, 3, 8),
(63, 3, 1),
(63, 3, 3),
(63, 3, 4),
(63, 3, 5),
(1, 4, 1),
(1, 4, 2),
(1, 4, 3),
(1, 4, 4),
(1, 4, 5),
(1, 4, 6),
(2, 4, 1),
(2, 4, 2),
(2, 4, 3),
(2, 4, 4),
(2, 4, 5),
(2, 4, 6),
(4, 4, 1),
(4, 4, 2),
(4, 4, 3),
(4, 4, 4),
(4, 4, 5),
(50, 4, 1),
(50, 4, 2),
(50, 4, 3),
(50, 4, 4),
(50, 4, 5),
(50, 4, 7),
(50, 4, 8),
(50, 4, 9),
(50, 4, 10),
(50, 4, 11),
(51, 4, 1),
(51, 4, 2),
(51, 4, 3),
(51, 4, 4),
(51, 4, 5),
(51, 4, 7),
(51, 4, 8),
(51, 4, 9),
(51, 4, 10),
(51, 4, 11),
(52, 4, 1),
(52, 4, 2),
(52, 4, 3),
(52, 4, 4),
(52, 4, 5),
(52, 4, 7),
(52, 4, 8),
(52, 4, 9),
(52, 4, 10),
(52, 4, 11),
(55, 4, 4),
(55, 4, 7),
(55, 4, 8),
(55, 4, 9),
(55, 4, 10),
(55, 4, 11),
(56, 4, 4),
(56, 4, 7),
(56, 4, 8),
(56, 4, 9),
(56, 4, 10),
(56, 4, 11),
(61, 4, 4),
(61, 4, 7),
(61, 4, 8),
(61, 4, 9),
(61, 4, 10),
(61, 4, 11),
(65, 4, 1),
(65, 4, 3),
(65, 4, 4),
(65, 4, 5),
(23, 5, 1),
(23, 5, 2),
(23, 5, 4),
(23, 5, 5),
(24, 5, 1),
(24, 5, 2),
(24, 5, 4),
(24, 5, 5),
(5, 6, 1),
(5, 6, 2),
(5, 6, 3),
(5, 6, 4),
(5, 6, 5),
(7, 6, 1),
(7, 6, 2),
(7, 6, 3),
(7, 6, 4),
(7, 6, 5),
(9, 6, 1),
(9, 6, 2),
(9, 6, 3),
(9, 6, 4),
(9, 6, 5),
(26, 6, 5),
(26, 6, 7),
(26, 6, 8),
(26, 6, 9),
(26, 6, 10),
(27, 6, 4),
(27, 6, 5),
(27, 6, 7),
(27, 6, 8),
(27, 6, 9),
(27, 6, 10),
(31, 6, 4),
(31, 6, 5),
(31, 6, 7),
(31, 6, 8),
(31, 6, 9),
(31, 6, 10),
(31, 6, 11),
(3, 7, 1),
(3, 7, 2),
(3, 7, 3),
(3, 7, 4),
(3, 7, 5),
(4, 7, 1),
(4, 7, 2),
(4, 7, 3),
(4, 7, 4),
(4, 7, 5),
(47, 7, 1),
(47, 7, 2),
(47, 7, 3),
(47, 7, 4),
(47, 7, 5),
(47, 7, 7),
(47, 7, 8),
(47, 7, 9),
(47, 7, 10),
(47, 7, 11),
(48, 7, 1),
(48, 7, 2),
(48, 7, 3),
(48, 7, 4),
(48, 7, 5),
(48, 7, 7),
(48, 7, 8),
(48, 7, 9),
(48, 7, 10),
(48, 7, 11),
(49, 7, 1),
(49, 7, 2),
(49, 7, 3),
(49, 7, 4),
(49, 7, 5),
(49, 7, 7),
(49, 7, 8),
(49, 7, 9),
(49, 7, 10),
(49, 7, 11),
(50, 7, 1),
(50, 7, 2),
(50, 7, 3),
(50, 7, 4),
(50, 7, 5),
(50, 7, 7),
(50, 7, 8),
(50, 7, 9),
(50, 7, 10),
(50, 7, 11),
(51, 7, 1),
(51, 7, 2),
(51, 7, 3),
(51, 7, 4),
(51, 7, 5),
(51, 7, 7),
(51, 7, 8),
(51, 7, 9),
(51, 7, 10),
(51, 7, 11),
(52, 7, 1),
(52, 7, 2),
(52, 7, 3),
(52, 7, 4),
(52, 7, 5),
(52, 7, 7),
(52, 7, 8),
(52, 7, 9),
(52, 7, 10),
(52, 7, 11),
(55, 7, 4),
(55, 7, 7),
(55, 7, 8),
(55, 7, 9),
(55, 7, 10),
(55, 7, 11),
(56, 7, 4),
(56, 7, 7),
(56, 7, 8),
(56, 7, 9),
(56, 7, 10),
(56, 7, 11),
(57, 7, 4),
(57, 7, 7),
(57, 7, 8),
(57, 7, 9),
(57, 7, 10),
(57, 7, 11),
(58, 7, 4),
(58, 7, 7),
(58, 7, 8),
(58, 7, 9),
(58, 7, 10),
(58, 7, 11),
(59, 7, 4),
(59, 7, 7),
(59, 7, 8),
(59, 7, 9),
(59, 7, 10),
(59, 7, 11),
(60, 7, 4),
(60, 7, 7),
(60, 7, 8),
(60, 7, 9),
(60, 7, 10),
(60, 7, 11),
(62, 7, 1),
(62, 7, 3),
(62, 7, 4),
(62, 7, 5),
(64, 7, 1),
(64, 7, 3),
(64, 7, 4),
(64, 7, 5),
(65, 7, 1),
(65, 7, 3),
(65, 7, 4),
(65, 7, 5),
(67, 7, 100),
(68, 7, 100),
(69, 7, 100),
(70, 7, 100),
(71, 7, 100),
(64, 8, 1),
(64, 8, 3),
(64, 8, 4),
(64, 8, 5),
(67, 8, 100),
(1, 9, 2),
(1, 9, 3),
(1, 9, 4),
(1, 9, 5),
(1, 9, 6),
(2, 9, 2),
(2, 9, 3),
(2, 9, 4),
(2, 9, 5),
(2, 9, 6),
(5, 9, 2),
(5, 9, 3),
(5, 9, 4),
(5, 9, 5),
(7, 9, 2),
(7, 9, 3),
(7, 9, 4),
(7, 9, 5),
(9, 9, 2),
(9, 9, 3),
(9, 9, 4),
(9, 9, 5),
(26, 9, 5),
(26, 9, 7),
(26, 9, 8),
(26, 9, 9),
(26, 9, 10),
(27, 9, 4),
(27, 9, 5),
(27, 9, 7),
(27, 9, 8),
(27, 9, 9),
(27, 9, 10),
(31, 9, 4),
(31, 9, 5),
(31, 9, 7),
(31, 9, 8),
(31, 9, 9),
(31, 9, 10),
(31, 9, 11),
(57, 9, 4),
(57, 9, 7),
(57, 9, 8),
(57, 9, 9),
(57, 9, 10),
(57, 9, 11),
(58, 9, 4),
(58, 9, 7),
(58, 9, 8),
(58, 9, 9),
(58, 9, 10),
(58, 9, 11),
(59, 9, 4),
(59, 9, 7),
(59, 9, 8),
(59, 9, 9),
(59, 9, 10),
(59, 9, 11),
(60, 9, 4),
(60, 9, 7),
(60, 9, 8),
(60, 9, 9),
(60, 9, 10),
(60, 9, 11),
(6, 100, 1),
(6, 100, 2),
(6, 100, 3),
(6, 100, 4),
(6, 100, 5),
(8, 100, 1),
(8, 100, 2),
(8, 100, 3),
(8, 100, 4),
(8, 100, 5),
(10, 100, 1),
(10, 100, 2),
(10, 100, 3),
(10, 100, 4),
(10, 100, 5),
(11, 100, 1),
(11, 100, 2),
(11, 100, 4),
(11, 100, 5),
(21, 100, 1),
(21, 100, 2),
(21, 100, 3),
(21, 100, 4),
(21, 100, 5),
(28, 100, 4),
(28, 100, 5),
(28, 100, 7),
(28, 100, 8),
(28, 100, 9),
(28, 100, 10),
(29, 100, 4),
(29, 100, 5),
(29, 100, 7),
(29, 100, 8),
(29, 100, 9),
(29, 100, 10),
(30, 100, 4),
(30, 100, 5),
(30, 100, 7),
(30, 100, 8),
(30, 100, 9),
(30, 100, 10),
(40, 100, 1),
(40, 100, 3),
(40, 100, 4),
(40, 100, 5),
(40, 100, 8),
(42, 100, 1),
(42, 100, 3),
(42, 100, 4),
(42, 100, 5),
(42, 100, 8),
(44, 100, 1),
(44, 100, 4),
(44, 100, 5),
(45, 100, 1),
(45, 100, 2),
(45, 100, 3),
(45, 100, 4),
(45, 100, 5),
(45, 100, 7),
(45, 100, 8),
(45, 100, 9),
(45, 100, 10),
(45, 100, 11),
(46, 100, 1),
(46, 100, 2),
(46, 100, 3),
(46, 100, 4),
(46, 100, 5),
(46, 100, 7),
(46, 100, 8),
(46, 100, 9),
(46, 100, 10),
(46, 100, 11),
(53, 100, 1),
(53, 100, 2),
(53, 100, 3),
(53, 100, 4),
(53, 100, 5),
(53, 100, 7),
(53, 100, 8),
(53, 100, 9),
(53, 100, 10),
(53, 100, 11),
(54, 100, 1),
(54, 100, 2),
(54, 100, 3),
(54, 100, 4),
(54, 100, 5),
(54, 100, 7),
(54, 100, 8),
(54, 100, 9),
(54, 100, 10),
(54, 100, 11),
(66, 100, 4),
(66, 100, 5),
(72, 100, 100),
(73, 100, 100),
(74, 100, 100),
(75, 100, 100),
(76, 100, 100),
(77, 100, 100),
(78, 100, 100),
(79, 100, 100),
(80, 100, 100),
(81, 100, 100),
(82, 100, 100),
(83, 100, 100),
(84, 100, 100),
(85, 100, 100),
(86, 100, 100),
(87, 100, 100),
(88, 100, 100),
(89, 100, 100),
(90, 100, 100),
(91, 100, 100),
(92, 100, 100),
(93, 100, 100),
(94, 100, 100),
(95, 100, 100),
(96, 100, 100),
(97, 100, 100),
(98, 100, 100),
(99, 100, 100),
(100, 100, 100),
(101, 100, 100),
(102, 100, 100),
(103, 100, 100),
(104, 100, 100),
(105, 100, 100),
(106, 100, 100),
(107, 100, 100),
(108, 100, 100),
(109, 100, 100),
(110, 100, 100),
(111, 100, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description_name` varchar(50) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `name`, `description_name`, `price`) VALUES
(1, 'Nhỏ 0', 'Nhỏ', 0),
(2, 'Vừa 4', 'Vừa', 4000),
(3, 'Lớn 4', 'Lớn', 4000),
(4, 'Vừa 6', 'Vừa', 6000),
(5, 'Lớn 6', 'Lớn', 6000),
(6, 'Vừa 10', 'Vừa', 10000),
(7, 'Lớn 10', 'Lớn', 10000),
(8, 'Lớn 14', 'Lớn', 14000),
(9, 'Lớn 16', 'Lớn', 16000),
(100, 'Vừa 0', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topping`
--

CREATE TABLE `topping` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `topping`
--

INSERT INTO `topping` (`id`, `name`, `price`) VALUES
(1, 'Shot Espresso', 10000),
(2, 'Sốt Caramel', 10000),
(3, 'Thạch Cà Phê', 10000),
(4, 'Trân Châu Trắng\r\n', 10000),
(5, 'Kem Phô Mai Macchiato', 10000),
(6, 'Bánh Flan', 15000),
(7, 'Đào Miếng', 10000),
(8, 'Thạch Oolong Nướng\r\n', 10000),
(9, 'Trái Vải\r\n', 10000),
(10, 'Hạt Sen\r\n', 10000),
(11, 'Trái Nhãn\r\n', 10000),
(100, 'Không có', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `fullname` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `avatar` varchar(200) NOT NULL DEFAULT 'avatar_default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `phone`, `address`, `password`, `email`, `status`, `avatar`) VALUES
(2, 'Đặng Châu Trường Phước', '0856033726', '43v Cư xá phú lâm D', '1379fcb809308659862f180c89d95686', 'truongphuoc442001@gmail.com', 0, '1703663420_9962.jpg'),
(3, 'Đặng Châu Trường Phước', '0856033727', '43v Cư xá phú lâm D', 'f5100501b826bb4429d26271506d56b7', 'truongphuoc4420011@gmail.com', 0, 'avatar_default.png'),
(4, 'Lan Trinh', '0981125546', '205/18b1', '81e36630f95d38428734e2b015cd8259', 'lantrinh7a8@gmail.com', 0, 'avatar_default.png'),
(5, 'Đặng Châu Trường Phước', '0856033701', '43v Cư xá phú lâm D', 'f5100501b826bb4429d26271506d56b7', 'phuoc001@gmail.com', 0, 'avatar_default.png'),
(6, 'Trường Phước', '0909236232', '43v Cư aaaaaaa', 'f5100501b826bb4429d26271506d56b7', 'ahavyvy@gmail.com', 0, '1708515616_2442.jpg'),
(10, 'Đặng Châu Trường Phước', '0856033700', '43v Cư xá phú lâm D', 'f5100501b826bb4429d26271506d56b7', 'kieulinda199@gmail.com', 0, '1708233784_8712.jpg'),
(11, 'Đặng Châu Trường Phước', '0856033798', '43v Cư xá phú lâm D', 'f5100501b826bb4429d26271506d56b7', 'loandothi69@gmail.com', 0, '1708484843_6937.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id` int NOT NULL,
  `code` varchar(20) NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id`, `code`, `discount`) VALUES
(1, 'GIAM5', 5),
(2, 'GIAM10', 10);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD UNIQUE KEY `phone` (`phone`) USING BTREE;

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`,`product_id`,`size_id`,`topping_id`,`quantity`,`user_id`) USING BTREE,
  ADD KEY `FK_cart_size` (`size_id`),
  ADD KEY `FK_cart_user` (`user_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE;

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_menu` (`category_type`);

--
-- Chỉ mục cho bảng `chuyennha`
--
ALTER TABLE `chuyennha`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_user` (`user_id`),
  ADD KEY `FK_comment_product` (`product_id`);

--
-- Chỉ mục cho bảng `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_content_type` (`type`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_payment_method` (`payment_method`),
  ADD KEY `FK_status` (`status`),
  ADD KEY `FK_user` (`user_id`),
  ADD KEY `FK_voucher` (`voucher_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_id`,`size_id`,`topping_id`,`quantity`),
  ADD KEY `FK_order_detail_product` (`product_id`),
  ADD KEY `FK_order_detail_size` (`size_id`);

--
-- Chỉ mục cho bảng `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_type` (`product_type`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`product`,`size`,`topping`) USING BTREE,
  ADD KEY `FK_size` (`size`),
  ADD KEY `FK_topping` (`topping`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`,`product_id`,`user_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `chuyennha`
--
ALTER TABLE `chuyennha`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `content`
--
ALTER TABLE `content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `topping`
--
ALTER TABLE `topping`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_cart_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_cart_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_cart_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_menu` FOREIGN KEY (`category_type`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `FK_content_type` FOREIGN KEY (`type`) REFERENCES `chuyennha` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_payment_method` FOREIGN KEY (`payment_method`) REFERENCES `payment_method` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_status` FOREIGN KEY (`status`) REFERENCES `order_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_voucher` FOREIGN KEY (`voucher_id`) REFERENCES `voucher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_order_detail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_order_detail_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_type` FOREIGN KEY (`product_type`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `FK_product` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_size` FOREIGN KEY (`size`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_topping` FOREIGN KEY (`topping`) REFERENCES `topping` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
