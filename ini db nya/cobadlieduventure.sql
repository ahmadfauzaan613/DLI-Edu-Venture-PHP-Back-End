-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 06:34 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobadlieduventure`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_join`
--

CREATE TABLE `event_join` (
  `id` int(11) NOT NULL,
  `member` varchar(100) NOT NULL,
  `id_event` varchar(100) NOT NULL,
  `judul_event` text NOT NULL,
  `jadwal_tgl` text NOT NULL,
  `jadwal_time` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_join`
--

INSERT INTO `event_join` (`id`, `member`, `id_event`, `judul_event`, `jadwal_tgl`, `jadwal_time`, `created`) VALUES
(8, 'hendro@gmail.com', '13', 'Event Ketiga', '2020-08-29', '22:11:00', '2020-08-17 20:30:38'),
(9, 'nugrohodedi62@gmail.com', '11', 'Event Pertama', '2020-08-20', '19:11:00', '2020-08-17 22:16:25'),
(10, 'nugrohodedi62@gmail.com', '12', 'Event Kedua', '2020-08-19', '21:16:00', '2020-08-17 22:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`, `usertype`) VALUES
(1, 'Admin', 'admin@gmail.com', '7488e331b8b64e5794da3fa4eb10ad5d', 1),
(4, 'Dedi', 'dedi@gmail.com', '6bf7f8db3ab1ab2ea2c0809fd89d9971', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id_blog` int(11) NOT NULL,
  `judul_blog` varchar(100) NOT NULL,
  `slug_blog` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `uploader` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id_blog`, `judul_blog`, `slug_blog`, `isi`, `foto`, `foto_type`, `uploader`, `created`, `updater`, `modified`) VALUES
(14, 'Blog Pertama', 'blog-pertama', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'blog-pertama20200816111136', '.png', 35, '2020-08-16 16:11:37', 0, NULL),
(15, 'Blog Kedua', 'blog-kedua', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'blog-kedua20200816111226', '.png', 35, '2020-08-16 16:12:26', 0, NULL),
(16, 'Blog Ketiga', 'blog-ketiga', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'blog-ketiga20200816111304', '.png', 35, '2020-08-16 16:13:04', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id_event` int(11) NOT NULL,
  `judul_event` varchar(100) NOT NULL,
  `slug_event` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `jadwal_tgl` date NOT NULL,
  `jadwal_time` time NOT NULL,
  `uploader` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id_event`, `judul_event`, `slug_event`, `isi`, `foto`, `foto_type`, `jadwal_tgl`, `jadwal_time`, `uploader`, `created`, `updater`, `modified`) VALUES
(11, 'Event Pertama', 'event-pertama', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'event-pertama20200816110804', '.png', '2020-08-20', '19:11:00', 35, '2020-08-16 16:08:04', 0, NULL),
(12, 'Event Kedua', 'event-kedua', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'event-kedua20200816111003', '.png', '2020-08-19', '21:16:00', 35, '2020-08-16 16:10:03', 0, NULL),
(13, 'Event Ketiga', 'event-ketiga', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'event-ketiga20200816111042', '.png', '2020-08-29', '22:11:00', 35, '2020-08-16 16:10:42', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id_gallery` int(11) NOT NULL,
  `judul_gallery` varchar(100) NOT NULL,
  `slug_gallery` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `uploader` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id_gallery`, `judul_gallery`, `slug_gallery`, `foto`, `foto_type`, `uploader`, `created`, `updater`, `modified`) VALUES
(10, 'Gallery Satu', 'gallery-satu', 'gallery-satu20200816111351', '.png', 35, '2020-08-16 16:13:51', 0, NULL),
(11, 'Gallery Dua', 'gallery-dua', 'gallery-dua20200816111409', '.png', 35, '2020-08-16 16:14:09', 0, NULL),
(12, 'Gallery Tiga', 'gallery-tiga', 'gallery-tiga20200816111432', '.png', 35, '2020-08-16 16:14:32', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id_news` int(11) NOT NULL,
  `judul_news` varchar(100) NOT NULL,
  `slug_news` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `uploader` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id_news`, `judul_news`, `slug_news`, `isi`, `foto`, `foto_type`, `uploader`, `created`, `updater`, `modified`) VALUES
(11, 'News Satu', 'news-satu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'news-satu20200816110638', '.png', 35, '2020-08-16 16:06:39', 0, NULL),
(12, 'News Dua', 'news-dua', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'news-dua20200816110658', '.png', 35, '2020-08-16 16:06:58', 0, NULL),
(13, 'News Tiga', 'news-tiga', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'news-tiga20200816110717', '.png', 35, '2020-08-16 16:07:18', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `id_program` int(11) NOT NULL,
  `judul_program` varchar(100) NOT NULL,
  `slug_program` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `uploader` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`id_program`, `judul_program`, `slug_program`, `isi`, `foto`, `foto_type`, `uploader`, `created`, `updater`, `modified`) VALUES
(12, 'Lorem Ipsum', 'lorem-ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'lorem-ipsum20200816105713', '.png', 35, '2020-08-16 15:57:14', 0, NULL),
(13, 'Lorem Ipsum 2', 'lorem-ipsum-2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'lorem-ipsum-220200816105741', '.png', 35, '2020-08-16 15:57:41', 0, NULL),
(14, 'Lorem Ipsum 3', 'lorem-ipsum-3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'lorem-ipsum-320200816105758', '.png', 35, '2020-08-16 15:57:59', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_startup`
--

CREATE TABLE `tbl_startup` (
  `id_startup` int(11) NOT NULL,
  `judul_startup` varchar(100) NOT NULL,
  `slug_startup` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `spesifikasi` text NOT NULL,
  `keunggulan` text NOT NULL,
  `pencapaian` text NOT NULL,
  `kategori` text NOT NULL,
  `teknologi` text NOT NULL,
  `web` text NOT NULL,
  `fb` text NOT NULL,
  `ig` text NOT NULL,
  `uploader` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_startup`
--

INSERT INTO `tbl_startup` (`id_startup`, `judul_startup`, `slug_startup`, `isi`, `foto`, `foto_type`, `spesifikasi`, `keunggulan`, `pencapaian`, `kategori`, `teknologi`, `web`, `fb`, `ig`, `uploader`, `created`, `updater`, `modified`) VALUES
(11, 'Startup 1', 'startup-1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'startup-120200816105909', '.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.', 'Komputer', 'Cloud Computing', 'https://wisatasoloraya.com/', 'https://wisatasoloraya.com/', 'https://wisatasoloraya.com/', 35, '2020-08-16 15:59:09', 0, NULL),
(12, 'Startup 2', 'startup-2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'startup-220200816110011', '.png', 'Donec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'Donec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'Donec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'Komputer', 'Website', 'https://wisatasoloraya.com/', 'https://wisatasoloraya.com/', 'https://wisatasoloraya.com/', 35, '2020-08-16 16:00:11', 0, NULL),
(13, 'Startup 3', 'startup-3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur mi sit amet tellus pulvinar vulputate. In euismod urna quis nisl gravida fermentum. Mauris tempus metus id quam aliquam commodo. Suspendisse bibendum finibus justo. Donec et nisi lectus. Integer sodales eleifend efficitur. Mauris sed ante in lacus imperdiet maximus quis sit amet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem mauris, sollicitudin a commodo vitae, accumsan sit amet nunc. Sed bibendum dapibus purus, vitae molestie dolor imperdiet venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac lorem in dui porttitor tempus in quis sem. Mauris quis ligula mi. Duis et ex et dui faucibus tempus sit amet in sem. Etiam et fringilla magna. Nullam fermentum facilisis volutpat.\r\n\r\nMauris finibus ipsum sed sem blandit suscipit. Curabitur suscipit lobortis mauris, pulvinar aliquam risus convallis blandit. Duis interdum lectus ut purus suscipit sodales. Nullam egestas facilisis tincidunt. Quisque pulvinar urna quis ex aliquam, a semper justo convallis. Praesent egestas felis vel quam molestie volutpat. Nullam at ullamcorper ante, sit amet facilisis enim. Vivamus feugiat facilisis neque ac vestibulum.\r\n\r\nMauris dapibus, erat sed pulvinar rhoncus, diam enim aliquam tellus, at cursus magna dolor eget est. Praesent lobortis rutrum tortor, nec auctor odio maximus id. Phasellus id blandit libero. Etiam lacinia posuere velit, non finibus ligula dapibus a. Etiam placerat nisi et metus aliquet, id mollis dolor vehicula. Proin risus diam, ullamcorper at nisi elementum, luctus suscipit risus. Vestibulum elit ligula, gravida ac egestas in, congue porttitor ex. Donec mauris orci, pulvinar non auctor et, egestas nec massa. Quisque iaculis dolor vitae tellus maximus mattis. Morbi pulvinar, sem sed cursus molestie, eros sapien aliquam mauris, vel euismod odio dolor sed mauris. Nam laoreet lectus sed massa euismod maximus. Morbi cursus odio nunc, eget bibendum diam commodo a. Sed rhoncus suscipit odio vitae varius. Etiam viverra molestie imperdiet.\r\n\r\nDonec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'startup-320200816110217', '.png', 'Donec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'Donec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'Donec sit amet sapien purus. Nunc aliquam condimentum scelerisque. Aenean vitae dapibus libero, non viverra erat. Nunc eget velit id ante feugiat malesuada. Vestibulum bibendum magna ut sapien volutpat feugiat. Vestibulum enim libero, bibendum vitae vehicula ut, congue vitae ligula. Aliquam et libero neque.', 'Komputer', 'Cloud Computing 2', 'https://wisatasoloraya.com/', 'https://wisatasoloraya.com/', 'https://wisatasoloraya.com/', 35, '2020-08-16 16:02:17', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `code` varchar(100) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `reset_password` varchar(100) NOT NULL,
  `usertype` int(10) NOT NULL DEFAULT 2,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `foto`, `foto_type`, `code`, `active`, `phone`, `address`, `bio`, `reset_password`, `usertype`, `created`, `modified`) VALUES
(40, 'Dedi Cahyanto Nugroho', 'nugrohodedi62@gmail.com', 'dedibosku', 'dedi-cahyanto-nugroho20200817194245', '.png', 'YvlQMgocPK8x', 1, '+6285879463677', 'wates rt04/rw02, bade, klego', 'Saya suka berorganisasi dan beraktivitas di luar ruangan', 'f43685aa38f50ca1b48501c15acd613e', 2, '2020-08-17 13:07:07', '2020-08-19 22:46:06'),
(43, 'solo', 'wisatasolorayacom@gmail.com', 'dedinugroho', '', '', '9TMgaCJH1j7q', 1, NULL, NULL, NULL, '36e8ce541ad3b87a4c89c0c1d76a7e08', 2, '2020-08-18 08:16:01', '2020-08-19 23:11:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_join`
--
ALTER TABLE `event_join`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `tbl_startup`
--
ALTER TABLE `tbl_startup`
  ADD PRIMARY KEY (`id_startup`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_join`
--
ALTER TABLE `event_join`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_startup`
--
ALTER TABLE `tbl_startup`
  MODIFY `id_startup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
