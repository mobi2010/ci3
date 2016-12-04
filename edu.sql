-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-04 18:20:33
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
-- 表的结构 `audio`
--

CREATE TABLE IF NOT EXISTS `audio` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL COMMENT '摘要',
  `image_url` varchar(100) NOT NULL,
  `audio_url` varchar(100) NOT NULL,
  `category_id` tinyint(1) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `sort_id` tinyint(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='分类表';

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `type`, `sort_id`) VALUES
(1, '孕产百问', 1, 1),
(2, '准备怀孕', 1, 2),
(3, '宝宝疾病', 1, 3),
(4, '早教心理', 1, 4),
(5, '饮食护理', 1, 5);

-- --------------------------------------------------------

--
-- 表的结构 `video`
--

CREATE TABLE IF NOT EXISTS `video` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL COMMENT '摘要',
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

INSERT INTO `video` (`id`, `title`, `abstract`, `image_url`, `video_url`, `category_id`, `likes`, `views`, `update_time`) VALUES
(1, '父母有高血压会遗传给小孩吗？', '很多家长问到，父母有高血压的倾向或者是有高血压疾病，会遗传给小孩吗？一起看看广州市白云区妇幼保健院妇产科杨承东副主任医师怎么说吧。', 'http://ci3.dev/assets/images/thumb/2016/12/05/148087148068250100.jpg', 'http://200021154.vod.myqcloud.com/200021154_c35bda167d5311e6b7ea7faff263bace.f30.mp4?start=0', 1, 0, 0, 1480871480),
(2, '先兆子痫患者是心脑血管疾病的高危人群吗', '有资料显示先兆子痫患者是日后发生心脑血管疾病的高危人群，其实在产后有没有方法可以预防出现心脑血管疾病的出现的呢？一起看看广州市白云区妇幼保健院妇产科杨承东副主任医师怎么说吧。', 'http://ci3.dev/assets/images/thumb/2016/12/05/148087189345811100.jpg', 'http://200021154.vod.myqcloud.com/200021154_2bd5e9ea757211e6ae28a5b0aa5d87cd.f30.mp4?start=0', 1, 0, 0, 1480871893);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`), ADD KEY `sort_id` (`sort_id`), ADD KEY `type` (`type`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
