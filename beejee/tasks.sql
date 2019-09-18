-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 18 2019 г., 16:43
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shvyrkov_beejee`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--
-- Создание: Сен 15 2019 г., 12:10
-- Последнее обновление: Сен 18 2019 г., 13:36
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(80) COLLATE utf8_bin NOT NULL,
  `task` text COLLATE utf8_bin NOT NULL,
  `status` varchar(10) COLLATE utf8_bin NOT NULL,
  `edited` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `email`, `task`, `status`, `edited`) VALUES
(1, 'yuri', 'yu@mail.ru', 'Задача тест', 'Not done', 'No'),
(6, 'qqqqqqqqqqq', 'qqq@sssss.kk', 'cccccccccccccccccc', '', ''),
(7, 'dh', 'g@w', 'g', '', ''),
(8, 'yyyuuu', 'qq@cc.ll', 'yyyyyy', '', ''),
(10, 'john', 'j@w.m', '&lt;script&gt;hack();&lt;/script&gt;', '', ''),
(19, 'yy', 'ww@ww', 'xx', 'hh', 'jjjj'),
(20, '', '', 'kkkkkkkkkkkkkkkkkkkkkkkkkkk', 'ok', 'kk'),
(21, '', '', 'kkkkkkkkkkkkkkkkkkkkkkkkkkk', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
