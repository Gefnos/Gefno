-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 24 2022 г., 13:06
-- Версия сервера: 10.4.24-MariaDB
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
  `serviceBuy` varchar(1111) NOT NULL COMMENT 'услуги по найму',
  `username` varchar(1111) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `bosses`
--

INSERT INTO `bosses` (`id`, `titleFirm`, `legalForm`, `ownership`, `address`, `telephone`, `persInspector`, `serviceBuy`, `username`) VALUES
(1, 'Магнит', 'ПАО', 'Корпоративная', 'г. Волгоград, р-он Городище', 2147483647, 'Петров Иван Сергеевич', 'хзчтоэто', 'Slava');

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
  `townRegion` varchar(1111) NOT NULL,
  `username` varchar(1111) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `reg_number`, `surName`, `firstName`, `Patronymic`, `address`, `telephone`, `sex`, `education`, `paymentReceipt`, `requests`, `minSalary`, `townRegion`, `username`) VALUES
(1, 5345, 'Иванов', 'Иван', 'Иванович', 'г. Волгоград, р-он Городище', 2147483647, 1, 'Высшее', 9423751, 'Инженер', 80000, 'Городище', 'Slava');

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `id` int(255) NOT NULL,
  `profession` varchar(1111) NOT NULL,
  `countPlace` int(255) NOT NULL,
  `salary` int(255) NOT NULL,
  `townRegion` varchar(1111) NOT NULL,
  `restrictSex` varchar(1111) NOT NULL,
  `age` int(255) NOT NULL,
  `education` varchar(1111) NOT NULL,
  `user` varchar(1111) NOT NULL,
  `isWork` tinyint(1) DEFAULT NULL COMMENT '0- работодатель\r\n1 - работник',
  `completeOffer` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `offers`
--

INSERT INTO `offers` (`id`, `profession`, `countPlace`, `salary`, `townRegion`, `restrictSex`, `age`, `education`, `user`, `isWork`, `completeOffer`) VALUES
(1, 'Программист', 1, 90000, '5 микрорайон', 'Нет', 18, 'Среднее специальное', 'Yuliya', 0, NULL),
(2, 'Web-дизайнер', 1, 44000, 'Центральный', 'Женский', 18, 'Высшее', 'Yuliya', 0, NULL),
(3, 'Инженер', 1, 80000, 'Дзержинский', 'Нет', 26, 'Высшее', 'Slava', 0, NULL),
(4, 'Программист', 1, 120000, 'Городище', 'Нет', 42, 'Среднее специальное', 'Slava', 0, NULL),
(5, 'Преподаватель', 1, 25000, 'Ленина', 'Нет', 27, 'Высшее', 'Dugin', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `receipts`
--

CREATE TABLE `receipts` (
  `id` int(111) NOT NULL,
  `date` date NOT NULL,
  `cost` int(111) NOT NULL,
  `username` varchar(1111) CHARACTER SET utf8 NOT NULL,
  `signedby` varchar(1111) CHARACTER SET utf8 NOT NULL,
  `idReceipt` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `receipts`
--

INSERT INTO `receipts` (`id`, `date`, `cost`, `username`, `signedby`, `idReceipt`) VALUES
(1, '2022-11-21', 2499, 'Slava', 'Лопохова И.Р.', 0),
(3, '2022-11-21', 2499, 'Dugin', 'Лопохова И.Р.', 0),
(4, '2022-11-21', 2499, 'Idris', 'Лопохова И.Р.', 2387039);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(1111) NOT NULL,
  `password` varchar(1111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Yuliya', '$2y$10$x7JZ8jY3d400yQVp66451.aDv/r8ygmRnJLMs6QkVM1VwQgL7Ldie'),
(2, 'Slava', '$2y$10$8muC2YfAYZsEtPkBnFlW/.qVXrySXr.FwPn39PGeosqiInDFTtTWO'),
(3, 'Dugin', '$2y$10$AgvNZO0Btpj0UkQivnO8x.0iIsfOgugUusKusYmfncJ6igEW7vyRq'),
(4, 'Idris', '$2y$10$r8NJCdfDQdnHMSrxL5fk4eKxyZA9X6yCV/kQ10YtNqt5s3uGIYRYC');

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
-- Индексы таблицы `receipts`
--
ALTER TABLE `receipts`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
