-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2014 at 09:56 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sangovietphat`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(64) NOT NULL,
  `bizrule` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`itemname`,`userid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Manager', 1, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `bizrule` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Advisor Manager', 2, NULL, NULL, NULL),
('advisor_autoSave', 0, NULL, NULL, NULL),
('advisor_checkbox', 0, NULL, NULL, NULL),
('advisor_copy', 0, NULL, NULL, NULL),
('advisor_create', 0, NULL, NULL, NULL),
('advisor_delete', 0, NULL, NULL, NULL),
('advisor_edit', 0, NULL, NULL, NULL),
('advisor_index', 0, NULL, NULL, NULL),
('advisor_reverseHome', 0, NULL, NULL, NULL),
('advisor_reverseNew', 0, NULL, NULL, NULL),
('advisor_reverseStatus', 0, NULL, NULL, NULL),
('advisor_suggestTitle', 0, NULL, NULL, NULL),
('advisor_update', 0, NULL, NULL, NULL),
('advisor_updateSuggest', 0, NULL, NULL, NULL),
('advisorCategory_create', 0, NULL, NULL, NULL),
('advisorCategory_delete', 0, NULL, NULL, NULL),
('advisorCategory_index', 0, NULL, NULL, NULL),
('advisorCategory_update', 0, NULL, NULL, NULL),
('advisorCategory_updateListOrderView', 0, NULL, NULL, NULL),
('advisorCategory_validate', 0, NULL, NULL, NULL),
('advisorCategory_write', 0, NULL, NULL, NULL),
('Album Manager', 2, NULL, NULL, NULL),
('album_checkbox', 0, '', '', ''),
('album_copy', 0, '', '', ''),
('album_create', 0, NULL, NULL, NULL),
('album_delete', 0, NULL, NULL, NULL),
('album_edit', 0, NULL, NULL, NULL),
('album_index', 0, NULL, NULL, NULL),
('album_reverseHome', 0, NULL, NULL, NULL),
('album_reverseNew', 0, NULL, NULL, NULL),
('album_reverseStatus', 0, NULL, NULL, NULL),
('album_suggestName', 0, NULL, NULL, NULL),
('album_update', 0, NULL, NULL, NULL),
('album_updateSuggest', 0, NULL, NULL, NULL),
('albumCategory_create', 0, NULL, NULL, NULL),
('albumCategory_delete', 0, NULL, NULL, NULL),
('albumCategory_index', 0, NULL, NULL, NULL),
('albumCategory_update', 0, NULL, NULL, NULL),
('albumCategory_updateListOrderView', 0, NULL, NULL, NULL),
('albumCategory_validate', 0, NULL, NULL, NULL),
('albumCategory_write', 0, NULL, NULL, NULL),
('Audio Manager', 2, NULL, NULL, NULL),
('audio_checkbox', 0, '', '', ''),
('audio_create', 0, '', '', ''),
('audio_delete', 0, '', '', ''),
('audio_edit', 0, '', '', ''),
('audio_index', 0, '', '', ''),
('audio_reverseStatus', 0, '', '', ''),
('audio_suggestName', 0, '', '', ''),
('audio_update', 0, '', '', ''),
('audioCategory_create', 0, '', '', ''),
('audioCategory_delete', 0, '', '', ''),
('audioCategory_index', 0, '', '', ''),
('audioCategory_update', 0, '', '', ''),
('audioCategory_updateListOrderView', 0, '', '', ''),
('audioCategory_validate', 0, '', '', ''),
('audioCategory_write', 0, '', '', ''),
('banner_checkbox', 0, NULL, NULL, NULL),
('banner_copy', 0, NULL, NULL, NULL),
('banner_delete', 0, NULL, NULL, NULL),
('banner_edit', 0, NULL, NULL, NULL),
('banner_index', 0, NULL, NULL, NULL),
('banner_reverseStatus', 0, NULL, NULL, NULL),
('banner_suggestName', 0, NULL, NULL, NULL),
('banner_updateForm', 0, NULL, NULL, NULL),
('banner_write', 0, NULL, NULL, NULL),
('Booking Manager', 2, NULL, NULL, NULL),
('booking_autoSave', 0, NULL, NULL, NULL),
('booking_checkbox', 0, NULL, NULL, NULL),
('booking_copy', 0, NULL, NULL, NULL),
('booking_create', 0, NULL, NULL, NULL),
('booking_delete', 0, NULL, NULL, NULL),
('booking_edit', 0, NULL, NULL, NULL),
('booking_index', 0, NULL, NULL, NULL),
('booking_reverseHome', 0, NULL, NULL, NULL),
('booking_reverseNew', 0, NULL, NULL, NULL),
('booking_reverseStatus', 0, NULL, NULL, NULL),
('booking_suggestTitle', 0, NULL, NULL, NULL),
('booking_update', 0, NULL, NULL, NULL),
('booking_updateSuggest', 0, NULL, NULL, NULL),
('catalog_checkbox', 0, NULL, NULL, NULL),
('catalog_copy', 0, NULL, NULL, NULL),
('catalog_create', 0, NULL, NULL, NULL),
('catalog_delete', 0, NULL, NULL, NULL),
('catalog_edit', 0, NULL, NULL, NULL),
('catalog_index', 0, NULL, NULL, NULL),
('catalog_reverseHome', 0, NULL, NULL, NULL),
('catalog_reverseNew', 0, NULL, NULL, NULL),
('catalog_reverseStatus', 0, NULL, NULL, NULL),
('catalog_suggestName', 0, NULL, NULL, NULL),
('catalog_update', 0, NULL, NULL, NULL),
('catalogCategory_create', 0, NULL, NULL, NULL),
('catalogCategory_delete', 0, NULL, NULL, NULL),
('catalogCategory_index', 0, NULL, NULL, NULL),
('catalogCategory_update', 0, NULL, NULL, NULL),
('catalogCategory_updateListOrderView', 0, NULL, NULL, NULL),
('catalogCategory_validate', 0, NULL, NULL, NULL),
('catalogCategory_write', 0, NULL, NULL, NULL),
('City Manager', 2, NULL, NULL, NULL),
('city_copy', 0, '', '', ''),
('city_create', 0, '', '', ''),
('city_delete', 0, '', '', ''),
('city_edit', 0, '', '', ''),
('city_index', 0, '', '', ''),
('city_reverseStatus', 0, '', '', ''),
('city_suggestTitle', 0, '', '', ''),
('city_update', 0, '', '', ''),
('Comment Manager', 2, NULL, NULL, NULL),
('comment_checkbox', 0, NULL, NULL, NULL),
('comment_delete', 0, NULL, NULL, NULL),
('comment_index', 0, NULL, NULL, NULL),
('comment_reverseStatus', 0, NULL, NULL, NULL),
('Contact Manager', 2, NULL, NULL, NULL),
('contact_checkbox', 0, NULL, NULL, NULL),
('contact_delete', 0, NULL, NULL, NULL),
('contact_index', 0, NULL, NULL, NULL),
('contact_reverseStatus', 0, NULL, NULL, NULL),
('contact_sendEmail', 0, NULL, NULL, NULL),
('contact_updateForm', 0, NULL, NULL, NULL),
('contact_write', 0, NULL, NULL, NULL),
('Customer Manager', 2, NULL, NULL, NULL),
('customer_checkbox', 0, '', '', ''),
('customer_delete', 0, '', '', ''),
('customer_index', 0, '', '', ''),
('customer_resetPassword', 0, '', '', ''),
('customer_reverseStatus', 0, '', '', ''),
('customer_suggestEmail', 0, '', '', ''),
('customer_updateForm', 0, '', '', ''),
('customer_write', 0, '', '', ''),
('Document Manager', 2, NULL, NULL, NULL),
('document_checkbox', 0, '', '', ''),
('document_copy', 0, '', '', ''),
('document_create', 0, '', '', ''),
('document_delete', 0, '', '', ''),
('document_index', 0, '', '', ''),
('document_reverseHome', 0, '', '', ''),
('document_reverseNew', 0, '', '', ''),
('document_reverseStatus', 0, '', '', ''),
('document_suggestName', 0, '', '', ''),
('document_update', 0, '', '', ''),
('document_updateSuggest', 0, '', '', ''),
('documentCategory_create', 0, '', '', ''),
('documentCategory_delete', 0, '', '', ''),
('documentCategory_index', 0, '', '', ''),
('documentCategory_update', 0, '', '', ''),
('documentCategory_updateListOrderView', 0, '', '', ''),
('documentCategory_validate', 0, '', '', ''),
('documentCategory_write', 0, '', '', ''),
('embeddedVideo_checkbox', 0, '', '', ''),
('embeddedVideo_copy', 0, '', '', ''),
('embeddedVideo_create', 0, '', '', ''),
('embeddedVideo_delete', 0, '', '', ''),
('embeddedVideo_edit', 0, '', '', ''),
('embeddedVideo_index', 0, '', '', ''),
('embeddedVideo_reverseHome', 0, '', '', ''),
('embeddedVideo_reverseNew', 0, '', '', ''),
('embeddedVideo_reverseStatus', 0, '', '', ''),
('embeddedVideo_suggestName', 0, '', '', ''),
('embeddedVideo_update', 0, '', '', ''),
('embeddedVideo_updateSuggest', 0, '', '', ''),
('embeddedVideoCategory_create', 0, '', '', ''),
('embeddedVideoCategory_delete', 0, '', '', ''),
('embeddedVideoCategory_index', 0, '', '', ''),
('embeddedVideoCategory_update', 0, '', '', ''),
('embeddedVideoCategory_updateListOrderView', 0, '', '', ''),
('embeddedVideoCategory_validate', 0, '', '', ''),
('embeddedVideoCategory_write', 0, '', '', ''),
('Embeded Video Manager', 2, NULL, NULL, NULL),
('file_delete', 0, '', '', ''),
('file_upload', 0, NULL, NULL, NULL),
('help_index', 0, NULL, NULL, NULL),
('help_view', 0, NULL, NULL, NULL),
('Image Manager', 2, NULL, NULL, NULL),
('image_create', 0, '', '', ''),
('image_delete', 0, '', '', ''),
('image_edit', 0, '', '', ''),
('image_index', 0, '', '', ''),
('image_update', 0, '', '', ''),
('image_updateInfo', 0, '', '', ''),
('image_upload', 0, NULL, NULL, NULL),
('Intro manager', 2, NULL, NULL, NULL),
('intro_autoSave', 0, NULL, NULL, NULL),
('intro_checkbox', 0, NULL, NULL, NULL),
('intro_copy', 0, NULL, NULL, NULL),
('intro_create', 0, NULL, NULL, NULL),
('intro_delete', 0, NULL, NULL, NULL),
('intro_edit', 0, NULL, NULL, NULL),
('intro_index', 0, NULL, NULL, NULL),
('intro_reverseHome', 0, NULL, NULL, NULL),
('intro_reverseNew', 0, NULL, NULL, NULL),
('intro_reverseStatus', 0, NULL, NULL, NULL),
('intro_suggestTitle', 0, NULL, NULL, NULL),
('intro_update', 0, NULL, NULL, NULL),
('intro_updateSuggest', 0, NULL, NULL, NULL),
('introCategory_create', 0, NULL, NULL, NULL),
('introCategory_delete', 0, NULL, NULL, NULL),
('introCategory_index', 0, NULL, NULL, NULL),
('introCategory_update', 0, NULL, NULL, NULL),
('introCategory_updateListOrderView', 0, NULL, NULL, NULL),
('introCategory_validate', 0, NULL, NULL, NULL),
('introCategory_write', 0, NULL, NULL, NULL),
('Manager', 2, NULL, NULL, NULL),
('News Editor', 2, NULL, NULL, NULL),
('news_autoSave', 0, '', '', ''),
('news_checkbox', 0, '', '', ''),
('news_copy', 0, NULL, NULL, NULL),
('news_create', 0, NULL, NULL, NULL),
('news_delete', 0, NULL, NULL, NULL),
('news_edit', 0, NULL, NULL, NULL),
('news_index', 0, NULL, NULL, NULL),
('news_reverseHome', 0, NULL, NULL, NULL),
('news_reverseNew', 0, NULL, NULL, NULL),
('news_reverseStatus', 0, NULL, NULL, NULL),
('news_suggestTitle', 0, '', '', ''),
('news_update', 0, NULL, NULL, NULL),
('news_updateSuggest', 0, NULL, NULL, NULL),
('newsCategory_create', 0, NULL, NULL, NULL),
('newsCategory_delete', 0, NULL, NULL, NULL),
('newsCategory_index', 0, NULL, NULL, NULL),
('newsCategory_update', 0, NULL, NULL, NULL),
('newsCategory_updateListOrderView', 0, NULL, NULL, NULL),
('newsCategory_validate', 0, NULL, NULL, NULL),
('newsCategory_write', 0, NULL, NULL, NULL),
('Order Manager', 2, NULL, NULL, NULL),
('order_checkbox', 0, NULL, NULL, NULL),
('order_delete', 0, NULL, NULL, NULL),
('order_index', 0, NULL, NULL, NULL),
('order_reverseStatus', 0, NULL, NULL, NULL),
('order_updateForm', 0, NULL, NULL, NULL),
('order_write', 0, NULL, NULL, NULL),
('Partner Manager', 2, NULL, NULL, NULL),
('partner_autoSave', 0, NULL, NULL, NULL),
('partner_checkbox', 0, NULL, NULL, NULL),
('partner_copy', 0, NULL, NULL, NULL),
('partner_create', 0, NULL, NULL, NULL),
('partner_delete', 0, NULL, NULL, NULL),
('partner_edit', 0, NULL, NULL, NULL),
('partner_index', 0, NULL, NULL, NULL),
('partner_reverseHome', 0, NULL, NULL, NULL),
('partner_reverseNew', 0, NULL, NULL, NULL),
('partner_reverseStatus', 0, NULL, NULL, NULL),
('partner_suggestTitle', 0, NULL, NULL, NULL),
('partner_update', 0, NULL, NULL, NULL),
('partner_updateSuggest', 0, NULL, NULL, NULL),
('partnerCategory_create', 0, NULL, NULL, NULL),
('partnerCategory_delete', 0, NULL, NULL, NULL),
('partnerCategory_index', 0, NULL, NULL, NULL),
('partnerCategory_update', 0, NULL, NULL, NULL),
('partnerCategory_updateListOrderView', 0, NULL, NULL, NULL),
('partnerCategory_validate', 0, NULL, NULL, NULL),
('partnerCategory_write', 0, NULL, NULL, NULL),
('Product Manager', 2, NULL, NULL, NULL),
('product_autoSave', 0, '', '', ''),
('product_checkbox', 0, NULL, NULL, NULL),
('product_copy', 0, NULL, NULL, NULL),
('product_create', 0, NULL, NULL, NULL),
('product_delete', 0, NULL, NULL, NULL),
('product_edit', 0, NULL, NULL, NULL),
('product_index', 0, NULL, NULL, NULL),
('product_reverseHome', 0, NULL, NULL, NULL),
('product_reverseNew', 0, '', '', ''),
('product_reverseSale', 0, NULL, NULL, NULL),
('product_reverseStatus', 0, NULL, NULL, NULL),
('product_suggestName', 0, NULL, NULL, NULL),
('product_update', 0, NULL, NULL, NULL),
('product_updateSuggest', 0, NULL, NULL, NULL),
('productCategory_create', 0, NULL, NULL, NULL),
('productCategory_delete', 0, NULL, NULL, NULL),
('productCategory_index', 0, NULL, NULL, NULL),
('productCategory_update', 0, NULL, NULL, NULL),
('productCategory_updateListOrderView', 0, NULL, NULL, NULL),
('productCategory_validate', 0, NULL, NULL, NULL),
('productCategory_write', 0, NULL, NULL, NULL),
('productCityCategory_create', 0, '', '', ''),
('productCityCategory_delete', 0, '', '', ''),
('productCityCategory_index', 0, '', '', ''),
('productCityCategory_update', 0, '', '', ''),
('productCityCategory_updateListOrderView', 0, '', '', ''),
('productCityCategory_validate', 0, '', '', ''),
('productCityCategory_write', 0, '', '', ''),
('QA Manager', 2, NULL, NULL, NULL),
('qa_checkbox', 0, NULL, NULL, NULL),
('qa_copy', 0, NULL, NULL, NULL),
('qa_create', 0, NULL, NULL, NULL),
('qa_delete', 0, NULL, NULL, NULL),
('qa_edit', 0, NULL, NULL, NULL),
('qa_index', 0, NULL, NULL, NULL),
('qa_reverseHome', 0, NULL, NULL, NULL),
('qa_reverseNew', 0, NULL, NULL, NULL),
('qa_reverseStatus', 0, NULL, NULL, NULL),
('qa_suggestTitle', 0, NULL, NULL, NULL),
('qa_update', 0, NULL, NULL, NULL),
('qa_updateSuggest', 0, NULL, NULL, NULL),
('QaAnswer Manager', 2, NULL, NULL, NULL),
('qaAnswer_checkbox', 0, '', '', ''),
('qaAnswer_create', 0, '', '', ''),
('qaAnswer_delete', 0, '', '', ''),
('qaAnswer_edit', 0, '', '', ''),
('qaAnswer_index', 0, '', '', ''),
('qaAnswer_reverseStatus', 0, '', '', ''),
('qaAnswer_suggestTitle', 0, '', '', ''),
('qaAnswer_update', 0, '', '', ''),
('qaAnswer_updateSuggest', 0, '', '', ''),
('qaCategory_create', 0, NULL, NULL, NULL),
('qaCategory_delete', 0, NULL, NULL, NULL),
('qaCategory_index', 0, NULL, NULL, NULL),
('qaCategory_update', 0, NULL, NULL, NULL),
('qaCategory_updateListOrderView', 0, NULL, NULL, NULL),
('qaCategory_validate', 0, NULL, NULL, NULL),
('qaCategory_write', 0, NULL, NULL, NULL),
('Setting Manager', 2, NULL, NULL, NULL),
('setting_edit', 0, NULL, NULL, NULL),
('setting_index', 0, NULL, NULL, NULL),
('setting_information', 0, '', '', ''),
('setting_seo', 0, '', '', ''),
('setting_suggestName', 0, NULL, NULL, NULL),
('setting_updateForm', 0, NULL, NULL, NULL),
('Share Manager', 2, NULL, NULL, NULL),
('share_checkbox', 0, NULL, NULL, NULL),
('share_copy', 0, NULL, NULL, NULL),
('share_create', 0, NULL, NULL, NULL),
('share_delete', 0, NULL, NULL, NULL),
('share_edit', 0, NULL, NULL, NULL),
('share_index', 0, NULL, NULL, NULL),
('share_reverseHome', 0, NULL, NULL, NULL),
('share_reverseNew', 0, NULL, NULL, NULL),
('share_reverseStatus', 0, NULL, NULL, NULL),
('share_suggestTitle', 0, NULL, NULL, NULL),
('share_update', 0, NULL, NULL, NULL),
('share_updateSuggest', 0, NULL, NULL, NULL),
('shareCategory_create', 0, NULL, NULL, NULL),
('shareCategory_delete', 0, NULL, NULL, NULL),
('shareCategory_index', 0, NULL, NULL, NULL),
('shareCategory_update', 0, NULL, NULL, NULL),
('shareCategory_updateListOrderView', 0, NULL, NULL, NULL),
('shareCategory_validate', 0, NULL, NULL, NULL),
('shareCategory_write', 0, NULL, NULL, NULL),
('site_home', 0, NULL, NULL, NULL),
('supporter_checkbox', 0, NULL, NULL, NULL),
('supporter_copy', 0, NULL, NULL, NULL),
('supporter_delete', 0, NULL, NULL, NULL),
('supporter_edit', 0, NULL, NULL, NULL),
('supporter_index', 0, NULL, NULL, NULL),
('supporter_reverseStatus', 0, NULL, NULL, NULL),
('supporter_suggestName', 0, NULL, NULL, NULL),
('supporter_updateForm', 0, NULL, NULL, NULL),
('supporter_write', 0, NULL, NULL, NULL),
('Textlink Manager', 2, NULL, NULL, NULL),
('textlink_autoSave', 0, NULL, NULL, NULL),
('textlink_checkbox', 0, NULL, NULL, NULL),
('textlink_copy', 0, NULL, NULL, NULL),
('textlink_create', 0, NULL, NULL, NULL),
('textlink_delete', 0, NULL, NULL, NULL),
('textlink_edit', 0, NULL, NULL, NULL),
('textlink_index', 0, NULL, NULL, NULL),
('textlink_reverseHome', 0, NULL, NULL, NULL),
('textlink_reverseNew', 0, NULL, NULL, NULL),
('textlink_reverseStatus', 0, NULL, NULL, NULL),
('textlink_suggestTitle', 0, NULL, NULL, NULL),
('textlink_update', 0, NULL, NULL, NULL),
('textlink_updateSuggest', 0, NULL, NULL, NULL),
('textLinkCategory_create', 0, NULL, NULL, NULL),
('textLinkCategory_delete', 0, NULL, NULL, NULL),
('textLinkCategory_index', 0, NULL, NULL, NULL),
('textLinkCategory_update', 0, NULL, NULL, NULL),
('textLinkCategory_updateListOrderView', 0, NULL, NULL, NULL),
('textLinkCategory_validate', 0, NULL, NULL, NULL),
('textLinkCategory_write', 0, NULL, NULL, NULL),
('user_checkbox', 0, NULL, NULL, NULL),
('user_delete', 0, NULL, NULL, NULL),
('user_index', 0, NULL, NULL, NULL),
('user_resetPassword', 0, NULL, NULL, NULL),
('user_reverseStatus', 0, NULL, NULL, NULL),
('user_suggestEmail', 0, NULL, NULL, NULL),
('user_updateForm', 0, NULL, NULL, NULL),
('user_write', 0, NULL, NULL, NULL),
('userMenu_create', 0, NULL, NULL, NULL),
('userMenu_delete', 0, NULL, NULL, NULL),
('userMenu_index', 0, NULL, NULL, NULL),
('userMenu_update', 0, NULL, NULL, NULL),
('userMenu_validate', 0, NULL, NULL, NULL),
('userMenu_write', 0, NULL, NULL, NULL),
('Video Manager', 2, NULL, NULL, NULL),
('video_checkbox', 0, NULL, NULL, NULL),
('video_copy', 0, NULL, NULL, NULL),
('video_create', 0, NULL, NULL, NULL),
('video_delete', 0, NULL, NULL, NULL),
('video_edit', 0, NULL, NULL, NULL),
('video_index', 0, NULL, NULL, NULL),
('video_reverseHome', 0, NULL, NULL, NULL),
('video_reverseNew', 0, NULL, NULL, NULL),
('video_reverseStatus', 0, NULL, NULL, NULL),
('video_suggestName', 0, NULL, NULL, NULL),
('video_update', 0, NULL, NULL, NULL),
('video_updateSuggest', 0, NULL, NULL, NULL),
('videoCategory_create', 0, NULL, NULL, NULL),
('videoCategory_delete', 0, NULL, NULL, NULL),
('videoCategory_index', 0, NULL, NULL, NULL),
('videoCategory_update', 0, NULL, NULL, NULL),
('videoCategory_updateListOrderView', 0, NULL, NULL, NULL),
('videoCategory_validate', 0, NULL, NULL, NULL),
('videoCategory_write', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Manager', 'Advisor Manager'),
('Advisor Manager', 'advisor_autoSave'),
('Manager', 'advisor_autoSave'),
('Advisor Manager', 'advisor_checkbox'),
('Manager', 'advisor_checkbox'),
('Advisor Manager', 'advisor_copy'),
('Manager', 'advisor_copy'),
('Advisor Manager', 'advisor_create'),
('Manager', 'advisor_create'),
('Advisor Manager', 'advisor_delete'),
('Manager', 'advisor_delete'),
('Advisor Manager', 'advisor_edit'),
('Manager', 'advisor_edit'),
('Advisor Manager', 'advisor_index'),
('Manager', 'advisor_index'),
('Advisor Manager', 'advisor_reverseHome'),
('Manager', 'advisor_reverseHome'),
('Advisor Manager', 'advisor_reverseNew'),
('Manager', 'advisor_reverseNew'),
('Advisor Manager', 'advisor_reverseStatus'),
('Manager', 'advisor_reverseStatus'),
('Advisor Manager', 'advisor_suggestTitle'),
('Manager', 'advisor_suggestTitle'),
('Advisor Manager', 'advisor_update'),
('Manager', 'advisor_update'),
('Advisor Manager', 'advisor_updateSuggest'),
('Manager', 'advisor_updateSuggest'),
('Advisor Manager', 'advisorCategory_create'),
('Manager', 'advisorCategory_create'),
('Advisor Manager', 'advisorCategory_delete'),
('Manager', 'advisorCategory_delete'),
('Advisor Manager', 'advisorCategory_index'),
('Manager', 'advisorCategory_index'),
('Advisor Manager', 'advisorCategory_update'),
('Manager', 'advisorCategory_update'),
('Advisor Manager', 'advisorCategory_updateListOrderView'),
('Manager', 'advisorCategory_updateListOrderView'),
('Advisor Manager', 'advisorCategory_validate'),
('Manager', 'advisorCategory_validate'),
('Advisor Manager', 'advisorCategory_write'),
('Manager', 'advisorCategory_write'),
('Manager', 'Album Manager'),
('Album Editor', 'album_checkbox'),
('Album Manager', 'album_checkbox'),
('Manager', 'album_checkbox'),
('Album Editor', 'album_copy'),
('Album Manager', 'album_copy'),
('Manager', 'album_copy'),
('Album Editor', 'album_create'),
('Album Manager', 'album_create'),
('Manager', 'album_create'),
('Album Manager', 'album_delete'),
('Manager', 'album_delete'),
('Album Manager', 'album_edit'),
('Manager', 'album_edit'),
('Album Editor', 'album_index'),
('Album Manager', 'album_index'),
('Manager', 'album_index'),
('Album Manager', 'album_reverseHome'),
('Manager', 'album_reverseHome'),
('Album Manager', 'album_reverseNew'),
('Manager', 'album_reverseNew'),
('Album Manager', 'album_reverseStatus'),
('Manager', 'album_reverseStatus'),
('Album Editor', 'album_suggestName'),
('Album Manager', 'album_suggestName'),
('Manager', 'album_suggestName'),
('Album Editor', 'album_update'),
('Album Manager', 'album_update'),
('Manager', 'album_update'),
('Album Editor', 'album_updateSuggest'),
('Album Manager', 'album_updateSuggest'),
('Manager', 'album_updateSuggest'),
('Album Manager', 'albumCategory_create'),
('Manager', 'albumCategory_create'),
('Album Manager', 'albumCategory_delete'),
('Manager', 'albumCategory_delete'),
('Album Manager', 'albumCategory_index'),
('Manager', 'albumCategory_index'),
('Album Manager', 'albumCategory_update'),
('Manager', 'albumCategory_update'),
('Album Manager', 'albumCategory_updateListOrderView'),
('Manager', 'albumCategory_updateListOrderView'),
('Album Manager', 'albumCategory_validate'),
('Manager', 'albumCategory_validate'),
('Album Manager', 'albumCategory_write'),
('Manager', 'albumCategory_write'),
('Manager', 'Audio Manager'),
('Audio Manager', 'audio_checkbox'),
('Manager', 'audio_checkbox'),
('Audio Manager', 'audio_create'),
('Manager', 'audio_create'),
('Audio Manager', 'audio_delete'),
('Manager', 'audio_delete'),
('Audio Manager', 'audio_edit'),
('Manager', 'audio_edit'),
('Audio Manager', 'audio_index'),
('Manager', 'audio_index'),
('Audio Manager', 'audio_reverseStatus'),
('Manager', 'audio_reverseStatus'),
('Audio Manager', 'audio_suggestName'),
('Manager', 'audio_suggestName'),
('Audio Manager', 'audio_update'),
('Manager', 'audio_update'),
('Audio Manager', 'audioCategory_create'),
('Manager', 'audioCategory_create'),
('Audio Manager', 'audioCategory_delete'),
('Manager', 'audioCategory_delete'),
('Audio Manager', 'audioCategory_index'),
('Manager', 'audioCategory_index'),
('Audio Manager', 'audioCategory_update'),
('Manager', 'audioCategory_update'),
('Audio Manager', 'audioCategory_updateListOrderView'),
('Manager', 'audioCategory_updateListOrderView'),
('Audio Manager', 'audioCategory_validate'),
('Manager', 'audioCategory_validate'),
('Audio Manager', 'audioCategory_write'),
('Manager', 'audioCategory_write'),
('Manager', 'banner_checkbox'),
('Manager', 'banner_copy'),
('Manager', 'banner_delete'),
('Manager', 'banner_edit'),
('Manager', 'banner_index'),
('Manager', 'banner_reverseStatus'),
('Manager', 'banner_suggestName'),
('Manager', 'banner_updateForm'),
('Manager', 'banner_write'),
('Manager', 'Booking Manager'),
('Booking Manager', 'booking_autoSave'),
('Booking Manager', 'booking_checkbox'),
('Booking Manager', 'booking_copy'),
('Booking Manager', 'booking_create'),
('Booking Manager', 'booking_delete'),
('Booking Manager', 'booking_edit'),
('Booking Manager', 'booking_index'),
('Booking Manager', 'booking_reverseHome'),
('Booking Manager', 'booking_reverseNew'),
('Booking Manager', 'booking_reverseStatus'),
('Booking Manager', 'booking_suggestTitle'),
('Booking Manager', 'booking_update'),
('Booking Manager', 'booking_updateSuggest'),
('Manager', 'catalog_checkbox'),
('Manager', 'catalog_copy'),
('Manager', 'catalog_create'),
('Manager', 'catalog_delete'),
('Manager', 'catalog_edit'),
('Manager', 'catalog_index'),
('Manager', 'catalog_reverseHome'),
('Manager', 'catalog_reverseNew'),
('Manager', 'catalog_reverseStatus'),
('Manager', 'catalog_suggestName'),
('Manager', 'catalog_update'),
('Manager', 'catalogCategory_create'),
('Manager', 'catalogCategory_delete'),
('Manager', 'catalogCategory_index'),
('Manager', 'catalogCategory_update'),
('Manager', 'catalogCategory_updateListOrderView'),
('Manager', 'catalogCategory_validate'),
('Manager', 'catalogCategory_write'),
('Manager', 'City Manager'),
('City Manager', 'city_copy'),
('Manager', 'city_copy'),
('City Manager', 'city_create'),
('Manager', 'city_create'),
('City Manager', 'city_delete'),
('Manager', 'city_delete'),
('City Manager', 'city_edit'),
('Manager', 'city_edit'),
('City Manager', 'city_index'),
('Manager', 'city_index'),
('City Manager', 'city_reverseStatus'),
('Manager', 'city_reverseStatus'),
('City Manager', 'city_suggestTitle'),
('Manager', 'city_suggestTitle'),
('City Manager', 'city_update'),
('Manager', 'city_update'),
('Manager', 'Clip Manager'),
('Manager', 'Comment Manager'),
('Comment Manager', 'comment_checkbox'),
('Manager', 'comment_checkbox'),
('Comment Manager', 'comment_delete'),
('Manager', 'comment_delete'),
('Comment Manager', 'comment_index'),
('Manager', 'comment_index'),
('Comment Manager', 'comment_reverseStatus'),
('Manager', 'comment_reverseStatus'),
('Manager', 'Contact Manager'),
('Contact Manager', 'contact_checkbox'),
('Manager', 'contact_checkbox'),
('Contact Manager', 'contact_delete'),
('Manager', 'contact_delete'),
('Contact Manager', 'contact_index'),
('Manager', 'contact_index'),
('Contact Manager', 'contact_reverseStatus'),
('Manager', 'contact_reverseStatus'),
('Contact Manager', 'contact_sendEmail'),
('Manager', 'contact_sendEmail'),
('Contact Manager', 'contact_updateForm'),
('Manager', 'contact_updateForm'),
('Contact Manager', 'contact_write'),
('Manager', 'contact_write'),
('Manager', 'Customer Manager'),
('Customer Manager', 'customer_checkbox'),
('Manager', 'customer_checkbox'),
('Customer Manager', 'customer_delete'),
('Manager', 'customer_delete'),
('Customer Manager', 'customer_index'),
('Manager', 'customer_index'),
('Customer Manager', 'customer_resetPassword'),
('Manager', 'customer_resetPassword'),
('Customer Manager', 'customer_reverseStatus'),
('Manager', 'customer_reverseStatus'),
('Customer Manager', 'customer_suggestEmail'),
('Manager', 'customer_suggestEmail'),
('Customer Manager', 'customer_updateForm'),
('Manager', 'customer_updateForm'),
('Customer Manager', 'customer_write'),
('Manager', 'customer_write'),
('Manager', 'Document Manager'),
('Document Manager', 'document_checkbox'),
('Manager', 'document_checkbox'),
('Document Manager', 'document_copy'),
('Manager', 'document_copy'),
('Document Manager', 'document_create'),
('Manager', 'document_create'),
('Document Manager', 'document_delete'),
('Manager', 'document_delete'),
('Document Manager', 'document_index'),
('Manager', 'document_index'),
('Document Manager', 'document_reverseHome'),
('Manager', 'document_reverseHome'),
('Document Manager', 'document_reverseNew'),
('Manager', 'document_reverseNew'),
('Document Manager', 'document_reverseStatus'),
('Manager', 'document_reverseStatus'),
('Document Manager', 'document_suggestName'),
('Manager', 'document_suggestName'),
('Document Manager', 'document_update'),
('Manager', 'document_update'),
('Document Manager', 'document_updateSuggest'),
('Manager', 'document_updateSuggest'),
('Document Manager', 'documentCategory_create'),
('Manager', 'documentCategory_create'),
('Document Manager', 'documentCategory_delete'),
('Manager', 'documentCategory_delete'),
('Document Manager', 'documentCategory_index'),
('Manager', 'documentCategory_index'),
('Document Manager', 'documentCategory_update'),
('Manager', 'documentCategory_update'),
('Document Manager', 'documentCategory_updateListOrderView'),
('Manager', 'documentCategory_updateListOrderView'),
('Document Manager', 'documentCategory_validate'),
('Manager', 'documentCategory_validate'),
('Document Manager', 'documentCategory_write'),
('Manager', 'documentCategory_write'),
('DrugStores Manager', 'drugstores_checkbox'),
('DrugStores Manager', 'drugstores_copy'),
('DrugStores Manager', 'drugstores_create'),
('DrugStores Manager', 'drugstores_delete'),
('DrugStores Manager', 'drugstores_edit'),
('DrugStores Manager', 'drugstores_index'),
('DrugStores Manager', 'drugstores_reverseHome'),
('DrugStores Manager', 'drugstores_reverseNew'),
('DrugStores Manager', 'drugstores_reverseStatus'),
('DrugStores Manager', 'drugstores_suggestTitle'),
('DrugStores Manager', 'drugstores_update'),
('DrugStores Manager', 'drugStores_updateListCity'),
('DrugStores Manager', 'drugstores_updateSellProduct'),
('DrugStores Manager', 'drugstores_updateSuggest'),
('DrugStores Manager', 'drugStoresCategory_create'),
('DrugStores Manager', 'drugStoresCategory_delete'),
('DrugStores Manager', 'drugStoresCategory_index'),
('DrugStores Manager', 'drugStoresCategory_update'),
('DrugStores Manager', 'drugStoresCategory_updateListOrderView'),
('DrugStores Manager', 'drugStoresCategory_validate'),
('DrugStores Manager', 'drugStoresCategory_write'),
('Embeded Video Manager', 'embeddedVideo_checkbox'),
('Manager', 'embeddedVideo_checkbox'),
('Embeded Video Manager', 'embeddedVideo_copy'),
('Manager', 'embeddedVideo_copy'),
('Embeded Video Manager', 'embeddedVideo_create'),
('Manager', 'embeddedVideo_create'),
('Embeded Video Manager', 'embeddedVideo_delete'),
('Manager', 'embeddedVideo_delete'),
('Embeded Video Manager', 'embeddedVideo_edit'),
('Manager', 'embeddedVideo_edit'),
('Embeded Video Manager', 'embeddedVideo_index'),
('Manager', 'embeddedVideo_index'),
('Embeded Video Manager', 'embeddedVideo_reverseHome'),
('Manager', 'embeddedVideo_reverseHome'),
('Embeded Video Manager', 'embeddedVideo_reverseNew'),
('Manager', 'embeddedVideo_reverseNew'),
('Embeded Video Manager', 'embeddedVideo_reverseStatus'),
('Manager', 'embeddedVideo_reverseStatus'),
('Embeded Video Manager', 'embeddedVideo_suggestName'),
('Manager', 'embeddedVideo_suggestName'),
('Embeded Video Manager', 'embeddedVideo_update'),
('Manager', 'embeddedVideo_update'),
('Embeded Video Manager', 'embeddedVideo_updateSuggest'),
('Manager', 'embeddedVideo_updateSuggest'),
('Embeded Video Manager', 'embeddedVideoCategory_create'),
('Manager', 'embeddedVideoCategory_create'),
('Embeded Video Manager', 'embeddedVideoCategory_delete'),
('Manager', 'embeddedVideoCategory_delete'),
('Embeded Video Manager', 'embeddedVideoCategory_index'),
('Manager', 'embeddedVideoCategory_index'),
('Embeded Video Manager', 'embeddedVideoCategory_update'),
('Manager', 'embeddedVideoCategory_update'),
('Embeded Video Manager', 'embeddedVideoCategory_updateListOrderView'),
('Manager', 'embeddedVideoCategory_updateListOrderView'),
('Embeded Video Manager', 'embeddedVideoCategory_validate'),
('Manager', 'embeddedVideoCategory_validate'),
('Embeded Video Manager', 'embeddedVideoCategory_write'),
('Manager', 'embeddedVideoCategory_write'),
('Manager', 'Embeded Video Manager'),
('Document Manager', 'file_delete'),
('Manager', 'file_delete'),
('Clip Editor', 'file_upload'),
('Document Manager', 'file_upload'),
('Manager', 'file_upload'),
('Video Editor', 'file_upload'),
('Video Manager', 'file_upload'),
('Manager', 'help_index'),
('Manager', 'help_view'),
('Manager', 'Image Manager'),
('Image Manager', 'image_create'),
('Manager', 'image_create'),
('Image Manager', 'image_delete'),
('Manager', 'image_delete'),
('Image Manager', 'image_edit'),
('Manager', 'image_edit'),
('Image Manager', 'image_index'),
('Manager', 'image_index'),
('Album Editor', 'image_update'),
('Album Manager', 'image_update'),
('Clip Editor', 'image_update'),
('Image Manager', 'image_update'),
('Manager', 'image_update'),
('News Editor', 'image_update'),
('Product Editor', 'image_update'),
('Product Manager', 'image_update'),
('Video Editor', 'image_update'),
('Video Manager', 'image_update'),
('Album Editor', 'image_updateInfo'),
('Album Manager', 'image_updateInfo'),
('Clip Editor', 'image_updateInfo'),
('Image Manager', 'image_updateInfo'),
('Manager', 'image_updateInfo'),
('News Editor', 'image_updateInfo'),
('Product Editor', 'image_updateInfo'),
('Product Manager', 'image_updateInfo'),
('Video Editor', 'image_updateInfo'),
('Video Manager', 'image_updateInfo'),
('Album Editor', 'image_upload'),
('Album Manager', 'image_upload'),
('Clip Editor', 'image_upload'),
('Image Manager', 'image_upload'),
('Manager', 'image_upload'),
('News Editor', 'image_upload'),
('Product Editor', 'image_upload'),
('Product Manager', 'image_upload'),
('Video Editor', 'image_upload'),
('Video Manager', 'image_upload'),
('Manager', 'Intro manager'),
('Intro manager', 'intro_autoSave'),
('Manager', 'intro_autoSave'),
('Intro manager', 'intro_checkbox'),
('Manager', 'intro_checkbox'),
('Intro manager', 'intro_copy'),
('Manager', 'intro_copy'),
('Intro manager', 'intro_create'),
('Manager', 'intro_create'),
('Intro manager', 'intro_delete'),
('Manager', 'intro_delete'),
('Intro manager', 'intro_edit'),
('Manager', 'intro_edit'),
('Intro manager', 'intro_index'),
('Manager', 'intro_index'),
('Intro manager', 'intro_reverseHome'),
('Manager', 'intro_reverseHome'),
('Intro manager', 'intro_reverseNew'),
('Manager', 'intro_reverseNew'),
('Intro manager', 'intro_reverseStatus'),
('Manager', 'intro_reverseStatus'),
('Intro manager', 'intro_suggestTitle'),
('Manager', 'intro_suggestTitle'),
('Intro manager', 'intro_update'),
('Manager', 'intro_update'),
('Intro manager', 'intro_updateSuggest'),
('Manager', 'intro_updateSuggest'),
('Intro manager', 'introCategory_create'),
('Manager', 'introCategory_create'),
('Intro manager', 'introCategory_delete'),
('Manager', 'introCategory_delete'),
('Intro manager', 'introCategory_index'),
('Manager', 'introCategory_index'),
('Intro manager', 'introCategory_update'),
('Manager', 'introCategory_update'),
('Intro manager', 'introCategory_updateListOrderView'),
('Manager', 'introCategory_updateListOrderView'),
('Intro manager', 'introCategory_validate'),
('Manager', 'introCategory_validate'),
('Intro manager', 'introCategory_write'),
('Manager', 'introCategory_write'),
('Manager', 'News Editor'),
('Manager', 'news_autoSave'),
('News Editor', 'news_autoSave'),
('Manager', 'news_checkbox'),
('News Editor', 'news_checkbox'),
('Manager', 'news_copy'),
('News Editor', 'news_copy'),
('Manager', 'news_create'),
('News Editor', 'news_create'),
('Manager', 'news_delete'),
('News Editor', 'news_delete'),
('Manager', 'news_edit'),
('News Editor', 'news_edit'),
('Manager', 'news_index'),
('News Editor', 'news_index'),
('Manager', 'news_reverseHome'),
('News Editor', 'news_reverseHome'),
('Manager', 'news_reverseNew'),
('News Editor', 'news_reverseNew'),
('Manager', 'news_reverseStatus'),
('News Editor', 'news_reverseStatus'),
('Manager', 'news_suggestTitle'),
('News Editor', 'news_suggestTitle'),
('Manager', 'news_update'),
('News Editor', 'news_update'),
('Manager', 'news_updateSuggest'),
('News Editor', 'news_updateSuggest'),
('Manager', 'newsCategory_create'),
('News Editor', 'newsCategory_create'),
('Manager', 'newsCategory_delete'),
('News Editor', 'newsCategory_delete'),
('Manager', 'newsCategory_index'),
('News Editor', 'newsCategory_index'),
('Manager', 'newsCategory_update'),
('News Editor', 'newsCategory_update'),
('Manager', 'newsCategory_updateListOrderView'),
('News Editor', 'newsCategory_updateListOrderView'),
('Manager', 'newsCategory_validate'),
('News Editor', 'newsCategory_validate'),
('Manager', 'newsCategory_write'),
('News Editor', 'newsCategory_write'),
('Manager', 'Order Manager'),
('Manager', 'order_checkbox'),
('Order Manager', 'order_checkbox'),
('Manager', 'order_delete'),
('Order Manager', 'order_delete'),
('Manager', 'order_index'),
('Order Manager', 'order_index'),
('Manager', 'order_reverseStatus'),
('Order Manager', 'order_reverseStatus'),
('Manager', 'order_updateForm'),
('Order Manager', 'order_updateForm'),
('Manager', 'order_write'),
('Order Manager', 'order_write'),
('Manager', 'Partner Manager'),
('Partner Manager', 'partner_autoSave'),
('Partner Manager', 'partner_checkbox'),
('Partner Manager', 'partner_copy'),
('Partner Manager', 'partner_create'),
('Partner Manager', 'partner_delete'),
('Partner Manager', 'partner_edit'),
('Partner Manager', 'partner_index'),
('Partner Manager', 'partner_reverseHome'),
('Partner Manager', 'partner_reverseNew'),
('Partner Manager', 'partner_reverseStatus'),
('Partner Manager', 'partner_suggestTitle'),
('Partner Manager', 'partner_update'),
('Partner Manager', 'partner_updateSuggest'),
('Partner Manager', 'partnerCategory_create'),
('Partner Manager', 'partnerCategory_delete'),
('Partner Manager', 'partnerCategory_index'),
('Partner Manager', 'partnerCategory_update'),
('Partner Manager', 'partnerCategory_updateListOrderView'),
('Partner Manager', 'partnerCategory_validate'),
('Partner Manager', 'partnerCategory_write'),
('Manager', 'Product Manager'),
('Manager', 'product_autoSave'),
('Product Manager', 'product_autoSave'),
('Manager', 'product_checkbox'),
('Product Editor', 'product_checkbox'),
('Product Manager', 'product_checkbox'),
('Manager', 'product_copy'),
('Product Editor', 'product_copy'),
('Product Manager', 'product_copy'),
('Manager', 'product_create'),
('Product Editor', 'product_create'),
('Product Manager', 'product_create'),
('Manager', 'product_delete'),
('Product Editor', 'product_delete'),
('Product Manager', 'product_delete'),
('Manager', 'product_edit'),
('Product Editor', 'product_edit'),
('Product Manager', 'product_edit'),
('Manager', 'product_index'),
('Product Editor', 'product_index'),
('Product Manager', 'product_index'),
('Manager', 'product_reverseHome'),
('Product Editor', 'product_reverseHome'),
('Product Manager', 'product_reverseHome'),
('Manager', 'product_reverseNew'),
('Product Editor', 'product_reverseNew'),
('Product Manager', 'product_reverseNew'),
('Manager', 'product_reverseSale'),
('Product Editor', 'product_reverseSale'),
('Product Manager', 'product_reverseSale'),
('Manager', 'product_reverseStatus'),
('Product Editor', 'product_reverseStatus'),
('Product Manager', 'product_reverseStatus'),
('Manager', 'product_suggestName'),
('Product Editor', 'product_suggestName'),
('Product Manager', 'product_suggestName'),
('Manager', 'product_update'),
('Product Editor', 'product_update'),
('Product Manager', 'product_update'),
('Manager', 'product_updateSuggest'),
('Product Editor', 'product_updateSuggest'),
('Product Manager', 'product_updateSuggest'),
('Manager', 'productCategory_create'),
('Product Editor', 'productCategory_create'),
('Product Manager', 'productCategory_create'),
('Manager', 'productCategory_delete'),
('Product Editor', 'productCategory_delete'),
('Product Manager', 'productCategory_delete'),
('Manager', 'productCategory_index'),
('Product Editor', 'productCategory_index'),
('Product Manager', 'productCategory_index'),
('Manager', 'productCategory_update'),
('Product Editor', 'productCategory_update'),
('Product Manager', 'productCategory_update'),
('Manager', 'productCategory_updateListOrderView'),
('Product Editor', 'productCategory_updateListOrderView'),
('Product Manager', 'productCategory_updateListOrderView'),
('Manager', 'productCategory_validate'),
('Product Editor', 'productCategory_validate'),
('Product Manager', 'productCategory_validate'),
('Manager', 'productCategory_write'),
('Product Editor', 'productCategory_write'),
('Product Manager', 'productCategory_write'),
('Product Manager', 'productCityCategory_create'),
('Product Manager', 'productCityCategory_delete'),
('Product Manager', 'productCityCategory_index'),
('Product Manager', 'productCityCategory_update'),
('Product Manager', 'productCityCategory_updateListOrderView'),
('Product Manager', 'productCityCategory_validate'),
('Product Manager', 'productCityCategory_write'),
('Manager', 'QA Manager'),
('Manager', 'qa_checkbox'),
('QA Manager', 'qa_checkbox'),
('Manager', 'qa_copy'),
('QA Manager', 'qa_copy'),
('Manager', 'qa_create'),
('QA Manager', 'qa_create'),
('Manager', 'qa_delete'),
('QA Manager', 'qa_delete'),
('Manager', 'qa_edit'),
('QA Manager', 'qa_edit'),
('Manager', 'qa_index'),
('QA Manager', 'qa_index'),
('Manager', 'qa_reverseHome'),
('QA Manager', 'qa_reverseHome'),
('Manager', 'qa_reverseNew'),
('QA Manager', 'qa_reverseNew'),
('Manager', 'qa_reverseStatus'),
('QA Manager', 'qa_reverseStatus'),
('Manager', 'qa_suggestTitle'),
('QA Manager', 'qa_suggestTitle'),
('Manager', 'qa_update'),
('QA Manager', 'qa_update'),
('Manager', 'qa_updateSuggest'),
('QA Manager', 'qa_updateSuggest'),
('Manager', 'QaAnswer Manager'),
('Manager', 'qaAnswer_checkbox'),
('QaAnswer Manager', 'qaAnswer_checkbox'),
('Manager', 'qaAnswer_create'),
('QaAnswer Manager', 'qaAnswer_create'),
('Manager', 'qaAnswer_delete'),
('QaAnswer Manager', 'qaAnswer_delete'),
('Manager', 'qaAnswer_edit'),
('QaAnswer Manager', 'qaAnswer_edit'),
('Manager', 'qaAnswer_index'),
('QaAnswer Manager', 'qaAnswer_index'),
('Manager', 'qaAnswer_reverseStatus'),
('QaAnswer Manager', 'qaAnswer_reverseStatus'),
('Manager', 'qaAnswer_suggestTitle'),
('QaAnswer Manager', 'qaAnswer_suggestTitle'),
('Manager', 'qaAnswer_update'),
('QaAnswer Manager', 'qaAnswer_update'),
('Manager', 'qaAnswer_updateSuggest'),
('QaAnswer Manager', 'qaAnswer_updateSuggest'),
('Manager', 'qaCategory_create'),
('QA Manager', 'qaCategory_create'),
('Manager', 'qaCategory_delete'),
('QA Manager', 'qaCategory_delete'),
('Manager', 'qaCategory_index'),
('QA Manager', 'qaCategory_index'),
('Manager', 'qaCategory_update'),
('QA Manager', 'qaCategory_update'),
('Manager', 'qaCategory_updateListOrderView'),
('QA Manager', 'qaCategory_updateListOrderView'),
('Manager', 'qaCategory_validate'),
('QA Manager', 'qaCategory_validate'),
('Manager', 'qaCategory_write'),
('QA Manager', 'qaCategory_write'),
('Manager', 'Setting Manager'),
('Manager', 'setting_edit'),
('Setting Manager', 'setting_edit'),
('Manager', 'setting_index'),
('Setting Manager', 'setting_index'),
('Setting Manager', 'setting_information'),
('Setting Manager', 'setting_seo'),
('Manager', 'setting_suggestName'),
('Setting Manager', 'setting_suggestName'),
('Manager', 'setting_updateForm'),
('Setting Manager', 'setting_updateForm'),
('Manager', 'Share Manager'),
('Manager', 'share_checkbox'),
('Share Manager', 'share_checkbox'),
('Manager', 'share_copy'),
('Share Manager', 'share_copy'),
('Manager', 'share_create'),
('Share Manager', 'share_create'),
('Manager', 'share_delete'),
('Share Manager', 'share_delete'),
('Manager', 'share_edit'),
('Share Manager', 'share_edit'),
('Manager', 'share_index'),
('Share Manager', 'share_index'),
('Manager', 'share_reverseHome'),
('Share Manager', 'share_reverseHome'),
('Manager', 'share_reverseNew'),
('Share Manager', 'share_reverseNew'),
('Manager', 'share_reverseStatus'),
('Share Manager', 'share_reverseStatus'),
('Manager', 'share_suggestTitle'),
('Share Manager', 'share_suggestTitle'),
('Manager', 'share_update'),
('Share Manager', 'share_update'),
('Manager', 'share_updateSuggest'),
('Share Manager', 'share_updateSuggest'),
('Manager', 'shareCategory_create'),
('Share Manager', 'shareCategory_create'),
('Manager', 'shareCategory_delete'),
('Share Manager', 'shareCategory_delete'),
('Manager', 'shareCategory_index'),
('Share Manager', 'shareCategory_index'),
('Manager', 'shareCategory_update'),
('Share Manager', 'shareCategory_update'),
('Manager', 'shareCategory_updateListOrderView'),
('Share Manager', 'shareCategory_updateListOrderView'),
('Manager', 'shareCategory_validate'),
('Share Manager', 'shareCategory_validate'),
('Manager', 'shareCategory_write'),
('Share Manager', 'shareCategory_write'),
('Manager', 'site_home'),
('Manager', 'supporter_checkbox'),
('Manager', 'supporter_copy'),
('Manager', 'supporter_delete'),
('Manager', 'supporter_edit'),
('Manager', 'supporter_index'),
('Manager', 'supporter_reverseStatus'),
('Manager', 'supporter_suggestName'),
('Manager', 'supporter_updateForm'),
('Manager', 'supporter_write'),
('Manager', 'Textlink Manager'),
('Manager', 'textlink_autoSave'),
('Textlink Manager', 'textlink_autoSave'),
('Manager', 'textlink_checkbox'),
('Textlink Manager', 'textlink_checkbox'),
('Manager', 'textlink_copy'),
('Textlink Manager', 'textlink_copy'),
('Manager', 'textlink_create'),
('Textlink Manager', 'textlink_create'),
('Manager', 'textlink_delete'),
('Textlink Manager', 'textlink_delete'),
('Manager', 'textlink_edit'),
('Textlink Manager', 'textlink_edit'),
('Manager', 'textlink_index'),
('Textlink Manager', 'textlink_index'),
('Manager', 'textlink_reverseHome'),
('Textlink Manager', 'textlink_reverseHome'),
('Manager', 'textlink_reverseNew'),
('Textlink Manager', 'textlink_reverseNew'),
('Manager', 'textlink_reverseStatus'),
('Textlink Manager', 'textlink_reverseStatus'),
('Manager', 'textlink_suggestTitle'),
('Textlink Manager', 'textlink_suggestTitle'),
('Manager', 'textlink_update'),
('Textlink Manager', 'textlink_update'),
('Manager', 'textlink_updateSuggest'),
('Textlink Manager', 'textlink_updateSuggest'),
('Manager', 'textLinkCategory_create'),
('Textlink Manager', 'textLinkCategory_create'),
('Manager', 'textLinkCategory_delete'),
('Textlink Manager', 'textLinkCategory_delete'),
('Manager', 'textLinkCategory_index'),
('Textlink Manager', 'textLinkCategory_index'),
('Manager', 'textLinkCategory_update'),
('Textlink Manager', 'textLinkCategory_update'),
('Manager', 'textLinkCategory_updateListOrderView'),
('Textlink Manager', 'textLinkCategory_updateListOrderView'),
('Manager', 'textLinkCategory_validate'),
('Textlink Manager', 'textLinkCategory_validate'),
('Manager', 'textLinkCategory_write'),
('Textlink Manager', 'textLinkCategory_write'),
('Manager', 'user_checkbox'),
('Manager', 'user_delete'),
('Manager', 'user_index'),
('Manager', 'user_resetPassword'),
('Manager', 'user_reverseStatus'),
('Manager', 'user_suggestEmail'),
('Manager', 'user_updateForm'),
('Manager', 'user_write'),
('Manager', 'userMenu_create'),
('Manager', 'userMenu_delete'),
('Manager', 'userMenu_index'),
('Manager', 'userMenu_update'),
('Manager', 'userMenu_validate'),
('Manager', 'userMenu_write'),
('Manager', 'Video Manager'),
('Manager', 'video_checkbox'),
('Video Editor', 'video_checkbox'),
('Video Manager', 'video_checkbox'),
('Manager', 'video_copy'),
('Video Editor', 'video_copy'),
('Video Manager', 'video_copy'),
('Manager', 'video_create'),
('Video Editor', 'video_create'),
('Video Manager', 'video_create'),
('Manager', 'video_delete'),
('Video Editor', 'video_delete'),
('Video Manager', 'video_delete'),
('Manager', 'video_edit'),
('Video Editor', 'video_edit'),
('Video Manager', 'video_edit'),
('Manager', 'video_index'),
('Video Editor', 'video_index'),
('Video Manager', 'video_index'),
('Manager', 'video_reverseHome'),
('Video Editor', 'video_reverseHome'),
('Video Manager', 'video_reverseHome'),
('Manager', 'video_reverseNew'),
('Video Editor', 'video_reverseNew'),
('Video Manager', 'video_reverseNew'),
('Manager', 'video_reverseStatus'),
('Video Editor', 'video_reverseStatus'),
('Video Manager', 'video_reverseStatus'),
('Manager', 'video_suggestName'),
('Video Editor', 'video_suggestName'),
('Video Manager', 'video_suggestName'),
('Manager', 'video_update'),
('Video Editor', 'video_update'),
('Video Manager', 'video_update'),
('Manager', 'video_updateSuggest'),
('Video Editor', 'video_updateSuggest'),
('Video Manager', 'video_updateSuggest'),
('Manager', 'videoCategory_create'),
('Video Editor', 'videoCategory_create'),
('Video Manager', 'videoCategory_create'),
('Manager', 'videoCategory_delete'),
('Video Editor', 'videoCategory_delete'),
('Video Manager', 'videoCategory_delete'),
('Manager', 'videoCategory_index'),
('Video Editor', 'videoCategory_index'),
('Video Manager', 'videoCategory_index'),
('Manager', 'videoCategory_update'),
('Video Editor', 'videoCategory_update'),
('Video Manager', 'videoCategory_update'),
('Manager', 'videoCategory_updateListOrderView'),
('Video Editor', 'videoCategory_updateListOrderView'),
('Video Manager', 'videoCategory_updateListOrderView'),
('Manager', 'videoCategory_validate'),
('Video Editor', 'videoCategory_validate'),
('Video Manager', 'videoCategory_validate'),
('Manager', 'videoCategory_write'),
('Video Editor', 'videoCategory_write'),
('Video Manager', 'videoCategory_write');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_view` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `other` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=189 ;

--
-- Dumping data for table `tbl_admin_menu`
--

INSERT INTO `tbl_admin_menu` (`id`, `type`, `name`, `parent_id`, `order_view`, `status`, `other`, `created_by`, `created_time`) VALUES
(1, 1, 'News', 0, 7, 1, '{"controller":"news","action":"index","description":"","params":"","modified":"{\\"1356774504\\":\\"1\\",\\"1358744747\\":\\"1\\"}","key_url":"news_index"}', 1, 1345279996),
(11, 1, 'Video', 0, 22, 0, '{"controller":"galleryVideo","action":"index","description":"","params":"","modified":"{\\"1356429840\\":\\"1\\",\\"1356774504\\":\\"1\\",\\"1358180726\\":\\"1\\",\\"1358744747\\":\\"1\\",\\"1362043425\\":\\"1\\",\\"1363338254\\":\\"1\\"}","introimage":"","external_link":"","key_url":"video_index"}', 1, 1345280314),
(12, 1, 'List Videos', 11, 1, 1, '{"controller":"galleryVideo","action":"index","description":"","params":"","key_url":"video_index"}', 1, 1345280325),
(13, 1, 'Add Video', 11, 2, 1, '{"controller":"galleryVideo","action":"create","description":"","params":"","key_url":"videoCategory_index"}', 1, 1345280346),
(14, 1, 'Banner', 174, 4, 1, '{"controller":"banner","action":"index","description":"","params":"","modified":"{\\"1356774504\\":\\"1\\",\\"1358180726\\":\\"1\\",\\"1358744747\\":\\"1\\",\\"1362043425\\":\\"1\\",\\"1363338254\\":\\"1\\",\\"1363338279\\":\\"1\\",\\"1364806154\\":\\"1\\"}","introimage":"","external_link":"","key_url":"banner_index"}', 1, 1345280381),
(15, 1, 'Advisors', 174, 5, 0, '{"controller":"support","action":"index","description":"","params":"","modified":"{\\"1345285483\\":\\"1\\",\\"1345285504\\":\\"1\\",\\"1352959953\\":\\"1\\",\\"1356774504\\":\\"1\\",\\"1358180726\\":\\"1\\",\\"1358743322\\":\\"1\\",\\"1358744747\\":\\"1\\",\\"1362029761\\":\\"1\\",\\"1362043425\\":\\"1\\",\\"1363338254\\":\\"1\\",\\"1363338279\\":\\"1\\",\\"1363338341\\":\\"1\\"}","introimage":"","external_link":"","key_url":"supporter_index"}', 1, 1345281894),
(18, 1, 'Contact', 174, 8, 1, '{"controller":"contact","action":"index","description":"","params":"","modified":"{\\"1356774504\\":\\"1\\",\\"1358180726\\":\\"1\\",\\"1358744747\\":\\"1\\",\\"1362043425\\":\\"1\\",\\"1363338254\\":\\"1\\",\\"1363338279\\":\\"1\\",\\"1363338341\\":\\"1\\",\\"1363338920\\":\\"1\\"}","key_url":"contact_index"}', 1, 1345281941),
(30, 1, 'Parameter', 0, 21, 1, '{"controller":"setting","action":"index","description":"","params":"","modified":"{\\"1345282873\\":\\"1\\"}","key_url":"setting_seo"}', 1, 1345282373),
(31, 1, 'Comments', 174, 7, 1, '{"controller":"comment","action":"index","description":"","params":"","modified":"{\\"1345284902\\":\\"1\\",\\"1356774504\\":\\"1\\",\\"1358180726\\":\\"1\\",\\"1358744692\\":\\"1\\",\\"1358744747\\":\\"1\\",\\"1362043425\\":\\"1\\",\\"1363338254\\":\\"1\\",\\"1363338279\\":\\"1\\",\\"1363338342\\":\\"1\\",\\"1363338920\\":\\"1\\"}","introimage":"","external_link":"","key_url":"comment_index"}', 1, 1345284893),
(32, 1, 'User', 174, 6, 0, '{"controller":"user","action":"index","description":"","params":"","modified":"{\\"1345395364\\":\\"1\\",\\"1345428152\\":\\"1\\",\\"1345428161\\":\\"1\\",\\"1356774504\\":\\"1\\",\\"1358180726\\":\\"1\\",\\"1358744747\\":\\"1\\",\\"1362029572\\":\\"1\\",\\"1362043425\\":\\"1\\",\\"1363338254\\":\\"1\\",\\"1363338279\\":\\"1\\",\\"1363338342\\":\\"1\\",\\"1363338920\\":\\"1\\",\\"1364959549\\":\\"1\\"}","introimage":"","external_link":"","key_url":"user_index"}', 1, 1345395356),
(43, 1, 'Help', 0, 22, 0, '{"introimage":"","controller":"help","action":"view","external_link":"","description":"","params":"","modified":"{\\"1356429737\\":\\"1\\",\\"1356430828\\":\\"1\\",\\"1356774504\\":\\"1\\",\\"1356774739\\":\\"1\\",\\"1358180726\\":\\"1\\",\\"1358744747\\":\\"1\\",\\"1361335207\\":\\"1\\",\\"1362043425\\":\\"1\\",\\"1363338254\\":\\"1\\",\\"1363338279\\":\\"1\\",\\"1363338342\\":\\"1\\",\\"1363338920\\":\\"1\\"}","key_url":"help_index"}', 1, 1354875098),
(57, 1, 'Tour', 0, 6, 0, '{"introimage":"","controller":"product","action":"index","external_link":"","description":"","params":"","modified":"{\\"1358180726\\":\\"1\\",\\"1358744747\\":\\"1\\",\\"1362034076\\":\\"1\\"}","key_url":"product_index"}', 1, 1358180713),
(58, 1, 'List Tour', 57, 1, 1, '{"introimage":"","controller":"product","action":"index","external_link":"","description":"","params":"","modified":"{\\"1358180794\\":\\"1\\",\\"1358180800\\":\\"1\\",\\"1362034146\\":\\"1\\"}","key_url":"product_index"}', 1, 1358180745),
(59, 1, 'Add Tour', 57, 2, 1, '{"introimage":"","controller":"product","action":"create","external_link":"","description":"","params":"","modified":"{\\"1362034155\\":\\"1\\"}","key_url":"product_create"}', 1, 1358180774),
(63, 1, 'Tour Categories', 57, 3, 1, '{"introimage":"","controller":"product","action":"manager_category","external_link":"","description":"","params":"","modified":"{\\"1362034171\\":\\"1\\"}","key_url":"productCategory_index"}', 1, 1359100069),
(76, 1, 'Menu', 174, 2, 1, '{"introimage":"","controller":"menu","action":"manager","params":"{\\"type\\":2}","external_link":"","description":"","modified":"{\\"1363338254\\":\\"1\\",\\"1363338279\\":\\"1\\",\\"1363338342\\":\\"1\\",\\"1363338920\\":\\"1\\",\\"1364959642\\":\\"1\\"}","key_url":"userMenu_index"}', 1, 1363337607),
(96, 1, 'Video Categories', 11, 3, 1, '{"key_url":"news_index"}', 1, 1366615454),
(97, 1, 'Album', 0, 22, 0, '{"key_url":"album_index"}', 1, 1366615502),
(98, 1, 'List Albums', 97, 1, 1, '{"key_url":"album_index"}', 1, 1366619434),
(99, 1, 'Add Album', 97, 2, 1, '{"key_url":"album_create"}', 1, 1366619444),
(100, 1, 'Album Categories', 97, 3, 1, '{"key_url":"albumCategory_index"}', 1, 1366619473),
(103, 0, 'Order', 0, 20, 0, '{"key_url":"order_index"}', 1, 1367048676),
(107, 0, 'HOME', 0, 3, 1, '{"key_url":"site_home"}', 41, 1367470601),
(108, 0, 'Analytics', 174, 1, 1, '{"key_url":"google_analytics"}', 41, 1367471156),
(110, 0, 'SEO''s Parameters', 30, 1, 1, '{"key_url":"setting_seo"}', 0, 1367651961),
(111, 0, 'Contact Informations', 30, 1, 1, '{"key_url":"setting_information"}', 0, 1367651982),
(112, 0, 'Video', 175, 1, 1, '{"key_url":"clip_index"}', 0, 1368501921),
(113, 0, 'List Videos', 112, 1, 1, '{"key_url":"clip_index"}', 0, 1368501932),
(114, 0, 'Add Video', 112, 2, 1, '{"key_url":"clip_create"}', 0, 1368501947),
(115, 0, 'Video Categories', 112, 1, 1, '{"key_url":"clipCategory_index"}', 0, 1368501962),
(116, 0, 'FQAs', 0, 11, 0, '{"key_url":"qa_index"}', 0, 1369277455),
(117, 0, 'List FQAs', 116, 1, 1, '{"key_url":"qa_index"}', 0, 1369277744),
(118, 0, 'Add FQA', 116, 1, 1, '{"key_url":"qa_create"}', 0, 1369277760),
(119, 0, 'Share', 0, 22, 0, '{"key_url":"share_index"}', 0, 1369279184),
(120, 0, 'List Shares', 119, 1, 1, '{"key_url":"share_index"}', 0, 1369279204),
(121, 0, 'Add Share', 119, 1, 1, '{"key_url":"share_create"}', 0, 1369279215),
(123, 0, 'List News', 1, 3, 1, '{"key_url":"news_index"}', 0, 1371797338),
(124, 0, 'Add News', 1, 3, 1, '{"key_url":"news_create"}', 0, 1371797350),
(125, 0, 'News Categories', 1, 1, 1, '{"key_url":"newsCategory_index"}', 0, 1371797363),
(146, 0, 'City', 0, 19, 0, '{"key_url":"city_index"}', 0, 1371891835),
(147, 0, 'Recruitment', 0, 17, 0, '{"key_url":"image_index"}', 0, 1372064406),
(148, 0, 'List Recruitment', 147, 1, 1, '{"key_url":"image_index"}', 0, 1372127454),
(149, 0, 'Add Recruitment', 147, 1, 1, '{"key_url":"image_index"}', 0, 1372127468),
(150, 0, 'Recruitment Categories', 147, 3, 1, '{"key_url":"image_index"}', 0, 1372127481),
(151, 0, 'Trình dược viên', 0, 10, 0, '{"key_url":"seller_index"}', 0, 1372129402),
(152, 0, 'Danh mục trình dược viên', 151, 2, 1, '{"key_url":"sellerCategory_index"}', 0, 1372129438),
(153, 0, 'Thêm mới trình dược viên', 151, 1, 1, '{"key_url":"seller_create"}', 0, 1372129450),
(154, 0, 'Danh sách trình dược viên', 151, 0, 1, '{"key_url":"seller_index"}', 0, 1372129463),
(155, 0, 'Store', 0, 4, 0, '{"key_url":"image_index"}', 0, 1372219182),
(156, 0, 'List Store', 155, 1, 1, '{"key_url":"image_index"}', 0, 1372219197),
(157, 0, 'Add Store', 155, 1, 1, '{"key_url":"image_index"}', 0, 1372219209),
(158, 0, 'List Cities', 146, 1, 1, '{"key_url":"city_index"}', 0, 1372995083),
(159, 0, 'Add City', 146, 1, 1, '{"key_url":"city_create"}', 0, 1372995100),
(160, 0, 'Pictures', 0, 14, 0, '{"key_url":"image_index"}', 0, 1375417733),
(162, 0, 'Introduction', 0, 12, 0, '{"key_url":"intro_index"}', 0, 1378698718),
(163, 0, 'Introduction categories', 162, 2, 1, '{"key_url":"introCategory_index"}', 0, 1378698761),
(164, 0, 'Add introduciton', 162, 1, 1, '{"key_url":"intro_create"}', 0, 1378698784),
(165, 0, 'Catalog', 0, 2, 0, '{"key_url":"document_index"}', 0, 1379931316),
(166, 0, 'Catalog Categories', 165, 1, 1, '{"key_url":"documentCagegory_index"}', 0, 1379931404),
(167, 0, 'Add Catalog', 165, 1, 1, '{"key_url":"document_create"}', 0, 1379931424),
(171, 0, 'Advisors', 0, 9, 0, '{"key_url":"advisor_index"}', 0, 1383558688),
(172, 0, 'Add Advisor', 171, 1, 1, '{"key_url":"advisor_create"}', 0, 1383558714),
(173, 0, 'Customers', 174, 3, 0, '{"key_url":"customer_index"}', 0, 1384144899),
(174, 0, 'Other', 0, 21, 1, '{"key_url":"image_index"}', 0, 1384145014),
(175, 0, 'Media', 0, 13, 0, '{"key_url":"video_index"}', 0, 1384225078),
(176, 0, 'Audio', 175, 2, 1, '{"key_url":"audio_index"}', 0, 1384225171),
(177, 0, 'List Audios', 176, 1, 1, '{"key_url":"audio_index"}', 0, 1384225193),
(178, 0, 'Add Audio', 176, 1, 1, '{"key_url":"audio_create"}', 0, 1384225209),
(179, 0, 'Audio Categories', 176, 3, 1, '{"key_url":"audioCategory_index"}', 0, 1384225228),
(180, 0, 'Partner', 0, 18, 0, '{"key_url":"partner_index"}', 0, 1387531921),
(181, 0, 'Add Partner', 180, 1, 1, '{"key_url":"partner_create"}', 0, 1387531964),
(182, 0, 'Partner Categories', 180, 1, 1, '{"key_url":"partnerCategory_index"}', 0, 1387531989),
(183, 0, 'Provinces/Cities', 57, 4, 1, '{"key_url":"productCityCategory_index"}', 0, 1388726706),
(184, 0, 'Product', 0, 5, 1, '{"key_url":"product_index"}', 0, 1410168246),
(185, 0, 'Product Categories', 184, 2, 1, '{"key_url":"productCategory_index"}', 0, 1410168329),
(186, 0, 'List Product', 184, 1, 1, '{"key_url":"product_index"}', 0, 1410168357),
(187, 0, 'Add Product', 184, 0, 1, '{"key_url":"product_create"}', 0, 1410168387),
(188, 0, 'Supporter', 174, 9, 1, '{"key_url":"supporter_index"}', 0, 1410234615);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advisor`
--

CREATE TABLE IF NOT EXISTS `tbl_advisor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `other` text NOT NULL,
  `visits` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE IF NOT EXISTS `tbl_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL DEFAULT 'vi',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT '0',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `order_view` int(11) NOT NULL DEFAULT '1',
  `other` varchar(1024) NOT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`id`, `language`, `status`, `name`, `cat_id`, `home`, `new`, `order_view`, `other`, `visits`, `created_by`, `created_time`) VALUES
(1, 'vi', 1, 'Du lịch Phố Cổ Hà Nội', 13, 0, 0, 1, '{"meta_title":"Du l\\u1ecbch Ph\\u1ed1 C\\u1ed5 H\\u00e0 N\\u1ed9i","meta_keyword":"Du l\\u1ecbch Ph\\u1ed1 C\\u1ed5 H\\u00e0 N\\u1ed9i","meta_description":"Du l\\u1ecbch Ph\\u1ed1 C\\u1ed5 H\\u00e0 N\\u1ed9i"}', 0, 1, 1387354353);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album_image`
--

CREATE TABLE IF NOT EXISTS `tbl_album_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_album_image`
--

INSERT INTO `tbl_album_image` (`id`, `album_id`, `image_id`) VALUES
(1, 1, 25),
(2, 1, 26),
(3, 1, 27),
(4, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audio`
--

CREATE TABLE IF NOT EXISTS `tbl_audio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL DEFAULT 'vi',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `file_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) unsigned NOT NULL,
  `order_view` int(11) NOT NULL DEFAULT '1',
  `home` int(11) NOT NULL DEFAULT '0',
  `new` int(11) NOT NULL DEFAULT '0',
  `other` varchar(1024) NOT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_audio`
--

INSERT INTO `tbl_audio` (`id`, `language`, `status`, `name`, `file_id`, `cat_id`, `introimage_id`, `order_view`, `home`, `new`, `other`, `visits`, `created_by`, `created_time`) VALUES
(1, 'vi', 1, ' Bonjour Vietnam', 31, 12, 30, 1, 0, 0, '{"meta_title":" Bonjour Vietnam","meta_keyword":" Bonjour Vietnam","meta_description":" Bonjour Vietnam"}', 0, 1, 1387339121);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL DEFAULT 'vi',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `cat` tinyint(4) NOT NULL,
  `image_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL DEFAULT '1',
  `other` varchar(1024) NOT NULL,
  `created_time` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `language`, `status`, `name`, `cat`, `image_id`, `order_view`, `other`, `created_time`, `created_by`, `clicks`) VALUES
(1, 'vi', 1, 'Chúng tôi luôn mang lại cho bạn những điều tốt nhất', 0, 6, 0, '{"slogan":"","url":"#","description":"C\\u00f4ng ty TNHH D\\u01b0\\u1ee3c ph\\u1ea9m \\u00c1 \\u00c2u \\u0111\\u01b0\\u1ee3c th\\u00e0nh l\\u1eadp ng\\u00e0y  23\\/11\\/2005 v\\u1edbi ph\\u01b0\\u01a1ng ch\\u00e2m \\"Mang l\\u1ea1i ni\\u1ec1m tin s\\u1ee9c kh\\u1ecfe cho ng\\u01b0\\u1eddi ti\\u00eau d\\u00f9ng\\"..."}', 1385625187, 1, 0),
(2, 'vi', 1, 'Luôn luôn bên bạn, dù bạn nơi đâu - Spaphar', 0, 3, 0, '{"url":"#","description":"Hi\\u1ec7n nay, C\\u00f4ng ty nhanh ch\\u00f3ng ph\\u00e1t tri\\u1ec3n r\\u1ed9ng l\\u1edbn kh\\u00f4ng ch\\u1ec9 v\\u1ec1 ngu\\u1ed3n nh\\u00e2n l\\u1ef1c, m\\u00e0 c\\u00f2n d\\u1eabn \\u0111\\u1ea7u th\\u1ecb tr\\u01b0\\u1eddng d\\u01b0\\u1ee3c ph\\u1ea9m \\u1edf Vi\\u1ec7t Nam, theo xu h\\u01b0\\u1edbng v\\u01b0\\u01a1n ra Qu\\u1ed1c t\\u1ebf."}', 1385628928, 1, 0),
(3, 'vi', 1, 'Công ty TNHH Châu Hưng', 4, 7, 0, '{"url":"#","description":""}', 1385635920, 1, 0),
(4, 'vi', 1, 'Công ty TNHH Dược phẩm Á Âu', 4, 8, 0, '{"url":"#","description":""}', 1385635940, 1, 0),
(5, 'vi', 1, 'Công ty IMC', 4, 9, 0, '{"url":"#","description":""}', 1385635964, 1, 0),
(6, 'vi', 1, 'logo', 7, 47, 0, '{"url":"http:\\/\\/localhost\\/website_sangovietphat\\/","description":""}', 1410230400, 1, 0),
(7, 'vi', 1, 'Banner đối tác', 4, 49, 0, '{"url":"#","description":""}', 1410247127, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE IF NOT EXISTS `tbl_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `other` text NOT NULL,
  `created_time` int(11) NOT NULL,
  `plan_date` int(11) unsigned NOT NULL,
  `plan_month` int(11) unsigned NOT NULL,
  `places` varchar(256) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` int(64) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `nationality` varchar(64) NOT NULL,
  `address` varchar(256) NOT NULL,
  `country` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `allow_call` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `type` tinyint(3) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_view` tinyint(4) NOT NULL DEFAULT '1',
  `other` mediumtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `language`, `type`, `status`, `name`, `alias`, `parent_id`, `order_view`, `other`, `created_by`, `created_time`) VALUES
(1, 'vi', 4, 1, 'ThaiGreen', 'thaigreen', 0, 1, '{"introimage_id":"40","meta_title":"ThaiGreen","meta_keyword":"ThaiGreen","meta_description":"ThaiGreen","description":"","extra":"","other_field_title":"","other_field_content":"","boximage_id":"54"}', 1, 1385630259),
(2, 'vi', 3, 1, 'Tin tức', 'tin-tuc', 0, 1, '{"meta_title":"Tin t\\u1ee9c","meta_keyword":"Tin t\\u1ee9c","meta_description":"Tin t\\u1ee9c"}', 1, 1385632788),
(3, 'vi', 3, 1, 'Giới thiệu', 'gioi-thieu', 0, 2, '{"meta_title":"Gi\\u1edbi thi\\u1ec7u","meta_keyword":"Gi\\u1edbi thi\\u1ec7u","meta_description":"Gi\\u1edbi thi\\u1ec7u"}', 1, 1385632797),
(4, 'vi', 5, 1, 'Quảng cáo', '', 0, 1, '{"meta_title":"Qu\\u1ea3ng c\\u00e1o","meta_keyword":"Qu\\u1ea3ng c\\u00e1o","meta_description":"Qu\\u1ea3ng c\\u00e1o"}', 1, 1385981457),
(5, 'vi', 4, 1, 'Sophia', 'sophia', 0, 2, '{"introimage_id":"41","meta_title":"Sophia","meta_keyword":"Sophia","meta_description":"Sophia","description":"","extra":"","boximage_id":"55"}', 1, 1386837744),
(8, 'vi', 11, 1, 'Giới thiệu website', '', 0, 2, '{"meta_title":"Gi\\u1edbi thi\\u1ec7u website","meta_keyword":"Gi\\u1edbi thi\\u1ec7u website","meta_description":"Gi\\u1edbi thi\\u1ec7u website"}', 1, 1387334094),
(9, 'vi', 3, 1, 'Hệ thống', 'he-thong', 0, 3, '{"meta_title":"H\\u1ec7 th\\u1ed1ng","meta_keyword":"H\\u1ec7 th\\u1ed1ng","meta_description":"H\\u1ec7 th\\u1ed1ng"}', 1, 1387335483),
(10, 'vi', 3, 1, 'Dự án', 'du-an', 0, 4, '{"meta_title":"D\\u1ef1 \\u00e1n","meta_keyword":"D\\u1ef1 \\u00e1n","meta_description":"D\\u1ef1 \\u00e1n"}', 1, 1387335658),
(12, 'vi', 6, 1, 'Nhạc nền', '', 0, 1, '{"meta_title":"Nh\\u1ea1c n\\u1ec1n","meta_keyword":"Nh\\u1ea1c n\\u1ec1n","meta_description":"Nh\\u1ea1c n\\u1ec1n"}', 1, 1387338572),
(13, 'vi', 1, 1, 'Travel', '', 0, 1, '{"type_view":"2","introimage_id":"","meta_title":"Travel","meta_keyword":"Travel","meta_description":"Travel"}', 1, 1387354077),
(16, 'vi', 11, 1, 'Giới thiệu tour', '', 0, 2, '{"meta_title":"Gi\\u1edbi thi\\u1ec7u tour","meta_keyword":"Gi\\u1edbi thi\\u1ec7u tour","meta_description":"Gi\\u1edbi thi\\u1ec7u tour"}', 1, 1387525080),
(17, 'vi', 12, 1, 'Cá nhân', '', 0, 1, '{"meta_title":"C\\u00e1 nh\\u00e2n","meta_keyword":"C\\u00e1 nh\\u00e2n","meta_description":"C\\u00e1 nh\\u00e2n"}', 1, 1387531305),
(18, 'vi', 12, 1, 'Doanh nghiệp', '', 0, 2, '{"meta_title":"Doanh nghi\\u1ec7p","meta_keyword":"Doanh nghi\\u1ec7p","meta_description":"Doanh nghi\\u1ec7p"}', 1, 1387531313),
(19, 'vi', 12, 1, 'Nhà nước', '', 0, 3, '{"meta_title":"Nh\\u00e0 n\\u01b0\\u1edbc","meta_keyword":"Nh\\u00e0 n\\u01b0\\u1edbc","meta_description":"Nh\\u00e0 n\\u01b0\\u1edbc"}', 1, 1387531319),
(21, 'vi', 13, 1, 'Hanoi', 'hanoi', 0, 1, '{"introimage_id":"","meta_title":"Hanoi","meta_keyword":"Hanoi","meta_description":"Hanoi","description":"<p><strong>Gi\\u1edbi thi\\u1ec7u v\\u1ec1 H&agrave; N\\u1ed9i<\\/strong><\\/p>","extra":"<p>Ph&aacute;t tri\\u1ec3n \\u0111\\u1ecba ph\\u01b0\\u01a1ng \\u1edf H&agrave; N\\u1ed9i<\\/p>"}', 1, 1388473952),
(23, 'vi', 13, 1, 'La baie d’Halong', 'la-baie-dhalong', 0, 3, '{"introimage_id":"","meta_title":"La baie d\\u2019Halong","meta_keyword":"La baie d\\u2019Halong","meta_description":"La baie d\\u2019Halong","description":"<div>\\r\\n<table cellspacing=\\"0\\" cellpadding=\\"0\\" align=\\"left\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\"padding-top: 0cm; padding-right: 7.05pt; padding-bottom: 0cm; padding-left: 7.05pt;\\" align=\\"left\\" valign=\\"top\\">\\r\\n<p><span lang=\\"FR\\"><span style=\\"color: windowtext;\\">La baie d&rsquo;Halong<\\/span><\\/span><\\/p>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>","extra":"<div>\\r\\n<table cellspacing=\\"0\\" cellpadding=\\"0\\" align=\\"left\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\"padding-top: 0cm; padding-right: 7.05pt; padding-bottom: 0cm; padding-left: 7.05pt;\\" align=\\"left\\" valign=\\"top\\">\\r\\n<p><span lang=\\"FR\\"><span style=\\"color: windowtext;\\">La baie d&rsquo;Halong<\\/span><\\/span><\\/p>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>"}', 1, 1388473997),
(24, 'vi', 13, 1, 'Tam Coc ou la baie d’Halong terrestre', 'tam-coc-ou-la-baie-dhalong-terrestre', 0, 1, '{"introimage_id":"","meta_title":"Tam Coc ou la baie d\\u2019Halong terrestre","meta_keyword":"Tam Coc ou la baie d\\u2019Halong terrestre","meta_description":"Tam Coc ou la baie d\\u2019Halong terrestre","description":"<div>\\r\\n<table cellspacing=\\"0\\" cellpadding=\\"0\\" align=\\"left\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\"padding-top: 0cm; padding-right: 7.05pt; padding-bottom: 0cm; padding-left: 7.05pt;\\" align=\\"left\\" valign=\\"top\\">\\r\\n<p><span lang=\\"FR\\"><span style=\\"color: windowtext;\\">Tam Coc ou la baie d&rsquo;Halong terrestre<\\/span><\\/span><\\/p>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>","extra":"<div>\\r\\n<table cellspacing=\\"0\\" cellpadding=\\"0\\" align=\\"left\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\"padding-top: 0cm; padding-right: 7.05pt; padding-bottom: 0cm; padding-left: 7.05pt;\\" align=\\"left\\" valign=\\"top\\">\\r\\n<p><span lang=\\"FR\\"><span style=\\"color: windowtext;\\">Tam Coc ou la baie d&rsquo;Halong terrestre<\\/span><\\/span><\\/p>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>"}', 1, 1388474078),
(25, 'vi', 13, 1, 'Mai chau', 'mai-chau', 0, 4, '{"introimage_id":"","meta_title":"Mai chau","meta_keyword":"Mai chau","meta_description":"Mai chau","description":"<p>Mai chau<\\/p>","extra":"<p>Mai chau<\\/p>"}', 1, 1388727508),
(26, 'vi', 13, 1, 'Ha Giang', 'ha-giang', 0, 5, '{"introimage_id":"","meta_title":"Ha Giang","meta_keyword":"Ha Giang","meta_description":"Ha Giang","description":"<p>Ha Giang<\\/p>","extra":""}', 1, 1388727544),
(27, 'vi', 13, 1, 'Sapa', 'sapa', 0, 6, '{"introimage_id":"","meta_title":"Sapa","meta_keyword":"Sapa","meta_description":"Sapa","description":"<p>Sapa<\\/p>","extra":"<p>Sapa<\\/p>"}', 1, 1388727566),
(28, 'vi', 13, 1, 'Bac Ha', 'bac-ha', 0, 7, '{"introimage_id":"","meta_title":"Bac Ha","meta_keyword":"Bac Ha","meta_description":"Bac Ha","description":"<p>Bac Ha<\\/p>","extra":""}', 1, 1388727634),
(29, 'vi', 13, 1, 'Lac de Ba Be', 'lac-de-ba-be', 0, 8, '{"introimage_id":"","meta_title":"Lac de Ba Be","meta_keyword":"Lac de Ba Be","meta_description":"Lac de Ba Be","description":"<p>Lac de Ba Be<\\/p>","extra":"<p>Lac de Ba Be<\\/p>"}', 1, 1388727652),
(30, 'vi', 13, 1, 'Cao Bang', 'cao-bang', 0, 9, '{"introimage_id":"","meta_title":"Cao Bang","meta_keyword":"Cao Bang","meta_description":"Cao Bang","description":"<p>Cao Bang<\\/p>","extra":"<p>Cao Bang<\\/p>"}', 1, 1388727670),
(31, 'vi', 13, 1, 'Hué', 'hue', 0, 10, '{"introimage_id":"","meta_title":"Hu\\u00e9","meta_keyword":"Hu\\u00e9","meta_description":"Hu\\u00e9","description":"<p>Hu&eacute;<\\/p>","extra":"<p>Hu&eacute;<\\/p>"}', 1, 1388730047),
(32, 'vi', 13, 1, 'Hoi An', 'hoi-an', 0, 11, '{"introimage_id":"","meta_title":"Hoi An","meta_keyword":"Hoi An","meta_description":"Hoi An","description":"<p>Hoi An<\\/p>","extra":"<p>Hoi An<\\/p>"}', 1, 1388730062),
(33, 'vi', 13, 1, 'Nha Trang', 'nha-trang', 0, 12, '{"introimage_id":"","meta_title":"Nha Trang","meta_keyword":"Nha Trang","meta_description":"Nha Trang","description":"<p>Nha Trang<\\/p>","extra":"<p>Nha Trang<\\/p>"}', 1, 1388730078),
(34, 'vi', 13, 1, 'Dalat', 'dalat', 0, 13, '{"introimage_id":"","meta_title":"Dalat","meta_keyword":"Dalat","meta_description":"Dalat","description":"<p>Dalat<\\/p>","extra":"<p>Dalat<\\/p>"}', 1, 1388730113),
(35, 'vi', 13, 1, 'My Son', 'my-son', 0, 14, '{"introimage_id":"","meta_title":"My Son","meta_keyword":"My Son","meta_description":"My Son","description":"<p>My Son<\\/p>","extra":""}', 1, 1388730125),
(36, 'vi', 13, 1, 'Danang', 'danang', 0, 15, '{"introimage_id":"","meta_title":"Danang","meta_keyword":"Danang","meta_description":"Danang","description":"<p>Danang<\\/p>","extra":"<p>Danang<\\/p>"}', 1, 1388730140),
(37, 'vi', 13, 1, 'Ile de Cu Lao Cham', 'ile-de-cu-lao-cham', 0, 16, '{"introimage_id":"","meta_title":"Ile de Cu Lao Cham","meta_keyword":"Ile de Cu Lao Cham","meta_description":"Ile de Cu Lao Cham","description":"<p>Ile de Cu Lao Cham<\\/p>","extra":"<p>Ile de Cu Lao Cham<\\/p>"}', 1, 1388730153),
(38, 'vi', 13, 1, 'Ho Chi Minh ville', 'ho-chi-minh-ville', 0, 17, '{"introimage_id":"","meta_title":"Ho Chi Minh ville","meta_keyword":"Ho Chi Minh ville","meta_description":"Ho Chi Minh ville","description":"<p>Ho Chi Minh ville<\\/p>","extra":"<p>Ho Chi Minh ville<\\/p>"}', 1, 1388730180),
(39, 'vi', 13, 1, 'Mui Ne', 'mui-ne', 0, 18, '{"introimage_id":"","meta_title":"Mui Ne","meta_keyword":"Mui Ne","meta_description":"Mui Ne","description":"<p>Mui Ne<\\/p>","extra":""}', 1, 1388730236),
(40, 'vi', 13, 1, 'Phu Quoc', 'phu-quoc', 0, 19, '{"introimage_id":"","meta_title":"Phu Quoc","meta_keyword":"Phu Quoc","meta_description":"Phu Quoc","description":"","extra":""}', 1, 1388730248),
(41, 'vi', 13, 1, 'Can Tho', 'can-tho', 0, 20, '{"introimage_id":"","meta_title":"Can Tho","meta_keyword":"Can Tho","meta_description":"Can Tho","description":"","extra":""}', 1, 1388730258),
(42, 'vi', 13, 1, 'Ben Tre', 'ben-tre', 0, 21, '{"introimage_id":"","meta_title":"Ben Tre","meta_keyword":"Ben Tre","meta_description":"Ben Tre","description":"","extra":""}', 1, 1388730269),
(43, 'vi', 13, 1, 'Le delta du Mékong', 'le-delta-du-mekong', 0, 22, '{"introimage_id":"","meta_title":"Le delta du M\\u00e9kong","meta_keyword":"Le delta du M\\u00e9kong","meta_description":"Le delta du M\\u00e9kong","description":"","extra":""}', 1, 1388730281),
(44, 'vi', 13, 1, 'Con Dao', 'con-dao', 0, 23, '{"introimage_id":"","meta_title":"Con Dao","meta_keyword":"Con Dao","meta_description":"Con Dao","description":"<p>Con Dao<\\/p>","extra":""}', 1, 1388730313),
(45, 'vi', 13, 1, 'Cu Chi', 'cu-chi', 0, 24, '{"introimage_id":"","meta_title":"Cu Chi","meta_keyword":"Cu Chi","meta_description":"Cu Chi","description":"<p>Cu Chi<\\/p>","extra":""}', 1, 1388730325),
(46, 'vi', 11, 1, 'Chính sách', '', 0, 3, '{"meta_title":"Ch\\u00ednh s\\u00e1ch","meta_keyword":"Ch\\u00ednh s\\u00e1ch","meta_description":"Ch\\u00ednh s\\u00e1ch"}', 1, 1388731142),
(47, 'vi', 4, 1, 'Harotex', 'harotex', 0, 3, '{"introimage_id":"42","meta_title":"Harotex","meta_keyword":"Harotex","meta_description":"Harotex","description":"","extra":"","boximage_id":"56"}', 1, 1410166725),
(48, 'vi', 4, 1, 'Phụ kiện sàn gỗ', 'phu-kien-san-go', 0, 4, '{"introimage_id":"43","meta_title":"Ph\\u1ee5 ki\\u1ec7n s\\u00e0n g\\u1ed7","meta_keyword":"Ph\\u1ee5 ki\\u1ec7n s\\u00e0n g\\u1ed7","meta_description":"Ph\\u1ee5 ki\\u1ec7n s\\u00e0n g\\u1ed7","description":"","extra":"","boximage_id":"57"}', 1, 1410166765),
(49, 'vi', 3, 1, 'Kho hàng', 'kho-hang', 0, 5, '{"meta_title":"Kho h\\u00e0ng","meta_keyword":"Kho h\\u00e0ng","meta_description":"Kho h\\u00e0ng"}', 1, 1410245087);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `type` tinyint(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `name` varchar(256) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_view` tinyint(4) NOT NULL,
  `other` varchar(1024) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=796 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `language`, `type`, `status`, `name`, `alias`, `parent_id`, `order_view`, `other`, `created_by`, `created_time`) VALUES
(21, 'vi', 0, 1, 'Hà Nội', 'ha-noi', 0, 64, '[]', 1, 1372926400),
(22, 'vi', 0, 1, 'TP. Hồ Chí Minh', 'tp-ho-chi-minh', 0, 64, '[]', 1, 1372926400),
(23, 'vi', 0, 1, 'An Giang', 'an-giang', 0, 63, '[]', 1, 1372926400),
(24, 'vi', 0, 1, 'Bắc Giang', 'bac-giang', 0, 62, '[]', 1, 1372926400),
(25, 'vi', 0, 1, 'Bắc Kạn', 'bac-kan', 0, 61, '[]', 1, 1372926401),
(26, 'vi', 0, 1, 'Bạc Liêu', 'bac-lieu', 0, 60, '[]', 1, 1372926401),
(27, 'vi', 0, 1, 'Bắc Ninh', 'bac-ninh', 0, 59, '[]', 1, 1372926401),
(28, 'vi', 0, 1, 'Bà Rịa - Vũng Tàu', 'ba-ria-vung-tau', 0, 58, '{"cost":""}', 1, 1372926401),
(29, 'vi', 0, 1, 'Bến Tre', 'ben-tre', 0, 57, '[]', 1, 1372926401),
(30, 'vi', 0, 1, 'Bình Dương', 'binh-duong', 0, 56, '[]', 1, 1372926402),
(31, 'vi', 0, 1, 'Bình Phước', 'binh-phuoc', 0, 55, '[]', 1, 1372926402),
(32, 'vi', 0, 1, 'Bình Thuận', 'binh-thuan', 0, 54, '[]', 1, 1372926403),
(33, 'vi', 0, 1, 'Bình Định', 'binh-dinh', 0, 53, '[]', 1, 1372926403),
(34, 'vi', 0, 1, 'Cà Mau', 'ca-mau', 0, 52, '[]', 1, 1372926403),
(35, 'vi', 0, 1, 'Cao Bằng', 'cao-bang', 0, 51, '[]', 1, 1372926404),
(36, 'vi', 0, 1, 'Cần Thơ', 'can-tho', 0, 50, '[]', 1, 1372926404),
(37, 'vi', 0, 1, 'Gia Lai', 'gia-lai', 0, 49, '[]', 1, 1372926405),
(38, 'vi', 0, 1, 'Hà Giang', 'ha-giang', 0, 48, '[]', 1, 1372926405),
(39, 'vi', 0, 1, 'Hà Nam', 'ha-nam', 0, 47, '[]', 1, 1372926406),
(40, 'vi', 0, 1, 'Hải Dương', 'hai-duong', 0, 46, '[]', 1, 1372926407),
(41, 'vi', 0, 1, 'Hải Phòng', 'hai-phong', 0, 45, '[]', 1, 1372926408),
(42, 'vi', 0, 1, 'Hà Tĩnh', 'ha-tinh', 0, 44, '[]', 1, 1372926409),
(43, 'vi', 0, 1, 'Hậu Giang', 'hau-giang', 0, 43, '[]', 1, 1372926409),
(44, 'vi', 0, 1, 'Hòa Bình', 'hoa-binh', 0, 42, '[]', 1, 1372926410),
(45, 'vi', 0, 1, 'Hưng Yên', 'hung-yen', 0, 41, '[]', 1, 1372926411),
(46, 'vi', 0, 1, 'Khánh Hòa', 'khanh-hoa', 0, 40, '[]', 1, 1372926412),
(47, 'vi', 0, 1, 'Kiên Giang', 'kien-giang', 0, 39, '[]', 1, 1372926412),
(48, 'vi', 0, 1, 'Kon Tum', 'kon-tum', 0, 38, '[]', 1, 1372926413),
(49, 'vi', 0, 1, 'Lai Châu', 'lai-chau', 0, 37, '[]', 1, 1372926414),
(50, 'vi', 0, 1, 'Lâm Đồng', 'lam-dong', 0, 36, '[]', 1, 1372926415),
(51, 'vi', 0, 1, 'Lạng Sơn', 'lang-son', 0, 35, '[]', 1, 1372926416),
(52, 'vi', 0, 1, 'Lào Cai', 'lao-cai', 0, 34, '[]', 1, 1372926417),
(53, 'vi', 0, 1, 'Long An', 'long-an', 0, 33, '[]', 1, 1372926418),
(54, 'vi', 0, 1, 'Nam Định', 'nam-dinh', 0, 32, '[]', 1, 1372926420),
(55, 'vi', 0, 1, 'Nghệ An', 'nghe-an', 0, 31, '[]', 1, 1372926421),
(56, 'vi', 0, 1, 'Ninh Bình', 'ninh-binh', 0, 30, '[]', 1, 1372926422),
(57, 'vi', 0, 1, 'Ninh Thuận', 'ninh-thuan', 0, 29, '[]', 1, 1372926423),
(58, 'vi', 0, 1, 'Phú Thọ', 'phu-tho', 0, 28, '[]', 1, 1372926425),
(59, 'vi', 0, 1, 'Phú Yên', 'phu-yen', 0, 27, '[]', 1, 1372926426),
(60, 'vi', 0, 1, 'Quảng Ninh', 'quang-ninh', 0, 26, '[]', 1, 1372926427),
(61, 'vi', 0, 1, 'Quảng Bình', 'quang-binh', 0, 25, '[]', 1, 1372926428),
(62, 'vi', 0, 1, 'Quảng Nam', 'quang-nam', 0, 24, '[]', 1, 1372926430),
(63, 'vi', 0, 1, 'Quảng Ngãi', 'quang-ngai', 0, 23, '[]', 1, 1372926432),
(64, 'vi', 0, 1, 'Quảng Trị', 'quang-tri', 0, 22, '[]', 1, 1372926433),
(65, 'vi', 0, 1, 'Sóc Trăng', 'soc-trang', 0, 21, '[]', 1, 1372926435),
(66, 'vi', 0, 1, 'Sơn La', 'son-la', 0, 20, '[]', 1, 1372926436),
(67, 'vi', 0, 1, 'Tây Ninh', 'tay-ninh', 0, 19, '[]', 1, 1372926438),
(68, 'vi', 0, 1, 'Thái Bình', 'thai-binh', 0, 18, '[]', 1, 1372926439),
(69, 'vi', 0, 1, 'Thái Nguyên', 'thai-nguyen', 0, 17, '[]', 1, 1372926441),
(70, 'vi', 0, 1, 'Thanh Hóa', 'thanh-hoa', 0, 16, '[]', 1, 1372926443),
(71, 'vi', 0, 1, 'Thừa Thiên Huế', 'thua-thien-hue', 0, 15, '[]', 1, 1372926444),
(72, 'vi', 0, 1, 'Tiền Giang', 'tien-giang', 0, 14, '[]', 1, 1372926446),
(73, 'vi', 0, 1, 'Trà Vinh', 'tra-vinh', 0, 13, '[]', 1, 1372926448),
(74, 'vi', 0, 1, 'Tuyên Quang', 'tuyen-quang', 0, 12, '[]', 1, 1372926449),
(75, 'vi', 0, 1, 'Vĩnh Phúc', 'vinh-phuc', 0, 11, '[]', 1, 1372926452),
(76, 'vi', 0, 1, 'Vĩnh Long', 'vinh-long', 0, 10, '[]', 1, 1372926453),
(77, 'vi', 0, 1, 'Yên Bái', 'yen-bai', 0, 9, '[]', 1, 1372926455),
(78, 'vi', 0, 1, 'Đà Nẵng', 'da-nang', 0, 8, '[]', 1, 1372926457),
(79, 'vi', 0, 1, 'Đăk Lăk', 'dak-lak', 0, 7, '[]', 1, 1372926459),
(80, 'vi', 0, 1, 'Đăk Nông', 'dak-nong', 0, 6, '[]', 1, 1372926461),
(81, 'vi', 0, 1, 'Điện Biên', 'dien-bien', 0, 5, '[]', 1, 1372926464),
(82, 'vi', 0, 1, 'Đồng Nai', 'dong-nai', 0, 4, '[]', 1, 1372926466),
(83, 'vi', 0, 1, 'Đồng Tháp', 'dong-thap', 0, 3, '[]', 1, 1372926468),
(84, 'vi', 1, 1, 'Thị Xã Sơn Tây', 'thi-xa-son-tay', 21, 29, '[]', 1, 1372926927),
(85, 'vi', 1, 1, 'Quận Thanh Xuân', 'quan-thanh-xuan', 21, 28, '[]', 1, 1372926927),
(86, 'vi', 1, 1, 'Quận Tây Hồ', 'quan-tay-ho', 21, 27, '[]', 1, 1372926927),
(87, 'vi', 1, 1, 'Quận Long Biên', 'quan-long-bien', 21, 26, '[]', 1, 1372926927),
(88, 'vi', 1, 1, 'Quận Hoàng Mai', 'quan-hoang-mai', 21, 25, '[]', 1, 1372926927),
(89, 'vi', 1, 1, 'Quận Hoàn Kiếm', 'quan-hoan-kiem', 21, 24, '[]', 1, 1372926927),
(90, 'vi', 1, 1, 'Quận Hai Bà Trưng', 'quan-hai-ba-trung', 21, 23, '[]', 1, 1372926927),
(91, 'vi', 1, 1, 'Quận Hà Đông', 'quan-ha-dong', 21, 22, '[]', 1, 1372926928),
(92, 'vi', 1, 1, 'Quận Đống Đa', 'quan-dong-da', 21, 21, '[]', 1, 1372926928),
(93, 'vi', 1, 1, 'Quận Cầu Giấy', 'quan-cau-giay', 21, 20, '[]', 1, 1372926928),
(94, 'vi', 1, 1, 'Quận Ba Đình', 'quan-ba-dinh', 21, 19, '[]', 1, 1372926929),
(95, 'vi', 1, 1, 'Huyện Ứng Hòa', 'huyen-ung-hoa', 21, 18, '[]', 1, 1372926929),
(96, 'vi', 1, 1, 'Huyện Từ Liêm', 'huyen-tu-liem', 21, 17, '[]', 1, 1372926930),
(97, 'vi', 1, 1, 'Huyện Thường Tín', 'huyen-thuong-tin', 21, 16, '[]', 1, 1372926930),
(98, 'vi', 1, 1, 'Huyện Thanh Trì', 'huyen-thanh-tri', 21, 15, '[]', 1, 1372926931),
(99, 'vi', 1, 1, 'Huyện Thanh Oai', 'huyen-thanh-oai', 21, 14, '[]', 1, 1372926931),
(100, 'vi', 1, 1, 'Huyện Thạch Thất', 'huyen-thach-that', 21, 13, '[]', 1, 1372926932),
(101, 'vi', 1, 1, 'Huyện Sóc Sơn', 'huyen-soc-son', 21, 12, '[]', 1, 1372926932),
(102, 'vi', 1, 1, 'Huyện Quốc Oai', 'huyen-quoc-oai', 21, 11, '[]', 1, 1372926933),
(103, 'vi', 1, 1, 'Huyện Phúc Thọ', 'huyen-phuc-tho', 21, 10, '[]', 1, 1372926933),
(104, 'vi', 1, 1, 'Huyện Phú Xuyên', 'huyen-phu-xuyen', 21, 9, '[]', 1, 1372926935),
(105, 'vi', 1, 1, 'Huyện Mỹ Đức', 'huyen-my-duc', 21, 8, '[]', 1, 1372926935),
(106, 'vi', 1, 1, 'Huyện Mê Linh', 'huyen-me-linh', 21, 7, '[]', 1, 1372926936),
(107, 'vi', 1, 1, 'Huyện Hoài Đức', 'huyen-hoai-duc', 21, 6, '[]', 1, 1372926937),
(108, 'vi', 1, 1, 'Huyện Gia Lâm', 'huyen-gia-lam', 21, 5, '[]', 1, 1372926937),
(109, 'vi', 1, 1, 'Huyện Đông Anh', 'huyen-dong-anh', 21, 4, '[]', 1, 1372926938),
(110, 'vi', 1, 1, 'Huyện Đan Phượng', 'huyen-dan-phuong', 21, 3, '[]', 1, 1372926939),
(111, 'vi', 1, 1, 'Huyện Chương Mỹ', 'huyen-chuong-my', 21, 2, '[]', 1, 1372926940),
(112, 'vi', 1, 1, 'Huyện Ba Vì', 'huyen-ba-vi', 21, 1, '[]', 1, 1372926941),
(113, 'vi', 1, 1, 'Quận Thủ Đức', 'quan-thu-duc', 22, 24, '[]', 1, 1372927007),
(114, 'vi', 1, 1, 'Quận Tân Phú', 'quan-tan-phu', 22, 23, '[]', 1, 1372927007),
(115, 'vi', 1, 1, 'Quận Tân Bình', 'quan-tan-binh', 22, 22, '[]', 1, 1372927007),
(116, 'vi', 1, 1, 'Quận Phú Nhuận', 'quan-phu-nhuan', 22, 21, '[]', 1, 1372927007),
(117, 'vi', 1, 1, 'Quận Gò Vấp', 'quan-go-vap', 22, 20, '[]', 1, 1372927007),
(118, 'vi', 1, 1, 'Quận Bình Thạnh', 'quan-binh-thanh', 22, 19, '[]', 1, 1372927008),
(119, 'vi', 1, 1, 'Quận Bình Tân', 'quan-binh-tan', 22, 18, '[]', 1, 1372927008),
(120, 'vi', 1, 1, 'Quận 9', 'quan-9', 22, 17, '[]', 1, 1372927008),
(121, 'vi', 1, 1, 'Quận 8', 'quan-8', 22, 16, '[]', 1, 1372927008),
(122, 'vi', 1, 1, 'Quận 7', 'quan-7', 22, 15, '[]', 1, 1372927008),
(123, 'vi', 1, 1, 'Quận 6', 'quan-6', 22, 14, '[]', 1, 1372927009),
(124, 'vi', 1, 1, 'Quận 5', 'quan-5', 22, 13, '[]', 1, 1372927009),
(125, 'vi', 1, 1, 'Quận 4', 'quan-4', 22, 12, '[]', 1, 1372927010),
(126, 'vi', 1, 1, 'Quận 3', 'quan-3', 22, 11, '[]', 1, 1372927010),
(127, 'vi', 1, 1, 'Quận 2', 'quan-2', 22, 10, '[]', 1, 1372927010),
(128, 'vi', 1, 1, 'Quận 12', 'quan-12', 22, 9, '[]', 1, 1372927011),
(129, 'vi', 1, 1, 'Quận 11', 'quan-11', 22, 8, '[]', 1, 1372927011),
(130, 'vi', 1, 1, 'Quận 10', 'quan-10', 22, 7, '[]', 1, 1372927012),
(131, 'vi', 1, 1, 'Quận 1', 'quan-1', 22, 6, '[]', 1, 1372927012),
(132, 'vi', 1, 1, 'Huyện Nhà Bè', 'huyen-nha-be', 22, 5, '[]', 1, 1372927013),
(133, 'vi', 1, 1, 'Huyện Hóc Môn', 'huyen-hoc-mon', 22, 4, '[]', 1, 1372927014),
(134, 'vi', 1, 1, 'Huyện Củ Chi', 'huyen-cu-chi', 22, 3, '[]', 1, 1372927015),
(135, 'vi', 1, 1, 'Huyện Cần Giờ', 'huyen-can-gio', 22, 2, '[]', 1, 1372927016),
(136, 'vi', 1, 1, 'Huyện Bình Chánh', 'huyen-binh-chanh', 22, 1, '[]', 1, 1372927016),
(137, 'vi', 1, 1, 'Thị Xã Tân Châu', 'thi-xa-tan-chau', 23, 11, '[]', 1, 1372927048),
(138, 'vi', 1, 1, 'Thị Xã Châu Đốc', 'thi-xa-chau-doc', 23, 10, '[]', 1, 1372927048),
(139, 'vi', 1, 1, 'Thành Phố Long Xuyên', 'thanh-pho-long-xuyen', 23, 9, '[]', 1, 1372927048),
(140, 'vi', 1, 1, 'Huyện Tri Tôn', 'huyen-tri-ton', 23, 8, '[]', 1, 1372927049),
(141, 'vi', 1, 1, 'Huyện Tịnh Biên', 'huyen-tinh-bien', 23, 7, '[]', 1, 1372927049),
(142, 'vi', 1, 1, 'Huyện Thoại Sơn', 'huyen-thoai-son', 23, 6, '[]', 1, 1372927049),
(143, 'vi', 1, 1, 'Huyện Phú Tân', 'huyen-phu-tan', 23, 5, '[]', 1, 1372927049),
(144, 'vi', 1, 1, 'Huyện Chợ Mới', 'huyen-cho-moi', 23, 4, '[]', 1, 1372927049),
(145, 'vi', 1, 1, 'Huyện Châu Thành', 'huyen-chau-thanh', 23, 3, '[]', 1, 1372927049),
(146, 'vi', 1, 1, 'Huyện Châu Phú', 'huyen-chau-phu', 23, 2, '[]', 1, 1372927050),
(147, 'vi', 1, 1, 'Huyện An Phú', 'huyen-an-phu', 23, 1, '[]', 1, 1372927050),
(148, 'vi', 1, 1, 'Thành Phố Bắc Giang', 'thanh-pho-bac-giang', 24, 10, '[]', 1, 1372927077),
(149, 'vi', 1, 1, 'Huyện Yên Thế', 'huyen-yen-the', 24, 9, '[]', 1, 1372927077),
(150, 'vi', 1, 1, 'Huyện Yên Dũng', 'huyen-yen-dung', 24, 8, '[]', 1, 1372927077),
(151, 'vi', 1, 1, 'Huyện Việt Yên', 'huyen-viet-yen', 24, 7, '[]', 1, 1372927077),
(152, 'vi', 1, 1, 'Huyện Tân Yên', 'huyen-tan-yen', 24, 6, '[]', 1, 1372927077),
(153, 'vi', 1, 1, 'Huyện Sơn Động', 'huyen-son-dong', 24, 5, '[]', 1, 1372927077),
(154, 'vi', 1, 1, 'Huyện Lục Ngạn', 'huyen-luc-ngan', 24, 4, '[]', 1, 1372927077),
(155, 'vi', 1, 1, 'Huyện Lục Nam', 'huyen-luc-nam', 24, 3, '[]', 1, 1372927078),
(156, 'vi', 1, 1, 'Huyện Lạng Giang', 'huyen-lang-giang', 24, 2, '[]', 1, 1372927078),
(157, 'vi', 1, 1, 'Huyện Hiệp Hòa', 'huyen-hiep-hoa', 24, 1, '[]', 1, 1372927078),
(158, 'vi', 1, 1, 'Thị Xã Bắc Kạn', 'thi-xa-bac-kan', 25, 8, '[]', 1, 1372927116),
(159, 'vi', 1, 1, 'Huyện Pắc Nặm', 'huyen-pac-nam', 25, 7, '[]', 1, 1372927116),
(160, 'vi', 1, 1, 'Huyện Ngân Sơn', 'huyen-ngan-son', 25, 6, '[]', 1, 1372927116),
(161, 'vi', 1, 1, 'Huyện Na Rì', 'huyen-na-ri', 25, 5, '[]', 1, 1372927116),
(162, 'vi', 1, 1, 'Huyện Chợ Mới', 'huyen-cho-moi', 25, 4, '[]', 1, 1372927116),
(163, 'vi', 1, 1, 'Huyện Chợ đồn', 'huyen-cho-don', 25, 3, '[]', 1, 1372927116),
(164, 'vi', 1, 1, 'Huyện Bạch Thông', 'huyen-bach-thong', 25, 2, '[]', 1, 1372927116),
(165, 'vi', 1, 1, 'Huyện Ba Bể', 'huyen-ba-be', 25, 1, '[]', 1, 1372927117),
(166, 'vi', 1, 1, 'Thị Xã Bạc Liêu', 'thi-xa-bac-lieu', 26, 7, '[]', 1, 1372927144),
(167, 'vi', 1, 1, 'Huyện Vĩnh Lợi', 'huyen-vinh-loi', 26, 6, '[]', 1, 1372927144),
(168, 'vi', 1, 1, 'Huyện Phước Long', 'huyen-phuoc-long', 26, 5, '[]', 1, 1372927144),
(169, 'vi', 1, 1, 'Huyện Hồng Dân', 'huyen-hong-dan', 26, 4, '[]', 1, 1372927144),
(170, 'vi', 1, 1, 'Huyện Hòa Bình', 'huyen-hoa-binh', 26, 3, '[]', 1, 1372927144),
(171, 'vi', 1, 1, 'Huyện Giá Rai', 'huyen-gia-rai', 26, 2, '[]', 1, 1372927144),
(172, 'vi', 1, 1, 'Huyện Đông Hải', 'huyen-dong-hai', 26, 1, '[]', 1, 1372927145),
(173, 'vi', 1, 1, 'Thị Xã Từ Sơn', 'thi-xa-tu-son', 27, 8, '[]', 1, 1372927167),
(174, 'vi', 1, 1, 'Thành Phố Bắc Ninh', 'thanh-pho-bac-ninh', 27, 7, '[]', 1, 1372927167),
(175, 'vi', 1, 1, 'Huyện Yên Phong', 'huyen-yen-phong', 27, 6, '[]', 1, 1372927167),
(176, 'vi', 1, 1, 'Huyện Tiên Du', 'huyen-tien-du', 27, 5, '[]', 1, 1372927167),
(177, 'vi', 1, 1, 'Huyện Thuận Thành', 'huyen-thuan-thanh', 27, 4, '[]', 1, 1372927167),
(178, 'vi', 1, 1, 'Huyện Quế Võ', 'huyen-que-vo', 27, 3, '[]', 1, 1372927167),
(179, 'vi', 1, 1, 'Huyện Lương TàI', 'huyen-luong-tai', 27, 2, '[]', 1, 1372927168),
(180, 'vi', 1, 1, 'Huyện Gia Bình', 'huyen-gia-binh', 27, 1, '[]', 1, 1372927168),
(181, 'vi', 1, 1, 'Thị Xã Bà Rịa', 'thi-xa-ba-ria', 28, 8, '[]', 1, 1372927185),
(182, 'vi', 1, 1, 'Thành Phố Vũng Tàu', 'thanh-pho-vung-tau', 28, 7, '[]', 1, 1372927186),
(183, 'vi', 1, 1, 'Huyện Xuyên Mộc', 'huyen-xuyen-moc', 28, 6, '[]', 1, 1372927186),
(184, 'vi', 1, 1, 'Huyện Tân Thành', 'huyen-tan-thanh', 28, 5, '[]', 1, 1372927186),
(185, 'vi', 1, 1, 'Huyện Long điền', 'huyen-long-dien', 28, 4, '[]', 1, 1372927186),
(186, 'vi', 1, 1, 'Huyện Đất Đỏ', 'huyen-dat-do', 28, 3, '[]', 1, 1372927186),
(187, 'vi', 1, 1, 'Huyện Côn đảo', 'huyen-con-dao', 28, 2, '[]', 1, 1372927186),
(188, 'vi', 1, 1, 'Huyện Châu đức', 'huyen-chau-duc', 28, 1, '[]', 1, 1372927186),
(189, 'vi', 1, 1, 'Thành Phố Bến Tre', 'thanh-pho-ben-tre', 29, 9, '[]', 1, 1372927223),
(190, 'vi', 1, 1, 'Huyện Thạnh Phú', 'huyen-thanh-phu', 29, 8, '[]', 1, 1372927223),
(191, 'vi', 1, 1, 'Huyện Mỏ Cày Nam', 'huyen-mo-cay-nam', 29, 7, '[]', 1, 1372927223),
(192, 'vi', 1, 1, 'Huyện Mỏ Cày Bắc', 'huyen-mo-cay-bac', 29, 6, '[]', 1, 1372927223),
(193, 'vi', 1, 1, 'Huyện Giồng Trôm', 'huyen-giong-trom', 29, 5, '[]', 1, 1372927223),
(194, 'vi', 1, 1, 'Huyện Chợ Lách', 'huyen-cho-lach', 29, 4, '[]', 1, 1372927223),
(195, 'vi', 1, 1, 'Huyện Châu Thành', 'huyen-chau-thanh', 29, 3, '[]', 1, 1372927223),
(196, 'vi', 1, 1, 'Huyện Bình Đại', '', 29, 2, '[]', 1, 1372927223),
(197, 'vi', 1, 1, 'Huyện Ba Tri', '', 29, 1, '[]', 1, 1372927224),
(198, 'vi', 1, 1, 'Thị Xã Thủ Dầu Một', '', 30, 7, '[]', 1, 1372927241),
(199, 'vi', 1, 1, 'Huyện Thuận An', '', 30, 6, '[]', 1, 1372927241),
(200, 'vi', 1, 1, 'Huyện Tân Uyên', '', 30, 5, '[]', 1, 1372927241),
(201, 'vi', 1, 1, 'Huyện Phú Giáo', '', 30, 4, '[]', 1, 1372927241),
(202, 'vi', 1, 1, 'Huyện Dĩ An', '', 30, 3, '[]', 1, 1372927242),
(203, 'vi', 1, 1, 'Huyện Dầu Tiếng', '', 30, 2, '[]', 1, 1372927242),
(204, 'vi', 1, 1, 'Huyện Bến Cát', '', 30, 1, '[]', 1, 1372927242),
(205, 'vi', 1, 1, 'Thị Xã Phước Long', '', 31, 10, '[]', 1, 1372927268),
(206, 'vi', 1, 1, 'Thị Xã Đồng Xoài', '', 31, 9, '[]', 1, 1372927268),
(207, 'vi', 1, 1, 'Thị Xã Bình Long', '', 31, 8, '[]', 1, 1372927268),
(208, 'vi', 1, 1, 'Huyện Lộc Ninh', '', 31, 7, '[]', 1, 1372927268),
(209, 'vi', 1, 1, 'Huyện Hớn Quản', '', 31, 6, '[]', 1, 1372927268),
(210, 'vi', 1, 1, 'Huyện Đồng Phú', '', 31, 5, '[]', 1, 1372927268),
(211, 'vi', 1, 1, 'Huyện Chơn Thành', '', 31, 4, '[]', 1, 1372927268),
(212, 'vi', 1, 1, 'Huyện Bù Gia Mập', '', 31, 3, '[]', 1, 1372927269),
(213, 'vi', 1, 1, 'Huyện Bù đốp', '', 31, 2, '[]', 1, 1372927269),
(214, 'vi', 1, 1, 'Huyện Bù đăng', '', 31, 1, '[]', 1, 1372927269),
(215, 'vi', 1, 1, 'Thị Xã La Gi', '', 32, 10, '[]', 1, 1372927288),
(216, 'vi', 1, 1, 'Thành Phố Phan Thiết', '', 32, 9, '[]', 1, 1372927288),
(217, 'vi', 1, 1, 'Huyện Tuy Phong', '', 32, 8, '[]', 1, 1372927288),
(218, 'vi', 1, 1, 'Huyện Tánh Linh', '', 32, 7, '[]', 1, 1372927288),
(219, 'vi', 1, 1, 'Huyện Hàm Thuận Nam', '', 32, 6, '[]', 1, 1372927288),
(220, 'vi', 1, 1, 'Huyện Hàm Thuận Bắc', '', 32, 5, '[]', 1, 1372927288),
(221, 'vi', 1, 1, 'Huyện Hàm Tân', '', 32, 4, '[]', 1, 1372927289),
(222, 'vi', 1, 1, 'Huyện Đức Linh', '', 32, 3, '[]', 1, 1372927289),
(223, 'vi', 1, 1, 'Huyện Đảo Phú Quý', '', 32, 2, '[]', 1, 1372927289),
(224, 'vi', 1, 1, 'Huyện Bắc Bình', '', 32, 1, '[]', 1, 1372927289),
(225, 'vi', 1, 1, 'Thành Phố Quy Nhơn', '', 33, 10, '[]', 1, 1372927307),
(226, 'vi', 1, 1, 'Huyện Vĩnh Thạnh', '', 33, 9, '[]', 1, 1372927307),
(227, 'vi', 1, 1, 'Huyện Vân Canh', '', 33, 8, '[]', 1, 1372927307),
(228, 'vi', 1, 1, 'Huyện Tuy Phước', '', 33, 7, '[]', 1, 1372927307),
(229, 'vi', 1, 1, 'Huyên Tây Sơn', '', 33, 6, '[]', 1, 1372927307),
(230, 'vi', 1, 1, 'Huyện Phù Mỹ', '', 33, 5, '[]', 1, 1372927307),
(231, 'vi', 1, 1, 'Huyện Phù Cát', '', 33, 4, '[]', 1, 1372927307),
(232, 'vi', 1, 1, 'Huyện HoàI Nhơn', '', 33, 3, '[]', 1, 1372927308),
(233, 'vi', 1, 1, 'Huyện HoàI ân', '', 33, 2, '[]', 1, 1372927308),
(234, 'vi', 1, 1, 'Huyện An Nhơn', '', 33, 1, '[]', 1, 1372927308),
(235, 'vi', 1, 1, 'Thành Phố Cà Mau', '', 34, 9, '[]', 1, 1372927328),
(236, 'vi', 1, 1, 'Huyện U Minh', '', 34, 8, '[]', 1, 1372927328),
(237, 'vi', 1, 1, 'Huyện Trần Văn Thời', '', 34, 7, '[]', 1, 1372927328),
(238, 'vi', 1, 1, 'Huyện Thới Bình', '', 34, 6, '[]', 1, 1372927328),
(239, 'vi', 1, 1, 'Huyện Phú Tân', '', 34, 5, '[]', 1, 1372927328),
(240, 'vi', 1, 1, 'Huyện Ngọc Hiển', '', 34, 4, '[]', 1, 1372927328),
(241, 'vi', 1, 1, 'Huyện Năm Căn', '', 34, 3, '[]', 1, 1372927329),
(242, 'vi', 1, 1, 'Huyện Đầm Dơi', '', 34, 2, '[]', 1, 1372927329),
(243, 'vi', 1, 1, 'Huyện Cái Nước', '', 34, 1, '[]', 1, 1372927329),
(244, 'vi', 1, 1, 'Thị Xã Cao Bằng', '', 35, 13, '[]', 1, 1372927406),
(245, 'vi', 1, 1, 'Huyện Trùng Khánh', '', 35, 12, '[]', 1, 1372927406),
(246, 'vi', 1, 1, 'Huyện Trà Lĩnh', '', 35, 11, '[]', 1, 1372927407),
(247, 'vi', 1, 1, 'Huyện Thông Nông', '', 35, 10, '[]', 1, 1372927407),
(248, 'vi', 1, 1, 'Huyện Thạch An', '', 35, 9, '[]', 1, 1372927407),
(249, 'vi', 1, 1, 'Huyện Quảng Uyên', '', 35, 8, '[]', 1, 1372927407),
(250, 'vi', 1, 1, 'Huyện Phục Hòa', '', 35, 7, '[]', 1, 1372927407),
(251, 'vi', 1, 1, 'Huyện Nguyên Bình', '', 35, 6, '[]', 1, 1372927407),
(252, 'vi', 1, 1, 'Huyện Hòa An', '', 35, 5, '[]', 1, 1372927408),
(253, 'vi', 1, 1, 'Huyện Hà Quảng', '', 35, 4, '[]', 1, 1372927408),
(254, 'vi', 1, 1, 'Huyện Hạ Lang', '', 35, 3, '[]', 1, 1372927408),
(255, 'vi', 1, 1, 'Huyện Bảo Lâm', '', 35, 2, '[]', 1, 1372927409),
(256, 'vi', 1, 1, 'Huyện Bảo Lạc', '', 35, 1, '[]', 1, 1372927409),
(257, 'vi', 1, 1, 'Thị Xã Ngã Bảy', '', 36, 12, '[]', 1, 1372927429),
(258, 'vi', 1, 1, 'Quận Thốt Nốt', '', 36, 11, '[]', 1, 1372927429),
(259, 'vi', 1, 1, 'Quận Ô Môn', '', 36, 10, '[]', 1, 1372927429),
(260, 'vi', 1, 1, 'Quận Ninh Kiều', '', 36, 9, '[]', 1, 1372927429),
(261, 'vi', 1, 1, 'Quận Cái Răng', '', 36, 8, '[]', 1, 1372927430),
(262, 'vi', 1, 1, 'Quận Bình Thủy', '', 36, 7, '[]', 1, 1372927430),
(263, 'vi', 1, 1, 'Huyện Vĩnh Thạnh', '', 36, 6, '[]', 1, 1372927430),
(264, 'vi', 1, 1, 'Huyện Thới Lai', '', 36, 5, '[]', 1, 1372927430),
(265, 'vi', 1, 1, 'Huyện Phụng Hiệp', '', 36, 4, '[]', 1, 1372927430),
(266, 'vi', 1, 1, 'Huyện Phong điền', '', 36, 3, '[]', 1, 1372927431),
(267, 'vi', 1, 1, 'Huyện Cờ Đỏ', '', 36, 2, '[]', 1, 1372927431),
(268, 'vi', 1, 1, 'Huyện Châu Thành A', '', 36, 1, '[]', 1, 1372927431),
(269, 'vi', 1, 1, 'Thị Xã Ayun Pa', '', 37, 17, '[]', 1, 1372927471),
(270, 'vi', 1, 1, 'Thị Xã An Khê', '', 37, 16, '[]', 1, 1372927471),
(271, 'vi', 1, 1, 'Thành Phố Pleiku', '', 37, 15, '[]', 1, 1372927471),
(272, 'vi', 1, 1, 'Huyện Phú Thiện', '', 37, 14, '[]', 1, 1372927471),
(273, 'vi', 1, 1, 'Huyện Mang Yang', '', 37, 13, '[]', 1, 1372927471),
(274, 'vi', 1, 1, 'Huyện Krông Pa', '', 37, 12, '[]', 1, 1372927471),
(275, 'vi', 1, 1, 'Huyện Kông Chro', '', 37, 11, '[]', 1, 1372927471),
(276, 'vi', 1, 1, 'Huyện Kbang', '', 37, 10, '[]', 1, 1372927472),
(277, 'vi', 1, 1, 'Huyện Ia Pa', '', 37, 9, '[]', 1, 1372927472),
(278, 'vi', 1, 1, 'Huyện Ia Grai', '', 37, 8, '[]', 1, 1372927472),
(279, 'vi', 1, 1, 'Huyện Đức Cơ', '', 37, 7, '[]', 1, 1372927473),
(280, 'vi', 1, 1, 'Huyện Đăk Pơ', '', 37, 6, '[]', 1, 1372927473),
(281, 'vi', 1, 1, 'Huyện Đăk Đoa', '', 37, 5, '[]', 1, 1372927473),
(282, 'vi', 1, 1, 'Huyện Chư Sê', '', 37, 4, '[]', 1, 1372927474),
(283, 'vi', 1, 1, 'Huyện Chư Pưh', '', 37, 3, '[]', 1, 1372927474),
(284, 'vi', 1, 1, 'Huyện Chư Prông', '', 37, 2, '[]', 1, 1372927475),
(285, 'vi', 1, 1, 'Huyện Chư Păh', '', 37, 1, '[]', 1, 1372927475),
(286, 'vi', 1, 1, 'Thị Xã Hà Giang', '', 38, 11, '[]', 1, 1372927632),
(287, 'vi', 1, 1, 'Huyện Yên Minh', '', 38, 10, '[]', 1, 1372927632),
(288, 'vi', 1, 1, 'Huyện Xín Mần', '', 38, 9, '[]', 1, 1372927632),
(289, 'vi', 1, 1, 'Huyện Vị Xuyên', '', 38, 8, '[]', 1, 1372927632),
(290, 'vi', 1, 1, 'Huyện Quang Bình', '', 38, 7, '[]', 1, 1372927632),
(291, 'vi', 1, 1, 'Huyện Quản Bạ', '', 38, 6, '[]', 1, 1372927632),
(292, 'vi', 1, 1, 'Huyện Mèo Vạc', '', 38, 5, '[]', 1, 1372927632),
(293, 'vi', 1, 1, 'Huyện Hoàng Su Phì', '', 38, 4, '[]', 1, 1372927633),
(294, 'vi', 1, 1, 'Huyện Đồng Văn', '', 38, 3, '[]', 1, 1372927633),
(295, 'vi', 1, 1, 'Huyện Bắc Quang', '', 38, 2, '[]', 1, 1372927633),
(296, 'vi', 1, 1, 'Huyện Bắc Mê', '', 38, 1, '[]', 1, 1372927633),
(297, 'vi', 1, 1, 'Thành Phố Phủ Lý', '', 39, 6, '[]', 1, 1372927648),
(298, 'vi', 1, 1, 'Huyện Thanh Liêm', '', 39, 5, '[]', 1, 1372927648),
(299, 'vi', 1, 1, 'Huyện Lý Nhân', '', 39, 4, '[]', 1, 1372927648),
(300, 'vi', 1, 1, 'Huyện Kim Bảng', '', 39, 3, '[]', 1, 1372927649),
(301, 'vi', 1, 1, 'Huyện Duy Tiên', '', 39, 2, '[]', 1, 1372927649),
(302, 'vi', 1, 1, 'Huyện Bình Lục', '', 39, 1, '[]', 1, 1372927649),
(303, 'vi', 1, 1, 'Thị Xã Chí Linh', '', 40, 12, '[]', 1, 1372927664),
(304, 'vi', 1, 1, 'Thành Phố Hải Dương', '', 40, 11, '[]', 1, 1372927665),
(305, 'vi', 1, 1, 'Huyện Tứ Kỳ', '', 40, 10, '[]', 1, 1372927665),
(306, 'vi', 1, 1, 'Huyện Thanh Miện', '', 40, 9, '[]', 1, 1372927665),
(307, 'vi', 1, 1, 'Huyện Thanh Hà', '', 40, 8, '[]', 1, 1372927665),
(308, 'vi', 1, 1, 'Huyện Ninh Giang', '', 40, 7, '[]', 1, 1372927665),
(309, 'vi', 1, 1, 'Huyện Nam Sách', '', 40, 6, '[]', 1, 1372927665),
(310, 'vi', 1, 1, 'Huyện Kinh Môn', '', 40, 5, '[]', 1, 1372927665),
(311, 'vi', 1, 1, 'Huyện Kim Thành', '', 40, 4, '[]', 1, 1372927666),
(312, 'vi', 1, 1, 'Huyện Gia Lộc', '', 40, 3, '[]', 1, 1372927666),
(313, 'vi', 1, 1, 'Huyện Cẩm Giàng', '', 40, 2, '[]', 1, 1372927666),
(314, 'vi', 1, 1, 'Huyện Bình Giang', '', 40, 1, '[]', 1, 1372927667),
(315, 'vi', 1, 1, 'Quận Ngô Quyền', '', 41, 15, '[]', 1, 1372927687),
(316, 'vi', 1, 1, 'Quận Lê Chân', '', 41, 14, '[]', 1, 1372927687),
(317, 'vi', 1, 1, 'Quận Kiến An', '', 41, 13, '[]', 1, 1372927687),
(318, 'vi', 1, 1, 'Quận Hồng Bàng', '', 41, 12, '[]', 1, 1372927687),
(319, 'vi', 1, 1, 'Quận Hải An', '', 41, 11, '[]', 1, 1372927687),
(320, 'vi', 1, 1, 'Quận Đồ Sơn', '', 41, 10, '[]', 1, 1372927687),
(321, 'vi', 1, 1, 'Quận Dương Kinh', '', 41, 9, '[]', 1, 1372927687),
(322, 'vi', 1, 1, 'Huyện Vĩnh Bảo', '', 41, 8, '[]', 1, 1372927688),
(323, 'vi', 1, 1, 'Huyện Tiên Lãng', '', 41, 7, '[]', 1, 1372927688),
(324, 'vi', 1, 1, 'Huyện Thủy Nguyên', '', 41, 6, '[]', 1, 1372927688),
(325, 'vi', 1, 1, 'Huyện Kiến Thụy', '', 41, 5, '[]', 1, 1372927688),
(326, 'vi', 1, 1, 'Huyện Đảo Cát Hải', '', 41, 4, '[]', 1, 1372927689),
(327, 'vi', 1, 1, 'Huyện Đảo Bạch Long Vĩ', '', 41, 3, '[]', 1, 1372927689),
(328, 'vi', 1, 1, 'Huyện An Lão', '', 41, 2, '[]', 1, 1372927690),
(329, 'vi', 1, 1, 'Huyện An Dương', '', 41, 1, '[]', 1, 1372927690),
(330, 'vi', 1, 1, 'Thị Xã Hồng Lĩnh', '', 42, 12, '[]', 1, 1372927701),
(331, 'vi', 1, 1, 'Thành Phố Hà Tĩnh', '', 42, 11, '[]', 1, 1372927702),
(332, 'vi', 1, 1, 'Huyện Vũ Quang', '', 42, 10, '[]', 1, 1372927702),
(333, 'vi', 1, 1, 'Huyện Thạch Hà', '', 42, 9, '[]', 1, 1372927702),
(334, 'vi', 1, 1, 'Huyện Nghi Xuân', '', 42, 8, '[]', 1, 1372927702),
(335, 'vi', 1, 1, 'Huyện Lộc Hà', '', 42, 7, '[]', 1, 1372927702),
(336, 'vi', 1, 1, 'Huyện Kỳ Anh', '', 42, 6, '[]', 1, 1372927702),
(337, 'vi', 1, 1, 'Huyện Hương Sơn', '', 42, 5, '[]', 1, 1372927702),
(338, 'vi', 1, 1, 'Huyện Hương Khê', '', 42, 4, '[]', 1, 1372927703),
(339, 'vi', 1, 1, 'Huyện Đức Thọ', '', 42, 3, '[]', 1, 1372927703),
(340, 'vi', 1, 1, 'Huyện Can Lộc', '', 42, 2, '[]', 1, 1372927703),
(341, 'vi', 1, 1, 'Huyện Cẩm Xuyên', '', 42, 1, '[]', 1, 1372927704),
(342, 'vi', 1, 1, 'Thị Xã Ngã Bảy', '', 43, 7, '[]', 1, 1372927719),
(343, 'vi', 1, 1, 'Thành Phố Vị Thanh', '', 43, 6, '[]', 1, 1372927719),
(344, 'vi', 1, 1, 'Huyện Vị Thủy', '', 43, 5, '[]', 1, 1372927719),
(345, 'vi', 1, 1, 'Huyện Phụng Hiệp', '', 43, 4, '[]', 1, 1372927719),
(346, 'vi', 1, 1, 'Huyện Long Mỹ', '', 43, 3, '[]', 1, 1372927719),
(347, 'vi', 1, 1, 'Huyện Châu Thành A', '', 43, 2, '[]', 1, 1372927719),
(348, 'vi', 1, 1, 'Huyện Châu Thành', '', 43, 1, '[]', 1, 1372927720),
(349, 'vi', 1, 1, 'Thành Phố Hòa Bình', '', 44, 11, '[]', 1, 1372927734),
(350, 'vi', 1, 1, 'Huyện Yên Thủy', '', 44, 10, '[]', 1, 1372927734),
(351, 'vi', 1, 1, 'Huyện Tân Lạc', '', 44, 9, '[]', 1, 1372927734),
(352, 'vi', 1, 1, 'Huyện Mai Châu', '', 44, 8, '[]', 1, 1372927734),
(353, 'vi', 1, 1, 'Huyện Lương Sơn', '', 44, 7, '[]', 1, 1372927735),
(354, 'vi', 1, 1, 'Huyện Lạc Thủy', '', 44, 6, '[]', 1, 1372927735),
(355, 'vi', 1, 1, 'Huyện Lạc Sơn', '', 44, 5, '[]', 1, 1372927735),
(356, 'vi', 1, 1, 'Huyện Kỳ Sơn', '', 44, 4, '[]', 1, 1372927735),
(357, 'vi', 1, 1, 'Huyện Kim Bôi', '', 44, 3, '[]', 1, 1372927735),
(358, 'vi', 1, 1, 'Huyện Đà Bắc', '', 44, 2, '[]', 1, 1372927736),
(359, 'vi', 1, 1, 'Huyện Cao Phong', '', 44, 1, '[]', 1, 1372927736),
(360, 'vi', 1, 1, 'Thị Xã Hưng Yên', '', 45, 10, '[]', 1, 1372927750),
(361, 'vi', 1, 1, 'Huyện Yên Mỹ', '', 45, 9, '[]', 1, 1372927750),
(362, 'vi', 1, 1, 'Huyện Văn Lâm', '', 45, 8, '[]', 1, 1372927750),
(363, 'vi', 1, 1, 'Huyện Văn Giang', '', 45, 7, '[]', 1, 1372927750),
(364, 'vi', 1, 1, 'Huyện Tiên Lữ', '', 45, 6, '[]', 1, 1372927750),
(365, 'vi', 1, 1, 'Huyện Phù Cừ', '', 45, 5, '[]', 1, 1372927751),
(366, 'vi', 1, 1, 'Huyện Mỹ Hào', '', 45, 4, '[]', 1, 1372927751),
(367, 'vi', 1, 1, 'Huyện Kim Động', '', 45, 3, '[]', 1, 1372927751),
(368, 'vi', 1, 1, 'Huyện Khoái Châu', '', 45, 2, '[]', 1, 1372927751),
(369, 'vi', 1, 1, 'Huyện Ân Thi', '', 45, 1, '[]', 1, 1372927751),
(370, 'vi', 1, 1, 'Thành Phố Nha Trang', '', 46, 9, '[]', 1, 1372927766),
(371, 'vi', 1, 1, 'Thành Phố Cam Ranh', '', 46, 8, '[]', 1, 1372927766),
(372, 'vi', 1, 1, 'Huyện Vạn Ninh', '', 46, 7, '[]', 1, 1372927766),
(373, 'vi', 1, 1, 'Huyện Ninh Hòa', '', 46, 6, '[]', 1, 1372927766),
(374, 'vi', 1, 1, 'Huyện Khánh Vĩnh', '', 46, 5, '[]', 1, 1372927766),
(375, 'vi', 1, 1, 'Huyện Khánh Sơn', '', 46, 4, '[]', 1, 1372927766),
(376, 'vi', 1, 1, 'Huyện Đảo Trường Sa', '', 46, 3, '[]', 1, 1372927766),
(377, 'vi', 1, 1, 'Huyện Diên Khánh', '', 46, 2, '[]', 1, 1372927767),
(378, 'vi', 1, 1, 'Huyện Cam Lâm', '', 46, 1, '[]', 1, 1372927767),
(379, 'vi', 1, 1, 'Thị Xã Hà Tiên', '', 47, 15, '[]', 1, 1372927785),
(380, 'vi', 1, 1, 'Thành Phố Rạch Giá', '', 47, 14, '[]', 1, 1372927785),
(381, 'vi', 1, 1, 'Huyện Vĩnh Thuận', '', 47, 13, '[]', 1, 1372927785),
(382, 'vi', 1, 1, 'Huyện U Minh Thượng', '', 47, 12, '[]', 1, 1372927785),
(383, 'vi', 1, 1, 'Huyện Tân Hiệp', '', 47, 11, '[]', 1, 1372927785),
(384, 'vi', 1, 1, 'Huyện Kiên Lương', '', 47, 10, '[]', 1, 1372927785),
(385, 'vi', 1, 1, 'Huyện Kiên Hải', '', 47, 9, '[]', 1, 1372927785),
(386, 'vi', 1, 1, 'Huyện Hòn Đất', '', 47, 8, '[]', 1, 1372927786),
(387, 'vi', 1, 1, 'Huyện Gò Quao', '', 47, 7, '[]', 1, 1372927786),
(388, 'vi', 1, 1, 'Huyện Giồng Riềng', '', 47, 6, '[]', 1, 1372927786),
(389, 'vi', 1, 1, 'Huyên Giang Thành', '', 47, 5, '[]', 1, 1372927786),
(390, 'vi', 1, 1, 'Huyện Đảo Phú Quốc', '', 47, 4, '[]', 1, 1372927787),
(391, 'vi', 1, 1, 'Huyện Châu Thành', '', 47, 3, '[]', 1, 1372927787),
(392, 'vi', 1, 1, 'Huyện An Minh', '', 47, 2, '[]', 1, 1372927788),
(393, 'vi', 1, 1, 'Huyện An Biên', '', 47, 1, '[]', 1, 1372927788),
(394, 'vi', 1, 1, 'Thành Phố Kon Tum', '', 48, 9, '[]', 1, 1372927811),
(395, 'vi', 1, 1, 'Huyện Tu Mơ Rông', '', 48, 8, '[]', 1, 1372927811),
(396, 'vi', 1, 1, 'Huyện Sa Thầy', '', 48, 7, '[]', 1, 1372927811),
(397, 'vi', 1, 1, 'Huyện Ngọc Hồi', '', 48, 6, '[]', 1, 1372927811),
(398, 'vi', 1, 1, 'Huyện Kon Rẫy', '', 48, 5, '[]', 1, 1372927811),
(399, 'vi', 1, 1, 'Huyện Kon Plông', '', 48, 4, '[]', 1, 1372927812),
(400, 'vi', 1, 1, 'Huyện Đắk Tô', '', 48, 3, '[]', 1, 1372927812),
(401, 'vi', 1, 1, 'Huyện Đắk Hà', '', 48, 2, '[]', 1, 1372927812),
(402, 'vi', 1, 1, 'Huyện Đắk Glei', '', 48, 1, '[]', 1, 1372927812),
(403, 'vi', 1, 1, 'Thị Xã Lai Châu', '', 49, 7, '[]', 1, 1372927825),
(404, 'vi', 1, 1, 'Huyện Than Uyên', '', 49, 6, '[]', 1, 1372927825),
(405, 'vi', 1, 1, 'Huyện Tân Uyên', '', 49, 5, '[]', 1, 1372927825),
(406, 'vi', 1, 1, 'Huyện Tam Đường', '', 49, 4, '[]', 1, 1372927825),
(407, 'vi', 1, 1, 'Huyện Sìn Hồ', '', 49, 3, '[]', 1, 1372927825),
(408, 'vi', 1, 1, 'Huyện Phong Thổ', '', 49, 2, '[]', 1, 1372927825),
(409, 'vi', 1, 1, 'Huyện Mường Tè', '', 49, 1, '[]', 1, 1372927826),
(410, 'vi', 1, 1, 'Thị Xã Bảo Lộc', '', 50, 12, '[]', 1, 1372927839),
(411, 'vi', 1, 1, 'Thành Phố Đà Lạt', '', 50, 11, '[]', 1, 1372927840),
(412, 'vi', 1, 1, 'Huyện Lâm Hà', '', 50, 10, '[]', 1, 1372927840),
(413, 'vi', 1, 1, 'Huyện Lạc Dương', '', 50, 9, '[]', 1, 1372927840),
(414, 'vi', 1, 1, 'Huyện Đức Trọng', '', 50, 8, '[]', 1, 1372927840),
(415, 'vi', 1, 1, 'Huyện Đơn Dương', '', 50, 7, '[]', 1, 1372927840),
(416, 'vi', 1, 1, 'Huyện Đam Rông', '', 50, 6, '[]', 1, 1372927840),
(417, 'vi', 1, 1, 'Huyện Đạ Tẻh', '', 50, 5, '[]', 1, 1372927840),
(418, 'vi', 1, 1, 'Huyện Đạ Huoai', '', 50, 4, '[]', 1, 1372927841),
(419, 'vi', 1, 1, 'Huyện Di Linh', '', 50, 3, '[]', 1, 1372927841),
(420, 'vi', 1, 1, 'Huyện Cát Tiên', '', 50, 2, '[]', 1, 1372927841),
(421, 'vi', 1, 1, 'Huyện Bảo Lâm', '', 50, 1, '[]', 1, 1372927842),
(422, 'vi', 1, 1, 'Thành Phố Lạng Sơn', '', 51, 11, '[]', 1, 1372927995),
(423, 'vi', 1, 1, 'Huyện Văn Quan', '', 51, 10, '[]', 1, 1372927995),
(424, 'vi', 1, 1, 'Huyện Văn Lãng', '', 51, 9, '[]', 1, 1372927995),
(425, 'vi', 1, 1, 'Huyện Tràng Định', '', 51, 8, '[]', 1, 1372927995),
(426, 'vi', 1, 1, 'Huyện Lộc Bình', '', 51, 7, '[]', 1, 1372927995),
(427, 'vi', 1, 1, 'Huyện Hữu Lũng', '', 51, 6, '[]', 1, 1372927996),
(428, 'vi', 1, 1, 'Huyện Đình Lập', '', 51, 5, '[]', 1, 1372927996),
(429, 'vi', 1, 1, 'Huyện Chi Lăng', '', 51, 4, '[]', 1, 1372927996),
(430, 'vi', 1, 1, 'Huyện Cao Lộc', '', 51, 3, '[]', 1, 1372927996),
(431, 'vi', 1, 1, 'Huyện Bình Gia', '', 51, 2, '[]', 1, 1372927997),
(432, 'vi', 1, 1, 'Huyện Bắc Sơn', '', 51, 1, '[]', 1, 1372927997),
(433, 'vi', 1, 1, 'Thành Phố Lào Cai', '', 52, 9, '[]', 1, 1372928039),
(434, 'vi', 1, 1, 'Huyện Văn Bàn', '', 52, 8, '[]', 1, 1372928039),
(435, 'vi', 1, 1, 'Huyện Si Ma Cai', '', 52, 7, '[]', 1, 1372928039),
(436, 'vi', 1, 1, 'Huyện Sa Pa', '', 52, 6, '[]', 1, 1372928039),
(437, 'vi', 1, 1, 'Huyện Mường Khương', '', 52, 5, '[]', 1, 1372928039),
(438, 'vi', 1, 1, 'Huyện Bát Xát', '', 52, 4, '[]', 1, 1372928040),
(439, 'vi', 1, 1, 'Huyện Bảo Yên', '', 52, 3, '[]', 1, 1372928040),
(440, 'vi', 1, 1, 'Huyện Bảo Thắng', '', 52, 2, '[]', 1, 1372928040),
(441, 'vi', 1, 1, 'Huyện Bắc Hà', '', 52, 1, '[]', 1, 1372928040),
(442, 'vi', 1, 1, 'Thành Phố Tân An', '', 53, 14, '[]', 1, 1372928054),
(443, 'vi', 1, 1, 'Huyện Vĩnh Hưng', '', 53, 13, '[]', 1, 1372928054),
(444, 'vi', 1, 1, 'Huyện Thủ Thừa', '', 53, 12, '[]', 1, 1372928054),
(445, 'vi', 1, 1, 'Huyện Thạnh Hóa', '', 53, 11, '[]', 1, 1372928055),
(446, 'vi', 1, 1, 'Huyện Tân Trụ', '', 53, 10, '[]', 1, 1372928055),
(447, 'vi', 1, 1, 'Huyện Tân Thạnh', '', 53, 9, '[]', 1, 1372928055),
(448, 'vi', 1, 1, 'Huyện Tân Hưng', '', 53, 8, '[]', 1, 1372928055),
(449, 'vi', 1, 1, 'Huyện Mộc Hóa', '', 53, 7, '[]', 1, 1372928055),
(450, 'vi', 1, 1, 'Huyện Đức Huệ', '', 53, 6, '[]', 1, 1372928056),
(451, 'vi', 1, 1, 'Huyện Đức Hòa', '', 53, 5, '[]', 1, 1372928056),
(452, 'vi', 1, 1, 'Huyện Châu Thành', '', 53, 4, '[]', 1, 1372928056),
(453, 'vi', 1, 1, 'Huyện Cần Guộc', '', 53, 3, '[]', 1, 1372928057),
(454, 'vi', 1, 1, 'Huyện Cần đước', '', 53, 2, '[]', 1, 1372928057),
(455, 'vi', 1, 1, 'Huyện Bến Lức', '', 53, 1, '[]', 1, 1372928058),
(456, 'vi', 1, 1, 'Thành Phố Nam định', '', 54, 10, '[]', 1, 1372928081),
(457, 'vi', 1, 1, 'Huyện Ý Yên', '', 54, 9, '[]', 1, 1372928081),
(458, 'vi', 1, 1, 'Huyện Xuân Trường', '', 54, 8, '[]', 1, 1372928081),
(459, 'vi', 1, 1, 'Huyện Vụ Bản', '', 54, 7, '[]', 1, 1372928081),
(460, 'vi', 1, 1, 'Huyện Trực Ninh', '', 54, 6, '[]', 1, 1372928081),
(461, 'vi', 1, 1, 'Huyện Nghĩa Hưng', '', 54, 5, '[]', 1, 1372928081),
(462, 'vi', 1, 1, 'Huyện Nam Trực', '', 54, 4, '[]', 1, 1372928081),
(463, 'vi', 1, 1, 'Huyện Mỹ Lộc', '', 54, 3, '[]', 1, 1372928082),
(464, 'vi', 1, 1, 'Huyện Hải Hậu', '', 54, 2, '[]', 1, 1372928082),
(465, 'vi', 1, 1, 'Huyện Giao Thủy', '', 54, 1, '[]', 1, 1372928082),
(466, 'vi', 1, 1, 'Thị Xã Thái Hòa', '', 55, 20, '[]', 1, 1372928091),
(467, 'vi', 1, 1, 'Thị Xã Cửa Lò', '', 55, 19, '[]', 1, 1372928091),
(468, 'vi', 1, 1, 'ThàNh Phố Vinh', '', 55, 18, '[]', 1, 1372928091),
(469, 'vi', 1, 1, 'Huyện Yên Thành', '', 55, 17, '[]', 1, 1372928092),
(470, 'vi', 1, 1, 'Huyện Tương Dương', '', 55, 16, '[]', 1, 1372928092),
(471, 'vi', 1, 1, 'Huyện Thanh Chương', '', 55, 15, '[]', 1, 1372928092),
(472, 'vi', 1, 1, 'Huyện Tân Kỳ', '', 55, 14, '[]', 1, 1372928092),
(473, 'vi', 1, 1, 'Huyện Quỳnh Lưu', '', 55, 13, '[]', 1, 1372928092),
(474, 'vi', 1, 1, 'Huyện Quỳ Hợp', '', 55, 12, '[]', 1, 1372928093),
(475, 'vi', 1, 1, 'Huyện Quỳ Châu', '', 55, 11, '[]', 1, 1372928093),
(476, 'vi', 1, 1, 'Huyện Quế Phong', '', 55, 10, '[]', 1, 1372928093),
(477, 'vi', 1, 1, 'Huyện Nghĩa Đàn', '', 55, 9, '[]', 1, 1372928094),
(478, 'vi', 1, 1, 'Huyện Nghi Lộc', '', 55, 8, '[]', 1, 1372928094),
(479, 'vi', 1, 1, 'Huyện Nam Đàn', '', 55, 7, '[]', 1, 1372928095),
(480, 'vi', 1, 1, 'Huyện Kỳ Sơn', '', 55, 6, '[]', 1, 1372928095),
(481, 'vi', 1, 1, 'Huyện Hưng Nguyên', '', 55, 5, '[]', 1, 1372928095),
(482, 'vi', 1, 1, 'Huyện Đô Lương', '', 55, 4, '[]', 1, 1372928096),
(483, 'vi', 1, 1, 'Huyện Diễn Châu', '', 55, 3, '[]', 1, 1372928097),
(484, 'vi', 1, 1, 'Huyện Con Cuông', '', 55, 2, '[]', 1, 1372928097),
(485, 'vi', 1, 1, 'Huyện Anh Sơn', '', 55, 1, '[]', 1, 1372928098),
(486, 'vi', 1, 1, 'Thị Xã Tam điệp', '', 56, 9, '[]', 1, 1372928126),
(487, 'vi', 1, 1, 'ThàNh Phố Ninh Bình', '', 56, 8, '[]', 1, 1372928126),
(488, 'vi', 1, 1, 'Huyện Yên Mô', '', 56, 7, '[]', 1, 1372928126),
(489, 'vi', 1, 1, 'Huyện Yên Khánh', '', 56, 6, '[]', 1, 1372928126),
(490, 'vi', 1, 1, 'Huyện Ý Yên', '', 56, 5, '[]', 1, 1372928126),
(491, 'vi', 1, 1, 'Huyện Nho Quan', '', 56, 4, '[]', 1, 1372928127),
(492, 'vi', 1, 1, 'Huyện Kim Sơn', '', 56, 3, '[]', 1, 1372928127),
(493, 'vi', 1, 1, 'Huyện Hoa Lư', '', 56, 2, '[]', 1, 1372928127),
(494, 'vi', 1, 1, 'Huyện Gia Viễn', '', 56, 1, '[]', 1, 1372928127),
(495, 'vi', 1, 1, 'Tp.Phan Rang - Tháp Chàm', '', 57, 7, '[]', 1, 1372928138),
(496, 'vi', 1, 1, 'Huyện Thuận Nam', '', 57, 6, '[]', 1, 1372928138),
(497, 'vi', 1, 1, 'Huyện Thuận Bắc', '', 57, 5, '[]', 1, 1372928139),
(498, 'vi', 1, 1, 'Huyện Ninh Sơn', '', 57, 4, '[]', 1, 1372928139),
(499, 'vi', 1, 1, 'Huyện Ninh Phước', '', 57, 3, '[]', 1, 1372928139),
(500, 'vi', 1, 1, 'Huyện Ninh Hải', '', 57, 2, '[]', 1, 1372928139),
(501, 'vi', 1, 1, 'Huyện Bác Ái', '', 57, 1, '[]', 1, 1372928139),
(502, 'vi', 1, 1, 'Thi Xã Phú Thọ', '', 58, 13, '[]', 1, 1372928152),
(503, 'vi', 1, 1, 'Thành Phố Việt Trì', '', 58, 12, '[]', 1, 1372928152),
(504, 'vi', 1, 1, 'Huyện Yên Lập', '', 58, 11, '[]', 1, 1372928152),
(505, 'vi', 1, 1, 'Huyện Thanh Thủy', '', 58, 10, '[]', 1, 1372928152),
(506, 'vi', 1, 1, 'Huyện Thanh Sơn', '', 58, 9, '[]', 1, 1372928153),
(507, 'vi', 1, 1, 'Huyện Thanh Ba', '', 58, 8, '[]', 1, 1372928153),
(508, 'vi', 1, 1, 'Huyện Tân Sơn', '', 58, 7, '[]', 1, 1372928153),
(509, 'vi', 1, 1, 'Huyện Tam Nông', '', 58, 6, '[]', 1, 1372928153),
(510, 'vi', 1, 1, 'Huyện Phù Ninh', '', 58, 5, '[]', 1, 1372928153),
(511, 'vi', 1, 1, 'Huyện Lâm Thao', '', 58, 4, '[]', 1, 1372928154),
(512, 'vi', 1, 1, 'Huyện Hạ Hòa', '', 58, 3, '[]', 1, 1372928154),
(513, 'vi', 1, 1, 'Huyện Đoan Hùng', '', 58, 2, '[]', 1, 1372928155),
(514, 'vi', 1, 1, 'Huyện Cẩm Khê', '', 58, 1, '[]', 1, 1372928155),
(515, 'vi', 1, 1, 'Thị Xã Sông Cầu', '', 59, 9, '[]', 1, 1372928167),
(516, 'vi', 1, 1, 'Thành Phố Tuy Hòa', '', 59, 8, '[]', 1, 1372928167),
(517, 'vi', 1, 1, 'Huyện Tuy An', '', 59, 7, '[]', 1, 1372928167),
(518, 'vi', 1, 1, 'Huyện Tây Hòa', '', 59, 6, '[]', 1, 1372928167),
(519, 'vi', 1, 1, 'Huyện Sông Hinh', '', 59, 5, '[]', 1, 1372928167),
(520, 'vi', 1, 1, 'Huyện Sơn Hòa', '', 59, 4, '[]', 1, 1372928168),
(521, 'vi', 1, 1, 'Huyện Phú Hòa', '', 59, 3, '[]', 1, 1372928168),
(522, 'vi', 1, 1, 'Huyện Đồng Xuân', '', 59, 2, '[]', 1, 1372928168),
(523, 'vi', 1, 1, 'Huyện Đông Hòa', '', 59, 1, '[]', 1, 1372928168),
(524, 'vi', 1, 1, 'Thị Xã Sông Cầu', '', 60, 23, '[]', 1, 1372928178),
(525, 'vi', 1, 1, 'Thành Phố Tuy Hòa', '', 60, 22, '[]', 1, 1372928178),
(526, 'vi', 1, 1, 'Huyện Tuy An', '', 60, 21, '[]', 1, 1372928178),
(527, 'vi', 1, 1, 'Huyện Tây Hòa', '', 60, 20, '[]', 1, 1372928178),
(528, 'vi', 1, 1, 'Huyện Sông Hinh', '', 60, 19, '[]', 1, 1372928178),
(529, 'vi', 1, 1, 'Huyện Sơn Hòa', '', 60, 18, '[]', 1, 1372928179),
(530, 'vi', 1, 1, 'Huyện Phú Hòa', '', 60, 17, '[]', 1, 1372928179),
(531, 'vi', 1, 1, 'Huyện Đồng Xuân', '', 60, 16, '[]', 1, 1372928179),
(532, 'vi', 1, 1, 'Huyện Đông Hòa', '', 60, 15, '[]', 1, 1372928179),
(533, 'vi', 1, 1, 'Thành phố Uông Bí', '', 60, 14, '[]', 1, 1372928353),
(534, 'vi', 1, 1, 'Thành Phố Móng Cái', '', 60, 13, '[]', 1, 1372928353),
(535, 'vi', 1, 1, 'Thành Phố Hạ Long', '', 60, 12, '[]', 1, 1372928354),
(536, 'vi', 1, 1, 'Thành phố Cẩm Phả', '', 60, 11, '[]', 1, 1372928354),
(537, 'vi', 1, 1, 'Huyện Yên Hưng', '', 60, 10, '[]', 1, 1372928355),
(538, 'vi', 1, 1, 'Huyện Vân Đồn', '', 60, 9, '[]', 1, 1372928355),
(539, 'vi', 1, 1, 'Huyện Tiên Yên', '', 60, 8, '[]', 1, 1372928356),
(540, 'vi', 1, 1, 'Huyện Hoành Bồ', '', 60, 7, '[]', 1, 1372928356),
(541, 'vi', 1, 1, 'Huyện Hải Hà', '', 60, 6, '[]', 1, 1372928357),
(542, 'vi', 1, 1, 'Huyện Đông Triều', '', 60, 5, '[]', 1, 1372928358),
(543, 'vi', 1, 1, 'Huyện Đầm Hà', '', 60, 4, '[]', 1, 1372928359),
(544, 'vi', 1, 1, 'Huyện Cô Tô', '', 60, 3, '[]', 1, 1372928359),
(545, 'vi', 1, 1, 'Huyện Bình Liêu', '', 60, 2, '[]', 1, 1372928360),
(546, 'vi', 1, 1, 'Huyện Ba Chẽ', '', 60, 1, '[]', 1, 1372928361),
(547, 'vi', 1, 1, 'Thành Phố Đồng Hới', '', 61, 7, '[]', 1, 1372928371),
(548, 'vi', 1, 1, 'Huyện Tuyên Hóa', '', 61, 6, '[]', 1, 1372928371),
(549, 'vi', 1, 1, 'Huyện Quảng Trạch', '', 61, 5, '[]', 1, 1372928371),
(550, 'vi', 1, 1, 'Huyện Quảng Ninh', '', 61, 4, '[]', 1, 1372928371),
(551, 'vi', 1, 1, 'Huyện Minh Hóa', '', 61, 3, '[]', 1, 1372928371),
(552, 'vi', 1, 1, 'Huyện Lệ Thủy', '', 61, 2, '[]', 1, 1372928372),
(553, 'vi', 1, 1, 'Huyện Bố Trạch', '', 61, 1, '[]', 1, 1372928372),
(554, 'vi', 1, 1, 'Thành Phố Tam Kỳ', '', 62, 18, '[]', 1, 1372928384),
(555, 'vi', 1, 1, 'Thành Phố Hội An', '', 62, 17, '[]', 1, 1372928384),
(556, 'vi', 1, 1, 'Huyện Tiên Phước', '', 62, 16, '[]', 1, 1372928384),
(557, 'vi', 1, 1, 'Huyện Thăng Bình', '', 62, 15, '[]', 1, 1372928384),
(558, 'vi', 1, 1, 'Huyện Tây Giang', '', 62, 14, '[]', 1, 1372928384),
(559, 'vi', 1, 1, 'Huyện Quế Sơn', '', 62, 13, '[]', 1, 1372928385),
(560, 'vi', 1, 1, 'Huyện Phước Sơn', '', 62, 12, '[]', 1, 1372928385),
(561, 'vi', 1, 1, 'Huyện Phú Ninh', '', 62, 11, '[]', 1, 1372928385),
(562, 'vi', 1, 1, 'Huyện Núi Thành', '', 62, 10, '[]', 1, 1372928385),
(563, 'vi', 1, 1, 'Huyện Nông Sơn', '', 62, 9, '[]', 1, 1372928386),
(564, 'vi', 1, 1, 'Huyện Nam Trà My', '', 62, 8, '[]', 1, 1372928386),
(565, 'vi', 1, 1, 'Huyện Nam Giang', '', 62, 7, '[]', 1, 1372928386),
(566, 'vi', 1, 1, 'Huyện Hiệp Đức', '', 62, 6, '[]', 1, 1372928387),
(567, 'vi', 1, 1, 'Huyện Đông Giang', '', 62, 5, '[]', 1, 1372928387),
(568, 'vi', 1, 1, 'Huyện Điện Bàn', '', 62, 4, '[]', 1, 1372928388),
(569, 'vi', 1, 1, 'Huyện Đại Lộc', '', 62, 3, '[]', 1, 1372928388),
(570, 'vi', 1, 1, 'Huyện Duy Xuyên', '', 62, 2, '[]', 1, 1372928389),
(571, 'vi', 1, 1, 'Huyện Bắc Trà My', '', 62, 1, '[]', 1, 1372928389),
(572, 'vi', 1, 1, 'Thành Phố Quảng Ngãi', '', 63, 14, '[]', 1, 1372928408),
(573, 'vi', 1, 1, 'Huyện Tư Nghĩa', '', 63, 13, '[]', 1, 1372928408),
(574, 'vi', 1, 1, 'Huyện Trà Bồng', '', 63, 12, '[]', 1, 1372928408),
(575, 'vi', 1, 1, 'Huyện Tây Trà', '', 63, 11, '[]', 1, 1372928408),
(576, 'vi', 1, 1, 'Huyện Sơn Tịnh', '', 63, 10, '[]', 1, 1372928408),
(577, 'vi', 1, 1, 'Huyện Sơn Tây', '', 63, 9, '[]', 1, 1372928408),
(578, 'vi', 1, 1, 'Huyện Sơn Hà', '', 63, 8, '[]', 1, 1372928409),
(579, 'vi', 1, 1, 'Huyện Nghĩa Hành', '', 63, 7, '[]', 1, 1372928409),
(580, 'vi', 1, 1, 'Huyện Mộ đức', '', 63, 6, '[]', 1, 1372928409),
(581, 'vi', 1, 1, 'Huyện Minh Long', '', 63, 5, '[]', 1, 1372928409),
(582, 'vi', 1, 1, 'Huyện Lý Sơn', '', 63, 4, '[]', 1, 1372928410),
(583, 'vi', 1, 1, 'Huyện đức Phổ', '', 63, 3, '[]', 1, 1372928410),
(584, 'vi', 1, 1, 'Huyện Bình Sơn', '', 63, 2, '[]', 1, 1372928411),
(585, 'vi', 1, 1, 'Huyện Ba Tơ', '', 63, 1, '[]', 1, 1372928411),
(586, 'vi', 1, 1, 'Thị Xã Quảng Trị', '', 64, 10, '[]', 1, 1372928421),
(587, 'vi', 1, 1, 'Thành Phố đông Hà', '', 64, 9, '[]', 1, 1372928421),
(588, 'vi', 1, 1, 'Huyện Vĩnh Linh', '', 64, 8, '[]', 1, 1372928421),
(589, 'vi', 1, 1, 'Huyện Triệu Phong', '', 64, 7, '[]', 1, 1372928421),
(590, 'vi', 1, 1, 'Huyện Hướng Hóa', '', 64, 6, '[]', 1, 1372928422),
(591, 'vi', 1, 1, 'Huyện Hải Lăng', '', 64, 5, '[]', 1, 1372928422),
(592, 'vi', 1, 1, 'Huyện Gio Linh', '', 64, 4, '[]', 1, 1372928422),
(593, 'vi', 1, 1, 'Huyện Đảo Cồn Cỏ', '', 64, 3, '[]', 1, 1372928422),
(594, 'vi', 1, 1, 'Huyện Đak Rông', '', 64, 2, '[]', 1, 1372928422),
(595, 'vi', 1, 1, 'Huyện Cam Lộ', '', 64, 1, '[]', 1, 1372928423),
(596, 'vi', 1, 1, 'Thị Xã Vĩnh Châu', '', 65, 10, '[]', 1, 1372928433),
(597, 'vi', 1, 1, 'Thành Phố Sóc Trăng', '', 65, 9, '[]', 1, 1372928434),
(598, 'vi', 1, 1, 'Huyện Thạnh Trị', '', 65, 8, '[]', 1, 1372928434),
(599, 'vi', 1, 1, 'Huyện Ngã Năm', '', 65, 7, '[]', 1, 1372928434),
(600, 'vi', 1, 1, 'Huyện Mỹ Xuyên', '', 65, 6, '[]', 1, 1372928434),
(601, 'vi', 1, 1, 'Huyện Mỹ Tú', '', 65, 5, '[]', 1, 1372928434),
(602, 'vi', 1, 1, 'Huyện Long Phú', '', 65, 4, '[]', 1, 1372928434),
(603, 'vi', 1, 1, 'Huyện Kế Sách', '', 65, 3, '[]', 1, 1372928435),
(604, 'vi', 1, 1, 'Huyện Cù Lao Dung', '', 65, 2, '[]', 1, 1372928435),
(605, 'vi', 1, 1, 'Huyện Châu Thành', '', 65, 1, '[]', 1, 1372928435),
(606, 'vi', 1, 1, 'Thành phố Sơn La', '', 66, 11, '[]', 1, 1372928456),
(607, 'vi', 1, 1, 'Huyện Yên Châu', '', 66, 10, '[]', 1, 1372928456),
(608, 'vi', 1, 1, 'Huyện Thuận Châu', '', 66, 9, '[]', 1, 1372928456),
(609, 'vi', 1, 1, 'Huyện Sốp Cộp', '', 66, 8, '[]', 1, 1372928456),
(610, 'vi', 1, 1, 'Huyện Sông Mã', '', 66, 7, '[]', 1, 1372928456),
(611, 'vi', 1, 1, 'Huyện Quỳnh Nhai', '', 66, 6, '[]', 1, 1372928457),
(612, 'vi', 1, 1, 'Huyện Phù Yên', '', 66, 5, '[]', 1, 1372928457),
(613, 'vi', 1, 1, 'Huyện Mường La', '', 66, 4, '[]', 1, 1372928457),
(614, 'vi', 1, 1, 'Huyện Mộc Châu', '', 66, 3, '[]', 1, 1372928457),
(615, 'vi', 1, 1, 'Huyện Mai Sơn', '', 66, 2, '[]', 1, 1372928458),
(616, 'vi', 1, 1, 'Huyện Bắc Yên', '', 66, 1, '[]', 1, 1372928458),
(617, 'vi', 1, 1, 'Thị Xã Tây Ninh', '', 67, 9, '[]', 1, 1372928470),
(618, 'vi', 1, 1, 'Huyện Trảng Bàng', '', 67, 8, '[]', 1, 1372928470),
(619, 'vi', 1, 1, 'Huyện Tân Châu', '', 67, 7, '[]', 1, 1372928470),
(620, 'vi', 1, 1, 'Huyện Tân Biên', '', 67, 6, '[]', 1, 1372928470),
(621, 'vi', 1, 1, 'Huyện Hòa Thành', '', 67, 5, '[]', 1, 1372928470),
(622, 'vi', 1, 1, 'Huyện Gò Dầu', '', 67, 4, '[]', 1, 1372928470),
(623, 'vi', 1, 1, 'Huyện Dương Minh Châu', '', 67, 3, '[]', 1, 1372928470),
(624, 'vi', 1, 1, 'Huyện Châu Thành', '', 67, 2, '[]', 1, 1372928471),
(625, 'vi', 1, 1, 'Huyện Bến Cầu', '', 67, 1, '[]', 1, 1372928471),
(626, 'vi', 1, 1, 'ThàNh Phố Thái Bình', '', 68, 9, '[]', 1, 1372928482),
(627, 'vi', 1, 1, 'Huyện Vũ Thư', '', 68, 8, '[]', 1, 1372928483),
(628, 'vi', 1, 1, 'Huyện Tiền Hải', '', 68, 7, '[]', 1, 1372928483),
(629, 'vi', 1, 1, 'Huyện Thái Thụy', '', 68, 6, '[]', 1, 1372928483),
(630, 'vi', 1, 1, 'Huyện Quỳnh Phụ', '', 68, 5, '[]', 1, 1372928483),
(631, 'vi', 1, 1, 'Huyện Quỳnh Côi', '', 68, 4, '[]', 1, 1372928483),
(632, 'vi', 1, 1, 'Huyện Kiến Xương', '', 68, 3, '[]', 1, 1372928483),
(633, 'vi', 1, 1, 'Huyện Hưng Hà', '', 68, 2, '[]', 1, 1372928483),
(634, 'vi', 1, 1, 'Huyện Đông Hưng', '', 68, 1, '[]', 1, 1372928484),
(635, 'vi', 1, 1, 'Thị Xã Sông Công', '', 69, 9, '[]', 1, 1372928494),
(636, 'vi', 1, 1, 'Thành Phố Thái Nguyên', '', 69, 8, '[]', 1, 1372928494),
(637, 'vi', 1, 1, 'Huyện Võ Nhai', '', 69, 7, '[]', 1, 1372928494),
(638, 'vi', 1, 1, 'Huyện Phú Lương', '', 69, 6, '[]', 1, 1372928494),
(639, 'vi', 1, 1, 'Huyện Phú Bình', '', 69, 5, '[]', 1, 1372928494),
(640, 'vi', 1, 1, 'Huyện Phổ Yên', '', 69, 4, '[]', 1, 1372928494),
(641, 'vi', 1, 1, 'Huyện Đồng Hỷ', '', 69, 3, '[]', 1, 1372928495),
(642, 'vi', 1, 1, 'Huyện Định Hóa', '', 69, 2, '[]', 1, 1372928495),
(643, 'vi', 1, 1, 'Huyện Đại Từ', '', 69, 1, '[]', 1, 1372928495),
(644, 'vi', 1, 1, 'Thị Xã Sầm Sơn', '', 70, 27, '[]', 1, 1372928505),
(645, 'vi', 1, 1, 'Thị Xã Bỉm Sơn', '', 70, 26, '[]', 1, 1372928505),
(646, 'vi', 1, 1, 'Thành Phố Thanh Hóa', '', 70, 25, '[]', 1, 1372928505),
(647, 'vi', 1, 1, 'Huyện Yên định', '', 70, 24, '[]', 1, 1372928505),
(648, 'vi', 1, 1, 'Huyện Vĩnh Lộc', '', 70, 23, '[]', 1, 1372928505),
(649, 'vi', 1, 1, 'Huyện Triệu Sơn', '', 70, 22, '[]', 1, 1372928506),
(650, 'vi', 1, 1, 'Huyện Tĩnh Gia', '', 70, 21, '[]', 1, 1372928506),
(651, 'vi', 1, 1, 'Huyện Thường Xuân', '', 70, 20, '[]', 1, 1372928506),
(652, 'vi', 1, 1, 'Huyện Thọ Xuân', '', 70, 19, '[]', 1, 1372928506),
(653, 'vi', 1, 1, 'Huyện Thiệu Hóa', '', 70, 18, '[]', 1, 1372928507),
(654, 'vi', 1, 1, 'Huyện Thạch Thành', '', 70, 17, '[]', 1, 1372928507),
(655, 'vi', 1, 1, 'Huyện Quảng Xương', '', 70, 16, '[]', 1, 1372928507),
(656, 'vi', 1, 1, 'Huyện Quan Sơn', '', 70, 15, '[]', 1, 1372928508),
(657, 'vi', 1, 1, 'Huyện Quan Hóa', '', 70, 14, '[]', 1, 1372928508),
(658, 'vi', 1, 1, 'Huyện Nông Cống', '', 70, 13, '[]', 1, 1372928509),
(659, 'vi', 1, 1, 'Huyện Như Xuân', '', 70, 12, '[]', 1, 1372928509),
(660, 'vi', 1, 1, 'Huyện Như Thanh', '', 70, 11, '[]', 1, 1372928510),
(661, 'vi', 1, 1, 'Huyện Ngọc Lặc', '', 70, 10, '[]', 1, 1372928510),
(662, 'vi', 1, 1, 'Huyện Nga Sơn', '', 70, 9, '[]', 1, 1372928511),
(663, 'vi', 1, 1, 'Huyện Mường Lát', '', 70, 8, '[]', 1, 1372928511),
(664, 'vi', 1, 1, 'Huyện Lang Chánh', '', 70, 7, '[]', 1, 1372928512),
(665, 'vi', 1, 1, 'Huyện Hoằng Hóa', '', 70, 6, '[]', 1, 1372928513),
(666, 'vi', 1, 1, 'Huyện Hậu Lộc', '', 70, 5, '[]', 1, 1372928514),
(667, 'vi', 1, 1, 'Huyện Hà Trung', '', 70, 4, '[]', 1, 1372928515),
(668, 'vi', 1, 1, 'Huyện Đông Sơn', '', 70, 3, '[]', 1, 1372928516),
(669, 'vi', 1, 1, 'Huyện Cẩm Thủy', '', 70, 2, '[]', 1, 1372928517),
(670, 'vi', 1, 1, 'Huyện Bá Thước', '', 70, 1, '[]', 1, 1372928518),
(671, 'vi', 1, 1, 'Thị Xã Hương Thủy', '', 71, 9, '[]', 1, 1372928518),
(672, 'vi', 1, 1, 'Thành Phố Huế', '', 71, 8, '[]', 1, 1372928519),
(673, 'vi', 1, 1, 'Huyện Quảng Điền', '', 71, 7, '[]', 1, 1372928519),
(674, 'vi', 1, 1, 'Huyện Phú Vang', '', 71, 6, '[]', 1, 1372928519),
(675, 'vi', 1, 1, 'Huyện Phú Lộc', '', 71, 5, '[]', 1, 1372928519),
(676, 'vi', 1, 1, 'Huyện Phong Điền', '', 71, 4, '[]', 1, 1372928519),
(677, 'vi', 1, 1, 'Huyện Nam đông', '', 71, 3, '[]', 1, 1372928519),
(678, 'vi', 1, 1, 'Huyện Hương Trà', '', 71, 2, '[]', 1, 1372928520),
(679, 'vi', 1, 1, 'Huyện A Lưới', '', 71, 1, '[]', 1, 1372928520),
(680, 'vi', 1, 1, 'Thị Xã Gò Công', '', 72, 10, '[]', 1, 1372928529),
(681, 'vi', 1, 1, 'Thành Phố Mỹ Tho', '', 72, 9, '[]', 1, 1372928529),
(682, 'vi', 1, 1, 'Huyện Tân Phước', '', 72, 8, '[]', 1, 1372928529),
(683, 'vi', 1, 1, 'Huyện Tân Phú Đông', '', 72, 7, '[]', 1, 1372928529),
(684, 'vi', 1, 1, 'Huyện Gò Công Tây', '', 72, 6, '[]', 1, 1372928529),
(685, 'vi', 1, 1, 'Huyện Gò Công Đông', '', 72, 5, '[]', 1, 1372928530),
(686, 'vi', 1, 1, 'Huyện Chợ Gạo', '', 72, 4, '[]', 1, 1372928530),
(687, 'vi', 1, 1, 'Huyện Châu Thành', '', 72, 3, '[]', 1, 1372928530),
(688, 'vi', 1, 1, 'Huyện Cai Lậy', '', 72, 2, '[]', 1, 1372928530),
(689, 'vi', 1, 1, 'Huyện Cái Bè', '', 72, 1, '[]', 1, 1372928531),
(690, 'vi', 1, 1, 'Thành Phố Trà Vinh', '', 73, 8, '[]', 1, 1372928539),
(691, 'vi', 1, 1, 'Huyện Trà Cú', '', 73, 7, '[]', 1, 1372928539);
INSERT INTO `tbl_city` (`id`, `language`, `type`, `status`, `name`, `alias`, `parent_id`, `order_view`, `other`, `created_by`, `created_time`) VALUES
(692, 'vi', 1, 1, 'Huyện Tiểu Cần', '', 73, 6, '[]', 1, 1372928540),
(693, 'vi', 1, 1, 'Huyện Duyên Hải', '', 73, 5, '[]', 1, 1372928540),
(694, 'vi', 1, 1, 'Huyện Châu Thành', '', 73, 4, '[]', 1, 1372928540),
(695, 'vi', 1, 1, 'Huyện Cầu Ngang', '', 73, 3, '[]', 1, 1372928540),
(696, 'vi', 1, 1, 'Huyện Cầu Kè', '', 73, 2, '[]', 1, 1372928540),
(697, 'vi', 1, 1, 'Huyện Càng Long', '', 73, 1, '[]', 1, 1372928540),
(698, 'vi', 1, 1, 'Thành phố Tuyên Quang', '', 74, 7, '[]', 1, 1372928552),
(699, 'vi', 1, 1, 'Huyện Yên Sơn', '', 74, 6, '[]', 1, 1372928552),
(700, 'vi', 1, 1, 'Huyện Sơn Dương', '', 74, 5, '[]', 1, 1372928552),
(701, 'vi', 1, 1, 'Huyện Nà Hang', '', 74, 4, '[]', 1, 1372928552),
(702, 'vi', 1, 1, 'Huyện Lâm Bình', '', 74, 3, '[]', 1, 1372928552),
(703, 'vi', 1, 1, 'Huyện Hàm Yên', '', 74, 2, '[]', 1, 1372928552),
(704, 'vi', 1, 1, 'Huyện Chiêm Hóa', '', 74, 1, '[]', 1, 1372928552),
(705, 'vi', 1, 1, 'Thị Xã Phúc Yên', '', 75, 9, '[]', 1, 1372928562),
(706, 'vi', 1, 1, 'Thành Phố Vĩnh Yên', '', 75, 8, '[]', 1, 1372928562),
(707, 'vi', 1, 1, 'Huyên Yên Lạc', '', 75, 7, '[]', 1, 1372928562),
(708, 'vi', 1, 1, 'Huyện Vĩnh Tường', '', 75, 6, '[]', 1, 1372928562),
(709, 'vi', 1, 1, 'Huỵên Tam Đảo', '', 75, 5, '[]', 1, 1372928563),
(710, 'vi', 1, 1, 'Huyện Tam Dương', '', 75, 4, '[]', 1, 1372928563),
(711, 'vi', 1, 1, 'Huyện Sông Lô', '', 75, 3, '[]', 1, 1372928563),
(712, 'vi', 1, 1, 'Huyện Lập Thạch', '', 75, 2, '[]', 1, 1372928563),
(713, 'vi', 1, 1, 'Huyện Bình Xuyên', '', 75, 1, '[]', 1, 1372928563),
(714, 'vi', 1, 1, 'Thành Phố Vĩnh Long', '', 76, 8, '[]', 1, 1372928577),
(715, 'vi', 1, 1, 'Huyện Vũng Liêm', '', 76, 7, '[]', 1, 1372928577),
(716, 'vi', 1, 1, 'Huyện Trà Ôn', '', 76, 6, '[]', 1, 1372928577),
(717, 'vi', 1, 1, 'Huyện Tam Bình', '', 76, 5, '[]', 1, 1372928577),
(718, 'vi', 1, 1, 'Huyện Mang Thít', '', 76, 4, '[]', 1, 1372928577),
(719, 'vi', 1, 1, 'Huyện Long Hồ', '', 76, 3, '[]', 1, 1372928577),
(720, 'vi', 1, 1, 'Huyện Bình Tân', '', 76, 2, '[]', 1, 1372928578),
(721, 'vi', 1, 1, 'Huyện Bình Minh', '', 76, 1, '[]', 1, 1372928578),
(722, 'vi', 1, 1, 'Thị Xã Nghĩa Lộ', '', 77, 9, '[]', 1, 1372928590),
(723, 'vi', 1, 1, 'Thành Phố Yên Bái', '', 77, 8, '[]', 1, 1372928590),
(724, 'vi', 1, 1, 'Huyện Yên Bình', '', 77, 7, '[]', 1, 1372928590),
(725, 'vi', 1, 1, 'Huyện Văn Yên', '', 77, 6, '[]', 1, 1372928590),
(726, 'vi', 1, 1, 'Huyện Văn Chấn', '', 77, 5, '[]', 1, 1372928590),
(727, 'vi', 1, 1, 'Huyện Trấn Yên', '', 77, 4, '[]', 1, 1372928590),
(728, 'vi', 1, 1, 'Huyện Trạm Tấu', '', 77, 3, '[]', 1, 1372928590),
(729, 'vi', 1, 1, 'Huyện Mù Căng Chải', '', 77, 2, '[]', 1, 1372928591),
(730, 'vi', 1, 1, 'Huyện Lục Yên', '', 77, 1, '[]', 1, 1372928591),
(731, 'vi', 1, 1, 'Quận Thanh Khê', '', 78, 9, '[]', 1, 1372928604),
(732, 'vi', 1, 1, 'Quận Sơn Trà', '', 78, 8, '[]', 1, 1372928604),
(733, 'vi', 1, 1, 'Quận Ngũ Hành Sơn', '', 78, 7, '[]', 1, 1372928605),
(734, 'vi', 1, 1, 'Quận Liên Chiểu', '', 78, 6, '[]', 1, 1372928605),
(735, 'vi', 1, 1, 'Quận Hải Châu', '', 78, 5, '[]', 1, 1372928605),
(736, 'vi', 1, 1, 'Quận Cẩm Lệ', '', 78, 4, '[]', 1, 1372928605),
(737, 'vi', 1, 1, 'Quận 3', '', 78, 3, '[]', 1, 1372928605),
(738, 'vi', 1, 1, 'Huyện Hoàng Sa', '', 78, 2, '[]', 1, 1372928605),
(739, 'vi', 1, 1, 'Huyện Hòa Vang', '', 78, 1, '[]', 1, 1372928606),
(740, 'vi', 1, 1, 'Thị Xã Buôn Hồ', '', 79, 15, '[]', 1, 1372928619),
(741, 'vi', 1, 1, 'Thành Phố Buôn Ma Thuột', '', 79, 14, '[]', 1, 1372928619),
(742, 'vi', 1, 1, 'Huyện M''Đrắk', '', 79, 13, '[]', 1, 1372928619),
(743, 'vi', 1, 1, 'Huyện Lắk', '', 79, 12, '[]', 1, 1372928619),
(744, 'vi', 1, 1, 'Huyện Krông Pắk', '', 79, 11, '[]', 1, 1372928619),
(745, 'vi', 1, 1, 'Huyện Krông Năng', '', 79, 10, '[]', 1, 1372928620),
(746, 'vi', 1, 1, 'Huyện Krông Búk', '', 79, 9, '[]', 1, 1372928620),
(747, 'vi', 1, 1, 'Huyện Krông Bông', '', 79, 8, '[]', 1, 1372928620),
(748, 'vi', 1, 1, 'Huyện Krông A Na', '', 79, 7, '[]', 1, 1372928620),
(749, 'vi', 1, 1, 'Huyện Ea Súp', '', 79, 6, '[]', 1, 1372928621),
(750, 'vi', 1, 1, 'Huyện Ea Kar', '', 79, 5, '[]', 1, 1372928621),
(751, 'vi', 1, 1, 'Huyện Ea H''leo', '', 79, 4, '[]', 1, 1372928622),
(752, 'vi', 1, 1, 'Huyện Cư M''gar', '', 79, 3, '[]', 1, 1372928622),
(753, 'vi', 1, 1, 'Huyện Cư Kuin', '', 79, 2, '[]', 1, 1372928622),
(754, 'vi', 1, 1, 'Huyện Buôn đôn', '', 79, 1, '[]', 1, 1372928623),
(755, 'vi', 1, 1, 'Thị Xã Gia Nghĩa', '', 80, 8, '[]', 1, 1372928629),
(756, 'vi', 1, 1, 'Huyện Tuy đức', '', 80, 7, '[]', 1, 1372928630),
(757, 'vi', 1, 1, 'Huyện Krông Nô', '', 80, 6, '[]', 1, 1372928630),
(758, 'vi', 1, 1, 'Huyện Đắk Song', '', 80, 5, '[]', 1, 1372928630),
(759, 'vi', 1, 1, 'Huyện Đăk R''lấp', '', 80, 4, '[]', 1, 1372928630),
(760, 'vi', 1, 1, 'Huyện Đắk Mil', '', 80, 3, '[]', 1, 1372928630),
(761, 'vi', 1, 1, 'Huyện Đắk Glong', '', 80, 2, '[]', 1, 1372928630),
(762, 'vi', 1, 1, 'Huyện Cư Jút', '', 80, 1, '[]', 1, 1372928631),
(763, 'vi', 1, 1, 'Thị Xã Mường Lay', '', 81, 9, '[]', 1, 1372928643),
(764, 'vi', 1, 1, 'Thành Phố Điện Biên Phủ', '', 81, 8, '[]', 1, 1372928643),
(765, 'vi', 1, 1, 'Huyện Tuần Giáo', '', 81, 7, '[]', 1, 1372928643),
(766, 'vi', 1, 1, 'Huyện Tủa Chùa', '', 81, 6, '[]', 1, 1372928643),
(767, 'vi', 1, 1, 'Huyện Mường Nhé', '', 81, 5, '[]', 1, 1372928643),
(768, 'vi', 1, 1, 'Huyện Mường Chà', '', 81, 4, '[]', 1, 1372928643),
(769, 'vi', 1, 1, 'Huyện Mường Áng', '', 81, 3, '[]', 1, 1372928643),
(770, 'vi', 1, 1, 'Huyện Điện Biên Đông', '', 81, 2, '[]', 1, 1372928644),
(771, 'vi', 1, 1, 'Huyện Điện Biên', '', 81, 1, '[]', 1, 1372928644),
(772, 'vi', 1, 1, 'Thị Xã Long Khánh', '', 82, 11, '[]', 1, 1372928654),
(773, 'vi', 1, 1, 'Thành Phố Biên Hòa', '', 82, 10, '[]', 1, 1372928654),
(774, 'vi', 1, 1, 'Huyện Xuân Lộc', '', 82, 9, '[]', 1, 1372928654),
(775, 'vi', 1, 1, 'Huyện Vĩnh Cửu', '', 82, 8, '[]', 1, 1372928654),
(776, 'vi', 1, 1, 'Huyện Trảng Bom', '', 82, 7, '[]', 1, 1372928655),
(777, 'vi', 1, 1, 'Huyện Thống Nhất', '', 82, 6, '[]', 1, 1372928655),
(778, 'vi', 1, 1, 'Huyện Tân Phú', '', 82, 5, '[]', 1, 1372928655),
(779, 'vi', 1, 1, 'Huyện Nhơn Trạch', '', 82, 4, '[]', 1, 1372928655),
(780, 'vi', 1, 1, 'Huyện Long Thành', '', 82, 3, '[]', 1, 1372928655),
(781, 'vi', 1, 1, 'Huyện Định Quán', '', 82, 2, '[]', 1, 1372928656),
(782, 'vi', 1, 1, 'Huyện Cẩm Mỹ', '', 82, 1, '[]', 1, 1372928656),
(783, 'vi', 1, 1, 'Thị Xã Sa Đéc', '', 83, 11, '[]', 1, 1372928668),
(784, 'vi', 1, 1, 'Thành Phố Cao Lãnh', '', 83, 10, '[]', 1, 1372928668),
(785, 'vi', 1, 1, 'Huyện Tháp Mười', '', 83, 9, '[]', 1, 1372928669),
(786, 'vi', 1, 1, 'Huyện Thanh Bình', '', 83, 8, '[]', 1, 1372928669),
(787, 'vi', 1, 1, 'Huyện Tân Hồng', '', 83, 7, '[]', 1, 1372928669),
(788, 'vi', 1, 1, 'Huyện Tam Nông', '', 83, 6, '[]', 1, 1372928669),
(789, 'vi', 1, 1, 'Huyện Lấp Vò', '', 83, 5, '[]', 1, 1372928669),
(790, 'vi', 1, 1, 'Huyện Lai Vung', '', 83, 4, '[]', 1, 1372928669),
(791, 'vi', 1, 1, 'Huyện Hồng Ngự', '', 83, 3, '[]', 1, 1372928670),
(792, 'vi', 1, 1, 'Huyện Châu Thành', '', 83, 2, '[]', 1, 1372928670),
(793, 'vi', 1, 1, 'Huyện Cao Lãnh', '', 83, 1, '[]', 1, 1372928670),
(795, 'vi', 0, 1, 'Nam Định', '', 0, 0, '{"cost":""}', 1, 1373860921);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `parent_class` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `reply` text COLLATE utf8_unicode_ci NOT NULL,
  `other` text COLLATE utf8_unicode_ci NOT NULL,
  `created_time` int(11) NOT NULL,
  `vote` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `language`, `user_id`, `name`, `phone`, `email`, `status`, `parent_class`, `parent_id`, `title`, `content`, `reply`, `other`, `created_time`, `vote`) VALUES
(1, '', 0, 'Nguyễn Thành Nam', '', 'motthanhnam@yahoo.com', 1, 'Product', 19, '', 'Tôi rất thích sản phẩm này', '', 'null', 1385971259, 3),
(2, '', 0, 'Lê Lan', '', 'motthanhnam@yahoo.com', 1, 'Product', 19, '', 'HTML5 defines a variety of new input types: sliders, number spinners, popup calendars, color choosers, autocompleting suggest boxes, and more. The beauty of these elements is that you can use them now: for browsers that don''t support a particular input type, there is automatic fallback to standard textfields. There are two keys to understanding why the automatic fallback works consistently in all major browsers:', '', 'null', 1385971420, 2),
(3, '', 0, 'Lê Lan', '', 'motthanhnam@yahoo.com', 1, 'Product', 19, '', 'HTML5 defines a variety of new input types: sliders, number spinners, popup calendars, color choosers, autocompleting suggest boxes, and more. The beauty of these elements is that you can use them now: for browsers that don''t support a particular input type, there is automatic fallback to standard textfields. There are two keys to understanding why the automatic fallback works consistently in all major browsers:', '', 'null', 1385971420, 2),
(4, '', 0, 'Kiet Vu', '', '', 1, 'Product', 19, '', 'The problem with this one is that jQuery''s keypress event doesn''t consistently fire when the backspace or delete keys are pressed. This means that the user can back out the text and the function won''t get called which is a UX fail. I''m seeing keyup as the means that most people are using. I don''t quite like it; I want the feedback to happen on keydown but it''s a bit difficult to pull off.', '', 'null', 1410403708, 0),
(5, '', 0, 'Kiet Vu', '', '', 1, 'Product', 19, '', 'The problem with this one is that jQuery''s keypress event doesn''t consistently fire when the backspace or delete keys are pressed. This means that the user can back out the text and the function won''t get called which is a UX fail. I''m seeing keyup as the means that most people are using. I don''t quite like it; I want the feedback to happen on keydown but it''s a bit difficult to pull off.', '', 'null', 1410403731, 0),
(6, '', 0, 'Kiet Vu', '', '', 1, 'Product', 19, '', 'The problem with this one is that jQuery''s keypress event doesn''t consistently fire when the backspace or delete keys are pressed. This means that the user can back out the text and the function won''t get called which is a UX fail. I''m seeing keyup as the means that most people are using. I don''t quite like it; I want the feedback to happen on keydown but it''s a bit difficult to pull off.', '', 'null', 1410403752, 0),
(7, '', 0, 'Anh Khoi', '', '', 1, 'Product', 19, '', 'To disable a submit button for file field when a file is not chosen, then enable after the user chooses a file to upload', '', 'null', 1410403926, 0),
(8, '', 0, 'Thu Trang', '', '', 1, 'Product', 19, '', 'This function runs once, then the button is never enabled and I wanted to get her to keep checking the inputs every time I typed something, so that when she had something written on all inputs, the button will be enabled', '', 'null', 1410404083, 0),
(9, '', 0, 'Khoi mit', '', '', 1, 'Product', 19, '', 'The button is disabled until you enter the first field a value. . . I put more exceptions, but only takes the first field.', '', 'null', 1410404182, 0),
(10, '', 0, 'Anh Kiet', '', '', 1, 'Product', 19, '', 'The button is disabled until you enter the first field a value. . . I put more exceptions, but only takes the first field.', '', 'null', 1410404481, 0),
(11, '', 0, 'Kiet', '', '', 1, 'Product', 19, '', 'The problem with this one is that jQuery''s keypress event doesn''t consistently fire when the backspace or delete keys are pressed. This means that the user can back out the text and the function won''t get called which is a UX fail. I''m seeing keyup as the means that most people are using. I don''t quite like it; I want the feedback to happen on keydown but it''s a bit difficult to pull off', '', 'null', 1410404564, 0),
(12, '', 0, 'Khoi', '', '', 1, 'Product', 19, '', 'The problem with this one is that jQuery''s keypress event doesn''t consistently fire when the backspace or delete keys are pressed. This means that the user can back out the text and the function won''t get called which is a UX fail. I''m seeing keyup as the means that most people are using. I don''t quite like it; I want the feedback to happen on keydown but it''s a bit difficult to pull off', '', 'null', 1410405164, 0),
(13, '', 0, 'Khoi', '', '', 1, 'Product', 19, '', 'include(AdminModule.php): failed to open stream: No such file or directory ', '', 'null', 1410405730, 0),
(14, '', 0, 'Kiet', '', '', 1, 'Product', 19, '', 'The problem with this one is that jQuery''s keypress event doesn''t consistently fire when the backspace or delete keys are pressed. This means that the user can back out the text and the function won''t get called which is a UX fail. I''m seeing keyup as the means that most people are using. I don''t quite like it; I want the feedback to happen on keydown but it''s a bit difficult to pull off', '', 'null', 1410405775, 0),
(15, '', 0, 'Trang', '', '', 1, 'Product', 19, '', 'The problem with this one is that jQuery''s keypress event doesn''t consistently fire when the backspace or delete keys are pressed. This means that the user can back out the text and the function won''t get called which is a UX fail. I''m seeing keyup as the means that most people are using. I don''t quite like it; I want the feedback to happen on keydown but it''s a bit difficult to pull off.', '', 'null', 1410405859, 0),
(16, '', 0, 'Nam', '', '', 1, 'Product', 19, '', 'The problem with this one is that jQuery''s keypress event doesn''t consistently fire when the backspace or delete keys are pressed. This means that the user can back out the text and the function won''t get called which is a UX fail. I''m seeing keyup as the means that most people are using. I don''t quite like it; I want the feedback to happen on keydown but it''s a bit difficult to pull off', '', 'null', 1410405982, 0),
(17, '', 0, 'Kiet', '', '', 1, 'Product', 19, '', 'The problem with this one is that jQuery''s keypress event doesn''t consistently fire when the backspace or delete keys are pressed. This means that the user can back out the text and the function won''t get called which is a UX fail. I''m seeing keyup as the means that most people are using. I don''t quite like it; I want the feedback to happen on keydown but it''s a bit difficult to pull off', '', 'null', 1410405989, 0),
(18, '', 0, 'Kiet', '', '', 1, 'Product', 19, '', 'Chất lượng rất tốt', '', 'null', 1410406651, 0),
(19, '', 0, 'Kiet', '', '', 1, 'News', 21, '', 'The PHP Development Team announces the immediate availability of PHP 5.6.0. This new version comes with new features, some backward incompatible changes and many improvements.', '', 'null', 1410432236, 0),
(20, '', 0, 'Trang', '', '', 1, 'News', 21, '', 'The PHP Development Team announces the immediate availability of PHP 5.6.0. This new version comes with new features, some backward incompatible changes and many improvements.', '', 'null', 1410432255, 0),
(21, '', 0, 'Khoi', '', '', 1, 'News', 21, '', 'The PHP Development Team announces the immediate availability of PHP 5.6.0. This new version comes with new features, some backward incompatible changes and many improvements.', '', 'null', 1410432262, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(64) NOT NULL,
  `tel` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `address` varchar(256) NOT NULL,
  `other` text NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `status`, `name`, `tel`, `email`, `address`, `other`, `created_time`) VALUES
(1, 0, 'Nguyen Nam', '0977232323', 'motthanhnam@yahoo.com', '', '{"title":"T\\u00f4i mu\\u1ed1n li\\u00ean h\\u1ec7","content":"T\\u00f4i muoonsl i\\u00ean h\\u1ec7 v\\u1edbi qu\\u00fd c\\u00f4ng ty"}', 1385975581),
(2, 0, 'Vu Anh Kiet', '0936113504', 'kietav254@gmail.com', '', '{"title":"Li\\u00ean h\\u1ec7","content":"Nam \\u0110\\u1ecbnh-H\\u00e0 N\\u1ed9i"}', 1410507579),
(3, 0, 'Vu Anh Kiet', '0936113504', 'kietav254@gmail.com', '', '{"title":"Li\\u00ean h\\u1ec7","content":"Nam \\u0110\\u1ecbnh"}', 1410507641),
(4, 0, 'Anh Khoi', '0936113504', 'kietav254@gmail.com', '', '{"title":"Li\\u00ean h\\u1ec7","content":"Nam \\u0110\\u1ecbnh"}', 1410508025),
(5, 0, 'Anh Khoi', '0936113504', 'kietav254@gmail.com', '', '{"title":"Bacd","content":"H\\u00e0 N\\u1ed9i"}', 1410508171),
(6, 0, 'Anh Khoi', '0936113504', 'kietav254@gmail.com', '', '{"title":"abcd","content":"H\\u00e0 N\\u1ed9i"}', 1410508323),
(7, 0, 'Khoi', '0936113504', 'kietav254@gmail.com', '', '{"title":"Bacd","content":"H\\u00e0 N\\u1ed9i"}', 1410508376),
(8, 0, 'Khôi', '0936113504', 'kietav254@gmail.com', '', '{"title":"abbcas","content":"HN"}', 1410508401);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `tel` varchar(32) NOT NULL,
  `address` varchar(256) NOT NULL,
  `province_id` int(10) unsigned NOT NULL,
  `district_id` int(10) unsigned NOT NULL,
  `other` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_time` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_visit_date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE IF NOT EXISTS `tbl_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL DEFAULT 'vi',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT '0',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `order_view` int(11) NOT NULL DEFAULT '1',
  `other` varchar(1024) NOT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_file`
--

CREATE TABLE IF NOT EXISTS `tbl_document_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_embedded_video`
--

CREATE TABLE IF NOT EXISTS `tbl_embedded_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `v` varchar(32) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `other` varchar(2048) NOT NULL,
  `visits` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_embedded_video`
--

INSERT INTO `tbl_embedded_video` (`id`, `language`, `status`, `name`, `v`, `cat_id`, `order_view`, `home`, `new`, `other`, `visits`, `created_by`, `created_time`) VALUES
(1, 'vi', 1, 'Khúc tâm tình người Hà Tĩnh', 'De_x9NVCEy4', 4, 1, 0, 0, '{"introimage_id":"12","description":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","meta_title":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","meta_keyword":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","meta_description":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh"}', 0, 1, 1385981529),
(2, 'vi', 1, 'Khúc tâm tình người Hà Tĩnh_copy', 'BeiZFUZtfy4', 4, 0, 0, 0, '{"meta_keyword":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","meta_description":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","meta_title":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","introimage_id":"15","description":""}', 0, 1, 1386047290),
(3, 'vi', 1, 'Khúc tâm tình người Hà Tĩnh_copy_copy', 'BeiZFUZtfy4', 4, 0, 0, 0, '{"meta_keyword":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","meta_description":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","meta_title":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","introimage_id":"14","description":""}', 0, 1, 1386047322),
(4, 'vi', 1, 'Khúc tâm tình người Hà Tĩnh_copy', 'BeiZFUZtfy4', 4, 0, 0, 0, '{"meta_keyword":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","meta_description":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","meta_title":"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh","introimage_id":"13","description":""}', 0, 1, 1386047322);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE IF NOT EXISTS `tbl_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) NOT NULL,
  `extension` varchar(32) NOT NULL,
  `dirname` varchar(256) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `history` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`id`, `filename`, `extension`, `dirname`, `created_by`, `created_time`, `history`) VALUES
(1, 'slider1', 'jpg', 'data/upload/image/2013/11/28', 1, 1385625183, '[]'),
(2, 'slider1-64', 'jpg', 'data/upload/image/2013/11/28', 1, 1385628873, '[]'),
(3, 'slider1-27', 'jpg', 'data/upload/image/2013/11/28', 1, 1385630370, '[]'),
(4, 'azacne', 'png', 'data/upload/image/2013/11/28', 1, 1385630558, '[]'),
(5, 'explaq', 'png', 'data/upload/image/2013/11/28', 1, 1385630670, '[]'),
(6, 'slider3', 'jpg', 'data/upload/image/2013/11/28', 1, 1385631351, '[]'),
(7, 'fav', 'png', 'data/upload/image/2013/11/28', 1, 1385635914, '[]'),
(8, 'fav-14', 'png', 'data/upload/image/2013/11/28', 1, 1385635938, '[]'),
(9, 'fav-61', 'png', 'data/upload/image/2013/11/28', 1, 1385635961, '[]'),
(10, 'image1', 'jpg', 'data/upload/image/2013/11/30', 1, 1385803837, '[]'),
(11, 'image1-92', 'jpg', 'data/upload/image/2013/11/30', 1, 1385804137, '[]'),
(12, 'video1', 'jpg', 'data/upload/image/2013/12/02', 1, 1385981658, '[]'),
(13, 'image1', 'jpg', 'data/upload/image/2013/12/03', 1, 1386053710, '[]'),
(14, 'image2', 'jpg', 'data/upload/image/2013/12/03', 1, 1386053732, '[]'),
(15, 'map1', 'jpg', 'data/upload/image/2013/12/03', 1, 1386053743, '[]'),
(16, 'Banner2', 'jpg', 'data/upload/image/2013/12/12', 1, 1386839075, '[]'),
(17, 'quoc-tu-giam', 'jpg', 'data/upload/image/2013/12/12', 1, 1386839449, '[]'),
(18, 'images', 'jpg', 'data/upload/image/2013/12/12', 1, 1386841288, '[]'),
(19, 'hg', 'jpg', 'data/upload/image/2013/12/12', 1, 1386841290, '[]'),
(20, 'images-(1)', 'jpg', 'data/upload/image/2013/12/12', 1, 1386841301, '[]'),
(21, 'Du-Lich-Mien-Bac-2011-07-11-09-32-55', 'jpg', 'data/upload/image/2013/12/12', 1, 1386841750, '[]'),
(22, 'tin-tuc', 'jpg', 'data/upload/image/2013/12/17', 1, 1387276483, '[]'),
(23, 'image2', 'jpg', 'data/upload/image/2013/12/17', 1, 1387278474, '[]'),
(24, 'TheFirstNoel-HienThuc-2622891', 'mp3', 'data/upload/clip/2013/12/18', 1, 1387339064, '[]'),
(25, 'hien-thuc', 'jpg', 'data/upload/image/2013/12/18', 1, 1387339115, '[]'),
(26, 'du-lich-pho-co-2', 'jpg', 'data/upload/image/2013/12/18', 1, 1387354342, '[]'),
(27, 'Sotaydulich_Khoi_day_tiem_nang_du_lich_pho_co', 'jpg', 'data/upload/image/2013/12/18', 1, 1387354343, '[]'),
(28, 'du-lich-pho-co-1', 'jpg', 'data/upload/image/2013/12/18', 1, 1387354344, '[]'),
(29, 'tu-van-du-lich', 'jpg', 'data/upload/image/2013/12/18', 1, 1387354344, '[]'),
(30, 'sai_gon_5', 'jpg', 'data/upload/image/2013/12/19', 1, 1387443063, '[]'),
(31, 'Bonjour-Viet-Nam-(Quynh-Anh)', 'mp3', 'data/upload/clip/2013/12/20', 1, 1387510377, '[]'),
(32, 'quynhanh6765435nt1', 'jpg', 'data/upload/image/2013/12/20', 1, 1387510488, '[]'),
(33, 'tu-van-du-lich', 'jpg', 'data/upload/image/2013/12/20', 1, 1387523687, '[]'),
(34, 'du-lich-pho-co-2', 'jpg', 'data/upload/image/2013/12/20', 1, 1387524073, '[]'),
(35, 'tu-van-du-lich-68', 'jpg', 'data/upload/image/2013/12/20', 1, 1387525118, '[]'),
(36, 'fav', 'png', 'data/upload/image/2013/12/20', 1, 1387528317, '[]'),
(37, 'trai-he-cong-nghe-thong-tin-saigontech-2012', 'JPG', 'data/upload/image/2013/12/20', 1, 1387531694, '[]'),
(38, 'moc-chau', 'jpg', 'data/upload/image/2014/01/02', 1, 1388641535, '[]'),
(39, 'sa-pa', 'jpg', 'data/upload/image/2014/01/02', 1, 1388641802, '[]'),
(40, 'angry_bird', 'png', 'data/upload/image/2014/01/08', 1, 1389159147, '[]'),
(41, '10_copy', 'jpg', 'data/upload/image/2014/09/08', 1, 1410163999, '[]'),
(42, 'main-product-01', 'png', 'data/upload/image/2014/09/08', 1, 1410166618, '[]'),
(43, 'main-product-02', 'png', 'data/upload/image/2014/09/08', 1, 1410166674, '[]'),
(44, 'main-product-03', 'png', 'data/upload/image/2014/09/08', 1, 1410166714, '[]'),
(45, 'main-product-04', 'png', 'data/upload/image/2014/09/08', 1, 1410166763, '[]'),
(46, '14_copy', 'jpg', 'data/upload/image/2014/09/08', 1, 1410167984, '[]'),
(47, 'logo', 'png', 'data/upload/image/2014/09/09', 1, 1410230374, '[]'),
(48, 'header', 'png', 'data/upload/image/2014/09/09', 1, 1410230381, '[]'),
(49, 'logo-23', 'png', 'data/upload/image/2014/09/09', 1, 1410231293, '[]'),
(50, '1-01', 'jpg', 'data/upload/image/2014/09/09', 1, 1410245964, '[]'),
(51, '2014-08-21_172927', 'jpg', 'data/upload/image/2014/09/09', 1, 1410247124, '[]'),
(52, 'new-product-01', 'png', 'data/upload/image/2014/09/09', 1, 1410256931, '[]'),
(53, 'list-news-01', 'png', 'data/upload/image/2014/09/10', 1, 1410338601, '[]'),
(54, 'list-news-01-68', 'png', 'data/upload/image/2014/09/10', 1, 1410338655, '[]'),
(55, 'list-news-01-16', 'png', 'data/upload/image/2014/09/10', 1, 1410338669, '[]'),
(56, 'title-ThaiGreen', 'png', 'data/upload/image/2014/09/12', 1, 1410496722, '[]'),
(57, 'title-Sophia', 'png', 'data/upload/image/2014/09/12', 1, 1410496753, '[]'),
(58, 'title-harotex', 'png', 'data/upload/image/2014/09/12', 1, 1410496786, '[]'),
(59, 'title_phukien', 'png', 'data/upload/image/2014/09/12', 1, 1410496796, '[]'),
(60, 'list-news-01', 'png', 'data/upload/image/2014/09/12', 1, 1410497852, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_healthnews`
--

CREATE TABLE IF NOT EXISTS `tbl_healthnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `introimage_id` int(10) unsigned NOT NULL,
  `cat_id` int(11) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `meta_title` varchar(256) NOT NULL,
  `meta_keyword` varchar(256) NOT NULL,
  `meta_description` varchar(256) NOT NULL,
  `news_image` varchar(256) NOT NULL,
  `introtext` text NOT NULL,
  `content` text NOT NULL,
  `other` text NOT NULL,
  `home` tinyint(1) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `order_view` int(11) NOT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `visits` int(11) unsigned NOT NULL,
  `created_time` int(10) unsigned NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_healthnews_image`
--

CREATE TABLE IF NOT EXISTS `tbl_healthnews_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `healthNews_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE IF NOT EXISTS `tbl_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`id`, `status`, `name`, `intro`, `parent_id`, `file_id`, `created_by`, `created_time`) VALUES
(1, 1, 'slider1', '', 0, 1, 1, 1385625183),
(2, 1, 'slider1-64', '', 0, 2, 1, 1385628873),
(3, 1, 'slider1-27', '', 0, 3, 1, 1385630370),
(4, 1, 'azacne', '', 0, 4, 1, 1385630558),
(5, 1, 'explaq', '', 0, 5, 1, 1385630670),
(6, 1, 'slider3', '', 0, 6, 1, 1385631352),
(7, 1, 'fav', '', 0, 7, 1, 1385635914),
(8, 1, 'fav-14', '', 0, 8, 1, 1385635938),
(9, 1, 'fav-61', '', 0, 9, 1, 1385635961),
(10, 1, 'image1', '', 0, 10, 1, 1385803837),
(11, 1, 'image1-92', '', 0, 11, 1, 1385804137),
(12, 1, 'video1', '', 0, 12, 1, 1385981658),
(13, 1, 'image1', '', 0, 13, 1, 1386053710),
(14, 1, 'image2', '', 0, 14, 1, 1386053732),
(15, 1, 'map1', '', 0, 15, 1, 1386053743),
(16, 1, 'Banner2', '', 0, 16, 1, 1386839076),
(17, 1, 'quoc-tu-giam', '', 0, 17, 1, 1386839449),
(18, 1, 'images', '', 0, 18, 1, 1386841289),
(19, 1, 'hg', '', 0, 19, 1, 1386841290),
(20, 1, 'images-(1)', '', 0, 20, 1, 1386841303),
(21, 1, 'Du-Lich-Mien-Bac-2011-07-11-09-32-55', '', 0, 21, 1, 1386841750),
(22, 1, 'tin-tuc', '', 0, 22, 1, 1387276484),
(23, 1, 'image2', '', 0, 23, 1, 1387278477),
(24, 1, 'hien-thuc', '', 0, 25, 1, 1387339116),
(25, 1, 'du-lich-pho-co-2', '', 0, 26, 1, 1387354343),
(26, 1, 'Sotaydulich_Khoi_day_tiem_nang_du_lich_pho_co', '', 0, 27, 1, 1387354344),
(27, 1, 'du-lich-pho-co-1', '', 0, 28, 1, 1387354344),
(28, 1, 'tu-van-du-lich', '', 0, 29, 1, 1387354344),
(29, 1, 'sai_gon_5', '', 0, 30, 1, 1387443063),
(30, 1, 'quynhanh6765435nt1', '', 0, 32, 1, 1387510488),
(31, 1, 'tu-van-du-lich', '', 0, 33, 1, 1387523687),
(32, 1, 'du-lich-pho-co-2', '', 0, 34, 1, 1387524076),
(33, 1, 'tu-van-du-lich-68', '', 0, 35, 1, 1387525118),
(34, 1, 'fav', '', 0, 36, 1, 1387528317),
(35, 1, 'trai-he-cong-nghe-thong-tin-saigontech-2012', '', 0, 37, 1, 1387531694),
(36, 1, 'moc-chau', '', 0, 38, 1, 1388641535),
(37, 1, 'sa-pa', '', 0, 39, 1, 1388641802),
(38, 1, 'angry_bird', '', 0, 40, 1, 1389159147),
(39, 1, '10_copy', '', 0, 41, 1, 1410163999),
(40, 1, 'main-product-01', '', 0, 42, 1, 1410166618),
(41, 1, 'main-product-02', '', 0, 43, 1, 1410166674),
(42, 1, 'main-product-03', '', 0, 44, 1, 1410166715),
(43, 1, 'main-product-04', '', 0, 45, 1, 1410166764),
(44, 1, '14_copy', '', 0, 46, 1, 1410167985),
(45, 1, 'logo', '', 0, 47, 1, 1410230374),
(46, 1, 'header', '', 0, 48, 1, 1410230381),
(47, 1, 'logo-23', '', 0, 49, 1, 1410231293),
(48, 1, '1-01', '', 0, 50, 1, 1410245964),
(49, 1, '2014-08-21_172927', '', 0, 51, 1, 1410247124),
(50, 1, 'new-product-01', '', 0, 52, 1, 1410256931),
(51, 1, 'list-news-01', '', 0, 53, 1, 1410338601),
(52, 1, 'list-news-01-68', '', 0, 54, 1, 1410338655),
(53, 1, 'list-news-01-16', '', 0, 55, 1, 1410338669),
(54, 1, 'title-ThaiGreen', '', 0, 56, 1, 1410496723),
(55, 1, 'title-Sophia', '', 0, 57, 1, 1410496754),
(56, 1, 'title-harotex', '', 0, 58, 1, 1410496786),
(57, 1, 'title_phukien', '', 0, 59, 1, 1410496796),
(58, 1, 'list-news-01', '', 0, 60, 1, 1410497853);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_intro`
--

CREATE TABLE IF NOT EXISTS `tbl_intro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `footer` tinyint(1) NOT NULL,
  `other` text NOT NULL,
  `visits` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_intro`
--

INSERT INTO `tbl_intro` (`id`, `language`, `status`, `title`, `cat_id`, `introimage_id`, `order_view`, `new`, `home`, `footer`, `other`, `visits`, `created_by`, `created_time`) VALUES
(5, 'vi', 1, 'Voyages équitables et développement local', 8, 0, 0, 0, 1, 0, '{"meta_title":"Voyages \\u00e9quitables et d\\u00e9veloppement local","meta_keyword":"Voyages \\u00e9quitables et d\\u00e9veloppement local","meta_description":"Voyages \\u00e9quitables et d\\u00e9veloppement local","content":"<p><span>A la rencontre des peuples et des <strong>culturesNotre<\\/strong> volont&eacute; est de vous faire d&eacute;couvrir <strong>des lieux<\\/strong> qui nous ont &eacute;mus, de partager notre go&ucirc;t du voyage humaniste, nos r&ecirc;ves de beaut&eacute;, en approchant, tout en douceur, les r&eacute;alit&eacute;s de la vie locale.<\\/span><\\/p>"}', 0, 1, 1387334175),
(6, 'vi', 1, 'Du lịch tự chọn', 16, 33, 0, 1, 0, 0, '{"meta_title":"Du l\\u1ecbch t\\u1ef1 ch\\u1ecdn","meta_keyword":"Du l\\u1ecbch t\\u1ef1 ch\\u1ecdn","meta_description":"Du l\\u1ecbch t\\u1ef1 ch\\u1ecdn","content":"<p>Ch&uacute;ng t&ocirc;i c&oacute; nh\\u1eefng g\\u1ee3i &yacute; cho c&aacute;c b\\u1ea1n, h&atilde;y tham kh\\u1ea3o danh s&aacute;ch c&aacute;c \\u0111i\\u1ec3m \\u0111\\u1ebfn h\\u1ea5p d\\u1eabn c\\u1ee7a Vi\\u1ec7t Nam, m&agrave; ch&uacute;ng t&ocirc;i \\u0111\\u1ec1 xu\\u1ea5t.<\\/p>"}', 0, 1, 1387525206),
(7, 'vi', 1, 'Chính sách khuyến mãi chung', 8, 0, 0, 0, 0, 1, '{"meta_title":"Ch\\u00ednh s\\u00e1ch khuy\\u1ebfn m\\u00e3i chung","meta_keyword":"Ch\\u00ednh s\\u00e1ch khuy\\u1ebfn m\\u00e3i chung","meta_description":"Ch\\u00ednh s\\u00e1ch khuy\\u1ebfn m\\u00e3i chung","content":"<p>Vous &ecirc;tes un groupe d''un minimum de <strong>4 personnes<\\/strong>...<\\/p>\\r\\n<p>Vous d&eacute;sirez un voyage particulier, individualis&eacute;, un d&eacute;part d&eacute;cal&eacute;...,<\\/p>\\r\\n<p>Vous d&eacute;sirez profiter de notre exp&eacute;rience pour organiser un stage en pleine nature (dunes, montagne, bord de rivi&egrave;re ou d''oc&eacute;an). C''est possible, t&eacute;l&eacute;phonez-nous, <strong>envoyez-nous un mail.<\\/strong><\\/p>"}', 0, 1, 1388732260);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vi',
  `type` smallint(6) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_view` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `other` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `language`, `type`, `name`, `parent_id`, `order_view`, `status`, `other`, `created_by`, `created_time`) VALUES
(4, 'vi', 1, 'Trang chủ', 0, 1, 1, '{"url":"\\/website_sangovietphat","target":"","rel":"","title":"Trang ch\\u1ee7"}', 1, 1373012738),
(5, 'vi', 1, 'Giới thiệu', 0, 3, 1, '{"url":"\\/website_sangovietphat\\/gioi-thieu","target":"","rel":"","title":"Gi\\u1edbi thi\\u1ec7u"}', 1, 1373012744),
(6, 'vi', 1, 'Dự án', 0, 6, 1, '{"url":"\\/website_sangovietphat\\/du-an","target":"","rel":"","title":"D\\u1ef1 \\u00e1n"}', 1, 1373012754),
(10, 'vi', 1, 'Sản phẩm', 0, 3, 1, '{"url":"\\/website_sangovietphat\\/san-pham","target":"","rel":"","title":"S\\u1ea3n ph\\u1ea9m"}', 1, 1373259210),
(13, 'en', 1, 'Home', 0, 1, 1, '{"url":"\\/home.aspx","target":"","rel":"","title":"Home page"}', 1, 1377688706),
(14, 'en', 1, 'About us', 0, 1, 1, '{"url":"\\/about-us.aspx","target":"","rel":"","title":"About us"}', 1, 1377688722),
(15, 'en', 1, 'Products', 0, 3, 1, '{"url":"\\/products.aspx","target":"","rel":"","title":"Products"}', 1, 1377688734),
(16, 'en', 1, 'Health categories', 0, 4, 1, '{"url":"\\/health-categories.aspx","target":"","rel":"","title":"Health Categories of A Au"}', 1, 1377688785),
(17, 'en', 1, 'Advisory board', 0, 6, 1, '{"url":"\\/advisory-board.aspx","target":"","rel":"","title":"Advisory board"}', 1, 1377688832),
(18, 'en', 1, 'Health consultancy', 0, 5, 1, '{"url":"\\/health-consultancy.aspx","target":"","rel":"","title":"Health consultancy"}', 1, 1377688845),
(29, 'en', 1, 'Medical News', 16, 1, 1, '{"url":"\\/health-categories\\/medical-news.aspx","title":"Mediacal news","target":"","rel":""}', 1, 1383538002),
(30, 'en', 1, 'Treatment experience', 16, 2, 1, '{"url":"\\/health-categories\\/treatment-experience.aspx","title":"Treatment experience","target":"","rel":""}', 1, 1383538030),
(31, 'en', 1, 'Nutrition diet', 16, 3, 1, '{"url":"\\/health-categories\\/nutrition-diet.aspx","title":"Nutrition diet","target":"","rel":""}', 1, 1383538059),
(36, 'vi', 1, 'Tin tức', 0, 4, 1, '{"url":"\\/website_sangovietphat\\/tin-tuc","title":"Tin t\\u1ee9c","target":"","rel":""}', 1, 1387526514),
(37, 'vi', 1, 'Hệ thống', 0, 5, 1, '{"url":"\\/website_sangovietphat\\/he-thong","title":"H\\u1ec7 th\\u1ed1ng","target":"","rel":""}', 1, 1387526569),
(42, 'vi', 1, 'Liên hệ', 0, 7, 1, '{"url":"\\/website_sangovietphat\\/lien-he","title":"Li\\u00ean h\\u1ec7","target":"","rel":""}', 1, 1410231954);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `cat_id` int(11) unsigned NOT NULL,
  `introimage_id` int(10) unsigned NOT NULL,
  `news_image` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `meta_keyword` varchar(256) NOT NULL,
  `meta_description` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `meta_title` varchar(256) NOT NULL,
  `introtext` text NOT NULL,
  `content` text NOT NULL,
  `other` text NOT NULL,
  `source` varchar(100) NOT NULL,
  `order_view` int(11) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_time` int(11) NOT NULL,
  `CreateDate` varchar(20) NOT NULL,
  `visits` int(10) unsigned NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `language`, `cat_id`, `introimage_id`, `news_image`, `alias`, `meta_keyword`, `meta_description`, `name`, `meta_title`, `introtext`, `content`, `other`, `source`, `order_view`, `home`, `new`, `status`, `created_time`, `CreateDate`, `visits`, `created_by`) VALUES
(4, 'vi', 3, 58, '', 'promotions', 'Promotions', 'Promotions', 'Promotions', 'Promotions', '<p><span class="xr_tl Normal_text textedescriptif">Le froid arrive &agrave; grand pas.... Vous avez envie d&rsquo;un beau </span><span class="xr_tl Normal_text textedescriptif">voyage au soleil... Maroc:&nbsp; Erg Zahar &agrave; partir de 800 &euro;. 5 </span><span class="xr_tl Normal_text textedescriptif">jours &agrave; Marrakech en maison d&rsquo;h&ocirc;te au c&oelig;ur de la m&eacute;dina </span><span class="xr_tl Normal_text textedescriptif">en demi pension au d&eacute;part de Bruxelles... </span><span class="xr_tl Normal_text textedescriptif">D&eacute;parts assur&eacute;s, places restantes...</span></p>', '<p><strong><span class="xr_tl Normal_text"><span class="Normal_text">Maroc </span></span></strong></p>\r\n<p><span class="xr_tl Normal_text">5 jours/4 nuits &agrave; Marrakech en <a target="_self"><span class="Normal_text">maison d&rsquo;h&ocirc;te</span></a>&nbsp;au c&oelig;ur de la m&eacute;dina (1/2 </span><span class="xr_tl Normal_text">pension), vol compris au d&eacute;part de BRUXELLES: </span><span class="xr_tl Normal_text">Du 12/01 au 16/01 : 350 &euro; </span><span class="xr_tl Normal_text">Du 19/01 au 23/01 ou du 26/01 au 30/01: 385 &euro;</span><span class="xr_tl Normal_text">5 jours &agrave; Marrakech en maison d''h&ocirc;te au c&oelig;ur de la m&eacute;dina en 1/2 </span><span class="xr_tl Normal_text">pension aux dates de votre choix &agrave; partir de 380 &euro;/pers vol compris. </span><span class="xr_tl Normal_text">Nous contacter. </span></p>\r\n<p><span class="xr_tl Normal_text">D&eacute;parts assur&eacute;s et il reste des places:</span><span class="xr_tl Normal_text">Du 25/12 au 01/01: <a><span class="Normal_text">Erg Zahar</span></a>, tr&egrave;s beau trek chamelier dans le d&eacute;sert </span><span class="xr_tl Normal_text">et bivouac &agrave; la belle &eacute;toile.</span></p>\r\n<p><span class="xr_tl Normal_text">Du 28/12 au 05/01: <a><span class="Normal_text">vall&eacute;e du Draa</span></a>, une belle d&eacute;couverte facile de la </span><span class="xr_tl Normal_text">palmeraie et du d&eacute;sert ouverte &agrave; tous. voir </span><span class="xr_tl Normal_text">Du 04/01 au 12/01 ou du 18/01 au 26/01: <a><span class="Normal_text">Erg Zahar</span></a>&nbsp;&agrave; partir de <span class="Normal_text">800 &euro;</span>&nbsp;</span><span class="xr_tl Normal_text">tout compris</span><span class="xr_tl Normal_text"><span class="Normal_text">Auto tours </span>entre le 15/11 et le 15/12 ou entre le 10/01 et le 15/02 </span><span class="xr_tl Normal_text">avec h&eacute;bergement chez l''habitant prix minimum &agrave; partir de </span><span class="xr_tl Normal_text"><span class="Normal_text">650</span>&euro;/pers/semaine tout compris</span><span class="xr_tl Normal_text">Tunisie</span><span class="xr_tl Normal_text">Du 29/12 au 05/01: <a><span class="Normal_text">Zaafrane et Toujane</span></a>, randonn&eacute;e facile dans le </span><span class="xr_tl Normal_text">d&eacute;sert et d&eacute;couverte de la montagne proche de la mer. </span></p>\r\n<p><span class="xr_tl Normal_text">Du 12 au 19/01 ou du 02 au 09/02: <a><span class="Normal_text">Zaafrane et Omtoba</span></a>, une tr&egrave;s </span><span class="xr_tl Normal_text">belle randonn&eacute;e chameli&egrave;re facile dans les dunes &agrave; partir de <span class="Normal_text">790 &euro; </span></span><span class="xr_tl Normal_text">S&eacute;n&eacute;gal</span><span class="xr_tl Normal_text">9 jours dans les mangroves du Sin&eacute; Saloum</span><span class="xr_tl Normal_text">Du 28/12 au 05/01/13 : <span class="Normal_text">1550 &euro; </span></span><span class="xr_tl Normal_text">Prix indiqu&eacute;s au d&eacute;part de Paris</span></p>', '{"tmp_image_ids":"","meta_title":"Promotions","meta_keyword":"Promotions","meta_description":"Promotions","introtext":"","content":"<p><span>To&agrave;n b\\u1ed9 c&aacute;c t\\u1ea5m v&aacute;n s&agrave;n v&agrave; c\\u1ea1nh h&egrave;m \\u0111\\u1ec1u ph\\u1ee7 l\\u1edbp ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; \\u0111\\u1ed9 \\u1ea9m th&acirc;m nh\\u1eadp. C\\u01b0\\u1eddng \\u0111\\u1ed9 ch\\u1ecbu t\\u1ea3i&nbsp;<\\/span><\\/p>"}', '', 1, 0, 0, 1, 1387277275, '', 29, 1),
(8, 'vi', 3, 0, '', 'khuyen-mai-maroc', 'Khuyến mãi Maroc', 'Khuyến mãi Maroc', 'Khuyến mãi Maroc', 'Khuyến mãi Maroc', '<p><span>Le froid arrive &agrave; grand pas.... <strong>Vous</strong> avez envie d''un beau voyage au soleil... Maroc: Erg Zahar &agrave; partir de 800 &euro;. 5 jours &agrave; Marrakech en maison d''h&ocirc;te au c&oelig;ur de la m&eacute;dina en demi pension au d&eacute;part de Bruxelles... D&eacute;parts assur&eacute;s, places restantes...Vous avez envie d''un beau voyage au soleil... <strong>MarocVous</strong> avez envie d''un beau voyage au soleil... Maroc</span></p>', '<p>Le froid arrive &agrave; grand pas.... Vous avez envie d''un beau voyage au soleil... Maroc: Erg Zahar &agrave; partir de 800 &euro;. 5 jours &agrave; Marrakech en maison d''h&ocirc;te au c&oelig;ur de la m&eacute;dina en demi pension au d&eacute;part de Bruxelles... D&eacute;parts assur&eacute;s, places restantes...Vous avez envie d''un beau voyage au soleil... MarocVous avez envie d''un beau voyage au soleil... Maroc</p>\r\n<p>Le froid arrive &agrave; grand pas.... Vous avez envie d''un beau voyage au soleil... Maroc: Erg Zahar &agrave; partir de 800 &euro;. 5 jours &agrave; Marrakech en maison d''h&ocirc;te au c&oelig;ur de la m&eacute;dina en demi pension au d&eacute;part de Bruxelles... D&eacute;parts assur&eacute;s, places restantes...Vous avez envie d''un beau voyage au soleil... MarocVous avez envie d''un beau voyage au soleil... Maroc</p>\r\n<p>Le froid arrive &agrave; grand pas.... Vous avez envie d''un beau voyage au soleil... Maroc: Erg Zahar &agrave; partir de 800 &euro;. 5 jours &agrave; Marrakech en maison d''h&ocirc;te au c&oelig;ur de la m&eacute;dina en demi pension au d&eacute;part de Bruxelles... D&eacute;parts assur&eacute;s, places restantes...Vous avez envie d''un beau voyage au soleil... MarocVous avez envie d''un beau voyage au soleil... Maroc</p>', '{"tmp_image_ids":""}', '', 0, 1, 0, 1, 1387336972, '', 27, 1),
(9, 'vi', 10, 34, '', 'khai-niem-du-lich-cong-bang', 'Khái niệm du lịch công bằng', 'Khái niệm du lịch công bằng', 'Khái niệm du lịch công bằng', 'Khái niệm du lịch công bằng', '<p>Giới thiệu về du lịch c&ocirc;ng bằng</p>', '<p>Tối 6-1, tại Nh&agrave; h&aacute;t th&agrave;nh phố, UBND th&agrave;nh phố Hải Ph&ograve;ng, Bộ Văn h&oacute;a- Thể thao v&agrave; Du lịch phối hợp tổ chức Lễ c&ocirc;ng bố Năm Du lịch quốc gia Đồng bằng s&ocirc;ng Hồng- Hải Ph&ograve;ng 2013 với chủ đề &ldquo;Văn minh s&ocirc;ng Hồng&rdquo;.</p>\r\n<p><strong>-</strong>&nbsp;<strong><a href="#">Un tourisme &eacute;quitable et solidaire en toute transparence</a></strong></p>\r\n<p><strong>-&nbsp;<a href="#">La Charte du tourisme &eacute;quitable</a></strong></p>\r\n<p><strong>-&nbsp;<a href="#">Rapports d&rsquo;activit&eacute;s de Croq&rsquo;Nature et Amiti&eacute; Franco Touareg</a></strong></p>\r\n<p><strong>-&nbsp;<a href="#">R&eacute;partition du prix du voyage et financement du d&eacute;veloppement 2012-2013</a></strong></p>', '{"tmp_image_ids":""}', '', 0, 0, 0, 1, 1387528467, '', 8, 1),
(11, 'vi', 9, 0, '', 'cau-chuyen-cua-chung-toi', 'Câu chuyện của chúng tôi', 'Câu chuyện của chúng tôi', 'Câu chuyện của chúng tôi', 'Câu chuyện của chúng tôi', '<p><span>C&acirc;u chuyện của ch&uacute;ng t&ocirc;i</span></p>', '<p><span>C&acirc;u chuyện của ch&uacute;ng t&ocirc;i</span></p>', '{"tmp_image_ids":""}', '', 0, 0, 0, 1, 1387798527, '', 2, 1),
(12, 'vi', 9, 0, '', 'doi-ngu-cua-chung-toi', ' Đội ngũ của chúng tôi', ' Đội ngũ của chúng tôi', 'Đội ngũ của chúng tôi', ' Đội ngũ của chúng tôi', '<p><span>&nbsp;Đội ngũ của ch&uacute;ng t&ocirc;i</span></p>', '<p><span>&nbsp;Đội ngũ của ch&uacute;ng t&ocirc;i</span></p>', '{"tmp_image_ids":""}', '', 0, 0, 0, 1, 1387799337, '', 1, 1),
(13, 'vi', 9, 0, '', 'dieu-khoan-chung-ve-mua-ban-san-pham-du-lich', 'Điều khoản chung về mua bán sản phẩm du lịch', 'Điều khoản chung về mua bán sản phẩm du lịch', 'Điều khoản chung về mua bán sản phẩm du lịch', 'Điều khoản chung về mua bán sản phẩm du lịch', '<p><span>Điều khoản chung về mua b&aacute;n sản phẩm du lịch</span></p>', '<p>&nbsp;<span>Điều khoản chung về mua b&aacute;n sản phẩm du lịch</span></p>', '{"tmp_image_ids":""}', '', 0, 0, 0, 1, 1387799376, '', 1, 1),
(14, 'vi', 9, 0, '', 'tu-lieu-ve-chung-toi', 'Tư liệu về chúng tôi', 'Tư liệu về chúng tôi', 'Tư liệu về chúng tôi', 'Tư liệu về chúng tôi', '<p><span>Tư liệu về ch&uacute;ng t&ocirc;i</span></p>', '<p><span>Tư liệu về ch&uacute;ng t&ocirc;i</span></p>', '{"tmp_image_ids":""}', '', 0, 0, 0, 1, 1387799416, '', 3, 1),
(15, 'vi', 49, 48, '', 'san-go-cong-nghiep-thaigreen', '', '', 'Sàn gỗ công nghiệp ThaiGreen', '', '', '', '{"tmp_image_ids":"","meta_title":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p ThaiGreen","meta_keyword":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p ThaiGreen","meta_description":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p ThaiGreen","introtext":"","content":"<p>S&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p ThaiGreen<\\/p>"}', '', 0, 1, 0, 1, 1410245995, '', 0, 1),
(16, 'vi', 2, 53, '', 'san-go-cong-nghiep', '', '', 'Sàn gỗ công nghiệp', '', '', '', '{"tmp_image_ids":"","meta_title":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","meta_keyword":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","meta_description":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","introtext":"<p><span>To&agrave;n b\\u1ed9 c&aacute;c t\\u1ea5m v&aacute;n s&agrave;n v&agrave; c\\u1ea1nh h&egrave;m \\u0111\\u1ec1u ph\\u1ee7 l\\u1edbp ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; \\u0111\\u1ed9 \\u1ea9m th&acirc;m nh\\u1eadp. C\\u01b0\\u1eddng \\u0111\\u1ed9 ch\\u1ecbu t\\u1ea3i&nbsp;<\\/span><\\/p>","content":"<p><span>To&agrave;n b\\u1ed9 c&aacute;c t\\u1ea5m v&aacute;n s&agrave;n v&agrave; c\\u1ea1nh h&egrave;m \\u0111\\u1ec1u ph\\u1ee7 l\\u1edbp ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; \\u0111\\u1ed9 \\u1ea9m th&acirc;m nh\\u1eadp. C\\u01b0\\u1eddng \\u0111\\u1ed9 ch\\u1ecbu t\\u1ea3i&nbsp;<\\/span><\\/p>"}', '', 0, 1, 1, 1, 1410257173, '', 0, 1),
(17, 'vi', 2, 52, '', 'san-go-cong-nghiep_copy', '', '', 'Sàn gỗ công nghiệp_copy', '', '', '', '{"content":"<p><span>To&agrave;n b\\u1ed9 c&aacute;c t\\u1ea5m v&aacute;n s&agrave;n v&agrave; c\\u1ea1nh h&egrave;m \\u0111\\u1ec1u ph\\u1ee7 l\\u1edbp ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; \\u0111\\u1ed9 \\u1ea9m th&acirc;m nh\\u1eadp. C\\u01b0\\u1eddng \\u0111\\u1ed9 ch\\u1ecbu t\\u1ea3i&nbsp;<\\/span><\\/p>","meta_keyword":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","meta_description":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","meta_title":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","introtext":"<p><span>To&agrave;n b\\u1ed9 c&aacute;c t\\u1ea5m v&aacute;n s&agrave;n v&agrave; c\\u1ea1nh h&egrave;m \\u0111\\u1ec1u ph\\u1ee7 l\\u1edbp ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; \\u0111\\u1ed9 \\u1ea9m th&acirc;m nh\\u1eadp. C\\u01b0\\u1eddng \\u0111\\u1ed9 ch\\u1ecbu t\\u1ea3i&nbsp;<\\/span><\\/p>","tmp_image_ids":""}', '', 0, 1, 1, 1, 1410257193, '', 0, 1),
(18, 'vi', 2, 51, '', 'san-go-cong-nghiep_copy_copy', '', '', 'Sàn gỗ công nghiệp_copy_copy', '', '', '', '{"content":"<p><span>To&agrave;n b\\u1ed9 c&aacute;c t\\u1ea5m v&aacute;n s&agrave;n v&agrave; c\\u1ea1nh h&egrave;m \\u0111\\u1ec1u ph\\u1ee7 l\\u1edbp ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; \\u0111\\u1ed9 \\u1ea9m th&acirc;m nh\\u1eadp. C\\u01b0\\u1eddng \\u0111\\u1ed9 ch\\u1ecbu t\\u1ea3i&nbsp;<\\/span><\\/p>","meta_keyword":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","meta_description":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","meta_title":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","introtext":"<p><span>To&agrave;n b\\u1ed9 c&aacute;c t\\u1ea5m v&aacute;n s&agrave;n v&agrave; c\\u1ea1nh h&egrave;m \\u0111\\u1ec1u ph\\u1ee7 l\\u1edbp ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; \\u0111\\u1ed9 \\u1ea9m th&acirc;m nh\\u1eadp. C\\u01b0\\u1eddng \\u0111\\u1ed9 ch\\u1ecbu t\\u1ea3i&nbsp;<\\/span><\\/p>","tmp_image_ids":""}', '', 0, 1, 1, 1, 1410321360, '', 0, 1),
(20, 'vi', 49, 48, '', 'san-go-cong-nghiep-thaigreen_copy', '', '', 'Sàn gỗ công nghiệp ThaiGreen_copy', '', '', '', '{"content":"<p>S&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p ThaiGreen<\\/p>","meta_keyword":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p ThaiGreen","meta_description":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p ThaiGreen","meta_title":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p ThaiGreen","introtext":"","tmp_image_ids":""}', '', 0, 1, 0, 1, 1410321402, '', 0, 1),
(21, 'vi', 2, 51, '', 'san-go-cong-nghiep_copy_copy_copy', '', '', 'Sàn gỗ công nghiệp_copy_copy_copy', '', '', '', '{"content":"<p><span>To&agrave;n b\\u1ed9 c&aacute;c t\\u1ea5m v&aacute;n s&agrave;n v&agrave; c\\u1ea1nh h&egrave;m \\u0111\\u1ec1u ph\\u1ee7 l\\u1edbp ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; \\u0111\\u1ed9 \\u1ea9m th&acirc;m nh\\u1eadp. C\\u01b0\\u1eddng \\u0111\\u1ed9 ch\\u1ecbu t\\u1ea3i&nbsp;<\\/span><\\/p>","meta_keyword":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","meta_description":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","meta_title":"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p","introtext":"<p><span>To&agrave;n b\\u1ed9 c&aacute;c t\\u1ea5m v&aacute;n s&agrave;n v&agrave; c\\u1ea1nh h&egrave;m \\u0111\\u1ec1u ph\\u1ee7 l\\u1edbp ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; \\u0111\\u1ed9 \\u1ea9m th&acirc;m nh\\u1eadp. C\\u01b0\\u1eddng \\u0111\\u1ed9 ch\\u1ecbu t\\u1ea3i&nbsp;<\\/span><\\/p>","tmp_image_ids":""}', '', 0, 1, 1, 1, 1410338992, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_image`
--

CREATE TABLE IF NOT EXISTS `tbl_news_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(2) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(256) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `address` varchar(256) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `other` text NOT NULL,
  `created_time` int(11) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_product`
--

CREATE TABLE IF NOT EXISTS `tbl_order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `other` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner`
--

CREATE TABLE IF NOT EXISTS `tbl_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `other` text NOT NULL,
  `visits` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_partner`
--

INSERT INTO `tbl_partner` (`id`, `language`, `status`, `title`, `alias`, `cat_id`, `introimage_id`, `order_view`, `new`, `home`, `other`, `visits`, `created_by`, `created_time`) VALUES
(1, 'vi', 1, 'IHB Việt Nam', '', 18, 35, 0, 0, 0, '{"meta_title":"IHB Vi\\u1ec7t Nam","meta_keyword":"IHB Vi\\u1ec7t Nam","meta_description":"IHB Vi\\u1ec7t Nam","content":"<p>IHB Vi\\u1ec7t Nam ho\\u1ea1t \\u0111\\u1ed9ng trong l\\u0129nh v\\u1ef1c c&ocirc;ng ngh\\u1ec7 th&ocirc;ng tin<\\/p>"}', 0, 1, 1387531698),
(2, 'vi', 1, 'IHB Việt Nam_copy', '', 18, 35, 0, 0, 0, '{"content":"<p>IHB Vi\\u1ec7t Nam ho\\u1ea1t \\u0111\\u1ed9ng trong l\\u0129nh v\\u1ef1c c&ocirc;ng ngh\\u1ec7 th&ocirc;ng tin<\\/p>","meta_keyword":"IHB Vi\\u1ec7t Nam","meta_description":"IHB Vi\\u1ec7t Nam","meta_title":"IHB Vi\\u1ec7t Nam"}', 0, 1, 1387532208),
(3, 'vi', 1, 'IHB Việt Nam_copy_copy', '', 18, 35, 0, 0, 0, '{"content":"<p>IHB Vi\\u1ec7t Nam ho\\u1ea1t \\u0111\\u1ed9ng trong l\\u0129nh v\\u1ef1c c&ocirc;ng ngh\\u1ec7 th&ocirc;ng tin<\\/p>","meta_keyword":"IHB Vi\\u1ec7t Nam","meta_description":"IHB Vi\\u1ec7t Nam","meta_title":"IHB Vi\\u1ec7t Nam"}', 0, 1, 1387532220),
(4, 'vi', 1, 'IHB Việt Nam_copy', 'ihb-viet-namcopy', 18, 35, 0, 0, 0, '{"content":"<p>IHB Vi\\u1ec7t Nam ho\\u1ea1t \\u0111\\u1ed9ng trong l\\u0129nh v\\u1ef1c c&ocirc;ng ngh\\u1ec7 th&ocirc;ng tin<\\/p>","meta_keyword":"IHB Vi\\u1ec7t Nam","meta_description":"IHB Vi\\u1ec7t Nam","meta_title":"IHB Vi\\u1ec7t Nam"}', 3, 1, 1387532220);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL DEFAULT 'vi',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `code` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `price` varchar(32) NOT NULL,
  `order_view` int(11) NOT NULL,
  `visits` int(11) NOT NULL,
  `other` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `language`, `status`, `name`, `code`, `alias`, `cat_id`, `introimage_id`, `home`, `new`, `price`, `order_view`, `visits`, `other`, `created_by`, `created_time`) VALUES
(5, 'vi', 1, 'Kronoswiss – Nhập khẩu Thụy Sĩ', 'Hà Nội', 'kronoswiss-–-nhap-khau-thuy-si', 5, 39, 1, 1, '365.000đ / m2', 0, 0, '{"old_price":"","tmp_image_ids":"","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","extra":"<p>Ng&agrave;y kh\\u1edfi h&agrave;nh v&agrave; gi&aacute; \\u0111ang \\u0111\\u01b0\\u1ee3c c&acirc;p nh\\u1eadt<\\/p>","model":"D 4200","thickness":"8.3 mm","width":"1390 mm","height":"900 mm","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1388641603),
(6, 'vi', 1, 'Kronoswiss – abc', '', 'kronoswiss-–-abc', 5, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410164292),
(7, 'vi', 1, 'Kronoswiss – abcd', '', 'kronoswiss-–-abcd', 5, 39, 1, 1, '365.000đ / m2', 0, 1, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410254202),
(8, 'vi', 1, 'Kronoswiss – b', '', 'kronoswiss-–-b', 5, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410254219),
(9, 'vi', 1, 'Kronoswiss – a', '', 'kronoswiss-–-a', 5, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410254252),
(10, 'vi', 1, 'Kronoswiss – c', '', 'kronoswiss-–-c', 5, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410254268),
(11, 'vi', 1, 'Kronoswiss – c_copy', '', 'kronoswiss-–-c', 5, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410254294),
(12, 'vi', 1, 'Kronoswiss – a_copy', '', 'kronoswiss-–-a', 5, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410254294),
(13, 'vi', 1, 'Kronoswiss – b_copy', '', 'kronoswiss-–-b', 5, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410254294),
(14, 'vi', 1, 'Kronoswiss – abcd_copy', '', 'kronoswiss-–-abcd', 1, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410254294),
(15, 'vi', 1, 'Kronoswiss – abc_copy', '', 'kronoswiss-–-abc', 1, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410254294),
(16, 'vi', 1, 'Kronoswiss – Nhập khẩu Thụy Sĩ_copysadadadsadsadsadasdsasa', '', 'kronoswiss-–-nhap-khau-thuy-si_copysadadadsadsadsadasdsasa', 1, 39, 1, 1, '365.000đ / m2', 0, 1, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410254295),
(17, 'vi', 1, 'Kronoswiss – c_copy_copy', '', 'kronoswiss-–-c', 5, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","tmp_image_ids":null,"meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410322385),
(18, 'vi', 1, 'Kronoswiss – c_copy_copy', '', 'kronoswiss-–-c', 5, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","tmp_image_ids":null,"meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410322470),
(19, 'vi', 1, 'Kronoswiss – c_copy_copy', '', 'kronoswiss-–-c', 5, 39, 1, 1, '365.000đ / m2', 0, 0, '{"description":"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 th&acirc;m nh\\u1eadp th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam t\\u1eeb n\\u0103m 2003 , do C&ocirc;ng Ty TNHH LNL Vi\\u1ec7t Nam nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ebfn nay th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 \\u0111&atilde; tr\\u1edf n&ecirc;n r\\u1ea5t quen thu\\u1ed9c v\\u1edbi ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng Vi\\u1ec7t Nam . \\u0110&acirc;y l&agrave; l&iacute; do t\\u1ea1i sao c&aacute;c d\\u1ef1 &aacute;n cao c\\u1ea5p nh\\u01b0 S&agrave;i G&ograve;n Pearl , The Lancaster , Sealink Golf and Villas , S&agrave;i G&ograve;n Airport Plaza , \\u0110\\u1ea5t Ph\\u01b0\\u01a1ng Nam , Ruby Land v.v&hellip; tin d&ugrave;ng . V\\u1edbi h\\u1ec7 th\\u1ed1ng \\u0111\\u1ea1i l&yacute; v&agrave; ph&ograve;ng tr\\u01b0ng b&agrave;y r\\u1ed9ng kh\\u1eafp Vi\\u1ec7t Nam , c&ugrave;ng v\\u1edbi m&agrave;u s\\u1eafc v&acirc;n g\\u1ed7 , k&iacute;ch th\\u01b0\\u1edbc \\u0111a d\\u1ea1ng v&agrave; phong ph&uacute; nh\\u1ea5t , th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng \\u0111\\u1eafn c\\u1ee7a qu&iacute; v\\u1ecb .<\\/p>\\r\\n<p><strong>T&iacute;nh \\u01b0u bi\\u1ec7t c\\u1ee7a s\\u1ea3n ph\\u1ea9m:<\\/strong><\\/p>\\r\\n<p>+ Ch\\u1ecbu n\\u01b0\\u1edbc r\\u1ea5t t\\u1ed1t. + Ti&ecirc;u chu\\u1ea9n: AC4, E1, li&ecirc;n k\\u1ebft h&egrave;m kh&oacute;a cao c\\u1ea5p. + M\\u1eb7t v&aacute;n s&agrave;n ph\\u1ee7 &ocirc; x&iacute;t nh&ocirc;m ch\\u1ecbu m&agrave;i m&ograve;n, ch\\u1ecbu \\u0111\\u01b0\\u1ee3c nhi\\u1ec7t \\u0111\\u1ed9 cao. Ph\\u1ea1m vi s\\u1eed d\\u1ee5ng: Gia \\u0111&igrave;nh, kh&aacute;ch s\\u1ea1n, v\\u0103n phong, trung t&acirc;m th\\u01b0\\u01a1ng m\\u1ea1i...<\\/p>","introduction":"<p><span>S&agrave;n g\\u1ed7 cao c\\u1ea5p KRONOSWISS Th\\u1ee5y S\\u0129 l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a c&ocirc;ng ty KRONOSPAN Schweiz AG Switzerland , m\\u1ed9t trong nh\\u1eefng t\\u1eadp \\u0111o&agrave;n s\\u1ea3n xu\\u1ea5t g\\u1ed7 l\\u1edbn nh\\u1ea5t th\\u1ebf gi\\u1edbi .<\\/span><\\/p>","model":"D 4200","thickness":"8.3 mm","old_price":"","width":"1390 mm","height":"900 mm","tmp_image_ids":null,"meta_keyword":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_description":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","meta_title":"Kronoswiss \\u2013 Nh\\u1eadp kh\\u1ea9u Th\\u1ee5y S\\u0129","warranty":"10-20 n\\u0103m, t\\u00f9y theo m\\u1ee5c \\u0111\\u00edch s\\u1eed d\\u1ee5ng"}', 1, 1410322495);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE IF NOT EXISTS `tbl_product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_product_image`
--

INSERT INTO `tbl_product_image` (`id`, `product_id`, `image_id`, `type`) VALUES
(1, 3, 18, 0),
(2, 3, 19, 0),
(3, 3, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qa`
--

CREATE TABLE IF NOT EXISTS `tbl_qa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(256) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `introimage_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL,
  `question` varchar(10000) NOT NULL,
  `content` varchar(256) NOT NULL,
  `meta_title` varchar(256) NOT NULL,
  `meta_keyword` varchar(256) NOT NULL,
  `meta_description` varchar(256) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `other` text NOT NULL,
  `visits` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `Date` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qa_answer`
--

CREATE TABLE IF NOT EXISTS `tbl_qa_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(2) NOT NULL,
  `qa_id` int(11) DEFAULT NULL,
  `created_time` int(11) DEFAULT NULL,
  `created_by` decimal(18,0) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `content` text,
  `order_view` int(10) unsigned NOT NULL,
  `Mark` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recruitment`
--

CREATE TABLE IF NOT EXISTS `tbl_recruitment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `other` text NOT NULL,
  `visits` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE IF NOT EXISTS `tbl_seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `other` text NOT NULL,
  `visits` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=200 ;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `language`, `name`, `value`, `category`, `description`) VALUES
(1, 'vi', 'TYPE_OF_WEB', '1', 'ADMIN', 'Loại website phục vụ việc hiển thị Help'),
(2, 'en', 'TYPE_OF_WEB', '1', 'ADMIN', 'Loại website phục vụ việc hiển thị Help'),
(3, 'vi', 'TITLE_DEFAULT', 'San gỗ Việt Phát', 'SEO', ''),
(4, 'en', 'TITLE_DEFAULT', 'San gỗ Việt Phát', 'SEO', ''),
(5, 'vi', 'DESCRIPTION_DEFAULT', 'San gỗ Việt Phát', 'SEO', ''),
(6, 'en', 'DESCRIPTION_DEFAULT', 'San gỗ Việt Phát', 'SEO', ''),
(7, 'vi', 'KEYWORD_DEFAULT', 'San gỗ Việt Phát', 'SEO', ''),
(8, 'en', 'KEYWORD_DEFAULT', 'San gỗ Việt Phát', 'SEO', ''),
(9, 'vi', 'Copyright', 'Copyright © 2013. Aventhuhavietnam.com All Rights Reserved', 'INFORMATION', ''),
(10, 'en', 'Copyright', 'Copyright © 2013. Aventhuhavietnam.com All Rights Reserved', 'INFORMATION', ''),
(11, 'vi', 'GOOGLE_WEB_ID', 'UA-41253093-1', 'SEO', ''),
(12, 'en', 'GOOGLE_WEB_ID', 'UA-41253093-1', 'SEO', ''),
(13, 'vi', 'PHONE', '(+84) 988 055 021', 'INFORMATION', 'Số điện thoại liên hệ trực tiếp với công ty'),
(14, 'en', 'PHONE', '(+84) 988 055 021', 'INFORMATION', 'Số điện thoại liên hệ trực tiếp với công ty'),
(15, 'vi', 'Email', 'sangovietphat@gmail.com', 'INFORMATION', 'email của nhà tư vấn'),
(16, 'en', 'Email', 'sangovietphat@gmail.com', 'INFORMATION', 'email của nhà tư vấn'),
(17, 'vi', 'META_TITLE_HOME', 'San gỗ Việt Phát', 'SEO', 'Trang chủ'),
(18, 'en', 'META_TITLE_HOME', 'San gỗ Việt Phát', 'SEO', 'Trang chủ'),
(19, 'vi', 'META_KEYWORD_HOME', 'San gỗ Việt Phát', 'SEO', 'Trang chủ'),
(20, 'en', 'META_KEYWORD_HOME', 'San gỗ Việt Phát', 'SEO', 'Trang chủ'),
(21, 'vi', 'META_DESCRIPTION_HOME', 'San gỗ Việt Phát', 'SEO', 'Trang chủ'),
(22, 'en', 'META_DESCRIPTION_HOME', 'San gỗ Việt Phát', 'SEO', 'Trang chủ'),
(23, 'vi', 'META_TITLE_SEARCH', 'Ket qua tim kiem', 'SEO', 'Ket qua tim kiem'),
(24, 'en', 'META_TITLE_SEARCH', 'Ket qua tim kiem', 'SEO', 'Ket qua tim kiem'),
(25, 'vi', 'META_KEYWORD_SEARCH', 'Ket qua tim kiem', 'SEO', 'Ket qua tim kiem'),
(26, 'en', 'META_KEYWORD_SEARCH', 'Ket qua tim kiem', 'SEO', 'Ket qua tim kiem'),
(27, 'vi', 'META_DESCRIPTION_SEARCH', 'Ket qua tim kiem', 'SEO', 'Ket qua tim kiem'),
(28, 'en', 'META_DESCRIPTION_SEARCH', 'Ket qua tim kiem', 'SEO', 'Ket qua tim kiem'),
(29, 'vi', 'HOT_LINE', '(04) 1234.5678', 'INFORMATION', ''),
(30, 'en', 'HOT_LINE', '(04) 1234.5678', 'INFORMATION', ''),
(31, 'vi', 'FACEBOOK_PAGE', 'sangovietphat', 'INFORMATION', ''),
(32, 'en', 'FACEBOOK_PAGE', 'sangovietphat', 'INFORMATION', ''),
(33, 'vi', 'WEBSITE', 'sangovietphat.com', 'INFORMATION', ''),
(34, 'en', 'WEBSITE', 'sangovietphat.com', 'INFORMATION', ''),
(35, 'vi', 'CONTACT', 'nhà số 6 hẻm 23/26, ngách 26, Thái Thịnh 2, Hà Nội', 'INFORMATION', ''),
(36, 'en', 'CONTACT', 'nhà số 6 hẻm 23/26, ngách 26, Thái Thịnh 2, Hà Nội', 'INFORMATION', ''),
(37, 'vi', 'INFO', 'San go Viet Phat', 'INFORMATION', ''),
(38, 'en', 'INFO', 'San go Viet Phat', 'INFORMATION', ''),
(39, 'vi', 'ADDRESS_GOOGLE_MAPS', '<iframe width="293" height="167" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=thai+thinh+ha+noi+viet+nam&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=39.916234,82.265625&amp;ie=UTF8&amp;hq=thai+thinh&amp;hnear=Hoan+Kiem+District,+Hanoi,+Vietnam&amp;t=m&amp;fll=21.011385,105.820076&amp;fspn=0.011518,0.020084&amp;st=107658235038825379151&amp;rq=1&amp;ev=zi&amp;split=1&amp;ll=21.017494,105.835547&amp;spn=0.00669', 'INFORMATION', '<iframe width="293" height="167" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=thai+thinh+ha+noi+viet+nam&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=39.916234,82.265625&amp;ie=UTF8&amp;hq=thai+thinh&amp;hnear=Hoan+Kiem+District,+Hanoi,+Vietnam&amp;t=m&amp;fll=21.011385,105.820076&amp;fspn=0.011518,0.020084&amp;st=107658235038825379151&amp;rq=1&amp;ev=zi&amp;split=1&amp;ll=21.017494,105.835547&amp;spn=0.00669'),
(40, 'en', 'ADDRESS_GOOGLE_MAPS', '<iframe width="293" height="167" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=thai+thinh+ha+noi+viet+nam&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=39.916234,82.265625&amp;ie=UTF8&amp;hq=thai+thinh&amp;hnear=Hoan+Kiem+District,+Hanoi,+Vietnam&amp;t=m&amp;fll=21.011385,105.820076&amp;fspn=0.011518,0.020084&amp;st=107658235038825379151&amp;rq=1&amp;ev=zi&amp;split=1&amp;ll=21.017494,105.835547&amp;spn=0.00669', 'INFORMATION', '<iframe width="293" height="167" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=thai+thinh+ha+noi+viet+nam&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=39.916234,82.265625&amp;ie=UTF8&amp;hq=thai+thinh&amp;hnear=Hoan+Kiem+District,+Hanoi,+Vietnam&amp;t=m&amp;fll=21.011385,105.820076&amp;fspn=0.011518,0.020084&amp;st=107658235038825379151&amp;rq=1&amp;ev=zi&amp;split=1&amp;ll=21.017494,105.835547&amp;spn=0.00669'),
(41, 'vi', 'META_TITLE_RECRUITMENT', 'Trang tuyển dụng', 'SEO', ''),
(42, 'en', 'META_TITLE_RECRUITMENT', 'Trang tuyển dụng', 'SEO', ''),
(43, 'vi', 'META_KEYWORD_RECRUITMENT', 'Trang tuyển dụng', 'SEO', ''),
(44, 'en', 'META_KEYWORD_RECRUITMENT', 'Trang tuyển dụng', 'SEO', ''),
(45, 'vi', 'META_DESCRIPTION_RECRUITMENT', 'Trang tuyển dụng', 'SEO', ''),
(46, 'en', 'META_DESCRIPTION_RECRUITMENT', 'Trang tuyển dụng', 'SEO', ''),
(47, 'vi', 'META_TITLE_QA', 'Trang hỏi đáp', 'SEO', ''),
(48, 'en', 'META_TITLE_QA', 'Trang hỏi đáp', 'SEO', ''),
(49, 'vi', 'META_KEYWORD_QA', 'Trang hỏi đáp', 'SEO', ''),
(50, 'en', 'META_KEYWORD_QA', 'Trang hỏi đáp', 'SEO', ''),
(51, 'vi', 'META_DESCRIPTION_QA', 'Trang hỏi đáp', 'SEO', ''),
(52, 'en', 'META_DESCRIPTION_QA', 'Trang hỏi đáp', 'SEO', ''),
(53, 'vi', 'META_TITLE_PRODUCT', 'Trang sản phẩm', 'SEO', ''),
(54, 'en', 'META_TITLE_PRODUCT', 'Trang sản phẩm', 'SEO', ''),
(55, 'vi', 'META_KEYWORD_PRODUCT', 'Trang sản phẩm', 'SEO', ''),
(56, 'en', 'META_KEYWORD_PRODUCT', 'Trang sản phẩm', 'SEO', ''),
(57, 'vi', 'META_DESCRIPTION_PRODUCT', 'Trang sản phẩm', 'SEO', ''),
(58, 'en', 'META_DESCRIPTION_PRODUCT', 'Trang sản phẩm', 'SEO', ''),
(59, 'vi', 'META_TITLE_SEACH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(60, 'en', 'META_TITLE_SEACH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(61, 'vi', 'META_KEYWORD_SEACH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(62, 'en', 'META_KEYWORD_SEACH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(63, 'vi', 'META_DESCRIPTON_SEACH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(64, 'en', 'META_DESCRIPTON_SEACH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(65, 'vi', 'META_TITLE_NEWS', 'Trang tin tức', 'SEO', ''),
(66, 'en', 'META_TITLE_NEWS', 'Trang tin tức', 'SEO', ''),
(67, 'vi', 'META_KEYWORD_NEWS', 'Trang tin tức', 'SEO', ''),
(68, 'en', 'META_KEYWORD_NEWS', 'Trang tin tức', 'SEO', ''),
(69, 'vi', 'META_DESCRIPTION_NEWS', 'Trang tin tức', 'SEO', ''),
(70, 'en', 'META_DESCRIPTION_NEWS', 'Trang tin tức', 'SEO', ''),
(71, 'vi', 'META_TITLE_SEARCH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(72, 'en', 'META_TITLE_SEARCH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(73, 'vi', 'META_KEYWORD_SEARCH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(74, 'en', 'META_KEYWORD_SEARCH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(75, 'vi', 'META_DESCRIPTION_SEARCH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(76, 'en', 'META_DESCRIPTION_SEARCH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(77, 'vi', 'META_TITLE_CONTACT', 'CÔNG TY TNHH MỸ PHẨM SPAPHAR', 'SEO', ''),
(78, 'en', 'META_TITLE_CONTACT', 'Dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(79, 'vi', 'META_KEYWORD_CONTACT', 'CÔNG TY TNHH MỸ PHẨM SPAPHAR', 'SEO', ''),
(80, 'en', 'META_KEYWORD_CONTACT', 'Dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(81, 'vi', 'META_DESCRIPTION_CONTACT', 'CÔNG TY TNHH MỸ PHẨM SPAPHAR', 'SEO', ''),
(82, 'en', 'META_DESCRIPTION_CONTACT', 'Liên hệ dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(83, 'vi', 'ADDRESS', 'nhà số 6 hẻm 23/26, ngách 26, Thái Thịnh 2, Hà Nội', 'INFORMATION', ''),
(84, 'en', 'ADDRESS', 'nhà số 6 hẻm 23/26, ngách 26, Thái Thịnh 2, Hà Nội', 'INFORMATION', ''),
(85, 'vi', 'SUPPORT_PHONE_SALE', '046 3 290 555', 'INFORMATION', ''),
(86, 'en', 'SUPPORT_PHONE_SALE', '046 3 290 555', 'INFORMATION', ''),
(87, 'vi', 'SUPPORT_PHONE_TECH', '046 3 291 555', 'INFORMATION', ''),
(88, 'en', 'SUPPORT_PHONE_TECH', '046 3 291 555', 'INFORMATION', ''),
(89, 'vi', 'META_TITLE_SHARE', 'CÔNG TY TNHH MỸ PHẨM SPAPHAR', 'SEO', ''),
(90, 'en', 'META_TITLE_SHARE', 'Dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(91, 'vi', 'META_KEYWORD_SHARE', 'CÔNG TY TNHH MỸ PHẨM SPAPHAR', 'SEO', ''),
(92, 'en', 'META_KEYWORD_SHARE', 'Dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(93, 'vi', 'META_DESCRIPTION_SHARE', 'CÔNG TY TNHH MỸ PHẨM SPAPHAR', 'SEO', ''),
(94, 'en', 'META_DESCRIPTION_SHARE', 'Dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(95, 'vi', 'TWITTER_PAGE', '#twitter', 'INFORMATION', ''),
(96, 'en', 'TWITTER_PAGE', '#twitter', 'INFORMATION', ''),
(97, 'vi', 'GOOGLEPLUS_PAGE', '#googleplus', 'INFORMATION', ''),
(98, 'en', 'GOOGLEPLUS_PAGE', '#googleplus', 'INFORMATION', ''),
(99, 'vi', 'RSS_PAGE', '#rss', 'INFORMATION', ''),
(100, 'en', 'RSS_PAGE', '#rss', 'INFORMATION', ''),
(101, 'vi', 'SUPPORT_SKYPE_TECH', 'ihbvietnam', 'INFORMATION', ''),
(102, 'en', 'SUPPORT_SKYPE_TECH', 'ihbvietnam', 'INFORMATION', ''),
(103, 'vi', 'SUPPORT_SKYPE_SALE', 'ihbvietnam', 'INFORMATION', ''),
(104, 'en', 'SUPPORT_SKYPE_SALE', 'ihbvietnam', 'INFORMATION', ''),
(105, 'vi', 'SUPPORT_YAHOO_TECH', 'ihbvietnam', 'INFORMATION', ''),
(106, 'en', 'SUPPORT_YAHOO_TECH', 'ihbvietnam', 'INFORMATION', ''),
(107, 'vi', 'SUPPORT_YAHOO_SALE', 'ihbvietnam', 'INFORMATION', ''),
(108, 'en', 'SUPPORT_YAHOO_SALE', 'ihbvietnam', 'INFORMATION', ''),
(109, 'vi', 'HOTLINE_PHONE', '0988 330 555', 'INFORMATION', ''),
(110, 'en', 'HOTLINE_PHONE', '0988 330 555', 'INFORMATION', ''),
(119, 'vi', 'FAX', '(+84-4) 354 09412', 'INFORMATION', ''),
(120, 'en', 'FAX', '(+84-4) 354 09412', 'INFORMATION', ''),
(129, 'vi', 'META_TITLE_INTRO', 'Danh sách các bài giới thiệu', 'SEO', ''),
(130, 'en', 'META_TITLE_INTRO', 'Danh sách các bài giới thiệu', 'SEO', ''),
(131, 'vi', 'META_KEYWORD_INTRO', 'Danh sách các bài giới thiệu', 'SEO', ''),
(132, 'en', 'META_KEYWORD_INTRO', 'Danh sách các bài giới thiệu', 'SEO', ''),
(133, 'vi', 'META_DESCRIPTION_INTRO', 'CÔNG TY TNHH MỸ PHẨM SPAPHAR', 'SEO', ''),
(134, 'en', 'META_DESCRIPTION_INTRO', 'Dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(150, 'vi', 'META_DESCRIPTION_SUPPORTER', 'Ban cố vấn', 'SEO', ''),
(151, 'en', 'META_DESCRIPTION_SUPPORTER', 'Ban cố vấn', 'SEO', ''),
(152, 'vi', 'META_TITLE_ADVISOR', 'Ban cố vấn', 'SEO', ''),
(153, 'en', 'META_TITLE_ADVISOR', 'Ban cố vấn', 'SEO', ''),
(154, 'vi', 'META_KEYWORD_ADVISOR', 'Ban cố vấn', 'SEO', ''),
(155, 'en', 'META_KEYWORD_ADVISOR', 'Ban cố vấn', 'SEO', ''),
(156, 'vi', 'META_DESCRIPTION_ADVISOR', 'Ban cố vấn', 'SEO', ''),
(157, 'en', 'META_DESCRIPTION_ADVISOR', 'Ban cố vấn', 'SEO', ''),
(158, 'vi', 'META_TITLE_SUPPORTER', 'Tư vấn sức khỏe online', 'SEO', ''),
(159, 'en', 'META_TITLE_SUPPORTER', 'Tư vấn sức khỏe online', 'SEO', ''),
(160, 'vi', 'META_KEYWORD_SUPPORTER', 'Tư vấn sức khỏe online', 'SEO', ''),
(161, 'en', 'META_KEYWORD_SUPPORTER', 'Tư vấn sức khỏe online', 'SEO', ''),
(162, 'vi', 'HELP_SHOPPING', '811', 'INFORMATION', 'ID của bài viết hướng dẫn mua hàng online'),
(163, 'en', 'HELP_SHOPPING', '811', 'INFORMATION', 'ID của bài viết hướng dẫn mua hàng online'),
(164, 'vi', 'HELP_CHECKOUT', '812', 'INFORMATION', 'Hướng dẫn thanh toán khi mua hàng'),
(165, 'en', 'HELP_CHECKOUT', '812', 'INFORMATION', 'Hướng dẫn thanh toán khi mua hàng'),
(166, 'vi', 'LINKEDIN_PAGE', '#linkedin', 'INFORMATION', ''),
(168, 'vi', 'META_TITLE_PARTNER', 'Trang danh sách đối tác', 'SEO', 'Trang danh sách đối tác'),
(169, 'en', 'META_TITLE_PARTNER', 'Trang danh sách đối tác', 'SEO', 'Trang danh sách đối tác'),
(170, 'vi', 'META_KEYWORD_PARTNER', 'Trang danh sách partner', 'SEO', 'Trang danh sách partner'),
(171, 'en', 'META_KEYWORD_PARTNER', 'Trang danh sách partner', 'SEO', 'Trang danh sách partner'),
(172, 'vi', 'META_DESCRIPTION_PARTNER', 'Trang danh sách partner', 'SEO', 'Trang danh sách partner'),
(173, 'en', 'META_DESCRIPTION_PARTNER', 'Trang danh sách partner', 'SEO', 'Trang danh sách partner'),
(174, 'vi', 'META_TITLE_BOOKING', 'Trang đặt tour theo yêu cầu', 'SEO', 'Quản trị meta trang booking'),
(175, 'en', 'META_TITLE_BOOKING', 'Trang đặt tour theo yêu cầu', 'SEO', 'Quản trị meta trang booking'),
(176, 'vi', 'META_KEYWORD_BOOKING', 'Trang đặt tour theo yêu cầu', 'SEO', 'Trang đặt tour theo yêu cầu'),
(177, 'en', 'META_KEYWORD_BOOKING', 'Trang đặt tour theo yêu cầu', 'SEO', 'Trang đặt tour theo yêu cầu'),
(178, 'vi', 'META_DESCRIPTION_BOOKING', 'Trang đặt tour theo yêu cầu', 'SEO', 'Trang đặt tour theo yêu cầu'),
(179, 'en', 'META_DESCRIPTION_BOOKING', 'Trang đặt tour theo yêu cầu', 'SEO', 'Trang đặt tour theo yêu cầu'),
(180, 'vi', 'META_TITLE_SUGGEST_TOUR', 'Trang gợi ý tour', 'SEO', 'Trang gợi ý tour'),
(181, 'en', 'META_TITLE_SUGGEST_TOUR', 'Trang gợi ý tour', 'SEO', 'Trang gợi ý tour'),
(182, 'vi', 'META_KEYWORD_SUGGEST_TOUR', 'Trang gợi ý tour', 'SEO', 'Trang gợi ý tour'),
(183, 'en', 'META_KEYWORD_SUGGEST_TOUR', 'Trang gợi ý tour', 'SEO', 'Trang gợi ý tour'),
(184, 'vi', 'META_DESCRIPTION_SUGGEST_TOUR', 'Trang gợi ý tour', 'SEO', 'Trang gợi ý tour'),
(185, 'en', 'META_DESCRIPTION_SUGGEST_TOUR', 'Trang gợi ý tour', 'SEO', 'Trang gợi ý tour'),
(186, 'vi', 'BUSINESS_REGISTRATION', 'Immatriculation Voyage de VNAT: 01-612/2013/TCDL-GP LHQT', 'INFORMATION', ''),
(187, 'en', 'BUSINESS_REGISTRATION', 'Immatriculation Voyage de VNAT: 01-612/2013/TCDL-GP LHQT', 'INFORMATION', ''),
(188, 'vi', 'WORKING_TIME', 'lundi - vendredi: 9h30 - 18h00 - samedi : 9h30 -12h', 'INFORMATION', 'Daily Working time'),
(189, 'en', 'WORKING_TIME', 'lundi - vendredi: 9h30 - 18h00 - samedi : 9h30 -12h', 'INFORMATION', 'Daily Working time'),
(190, 'vi', 'COMPANY_NAME', 'CÔNG TY TNHH THƯƠNG MẠI VÀ TRANG TRÍ NỘI THẤT VIỆT PHÁT', 'INFORMATION', ''),
(191, 'en', 'COMPANY_NAME', 'CÔNG TY TNHH THƯƠNG MẠI VÀ TRANG TRÍ NỘI THẤT VIỆT PHÁT', 'INFORMATION', ''),
(192, 'vi', 'KD_HANOI', '(04) 1234 5678', 'INFORMATION', ''),
(193, 'en', 'KD_HANOI', '(04) 1234 5678', 'INFORMATION', ''),
(194, 'vi', 'KD_TPHCM', '(04) 1234 5678', 'INFORMATION', ''),
(195, 'en', 'KD_TPHCM', '(04) 1234 5678', 'INFORMATION', ''),
(196, 'vi', 'KD_DANANG', '(04) 1234 5678', 'INFORMATION', ''),
(197, 'en', 'KD_DANANG', '(04) 1234 5678', 'INFORMATION', ''),
(198, 'vi', 'KD_HAIPHONG', '(04) 1234 5678', 'INFORMATION', ''),
(199, 'en', 'KD_HAIPHONG', '(04) 1234 5678', 'INFORMATION', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share`
--

CREATE TABLE IF NOT EXISTS `tbl_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `other` text NOT NULL,
  `visits` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store`
--

CREATE TABLE IF NOT EXISTS `tbl_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `name` varchar(256) NOT NULL,
  `city_id` int(11) NOT NULL,
  `introimage_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `other` text NOT NULL,
  `visits` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store_product`
--

CREATE TABLE IF NOT EXISTS `tbl_store_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_advisor`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_advisor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advisor_id` int(11) NOT NULL,
  `to_advisor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_album`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `to_album_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_audio`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_audio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audio_id` int(11) NOT NULL,
  `to_audio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_booking`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `to_booking_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_document`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `to_document_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_embedded_video`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_embedded_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `embeddedVideo_id` int(11) NOT NULL,
  `to_embeddedVideo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_healthnews`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_healthnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `healthNews_id` int(11) NOT NULL,
  `to_healthNews_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_intro`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_intro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intro_id` int(11) NOT NULL,
  `to_intro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_introvideo`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_introvideo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intro_id` int(11) NOT NULL,
  `to_video_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_news`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `to_news_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_partner`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_id` int(11) NOT NULL,
  `to_partner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_product`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `to_product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_suggest_product`
--

INSERT INTO `tbl_suggest_product` (`id`, `product_id`, `to_product_id`) VALUES
(1, 19, 18),
(2, 19, 17),
(3, 19, 16),
(4, 19, 15),
(5, 19, 14),
(6, 19, 13),
(7, 19, 12),
(8, 19, 11),
(9, 19, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_productvideo`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_productvideo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `to_video_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_product_news`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_product_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `to_news_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_qa`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_qa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qa_id` int(11) NOT NULL,
  `to_qa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_recruitment`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_recruitment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recruitment_id` int(11) NOT NULL,
  `to_recruitment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_seller`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `to_seller_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_share`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `share_id` int(11) NOT NULL,
  `to_share_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_store`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `to_store_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_textlink`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_textlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `textlink_id` int(11) NOT NULL,
  `to_textlink_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggest_video`
--

CREATE TABLE IF NOT EXISTS `tbl_suggest_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `to_video_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supporter`
--

CREATE TABLE IF NOT EXISTS `tbl_supporter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `order_view` int(11) NOT NULL DEFAULT '1',
  `other` varchar(1024) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_supporter`
--

INSERT INTO `tbl_supporter` (`id`, `language`, `status`, `name`, `order_view`, `other`, `created_by`, `created_time`) VALUES
(1, 'vi', 1, '', 0, '{"title":"Ph\\u00f2ng kinh doanh H\\u00e0 N\\u1ed9i","skype":"","yahoo":"","email":"","phone":"(04) 1234 5678"}', 1, 1410234862),
(2, 'vi', 1, '', 0, '{"title":"Ph\\u00f2ng kinh doanh TP.HCM","skype":"","yahoo":"","email":"","phone":"(04) 1234 5678"}', 1, 1410234897),
(3, 'vi', 1, '', 0, '{"title":"Ph\\u00f2ng kinh doanh H\\u1ea3i Ph\\u00f2ng","skype":"","yahoo":"","email":"","phone":"(04) 1234 5678"}', 1, 1410234920),
(4, 'vi', 1, '', 0, '{"title":"Ph\\u00f2ng kinh doanh \\u0110\\u00e0 N\\u1eb5ng","skype":"","yahoo":"","email":"","phone":"(04) 1234 5678"}', 1, 1410234940);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_textlink`
--

CREATE TABLE IF NOT EXISTS `tbl_textlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `other` text NOT NULL,
  `visits` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `other` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_time` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_visit_date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `password`, `salt`, `status`, `email`, `other`, `created_time`, `created_by`, `last_visit_date`) VALUES
(1, '93a46fb6c41ebd7dc6dcb79ef600d48a', '52cd07bcbbe9d1.55450098', 1, 'admin@khoemoingay.com', '{"phone":"04 6680 7626","address":"H\\u00e0 N\\u1ed9i","firstname":"IHB","lastname":"Vi\\u1ec7t Nam","register_date":1331006642,"last_visit_date":1331006642,"introimage":"173,174"}', 0, 0, 1389158994);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE IF NOT EXISTS `tbl_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` char(8) NOT NULL DEFAULT 'vi',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `file_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) unsigned NOT NULL,
  `order_view` int(11) NOT NULL DEFAULT '1',
  `home` int(11) NOT NULL DEFAULT '0',
  `new` int(11) NOT NULL DEFAULT '0',
  `other` varchar(1024) NOT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
