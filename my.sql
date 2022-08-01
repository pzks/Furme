-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2022-07-23 22:05:12
-- 服务器版本： 5.7.26
-- PHP 版本： 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `my`
--

-- --------------------------------------------------------

--
-- 表的结构 `love`
--

CREATE TABLE `love` (
  `my` varchar(11) NOT NULL,
  `mylove` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `love`
--

INSERT INTO `love` (`my`, `mylove`) VALUES
('w', '1'),
('w', 'w');

-- --------------------------------------------------------

--
-- 表的结构 `msg`
--

CREATE TABLE `msg` (
  `fromid` varchar(100) NOT NULL,
  `user` text NOT NULL,
  `who` text NOT NULL,
  `text` varchar(200) NOT NULL,
  `time` text NOT NULL,
  `icon` text NOT NULL,
  `leixing` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `msg`
--

INSERT INTO `msg` (`fromid`, `user`, `who`, `text`, `time`, `icon`, `leixing`) VALUES
('0f65861b28ae776e5c235daa4d98c7aa', 'w', 'w', 's', '2022-07-23 13:32:08', 'https://cravatar.cn/avatar/dec29f6538e03927787794ff4b074740', 1);

-- --------------------------------------------------------

--
-- 表的结构 `pinglun`
--

CREATE TABLE `pinglun` (
  `tid` varchar(100) NOT NULL,
  `user` text NOT NULL,
  `who` text NOT NULL,
  `neirong` varchar(200) NOT NULL,
  `time` datetime NOT NULL,
  `icon` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pinglun`
--

INSERT INTO `pinglun` (`tid`, `user`, `who`, `neirong`, `time`, `icon`) VALUES
('0f65861b28ae776e5c235daa4d98c7aa', 'w', 'w', 's', '2022-07-23 13:32:08', 'https://cravatar.cn/avatar/dec29f6538e03927787794ff4b074740');

-- --------------------------------------------------------

--
-- 表的结构 `register`
--

CREATE TABLE `register` (
  `id` varchar(25) NOT NULL,
  `username` varchar(11) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `sf` text NOT NULL,
  `icon` text NOT NULL,
  `glod` varchar(100) NOT NULL,
  `nicheng` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `register`
--

INSERT INTO `register` (`id`, `username`, `mail`, `password`, `sf`, `icon`, `glod`, `nicheng`) VALUES
('907239176', 'w', '2357749867@qq.com', '1111', 'u', 'https://cravatar.cn/avatar/dec29f6538e03927787794ff4b074740', '1', 'my'),
('1', '1', '1', '1', 'u', 'https://cravatar.cn/avatar/dec29f6538e03927787794ff4b074741', '1', 'my');

-- --------------------------------------------------------

--
-- 表的结构 `tie`
--

CREATE TABLE `tie` (
  `tid` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `user` text NOT NULL,
  `neirong` text NOT NULL,
  `time` datetime NOT NULL,
  `icon` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tie`
--

INSERT INTO `tie` (`tid`, `title`, `user`, `neirong`, `time`, `icon`) VALUES
('0f65861b28ae776e5c235daa4d98c7aa', '欢迎使用Furme', 'w', '欢迎使用Furme！', '2022-07-23 13:31:57', 'https://cravatar.cn/avatar/dec29f6538e03927787794ff4b074740');

--
-- 转储表的索引
--

--
-- 表的索引 `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- 表的索引 `tie`
--
ALTER TABLE `tie`
  ADD PRIMARY KEY (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
