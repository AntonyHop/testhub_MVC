-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 28 2016 г., 17:28
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `testhub_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`) VALUES
(3, 'Главная', '<h3>​Это главная страница</h3>'),
(4, 'О проєкте', 'Новая страница dssdfsdfdf gsdgsdgsdgsdg іваіваіваіва'),
(7, 'Контакты', 'Новая страница'),
(8, 'Зойдбер', '<p><span id="selectionBoundary_1472896184442_23052543869177722" class="rangySelectionBoundary">&#65279;</span>валрівраолірваріврпріволраоівароівпралоівралдофіволралдфоіварлофівраріфдлвоаріфваіфалоірфварфілораоліа<span id="selectionBoundary_1472896184440_5683526532424017" class="rangySelectionBoundary">&#65279;</span></p><h1>​іваолфіовафілдвоадлоіфвдлжаоіфваіваіав</h1><blockquote><p>івалдофріа</p><p><br/></p></blockquote>');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_test` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `resp_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `id_test`, `question`, `resp_id`) VALUES
(1, 1, 'Что такое интеграл?', 1),
(2, 1, 'Как работает пизда', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `resp`
--

CREATE TABLE IF NOT EXISTS `resp` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_questions` int(255) NOT NULL,
  `resp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `resp`
--

INSERT INTO `resp` (`id`, `id_questions`, `resp`) VALUES
(1, 1, 'Это такая штука'),
(2, 1, 'Такая некому не нужная штука'),
(3, 2, 'Просто и легко');

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_questions` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `name`, `id_questions`) VALUES
(1, 'Тест по матиматике', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
