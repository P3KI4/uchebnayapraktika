-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3360
-- Время создания: Дек 01 2022 г., 19:52
-- Версия сервера: 5.7.33
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_contact`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `pn` int(100) DEFAULT NULL,
  `fldName` varchar(50) NOT NULL,
  `fldEmail` varchar(150) NOT NULL,
  `fldPhone` varchar(15) NOT NULL,
  `fldMessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `pn`, `fldName`, `fldEmail`, `fldPhone`, `fldMessage`) VALUES
(146, 1, 'Dallas', 'oconnell.shayna@gmail.com', '88007374371', 'Cool'),
(147, 1, 'Diego ', 'sadwe@gmail.com', '89822231247', 'YAIKES'),
(148, 2, 'Goyette', 'qwetavd@mail.ru', '4956123412', 'WOW!'),
(149, 2, 'Felix', 'fgheqsd@gmail.com', '4956182341', 'YAY!'),
(150, 2, 'Bernard', 'bernard@mail.ru', '49512312412', 'THATS COOL'),
(151, 2, 'Garfield', 'Garfield@mail.ru', '4956123412', 'lasagna'),
(152, 3, 'Andrew', 'Andrew@mail.ru', '4956186923', 'I like it'),
(153, 3, 'Ronaldo', 'Ronaldo@gmail.com', '4956186345', 'CRISTIANO'),
(154, 3, 'Cristiano', 'Cristiano@gmail.com', '4956186852', 'Ronaldo'),
(155, 3, 'Speed', 'Speed@gmail.com', '4956186174', 'I am speed');


--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
