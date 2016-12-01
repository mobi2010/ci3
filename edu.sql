-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-01 19:49:23
-- 服务器版本： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `edu`
--

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='分类表';

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `type`) VALUES
(1, '视频分类3', 1),
(2, '视频分类2', 1),
(3, '视频分类1', 1),
(4, '音频分类2', 2),
(6, '音频分类3', 2);

-- --------------------------------------------------------

--
-- 表的结构 `video`
--

CREATE TABLE IF NOT EXISTS `video` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `video_url` varchar(100) NOT NULL,
  `category_id` tinyint(1) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `video`
--

INSERT INTO `video` (`id`, `title`, `content`, `image_url`, `video_url`, `category_id`, `likes`, `views`, `update_time`) VALUES
(1, 'adsfasdf', 'adsf', 'http://ci3.dev/assets/upload/images/thumb/2016/12/02/148061796807773200.jpg', '阿斯顿飞', 1, 0, 0, 1480617968),
(2, '你好啊', 'adsf', 'http://ci3.dev/assets/upload/images/thumb/2016/12/02/148061797648821300.jpg', '上帝发誓地方', 1, 0, 0, 1480618102);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
