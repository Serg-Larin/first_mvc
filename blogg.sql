-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 19 2020 г., 19:34
-- Версия сервера: 5.7.25
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blogg`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'fjakldsdaslkjdn'),
(2, 'qwdqwd'),
(3, 'qwdqwdqw'),
(4, 'qwdqwd');

-- --------------------------------------------------------

--
-- Структура таблицы `comment_sub`
--

CREATE TABLE `comment_sub` (
  `comment_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment_sub`
--

INSERT INTO `comment_sub` (`comment_id`, `email`, `content`, `date`) VALUES
(2, 'жфдыьвжфьывждьфывжд', 'алыотадлфыдлвф', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(4, 'отйцлуоатйцлоаутлцйоу', 'т аь йцтуьт ', 'Wednesday 13th of May 2020'),
(5, 'длфывдалыфдвлаьфыдлвьа', 'фталофытлваотфылвао', 'Wednesday 13th of May 2020'),
(5, 'длфывдалыфдвлаьфыдлвьа', 'фталофытлваотфылвао', 'Wednesday 13th of May 2020'),
(5, 'adasdsdasd', 'asdsads', 'Tuesday 16th of June 2020');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `content`, `image`, `date`) VALUES
(31, 7, 'qwe', 'qweqwe', '/uploads/post_images/31e3ab5dfb4.jpg', 'Tuesday 12th of May 2020'),
(32, 7, 'lqwkeflkqmwelfkqwle', 'qweflqkwemflkqwmeflkmqwelfmkqlwefkm', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(33, 7, 'lqwkeflkqmwelfkqwle', 'qweflqkwemflkqwmeflkmqwelfmkqlwefkm', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(34, 7, 'qwlemflqwemflkqwmeflkqwmelfkqwelfkqwlefk', 'qweflqwkmeflqkwmeflkqwmeflkqwe', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(35, 7, 'qwkemlqwkmerlkqwmelrkqwlekr', 'lqkwermlqwkmelkqwmerkqwelkwqekqwlker', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(36, 7, 'wlekrqlwkerm', 'qlwekrlqwkelqwkerlqkwerlkqwer', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(37, 7, 'lqwkemrlqkwmerlkqwmerlkq', 'qwekrlwkmerlkqwmelmqwerlk', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(38, 7, 'qwerqwlerkmqlwekrmlwkemr', 'qwekrlqkwmerlkmwerkmwqlerkmqwlekrmlwek', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(39, 7, 'qwerlkqwmerlkqwmelrkmqwlerk', 'lkqwerlkqwelrkmqwelrkmwqlekrmlwekrmlqwekr', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(40, 7, 'qwlerklqwkerlqwkemrlqwker', 'qlwkemrlqkwmerlkqmwelrkqwlerkmlwker', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(41, 7, 'lkqwemrlkqmwelrkqwlekrqlwkemrlqw', 'erqwerlkqmelrkmqwlekrmqlwkemrlqwerkqmwelrmqwekrm', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(42, 7, 'qewrlkqmwerlkqwerkmqlwekrm', 'qwkemrlqwkmerlkqwlekrlqwkerlkqwer', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(43, 7, 'qwerlkmqelrkqwmelrkmwelrkqwelkrqwlekr', 'qkwerlqkwemrlkqwelrkqwlekrlqkwerlkqmwelrkqlkwemr', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(44, 7, 'qwkerlqkwmerlkqwmelr', 'qwekrqkwmerlkqwlerkmqwlekrmlqwkemrlqkwmerlk', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(46, 7, 'lkqwelrkmqlwkemrlkwqer', 'qwerlmqwerkmqlwekmrlqwmerlkmqwlermlwekmr', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(47, 7, 'qwenrkjqnwkerjnqwkejrn', 'qwejrkqwjenrkqjwnerkjnekrjqkwjernkqejw', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020'),
(48, 7, 'mqwerkqjwenr', 'qwenrkjqkrjenkrqjwnekrjqnwekrjqwkernqkwjenrkjqw', '/uploads/post_images/default.jpg', 'Thursday 14th of May 2020');

-- --------------------------------------------------------

--
-- Структура таблицы `post_category`
--

CREATE TABLE `post_category` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_category`
--

INSERT INTO `post_category` (`post_id`, `category_id`) VALUES
(9, 3),
(9, 5),
(8, 6),
(8, 8),
(10, 6),
(10, 7),
(23, 6),
(23, 7),
(24, 3),
(24, 5),
(24, 6),
(24, 7),
(24, 8),
(21, 5),
(21, 7),
(22, 5),
(22, 6),
(22, 7),
(7, 5),
(7, 7),
(7, 8),
(25, 6),
(26, 6),
(27, 5),
(31, 2),
(31, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `post_comment`
--

CREATE TABLE `post_comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_comment`
--

INSERT INTO `post_comment` (`id`, `post_id`, `content`, `email`, `date`) VALUES
(4, 31, 'йцоутадлцотуадлойутца', 'йцлоуадлйоцаудл', 'Wednesday 13th of May 2020'),
(5, 31, 'йцоутадлцотуадлойутца', 'йцлоуадлйоцаудл', 'Wednesday 13th of May 2020'),
(6, 31, '', '', 'Thursday 14th of May 2020'),
(11, 31, 'afdsfdsadf', 'qqwefewqf', 'Tuesday 16th of June 2020');

-- --------------------------------------------------------

--
-- Структура таблицы `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(9, 14),
(8, 14),
(8, 15),
(8, 16),
(8, 17),
(8, 18),
(8, 19),
(8, 21),
(10, 14),
(10, 15),
(23, 14),
(23, 15),
(24, 14),
(24, 15),
(24, 16),
(24, 17),
(24, 18),
(24, 19),
(24, 21),
(21, 16),
(22, 14),
(22, 15),
(7, 14),
(7, 15),
(7, 16),
(7, 17),
(7, 18),
(7, 19),
(7, 21),
(25, 15),
(26, 16),
(27, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `type`, `password`, `image`) VALUES
(7, 'admin', 'qwe@qwe.qwe', 2, '76d80224611fc919a5d54f0ff9fba446', '/uploads/user_images/d6ff75ccd52.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
