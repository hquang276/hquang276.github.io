-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2023 lúc 05:03 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_sach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(50) NOT NULL,
  `admin_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_user`, `password`, `email`, `name`) VALUES
(1, 'admin1', 'admin1', 'admin1@gmail.com', 'admin1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` varchar(10) NOT NULL,
  `name_book` varchar(50) NOT NULL,
  `name_author` varchar(50) NOT NULL,
  `soluong` int(20) NOT NULL,
  `prices` int(20) NOT NULL,
  `img` varchar(200) NOT NULL,
  `info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `name_book`, `name_author`, `soluong`, `prices`, `img`, `info`) VALUES
('s01 ', 'Đắc Nhân Tâm ', 'Dale Carnegie ', 20, 500000, 's01.png', '- Đắc nhân tâm là quyển sách nổi tiếng nhất, bán chạy nhất và có tầm ảnh hưởng nhất của mọi thời đại. - Đắc Nhân Tâm là nghệ thuật thu phục lòng người, là làm cho tất cả mọi người yêu mến mình. Đắc nhân tâm là cái Tài trong mỗi chúng ta  '),
('s02      ', 'Cách Nghĩ Để Thành Công ', 'Napoleon Hill      ', 13, 500000, 's02.png', '- Cách Nghĩ Để Thành Công là cuốn sách đầu tiên đưa ra triết lý thành đạt- Được viết ra từ vô số những câu chuyện có thật của những người vĩ đại như Edison - nhà phát minh vĩ đại, Henry Ford - người bị coi là không có học vấn nhưng trở thành ông trùm trong nền công nghiệp xe hơi,...      '),
('s03  ', '7 Thói Quen Của Người Thành Đạt   ', 'Steven Covey  ', 5, 50000, 's03.png', 'Giúp người đọc không chỉ hình thành những thói quen sinh hoạt hợp lí mà còn giúp họ trở thành người tốt, sống có ích hơn.  '),
('s04', 'Cha Giàu Cha Nghèo', 'Robert Kiyosaki', 2, 300000, 's04.png', '\"Cha giàu cha nghèo\" kể về hành trình nhận thức về sự giàu có của hai tầng lớp trong xã hội thời bấy giờ. '),
('s05', 'Chúa Tể Của Những Chiếc Nhẫn', 'J.R.R Tolkien', 2, 100000, 's05.png', 'Chiếc nhẫn chúa mang sức mạnh bá chủ vô tình được số phận đưa vào tay chàng hobbit trẻ tuổi Frodo. Khi thầy phù thủy Gandalf phát hiện ra chiếc nhẫn này đã từng thuộc về bạo chúa Sauron, Frodo phải nhận nhiệm vụ mang nhẫn tới khe núi Hủy diệt để tiêu hủy nó.Không đơn độc trong hành trình gian khó, Frodo còn tiếp nhận những người đồng hành thuộc các tộc khác nhau: Legolas tộc Elf; Gimli tộc Dwarf; Aragon, Boromir và ba người bạn Hobbit trung thành…Phim là phần đầu trong bộ ba kinh điển “Chúa tể những chiếc nhẫn”, chuyển thể từ thiên truyện của nhà văn Tolkien.'),
('s06', 'Dế Mèn Phưu Lưu Ký', 'Tô Hoài ', 3, 50000, 's06.png', '\"Dế Mèn phiêu lưu ký\" có thể tạm dịch là\"Ghi chép về cuộc đời trôi dạt của Dế Mèn\" (\"phiêu lưu\" ở đây có nghĩa là \"trôi dạt\", không phải là \"mạo hiểm\" theo cách dùng từ của người Việt Nam).'),
('s07  ', 'Chiếc Lược Ngà   ', 'Nguyễn Quang Sáng  ', 25, 30000, 's07.jpg', 'Truyện ngắn “Chiếc lược ngà” là lời kể của anh Ba về tình cha con sâu sắc giữa ông Sáu và bé Thu. Ông Sáu xa nhà đi lính khi con gái tròn một tuổi. Bé Thu chưa từng gặp ba mà chỉ biết về ba qua tấm ảnh chụp chung với má. Khi trở về nhà thăm gia đình, vì ông Sáu có vết thẹo trên mặt nên bé Thu không nhận ba.  '),
('s08', 'Tắt Đèn ', 'Ngô Tất Tố', 3, 40000, 's08.png', 'Với Tắt Đèn, vị văn học gia tài ba đã dùng nét mực thời đại mà khắc họa hình tượng nhân vật chị Dậu, người phụ nữ nông dân Việt Nam, ở tận đáy xã hội nhưng lại kiên cường, mạnh mẽ cho dù đến cuối cùng thì ánh đèn của cuộc đời chị vẫn chưa một lần được lóe sáng.'),
('s09', 'Truyện Kiều ', 'Nguyễn Du', 3, 60000, 's09.png', 'Tập thơ là câu chuyện về cuộc đời của nàng Kiều, người con gái xinh đẹp, thông minh, tài giỏi. “Hồng nhan bạc phận”, cuộc đời đày đọa Kiều vào kiếp hẩm hiu, rẻ rúng của một kẻ kĩ nữ lầu xanh. Truyện Kiều cho người đọc thấy được cái bất hạnh, trớ trêu của đời người phụ nữ, cũng thấy rõ chất nhân đạo trong từng áng thơ của Nguyễn Du.'),
('s10', 'Số Đỏ', 'Vũ Trọng Phụng', 2, 50000, 's10.png', 'Tiêu biểu nhất có thể kể đến nhân vật Xuân Tóc Đỏ, tên lang thang đầu đường xó chợ có mái tóc đỏ, đỏ như cái mệnh của hắn, từ một tên ba lăng nhăng biết đọc tên thuốc lậu mà lên đời thành danh đốc tờ, rồi được làm con rể cụ Hồng chỉ nhờ “số đỏ”. Hay nói đến chương: “Hạnh phúc của một tang gia”, gia đình có tang mà lại hạnh phúc ư? Chỉ bấy nhiêu cũng đủ khiến người đọc thấy được cái thối nát cả trong xã hội và trong tư tưởng của một phần con người lúc bấy giờ.'),
('s11', 'Những Ngày Thơ Ấu', 'Nguyên Hồng', 2, 40000, 's11.png', 'Là nhà văn của phụ nữ và trẻ em, bằng chính sự đồng cảm của mình, Nguyên Hồng đã chân thực khắc họa lên một viễn cảnh thơ ấu có đủ sung sướng, hạnh phúc và cả cay đắng, khốn cùng. Đồng thời, từ chính sự nhạy cảm, thấu hiểu của bản thân mà nhà văn đã cho người đọc cảm nhận một cách rõ ràng nhất về tình cảm mẫu tử thiêng liêng, hình ảnh đẹp của người phụ nữ và không quên phê phán những hủ tục thối nát đã đày đọa số phận người đàn bà.'),
('s12', 'Vang Bóng Một Thời - Nguyễn Tuân', 'Nguyễn Tuân', 3, 90000, 's12.png', 'Tập truyện ngắn “Vang Bóng Một Thời” của Nguyễn Tuân không còn đơn thuần là những câu chuyện, đó là kí ức, là hoài niệm, là sợi dây gắn kết con người với những thứ xưa cũ đang dần mờ nhạt. Người đọc tìm đến tác phẩm để biết thế nào là văn hóa Việt xưa, để hiểu về dân tộc.'),
('s13', 'Vợ Nhặt ', ' Kim Lân', 4, 60000, 's13.png', 'Kim Lân là cây bút truyện ngắn tài ba, có sở trường chuyên viết về nông thôn và người nông dân lao động. Một trong những tác phẩm văn học Việt Nam được xem là viên ngọc quý của văn học Việt dưới ngòi bút của ông có thể kể đến chính là truyện ngắn “Vợ Nhặt”.'),
('s14', 'Chí Phèo ', ' Nam Cao', 5, 50000, 's14.png', 'Là một nhà văn hiện thực xuất sắc những năm 1940, đồng thời là người “khai hoang” cho nền văn học mới tại Việt Nam, Nam Cao đã để lại cho đời kho báu văn học mang đầy giá trị nhân văn, ý nghĩa và sâu sắc.'),
('s15', 'Làm Đĩ', 'Vũ Trọng Phụng', 6, 89000, 's15.png', 'Tác phẩm là câu chuyện “làm đĩ” của cô Huyền, câu chuyện của cô gái hiền lành nết na vì tính tò mò của tuổi mới lớn về ái tình, về “sự dâm” mà sa cơ lỡ bước, đẩy cô vào con đường trụy lạc. Không đơn thuần là một câu chuyện phiếm, đây là lời cảnh tỉnh, là tầm nhìn sâu rộng của cụ Phụng về “sự dâm”, vấn nạn mại dâm và cả về vấn đề giáo dục giới tính cho đến tận ngày nay.'),
('s16', 'Đời Thừa ', 'Nam Cao', 6, 50000, 's16.png', 'Một tác phẩm văn học Việt Nam nữa cũng thành công không kém của đời văn Nam Cao chính là Đời Thừa. Ở tác phẩm này, ông đã cho người yêu văn biết đến thế nào gọi là đỉnh cao của miêu tả tâm lí nhân vật, thế nào là chất sâu sắc của văn chương.'),
('s17', 'Cánh Đồng Bất Tận', 'Nguyễn Ngọc Tư', 6, 50000, 's17.png', 'Tác phẩm là câu chuyện về cuộc sống lênh đênh của ba cha con ông Tư, cùng người đàn bà tên Sương. Họ là những mảnh đời bất hạnh, hẩm hiu tưởng chừng may mắn nắm lấy được nhau nhưng rồi lại bị chia rẽ đến mãi mãi. Cánh Đồng Bất Tận, một áng văn rất đời, rất thực cho người đọc cảm nhận được từ cái dữ dội, khốc liệt cho đến sự cô độc, tuyệt vọng, mất mát đến tận cùng qua lăng kính của cô gái trẻ.'),
('s18', 'Nhà Giả Kim ', 'Paulo Coelho', 5, 150000, 's18.png', 'Kể về hành trình phiêu lưu đặc sắc của Santiago, một cậu bé nghèo đói chăn cừu ở Tây Ban Nha, với giấc mơ muốn khám phá nhiều địa điểm trên thế giới.\r\nQua hành trình phiêu lưu của Santiago, tác giả muốn truyền đạt đến độc giả một triết lý sâu sắc.'),
('s19', 'Tiểu thuyết Bố Già ', 'Mario Puzo', 4, 250000, 's19.png', 'Câu chuyện trong cuốn sách tập trung vào một gia đình mafia Ý, với nhân vật chính là ông trùm Vito Corleone.\r\nĐiểm đặc biệt của “Bố già” nằm ở việc tác giả diễn tả về Mafia mà không chú trọng nhiều vào ma túy hay cờ bạc, mà thay vào đó tập trung vào những biến cố mà gia đình này phải đối mặt và cách họ vượt qua những khó khăn. '),
('s21', 'Đại Việt Sử Ký Toàn Thư', 'Sưu Tầm', 3, 60000, 's21.png', 'Đại Việt sử ký toàn thư, đôi khi gọi tắt là Toàn thư, là bộ quốc sử viết bằng Hán văn của Việt Nam, viết theo thể biên niên, ghi chép lịch sử Việt Nam từ thời đại truyền thuyết Kinh Dương Vương năm 2879 TCN đến năm 1675 đời vua Lê Gia Tông nhà Hậu Lê.'),
('s22', 'Việt Nam Sử Lược', 'Trần Trọng Kim', 3, 40000, 's22.png', 'Đây là cuốn sách sử Việt đầu tiên thoát khỏi truyền thống viết sử theo lối biên niên, cương mục, ngôn từ khó hiểu của sách sử Việt thời phong kiến, nên được rất nhiều độc giả đón nhận. Tuy nhiên, về mặt chuyên môn, do biên soạn trong thời gian quá ngắn, lại chỉ do một mình Trần Trọng Kim biên soạn nên sách cũng có nhiều chi tiết sai sót, gây hiểu lầm cho người đọc.'),
('s23', 'Nam Phương - Hoàng hậu cuối cùng ', 'Lý Nhân Phan Thứ Lang', 6, 63000, 's23.png', 'Cuộc đời Hoàng hậu Nam Phương vẫn còn nhiều bí ẩn đối với người dân Việt Nam. Sau khi vua Bảo Đại thoái vị, từ bậc mẫu nghi thiên hạ, Nam Phương trở thành một người vợ, một người mẹ như bao người phụ nữ Việt Nam khác, sống vì chồng vì con. Bà được xem là người phụ nữ đẹp nhất nước ta lúc bấy giờ, nhưng chồng Bà - ông Cố vấn Vĩnh Thụy, tức vua Bảo Đại sau khi thoái vị - rất đa tình, da díu với nhiều người phụ nữ khác, Bà rất buồn nhưng cố giấu nỗi hờn ghen để giữ uy tín cho chồng.'),
('s24', 'Tôi Tài Giỏi Bạn Cũng Thế ', 'Daniel Coyle', 6, 65000, 's24.png', 'Cuốn sách “Tôi tài giỏi, bạn cũng thế” được xem là những cuốn sách về kỹ năng sống hay nhất đã thu hút sự quan tâm của nhiều người quan tâm đến việc phát triển bản thân, đặc biệt là các vận động viên, nghệ sĩ, nhà nghiên cứu và giáo dục. Nó cung cấp cái nhìn sâu sắc về quá trình phát triển tài năng và kỹ năng, và tạo ra sự truyền cảm hứng cho mọi người để nỗ lực và rèn luyện để trở nên xuất sắc trong lĩnh vực của mình.'),
('s25', 'Tam Quốc Diễn Nghĩa ', 'La Quán Trung', 6, 150000, 's25.png', 'Truyện lấy bối cảnh vào thời kỳ suy vi của nhà Hán khi mà những hoàng đế cuối cùng của triều đại này quá tin dùng giới hoạn quan mà gạt bỏ những bề tôi trung trực. Triều chính ngày càng bê tha, hư nát, khiến kinh tế khủng hoảng và đời sống người dân trở nên cơ cực. Đến đời Hán Linh Đế, loạn giặc Khăn Vàng nổ ra do Trương Giác, một người đã học được nhiều ma thuật và bùa phép chữa bệnh, cầm đầu. Sau đó là cuộc hội ngộ giữa ba nhân vật Lưu Bị, Quan Vũ và Trương Phi, cả ba người đều muốn dẹp loạn yên dân nên đã kết nghĩa huynh đệ với nhau ở vườn đào.'),
('s26', 'Tây Du Ký ', 'Ngô Thừa Ân ', 5, 80000, 's26.png', 'Bộ phim kể lại cuộc đời của nhà văn Ngô Thừa Ân (thời Minh) và quá trình sáng tác tác phẩm Tây du ký. Nhiều hình ảnh của phim Tây du ký 1986 và phần hai năm 2000 được sử dụng lại xen kẽ với các phần mới dựng minh họa cho quá trình sáng tạo tác phẩm, trong trí tưởng tượng của Ngô Thừa Ân và các nhân vật xung quanh ông. Theo tiểu sử, Ngô Thừa Ân có hai người vợ là Diệp Vân, Ngưu Ngọc Phụng. Trong cuộc đời, ông trải qua nhiều gian truân và phải đối phó với sự thối nát của quan triều nhà Minh lúc bấy giờ. Mục đích sáng tác Tây du ký của Ngô Thừa Ân nhằm phản ánh xã hội phong kiến đương thời, và đả phá nó, do đó ông gặp rất nhiều trở ngại để hoàn thành tác phẩm.'),
('s27', 'Chiến Thắng Con Quỷ Trong Bạn ', 'Napoleon Hill', 3, 350000, 's27.png', 'Con quỷ trong cuốn sách được xem là một phần con người chúng ta, là những phần xấu xa, bóng tối tồn tại trong chính mỗi người. Nó tự sinh ra và kiểm soát mọi hành động cũng như lý trí để biến con người trở nên thất bại, có những thói quen và hành động xấu.'),
('s28', 'Việc Làng', 'Ngô Tất Tố ', 5, 50000, 's28.png', 'Ra đời cách đây ba phần tư thế kỷ, Phóng sự Việc làng giới thiệu với bạn đọc nhất là thế hệ trẻ và với độc giả ở các vùng miền khác trong cả nước ta về “cuộc đời và con người trong bức tranh làng quê Bắc Bộ”.\r\n\r\nPhóng sự Việc làng chứa đựng một khối lượng kiến thức sâu rộng, được ghi lại rất cụ thể, rành mạch, lôi cuốn bạn đọc đi từ ngạc nhiên này đến bất ngờ khác rất chi tiết về bộ mặt nông thôn với hàng loạt “phong tục, hủ tục” diễn ra liên miên dai dẳng trong đời sống và xã hội dân quê cách đây hơn một thế kỉ.\r\n\r\nViệc làng còn thuật lại các “phong tục” có ý nghĩa tốt đẹp về “sự gắn bó của dân với làng”, về tục “vào ngôi” khi con trẻ ra đời, về lễ nghi khi có người qua đời, về lễ “thượng điền”, về nghệ thuật ẩm thực hoặc một số công việc cần cù trong tập quán làm lúa nước, chăn nuôi gia cầm…'),
('s29', 'Lều Chõng', 'Ngô Tất Tố ', 2, 40000, 's29.png', 'Lều chõng đã thực hiện “một tua du lịch” sinh động, thú vị, giúp các thế hệ hậu sinh, lội ngược dòng thời gian để tiếp cận và khám phá về Lều chõng, khu vực có ý nghĩa đặc biệt, không chỉ là chuyện văn chương, chữ nghĩa mà còn gắn bó mật thiết đến vận mệnh đại sự của quốc gia, đến sự tồn vong, hưng thịnh của đất nước.'),
('s30', 'Tập Án Cái Đình', 'Ngô Tất Tố ', 3, 35000, 's30.png', 'Tập Án Cái Đình là một thiên phóng sự đăng lần đầu tiên trên báo “Con Ong” từ số 18/10/1939. Tập án cái đình viết về những hủ tục ở chốn đình trung, đặc biệt là những lễ nghi phiền phức, hủ bại. Ở đây thiên Phóng sự nghiêng về mặt miêu tả những phong tục, nói cho đúng hơn là những hủ tục kỳ quái được duy trì ở nông thôn. Nó cung cấp được nhiều tài liệu về mặt xã hội học.'),
('s31', 'Bước Đi  Ngẫu Nhiên Trên Phố Walls', 'Sưu Tầm', 32, 129000, '02.jpg', 'Cung cấp lý thuyết và chiến lược đầu tư mới nhất. blue-check Tác giả cung cấp lập luận then chốt và chỉ dẫn chi tiết. blue-check Được đánh giá cao bởi các tờ báo uy tín và nằm trong danh sách \"phải đọc\".'),
('s33', 'Đến Starbucks mua cốc cafe lớn', 'Yoshimoto yoshio', 23, 79000, '03.jpg', '-sách về cafe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `noi_dung_y_kien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `name`, `email`, `img`, `phone`) VALUES
(3, 'user3', 'user3', 'Tạ Quang Phúc', 'user3@gmail.com', '01.jpg', '0705927398'),
(4, 'user1', 'anhnhoem123', 'tao', 'user1@gmail.com', '01.jpg', '0562936485'),
(5, 'user4', 'anhnhoem123', 'tao là bố cái nhóm này', 'user1@gmail.com', '01.jpg', '012345678');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `username` (`username`,`name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
