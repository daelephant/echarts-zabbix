-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 08 月 17 日 10:39
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `chartpie`
--

-- --------------------------------------------------------

--
-- 表的结构 `chart_pie`
--

CREATE TABLE IF NOT EXISTS `chart_pie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `pv` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `chart_pie`
--

INSERT INTO `chart_pie` (`id`, `title`, `pv`) VALUES
(1, '百度', 1231),
(2, 'google', 2998),
(3, '搜搜', 342),
(4, '必应', 4214),
(5, '搜狗', 259),
(6, '其他', 1000),
(9, '搜狗', 259);

-- --------------------------------------------------------

--
-- 表的结构 `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deviceip` char(15) COLLATE utf8_bin DEFAULT NULL,
  `devicenetname` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '网口名称',
  `rulenumber` char(10) COLLATE utf8_bin DEFAULT NULL,
  `eventime` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `eventype` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `protocoltype` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `originip` char(15) COLLATE utf8_bin DEFAULT NULL,
  `originport` char(5) COLLATE utf8_bin DEFAULT NULL,
  `destip` char(15) COLLATE utf8_bin DEFAULT NULL,
  `destport` char(5) COLLATE utf8_bin DEFAULT NULL,
  `descript` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '弱口令用户名字段',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `event`
--

INSERT INTO `event` (`id`, `deviceip`, `devicenetname`, `rulenumber`, `eventime`, `eventype`, `protocoltype`, `originip`, `originport`, `destip`, `destport`, `descript`) VALUES
(1, '192.168.3.3:80', 'veth0', '32000001', '2017-08-14 11:35:25', '非攻击', 'TCP', '10.3.11.60', '49217', '10.3.3.1', '135', NULL),
(3, '192.168.3.3:80', 'veth0', '18000004', '2017-08-14 11:35:49', '非攻击', 'POP3', '10.30.10.11', '53950', '123.125.50.29', '110', '18658111280@163.com'),
(4, '192.168.3.3:80', 'veth0', '32000001', '2017-08-14 16:45:31', '非攻击', 'TCP', '10.3.20.100', '56495', '10.3.30.8', '135', NULL),
(5, '192.168.3.3:80', 'veth0', '32000001', '2017-08-14 16:47:55', '非攻击', 'TCP', '10.3.11.60', '49217', '10.3.3.1', '135', NULL),
(6, '192.168.3.3:80', 'veth0', '9003745', '2017-08-14 17:14:06', '高危', 'TCP', '192.168.0.109', '49448', '192.168.0.100', '445', NULL),
(7, '192.168.3.3:80', 'veth0', '9003713', '2017-08-14 17:14:10', '中危', 'TCP', '192.168.0.109', '49450', '192.168.0.100', '445', NULL),
(8, '192.168.3.3:80', 'veth0', '9003713', '2017-08-14 17:14:37', '中危', 'TCP', '192.168.0.109', '49450', '192.168.0.100', '445', NULL),
(9, '192.168.3.3:80', 'veth0', '9003713', '2017-08-14 17:14:10', '中危', 'TCP', '192.168.0.109', '49450', '192.168.0.100', '445', NULL),
(10, '192.168.3.3:80', 'veth0', '9003713', '2017-08-14 17:14:10', '中危', 'TCP', '192.168.0.109', '49450', '192.168.0.100', '445', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `rule`
--

CREATE TABLE IF NOT EXISTS `rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rulenumber` char(10) COLLATE utf8_bin DEFAULT NULL,
  `rulename` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `rulescene` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '检测场景',
  `ruletype` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '事件类型名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `rule`
--

INSERT INTO `rule` (`id`, `rulenumber`, `rulename`, `rulescene`, `ruletype`) VALUES
(1, '32000001', 'OPC协议识别', '工控OPC协议检测', '协议分析'),
(2, '18000004', 'POP3_弱口令账号登录', '弱口令检测', '安全审计'),
(3, '9003745', 'TCP_NSA_EternalBlue_(永恒之蓝)_SMB漏洞利用(win7/2008-x64)', '漏洞攻击检测', '安全漏洞');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
