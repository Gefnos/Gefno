-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 08 2022 г., 08:29
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kursovaya`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bosses`
--

CREATE TABLE `bosses` (
  `id` int(11) NOT NULL,
  `titleFirm` varchar(1111) NOT NULL,
  `legalForm` varchar(1111) NOT NULL COMMENT 'организационно-правовая форма',
  `ownership` varchar(1111) NOT NULL COMMENT 'форма собственности',
  `address` varchar(1111) NOT NULL,
  `telephone` int(255) NOT NULL,
  `persInspector` varchar(1111) NOT NULL COMMENT 'инспектор по кадрам',
  `serviceBuy` varchar(1111) NOT NULL COMMENT 'услуги по найму'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(255) NOT NULL,
  `reg_number` int(255) NOT NULL,
  `surName` varchar(1111) NOT NULL,
  `firstName` varchar(1111) NOT NULL,
  `Patronymic` varchar(1111) NOT NULL,
  `address` varchar(1111) NOT NULL,
  `telephone` int(255) NOT NULL,
  `sex` tinyint(1) NOT NULL COMMENT '1-муж, 0-жен',
  `education` varchar(1111) NOT NULL,
  `paymentReceipt` int(255) NOT NULL,
  `requests` varchar(1111) NOT NULL,
  `minSalary` int(255) NOT NULL,
  `townRegion` varchar(1111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `id` int(255) NOT NULL,
  `profession` varchar(1111) NOT NULL,
  `countWorkPlace` int(255) NOT NULL,
  `salary` int(255) NOT NULL,
  `townRegion` varchar(1111) NOT NULL,
  `restrictSex` varchar(1111) NOT NULL,
  `age` int(255) NOT NULL,
  `education` varchar(1111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(1111) NOT NULL,
  `password` varchar(1111) NOT NULL,
  `isBoss` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bosses`
--
ALTER TABLE `bosses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bosses`
--
ALTER TABLE `bosses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
