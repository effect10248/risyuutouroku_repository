-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2023-06-10 12:33:38
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `risyuutouroku`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `course_records`
--

CREATE TABLE `course_records` (
  `course_record_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `day_of_week` varchar(10) NOT NULL,
  `class_period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `course_records`
--

INSERT INTO `course_records` (`course_record_id`, `user_id`, `subject_id`, `day_of_week`, `class_period`) VALUES
(8, 1, 1, 'monday', 1),
(9, 1, 1, 'monday', 1),
(10, 1, 1, 'monday', 1),
(11, 1, 1, 'monday', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `subject`
--

CREATE TABLE `subject` (
  `subject_id` char(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `target_grade` int(11) DEFAULT NULL,
  `acquired` int(11) DEFAULT NULL,
  `weeks` varchar(10) DEFAULT NULL,
  `times` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `target_grade`, `acquired`, `weeks`, `times`) VALUES
('001001', '文学研究1', 1, 2, NULL, NULL),
('001001', '文学基礎', 1, 2, NULL, NULL),
('001002', '芸術文化', 1, 2, NULL, NULL),
('001003', '図書館サービス論', 1, 2, NULL, NULL),
('001004', '言語学基礎', 1, 2, NULL, NULL),
('001005', '日本語学入門', 10, 2, NULL, NULL),
('001006', '学科ゼミ（1年）', 10, 2, NULL, NULL),
('001007', '図書館概論', 1, 2, NULL, NULL),
('001008', '博物館学概論', 1, 2, NULL, NULL),
('001009', '伝承文学研究', 1, 2, NULL, NULL),
('001010', '英米文学基礎', 1, 2, NULL, NULL),
('001011', '日本文学研究１', 2, 2, NULL, NULL),
('001012', '日本文学研究２', 2, 2, NULL, NULL),
('001013', '言語学研究', 3, 2, NULL, NULL),
('001014', '学科ゼミ（2年）', 20, 2, NULL, NULL),
('001015', '図書の文化', 1, 2, NULL, NULL),
('001016', '文化財研究', 1, 2, NULL, NULL),
('001017', '英米文学研究', 2, 2, NULL, NULL),
('001018', '絵画研究', 2, 2, NULL, NULL),
('001019', '国語科教職基礎', 10, 2, NULL, NULL),
('001020', '国語科実技演習', 20, 2, NULL, NULL),
('001021', '教育実習', 3, 2, NULL, NULL),
('001022', '上代文学', 10, 2, NULL, NULL),
('001023', '中古文学', 10, 2, NULL, NULL),
('001024', '中世文学', 20, 2, NULL, NULL),
('001025', '近世文学', 20, 2, NULL, NULL),
('001026', '近現代文学', 30, 2, NULL, NULL),
('001027', '図書館基礎特論', 1, 1, NULL, NULL),
('001028', '情報検索演習', 3, 2, NULL, NULL),
('001029', '漢文学1', 10, 2, NULL, NULL),
('001030', '漢文学2', 20, 2, NULL, NULL),
('001031', '外国語', 1, 1, NULL, NULL),
('001032', '学科ゼミ（3年）', 30, 2, NULL, NULL),
('001033', '日本語学演習1', 2, 2, NULL, NULL),
('001034', '日本語学演習2', 3, 2, NULL, NULL),
('001035', '文章表現法', 1, 2, NULL, NULL),
('001036', '書道', 1, 2, NULL, NULL),
('001037', '比較文化概論', 1, 2, NULL, NULL),
('001038', '芸術と文化', 1, 2, NULL, NULL),
('001039', '基本情報技術論', 2, 2, NULL, NULL),
('001040', '応用情報技術論', 2, 2, NULL, NULL),
('001041', '日本語学特論', 3, 1, NULL, NULL),
('001042', '日本文化史1', 20, 2, NULL, NULL),
('001043', '日本文化史2', 30, 2, NULL, NULL),
('001044', '暮らしと芸術', 1, 2, NULL, NULL),
('001045', '文芸文化特論', 3, 2, NULL, NULL),
('001046', '日本文学特論', 3, 2, NULL, NULL),
('001047', '海外文学特論', 3, 1, NULL, NULL),
('001048', '学科ゼミ（4年）', 40, 2, NULL, NULL),
('001049', '卒業論文事前演習', 30, 2, NULL, NULL),
('001050', '卒業研究', 40, 4, NULL, NULL),
('200201', '図書館研究学', 3, 2, '0', 5),
('200202', '文化と科学', 2, 2, '0', 2),
('200203', '文学5', 3, 2, '0', 3),
('200205', '文学7', 4, 2, '金', 4),
('200205', '文学7', 4, 2, '金', 4),
('200205', '文学7', 4, 2, '金', 3),
('200205', '文学7', 4, 2, '金', 3),
('200201', '図書館研究学', 1, 1, '金', 4),
('200201', '図書館研究学', 1, 1, '金', 4);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `course_records`
--
ALTER TABLE `course_records`
  ADD PRIMARY KEY (`course_record_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `course_records`
--
ALTER TABLE `course_records`
  MODIFY `course_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
