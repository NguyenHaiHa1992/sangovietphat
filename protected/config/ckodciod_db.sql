-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 16, 2017 lúc 11:22 PM
-- Phiên bản máy phục vụ: 10.0.25-MariaDB
-- Phiên bản PHP: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ckodciod_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authassignment`
--

CREATE TABLE `authassignment` (
  `itemname` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(64) NOT NULL,
  `bizrule` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Manager', 1, NULL, 'N;');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authitem`
--

CREATE TABLE `authitem` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `bizrule` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `authitem`
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
('contact_sendMail', 0, '', '', ''),
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
-- Cấu trúc bảng cho bảng `authitemchild`
--

CREATE TABLE `authitemchild` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Advisor Manager', 'advisor_autoSave'),
('Advisor Manager', 'advisor_checkbox'),
('Advisor Manager', 'advisor_copy'),
('Advisor Manager', 'advisor_create'),
('Advisor Manager', 'advisor_delete'),
('Advisor Manager', 'advisor_edit'),
('Advisor Manager', 'advisor_index'),
('Advisor Manager', 'advisor_reverseHome'),
('Advisor Manager', 'advisor_reverseNew'),
('Advisor Manager', 'advisor_reverseStatus'),
('Advisor Manager', 'advisor_suggestTitle'),
('Advisor Manager', 'advisor_update'),
('Advisor Manager', 'advisor_updateSuggest'),
('Advisor Manager', 'advisorCategory_create'),
('Advisor Manager', 'advisorCategory_delete'),
('Advisor Manager', 'advisorCategory_index'),
('Advisor Manager', 'advisorCategory_update'),
('Advisor Manager', 'advisorCategory_updateListOrderView'),
('Advisor Manager', 'advisorCategory_validate'),
('Advisor Manager', 'advisorCategory_write'),
('Album Editor', 'album_checkbox'),
('Album Editor', 'album_copy'),
('Album Editor', 'album_create'),
('Album Editor', 'album_index'),
('Album Editor', 'album_suggestName'),
('Album Editor', 'album_update'),
('Album Editor', 'album_updateSuggest'),
('Album Editor', 'image_update'),
('Album Editor', 'image_updateInfo'),
('Album Editor', 'image_upload'),
('Album Manager', 'album_checkbox'),
('Album Manager', 'album_copy'),
('Album Manager', 'album_create'),
('Album Manager', 'album_delete'),
('Album Manager', 'album_edit'),
('Album Manager', 'album_index'),
('Album Manager', 'album_reverseHome'),
('Album Manager', 'album_reverseNew'),
('Album Manager', 'album_reverseStatus'),
('Album Manager', 'album_suggestName'),
('Album Manager', 'album_update'),
('Album Manager', 'album_updateSuggest'),
('Album Manager', 'albumCategory_create'),
('Album Manager', 'albumCategory_delete'),
('Album Manager', 'albumCategory_index'),
('Album Manager', 'albumCategory_update'),
('Album Manager', 'albumCategory_updateListOrderView'),
('Album Manager', 'albumCategory_validate'),
('Album Manager', 'albumCategory_write'),
('Album Manager', 'image_update'),
('Album Manager', 'image_updateInfo'),
('Album Manager', 'image_upload'),
('Audio Manager', 'audio_checkbox'),
('Audio Manager', 'audio_create'),
('Audio Manager', 'audio_delete'),
('Audio Manager', 'audio_edit'),
('Audio Manager', 'audio_index'),
('Audio Manager', 'audio_reverseStatus'),
('Audio Manager', 'audio_suggestName'),
('Audio Manager', 'audio_update'),
('Audio Manager', 'audioCategory_create'),
('Audio Manager', 'audioCategory_delete'),
('Audio Manager', 'audioCategory_index'),
('Audio Manager', 'audioCategory_update'),
('Audio Manager', 'audioCategory_updateListOrderView'),
('Audio Manager', 'audioCategory_validate'),
('Audio Manager', 'audioCategory_write'),
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
('City Manager', 'city_copy'),
('City Manager', 'city_create'),
('City Manager', 'city_delete'),
('City Manager', 'city_edit'),
('City Manager', 'city_index'),
('City Manager', 'city_reverseStatus'),
('City Manager', 'city_suggestTitle'),
('City Manager', 'city_update'),
('Clip Editor', 'file_upload'),
('Clip Editor', 'image_update'),
('Clip Editor', 'image_updateInfo'),
('Clip Editor', 'image_upload'),
('Comment Manager', 'comment_checkbox'),
('Comment Manager', 'comment_delete'),
('Comment Manager', 'comment_index'),
('Comment Manager', 'comment_reverseStatus'),
('Contact Manager', 'contact_checkbox'),
('Contact Manager', 'contact_delete'),
('Contact Manager', 'contact_index'),
('Contact Manager', 'contact_reverseStatus'),
('Contact Manager', 'contact_sendEmail'),
('Contact Manager', 'contact_updateForm'),
('Contact Manager', 'contact_write'),
('Customer Manager', 'customer_checkbox'),
('Customer Manager', 'customer_delete'),
('Customer Manager', 'customer_index'),
('Customer Manager', 'customer_resetPassword'),
('Customer Manager', 'customer_reverseStatus'),
('Customer Manager', 'customer_suggestEmail'),
('Customer Manager', 'customer_updateForm'),
('Customer Manager', 'customer_write'),
('Document Manager', 'document_checkbox'),
('Document Manager', 'document_copy'),
('Document Manager', 'document_create'),
('Document Manager', 'document_delete'),
('Document Manager', 'document_index'),
('Document Manager', 'document_reverseHome'),
('Document Manager', 'document_reverseNew'),
('Document Manager', 'document_reverseStatus'),
('Document Manager', 'document_suggestName'),
('Document Manager', 'document_update'),
('Document Manager', 'document_updateSuggest'),
('Document Manager', 'documentCategory_create'),
('Document Manager', 'documentCategory_delete'),
('Document Manager', 'documentCategory_index'),
('Document Manager', 'documentCategory_update'),
('Document Manager', 'documentCategory_updateListOrderView'),
('Document Manager', 'documentCategory_validate'),
('Document Manager', 'documentCategory_write'),
('Document Manager', 'file_delete'),
('Document Manager', 'file_upload'),
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
('Embeded Video Manager', 'embeddedVideo_copy'),
('Embeded Video Manager', 'embeddedVideo_create'),
('Embeded Video Manager', 'embeddedVideo_delete'),
('Embeded Video Manager', 'embeddedVideo_edit'),
('Embeded Video Manager', 'embeddedVideo_index'),
('Embeded Video Manager', 'embeddedVideo_reverseHome'),
('Embeded Video Manager', 'embeddedVideo_reverseNew'),
('Embeded Video Manager', 'embeddedVideo_reverseStatus'),
('Embeded Video Manager', 'embeddedVideo_suggestName'),
('Embeded Video Manager', 'embeddedVideo_update'),
('Embeded Video Manager', 'embeddedVideo_updateSuggest'),
('Embeded Video Manager', 'embeddedVideoCategory_create'),
('Embeded Video Manager', 'embeddedVideoCategory_delete'),
('Embeded Video Manager', 'embeddedVideoCategory_index'),
('Embeded Video Manager', 'embeddedVideoCategory_update'),
('Embeded Video Manager', 'embeddedVideoCategory_updateListOrderView'),
('Embeded Video Manager', 'embeddedVideoCategory_validate'),
('Embeded Video Manager', 'embeddedVideoCategory_write'),
('Image Manager', 'image_create'),
('Image Manager', 'image_delete'),
('Image Manager', 'image_edit'),
('Image Manager', 'image_index'),
('Image Manager', 'image_update'),
('Image Manager', 'image_updateInfo'),
('Image Manager', 'image_upload'),
('Intro manager', 'intro_autoSave'),
('Intro manager', 'intro_checkbox'),
('Intro manager', 'intro_copy'),
('Intro manager', 'intro_create'),
('Intro manager', 'intro_delete'),
('Intro manager', 'intro_edit'),
('Intro manager', 'intro_index'),
('Intro manager', 'intro_reverseHome'),
('Intro manager', 'intro_reverseNew'),
('Intro manager', 'intro_reverseStatus'),
('Intro manager', 'intro_suggestTitle'),
('Intro manager', 'intro_update'),
('Intro manager', 'intro_updateSuggest'),
('Intro manager', 'introCategory_create'),
('Intro manager', 'introCategory_delete'),
('Intro manager', 'introCategory_index'),
('Intro manager', 'introCategory_update'),
('Intro manager', 'introCategory_updateListOrderView'),
('Intro manager', 'introCategory_validate'),
('Intro manager', 'introCategory_write'),
('Manager', 'Advisor Manager'),
('Manager', 'advisor_autoSave'),
('Manager', 'advisor_checkbox'),
('Manager', 'advisor_copy'),
('Manager', 'advisor_create'),
('Manager', 'advisor_delete'),
('Manager', 'advisor_edit'),
('Manager', 'advisor_index'),
('Manager', 'advisor_reverseHome'),
('Manager', 'advisor_reverseNew'),
('Manager', 'advisor_reverseStatus'),
('Manager', 'advisor_suggestTitle'),
('Manager', 'advisor_update'),
('Manager', 'advisor_updateSuggest'),
('Manager', 'advisorCategory_create'),
('Manager', 'advisorCategory_delete'),
('Manager', 'advisorCategory_index'),
('Manager', 'advisorCategory_update'),
('Manager', 'advisorCategory_updateListOrderView'),
('Manager', 'advisorCategory_validate'),
('Manager', 'advisorCategory_write'),
('Manager', 'Album Manager'),
('Manager', 'album_checkbox'),
('Manager', 'album_copy'),
('Manager', 'album_create'),
('Manager', 'album_delete'),
('Manager', 'album_edit'),
('Manager', 'album_index'),
('Manager', 'album_reverseHome'),
('Manager', 'album_reverseNew'),
('Manager', 'album_reverseStatus'),
('Manager', 'album_suggestName'),
('Manager', 'album_update'),
('Manager', 'album_updateSuggest'),
('Manager', 'albumCategory_create'),
('Manager', 'albumCategory_delete'),
('Manager', 'albumCategory_index'),
('Manager', 'albumCategory_update'),
('Manager', 'albumCategory_updateListOrderView'),
('Manager', 'albumCategory_validate'),
('Manager', 'albumCategory_write'),
('Manager', 'Audio Manager'),
('Manager', 'audio_checkbox'),
('Manager', 'audio_create'),
('Manager', 'audio_delete'),
('Manager', 'audio_edit'),
('Manager', 'audio_index'),
('Manager', 'audio_reverseStatus'),
('Manager', 'audio_suggestName'),
('Manager', 'audio_update'),
('Manager', 'audioCategory_create'),
('Manager', 'audioCategory_delete'),
('Manager', 'audioCategory_index'),
('Manager', 'audioCategory_update'),
('Manager', 'audioCategory_updateListOrderView'),
('Manager', 'audioCategory_validate'),
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
('Manager', 'booking_autoSave'),
('Manager', 'booking_checkbox'),
('Manager', 'booking_copy'),
('Manager', 'booking_create'),
('Manager', 'booking_delete'),
('Manager', 'booking_edit'),
('Manager', 'booking_index'),
('Manager', 'booking_reverseHome'),
('Manager', 'booking_reverseNew'),
('Manager', 'booking_reverseStatus'),
('Manager', 'booking_suggestTitle'),
('Manager', 'booking_update'),
('Manager', 'booking_updateSuggest'),
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
('Manager', 'city_copy'),
('Manager', 'city_create'),
('Manager', 'city_delete'),
('Manager', 'city_edit'),
('Manager', 'city_index'),
('Manager', 'city_reverseStatus'),
('Manager', 'city_suggestTitle'),
('Manager', 'city_update'),
('Manager', 'Clip Manager'),
('Manager', 'Comment Manager'),
('Manager', 'comment_checkbox'),
('Manager', 'comment_delete'),
('Manager', 'comment_index'),
('Manager', 'comment_reverseStatus'),
('Manager', 'Contact Manager'),
('Manager', 'contact_checkbox'),
('Manager', 'contact_delete'),
('Manager', 'contact_index'),
('Manager', 'contact_reverseStatus'),
('Manager', 'contact_sendEmail'),
('Manager', 'contact_sendMail'),
('Manager', 'contact_updateForm'),
('Manager', 'contact_write'),
('Manager', 'Customer Manager'),
('Manager', 'customer_checkbox'),
('Manager', 'customer_delete'),
('Manager', 'customer_index'),
('Manager', 'customer_resetPassword'),
('Manager', 'customer_reverseStatus'),
('Manager', 'customer_suggestEmail'),
('Manager', 'customer_updateForm'),
('Manager', 'customer_write'),
('Manager', 'Document Manager'),
('Manager', 'document_checkbox'),
('Manager', 'document_copy'),
('Manager', 'document_create'),
('Manager', 'document_delete'),
('Manager', 'document_index'),
('Manager', 'document_reverseHome'),
('Manager', 'document_reverseNew'),
('Manager', 'document_reverseStatus'),
('Manager', 'document_suggestName'),
('Manager', 'document_update'),
('Manager', 'document_updateSuggest'),
('Manager', 'documentCategory_create'),
('Manager', 'documentCategory_delete'),
('Manager', 'documentCategory_index'),
('Manager', 'documentCategory_update'),
('Manager', 'documentCategory_updateListOrderView'),
('Manager', 'documentCategory_validate'),
('Manager', 'documentCategory_write'),
('Manager', 'embeddedVideo_checkbox'),
('Manager', 'embeddedVideo_copy'),
('Manager', 'embeddedVideo_create'),
('Manager', 'embeddedVideo_delete'),
('Manager', 'embeddedVideo_edit'),
('Manager', 'embeddedVideo_index'),
('Manager', 'embeddedVideo_reverseHome'),
('Manager', 'embeddedVideo_reverseNew'),
('Manager', 'embeddedVideo_reverseStatus'),
('Manager', 'embeddedVideo_suggestName'),
('Manager', 'embeddedVideo_update'),
('Manager', 'embeddedVideo_updateSuggest'),
('Manager', 'embeddedVideoCategory_create'),
('Manager', 'embeddedVideoCategory_delete'),
('Manager', 'embeddedVideoCategory_index'),
('Manager', 'embeddedVideoCategory_update'),
('Manager', 'embeddedVideoCategory_updateListOrderView'),
('Manager', 'embeddedVideoCategory_validate'),
('Manager', 'embeddedVideoCategory_write'),
('Manager', 'Embeded Video Manager'),
('Manager', 'file_delete'),
('Manager', 'file_upload'),
('Manager', 'help_index'),
('Manager', 'help_view'),
('Manager', 'Image Manager'),
('Manager', 'image_create'),
('Manager', 'image_delete'),
('Manager', 'image_edit'),
('Manager', 'image_index'),
('Manager', 'image_update'),
('Manager', 'image_updateInfo'),
('Manager', 'image_upload'),
('Manager', 'Intro manager'),
('Manager', 'intro_autoSave'),
('Manager', 'intro_checkbox'),
('Manager', 'intro_copy'),
('Manager', 'intro_create'),
('Manager', 'intro_delete'),
('Manager', 'intro_edit'),
('Manager', 'intro_index'),
('Manager', 'intro_reverseHome'),
('Manager', 'intro_reverseNew'),
('Manager', 'intro_reverseStatus'),
('Manager', 'intro_suggestTitle'),
('Manager', 'intro_update'),
('Manager', 'intro_updateSuggest'),
('Manager', 'introCategory_create'),
('Manager', 'introCategory_delete'),
('Manager', 'introCategory_index'),
('Manager', 'introCategory_update'),
('Manager', 'introCategory_updateListOrderView'),
('Manager', 'introCategory_validate'),
('Manager', 'introCategory_write'),
('Manager', 'News Editor'),
('Manager', 'news_autoSave'),
('Manager', 'news_checkbox'),
('Manager', 'news_copy'),
('Manager', 'news_create'),
('Manager', 'news_delete'),
('Manager', 'news_edit'),
('Manager', 'news_index'),
('Manager', 'news_reverseHome'),
('Manager', 'news_reverseNew'),
('Manager', 'news_reverseStatus'),
('Manager', 'news_suggestTitle'),
('Manager', 'news_update'),
('Manager', 'news_updateSuggest'),
('Manager', 'newsCategory_create'),
('Manager', 'newsCategory_delete'),
('Manager', 'newsCategory_index'),
('Manager', 'newsCategory_update'),
('Manager', 'newsCategory_updateListOrderView'),
('Manager', 'newsCategory_validate'),
('Manager', 'newsCategory_write'),
('Manager', 'Order Manager'),
('Manager', 'order_checkbox'),
('Manager', 'order_delete'),
('Manager', 'order_index'),
('Manager', 'order_reverseStatus'),
('Manager', 'order_updateForm'),
('Manager', 'order_write'),
('Manager', 'Partner Manager'),
('Manager', 'partner_autoSave'),
('Manager', 'partner_checkbox'),
('Manager', 'partner_copy'),
('Manager', 'partner_create'),
('Manager', 'partner_delete'),
('Manager', 'partner_edit'),
('Manager', 'partner_index'),
('Manager', 'partner_reverseHome'),
('Manager', 'partner_reverseNew'),
('Manager', 'partner_reverseStatus'),
('Manager', 'partner_suggestTitle'),
('Manager', 'partner_update'),
('Manager', 'partner_updateSuggest'),
('Manager', 'partnerCategory_create'),
('Manager', 'partnerCategory_delete'),
('Manager', 'partnerCategory_index'),
('Manager', 'partnerCategory_update'),
('Manager', 'partnerCategory_updateListOrderView'),
('Manager', 'partnerCategory_validate'),
('Manager', 'partnerCategory_write'),
('Manager', 'Product Manager'),
('Manager', 'product_autoSave'),
('Manager', 'product_checkbox'),
('Manager', 'product_copy'),
('Manager', 'product_create'),
('Manager', 'product_delete'),
('Manager', 'product_edit'),
('Manager', 'product_index'),
('Manager', 'product_reverseHome'),
('Manager', 'product_reverseNew'),
('Manager', 'product_reverseSale'),
('Manager', 'product_reverseStatus'),
('Manager', 'product_suggestName'),
('Manager', 'product_update'),
('Manager', 'product_updateSuggest'),
('Manager', 'productCategory_create'),
('Manager', 'productCategory_delete'),
('Manager', 'productCategory_index'),
('Manager', 'productCategory_update'),
('Manager', 'productCategory_updateListOrderView'),
('Manager', 'productCategory_validate'),
('Manager', 'productCategory_write'),
('Manager', 'productCityCategory_create'),
('Manager', 'productCityCategory_delete'),
('Manager', 'productCityCategory_index'),
('Manager', 'productCityCategory_update'),
('Manager', 'productCityCategory_updateListOrderView'),
('Manager', 'productCityCategory_validate'),
('Manager', 'productCityCategory_write'),
('Manager', 'QA Manager'),
('Manager', 'qa_checkbox'),
('Manager', 'qa_copy'),
('Manager', 'qa_create'),
('Manager', 'qa_delete'),
('Manager', 'qa_edit'),
('Manager', 'qa_index'),
('Manager', 'qa_reverseHome'),
('Manager', 'qa_reverseNew'),
('Manager', 'qa_reverseStatus'),
('Manager', 'qa_suggestTitle'),
('Manager', 'qa_update'),
('Manager', 'qa_updateSuggest'),
('Manager', 'QaAnswer Manager'),
('Manager', 'qaAnswer_checkbox'),
('Manager', 'qaAnswer_create'),
('Manager', 'qaAnswer_delete'),
('Manager', 'qaAnswer_edit'),
('Manager', 'qaAnswer_index'),
('Manager', 'qaAnswer_reverseStatus'),
('Manager', 'qaAnswer_suggestTitle'),
('Manager', 'qaAnswer_update'),
('Manager', 'qaAnswer_updateSuggest'),
('Manager', 'qaCategory_create'),
('Manager', 'qaCategory_delete'),
('Manager', 'qaCategory_index'),
('Manager', 'qaCategory_update'),
('Manager', 'qaCategory_updateListOrderView'),
('Manager', 'qaCategory_validate'),
('Manager', 'qaCategory_write'),
('Manager', 'Setting Manager'),
('Manager', 'setting_edit'),
('Manager', 'setting_index'),
('Manager', 'setting_information'),
('Manager', 'setting_seo'),
('Manager', 'setting_suggestName'),
('Manager', 'setting_updateForm'),
('Manager', 'Share Manager'),
('Manager', 'share_checkbox'),
('Manager', 'share_copy'),
('Manager', 'share_create'),
('Manager', 'share_delete'),
('Manager', 'share_edit'),
('Manager', 'share_index'),
('Manager', 'share_reverseHome'),
('Manager', 'share_reverseNew'),
('Manager', 'share_reverseStatus'),
('Manager', 'share_suggestTitle'),
('Manager', 'share_update'),
('Manager', 'share_updateSuggest'),
('Manager', 'shareCategory_create'),
('Manager', 'shareCategory_delete'),
('Manager', 'shareCategory_index'),
('Manager', 'shareCategory_update'),
('Manager', 'shareCategory_updateListOrderView'),
('Manager', 'shareCategory_validate'),
('Manager', 'shareCategory_write'),
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
('Manager', 'textlink_checkbox'),
('Manager', 'textlink_copy'),
('Manager', 'textlink_create'),
('Manager', 'textlink_delete'),
('Manager', 'textlink_edit'),
('Manager', 'textlink_index'),
('Manager', 'textlink_reverseHome'),
('Manager', 'textlink_reverseNew'),
('Manager', 'textlink_reverseStatus'),
('Manager', 'textlink_suggestTitle'),
('Manager', 'textlink_update'),
('Manager', 'textlink_updateSuggest'),
('Manager', 'textLinkCategory_create'),
('Manager', 'textLinkCategory_delete'),
('Manager', 'textLinkCategory_index'),
('Manager', 'textLinkCategory_update'),
('Manager', 'textLinkCategory_updateListOrderView'),
('Manager', 'textLinkCategory_validate'),
('Manager', 'textLinkCategory_write'),
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
('Manager', 'video_copy'),
('Manager', 'video_create'),
('Manager', 'video_delete'),
('Manager', 'video_edit'),
('Manager', 'video_index'),
('Manager', 'video_reverseHome'),
('Manager', 'video_reverseNew'),
('Manager', 'video_reverseStatus'),
('Manager', 'video_suggestName'),
('Manager', 'video_update'),
('Manager', 'video_updateSuggest'),
('Manager', 'videoCategory_create'),
('Manager', 'videoCategory_delete'),
('Manager', 'videoCategory_index'),
('Manager', 'videoCategory_update'),
('Manager', 'videoCategory_updateListOrderView'),
('Manager', 'videoCategory_validate'),
('Manager', 'videoCategory_write'),
('News Editor', 'image_update'),
('News Editor', 'image_updateInfo'),
('News Editor', 'image_upload'),
('News Editor', 'news_autoSave'),
('News Editor', 'news_checkbox'),
('News Editor', 'news_copy'),
('News Editor', 'news_create'),
('News Editor', 'news_delete'),
('News Editor', 'news_edit'),
('News Editor', 'news_index'),
('News Editor', 'news_reverseHome'),
('News Editor', 'news_reverseNew'),
('News Editor', 'news_reverseStatus'),
('News Editor', 'news_suggestTitle'),
('News Editor', 'news_update'),
('News Editor', 'news_updateSuggest'),
('News Editor', 'newsCategory_create'),
('News Editor', 'newsCategory_delete'),
('News Editor', 'newsCategory_index'),
('News Editor', 'newsCategory_update'),
('News Editor', 'newsCategory_updateListOrderView'),
('News Editor', 'newsCategory_validate'),
('News Editor', 'newsCategory_write'),
('Order Manager', 'order_checkbox'),
('Order Manager', 'order_delete'),
('Order Manager', 'order_index'),
('Order Manager', 'order_reverseStatus'),
('Order Manager', 'order_updateForm'),
('Order Manager', 'order_write'),
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
('Product Editor', 'image_update'),
('Product Editor', 'image_updateInfo'),
('Product Editor', 'image_upload'),
('Product Editor', 'product_checkbox'),
('Product Editor', 'product_copy'),
('Product Editor', 'product_create'),
('Product Editor', 'product_delete'),
('Product Editor', 'product_edit'),
('Product Editor', 'product_index'),
('Product Editor', 'product_reverseHome'),
('Product Editor', 'product_reverseNew'),
('Product Editor', 'product_reverseSale'),
('Product Editor', 'product_reverseStatus'),
('Product Editor', 'product_suggestName'),
('Product Editor', 'product_update'),
('Product Editor', 'product_updateSuggest'),
('Product Editor', 'productCategory_create'),
('Product Editor', 'productCategory_delete'),
('Product Editor', 'productCategory_index'),
('Product Editor', 'productCategory_update'),
('Product Editor', 'productCategory_updateListOrderView'),
('Product Editor', 'productCategory_validate'),
('Product Editor', 'productCategory_write'),
('Product Manager', 'image_update'),
('Product Manager', 'image_updateInfo'),
('Product Manager', 'image_upload'),
('Product Manager', 'product_autoSave'),
('Product Manager', 'product_checkbox'),
('Product Manager', 'product_copy'),
('Product Manager', 'product_create'),
('Product Manager', 'product_delete'),
('Product Manager', 'product_edit'),
('Product Manager', 'product_index'),
('Product Manager', 'product_reverseHome'),
('Product Manager', 'product_reverseNew'),
('Product Manager', 'product_reverseSale'),
('Product Manager', 'product_reverseStatus'),
('Product Manager', 'product_suggestName'),
('Product Manager', 'product_update'),
('Product Manager', 'product_updateSuggest'),
('Product Manager', 'productCategory_create'),
('Product Manager', 'productCategory_delete'),
('Product Manager', 'productCategory_index'),
('Product Manager', 'productCategory_update'),
('Product Manager', 'productCategory_updateListOrderView'),
('Product Manager', 'productCategory_validate'),
('Product Manager', 'productCategory_write'),
('Product Manager', 'productCityCategory_create'),
('Product Manager', 'productCityCategory_delete'),
('Product Manager', 'productCityCategory_index'),
('Product Manager', 'productCityCategory_update'),
('Product Manager', 'productCityCategory_updateListOrderView'),
('Product Manager', 'productCityCategory_validate'),
('Product Manager', 'productCityCategory_write'),
('QA Manager', 'qa_checkbox'),
('QA Manager', 'qa_copy'),
('QA Manager', 'qa_create'),
('QA Manager', 'qa_delete'),
('QA Manager', 'qa_edit'),
('QA Manager', 'qa_index'),
('QA Manager', 'qa_reverseHome'),
('QA Manager', 'qa_reverseNew'),
('QA Manager', 'qa_reverseStatus'),
('QA Manager', 'qa_suggestTitle'),
('QA Manager', 'qa_update'),
('QA Manager', 'qa_updateSuggest'),
('QA Manager', 'qaCategory_create'),
('QA Manager', 'qaCategory_delete'),
('QA Manager', 'qaCategory_index'),
('QA Manager', 'qaCategory_update'),
('QA Manager', 'qaCategory_updateListOrderView'),
('QA Manager', 'qaCategory_validate'),
('QA Manager', 'qaCategory_write'),
('QaAnswer Manager', 'qaAnswer_checkbox'),
('QaAnswer Manager', 'qaAnswer_create'),
('QaAnswer Manager', 'qaAnswer_delete'),
('QaAnswer Manager', 'qaAnswer_edit'),
('QaAnswer Manager', 'qaAnswer_index'),
('QaAnswer Manager', 'qaAnswer_reverseStatus'),
('QaAnswer Manager', 'qaAnswer_suggestTitle'),
('QaAnswer Manager', 'qaAnswer_update'),
('QaAnswer Manager', 'qaAnswer_updateSuggest'),
('Setting Manager', 'setting_edit'),
('Setting Manager', 'setting_index'),
('Setting Manager', 'setting_information'),
('Setting Manager', 'setting_seo'),
('Setting Manager', 'setting_suggestName'),
('Setting Manager', 'setting_updateForm'),
('Share Manager', 'share_checkbox'),
('Share Manager', 'share_copy'),
('Share Manager', 'share_create'),
('Share Manager', 'share_delete'),
('Share Manager', 'share_edit'),
('Share Manager', 'share_index'),
('Share Manager', 'share_reverseHome'),
('Share Manager', 'share_reverseNew'),
('Share Manager', 'share_reverseStatus'),
('Share Manager', 'share_suggestTitle'),
('Share Manager', 'share_update'),
('Share Manager', 'share_updateSuggest'),
('Share Manager', 'shareCategory_create'),
('Share Manager', 'shareCategory_delete'),
('Share Manager', 'shareCategory_index'),
('Share Manager', 'shareCategory_update'),
('Share Manager', 'shareCategory_updateListOrderView'),
('Share Manager', 'shareCategory_validate'),
('Share Manager', 'shareCategory_write'),
('Textlink Manager', 'textlink_autoSave'),
('Textlink Manager', 'textlink_checkbox'),
('Textlink Manager', 'textlink_copy'),
('Textlink Manager', 'textlink_create'),
('Textlink Manager', 'textlink_delete'),
('Textlink Manager', 'textlink_edit'),
('Textlink Manager', 'textlink_index'),
('Textlink Manager', 'textlink_reverseHome'),
('Textlink Manager', 'textlink_reverseNew'),
('Textlink Manager', 'textlink_reverseStatus'),
('Textlink Manager', 'textlink_suggestTitle'),
('Textlink Manager', 'textlink_update'),
('Textlink Manager', 'textlink_updateSuggest'),
('Textlink Manager', 'textLinkCategory_create'),
('Textlink Manager', 'textLinkCategory_delete'),
('Textlink Manager', 'textLinkCategory_index'),
('Textlink Manager', 'textLinkCategory_update'),
('Textlink Manager', 'textLinkCategory_updateListOrderView'),
('Textlink Manager', 'textLinkCategory_validate'),
('Textlink Manager', 'textLinkCategory_write'),
('Video Editor', 'file_upload'),
('Video Editor', 'image_update'),
('Video Editor', 'image_updateInfo'),
('Video Editor', 'image_upload'),
('Video Editor', 'video_checkbox'),
('Video Editor', 'video_copy'),
('Video Editor', 'video_create'),
('Video Editor', 'video_delete'),
('Video Editor', 'video_edit'),
('Video Editor', 'video_index'),
('Video Editor', 'video_reverseHome'),
('Video Editor', 'video_reverseNew'),
('Video Editor', 'video_reverseStatus'),
('Video Editor', 'video_suggestName'),
('Video Editor', 'video_update'),
('Video Editor', 'video_updateSuggest'),
('Video Editor', 'videoCategory_create'),
('Video Editor', 'videoCategory_delete'),
('Video Editor', 'videoCategory_index'),
('Video Editor', 'videoCategory_update'),
('Video Editor', 'videoCategory_updateListOrderView'),
('Video Editor', 'videoCategory_validate'),
('Video Editor', 'videoCategory_write'),
('Video Manager', 'file_upload'),
('Video Manager', 'image_update'),
('Video Manager', 'image_updateInfo'),
('Video Manager', 'image_upload'),
('Video Manager', 'video_checkbox'),
('Video Manager', 'video_copy'),
('Video Manager', 'video_create'),
('Video Manager', 'video_delete'),
('Video Manager', 'video_edit'),
('Video Manager', 'video_index'),
('Video Manager', 'video_reverseHome'),
('Video Manager', 'video_reverseNew'),
('Video Manager', 'video_reverseStatus'),
('Video Manager', 'video_suggestName'),
('Video Manager', 'video_update'),
('Video Manager', 'video_updateSuggest'),
('Video Manager', 'videoCategory_create'),
('Video Manager', 'videoCategory_delete'),
('Video Manager', 'videoCategory_index'),
('Video Manager', 'videoCategory_update'),
('Video Manager', 'videoCategory_updateListOrderView'),
('Video Manager', 'videoCategory_validate'),
('Video Manager', 'videoCategory_write');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pcounter_save`
--

CREATE TABLE `pcounter_save` (
  `save_name` varchar(10) NOT NULL,
  `save_value` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `pcounter_save`
--

INSERT INTO `pcounter_save` (`save_name`, `save_value`) VALUES
('day_time', 2457921),
('max_count', 127),
('max_time', 1423458000),
('counter', 27952),
('yesterday', 75);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pcounter_users`
--

CREATE TABLE `pcounter_users` (
  `user_ip` varchar(39) NOT NULL,
  `user_time` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `pcounter_users`
--

INSERT INTO `pcounter_users` (`user_ip`, `user_time`) VALUES
('\'95.108.181.32\'', 1497547870),
('\'157.55.39.139\'', 1497548074),
('\'35.192.27.26\'', 1497549797),
('\'66.249.71.77\'', 1497551029),
('\'66.249.71.66\'', 1497552797),
('\'66.249.79.133\'', 1497609082),
('\'66.249.71.69\'', 1497586033),
('\'66.249.75.223\'', 1497557664),
('\'66.249.69.66\'', 1497558922),
('\'66.249.71.79\'', 1497559048),
('\'180.76.15.29\'', 1497559732),
('\'66.249.71.81\'', 1497561706),
('\'54.92.234.223\'', 1497565767),
('\'164.132.161.37\'', 1497567225),
('\'164.132.161.40\'', 1497568428),
('\'72.14.199.80\'', 1497569181),
('\'1.54.37.59\'', 1497570347),
('\'180.76.15.22\'', 1497571762),
('\'51.255.71.119\'', 1497620302),
('\'164.132.161.27\'', 1497574713),
('\'123.30.175.140\'', 1497576881),
('\'51.255.65.79\'', 1497578656),
('\'51.255.65.76\'', 1497580522),
('\'40.77.167.130\'', 1497612872),
('\'164.132.161.58\'', 1497582362),
('\'119.17.202.3\'', 1497583676),
('\'217.182.132.82\'', 1497583569),
('\'157.55.39.159\'', 1497584895),
('\'66.249.79.137\'', 1497586031),
('\'164.132.162.188\'', 1497592762),
('\'164.132.161.73\'', 1497586788),
('\'180.76.15.25\'', 1497587346),
('\'113.175.5.15\'', 1497589368),
('\'118.71.225.149\'', 1497590348),
('\'14.188.58.14\'', 1497620712),
('\'66.102.8.208\'', 1497593659),
('\'217.182.132.157\'', 1497593841),
('\'14.175.32.174\'', 1497595571),
('\'164.132.161.10\'', 1497595591),
('\'51.255.65.70\'', 1497595860),
('\'217.182.132.173\'', 1497598887),
('\'217.182.132.61\'', 1497599329),
('\'164.132.161.66\'', 1497600029),
('\'123.30.175.220\'', 1497600314),
('\'123.30.175.219\'', 1497600330),
('\'74.115.214.137\'', 1497602017),
('\'51.255.71.116\'', 1497602867),
('\'217.182.132.18\'', 1497603081),
('\'141.8.132.29\'', 1497605087),
('\'141.8.132.23\'', 1497605087),
('\'95.108.181.8\'', 1497605091),
('\'37.9.113.46\'', 1497605091),
('\'164.132.162.155\'', 1497605448),
('\'35.184.231.47\'', 1497606190),
('\'52.90.11.87\'', 1497606944),
('\'5.196.87.6\'', 1497609760),
('\'217.182.132.63\'', 1497609761),
('\'27.67.128.2\'', 1497612411),
('\'164.132.161.93\'', 1497614262),
('\'164.132.161.21\'', 1497623471),
('\'217.182.132.52\'', 1497618245),
('\'123.30.175.222\'', 1497619078),
('\'123.30.175.221\'', 1497619086),
('\'164.132.161.82\'', 1497622341),
('\'66.249.71.149\'', 1497623299),
('\'164.132.161.61\'', 1497623713),
('\'104.197.160.73\'', 1497625631),
('\'123.30.175.139\'', 1497626115);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin_menu`
--

CREATE TABLE `tbl_admin_menu` (
  `id` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_view` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `other` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin_menu`
--

INSERT INTO `tbl_admin_menu` (`id`, `type`, `name`, `parent_id`, `order_view`, `status`, `other`, `created_by`, `created_time`) VALUES
(1, 1, 'Tin tức', 0, 7, 1, '{\"controller\":\"news\",\"action\":\"index\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1356774504\\\":\\\"1\\\",\\\"1358744747\\\":\\\"1\\\"}\",\"key_url\":\"news_index\"}', 1, 1345279996),
(11, 1, 'Video', 0, 22, 0, '{\"controller\":\"galleryVideo\",\"action\":\"index\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1356429840\\\":\\\"1\\\",\\\"1356774504\\\":\\\"1\\\",\\\"1358180726\\\":\\\"1\\\",\\\"1358744747\\\":\\\"1\\\",\\\"1362043425\\\":\\\"1\\\",\\\"1363338254\\\":\\\"1\\\"}\",\"introimage\":\"\",\"external_link\":\"\",\"key_url\":\"video_index\"}', 1, 1345280314),
(12, 1, 'List Videos', 11, 1, 1, '{\"controller\":\"galleryVideo\",\"action\":\"index\",\"description\":\"\",\"params\":\"\",\"key_url\":\"video_index\"}', 1, 1345280325),
(13, 1, 'Add Video', 11, 2, 1, '{\"controller\":\"galleryVideo\",\"action\":\"create\",\"description\":\"\",\"params\":\"\",\"key_url\":\"videoCategory_index\"}', 1, 1345280346),
(14, 1, 'Banner', 174, 4, 1, '{\"controller\":\"banner\",\"action\":\"index\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1356774504\\\":\\\"1\\\",\\\"1358180726\\\":\\\"1\\\",\\\"1358744747\\\":\\\"1\\\",\\\"1362043425\\\":\\\"1\\\",\\\"1363338254\\\":\\\"1\\\",\\\"1363338279\\\":\\\"1\\\",\\\"1364806154\\\":\\\"1\\\"}\",\"introimage\":\"\",\"external_link\":\"\",\"key_url\":\"banner_index\"}', 1, 1345280381),
(15, 1, 'Advisors', 174, 5, 0, '{\"controller\":\"support\",\"action\":\"index\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1345285483\\\":\\\"1\\\",\\\"1345285504\\\":\\\"1\\\",\\\"1352959953\\\":\\\"1\\\",\\\"1356774504\\\":\\\"1\\\",\\\"1358180726\\\":\\\"1\\\",\\\"1358743322\\\":\\\"1\\\",\\\"1358744747\\\":\\\"1\\\",\\\"1362029761\\\":\\\"1\\\",\\\"1362043425\\\":\\\"1\\\",\\\"1363338254\\\":\\\"1\\\",\\\"1363338279\\\":\\\"1\\\",\\\"1363338341\\\":\\\"1\\\"}\",\"introimage\":\"\",\"external_link\":\"\",\"key_url\":\"supporter_index\"}', 1, 1345281894),
(18, 1, 'Liên hệ', 174, 8, 1, '{\"controller\":\"contact\",\"action\":\"index\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1356774504\\\":\\\"1\\\",\\\"1358180726\\\":\\\"1\\\",\\\"1358744747\\\":\\\"1\\\",\\\"1362043425\\\":\\\"1\\\",\\\"1363338254\\\":\\\"1\\\",\\\"1363338279\\\":\\\"1\\\",\\\"1363338341\\\":\\\"1\\\",\\\"1363338920\\\":\\\"1\\\"}\",\"key_url\":\"contact_index\"}', 1, 1345281941),
(30, 1, 'Các tham số', 0, 21, 1, '{\"controller\":\"setting\",\"action\":\"index\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1345282873\\\":\\\"1\\\"}\",\"key_url\":\"setting_seo\"}', 1, 1345282373),
(31, 1, 'Bình luận', 174, 7, 1, '{\"controller\":\"comment\",\"action\":\"index\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1345284902\\\":\\\"1\\\",\\\"1356774504\\\":\\\"1\\\",\\\"1358180726\\\":\\\"1\\\",\\\"1358744692\\\":\\\"1\\\",\\\"1358744747\\\":\\\"1\\\",\\\"1362043425\\\":\\\"1\\\",\\\"1363338254\\\":\\\"1\\\",\\\"1363338279\\\":\\\"1\\\",\\\"1363338342\\\":\\\"1\\\",\\\"1363338920\\\":\\\"1\\\"}\",\"introimage\":\"\",\"external_link\":\"\",\"key_url\":\"comment_index\"}', 1, 1345284893),
(32, 1, 'Người dùng', 174, 6, 1, '{\"controller\":\"user\",\"action\":\"index\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1345395364\\\":\\\"1\\\",\\\"1345428152\\\":\\\"1\\\",\\\"1345428161\\\":\\\"1\\\",\\\"1356774504\\\":\\\"1\\\",\\\"1358180726\\\":\\\"1\\\",\\\"1358744747\\\":\\\"1\\\",\\\"1362029572\\\":\\\"1\\\",\\\"1362043425\\\":\\\"1\\\",\\\"1363338254\\\":\\\"1\\\",\\\"1363338279\\\":\\\"1\\\",\\\"1363338342\\\":\\\"1\\\",\\\"1363338920\\\":\\\"1\\\",\\\"1364959549\\\":\\\"1\\\"}\",\"introimage\":\"\",\"external_link\":\"\",\"key_url\":\"user_index\"}', 1, 1345395356),
(43, 1, 'Help', 0, 22, 0, '{\"introimage\":\"\",\"controller\":\"help\",\"action\":\"view\",\"external_link\":\"\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1356429737\\\":\\\"1\\\",\\\"1356430828\\\":\\\"1\\\",\\\"1356774504\\\":\\\"1\\\",\\\"1356774739\\\":\\\"1\\\",\\\"1358180726\\\":\\\"1\\\",\\\"1358744747\\\":\\\"1\\\",\\\"1361335207\\\":\\\"1\\\",\\\"1362043425\\\":\\\"1\\\",\\\"1363338254\\\":\\\"1\\\",\\\"1363338279\\\":\\\"1\\\",\\\"1363338342\\\":\\\"1\\\",\\\"1363338920\\\":\\\"1\\\"}\",\"key_url\":\"help_index\"}', 1, 1354875098),
(57, 1, 'Tour', 0, 6, 0, '{\"introimage\":\"\",\"controller\":\"product\",\"action\":\"index\",\"external_link\":\"\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1358180726\\\":\\\"1\\\",\\\"1358744747\\\":\\\"1\\\",\\\"1362034076\\\":\\\"1\\\"}\",\"key_url\":\"product_index\"}', 1, 1358180713),
(58, 1, 'List Tour', 57, 1, 1, '{\"introimage\":\"\",\"controller\":\"product\",\"action\":\"index\",\"external_link\":\"\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1358180794\\\":\\\"1\\\",\\\"1358180800\\\":\\\"1\\\",\\\"1362034146\\\":\\\"1\\\"}\",\"key_url\":\"product_index\"}', 1, 1358180745),
(59, 1, 'Add Tour', 57, 2, 1, '{\"introimage\":\"\",\"controller\":\"product\",\"action\":\"create\",\"external_link\":\"\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1362034155\\\":\\\"1\\\"}\",\"key_url\":\"product_create\"}', 1, 1358180774),
(63, 1, 'Tour Categories', 57, 3, 1, '{\"introimage\":\"\",\"controller\":\"product\",\"action\":\"manager_category\",\"external_link\":\"\",\"description\":\"\",\"params\":\"\",\"modified\":\"{\\\"1362034171\\\":\\\"1\\\"}\",\"key_url\":\"productCategory_index\"}', 1, 1359100069),
(76, 1, 'Menu', 174, 2, 1, '{\"introimage\":\"\",\"controller\":\"menu\",\"action\":\"manager\",\"params\":\"{\\\"type\\\":2}\",\"external_link\":\"\",\"description\":\"\",\"modified\":\"{\\\"1363338254\\\":\\\"1\\\",\\\"1363338279\\\":\\\"1\\\",\\\"1363338342\\\":\\\"1\\\",\\\"1363338920\\\":\\\"1\\\",\\\"1364959642\\\":\\\"1\\\"}\",\"key_url\":\"userMenu_index\"}', 1, 1363337607),
(96, 1, 'Video Categories', 11, 3, 1, '{\"key_url\":\"news_index\"}', 1, 1366615454),
(97, 1, 'Album', 0, 22, 0, '{\"key_url\":\"album_index\"}', 1, 1366615502),
(98, 1, 'List Albums', 97, 1, 1, '{\"key_url\":\"album_index\"}', 1, 1366619434),
(99, 1, 'Add Album', 97, 2, 1, '{\"key_url\":\"album_create\"}', 1, 1366619444),
(100, 1, 'Album Categories', 97, 3, 1, '{\"key_url\":\"albumCategory_index\"}', 1, 1366619473),
(103, 0, 'Order', 0, 20, 0, '{\"key_url\":\"order_index\"}', 1, 1367048676),
(107, 0, 'Trang chủ', 0, 3, 1, '{\"key_url\":\"site_home\"}', 41, 1367470601),
(108, 0, 'Analytics', 174, 1, 1, '{\"key_url\":\"google_analytics\"}', 41, 1367471156),
(110, 0, 'Tham số SEO', 30, 1, 1, '{\"key_url\":\"setting_seo\"}', 0, 1367651961),
(111, 0, 'Thông tin liên hệ', 30, 1, 1, '{\"key_url\":\"setting_information\"}', 0, 1367651982),
(112, 0, 'Video', 175, 1, 1, '{\"key_url\":\"clip_index\"}', 0, 1368501921),
(113, 0, 'List Videos', 112, 1, 1, '{\"key_url\":\"clip_index\"}', 0, 1368501932),
(114, 0, 'Add Video', 112, 2, 1, '{\"key_url\":\"clip_create\"}', 0, 1368501947),
(115, 0, 'Video Categories', 112, 1, 1, '{\"key_url\":\"clipCategory_index\"}', 0, 1368501962),
(116, 0, 'FQAs', 0, 11, 0, '{\"key_url\":\"qa_index\"}', 0, 1369277455),
(117, 0, 'List FQAs', 116, 1, 1, '{\"key_url\":\"qa_index\"}', 0, 1369277744),
(118, 0, 'Add FQA', 116, 1, 1, '{\"key_url\":\"qa_create\"}', 0, 1369277760),
(119, 0, 'Share', 0, 22, 0, '{\"key_url\":\"share_index\"}', 0, 1369279184),
(120, 0, 'List Shares', 119, 1, 1, '{\"key_url\":\"share_index\"}', 0, 1369279204),
(121, 0, 'Add Share', 119, 1, 1, '{\"key_url\":\"share_create\"}', 0, 1369279215),
(123, 0, 'Danh sách tin tức', 1, 3, 1, '{\"key_url\":\"news_index\"}', 0, 1371797338),
(124, 0, 'Thêm tin tức mới', 1, 3, 1, '{\"key_url\":\"news_create\"}', 0, 1371797350),
(125, 0, 'Danh mục tin tức', 1, 1, 1, '{\"key_url\":\"newsCategory_index\"}', 0, 1371797363),
(146, 0, 'City', 0, 19, 0, '{\"key_url\":\"city_index\"}', 0, 1371891835),
(147, 0, 'Recruitment', 0, 17, 0, '{\"key_url\":\"image_index\"}', 0, 1372064406),
(148, 0, 'List Recruitment', 147, 1, 1, '{\"key_url\":\"image_index\"}', 0, 1372127454),
(149, 0, 'Add Recruitment', 147, 1, 1, '{\"key_url\":\"image_index\"}', 0, 1372127468),
(150, 0, 'Recruitment Categories', 147, 3, 1, '{\"key_url\":\"image_index\"}', 0, 1372127481),
(151, 0, 'Trình dược viên', 0, 10, 0, '{\"key_url\":\"seller_index\"}', 0, 1372129402),
(152, 0, 'Danh mục trình dược viên', 151, 2, 1, '{\"key_url\":\"sellerCategory_index\"}', 0, 1372129438),
(153, 0, 'Thêm mới trình dược viên', 151, 1, 1, '{\"key_url\":\"seller_create\"}', 0, 1372129450),
(154, 0, 'Danh sách trình dược viên', 151, 0, 1, '{\"key_url\":\"seller_index\"}', 0, 1372129463),
(155, 0, 'Store', 0, 4, 0, '{\"key_url\":\"image_index\"}', 0, 1372219182),
(156, 0, 'List Store', 155, 1, 1, '{\"key_url\":\"image_index\"}', 0, 1372219197),
(157, 0, 'Add Store', 155, 1, 1, '{\"key_url\":\"image_index\"}', 0, 1372219209),
(158, 0, 'List Cities', 146, 1, 1, '{\"key_url\":\"city_index\"}', 0, 1372995083),
(159, 0, 'Add City', 146, 1, 1, '{\"key_url\":\"city_create\"}', 0, 1372995100),
(160, 0, 'Pictures', 0, 14, 0, '{\"key_url\":\"image_index\"}', 0, 1375417733),
(162, 0, 'Introduction', 0, 12, 0, '{\"key_url\":\"intro_index\"}', 0, 1378698718),
(163, 0, 'Introduction categories', 162, 2, 1, '{\"key_url\":\"introCategory_index\"}', 0, 1378698761),
(164, 0, 'Add introduciton', 162, 1, 1, '{\"key_url\":\"intro_create\"}', 0, 1378698784),
(165, 0, 'Catalog', 0, 2, 0, '{\"key_url\":\"document_index\"}', 0, 1379931316),
(166, 0, 'Catalog Categories', 165, 1, 1, '{\"key_url\":\"documentCagegory_index\"}', 0, 1379931404),
(167, 0, 'Add Catalog', 165, 1, 1, '{\"key_url\":\"document_create\"}', 0, 1379931424),
(171, 0, 'Advisors', 0, 9, 0, '{\"key_url\":\"advisor_index\"}', 0, 1383558688),
(172, 0, 'Add Advisor', 171, 1, 1, '{\"key_url\":\"advisor_create\"}', 0, 1383558714),
(173, 0, 'Customers', 174, 3, 0, '{\"key_url\":\"customer_index\"}', 0, 1384144899),
(174, 0, 'Khác', 0, 21, 1, '{\"key_url\":\"image_index\"}', 0, 1384145014),
(175, 0, 'Media', 0, 13, 0, '{\"key_url\":\"video_index\"}', 0, 1384225078),
(176, 0, 'Audio', 175, 2, 1, '{\"key_url\":\"audio_index\"}', 0, 1384225171),
(177, 0, 'List Audios', 176, 1, 1, '{\"key_url\":\"audio_index\"}', 0, 1384225193),
(178, 0, 'Add Audio', 176, 1, 1, '{\"key_url\":\"audio_create\"}', 0, 1384225209),
(179, 0, 'Audio Categories', 176, 3, 1, '{\"key_url\":\"audioCategory_index\"}', 0, 1384225228),
(180, 0, 'Partner', 0, 18, 0, '{\"key_url\":\"partner_index\"}', 0, 1387531921),
(181, 0, 'Add Partner', 180, 1, 1, '{\"key_url\":\"partner_create\"}', 0, 1387531964),
(182, 0, 'Partner Categories', 180, 1, 1, '{\"key_url\":\"partnerCategory_index\"}', 0, 1387531989),
(183, 0, 'Provinces/Cities', 57, 4, 1, '{\"key_url\":\"productCityCategory_index\"}', 0, 1388726706),
(184, 0, 'Sản phẩm', 0, 5, 1, '{\"key_url\":\"product_index\"}', 0, 1410168246),
(185, 0, 'Danh mục sản phẩm', 184, 2, 1, '{\"key_url\":\"productCategory_index\"}', 0, 1410168329),
(186, 0, 'Danh sách sản phẩm', 184, 1, 1, '{\"key_url\":\"product_index\"}', 0, 1410168357),
(187, 0, 'Thêm sản phẩm', 184, 1, 1, '{\"key_url\":\"product_create\"}', 0, 1410168387),
(188, 0, 'Supporter', 174, 9, 0, '{\"key_url\":\"supporter_index\"}', 0, 1410234615);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_advisor`
--

CREATE TABLE `tbl_advisor` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_album`
--

CREATE TABLE `tbl_album` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_album`
--

INSERT INTO `tbl_album` (`id`, `language`, `status`, `name`, `cat_id`, `home`, `new`, `order_view`, `other`, `visits`, `created_by`, `created_time`) VALUES
(1, 'vi', 1, 'Du lịch Phố Cổ Hà Nội', 13, 0, 0, 1, '{\"meta_title\":\"Du l\\u1ecbch Ph\\u1ed1 C\\u1ed5 H\\u00e0 N\\u1ed9i\",\"meta_keyword\":\"Du l\\u1ecbch Ph\\u1ed1 C\\u1ed5 H\\u00e0 N\\u1ed9i\",\"meta_description\":\"Du l\\u1ecbch Ph\\u1ed1 C\\u1ed5 H\\u00e0 N\\u1ed9i\"}', 0, 1, 1387354353);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_album_image`
--

CREATE TABLE `tbl_album_image` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_album_image`
--

INSERT INTO `tbl_album_image` (`id`, `album_id`, `image_id`) VALUES
(1, 1, 25),
(2, 1, 26),
(3, 1, 27),
(4, 1, 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_audio`
--

CREATE TABLE `tbl_audio` (
  `id` int(11) NOT NULL,
  `language` char(8) NOT NULL DEFAULT 'vi',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `file_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) UNSIGNED NOT NULL,
  `order_view` int(11) NOT NULL DEFAULT '1',
  `home` int(11) NOT NULL DEFAULT '0',
  `new` int(11) NOT NULL DEFAULT '0',
  `other` varchar(1024) NOT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_audio`
--

INSERT INTO `tbl_audio` (`id`, `language`, `status`, `name`, `file_id`, `cat_id`, `introimage_id`, `order_view`, `home`, `new`, `other`, `visits`, `created_by`, `created_time`) VALUES
(1, 'vi', 1, ' Bonjour Vietnam', 31, 12, 30, 1, 0, 0, '{\"meta_title\":\" Bonjour Vietnam\",\"meta_keyword\":\" Bonjour Vietnam\",\"meta_description\":\" Bonjour Vietnam\"}', 0, 1, 1387339121);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `language` char(8) NOT NULL DEFAULT 'vi',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `cat` tinyint(4) NOT NULL,
  `image_id` int(11) NOT NULL,
  `order_view` int(11) NOT NULL DEFAULT '1',
  `other` varchar(1024) NOT NULL,
  `created_time` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `language`, `status`, `name`, `cat`, `image_id`, `order_view`, `other`, `created_time`, `created_by`, `clicks`) VALUES
(1, 'vi', 1, 'Chúng tôi luôn mang lại cho bạn những điều tốt nhất', 0, 363, 0, '{\"slogan\":\"\",\"url\":\"#\",\"description\":\"Phao nhua\"}', 1385625187, 1, 0),
(3, 'vi', 1, 'Công ty TNHH Châu Hưng', 4, 7, 0, '{\"url\":\"#\",\"description\":\"\"}', 1385635920, 1, 0),
(4, 'vi', 1, 'Công ty TNHH Dược phẩm Á Âu', 4, 8, 0, '{\"url\":\"#\",\"description\":\"\"}', 1385635940, 1, 0),
(5, 'vi', 1, 'Công ty IMC', 4, 9, 0, '{\"url\":\"#\",\"description\":\"\"}', 1385635964, 1, 0),
(6, 'vi', 0, 'Sàn gỗ việt phát', 7, 372, 0, '{\"url\":\"http:\\/\\/sangovietphat.com\",\"description\":\"\"}', 1410230400, 1, 0),
(7, 'vi', 1, 'Banner đối tác', 4, 441, 0, '{\"url\":\"#\",\"description\":\"\"}', 1410247127, 1, 0),
(8, 'vi', 1, 'Sàn gỗ nhập khẩu', 9, 449, 0, '{\"url\":\"#\",\"description\":\"\"}', 1410767101, 1, 0),
(9, 'vi', 1, 'Khuyến mãi lớn', 9, 451, 0, '{\"url\":\"#\",\"description\":\"\"}', 1410767142, 1, 0),
(12, 'vi', 1, 'Thái Green - Sàn gỗ nhập khẩu từ Thái Lan', 10, 503, 0, '{\"url\":\"http:\\/\\/sangovietphat.com\\/nhom-san-pham\\/1\\/thaigreen\",\"description\":\"Th\\u00e1i Green - S\\u00e0n g\\u1ed7 nh\\u1eadp kh\\u1ea9u t\\u1eeb Th\\u00e1i Lan\"}', 1429939677, 1, 0),
(16, 'vi', 1, 'Khuyến mãi lớn_copy', 9, 455, 1, '{\"slogan\":null,\"url\":\"#\",\"description\":\"\"}', 1491558102, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `other` text NOT NULL,
  `created_time` int(11) NOT NULL,
  `plan_date` int(11) UNSIGNED NOT NULL,
  `plan_month` int(11) UNSIGNED NOT NULL,
  `places` varchar(256) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` int(64) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `nationality` varchar(64) NOT NULL,
  `address` varchar(256) NOT NULL,
  `country` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `allow_call` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `language` char(8) NOT NULL,
  `type` tinyint(3) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_view` tinyint(4) NOT NULL DEFAULT '1',
  `other` mediumtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `language`, `type`, `status`, `name`, `alias`, `parent_id`, `order_view`, `other`, `created_by`, `created_time`) VALUES
(1, 'vi', 4, 1, 'ThaiGreen', 'thaigreen', 0, 2, '{\"introimage_id\":\"395\",\"meta_title\":\"S\\u00e0n g\\u1ed7 ThaiGreen\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 ThaiGreen\",\"meta_description\":\"S\\u00e0n g\\u1ed7 ThaiGreen\",\"description\":\"<p>S&agrave;n g\\u1ed7 ThaiGreen<\\/p>\",\"extra\":\"\",\"other_field_title\":\"\",\"other_field_content\":\"\",\"boximage_id\":\"396\"}', 1, 1385630259),
(2, 'vi', 3, 1, 'Tin tức', 'tin-tuc', 0, 2, '{\"meta_title\":\"H\\u01b0\\u01a1ng d\\u1eabn ch\\u1ecdn s\\u00e0n g\\u1ed7\",\"meta_keyword\":\"H\\u01b0\\u1edbng d\\u1eabn l\\u1eafp \\u0111\\u1eb7t s\\u00e0n g\\u1ed7\",\"meta_description\":\"Tin t\\u1ee9c\"}', 1, 1385632788),
(3, 'vi', 3, 1, 'Giới thiệu', 'gioi-thieu', 0, 1, '{\"meta_title\":\"Gi\\u1edbi thi\\u1ec7u\",\"meta_keyword\":\"Gi\\u1edbi thi\\u1ec7u\",\"meta_description\":\"Gi\\u1edbi thi\\u1ec7u\"}', 1, 1385632797),
(4, 'vi', 5, 1, 'Quảng cáo', '', 0, 1, '{\"meta_title\":\"Qu\\u1ea3ng c\\u00e1o\",\"meta_keyword\":\"Qu\\u1ea3ng c\\u00e1o\",\"meta_description\":\"Qu\\u1ea3ng c\\u00e1o\"}', 1, 1385981457),
(5, 'vi', 4, 1, 'Sophia', 'sophia', 0, 3, '{\"introimage_id\":\"41\",\"meta_title\":\"Sophia\",\"meta_keyword\":\"Sophia\",\"meta_description\":\"Sophia\",\"description\":\"\",\"extra\":\"\",\"boximage_id\":\"55\"}', 1, 1386837744),
(8, 'vi', 11, 1, 'Giới thiệu website', '', 0, 2, '{\"meta_title\":\"Gi\\u1edbi thi\\u1ec7u website\",\"meta_keyword\":\"Gi\\u1edbi thi\\u1ec7u website\",\"meta_description\":\"Gi\\u1edbi thi\\u1ec7u website\"}', 1, 1387334094),
(9, 'vi', 3, 1, 'Hệ thống ', 'he-thong-', 0, 3, '{\"meta_title\":\"H\\u1ec7 th\\u1ed1ng\",\"meta_keyword\":\"H\\u1ec7 th\\u1ed1ng\",\"meta_description\":\"H\\u1ec7 th\\u1ed1ng\"}', 1, 1387335483),
(10, 'vi', 3, 1, 'Thi công', 'thi-cong', 0, 4, '{\"meta_title\":\"D\\u1ef1 \\u00e1n\",\"meta_keyword\":\"D\\u1ef1 \\u00e1n\",\"meta_description\":\"D\\u1ef1 \\u00e1n\"}', 1, 1387335658),
(12, 'vi', 6, 1, 'Nhạc nền', '', 0, 1, '{\"meta_title\":\"Nh\\u1ea1c n\\u1ec1n\",\"meta_keyword\":\"Nh\\u1ea1c n\\u1ec1n\",\"meta_description\":\"Nh\\u1ea1c n\\u1ec1n\"}', 1, 1387338572),
(13, 'vi', 1, 1, 'Travel', '', 0, 1, '{\"type_view\":\"2\",\"introimage_id\":\"\",\"meta_title\":\"Travel\",\"meta_keyword\":\"Travel\",\"meta_description\":\"Travel\"}', 1, 1387354077),
(16, 'vi', 11, 1, 'Giới thiệu tour', '', 0, 2, '{\"meta_title\":\"Gi\\u1edbi thi\\u1ec7u tour\",\"meta_keyword\":\"Gi\\u1edbi thi\\u1ec7u tour\",\"meta_description\":\"Gi\\u1edbi thi\\u1ec7u tour\"}', 1, 1387525080),
(17, 'vi', 12, 1, 'Cá nhân', '', 0, 1, '{\"meta_title\":\"C\\u00e1 nh\\u00e2n\",\"meta_keyword\":\"C\\u00e1 nh\\u00e2n\",\"meta_description\":\"C\\u00e1 nh\\u00e2n\"}', 1, 1387531305),
(18, 'vi', 12, 1, 'Doanh nghiệp', '', 0, 2, '{\"meta_title\":\"Doanh nghi\\u1ec7p\",\"meta_keyword\":\"Doanh nghi\\u1ec7p\",\"meta_description\":\"Doanh nghi\\u1ec7p\"}', 1, 1387531313),
(19, 'vi', 12, 1, 'Nhà nước', '', 0, 3, '{\"meta_title\":\"Nh\\u00e0 n\\u01b0\\u1edbc\",\"meta_keyword\":\"Nh\\u00e0 n\\u01b0\\u1edbc\",\"meta_description\":\"Nh\\u00e0 n\\u01b0\\u1edbc\"}', 1, 1387531319),
(21, 'vi', 13, 1, 'Hanoi', 'hanoi', 0, 1, '{\"introimage_id\":\"\",\"meta_title\":\"Hanoi\",\"meta_keyword\":\"Hanoi\",\"meta_description\":\"Hanoi\",\"description\":\"<p><strong>Gi\\u1edbi thi\\u1ec7u v\\u1ec1 H&agrave; N\\u1ed9i<\\/strong><\\/p>\",\"extra\":\"<p>Ph&aacute;t tri\\u1ec3n \\u0111\\u1ecba ph\\u01b0\\u01a1ng \\u1edf H&agrave; N\\u1ed9i<\\/p>\"}', 1, 1388473952),
(23, 'vi', 13, 1, 'La baie d’Halong', 'la-baie-dhalong', 0, 3, '{\"introimage_id\":\"\",\"meta_title\":\"La baie d\\u2019Halong\",\"meta_keyword\":\"La baie d\\u2019Halong\",\"meta_description\":\"La baie d\\u2019Halong\",\"description\":\"<div>\\r\\n<table cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"left\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"padding-top: 0cm; padding-right: 7.05pt; padding-bottom: 0cm; padding-left: 7.05pt;\\\" align=\\\"left\\\" valign=\\\"top\\\">\\r\\n<p><span lang=\\\"FR\\\"><span style=\\\"color: windowtext;\\\">La baie d&rsquo;Halong<\\/span><\\/span><\\/p>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\",\"extra\":\"<div>\\r\\n<table cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"left\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"padding-top: 0cm; padding-right: 7.05pt; padding-bottom: 0cm; padding-left: 7.05pt;\\\" align=\\\"left\\\" valign=\\\"top\\\">\\r\\n<p><span lang=\\\"FR\\\"><span style=\\\"color: windowtext;\\\">La baie d&rsquo;Halong<\\/span><\\/span><\\/p>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\"}', 1, 1388473997),
(24, 'vi', 13, 1, 'Tam Coc ou la baie d’Halong terrestre', 'tam-coc-ou-la-baie-dhalong-terrestre', 0, 1, '{\"introimage_id\":\"\",\"meta_title\":\"Tam Coc ou la baie d\\u2019Halong terrestre\",\"meta_keyword\":\"Tam Coc ou la baie d\\u2019Halong terrestre\",\"meta_description\":\"Tam Coc ou la baie d\\u2019Halong terrestre\",\"description\":\"<div>\\r\\n<table cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"left\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"padding-top: 0cm; padding-right: 7.05pt; padding-bottom: 0cm; padding-left: 7.05pt;\\\" align=\\\"left\\\" valign=\\\"top\\\">\\r\\n<p><span lang=\\\"FR\\\"><span style=\\\"color: windowtext;\\\">Tam Coc ou la baie d&rsquo;Halong terrestre<\\/span><\\/span><\\/p>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\",\"extra\":\"<div>\\r\\n<table cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"left\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"padding-top: 0cm; padding-right: 7.05pt; padding-bottom: 0cm; padding-left: 7.05pt;\\\" align=\\\"left\\\" valign=\\\"top\\\">\\r\\n<p><span lang=\\\"FR\\\"><span style=\\\"color: windowtext;\\\">Tam Coc ou la baie d&rsquo;Halong terrestre<\\/span><\\/span><\\/p>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\"}', 1, 1388474078),
(25, 'vi', 13, 1, 'Mai chau', 'mai-chau', 0, 4, '{\"introimage_id\":\"\",\"meta_title\":\"Mai chau\",\"meta_keyword\":\"Mai chau\",\"meta_description\":\"Mai chau\",\"description\":\"<p>Mai chau<\\/p>\",\"extra\":\"<p>Mai chau<\\/p>\"}', 1, 1388727508),
(26, 'vi', 13, 1, 'Ha Giang', 'ha-giang', 0, 5, '{\"introimage_id\":\"\",\"meta_title\":\"Ha Giang\",\"meta_keyword\":\"Ha Giang\",\"meta_description\":\"Ha Giang\",\"description\":\"<p>Ha Giang<\\/p>\",\"extra\":\"\"}', 1, 1388727544),
(27, 'vi', 13, 1, 'Sapa', 'sapa', 0, 6, '{\"introimage_id\":\"\",\"meta_title\":\"Sapa\",\"meta_keyword\":\"Sapa\",\"meta_description\":\"Sapa\",\"description\":\"<p>Sapa<\\/p>\",\"extra\":\"<p>Sapa<\\/p>\"}', 1, 1388727566),
(28, 'vi', 13, 1, 'Bac Ha', 'bac-ha', 0, 7, '{\"introimage_id\":\"\",\"meta_title\":\"Bac Ha\",\"meta_keyword\":\"Bac Ha\",\"meta_description\":\"Bac Ha\",\"description\":\"<p>Bac Ha<\\/p>\",\"extra\":\"\"}', 1, 1388727634),
(29, 'vi', 13, 1, 'Lac de Ba Be', 'lac-de-ba-be', 0, 8, '{\"introimage_id\":\"\",\"meta_title\":\"Lac de Ba Be\",\"meta_keyword\":\"Lac de Ba Be\",\"meta_description\":\"Lac de Ba Be\",\"description\":\"<p>Lac de Ba Be<\\/p>\",\"extra\":\"<p>Lac de Ba Be<\\/p>\"}', 1, 1388727652),
(30, 'vi', 13, 1, 'Cao Bang', 'cao-bang', 0, 9, '{\"introimage_id\":\"\",\"meta_title\":\"Cao Bang\",\"meta_keyword\":\"Cao Bang\",\"meta_description\":\"Cao Bang\",\"description\":\"<p>Cao Bang<\\/p>\",\"extra\":\"<p>Cao Bang<\\/p>\"}', 1, 1388727670),
(31, 'vi', 13, 1, 'Hué', 'hue', 0, 10, '{\"introimage_id\":\"\",\"meta_title\":\"Hu\\u00e9\",\"meta_keyword\":\"Hu\\u00e9\",\"meta_description\":\"Hu\\u00e9\",\"description\":\"<p>Hu&eacute;<\\/p>\",\"extra\":\"<p>Hu&eacute;<\\/p>\"}', 1, 1388730047),
(32, 'vi', 13, 1, 'Hoi An', 'hoi-an', 0, 11, '{\"introimage_id\":\"\",\"meta_title\":\"Hoi An\",\"meta_keyword\":\"Hoi An\",\"meta_description\":\"Hoi An\",\"description\":\"<p>Hoi An<\\/p>\",\"extra\":\"<p>Hoi An<\\/p>\"}', 1, 1388730062),
(33, 'vi', 13, 1, 'Nha Trang', 'nha-trang', 0, 12, '{\"introimage_id\":\"\",\"meta_title\":\"Nha Trang\",\"meta_keyword\":\"Nha Trang\",\"meta_description\":\"Nha Trang\",\"description\":\"<p>Nha Trang<\\/p>\",\"extra\":\"<p>Nha Trang<\\/p>\"}', 1, 1388730078),
(34, 'vi', 13, 1, 'Dalat', 'dalat', 0, 13, '{\"introimage_id\":\"\",\"meta_title\":\"Dalat\",\"meta_keyword\":\"Dalat\",\"meta_description\":\"Dalat\",\"description\":\"<p>Dalat<\\/p>\",\"extra\":\"<p>Dalat<\\/p>\"}', 1, 1388730113),
(35, 'vi', 13, 1, 'My Son', 'my-son', 0, 14, '{\"introimage_id\":\"\",\"meta_title\":\"My Son\",\"meta_keyword\":\"My Son\",\"meta_description\":\"My Son\",\"description\":\"<p>My Son<\\/p>\",\"extra\":\"\"}', 1, 1388730125),
(36, 'vi', 13, 1, 'Danang', 'danang', 0, 15, '{\"introimage_id\":\"\",\"meta_title\":\"Danang\",\"meta_keyword\":\"Danang\",\"meta_description\":\"Danang\",\"description\":\"<p>Danang<\\/p>\",\"extra\":\"<p>Danang<\\/p>\"}', 1, 1388730140),
(37, 'vi', 13, 1, 'Ile de Cu Lao Cham', 'ile-de-cu-lao-cham', 0, 16, '{\"introimage_id\":\"\",\"meta_title\":\"Ile de Cu Lao Cham\",\"meta_keyword\":\"Ile de Cu Lao Cham\",\"meta_description\":\"Ile de Cu Lao Cham\",\"description\":\"<p>Ile de Cu Lao Cham<\\/p>\",\"extra\":\"<p>Ile de Cu Lao Cham<\\/p>\"}', 1, 1388730153),
(38, 'vi', 13, 1, 'Ho Chi Minh ville', 'ho-chi-minh-ville', 0, 17, '{\"introimage_id\":\"\",\"meta_title\":\"Ho Chi Minh ville\",\"meta_keyword\":\"Ho Chi Minh ville\",\"meta_description\":\"Ho Chi Minh ville\",\"description\":\"<p>Ho Chi Minh ville<\\/p>\",\"extra\":\"<p>Ho Chi Minh ville<\\/p>\"}', 1, 1388730180),
(39, 'vi', 13, 1, 'Mui Ne', 'mui-ne', 0, 18, '{\"introimage_id\":\"\",\"meta_title\":\"Mui Ne\",\"meta_keyword\":\"Mui Ne\",\"meta_description\":\"Mui Ne\",\"description\":\"<p>Mui Ne<\\/p>\",\"extra\":\"\"}', 1, 1388730236),
(40, 'vi', 13, 1, 'Phu Quoc', 'phu-quoc', 0, 19, '{\"introimage_id\":\"\",\"meta_title\":\"Phu Quoc\",\"meta_keyword\":\"Phu Quoc\",\"meta_description\":\"Phu Quoc\",\"description\":\"\",\"extra\":\"\"}', 1, 1388730248),
(41, 'vi', 13, 1, 'Can Tho', 'can-tho', 0, 20, '{\"introimage_id\":\"\",\"meta_title\":\"Can Tho\",\"meta_keyword\":\"Can Tho\",\"meta_description\":\"Can Tho\",\"description\":\"\",\"extra\":\"\"}', 1, 1388730258),
(42, 'vi', 13, 1, 'Ben Tre', 'ben-tre', 0, 21, '{\"introimage_id\":\"\",\"meta_title\":\"Ben Tre\",\"meta_keyword\":\"Ben Tre\",\"meta_description\":\"Ben Tre\",\"description\":\"\",\"extra\":\"\"}', 1, 1388730269),
(43, 'vi', 13, 1, 'Le delta du Mékong', 'le-delta-du-mekong', 0, 22, '{\"introimage_id\":\"\",\"meta_title\":\"Le delta du M\\u00e9kong\",\"meta_keyword\":\"Le delta du M\\u00e9kong\",\"meta_description\":\"Le delta du M\\u00e9kong\",\"description\":\"\",\"extra\":\"\"}', 1, 1388730281),
(44, 'vi', 13, 1, 'Con Dao', 'con-dao', 0, 23, '{\"introimage_id\":\"\",\"meta_title\":\"Con Dao\",\"meta_keyword\":\"Con Dao\",\"meta_description\":\"Con Dao\",\"description\":\"<p>Con Dao<\\/p>\",\"extra\":\"\"}', 1, 1388730313),
(45, 'vi', 13, 1, 'Cu Chi', 'cu-chi', 0, 24, '{\"introimage_id\":\"\",\"meta_title\":\"Cu Chi\",\"meta_keyword\":\"Cu Chi\",\"meta_description\":\"Cu Chi\",\"description\":\"<p>Cu Chi<\\/p>\",\"extra\":\"\"}', 1, 1388730325),
(46, 'vi', 11, 1, 'Chính sách', '', 0, 3, '{\"meta_title\":\"Ch\\u00ednh s\\u00e1ch\",\"meta_keyword\":\"Ch\\u00ednh s\\u00e1ch\",\"meta_description\":\"Ch\\u00ednh s\\u00e1ch\"}', 1, 1388731142),
(47, 'vi', 4, 1, 'Harotex', 'harotex', 0, 4, '{\"introimage_id\":\"42\",\"meta_title\":\"Harotex\",\"meta_keyword\":\"Harotex\",\"meta_description\":\"Harotex\",\"description\":\"\",\"extra\":\"\",\"boximage_id\":\"56\"}', 1, 1410166725),
(48, 'vi', 4, 1, 'Sàn gỗ Tây Ban Nha FAUS FLOOR ', 'san-go-tay-ban-nha-faus-floor-', 0, 1, '{\"introimage_id\":\"418\",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS FLOOR\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha \\r\\nS\\u00e0n g\\u1ed7 FAUS FLOOR \\r\\nS\\u00e0n g\\u1ed7 Made in Spain \\r\\nS\\u00e0n g\\u1ed7 Ch\\u00e2u \\u00c2u \\r\\nS\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p\\r\\nS\\u00e0n g\\u1ed7 cao c\\u1ea5p\",\"meta_description\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS FLOOR\",\"description\":\"\",\"extra\":\"\",\"boximage_id\":\"424\"}', 1, 1410166765),
(49, 'vi', 3, 1, 'Bán hàng tại kho', 'ban-hang-tai-kho', 0, 5, '{\"meta_title\":\"Kho h\\u00e0ng\",\"meta_keyword\":\"Kho h\\u00e0ng\",\"meta_description\":\"Kho h\\u00e0ng\"}', 1, 1410245087),
(50, 'vi', 4, 0, 'Sàn gỗ ThaiGreen 12mm', 'san-go-thaigreen-12mm', 1, 1, '{\"introimage_id\":\"397\",\"boximage_id\":\"398\",\"meta_title\":\"S\\u00e0n g\\u1ed7 ThaiGreen 12mm\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 ThaiGreen 12mm\",\"meta_description\":\"S\\u00e0n g\\u1ed7 ThaiGreen 12mm\",\"description\":\"<p>S&agrave;n g\\u1ed7 ThaiGreen 12mm<\\/p>\",\"extra\":\"\"}', 1, 1433926187);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `language` char(8) NOT NULL,
  `type` tinyint(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `name` varchar(256) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_view` tinyint(4) NOT NULL,
  `other` varchar(1024) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `language`, `type`, `status`, `name`, `alias`, `parent_id`, `order_view`, `other`, `created_by`, `created_time`) VALUES
(21, 'vi', 0, 1, 'Hà Nội', 'ha-noi', 0, 64, '[]', 1, 1372926400),
(22, 'vi', 0, 1, 'TP. Hồ Chí Minh', 'tp-ho-chi-minh', 0, 64, '[]', 1, 1372926400),
(23, 'vi', 0, 1, 'An Giang', 'an-giang', 0, 63, '[]', 1, 1372926400),
(24, 'vi', 0, 1, 'Bắc Giang', 'bac-giang', 0, 62, '[]', 1, 1372926400),
(25, 'vi', 0, 1, 'Bắc Kạn', 'bac-kan', 0, 61, '[]', 1, 1372926401),
(26, 'vi', 0, 1, 'Bạc Liêu', 'bac-lieu', 0, 60, '[]', 1, 1372926401),
(27, 'vi', 0, 1, 'Bắc Ninh', 'bac-ninh', 0, 59, '[]', 1, 1372926401),
(28, 'vi', 0, 1, 'Bà Rịa - Vũng Tàu', 'ba-ria-vung-tau', 0, 58, '{\"cost\":\"\"}', 1, 1372926401),
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
(691, 'vi', 1, 1, 'Huyện Trà Cú', '', 73, 7, '[]', 1, 1372928539),
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
(734, 'vi', 1, 1, 'Quận Liên Chiểu', '', 78, 6, '[]', 1, 1372928605);
INSERT INTO `tbl_city` (`id`, `language`, `type`, `status`, `name`, `alias`, `parent_id`, `order_view`, `other`, `created_by`, `created_time`) VALUES
(735, 'vi', 1, 1, 'Quận Hải Châu', '', 78, 5, '[]', 1, 1372928605),
(736, 'vi', 1, 1, 'Quận Cẩm Lệ', '', 78, 4, '[]', 1, 1372928605),
(737, 'vi', 1, 1, 'Quận 3', '', 78, 3, '[]', 1, 1372928605),
(738, 'vi', 1, 1, 'Huyện Hoàng Sa', '', 78, 2, '[]', 1, 1372928605),
(739, 'vi', 1, 1, 'Huyện Hòa Vang', '', 78, 1, '[]', 1, 1372928606),
(740, 'vi', 1, 1, 'Thị Xã Buôn Hồ', '', 79, 15, '[]', 1, 1372928619),
(741, 'vi', 1, 1, 'Thành Phố Buôn Ma Thuột', '', 79, 14, '[]', 1, 1372928619),
(742, 'vi', 1, 1, 'Huyện M\'Đrắk', '', 79, 13, '[]', 1, 1372928619),
(743, 'vi', 1, 1, 'Huyện Lắk', '', 79, 12, '[]', 1, 1372928619),
(744, 'vi', 1, 1, 'Huyện Krông Pắk', '', 79, 11, '[]', 1, 1372928619),
(745, 'vi', 1, 1, 'Huyện Krông Năng', '', 79, 10, '[]', 1, 1372928620),
(746, 'vi', 1, 1, 'Huyện Krông Búk', '', 79, 9, '[]', 1, 1372928620),
(747, 'vi', 1, 1, 'Huyện Krông Bông', '', 79, 8, '[]', 1, 1372928620),
(748, 'vi', 1, 1, 'Huyện Krông A Na', '', 79, 7, '[]', 1, 1372928620),
(749, 'vi', 1, 1, 'Huyện Ea Súp', '', 79, 6, '[]', 1, 1372928621),
(750, 'vi', 1, 1, 'Huyện Ea Kar', '', 79, 5, '[]', 1, 1372928621),
(751, 'vi', 1, 1, 'Huyện Ea H\'leo', '', 79, 4, '[]', 1, 1372928622),
(752, 'vi', 1, 1, 'Huyện Cư M\'gar', '', 79, 3, '[]', 1, 1372928622),
(753, 'vi', 1, 1, 'Huyện Cư Kuin', '', 79, 2, '[]', 1, 1372928622),
(754, 'vi', 1, 1, 'Huyện Buôn đôn', '', 79, 1, '[]', 1, 1372928623),
(755, 'vi', 1, 1, 'Thị Xã Gia Nghĩa', '', 80, 8, '[]', 1, 1372928629),
(756, 'vi', 1, 1, 'Huyện Tuy đức', '', 80, 7, '[]', 1, 1372928630),
(757, 'vi', 1, 1, 'Huyện Krông Nô', '', 80, 6, '[]', 1, 1372928630),
(758, 'vi', 1, 1, 'Huyện Đắk Song', '', 80, 5, '[]', 1, 1372928630),
(759, 'vi', 1, 1, 'Huyện Đăk R\'lấp', '', 80, 4, '[]', 1, 1372928630),
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
(795, 'vi', 0, 1, 'Nam Định', '', 0, 0, '{\"cost\":\"\"}', 1, 1373860921);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
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
  `vote` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `language`, `user_id`, `name`, `phone`, `email`, `status`, `parent_class`, `parent_id`, `title`, `content`, `reply`, `other`, `created_time`, `vote`) VALUES
(1, '', 0, 'Triên', '', '', 1, 'News', 32, '', 'Like', '', 'null', 1491134975, 0),
(2, '', 0, 'Thùy ', '', '', 1, 'News', 35, '', 'Rất hay và rất hữu ích ', '', 'null', 1491385512, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(64) NOT NULL,
  `tel` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `address` varchar(256) NOT NULL,
  `other` text NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `status`, `name`, `tel`, `email`, `address`, `other`, `created_time`) VALUES
(1, 0, 'Nguyen Nam', '0977232323', 'motthanhnam@yahoo.com', '', '{\"title\":\"T\\u00f4i mu\\u1ed1n li\\u00ean h\\u1ec7\",\"content\":\"T\\u00f4i muoonsl i\\u00ean h\\u1ec7 v\\u1edbi qu\\u00fd c\\u00f4ng ty\"}', 1385975581),
(2, 0, 'Vu Anh Kiet', '0936113504', 'kietav254@gmail.com', '', '{\"title\":\"Li\\u00ean h\\u1ec7\",\"content\":\"Nam \\u0110\\u1ecbnh-H\\u00e0 N\\u1ed9i\"}', 1410507579),
(3, 0, 'Vu Anh Kiet', '0936113504', 'kietav254@gmail.com', '', '{\"title\":\"Li\\u00ean h\\u1ec7\",\"content\":\"Nam \\u0110\\u1ecbnh\"}', 1410507641),
(4, 0, 'Anh Khoi', '0936113504', 'kietav254@gmail.com', '', '{\"title\":\"Li\\u00ean h\\u1ec7\",\"content\":\"Nam \\u0110\\u1ecbnh\"}', 1410508025),
(5, 0, 'Anh Khoi', '0936113504', 'kietav254@gmail.com', '', '{\"title\":\"Bacd\",\"content\":\"H\\u00e0 N\\u1ed9i\"}', 1410508171),
(6, 0, 'Anh Khoi', '0936113504', 'kietav254@gmail.com', '', '{\"title\":\"abcd\",\"content\":\"H\\u00e0 N\\u1ed9i\"}', 1410508323),
(7, 0, 'Khoi', '0936113504', 'kietav254@gmail.com', '', '{\"title\":\"Bacd\",\"content\":\"H\\u00e0 N\\u1ed9i\"}', 1410508376),
(8, 1, 'Khôi', '0936113504', 'kietav254@gmail.com', '', '{\"title\":\"abbcas\",\"content\":\"HN\"}', 1410508401),
(9, 0, 'vũ anh tuấn', '0986930545', 'sangovnone@gmail.com', 'khương đình,thanh xuân,hà nội', '{\"title\":\"b\\u00e1o gi\\u00e1 s\\u00e0n g\\u1ed7\",\"content\":\"em b\\u00ean \\u0111\\u1ea1i l\\u00fd, em \\u0111ang ch\\u1ea1y h\\u00e0ng thaione v\\u00e0 floortex c\\u1ee7a lu\\u00e2n, h\\u00e0ng vertex,sutra,ruby,asian c\\u1ee7a h\\u00f2a, th\\u1ea5y b\\u00ean b\\u00e1c m\\u1edbi v\\u1ec1 h\\u00e0ng harotex,thaigreen,sophia\\ncho em xin b\\u00e1o gi\\u00e1 t\\u1ed1t nh\\u1ea5t, quan tr\\u1ecdng gi\\u00e1 t\\u1ed1t em \\u0111\\u1ea9y h\\u00e0ng, v\\u00e0 m\\u1eabu quy\\u1ec3n,n\\u1ebfu gi\\u00e1 c\\u1ea1nh tranh v\\u1edbi h\\u00e0ng kh\\u00e1ch \\u0111\\u01b0\\u1ee3c em s\\u1ebd \\u0111\\u1ea9y h\\u00e0ng b\\u00ean b\\u00e1c\\nhttp:\\/\\/sangocongnghiephanoi.com\\/\"}', 1445101012),
(10, 0, 'Trung Hoàn', '0912968889', 'hoanntdtvtht@gmail.com', 'Hoài Đức', '{\"title\":\"M\\u00ecnh l\\u00e0 th\\u1ee3 \\u1edf Ho\\u00e0i \\u0110\\u1ee9c\",\"content\":\"Cho m\\u00ecnh xin b\\u00e1o gi\\u00e1  t\\u1ea5t c\\u1ea3 c\\u00e1c lo\\u1ea1i s\\u00e0n g\\u1ed7 theo gi\\u00e1 Th\\u1ee3\\nc\\u00e1m \\u01a1n\"}', 1450660513),
(11, 0, 'Mr. Tuấn cường', '0944997869', 'tscdecor@gmail.com', 'Nhà H10, Ngõ 112, Phùng Hưng, Hà Đông, Hà Nội', '{\"title\":\"C\\u1ea7n b\\u00e1o gi\\u00e1\",\"content\":\"M\\u00ecnh b\\u00ean TSC N\\u1ed9i th\\u1ea5t, g\\u1eedi cho m\\u00ecnh b\\u00e1o gi\\u00e1 s\\u00e0n g\\u1ed7 nh\\u00e9\"}', 1491193601),
(12, 0, 'Nguyễn Hữu Thuần', '0982333650', 'thuanikaba@gmail.com', 'Hoàng Văn Thái, Thanh Xuân, Hà Nội', '{\"title\":\"B\\u00e1o gi\\u00e1 c\\u00e1c lo\\u1ea1i s\\u00e0n g\\u1ed7\",\"content\":\"M\\u00ecnh \\u0111ang mu\\u1ed1n l\\u1eafp \\u0111\\u1eb7t s\\u00e0n g\\u1ed7 trong nh\\u00e0, di\\u1ec7n t\\u00edch kho\\u1ea3ng 60m2. B\\u1ea1n c\\u00f3 th\\u1ec3 gi\\u00fap m\\u00ecnh g\\u1eedi b\\u00e1o gi\\u00e1 c\\u00e1c lo\\u1ea1i s\\u00e0n g\\u1ed7 b\\u00ean c\\u00f4ng ty m\\u00ecnh v\\u00e0o email \\u0111\\u01b0\\u1ee3c kh\\u00f4ng. C\\u00e1m \\u01a1n b\\u1ea1n nhi\\u1ec1u\"}', 1493888118);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `tel` varchar(32) NOT NULL,
  `address` varchar(256) NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `other` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_time` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_visit_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_document`
--

CREATE TABLE `tbl_document` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_document_file`
--

CREATE TABLE `tbl_document_file` (
  `id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_embedded_video`
--

CREATE TABLE `tbl_embedded_video` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_embedded_video`
--

INSERT INTO `tbl_embedded_video` (`id`, `language`, `status`, `name`, `v`, `cat_id`, `order_view`, `home`, `new`, `other`, `visits`, `created_by`, `created_time`) VALUES
(1, 'vi', 1, 'Khúc tâm tình người Hà Tĩnh', 'De_x9NVCEy4', 4, 1, 0, 0, '{\"introimage_id\":\"12\",\"description\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"meta_title\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"meta_keyword\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"meta_description\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\"}', 0, 1, 1385981529),
(2, 'vi', 1, 'Khúc tâm tình người Hà Tĩnh_copy', 'BeiZFUZtfy4', 4, 0, 0, 0, '{\"meta_keyword\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"meta_description\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"meta_title\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"introimage_id\":\"15\",\"description\":\"\"}', 0, 1, 1386047290),
(3, 'vi', 1, 'Khúc tâm tình người Hà Tĩnh_copy_copy', 'BeiZFUZtfy4', 4, 0, 0, 0, '{\"meta_keyword\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"meta_description\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"meta_title\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"introimage_id\":\"14\",\"description\":\"\"}', 0, 1, 1386047322),
(4, 'vi', 1, 'Khúc tâm tình người Hà Tĩnh_copy', 'BeiZFUZtfy4', 4, 0, 0, 0, '{\"meta_keyword\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"meta_description\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"meta_title\":\"Kh\\u00fac t\\u00e2m t\\u00ecnh ng\\u01b0\\u1eddi H\\u00e0 T\\u0129nh\",\"introimage_id\":\"13\",\"description\":\"\"}', 0, 1, 1386047322);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id` int(11) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `extension` varchar(32) NOT NULL,
  `dirname` varchar(256) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_file`
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
(60, 'list-news-01', 'png', 'data/upload/image/2014/09/12', 1, 1410497852, '[]'),
(61, 'Capture', 'PNG', 'data/upload/image/2014/09/15', 1, 1410765596, '[]'),
(62, 'log', 'gif', 'data/upload/image/2014/09/15', 1, 1410765711, '[]'),
(63, 'logo', 'png', 'data/upload/image/2014/09/15', 1, 1410765951, '[]'),
(64, 'logo-64', 'png', 'data/upload/image/2014/09/15', 1, 1410765976, '[]'),
(65, 'list-news-01', 'png', 'data/upload/image/2014/09/15', 1, 1410766192, '[]'),
(66, '12_copy', 'jpg', 'data/upload/image/2014/09/15', 1, 1410766501, '[]'),
(67, 'slider-01', 'png', 'data/upload/image/2014/09/15', 1, 1410767079, '[]'),
(68, 'slider-01-81', 'png', 'data/upload/image/2014/09/15', 1, 1410767138, '[]'),
(69, 'list-news-01-39', 'png', 'data/upload/image/2014/09/15', 1, 1410768795, '[]'),
(70, 'timthumb.php', 'jpg', 'data/upload/image/2014/09/15', 1, 1410768897, '[]'),
(71, 'Huong_solid_b_bi_469', 'jpg', 'data/upload/image/2014/09/15', 1, 1410769216, '[]'),
(72, 'Huong_solid_b_bi_469-84', 'jpg', 'data/upload/image/2014/09/15', 1, 1410773020, '[]'),
(73, 'chi-muc-02', 'jpg', 'data/upload/image/2014/09/15', 1, 1410773400, '[]'),
(74, 'chi-muc-02-66', 'jpg', 'data/upload/image/2014/09/15', 1, 1410773720, '[]'),
(75, 'chi-muc', 'jpg', 'data/upload/image/2014/09/15', 1, 1410774166, '[]'),
(76, '10_copy', 'jpg', 'data/upload/image/2014/09/15', 1, 1410774621, '[]'),
(77, '11a_copy', 'jpg', 'data/upload/image/2014/09/15', 1, 1410774654, '[]'),
(78, '14_copy', 'jpg', 'data/upload/image/2014/09/15', 1, 1410774694, '[]'),
(79, '16_copy', 'jpg', 'data/upload/image/2014/09/15', 1, 1410774902, '[]'),
(80, '14_copy-69', 'jpg', 'data/upload/image/2014/09/15', 1, 1410774979, '[]'),
(81, '10_copy-39', 'jpg', 'data/upload/image/2014/09/15', 1, 1410775028, '[]'),
(82, 'san_pham_01', 'png', 'data/upload/image/2014/09/15', 1, 1410775216, '[]'),
(83, 'san_pham_02', 'png', 'data/upload/image/2014/09/15', 1, 1410775371, '[]'),
(84, 'san_pham_05', 'png', 'data/upload/image/2014/09/15', 1, 1410775981, '[]'),
(85, 'san_pham_04', 'png', 'data/upload/image/2014/09/15', 1, 1410776031, '[]'),
(86, 'san_pham_04', 'png', 'data/upload/image/2014/09/16', 1, 1410831926, '[]'),
(87, 'san_pham_02', 'png', 'data/upload/image/2014/09/16', 1, 1410832083, '[]'),
(88, 'san_pham_03', 'png', 'data/upload/image/2014/09/16', 1, 1410832093, '[]'),
(89, 'san_pham_01', 'png', 'data/upload/image/2014/09/16', 1, 1410833320, '[]'),
(90, 'san_pham_07', 'png', 'data/upload/image/2014/09/16', 1, 1410834206, '[]'),
(91, 'san_pham_02-64', 'png', 'data/upload/image/2014/09/16', 1, 1410835465, '[]'),
(92, 'mau_san_go_thai_lan_an_tuong', 'jpg', 'data/upload/image/2014/09/16', 1, 1410836619, '[]'),
(93, 'phu-kien-1', 'png', 'data/upload/image/2014/09/16', 1, 1410840851, '[]'),
(94, 'phu-kien-2', 'png', 'data/upload/image/2014/09/16', 1, 1410841360, '[]'),
(95, 'phu-kien-5', 'png', 'data/upload/image/2014/09/16', 1, 1410841638, '[]'),
(96, 'timthumb.php', 'jpg', 'data/upload/image/2014/09/18', 1, 1411009545, '[]'),
(97, 'timthumb.php-73', 'jpg', 'data/upload/image/2014/09/18', 1, 1411012589, '[]'),
(98, 'timthumb.php-89', 'jpg', 'data/upload/image/2014/09/18', 1, 1411013332, '[]'),
(99, 'canh-tu-bep-Acrylic-04', 'jpg', 'data/upload/image/2014/09/18', 1, 1411022666, '[]'),
(100, 'logo-02', 'png', 'data/upload/image/2014/11/11', 1, 1415678559, '[]'),
(101, 'logo-02-01', 'png', 'data/upload/image/2014/11/11', 1, 1415679019, '[]'),
(102, 'logo-02-02', 'png', 'data/upload/image/2014/11/13', 1, 1415875435, '[]'),
(103, 'logo-02-02-12', 'png', 'data/upload/image/2014/11/13', 1, 1415875556, '[]'),
(104, 'nh-(13)', 'JPG', 'data/upload/image/2014/11/25', 1, 1416911129, '[]'),
(105, 'IMG_0381', 'JPG', 'data/upload/image/2015/04/11', 1, 1428726036, '[]'),
(106, 'IMG_0382', 'JPG', 'data/upload/image/2015/04/11', 1, 1428726054, '[]'),
(107, 'DSC_2464', 'JPG', 'data/upload/image/2015/04/11', 1, 1428726432, '[]'),
(108, 'DSC_2460', 'JPG', 'data/upload/image/2015/04/11', 1, 1428726445, '[]'),
(109, 'DSC_2435', 'JPG', 'data/upload/image/2015/04/11', 1, 1428726654, '[]'),
(110, 'DSC_2440', 'JPG', 'data/upload/image/2015/04/11', 1, 1428726668, '[]'),
(111, 'DSC_2425', 'JPG', 'data/upload/image/2015/04/11', 1, 1428726871, '[]'),
(112, 'DSC_2434', 'JPG', 'data/upload/image/2015/04/11', 1, 1428726882, '[]'),
(113, 'DSC_2443', 'JPG', 'data/upload/image/2015/04/11', 1, 1428727032, '[]'),
(114, 'DSC_2446', 'JPG', 'data/upload/image/2015/04/11', 1, 1428727045, '[]'),
(115, 'DSC_2475', 'JPG', 'data/upload/image/2015/04/11', 1, 1428727165, '[]'),
(116, 'DSC_2476', 'JPG', 'data/upload/image/2015/04/11', 1, 1428727176, '[]'),
(117, 'IMG_0562', 'JPG', 'data/upload/image/2015/04/11', 1, 1428727561, '[]'),
(118, 'IMG_0559', 'JPG', 'data/upload/image/2015/04/11', 1, 1428727582, '[]'),
(119, 'IMG_0370', 'JPG', 'data/upload/image/2015/04/11', 1, 1428727747, '[]'),
(120, 'IMG_0564', 'JPG', 'data/upload/image/2015/04/11', 1, 1428727785, '[]'),
(121, 'IMG_0565', 'JPG', 'data/upload/image/2015/04/11', 1, 1428727795, '[]'),
(122, 'IMG_0551', 'JPG', 'data/upload/image/2015/04/11', 1, 1428728018, '[]'),
(123, 'IMG_0553', 'JPG', 'data/upload/image/2015/04/11', 1, 1428728030, '[]'),
(124, 'IMG_0591', 'JPG', 'data/upload/image/2015/04/11', 1, 1428728503, '[]'),
(125, 'IMG_0590', 'JPG', 'data/upload/image/2015/04/11', 1, 1428728554, '[]'),
(126, 'IMG_0575', 'JPG', 'data/upload/image/2015/04/11', 1, 1428728664, '[]'),
(127, 'IMG_0572', 'JPG', 'data/upload/image/2015/04/11', 1, 1428728694, '[]'),
(128, 'IMG_0589', 'JPG', 'data/upload/image/2015/04/11', 1, 1428728848, '[]'),
(129, 'IMG_0587', 'JPG', 'data/upload/image/2015/04/11', 1, 1428728857, '[]'),
(130, 'Bien-dai-mo-moi', 'jpg', 'data/upload/image/2015/04/11', 1, 1428729105, '[]'),
(131, 'Bien-dai-mo-moi-23', 'jpg', 'data/upload/image/2015/04/11', 1, 1428729286, '[]'),
(132, 'Bien-dai-mo-moi-42', 'jpg', 'data/upload/image/2015/04/11', 1, 1428729293, '[]'),
(133, 'IMG_0551-36', 'JPG', 'data/upload/image/2015/04/11', 1, 1428729361, '[]'),
(134, 'IMG_0573', 'JPG', 'data/upload/image/2015/04/11', 1, 1428729372, '[]'),
(135, '1221', 'JPG', 'data/upload/image/2015/04/11', 1, 1428737169, '[]'),
(136, '1222', 'JPG', 'data/upload/image/2015/04/11', 1, 1428737475, '[]'),
(137, '1221-28', 'JPG', 'data/upload/image/2015/04/11', 1, 1428737868, '[]'),
(138, '1221-16', 'JPG', 'data/upload/image/2015/04/11', 1, 1428737875, '[]'),
(139, '1222-62', 'JPG', 'data/upload/image/2015/04/11', 1, 1428738078, '[]'),
(140, '1222-57', 'JPG', 'data/upload/image/2015/04/11', 1, 1428738081, '[]'),
(141, '1224', 'JPG', 'data/upload/image/2015/04/11', 1, 1428738235, '[]'),
(142, '1224-51', 'JPG', 'data/upload/image/2015/04/11', 1, 1428738243, '[]'),
(143, '1225', 'JPG', 'data/upload/image/2015/04/11', 1, 1428738397, '[]'),
(144, '1225-64', 'JPG', 'data/upload/image/2015/04/11', 1, 1428738403, '[]'),
(145, 'xop-trang', 'jpg', 'data/upload/image/2015/04/11', 1, 1428738704, '[]'),
(146, 'xop-trang-54', 'jpg', 'data/upload/image/2015/04/11', 1, 1428738709, '[]'),
(147, 'xop-bac', 'jpg', 'data/upload/image/2015/04/11', 1, 1428738861, '[]'),
(148, 'xop-bac-cuon', 'jpg', 'data/upload/image/2015/04/11', 1, 1428738955, '[]'),
(149, 'logo', 'jpg', 'data/upload/image/2015/04/11', 1, 1428750547, '[]'),
(150, 'Bien-dai-mo-moi-54', 'jpg', 'data/upload/image/2015/04/11', 1, 1428750696, '[]'),
(151, 'image', 'jpg', 'data/upload/image/2015/04/11', 1, 1428766065, '[]'),
(152, 'image-98', 'jpg', 'data/upload/image/2015/04/11', 1, 1428766105, '[]'),
(153, 'image-47', 'jpg', 'data/upload/image/2015/04/11', 1, 1428766220, '[]'),
(154, 'BN-D-13492', 'JPG', 'data/upload/image/2015/04/12', 1, 1428800478, '[]'),
(155, 'IMG_2444', 'JPG', 'data/upload/image/2015/04/12', 1, 1428800481, '[]'),
(156, 'images', 'jpg', 'data/upload/image/2015/04/12', 1, 1428801043, '[]'),
(157, 'images-(1)', 'jpg', 'data/upload/image/2015/04/12', 1, 1428801233, '[]'),
(158, 'images-(1)-73', 'jpg', 'data/upload/image/2015/04/12', 1, 1428801238, '[]'),
(159, 'images-(2)', 'jpg', 'data/upload/image/2015/04/12', 1, 1428801732, '[]'),
(160, 'images-(3)', 'jpg', 'data/upload/image/2015/04/12', 1, 1428801747, '[]'),
(161, 'images-(4)', 'jpg', 'data/upload/image/2015/04/12', 1, 1428803267, '[]'),
(162, 'images-(4)-98', 'jpg', 'data/upload/image/2015/04/12', 1, 1428803277, '[]'),
(163, 'download-(1)', 'jpg', 'data/upload/image/2015/04/12', 1, 1428804188, '[]'),
(164, 'images-(5)', 'jpg', 'data/upload/image/2015/04/12', 1, 1428804208, '[]'),
(165, 'logo', 'jpg', 'data/upload/image/2015/04/25', 1, 1429935973, '[]'),
(166, 'logo-10', 'jpg', 'data/upload/image/2015/04/25', 1, 1429936039, '[]'),
(167, 'Bien-dai-mo-moi', 'jpg', 'data/upload/image/2015/04/25', 1, 1429936098, '[]'),
(168, 'logo-62', 'jpg', 'data/upload/image/2015/04/25', 1, 1429936177, '[]'),
(169, 'logo-84', 'jpg', 'data/upload/image/2015/04/25', 1, 1429936237, '[]'),
(170, 'logo-63', 'jpg', 'data/upload/image/2015/04/25', 1, 1429938951, '[]'),
(171, 'logo-85', 'jpg', 'data/upload/image/2015/04/25', 1, 1429938983, '[]'),
(172, 'logo-45', 'jpg', 'data/upload/image/2015/04/25', 1, 1429939039, '[]'),
(173, 'Bien-dai-mo-moi-66', 'jpg', 'data/upload/image/2015/04/25', 1, 1429939300, '[]'),
(174, 'banner_header', 'jpg', 'data/upload/image/2015/04/25', 1, 1429939578, '[]'),
(175, 'banner_header-58', 'jpg', 'data/upload/image/2015/04/25', 1, 1429939586, '[]'),
(176, 'banner_header-79', 'jpg', 'data/upload/image/2015/04/25', 1, 1429939674, '[]'),
(177, 'IMG_1450', 'JPG', 'data/upload/image/2015/05/08', 1, 1431047917, '[]'),
(178, 'IMG_1450-25', 'JPG', 'data/upload/image/2015/05/08', 1, 1431047938, '[]'),
(179, 'IMG_1476', 'JPG', 'data/upload/image/2015/05/08', 1, 1431048169, '[]'),
(180, 'IMG_1477', 'JPG', 'data/upload/image/2015/05/08', 1, 1431048179, '[]'),
(181, 'IMG_1453', 'JPG', 'data/upload/image/2015/05/08', 1, 1431048357, '[]'),
(182, 'IMG_1452', 'JPG', 'data/upload/image/2015/05/08', 1, 1431048363, '[]'),
(183, 'IMG_1472', 'JPG', 'data/upload/image/2015/05/08', 1, 1431048611, '[]'),
(184, 'IMG_1473', 'JPG', 'data/upload/image/2015/05/08', 1, 1431048617, '[]'),
(185, 'IMG_1474', 'JPG', 'data/upload/image/2015/05/08', 1, 1431048819, '[]'),
(186, 'IMG_1475', 'JPG', 'data/upload/image/2015/05/08', 1, 1431048832, '[]'),
(187, 'IMG_1470', 'JPG', 'data/upload/image/2015/05/08', 1, 1431048990, '[]'),
(188, 'IMG_1471', 'JPG', 'data/upload/image/2015/05/08', 1, 1431049002, '[]'),
(189, 'IMG_1451', 'JPG', 'data/upload/image/2015/05/08', 1, 1431049090, '[]'),
(190, 'IMG_1451-68', 'JPG', 'data/upload/image/2015/05/08', 1, 1431049149, '[]'),
(191, 'IMG_1525', 'JPG', 'data/upload/image/2015/05/08', 1, 1431049295, '[]'),
(192, 'IMG_1526', 'JPG', 'data/upload/image/2015/05/08', 1, 1431049312, '[]'),
(193, 'IMG_1529', 'JPG', 'data/upload/image/2015/05/08', 1, 1431049491, '[]'),
(194, 'IMG_1531', 'JPG', 'data/upload/image/2015/05/08', 1, 1431049504, '[]'),
(195, 'IMG_1505', 'JPG', 'data/upload/image/2015/05/08', 1, 1431049637, '[]'),
(196, 'IMG_1506', 'JPG', 'data/upload/image/2015/05/08', 1, 1431049648, '[]'),
(197, 'IMG_1524', 'JPG', 'data/upload/image/2015/05/08', 1, 1431049924, '[]'),
(198, 'IMG_1523', 'JPG', 'data/upload/image/2015/05/08', 1, 1431049934, '[]'),
(199, 'IMG_1502', 'JPG', 'data/upload/image/2015/05/08', 1, 1431050152, '[]'),
(200, 'IMG_1504', 'JPG', 'data/upload/image/2015/05/08', 1, 1431050169, '[]'),
(201, 'IMG_1499', 'JPG', 'data/upload/image/2015/05/08', 1, 1431050298, '[]'),
(202, 'IMG_1501', 'JPG', 'data/upload/image/2015/05/08', 1, 1431050309, '[]'),
(203, 'IMG_1501-21', 'JPG', 'data/upload/image/2015/05/08', 1, 1431050333, '[]'),
(204, 'IMG_1491', 'JPG', 'data/upload/image/2015/05/08', 1, 1431050534, '[]'),
(205, 'IMG_1491-26', 'JPG', 'data/upload/image/2015/05/08', 1, 1431050556, '[]'),
(206, 'IMG_1508', 'JPG', 'data/upload/image/2015/05/08', 1, 1431050936, '[]'),
(207, 'IMG_1496', 'JPG', 'data/upload/image/2015/05/08', 1, 1431050998, '[]'),
(208, 'IMG_1516', 'JPG', 'data/upload/image/2015/05/08', 1, 1431051122, '[]'),
(209, 'IMG_1516-56', 'JPG', 'data/upload/image/2015/05/08', 1, 1431051136, '[]'),
(210, 'IMG_1493', 'JPG', 'data/upload/image/2015/05/08', 1, 1431051387, '[]'),
(211, 'IMG_1493-25', 'JPG', 'data/upload/image/2015/05/08', 1, 1431051410, '[]'),
(212, 'IMG_1468', 'JPG', 'data/upload/image/2015/05/08', 1, 1431051753, '[]'),
(213, 'IMG_1469', 'JPG', 'data/upload/image/2015/05/08', 1, 1431051759, '[]'),
(214, 'IMG_1478', 'JPG', 'data/upload/image/2015/05/08', 1, 1431051932, '[]'),
(215, 'IMG_1479', 'JPG', 'data/upload/image/2015/05/08', 1, 1431051948, '[]'),
(216, 'IMG_1556', 'JPG', 'data/upload/image/2015/05/08', 1, 1431070394, '[]'),
(217, 'IMG_1556-89', 'JPG', 'data/upload/image/2015/05/08', 1, 1431070410, '[]'),
(218, 'IMG_1556-94', 'JPG', 'data/upload/image/2015/05/08', 1, 1431070431, '[]'),
(219, 'IMG_1555', 'JPG', 'data/upload/image/2015/05/08', 1, 1431070579, '[]'),
(220, 'IMG_1555-97', 'JPG', 'data/upload/image/2015/05/08', 1, 1431070582, '[]'),
(221, 'IMG_1557', 'JPG', 'data/upload/image/2015/05/08', 1, 1431071009, '[]'),
(222, 'IMG_1557-30', 'JPG', 'data/upload/image/2015/05/08', 1, 1431071021, '[]'),
(223, 'IMG_1463', 'JPG', 'data/upload/image/2015/05/08', 1, 1431071233, '[]'),
(224, 'IMG_1463-25', 'JPG', 'data/upload/image/2015/05/08', 1, 1431071240, '[]'),
(225, 'IMG_1458', 'JPG', 'data/upload/image/2015/05/08', 1, 1431071428, '[]'),
(226, 'IMG_1459', 'JPG', 'data/upload/image/2015/05/08', 1, 1431071462, '[]'),
(227, 'IMG_1458-49', 'JPG', 'data/upload/image/2015/05/08', 1, 1431071696, '[]'),
(228, 'IMG_1459-12', 'JPG', 'data/upload/image/2015/05/08', 1, 1431071724, '[]'),
(229, 'IMG_1454', 'JPG', 'data/upload/image/2015/05/08', 1, 1431071972, '[]'),
(230, 'IMG_1454-52', 'JPG', 'data/upload/image/2015/05/08', 1, 1431071983, '[]'),
(231, 'IMG_1456', 'JPG', 'data/upload/image/2015/05/08', 1, 1431072109, '[]'),
(232, 'IMG_1457', 'JPG', 'data/upload/image/2015/05/08', 1, 1431072118, '[]'),
(233, 'IMG_1468-83', 'JPG', 'data/upload/image/2015/05/08', 1, 1431072584, '[]'),
(234, 'IMG_1469-67', 'JPG', 'data/upload/image/2015/05/08', 1, 1431072601, '[]'),
(235, 'IMG_1481', 'JPG', 'data/upload/image/2015/05/08', 1, 1431072867, '[]'),
(236, 'IMG_1480', 'JPG', 'data/upload/image/2015/05/08', 1, 1431072875, '[]'),
(237, 'IMG_1483', 'JPG', 'data/upload/image/2015/05/08', 1, 1431073113, '[]'),
(238, 'IMG_1483-84', 'JPG', 'data/upload/image/2015/05/08', 1, 1431073123, '[]'),
(239, 'IMG_1489', 'JPG', 'data/upload/image/2015/05/08', 1, 1431073199, '[]'),
(240, 'IMG_1489-16', 'JPG', 'data/upload/image/2015/05/08', 1, 1431073208, '[]'),
(241, 'IMG_1486', 'JPG', 'data/upload/image/2015/05/08', 1, 1431073283, '[]'),
(242, 'IMG_1486-31', 'JPG', 'data/upload/image/2015/05/08', 1, 1431073289, '[]'),
(243, 'IMG_1484', 'JPG', 'data/upload/image/2015/05/08', 1, 1431073367, '[]'),
(244, 'IMG_1484-28', 'JPG', 'data/upload/image/2015/05/08', 1, 1431073404, '[]'),
(245, 'IMG_1487', 'JPG', 'data/upload/image/2015/05/08', 1, 1431073848, '[]'),
(246, 'IMG_1486-39', 'JPG', 'data/upload/image/2015/05/08', 1, 1431073857, '[]'),
(247, 'IMG_1515', 'JPG', 'data/upload/image/2015/05/09', 1, 1431133647, '[]'),
(248, 'IMG_1515-38', 'JPG', 'data/upload/image/2015/05/09', 1, 1431133665, '[]'),
(249, 'IMG_1510', 'JPG', 'data/upload/image/2015/05/09', 1, 1431133909, '[]'),
(250, 'IMG_1510-36', 'JPG', 'data/upload/image/2015/05/09', 1, 1431133922, '[]'),
(251, 'IMG_1497', 'JPG', 'data/upload/image/2015/05/09', 1, 1431134168, '[]'),
(252, 'IMG_1497-37', 'JPG', 'data/upload/image/2015/05/09', 1, 1431134180, '[]'),
(253, 'IMG_1499', 'JPG', 'data/upload/image/2015/05/09', 1, 1431134392, '[]'),
(254, 'IMG_1499-42', 'JPG', 'data/upload/image/2015/05/09', 1, 1431134398, '[]'),
(255, 'IMG_1493', 'JPG', 'data/upload/image/2015/05/09', 1, 1431134963, '[]'),
(256, 'IMG_1493-62', 'JPG', 'data/upload/image/2015/05/09', 1, 1431134972, '[]'),
(257, 'IMG_1541', 'JPG', 'data/upload/image/2015/05/09', 1, 1431135053, '[]'),
(258, 'IMG_1541-98', 'JPG', 'data/upload/image/2015/05/09', 1, 1431135072, '[]'),
(259, 'IMG_1544', 'JPG', 'data/upload/image/2015/05/09', 1, 1431135175, '[]'),
(260, 'IMG_1544-21', 'JPG', 'data/upload/image/2015/05/09', 1, 1431135176, '[]'),
(261, 'IMG_1538', 'JPG', 'data/upload/image/2015/05/09', 1, 1431135247, '[]'),
(262, 'IMG_1538-96', 'JPG', 'data/upload/image/2015/05/09', 1, 1431135285, '[]'),
(263, 'IMG_1535', 'JPG', 'data/upload/image/2015/05/09', 1, 1431135383, '[]'),
(264, 'IMG_1535-70', 'JPG', 'data/upload/image/2015/05/09', 1, 1431135417, '[]'),
(265, 'IMG_1535-68', 'JPG', 'data/upload/image/2015/05/09', 1, 1431135438, '[]'),
(266, 'IMG_1533', 'JPG', 'data/upload/image/2015/05/09', 1, 1431135515, '[]'),
(267, 'IMG_1533-43', 'JPG', 'data/upload/image/2015/05/09', 1, 1431135546, '[]'),
(268, 'image', 'jpg', 'data/upload/image/2015/05/09', 1, 1431149959, '[]'),
(269, 'image-89', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150026, '[]'),
(270, 'image-20', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150028, '[]'),
(271, 'image-84', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150042, '[]'),
(272, 'image-31', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150063, '[]'),
(273, 'image-49', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150211, '[]'),
(274, 'image-94', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150233, '[]'),
(275, 'image-27', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150374, '[]'),
(276, 'image-22', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150400, '[]'),
(277, 'image-66', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150538, '[]'),
(278, 'image-37', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150554, '[]'),
(279, 'image-16', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150596, '[]'),
(280, 'image-58', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150610, '[]'),
(281, 'image-62', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150739, '[]'),
(282, 'image-30', 'jpg', 'data/upload/image/2015/05/09', 1, 1431150753, '[]'),
(283, 'image-96', 'jpg', 'data/upload/image/2015/05/09', 1, 1431151056, '[]'),
(284, 'image-39', 'jpg', 'data/upload/image/2015/05/09', 1, 1431151074, '[]'),
(285, 'image-76', 'jpg', 'data/upload/image/2015/05/09', 1, 1431151372, '[]'),
(286, 'image-92', 'jpg', 'data/upload/image/2015/05/09', 1, 1431151385, '[]'),
(287, 'image', 'jpg', 'data/upload/image/2015/05/11', 1, 1431305951, '[]'),
(288, 'image-25', 'jpg', 'data/upload/image/2015/05/11', 1, 1431305963, '[]'),
(289, 'image-21', 'jpg', 'data/upload/image/2015/05/11', 1, 1431306374, '[]'),
(290, 'image-31', 'jpg', 'data/upload/image/2015/05/11', 1, 1431306411, '[]'),
(291, 'image-72', 'jpg', 'data/upload/image/2015/05/11', 1, 1431306527, '[]'),
(292, 'image-77', 'jpg', 'data/upload/image/2015/05/11', 1, 1431306548, '[]'),
(293, 'image-91', 'jpg', 'data/upload/image/2015/05/11', 1, 1431306970, '[]'),
(294, 'image-42', 'jpg', 'data/upload/image/2015/05/11', 1, 1431306998, '[]'),
(295, 'image-64', 'jpg', 'data/upload/image/2015/05/11', 1, 1431307032, '[]'),
(296, 'image-71', 'jpg', 'data/upload/image/2015/05/11', 1, 1431307050, '[]'),
(297, 'image-46', 'jpg', 'data/upload/image/2015/05/11', 1, 1431307219, '[]'),
(298, 'image-83', 'jpg', 'data/upload/image/2015/05/11', 1, 1431307237, '[]'),
(299, 'image-20', 'jpg', 'data/upload/image/2015/05/11', 1, 1431307528, '[]'),
(300, 'image-16', 'jpg', 'data/upload/image/2015/05/11', 1, 1431307538, '[]'),
(301, 'image-21-76', 'jpg', 'data/upload/image/2015/05/11', 1, 1431307764, '[]'),
(302, 'image-22', 'jpg', 'data/upload/image/2015/05/11', 1, 1431307776, '[]'),
(303, 'image-76', 'jpg', 'data/upload/image/2015/05/11', 1, 1431307892, '[]'),
(304, 'image-87', 'jpg', 'data/upload/image/2015/05/11', 1, 1431307904, '[]'),
(305, 'image-72-52', 'jpg', 'data/upload/image/2015/05/11', 1, 1431308119, '[]'),
(306, 'image-96', 'jpg', 'data/upload/image/2015/05/11', 1, 1431308136, '[]'),
(307, 'image-49', 'jpg', 'data/upload/image/2015/05/11', 1, 1431308539, '[]'),
(308, 'image-18', 'jpg', 'data/upload/image/2015/05/11', 1, 1431308555, '[]'),
(309, 'image-52', 'jpg', 'data/upload/image/2015/05/11', 1, 1431308692, '[]'),
(310, 'image-33', 'jpg', 'data/upload/image/2015/05/11', 1, 1431308705, '[]'),
(311, 'image-60', 'jpg', 'data/upload/image/2015/05/11', 1, 1431308800, '[]'),
(312, 'image-96-12', 'jpg', 'data/upload/image/2015/05/11', 1, 1431308820, '[]'),
(313, 'image-36', 'jpg', 'data/upload/image/2015/05/11', 1, 1431309043, '[]'),
(314, 'image-21-31', 'jpg', 'data/upload/image/2015/05/11', 1, 1431309060, '[]'),
(315, 'image-31-40', 'jpg', 'data/upload/image/2015/05/11', 1, 1431309322, '[]'),
(316, 'image-48', 'jpg', 'data/upload/image/2015/05/11', 1, 1431309336, '[]'),
(317, 'image-66', 'jpg', 'data/upload/image/2015/05/11', 1, 1431309462, '[]'),
(318, 'image-44', 'jpg', 'data/upload/image/2015/05/11', 1, 1431309491, '[]'),
(319, 'image-25-87', 'jpg', 'data/upload/image/2015/05/11', 1, 1431309670, '[]'),
(320, 'image-13', 'jpg', 'data/upload/image/2015/05/11', 1, 1431309685, '[]'),
(321, 'image-54', 'jpg', 'data/upload/image/2015/05/11', 1, 1431309921, '[]'),
(322, 'image-15', 'jpg', 'data/upload/image/2015/05/11', 1, 1431309933, '[]'),
(323, 'image-44-51', 'jpg', 'data/upload/image/2015/05/11', 1, 1431310030, '[]'),
(324, 'image-38', 'jpg', 'data/upload/image/2015/05/11', 1, 1431310039, '[]'),
(325, 'image-82', 'jpg', 'data/upload/image/2015/05/11', 1, 1431310248, '[]'),
(326, 'image-11', 'jpg', 'data/upload/image/2015/05/11', 1, 1431310257, '[]'),
(327, 'image-65', 'jpg', 'data/upload/image/2015/05/11', 1, 1431311006, '[]'),
(328, 'image-97', 'jpg', 'data/upload/image/2015/05/11', 1, 1431311024, '[]'),
(329, 'image-90', 'jpg', 'data/upload/image/2015/05/11', 1, 1431311299, '[]'),
(330, 'image-68', 'jpg', 'data/upload/image/2015/05/11', 1, 1431311317, '[]'),
(331, 'image-92', 'jpg', 'data/upload/image/2015/05/11', 1, 1431311452, '[]'),
(332, 'image-68-28', 'jpg', 'data/upload/image/2015/05/11', 1, 1431311479, '[]'),
(333, 'image-87-50', 'jpg', 'data/upload/image/2015/05/11', 1, 1431312152, '[]'),
(334, 'image-46-72', 'jpg', 'data/upload/image/2015/05/11', 1, 1431312170, '[]'),
(335, 'image-49-79', 'jpg', 'data/upload/image/2015/05/11', 1, 1431312314, '[]'),
(336, 'image-53', 'jpg', 'data/upload/image/2015/05/11', 1, 1431312329, '[]'),
(337, 'image-74', 'jpg', 'data/upload/image/2015/05/11', 1, 1431312548, '[]'),
(338, 'image-31-70', 'jpg', 'data/upload/image/2015/05/11', 1, 1431312571, '[]'),
(339, 'image-12', 'jpg', 'data/upload/image/2015/05/11', 1, 1431313256, '[]'),
(340, 'image-31-56', 'jpg', 'data/upload/image/2015/05/11', 1, 1431313283, '[]'),
(341, 'image-51', 'jpg', 'data/upload/image/2015/05/11', 1, 1431313396, '[]'),
(342, 'image-66-61', 'jpg', 'data/upload/image/2015/05/11', 1, 1431313410, '[]'),
(343, 'image-92-47', 'jpg', 'data/upload/image/2015/05/11', 1, 1431313643, '[]'),
(344, 'image-48-86', 'jpg', 'data/upload/image/2015/05/11', 1, 1431313668, '[]'),
(345, 'image-58', 'jpg', 'data/upload/image/2015/05/11', 1, 1431313748, '[]'),
(346, 'image-46-51', 'jpg', 'data/upload/image/2015/05/11', 1, 1431313764, '[]'),
(347, 'image-75', 'jpg', 'data/upload/image/2015/05/11', 1, 1431313887, '[]'),
(348, 'image-19', 'jpg', 'data/upload/image/2015/05/11', 1, 1431313922, '[]'),
(349, 'image-13-68', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314035, '[]'),
(350, 'image-24', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314049, '[]'),
(351, 'image-32', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314147, '[]'),
(352, 'image-35', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314164, '[]'),
(353, 'image-74-15', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314577, '[]'),
(354, 'image-68-92', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314592, '[]'),
(355, 'image-67', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314708, '[]'),
(356, 'image-95', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314719, '[]'),
(357, 'image-53-58', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314870, '[]'),
(358, 'image-17', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314889, '[]'),
(359, 'image-64-94', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314964, '[]'),
(360, 'image-52-35', 'jpg', 'data/upload/image/2015/05/11', 1, 1431314976, '[]'),
(361, 'image-54-45', 'jpg', 'data/upload/image/2015/05/11', 1, 1431315100, '[]'),
(362, 'image-59', 'jpg', 'data/upload/image/2015/05/11', 1, 1431315110, '[]'),
(363, 'image', 'jpg', 'data/upload/image/2015/05/14', 1, 1431602936, '[]'),
(364, 'image-70', 'jpg', 'data/upload/image/2015/05/14', 1, 1431602954, '[]'),
(365, 'image-39', 'jpg', 'data/upload/image/2015/05/14', 1, 1431603408, '[]'),
(366, 'image-88', 'jpg', 'data/upload/image/2015/05/14', 1, 1431603604, '[]'),
(367, 'image-21', 'jpg', 'data/upload/image/2015/05/14', 1, 1431603625, '[]'),
(368, 'image-76', 'jpg', 'data/upload/image/2015/05/14', 1, 1431609799, '[]'),
(369, 'image', 'jpg', 'data/upload/image/2015/05/18', 1, 1431918597, '[]'),
(370, 'image-34', 'jpg', 'data/upload/image/2015/05/18', 1, 1431918620, '[]'),
(371, 'image-17', 'jpg', 'data/upload/image/2015/05/18', 1, 1431918640, '[]'),
(372, 'BT8-9321', 'jpg', 'data/upload/image/2015/05/22', 1, 1432259392, '[]'),
(373, 'BT8-9321-12', 'jpg', 'data/upload/image/2015/05/22', 1, 1432259400, '[]'),
(374, 'feature_verlegecenter_new', 'jpg', 'data/upload/image/2015/05/22', 1, 1432262542, '[]'),
(375, 'feature_verlegecenter_new-12', 'jpg', 'data/upload/image/2015/05/22', 1, 1432262552, '[]'),
(376, 'feature_verlegecenter_new-38', 'jpg', 'data/upload/image/2015/05/22', 1, 1432262910, '[]'),
(377, 'haro-2', 'jpg', 'data/upload/image/2015/05/22', 1, 1432263113, '[]'),
(378, 'haro-2-80', 'jpg', 'data/upload/image/2015/05/22', 1, 1432294822, '[]'),
(379, 'haro-2-92', 'jpg', 'data/upload/image/2015/05/22', 1, 1432294845, '[]'),
(380, 'hao', 'jpg', 'data/upload/image/2015/05/22', 1, 1432294870, '[]'),
(381, 'haro-2-75', 'jpg', 'data/upload/image/2015/05/22', 1, 1432294926, '[]'),
(382, 'hao-15', 'jpg', 'data/upload/image/2015/05/22', 1, 1432294991, '[]'),
(383, 'haro-2-31', 'jpg', 'data/upload/image/2015/05/22', 1, 1432295143, '[]'),
(384, '12', 'jpg', 'data/upload/image/2015/05/22', 1, 1432295321, '[]'),
(385, '12-99', 'jpg', 'data/upload/image/2015/05/22', 1, 1432295342, '[]'),
(386, '13', 'jpg', 'data/upload/image/2015/05/22', 1, 1432295712, '[]'),
(387, 'Banner01', 'jpg', 'data/upload/image/2015/05/22', 1, 1432296225, '[]'),
(388, 'Banner02', 'jpg', 'data/upload/image/2015/05/22', 1, 1432296321, '[]'),
(389, 'Banner01-15', 'jpg', 'data/upload/image/2015/05/22', 1, 1432296600, '[]'),
(390, 'Bien-dai-mo-moi-in-sua-banner', 'gif', 'data/upload/image/2015/05/22', 1, 1432296788, '[]'),
(391, 'Bien-dai-mo-moi-in-sua-banner-80', 'gif', 'data/upload/image/2015/05/22', 1, 1432296855, '[]'),
(392, 'Bien-dai-mo-moi-in-sua-banner-40', 'gif', 'data/upload/image/2015/05/22', 1, 1432296917, '[]'),
(393, 'Bien-dai-mo-moi-in-sua-banner-32', 'gif', 'data/upload/image/2015/05/22', 1, 1432297286, '[]'),
(394, 'main-product-01', 'png', 'data/upload/image/2015/06/03', 1, 1433316470, '[]'),
(395, 'main-product-01-31', 'png', 'data/upload/image/2015/06/03', 1, 1433316508, '[]'),
(396, 'main-product-01-41', 'png', 'data/upload/image/2015/06/03', 1, 1433316572, '[]'),
(397, 'main-product-01-33', 'png', 'data/upload/image/2015/06/03', 1, 1433316611, '[]'),
(398, 'thaigreen-02', 'png', 'data/upload/image/2015/06/04', 1, 1433385385, '[]'),
(399, 'main-product-01', 'png', 'data/upload/image/2015/06/10', 1, 1433926167, '[]'),
(400, 'thaigreen-02', 'png', 'data/upload/image/2015/06/10', 1, 1433926290, '[]'),
(401, 'image', 'jpg', 'data/upload/image/2016/08/07', 1, 1470554614, '[]'),
(402, 'image-44', 'jpg', 'data/upload/image/2016/08/07', 1, 1470554624, '[]'),
(403, 'image-10', 'jpg', 'data/upload/image/2016/08/07', 1, 1470554894, '[]'),
(404, 'image-21', 'jpg', 'data/upload/image/2016/08/07', 1, 1470554905, '[]'),
(405, 'image-16', 'jpg', 'data/upload/image/2016/08/07', 1, 1470555145, '[]'),
(406, 'image-70', 'jpg', 'data/upload/image/2016/08/07', 1, 1470555158, '[]'),
(407, 'image-43', 'jpg', 'data/upload/image/2016/08/07', 1, 1470555408, '[]'),
(408, 'image-22', 'jpg', 'data/upload/image/2016/08/07', 1, 1470555416, '[]'),
(409, 'image-80', 'jpg', 'data/upload/image/2016/08/07', 1, 1470555601, '[]'),
(410, 'image-65', 'jpg', 'data/upload/image/2016/08/07', 1, 1470555609, '[]'),
(411, 'image-56', 'jpg', 'data/upload/image/2016/08/07', 1, 1470555870, '[]'),
(412, 'image-59', 'jpg', 'data/upload/image/2016/08/07', 1, 1470555876, '[]'),
(413, 'image-10-75', 'jpg', 'data/upload/image/2016/08/07', 1, 1470555986, '[]'),
(414, 'image-46', 'jpg', 'data/upload/image/2016/08/07', 1, 1470555994, '[]'),
(415, 'Faus-Logo-1', 'jpg', 'data/upload/image/2017/03/24', 1, 1490351670, '[]'),
(416, 'Faus-Logo-1-95', 'jpg', 'data/upload/image/2017/03/24', 1, 1490351681, '[]'),
(417, 'Faus-Logo-2', 'jpg', 'data/upload/image/2017/03/24', 1, 1490351686, '[]'),
(418, 'z613977799920_b9574feaf2345312b21d7ff738d453ef', 'jpg', 'data/upload/image/2017/03/24', 1, 1490351978, '[]'),
(419, 'z613977799920_b9574feaf2345312b21d7ff738d453ef-95', 'jpg', 'data/upload/image/2017/03/24', 1, 1490351987, '[]'),
(420, 'z608985351459_0e24b2fce91314c84427c70954c6efdd', 'jpg', 'data/upload/image/2017/03/24', 1, 1490352104, '[]'),
(421, 'Image-15', 'jpg', 'data/upload/image/2017/03/24', 1, 1490352392, '[]'),
(422, 'Image-15-25', 'jpg', 'data/upload/image/2017/03/24', 1, 1490352895, '[]'),
(423, 'Image-15-18', 'jpg', 'data/upload/image/2017/03/24', 1, 1490353042, '[]'),
(424, 'z608985351459_0e24b2fce91314c84427c70954c6efdd-63', 'jpg', 'data/upload/image/2017/03/24', 1, 1490353415, '[]'),
(425, 'z608985351459_0e24b2fce91314c84427c70954c6efdd-78', 'jpg', 'data/upload/image/2017/03/24', 1, 1490353420, '[]'),
(426, 'Faus-Logo-2-91', 'jpg', 'data/upload/image/2017/03/24', 1, 1490353555, '[]'),
(427, 'ACACIA-NATURAL-TEMPO_1T15-FULL', 'jpg', 'data/upload/image/2017/03/28', 1, 1490671775, '[]'),
(428, 'ACACIA-NATURAL-TEMPO_1T15-FULL-45', 'jpg', 'data/upload/image/2017/03/28', 1, 1490671863, '[]'),
(429, 'Roble-Seleccion-TEMPO_1T02', 'jpg', 'data/upload/image/2017/03/28', 1, 1490673881, '[]'),
(430, 'Roble-Seleccion-TEMPO_1T02-19', 'jpg', 'data/upload/image/2017/03/28', 1, 1490673918, '[]'),
(431, 'Roble-Alhambra-TEMPO_1T07', 'jpg', 'data/upload/image/2017/03/28', 1, 1490674238, '[]'),
(432, 'Roble-Alhambra-TEMPO_1T07-31', 'jpg', 'data/upload/image/2017/03/28', 1, 1490674252, '[]'),
(433, 'Roble-Bermont-TEMPO_1T04', 'jpg', 'data/upload/image/2017/03/28', 1, 1490674656, '[]'),
(434, 'Roble-Bermont-TEMPO_1T04-80', 'jpg', 'data/upload/image/2017/03/28', 1, 1490674661, '[]'),
(435, 'Nogal-Italiano-TEMPO_1T11', 'jpg', 'data/upload/image/2017/03/28', 1, 1490674856, '[]'),
(436, 'Nogal-Italiano-TEMPO_1T11-30', 'jpg', 'data/upload/image/2017/03/28', 1, 1490674862, '[]'),
(437, 'Cerezo-393-Formosa-TEMPO_0927', 'jpg', 'data/upload/image/2017/03/28', 1, 1490675157, '[]'),
(438, 'Cerezo-393-Formosa-TEMPO_0927-56', 'jpg', 'data/upload/image/2017/03/28', 1, 1490675161, '[]'),
(439, 'Image-3', 'jpg', 'data/upload/image/2017/03/31', 1, 1490931176, '[]'),
(440, '0', 'gif', 'data/upload/image/2017/03/31', 1, 1490934145, '[]'),
(441, 'Image-3-15', 'jpg', 'data/upload/image/2017/03/31', 1, 1490934154, '[]'),
(442, 'z622425482185_7ea9721b9403bd19bb33c9544c10b680', 'jpg', 'data/upload/image/2017/03/31', 1, 1490935276, '[]'),
(443, 'z603389249850_2b2be4bc4a8fecc9614e6a23d5a30f6e', 'jpg', 'data/upload/image/2017/04/01', 1, 1491017499, '[]'),
(444, 'Image-11', 'jpg', 'data/upload/image/2017/04/05', 1, 1491385147, '[]'),
(445, '0', 'gif', 'data/upload/image/2017/04/05', 1, 1491389988, '[]'),
(446, '17626345_1145901518853006_5966885633303758717_n', 'jpg', 'data/upload/image/2017/04/05', 1, 1491390033, '[]'),
(447, 'ACACIA-NATURAL-TEMPO_1T15-FULL', 'jpg', 'data/upload/image/2017/04/05', 1, 1491390112, '[]'),
(448, 'z622425482185_7ea9721b9403bd19bb33c9544c10b680', 'jpg', 'data/upload/image/2017/04/05', 1, 1491390404, '[]'),
(449, 'demo-1', 'gif', 'data/upload/image/2017/04/05', 1, 1491391009, '[]'),
(450, 'Demo-a', 'jpg', 'data/upload/image/2017/04/05', 1, 1491391121, '[]'),
(451, 'Slide-2', 'jpg', 'data/upload/image/2017/04/05', 1, 1491391530, '[]'),
(452, 'Slide-3', 'jpg', 'data/upload/image/2017/04/05', 1, 1491391637, '[]'),
(453, 'AMBIENTE-ESPIGA-CREAM-image1', 'jpg', 'data/upload/image/2017/04/05', 1, 1491391868, '[]'),
(454, 'LOGO', 'jpg', 'data/upload/image/2017/04/07', 1, 1491553719, '[]'),
(455, 'LOGO-80', 'jpg', 'data/upload/image/2017/04/07', 1, 1491553898, '[]'),
(456, 'LOGO-58', 'jpg', 'data/upload/image/2017/04/07', 1, 1491554041, '[]'),
(457, 'Demo-a', 'jpg', 'data/upload/image/2017/04/07', 1, 1491558122, '[]'),
(458, 'Untitled', 'jpg', 'data/upload/image/2017/04/07', 1, 1491559367, '[]'),
(459, 'in-to-toi-mat-trong', 'jpg', 'data/upload/image/2017/04/11', 1, 1491894564, '[]'),
(460, 'IMG_4449', 'JPG', 'data/upload/image/2017/04/11', 1, 1491895210, '[]'),
(461, '16105785_1073097939466698_4241086722847775341_n', 'jpg', 'data/upload/image/2017/04/12', 1, 1492006686, '[]'),
(462, '15977351_1073097312800094_8427829473073393594_n', 'jpg', 'data/upload/image/2017/04/12', 1, 1492006992, '[]'),
(463, '15977351_1073097312800094_8427829473073393594_n-46', 'jpg', 'data/upload/image/2017/04/12', 1, 1492007114, '[]'),
(464, '15965620_1073095579466934_2059205960902210184_n', 'jpg', 'data/upload/image/2017/04/12', 1, 1492007132, '[]'),
(465, 'z633172518940_4e4572c3ce944b2a5e8c54bad4ad002f', 'jpg', 'data/upload/image/2017/04/12', 1, 1492008328, '[]'),
(466, 'z633172518940_4e4572c3ce944b2a5e8c54bad4ad002f-32', 'jpg', 'data/upload/image/2017/04/12', 1, 1492008334, '[]'),
(467, 'z633182325664_8bfc33b2f0095ad952cb49a6bb66c172', 'jpg', 'data/upload/image/2017/04/12', 1, 1492008618, '[]'),
(468, 'z633182325664_8bfc33b2f0095ad952cb49a6bb66c172-79', 'jpg', 'data/upload/image/2017/04/12', 1, 1492008623, '[]'),
(469, 'IMG_4449', 'jpg', 'data/upload/image/2017/04/12', 1, 1492009101, '[]'),
(470, 'IMG_4449-85', 'jpg', 'data/upload/image/2017/04/12', 1, 1492009108, '[]'),
(471, 'IMG_4449', 'JPG', 'data/upload/image/2017/04/12', 1, 1492009187, '[]'),
(472, 'IMG_4451', 'jpg', 'data/upload/image/2017/04/12', 1, 1492009392, '[]'),
(473, 'IMG_4451-39', 'jpg', 'data/upload/image/2017/04/12', 1, 1492009398, '[]'),
(474, 'IMG_4451', 'JPG', 'data/upload/image/2017/04/12', 1, 1492009420, '[]'),
(475, 'IMG_4450', 'JPG', 'data/upload/image/2017/04/12', 1, 1492009644, '[]'),
(476, 'IMG_4450', 'jpg', 'data/upload/image/2017/04/12', 1, 1492009654, '[]'),
(477, 'IMG_4447', 'jpg', 'data/upload/image/2017/04/12', 1, 1492009847, '[]'),
(478, 'IMG_4447-62', 'jpg', 'data/upload/image/2017/04/12', 1, 1492009854, '[]'),
(479, 'IMG_4448', 'jpg', 'data/upload/image/2017/04/12', 1, 1492010054, '[]'),
(480, 'IMG_4448', 'JPG', 'data/upload/image/2017/04/12', 1, 1492010071, '[]'),
(481, 'IMG_4446', 'JPG', 'data/upload/image/2017/04/12', 1, 1492010235, '[]'),
(482, 'IMG_4446', 'jpg', 'data/upload/image/2017/04/12', 1, 1492010239, '[]'),
(483, 'IMG4', 'jpg', 'data/upload/image/2017/04/14', 1, 1492168655, '[]'),
(484, 'Cerezo-393-Formosa-TEMPO_amb_2-730x438', 'jpg', 'data/upload/image/2017/05/13', 1, 1494686201, '[]'),
(485, 'Faus-12', 'jpg', 'data/upload/image/2017/05/18', 1, 1495120416, '[]'),
(486, 'AMBIENTE-ESPIGA-CREAM', 'jpg', 'data/upload/image/2017/05/21', 1, 1495378176, '[]'),
(487, 'Espiga-Multicolor_amb7', 'jpg', 'data/upload/image/2017/05/21', 1, 1495378383, '[]'),
(488, 'anh-2', 'jpg', 'data/upload/image/2017/05/21', 1, 1495383511, '[]'),
(489, 'anh', 'jpg', 'data/upload/image/2017/05/21', 1, 1495383530, '[]'),
(490, 'anh31', 'jpg', 'data/upload/image/2017/05/21', 1, 1495384437, '[]'),
(491, 'Faus-12M', 'jpg', 'data/upload/image/2017/05/21', 1, 1495385454, '[]'),
(492, 'Faus-T3', 'jpg', 'data/upload/image/2017/05/22', 1, 1495386089, '[]'),
(493, 'Faus-T4', 'jpg', 'data/upload/image/2017/05/22', 1, 1495386208, '[]'),
(494, 'Faus-T5', 'jpg', 'data/upload/image/2017/05/22', 1, 1495386424, '[]'),
(495, 'BT8-N103-183x137', 'jpg', 'data/upload/image/2017/05/22', 1, 1495437374, '[]'),
(496, 'BT8-N103-183x137-29', 'jpg', 'data/upload/image/2017/05/22', 1, 1495437380, '[]'),
(497, 'BT8-N103-183x137-18', 'jpg', 'data/upload/image/2017/05/22', 1, 1495437464, '[]'),
(498, 'BT8-N103-183x137-63', 'jpg', 'data/upload/image/2017/05/22', 1, 1495437468, '[]'),
(499, 'IMG_4438', 'JPG', 'data/upload/image/2017/05/22', 1, 1495437525, '[]'),
(500, 'BT8-8691-183x137', 'jpg', 'data/upload/image/2017/05/22', 1, 1495437946, '[]'),
(501, 'IMG_4441', 'JPG', 'data/upload/image/2017/05/22', 1, 1495437991, '[]'),
(502, 'IMG_4440', 'JPG', 'data/upload/image/2017/05/22', 1, 1495438501, '[]'),
(503, 'BT8-13344-183x137', 'jpg', 'data/upload/image/2017/05/22', 1, 1495438505, '[]'),
(504, 'Faus-12', 'jpg', 'data/upload/image/2017/05/22', 1, 1495469505, '[]'),
(505, 'Banner-Website', 'jpg', 'data/upload/image/2017/05/22', 1, 1495469607, '[]'),
(506, '3T00', 'jpg', 'data/upload/image/2017/05/25', 1, 1495726275, '[]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_healthnews`
--

CREATE TABLE `tbl_healthnews` (
  `id` int(11) NOT NULL,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `introimage_id` int(10) UNSIGNED NOT NULL,
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
  `visits` int(11) UNSIGNED NOT NULL,
  `created_time` int(10) UNSIGNED NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_healthnews_image`
--

CREATE TABLE `tbl_healthnews_image` (
  `id` int(11) NOT NULL,
  `healthNews_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_image`
--

CREATE TABLE `tbl_image` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_image`
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
(58, 1, 'list-news-01', '', 0, 60, 1, 1410497853),
(59, 1, 'Capture', '', 0, 61, 1, 1410765596),
(60, 1, 'log', '', 0, 62, 1, 1410765711),
(61, 1, 'logo', '', 0, 63, 1, 1410765951),
(62, 1, 'logo-64', '', 0, 64, 1, 1410765976),
(63, 1, 'list-news-01', '', 0, 65, 1, 1410766192),
(64, 1, '12_copy', '', 0, 66, 1, 1410766501),
(65, 1, 'slider-01', '', 0, 67, 1, 1410767079),
(66, 1, 'slider-01-81', '', 0, 68, 1, 1410767138),
(67, 1, 'list-news-01-39', '', 0, 69, 1, 1410768795),
(68, 1, 'timthumb.php', '', 0, 70, 1, 1410768897),
(69, 1, 'Huong_solid_b_bi_469', '', 0, 71, 1, 1410769216),
(70, 1, 'Huong_solid_b_bi_469-84', '', 0, 72, 1, 1410773020),
(71, 1, 'chi-muc-02', '', 0, 73, 1, 1410773400),
(72, 1, 'chi-muc-02-66', '', 0, 74, 1, 1410773720),
(73, 1, 'chi-muc', '', 0, 75, 1, 1410774167),
(74, 1, '10_copy', '', 0, 76, 1, 1410774621),
(75, 1, '11a_copy', '', 0, 77, 1, 1410774654),
(76, 1, '14_copy', '', 0, 78, 1, 1410774694),
(77, 1, '16_copy', '', 0, 79, 1, 1410774902),
(78, 1, '14_copy-69', '', 0, 80, 1, 1410774980),
(79, 1, '10_copy-39', '', 0, 81, 1, 1410775028),
(80, 1, 'san_pham_01', '', 0, 82, 1, 1410775216),
(81, 1, 'san_pham_02', '', 0, 83, 1, 1410775371),
(82, 1, 'san_pham_05', '', 0, 84, 1, 1410775982),
(83, 1, 'san_pham_04', '', 0, 85, 1, 1410776031),
(84, 1, 'san_pham_04', '', 0, 86, 1, 1410831926),
(85, 1, 'san_pham_02', '', 0, 87, 1, 1410832083),
(86, 1, 'san_pham_03', '', 0, 88, 1, 1410832093),
(87, 1, 'san_pham_01', '', 0, 89, 1, 1410833320),
(88, 1, 'san_pham_07', '', 0, 90, 1, 1410834206),
(89, 1, 'san_pham_02-64', '', 0, 91, 1, 1410835465),
(90, 1, 'mau_san_go_thai_lan_an_tuong', '', 0, 92, 1, 1410836619),
(91, 1, 'phu-kien-1', '', 0, 93, 1, 1410840851),
(92, 1, 'phu-kien-2', '', 0, 94, 1, 1410841360),
(93, 1, 'phu-kien-5', '', 0, 95, 1, 1410841638),
(94, 1, 'timthumb.php', '', 0, 96, 1, 1411009545),
(95, 1, 'timthumb.php-73', '', 0, 97, 1, 1411012589),
(96, 1, 'timthumb.php-89', '', 0, 98, 1, 1411013332),
(97, 1, 'canh-tu-bep-Acrylic-04', '', 0, 99, 1, 1411022667),
(98, 1, 'logo-02', '', 0, 100, 1, 1415678559),
(99, 1, 'logo-02-01', '', 0, 101, 1, 1415679019),
(100, 1, 'logo-02-02', '', 0, 102, 1, 1415875435),
(101, 1, 'logo-02-02-12', '', 0, 103, 1, 1415875556),
(102, 1, 'nh-(13)', '', 0, 104, 1, 1416911129),
(103, 1, 'IMG_0381', '', 0, 105, 1, 1428726036),
(104, 1, 'IMG_0382', '', 0, 106, 1, 1428726054),
(105, 1, 'DSC_2464', '', 0, 107, 1, 1428726433),
(106, 1, 'DSC_2460', '', 0, 108, 1, 1428726445),
(107, 1, 'DSC_2435', '', 0, 109, 1, 1428726654),
(108, 1, 'DSC_2440', '', 0, 110, 1, 1428726668),
(109, 1, 'DSC_2425', '', 0, 111, 1, 1428726871),
(110, 1, 'DSC_2434', '', 0, 112, 1, 1428726882),
(111, 1, 'DSC_2443', '', 0, 113, 1, 1428727033),
(112, 1, 'DSC_2446', '', 0, 114, 1, 1428727045),
(113, 1, 'DSC_2475', '', 0, 115, 1, 1428727165),
(114, 1, 'DSC_2476', '', 0, 116, 1, 1428727176),
(115, 1, 'IMG_0562', '', 0, 117, 1, 1428727561),
(116, 1, 'IMG_0559', '', 0, 118, 1, 1428727582),
(117, 1, 'IMG_0370', '', 0, 119, 1, 1428727747),
(118, 1, 'IMG_0564', '', 0, 120, 1, 1428727785),
(119, 1, 'IMG_0565', '', 0, 121, 1, 1428727795),
(120, 1, 'IMG_0551', '', 0, 122, 1, 1428728018),
(121, 1, 'IMG_0553', '', 0, 123, 1, 1428728030),
(122, 1, 'IMG_0591', '', 0, 124, 1, 1428728503),
(123, 1, 'IMG_0590', '', 0, 125, 1, 1428728554),
(124, 1, 'IMG_0575', '', 0, 126, 1, 1428728664),
(125, 1, 'IMG_0572', '', 0, 127, 1, 1428728694),
(126, 1, 'IMG_0589', '', 0, 128, 1, 1428728848),
(127, 1, 'IMG_0587', '', 0, 129, 1, 1428728857),
(128, 1, 'Bien-dai-mo-moi', '', 0, 130, 1, 1428729105),
(129, 1, 'Bien-dai-mo-moi-23', '', 0, 131, 1, 1428729286),
(130, 1, 'Bien-dai-mo-moi-42', '', 0, 132, 1, 1428729293),
(131, 1, 'IMG_0551-36', '', 0, 133, 1, 1428729361),
(132, 1, 'IMG_0573', '', 0, 134, 1, 1428729372),
(133, 1, '1221', '', 0, 135, 1, 1428737169),
(134, 1, '1222', '', 0, 136, 1, 1428737475),
(135, 1, '1221-28', '', 0, 137, 1, 1428737868),
(136, 1, '1221-16', '', 0, 138, 1, 1428737876),
(137, 1, '1222-62', '', 0, 139, 1, 1428738078),
(138, 1, '1222-57', '', 0, 140, 1, 1428738081),
(139, 1, '1224', '', 0, 141, 1, 1428738235),
(140, 1, '1224-51', '', 0, 142, 1, 1428738243),
(141, 1, '1225', '', 0, 143, 1, 1428738397),
(142, 1, '1225-64', '', 0, 144, 1, 1428738404),
(143, 1, 'xop-trang', '', 0, 145, 1, 1428738704),
(144, 1, 'xop-trang-54', '', 0, 146, 1, 1428738709),
(145, 1, 'xop-bac', '', 0, 147, 1, 1428738861),
(146, 1, 'xop-bac-cuon', '', 0, 148, 1, 1428738955),
(147, 1, 'logo', '', 0, 149, 1, 1428750547),
(148, 1, 'Bien-dai-mo-moi-54', '', 0, 150, 1, 1428750696),
(149, 1, 'image', '', 0, 151, 1, 1428766065),
(150, 1, 'image-98', '', 0, 152, 1, 1428766105),
(151, 1, 'image-47', '', 0, 153, 1, 1428766220),
(152, 1, 'BN-D-13492', '', 0, 154, 1, 1428800478),
(153, 1, 'IMG_2444', '', 0, 155, 1, 1428800481),
(154, 1, 'images', '', 0, 156, 1, 1428801043),
(155, 1, 'images-(1)', '', 0, 157, 1, 1428801233),
(156, 1, 'images-(1)-73', '', 0, 158, 1, 1428801238),
(157, 1, 'images-(2)', '', 0, 159, 1, 1428801732),
(158, 1, 'images-(3)', '', 0, 160, 1, 1428801747),
(159, 1, 'images-(4)', '', 0, 161, 1, 1428803267),
(160, 1, 'images-(4)-98', '', 0, 162, 1, 1428803277),
(161, 1, 'download-(1)', '', 0, 163, 1, 1428804188),
(162, 1, 'images-(5)', '', 0, 164, 1, 1428804208),
(163, 1, 'logo', '', 0, 165, 1, 1429935973),
(164, 1, 'logo-10', '', 0, 166, 1, 1429936039),
(165, 1, 'Bien-dai-mo-moi', '', 0, 167, 1, 1429936098),
(166, 1, 'logo-62', '', 0, 168, 1, 1429936177),
(167, 1, 'logo-84', '', 0, 169, 1, 1429936238),
(168, 1, 'logo-63', '', 0, 170, 1, 1429938951),
(169, 1, 'logo-85', '', 0, 171, 1, 1429938983),
(170, 1, 'logo-45', '', 0, 172, 1, 1429939039),
(171, 1, 'Bien-dai-mo-moi-66', '', 0, 173, 1, 1429939300),
(172, 1, 'banner_header', '', 0, 174, 1, 1429939578),
(173, 1, 'banner_header-58', '', 0, 175, 1, 1429939586),
(174, 1, 'banner_header-79', '', 0, 176, 1, 1429939674),
(175, 1, 'IMG_1450', '', 0, 177, 1, 1431047917),
(176, 1, 'IMG_1450-25', '', 0, 178, 1, 1431047938),
(177, 1, 'IMG_1476', '', 0, 179, 1, 1431048169),
(178, 1, 'IMG_1477', '', 0, 180, 1, 1431048179),
(179, 1, 'IMG_1453', '', 0, 181, 1, 1431048357),
(180, 1, 'IMG_1452', '', 0, 182, 1, 1431048363),
(181, 1, 'IMG_1472', '', 0, 183, 1, 1431048611),
(182, 1, 'IMG_1473', '', 0, 184, 1, 1431048617),
(183, 1, 'IMG_1474', '', 0, 185, 1, 1431048819),
(184, 1, 'IMG_1475', '', 0, 186, 1, 1431048832),
(185, 1, 'IMG_1470', '', 0, 187, 1, 1431048990),
(186, 1, 'IMG_1471', '', 0, 188, 1, 1431049002),
(187, 1, 'IMG_1451', '', 0, 189, 1, 1431049090),
(188, 1, 'IMG_1451-68', '', 0, 190, 1, 1431049149),
(189, 1, 'IMG_1525', '', 0, 191, 1, 1431049295),
(190, 1, 'IMG_1526', '', 0, 192, 1, 1431049312),
(191, 1, 'IMG_1529', '', 0, 193, 1, 1431049491),
(192, 1, 'IMG_1531', '', 0, 194, 1, 1431049504),
(193, 1, 'IMG_1505', '', 0, 195, 1, 1431049637),
(194, 1, 'IMG_1506', '', 0, 196, 1, 1431049648),
(195, 1, 'IMG_1524', '', 0, 197, 1, 1431049924),
(196, 1, 'IMG_1523', '', 0, 198, 1, 1431049934),
(197, 1, 'IMG_1502', '', 0, 199, 1, 1431050152),
(198, 1, 'IMG_1504', '', 0, 200, 1, 1431050169),
(199, 1, 'IMG_1499', '', 0, 201, 1, 1431050298),
(200, 1, 'IMG_1501', '', 0, 202, 1, 1431050309),
(201, 1, 'IMG_1501-21', '', 0, 203, 1, 1431050333),
(202, 1, 'IMG_1491', '', 0, 204, 1, 1431050534),
(203, 1, 'IMG_1491-26', '', 0, 205, 1, 1431050556),
(204, 1, 'IMG_1508', '', 0, 206, 1, 1431050936),
(205, 1, 'IMG_1496', '', 0, 207, 1, 1431050998),
(206, 1, 'IMG_1516', '', 0, 208, 1, 1431051122),
(207, 1, 'IMG_1516-56', '', 0, 209, 1, 1431051136),
(208, 1, 'IMG_1493', '', 0, 210, 1, 1431051387),
(209, 1, 'IMG_1493-25', '', 0, 211, 1, 1431051410),
(210, 1, 'IMG_1468', '', 0, 212, 1, 1431051753),
(211, 1, 'IMG_1469', '', 0, 213, 1, 1431051759),
(212, 1, 'IMG_1478', '', 0, 214, 1, 1431051933),
(213, 1, 'IMG_1479', '', 0, 215, 1, 1431051948),
(214, 1, 'IMG_1556', '', 0, 216, 1, 1431070394),
(215, 1, 'IMG_1556-89', '', 0, 217, 1, 1431070410),
(216, 1, 'IMG_1556-94', '', 0, 218, 1, 1431070431),
(217, 1, 'IMG_1555', '', 0, 219, 1, 1431070579),
(218, 1, 'IMG_1555-97', '', 0, 220, 1, 1431070582),
(219, 1, 'IMG_1557', '', 0, 221, 1, 1431071009),
(220, 1, 'IMG_1557-30', '', 0, 222, 1, 1431071021),
(221, 1, 'IMG_1463', '', 0, 223, 1, 1431071233),
(222, 1, 'IMG_1463-25', '', 0, 224, 1, 1431071240),
(223, 1, 'IMG_1458', '', 0, 225, 1, 1431071428),
(224, 1, 'IMG_1459', '', 0, 226, 1, 1431071462),
(225, 1, 'IMG_1458-49', '', 0, 227, 1, 1431071696),
(226, 1, 'IMG_1459-12', '', 0, 228, 1, 1431071724),
(227, 1, 'IMG_1454', '', 0, 229, 1, 1431071972),
(228, 1, 'IMG_1454-52', '', 0, 230, 1, 1431071983),
(229, 1, 'IMG_1456', '', 0, 231, 1, 1431072109),
(230, 1, 'IMG_1457', '', 0, 232, 1, 1431072118),
(231, 1, 'IMG_1468-83', '', 0, 233, 1, 1431072584),
(232, 1, 'IMG_1469-67', '', 0, 234, 1, 1431072601),
(233, 1, 'IMG_1481', '', 0, 235, 1, 1431072867),
(234, 1, 'IMG_1480', '', 0, 236, 1, 1431072875),
(235, 1, 'IMG_1483', '', 0, 237, 1, 1431073113),
(236, 1, 'IMG_1483-84', '', 0, 238, 1, 1431073123),
(237, 1, 'IMG_1489', '', 0, 239, 1, 1431073199),
(238, 1, 'IMG_1489-16', '', 0, 240, 1, 1431073208),
(239, 1, 'IMG_1486', '', 0, 241, 1, 1431073283),
(240, 1, 'IMG_1486-31', '', 0, 242, 1, 1431073289),
(241, 1, 'IMG_1484', '', 0, 243, 1, 1431073367),
(242, 1, 'IMG_1484-28', '', 0, 244, 1, 1431073404),
(243, 1, 'IMG_1487', '', 0, 245, 1, 1431073848),
(244, 1, 'IMG_1486-39', '', 0, 246, 1, 1431073857),
(245, 1, 'IMG_1515', '', 0, 247, 1, 1431133647),
(246, 1, 'IMG_1515-38', '', 0, 248, 1, 1431133665),
(247, 1, 'IMG_1510', '', 0, 249, 1, 1431133909),
(248, 1, 'IMG_1510-36', '', 0, 250, 1, 1431133922),
(249, 1, 'IMG_1497', '', 0, 251, 1, 1431134168),
(250, 1, 'IMG_1497-37', '', 0, 252, 1, 1431134180),
(251, 1, 'IMG_1499', '', 0, 253, 1, 1431134392),
(252, 1, 'IMG_1499-42', '', 0, 254, 1, 1431134398),
(253, 1, 'IMG_1493', '', 0, 255, 1, 1431134963),
(254, 1, 'IMG_1493-62', '', 0, 256, 1, 1431134972),
(255, 1, 'IMG_1541', '', 0, 257, 1, 1431135053),
(256, 1, 'IMG_1541-98', '', 0, 258, 1, 1431135072),
(257, 1, 'IMG_1544', '', 0, 259, 1, 1431135175),
(258, 1, 'IMG_1544-21', '', 0, 260, 1, 1431135176),
(259, 1, 'IMG_1538', '', 0, 261, 1, 1431135247),
(260, 1, 'IMG_1538-96', '', 0, 262, 1, 1431135285),
(261, 1, 'IMG_1535', '', 0, 263, 1, 1431135383),
(262, 1, 'IMG_1535-70', '', 0, 264, 1, 1431135417),
(263, 1, 'IMG_1535-68', '', 0, 265, 1, 1431135438),
(264, 1, 'IMG_1533', '', 0, 266, 1, 1431135515),
(265, 1, 'IMG_1533-43', '', 0, 267, 1, 1431135546),
(266, 1, 'image', '', 0, 268, 1, 1431149959),
(267, 1, 'image-89', '', 0, 269, 1, 1431150026),
(268, 1, 'image-20', '', 0, 270, 1, 1431150028),
(269, 1, 'image-84', '', 0, 271, 1, 1431150042),
(270, 1, 'image-31', '', 0, 272, 1, 1431150063),
(271, 1, 'image-49', '', 0, 273, 1, 1431150211),
(272, 1, 'image-94', '', 0, 274, 1, 1431150233),
(273, 1, 'image-27', '', 0, 275, 1, 1431150374),
(274, 1, 'image-22', '', 0, 276, 1, 1431150400),
(275, 1, 'image-66', '', 0, 277, 1, 1431150538),
(276, 1, 'image-37', '', 0, 278, 1, 1431150554),
(277, 1, 'image-16', '', 0, 279, 1, 1431150596),
(278, 1, 'image-58', '', 0, 280, 1, 1431150610),
(279, 1, 'image-62', '', 0, 281, 1, 1431150739),
(280, 1, 'image-30', '', 0, 282, 1, 1431150753),
(281, 1, 'image-96', '', 0, 283, 1, 1431151056),
(282, 1, 'image-39', '', 0, 284, 1, 1431151074),
(283, 1, 'image-76', '', 0, 285, 1, 1431151372),
(284, 1, 'image-92', '', 0, 286, 1, 1431151385),
(285, 1, 'image', '', 0, 287, 1, 1431305951),
(286, 1, 'image-25', '', 0, 288, 1, 1431305963),
(287, 1, 'image-21', '', 0, 289, 1, 1431306374),
(288, 1, 'image-31', '', 0, 290, 1, 1431306411),
(289, 1, 'image-72', '', 0, 291, 1, 1431306527),
(290, 1, 'image-77', '', 0, 292, 1, 1431306548),
(291, 1, 'image-91', '', 0, 293, 1, 1431306970),
(292, 1, 'image-42', '', 0, 294, 1, 1431306998),
(293, 1, 'image-64', '', 0, 295, 1, 1431307032),
(294, 1, 'image-71', '', 0, 296, 1, 1431307050),
(295, 1, 'image-46', '', 0, 297, 1, 1431307219),
(296, 1, 'image-83', '', 0, 298, 1, 1431307237),
(297, 1, 'image-20', '', 0, 299, 1, 1431307528),
(298, 1, 'image-16', '', 0, 300, 1, 1431307538),
(299, 1, 'image-21-76', '', 0, 301, 1, 1431307764),
(300, 1, 'image-22', '', 0, 302, 1, 1431307776),
(301, 1, 'image-76', '', 0, 303, 1, 1431307892),
(302, 1, 'image-87', '', 0, 304, 1, 1431307904),
(303, 1, 'image-72-52', '', 0, 305, 1, 1431308119),
(304, 1, 'image-96', '', 0, 306, 1, 1431308136),
(305, 1, 'image-49', '', 0, 307, 1, 1431308539),
(306, 1, 'image-18', '', 0, 308, 1, 1431308555),
(307, 1, 'image-52', '', 0, 309, 1, 1431308692),
(308, 1, 'image-33', '', 0, 310, 1, 1431308705),
(309, 1, 'image-60', '', 0, 311, 1, 1431308800),
(310, 1, 'image-96-12', '', 0, 312, 1, 1431308820),
(311, 1, 'image-36', '', 0, 313, 1, 1431309043),
(312, 1, 'image-21-31', '', 0, 314, 1, 1431309060),
(313, 1, 'image-31-40', '', 0, 315, 1, 1431309322),
(314, 1, 'image-48', '', 0, 316, 1, 1431309336),
(315, 1, 'image-66', '', 0, 317, 1, 1431309462),
(316, 1, 'image-44', '', 0, 318, 1, 1431309491),
(317, 1, 'image-25-87', '', 0, 319, 1, 1431309670),
(318, 1, 'image-13', '', 0, 320, 1, 1431309685),
(319, 1, 'image-54', '', 0, 321, 1, 1431309921),
(320, 1, 'image-15', '', 0, 322, 1, 1431309933),
(321, 1, 'image-44-51', '', 0, 323, 1, 1431310030),
(322, 1, 'image-38', '', 0, 324, 1, 1431310039),
(323, 1, 'image-82', '', 0, 325, 1, 1431310248),
(324, 1, 'image-11', '', 0, 326, 1, 1431310258),
(325, 1, 'image-65', '', 0, 327, 1, 1431311006),
(326, 1, 'image-97', '', 0, 328, 1, 1431311024),
(327, 1, 'image-90', '', 0, 329, 1, 1431311299),
(328, 1, 'image-68', '', 0, 330, 1, 1431311317),
(329, 1, 'image-92', '', 0, 331, 1, 1431311452),
(330, 1, 'image-68-28', '', 0, 332, 1, 1431311479),
(331, 1, 'image-87-50', '', 0, 333, 1, 1431312152),
(332, 1, 'image-46-72', '', 0, 334, 1, 1431312170),
(333, 1, 'image-49-79', '', 0, 335, 1, 1431312314),
(334, 1, 'image-53', '', 0, 336, 1, 1431312329),
(335, 1, 'image-74', '', 0, 337, 1, 1431312548),
(336, 1, 'image-31-70', '', 0, 338, 1, 1431312571),
(337, 1, 'image-12', '', 0, 339, 1, 1431313256),
(338, 1, 'image-31-56', '', 0, 340, 1, 1431313283),
(339, 1, 'image-51', '', 0, 341, 1, 1431313396),
(340, 1, 'image-66-61', '', 0, 342, 1, 1431313410),
(341, 1, 'image-92-47', '', 0, 343, 1, 1431313643),
(342, 1, 'image-48-86', '', 0, 344, 1, 1431313668),
(343, 1, 'image-58', '', 0, 345, 1, 1431313748),
(344, 1, 'image-46-51', '', 0, 346, 1, 1431313764),
(345, 1, 'image-75', '', 0, 347, 1, 1431313887),
(346, 1, 'image-19', '', 0, 348, 1, 1431313922),
(347, 1, 'image-13-68', '', 0, 349, 1, 1431314035),
(348, 1, 'image-24', '', 0, 350, 1, 1431314049),
(349, 1, 'image-32', '', 0, 351, 1, 1431314147),
(350, 1, 'image-35', '', 0, 352, 1, 1431314164),
(351, 1, 'image-74-15', '', 0, 353, 1, 1431314577),
(352, 1, 'image-68-92', '', 0, 354, 1, 1431314592),
(353, 1, 'image-67', '', 0, 355, 1, 1431314708),
(354, 1, 'image-95', '', 0, 356, 1, 1431314719),
(355, 1, 'image-53-58', '', 0, 357, 1, 1431314870),
(356, 1, 'image-17', '', 0, 358, 1, 1431314889),
(357, 1, 'image-64-94', '', 0, 359, 1, 1431314964),
(358, 1, 'image-52-35', '', 0, 360, 1, 1431314976),
(359, 1, 'image-54-45', '', 0, 361, 1, 1431315100),
(360, 1, 'image-59', '', 0, 362, 1, 1431315110),
(361, 1, 'image', '', 0, 363, 1, 1431602936),
(362, 1, 'image-70', '', 0, 364, 1, 1431602954),
(363, 1, 'image-39', '', 0, 365, 1, 1431603408),
(364, 1, 'image-88', '', 0, 366, 1, 1431603604),
(365, 1, 'image-21', '', 0, 367, 1, 1431603625),
(366, 1, 'image-76', '', 0, 368, 1, 1431609799),
(367, 1, 'image', '', 0, 369, 1, 1431918597),
(368, 1, 'image-34', '', 0, 370, 1, 1431918620),
(369, 1, 'image-17', '', 0, 371, 1, 1431918640),
(370, 1, 'BT8-9321', '', 0, 372, 1, 1432259392),
(371, 1, 'BT8-9321-12', '', 0, 373, 1, 1432259400),
(372, 1, 'feature_verlegecenter_new', '', 0, 374, 1, 1432262542),
(373, 1, 'feature_verlegecenter_new-12', '', 0, 375, 1, 1432262552),
(374, 1, 'feature_verlegecenter_new-38', '', 0, 376, 1, 1432262910),
(375, 1, 'haro-2', '', 0, 377, 1, 1432263113),
(376, 1, 'haro-2-80', '', 0, 378, 1, 1432294822),
(377, 1, 'haro-2-92', '', 0, 379, 1, 1432294845),
(378, 1, 'hao', '', 0, 380, 1, 1432294870),
(379, 1, 'haro-2-75', '', 0, 381, 1, 1432294926),
(380, 1, 'hao-15', '', 0, 382, 1, 1432294991),
(381, 1, 'haro-2-31', '', 0, 383, 1, 1432295143),
(382, 1, '12', '', 0, 384, 1, 1432295321),
(383, 1, '12-99', '', 0, 385, 1, 1432295342),
(384, 1, '13', '', 0, 386, 1, 1432295712),
(385, 1, 'Banner01', '', 0, 387, 1, 1432296225),
(386, 1, 'Banner02', '', 0, 388, 1, 1432296321),
(387, 1, 'Banner01-15', '', 0, 389, 1, 1432296600),
(388, 1, 'Bien-dai-mo-moi-in-sua-banner', '', 0, 390, 1, 1432296788),
(389, 1, 'Bien-dai-mo-moi-in-sua-banner-80', '', 0, 391, 1, 1432296855),
(390, 1, 'Bien-dai-mo-moi-in-sua-banner-40', '', 0, 392, 1, 1432296917),
(391, 1, 'Bien-dai-mo-moi-in-sua-banner-32', '', 0, 393, 1, 1432297286),
(392, 1, 'main-product-01', '', 0, 394, 1, 1433316470),
(393, 1, 'main-product-01-31', '', 0, 395, 1, 1433316508),
(394, 1, 'main-product-01-41', '', 0, 396, 1, 1433316572),
(395, 1, 'main-product-01-33', '', 0, 397, 1, 1433316611),
(396, 1, 'thaigreen-02', '', 0, 398, 1, 1433385385),
(397, 1, 'main-product-01', '', 0, 399, 1, 1433926167),
(398, 1, 'thaigreen-02', '', 0, 400, 1, 1433926290),
(399, 1, 'image', '', 0, 401, 1, 1470554614),
(400, 1, 'image-44', '', 0, 402, 1, 1470554624),
(401, 1, 'image-10', '', 0, 403, 1, 1470554894),
(402, 1, 'image-21', '', 0, 404, 1, 1470554905),
(403, 1, 'image-16', '', 0, 405, 1, 1470555145),
(404, 1, 'image-70', '', 0, 406, 1, 1470555158),
(405, 1, 'image-43', '', 0, 407, 1, 1470555408),
(406, 1, 'image-22', '', 0, 408, 1, 1470555416),
(407, 1, 'image-80', '', 0, 409, 1, 1470555601),
(408, 1, 'image-65', '', 0, 410, 1, 1470555609),
(409, 1, 'image-56', '', 0, 411, 1, 1470555870),
(410, 1, 'image-59', '', 0, 412, 1, 1470555876),
(411, 1, 'image-10-75', '', 0, 413, 1, 1470555986),
(412, 1, 'image-46', '', 0, 414, 1, 1470555994),
(413, 1, 'Faus-Logo-1', '', 0, 415, 1, 1490351670),
(414, 1, 'Faus-Logo-1-95', '', 0, 416, 1, 1490351681),
(415, 1, 'Faus-Logo-2', '', 0, 417, 1, 1490351686),
(416, 1, 'z613977799920_b9574feaf2345312b21d7ff738d453ef', '', 0, 418, 1, 1490351978),
(417, 1, 'z613977799920_b9574feaf2345312b21d7ff738d453ef-95', '', 0, 419, 1, 1490351987),
(418, 1, 'z608985351459_0e24b2fce91314c84427c70954c6efdd', '', 0, 420, 1, 1490352104),
(419, 1, 'Image-15', '', 0, 421, 1, 1490352392),
(420, 1, 'Image-15-25', '', 0, 422, 1, 1490352895),
(421, 1, 'Image-15-18', '', 0, 423, 1, 1490353042),
(422, 1, 'z608985351459_0e24b2fce91314c84427c70954c6efdd-63', '', 0, 424, 1, 1490353415),
(423, 1, 'z608985351459_0e24b2fce91314c84427c70954c6efdd-78', '', 0, 425, 1, 1490353420),
(424, 1, 'Faus-Logo-2-91', '', 0, 426, 1, 1490353555),
(425, 1, 'ACACIA-NATURAL-TEMPO_1T15-FULL', '', 0, 427, 1, 1490671775),
(426, 1, 'ACACIA-NATURAL-TEMPO_1T15-FULL-45', '', 0, 428, 1, 1490671863),
(427, 1, 'Roble-Seleccion-TEMPO_1T02', '', 0, 429, 1, 1490673881),
(428, 1, 'Roble-Seleccion-TEMPO_1T02-19', '', 0, 430, 1, 1490673918),
(429, 1, 'Roble-Alhambra-TEMPO_1T07', '', 0, 431, 1, 1490674238),
(430, 1, 'Roble-Alhambra-TEMPO_1T07-31', '', 0, 432, 1, 1490674252),
(431, 1, 'Roble-Bermont-TEMPO_1T04', '', 0, 433, 1, 1490674656),
(432, 1, 'Roble-Bermont-TEMPO_1T04-80', '', 0, 434, 1, 1490674661),
(433, 1, 'Nogal-Italiano-TEMPO_1T11', '', 0, 435, 1, 1490674856),
(434, 1, 'Nogal-Italiano-TEMPO_1T11-30', '', 0, 436, 1, 1490674862),
(435, 1, 'Cerezo-393-Formosa-TEMPO_0927', '', 0, 437, 1, 1490675157),
(436, 1, 'Cerezo-393-Formosa-TEMPO_0927-56', '', 0, 438, 1, 1490675161),
(437, 1, 'Image-3', '', 0, 439, 1, 1490931176),
(438, 1, '0', '', 0, 440, 1, 1490934145),
(439, 1, 'Image-3-15', '', 0, 441, 1, 1490934154),
(440, 1, 'z622425482185_7ea9721b9403bd19bb33c9544c10b680', '', 0, 442, 1, 1490935276),
(441, 1, 'z603389249850_2b2be4bc4a8fecc9614e6a23d5a30f6e', '', 0, 443, 1, 1491017499),
(442, 1, 'Image-11', '', 0, 444, 1, 1491385147),
(443, 1, '0', '', 0, 445, 1, 1491389988),
(444, 1, '17626345_1145901518853006_5966885633303758717_n', '', 0, 446, 1, 1491390033),
(445, 1, 'ACACIA-NATURAL-TEMPO_1T15-FULL', '', 0, 447, 1, 1491390112),
(446, 1, 'z622425482185_7ea9721b9403bd19bb33c9544c10b680', '', 0, 448, 1, 1491390404),
(447, 1, 'demo-1', '', 0, 449, 1, 1491391009),
(448, 1, 'Demo-a', '', 0, 450, 1, 1491391121),
(449, 1, 'Slide-2', '', 0, 451, 1, 1491391530),
(450, 1, 'Slide-3', '', 0, 452, 1, 1491391637),
(451, 1, 'AMBIENTE-ESPIGA-CREAM-image1', '', 0, 453, 1, 1491391868),
(452, 1, 'LOGO', '', 0, 454, 1, 1491553719),
(453, 1, 'LOGO-80', '', 0, 455, 1, 1491553898),
(454, 1, 'LOGO-58', '', 0, 456, 1, 1491554041),
(455, 1, 'Demo-a', '', 0, 457, 1, 1491558122),
(456, 1, 'Untitled', '', 0, 458, 1, 1491559367),
(457, 1, 'in-to-toi-mat-trong', '', 0, 459, 1, 1491894564),
(458, 1, 'IMG_4449', '', 0, 460, 1, 1491895210),
(459, 1, '16105785_1073097939466698_4241086722847775341_n', '', 0, 461, 1, 1492006686),
(460, 1, '15977351_1073097312800094_8427829473073393594_n', '', 0, 462, 1, 1492006992),
(461, 1, '15977351_1073097312800094_8427829473073393594_n-46', '', 0, 463, 1, 1492007114),
(462, 1, '15965620_1073095579466934_2059205960902210184_n', '', 0, 464, 1, 1492007132),
(463, 1, 'z633172518940_4e4572c3ce944b2a5e8c54bad4ad002f', '', 0, 465, 1, 1492008328),
(464, 1, 'z633172518940_4e4572c3ce944b2a5e8c54bad4ad002f-32', '', 0, 466, 1, 1492008334),
(465, 1, 'z633182325664_8bfc33b2f0095ad952cb49a6bb66c172', '', 0, 467, 1, 1492008618),
(466, 1, 'z633182325664_8bfc33b2f0095ad952cb49a6bb66c172-79', '', 0, 468, 1, 1492008623),
(467, 1, 'IMG_4449', '', 0, 469, 1, 1492009101),
(468, 1, 'IMG_4449-85', '', 0, 470, 1, 1492009108),
(469, 1, 'IMG_4449', '', 0, 471, 1, 1492009187),
(470, 1, 'IMG_4451', '', 0, 472, 1, 1492009392),
(471, 1, 'IMG_4451-39', '', 0, 473, 1, 1492009398),
(472, 1, 'IMG_4451', '', 0, 474, 1, 1492009420),
(473, 1, 'IMG_4450', '', 0, 475, 1, 1492009644),
(474, 1, 'IMG_4450', '', 0, 476, 1, 1492009654),
(475, 1, 'IMG_4447', '', 0, 477, 1, 1492009847),
(476, 1, 'IMG_4447-62', '', 0, 478, 1, 1492009854),
(477, 1, 'IMG_4448', '', 0, 479, 1, 1492010054),
(478, 1, 'IMG_4448', '', 0, 480, 1, 1492010071),
(479, 1, 'IMG_4446', '', 0, 481, 1, 1492010235),
(480, 1, 'IMG_4446', '', 0, 482, 1, 1492010239),
(481, 1, 'IMG4', '', 0, 483, 1, 1492168655),
(482, 1, 'Cerezo-393-Formosa-TEMPO_amb_2-730x438', '', 0, 484, 1, 1494686201),
(483, 1, 'Faus-12', '', 0, 485, 1, 1495120416),
(484, 1, 'AMBIENTE-ESPIGA-CREAM', '', 0, 486, 1, 1495378177),
(485, 1, 'Espiga-Multicolor_amb7', '', 0, 487, 1, 1495378383),
(486, 1, 'anh-2', '', 0, 488, 1, 1495383511),
(487, 1, 'anh', '', 0, 489, 1, 1495383530),
(488, 1, 'anh31', '', 0, 490, 1, 1495384437),
(489, 1, 'Faus-12M', '', 0, 491, 1, 1495385454),
(490, 1, 'Faus-T3', '', 0, 492, 1, 1495386089),
(491, 1, 'Faus-T4', '', 0, 493, 1, 1495386208),
(492, 1, 'Faus-T5', '', 0, 494, 1, 1495386424),
(493, 1, 'BT8-N103-183x137', '', 0, 495, 1, 1495437374),
(494, 1, 'BT8-N103-183x137-29', '', 0, 496, 1, 1495437380),
(495, 1, 'BT8-N103-183x137-18', '', 0, 497, 1, 1495437464),
(496, 1, 'BT8-N103-183x137-63', '', 0, 498, 1, 1495437468),
(497, 1, 'IMG_4438', '', 0, 499, 1, 1495437525),
(498, 1, 'BT8-8691-183x137', '', 0, 500, 1, 1495437946),
(499, 1, 'IMG_4441', '', 0, 501, 1, 1495437991),
(500, 1, 'IMG_4440', '', 0, 502, 1, 1495438501),
(501, 1, 'BT8-13344-183x137', '', 0, 503, 1, 1495438505),
(502, 1, 'Faus-12', '', 0, 504, 1, 1495469505),
(503, 1, 'Banner-Website', '', 0, 505, 1, 1495469607),
(504, 1, '3T00', '', 0, 506, 1, 1495726275);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_intro`
--

CREATE TABLE `tbl_intro` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_intro`
--

INSERT INTO `tbl_intro` (`id`, `language`, `status`, `title`, `cat_id`, `introimage_id`, `order_view`, `new`, `home`, `footer`, `other`, `visits`, `created_by`, `created_time`) VALUES
(5, 'vi', 1, 'Voyages équitables et développement local', 8, 0, 0, 0, 1, 0, '{\"meta_title\":\"Voyages \\u00e9quitables et d\\u00e9veloppement local\",\"meta_keyword\":\"Voyages \\u00e9quitables et d\\u00e9veloppement local\",\"meta_description\":\"Voyages \\u00e9quitables et d\\u00e9veloppement local\",\"content\":\"<p><span>A la rencontre des peuples et des <strong>culturesNotre<\\/strong> volont&eacute; est de vous faire d&eacute;couvrir <strong>des lieux<\\/strong> qui nous ont &eacute;mus, de partager notre go&ucirc;t du voyage humaniste, nos r&ecirc;ves de beaut&eacute;, en approchant, tout en douceur, les r&eacute;alit&eacute;s de la vie locale.<\\/span><\\/p>\"}', 0, 1, 1387334175),
(6, 'vi', 1, 'Du lịch tự chọn', 16, 33, 0, 1, 0, 0, '{\"meta_title\":\"Du l\\u1ecbch t\\u1ef1 ch\\u1ecdn\",\"meta_keyword\":\"Du l\\u1ecbch t\\u1ef1 ch\\u1ecdn\",\"meta_description\":\"Du l\\u1ecbch t\\u1ef1 ch\\u1ecdn\",\"content\":\"<p>Ch&uacute;ng t&ocirc;i c&oacute; nh\\u1eefng g\\u1ee3i &yacute; cho c&aacute;c b\\u1ea1n, h&atilde;y tham kh\\u1ea3o danh s&aacute;ch c&aacute;c \\u0111i\\u1ec3m \\u0111\\u1ebfn h\\u1ea5p d\\u1eabn c\\u1ee7a Vi\\u1ec7t Nam, m&agrave; ch&uacute;ng t&ocirc;i \\u0111\\u1ec1 xu\\u1ea5t.<\\/p>\"}', 0, 1, 1387525206),
(7, 'vi', 1, 'Chính sách khuyến mãi chung', 8, 0, 0, 0, 0, 1, '{\"meta_title\":\"Ch\\u00ednh s\\u00e1ch khuy\\u1ebfn m\\u00e3i chung\",\"meta_keyword\":\"Ch\\u00ednh s\\u00e1ch khuy\\u1ebfn m\\u00e3i chung\",\"meta_description\":\"Ch\\u00ednh s\\u00e1ch khuy\\u1ebfn m\\u00e3i chung\",\"content\":\"<p>Vous &ecirc;tes un groupe d\'un minimum de <strong>4 personnes<\\/strong>...<\\/p>\\r\\n<p>Vous d&eacute;sirez un voyage particulier, individualis&eacute;, un d&eacute;part d&eacute;cal&eacute;...,<\\/p>\\r\\n<p>Vous d&eacute;sirez profiter de notre exp&eacute;rience pour organiser un stage en pleine nature (dunes, montagne, bord de rivi&egrave;re ou d\'oc&eacute;an). C\'est possible, t&eacute;l&eacute;phonez-nous, <strong>envoyez-nous un mail.<\\/strong><\\/p>\"}', 0, 1, 1388732260);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `language` char(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vi',
  `type` smallint(6) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_view` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `other` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `language`, `type`, `name`, `parent_id`, `order_view`, `status`, `other`, `created_by`, `created_time`) VALUES
(4, 'vi', 1, 'Trang chủ', 0, 1, 1, '{\"url\":\"\\/\",\"target\":\"\",\"rel\":\"\",\"title\":\"Trang ch\\u1ee7\"}', 1, 1373012738),
(5, 'vi', 1, 'Giới thiệu', 0, 3, 1, '{\"url\":\"\\/nhom-tin\\/3\\/gioi-thieu\",\"target\":\"\",\"rel\":\"\",\"title\":\"Gi\\u1edbi thi\\u1ec7u\"}', 1, 1373012744),
(10, 'vi', 1, 'Sản phẩm', 0, 3, 1, '{\"url\":\"\\/san-pham\",\"target\":\"\",\"rel\":\"\",\"title\":\"S\\u1ea3n ph\\u1ea9m\"}', 1, 1373259210),
(13, 'en', 1, 'Home', 0, 1, 1, '{\"url\":\"\\/home.aspx\",\"target\":\"\",\"rel\":\"\",\"title\":\"Home page\"}', 1, 1377688706),
(14, 'en', 1, 'About us', 0, 1, 1, '{\"url\":\"\\/about-us.aspx\",\"target\":\"\",\"rel\":\"\",\"title\":\"About us\"}', 1, 1377688722),
(15, 'en', 1, 'Products', 0, 3, 1, '{\"url\":\"\\/products.aspx\",\"target\":\"\",\"rel\":\"\",\"title\":\"Products\"}', 1, 1377688734),
(16, 'en', 1, 'Health categories', 0, 4, 1, '{\"url\":\"\\/health-categories.aspx\",\"target\":\"\",\"rel\":\"\",\"title\":\"Health Categories of A Au\"}', 1, 1377688785),
(17, 'en', 1, 'Advisory board', 0, 6, 1, '{\"url\":\"\\/advisory-board.aspx\",\"target\":\"\",\"rel\":\"\",\"title\":\"Advisory board\"}', 1, 1377688832),
(18, 'en', 1, 'Health consultancy', 0, 5, 1, '{\"url\":\"\\/health-consultancy.aspx\",\"target\":\"\",\"rel\":\"\",\"title\":\"Health consultancy\"}', 1, 1377688845),
(29, 'en', 1, 'Medical News', 16, 1, 1, '{\"url\":\"\\/health-categories\\/medical-news.aspx\",\"title\":\"Mediacal news\",\"target\":\"\",\"rel\":\"\"}', 1, 1383538002),
(30, 'en', 1, 'Treatment experience', 16, 2, 1, '{\"url\":\"\\/health-categories\\/treatment-experience.aspx\",\"title\":\"Treatment experience\",\"target\":\"\",\"rel\":\"\"}', 1, 1383538030),
(31, 'en', 1, 'Nutrition diet', 16, 3, 1, '{\"url\":\"\\/health-categories\\/nutrition-diet.aspx\",\"title\":\"Nutrition diet\",\"target\":\"\",\"rel\":\"\"}', 1, 1383538059),
(36, 'vi', 1, 'Tin tức', 0, 4, 1, '{\"url\":\"\\/nhom-tin\\/2\\/tin-tuc\",\"title\":\"Tin t\\u1ee9c\",\"target\":\"\",\"rel\":\"\"}', 1, 1387526514),
(37, 'vi', 1, 'Phân phối', 0, 6, 1, '{\"url\":\"\\/nhom-tin\\/9\\/he-thong\",\"title\":\"Ph\\u00e2n Ph\\u1ed1i\",\"target\":\"\",\"rel\":\"\"}', 1, 1387526569),
(42, 'vi', 1, 'Liên hệ', 0, 8, 1, '{\"url\":\"\\/contact\",\"title\":\"Li\\u00ean h\\u1ec7\",\"target\":\"\",\"rel\":\"\"}', 1, 1410231954),
(43, 'vi', 1, 'Sàn gỗ ThaiGreen', 10, 1, 1, '{\"url\":\"\\/sanpham\",\"title\":\"S\\u00e0n G\\u1ed7 ThaiGreen\",\"target\":\"\",\"rel\":\"\"}', 1, 1433232250),
(44, 'vi', 1, 'Thi Công', 0, 5, 1, '{\"url\":\"\\/nhom-tin\\/10\\/thi-cong\",\"title\":\"Thi c\\u00f4ng\",\"target\":\"\",\"rel\":\"\"}', 1, 1495375239);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) UNSIGNED NOT NULL,
  `language` char(8) NOT NULL,
  `cat_id` int(11) UNSIGNED NOT NULL,
  `introimage_id` int(10) UNSIGNED NOT NULL,
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
  `visits` int(10) UNSIGNED NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `language`, `cat_id`, `introimage_id`, `news_image`, `alias`, `meta_keyword`, `meta_description`, `name`, `meta_title`, `introtext`, `content`, `other`, `source`, `order_view`, `home`, `new`, `status`, `created_time`, `CreateDate`, `visits`, `created_by`) VALUES
(15, 'vi', 49, 457, '', 'catologo-fausfloor', '', '', 'Catologo Fausfloor', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y ban nha\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 Fausfoor S\\u1ea3n xu\\u1ea5t t\\u1ea1i T\\u00e2y Ban Nha\",\"meta_description\":\"S\\u00e0n g\\u1ed7 Fausfloor Made in Spain\",\"introtext\":\"\",\"content\":\"<p>Ch\\u01b0\\u01a1ng tr&igrave;nh khuy\\u1ebfn m&atilde;i th&aacute;ng 9 c\\u1ee7a T\\u1ed5ng kho g\\u1ed7 Vi\\u1ec7t Ph&aacute;t \\u0111ang \\u0111\\u01b0\\u1ee3c c\\u1eadp nh\\u1eadt!<\\/p>\"}', '', 0, 1, 1, 1, 1410245995, '', 0, 1),
(16, 'vi', 2, 53, '', 'san-go-cong-nghiep', '', '', 'Sàn gỗ công nghiệp', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p\",\"introtext\":\"<p><span>To&agrave;n b\\u1ed9 c&aacute;c t\\u1ea5m v&aacute;n s&agrave;n v&agrave; c\\u1ea1nh h&egrave;m \\u0111\\u1ec1u ph\\u1ee7 l\\u1edbp ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; \\u0111\\u1ed9 \\u1ea9m th&acirc;m nh\\u1eadp. C\\u01b0\\u1eddng \\u0111\\u1ed9 ch\\u1ecbu t\\u1ea3i&nbsp;<\\/span><\\/p>\",\"content\":\"<p><span>To&agrave;n b\\u1ed9 c&aacute;c t\\u1ea5m v&aacute;n s&agrave;n v&agrave; c\\u1ea1nh h&egrave;m \\u0111\\u1ec1u ph\\u1ee7 l\\u1edbp ch\\u1ed1ng n\\u01b0\\u1edbc v&agrave; \\u0111\\u1ed9 \\u1ea9m th&acirc;m nh\\u1eadp. C\\u01b0\\u1eddng \\u0111\\u1ed9 ch\\u1ecbu t\\u1ea3i&nbsp;<\\/span><\\/p>\"}', '', 0, 0, 1, 1, 1410257173, '', 0, 1),
(23, 'vi', 3, 488, '', 'san-go-viet-phat', '', '', 'Sàn gỗ Việt Phát', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"S\\u00e0n g\\u1ed7 Vi\\u1ec7t Ph\\u00e1t\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 Vi\\u1ec7t Ph\\u00e1t\",\"meta_description\":\"S\\u00e0n g\\u1ed7 Vi\\u1ec7t Ph\\u00e1t\",\"introtext\":\"<p>Ch&uacute;ng t&ocirc;i mang t\\u1edbi h\\u01a1n 300 s\\u1ef1 l\\u1ef1a ch\\u1ecdn v\\u1ec1 c&aacute;c m\\u1eabu s&agrave;n g\\u1ed7, c&aacute;c ch\\u1ea5t li\\u1ec7u v&agrave; ki\\u1ec3u gi&aacute;ng s&agrave;n g\\u1ed7, ph&acirc;n ph\\u1ed1i c&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 cao c\\u1ea5p c&oacute; \\u0111\\u1ed9 b\\u1ec1n cao, thi c&ocirc;ng s&agrave;n g\\u1ed7 chuy&ecirc;n nghi\\u1ec7p, uy t&iacute;n v\\u1edbi \\u0111\\u1ed9i ng\\u0169 th\\u1ee3 l&agrave;nh ngh\\u1ec1 tr&ecirc;n 5 n\\u0103m kinh nghi\\u1ec7m.<\\/p>\",\"content\":\"<p><strong><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/05\\/21\\/anh31.jpg\\\" alt=\\\"\\\" width=\\\"220\\\" height=\\\"118\\\" \\/><\\/strong><\\/p>\\r\\n<p><strong>S&agrave;n g\\u1ed7<\\/strong> \\u0111&atilde; tr\\u1edf th&agrave;nh m\\u1ed9t v\\u1eadt li\\u1ec7u quen thu\\u1ed9c khi thi\\u1ebft k\\u1ebf v&agrave; trang tr&iacute; n\\u1ed9i th\\u1ea5t trong c&aacute;c ng&ocirc;i nh&agrave; sang tr\\u1ecdng. G\\u1ed7 v\\u1edbi n&eacute;t c\\u1ed5 \\u0111i\\u1ec3n, l\\u1ecbch l&atilde;m, th&acirc;n thi\\u1ec7n v\\u1edbi t\\u1ef1 nhi&ecirc;n,&nbsp;l&agrave; ch\\u1ea5t li\\u1ec7u kh&ocirc;ng ch\\u1ec9 ng\\u01b0\\u1eddi Vi\\u1ec7t y&ecirc;u d&ugrave;ng m&agrave; c&oacute; s\\u1ee9c lan t\\u1ecfa tr&ecirc;n to&agrave;n th\\u1ebf gi\\u1edbi, trong \\u0111&oacute; <strong>s&agrave;n g\\u1ed7<\\/strong> l&agrave; m\\u1ed9t trong nh\\u1eefng \\u1ee9ng d\\u1ee5ng tuy\\u1ec7t v\\u1eddi, m\\u1ed9t m&oacute;n qu&agrave; c\\u1ee7a thi&ecirc;n nhi&ecirc;n ban t\\u1eb7ng. Ng&agrave;y nay v\\u1edbi s\\u1ef1 k\\u1ebft h\\u1ee3p c\\u1ee7a c&ocirc;ng ngh\\u1ec7 ti&ecirc;n ti\\u1ebfn, s&agrave;n g\\u1ed7&nbsp;ng&agrave;y c&agrave;ng c&oacute; nhi\\u1ec1u ki\\u1ec3u gi&aacute;ng, k&iacute;ch th\\u01b0\\u1edbc, ch\\u1ea5t l\\u01b0\\u1ee3ng ph&ugrave; h\\u1ee3p v\\u1edbi m\\u1ecdi kh&ocirc;ng gian, ki\\u1ebfn tr&uacute;c, v&agrave; kinh ph&iacute; cho ng&ocirc;i nh&agrave; c\\u1ee7a b\\u1ea1n. \\u0110\\u1ebfn v\\u1edbi <strong><span style=\\\"color: #ff9900;\\\"><a title=\\\"san go\\\" href=\\\"http:\\/\\/tuvansango.com\\/\\\"><span style=\\\"color: #ff9900;\\\">S&agrave;n g\\u1ed7<\\/span><\\/a><\\/span> Vi\\u1ec7t Ph&aacute;t<\\/strong> Qu&yacute; kh&aacute;ch s\\u1ebd \\u0111\\u01b0\\u1ee3c t\\u01b0 v\\u1ea5n mi\\u1ec5n ph&iacute; v\\u1ec1 c&aacute;c ch\\u1ea5t li\\u1ec7u s&agrave;n g\\u1ed7, ch\\u1ecdn l\\u1ef1a m\\u1eabu s\\u1ea3n ph\\u1ea9m v\\u1edbi kinh ph&iacute; t\\u1ed1t nh\\u1ea5t. V\\u1edbi nh\\u1eefng s\\u1ea3n ph\\u1ea9m s\\u1ea3n g\\u1ed7 ch\\u1ea5t l\\u01b0\\u1ee3ng cao, b\\u1ea3o h&agrave;nh t\\u1edbi 25 n\\u0103m,<strong> S&agrave;n g\\u1ed7 <\\/strong><strong>Vi\\u1ec7t Ph&aacute;t<\\/strong> t\\u1ef1 h&agrave;o mang l\\u1ea1i kh&ocirc;ng kh&iacute; \\u1ea5m c&uacute;ng v&agrave; sang tr\\u1ecdng cho gia \\u0111&igrave;nh b\\u1ea1n. Ch&uacute;ng t&ocirc;i mang t\\u1edbi h\\u01a1n 300 s\\u1ef1 l\\u1ef1a ch\\u1ecdn v\\u1ec1 c&aacute;c m\\u1eabu s&agrave;n g\\u1ed7, c&aacute;c ch\\u1ea5t li\\u1ec7u v&agrave; ki\\u1ec3u gi&aacute;ng s&agrave;n g\\u1ed7, ph&acirc;n ph\\u1ed1i c&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 cao c\\u1ea5p c&oacute; \\u0111\\u1ed9 b\\u1ec1n cao, thi c&ocirc;ng s&agrave;n g\\u1ed7 chuy&ecirc;n nghi\\u1ec7p, uy t&iacute;n v\\u1edbi \\u0111\\u1ed9i ng\\u0169 th\\u1ee3 l&agrave;nh ngh\\u1ec1 tr&ecirc;n 5 n\\u0103m kinh nghi\\u1ec7m.<\\/p>\"}', '', 0, 1, 1, 1, 1410768821, '', 0, 1),
(24, 'vi', 2, 85, '', 'lua-chon-van-san-go-cho-ngoi-nha-cua-ban', '', '', 'Lựa chọn ván sàn gỗ cho ngôi nhà của bạn', '', '', '', '{\"tmp_image_ids\":\"86\",\"meta_title\":\"L\\u1ef1a ch\\u1ecdn v\\u00e1n s\\u00e0n g\\u1ed7 cho ng\\u00f4i nh\\u00e0 c\\u1ee7a b\\u1ea1n\",\"meta_keyword\":\"L\\u1ef1a ch\\u1ecdn v\\u00e1n s\\u00e0n g\\u1ed7 cho ng\\u00f4i nh\\u00e0 c\\u1ee7a b\\u1ea1n\",\"meta_description\":\"L\\u1ef1a ch\\u1ecdn v\\u00e1n s\\u00e0n g\\u1ed7 cho ng\\u00f4i nh\\u00e0 c\\u1ee7a b\\u1ea1n\",\"introtext\":\"<p><span style=\\\"font-family: arial; font-size: 14px;\\\">S&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p l&agrave; m\\u1ed9t lo\\u1ea1i v\\u1eadt li\\u1ec7u m\\u1edbi v\\u1edbi nhi\\u1ec1u t&iacute;nh n\\u0103ng \\u01b0u vi\\u1ec7t h\\u01a1n c&aacute;c lo\\u1ea1i v\\u1eadt li\\u1ec7u th&ocirc;ng d\\u1ee5ng d&ugrave;ng \\u0111\\u1ec3 l&aacute;t s&agrave;n nh\\u01b0 th\\u1ea3m, g\\u1ed7 t\\u1ef1 nhi&ecirc;n, \\u0111&aacute;, g\\u1ea1ch men, g\\u1ea1ch b&ocirc;ng, ..<\\/span><\\/p>\",\"content\":\"<p>N\\u1ebfu \\u0111&acirc;y l&agrave; l\\u1ea7n \\u0111\\u1ea7u ti&ecirc;n b\\u1ea1n quy\\u1ebft \\u0111\\u1ecbnh \\u0111\\u1ea7u t\\u01b0 cho s&agrave;n nh&agrave; c\\u1ee7a b\\u1ea1n b\\u1eb1ng lo\\u1ea1i s&agrave;n g\\u1ed7 v&aacute;n &eacute;p c\\u1ee7a nh\\u1eefng nh&agrave; cung c\\u1ea5p \\u0111ang c&oacute; m\\u1eb7t tr&ecirc;n th\\u1ecb tr\\u01b0\\u1eddng, th&igrave; b\\u1ea1n h&atilde;y tham kh\\u1ea3o nh\\u1eefng th&ocirc;ng tin d\\u01b0\\u1edbi \\u0111&acirc;y \\u0111\\u1ec3 s\\u1ef1 l\\u1ef1a ch\\u1ecdn t\\u1ed1t nh\\u1ea5t.\\u0110\\u1eb7c bi\\u1ec7t l&agrave; l\\u1ea7n \\u0111\\u1ea7u ti\\u1ec7n \\u0111\\u01b0\\u1ee3c s\\u1edf h\\u1eefu 1 c\\u0103n nh&agrave;, b\\u1ea1n kh&ocirc;ng ch\\u1ec9 t&igrave;m ki\\u1ebfm th&ocirc;ng tin v\\u1ec1 c&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 m&agrave; c\\u0169ng c\\u1ea7n ki\\u1ec3m tra c\\u1ea9n th\\u1ea9n v\\u1ec1 c&aacute;c d\\u1ecbch v\\u1ee5 m&agrave; nh&agrave; cung c\\u1ea5p c&oacute; th\\u1ec3 \\u0111em \\u0111\\u1ebfn cho b\\u1ea1n,tr\\u01b0\\u1edbc khi quy\\u1ebft \\u0111\\u1ecbnh \\u0111\\u1ea7u t\\u01b0.<\\/p>\\r\\n<p>S\\u1ebd l&agrave; m\\u1ed9t s\\u1ef1 \\u0111\\u1ea7u t\\u01b0 th&iacute;ch \\u0111&aacute;ng v\\u1ec1 th\\u1eddi gian v&agrave; c&ocirc;ng s\\u1ee9c khi \\u0111i tham quan nh\\u1eefng gian h&agrave;ng m\\u1eabu v\\u1ec1 n\\u1ed9i th\\u1ea5t \\u0111\\u1ec3 c&oacute; nh\\u1eefng l\\u1eddi khuy&ecirc;n t\\u1ed1t h\\u01a1n v\\u1ec1 nh\\u1eefng s\\u1ea3n ph\\u1ea9m \\u0111\\u01b0\\u1ee3c &aacute;p d\\u1ee5ng nh\\u1eefng c&ocirc;ng ngh\\u1ec7 m\\u1edbi nh\\u1ea5t. B\\u1ea1n kh&ocirc;ng n&ecirc;n ch\\u1ec9 ch&uacute; tr\\u1ecdng \\u0111\\u1ebfn gi&aacute; c\\u1ea3 b\\u1edfi v&igrave; gi&aacute; th&agrave;nh s\\u1ea3n ph\\u1ea9m kh&ocirc;ng \\u0111\\u1ed3ng ngh\\u0129a v\\u1edbi ch\\u1ea5t l\\u01b0\\u1ee3ng, \\u0111\\u1ed9 d&agrave;y c\\u1ee7a v&aacute;n,c&aacute;c thi\\u1ebft k\\u1ebf c\\u1ee7a lo\\u1ea1i v&aacute;n s&agrave;n \\u0111&oacute;<\\/p>\\r\\n<p><br \\/> I.&nbsp;S&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p<\\/p>\\r\\n<p>S&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p l&agrave; m\\u1ed9t lo\\u1ea1i v\\u1eadt li\\u1ec7u m\\u1edbi v\\u1edbi nhi\\u1ec1u t&iacute;nh n\\u0103ng \\u01b0u vi\\u1ec7t h\\u01a1n c&aacute;c lo\\u1ea1i v\\u1eadt li\\u1ec7u th&ocirc;ng d\\u1ee5ng d&ugrave;ng \\u0111\\u1ec3 l&aacute;t s&agrave;n nh\\u01b0 th\\u1ea3m, g\\u1ed7 t\\u1ef1 nhi&ecirc;n, \\u0111&aacute;, g\\u1ea1ch men, g\\u1ea1ch b&ocirc;ng, ...<br \\/> V\\u1edbi nh\\u1eefng t&iacute;nh n\\u0103ng \\u01b0u vi\\u1ec7t tr&ecirc;n v&agrave; gi&aacute; c\\u1ea3 h\\u1ee3p l&yacute; m&agrave; s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p \\u0111&atilde; tr\\u1edf th&agrave;nh lo\\u1ea1i v\\u1eadt li\\u1ec7u r\\u1ea5t ph\\u1ed5 bi\\u1ebfn d&ugrave;ng \\u0111\\u1ec3 l&aacute;t s&agrave;n t\\u1ea1i c&aacute;c n\\u01b0\\u1edbc ph&aacute;t tri\\u1ec3n nh\\u01b0 M\\u1ef9 v&agrave; Ch&acirc;u &Acirc;u. Ti\\u1ebfp \\u0111\\u1ebfn l&agrave; c&aacute;c n\\u01b0\\u1edbc Ch&acirc;u &Aacute; v&agrave; c&aacute;c n\\u01b0\\u1edbc trong khu v\\u1ef1c \\u0110&ocirc;ng Nam &Aacute; nh\\u01b0 Th&aacute;i Lan, Singapore, Malaysia,<br \\/> S\\u1ea3n ph\\u1ea9m s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p m\\u1edbi v&agrave;o th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam kho\\u1ea3ng 10 n\\u0103m tr\\u1edf l\\u1ea1i \\u0111&acirc;y, nh\\u01b0ng \\u0111&atilde; tr\\u1edf th&agrave;nh m\\u1ed9t lo\\u1ea1i v\\u1eadt li\\u1ec7u t\\u01b0\\u01a1ng \\u0111\\u1ed1i ph\\u1ed5 bi\\u1ebfn v\\u1edbi nhi\\u1ec1u th\\u01b0\\u01a1ng hi\\u1ec7u, ch\\u1ee7ng lo\\u1ea1i v&agrave; ch\\u1ea5t l\\u01b0\\u1ee3ng kh&aacute;c nhau.S&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p th&ocirc;ng th\\u01b0\\u1eddng c&oacute; 4 l\\u1edbp:<\\/p>\\r\\n<p>Th\\u1ee9 nh\\u1ea5t l&agrave; l\\u1edbp v\\u1eadt li\\u1ec7u \\u0111\\u1eb7c bi\\u1ec7t (Melamine resins) trong su\\u1ed1t, c&oacute; t&aacute;c d\\u1ee5ng \\u1ed5n \\u0111\\u1ecbnh l\\u1edbp b\\u1ec1 m\\u1eb7t, t\\u1ea1o l&ecirc;n l\\u1edbp b\\u1ec1 m\\u1eb7t v\\u1eefng ch\\u1eafc, ch\\u1ed1ng n\\u01b0\\u1edbc, ch\\u1ed1ng x\\u01b0\\u1edbc, ch\\u1ed1ng va \\u0111\\u1eadp, ch\\u1ed1ng phai m&agrave;u, ch\\u1ed1ng s\\u1ef1 x&acirc;m nh\\u1eadp c\\u1ee7a c&aacute;c vi khu\\u1ea9n v&agrave; m\\u1ed1i m\\u1ecdt, ch\\u1ed1ng l\\u1ea1i c&aacute;c t&aacute;c d\\u1ee5ng c\\u1ee7a ho&aacute; ch\\u1ea5t v&agrave; d\\u1ec5 d&agrave;ng lau ch&ugrave;i v&agrave; b\\u1ea3o d\\u01b0\\u1ee1ng.<\\/p>\\r\\n<p>Th\\u1ee9 hai l&agrave; l\\u1edbp phim t\\u1ea1o v&acirc;n g\\u1ed7 t\\u1ef1 nhi&ecirc;n. M&agrave;u s\\u1eafc v&agrave; v&acirc;n g\\u1ed7 \\u0111\\u01b0\\u1ee3c l\\u1ef1a ch\\u1ecdn t\\u1eeb nhi\\u1ec1u lo\\u1ea1i m&agrave;u s\\u1eafc v&agrave; v&acirc;n g\\u1ed7 t\\u1ef1 nhi&ecirc;n trong th\\u1ef1c t\\u1ebf mang \\u0111\\u1ebfn cho kh&aacute;ch h&agrave;ng r\\u1ea5t nhi\\u1ec1u s\\u1ef1 l\\u1ef1a ch\\u1ecdn v\\u1ec1 c&aacute;c ki\\u1ec3u v&acirc;n g\\u1ed7 kh&aacute;c nhau v&agrave; m&agrave;u s\\u1eafc kh&aacute;c nhau, t\\u1eeb nh\\u1eefng m&agrave;u s&aacute;ng r\\u1ea5t t\\u01b0\\u01a1i tr\\u1ebb cho \\u0111\\u1ebfn nh\\u1eefng m&agrave;u t\\u1ed1i r\\u1ea5t sang tr\\u1ecdng. L\\u1edbp v&acirc;n g\\u1ed7 n&agrave;y \\u0111\\u01b0\\u1ee3c l\\u1edbp th\\u1ee9 nh\\u1ea5t b\\u1ea3o v\\u1ec7 n&ecirc;n lu&ocirc;n gi\\u1eef \\u0111\\u01b0\\u1ee3c m&agrave;u s\\u1eafc v&agrave; v&acirc;n g\\u1ed7 kh&ocirc;ng thay \\u0111\\u1ed5i trong su\\u1ed1t qu&aacute; tr&igrave;nh s\\u1eed d\\u1ee5ng.<\\/p>\\r\\n<p>&nbsp;Th\\u1ee9 ba l&agrave; l\\u1edbp: l&otilde;i b\\u1eb1ng g\\u1ed7 HDF (High Density Flywood) \\u0111\\u01b0\\u1ee3c t\\u1ea1o th&agrave;nh b\\u1edfi 80-85% ch\\u1ea5t li\\u1ec7u l&agrave; g\\u1ed7 t\\u1ef1 nhi&ecirc;n, c&ograve;n l\\u1ea1i l&agrave; c&aacute;c ph\\u1ee5 gia l&agrave;m t\\u0103ng \\u0111\\u1ed9 c\\u1ee9ng v&agrave; k\\u1ebft d&iacute;nh cho g\\u1ed7. H\\u1ea7u h\\u1ebft c&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p \\u0111\\u1ec1u s\\u1eed d\\u1ee5ng l\\u1ea1i l&otilde;i HDF \\u0111\\u1ea1t ti&ecirc;u chu\\u1ea9n E1, \\u0111&acirc;y l&agrave; ti&ecirc;u chu\\u1ea9n \\u0111\\u1ea3m b\\u1ea3o l&otilde;i g\\u1ed7 c&oacute; \\u0111\\u1ee7 \\u0111\\u1ed9 c\\u1ee9ng, b\\u1ec1n, v&agrave; c&oacute; ngu\\u1ed3n g\\u1ed1c t\\u1ef1 nhi&ecirc;n, kh&ocirc;ng c&oacute; h\\u1ea1i cho s\\u1ee9c kho\\u1ebb. L&otilde;i g\\u1ed7 c&oacute; th\\u1ec3 l&agrave; m&agrave;u xanh ho\\u1eb7c m&agrave;u tr\\u1eafng tu\\u1ef3 thu\\u1ed9c v&agrave;o ngu\\u1ed3n nguy&ecirc;n li\\u1ec7u \\u0111\\u1ea7u v&agrave;o. m&agrave;u c\\u1ee7a l&otilde;i g\\u1ed7 kh&ocirc;ng \\u1ea3nh h\\u01b0\\u1edfng g&igrave; t\\u1edbi ch\\u1ea5t l\\u01b0\\u1ee3ng c\\u1ee7a l&otilde;i g\\u1ed7.<\\/p>\\r\\n<p>Th\\u1ee9 t\\u01b0 l&agrave; l\\u1edbp tr&aacute;ng ph&iacute;a d\\u01b0\\u1edbi c\\u1ee7a t\\u1ea5m v&aacute;n s&agrave;n b\\u1eb1ng v\\u1eadt li\\u1ec7u t\\u1ed5ng h\\u1ee3p \\u0111\\u1eb7c bi\\u1ec7t c&oacute; t&aacute;c d\\u1ee5ng \\u1ed5n \\u0111\\u1ecbnh b\\u1ec1 m\\u1eb7t d\\u01b0\\u1edbi,ch\\u1ed1ng m\\u1ed1i m\\u1ecdt,cong v&ecirc;nh,ch\\u1ed1ng n\\u01b0\\u1edbc.M\\u1ed9t s\\u1ed1 s&agrave;n c&oacute; th&ecirc;m l\\u1edbp gi\\u1ea5y craft \\u0111\\u1eb7c bi\\u1ec7t xen gi\\u1eefa l\\u1edbp t\\u1ea1o v&acirc;n v&agrave; l\\u1edbp l&otilde;i HDF l&agrave;m t\\u0103ng th&ecirc;m \\u0111\\u1ed9 c\\u1ee9ng v&agrave; \\u0111\\u1ed9 g\\u1eafn k\\u1ebft gi\\u1eefa c&aacute;c l\\u1edbp, g&oacute;p ph\\u1ea7n \\u1ed5n \\u0111\\u1ecbnh b\\u1ec1 m\\u1eb7t c\\u1ee7a s&agrave;n tr\\u01b0\\u1edbc c&aacute;c t&aacute;c \\u0111\\u1ed9ng c\\u1ee7a th\\u1eddi ti\\u1ebft v&agrave; qu&aacute; tr&igrave;nh s\\u1eed d\\u1ee5ng.<br \\/> T\\u1ea5t c\\u1ea3 c&aacute;c l\\u1edbp \\u0111\\u01b0\\u1ee3c &eacute;p l\\u1ea1i v\\u1edbi nhau d\\u01b0\\u1edbi &aacute;p l\\u1ef1c cao (&gt;1000kg\\/cm2) t\\u1ea1o l&ecirc;n m\\u1ed9t kh\\u1ed1i \\u0111\\u1ed3ng nh\\u1ea5t, v\\u1eefng ch\\u1eafc.H\\u1ea7u h\\u1ebft ch\\u1ea5t li\\u1ec7u t\\u1ea1o n&ecirc;n t\\u1ea5m v&aacute;n s&agrave;n \\u0111\\u1ec1u c&oacute; ngu\\u1ed3n g\\u1ed1c t\\u1ef1 nhi&ecirc;n v&agrave; \\u0111&atilde; \\u0111\\u01b0\\u1ee3c ki\\u1ec3m \\u0111\\u1ecbnh \\u0111\\u1ea3m b\\u1ea3o kh&ocirc;ng \\u1ea3nh h\\u01b0\\u1edfng \\u0111\\u1ebfn s\\u1ee9c kh\\u1ecfe v&agrave; m&ocirc;i tr\\u01b0\\u1eddng<\\/p>\\r\\n<p><img style=\\\"vertical-align: middle; display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http:\\/\\/local.ihbvietnam.com\\/website_sangovietphat\\/data\\/upload\\/editor\\/2014\\/09\\/16\\/san_pham_02.png\\\" alt=\\\"\\\" width=\\\"218\\\" height=\\\"142\\\" \\/><br \\/> &nbsp;II.&nbsp;L\\u1ef1a ch\\u1ecdn v&aacute;n s&agrave;n<\\/p>\\r\\n<p>V\\u1edbi nh\\u1eefng lo\\u1ea1i v&aacute;n s&agrave;n t\\u1ef1 nhi&ecirc;n c&oacute; \\u0111\\u1ed9 c\\u1ee9ng cao s\\u1ebd r\\u1ea5t kh&oacute; b\\u1ea3o tr&igrave; v&agrave; cho chi ph&iacute; cao b\\u1edfi lo\\u1ea1i v&aacute;n n&agrave;y r\\u1ea5t d\\u1ec5 x\\u01b0\\u1edbc, b\\u1ea1c m&agrave;u, l\\u1ed3i l&otilde;m th\\u1eadm ch&iacute; d&iacute;nh b\\u1ea9n. Ch&iacute;nh v&igrave; v\\u1eady c&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 v&aacute;n &eacute;p v\\u1eeba tr&ocirc;ng gi\\u1ed1ng th\\u1eadt v&agrave; c\\u1ea3m gi&aacute;c h\\u1ec7t c&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 t\\u1ef1 nhi&ecirc;n, l\\u1ea1i v\\u1eeba c&oacute; tu\\u1ed5i th\\u1ecd cao h\\u01a1n v&agrave; kh&ocirc;ng y&ecirc;u c\\u1ea7u b\\u1ea3o tr&igrave; th\\u01b0\\u1eddng xuy&ecirc;n.L\\u1ef1a ch\\u1ecdn \\u0111&uacute;ng lo\\u1ea1i g\\u1ed7 v&aacute;n &eacute;p s\\u1ebd th\\u1eadt \\u0111\\u01a1n gi\\u1ea3n n\\u1ebfu b\\u1ea1n x&aacute;c \\u0111\\u1ecbnh \\u0111\\u01b0\\u1ee3c th\\u1eddi gian b\\u1ea1n s\\u1ebd \\u1edf trong ng&ocirc;i nh&agrave; \\u0111&oacute; c\\u0169ng nh\\u01b0 t\\u1ea7n su\\u1ea5t \\u0111i l\\u1ea1i c\\u1ee7a c&aacute;c th&agrave;nh vi&ecirc;n trong gia \\u0111&igrave;nh. C\\u0169ng s\\u1ebd ch\\u1eb3ng ngh\\u0129a l&yacute; g&igrave; khi \\u0111\\u1ea7u t\\u01b0 1 lo\\u1ea1i s&agrave;n g\\u1ed7 v&aacute;n &eacute;p th\\u1eadt \\u0111\\u1eaft trong khi b\\u1ea1n bi\\u1ebft m&igrave;nh s\\u1ebd c&ograve;n thay \\u0111\\u1ed5i ch\\u1ed7 \\u1edf v&agrave;i l\\u1ea7n n\\u1eefa trong 1 t\\u01b0\\u01a1ng lai g\\u1ea7n. b\\u1edfi v&igrave; m\\u1ecdi ng\\u01b0\\u1eddi th\\u01b0\\u1eddng xuy&ecirc;n \\u0111\\u1ed5i l\\u1ea1i s&agrave;n nh&agrave; tr\\u01b0\\u1edbc khi d\\u1ecdn t\\u1edbi n\\u01a1i \\u1edf m\\u1edbi.N\\u1ebfu b\\u1ea1n \\u0111ang t&igrave;m lo\\u1ea1i v&aacute;n s&agrave;n th&iacute;ch h\\u1ee3p cho ph&ograve;ng kh&aacute;ch r\\u1ed9ng hay nh&agrave; b\\u1ebfp th&igrave; lo\\u1ea1i v&aacute;n d&agrave;y c&oacute; kh\\u1ea3 n\\u0103ng ch\\u1ecbu n\\u01b0\\u1edbc s\\u1ebd l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn ph&ugrave; h\\u1ee3p. H&atilde;y tham kh\\u1ea3o th&ecirc;m v\\u1edbi c&aacute;c chuy&ecirc;n gia c\\u1ee7a ch&uacute;ng t&ocirc;i v&agrave;\\u0111\\u1eb7c bi\\u1ec7t v\\u1edbi k\\u1ef9 thu\\u1eadt r&aacute;p gh&eacute;p kh&ocirc;ng s\\u1eed d\\u1ee5ng keo m\\u1edbi \\u0111\\u01b0\\u1ee3c gi\\u1edbi thi\\u1ec7u g\\u1ea7n \\u0111&acirc;y, th&igrave; s&agrave;n g\\u1ed7 &nbsp;&nbsp;&nbsp; Vi\\u1ec7t &Aacute; &nbsp;l&agrave; s\\u1ef1 l\\u1ef1a ch\\u1ecdn ho&agrave;n h\\u1ea3o cho ng&ocirc;i nh&agrave; c\\u1ee7a b\\u1ea1n.<\\/p>\"}', '', 0, 0, 1, 1, 1410832290, '', 0, 1),
(25, 'vi', 10, 370, '', 'du-an-goden-place', '', '', 'Dự án Goden Place', '', '', '', '{\"tmp_image_ids\":\"371\",\"meta_title\":\"Thi c\\u00f4ng l\\u00e1t s\\u00e0n \",\"meta_keyword\":\"Thi c\\u00f4ng l\\u00e1t s\\u00e0n \",\"meta_description\":\"Thi c\\u00f4ng l\\u00e1t s\\u00e0n \",\"introtext\":\"<p>Thi c&ocirc;ng l&aacute;t s&agrave;n&nbsp;<\\/p>\",\"content\":\"<p>Thi c&ocirc;ng l&aacute;t s&agrave;n&nbsp;<\\/p>\"}', '', 0, 0, 0, 1, 1432259451, '', 0, 1),
(26, 'vi', 9, 0, '', 'tai-ha-noi', '', '', 'Tại Hà Nội', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"\\u0110\\u1ecba ch\\u1ec9 1 : S\\u1ed1 31 Ng\\u1ecdc \\u0110\\u1ea1i, Ph\\u01b0\\u1eddng \\u0110\\u1ea1i M\\u1ed7 , Qu\\u1eadn Nam T\\u1eeb Li\\u00eam , H\\u00e0 N\\u1ed9i.\\r\\n\",\"meta_keyword\":\"\\u0110\\u1ecba ch\\u1ec9 : S\\u1ed1 31 Ng\\u1ecdc \\u0110\\u1ea1i , Ph\\u01b0\\u1eddng \\u0110\\u1ea1i M\\u1ed7 , Qu\\u1eadn Nam T\\u1eeb Li\\u00eam , H\\u00e0 N\\u1ed9i\",\"meta_description\":\"\\u0110\\u1ecba ch\\u1ec9 : S\\u1ed1 31 Ng\\u1ecdc \\u0110\\u1ea1i , Ph\\u01b0\\u1eddng \\u0110\\u1ea1i M\\u1ed7 , Qu\\u1eadn Nam T\\u1eeb Li\\u00eam , H\\u00e0 N\\u1ed9i\",\"introtext\":\"<p>\\u0110\\u1ecba ch\\u1ec9 1: S\\u1ed1 31 Ng\\u1ecdc \\u0110\\u1ea1i , Ph\\u01b0\\u1eddng \\u0110\\u1ea1i M\\u1ed7 , Qu\\u1eadn Nam T\\u1eeb Li&ecirc;m , H&agrave; N\\u1ed9i.<\\/p>\\r\\n<p>\\u0110i\\u1ec7n tho\\u1ea1i : 043.200.2097 - 0982.088.969<\\/p>\",\"content\":\"<p>\\u0110\\u1ecba ch\\u1ec9 1: S\\u1ed1 115 Li&ecirc;n c\\u01a1 , Ph\\u01b0\\u1eddng \\u0110\\u1ea1i M\\u1ed7 , Qu\\u1eadn Nam T\\u1eeb Li&ecirc;m , H&agrave; N\\u1ed9i.<\\/p>\\r\\n<p>\\u0110i\\u1ec7n tho\\u1ea1i : 043.789.4447 - 0943.088.969<\\/p>\\r\\n<p>\\u0110\\u1ecba ch\\u1ec9 2: S\\u1ed1 181 Ng\\u1ecdc \\u0110\\u1ea1i , Ph\\u01b0\\u1eddng \\u0110\\u1ea1i M\\u1ed7 , Qu\\u1eadn Nam T\\u1eeb Li&ecirc;m , H&agrave; N\\u1ed9i.<\\/p>\\r\\n<p>\\u0110i\\u1ec7n tho\\u1ea1i : 043.200.2097 - 0932.326.600<\\/p>\"}', '', 3, 0, 0, 1, 1432259635, '', 0, 1),
(27, 'vi', 9, 0, '', 'tai-hai-phong', '', '', 'Tại Hải Phòng', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"\\u0110ia ch\\u1ec9 1 : 80 Nguy\\u1ec5n B\\u1ec9nh Khi\\u00eam H\\u1ea3i ph\\u00f2ng\\r\\n\\u0110i\\u1ec7n tho\\u1ea1i : 0313.734.270 - 0904.334.667\",\"meta_keyword\":\"\\u0110ia ch\\u1ec9 80 Nguy\\u1ec5n B\\u1ec9nh Khi\\u00eam H\\u1ea3i ph\\u00f2ng\",\"meta_description\":\"\\u0110ia ch\\u1ec9 80 Nguy\\u1ec5n B\\u1ec9nh Khi\\u00eam H\\u1ea3i ph\\u00f2ng\",\"introtext\":\"<p>\\u0110ia ch\\u1ec9 1 : 80 Nguy\\u1ec5n B\\u1ec9nh Khi&ecirc;m - Qu\\u1eadn Ng&ocirc; Quy\\u1ec1n - H\\u1ea3i ph&ograve;ng<br \\/>\\u0110i\\u1ec7n tho\\u1ea1i : 0313.734.270 - 0904.334.667<\\/p>\\r\\n<p>\\u0110\\u1ecba ch\\u1ec9 2 : S\\u1ed1 10 Nguy\\u1ec5n V\\u0103n Linh - Qu\\u1eadn L&ecirc; Ch&acirc;n - H\\u1ea3i Ph&ograve;ng<\\/p>\\r\\n<p>\\u0110i\\u1ec7n tho\\u1ea1i : 0313.622.928 - 0934.316.230<\\/p>\",\"content\":\"<p>\\u0110ia ch\\u1ec9 1 : 80 Nguy\\u1ec5n B\\u1ec9nh Khi&ecirc;m - Qu\\u1eadn Ng&ocirc; Quy\\u1ec1n - H\\u1ea3i ph&ograve;ng<br \\/>\\u0110i\\u1ec7n tho\\u1ea1i : 0313.734.270 - 0904.334.667<\\/p>\\r\\n<p>\\u0110\\u1ecba ch\\u1ec9 2 : S\\u1ed1 10 Nguy\\u1ec5n V\\u0103n Linh - Qu\\u1eadn L&ecirc; Ch&acirc;n - H\\u1ea3i Ph&ograve;ng<\\/p>\\r\\n<p>\\u0110i\\u1ec7n tho\\u1ea1i : 0313.622.928 - 0934.316.230<\\/p>\"}', '', 2, 0, 0, 1, 1432259669, '', 0, 1),
(30, 'vi', 9, 0, '', 'nam-dinh', '', '', 'Nam Định', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"Nam \\u0110\\u1ecbnh\",\"meta_keyword\":\"Nam \\u0110\\u1ecbnh\",\"meta_description\":\"Nam \\u0110\\u1ecbnh\",\"introtext\":\"<p>Nam \\u0110\\u1ecbnh<\\/p>\",\"content\":\"<p>Nam \\u0110\\u1ecbnh<\\/p>\"}', '', 0, 0, 0, 1, 1433234815, '', 0, 1),
(31, 'vi', 3, 0, '', 'thong-tin-lien-he-chan-trang', '', '', 'Thông tin liên hệ chân trang', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"Th\\u00f4ng tin li\\u00ean h\\u1ec7 ch\\u00e2n trang\",\"meta_keyword\":\"Th\\u00f4ng tin li\\u00ean h\\u1ec7 ch\\u00e2n trang\",\"meta_description\":\"Th\\u00f4ng tin li\\u00ean h\\u1ec7 ch\\u00e2n trang\",\"introtext\":\"<p>Th&ocirc;ng tin li&ecirc;n h\\u1ec7 \\u1edf ch&acirc;n trang<\\/p>\",\"content\":\"<p><strong>T\\u1ea1i H&agrave; N\\u1ed9i<\\/strong>:<\\/p>\\r\\n<p>\\u0110\\u1ecba ch\\u1ec9 1: S\\u1ed1 115 Li&ecirc;n c\\u01a1 , Ph\\u01b0\\u1eddng \\u0110\\u1ea1i M\\u1ed7 , Qu\\u1eadn Nam T\\u1eeb Li&ecirc;m , H&agrave; N\\u1ed9i.<br \\/>\\u0110i\\u1ec7n tho\\u1ea1i : 043.789.4447 - 0943.088.969<\\/p>\\r\\n<p>\\u0110\\u1ecba ch\\u1ec9 2: S\\u1ed1 181 Ng\\u1ecdc \\u0110\\u1ea1i , Ph\\u01b0\\u1eddng \\u0110\\u1ea1i M\\u1ed7 , Qu\\u1eadn Nam T\\u1eeb Li&ecirc;m , H&agrave; N\\u1ed9i.<br \\/>\\u0110i\\u1ec7n tho\\u1ea1i : 043.200.2097 - 0932.326.600<\\/p>\\r\\n<p><strong>T\\u1ea1i H\\u1ea3i Ph&ograve;ng<\\/strong>:<\\/p>\\r\\n<p>\\u0110ia ch\\u1ec9 1 : 80 Nguy\\u1ec5n B\\u1ec9nh Khi&ecirc;m - Qu\\u1eadn Ng&ocirc; Quy\\u1ec1n - H\\u1ea3i ph&ograve;ng<br \\/>\\u0110i\\u1ec7n tho\\u1ea1i : 0313.734.270 - 0904.334.667<\\/p>\\r\\n<p>\\u0110\\u1ecba ch\\u1ec9 2 : S\\u1ed1 10 Nguy\\u1ec5n V\\u0103n Linh - Qu\\u1eadn L&ecirc; Ch&acirc;n - H\\u1ea3i Ph&ograve;ng<br \\/>\\u0110i\\u1ec7n tho\\u1ea1i : 0313.622.928 - 0934.316.230<\\/p>\\r\\n<p><strong>T\\u1ea1i Nam \\u0110\\u1ecbnh<\\/strong>:<\\/p>\"}', '', 0, 0, 0, 1, 1434106261, '', 0, 1),
(32, 'vi', 2, 420, '', 'cau-tao-san-go-tay-ban-nha-faus-floor', '', '', 'Cấu tạo Sàn gỗ Tây Ban Nha FAUS FLOOR', '', '', '', '{\"tmp_image_ids\":\"421\",\"meta_title\":\"C\\u1ea5u t\\u1ea1o S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS FLOOR\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS FLOOR\\r\\nS\\u00e0n g\\u1ed7 Ch\\u00e2u \\u00c2u \\r\\nS\\u00e0n g\\u1ed7 cao c\\u1ea5p \",\"meta_description\":\"C\\u1ea5u t\\u1ea1o S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS FLOOR\",\"introtext\":\"<p><span>To&agrave;n b\\u1ed9 s\\u1ea3n ph\\u1ea9m c\\u1ee7a s&agrave;n g\\u1ed7 FausFloor \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng l&otilde;i xanh HDF ho&agrave;n to&agrave;n kh&aacute;c bi\\u1ec7t v\\u1edbi to&agrave;n b\\u1ed9 s&agrave;n g\\u1ed7 c&oacute; xu\\u1ea5t x\\u1ee9 t\\u1eeb Ch&acirc;u &Acirc;u hi\\u1ec7n nay tr&ecirc;n th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam<\\/span><\\/p>\",\"content\":\"<p>C\\u1ea5u t\\u1ea1o ch&iacute;nh c\\u1ee7a <a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\">S&agrave;n g\\u1ed7 T&acirc;y Ban Nha - Faus Floor <\\/a>(Made in Spain)&nbsp;<br \\/>To&agrave;n b\\u1ed9 s\\u1ea3n ph\\u1ea9m c\\u1ee7a s&agrave;n g\\u1ed7 FausFloor \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng l&otilde;i xanh HDF ho&agrave;n to&agrave;n kh&aacute;c bi\\u1ec7t v\\u1edbi to&agrave;n b\\u1ed9 s&agrave;n g\\u1ed7 c&oacute; xu\\u1ea5t x\\u1ee9 t\\u1eeb Ch&acirc;u &Acirc;u hi\\u1ec7n nay tr&ecirc;n th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam.&nbsp;<br \\/>V\\u1eady HDF l&otilde;i xanh l&agrave; g&igrave;?&nbsp;<br \\/>- HDF l&otilde;i xanh l&agrave; HDF c&oacute; ch\\u1ea5t l\\u01b0\\u1ee3ng cao, \\u0111\\u1ed9 n&eacute;n &eacute;p (Density) t\\u1ed1i thi\\u1ec3u 900kg\\/m3, \\u0111\\u1ed9 gi&atilde;n n\\u1edf &lt;=8%<br \\/>- \\u0110\\u1ed9 li&ecirc;n ki\\u1ebft m\\u1ea1nh m\\u1ebd g\\u1ea5p 3 l\\u1ea7n so v\\u1edbi HDF truy\\u1ec1n th\\u1ed1ng<span class=\\\"text_exposed_show\\\"><br \\/>- \\u0110\\u1ed9 m\\u1ecbn c\\u1ee7a HDF: H\\u1ea7u nh\\u01b0 kh&ocirc;ng c&oacute; tr&agrave; nh&aacute;m sau khi s\\u1ea3n xu\\u1ea5t&nbsp;<br \\/>- V&agrave; \\u0111\\u1eb7c bi\\u1ec7t, HDF l&otilde;i xanh \\u0111\\u01b0\\u1ee3c c\\u1ea5p ch\\u1ee9ng nh\\u1eadn E1 v&agrave; CARB (vi\\u1ebft t\\u1eaft c\\u1ee7a H\\u1ed9i \\u0111\\u1ed3ng qu\\u1ea3n tr\\u1ecb t&agrave;i nguy&ecirc;n kh&ocirc;ng kh&iacute; California - ti&ecirc;u chu\\u1ea9n c\\u1ee7a c&aacute;c d&ograve;ng s\\u1ea3n ph\\u1ea9m c&ocirc;ng nghi\\u1ec7p \\u0111\\u01b0\\u1ee3c nh\\u1eadp kh\\u1ea9u v&agrave;o th\\u1ecb tr\\u01b0\\u1eddng M\\u1ef9) \\u0111\\u01b0\\u1ee3c bi\\u1ebft \\u0111\\u1ebfn v\\u1edbi ti&ecirc;u chu\\u1ea9n th&acirc;n thi\\u1ec7n v\\u1edbi m&ocirc;i tr\\u01b0\\u1eddng v&agrave; b\\u1ea3o v\\u1ec7 s\\u1ee9c kh\\u1ecfe ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng.&nbsp;<br \\/>V&igrave; v\\u1eady s&agrave;n g\\u1ed7 T&acirc;y Ban Nha Faus Floor c&ograve;n g\\u1ecdi l&agrave; s&agrave;n g\\u1ed7 kh&ocirc;ng \\u0111\\u1ed9c h\\u1ea1i.&nbsp;<br \\/>V\\u1eady c&ograve;n ch\\u1ea7n ch\\u1eeb g&igrave; n\\u1eefa. M\\u1eddi Qu&yacute; kh&aacute;ch h&agrave;ng \\u0111\\u1ebfn v\\u1edbi c&ocirc;ng ty ch&uacute;ng t&ocirc;i \\u0111\\u1ec3 \\u0111\\u01b0\\u1ee3c tr\\u1ea3i nghi\\u1ec7m d&ograve;ng s&agrave;n g\\u1ed7 Ch&acirc;u &Acirc;u v\\u1edbi ch\\u1ea5t l\\u01b0\\u1ee3ng t\\u1ed1t nh\\u1ea5t v&agrave; \\u0111\\u1eb3ng c\\u1ea5p nh\\u1ea5t hi\\u1ec7n nay.&nbsp;<\\/span><\\/p>\\r\\n<p><span class=\\\"text_exposed_show\\\">S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS FLOOR - Feeling The Difference!&nbsp;<\\/span><\\/p>\"}', '', 0, 1, 0, 1, 1490352964, '', 0, 1),
(33, 'vi', 3, 438, '', 'doi-net-ve-san-go-tay-ban-nha-faus', '', '', 'Đôi nét về Sàn Gỗ Tây Ban Nha FAUS ', '', '', '', '{\"tmp_image_ids\":\"439\",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS\\r\\nS\\u00e0n g\\u1ed7 FAUS FLOOR\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS\\r\\nS\\u00e0n g\\u1ed7 FAUS FLOOR\",\"meta_description\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS\\r\\nS\\u00e0n g\\u1ed7 FAUS FLOOR\",\"introtext\":\"<p>Th\\u01b0\\u01a1ng hi\\u1ec7u S&agrave;n g\\u1ed7 Faus floor-&nbsp;<a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\" rel=\\\"nofollow\\\" target=\\\"_blank\\\">S&agrave;n g\\u1ed7 T&acirc;y Ban Nha&nbsp;<\\/a>\\u0111\\u01b0\\u1ee3c b\\u1eaft \\u0111\\u1ea7u h&igrave;nh th&agrave;nh n\\u0103m 1953, \\u1edf m\\u1ed9t x\\u01b0\\u1edfng m\\u1ed9c t\\u1ea1i th\\u1ecb tr\\u1ea5n nh\\u1ecf Valencia &ndash; T&acirc;y Ban Nha<\\/p>\",\"content\":\"<p>\\u0110&ocirc;i n&eacute;t v\\u1ec1 S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS FLOOR<\\/p>\\r\\n<p>Th\\u01b0\\u01a1ng hi\\u1ec7u S&agrave;n g\\u1ed7 Faus floor-&nbsp;<a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\" rel=\\\"nofollow\\\" target=\\\"_blank\\\">S&agrave;n g\\u1ed7 T&acirc;y Ban Nha&nbsp;<\\/a>\\u0111\\u01b0\\u1ee3c b\\u1eaft \\u0111\\u1ea7u h&igrave;nh th&agrave;nh n\\u0103m 1953, \\u1edf m\\u1ed9t x\\u01b0\\u1edfng m\\u1ed9c t\\u1ea1i th\\u1ecb tr\\u1ea5n nh\\u1ecf Valencia &ndash; T&acirc;y Ban Nha. K\\u1ec3 t\\u1eeb \\u0111&acirc;y, c&ocirc;ng ty b\\u1eaft \\u0111\\u1ea7u l\\u1edbn m\\u1ea1nh v&agrave; lu&ocirc;n lu&ocirc;n ho\\u1ea1t \\u0111\\u1ed9ng v\\u1edbi ph\\u01b0\\u01a1ng ch&acirc;m c\\u1ee7a s\\u1ef1 b\\u1ec1n v\\u1eefng v&agrave; cam k\\u1ebft \\u0111\\u1ea1t ti&ecirc;u chu\\u1ea9n m&ocirc;i tr\\u01b0\\u1eddng. \\u0110i\\u1ec1u n&agrave;y gi&uacute;p&nbsp;<a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\">S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS FLOOR<\\/a>&nbsp;&nbsp;th&agrave;nh c&ocirc;ng t\\u1ea1i th\\u1ecb tr\\u01b0\\u1eddng trong n\\u01b0\\u1edbc v&agrave; qu\\u1ed1c t\\u1ebf v&agrave; \\u0111\\u01b0\\u1ee3c c&ocirc;ng nh\\u1eadn v\\u1edbi slogan &ldquo; Lu&ocirc;n lu&ocirc;n \\u0111i \\u0111\\u1ea7u t\\u1ea1o ra s\\u1ea3n ph\\u1ea9m \\u0111\\u1ed9c \\u0111&aacute;o v\\u1edbi ch\\u1ea5t l\\u01b0\\u1ee3ng v\\u01b0\\u1ee3t tr\\u1ed9i&rdquo;. Kh&ocirc;ng ng\\u1eebng \\u0111\\u1ed5i m\\u1edbi l&agrave; 1 kh&iacute;a c\\u1ea1nh t\\u1ea1o ra t&iacute;nh n\\u0103ng ri&ecirc;ng bi\\u1ec7t c\\u1ee7a th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 FAUS FLOOR, l&agrave;m cho s\\u1ea3n ph\\u1ea9m l&agrave; \\u0111\\u1ed9c nh\\u1ea5t tr&ecirc;n th\\u1ecb tr\\u01b0\\u1eddng. Xin m\\u1eddi qu&yacute; kh&aacute;ch h&agrave;ng \\u0111\\u1ebfn v\\u1edbi c&ocirc;ng ty ch&uacute;ng t&ocirc;i \\u0111\\u1ec3 \\u0111\\u01b0\\u1ee3c c\\u1ea3m nh\\u1eadn s\\u1ef1 kh&aacute;c bi\\u1ec7t v\\u1edbi nh\\u1eefng b\\u1ed9 s\\u01b0u t\\u1eadp v&ocirc; c&ugrave;ng kh&aacute;c bi\\u1ec7t v&agrave; \\u1ea5n t\\u01b0\\u1ee3ng.<\\/p>\"}', '', 0, 0, 0, 1, 1490934242, '', 0, 1),
(34, 'vi', 2, 492, '', 'san-go-tay-ban-nha-faus-floor-tham-gia-trien-lam-vietbuild', '', '', 'Sàn gỗ Tây Ban Nha FAUS FLOOR tham gia triển lãm Vietbuild', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha \",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha \",\"meta_description\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha \",\"introtext\":\"<p>T\\u1eeb ng&agrave;y 15\\/3\\/17 - 19\\/3\\/2017 <a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\">S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS<\\/a> \\u0111&atilde; tham gia h\\u1ed9i ch\\u1ee3 Vietbuild t\\u1ea1i H&agrave; N\\u1ed9i<\\/p>\",\"content\":\"<p>H\\u1ed9i ch\\u1ee3 Vietbuild l&agrave; h\\u1ed9i ch\\u1ee3 l\\u1edbn v\\u1ec1 ng&agrave;nh v\\u1eadt li\\u1ec7u x&acirc;y d\\u1ef1ng. N\\u0103m 2017 c&oacute; h\\u01a1n 1700 gian h&agrave;ng v\\u1edbi c&aacute;c th\\u01b0\\u01a1ng hi\\u1ec7u n\\u1ed5i ti\\u1ebfng h&agrave;ng \\u0111\\u1ea7u t\\u1eeb kh\\u1eafp c&aacute;c n\\u01b0\\u1edbc \\u0111&atilde; tham gia tr\\u01b0ng b&agrave;y tri\\u1ec3n l&atilde;m t\\u1ea1i h\\u1ed9i ch\\u1ee3. S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS t\\u1ef1 h&agrave;o mang \\u0111\\u1ebfn cho h\\u1ed9i ch\\u1ee3 m\\u1ed9t m&agrave;u s\\u1eafc ho&agrave;n to&agrave;n m\\u1edbi. L\\u1ea7n \\u0111\\u1ea7u ti&ecirc;n trong h\\u1ed9i ch\\u1ee3, c&oacute; m\\u1ed9t th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 \\u0111\\u1ebfn t\\u1eeb T&acirc;y Ban Nha. V\\u1edbi ch\\u1ea5t l\\u01b0\\u1ee3ng v\\u01b0\\u1ee3t tr\\u1ed9i, b\\u1ed9 s\\u01b0u t\\u1eadp s\\u1ea3n ph\\u1ea9m \\u0111\\u1ed9c \\u0111&aacute;o \\u0111&atilde; cu\\u1ed1n h&uacute;t nhi\\u1ec1u kh&aacute;ch h&agrave;ng tham quan v&agrave; t&igrave;m hi\\u1ec3u. N&oacute;i \\u0111\\u1ebfn \\u0111\\u1ed3 n\\u1ed9i th\\u1ea5t trang tr&iacute; t\\u1eeb T&acirc;y Ban Nha, m\\u1ecdi ng\\u01b0\\u1eddi kh&ocirc;ng th\\u1ec3 ph\\u1ee7 nh\\u1eadn r\\u1eb1ng m\\u1ecdi v\\u1eadt li\\u1ec7u t\\u1eeb g\\u1ea1ch men, thi\\u1ebft b\\u1ecb v\\u0103n ph&ograve;ng, nh&agrave; b\\u1ebfp \\u0111\\u1ec1u r\\u1ea5t c&oacute; ti\\u1ebfng tr&ecirc;n th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam. <a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\">S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS<\\/a> c\\u0169ng kh&ocirc;ng ph\\u1ea3i l&agrave; m\\u1ed9t ngo\\u1ea1i l\\u1ec7. C&ograve;n ch\\u1ea7n ch\\u1eeb g&igrave; n\\u1eefa, m\\u1eddi c&aacute;c b\\u1ea1n \\u0111\\u1ebfn v\\u1edbi s&agrave;n g\\u1ed7 FAUS \\u0111\\u1ec3 \\u0111\\u01b0\\u1ee3c s\\u1eed d\\u1ee5ng m\\u1ed9t s\\u1ea3n ph\\u1ea9m mang phong c&aacute;ch Ch&acirc;u &Acirc;u t\\u1ed1t nh\\u1ea5t v&agrave; hi\\u1ec7n \\u0111\\u1ea1i nh\\u1ea5t hi\\u1ec7n nay.&nbsp;<\\/p>\"}', '', 0, 0, 0, 1, 1490935348, '', 0, 1),
(35, 'vi', 2, 491, '', 'cach-phan-biet-hang-gia-hang-nhai-hang-chinh-hang-san-go-tay-ban-nha-faus', '', '', 'Cách phân biệt hàng giả, hàng nhái, hàng chính hãng Sàn gỗ Tây Ban Nha FAUS ', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha \\r\\n\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\",\"meta_description\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\",\"introtext\":\"<p>Hi\\u1ec7n nay m\\u1ee9c \\u0111\\u1ed9 n\\u1ed5i ti\\u1ebfng c\\u1ee7a th\\u01b0\\u01a1ng hi\\u1ec7u s\\u1ea3n ph\\u1ea9m c&agrave;ng l\\u1edbn th&igrave; s\\u1ef1 gi\\u1ea3 m\\u1ea1o v&agrave; kh\\u1ea3 n\\u0103ng b\\u1ecb \\u0111&aacute;nh c\\u1eafp th\\u01b0\\u01a1ng hi\\u1ec7u c\\u0169ng c&agrave;ng nhi\\u1ec1u<\\/p>\",\"content\":\"<p>NH\\u1eacN DI\\u1ec6N H&Agrave;NG CH&Iacute;NH H&Atilde;NG <a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\">S&Agrave;N G\\u1ed6 T&Acirc;Y BAN NHA FAUS<\\/a> - C&Aacute;CH PH&Acirc;N BI\\u1ec6T H&Agrave;NG GI\\u1ea2, H&Agrave;NG NH&Aacute;I, H&Agrave;NG K&Eacute;M CH\\u1ea4T L\\u01af\\u1ee2NG<\\/p>\\r\\n<p>Hi\\u1ec7n nay m\\u1ee9c \\u0111\\u1ed9 n\\u1ed5i ti\\u1ebfng c\\u1ee7a th\\u01b0\\u01a1ng hi\\u1ec7u s\\u1ea3n ph\\u1ea9m c&agrave;ng l\\u1edbn th&igrave; s\\u1ef1 gi\\u1ea3 m\\u1ea1o v&agrave; kh\\u1ea3 n\\u0103ng b\\u1ecb \\u0111&aacute;nh c\\u1eafp th\\u01b0\\u01a1ng hi\\u1ec7u c\\u0169ng c&agrave;ng nhi\\u1ec1u. V&igrave; th\\u1ebf nh\\u1eb1m m\\u1ee5c \\u0111&iacute;ch b\\u1ea3o v\\u1ec7 l\\u1ee3i &iacute;ch c\\u1ee7a ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng tr&aacute;nh nh\\u1ea7m l\\u1eabn mua ph\\u1ea3i h&agrave;ng gi\\u1ea3 h&agrave;ng nh&aacute;i, h&agrave;ng k&eacute;m ch\\u1ea5t l\\u01b0\\u1ee3ng \\u0111\\u1ed3ng th\\u1eddi b\\u1ea3o v\\u1ec7 quy\\u1ec1n l\\u1ee3i v&agrave; uy t&iacute;n c\\u1ee7a c&ocirc;ng ty. Ch&uacute;ng t&ocirc;i xin ph&eacute;p \\u0111\\u01b0\\u1ee3c cung c\\u1ea5p th&ocirc;ng tin nh\\u1eadn di\\u1ec7n th\\u01b0\\u01a1ng hi\\u1ec7<span class=\\\"text_exposed_show\\\">u <a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\">S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS<\\/a> nh\\u01b0 sau:<\\/span><\\/p>\\r\\n<div class=\\\"text_exposed_show\\\">\\r\\n<p>1. S&agrave;n g\\u1ed7 FAUS \\u0111\\u01b0\\u1ee3c s\\u1ea3n xu\\u1ea5t t\\u1ea1i <a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\">T&acirc;y Ban Nha<\\/a> v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ed9c quy\\u1ec1n b\\u1edfi C&ocirc;ng ty Vi\\u1ec7t Ph&aacute;t. Xem th&ocirc;ng tin nh&agrave; ph&acirc;n ph\\u1ed1i ch&iacute;nh th\\u1ee9c t\\u1ea1i Vi\\u1ec7t Nam b\\u1eb1ng c&aacute;ch truy c\\u1eadp trang web&nbsp;<a href=\\\"http:\\/\\/www.faus.es\\/\\\" rel=\\\"nofollow\\\" target=\\\"_blank\\\">www.faus.es<\\/a>&nbsp;&rarr; Point of Sale &rarr; Search Vietnam &rarr; th&ocirc;ng tin nh&agrave; ph&acirc;n ph\\u1ed1i<\\/p>\\r\\n<p><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/04\\/05\\/Image-16.jpg\\\" alt=\\\"\\\" width=\\\"1363\\\" height=\\\"581\\\" \\/><\\/p>\\r\\n<p><br \\/>2. Logo nh\\u1eadn di\\u1ec7n : 3 m&agrave;u \\u0111\\u1ecf, tr\\u1eafng, \\u0111en&nbsp;<\\/p>\\r\\n<p><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/04\\/05\\/Faus-Logo.jpg\\\" alt=\\\"\\\" width=\\\"798\\\" height=\\\"325\\\" \\/><\\/p>\\r\\n<p><br \\/>3. HDF l&otilde;i xanh, \\u0111\\u1eb1ng sau m\\u1ed7i t\\u1ea5m g\\u1ed7 c&oacute; in ch\\u1eef &ldquo;Made in Spain&rdquo;<\\/p>\\r\\n<p><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/04\\/05\\/z626895354810_6ade6afbe7dfd7dc3992b64763f12816.jpg\\\" alt=\\\"\\\" width=\\\"720\\\" height=\\\"960\\\" \\/><\\/p>\\r\\n<p><br \\/>4. Gi\\u1ea5y ch\\u1ee9ng nh\\u1eadn xu\\u1ea5t x\\u1ee9 h&agrave;ng h&oacute;a CO (Certificate of Origin) \\u0111\\u1ea7y \\u0111\\u1ee7 th&ocirc;ng tin h&agrave;ng h&oacute;a v&agrave; th&ocirc;ng tin c\\u1ee7a nh&agrave; ph&acirc;n ph\\u1ed1i c&ocirc;ng ty Vi\\u1ec7t Ph&aacute;t.<\\/p>\\r\\n<p>Tr&ecirc;n \\u0111&acirc;y l&agrave; v&agrave;i nh\\u1eadn di\\u1ec7n ch&iacute;nh, mong c&aacute;c b\\u1ea1n \\u0111\\u1ed3ng h&agrave;nh v&agrave; chia s\\u1ebb th&ocirc;ng tin n&agrave;y gi&uacute;p ch&uacute;ng t&ocirc;i \\u0111\\u1ec3 \\u0111\\u1ea5u tranh n&oacute;i kh&ocirc;ng v\\u1edbi h&agrave;ng gi\\u1ea3, h&agrave;ng nh&aacute;i, h&agrave;ng k&eacute;m ch\\u1ea5t l\\u01b0\\u1ee3ng!&nbsp;<br \\/><br \\/><\\/p>\\r\\n<\\/div>\"}', '', 0, 1, 0, 1, 1491385448, '', 0, 1),
(36, 'vi', 2, 490, '', 'san-go-tay-ban-nha-faus-floor-tham-gia-trien-lam-domotex-2017-tai-hannover-germany', '', '', 'Sàn gỗ Tây Ban Nha FAUS FLOOR tham gia triển lãm Domotex 2017 tại Hannover, Germany', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha \\r\\nS\\u00e0n g\\u1ed7 FAUS Floor \\r\\nS\\u00e0n g\\u1ed7 Ch\\u00e2u \\u00c2u \",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha \\r\\nS\\u00e0n g\\u1ed7 FAUS Floor \\r\\nS\\u00e0n g\\u1ed7 Ch\\u00e2u \\u00c2u \",\"meta_description\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha \\r\\nS\\u00e0n g\\u1ed7 FAUS Floor \\r\\nS\\u00e0n g\\u1ed7 Ch\\u00e2u \\u00c2u \",\"introtext\":\"<p><a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\">S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS FLOOR<\\/a> tham gia tri\\u1ec3n l&atilde;m Domotex 2017 t\\u1ea1i Hannover, Germany<\\/p>\",\"content\":\"<p>Ch\\u1eafc ai c\\u0169ng bi\\u1ebft h\\u1ed9i ch\\u1ee3 t\\u1ea1i \\u0110\\u1ee9c v\\u1ec1 ng&agrave;nh v\\u1eadt li\\u1ec7u x&acirc;y d\\u1ef1ng l\\u1edbn nh\\u1ea5t ph\\u1ea3i k\\u1ec3 \\u0111\\u1ebfn h\\u1ed9i ch\\u1ee3 Domotex. H\\u1ed9i ch\\u1ee3 quy t\\u1ee5 h&agrave;ng tri\\u1ec7u c&ocirc;ng ty, th\\u01b0\\u01a1ng hi\\u1ec7u t\\u1eeb kh\\u1eafp c&aacute;c n\\u01b0\\u1edbc tr&ecirc;n th\\u1ebf gi\\u1edbi. V\\u1edbi quy m&ocirc; v&agrave; gian h&agrave;ng \\u0111\\u1ea1t ti&ecirc;u chu\\u1ea9n Ch&acirc;u &Acirc;u, Domotex lu&ocirc;n l&agrave; \\u0111i\\u1ec3m \\u0111\\u1ebfn c\\u1ee7a c&aacute;c &ocirc;ng l\\u1edbn trong ng&agrave;nh v\\u1eadt li\\u1ec7u x&acirc;y d\\u1ef1ng, trang tr&iacute; n\\u1ed9i th\\u1ea5t v&agrave; b\\u1ea5t \\u0111\\u1ed9ng s\\u1ea3n. <a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\">S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS floor<\\/a> t\\u1ef1 h&agrave;o l&agrave; m\\u1ed9t trong nh\\u1eefng gian h&agrave;ng ti&ecirc;u chu\\u1ea9n g&oacute;p ph\\u1ea7n v&agrave;o s\\u1ef1 th&agrave;nh c&ocirc;ng c\\u1ee7a h\\u1ed9i ch\\u1ee3 t\\u1eeb ng&agrave;y 14-17\\/1\\/2017 v\\u1eeba qua. M\\u1eddi c&aacute;c b\\u1ea1n c&ugrave;ng tham quan gian h&agrave;ng c\\u1ee7a FAUS nh&eacute;.&nbsp;<\\/p>\"}', '', 0, 0, 0, 1, 1492007191, '', 0, 1),
(37, 'vi', 2, 481, '', 'can-tim-dai-ly-phan-phoi-san-go-tay-ban-nha-faus-floor-made-in-spain', '', '', 'Cần tìm đại lý phân phối Sàn gỗ Tây Ban Nha Faus Floor (Made in Spain)', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha Faus Floor\\r\\nS\\u00e0n g\\u1ed7 Faus Floor\\r\\nS\\u00e0n g\\u1ed7 Ch\\u00e2u \\u00c2u\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha Faus Floor\\r\\nS\\u00e0n g\\u1ed7 Faus Floor\\r\\nS\\u00e0n g\\u1ed7 Ch\\u00e2u \\u00c2u\",\"meta_description\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha Faus Floor\\r\\nS\\u00e0n g\\u1ed7 Faus Floor\\r\\nS\\u00e0n g\\u1ed7 Ch\\u00e2u \\u00c2u\",\"introtext\":\"<p>\\u2714 K&iacute;nh g\\u1eedi Qu&yacute; Kh&aacute;ch h&agrave;ng!&nbsp;<br \\/>\\u2714 C&ocirc;ng ty Vi\\u1ec7t Ph&aacute;t xin g\\u1eedi t\\u1edbi Qu&yacute; Kh&aacute;ch h&agrave;ng l\\u1eddi ch&agrave;o tr&acirc;n tr\\u1ecdng, l\\u1eddi ch&uacute;c s\\u1ee9c kh\\u1ecfe, h\\u1ea1nh ph&uacute;c v&agrave; th&agrave;nh \\u0111\\u1ea1t.&nbsp;<\\/p>\",\"content\":\"<p>&nbsp;<br \\/> \\u2714 K&iacute;nh g\\u1eedi Qu&yacute; Kh&aacute;ch h&agrave;ng!&nbsp;<br \\/> \\u2714 C&ocirc;ng ty Vi\\u1ec7t Ph&aacute;t xin g\\u1eedi t\\u1edbi Qu&yacute; Kh&aacute;ch h&agrave;ng l\\u1eddi ch&agrave;o tr&acirc;n tr\\u1ecdng, l\\u1eddi ch&uacute;c s\\u1ee9c kh\\u1ecfe, h\\u1ea1nh ph&uacute;c v&agrave; th&agrave;nh \\u0111\\u1ea1t.&nbsp;<br \\/> \\u2714 C&ocirc;ng ty Vi\\u1ec7t Ph&aacute;t l&agrave; nh&agrave; nh\\u1eadp kh\\u1ea9u ch&iacute;nh th\\u1ee9c v&agrave; ph&acirc;n ph\\u1ed1i \\u0111\\u1ed9c quy\\u1ec1n<a href=\\\"https:\\/\\/www.facebook.com\\/SangoTayBanNha.Fausfloor\\/\\\"> s&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS Floor<\\/a> t\\u1ea1i Vi\\u1ec7t Nam. S\\u1ea3n ph\\u1ea9m v\\u1edbi ch\\u1ea5t l\\u01b0\\u1ee3ng v\\u01b0\\u1ee3t tr\\u1ed9i c&ugrave;ng v\\u1edbi nh\\u1eefng b\\u1ed9 s\\u01b0u t\\u1eadp v&ocirc; c&ugrave;ng \\u0111\\u1ed9c \\u0111&aacute;o, kh&aacute;c bi\\u1ec7t so v\\u1edbi nh\\u1eefng lo\\u1ea1i s&agrave;n g\\u1ed7 Ch&acirc;u &Acirc;u hi\\u1ec7n nay.&nbsp;<br \\/> \\u2714 Ch&uacute;ng t&ocirc;i tr&acirc;n tr\\u1ecdng g\\u1eedi l\\u1eddi m\\u1eddi h\\u1ee3p t&aacute;c t\\u1edbi c&aacute;c \\u0111\\u1ed1i t&aacute;c l&agrave; \\u0111\\u1ea1i l&yacute; s&agrave;n g\\u1ed7, ki\\u1ebfn tr&uacute;c s\\u01b0, thi\\u1ebft k\\u1ebf, c&ocirc;ng ty x&acirc;y d\\u1ef1ng quan t&acirc;m v&agrave; c&oacute; nhu c\\u1ea7u ph&acirc;n ph\\u1ed1i s\\u1ea3n ph\\u1ea9m.&nbsp;<br \\/> \\u2714 Ch&uacute;ng t&ocirc;i cam k\\u1ebft \\u0111\\u01b0a ra m\\u1ed9t m\\u1ee9c chi\\u1ebft kh\\u1ea9u h\\u1ee3p l&yacute; nh\\u1ea5t, \\u0111\\u1ed3ng th\\u1eddi \\u0111\\u1ea3m b\\u1ea3o ch\\u1ea5t l\\u01b0\\u1ee3ng d\\u1ecbch v\\u1ee5 t\\u1ed1t nh\\u1ea5t d&agrave;nh cho Qu&yacute; kh&aacute;ch h&agrave;ng. S\\u1ef1 h\\u1ee3p t&aacute;c \\u0111&ocirc;i b&ecirc;n c&ugrave;ng c&oacute; l\\u1ee3i v&agrave; l&acirc;u d&agrave;i l&agrave; m\\u1ee5c ti&ecirc;u quan tr\\u1ecdng m&agrave; ch&uacute;ng t&ocirc;i h\\u01b0\\u1edbng \\u0111\\u1ebfn.&nbsp;<br \\/> \\u2714 N\\u1ebfu Qu&yacute; Kh&aacute;ch c\\u1ea7n t&igrave;m hi\\u1ec3u th&ecirc;m v\\u1ec1 s\\u1ea3n ph\\u1ea9m,Qu&yacute; kh&aacute;ch c&oacute; th\\u1ec3 truy c\\u1eadp website:&nbsp;<a href=\\\"http:\\/\\/www.sangovietphat.com\\/\\\" target=\\\"_blank\\\">www.sangovietphat.com<\\/a>&nbsp;ho\\u1eb7c g\\u1ecdi s\\u1ed1 hotline 0982 088 969&nbsp;<br \\/> \\u2714 C\\u1ea3m \\u01a1n Qu&yacute; kh&aacute;ch h&agrave;ng \\u0111&atilde; \\u0111\\u1ecdc b&agrave;i vi\\u1ebft n&agrave;y!<\\/p>\"}', '', 0, 0, 0, 1, 1492168780, '', 0, 1);
INSERT INTO `tbl_news` (`id`, `language`, `cat_id`, `introimage_id`, `news_image`, `alias`, `meta_keyword`, `meta_description`, `name`, `meta_title`, `introtext`, `content`, `other`, `source`, `order_view`, `home`, `new`, `status`, `created_time`, `CreateDate`, `visits`, `created_by`) VALUES
(38, 'vi', 2, 482, '', 'de-san-go-cong-nghiep-khong-bi-moi-mot-tan-cong', '', '', 'Để sàn gỗ công nghiệp không bị mối mọt tấn công ', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"C\\u00e1ch l\\u1eafp \\u0111\\u1eb7t s\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p kh\\u00f4ng b\\u1ecb m\\u1ed1i m\\u1ecdt\",\"meta_keyword\":\"C\\u00e1ch l\\u1eafp \\u0111\\u1eb7t s\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p kh\\u00f4ng b\\u1ecb m\\u1ed1i m\\u1ecdt\\r\\n\",\"meta_description\":\"C\\u00e1ch l\\u1eafp \\u0111\\u1eb7t s\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p kh\\u00f4ng b\\u1ecb m\\u1ed1i m\\u1ecdt\",\"introtext\":\"<p>M\\u1ed1i m\\u1ecdt lu&ocirc;n l&agrave; k\\u1ebb th&ugrave; c\\u1ee7a s&agrave;n g\\u1ed7 \\u0111\\u1eb7c bi\\u1ec7t l&agrave; s&agrave;n g\\u1ed7 t\\u1ef1 nhi&ecirc;n. Tuy s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p \\u0111&atilde; \\u0111\\u01b0\\u1ee3c x\\u1eed l&yacute; khi s\\u1ea3n xu\\u1ea5t, nh\\u01b0ng c\\u0169ng kh&ocirc;ng th\\u1ec3 \\u0111\\u1ea3m b\\u1ea3o 100% kh&ocirc;ng b\\u1ecb m\\u1ed1i m\\u1ecdt t\\u1ea5n c&ocirc;ng. T\\u1eeb l&acirc;u lo\\u1ea1i c&ocirc;n tr&ugrave;ng n&agrave;y \\u0111&atilde; g&acirc;y ra thi\\u1ec7t h\\u1ea1i cho cu\\u1ed9c s\\u1ed1ng c\\u1ee7a ch&uacute;ng ta, ch&uacute;ng c&oacute; m\\u1eb7t kh\\u1eafp n\\u01a1i \\u0111\\u1ec3 g&acirc;y h\\u1ea1i cho c&aacute;c c&ocirc;ng tr&igrave;nh s\\u1eed d\\u1ee5ng ch\\u1ea5t li\\u1ec7u g\\u1ed7. Ch&uacute;ng ta h&atilde;y c&ugrave;ng nhau t&igrave;m hi\\u1ec3u c&aacute;ch l\\u1eafp \\u0111\\u1eb7t s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p kh&ocirc;ng b\\u1ecb m\\u1ed1i m\\u1ecdt \\u0111\\u1ec3 c&oacute; th\\u1ec3 an t&acirc;m s\\u1eed d\\u1ee5ng m\\u1ecdi \\u0111\\u1ed3 g\\u1ed7 m\\u1ed9t c&aacute;ch an to&agrave;n h\\u01a1n.<\\/p>\",\"content\":\"<p>C&oacute; r\\u1ea5t nhi\\u1ec1u c&aacute;ch \\u0111\\u1ec3 x\\u1eed l&yacute; m\\u1ed1i m\\u1ecdt nh\\u01b0 phun thu\\u1ed1c m\\u1ed1i, r\\u1eafc v&ocirc;i, qu&eacute;t d\\u1ea7u v&agrave;o \\u0111\\u1ed3 g\\u1ed7&hellip;. nh\\u01b0ng nh\\u1eefng c&aacute;ch \\u0111&oacute; ch\\u1ec9 di\\u1ec7t \\u0111\\u01b0\\u1ee3c ng\\u1ecdn m&agrave; kh&ocirc;ng di\\u1ec7t \\u0111\\u01b0\\u1ee3c t\\u1eadn g\\u1ed1c. C&aacute;c b\\u1ea1n ph\\u1ea3i th\\u1ef1c s\\u1ef1 hi\\u1ec3u quy tr&igrave;nh di\\u1ec7t m\\u1ed1i t\\u1eadn g\\u1ed1c. V\\u1ec1 c\\u01a1 b\\u1ea3n, m\\u1ed1i \\u0111\\u01b0\\u1ee3c sinh ra t\\u1eeb m\\u1ed1i ch&uacute;a, mu\\u1ed1n di\\u1ec7t \\u0111\\u01b0\\u1ee3c t\\u1eadn g\\u1ed1c \\u1ed5 m\\u1ed1i ch&uacute;ng ta ph\\u1ea3i di\\u1ec7t \\u0111\\u01b0\\u1ee3c con m\\u1ed1i ch&uacute;a n&agrave;y.<\\/p>\\r\\n<p><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/05\\/13\\/ACACIA-NATURAL-TEMPO_amb-730x438.jpg\\\" alt=\\\"\\\" width=\\\"730\\\" height=\\\"438\\\" \\/><\\/p>\\r\\n<p><strong>1. X\\u1eed l&yacute; m\\u1eb7t b\\u1eb1ng tr\\u01b0\\u1edbc khi ti\\u1ebfn h&agrave;nh l\\u1eafp \\u0111\\u1eb7t s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p <\\/strong><\\/p>\\r\\n<p>\\u0110\\u1ed1i v\\u1edbi c&aacute;c c&ocirc;ng tr&igrave;nh l\\u1edbn nh\\u01b0 chung c\\u01b0, nh&agrave; \\u1edf li\\u1ec1n k\\u1ec1, b\\u1ec7nh vi\\u1ec7n, tr\\u01b0\\u1eddng h\\u1ecdc th&igrave; c&aacute;c b\\u1ea1n c&oacute; th\\u1ec3 y&ecirc;n t&acirc;m tr\\u01b0\\u1edbc khi x&acirc;y d\\u1ef1ng c&aacute;c ch\\u1ee7 \\u0111\\u1ea7u t\\u01b0 \\u0111&atilde; c&oacute; bi\\u1ec7n ph&aacute;p ch\\u1ed1ng m\\u1ed1i ho&agrave;n to&agrave;n h\\u1eefu hi\\u1ec7u. N&ecirc;n c&aacute;c b\\u1ea1n \\u0111\\u1ec3 &yacute; h\\u1ea7u nh\\u01b0 l&agrave; kh&ocirc;ng c&oacute; m\\u1ed1i b\\u1ecb x&ocirc;ng t\\u1ea1i c&aacute;c n\\u01a1i n&agrave;y<\\/p>\\r\\n<p>N\\u1ebfu c&aacute;c b\\u1ea1n \\u1edf nh&agrave; ri&ecirc;ng \\u1edf g\\u1ea7n c&aacute;nh \\u0111\\u1ed3ng, xung quanh c&oacute; nhi\\u1ec1u c&acirc;y c\\u1ed1i th&igrave; s\\u1ebd c&oacute; nguy c\\u01a1 cao b\\u1ecb m\\u1ed1i v&igrave; c&ocirc;n tr&ugrave;ng hay bay v&agrave;o nh&agrave; \\u0111\\u1ebb tr\\u1ee9ng. Nh&agrave; \\u1edf \\u0111&atilde; t\\u1eebng b\\u1ecb m\\u1ed1i m\\u1ecdt tr\\u01b0\\u1edbc kh&iacute; l\\u1eafp \\u0111\\u1eb7t s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p n&ecirc;n x\\u1eed l&yacute; b\\u1eb1ng thu\\u1ed1c b\\u1ed9t v&agrave; h\\u1ed9p nh\\u1eed m\\u1ed1i, l\\u01b0u &yacute; v\\u1edbi c&aacute;c b\\u1ea1n l&agrave; thu\\u1ed1c b\\u1ed9t ch\\u1ee9 kh&ocirc;ng ph\\u1ea3i thu\\u1ed1c n\\u01b0\\u1edbc. B\\u1eb1ng c&aacute;ch r\\u1eafc thu\\u1ed1c b\\u1ed9t v&agrave;o h\\u1ed9p nh\\u1eed m\\u1ed1i. N\\u1ebfu n\\u01a1i \\u1edf c&oacute; m\\u1ed1i, ngay l\\u1eadp t\\u1ee9c m\\u1ed1i th\\u1ee3 s\\u1ebd k&eacute;o \\u0111\\u1ebfn nh\\u1eefng chi\\u1ebfc h\\u1ed9p nh\\u1eed m\\u1ed1i, sau \\u0111&oacute; b\\u1ea1n r\\u1eafc thu\\u1ed1c b\\u1ed9t l&ecirc;n h\\u1ed9p nh\\u1eed m\\u1ed1i v&agrave; \\u0111\\u1eady l\\u1ea1i. Nh\\u1eefng ch&uacute; m\\u1ed1i th\\u1ee3 s\\u1ebd mang th\\u1ee9c \\u0103n c\\u1ed9ng thu\\u1ed1c di\\u1ec7t m\\u1ed1i v\\u1ec1 t\\u1ed5 v&agrave; di\\u1ec7t m\\u1ed1i ch&uacute;a<\\/p>\\r\\n<p>N\\u1ebfu nh&agrave; b\\u1ea1n \\u1edf m&agrave; \\u0111\\u1ed3 g\\u1ed7 c\\u0169ng nh\\u01b0 s&agrave;n g\\u1ed7 \\u0111ang b\\u1ecb m\\u1ed1i c\\u1ea7n th&aacute;o ra, v&agrave; ch\\u1ec9 c\\u1ea7n mua thu\\u1ed1c b\\u1ed9t v\\u1ec1 r\\u1eafc l&ecirc;n t\\u1ea5m s&agrave;n g\\u1ed7 \\u0111ang b\\u1ecb m\\u1ed1i \\u0103n. B\\u1eb1ng c&aacute;ch t\\u01b0\\u01a1ng t\\u1ef1 con m\\u1ed1i ch&uacute;a s\\u1ebd \\u0111\\u01b0\\u1ee3c di\\u1ec7t t\\u1eadn g\\u1ed1c. Sau \\u0111&oacute; b\\u1ea1n v\\u1ec7 sinh s\\u1ea1ch s\\u1ebd r\\u1ed3i thay lo\\u1ea1i s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p cao c\\u1ea5p m\\u1edbi c&oacute; kh\\u1ea3 n\\u0103ng ch\\u1ed1ng m\\u1ed1i m\\u1ecdt cao.<\\/p>\\r\\n<p>Lu&ocirc;n gi\\u1eef cho m&ocirc;i tr\\u01b0\\u1eddng \\u1edf kh&ocirc; tho&aacute;ng, lo\\u1ea1i b\\u1ecf h\\u1ebft nh\\u1eefng th\\u1ee9 \\u0111\\u1ed3 \\u0111\\u1ea1c c\\u0169, s&aacute;ch b&aacute;o l&acirc;u ng&agrave;y c\\u0169ng c\\u1ea7n lo\\u1ea1i b\\u1ecf ho\\u1eb7c ki\\u1ec3m tra k\\u1ef9 l\\u01b0\\u1ee1ng v&igrave; \\u0111&acirc;y l&agrave; nh\\u1eefng m&oacute;n \\u0103n ngon cho l\\u0169 m\\u1ed1i m\\u1ecdt.<\\/p>\\r\\n<p><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/05\\/13\\/Cerezo-393-Formosa-TEMPO_amb_2-730x438.jpg\\\" alt=\\\"\\\" width=\\\"730\\\" height=\\\"438\\\" \\/><\\/p>\\r\\n<p>2. <strong>S\\u1eed d\\u1ee5ng c&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 c&oacute; kh\\u1ea3 n\\u0103ng ch\\u1ed1ng m\\u1ed1i m\\u1ecdt cao<\\/strong><\\/p>\\r\\n<p>- \\u0110\\u1ed1i v\\u1edbi s&agrave;n g\\u1ed7 t\\u1ef1 nhi&ecirc;n c&aacute;c lo\\u1ea1i nh\\u01b0 Lim, Gi&aacute;ng H\\u01b0\\u01a1ng \\u0111\\u01b0\\u1ee3c cho l&agrave; c&oacute; kh\\u1ea3 n\\u0103ng ch\\u1ed1ng m\\u1ed1i m\\u1ecdt cao, n&oacute; c&oacute; \\u0111\\u1eb7c t&iacute;nh ch\\u1ed1ng m\\u1ed1i m\\u1ecdt t\\u1ef1 nhi&ecirc;n. Tr&aacute;nh l&agrave;m g\\u1ed7 th&ocirc;ng v&igrave; t&iacute;nh ch\\u1ea5t g\\u1ed7 th&ocirc;ng ng\\u1ecdt l\\u1ecbm s\\u1ebd l&agrave; m&oacute;n \\u0103n ngon l&agrave;nh cho m\\u1ed1i m\\u1ecdt.<\\/p>\\r\\n<p>- C&aacute;c lo\\u1ea1i&nbsp;<a title=\\\"S&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p ch\\u1ecbu n\\u01b0\\u1edbc Cao C\\u1ea5p, Gi&aacute; R\\u1ebb nh\\u1ea5t H&agrave; N\\u1ed9i, H\\u1ea3i Ph&ograve;ng\\\" href=\\\"http:\\/\\/www.sangovietphat.com\\\" target=\\\"_top\\\">s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p<\\/a>&nbsp;cao c\\u1ea5p nh\\u1eadp kh\\u1ea9u t\\u1eeb Ch&acirc;u &Acirc;u, Th&aacute;i Lan, Malaysia v&agrave; m\\u1ed9t s\\u1ed1 lo\\u1ea1i s&agrave;n g\\u1ed7 cao c\\u1ea5p xu\\u1ea5t x\\u1ee9 t\\u1eeb Trung Qu\\u1ed1c c&oacute; kh\\u1ea3 n\\u0103ng ch\\u1ed1ng m\\u1ed1i m\\u1ecdt kh&aacute; t\\u1ed1t. C&aacute;c b\\u1ea1n c&oacute; th\\u1ec3 tham kh\\u1ea3o c&aacute;c th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 T&acirc;y Ban Nha FausFloor, S&agrave;n g\\u1ed7 ThaiGreen, S&agrave;n g\\u1ed7 Sophia, S&agrave;n g\\u1ed7 Harotex&hellip;R\\u1ea5t nhi\\u1ec1u th\\u01b0\\u01a1ng hi\\u1ec7u cao c\\u1ea5p kh&aacute;c n\\u1eefa.<\\/p>\\r\\n<p>- S\\u1eed d\\u1ee5ng c&aacute;c lo\\u1ea1i&nbsp;<a href=\\\"http:\\/\\/sangovietphat.com\\\">ph\\u1ee5 ki\\u1ec7n s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p<\\/a>&nbsp;\\u0111i k&egrave;m nh\\u01b0 ph&agrave;o nh\\u1ef1a, n\\u1eb9p nh\\u1ef1a ho\\u1eb7c n\\u1eb9p kim lo\\u1ea1i thay th\\u1ebf cho c&aacute;c lo\\u1ea1i ph&agrave;o ch&acirc;n t\\u01b0\\u1eddng b\\u1eb1ng g\\u1ed7 c&ocirc;ng nghi\\u1ec7p ho\\u1eb7c t\\u1ef1 nhi&ecirc;n.<\\/p>\\r\\n<p><strong>3 . C&aacute;ch l\\u1eafp \\u0111\\u1eb7t s&agrave;n g\\u1ed7 ph&ograve;ng tr&aacute;nh m\\u1ed1i m\\u1ecdt hi\\u1ec7u qu\\u1ea3<\\/strong><\\/p>\\r\\n<p>R\\u1eafc thu\\u1ed1c b\\u1ed9t ph&ograve;ng ch\\u1ed1ng m\\u1ed1i m\\u1ecdt tr\\u01b0\\u1edbc khi&nbsp;<a href=\\\"http:\\/\\/sangovietphat.com\\\">thi c&ocirc;ng s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p<\\/a>, nh\\u1eefng nh&agrave; tr\\u01b0\\u1edbc \\u0111&oacute; \\u0111&atilde; t\\u1eebng b\\u1ecb m\\u1ed1i m\\u1ecdt l\\u1ea1i c&agrave;ng c\\u1ea7n ph\\u1ea3i l&agrave;m \\u0111i\\u1ec1u n&agrave;y.<\\/p>\\r\\n<p>L\\u1eafp gh&eacute;p c&aacute;c t\\u1ea5m g\\u1ed7 c&ocirc;ng nghi\\u1ec7p cao c\\u1ea5p ch\\u1ed1ng m\\u1ed1i m\\u1ecdt, s\\u1eed d\\u1ee5ng ph&agrave;o ch&acirc;n t\\u01b0\\u1eddng nh\\u1ef1a, n\\u1eb9p nh\\u1ef1a, n\\u1eb9p kim lo\\u1ea1i.<\\/p>\\r\\n<p>T\\u1ea1o m&ocirc;i tr\\u01b0\\u1eddng th&ocirc;ng tho&aacute;ng, th\\u01b0\\u1eddng xuy&ecirc;n ki\\u1ec3m tra c&aacute;c d\\u1ea5u v\\u1ebft c\\u1ee7a m\\u1ed1i m\\u1ecdt \\u0111\\u1ec3 k\\u1ecbp th\\u1eddi x\\u1eed l&yacute;. Xem th&ecirc;m&nbsp;<a href=\\\"http:\\/\\/www.sangovietphat.com\\\"><strong>c&aacute;ch x\\u1eed l&yacute; m\\u1ed1i m\\u1ecdt cho s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p<\\/strong>.<\\/a><\\/p>\\r\\n<p>Kh&ocirc;ng n&ecirc;n mua v&agrave; s\\u1eed d\\u1ee5ng c&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p gi&aacute; r\\u1ebb n\\u1ebfu b\\u1ea1n kh&ocirc;ng mu\\u1ed1n m\\u1ed9t ng&agrave;y kh&ocirc;ng xa s\\u1ebd b\\u1ecb m\\u1ed1i m\\u1ecdt x&acirc;m chi\\u1ebfm v&agrave; ho&agrave;nh h&agrave;nh. Tham kh\\u1ea3o c&aacute;c ch\\u1ec9 d\\u1eabn ph&ograve;ng ch\\u1ed1ng m\\u1ed1i m\\u1ecdt c\\u1ee7a ng\\u01b0\\u1eddi l\\u1eafp \\u0111\\u1eb7t t\\u01b0 v\\u1ea5n.<\\/p>\\r\\n<p>&nbsp;<\\/p>\"}', '', 0, 1, 1, 1, 1494686145, '', 0, 1),
(39, 'vi', 2, 489, '', 'vi-sao-ban-nen-su-dung-san-go-cao-cap', '', '', 'Vì sao bạn nên sử dụng sàn gỗ cao cấp', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"V\\u00ec sao b\\u1ea1n n\\u00ean s\\u1eed d\\u1ee5ng s\\u00e0n g\\u1ed7 cao c\\u1ea5p\",\"meta_keyword\":\"V\\u00ec sao b\\u1ea1n n\\u00ean s\\u1eed d\\u1ee5ng s\\u00e0n g\\u1ed7 cao c\\u1ea5p\",\"meta_description\":\"V\\u00ec sao b\\u1ea1n n\\u00ean s\\u1eed d\\u1ee5ng s\\u00e0n g\\u1ed7 cao c\\u1ea5p\",\"introtext\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p kh&ocirc;ng c&ograve;n qu&aacute; xa l\\u1ea1 v\\u1edbi ch&uacute;ng ta nh\\u01b0 c&aacute;ch \\u0111&acirc;y 10 n\\u0103m v\\u1ec1 tr\\u01b0\\u1edbc. Ch&uacute;ng \\u0111\\u01b0\\u1ee3c thay th\\u1ebf d\\u1ea7n so v\\u1edbi s&agrave;n g\\u1ed7 t\\u1ef1 nhi&ecirc;n v&igrave; nhi\\u1ec1u t&iacute;nh n\\u0103ng n\\u1ed5i tr\\u1ed9i nh\\u01b0 m&agrave;u s\\u1eafc \\u0111\\u1ec1u \\u0111\\u1eb9p, gi&aacute; th&agrave;nh ph\\u1ea3i ch\\u0103ng. Ng&agrave;nh n&agrave;o th&igrave; c\\u0169ng \\u0111\\u1ec1u g\\u1eb7p ph\\u1ea3i r\\u1ea5t nhi\\u1ec1u s\\u1ef1 canh tranh n&ecirc;n s\\u1ea3n ph\\u1ea9m c\\u0169ng c&oacute; r\\u1ea5t nhi\\u1ec1u m\\u1ee9c gi&aacute; th&agrave;nh kh&aacute;c nhau \\u0111\\u1ec3 \\u0111&aacute;p \\u1ee9ng nhu c\\u1ea7u c\\u1ee7a ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng. Tuy v\\u1eady, d&ograve;ng s&agrave;n ph\\u1ea9m cao c\\u1ea5p v\\u1eabn \\u0111\\u01b0\\u1ee3c nhi\\u1ec1u ng\\u01b0\\u1eddi ti&ecirc;u d\\u1ee5ng ch\\u1ecdn l\\u1ef1a v&igrave; \\u0111\\u1eb7c t&iacute;nh ri&ecirc;ng c\\u1ee7a ch&uacute;ng. Sau \\u0111&acirc;y ch&uacute;ng t&ocirc;i xin chia s\\u1ebb nh\\u1eefng l&yacute; do <strong><a href=\\\"http:\\/\\/sangovietphat.com\\/tin\\/38\\/de-san-go-cong-nghiep-khong-bi-moi-mot-tan-cong\\\">v&igrave; sao ch&uacute;ng ta n&ecirc;n s\\u1eed d\\u1ee5ng s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p cao c\\u1ea5p<\\/a><\\/strong><\\/p>\",\"content\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p kh&ocirc;ng c&ograve;n qu&aacute; xa l\\u1ea1 v\\u1edbi ch&uacute;ng ta nh\\u01b0 c&aacute;ch \\u0111&acirc;y 10 n\\u0103m v\\u1ec1 tr\\u01b0\\u1edbc. Ch&uacute;ng \\u0111\\u01b0\\u1ee3c thay th\\u1ebf d\\u1ea7n so v\\u1edbi s&agrave;n g\\u1ed7 t\\u1ef1 nhi&ecirc;n v&igrave; nhi\\u1ec1u t&iacute;nh n\\u0103ng n\\u1ed5i tr\\u1ed9i nh\\u01b0 m&agrave;u s\\u1eafc \\u0111\\u1ec1u \\u0111\\u1eb9p, gi&aacute; th&agrave;nh ph\\u1ea3i ch\\u0103ng. Ng&agrave;nh n&agrave;o th&igrave; c\\u0169ng \\u0111\\u1ec1u g\\u1eb7p ph\\u1ea3i r\\u1ea5t nhi\\u1ec1u s\\u1ef1 canh tranh n&ecirc;n s\\u1ea3n ph\\u1ea9m c\\u0169ng c&oacute; r\\u1ea5t nhi\\u1ec1u m\\u1ee9c gi&aacute; th&agrave;nh kh&aacute;c nhau \\u0111\\u1ec3 \\u0111&aacute;p \\u1ee9ng nhu c\\u1ea7u c\\u1ee7a ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng. Tuy v\\u1eady, d&ograve;ng s&agrave;n ph\\u1ea9m cao c\\u1ea5p v\\u1eabn \\u0111\\u01b0\\u1ee3c nhi\\u1ec1u ng\\u01b0\\u1eddi ti&ecirc;u d\\u1ee5ng ch\\u1ecdn l\\u1ef1a v&igrave; \\u0111\\u1eb7c t&iacute;nh ri&ecirc;ng c\\u1ee7a ch&uacute;ng. Sau \\u0111&acirc;y ch&uacute;ng t&ocirc;i xin chia s\\u1ebb nh\\u1eefng l&yacute; do<strong>&nbsp;<strong><a href=\\\"http:\\/\\/sangovietphat.com\\/admin\\/news\\/sangovietphat.com\\\">v&igrave; sao ch&uacute;ng ta n&ecirc;n s\\u1eed d\\u1ee5ng s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p cao c\\u1ea5p<\\/a><\\/strong><\\/strong><\\/p>\\r\\n<p><strong>S\\u1eed d\\u1ee5ng s&agrave;n g\\u1ed7 cao c\\u1ea5p gi&uacute;p b\\u1ea1n b\\u1ea3o v\\u1ec7 s\\u1ee9c kh\\u1ecfe cho c\\u1ea3 gia \\u0111&igrave;nh<\\/strong><\\/p>\\r\\n<p>L\\u01b0\\u1edbt qua th\\u1ecb tr\\u01b0\\u1eddng s&agrave;n g\\u1ed7 &nbsp;hi\\u1ec7n nay, c&aacute;c b\\u1ea1n kh&ocirc;ng kh\\u1ecfi cho&aacute;ng v&aacute;ng v&igrave; c&oacute; qu&aacute; nhi\\u1ec1u s\\u1ea3n ph\\u1ea9m. C&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p gi&aacute; r\\u1ebb \\u0111\\u01b0\\u1ee3c s\\u1ea3n xu\\u1ea5t v\\u1edbi nhi\\u1ec1u ch\\u1ea5t ph\\u1ee5 gia \\u0111\\u1eb7c bi\\u1ec7t l&agrave; l\\u01b0\\u1ee3ng formaldehyde qu&aacute; nhi\\u1ec1u \\u0111\\u1ec3 gi\\u1ea3m gi&aacute; th&agrave;nh s\\u1ea3n ph\\u1ea9m. S\\u1eed d\\u1ee5ng nh\\u1eefng s\\u1ea3n ph\\u1ea9m n&agrave;y trong th\\u1eddi gian d&agrave;i s\\u1ebd g&acirc;y \\u1ea3nh h\\u01b0\\u1edfng nghi&ecirc;m tr\\u1ecdng \\u0111\\u1ebfn s\\u1ee9c kh\\u1ecfe c\\u1ee7a ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng. \\u0110&oacute; ch&iacute;nh l&agrave; l&yacute; do v&igrave; sao ngay l&uacute;c n&agrave;y c&aacute;c b\\u1ea1n n&ecirc;n ch\\u1ecdn mua <strong><a href=\\\"http:\\/\\/sangovietphat.com\\/admin\\/news\\/sangovietphat.com\\\">s&agrave;n g\\u1ed7 cao c\\u1ea5p<\\/a> <\\/strong>ch&iacute;nh h&atilde;ng c\\u1ee7a c&aacute;c th\\u01b0\\u01a1ng hi\\u1ec7u tr&ecirc;n th\\u1ecb tr\\u01b0\\u1eddng m&agrave; \\u0111i\\u1ec3n h&igrave;nh l&agrave; th\\u01b0\\u01a1ng hi\\u1ec7u s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p \\u0111\\u1ebfn t\\u1eeb Ch&acirc;u &Acirc;u nh\\u01b0 S&agrave;n g\\u1ed7 T&acirc;y Ban Nha Fausfloor ho\\u1eb7c Th&aacute;i Lan nh\\u01b0 Thaigreen&hellip; b\\u1edfi \\u0111\\u1eb7c t&iacute;nh c\\u1ea5u t\\u1ea1o c\\u1ee7a ri&ecirc;ng ch&uacute;ng. &nbsp;<\\/p>\\r\\n<p><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/05\\/21\\/anh-2.jpg\\\" alt=\\\"\\\" width=\\\"800\\\" height=\\\"600\\\" \\/><\\/p>\\r\\n<p><strong>S&agrave;n g\\u1ed7 cao c\\u1ea5p c\\u0169ng gi\\u1ed1ng nh\\u01b0 h&agrave;ng hi\\u1ec7u th\\u1eddi trang <\\/strong><strong>&nbsp;<\\/strong><\\/p>\\r\\n<p>Ngay t\\u1eeb ban \\u0111\\u1ea7u, c&aacute;c m\\u1eabu s&agrave;n g\\u1ed7 Trung Qu\\u1ed1c v&agrave; r\\u1ebb ti\\u1ec1n s\\u1ebd r\\u1ea5t b\\u1eaft m\\u1eaft v\\u1ec1 m\\u1eabu m&atilde; v&agrave; s\\u1ea3n ph\\u1ea9m h\\u01a1n so v\\u1edbi c&aacute;c s\\u1ea3n ph\\u1ea9m h&agrave;ng cao c\\u1ea5p \\u0111\\u1eaft ti\\u1ec1n. Nh\\u01b0ng c\\u0169ng nh\\u01b0 h&agrave;ng hi\\u1ec7u th\\u1eddi trang, sau m\\u1ed9t th\\u1eddi gian d&agrave;i s\\u1eed d\\u1ee5ng ch&uacute;ng c&agrave;ng ng&agrave;y c&agrave;ng ch\\u1ea5t gi&uacute;p t&ocirc;n vinh n&eacute;p \\u0111\\u1eb9p cho ng&ocirc;i nh&agrave; c\\u1ee7a b\\u1ea1n h\\u01a1n nhi\\u1ec1u so v\\u1edbi <strong><a href=\\\"http:\\/\\/sangovietphat.com\\/admin\\/news\\/sangovietphat.com\\\">s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p gi&aacute; r\\u1ebb<\\/a><\\/strong><\\/p>\\r\\n<p>Theo kh\\u1ea3o s&aacute;t th\\u1ef1c t\\u1ebf c&aacute;c ch\\u1ee7 \\u0111\\u1ea7u t\\u01b0 th\\u01b0\\u1eddng s\\u1eed d\\u1ee5ng c&aacute;c lo\\u1ea1i v&aacute;n s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p gi&aacute; r\\u1ebb, sau \\u0111&oacute; ch\\u1ee7 nh&agrave; sau khi nh\\u1eadn nh&agrave; th\\u01b0\\u1eddng ph\\u1ea3i l\\u1ef1a ch\\u1ecdn l\\u1ea1i c&aacute;c lo\\u1ea1i s\\u1ea3n ph\\u1ea9m cao c\\u1ea5p \\u0111\\u1ec3 thay th\\u1ebf. V&igrave; c&aacute;c s\\u1ea3n ph\\u1ea9m gi&aacute; r\\u1ebb sau m\\u1ed9t th\\u1eddi gian ng\\u1eafn s\\u1eed d\\u1ee5ng d\\u1ec5 b\\u1ecb h\\u01b0 h\\u1ecfng nhanh khi g\\u1eb7p c&aacute;c \\u0111i\\u1ec1u ki\\u1ec7n m&ocirc;i tr\\u01b0\\u1eddng x\\u1ea5u \\u1ea9m \\u01b0\\u1edbt, d&iacute;nh n\\u01b0\\u1edbc v&agrave; h\\u1ecd ch\\u1eafc ch\\u1eafn s\\u1ebd ph\\u1ea3i t&igrave;m ki\\u1ebfm m\\u1ed9t lo\\u1ea1i s\\u1ea3n ph\\u1ea9m cao c\\u1ea5p h\\u01a1n \\u0111\\u1ec3 s\\u1eed d\\u1ee5ng l&acirc;u d&agrave;i v\\u1eeba t\\u1ed1t cho s\\u1ee9c kh\\u1ecfe m&agrave; l\\u1ea1i kh&ocirc;ng ph\\u1ea3i s\\u1eeda ch\\u1eefa trong qu&aacute; tr&igrave;nh s\\u1eed d\\u1ee5ng<\\/p>\\r\\n<p><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/05\\/21\\/61-Espiga-Multicolor_amb7.jpg\\\" alt=\\\"\\\" width=\\\"800\\\" height=\\\"600\\\" \\/><\\/p>\\r\\n<p>Trong ng&ocirc;i nh&agrave; th&igrave; ph\\u1ea7n s&agrave;n g\\u1ed7 lu&ocirc;n l&agrave; \\u0111i\\u1ec3m nh\\u1ea5n l\\u1edbn nh\\u1ea5t do v\\u1eady m&agrave; vi\\u1ec7c l\\u1ef1a ch\\u1ecdn s&agrave;n g\\u1ed7 sao cho v\\u1eeba &yacute; ngay t\\u1eeb \\u0111\\u1ea7u lu&ocirc;n l&agrave; \\u0111i\\u1ec1u n&ecirc;n \\u0111\\u01b0\\u1ee3c coi tr\\u1ecdng, n&ecirc;n c&oacute; s\\u1ef1 t&igrave;m hi\\u1ec3u nhi\\u1ec1u h\\u01a1n v\\u1ec1 c&aacute;c th&ocirc;ng tin, c&aacute;ch l\\u1ef1a ch\\u1ecdn<a href=\\\"http:\\/\\/sangovietphat.com\\/admin\\/news\\/sangovietphat.com\\\">&nbsp;<strong>s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p ch\\u1ea5t l\\u01b0\\u1ee3ng t\\u1ed1t nh\\u1ea5t<\\/strong><\\/a>, gi&aacute; ph\\u1ea3i ch\\u0103ng nh\\u1ea5t \\u0111i\\u1ec1u n&agrave;y ch\\u1ec9 c&oacute; \\u0111\\u01b0\\u1ee3c khi b\\u1ea1n t&igrave;m mua s\\u1ea3n ph\\u1ea9m \\u1edf m\\u1ed9t c\\u1eeda h&agrave;ng uy t&iacute;n.<\\/p>\\r\\n<p><strong>S&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p cao c\\u1ea5p c&oacute; \\u0111\\u1ed9 b\\u1ec1n cao h\\u01a1n nhi\\u1ec1u so v\\u1edbi s&agrave;n g\\u1ed7 gi&aacute; r\\u1ebb<\\/strong><\\/p>\\r\\n<p>B\\u1ea5t k\\u1ef3 ai trong c&aacute;c b\\u1ea1n c\\u0169ng ph\\u1ea3i c\\u1ea3m th\\u1ea5y kh&oacute; ch\\u1ecbu khi \\u0111ang s\\u1eed d\\u1ee5ng l\\u1ea1i ph\\u1ea3i s\\u1eeda ch\\u1eefa khi trong nh&agrave; c&oacute; r\\u1ea5t nhi\\u1ec1u \\u0111\\u1ed3 \\u0111\\u1ea1c. Ch&uacute;ng t&ocirc;i c\\u0169ng nh\\u01b0 c&aacute;c b\\u1ea1n v\\u1eady. B\\u1ea1n c&oacute; bi\\u1ebft tu\\u1ed5i th\\u1ecd trung b&igrave;nh c\\u1ee7a c&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 cao c\\u1ea5p t\\u1eeb 20 \\u0111\\u1ebfn 30 n\\u0103m trong ph\\u1ea1m vi s\\u1eed d\\u1ee5ng gia \\u0111&igrave;nh, trong khi c&aacute;c lo\\u1ea1i v&aacute;n s&agrave;n g\\u1ed7 gi&aacute; r\\u1ebb ch\\u1ec9 t\\u1eeb 2 \\u0111\\u1ebfn 5 n\\u0103m. C&aacute;c lo\\u1ea1i v&aacute;n l&aacute;t s&agrave;n gi&aacute; r\\u1ebb s\\u1ebd d\\u1ec5 b\\u1ecb tr\\u1ea7y x\\u01b0\\u1edbc, h\\u01b0 h\\u1ecfng khi ti\\u1ebfp x&uacute;c v\\u1edbi n\\u01b0\\u1edbc. Trong khi c&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p cao c\\u1ea5p l\\u1ea1i kh&oacute; b\\u1ecb h\\u01b0 h\\u1ea1i v&igrave; \\u0111\\u1ed9 n&eacute;n &eacute;p cao, ti&ecirc;u chu\\u1ea9n b\\u1ec1 m\\u1eb7t t\\u1ed1t, s\\u1ea3n ph\\u1ea9m lu&ocirc;n b\\u1ec1n l&acirc;u sau nhi\\u1ec1u n\\u0103m s\\u1eed d\\u1ee5ng.&nbsp;<\\/p>\\r\\n<p><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/05\\/18\\/3.jpg\\\" alt=\\\"S&agrave;n g\\u1ed7 Th&aacute;i Lan si&ecirc;u ch\\u1ecbu n\\u01b0\\u1edbc\\\" width=\\\"730\\\" height=\\\"438\\\" \\/><\\/p>\\r\\n<p><strong>S&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p cao c\\u1ea5p t&ocirc;n vinh gi&aacute; tr\\u1ecb cho gia ch\\u1ee7<\\/strong><\\/p>\\r\\n<p>Tr\\u01b0\\u1edbc \\u0111&acirc;y, ngu\\u1ed3n s&agrave;n g\\u1ed7 t\\u1ef1 nhi&ecirc;n r\\u1ea5t d\\u1ed3i d&agrave;o phong ph&uacute; v\\u1ec1 s\\u1ed1 l\\u01b0\\u1ee3ng c\\u0169ng nh\\u01b0 ch\\u1ea5t l\\u01b0\\u1ee3ng, gia ch\\u1ee7 h\\u1ea7u nh\\u01b0 ai c\\u0169ng mu\\u1ed1n l\\u1eafp \\u0111\\u1eb7t cho ng&ocirc;i nh&agrave; m&igrave;nh lo\\u1ea1i s&agrave;n g\\u1ed7 t\\u1ef1 nhi&ecirc;n nh\\u01b0 Gi&aacute;ng h\\u01b0\\u01a1ng, C\\u0103m xe, Lim l&agrave;o&hellip;. Nh\\u01b0ng ng&agrave;y nay, v\\u1edbi s\\u1ef1 \\u0111a d\\u1ea1ng v\\u1ec1 ch\\u1ee7ng lo\\u1ea1i c\\u1ee7a s&agrave;n g\\u1ed7 cao c\\u1ea5p h&ograve;a nh\\u1eadp v&agrave;o th\\u1ecb tr\\u01b0\\u1eddng Vi\\u1ec7t Nam, ng\\u01b0\\u1eddi ti&ecirc;u d&ugrave;ng ng&agrave;y c&agrave;ng c&oacute; nhi\\u1ec1u s\\u1ef1 l\\u1ef1a ch\\u1ecdn s\\u1ea3n ph\\u1ea9m ph&ugrave; h\\u1ee3p cho ng&ocirc;i nh&agrave; c\\u1ee7a m&igrave;nh.<\\/p>\\r\\n<p>Kh&aacute;ch \\u0111\\u1ebfn ch\\u01a1i nh&agrave; th\\u1ea5y c\\u0103n h\\u1ed9 \\u0111\\u1ed9c \\u0111&aacute;o c&oacute; m\\u1ed9t lo\\u1ea1i s&agrave;n \\u0111\\u1eb9p, \\u0111\\u1ed9c l\\u1ea1, sang tr\\u1ecdng s\\u1ebd th\\u1ea5y \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb3ng c\\u1ea5p c\\u1ee7a ng\\u01b0\\u1eddi s\\u1eed d\\u1ee5ng v&agrave; c\\u0169ng mu\\u1ed1n t&igrave;m t&ograve;i h\\u1ecfi th\\u0103m. \\u0110&oacute; c\\u0169ng l&agrave; m\\u1ed9t ni\\u1ec1m vui cho b\\u1ea5t c\\u1ee9 gia ch\\u1ee7 n&agrave;o. C&aacute;c lo\\u1ea1i s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p cao c\\u1ea5p lu&ocirc;n \\u0111\\u01b0\\u1ee3c khuy&ecirc;n d&ugrave;ng cho c&aacute;c c\\u0103n h\\u1ed9 cao c\\u1ea5p, khu li\\u1ec1n k\\u1ec1, bi\\u1ec7t th\\u1ef1&hellip; Gi&aacute; s&agrave;n g\\u1ed7 cao c\\u1ea5p kh&aacute; \\u0111a d\\u1ea1ng t\\u1eeb 300k\\/m2 \\u0111\\u1ebfn 800k\\/m2.<\\/p>\\r\\n<p>C&ocirc;ng ty Vi\\u1ec7t Ph&aacute;t \\u0111\\u01b0\\u1ee3c th&agrave;nh l\\u1eadp h\\u01a1n 10 n\\u0103m chuy&ecirc;n nh\\u1eadp kh\\u1ea9u v&agrave; ph&acirc;n ph\\u1ed1i s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p, ch&uacute;ng t&ocirc;i v\\u1eabn c&oacute; l\\u1eddi khuy&ecirc;n cho kh&aacute;ch h&agrave;ng n&ecirc;n s\\u1eed d\\u1ee5ng <strong><a href=\\\"http:\\/\\/sangovietphat.com\\/admin\\/news\\/sangovietphat.com\\\">s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p cao c\\u1ea5p<\\/a><\\/strong> \\u0111\\u1ec3 \\u0111em l\\u1ea1i gi&aacute; tr\\u1ecb s\\u1eed d\\u1ee5ng l&acirc;u d&agrave;i.&nbsp;<\\/p>\"}', '', 0, 1, 0, 1, 1495121501, '', 0, 1),
(40, 'vi', 10, 486, '', 'thi-cong-nha-anh-cuong', '', '', 'Thi công nhà Anh Cường ', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"s\\u00e0n g\\u1ed7 Vi\\u1ec7p Ph\\u00e1t\",\"meta_keyword\":\"Thi c\\u00f4ng g\\u1ed7 T\\u00e2y Ban nha\",\"meta_description\":\"Thi c\\u00f4ng kh\\u00e1ch l\\u1ebb\",\"introtext\":\"<p>Thi c&ocirc;ng l\\u1eafp \\u0111\\u1eb7t tr\\u1ef1c ti\\u1ebfp t\\u1ea1i t&ograve;a The Prite khu \\u0111&ocirc; th\\u1ecb m\\u1edbi An H\\u01b0ng , ph\\u01b0\\u1eddng La Kh&ecirc; , Qu\\u1eadn H&agrave; \\u0110&ocirc;ng , TP H&agrave; N\\u1ed9i<\\/p>\",\"content\":\"<p><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/05\\/21\\/anh-2.jpg\\\" alt=\\\"\\\" width=\\\"800\\\" height=\\\"600\\\" \\/><\\/p>\\r\\n<p>\\u0110\\u01b0\\u1ee3c thi c&ocirc;ng b\\u1edfi \\u0111\\u1ed9i ng\\u0169 k\\u1ef9 thu\\u1eadt l&agrave;nh ngh\\u1ec1 c\\u1ee7a c&ocirc;ng ty Vi\\u1ec7t Ph&aacute;t<\\/p>\"}', '', 0, 1, 0, 1, 1495378503, '', 0, 1),
(41, 'vi', 3, 504, '', 'san-go-cong-nghiep-xuong-ca', '', '', 'Sàn gỗ công nghiệp xương cá', '', '', '', '{\"tmp_image_ids\":\"\",\"meta_title\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p x\\u01b0\\u01a1ng c\\u00e1\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p x\\u01b0\\u01a1ng c\\u00e1\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng nghi\\u1ec7p x\\u01b0\\u01a1ng c\\u00e1\",\"introtext\":\"<p>H&ocirc;m nay S&agrave;n g\\u1ed7 Vi\\u1ec7t Ph&aacute;t xin \\u0111\\u01b0\\u1ee3c gi\\u1edbi thi\\u1ec7u \\u0111\\u1ebfn c&aacute;c b\\u1ea1n b\\u1ed9 s\\u01b0u t\\u1eadp <a href=\\\"http:\\/\\/sangovietphat.com\\/tin\\/33\\/doi-net-ve-san-go-tay-ban-nha-faus\\\">s&agrave;n g\\u1ed7 T&acirc;y Ban Nha FausFloor<\\/a>&nbsp;ho&agrave;n to&agrave;n m\\u1edbi:&nbsp;<\\/p>\",\"content\":\"<p>C&oacute; th\\u1ec3 kh\\u1eb3ng \\u0111\\u1ecbnh b\\u1ed9 s\\u01b0u t\\u1eadp s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p Fausloor UNICO l&agrave; m\\u1edbi nh\\u1ea5t, \\u0111\\u1ed9c nh\\u1ea5t, \\u0111\\u1eb3ng c\\u1ea5p nh\\u1ea5t v&agrave; ch\\u1ea5t l\\u01b0\\u1ee3ng nh\\u1ea5t tr&ecirc;n th\\u1ecb tr\\u01b0\\u1eddng s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p hi\\u1ec7n nay.<\\/p>\\r\\n<p>T\\u1ea1i sao v\\u1eady ?&nbsp;<\\/p>\\r\\n<p><strong>1. \\u0110\\u1eb3ng c\\u1ea5p nh\\u1ea5t:<\\/strong><\\/p>\\r\\n<p>B\\u1ed9 s\\u01b0u t\\u1eadp l&agrave; h\\u01a1i th\\u1edf v&agrave; &yacute; t\\u01b0\\u1edfng t\\u1eeb ki\\u1ec3u l&aacute;t x\\u01b0\\u01a1ng c&aacute; c\\u1ee7a s&agrave;n g\\u1ed7 t\\u1ef1 nhi&ecirc;n. Gi&aacute; tr\\u1ecb c\\u1ee7a s&agrave;n g\\u1ed7 t\\u1ef1 nhi&ecirc;n th&igrave; kh&ocirc;ng c\\u1ea7n n&oacute;i c&aacute;c b\\u1ea1n c\\u0169ng bi\\u1ebft r\\u1ed3i, nh\\u01b0ng gi&aacute; th&agrave;nh th&igrave; kh&ocirc;ng h\\u1ec1 &ldquo;d\\u1ec5 ch\\u1ecbu&rdquo; ch&uacute;t n&agrave;o. V&igrave; v\\u1eady b\\u1ed9 s\\u01b0u t\\u1eadp n&agrave;y ra \\u0111\\u1eddi<span class=\\\"text_exposed_show\\\">&nbsp;mang l\\u1ea1i cho ng&ocirc;i nh&agrave; b\\u1ea1n m\\u1ed9t phong c&aacute;ch kh&aacute;c bi\\u1ec7t, \\u0111\\u1eb3ng c\\u1ea5p nh\\u01b0ng v\\u1edbi gi&aacute; th&agrave;nh th&igrave; v&ocirc; c&ugrave;ng \\\"y&ecirc;u th\\u01b0\\u01a1ng\\\".&nbsp;<span class=\\\"_5mfr _47e3\\\"><img class=\\\"img\\\" src=\\\"https:\\/\\/www.facebook.com\\/images\\/emoji.php\\/v8\\/f7f\\/1\\/16\\/1f60a.png\\\" alt=\\\"\\\" width=\\\"16\\\" height=\\\"16\\\" \\/><span class=\\\"_7oe\\\">\\ud83d\\ude0a<\\/span><\\/span><\\/span><\\/p>\\r\\n<p><span class=\\\"text_exposed_show\\\"><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/05\\/25\\/3T00.jpg\\\" alt=\\\"\\\" width=\\\"923\\\" height=\\\"637\\\" \\/><br \\/><\\/span><\\/p>\\r\\n<p><strong><span class=\\\"text_exposed_show\\\">2. Ch\\u1ea5t l\\u01b0\\u1ee3ng nh\\u1ea5t:<\\/span><\\/strong><\\/p>\\r\\n<p><strong><\\/strong>N&acirc;ng h\\u1ea1ng cho em n&agrave;y l&agrave; \\u0111\\u1ed9 ch\\u1ecbu m&agrave;i m&ograve;n l&ecirc;n t\\u1edbi AC6. C\\u1ea5p \\u0111\\u1ed9 cao nh\\u1ea5t c\\u1ee7a b\\u1ec1 m\\u1eb7t s&agrave;n g\\u1ed7 hi\\u1ec7n nay. V\\u1ec1 \\u0111\\u1ed9 ch\\u1ecbu n\\u01b0\\u1edbc th&igrave; c&aacute;c b\\u1ea1n \\u0111&atilde; \\u0111\\u01b0\\u1ee3c c\\u1ea3m nh\\u1eadn qua d&ograve;ng ph\\u1ed5 th&ocirc;ng Tempo&nbsp;r\\u1ed3i.&nbsp;<\\/p>\\r\\n<p><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/05\\/25\\/3T01.jpg\\\" alt=\\\"\\\" width=\\\"929\\\" height=\\\"636\\\" \\/><\\/p>\\r\\n<p><span class=\\\"text_exposed_show\\\"><strong>3. M\\u1edbi nh\\u1ea5t:<\\/strong>&nbsp;L&agrave; s\\u1ea3n ph\\u1ea9m m\\u1edbi nh\\u1ea5t tr&ecirc;n th\\u1ecb tr\\u01b0\\u1eddng s&agrave;n g\\u1ed7 Vi\\u1ec7t Nam n\\u0103m 2017<\\/span><\\/p>\\r\\n<p><span class=\\\"text_exposed_show\\\"><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/05\\/25\\/5002.jpg\\\" alt=\\\"\\\" width=\\\"921\\\" height=\\\"634\\\" \\/><\\/span><\\/p>\\r\\n<p><span class=\\\"text_exposed_show\\\"><br \\/><strong>4. \\u0110\\u1ed9c nh\\u1ea5t:<\\/strong> Tr&ecirc;n th\\u1ecb tr\\u01b0\\u1eddng c&aacute;c b\\u1ea1n kh&ocirc;ng th\\u1ec3 t&igrave;m ki\\u1ebfm design n&agrave;y mang s\\u1ed1 hi\\u1ec7u th\\u1ee9 2 \\u1edf b\\u1ea5t k\\u1ef3 h&atilde;ng s&agrave;n g\\u1ed7 n&agrave;o&nbsp;<span class=\\\"_5mfr _47e3\\\"><img class=\\\"img\\\" src=\\\"https:\\/\\/www.facebook.com\\/images\\/emoji.php\\/v8\\/f4c\\/1\\/16\\/1f642.png\\\" alt=\\\"\\\" width=\\\"16\\\" height=\\\"16\\\" \\/><span class=\\\"_7oe\\\">\\ud83d\\ude42<\\/span><\\/span><\\/span><\\/p>\\r\\n<p><span class=\\\"text_exposed_show\\\"><img src=\\\"http:\\/\\/sangovietphat.com\\/data\\/upload\\/editor\\/2017\\/05\\/25\\/3T03.jpg\\\" alt=\\\"\\\" width=\\\"929\\\" height=\\\"614\\\" \\/><br \\/><\\/span><\\/p>\\r\\n<p><span class=\\\"text_exposed_show\\\">C&ograve;n ch\\u1ea7n ch\\u1edd g&igrave; n\\u1eefa, m\\u1eddi c&aacute;c b\\u1ea1n c&ugrave;ng chi&ecirc;m ng\\u01b0\\u1ee1ng m&agrave;u s\\u1eafc trong b\\u1ed9 s\\u01b0u t\\u1eadp n&agrave;y. Mong c&aacute;c b\\u1ea1n \\u1ee7ng h\\u1ed9 \\u0111\\u1ec3 ti\\u1ebfp th&ecirc;m \\u0111\\u1ed9ng l\\u1ef1c cho c&ocirc;ng ty lu&ocirc;n mang \\u0111\\u1ebfn nh\\u1eefng <a onclick=\\\"window.open(\'\',\'\',\'\');return false;\\\" href=\\\"http:\\/\\/sangovietphat.com\\/tin\\/39\\/vi-sao-ban-nen-su-dung-san-go-cao-cap\\\">s&agrave;n g\\u1ed7 c&ocirc;ng nghi\\u1ec7p cao c\\u1ea5p<\\/a>&nbsp;nh\\u1ea5t&nbsp;&nbsp;v&agrave; \\u0111\\u1eb3ng c\\u1ea5p nh\\u1ea5t.&nbsp;<br \\/><br \\/><\\/span><\\/p>\"}', '', 0, 1, 0, 1, 1495726908, '', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news_image`
--

CREATE TABLE `tbl_news_image` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_news_image`
--

INSERT INTO `tbl_news_image` (`id`, `news_id`, `image_id`, `type`) VALUES
(2, 24, 86, 0),
(4, 25, 371, 0),
(5, 32, 421, 0),
(6, 33, 439, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
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
  `created_by` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_product`
--

CREATE TABLE `tbl_order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_partner`
--

CREATE TABLE `tbl_partner` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_partner`
--

INSERT INTO `tbl_partner` (`id`, `language`, `status`, `title`, `alias`, `cat_id`, `introimage_id`, `order_view`, `new`, `home`, `other`, `visits`, `created_by`, `created_time`) VALUES
(1, 'vi', 1, 'IHB Việt Nam', '', 18, 35, 0, 0, 0, '{\"meta_title\":\"IHB Vi\\u1ec7t Nam\",\"meta_keyword\":\"IHB Vi\\u1ec7t Nam\",\"meta_description\":\"IHB Vi\\u1ec7t Nam\",\"content\":\"<p>IHB Vi\\u1ec7t Nam ho\\u1ea1t \\u0111\\u1ed9ng trong l\\u0129nh v\\u1ef1c c&ocirc;ng ngh\\u1ec7 th&ocirc;ng tin<\\/p>\"}', 0, 1, 1387531698),
(2, 'vi', 1, 'IHB Việt Nam_copy', '', 18, 35, 0, 0, 0, '{\"content\":\"<p>IHB Vi\\u1ec7t Nam ho\\u1ea1t \\u0111\\u1ed9ng trong l\\u0129nh v\\u1ef1c c&ocirc;ng ngh\\u1ec7 th&ocirc;ng tin<\\/p>\",\"meta_keyword\":\"IHB Vi\\u1ec7t Nam\",\"meta_description\":\"IHB Vi\\u1ec7t Nam\",\"meta_title\":\"IHB Vi\\u1ec7t Nam\"}', 0, 1, 1387532208),
(3, 'vi', 1, 'IHB Việt Nam_copy_copy', '', 18, 35, 0, 0, 0, '{\"content\":\"<p>IHB Vi\\u1ec7t Nam ho\\u1ea1t \\u0111\\u1ed9ng trong l\\u0129nh v\\u1ef1c c&ocirc;ng ngh\\u1ec7 th&ocirc;ng tin<\\/p>\",\"meta_keyword\":\"IHB Vi\\u1ec7t Nam\",\"meta_description\":\"IHB Vi\\u1ec7t Nam\",\"meta_title\":\"IHB Vi\\u1ec7t Nam\"}', 0, 1, 1387532220),
(4, 'vi', 1, 'IHB Việt Nam_copy', 'ihb-viet-namcopy', 18, 35, 0, 0, 0, '{\"content\":\"<p>IHB Vi\\u1ec7t Nam ho\\u1ea1t \\u0111\\u1ed9ng trong l\\u0129nh v\\u1ef1c c&ocirc;ng ngh\\u1ec7 th&ocirc;ng tin<\\/p>\",\"meta_keyword\":\"IHB Vi\\u1ec7t Nam\",\"meta_description\":\"IHB Vi\\u1ec7t Nam\",\"meta_title\":\"IHB Vi\\u1ec7t Nam\"}', 3, 1, 1387532220);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `language`, `status`, `name`, `code`, `alias`, `cat_id`, `introimage_id`, `home`, `new`, `price`, `order_view`, `visits`, `other`, `created_by`, `created_time`) VALUES
(21, 'vi', 1, 'T 104', '', 't-104', 1, 353, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"T 104\",\"thickness\":\"12mm\",\"width\":\"195mm\",\"height\":\"1210mm\",\"warranty\":\"15 n\\u0103m\",\"meta_title\":\"s\\u00e0n g\\u1ed7  ThaiGreen\",\"meta_keyword\":\"s\\u00e0n g\\u1ed7  ThaiGreen\",\"meta_description\":\"s\\u00e0n g\\u1ed7  ThaiGreen\",\"introduction\":\"<p>s&agrave;n g\\u1ed7 &nbsp;ThaiGreen<\\/p>\",\"description\":\"<p>s&agrave;n g\\u1ed7 &nbsp;ThaiGreen<\\/p>\",\"detailimage_id\":\"354\"}', 1, 1410769545),
(22, 'vi', 1, 'M105', '', 'M105', 1, 351, 1, 0, '', 0, 0, '{\"description\":\"<p>s&agrave;n g\\u1ed7 &nbsp;ThaiGreen ,s\\u1ea3n xu\\u1ea5t t\\u1ea1i Th&aacute;i Lan. Si&ecirc;u chi\\u1ec7u n\\u01b0\\u1edbc<\\/p>\",\"introduction\":\"<p>s&agrave;n g\\u1ed7 &nbsp;ThaiGreen ,s\\u1ea3n xu\\u1ea5t t\\u1ea1i Th&aacute;i Lan. Si&ecirc;u chi\\u1ec7u n\\u01b0\\u1edbc<\\/p>\",\"model\":\"M105\",\"thickness\":\"12mm\",\"old_price\":\"\",\"width\":\"195mm\",\"height\":\"1210mm\",\"tmp_image_ids\":null,\"meta_keyword\":\"s\\u00e0n g\\u1ed7  ThaiGreen ,s\\u1ea3n xu\\u1ea5t t\\u1ea1i Th\\u00e1i Lan. Si\\u00eau chi\\u1ec7u n\\u01b0\\u1edbc\",\"meta_description\":\"s\\u00e0n g\\u1ed7  ThaiGreen ,s\\u1ea3n xu\\u1ea5t t\\u1ea1i Th\\u00e1i Lan. Si\\u00eau chi\\u1ec7u n\\u01b0\\u1edbc\",\"meta_title\":\"s\\u00e0n g\\u1ed7  ThaiGreen ,s\\u1ea3n xu\\u1ea5t t\\u1ea1i Th\\u00e1i Lan. Si\\u00eau chi\\u1ec7u n\\u01b0\\u1edbc\",\"warranty\":\"15 n\\u0103m\",\"detailimage_id\":\"352\"}', 1, 1410769564),
(23, 'vi', 1, 'O-103', '', '', 1, 355, 1, 0, '', 0, 0, '{\"description\":\"\",\"introduction\":\"<p><span id=\\\"lbFullDescription\\\" class=\\\"textsize\\\" style=\\\"font-size: 14px;\\\"><span class=\\\"textsize\\\"><span style=\\\"color: #000000; font-family: Times New Roman;\\\"><br \\/><\\/span><\\/span><\\/span><\\/p>\",\"model\":\"O-103\",\"thickness\":\"12mm\",\"old_price\":\"\",\"width\":\"195mm\",\"height\":\"1210mm\",\"tmp_image_ids\":null,\"meta_keyword\":\"s\\u00e0n g\\u1ed7  ThaiGreen\",\"meta_description\":\"s\\u00e0n g\\u1ed7  ThaiGreen\",\"meta_title\":\"s\\u00e0n g\\u1ed7  ThaiGreen\",\"warranty\":\"15n\\u0103m\",\"detailimage_id\":\"356\"}', 1, 1410770576),
(24, 'vi', 1, 'S606', '', 'S606', 5, 480, 1, 0, '', 0, 0, '{\"description\":\"<p>S&agrave;n g\\u1ed7 SoPhia<\\/p>\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 s\\u1ea3n xu\\u1ea5t t\\u1ea1i Malaysia<\\/p>\",\"model\":\"S606\",\"thickness\":\"12 mm\",\"old_price\":\"\",\"width\":\"127 mm\",\"height\":\"1220 mm\",\"tmp_image_ids\":null,\"meta_keyword\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_description\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_title\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"warranty\":\"15 n\\u0103m\",\"detailimage_id\":\"479\"}', 1, 1410772942),
(25, 'vi', 1, 'D-1316-11', '', 'd-1316-11', 1, 357, 1, 0, '', 0, 0, '{\"description\":\"\",\"introduction\":\"\",\"model\":\"D-1316-11\",\"thickness\":\"12mm\",\"old_price\":\"\",\"width\":\"195mm\",\"height\":\"1210mm\",\"tmp_image_ids\":null,\"meta_keyword\":\"S\\u00e0n g\\u1ed7 m\\u00e0u s\\u1ed3i b\\u00f3ngTh\\u00e1i Green\",\"meta_description\":\"S\\u00e0n g\\u1ed7 m\\u00e0u s\\u1ed3i b\\u00f3ngTh\\u00e1i Green\",\"meta_title\":\"S\\u00e0n g\\u1ed7 m\\u00e0u s\\u1ed3i b\\u00f3ngTh\\u00e1i Green\",\"warranty\":\"15 n\\u0103m\",\"detailimage_id\":\"358\"}', 1, 1410773772),
(26, 'vi', 1, 'S605', '', 's605', 5, 477, 1, 0, '', 0, 0, '{\"description\":\"<div align=\\\"justify\\\">S&agrave;n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c&ocirc;ng ngh\\u1ec7 Malaysia<\\/div>\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 s\\u1ea3n xu\\u1ea5t t\\u1ea1i Malaysia<\\/p>\",\"model\":\"S605\",\"thickness\":\"12mm\",\"old_price\":\"\",\"width\":\"127 mm\",\"height\":\"1220 mm\",\"tmp_image_ids\":null,\"meta_keyword\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_description\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_title\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"warranty\":\"15 n\\u0103m\",\"detailimage_id\":\"478\"}', 1, 1410774025),
(27, 'vi', 1, 'Mã 1225', '', 'ma-1225', 47, 311, 1, 0, '', 0, 0, '{\"description\":\"<p>S&agrave;n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"introduction\":\"<p><span id=\\\"lbFullDescription\\\" class=\\\"textsize\\\" style=\\\"font-size: 14px;\\\"><span class=\\\"textsize\\\"><span style=\\\"color: #000000; font-family: Times New Roman;\\\">S&agrave;n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/span><\\/span><\\/span><\\/p>\",\"model\":\"Harotex ; M\\u00e3 1225\",\"thickness\":\"12mm\",\"old_price\":\"\",\"width\":\"105mm\",\"height\":\"805mm\",\"tmp_image_ids\":null,\"meta_keyword\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_title\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"warranty\":\"10 n\\u0103m\",\"detailimage_id\":\"312\"}', 1, 1410775970),
(28, 'vi', 1, 'Mã 1224', '', 'ma-1224', 47, 309, 0, 0, '285.000 vnđ', 0, 0, '{\"description\":\"<p>S&agrave;n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"introduction\":\"<p><span id=\\\"lbFullDescription\\\" class=\\\"textsize\\\" style=\\\"font-size: 14px;\\\"><span class=\\\"textsize\\\"><span style=\\\"color: #000000; font-family: Times New Roman;\\\">S&agrave;n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/span><\\/span><\\/span><\\/p>\",\"model\":\"H 1224\",\"thickness\":\"12mm\",\"old_price\":\"\",\"width\":\"105mm\",\"height\":\"805mm\",\"tmp_image_ids\":null,\"meta_keyword\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_title\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"warranty\":\"10 n\\u0103m\",\"detailimage_id\":\"310\"}', 1, 1410830858),
(29, 'vi', 1, 'S604', '', 's604', 5, 476, 1, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"S604\",\"thickness\":\"12 mm\",\"width\":\"127 mm\",\"height\":\"1220 mm\",\"warranty\":\"15 n\\u0103m\",\"meta_title\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_description\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 s\\u1ea3n xu\\u1ea5t t\\u1ea1i Malaysia<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c&ocirc;ng ngh\\u1ec7 Malaysia, si&ecirc;u ch\\u1ecbu n\\u01b0\\u1edbc<\\/p>\",\"detailimage_id\":\"475\"}', 1, 1410831935),
(30, 'vi', 1, 'Harotex ; Mã 1222', '', 'harotex-;-ma-1222', 47, 307, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H 1222\",\"thickness\":\"12mm\",\"width\":\"105mm\",\"height\":\"805mm\",\"warranty\":\"10 n\\u0103m\",\"meta_title\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"detailimage_id\":\"308\"}', 1, 1410833398),
(31, 'vi', 1, 'Harotex ; Mã 1221', '', 'harotex-;-ma-1221', 47, 204, 0, 0, '', 0, 0, '{\"description\":\"<p>S&agrave;n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"introduction\":\"<p><span style=\\\"font-family: arial; font-size: 14px;\\\">S&agrave;n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/span><\\/p>\",\"model\":\"H 1221\",\"thickness\":\"12mm\",\"old_price\":\"\",\"width\":\"105mm\",\"height\":\"805mm\",\"tmp_image_ids\":null,\"meta_keyword\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_title\":\"S\\u00e0n g\\u1ed7 Harotex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"warranty\":\"10 n\\u0103m\",\"detailimage_id\":\"205\"}', 1, 1410833581),
(32, 'vi', 1, 'S603', '', 's603', 5, 474, 1, 0, '', 0, 0, '{\"description\":\"<p>S&agrave;n g\\u1ed7 SoPhia<\\/p>\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 s\\u1ea3n xu\\u1ea5t t\\u1ea1i Malaysia<\\/p>\",\"model\":\"S603\",\"thickness\":\"12 mm\",\"old_price\":\"\",\"width\":\"127 mm\",\"height\":\"1220 mm\",\"tmp_image_ids\":null,\"meta_keyword\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_description\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_title\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\\r\\n\",\"warranty\":\"15 n\\u0103m\",\"detailimage_id\":\"473\"}', 1, 1410833688),
(33, 'vi', 1, '0927', '', '0927', 48, 435, 1, 1, '', 0, 0, '{\"old_price\":\"\",\"model\":\"FAUS CEREZO 393 FORM_0927\",\"thickness\":\"12MM\",\"width\":\"213MM\",\"height\":\"1346MM\",\"warranty\":\"20 N\\u0102M \",\"meta_title\":\"San go Tay Ban Nha FAUS\",\"meta_keyword\":\"San go Tay Ban Nha FAUS\",\"meta_description\":\"San go Tay Ban Nha FAUS\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS<\\/p>\\r\\n<p>M&atilde; m&agrave;u:&nbsp;FAUS CEREZO 393 FORM_0927<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS<\\/p>\\r\\n<p>M&atilde; m&agrave;u:&nbsp;FAUS CEREZO 393 FORM_0927<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\",\"detailimage_id\":\"436\"}', 1, 1410841229),
(34, 'vi', 1, '1T11', '', '1t11', 48, 433, 1, 1, '', 0, 0, '{\"old_price\":\"\",\"model\":\"FAUS TEMPO NOGAL ITALIANO_1T11\",\"thickness\":\"12MM\",\"width\":\"213MM\",\"height\":\"1346MM\",\"warranty\":\"20 N\\u0102M \",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS\",\"meta_description\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS<\\/p>\\r\\n<p>M&atilde; m&agrave;u:&nbsp;FAUS TEMPO NOGAL ITALIANO_1T11<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS<\\/p>\\r\\n<p>M&atilde; m&agrave;u:&nbsp;FAUS TEMPO NOGAL ITALIANO_1T11<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\",\"detailimage_id\":\"434\"}', 1, 1410841363),
(35, 'vi', 1, '1T04', '', '1t04', 48, 431, 1, 1, '', 0, 0, '{\"old_price\":\"\",\"model\":\"FAUS TEMPO ROBLE BERMONT_1T04\",\"thickness\":\"12MM\",\"width\":\"213MM\",\"height\":\"1346MM\",\"warranty\":\"20 N\\u0102M \",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS\",\"meta_description\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS<\\/p>\\r\\n<p>M&atilde; m&agrave;u:&nbsp;FAUS TEMPO ROBLE BERMONT_1T04<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS<\\/p>\\r\\n<p>M&atilde; m&agrave;u:&nbsp;FAUS TEMPO ROBLE BERMONT_1T04<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\",\"detailimage_id\":\"432\"}', 1, 1410841642),
(36, 'vi', 1, '1T07', '', '1t07', 48, 429, 1, 1, '', 0, 0, '{\"description\":\"<p>S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS<\\/p>\\r\\n<p>M&atilde; m&agrave;u:&nbsp;FAUS TEMPO ROBLE ALHAMBRA_1T07<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS<\\/p>\\r\\n<p>M&atilde; m&agrave;u:&nbsp;FAUS TEMPO ROBLE ALHAMBRA_1T07<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\",\"model\":\"FAUS TEMPO ROBLE ALHAMBRA_1T07\",\"thickness\":\"12MM\",\"old_price\":\"\",\"width\":\"213MM\",\"height\":\"1346MM\",\"tmp_image_ids\":null,\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS\",\"meta_description\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS\",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha FAUS\",\"warranty\":\"20 N\\u0102M \",\"detailimage_id\":\"430\"}', 1, 1416909825),
(37, 'vi', 1, 'H -104', '', 'h--104', 1, 359, 1, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H - 104\",\"thickness\":\"12mm\",\"width\":\"195mm\",\"height\":\"1210mm\",\"warranty\":\"15 n\\u0103m\",\"detailimage_id\":\"360\",\"meta_title\":\"S\\u00e0n g\\u1ed7 cao c\\u1ea5p nh\\u1eadp kh\\u1ea9u Th\\u00e1i Lan\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 cao c\\u1ea5p nh\\u1eadp kh\\u1ea9u Th\\u00e1i Lan\",\"meta_description\":\"S\\u00e0n g\\u1ed7 cao c\\u1ea5p nh\\u1eadp kh\\u1ea9u Th\\u00e1i Lan\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 cao c\\u1ea5p nh\\u1eadp kh\\u1ea9u Th&aacute;i Lan, B\\u1ea3o h&agrave;nh 15 n\\u0103m&nbsp;<\\/p>\",\"description\":\"<p>B\\u1ec1 m\\u1eb7t g\\u1ed7 ch\\u1ea5t l\\u01b0\\u1ee3ng cao nh\\u1ea5t mang l\\u1ea1i c\\u1ea3m gi&aacute;c tho\\u1ea3i m&aacute;i khi s\\u1eed d\\u1ee5ng&nbsp;<\\/p>\"}', 1, 1428726102),
(38, 'vi', 1, 'BT12-D1349-2', '', 'bt12-d1349-2', 1, 349, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BT12-D1349-2\",\"thickness\":\"12mm\",\"width\":\"195mm\",\"height\":\"1210mm\",\"warranty\":\"15 n\\u0103m\",\"detailimage_id\":\"350\",\"meta_title\":\"s\\u00e0n g\\u1ed7  ThaiGreen\",\"meta_keyword\":\"s\\u00e0n g\\u1ed7  ThaiGreen\",\"meta_description\":\"s\\u00e0n g\\u1ed7  ThaiGreen\",\"introduction\":\"<p>S\\u1ea3n xu\\u1ea5t t\\u1ea1i Th&aacute;i Lan , si&ecirc;u ch\\u1ecbu n\\u01b0\\u1edbc<\\/p>\",\"description\":\"\"}', 1, 1428727194),
(39, 'vi', 1, 'S602', '', 'S602', 5, 470, 0, 0, 'liên  hệ', 0, 0, '{\"old_price\":\"\",\"model\":\"S602\",\"thickness\":\"12 mm\",\"width\":\"127 mm\",\"height\":\"1220 mm\",\"warranty\":\"15 n\\u0103m\",\"detailimage_id\":\"472\",\"meta_title\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_description\":\"S\\u00e0n g\\u1ed7 s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 Malaysia\\r\\nS\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 s\\u1ea3n xu\\u1ea5t t\\u1ea1i Malaysia<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 SoPhia<\\/p>\"}', 1, 1428728701),
(40, 'vi', 1, 'S601', '', 'S601', 5, 467, 1, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"S601\",\"thickness\":\"12 mm\",\"width\":\"127 mm\",\"height\":\"1220 mm\",\"warranty\":\"15 n\\u0103m\",\"detailimage_id\":\"469\",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Malaysia \\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Malaysia \\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"meta_description\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS Floor\\r\\nS\\u00e0n g\\u1ed7 Malaysia \\r\\nS\\u00e0n g\\u1ed7 Sophia\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 s\\u1ea3n xu\\u1ea5t t\\u1ea1i Malaysia<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 SoPhia<\\/p>\"}', 1, 1428728869),
(41, 'vi', 1, 'BN - 1299-5', '', 'bn---1299-5', 1, 325, 1, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BN - 1299-5\",\"thickness\":\"12mm\",\"width\":\"125mm\",\"height\":\"1210mm\",\"warranty\":\"15 n\\u0103m\",\"detailimage_id\":\"326\",\"meta_title\":\"S\\u00e0n G\\u1ed7 nh\\u1eadp kh\\u1ea9u Th\\u00e1i Lan, Si\\u00eau chiu n\\u01b0\\u1edbc\",\"meta_keyword\":\"S\\u00e0n G\\u1ed7 nh\\u1eadp kh\\u1ea9u Th\\u00e1i Lan, Si\\u00eau ch\\u1ecbu n\\u01b0\\u1edbc\",\"meta_description\":\"S\\u00e0n G\\u1ed7 nh\\u1eadp kh\\u1ea9u Th\\u00e1i Lan, Si\\u00eau ch\\u1ecbu n\\u01b0\\u1edbc\",\"introduction\":\"<p>S&agrave;n G\\u1ed7 nh\\u1eadp kh\\u1ea9u Th&aacute;i Lan ,Si&ecirc;u ch\\u1ecbu n\\u01b0\\u1edbc<\\/p>\",\"description\":\"<p>S&agrave;n G\\u1ed7 nh\\u1eadp kh\\u1ea9u Th&aacute;i Lan<\\/p>\"}', 1, 1428800503),
(42, 'vi', 1, '1T02', '', '1t02', 48, 427, 1, 1, '', 0, 0, '{\"old_price\":\"\",\"model\":\"FAUS TEMPO ROBLE SELECCION_1T02\",\"thickness\":\"12MM\",\"width\":\"213MM\",\"height\":\"1346MM\",\"warranty\":\"20 N\\u0102M \",\"detailimage_id\":\"428\",\"meta_title\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha \",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha \",\"meta_description\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha \",\"introduction\":\"<p>S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS&nbsp;<\\/p>\\r\\n<p>M&atilde; m&agrave;u: FAUS TEMPO ROBLE SELECCION_1T02<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 T&acirc;y Ban Nha FAUS&nbsp;<\\/p>\\r\\n<p>M&atilde; m&agrave;u: FAUS TEMPO ROBLE SELECCION_1T02<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\"}', 1, 1428801764),
(43, 'vi', 1, '1T15', '', '1t15', 48, 425, 1, 1, '', 0, 0, '{\"old_price\":\"\",\"model\":\"FAUS TEMPO ACACIA NATURAL_1T15\",\"thickness\":\"12MM\",\"width\":\"213MM\",\"height\":\"1346MM\",\"warranty\":\"20 N\\u0102M \",\"detailimage_id\":\"426\",\"meta_title\":\"S\\u00e0n g\\u1ed7 FAUS (Made in Spain)\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 T\\u00e2y Ban Nha\\r\\nS\\u00e0n g\\u1ed7 FAUS\\r\\nS\\u00e0n g\\u1ed7 cao c\\u1ea5p Ch\\u00e2u \\u00c2u\",\"meta_description\":\"S\\u00e0n g\\u1ed7 FAUS (Made in Spain)\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 FAUS (Made in Spain)<\\/p>\\r\\n<p>M&atilde; m&agrave;u: TEMPO ACACIA NATURAL_1T15<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 FAUS (Made in Spain)<\\/p>\\r\\n<p>M&atilde; m&agrave;u: TEMPO ACACIA NATURAL_1T15<\\/p>\\r\\n<p>K&iacute;ch th\\u01b0\\u1edbc: 1346 x 213 x 12mm<\\/p>\"}', 1, 1428803283),
(44, 'vi', 1, 'BN - O 103', '', 'bn---o-103', 1, 187, 1, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"Bn - 1349-2\",\"thickness\":\"12 mm\",\"width\":\"125 mm\",\"height\":\"1210 mm\",\"warranty\":\"\",\"detailimage_id\":\"188\",\"meta_title\":\"S\\u1ea3n xu\\u1ea5t t\\u1ea1i Th\\u00e1i Lan , si\\u00eau ch\\u1ecbu n\\u01b0\\u1edbc\",\"meta_keyword\":\"S\\u1ea3n xu\\u1ea5t t\\u1ea1i Th\\u00e1i Lan , si\\u00eau ch\\u1ecbu n\\u01b0\\u1edbc\",\"meta_description\":\"S\\u1ea3n xu\\u1ea5t t\\u1ea1i Th\\u00e1i Lan , si\\u00eau ch\\u1ecbu n\\u01b0\\u1edbc\",\"introduction\":\"<p>S\\u1ea3n xu\\u1ea5t t\\u1ea1i Th&aacute;i Lan , si&ecirc;u ch\\u1ecbu n\\u01b0\\u1edbc<\\/p>\",\"description\":\"\"}', 1, 1431047997),
(45, 'vi', 1, 'BN - N103', '', 'bn---n103', 1, 337, 1, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BN - N103\",\"thickness\":\"12 mm\",\"width\":\"125 mm\",\"height\":\"1210 mm\",\"warranty\":\"\",\"detailimage_id\":\"338\",\"meta_title\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_keyword\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_description\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"introduction\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\",\"description\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\"}', 1, 1431071274),
(46, 'vi', 1, 'BN- 1349-2', '', 'bn--1349-2', 1, 347, 1, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BN- 1349-2\",\"thickness\":\"12mm\",\"width\":\"125mm\",\"height\":\"1210mm\",\"warranty\":\"\",\"detailimage_id\":\"348\",\"meta_title\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_keyword\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_description\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"introduction\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\",\"description\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\"}', 1, 1431071522),
(47, 'vi', 1, 'BN - N102', '', 'bn---n102', 1, 339, 1, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BN- N102\",\"thickness\":\"12mm \",\"width\":\"125mm\",\"height\":\"1210mm\",\"warranty\":\"\",\"detailimage_id\":\"340\",\"meta_title\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_keyword\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_description\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"introduction\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\",\"description\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\"}', 1, 1431072002),
(48, 'vi', 1, 'BN-1334-4', '', 'bn-1334-4', 1, 327, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BN-1334-4\",\"thickness\":\"12mm\",\"width\":\"125mm\",\"height\":\"1210mm\",\"warranty\":\"\",\"detailimage_id\":\"328\",\"meta_title\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_keyword\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_description\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"introduction\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\",\"description\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\"}', 1, 1431072131),
(49, 'vi', 1, 'BT12-O102', '', 'bt12-o102', 1, 323, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BT12-O102\",\"thickness\":\"12mm\",\"width\":\"195mm\",\"height\":\"1210mm\",\"warranty\":\"\",\"detailimage_id\":\"324\",\"meta_title\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_keyword\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_description\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"introduction\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\",\"description\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\"}', 1, 1431072657),
(50, 'vi', 1, 'BT8-1334-4', '', 'bt8-1334-4', 1, 501, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BT8-1334-4\",\"thickness\":\"8mm\",\"width\":\"195mm\",\"height\":\"1210mm\",\"warranty\":\"\",\"detailimage_id\":\"500\",\"meta_title\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_keyword\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_description\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"introduction\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\",\"description\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\"}', 1, 1431072884),
(51, 'vi', 1, 'BT8-8691', '', 'bt8-8691', 1, 498, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BT8-8691\",\"thickness\":\"8mm\",\"width\":\"198mm\",\"height\":\"1210mm\",\"warranty\":\"\",\"detailimage_id\":\"499\",\"meta_title\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_keyword\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_description\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"introduction\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\",\"description\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\"}', 1, 1431073137),
(52, 'vi', 1, 'BT8-N103', '', 'bt8-n103', 1, 495, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BT8-N103\",\"thickness\":\"8mm\",\"width\":\"198mm\",\"height\":\"1210mm\",\"warranty\":\"15 n\\u0103m\",\"detailimage_id\":\"497\",\"meta_title\":\"S\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_keyword\":\"S\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_description\":\"S\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"introduction\":\"<p>S&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\",\"description\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\"}', 1, 1431073217),
(53, 'vi', 1, 'BT8-O102', '', 'bt8-o102', 1, 315, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BT8-O102\",\"thickness\":\"8mm\",\"width\":\"195mm\",\"height\":\"1210mm\",\"warranty\":\"\",\"detailimage_id\":\"316\",\"meta_title\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_keyword\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_description\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"introduction\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\",\"description\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\"}', 1, 1431073301),
(54, 'vi', 1, 'BT8-M103', '', 'bt8-m103', 1, 313, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BT8-M103\",\"thickness\":\"8mm\",\"width\":\"195mm\",\"height\":\"1210mm\",\"warranty\":\"\",\"detailimage_id\":\"314\",\"meta_title\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_keyword\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"meta_description\":\"s\\u00e0n G\\u1ed7 ThaiGreen Made in Thailand\",\"introduction\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\",\"description\":\"<p>s&agrave;n G\\u1ed7 ThaiGreen Made in Thailand<\\/p>\"}', 1, 1431073424),
(55, 'vi', 1, 'H 1223', '', 'h-1223', 47, 305, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H 1223\",\"thickness\":\"12 mm\",\"width\":\"105 mm\",\"height\":\"810 mm\",\"warranty\":\"\",\"detailimage_id\":\"306\",\"meta_title\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\"}', 1, 1431133715),
(56, 'vi', 1, 'H 1226', '', 'h-1226', 47, 303, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H 1226\",\"thickness\":\"12 mm\",\"width\":\"195 mm\",\"height\":\"810 mm\",\"warranty\":\"\",\"detailimage_id\":\"304\",\"meta_title\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\"}', 1, 1431133938),
(57, 'vi', 1, 'H 1227', '', 'h-1227', 47, 289, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H 1227\",\"thickness\":\"12 mm\",\"width\":\"105 mm\",\"height\":\"810 mm\",\"warranty\":\"\",\"detailimage_id\":\"290\",\"meta_title\":\"San go C\\u00f4ng nghi\\u1ec7p H\\u1ea3otex s\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\"}', 1, 1431134196),
(58, 'vi', 1, 'H 1231', '', 'h-1231', 47, 293, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H 1231\",\"thickness\":\"12 mm\",\"width\":\"105 mm\",\"height\":\"810 mm\",\"warranty\":\"\",\"detailimage_id\":\"294\",\"meta_title\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\"}', 1, 1431134415),
(59, 'vi', 1, 'H 1230', '', 'h-1230', 47, 297, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H 1230\",\"thickness\":\"12 mm\",\"width\":\"105 mm\",\"height\":\"810 mm\",\"warranty\":\"\",\"detailimage_id\":\"298\",\"meta_title\":\"San G\\u1ed7 Harotex, S\\u1ea3n xu\\u1ea5t theo c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\"}', 1, 1431134985),
(60, 'vi', 1, 'H 811', '', 'h-811', 47, 301, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H 811\",\"thickness\":\"8 mm\",\"width\":\"195 mm\",\"height\":\"1210 mm\",\"warranty\":\"\",\"detailimage_id\":\"302\",\"meta_title\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\"}', 1, 1431135082),
(61, 'vi', 1, 'H 812', '', 'h-812', 47, 299, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H 812\",\"thickness\":\"12 mm\",\"width\":\"195 mm\",\"height\":\"1215 mm\",\"warranty\":\"\",\"detailimage_id\":\"300\",\"meta_title\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\"}', 1, 1431135185),
(62, 'vi', 1, 'H 813', '', 'h-813', 47, 273, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H 813\",\"thickness\":\"8 mm\",\"width\":\"195 mm\",\"height\":\"1215 mm\",\"warranty\":\"\",\"detailimage_id\":\"274\",\"meta_title\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\"}', 1, 1431135293),
(63, 'vi', 1, 'H 815', '', 'h-815', 47, 271, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H 815\",\"thickness\":\"8 mm\",\"width\":\"195 mm\",\"height\":\"1215 mm\",\"warranty\":\"\",\"detailimage_id\":\"272\",\"meta_title\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"introduction\":\"\",\"description\":\"\"}', 1, 1431135446),
(64, 'vi', 1, 'H 816 ', '', 'h-816', 47, 269, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"H 816\",\"thickness\":\"8 mm\",\"width\":\"195 mm\",\"height\":\"1215 mm\",\"warranty\":\"\",\"detailimage_id\":\"270\",\"meta_title\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"meta_description\":\"S\\u00e0n g\\u1ed7 c\\u00f4ng ngh\\u1ec7 \\u0110\\u1ee9c\",\"introduction\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 c&ocirc;ng ngh\\u1ec7 \\u0110\\u1ee9c<\\/p>\"}', 1, 1431135564),
(65, 'vi', 1, 'BT8 - M105', '', 'bt8---m105', 1, 367, 0, 0, '', 0, 0, '{\"old_price\":\"\",\"model\":\"BT8 - M105 \",\"thickness\":\"8mm\",\"width\":\"195mm \",\"height\":\"1210mm\",\"warranty\":\"\",\"detailimage_id\":\"369\",\"meta_title\":\"S\\u00e0n g\\u1ed7 ThaiGreen Made in Thailand\",\"meta_keyword\":\"S\\u00e0n g\\u1ed7 ThaiGreen Made in Thailand\",\"meta_description\":\"S\\u00e0n g\\u1ed7 ThaiGreen Made in ThaiLand\",\"introduction\":\"<p><strong>Gi\\u1edbi thi\\u1ec7u s\\u1ea3n ph\\u1ea9m s&agrave;n g\\u1ed7 m\\u1edbi ThaiGreen<\\/strong><\\/p>\",\"description\":\"<p>S&agrave;n g\\u1ed7 ThaiGreen Made in ThaiLand<\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>&nbsp;<br \\/>&nbsp;<\\/p>\"}', 1, 1431918877);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_image`
--

CREATE TABLE `tbl_product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_image`
--

INSERT INTO `tbl_product_image` (`id`, `product_id`, `image_id`, `type`) VALUES
(1, 3, 18, 0),
(2, 3, 19, 0),
(3, 3, 20, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_qa`
--

CREATE TABLE `tbl_qa` (
  `id` int(11) NOT NULL,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(256) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
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
  `Date` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_qa_answer`
--

CREATE TABLE `tbl_qa_answer` (
  `id` int(11) NOT NULL,
  `language` varchar(2) NOT NULL,
  `qa_id` int(11) DEFAULT NULL,
  `created_time` int(11) DEFAULT NULL,
  `created_by` decimal(18,0) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `content` text,
  `order_view` int(10) UNSIGNED NOT NULL,
  `Mark` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_recruitment`
--

CREATE TABLE `tbl_recruitment` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `language` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `language`, `name`, `value`, `category`, `description`) VALUES
(1, 'vi', 'TYPE_OF_WEB', '1', 'ADMIN', 'Loại website phục vụ việc hiển thị Help'),
(2, 'en', 'TYPE_OF_WEB', '1', 'ADMIN', 'Loại website phục vụ việc hiển thị Help'),
(3, 'vi', 'TITLE_DEFAULT', 'San gỗ Việt Phát , Sàn gỗ Tây Ban Nha FAUS ', 'SEO', ''),
(4, 'en', 'TITLE_DEFAULT', 'San gỗ Việt Phát', 'SEO', ''),
(5, 'vi', 'DESCRIPTION_DEFAULT', 'San gỗ Việt Phát, Sàn gỗ Tây Ban Nha FAUS', 'SEO', ''),
(6, 'en', 'DESCRIPTION_DEFAULT', 'San gỗ Việt Phát', 'SEO', ''),
(7, 'vi', 'KEYWORD_DEFAULT', 'San gỗ Việt Phát, Sàn gỗ FAUS FLOOR, Sàn gỗ Tây Ban Nha', 'SEO', ''),
(8, 'en', 'KEYWORD_DEFAULT', 'San gỗ Việt Phát', 'SEO', ''),
(9, 'vi', 'Copyright', 'Copyright © 2013. Sangovietphat.com All Rights Reserved', 'INFORMATION', ''),
(10, 'en', 'Copyright', 'Copyright © 2013. Aventhuhavietnam.com All Rights Reserved', 'INFORMATION', ''),
(11, 'vi', 'GOOGLE_WEB_ID', 'Sàn gỗ sản xuất tại châu Âu', 'SEO', ''),
(12, 'en', 'GOOGLE_WEB_ID', 'UA-41253093-1', 'SEO', ''),
(13, 'vi', 'PHONE', '0982 088 969', 'INFORMATION', 'Số điện thoại liên hệ trực tiếp với công ty'),
(14, 'en', 'PHONE', '(+84) 988 055 021', 'INFORMATION', 'Số điện thoại liên hệ trực tiếp với công ty'),
(15, 'vi', 'Email', 'vietphathp@gmail.com', 'INFORMATION', 'email của nhà tư vấn'),
(16, 'en', 'Email', 'sangovietphat@gmail.com', 'INFORMATION', 'email của nhà tư vấn'),
(17, 'vi', 'META_TITLE_HOME', 'San gỗ Việt Phát, Sàn gỗ Tây Ban Nha FAUS', 'SEO', 'Trang chủ'),
(18, 'en', 'META_TITLE_HOME', 'San gỗ Việt Phát', 'SEO', 'Trang chủ'),
(19, 'vi', 'META_KEYWORD_HOME', 'San gỗ Việt Phát, Sàn gỗ Tây Ban NHA FAUS', 'SEO', 'Trang chủ'),
(20, 'en', 'META_KEYWORD_HOME', 'San gỗ Việt Phát', 'SEO', 'Trang chủ'),
(21, 'vi', 'META_DESCRIPTION_HOME', 'San gỗ Việt Phát, Sàn gỗ Tây Ban Nha FAUS', 'SEO', 'Trang chủ'),
(22, 'en', 'META_DESCRIPTION_HOME', 'San gỗ Việt Phát', 'SEO', 'Trang chủ'),
(23, 'vi', 'META_TITLE_SEARCH', 'Sàn gỗ FAUS, Sàn gỗ Tây Ban Nha', 'SEO', 'Ket qua tim kiem'),
(24, 'en', 'META_TITLE_SEARCH', 'Ket qua tim kiem', 'SEO', 'Ket qua tim kiem'),
(25, 'vi', 'META_KEYWORD_SEARCH', 'Sàn gỗ FAUS, Sàn gỗ Tây Ban Nha', 'SEO', 'Ket qua tim kiem'),
(26, 'en', 'META_KEYWORD_SEARCH', 'Ket qua tim kiem', 'SEO', 'Ket qua tim kiem'),
(27, 'vi', 'META_DESCRIPTION_SEARCH', 'Sàn gỗ FAUS, Sàn gỗ Tây Ban Nha', 'SEO', 'Ket qua tim kiem'),
(28, 'en', 'META_DESCRIPTION_SEARCH', 'Ket qua tim kiem', 'SEO', 'Ket qua tim kiem'),
(29, 'vi', 'HOT_LINE', '0982 088 969', 'INFORMATION', ''),
(30, 'en', 'HOT_LINE', '(04) 1234.5678', 'INFORMATION', ''),
(31, 'vi', 'FACEBOOK_PAGE', 'sàn gỗ Việt Phát', 'INFORMATION', ''),
(32, 'en', 'FACEBOOK_PAGE', 'sangovietphat', 'INFORMATION', ''),
(33, 'vi', 'WEBSITE', 'sangovietphat.com', 'INFORMATION', ''),
(34, 'en', 'WEBSITE', 'sangovietphat.com', 'INFORMATION', ''),
(35, 'vi', 'CONTACT', 'CÔNG TY TNHH THƯƠNG MẠI VÀ TRANG TRÍ NỘI THẤT VIỆT PHÁT', 'INFORMATION', ''),
(36, 'en', 'CONTACT', 'nhà số 6 hẻm 23/26, ngách 26, Thái Thịnh 2, Hà Nội', 'INFORMATION', ''),
(37, 'vi', 'INFO', 'San go Viet Phat', 'INFORMATION', ''),
(38, 'en', 'INFO', 'San go Viet Phat', 'INFORMATION', ''),
(39, 'vi', 'ADDRESS_GOOGLE_MAPS', '<iframe width=\"293\" height=\"167\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=thai+thinh+ha+noi+viet+nam&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=39.916234,82.265625&amp;ie=UTF8&amp;hq=thai+thinh&amp;hnear=Hoan+Kiem+District,+Hanoi,+Vietnam&amp;t=m&amp;fll=21.011385,105.820076&amp;fspn=0.011518,0.020084&amp;st=107658235038825379151&amp;rq=1&amp;ev=zi&amp;split=1&amp;ll=21.017494,105.835547&amp;spn=0.00669', 'INFORMATION', '<iframe width=\"293\" height=\"167\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=thai+thinh+ha+noi+viet+nam&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=39.916234,82.265625&amp;ie=UTF8&amp;hq=thai+thinh&amp;hnear=Hoan+Kiem+District,+Hanoi,+Vietnam&amp;t=m&amp;fll=21.011385,105.820076&amp;fspn=0.011518,0.020084&amp;st=107658235038825379151&amp;rq=1&amp;ev=zi&amp;split=1&amp;ll=21.017494,105.835547&amp;spn=0.00669'),
(40, 'en', 'ADDRESS_GOOGLE_MAPS', '<iframe width=\"293\" height=\"167\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=thai+thinh+ha+noi+viet+nam&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=39.916234,82.265625&amp;ie=UTF8&amp;hq=thai+thinh&amp;hnear=Hoan+Kiem+District,+Hanoi,+Vietnam&amp;t=m&amp;fll=21.011385,105.820076&amp;fspn=0.011518,0.020084&amp;st=107658235038825379151&amp;rq=1&amp;ev=zi&amp;split=1&amp;ll=21.017494,105.835547&amp;spn=0.00669', 'INFORMATION', '<iframe width=\"293\" height=\"167\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=thai+thinh+ha+noi+viet+nam&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=39.916234,82.265625&amp;ie=UTF8&amp;hq=thai+thinh&amp;hnear=Hoan+Kiem+District,+Hanoi,+Vietnam&amp;t=m&amp;fll=21.011385,105.820076&amp;fspn=0.011518,0.020084&amp;st=107658235038825379151&amp;rq=1&amp;ev=zi&amp;split=1&amp;ll=21.017494,105.835547&amp;spn=0.00669'),
(41, 'vi', 'META_TITLE_RECRUITMENT', 'Sàn gỗ ThaiGreen ', 'SEO', ''),
(42, 'en', 'META_TITLE_RECRUITMENT', 'Trang tuyển dụng', 'SEO', ''),
(43, 'vi', 'META_KEYWORD_RECRUITMENT', 'Sàn gỗ sản xuất tại Thái Lan', 'SEO', ''),
(44, 'en', 'META_KEYWORD_RECRUITMENT', 'Trang tuyển dụng', 'SEO', ''),
(45, 'vi', 'META_DESCRIPTION_RECRUITMENT', 'Sàn gỗ Sophia', 'SEO', ''),
(46, 'en', 'META_DESCRIPTION_RECRUITMENT', 'Trang tuyển dụng', 'SEO', ''),
(47, 'vi', 'META_TITLE_QA', 'Sàn gỗ Malaysia', 'SEO', ''),
(48, 'en', 'META_TITLE_QA', 'Trang hỏi đáp', 'SEO', ''),
(49, 'vi', 'META_KEYWORD_QA', 'Sàn gỗ Harotex ', 'SEO', ''),
(50, 'en', 'META_KEYWORD_QA', 'Trang hỏi đáp', 'SEO', ''),
(51, 'vi', 'META_DESCRIPTION_QA', 'Nhập khẩu sàn gỗ công nghiệp', 'SEO', ''),
(52, 'en', 'META_DESCRIPTION_QA', 'Trang hỏi đáp', 'SEO', ''),
(53, 'vi', 'META_TITLE_PRODUCT', 'Phân phối sàn gỗ công nghiệp', 'SEO', ''),
(54, 'en', 'META_TITLE_PRODUCT', 'Trang sản phẩm', 'SEO', ''),
(55, 'vi', 'META_KEYWORD_PRODUCT', 'Sàn gỗ công nghiệp', 'SEO', ''),
(56, 'en', 'META_KEYWORD_PRODUCT', 'Trang sản phẩm', 'SEO', ''),
(57, 'vi', 'META_DESCRIPTION_PRODUCT', 'Sàn gỗ công nghiệp siêu chịu nước', 'SEO', ''),
(58, 'en', 'META_DESCRIPTION_PRODUCT', 'Trang sản phẩm', 'SEO', ''),
(59, 'vi', 'META_TITLE_SEACH_SHOP', 'Sàn gỗ Hà nội', 'SEO', ''),
(60, 'en', 'META_TITLE_SEACH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(61, 'vi', 'META_KEYWORD_SEACH_SHOP', 'Sàn gỗ nào tốt', 'SEO', ''),
(62, 'en', 'META_KEYWORD_SEACH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(63, 'vi', 'META_DESCRIPTON_SEACH_SHOP', 'Sàn gỗ chịu nước', 'SEO', ''),
(64, 'en', 'META_DESCRIPTON_SEACH_SHOP', 'Trang tìm kiếm cửa hàng', 'SEO', ''),
(65, 'vi', 'META_TITLE_NEWS', 'Sàn gỗ công nghiệp sản xuát tại châu Âu', 'SEO', ''),
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
(77, 'vi', 'META_TITLE_CONTACT', 'CÔNG TY Việt Phát', 'SEO', ''),
(78, 'en', 'META_TITLE_CONTACT', 'Dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(79, 'vi', 'META_KEYWORD_CONTACT', 'CÔNG TY  Việt Phát', 'SEO', ''),
(80, 'en', 'META_KEYWORD_CONTACT', 'Dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(81, 'vi', 'META_DESCRIPTION_CONTACT', 'Kho sàn gỗ công nghiệp ', 'SEO', ''),
(82, 'en', 'META_DESCRIPTION_CONTACT', 'Liên hệ dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(83, 'vi', 'ADDRESS', 'Hà Nội: Số 31 Ngọc Đại - Đại Mỗ- Nam Từ Liêm - Hà Nội - ĐT: 043.200.2097', 'INFORMATION', ''),
(84, 'en', 'ADDRESS', 'nhà số 6 hẻm 23/26, ngách 26, Thái Thịnh 2, Hà Nội', 'INFORMATION', ''),
(85, 'vi', 'SUPPORT_PHONE_SALE', '043 200.2097', 'INFORMATION', ''),
(86, 'en', 'SUPPORT_PHONE_SALE', '046 3 290 555', 'INFORMATION', ''),
(87, 'vi', 'SUPPORT_PHONE_TECH', '043 200.2097', 'INFORMATION', ''),
(88, 'en', 'SUPPORT_PHONE_TECH', '046 3 291 555', 'INFORMATION', ''),
(89, 'vi', 'META_TITLE_SHARE', 'Kho sàn gỗ công nghiệp Hà nội ', 'SEO', ''),
(90, 'en', 'META_TITLE_SHARE', 'Dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(91, 'vi', 'META_KEYWORD_SHARE', 'Kho sàn gỗ công nghiệp Hải phòng', 'SEO', ''),
(92, 'en', 'META_KEYWORD_SHARE', 'Dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(93, 'vi', 'META_DESCRIPTION_SHARE', 'CÔNG TY Việt Phát', 'SEO', ''),
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
(109, 'vi', 'HOTLINE_PHONE', '0982 088 969', 'INFORMATION', ''),
(110, 'en', 'HOTLINE_PHONE', '0988 330 555', 'INFORMATION', ''),
(119, 'vi', 'FAX', '043 789 4448', 'INFORMATION', ''),
(120, 'en', 'FAX', '(+84-4) 354 09412', 'INFORMATION', ''),
(129, 'vi', 'META_TITLE_INTRO', 'Phụ kiện sàn gỗ', 'SEO', ''),
(130, 'en', 'META_TITLE_INTRO', 'Danh sách các bài giới thiệu', 'SEO', ''),
(131, 'vi', 'META_KEYWORD_INTRO', 'Danh sách các bài giới thiệu', 'SEO', ''),
(132, 'en', 'META_KEYWORD_INTRO', 'Danh sách các bài giới thiệu', 'SEO', ''),
(133, 'vi', 'META_DESCRIPTION_INTRO', 'CÔNG TY Việt Phát', 'SEO', ''),
(134, 'en', 'META_DESCRIPTION_INTRO', 'Dược phẩm Á Âu | Asia Euro Pharmaceutical', 'SEO', ''),
(150, 'vi', 'META_DESCRIPTION_SUPPORTER', 'Nhập khẩu và phân phối sàn gỗ', 'SEO', ''),
(151, 'en', 'META_DESCRIPTION_SUPPORTER', 'Ban cố vấn', 'SEO', ''),
(152, 'vi', 'META_TITLE_ADVISOR', 'Nhập khẩu và phân phối sàn gỗ tại Hà Nội', 'SEO', ''),
(153, 'en', 'META_TITLE_ADVISOR', 'Ban cố vấn', 'SEO', ''),
(154, 'vi', 'META_KEYWORD_ADVISOR', 'Sàn gỗ nhập khẩu', 'SEO', ''),
(155, 'en', 'META_KEYWORD_ADVISOR', 'Ban cố vấn', 'SEO', ''),
(156, 'vi', 'META_DESCRIPTION_ADVISOR', 'Ban cố vấn', 'SEO', ''),
(157, 'en', 'META_DESCRIPTION_ADVISOR', 'Ban cố vấn', 'SEO', ''),
(158, 'vi', 'META_TITLE_SUPPORTER', 'Tư vấn sức khỏe online', 'SEO', ''),
(159, 'en', 'META_TITLE_SUPPORTER', 'Tư vấn sức khỏe online', 'SEO', ''),
(160, 'vi', 'META_KEYWORD_SUPPORTER', 'Tư vấn sức khỏe online', 'SEO', ''),
(161, 'en', 'META_KEYWORD_SUPPORTER', 'Tư vấn sức khỏe online', 'SEO', ''),
(162, 'vi', 'HELP_SHOPPING', 'FAUS TEMPO ACACICA NATURAL ', 'INFORMATION', 'ID của bài viết hướng dẫn mua hàng online'),
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
(192, 'vi', 'KD_HANOI', '(04)3 200.2097 - 0982.088.969', 'INFORMATION', ''),
(193, 'en', 'KD_HANOI', '(04) 1234 5678', 'INFORMATION', ''),
(194, 'vi', 'KD_TPHCM', '0982 088 969', 'INFORMATION', ''),
(195, 'en', 'KD_TPHCM', '(04) 1234 5678', 'INFORMATION', ''),
(196, 'vi', 'KD_DANANG', '0982 552 772', 'INFORMATION', ''),
(197, 'en', 'KD_DANANG', '(04) 1234 5678', 'INFORMATION', ''),
(198, 'vi', 'KD_HAIPHONG', '0313.734.270 - 0904 334 667-094 737 66 59', 'INFORMATION', ''),
(199, 'en', 'KD_HAIPHONG', '(04) 1234 5678', 'INFORMATION', ''),
(200, 'vi', 'BRANCH_HANOI_ADDRESS', 'Số 31 Ngọc Đại - Đại Mỗ - Nam Từ Liêm - Hà Nội', 'INFORMATION', ''),
(201, 'en', 'BRANCH_HANOI_ADDRESS', 'Số 115 Khu Liên Cơ - Xã Đại Mỗ - Từ Liêm - Hà Nội', 'INFORMATION', ''),
(202, 'vi', 'BRANCH_HANOI_PHONE', '043.200.2097 - 0982.088.969', 'INFORMATION', ''),
(203, 'en', 'BRANCH_HANOI_PHONE', '043.789.4447', 'INFORMATION', ''),
(204, 'vi', 'BRANCH_HANOI_FAX', '043.789.4448', 'INFORMATION', ''),
(205, 'en', 'BRANCH_HANOI_FAX', '043.789.4448', 'INFORMATION', ''),
(206, 'vi', 'BRANCH_HAIPHONG_ADDRESS', '80 Nguyễn Bỉnh Khiêm - Ngô Quyền - Hải Phòng', 'INFORMATION', ''),
(207, 'en', 'BRANCH_HAIPHONG_ADDRESS', '80 Nguyễn Bỉnh Khiêm - Ngô Quyền - Hải Phòng', 'INFORMATION', ''),
(208, 'vi', 'BRANCH_HAIPHONG_PHONE', '0313.734.270 - 0904.334.667- 094 737 66 59', 'INFORMATION', ''),
(209, 'en', 'BRANCH_HAIPHONG_PHONE', '0313.734.270', 'INFORMATION', ''),
(210, 'vi', 'BRANCH_HAIPHONG_FAX', '0313.734.271', 'INFORMATION', ''),
(211, 'en', 'BRANCH_HAIPHONG_FAX', '0313.734.271', 'INFORMATION', ''),
(212, 'vi', 'BRANCH_HAIPHONG_EMAIL', 'nguyentrienhp@gmail.com', 'INFORMATION', ''),
(213, 'en', 'BRANCH_HAIPHONG_EMAIL', 'nguyentrienhp@gmail.com', 'INFORMATION', ''),
(214, 'vi', 'BRANCH_HANOI_IFRAME', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.946689111175!2d105.75918399999998!3d20.994774000000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134534024854ff9%3A0xfd37a82b4fda4a2b!2zQ0ggTeG6oW5oIEPGsOG7nW5nIC0gTGnDqm4gQ8ahLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1417085931354\" width=\"560\" height=\"400\" frameborder=\"0\" style=\"border:0\"></iframe>', 'INFORMATION', ''),
(215, 'en', 'BRANCH_HANOI_IFRAME', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.946689111175!2d105.75918399999998!3d20.994774000000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134534024854ff9%3A0xfd37a82b4fda4a2b!2zQ0ggTeG6oW5oIEPGsOG7nW5nIC0gTGnDqm4gQ8ahLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1417085931354\" width=\"560\" height=\"400\" frameborder=\"0\" style=\"border:0\"></iframe>', 'INFORMATION', ''),
(216, 'vi', 'BRANCH_HAIPHONG_IFRAME', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3728.7751435816913!2d106.69445509259454!3d20.84078453572587!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7a9970ad30f9%3A0xecaf212c12f25026!2zODAgTmd1eeG7hW4gQuG7iW5oIEtoacOqbSwgxJDhu5VuZyBRdeG7kWMgQsOsbmgsIE5nw7QgUXV54buBbiwgSOG6o2kgUGjDsm5nLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1417085832429\" width=\"560\" height=\"400\" frameborder=\"0\" style=\"border:0\"></iframe>', 'INFORMATION', ''),
(217, 'en', 'BRANCH_HAIPHONG_IFRAME', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3728.7751435816913!2d106.69445509259454!3d20.84078453572587!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7a9970ad30f9%3A0xecaf212c12f25026!2zODAgTmd1eeG7hW4gQuG7iW5oIEtoacOqbSwgxJDhu5VuZyBRdeG7kWMgQsOsbmgsIE5nw7QgUXV54buBbiwgSOG6o2kgUGjDsm5nLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1417085832429\" width=\"560\" height=\"400\" frameborder=\"0\" style=\"border:0\"></iframe>', 'INFORMATION', ''),
(218, 'vi', 'FACEBOOK_ADDRESS', 'https://www.facebook.com/SangoTayBanNha.Fausfloor/', 'INFORMATION', ''),
(219, 'en', 'FACEBOOK_ADDRESS', '#', 'INFORMATION', ''),
(220, 'vi', 'FOOTER_ID', '31', 'INFORMATION', ''),
(221, 'en', 'FOOTER_ID', '31', 'INFORMATION', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_share`
--

CREATE TABLE `tbl_share` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_store`
--

CREATE TABLE `tbl_store` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_store_product`
--

CREATE TABLE `tbl_store_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_advisor`
--

CREATE TABLE `tbl_suggest_advisor` (
  `id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `to_advisor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_album`
--

CREATE TABLE `tbl_suggest_album` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `to_album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_audio`
--

CREATE TABLE `tbl_suggest_audio` (
  `id` int(11) NOT NULL,
  `audio_id` int(11) NOT NULL,
  `to_audio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_booking`
--

CREATE TABLE `tbl_suggest_booking` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `to_booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_document`
--

CREATE TABLE `tbl_suggest_document` (
  `id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `to_document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_embedded_video`
--

CREATE TABLE `tbl_suggest_embedded_video` (
  `id` int(11) NOT NULL,
  `embeddedVideo_id` int(11) NOT NULL,
  `to_embeddedVideo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_healthnews`
--

CREATE TABLE `tbl_suggest_healthnews` (
  `id` int(11) NOT NULL,
  `healthNews_id` int(11) NOT NULL,
  `to_healthNews_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_intro`
--

CREATE TABLE `tbl_suggest_intro` (
  `id` int(11) NOT NULL,
  `intro_id` int(11) NOT NULL,
  `to_intro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_introVideo`
--

CREATE TABLE `tbl_suggest_introVideo` (
  `id` int(11) NOT NULL,
  `intro_id` int(11) NOT NULL,
  `to_video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_news`
--

CREATE TABLE `tbl_suggest_news` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `to_news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_suggest_news`
--

INSERT INTO `tbl_suggest_news` (`id`, `news_id`, `to_news_id`) VALUES
(6, 24, 16),
(7, 33, 32),
(8, 34, 33),
(9, 36, 34),
(10, 38, 32),
(11, 39, 32),
(12, 41, 39);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_partner`
--

CREATE TABLE `tbl_suggest_partner` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `to_partner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_product`
--

CREATE TABLE `tbl_suggest_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `to_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_suggest_product`
--

INSERT INTO `tbl_suggest_product` (`id`, `product_id`, `to_product_id`) VALUES
(21, 21, 25),
(33, 25, 37),
(34, 23, 37),
(35, 23, 25),
(36, 22, 37),
(37, 22, 25),
(38, 22, 23),
(39, 21, 37),
(40, 21, 23),
(41, 21, 22),
(42, 38, 25),
(43, 38, 23),
(44, 38, 22),
(45, 29, 32),
(46, 26, 32),
(47, 26, 29),
(48, 24, 32),
(49, 24, 29),
(50, 24, 26),
(51, 39, 32),
(52, 39, 29),
(53, 39, 26),
(54, 39, 24),
(55, 40, 26),
(56, 40, 24),
(57, 30, 31),
(58, 28, 31),
(59, 28, 30),
(60, 27, 31),
(61, 27, 30),
(62, 27, 28),
(63, 45, 44),
(64, 45, 41),
(65, 46, 45),
(66, 46, 44),
(67, 46, 41),
(68, 47, 46),
(69, 47, 45),
(70, 47, 44),
(71, 47, 41),
(72, 48, 47),
(73, 48, 46),
(74, 48, 45),
(75, 48, 44),
(76, 48, 41),
(77, 49, 38),
(78, 49, 37),
(79, 49, 22),
(80, 49, 21),
(81, 49, 25),
(82, 55, 31),
(83, 55, 30),
(84, 56, 55),
(85, 56, 31),
(86, 57, 56),
(87, 57, 55),
(88, 57, 31),
(89, 57, 30),
(90, 57, 28),
(91, 57, 27),
(92, 58, 57),
(93, 58, 56),
(94, 58, 55),
(95, 58, 31),
(96, 58, 30),
(97, 58, 28),
(98, 58, 27),
(99, 59, 58),
(100, 59, 57),
(101, 59, 56),
(102, 59, 55),
(103, 59, 31),
(104, 59, 30),
(105, 59, 28),
(106, 59, 27),
(107, 61, 60),
(108, 62, 61),
(109, 62, 60),
(110, 63, 62),
(111, 63, 61),
(112, 63, 60),
(113, 64, 63),
(114, 64, 62),
(115, 64, 61),
(116, 64, 60),
(117, 54, 53),
(118, 54, 52),
(119, 54, 51),
(120, 54, 50),
(121, 53, 54),
(122, 53, 52),
(123, 53, 51),
(124, 53, 50),
(125, 52, 54),
(126, 52, 53),
(127, 52, 51),
(128, 52, 50),
(129, 51, 54),
(130, 51, 53),
(131, 51, 52),
(132, 51, 50),
(133, 50, 54),
(134, 50, 53),
(135, 50, 52),
(136, 50, 51),
(137, 63, 64),
(138, 62, 64),
(139, 62, 63),
(140, 61, 64),
(141, 61, 63),
(142, 61, 62),
(143, 60, 64),
(144, 60, 63),
(145, 60, 62),
(146, 60, 61),
(147, 58, 59),
(148, 57, 59),
(149, 57, 58),
(150, 56, 59),
(151, 56, 58),
(152, 56, 57),
(153, 56, 30),
(154, 56, 28),
(155, 56, 27),
(156, 55, 59),
(157, 55, 58),
(158, 55, 57),
(159, 55, 56),
(160, 55, 28),
(161, 55, 27),
(162, 31, 59),
(163, 31, 58),
(164, 31, 57),
(165, 31, 56),
(166, 31, 55),
(167, 31, 30),
(168, 31, 28),
(169, 31, 27),
(170, 30, 58),
(171, 30, 57),
(172, 30, 56),
(173, 30, 55),
(174, 30, 28),
(175, 30, 27),
(176, 30, 59),
(177, 28, 59),
(178, 28, 58),
(179, 28, 57),
(180, 28, 56),
(181, 28, 55),
(182, 28, 27),
(183, 27, 59),
(184, 27, 58),
(185, 27, 57),
(186, 27, 56),
(187, 27, 55),
(188, 47, 48),
(189, 46, 48),
(190, 46, 47),
(191, 45, 48),
(192, 45, 47),
(193, 45, 46),
(194, 44, 48),
(195, 44, 47),
(196, 44, 46),
(197, 44, 45),
(198, 44, 41),
(199, 41, 48),
(200, 41, 47),
(201, 41, 46),
(202, 41, 45),
(203, 41, 44),
(204, 40, 39),
(205, 40, 32),
(206, 40, 29),
(207, 39, 40),
(208, 32, 40),
(209, 32, 39),
(210, 32, 29),
(211, 32, 26),
(212, 32, 24),
(213, 29, 40),
(214, 29, 39),
(215, 29, 26),
(216, 29, 24),
(217, 26, 40),
(218, 26, 39),
(219, 26, 24),
(220, 24, 40),
(221, 24, 39),
(222, 65, 54),
(223, 65, 53),
(224, 65, 52),
(225, 65, 51),
(226, 65, 50),
(227, 50, 65),
(228, 53, 65),
(229, 52, 65),
(230, 51, 65),
(231, 54, 65),
(232, 38, 37),
(233, 38, 21),
(234, 25, 23),
(235, 25, 22),
(236, 25, 21),
(237, 25, 38),
(238, 25, 49),
(239, 21, 38),
(240, 21, 49),
(241, 22, 21),
(242, 22, 38),
(243, 22, 49),
(244, 56, 43),
(245, 56, 42),
(246, 56, 35),
(247, 56, 34),
(248, 56, 33),
(262, 43, 42),
(263, 43, 36),
(264, 43, 35),
(265, 43, 34),
(266, 42, 43),
(267, 42, 36),
(268, 42, 35),
(269, 42, 34),
(270, 36, 43),
(271, 36, 42),
(272, 36, 35),
(273, 36, 34),
(274, 35, 43),
(275, 35, 42),
(276, 35, 36),
(277, 35, 34),
(278, 34, 43),
(279, 34, 42),
(280, 34, 36),
(281, 34, 35),
(282, 34, 33),
(283, 33, 43),
(284, 33, 42),
(285, 33, 36),
(286, 33, 35),
(287, 33, 34),
(288, 43, 33),
(289, 42, 33),
(290, 36, 33),
(291, 35, 33);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_productVideo`
--

CREATE TABLE `tbl_suggest_productVideo` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `to_video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_product_news`
--

CREATE TABLE `tbl_suggest_product_news` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `to_news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_qa`
--

CREATE TABLE `tbl_suggest_qa` (
  `id` int(11) NOT NULL,
  `qa_id` int(11) NOT NULL,
  `to_qa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_recruitment`
--

CREATE TABLE `tbl_suggest_recruitment` (
  `id` int(11) NOT NULL,
  `recruitment_id` int(11) NOT NULL,
  `to_recruitment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_seller`
--

CREATE TABLE `tbl_suggest_seller` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `to_seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_share`
--

CREATE TABLE `tbl_suggest_share` (
  `id` int(11) NOT NULL,
  `share_id` int(11) NOT NULL,
  `to_share_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_store`
--

CREATE TABLE `tbl_suggest_store` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `to_store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_textlink`
--

CREATE TABLE `tbl_suggest_textlink` (
  `id` int(11) NOT NULL,
  `textlink_id` int(11) NOT NULL,
  `to_textlink_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suggest_video`
--

CREATE TABLE `tbl_suggest_video` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `to_video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_supporter`
--

CREATE TABLE `tbl_supporter` (
  `id` int(11) NOT NULL,
  `language` char(8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `order_view` int(11) NOT NULL DEFAULT '1',
  `other` varchar(1024) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_supporter`
--

INSERT INTO `tbl_supporter` (`id`, `language`, `status`, `name`, `order_view`, `other`, `created_by`, `created_time`) VALUES
(1, 'vi', 1, '', 0, '{\"title\":\"Ph\\u00f2ng kinh doanh H\\u00e0 N\\u1ed9i\",\"skype\":\"\",\"yahoo\":\"\",\"email\":\"\",\"phone\":\"(04) 1234 5678\"}', 1, 1410234862),
(2, 'vi', 1, '', 0, '{\"title\":\"Ph\\u00f2ng kinh doanh TP.HCM\",\"skype\":\"\",\"yahoo\":\"\",\"email\":\"\",\"phone\":\"(04) 1234 5678\"}', 1, 1410234897),
(3, 'vi', 1, '', 0, '{\"title\":\"Ph\\u00f2ng kinh doanh H\\u1ea3i Ph\\u00f2ng\",\"skype\":\"\",\"yahoo\":\"\",\"email\":\"\",\"phone\":\"(04) 1234 5678\"}', 1, 1410234920),
(4, 'vi', 1, '', 0, '{\"title\":\"Ph\\u00f2ng kinh doanh \\u0110\\u00e0 N\\u1eb5ng\",\"skype\":\"\",\"yahoo\":\"\",\"email\":\"\",\"phone\":\"(04) 1234 5678\"}', 1, 1410234940);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_textlink`
--

CREATE TABLE `tbl_textlink` (
  `id` int(11) NOT NULL,
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
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `other` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_time` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_visit_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `password`, `salt`, `status`, `email`, `other`, `created_time`, `created_by`, `last_visit_date`) VALUES
(1, '93a46fb6c41ebd7dc6dcb79ef600d48a', '52cd07bcbbe9d1.55450098', 1, 'admin@vietphat.com', '{\"phone\":\"04 6680 7626\",\"address\":\"H\\u00e0 N\\u1ed9i\",\"firstname\":\"Vi\\u1ec7t Ph\\u00e1t\",\"lastname\":\"Vi\\u1ec7t Nam\",\"register_date\":1331006642,\"last_visit_date\":1331006642,\"introimage\":\"173,174\"}', 0, 0, 1411615262);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `language` char(8) NOT NULL DEFAULT 'vi',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(256) NOT NULL,
  `file_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `introimage_id` int(11) UNSIGNED NOT NULL,
  `order_view` int(11) NOT NULL DEFAULT '1',
  `home` int(11) NOT NULL DEFAULT '0',
  `new` int(11) NOT NULL DEFAULT '0',
  `other` varchar(1024) NOT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `authassignment`
--
ALTER TABLE `authassignment`
  ADD PRIMARY KEY (`itemname`,`userid`),
  ADD KEY `userid` (`userid`);

--
-- Chỉ mục cho bảng `authitem`
--
ALTER TABLE `authitem`
  ADD PRIMARY KEY (`name`,`type`);

--
-- Chỉ mục cho bảng `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Chỉ mục cho bảng `pcounter_users`
--
ALTER TABLE `pcounter_users`
  ADD UNIQUE KEY `user_ip` (`user_ip`);

--
-- Chỉ mục cho bảng `tbl_admin_menu`
--
ALTER TABLE `tbl_admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_advisor`
--
ALTER TABLE `tbl_advisor`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`);

--
-- Chỉ mục cho bảng `tbl_album_image`
--
ALTER TABLE `tbl_album_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_audio`
--
ALTER TABLE `tbl_audio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`);

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`);

--
-- Chỉ mục cho bảng `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`);

--
-- Chỉ mục cho bảng `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`);

--
-- Chỉ mục cho bảng `tbl_document_file`
--
ALTER TABLE `tbl_document_file`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_embedded_video`
--
ALTER TABLE `tbl_embedded_video`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_healthnews`
--
ALTER TABLE `tbl_healthnews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_healthnews_image`
--
ALTER TABLE `tbl_healthnews_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_intro`
--
ALTER TABLE `tbl_intro`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_news_image`
--
ALTER TABLE `tbl_news_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order_product`
--
ALTER TABLE `tbl_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_partner`
--
ALTER TABLE `tbl_partner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`);

--
-- Chỉ mục cho bảng `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_qa`
--
ALTER TABLE `tbl_qa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_qa_answer`
--
ALTER TABLE `tbl_qa_answer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_recruitment`
--
ALTER TABLE `tbl_recruitment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_share`
--
ALTER TABLE `tbl_share`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_store`
--
ALTER TABLE `tbl_store`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_store_product`
--
ALTER TABLE `tbl_store_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_advisor`
--
ALTER TABLE `tbl_suggest_advisor`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_album`
--
ALTER TABLE `tbl_suggest_album`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_audio`
--
ALTER TABLE `tbl_suggest_audio`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_booking`
--
ALTER TABLE `tbl_suggest_booking`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_document`
--
ALTER TABLE `tbl_suggest_document`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_embedded_video`
--
ALTER TABLE `tbl_suggest_embedded_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_healthnews`
--
ALTER TABLE `tbl_suggest_healthnews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_intro`
--
ALTER TABLE `tbl_suggest_intro`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_introVideo`
--
ALTER TABLE `tbl_suggest_introVideo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_news`
--
ALTER TABLE `tbl_suggest_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_partner`
--
ALTER TABLE `tbl_suggest_partner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_product`
--
ALTER TABLE `tbl_suggest_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_productVideo`
--
ALTER TABLE `tbl_suggest_productVideo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_product_news`
--
ALTER TABLE `tbl_suggest_product_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_qa`
--
ALTER TABLE `tbl_suggest_qa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_recruitment`
--
ALTER TABLE `tbl_suggest_recruitment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_seller`
--
ALTER TABLE `tbl_suggest_seller`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_share`
--
ALTER TABLE `tbl_suggest_share`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_store`
--
ALTER TABLE `tbl_suggest_store`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_textlink`
--
ALTER TABLE `tbl_suggest_textlink`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_suggest_video`
--
ALTER TABLE `tbl_suggest_video`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_supporter`
--
ALTER TABLE `tbl_supporter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`);

--
-- Chỉ mục cho bảng `tbl_textlink`
--
ALTER TABLE `tbl_textlink`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin_menu`
--
ALTER TABLE `tbl_admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT cho bảng `tbl_advisor`
--
ALTER TABLE `tbl_advisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `tbl_album_image`
--
ALTER TABLE `tbl_album_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `tbl_audio`
--
ALTER TABLE `tbl_audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT cho bảng `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=796;
--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_document_file`
--
ALTER TABLE `tbl_document_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_embedded_video`
--
ALTER TABLE `tbl_embedded_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;
--
-- AUTO_INCREMENT cho bảng `tbl_healthnews`
--
ALTER TABLE `tbl_healthnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_healthnews_image`
--
ALTER TABLE `tbl_healthnews_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;
--
-- AUTO_INCREMENT cho bảng `tbl_intro`
--
ALTER TABLE `tbl_intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT cho bảng `tbl_news_image`
--
ALTER TABLE `tbl_news_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_order_product`
--
ALTER TABLE `tbl_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_partner`
--
ALTER TABLE `tbl_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT cho bảng `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `tbl_qa`
--
ALTER TABLE `tbl_qa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_qa_answer`
--
ALTER TABLE `tbl_qa_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_recruitment`
--
ALTER TABLE `tbl_recruitment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
--
-- AUTO_INCREMENT cho bảng `tbl_share`
--
ALTER TABLE `tbl_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_store`
--
ALTER TABLE `tbl_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_store_product`
--
ALTER TABLE `tbl_store_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_advisor`
--
ALTER TABLE `tbl_suggest_advisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_album`
--
ALTER TABLE `tbl_suggest_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_audio`
--
ALTER TABLE `tbl_suggest_audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_booking`
--
ALTER TABLE `tbl_suggest_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_document`
--
ALTER TABLE `tbl_suggest_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_embedded_video`
--
ALTER TABLE `tbl_suggest_embedded_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_healthnews`
--
ALTER TABLE `tbl_suggest_healthnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_intro`
--
ALTER TABLE `tbl_suggest_intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_introVideo`
--
ALTER TABLE `tbl_suggest_introVideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_news`
--
ALTER TABLE `tbl_suggest_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_partner`
--
ALTER TABLE `tbl_suggest_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_product`
--
ALTER TABLE `tbl_suggest_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_productVideo`
--
ALTER TABLE `tbl_suggest_productVideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_product_news`
--
ALTER TABLE `tbl_suggest_product_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_qa`
--
ALTER TABLE `tbl_suggest_qa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_recruitment`
--
ALTER TABLE `tbl_suggest_recruitment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_seller`
--
ALTER TABLE `tbl_suggest_seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_share`
--
ALTER TABLE `tbl_suggest_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_store`
--
ALTER TABLE `tbl_suggest_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_textlink`
--
ALTER TABLE `tbl_suggest_textlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_suggest_video`
--
ALTER TABLE `tbl_suggest_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_supporter`
--
ALTER TABLE `tbl_supporter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `tbl_textlink`
--
ALTER TABLE `tbl_textlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
