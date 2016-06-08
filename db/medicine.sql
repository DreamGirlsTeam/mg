-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Чрв 08 2016 р., 21:36
-- Версія сервера: 5.6.26
-- Версія PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `medicine`
--

-- --------------------------------------------------------

--
-- Структура таблиці `actors`
--

CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `actors`
--

INSERT INTO `actors` (`id`, `role`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(14, 2),
(15, 2),
(17, 2),
(18, 2),
(20, 2),
(22, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 5),
(42, 5),
(43, 5),
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(50, 5),
(51, 5),
(52, 5),
(53, 5),
(54, 5),
(55, 5),
(56, 5),
(57, 5),
(58, 5),
(59, 5),
(60, 5),
(61, 5),
(62, 5),
(63, 5),
(64, 5),
(65, 5),
(66, 5),
(67, 2),
(68, 2),
(69, 5),
(70, 5),
(71, 5),
(72, 5),
(73, 5),
(74, 2),
(75, 5),
(76, 2),
(77, 5),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 5);

-- --------------------------------------------------------

--
-- Структура таблиці `analysis`
--

CREATE TABLE IF NOT EXISTS `analysis` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `analysis`
--

INSERT INTO `analysis` (`id`, `name`) VALUES
(3, 'Біохімія'),
(1, 'Вірусні гепатити'),
(4, 'Гормональна панель'),
(2, 'Загальний аналіз крові'),
(5, 'Загальноклінічні обстеження');

-- --------------------------------------------------------

--
-- Структура таблиці `analys_res`
--

CREATE TABLE IF NOT EXISTS `analys_res` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `beginTime` time NOT NULL,
  `patName` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `docId` int(11) NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `actorId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `actorId`) VALUES
(1, 'admin', 'admin', 1),
(3, 'lab_1', 'lab_1', 3),
(4, 'rec_1', 'rec_1', 4);

-- --------------------------------------------------------

--
-- Структура таблиці `conf_person`
--

CREATE TABLE IF NOT EXISTS `conf_person` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `patronymic` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `actorId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `conf_person`
--

INSERT INTO `conf_person` (`id`, `first_name`, `last_name`, `patronymic`, `phone_number`, `actorId`) VALUES
(2, 'Роман', 'Капорін', NULL, '0984176613', 60),
(3, 'Олександра', 'Ткаліч', 'Едуардівна', '0937263434', 61),
(4, 'Роман', 'Капорін', 'Михайлович', '0501234567', 66),
(5, 'Катерина', 'Завадська', 'Михайлівна', '0691122334', 69),
(6, 'Павел', 'Разівенко', 'Михайлович', '0987650173', 75);

-- --------------------------------------------------------

--
-- Структура таблиці `districs`
--

CREATE TABLE IF NOT EXISTS `districs` (
  `id` int(11) NOT NULL,
  `name` varchar(14) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `districs`
--

INSERT INTO `districs` (`id`, `name`) VALUES
(1, 'Голос?ївський'),
(8, 'Дарницький'),
(9, 'Деснянський'),
(10, 'Дн?провський'),
(2, 'Оболонський'),
(3, 'Печерський'),
(4, 'Под?льский'),
(5, 'Святошинський'),
(6, 'Солом''янський'),
(7, 'Шевченк?вський');

-- --------------------------------------------------------

--
-- Структура таблиці `illnesses`
--

CREATE TABLE IF NOT EXISTS `illnesses` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `illnesses`
--

INSERT INTO `illnesses` (`id`, `name`) VALUES
(1, 'Авітаміноз'),
(28, 'Анабеоз'),
(65, 'Ангіна'),
(2, 'Ангіома'),
(7, 'Анурія'),
(3, 'Артрит'),
(6, 'Артроз'),
(4, 'Астма'),
(5, 'Атеросклероз'),
(8, 'Базедова хвороба'),
(9, 'Біла гарячка'),
(10, 'Більмо'),
(11, 'Ботулізм'),
(12, 'Бронхіт'),
(13, 'Бронхоспазм'),
(14, 'Бруцельоз'),
(15, 'Виразка шлунка'),
(16, 'Віспа'),
(17, 'Гайморит'),
(18, 'Геморой'),
(20, 'Гепатит'),
(19, 'Гкмохроматоз'),
(21, 'Гонорея'),
(22, 'Грип'),
(29, 'Депресія'),
(24, 'Дизентерія'),
(25, 'Дифтерія'),
(23, 'Діабет'),
(26, 'Запалення легень'),
(27, 'Застуда'),
(30, 'Карієс'),
(32, 'Кір'),
(31, 'Коліт'),
(33, 'Лейкоз'),
(34, 'Малярія'),
(35, 'Маразм'),
(36, 'Мастит'),
(37, 'Мастопатія'),
(66, 'Мігрень'),
(38, 'Набряк легень'),
(39, 'Наркоманія'),
(40, 'Орнітоз'),
(43, 'Остеохондроз'),
(41, 'Отит'),
(42, 'Отруєння'),
(44, 'Педикульоз'),
(45, 'Поліомієліт'),
(46, 'Правець'),
(47, 'Проказа'),
(48, 'Променева хвороба'),
(49, 'Псоріаз'),
(51, 'Радикуліт'),
(50, 'Рак'),
(56, 'Саркома'),
(53, 'Синусит'),
(52, 'Сифіліс'),
(54, 'Сказ'),
(57, 'Сколіоз'),
(55, 'Сухоти'),
(58, 'Тиф'),
(59, 'Туберкульоз'),
(60, 'Холера'),
(61, 'Цинга'),
(62, 'Чума'),
(63, 'Шизофренія'),
(64, 'Ящур');

-- --------------------------------------------------------

--
-- Структура таблиці `ill_to_medicine`
--

CREATE TABLE IF NOT EXISTS `ill_to_medicine` (
  `ill_id` int(11) NOT NULL,
  `medic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `ill_to_medicine`
--

INSERT INTO `ill_to_medicine` (`ill_id`, `medic_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(2, 4),
(3, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 9),
(4, 23),
(4, 24),
(4, 25),
(5, 26),
(5, 27),
(6, 3),
(6, 28),
(7, 33),
(7, 35),
(9, 5),
(10, 2),
(10, 3),
(27, 4),
(27, 7),
(28, 1),
(28, 4),
(28, 8),
(29, 10),
(65, 7),
(65, 27),
(66, 7);

-- --------------------------------------------------------

--
-- Структура таблиці `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `jobs`
--

INSERT INTO `jobs` (`id`, `name`) VALUES
(4, 'Бізнес'),
(1, 'ІТ сфера'),
(2, 'Металург?я'),
(5, 'Робочий'),
(3, 'Управл?ння');

-- --------------------------------------------------------

--
-- Структура таблиці `medical_staff`
--

CREATE TABLE IF NOT EXISTS `medical_staff` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `patronymic` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `specialization` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `actorId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `medical_staff`
--

INSERT INTO `medical_staff` (`id`, `first_name`, `last_name`, `patronymic`, `date_of_birth`, `specialization`, `phone_number`, `email`, `actorId`) VALUES
(27, 'Ельвіра', 'Ситенок', 'Іраклівна', '1991-12-02', 'Адміністратор на рецепції', '', 'elvir.sytenok@mail.com', 4),
(32, 'Ольга', 'Кравченко', NULL, '2016-05-04', 'Лаборант', NULL, 'laborant@example.com', 3);

-- --------------------------------------------------------

--
-- Структура таблиці `medicines`
--

CREATE TABLE IF NOT EXISTS `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `description`) VALUES
(1, 'Спазмалгон', 'Від усього, що болить'),
(2, 'Відусьогон', 'Препарат який допомагає від усього, особливо від грипу.'),
(3, 'Грипостат', 'Цей препарат також допоможе вам від грипу'),
(4, 'Цитрамон', 'Від головного болю'),
(5, 'Активований вуголь', 'Якщо у вас погано зі шлунком'),
(6, 'Зострикс', 'Мазь'),
(7, 'Но-шпа', 'Від болю'),
(8, 'Цистин', 'Анабеоз'),
(9, 'Ліліопіт', 'Артрит'),
(10, 'Шоколад', 'Депресія'),
(23, 'Беклофорте', 'Ингаляционно, 500 мкг/сут в несколько приемов (при бронхиальной астме легкой степени тяжести), 750–1000 мкг/сут (при средней степени тяжести), до 1000–2000 мкг/сут (в тяжелых случаях)'),
(24, 'Стеринеб Саламол', 'Ингаляционно, с помощью небулайзера. Взрослым и детям старше 18 мес: по 2,5 мг (2,5 мл) 3–4 раза в сутки. При необходимости доза может быть увеличена до 5 мг (5 мл) 3–4 раза в сутки.'),
(25, 'Ипрамол Стери-Неб', 'Інгаляційно за допомогою інгаляторів-небулайзерів'),
(26, 'ТОРВАКАРД', 'див.інструкцію'),
(27, 'Розукард', 'Таблетки 10 мг: продолговатые, двояковыпуклые таблетки с риской, покрытые плёночной оболочкой светло-розового цвета.'),
(28, 'Хондропротектори', 'постійно приймати від 2 до 8 тижнів'),
(33, 'Фуросемід', 'Вживати по 40 мг 1 раз на день (вранці). При необхідності добову дозу можна збільшити до 80-160 мг'),
(35, 'Хурургічне втручання', 'Перевести на апарат штучної нирки');

-- --------------------------------------------------------

--
-- Структура таблиці `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `work` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=863 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `patient`
--

INSERT INTO `patient` (`id`, `number`, `work`) VALUES
(848, 0, 2),
(849, 1, 4),
(850, 2, 5),
(851, 3, 1),
(852, 4, 3),
(853, 5, 5),
(854, 6, 3),
(855, 7, 2),
(856, 8, 3),
(857, 9, 5),
(858, 10, 2),
(859, 11, 4),
(860, 12, 3),
(861, 13, 3),
(862, 14, 2);

-- --------------------------------------------------------

--
-- Структура таблиці `reg_info`
--

CREATE TABLE IF NOT EXISTS `reg_info` (
  `id` int(11) NOT NULL,
  `job` int(11) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `patronymic` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `passport` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `actorId` int(11) DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `symptoms`
--

CREATE TABLE IF NOT EXISTS `symptoms` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `symptoms`
--

INSERT INTO `symptoms` (`id`, `name`) VALUES
(35, 'Безсоння'),
(19, 'Біль у суглобах'),
(17, 'Блювання'),
(8, 'Випадіння волосся'),
(15, 'Відсутній апетит'),
(12, 'Відчуття тяжкості'),
(1, 'Втома'),
(30, 'Гикавка'),
(32, 'Головний біль'),
(21, 'Деформаця суглобів'),
(5, 'Дратівливість'),
(10, 'Епілептичні напади'),
(24, 'Задишка'),
(34, 'Запаморочення'),
(6, 'Знижений імунітет'),
(27, 'Кульгавість'),
(2, 'Млявість'),
(22, 'Набряклість суглоба'),
(25, 'Нестача повітря'),
(7, 'Неуважність'),
(28, 'Ниркові кольки'),
(16, 'Нудота'),
(9, 'Погіршення зору'),
(4, 'Погіршення стану шкіри'),
(13, 'Порушення координації'),
(14, 'Порушення мови'),
(29, 'Порушення функцій шлунково-киш'),
(26, 'Похолодання кінцівок'),
(18, 'Пронос'),
(3, 'Сонливість'),
(33, 'Спрага'),
(31, 'Судоми'),
(23, 'Утрудненість дихання'),
(20, 'Хрускіт в суглобі'),
(11, 'Червоні плями');

-- --------------------------------------------------------

--
-- Структура таблиці `sym_to_ill`
--

CREATE TABLE IF NOT EXISTS `sym_to_ill` (
  `ill_id` int(11) NOT NULL,
  `sym_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `sym_to_ill`
--

INSERT INTO `sym_to_ill` (`ill_id`, `sym_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 32),
(3, 19),
(3, 21),
(3, 22),
(4, 23),
(4, 24),
(4, 25),
(5, 2),
(5, 3),
(5, 5),
(5, 26),
(5, 34),
(5, 35),
(6, 19),
(6, 20),
(6, 21),
(6, 22),
(7, 2),
(7, 3),
(7, 28),
(7, 29),
(7, 30),
(7, 32),
(7, 33),
(65, 23),
(65, 32),
(66, 23),
(66, 24);

-- --------------------------------------------------------

--
-- Структура таблиці `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `id` int(11) NOT NULL,
  `beginTime` time NOT NULL,
  `endTime` time NOT NULL,
  `actorId` int(11) NOT NULL,
  `averTime` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `timetable`
--

INSERT INTO `timetable` (`id`, `beginTime`, `endTime`, `actorId`, `averTime`) VALUES
(4, '09:00:00', '14:00:00', 76, 60),
(8, '13:00:00', '17:00:00', 2, 30);

-- --------------------------------------------------------

--
-- Структура таблиці `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `docId` int(11) DEFAULT NULL,
  `patId` int(11) DEFAULT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `illnesses` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `visits`
--

INSERT INTO `visits` (`id`, `date`, `comment`, `docId`, `patId`, `type`, `illnesses`) VALUES
(5, '2016-05-09 19:30:46', 'Усе гаразд!', 2, 71, 'Медогляд', ''),
(8, '2016-05-09 19:55:01', 'Усе добре, йди додому', 2, 66, 'Консультація', ''),
(9, '2016-05-09 19:56:14', 'Усе нормально, йди додому', 2, 66, 'Консультація', ''),
(10, '2016-05-09 21:13:03', 'Досить до мене ходити', 2, 66, 'Медогляд', ''),
(11, '2016-05-10 08:35:21', 'Хворий, не до мене', 3, 66, 'Довідка', ''),
(12, '2016-05-21 18:38:36', 'ок', 2, 66, 'За скаргою', 'Мігрень'),
(13, '2016-05-21 18:41:39', 'Має бути здоровою', 2, 66, 'За скаргою', 'Отруєння'),
(14, '2016-05-21 18:57:39', 'Тест, але має бути все ок', 2, 66, 'За скаргою', 'Мігрень'),
(15, '2016-05-21 22:00:23', 'Це точно щось дивне', 2, 66, 'За скаргою', 'Щось дивне'),
(29, '2016-05-21 22:51:56', 'Все буде добре', 2, 66, 'За скаргою', 'Рак'),
(30, '2016-05-21 23:01:38', 'Сподіваємося на краще', 2, 66, 'За скаргою', 'Анабеоз'),
(31, '2016-05-21 23:02:28', 'Все ок', 2, 66, 'За скаргою', 'Анабеоз'),
(32, '2016-05-22 15:58:10', 'ліліопіт', 2, 66, 'За скаргою', 'Артрит'),
(33, '2016-05-22 16:45:15', 'Буде здоровою', 2, 66, 'За скаргою', 'Депресія'),
(34, '2016-05-26 13:33:57', 'Все норм', 2, 66, 'За скаргою', 'Ангіома'),
(35, '2016-05-27 10:39:25', 'Буде жити', 2, 65, 'За скаргою', 'Астма'),
(36, '2016-05-27 13:13:32', 'Довідка була видана', 2, 65, 'Довідка', NULL),
(37, '2016-05-27 13:14:08', 'Все ок', 2, 65, 'За скаргою', 'Астма'),
(38, '2016-05-27 13:15:29', 'Буде жити', 2, 65, 'За скаргою', 'Ангіна'),
(39, '2016-05-27 14:10:00', 'ок', 81, 65, 'За скаргою', 'Астма'),
(40, '2016-05-31 10:46:12', 'Буде здоров', 2, 66, 'За скаргою', 'Мігрень');

-- --------------------------------------------------------

--
-- Структура таблиці `visit_to_ill`
--

CREATE TABLE IF NOT EXISTS `visit_to_ill` (
  `ill_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `visit_to_medic`
--

CREATE TABLE IF NOT EXISTS `visit_to_medic` (
  `medic_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `visit_to_medic`
--

INSERT INTO `visit_to_medic` (`medic_id`, `visit_id`) VALUES
(1, 14),
(1, 30),
(1, 34),
(4, 14),
(4, 30),
(4, 31),
(5, 13),
(7, 32),
(7, 38),
(7, 40),
(8, 30),
(9, 32),
(9, 39),
(10, 33),
(24, 35),
(24, 39),
(25, 35),
(25, 37),
(25, 39),
(27, 38);

-- --------------------------------------------------------

--
-- Структура таблиці `visit_types`
--

CREATE TABLE IF NOT EXISTS `visit_types` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `visit_types`
--

INSERT INTO `visit_types` (`id`, `name`) VALUES
(3, 'Довідка'),
(2, 'За скаргою'),
(4, 'Консультація'),
(5, 'Медогляд'),
(1, 'Плановий');

-- --------------------------------------------------------

--
-- Структура таблиці `works`
--

CREATE TABLE IF NOT EXISTS `works` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `works`
--

INSERT INTO `works` (`id`, `name`, `duration`) VALUES
(1, 'Консультація', 30),
(2, 'Плановий', 15),
(3, 'Довідка', 10),
(4, 'За скаргою', 60),
(5, 'Медогляд', 30);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `analysis`
--
ALTER TABLE `analysis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_33C7305E237E06` (`name`);

--
-- Індекси таблиці `analys_res`
--
ALTER TABLE `analys_res`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F8DEB059F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_F8DEB0596DCBA9B2` (`actorId`);

--
-- Індекси таблиці `conf_person`
--
ALTER TABLE `conf_person`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `districs`
--
ALTER TABLE `districs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_AFA5C1245E237E06` (`name`);

--
-- Індекси таблиці `illnesses`
--
ALTER TABLE `illnesses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_400C403C5E237E06` (`name`);

--
-- Індекси таблиці `ill_to_medicine`
--
ALTER TABLE `ill_to_medicine`
  ADD PRIMARY KEY (`medic_id`,`ill_id`),
  ADD KEY `IDX_61F9EC782A0B31E4` (`ill_id`),
  ADD KEY `IDX_61F9EC78409615FE` (`medic_id`);

--
-- Індекси таблиці `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A8936DC55E237E06` (`name`);

--
-- Індекси таблиці `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7788A8C2E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_7788A8C26DCBA9B2` (`actorId`);

--
-- Індекси таблиці `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_885F06BC5E237E06` (`name`);

--
-- Індекси таблиці `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1ADAD7EB96901F54` (`number`);

--
-- Індекси таблиці `reg_info`
--
ALTER TABLE `reg_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_17A6A375444F97DD` (`phone`),
  ADD UNIQUE KEY `UNIQ_17A6A375B5A26E08` (`passport`),
  ADD UNIQUE KEY `UNIQ_17A6A3756DCBA9B2` (`actorId`),
  ADD KEY `IDX_17A6A375FBD8E0F8` (`job`),
  ADD KEY `IDX_17A6A37531C15487` (`district`);

--
-- Індекси таблиці `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_CD3CAE135E237E06` (`name`);

--
-- Індекси таблиці `sym_to_ill`
--
ALTER TABLE `sym_to_ill`
  ADD PRIMARY KEY (`sym_id`,`ill_id`),
  ADD KEY `IDX_EE72469F2A0B31E4` (`ill_id`),
  ADD KEY `IDX_EE72469F98FA6F8E` (`sym_id`);

--
-- Індекси таблиці `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_6B1F6706DCBA9B2` (`actorId`);

--
-- Індекси таблиці `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_444839EAE820E5B1` (`docId`),
  ADD KEY `IDX_444839EA84F61635` (`patId`);

--
-- Індекси таблиці `visit_to_ill`
--
ALTER TABLE `visit_to_ill`
  ADD PRIMARY KEY (`ill_id`,`visit_id`),
  ADD KEY `IDX_59F70C5E2A0B31E4` (`ill_id`),
  ADD KEY `IDX_59F70C5E75FA0FF2` (`visit_id`);

--
-- Індекси таблиці `visit_to_medic`
--
ALTER TABLE `visit_to_medic`
  ADD PRIMARY KEY (`visit_id`,`medic_id`),
  ADD KEY `IDX_8A482F07409615FE` (`medic_id`),
  ADD KEY `IDX_8A482F0775FA0FF2` (`visit_id`);

--
-- Індекси таблиці `visit_types`
--
ALTER TABLE `visit_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2C8572515E237E06` (`name`);

--
-- Індекси таблиці `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F6E502435E237E06` (`name`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT для таблиці `analysis`
--
ALTER TABLE `analysis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `analys_res`
--
ALTER TABLE `analys_res`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблиці `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблиці `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблиці `conf_person`
--
ALTER TABLE `conf_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `districs`
--
ALTER TABLE `districs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблиці `illnesses`
--
ALTER TABLE `illnesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT для таблиці `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `medical_staff`
--
ALTER TABLE `medical_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT для таблиці `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблиці `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=863;
--
-- AUTO_INCREMENT для таблиці `reg_info`
--
ALTER TABLE `reg_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблиці `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблиці `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблиці `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблиці `visit_types`
--
ALTER TABLE `visit_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `FK_F8DEB0596DCBA9B2` FOREIGN KEY (`actorId`) REFERENCES `actors` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `ill_to_medicine`
--
ALTER TABLE `ill_to_medicine`
  ADD CONSTRAINT `FK_61F9EC782A0B31E4` FOREIGN KEY (`ill_id`) REFERENCES `illnesses` (`id`),
  ADD CONSTRAINT `FK_61F9EC78409615FE` FOREIGN KEY (`medic_id`) REFERENCES `medicines` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD CONSTRAINT `FK_7788A8C26DCBA9B2` FOREIGN KEY (`actorId`) REFERENCES `actors` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `reg_info`
--
ALTER TABLE `reg_info`
  ADD CONSTRAINT `FK_17A6A37531C15487` FOREIGN KEY (`district`) REFERENCES `districs` (`id`),
  ADD CONSTRAINT `FK_17A6A3756DCBA9B2` FOREIGN KEY (`actorId`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_17A6A375FBD8E0F8` FOREIGN KEY (`job`) REFERENCES `jobs` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `sym_to_ill`
--
ALTER TABLE `sym_to_ill`
  ADD CONSTRAINT `FK_EE72469F2A0B31E4` FOREIGN KEY (`ill_id`) REFERENCES `illnesses` (`id`),
  ADD CONSTRAINT `FK_EE72469F98FA6F8E` FOREIGN KEY (`sym_id`) REFERENCES `symptoms` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `FK_444839EA84F61635` FOREIGN KEY (`patId`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `FK_444839EAE820E5B1` FOREIGN KEY (`docId`) REFERENCES `actors` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `visit_to_ill`
--
ALTER TABLE `visit_to_ill`
  ADD CONSTRAINT `FK_59F70C5E2A0B31E4` FOREIGN KEY (`ill_id`) REFERENCES `visits` (`id`),
  ADD CONSTRAINT `FK_59F70C5E75FA0FF2` FOREIGN KEY (`visit_id`) REFERENCES `illnesses` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `visit_to_medic`
--
ALTER TABLE `visit_to_medic`
  ADD CONSTRAINT `FK_8A482F07409615FE` FOREIGN KEY (`medic_id`) REFERENCES `medicines` (`id`),
  ADD CONSTRAINT `FK_8A482F0775FA0FF2` FOREIGN KEY (`visit_id`) REFERENCES `visits` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
