-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 12 2024 г., 19:17
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sotrudniki`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dolg`
--

CREATE TABLE `dolg` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `dolg`
--

INSERT INTO `dolg` (`id`, `name`) VALUES
(1, 'Геолог'),
(2, 'Конструктор'),
(3, 'Проектировщик'),
(4, 'Дизайнер'),
(5, 'Разнорабочий');

-- --------------------------------------------------------

--
-- Структура таблицы `sotr`
--

CREATE TABLE `sotr` (
  `id` int(100) NOT NULL,
  `photo` blob NOT NULL,
  `FIO` varchar(256) NOT NULL,
  `dolgid` int(11) NOT NULL,
  `haracter` varchar(256) NOT NULL,
  `year` varchar(256) NOT NULL,
  `guid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `sotr`
--

INSERT INTO `sotr` (`id`, `photo`, `FIO`, `dolgid`, `haracter`, `year`, `guid`) VALUES
(1, 0xefbfbdefbfbdefbfbd, 'Ежиков Еж Олегович', 1, 'Тянется к земле...колится', '2003', 'ce26deb1-5246-4d8c-9b00-fa5878235e68'),
(2, 0xefbfbdefbfbdefbfbd, 'Зайцев Крош Антонович', 2, 'Лютый конструктор, под чем-то', '2003', '95c98797-e3bf-4934-8de0-0bb994f8a20e'),
(3, 0xefbfbdefbfbdefbfbd, 'Оленев Лось Аркадьевич', 3, 'Характер спокойный, не женат', '1955', 'f54e0ec4-59d8-42e7-a43c-5c462ac9ca83'),
(4, 0xefbfbdefbfbdefbfbd, 'Шмидт Пин', 4, 'ЛУШЧИЙ))))', '2000', 'ee7d8500-ce46-46bd-b732-d0925565dace'),
(5, 0xefbfbdefbfbdefbfbd, 'Хрючело Нюша Боровна', 5, 'Рабочая свинья', '2004', '5b9a76d0-bfd6-4622-9fc4-ec2b28543588');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `interests` varchar(256) NOT NULL,
  `vk` varchar(256) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `factor` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `birthday`, `email`, `address`, `gender`, `interests`, `vk`, `blood_type`, `factor`, `password`) VALUES
(1, 'Иванов Иван Иванович', '14.10.2024', 'ivan@mail.ru', 'Волгоград, пр-т Университетский, 100а', 'Муж', 'Рыбалка', 'ссылкаввк', '2', '+', 'Ma*-_ 1'),
(2, 'Иван Иванович Иванов', '2024-10-01', 'ivanovi@mail.ru', 'Россия, Волгоградская область, Волгоград, Университетский 100А', 'Муж', 'Рыбалка', 'https://vk.com/medanatellochka', '2', '+', '$2y$10$99kFv50EFrGa8rt4Jx1Ni.O6HlfgCukttpxQ4cVQ6nORuxGjfvmam'),
(3, 'fgsfdhg dgdfgdsfg', '2006-04-05', 'ivanok@mail.ru', 'Россия, Волгоградская область, Волгоград, Университетский 100А', 'жен', 'нет', 'https://vk.com/me', '3', '+', '$2y$10$LKQbZh1DFUe/S3vszXUpGecXVgegSYiZLk1WZq5ojQsEDpfLn4Vum'),
(4, 'Мак Маков Маковинский', '0988-02-13', 'mak@mail.ru', 'Россия, Волгоградская область, Волгоград, Университетский 100А', 'Муж', 'Крещение', 'https://vk.com/mak', 'на рукаве', '+-', '$2y$10$PhSCRWOx8rclWw0h.SR/ZeMd8pG8LeBVQ5A4hphbOGcuHJCeC/DAG'),
(5, 'ololo', '2000-01-01', 'olololowka@mail.ru', 'Россия, Волгоградская область, Волгоград, Университетский 100А', 'man', 'olollkekkk', 'https://vk.com/kkkolo', '', 'plus', '$2y$10$4Liz8n5fAEq4X0P/xztseO7eC2AOWeTQjImuPjjAy1Oe0kLKAR0X2'),
(6, 'Мич Мич Мич', '2000-01-09', 'mch@mail.ru', 'Россия, Волгорад, пр-т Университетский 100а', 'man', 'Рыбалка', 'https://vk.com/me', '', 'plus', '$2y$10$8PATlQV/NxKfim0s2/8gIejuMqADeg4052XzZ.CybC6gg9ggIxDMG'),
(7, 'Мичик Мичик Мичик', '2000-01-04', 'mch1@mail.ru', 'Россия, Волгоградская область, Волгоград, Университетский 100А', 'man', 'Рыбалка', 'https://vk.com/medanatellochka', '', 'plus', '$2y$10$24s3WullLAwahqlj0lLIyuO48.RBcKfnyI6TgNNdc.MvdqDWxEfwu'),
(8, 'Сашев Саша Сашевич', '2000-01-12', 'sash@mail.ru', 'Россия, Волгоградская область, Волгоград, Университетский 100А', 'man', 'Рыбалка', 'https://vk.com/olololo', '', 'minus', '$2y$10$1XK.AferYG51BAs1TsctFOMoDqUdXW5Afask6/Dn66sdwilLcPh6G');

-- --------------------------------------------------------

--
-- Структура таблицы `visits`
--

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `attempts` int(11) DEFAULT 0,
  `block_time` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `visits`
--

INSERT INTO `visits` (`id`, `email`, `timestamp`, `attempts`, `block_time`) VALUES
(1, 'ivan@mail.ru', 1730570312, 4, 1730570312),
(2, 'ivanok@mail.ru', 0, 4, 1729012712),
(3, 'mak@mail.ru', 1729017458, 1, 0),
(4, 'ivanovi@mail.ru', 1729023662, 0, 0),
(5, 'olololowka@mail.ru', 1729028389, 0, 0),
(6, 'mch@mail.ru', 1729028667, 0, 0),
(7, 'mch1@mail.ru', 1729029597, 0, 0),
(8, 'sash@mail.ru', 1731411057, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dolg`
--
ALTER TABLE `dolg`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sotr`
--
ALTER TABLE `sotr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dolgid` (`dolgid`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sotr`
--
ALTER TABLE `sotr`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sotr`
--
ALTER TABLE `sotr`
  ADD CONSTRAINT `sotr_ibfk_1` FOREIGN KEY (`dolgid`) REFERENCES `dolg` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
