-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 26, 2024 lúc 10:22 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dkkhoahoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihoc`
--

CREATE TABLE `baihoc` (
  `id` int(255) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sotuvung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trinhdo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baihoc`
--

INSERT INTO `baihoc` (`id`, `image`, `name`, `sotuvung`, `trinhdo`) VALUES
(3, 'gd.jpg', '[A1.1 Bài 5] Gia đình', '16 từ vựng', 'A1'),
(4, 'dovatvanphong.jpg', '[A1.1 Bài 11] Đồ vật văn phòng ', '10 từ vựng', 'A1'),
(5, 'food.jpg', '[A1.1 Bài 17] Thực phẩm', '12 từ vựng', 'A1'),
(6, 'lehoi.jpg', '[A2.1 Bài 1 ] Lễ hội', '16 từ vựng', 'A2'),
(7, 'noithat.jpg', '[A2.2 Bài 2] Nội thất', '13 từ vựng', 'A2'),
(8, 'problem.jpg', '[B1.1 Bài 1] Các Promblem', '10 từ vựng', 'B1'),
(9, 'thoitiet.jpg', '[C. Bài 1] Thời tiết', '15 từ vựng', 'C');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baikiemtra`
--

CREATE TABLE `baikiemtra` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_lesson` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_assignment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baikiemtra`
--

INSERT INTO `baikiemtra` (`id`, `id_level`, `id_lesson`, `name`, `list_assignment`, `duration`) VALUES
(1, 3, 1, 'Test 40 - Lesen - Teil 4', '|3|', 15),
(2, 3, 1, 'Test 40 - Lesen - Teil 5', '|1|', 10),
(3, 1, 1, 'Test 40 - Lesen - Teil 3', '|1|3|', 5),
(4, 4, 2, 'Test 39 - Lesen - Teil 4', '|1|3|', 30),
(5, 1, 1, 'Test 40 - Lesen - Teil 1', '|1|', 20),
(6, 5, 1, 'Test 33 - Lesen - Teil 4', '|3|', 5),
(7, 3, 3, 'Test 40 - Lesen - Teil 12', '|3|1|', 25),
(8, 4, 3, 'Test 31 - Lesen - Teil 4', '|1|', 15),
(9, 5, 2, 'Test 32 - Lesen - Teil 3', '|3|', 25),
(10, 5, 1, 'Test 40 - Lesen - Teil 43', '|3|1|', 25),
(11, 4, 3, 'Test 22 - Lesen - Teil 4', '|1|', 15),
(12, 4, 1, 'Test 40 - Lesen - Teil 11', '|1|', 20),
(13, 2, 1, 'Test 40 - Lesen - Teil 22', '|3|1|', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baithi`
--

CREATE TABLE `baithi` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trinhdo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `name`, `img`, `img_title`, `content`, `author`, `type`) VALUES
(5, 'Tiếng Đức không khó, lời khuyên danh cho người mới bắt đầu', 'blog1.jpg', 'Tiếng Đức không khó', 'Đưa chúng ta tới một ngôn ngữ mới - Tiếng Đức.', 'David', 'TECH'),
(6, '4 phương thức nghe tiếng Đức hiệu quả cho người mới bắt đầu', 'blog2.jpg', '4 phương thức nghe tiếng Đức hiệu quả ', 'Những phương thức dễ học, dễ hiểu, dễ tiếp cận tới mọi người học.', 'Michael', 'LEARN'),
(7, 'Hướng dẫn học tiếng Đức online hiệu quả cho người mới bắt đầu', 'blog3.jpg', 'Hướng dẫn học tiếng Đức online hiệu quả', 'Khóa học Online hấp dẫn cùng nhiều ưu đãi khi đăng ký khóa học.', 'Holly Richardson', 'LEARN'),
(8, 'Du học Đức cần phải chuẩn bị những gì', 'blog4.jpg', 'Du học Đức', 'Những điều cần chuẩn bị trước khi đi du học Đức.', 'Seanne Mcvarish', 'NEWS'),
(9, 'Du học Đức 2022: Tất tần tật điều kiện cần có để du học Đức', 'blog5.jpg', 'Tất tần tật điều kiện cần có để du học Đức', 'Những điều kiện cơ bản cần có khi chúng ta muốn sin visa du học Đức.', 'Nina Neborowsky', 'TECH'),
(10, 'Cơ hội bay ngay đến Đức cho học viên có B1 đủ và B1 thiếu kỹ năng', 'blog6.png', 'Cơ hội bay ngay đến Đức', 'Cơ hội bay ngay đến Đức cho học viên có B1 đủ và B1 thiếu kỹ năng.', 'Chirag Patel', 'NEWS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(22, 'KHÓA LUYỆN THI B1', '2200000', 'klt.png', 1),
(23, 'Khóa học thanh thiếu niên', '700000', 'khttn.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_b` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`id`, `name`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `answer`, `created_at`, `updated_at`) VALUES
(1, '27 Eltern können schriftlich erklären, dass...', 'ihr Kind von einem Betreuer abgeholt werden soll.', 'sie selbst ihr Kind zur Uni bringen.\r\n\r\n', 'ihr Kind selbstständig nach Hause geht.', NULL, 'C', NULL, NULL),
(2, '28 Für das Essen der Kinder ...', 'müssen die Eltern selbst sorgen.', 'zahlen die Eltern wöchentlich eine bestimmte Summe.', 'müssen die Eltern ihren Kindern täglich Geld mitgeben.', NULL, 'B', NULL, NULL),
(4, 'Medikamente...', 'dürfen die Betreuer den Kindern nicht geben.', 'kann man im Notfall im KinderUniBüro bekommen.', 'für Allergiker müssen im KinderUniBüro abgegeben werden.', NULL, 'A', NULL, NULL),
(5, '20 Roswitha', 'Ja', 'Nein', NULL, NULL, 'B', NULL, NULL),
(6, '21 Yvonne', 'Ja', 'Nein', NULL, NULL, 'B', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `debai`
--

CREATE TABLE `debai` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `debai`
--

INSERT INTO `debai` (`id`, `name`, `list_question`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>5. Teil 5: </strong>(Arbeitszeit: 10 Minuten)</p>\r\n\r\n<p>Lesen Sie die Aufgaben 27 bis 30 und den Text dazu. W&auml;hlen Sie bei jeder Aufgabe die richtige L&ouml;sung a, b, oder c.</p>\r\n\r\n<p>Sie lesen die Anmeldeinformationen der SommerKinderUni Graz, weil Sie im Programm der Universit&auml;t interessante Angebote gefunden haben.</p>\r\n\r\n<h3 style=\"text-align:center\"><span style=\"font-size:26px\"><strong>SommerKinderUni</strong></span></h3>\r\n\r\n<h4 style=\"text-align:center\"><span style=\"font-size:24px\"><strong>Anmeldeinformationen</strong></span></h4>\r\n\r\n<p><strong>Aufnahme und Anmeldung:</strong></p>\r\n\r\n<p>Die SommerKinder Uni Graz ist f&uuml;r Kinder bzw. Jugendliche im Alter von 9 bis 15 Jahren empfohlen. Anmeldungen beginnen am 22. Juni. Die Anmeldung ist nur f&uuml;r ganze Wochen &uuml;ber die Homepage der KinderUni Graz m&ouml;glich. Insgesamt werden f&uuml;r die Veranstaltungen (Workshops) bis zu max. 60 Kinder pro Woche aufgenommen.</p>\r\n\r\n<p><strong>&Ouml;ffnungszeiten:</strong></p>\r\n\r\n<p>Die SommerKinderUni Graz ist vom 11. Juli bis zum 29. Juli ge&ouml;ffnet. Die Betreuung ist von Montag bis Freitag von 8.00 bis 17.00 Uhr ganztags m&ouml;glich. Erster gemeinsamer Treffpunkt aller Teilnehmerinnen ist immer Montag fr&uuml;h um 8.15 Uhr im Seminarraum SR 15.03, (Universit&auml;tsstra&szlig;e 15, Erdgescho&szlig;), Karl- Franzens-Universit&auml;t.</p>\r\n\r\n<p><strong>Kosten:</strong></p>\r\n\r\n<p>Pro Woche f&auml;llt eine Verpflegungspauschale in der H&ouml;he von 45,00 &euro; an. Dieser Beitrag wird in bar jeweils am Montag in der Fr&uuml;h, am allgemeinen Treffpunkt SR 15.03, f&uuml;r die laufende Woche eingehoben. Er inkludiert Fr&uuml;hst&uuml;ck, Jause, Mittagessen und Getr&auml;nke.</p>\r\n\r\n<p><strong>Erkrankung/Fernbleiben:</strong></p>\r\n\r\n<p>Erkrankt ein Kind, oder ist es verhindert die Sommer- Kinder Uni Graz zu besuchen, so ist dies umgehend im KinderUniB&uuml;ro bekannt zu geben. Den Betreuerinnen ist es nicht gestattet, Medikamente zu verabreichen. Bei Vorliegen einer Allergie bitten wir Sie, diese bekannt zu geben und entsprechende Notfallsmedikamente zur SommerKinderUni Graz mitzugeben.</p>\r\n\r\n<p><strong>&Uuml;bergabe und Abholung Ihres Kindes:</strong></p>\r\n\r\n<p>Die Eltern haben daf&uuml;r zu sorgen, dass Jugendliche im Alter von 9 bis 15 Jahren von den Eltern selbst oder deren bevollm&auml;chtigten Vertretern ordnungsgem&auml;&szlig; in die Obhut der Betreuerinnen der SommerkinderUni Graz &uuml;bergeben und von dort wieder abgeholt werden. Alleiniges Nach-Hause-Gehen muss von den Eltern im Vorhinein mittels Unterschrift best&auml;tigt werden.</p>', '|1|', NULL, NULL),
(3, '<h3><strong>4. Teil 4:&nbsp;</strong>(Arbeitszeit: 15 Minuten)</h3>\r\n\r\n<p>Lesen Sie die Texte 20 bis 26. W&auml;hlen Sie: Ist die Person&nbsp;<strong><em>f&uuml;r die Einf&uuml;hrung eines Internet-Ausweises?</em></strong></p>\r\n\r\n<p>In einem deutschsprachigen Forum lesen Sie folgende Antworten auf die Frage, ob jeder Internet- Nutzer einen besonderen Ausweis haben sollte, damit Missbrauch des Netzes verhindert wird.</p>\r\n\r\n<p><strong>Beispiel</strong></p>\r\n\r\n<p>0 Kilian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ja&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nein</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:22px\"><strong>Aus einem Internetforum</strong></span></p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Beispiel</strong></p>\r\n\r\n			<p>Ich bin ohne Internet gro&szlig; geworden und vieles, was damit zusammenh&auml;ngt, verstehe ich nicht ganz. Als Mensch und B&uuml;rger wei&szlig; ich aber, dass ich f&uuml;r alles, was ich tue, die Verantwortung trage und dass ich zum Beispiel niemanden ungestraft beleidigen darf. So ein Ausweis w&auml;re also meiner Ansicht nach ein Schritt in die richtige Richtung.</p>\r\n\r\n			<p>Kilian, 61, Wiesbaden</p>\r\n			</td>\r\n			<td>\r\n			<p><strong>23</strong>&nbsp;Bitte nicht noch mehr B&uuml;rokratie! Wenn ich jemanden beleidigen will, wird er mich schon finden. Ich glaube, wir haben schon genug Gesetze, die alles Zwischenmenschliche regeln und Strafen vorsehen. Auch f&uuml;r das Internet d&uuml;rfte es bereits ausreichende Regelungen geben. Ein Ausweis f&uuml;r dessen Nutzung ist meines Erachtens absolut unn&ouml;tig.</p>\r\n\r\n			<p>Jannik, 42, Gelsenkirchen</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><strong>20</strong>&nbsp;Ein Internetausweis w&auml;re die Vorstufe zur totalen Internetkontrolle. Wer keine Kritik mag, hat immer ein Interesse daran, Meinung und Gedanken zu zensieren. Die Gedanken sind aber frei. Das soll so bleiben und ist die einzige Garantie daf&uuml;r, dass man seine Rechte und Freiheiten verteidigen kann.</p>\r\n\r\n			<p>Roswitha, 55, Augsburg</p>\r\n			</td>\r\n			<td>\r\n			<p><strong>24</strong>&nbsp;Ich kann zwar die Rufe nach Meinungsfreiheit gut verstehen, jedoch habe ich starke Zweifel, ob die Anonymit&auml;t im Netz immer von Vorteil ist. Warum sollte man sich im Internet nicht zu seiner Identit&auml;t bekennen, wenn man nichts zu verbergen hat? Nur wer - egal aus welchem Grund- unerkannt bleiben m&ouml;chte, w&auml;re gegen den Internetausweis.</p>\r\n\r\n			<p>Ramona, 46, Braunschweig</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><strong>21</strong>&nbsp;Was ist der eigentliche Zweck dieser Geschichte? Wer offen und deutlich seine Ansichten im Internet pr&auml;sentieren m&ouml;chte, der soll es sich vorher zweimal &uuml;berlegen und vielleicht lieber der Mund halten? Wenn aber die freie Meinungs&auml;u&szlig;erung auf diese Weise kriminalisiert wird, dann sehe ich wirklich schwarz f&uuml;r unsere ach so fortschrittliche Gesellschaft.</p>\r\n\r\n			<p>Yvonne, 34, Aachen</p>\r\n			</td>\r\n			<td>\r\n			<p><strong>25</strong>&nbsp;Diese Diskussion ist v&ouml;llig sinnlos, denn bereits heute kann man jeden am Internet angeschlossenen Rechner anhand der sogenannten &quot;IP-Adresse&quot; identifizieren. Oder will man am Ende in jedem Ger&auml;t auch eine Kamera installieren, damit man sehen kann, wer gerade daran sitzt und arbeitet? Diese Art von Big Brother brauchen wir nicht!</p>\r\n\r\n			<p>Bruno, 29, Chemnitz</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><strong>22&nbsp;</strong>Warum muss denn jeder, der Auto fahren m&ouml;chte, zuerst einmal den F&uuml;hrerschein machen? Doch nur damit er lernt, wie er sich im Stra&szlig;enverkehr zu verhalten hat und bei Verst&ouml;&szlig;en gegen die Stra&szlig;enverkehrsordnung zur Rechenschaft gezogen werden kann. Das finden, denke ich, alle richtig.</p>\r\n\r\n			<p>Dietmar, 57, M&ouml;nchengladbach</p>\r\n			</td>\r\n			<td>\r\n			<p><strong>26&nbsp;</strong>Wie der Name schon sagt, ist das Internet ein internationales Netz. Dass es praktisch der gesamten Menschheit geh&ouml;rt, hat aber nicht zu bedeuten, dass es keinen Gesetzen und Vorschriften folgen muss. Ich w&uuml;rde im Gegenteil f&uuml;r die Einf&uuml;hrung eines internationalen Internetausweises pl&auml;dieren, den jeder zivilisierte Staat seinen B&uuml;rgern ausstellen w&uuml;rde.</p>\r\n\r\n			<p>Patrizia, 39, Kiel</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '|5|6|', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kynang`
--

CREATE TABLE `kynang` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kynang`
--

INSERT INTO `kynang` (`id`, `name`) VALUES
(1, 'Đọc hiểu'),
(2, 'Nghe hiểu'),
(3, 'Từ vựng - Ngữ pháp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `gmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total_products` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `gmail`, `method`, `diachi`, `total_products`, `total_price`) VALUES
(2, 'hongphuongg', '098376588', 'phuong20211663@gmail.com', 'cash on delivery', 'haiphong', 'KHÓA LUYỆN THI B1 (1 )', '2200000'),
(3, 'bang', '094864589', 'bang2003@gmail.com', 'credit cart', 'hanoi', 'KHÓA LUYỆN THI B1 (1 ), Khóa học thanh thiếu niên (1 )', '2900000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ndct_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ndct_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trinhdo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khaigiang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thoigian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sotiethoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hocvien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title3` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `nd`, `ndct_title`, `ndct_text`, `trinhdo`, `khaigiang`, `thoigian`, `sotiethoc`, `hocvien`, `price`, `title1`, `title2`, `title3`) VALUES
(14, 'Khóa học thanh thiếu niên', 'khttn.png', 'Trải nghiệm và thực hành ngôn ngữ một cách tích cực thông qua các trò chơi đóng vai, các bài phỏng vấn hoặc các dự án', 'HỌC TIẾNG ĐỨC THẬT VUI', 'Trong các tiết học định hướng giao tiếp và đa phương tiện của chúng tôi các bạn thanh thiếu niên sẽ nhanh chóng thông thạo các nguyên tắc cơ bản của tiếng Đức. Bên cạnh các bài tập ngữ pháp và từ vựng chúng tôi đặc biệt chú trọng tới các bài tập mang tính', 'A2', '3 tháng / lần', '12 tuần', '2 buổi x 150 phút/buổi', 'Max. 15', '700000', 'Dành cho lứa tuổi 12 đến 15', 'Chủ đề học phù hợp với lứa tuổi', 'Hình thức học tương tác qua trò chơi'),
(15, 'KHÓA LUYỆN THI B1', 'klt.png', 'Ôn tập cụ thể cho các nội dung trong kỳ thi B1', 'HÃY CHUẨN BỊ SẴN SÀNG CHO THÀNH CÔNG CỦA BẠN', 'Trong khóa học này, chúng tôi chuẩn bị cho bạn đạt mục tiêu chứng chỉ B1 được quốc tế công nhận của viện Goethe. Bạn sẽ làm quen với các phần khác nhau của phần thi nói và thi viết dựa trên các bài thi mô phỏng và được luyện cho quen với các kĩ thuật thi ', 'B1', 'Hàng tháng', 'Học trực tuyến | 3 tuần', 'Học trực tuyến | 3 x 120 phút', 'Max. 16', '2200000', 'Học trực tuyến', 'Bài tập hữu ích', 'Chuẩn bị tối ưu cho kỳ thi'),
(16, 'KHÓA HỌC ĐẶC BIỆT', 'khdb.png', 'Practice specific skills', 'HỌC TIẾNG ĐỨC THẬT VUI', 'Trang bị hành trang cho cuộc sống tại Đức', 'C', 'Hàng tuần', '6 tuần', '2 buổi x 150 phút/buổi', 'Max. 10', '1200000', 'Khóa học nhập cư C', 'Trang bị hành trang cho cuộc sống tại Đức', 'Luyện nói');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tk`
--

CREATE TABLE `tk` (
  `id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tk`
--

INSERT INTO `tk` (`id`, `username`, `password`, `phone`, `gmail`, `role`) VALUES
(1, 'Phuong', 'phuong129', '0769600156', 'phuong129@gmail.com', 'admin'),
(2, 'Bang', 'bang2003', '0934294033', 'bang2003@gmail.com', NULL),
(3, 'Ha nguyen', 'ha2003', '097643462', 'ha20033@gmail.com', NULL),
(6, 'nhi', 'nhi35', '0973665', 'nhi@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinhdo`
--

CREATE TABLE `trinhdo` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trinhdo`
--

INSERT INTO `trinhdo` (`id`, `name`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'B1'),
(4, 'B2'),
(5, 'C');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baikiemtra`
--
ALTER TABLE `baikiemtra`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baithi`
--
ALTER TABLE `baithi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `debai`
--
ALTER TABLE `debai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kynang`
--
ALTER TABLE `kynang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tk`
--
ALTER TABLE `tk`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trinhdo`
--
ALTER TABLE `trinhdo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `baikiemtra`
--
ALTER TABLE `baikiemtra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `baithi`
--
ALTER TABLE `baithi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `debai`
--
ALTER TABLE `debai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `kynang`
--
ALTER TABLE `kynang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tk`
--
ALTER TABLE `tk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `trinhdo`
--
ALTER TABLE `trinhdo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
