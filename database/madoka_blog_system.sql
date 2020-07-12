-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-07-12 16:33:04
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.5

--
-- Madoka Blog System
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `madoka_blog_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `checkin`
--

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `ctime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `id` int(64) UNSIGNED NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `title` varchar(64) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `essay`
--

CREATE TABLE `essay` (
  `id` int(8) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `thumbs` int(128) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `follow`
--

CREATE TABLE `follow` (
  `id` int(64) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nickname` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `letter`
--

CREATE TABLE `letter` (
  `id` int(128) NOT NULL,
  `content` text NOT NULL,
  `name` varchar(128) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `points`
--

CREATE TABLE `points` (
  `id` int(64) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `points` int(128) NOT NULL,
  `experience` int(128) NOT NULL,
  `lv` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `theme`
--

CREATE TABLE `theme` (
  `id` int(64) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `theme` varchar(128) NOT NULL,
  `touhou` int(32) NOT NULL,
  `touhoubg` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `thumbs`
--

CREATE TABLE `thumbs` (
  `id` int(128) NOT NULL,
  `title` text NOT NULL,
  `nickname` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `uploads`
--

CREATE TABLE `uploads` (
  `id` int(64) NOT NULL,
  `path` text NOT NULL,
  `name` varchar(128) NOT NULL,
  `nickname` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(64) UNSIGNED NOT NULL COMMENT 'id',
  `username` varchar(64) DEFAULT NULL COMMENT '账号',
  `password` varchar(64) NOT NULL COMMENT '密码',
  `nickname` varchar(64) NOT NULL COMMENT '昵称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(8) UNSIGNED NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `pic` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `bday` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `sex` varchar(128) NOT NULL,
  `qq` int(64) NOT NULL,
  `age` int(64) NOT NULL,
  `mess` text NOT NULL,
  `card` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转储表的索引
--

--
-- 表的索引 `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `essay`
--
ALTER TABLE `essay`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `thumbs`
--
ALTER TABLE `thumbs`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(64) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `essay`
--
ALTER TABLE `essay`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用表AUTO_INCREMENT `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `letter`
--
ALTER TABLE `letter`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `points`
--
ALTER TABLE `points`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `thumbs`
--
ALTER TABLE `thumbs`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(64) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
