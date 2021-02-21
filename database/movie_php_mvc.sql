-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 05:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie.php.mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `user_id`) VALUES
(4, 'Phim kinh dị', 'Phim kinh dị', 0, 1),
(5, 'Phim tình cảm', 'Đây là phim tình cảm', 0, 1),
(7, 'Phim Hoạt hình', 'Đây là tổng hợp phim hoạt hình', 0, 1),
(9, 'Doremon truyện ngắn', '', 7, 1),
(10, 'Doremon truyện dài', '', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` tinyint(4) DEFAULT 0 COMMENT '0-movie\n1-tv series ',
  `category_id` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `description`, `user_id`, `image`, `type`, `category_id`, `slug`) VALUES
(1, 'Iron Man', '', 1, '/publics/storage/image/1613835910.jpg', 0, 0, 'iron-man1613835910'),
(2, 'Iron Man 3', '', 1, NULL, 0, 5, 'iron-man-3'),
(4, 'Nobita Và Người Khổng Lồ Xanh', 'Doraemon: Nobita và người khổng lồ xanh (ドラえもん のび太と緑の巨人伝 Doraemon Nobita to Midori no Kyojinden?) là phim khoa học viễn tưởng 2008 của đạo diễn Watanabe Ayumu và là bộ phim điện ảnh thứ 28 trong loạt phim Doraemon. Nội dung phim là chuyến phiêu lưu thú vị của Nobita và những người bạn đến hành tinh thực vật đến việc chống lại âm mưu thôn tính địa cầu của một vài lãnh đạo cấp cao hành tinh có suy nghĩ lệch lạc về người Trái Đất. Trước khi công chiếu chính thức vào ngày 8 tháng 3 năm 2008 toàn bộ nội dung tác phẩm được truyền tải thành truyện tranh đăng trên tạp chí CoroCoro Comic trong tháng 2 và tháng 3 năm 2008. Với doanh thu ước đạt 3.87 tỉ Yên, phim đứng vị trí thứ 8 trong bảng xếp hạng doanh thu Nhật Bản trong năm 2008. Ca khúc mở đầu phim là \"Yume wo Kanaete Doraemon\" (夢をかなえてドラえもん, dịch nghĩa Có Doraemon, giấc mơ thành hiện thực?) do Mao trình bày và ca khúc kết thúc là \"Te o Tsunagō / Ai o Utaō\" (手をつなごう, dịch nghĩa Cùng nhau chung tay?) do Ayaka trình bày. Phim từng được ứng cử cho Giải thưởng Viện hàn lâm Nhật Bản [1]. Sau Nhật Bản, phim được phát hành tại một số quốc gia trên thế giới: Trung Quốc (chiếu rạp 4 tháng 8 năm 2009), Hồng Kông (chiếu rạp 6 tháng 8 năm 2009), Đài Loan (chiếu rạp 7 tháng 8 năm 2009), Indonesia(chiếu rạp 7 tháng 8 năm 2009), Malaysia (chiếu rạp 11 tháng 9 năm 2009), Thái Lan (chiếu rạp 29 tháng 10 năm 2009), Tây Ban Nha (phát hành dưới dạng DVD 11 tháng 11 năm 2009), Bồ Đào Nha (phát sóng truyền hình 1 tháng 3 năm 2015) và Ba Lan (phát sóng truyền hình 18 tháng 10 năm 2015). Tại Việt Nam phiên bản truyện tranh được Nhà xuất bản Kim Đồng ấn hành còn phim được Công ty Cổ phần Truyền thông Trí Việt mua bản quyền phát sóng trên kênh HTV3 vào ngày 27 tháng 9 năm 2013. Bài hát lồng tiếng Việt: mở đầu là \"Doraemon\" do Huyền Chi trình bày và kết thúc là \"Đời cuốn xô ta\" do Nam Hương trình bày.', 1, '/publics/storage/image/1613831967.jpg', 0, 10, 'nobita-va-nguoi-khong-lo-xanh'),
(5, ' Hoạt Hình Doraemon Tiếng Việt Seasion 1', 'Doraemon là một chú mèo máy được Sewashi, cháu năm đời của Nobita gửi từ thế kỷ 22 về quá khứ cho ông mình để giúp đỡ Nobita trở nên tiến bộ và giàu có, tức là cũng sẽ cải thiện hoàn cảnh của con cháu Nobita sau này. Còn ở hiện tại, Nobita là một cậu bé luôn thất bại ở trường học, và sau đó là công ty phá sản, thất bại trong công việc, đẩy gia đình và con cháu sau này vào cảnh nợ nần.\r\n\r\nCác câu chuyện trong Doraemon thường có một chủ đề chung, đó là xoay quanh những rắc rối hay xảy ra với cậu bé Nobita học lớp năm, nhân vật chính thứ nhì của bộ truyện. Doraemon có một chiếc túi thần kỳ trước bụng với đủ loại bảo bối của tương lai. Cốt truyện thường gặp nhất sẽ là Nobita trở về nhà khóc lóc với những rắc rối mà cậu gặp phải ở trường hoặc với bạn bè. Sau khi bị cậu bé van nài hoặc thúc giục, Doraemon sẽ đưa ra một bảo bối giúp Nobita giải quyết những rắc rối của mình, hoặc là để trả đũa hay khoe khoang với bạn bè của cậu. Nobita sẽ lại thường đi quá xa so với dự định ban đầu của Doraemon, thậm chí với những bảo bối mới cậu còn gặp rắc rối lớn hơn trước đó. Đôi khi những người bạn của Nobita, thường là Suneo hoặc Jaian lại lấy trộm những bảo bối và sử dụng chúng không đúng mục đích. Tuy nhiên thường thì ở cuối mỗi câu chuyện, những ai sử dụng sai mục đích bảo bối sẽ phải chịu hậu quả do mình gây ra, và người đọc sẽ rút ra được bài học từ đó.[1]Tuy Jaian và Suneo hay bắt nạt Nobita nhưng hai cậu ấy vẫn giúp đỡ cậu ấy. Nobita tuy học không giỏi, yếu đuối, chỉ dựa vào Doraemon,... Nhưng mặt tốt của Nobita rất tốt bụng và luôn hiểu đến cảm giác của mọi người.', 1, '/publics/storage/image/1613837883.jpg', 1, 9, 'hoat-hinh-doraemon-tieng-viet-seasion-11613837896'),
(6, 'Hoạt Hình Doraemon Tiếng Việt Seasion 2', 'Doraemon là một chú mèo máy được Sewashi, cháu năm đời của Nobita gửi từ thế kỷ 22 về quá khứ cho ông mình để giúp đỡ Nobita trở nên tiến bộ và giàu có, tức là cũng sẽ cải thiện hoàn cảnh của con cháu Nobita sau này. Còn ở hiện tại, Nobita là một cậu bé luôn thất bại ở trường học, và sau đó là công ty phá sản, thất bại trong công việc, đẩy gia đình và con cháu sau này vào cảnh nợ nần.\r\n', 1, '/publics/storage/image/1613842220.jpg', 1, 9, 'hoat-hinh-doraemon-tieng-viet-seasion-21613842231');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `source` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `movie_id`, `description`, `source`, `user_id`) VALUES
(1, 'Doremon Truyện Dài - Nobita Và Người Khổng Lồ Xanh - Hoạt Hình Tiếng Việt', 4, NULL, 'https://www.youtube.com/embed/diq3Jt8hzHc', 1),
(2, '[S1] Doraemon tập 1 - Tàu Ngầm Giấy, Bình Chứa Gas Làm Đông Mây', 5, '', 'https://www.youtube.com/embed/qdwBUUbSGKI', 1),
(3, '[S1] Doraemon tập 2 - Chất Lỏng Phục Hồi Nguyên Trạng, Thuốc Xịt Kiểm Tra Dấu Chân', 5, NULL, 'https://www.youtube.com/embed/qprvsDm1ZMQ', 1),
(4, '[S2] Doraemon tập 1 - Thỏi Son VIP, Valentine Của Jaiko', 6, NULL, 'https://www.youtube.com/embed/6mGj2uRTzxg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
