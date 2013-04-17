-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 17 2013 г., 16:46
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `magazin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attribute`
--

CREATE TABLE IF NOT EXISTS `attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `attribute_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attribute_attribute_group1_idx` (`attribute_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `attribute`
--

INSERT INTO `attribute` (`id`, `name`, `type`, `attribute_group_id`) VALUES
(8, 'Платформа', NULL, 5),
(9, 'Тип корпуса', NULL, 5),
(10, 'Производитель', NULL, 5),
(11, 'Объем встроенной памяти', NULL, 5),
(12, 'Кол-во SIM карт', NULL, 5),
(13, 'Производитель', NULL, 7),
(14, 'Емкость аккумулятора', NULL, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_group`
--

CREATE TABLE IF NOT EXISTS `attribute_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `attribute_group`
--

INSERT INTO `attribute_group` (`id`, `name`) VALUES
(5, 'Мобильный телефон'),
(6, 'Аксессуары для мобильных телефонов'),
(7, 'Фото,- видео аппаратура');

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_value`
--

CREATE TABLE IF NOT EXISTS `attribute_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `product_id`, `attribute_id`, `value`) VALUES
(1, 4, 10, 'Xiaomi'),
(2, 4, 8, 'Android 4.1.1'),
(3, 4, 11, '32 Gb'),
(4, 4, 12, '1'),
(5, 4, 14, '2000');

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `desc` text,
  `img_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `name`, `desc`, `img_url`) VALUES
(1, 'Adidas', '', 'download.jpg'),
(2, 'Nike', '', 'DSCF2168.JPG'),
(3, 'Nikon', '', ''),
(4, 'Canon', '', ''),
(5, 'Samsung', '', ''),
(6, 'Sony', '', ''),
(7, 'HTC', '', ''),
(8, 'Nokia', '', ''),
(9, 'Xiaomi', '', ''),
(10, 'LG', '', ''),
(11, 'Apple', '', ''),
(12, 'BlackBerry', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `calluser`
--

CREATE TABLE IF NOT EXISTS `calluser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) NOT NULL,
  `items` text NOT NULL,
  `call_time` varchar(75) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phone` (`phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `calluser`
--

INSERT INTO `calluser` (`id`, `phone`, `items`, `call_time`, `create_time`) VALUES
(2, '+79246829394', '1', 'после 3 утра по МСК', 1365027572),
(3, '321321321', '2', 'jhgj', 1365141150),
(4, '654654654', '4', '', 1365556862);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `root` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` smallint(6) NOT NULL,
  `title` varchar(150) NOT NULL,
  `memo` text NOT NULL,
  `active` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `root` (`root`,`lft`,`rgt`,`level`,`active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `root`, `lft`, `rgt`, `level`, `title`, `memo`, `active`) VALUES
(17, 17, 1, 16, 1, 'Телефоны, связь', '', 1),
(18, 18, 1, 24, 1, 'Ноутбуки, компьютеры', '', 1),
(19, 19, 1, 14, 1, 'Фото - и видеокамеры', '', 1),
(20, 20, 1, 14, 1, 'Аудио- и видеотехника', '', 1),
(21, 21, 1, 10, 1, 'GPS-навигаторы, авто аксессуары', '', 1),
(22, 22, 1, 6, 1, 'Книги', '', 1),
(23, 23, 1, 12, 1, 'Игры, развлечения', '', 1),
(24, 17, 2, 3, 2, 'Телефоны Apple', '', 1),
(25, 17, 4, 5, 2, 'Смартфоны и коммуникаторы', '', 1),
(26, 17, 6, 7, 2, 'Аксессуары для Apple', '', 1),
(27, 17, 8, 9, 2, 'Аксессуары для телефонов', '', 1),
(28, 17, 10, 11, 2, 'Карты памяти', '', 1),
(29, 17, 12, 13, 2, 'DECT-телефоны', '', 1),
(30, 17, 14, 15, 2, 'Рации', '<p><br></p>', 1),
(31, 18, 2, 3, 2, 'Apple iPad', '', 1),
(32, 18, 4, 5, 2, 'Планшеты', '', 1),
(33, 18, 6, 7, 2, 'Ноутбуки', '', 1),
(34, 18, 8, 9, 2, 'Моноблоки', '', 1),
(35, 18, 10, 11, 2, 'Аксессуары для планшетов', '', 1),
(36, 18, 12, 13, 2, 'Графические планшеты', '', 1),
(37, 18, 14, 15, 2, 'Очки для компьютера', '', 1),
(38, 18, 16, 17, 2, 'Мониторы', '', 1),
(39, 18, 18, 19, 2, 'МФУ, принтеры, сканеры', '', 1),
(40, 18, 20, 21, 2, 'Аксессуары', '', 1),
(41, 18, 22, 23, 2, 'Носители информации', '', 1),
(42, 19, 2, 3, 2, 'Фотоаппараты', '', 1),
(43, 19, 4, 5, 2, 'Видеокамеры', '', 1),
(44, 19, 6, 7, 2, 'Цифровые фоторамки', '', 1),
(45, 19, 8, 9, 2, 'Бинокли, телескопы', '', 1),
(46, 19, 10, 11, 2, 'Аксессуары', '', 1),
(47, 19, 12, 13, 2, 'Карты памяти', '', 1),
(48, 20, 2, 3, 2, 'MP3- плееры и iPod', '', 1),
(49, 20, 4, 5, 2, 'Наушники', '', 1),
(50, 20, 6, 7, 2, 'Чехлы', '', 1),
(51, 20, 8, 9, 2, 'Безопасность и видеонаблюдение', '', 1),
(52, 20, 10, 11, 2, 'Диктофоны', '', 1),
(53, 20, 12, 13, 2, 'Аксессуары', '', 1),
(54, 21, 2, 3, 2, 'GPS- навигаторы', '', 1),
(55, 21, 4, 5, 2, 'Видеорегистраторы', '', 1),
(56, 21, 6, 7, 2, 'Радар- детекторы', '', 1),
(57, 21, 8, 9, 2, 'Авто- аксессуары', '', 1),
(58, 22, 2, 3, 2, 'Электронные книги', '', 1),
(59, 22, 4, 5, 2, 'Аксессуары', '', 1),
(60, 23, 2, 3, 2, 'Часы', '', 1),
(61, 23, 4, 5, 2, 'Игровые приставки', '', 1),
(62, 23, 6, 7, 2, 'Игровые аксессуары', '', 1),
(63, 23, 8, 9, 2, 'Погодные станции', '', 1),
(64, 23, 10, 11, 2, 'Распродажа игрушек', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(170) NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `delivery`
--

INSERT INTO `delivery` (`id`, `title`, `desc`, `price`) VALUES
(1, 'Почта РФ', 'бла бла бла .. почта РФ', 350),
(2, 'EMS', 'тут какое то описание про доставку и т.д. и т.п.', 570),
(3, 'Самовывоз', 'ышвоах089гц 04гое0укг=0й34г фыашволпэзвачп олфъ0у9п=ф9укгпф9ук пф90ывп0амяхчсщзмчс 0- 0- 98- 908 -9 \\-0 9\\-яч0ь9 =с0шплхщуфшоге=30егй=3480егпаи', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `delivery_addr`
--

CREATE TABLE IF NOT EXISTS `delivery_addr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `indx` int(11) NOT NULL,
  `region` varchar(75) NOT NULL,
  `city` varchar(75) NOT NULL,
  `adds` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `icq` int(13) NOT NULL,
  `skype` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `delivery_addr`
--

INSERT INTO `delivery_addr` (`id`, `user_id`, `indx`, `region`, `city`, `adds`, `phone`, `icq`, `skype`) VALUES
(1, 1, 676450, 'Амурская область', 'Свободный', 'пер.Прокатный д-39 кв-1', '+79243432764', 466442211, 'qwertyuuu'),
(2, 2, 676450, 'Амурская область', 'Свободный', 'Прокатный д-39 кв-1', '79243432764', 466442211, '');

-- --------------------------------------------------------

--
-- Структура таблицы `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `adres` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `guest`
--

INSERT INTO `guest` (`id`, `fio`, `phone`, `adres`) VALUES
(1, '43623f625g 425 45747624', '5345555', '3b65tygfg'),
(2, '6g6w45f645', '645645645', '6456456456');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_key` int(17) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `delivery` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `done` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_key` (`order_key`,`user_id`,`guest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `order_key`, `user_id`, `guest_id`, `create_time`, `status`, `delivery`, `pay`, `done`) VALUES
(1, 104167416, 0, 1, 1366176916, 0, 3, 70000, 0),
(2, 2042687, 0, 2, 1366177046, 0, 1, 15850, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `count`, `price`) VALUES
(1, 1, 3, 1, 70000),
(2, 2, 5, 1, 15000),
(3, 2, 8, 1, 500);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `active` int(5) DEFAULT NULL,
  `desc` text,
  `product_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `active` (`active`),
  KEY `fk_product_product_type1_idx` (`product_type_id`),
  KEY `fk_product_brand1_idx` (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `category_id`, `quantity`, `price`, `brand_id`, `active`, `desc`, `product_type_id`) VALUES
(1, 'Nikon D90 body', 42, 50, 23000, 3, 1, '<p>Полу профессиональная, зеркальная фото камера (без объектива)</p>', 7),
(2, 'Canon EOS D450', 42, 3, 10000, 4, 1, '<p>Зеркальный фотоаппарат начального уровня</p>', 7),
(3, 'Canon 5D Mark2', 42, 2, 70000, 4, 1, '<p>Профессиональная зеркальная фото камера</p>', 7),
(4, 'Xiaomi Mi2 32Gb', 25, 15, 14000, 9, 1, '<p>Отличный китайский телефон ахринетительного качества! По мощности превосходит SGS3</p><p><p>Телефоны экстренных служб города:</p><p><ul><li><span style="line-height: 1.45em;">30 августа 2010 - Редактор</span><br></li><li><span style="line-height: 1.45em;">Единая служба спасения 01</span><br></li><li><span style="line-height: 1.45em;">Билайн, Мегафон, МТС010,112</span><br></li><li><span style="line-height: 1.45em;">Милиция02</span><br></li><li><span style="line-height: 1.45em;">Билайн, Мегафон, МТС020</span><br></li><li><span style="line-height: 1.45em;">Скорая медицинская помощь03</span><br></li><li><span style="line-height: 1.45em;">Билайн, Мегафон, МТС030</span><br></li><li><span style="line-height: 1.45em;">Телефоны доверия:&nbsp;</span><br></li><li><span style="line-height: 1.45em;">ГАИ30666</span><br></li><li><span style="line-height: 1.45em;">ФСБ55635</span><br></li><li><span style="line-height: 1.45em;">Налоговая инспекция54402</span><br></li><li><span style="line-height: 1.45em;">Федеральная служба по контролю за оборотом наркотиков54325</span><br></li><li><span style="line-height: 1.45em;">Аварийные и диспетчерские службы города51333</span><br></li><li><span style="line-height: 1.45em;">Энергоресурс50555</span><br></li><li><span style="line-height: 1.45em;">Водоканал30424</span><br></li><li><span style="line-height: 1.45em;">Оперативный дежурный&nbsp;</span><br></li><li><span style="line-height: 1.45em;">по ГОиЧС51508, 51509</span><br></li><li><span style="line-height: 1.45em;">Свободныйгаз - АНК04</span><br></li><li><span style="line-height: 1.45em;">Билайн, Мегафон, МТС040</span><br></li><li><span style="line-height: 1.45em;">Справочные: Бизнес - Справка31111</span><br></li><li><span style="line-height: 1.45em;">Телефонов Дальсвязь809</span><br></li><li><span style="line-height: 1.45em;">Приём телеграмм по телефону8066</span><br></li><li><span style="line-height: 1.45em;">Междугородних переговоров812</span><br></li><li><span style="line-height: 1.45em;">Кодов городов8070</span><br></li><li><span style="line-height: 1.45em;">Единая справочная служба по DSL и Интернету Дальсвязь8069</span><br></li><li><span style="line-height: 1.45em;">ЖД Вокзала64914</span><br></li><li><span style="line-height: 1.45em;">Автовокзал33699</span><br></li><li><span style="line-height: 1.45em;">Детская поликлиника30558</span><br></li><li><span style="line-height: 1.45em;">Травмпункт57375</span><br></li><li><span style="line-height: 1.45em;">Городская больница 59739</span><br></li></ul></p><br></p>\r\n', 5),
(5, 'Samsung Galaxy S3', 25, 15, 15000, 5, 1, '<p>Мобильный телефон на платформе Android 4.1.1</p>', 5),
(6, 'НАушники для айфона', 26, 13, 1500, 11, 1, '', 6),
(7, 'Зарядное устройство', 26, 14, 1500, 11, 1, '', 6),
(8, 'Чехол силиконовый', 26, 500, 500, NULL, 1, '', 6),
(9, 'Чехол кожаный', 26, 2000, 800, NULL, 1, '', 6),
(10, 'microSD 16Gb', 28, 1000, 300, NULL, 1, '', 6),
(11, 'microSD 32Gb', 28, 1000, 500, NULL, 1, '', 6),
(12, 'Батарея Nikon', 46, 42, 1500, NULL, 1, '', 6),
(13, 'Чехол для Nikon D90', 46, 32, 800, NULL, 1, '', 6),
(14, 'Видеорегистратор 2000', 55, 10, 1000, NULL, 1, '', 6),
(15, 'Видеорегистратор 3000', 55, 52, 4522, NULL, 1, '', 6),
(16, 'Видеорегистратор 4000', 55, 78, 5435, NULL, 1, '', 6),
(17, 'Видеорегистратор кк500', 55, 50, 5000, NULL, 1, '', 6),
(18, 'Крепление для телефона', 57, 100, 200, NULL, 1, '', 6),
(19, 'Крепление для телефона уккк444', 57, 60, 600, NULL, 1, '', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `product_img`
--

CREATE TABLE IF NOT EXISTS `product_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `img_file` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`,`sort`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `product_img`
--

INSERT INTO `product_img` (`id`, `product_id`, `img_file`, `sort`) VALUES
(1, 1, '51468bf49e1fd.jpg', 1),
(2, 1, '51468c014c428.jpg', 2),
(3, 1, '51468c082cf41.jpg', 3),
(4, 1, '51468c0daf006.jpg', 4),
(5, 2, '51469657b786f.jpg', 1),
(6, 2, '5146965f1c7e8.jpg', 2),
(7, 2, '514696646c3cb.jpg', 3),
(8, 3, '51469a051da1a.jpg', 1),
(9, 3, '51469a0b6f82f.jpg', 2),
(10, 3, '51469a0f905c3.jpg', 3),
(11, 4, '51469c8b2dea4.jpg', 1),
(12, 4, '51469c90849eb.jpg', 2),
(13, 4, '51469c9545ead.jpg', 3),
(14, 4, '51469c9aee820.jpg', 4),
(15, 5, '5146a1203e397.jpg', 1),
(16, 5, '5146a124b8d3f.jpg', 2),
(17, 5, '5146a1286a60c.jpg', 3),
(18, 5, '5146a12d0527c.jpg', 4),
(19, 4, '514a51e093b0f.jpg', 5),
(20, 4, '514a51e859f48.jpg', 6),
(21, 4, '514a51f5d6962.jpg', 7),
(22, 4, '514a52395f8e4.jpg', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `product_type`
--

INSERT INTO `product_type` (`id`, `title`) VALUES
(1, 'Мобильные устройства'),
(2, 'Персональный компьютер'),
(3, 'Одежда'),
(4, 'Фото, -видео аппаратура, и аксессуары'),
(5, 'Аксессуары к мобильным телефонам');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`) VALUES
(1, 'Петров', 'Павел'),
(2, 'Demo123', 'Demo333'),
(3, 'Petrov', 'Pavel');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'svb_maddog@bk.ru', '9a24eff8c15a6a141ece27eb6947da0f', '2012-12-03 12:02:49', '2013-04-15 04:22:01', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '2012-12-03 12:02:49', '2013-03-28 02:00:16', 0, 1),
(3, 'demo2', '1066726e7160bd9c987c9968e0cc275a', 'svb.defence@gmail.com', '90676ffb57f3f1bce4e64a0c5694125b', '2013-02-21 14:17:45', '0000-00-00 00:00:00', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
