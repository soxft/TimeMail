-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `check`;
CREATE TABLE `check` (
  `uid` mediumtext NOT NULL,
  `code` mediumtext NOT NULL,
  `time` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `checking`;
CREATE TABLE `checking` (
  `uid` mediumtext NOT NULL,
  `topic` mediumtext NOT NULL,
  `content` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `from` mediumtext NOT NULL,
  `to` mediumtext NOT NULL,
  `ip` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `sent`;
CREATE TABLE `sent` (
  `uid` mediumtext NOT NULL,
  `topic` mediumtext NOT NULL,
  `content` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `from` mediumtext NOT NULL,
  `to` mediumtext NOT NULL,
  `ip` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `waiting`;
CREATE TABLE `waiting` (
  `uid` mediumtext NOT NULL,
  `topic` mediumtext NOT NULL,
  `content` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `from` mediumtext NOT NULL,
  `to` mediumtext NOT NULL,
  `ip` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2020-08-30 05:14:41
