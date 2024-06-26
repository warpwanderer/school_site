-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 17 2019 г., 02:15
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `group`) VALUES
(1, '1a'),
(2, '2в'),
(3, '3б'),
(4, '4г'),
(5, '5в'),
(6, '6а'),
(7, '7б'),
(8, '8е'),
(9, '9в'),
(10, '10е'),
(11, '11б'),
(12, '12г');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `image` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `image`) VALUES
(2, 'ГТО в школе', 'Совсем еще, казалось бы, недавно вступил в свои права новый Федеральный Государственный Образовательный Стандарт, в котором идет речь о воспитании ребенка как всесторонне развитой личности. На сегодняшний момент происходит внедрение комплекса ГТО в школу. Основной его целью является исследование уровня физической подготовки детей и ее влияние на укрепление здоровья.\r\n\r\nКомплекс ГТО предусматривает подготовку к выполнению и непосредственное выполнение установленных нормативных требований по трем уровням трудности, соответствующим золотому, серебряному и бронзовому знакам отличия «Готов к труду и обороне». Для каждой возрастной группы от 6 до 70 лет и старше определены свои нормативы.\r\n\r\nВиды нормативов и испытаний направлены на определение уровня развития физических качеств человека: выносливости, силы, гибкости и его скоростных возможностей. Требования комплекса ГТО внутри каждой ступени есть обязательные и по выбору.\r\n\r\nУчащиеся начальной школы под руководством учителя физической культуры Пикалина Р.Н. приняли участие в первом этапе по сдаче норм ГТО. Справились все на отлично! Для этих ребят ГТО — это не просто получение знака отличия, это в первую очередь совершенствование самого себя, своего внутреннего «Я». Подготавливая себя к выполнению нормативов испытаний комплекса, они оттачивают свою координацию, становятся более целеустремленным, морально и физически закаленным.', NULL),
(3, 'Летопись Победы', 'Уникальный военно-патриотический фестиваль «Красноярск. Летопись Победы» прошёл в Красноярске уже в пятый раз. Его участниками и гостями стали более трёх тысяч человек. 4 мая финалисты – старшеклассники школ краевого центра – представили семь театрализованных историй о городах-героях в формате исторической реконструкции. Школьники подготовили постановки о городах – героях Мурманске, Севастополе, Ленинграде, Москве, Сталинграде, Киеве и Минске и рассказали о красноярцах, принимавших участие в сражениях за эти города.\n\nПервым же этапом фестиваля были показательные выступление по строевой подготовке школьных военно-патриотических групп.\n\nКрасноярским штабом Юнармии в ходе фестиваля были проведено посвящение в юнармейцы. Актив муниципального штаба пополнился 300-ми участниками среди которых ученики нашей школы.\n\nУчастников и организаторов фестиваля поблагодарил мэр Красноярска Сергей Ерёмин: «Мы на очень высоком патриотическом уровне отмечаем наш великий праздник – День Победы. И я искренне рад, что этот уровень мы достигаем благодаря молодым красноярцам. Фестиваль – ещё одно подтверждение, что ни при каких условиях нельзя допускать таких кровопролитных войн, и всегда помнить о героях, которые подарили нам счастье жить в мире».Тем из них, кто лето проводит в городе, это поможет провести его с пользой. \n\nМы никогда не забудем тот день в который мы прогнали фашизм навсегда из наших земель!', NULL),
(10, 'Проверка1', 'Проверка новости1', '1560719178.jpg'),
(9, 'Проверка', 'Проверка новости', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `raspisanie`
--

CREATE TABLE IF NOT EXISTS `raspisanie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` text NOT NULL,
  `object` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `raspisanie`
--

INSERT INTO `raspisanie` (`id`, `group`, `object`) VALUES
(1, '1a', 'YTo1OntpOjA7YTo1OntpOjA7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MTtzOjM3OiLQm9C40YLQtdGA0LDRgtGD0YDQvdC+0LUg0YfRgtC10L3QuNC1IjtpOjI7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MztzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjQ7czoyMzoi0JrQu9Cw0YHRgdC90YvQuSDRh9Cw0YEiO31pOjE7YTo0OntpOjA7czozNzoi0JvQuNGC0LXRgNCw0YLRg9GA0L3QvtC1INGH0YLQtdC90LjQtSI7aToxO3M6MjM6ItCg0YPRgdGB0LrQuNC5INGP0LfRi9C6IjtpOjI7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MztzOjEyOiLQnNGD0LfRi9C60LAiO31pOjI7YTo0OntpOjA7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MTtzOjM3OiLQm9C40YLQtdGA0LDRgtGD0YDQvdC+0LUg0YfRgtC10L3QuNC1IjtpOjI7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MztzOjI3OiLQntC60YDRg9C20LDRjtGJ0LjQuSDQvNC40YAiO31pOjM7YTo0OntpOjA7czozNzoi0JvQuNGC0LXRgNCw0YLRg9GA0L3QvtC1INGH0YLQtdC90LjQtSI7aToxO3M6MjI6ItCk0LjQt9C60YPQu9GM0YLRg9GA0LAiO2k6MjtzOjIwOiLQotC10YXQvdC+0LvQvtCz0LjRjyI7aTozO3M6MjM6ItCg0YPRgdGB0LrQuNC5INGP0LfRi9C6Ijt9aTo0O2E6NDp7aTowO3M6MjA6ItCc0LDRgtC10LzQsNGC0LjQutCwIjtpOjE7czoyMjoi0KTQuNC30LrRg9C70YzRgtGD0YDQsCI7aToyO3M6Njoi0JjQl9CeIjtpOjM7czoyNzoi0J7QutGA0YPQttCw0Y7RidC40Lkg0LzQuNGAIjt9fQ=='),
(2, '2в', 'YTo1OntpOjA7YTo1OntpOjA7czoyOToi0JDQvdCz0LvQuNC50YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQmNC90YTQvtGA0LzQsNGC0LjQutCwIjtpOjI7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MztzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjQ7czoyMzoi0JrQu9Cw0YHRgdC90YvQuSDRh9Cw0YEiO31pOjE7YTo0OntpOjA7czozNzoi0JvQuNGC0LXRgNCw0YLRg9GA0L3QvtC1INGH0YLQtdC90LjQtSI7aToxO3M6MjA6ItCc0LDRgtC10LzQsNGC0LjQutCwIjtpOjI7czoxMjoi0JzRg9C30YvQutCwIjtpOjM7czo2OiLQmNCX0J4iO31pOjI7YTo0OntpOjA7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjI7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MztzOjI5OiLQkNC90LPQu9C40LnRgdC60LjQuSDRj9C30YvQuiI7fWk6MzthOjQ6e2k6MDtzOjM3OiLQm9C40YLQtdGA0LDRgtGD0YDQvdC+0LUg0YfRgtC10L3QuNC1IjtpOjE7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MjtzOjIwOiLQotC10YXQvdC+0LvQvtCz0LjRjyI7aTozO3M6Mjc6ItCe0LrRgNGD0LbQsNGO0YnQuNC5INC80LjRgCI7fWk6NDthOjQ6e2k6MDtzOjIwOiLQnNCw0YLQtdC80LDRgtC40LrQsCI7aToxO3M6MjM6ItCg0YPRgdGB0LrQuNC5INGP0LfRi9C6IjtpOjI7czo2OiLQmNCX0J4iO2k6MztzOjM3OiLQm9C40YLQtdGA0LDRgtGD0YDQvdC+0LUg0YfRgtC10L3QuNC1Ijt9fQ=='),
(3, '3б', 'YTo1OntpOjA7YTo0OntpOjA7czozNzoi0JvQuNGC0LXRgNCw0YLRg9GA0L3QvtC1INGH0YLQtdC90LjQtSI7aToxO3M6MjA6ItCc0LDRgtC10LzQsNGC0LjQutCwIjtpOjI7czoxMjoi0JzRg9C30YvQutCwIjtpOjM7czo2OiLQmNCX0J4iO31pOjE7YTo1OntpOjA7czoyOToi0JDQvdCz0LvQuNC50YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQmNC90YTQvtGA0LzQsNGC0LjQutCwIjtpOjI7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MztzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjQ7czoyMzoi0JrQu9Cw0YHRgdC90YvQuSDRh9Cw0YEiO31pOjI7YTo0OntpOjA7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjI7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MztzOjI5OiLQkNC90LPQu9C40LnRgdC60LjQuSDRj9C30YvQuiI7fWk6MzthOjQ6e2k6MDtzOjIwOiLQnNCw0YLQtdC80LDRgtC40LrQsCI7aToxO3M6MjM6ItCg0YPRgdGB0LrQuNC5INGP0LfRi9C6IjtpOjI7czo2OiLQmNCX0J4iO2k6MztzOjM3OiLQm9C40YLQtdGA0LDRgtGD0YDQvdC+0LUg0YfRgtC10L3QuNC1Ijt9aTo0O2E6NDp7aTowO3M6Mzc6ItCb0LjRgtC10YDQsNGC0YPRgNC90L7QtSDRh9GC0LXQvdC40LUiO2k6MTtzOjIwOiLQnNCw0YLQtdC80LDRgtC40LrQsCI7aToyO3M6MjA6ItCi0LXRhdC90L7Qu9C+0LPQuNGPIjtpOjM7czoyNzoi0J7QutGA0YPQttCw0Y7RidC40Lkg0LzQuNGAIjt9fQ==\n'),
(4, '4г', 'YTo1OntpOjA7YTo1OntpOjA7czoyOToi0JDQvdCz0LvQuNC50YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQmNC90YTQvtGA0LzQsNGC0LjQutCwIjtpOjI7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MztzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjQ7czoyMzoi0JrQu9Cw0YHRgdC90YvQuSDRh9Cw0YEiO31pOjE7YTo0OntpOjA7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MTtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aToyO3M6Njoi0JjQl9CeIjtpOjM7czozNzoi0JvQuNGC0LXRgNCw0YLRg9GA0L3QvtC1INGH0YLQtdC90LjQtSI7fWk6MjthOjQ6e2k6MDtzOjM3OiLQm9C40YLQtdGA0LDRgtGD0YDQvdC+0LUg0YfRgtC10L3QuNC1IjtpOjE7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MjtzOjIwOiLQotC10YXQvdC+0LvQvtCz0LjRjyI7aTozO3M6Mjc6ItCe0LrRgNGD0LbQsNGO0YnQuNC5INC80LjRgCI7fWk6MzthOjQ6e2k6MDtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aToxO3M6MjI6ItCk0LjQt9C60YPQu9GM0YLRg9GA0LAiO2k6MjtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aTozO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6Ijt9aTo0O2E6NDp7aTowO3M6Mzc6ItCb0LjRgtC10YDQsNGC0YPRgNC90L7QtSDRh9GC0LXQvdC40LUiO2k6MTtzOjIwOiLQnNCw0YLQtdC80LDRgtC40LrQsCI7aToyO3M6MTI6ItCc0YPQt9GL0LrQsCI7aTozO3M6Njoi0JjQl9CeIjt9fQ=='),
(5, '5в', 'YTo1OntpOjA7YTo0OntpOjA7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MTtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aToyO3M6Njoi0JjQl9CeIjtpOjM7czozNzoi0JvQuNGC0LXRgNCw0YLRg9GA0L3QvtC1INGH0YLQtdC90LjQtSI7fWk6MTthOjQ6e2k6MDtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aToxO3M6MjI6ItCk0LjQt9C60YPQu9GM0YLRg9GA0LAiO2k6MjtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aTozO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6Ijt9aToyO2E6NTp7aTowO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6IjtpOjE7czoyMjoi0JjQvdGE0L7RgNC80LDRgtC40LrQsCI7aToyO3M6MjA6ItCc0LDRgtC10LzQsNGC0LjQutCwIjtpOjM7czoyMjoi0KTQuNC30LrRg9C70YzRgtGD0YDQsCI7aTo0O3M6MjM6ItCa0LvQsNGB0YHQvdGL0Lkg0YfQsNGBIjt9aTozO2E6NDp7aTowO3M6Mzc6ItCb0LjRgtC10YDQsNGC0YPRgNC90L7QtSDRh9GC0LXQvdC40LUiO2k6MTtzOjIwOiLQnNCw0YLQtdC80LDRgtC40LrQsCI7aToyO3M6MjA6ItCi0LXRhdC90L7Qu9C+0LPQuNGPIjtpOjM7czoyNzoi0J7QutGA0YPQttCw0Y7RidC40Lkg0LzQuNGAIjt9aTo0O2E6NDp7aTowO3M6Mzc6ItCb0LjRgtC10YDQsNGC0YPRgNC90L7QtSDRh9GC0LXQvdC40LUiO2k6MTtzOjIwOiLQnNCw0YLQtdC80LDRgtC40LrQsCI7aToyO3M6MTI6ItCc0YPQt9GL0LrQsCI7aTozO3M6Njoi0JjQl9CeIjt9fQ=='),
(6, '6а', 'YTo1OntpOjA7YTo0OntpOjA7czo2OiLQmNCX0J4iO2k6MTtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aToyO3M6Njoi0JjQl9CeIjtpOjM7czozNzoi0JvQuNGC0LXRgNCw0YLRg9GA0L3QvtC1INGH0YLQtdC90LjQtSI7fWk6MTthOjQ6e2k6MDtzOjM3OiLQm9C40YLQtdGA0LDRgtGD0YDQvdC+0LUg0YfRgtC10L3QuNC1IjtpOjE7czoyOToi0JDQvdCz0LvQuNC50YHQutC40Lkg0Y/Qt9GL0LoiO2k6MjtzOjIwOiLQotC10YXQvdC+0LvQvtCz0LjRjyI7aTozO3M6Mjc6ItCe0LrRgNGD0LbQsNGO0YnQuNC5INC80LjRgCI7fWk6MjthOjQ6e2k6MDtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aToxO3M6MjI6ItCk0LjQt9C60YPQu9GM0YLRg9GA0LAiO2k6MjtzOjIyOiLQmNC90YTQvtGA0LzQsNGC0LjQutCwIjtpOjM7czoyOToi0JDQvdCz0LvQuNC50YHQutC40Lkg0Y/Qt9GL0LoiO31pOjM7YTo0OntpOjA7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MTtzOjIwOiLQnNCw0YLQtdC80LDRgtC40LrQsCI7aToyO3M6MTI6ItCc0YPQt9GL0LrQsCI7aTozO3M6Njoi0JjQl9CeIjt9aTo0O2E6NTp7aTowO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6IjtpOjE7czoyMjoi0JjQvdGE0L7RgNC80LDRgtC40LrQsCI7aToyO3M6MjA6ItCc0LDRgtC10LzQsNGC0LjQutCwIjtpOjM7czoyMjoi0KTQuNC30LrRg9C70YzRgtGD0YDQsCI7aTo0O3M6MjM6ItCa0LvQsNGB0YHQvdGL0Lkg0YfQsNGBIjt9fQ=='),
(7, '7б', 'YTo1OntpOjA7YTo0OntpOjA7czo2OiLQmNCX0J4iO2k6MTtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aToyO3M6Njoi0JjQl9CeIjtpOjM7czozNzoi0JvQuNGC0LXRgNCw0YLRg9GA0L3QvtC1INGH0YLQtdC90LjQtSI7fWk6MTthOjQ6e2k6MDtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aToxO3M6MjI6ItCk0LjQt9C60YPQu9GM0YLRg9GA0LAiO2k6MjtzOjIyOiLQmNC90YTQvtGA0LzQsNGC0LjQutCwIjtpOjM7czoyOToi0JDQvdCz0LvQuNC50YHQutC40Lkg0Y/Qt9GL0LoiO31pOjI7YTo0OntpOjA7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MTtzOjIwOiLQnNCw0YLQtdC80LDRgtC40LrQsCI7aToyO3M6MTI6ItCc0YPQt9GL0LrQsCI7aTozO3M6Njoi0JjQl9CeIjt9aTozO2E6NTp7aTowO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6IjtpOjE7czoyMjoi0JjQvdGE0L7RgNC80LDRgtC40LrQsCI7aToyO3M6MjA6ItCc0LDRgtC10LzQsNGC0LjQutCwIjtpOjM7czoyMjoi0KTQuNC30LrRg9C70YzRgtGD0YDQsCI7aTo0O3M6MjM6ItCa0LvQsNGB0YHQvdGL0Lkg0YfQsNGBIjt9aTo0O2E6NDp7aTowO3M6Mzc6ItCb0LjRgtC10YDQsNGC0YPRgNC90L7QtSDRh9GC0LXQvdC40LUiO2k6MTtzOjI5OiLQkNC90LPQu9C40LnRgdC60LjQuSDRj9C30YvQuiI7aToyO3M6MjA6ItCi0LXRhdC90L7Qu9C+0LPQuNGPIjtpOjM7czoyNzoi0J7QutGA0YPQttCw0Y7RidC40Lkg0LzQuNGAIjt9fQ=='),
(8, '8е', 'YTo1OntpOjA7YTo1OntpOjA7czoyOToi0JDQvdCz0LvQuNC50YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQmNC90YTQvtGA0LzQsNGC0LjQutCwIjtpOjI7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MztzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjQ7czoyMzoi0JrQu9Cw0YHRgdC90YvQuSDRh9Cw0YEiO31pOjE7YTo0OntpOjA7czo2OiLQmNCX0J4iO2k6MTtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aToyO3M6Njoi0JjQl9CeIjtpOjM7czozNzoi0JvQuNGC0LXRgNCw0YLRg9GA0L3QvtC1INGH0YLQtdC90LjQtSI7fWk6MjthOjQ6e2k6MDtzOjIwOiLQnNCw0YLQtdC80LDRgtC40LrQsCI7aToxO3M6MjA6ItCc0LDRgtC10LzQsNGC0LjQutCwIjtpOjI7czoxMjoi0JzRg9C30YvQutCwIjtpOjM7czo2OiLQmNCX0J4iO31pOjM7YTo0OntpOjA7czozNzoi0JvQuNGC0LXRgNCw0YLRg9GA0L3QvtC1INGH0YLQtdC90LjQtSI7aToxO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6IjtpOjI7czoyMDoi0KLQtdGF0L3QvtC70L7Qs9C40Y8iO2k6MztzOjI3OiLQntC60YDRg9C20LDRjtGJ0LjQuSDQvNC40YAiO31pOjQ7YTo0OntpOjA7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjI7czoyMjoi0JjQvdGE0L7RgNC80LDRgtC40LrQsCI7aTozO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6Ijt9fQ=='),
(9, '9в', 'YTo1OntpOjA7YTo1OntpOjA7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQmNC90YTQvtGA0LzQsNGC0LjQutCwIjtpOjI7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MztzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjQ7czoxNjoi0KfQtdGA0YfQtdC90LjQtSI7fWk6MTthOjQ6e2k6MDtzOjY6ItCY0JfQniI7aToxO3M6MjM6ItCg0YPRgdGB0LrQuNC5INGP0LfRi9C6IjtpOjI7czo2OiLQmNCX0J4iO2k6MztzOjM3OiLQm9C40YLQtdGA0LDRgtGD0YDQvdC+0LUg0YfRgtC10L3QuNC1Ijt9aToyO2E6NDp7aTowO3M6MjA6ItCc0LDRgtC10LzQsNGC0LjQutCwIjtpOjE7czoyMjoi0KTQuNC30LrRg9C70YzRgtGD0YDQsCI7aToyO3M6MTI6ItCc0YPQt9GL0LrQsCI7aTozO3M6MTY6ItCn0LXRgNGH0LXQvdC40LUiO31pOjM7YTo0OntpOjA7czozNzoi0JvQuNGC0LXRgNCw0YLRg9GA0L3QvtC1INGH0YLQtdC90LjQtSI7aToxO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6IjtpOjI7czoxMDoi0KLRgNGD0LTRiyI7aTozO3M6MTY6ItCR0LjQvtC70L7Qs9C40Y8iO31pOjQ7YTo0OntpOjA7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjI7czoyMjoi0JjQvdGE0L7RgNC80LDRgtC40LrQsCI7aTozO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6Ijt9fQ=='),
(10, '10е', 'YTo1OntpOjA7YTo1OntpOjA7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQmNC90YTQvtGA0LzQsNGC0LjQutCwIjtpOjI7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MztzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjQ7czoxNjoi0KfQtdGA0YfQtdC90LjQtSI7fWk6MTthOjQ6e2k6MDtzOjY6ItCY0JfQniI7aToxO3M6MjM6ItCg0YPRgdGB0LrQuNC5INGP0LfRi9C6IjtpOjI7czo2OiLQmNCX0J4iO2k6MztzOjM3OiLQm9C40YLQtdGA0LDRgtGD0YDQvdC+0LUg0YfRgtC10L3QuNC1Ijt9aToyO2E6NDp7aTowO3M6MjA6ItCc0LDRgtC10LzQsNGC0LjQutCwIjtpOjE7czoyMjoi0KTQuNC30LrRg9C70YzRgtGD0YDQsCI7aToyO3M6MTI6ItCc0YPQt9GL0LrQsCI7aTozO3M6MTY6ItCn0LXRgNGH0LXQvdC40LUiO31pOjM7YTo0OntpOjA7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjI7czoyMjoi0JjQvdGE0L7RgNC80LDRgtC40LrQsCI7aTozO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6Ijt9aTo0O2E6NDp7aTowO3M6Mzc6ItCb0LjRgtC10YDQsNGC0YPRgNC90L7QtSDRh9GC0LXQvdC40LUiO2k6MTtzOjI5OiLQkNC90LPQu9C40LnRgdC60LjQuSDRj9C30YvQuiI7aToyO3M6MTA6ItCi0YDRg9C00YsiO2k6MztzOjE2OiLQkdC40L7Qu9C+0LPQuNGPIjt9fQ=='),
(11, '11б', 'YTo1OntpOjA7YTo0OntpOjA7czoyMDoi0JzQsNGC0LXQvNCw0YLQuNC60LAiO2k6MTtzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjI7czoxMjoi0JzRg9C30YvQutCwIjtpOjM7czoxNjoi0KfQtdGA0YfQtdC90LjQtSI7fWk6MTthOjU6e2k6MDtzOjIzOiLQoNGD0YHRgdC60LjQuSDRj9C30YvQuiI7aToxO3M6MjI6ItCY0L3RhNC+0YDQvNCw0YLQuNC60LAiO2k6MjtzOjIwOiLQnNCw0YLQtdC80LDRgtC40LrQsCI7aTozO3M6MjI6ItCk0LjQt9C60YPQu9GM0YLRg9GA0LAiO2k6NDtzOjE2OiLQp9C10YDRh9C10L3QuNC1Ijt9aToyO2E6NDp7aTowO3M6Njoi0JjQl9CeIjtpOjE7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MjtzOjY6ItCY0JfQniI7aTozO3M6Mzc6ItCb0LjRgtC10YDQsNGC0YPRgNC90L7QtSDRh9GC0LXQvdC40LUiO31pOjM7YTo0OntpOjA7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjI7czoyMjoi0JjQvdGE0L7RgNC80LDRgtC40LrQsCI7aTozO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6Ijt9aTo0O2E6NDp7aTowO3M6Mzc6ItCb0LjRgtC10YDQsNGC0YPRgNC90L7QtSDRh9GC0LXQvdC40LUiO2k6MTtzOjI5OiLQkNC90LPQu9C40LnRgdC60LjQuSDRj9C30YvQuiI7aToyO3M6MTA6ItCi0YDRg9C00YsiO2k6MztzOjE2OiLQkdC40L7Qu9C+0LPQuNGPIjt9fQ=='),
(12, '12г', 'YTo1OntpOjA7YTo0OntpOjA7czoxMDoi0KLRgNGD0LTRiyI7aToxO3M6MjI6ItCk0LjQt9C60YPQu9GM0YLRg9GA0LAiO2k6MjtzOjEyOiLQnNGD0LfRi9C60LAiO2k6MztzOjE2OiLQp9C10YDRh9C10L3QuNC1Ijt9aToxO2E6NTp7aTowO3M6MjM6ItCg0YPRgdGB0LrQuNC5INGP0LfRi9C6IjtpOjE7czoyMjoi0JjQvdGE0L7RgNC80LDRgtC40LrQsCI7aToyO3M6MjA6ItCc0LDRgtC10LzQsNGC0LjQutCwIjtpOjM7czoyMjoi0KTQuNC30LrRg9C70YzRgtGD0YDQsCI7aTo0O3M6MTY6ItCn0LXRgNGH0LXQvdC40LUiO31pOjI7YTo0OntpOjA7czoyMzoi0KDRg9GB0YHQutC40Lkg0Y/Qt9GL0LoiO2k6MTtzOjIyOiLQpNC40LfQutGD0LvRjNGC0YPRgNCwIjtpOjI7czoyMjoi0JjQvdGE0L7RgNC80LDRgtC40LrQsCI7aTozO3M6Mjk6ItCQ0L3Qs9C70LjQudGB0LrQuNC5INGP0LfRi9C6Ijt9aTozO2E6NDp7aTowO3M6MjA6ItCb0LjRgtC10YDQsNGC0YPRgNCwIjtpOjE7czoyOToi0JDQvdCz0LvQuNC50YHQutC40Lkg0Y/Qt9GL0LoiO2k6MjtzOjEwOiLQotGA0YPQtNGLIjtpOjM7czoxNjoi0JHQuNC+0LvQvtCz0LjRjyI7fWk6NDthOjQ6e2k6MDtzOjY6ItCY0JfQniI7aToxO3M6MjM6ItCg0YPRgdGB0LrQuNC5INGP0LfRi9C6IjtpOjI7czo2OiLQmNCX0J4iO2k6MztzOjM3OiLQm9C40YLQtdGA0LDRgtGD0YDQvdC+0LUg0YfRgtC10L3QuNC1Ijt9fQ==');

-- --------------------------------------------------------

--
-- Структура таблицы `reception_room`
--

CREATE TABLE IF NOT EXISTS `reception_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `text` text NOT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `reception_room`
--

INSERT INTO `reception_room` (`id`, `name`, `text`, `comment`) VALUES
(1, 'Артем', 'Проверка', NULL),
(3, 'Вадим', 'Привет. Почему мне 19 лет и я до сих ...', '');

-- --------------------------------------------------------

--
-- Структура таблицы `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `text_article` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `search`
--

INSERT INTO `search` (`id`, `title`, `text_article`) VALUES
(1, '<a href="aboutNews.php?id=1">Пришкольный лагерь</a>', '1 июня 2019 г начал свою работу пришкольный лагерь «Берёзка». День защиты детей мы отметили весёлой увлекательной игровой программой «Кубомания». Не только дети, но и взрослые с удовольствием танцевали с кубиками, строили из них замки, да и просто бегали и играли. Каждое утро начинается с зарядки и утренней линейки с выносом флага под барабанную дробь. Ребята получают на линейке задания на день, узнают, какие мероприятия будут проходить в этот день. А вечером на линейке подводятся итоги. За первую неделю лагерной смены дети успели поучаствовать и в квесте, и в конкурсе рисунков по произведениям А.С. Пушкина; посмотрели фильм «Дети футбола», который посвящен красноярскому футбольному клубу «Тотем». Главные герои картины — воспитанники красноярского детского дома N1, добившиеся невероятных успехов на спортивной арене. Насыщенной жизнью живут дети в нашем детском саду, и приезд театральных коллективов стало доброй традицией в нашем дошкольном учреждении. В жизни детей много радостных моментов, но одними из самых запоминающихся это Цирковое представление и спектакль шоу театра «Круиз». Прошли районные спортивные соревнования среди команд пришкольных лагерей, где наши выступили очень достойно А ещё ребята занимаются в профильных кружках: английский, шахматы, музыка, подвижные игры. Пятиклассники с увлечением работают в экологическом отряде: высаживают цветы, наблюдают за жучками, рассматривают в микроскоп растения. Сегодня прошел спортивный праздник, посвященный Дню России. Фото-отчет будет чуть позже. Жизнь в лагере кипит. А дальше будет ещё интереснее!'),
(2, '<a href="aboutNews.php?id=2">ГТО в школе</a>', 'Совсем еще, казалось бы, недавно вступил в свои права новый Федеральный Государственный Образовательный Стандарт, в котором идет речь о воспитании ребенка как всесторонне развитой личности. На сегодняшний момент происходит внедрение комплекса ГТО в школу. Основной его целью является исследование уровня физической подготовки детей и ее влияние на укрепление здоровья. Комплекс ГТО предусматривает подготовку к выполнению и непосредственное выполнение установленных нормативных требований по трем уровням трудности, соответствующим золотому, серебряному и бронзовому знакам отличия «Готов к труду и обороне». Для каждой возрастной группы от 6 до 70 лет и старше определены свои нормативы. Виды нормативов и испытаний направлены на определение уровня развития физических качеств человека: выносливости, силы, гибкости и его скоростных возможностей. Требования комплекса ГТО внутри каждой ступени есть обязательные и по выбору. Учащиеся начальной школы под руководством учителя физической культуры Пикалина Р.Н. приняли участие в первом этапе по сдаче норм ГТО. Справились все на отлично! Для этих ребят ГТО — это не просто получение знака отличия, это в первую очередь совершенствование самого себя, своего внутреннего «Я». Подготавливая себя к выполнению нормативов испытаний комплекса, они оттачивают свою координацию, становятся более целеустремленным, морально и физически закаленным.'),
(3, '<a href="aboutNews.php?id=3">Летопись Победы</a>', 'Уникальный военно-патриотический фестиваль «Красноярск. Летопись Победы» прошёл в Красноярске уже в пятый раз. Его участниками и гостями стали более трёх тысяч человек. 4 мая финалисты – старшеклассники школ краевого центра – представили семь театрализованных историй о городах-героях в формате исторической реконструкции. Школьники подготовили постановки о городах – героях Мурманске, Севастополе, Ленинграде, Москве, Сталинграде, Киеве и Минске и рассказали о красноярцах, принимавших участие в сражениях за эти города. Первым же этапом фестиваля были показательные выступление по строевой подготовке школьных военно-патриотических групп. Красноярским штабом Юнармии в ходе фестиваля были проведено посвящение в юнармейцы. Актив муниципального штаба пополнился 300-ми участниками среди которых ученики нашей школы. Участников и организаторов фестиваля поблагодарил мэр Красноярска Сергей Ерёмин: «Мы на очень высоком патриотическом уровне отмечаем наш великий праздник – День Победы. И я искренне рад, что этот уровень мы достигаем благодаря молодым красноярцам. Фестиваль – ещё одно подтверждение, что ни при каких условиях нельзя допускать таких кровопролитных войн, и всегда помнить о героях, которые подарили нам счастье жить в мире».Тем из них, кто лето проводит в городе, это поможет провести его с пользой. Мы никогда не забудем тот день в который мы прогнали фашизм навсегда из наших земель!'),
(4, '<a href="raspisanie.php">Расписание</a>', '1а 2в 3б 4г 5в 6а 7б 8е 9в 10е 11б 12г');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
