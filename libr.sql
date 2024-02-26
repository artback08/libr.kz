-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 19 2024 г., 16:10
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
-- База данных: `libr`
--

-- --------------------------------------------------------

--
-- Структура таблицы `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `biography` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `years` int(9) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `writers`
--

INSERT INTO `writers` (`id`, `name`, `biography`, `photo`, `years`, `created_date`) VALUES
(49, 'Нормальный писатель', 'Нормальное содержимое биографии, всё достойно', '1708243716.jpg', 18451900, '2024-02-18 14:08:36'),
(50, 'Александр Пушкин', ' (каз. Абай Құнанбайұлы МФА: [ɑbɑj qʊnɑnbɑjʊlə](инф.); родился 29 июля (10 августа) 1845, урочище Жидебай Чингизтау — 23 июня (6 июля) 1904,) — казахский поэт, философ, музыкант, народный просветитель, общественный деятель, основоположник казахской письменной литературы и её первый классик, реформатор культуры в духе сближения с европейской культурой на основе культуры просвещённого ислама. Был одним из первых казахских писателей, кто активно использовал прозу в своих произведениях, расширяя жанровые границы казахской литературы. В своих произведениях Абай Кунанбаев выразил глубокие мысли о национально1', '1708244108.jpg', 19001900, '2024-02-18 14:15:08'),
(51, 'Александр Пушкин', '111111111', '1708247422.jpg', 11111111, '2024-02-18 15:10:22'),
(52, 'Pisatel', 'asdf', '1708248207.jpg', 20002, '2024-02-18 15:23:27'),
(53, 'asdf', 'asdf', '1708249294.jpg', 0, '2024-02-18 15:41:34'),
(54, 'asdf', 'asdf', '1708260978.jpg', 0, '2024-02-18 18:56:18'),
(55, 'asdf', 'asdf', '1708260994.jpg', 0, '2024-02-18 18:56:34'),
(56, '', '', '1708354374.jpg', 0, '2024-02-19 20:52:54');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
