-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 06 2024 г., 12:06
-- Версия сервера: 8.0.29
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cyberastronauts`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--

CREATE TABLE `bookings` (
  `id_booking` int NOT NULL,
  `id_user` int NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `id_discount` int DEFAULT NULL,
  `id_place` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `bookings`
--

INSERT INTO `bookings` (`id_booking`, `id_user`, `date`, `start_time`, `end_time`, `id_discount`, `id_place`) VALUES
(1, 1, '2024-04-25', '17:00:00', '20:00:00', NULL, 1),
(2, 1, '2024-05-13', '15:00:00', '18:00:00', NULL, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `devices`
--

CREATE TABLE `devices` (
  `id_device` int NOT NULL,
  `gpu` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cpu` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `display` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `headset` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mouse` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `keyboard` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `vr_headset` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `console` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `devices`
--

INSERT INTO `devices` (`id_device`, `gpu`, `cpu`, `display`, `headset`, `mouse`, `keyboard`, `vr_headset`, `console`) VALUES
(1, 'NVIDIA GEFORCE RTX 2060', 'INTEL CORE I5-9400F', '144 ГЦ И ДИАГОНАЛЬ 24”', 'HYPERX CLOUD SILVER', 'LOGITECH G403 HERO', 'LOGITECH G413', NULL, NULL),
(2, 'NVIDIA GEFORCE RTX 3060', 'INTEL CORE I5-11400F', '165 ГЦ И ДИАГОНАЛЬ 27”', 'HYPERX CLOUD SILVER', 'LOGITECH G403 HERO', 'LOGITECH G413', NULL, NULL),
(3, 'NVIDIA GEFORCE RTX 3070', 'INTEL CORE I5-12400F', '240 ГЦ И ДИАГОНАЛЬ 27”', 'HYPERX CLOUD II', 'LOGITECH G703', 'HYPERX ALLOY ELITE 2', NULL, NULL),
(4, 'NVIDIA GEFORCE RTX 3080', 'INTEL CORE I5-12600K', '240 ГЦ И ДИАГОНАЛЬ 32”', 'HYPERX CLOUD II', 'LOGITECH G PRO WIRELESS', 'CORSAIR K70 RGB TKL', NULL, NULL),
(5, NULL, NULL, 'ТЕЛЕВИЗОР - ДИАГОНАЛЬ 65”', NULL, NULL, NULL, NULL, 'PLAYSTATION 5'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, 'VR VALVE INDEX', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `discounts`
--

CREATE TABLE `discounts` (
  `id_discount` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `discounts`
--

INSERT INTO `discounts` (`id_discount`, `name`, `start_date`, `end_date`, `description`, `img`) VALUES
(1, 'Приведи друга и играй бесплатно', '2024-03-30', '2025-03-30', 'Играй с другом за наш счёт!\r\n<br><br>\r\nПриведи друга в наш компьютерный клуб и получай на свой баланс сумму, равную его пополнению!\r\n<br><br>\r\nАкция работает при условии, что друг у нас ещё не был!\r\n<br><br>\r\nДля участия в акции необходимо:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount1.png'),
(2, 'Получи 300 рублей в свой день рождения', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?\r\n<br><br>\r\nДарим посетителям 300 рублей на игровой баланс в их день рождения!\r\n<br><br>\r\nВсё, что нужно сделать:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе иметь документ удостоверяющий личность и подтверждающий день рождения (например, паспорт, водительское удостоверение);<br>\r\n— Пополнить счёт на сумму от 100 рублей;<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount2.png'),
(3, '2x часов для новых клиентов', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?\r\n<br><br>\r\nДарим всем новым посетителям 2x часов для новых клиентов!\r\n<br><br>\r\nВсё, что нужно сделать:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— Не иметь ранее бронирований;<br>\r\n— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>\r\n— Пополнить счёт на сумму от 100 рублей;<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount3.png'),
(4, 'Приведи друга и играй бесплатно', '2024-03-30', '2025-03-30', 'Играй с другом за наш счёт!\r\n<br><br>\r\nПриведи друга в наш компьютерный клуб и получай на свой баланс сумму, равную его пополнению!\r\n<br><br>\r\nАкция работает при условии, что друг у нас ещё не был!\r\n<br><br>\r\nДля участия в акции необходимо:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount1.png'),
(5, 'Получи 300 рублей в свой день рождения', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?\r\n<br><br>\r\nДарим посетителям 300 рублей на игровой баланс в их день рождения!\r\n<br><br>\r\nВсё, что нужно сделать:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе иметь документ удостоверяющий личность и подтверждающий день рождения (например, паспорт, водительское удостоверение);<br>\r\n— Пополнить счёт на сумму от 100 рублей;<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount2.png'),
(6, '2x часов для новых клиентов', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?\r\n<br><br>\r\nДарим всем новым посетителям 2x часов для новых клиентов!\r\n<br><br>\r\nВсё, что нужно сделать:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— Не иметь ранее бронирований;<br>\r\n— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>\r\n— Пополнить счёт на сумму от 100 рублей;<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount3.png'),
(7, 'Приведи друга и играй бесплатно', '2024-03-30', '2025-03-30', 'Играй с другом за наш счёт!\r\n<br><br>\r\nПриведи друга в наш компьютерный клуб и получай на свой баланс сумму, равную его пополнению!\r\n<br><br>\r\nАкция работает при условии, что друг у нас ещё не был!\r\n<br><br>\r\nДля участия в акции необходимо:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount1.png'),
(8, 'Получи 300 рублей в свой день рождения', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?\r\n<br><br>\r\nДарим посетителям 300 рублей на игровой баланс в их день рождения!\r\n<br><br>\r\nВсё, что нужно сделать:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе иметь документ удостоверяющий личность и подтверждающий день рождения (например, паспорт, водительское удостоверение);<br>\r\n— Пополнить счёт на сумму от 100 рублей;<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount2.png'),
(9, '2x часов для новых клиентов', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?\r\n<br><br>\r\nДарим всем новым посетителям 2x часов для новых клиентов!\r\n<br><br>\r\nВсё, что нужно сделать:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— Не иметь ранее бронирований;<br>\r\n— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>\r\n— Пополнить счёт на сумму от 100 рублей;<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount3.png'),
(10, 'Приведи друга и играй бесплатно', '2024-03-30', '2025-03-30', 'Играй с другом за наш счёт!\r\n<br><br>\r\nПриведи друга в наш компьютерный клуб и получай на свой баланс сумму, равную его пополнению!\r\n<br><br>\r\nАкция работает при условии, что друг у нас ещё не был!\r\n<br><br>\r\nДля участия в акции необходимо:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount1.png'),
(11, 'Получи 300 рублей в свой день рождения', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?\r\n<br><br>\r\nДарим посетителям 300 рублей на игровой баланс в их день рождения!\r\n<br><br>\r\nВсё, что нужно сделать:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе иметь документ удостоверяющий личность и подтверждающий день рождения (например, паспорт, водительское удостоверение);<br>\r\n— Пополнить счёт на сумму от 100 рублей;<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount2.png'),
(12, '2x часов для новых клиентов', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?\r\n<br><br>\r\nДарим всем новым посетителям 2x часов для новых клиентов!\r\n<br><br>\r\nВсё, что нужно сделать:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— Не иметь ранее бронирований;<br>\r\n— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>\r\n— Пополнить счёт на сумму от 100 рублей;<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount3.png'),
(13, 'Приведи друга и играй бесплатно', '2024-03-30', '2025-03-30', 'Играй с другом за наш счёт!\r\n<br><br>\r\nПриведи друга в наш компьютерный клуб и получай на свой баланс сумму, равную его пополнению!\r\n<br><br>\r\nАкция работает при условии, что друг у нас ещё не был!\r\n<br><br>\r\nДля участия в акции необходимо:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount1.png'),
(14, 'Получи 300 рублей в свой день рождения', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?\r\n<br><br>\r\nДарим посетителям 300 рублей на игровой баланс в их день рождения!\r\n<br><br>\r\nВсё, что нужно сделать:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе иметь документ удостоверяющий личность и подтверждающий день рождения (например, паспорт, водительское удостоверение);<br>\r\n— Пополнить счёт на сумму от 100 рублей;<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount2.png'),
(15, '2x часов для новых клиентов', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?\r\n<br><br>\r\nДарим всем новым посетителям 2x часов для новых клиентов!\r\n<br><br>\r\nВсё, что нужно сделать:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— Не иметь ранее бронирований;<br>\r\n— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>\r\n— Пополнить счёт на сумму от 100 рублей;<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount3.png'),
(16, 'Приведи друга и играй бесплатно', '2024-03-30', '2025-03-30', 'Играй с другом за наш счёт!\r\n<br><br>\r\nПриведи друга в наш компьютерный клуб и получай на свой баланс сумму, равную его пополнению!\r\n<br><br>\r\nАкция работает при условии, что друг у нас ещё не был!\r\n<br><br>\r\nДля участия в акции необходимо:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount1.png'),
(17, 'Получи 300 рублей в свой день рождения', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?\r\n<br><br>\r\nДарим посетителям 300 рублей на игровой баланс в их день рождения!\r\n<br><br>\r\nВсё, что нужно сделать:<br>\r\n— Быть зарегистрированным на сайте;<br>\r\n— При себе иметь документ удостоверяющий личность и подтверждающий день рождения (например, паспорт, водительское удостоверение);<br>\r\n— Пополнить счёт на сумму от 100 рублей;<br>\r\n— Показать администратору на ресепшене подтверждение выполненных условий;\r\n<br><br>\r\nСроки проведения акции могут быть изменены!', 'assets/images/discount2.png'),
(18, '2x часов для новых клиентов', '2024-03-30', '2025-03-30', 'Хочешь поиграть с максимальной выгодой?<br><br>Дарим всем новым посетителям 2x часов для новых клиентов!<br><br>Всё, что нужно сделать:<br>— Быть зарегистрированным на сайте;<br>— Не иметь ранее бронирований;<br>— При себе каждому иметь документ удостоверяющий личность (например, паспорт, водительское удостоверение);<br>— Пополнить счёт на сумму от 100 рублей;<br>— Показать администратору на ресепшене подтверждение выполненных условий;<br><br>Сроки проведения акции могут быть изменены!', 'assets/images/discount3.png');

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id_employee` int NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `second_name` varchar(32) NOT NULL,
  `patronymic` varchar(32) NOT NULL,
  `birthday` date NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `id_position` int NOT NULL,
  `email_address` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id_employee`, `first_name`, `second_name`, `patronymic`, `birthday`, `phone_number`, `id_position`, `email_address`, `password`) VALUES
(1, 'Михаил', 'Чиненов', 'Дмитриевич', '2004-01-19', '8(968)785-03-04', 1, 'admin_m.d.chinenov@ca.ru', '$2a$12$c57mNYMwpFtqLjY.04YBDOWoCFzdXpazRAsa9EKCSwNQhVrYEvNgm'),
(2, 'Анна', 'Романова', 'Александровна', '2004-05-07', '8(800)555-35-35', 2, 'admin_a.a.romanova@ca.ru', '$2a$12$5/YiPIHZJaqFOuO.38eu8uZ5a.Q7/jk04kCntQPYK32bWD7R3uBny'),
(3, 'Идар', 'Гучаев', 'Арсенович', '2004-02-20', '8(999)888-77-66', 3, 'admin_i.a.guchaev@ca.ru', '$2a$12$IhLSN7B66pa/D8cekJeAxeM5D.rR0ZeULhWL6DmTr0hCHn6AKnY9u');

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE `games` (
  `id_game` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `id_genre` int NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id_game`, `name`, `id_genre`, `img`) VALUES
(1, 'Overwatch 2', 1, 'assets/images/game1.png'),
(2, 'Counter-Strike 2', 1, 'assets/images/game2.png'),
(3, 'Dota 2', 3, 'assets/images/game3.png'),
(4, 'Valorant', 1, 'assets/images/game4.png'),
(5, 'Fortnite', 1, 'assets/images/game5.png'),
(6, 'Hearthstone', 4, 'assets/images/game6.png'),
(7, 'League of Legends', 3, 'assets/images/game7.png');

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id_genre` int NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id_genre`, `name`) VALUES
(1, 'Шутеры'),
(2, 'Стратегии'),
(3, 'MOBA'),
(4, 'Карточные'),
(5, 'Файтинги');

-- --------------------------------------------------------

--
-- Структура таблицы `halls`
--

CREATE TABLE `halls` (
  `id_hall` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_device` int NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `halls`
--

INSERT INTO `halls` (`id_hall`, `name`, `id_device`, `description`, `price`, `img`) VALUES
(1, 'STANDARD', 1, 'Для тех, кто просто хочет поиграть в любимые игры', 120, 'assets/images/hall1.png'),
(2, 'GOLD', 2, 'Для тех, кто любит отдаваться эмоциям во время игры', 130, 'assets/images/hall2.png'),
(3, 'PLATINUM', 3, 'Для тех, кто любит играть на максимальных настройках', 140, 'assets/images/hall3.png'),
(4, 'DIAMOND', 4, 'Для тех, кто любит играть небольшими компаниями', 150, 'assets/images/hall4.png'),
(5, 'PS5', 5, 'Для тех, кто любит консоли больше, чем ПК', 200, 'assets/images/hall5.png'),
(6, 'VR', 6, 'Для тех, кто любит погружаться в виртуальную реальность', 150, 'assets/images/hall6.png');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id_new` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_game` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_new`, `name`, `description`, `date`, `img`, `id_game`) VALUES
(1, 'Официальный релиз Counter-Strike 2', 'Грандиозное событие в мире киберспорта и для Cyber Astronauts — 28 сентября 2023 года состоялся официальный релиз Counter-Strike 2.\r\n<br><br>\r\nМировая киберспортивная сцена содрогнулась от волнения, когда Valve Corporation официально объявила о разработке долгожданного продолжения культовой игры — Counter-Strike 2. Этот анонс заслуживает внимания всех фанатов стрелялок от первого лица и любителей командного соревновательного геймплея.\r\n<br><br>\r\nCounter-Strike, который дебютировал более двадцати лет назад, быстро стал культовой игрой и частью истории киберспорта. Counter-Strike 2 обещает сохранить дух оригинала и, в то же время, предложить игрокам множество новых возможностей и улучшений. Этот день войдёт в историю, когда одна эпоха сменила другую и вызовет бурю эмоций среди сообществ и фанатов Counter-Strike. CS2 станет новой страницей в истории киберспорта и, безусловно, продолжит традицию ожесточённых боёв и командных сражений, за которые так полюбили оригинальную игру.\r\n<br><br>\r\nВсе достижения из CS:GO обнулили — В CS2 были переработаны карты, действия гранат, интерфейс, добавлен новый стилизованный внутриигровой магазин и многие другие аспекты.\r\n<br><br>\r\nПри заходе в CS2 вы получите монету и набор музыки в дань памяти CS:GO.\r\n<br><br>\r\nВсех неравнодушных приглашаем в Cyber Astronauts опробовать новую игру!', '2023-09-28', 'assets/images/new1.png', 2),
(2, 'BLAST стал организатором турниров по Fortnite и Rocket League', 'BLAST объявлен организатором турниров по Fortnite и Rocket League.\r\n<br><br>\r\nFortnite и Rocket League последние несколько лет выпускались DreamHack и ESL, но с 2024 года Epic Games перейдет на партнерство с BLAST, они подписали многолетний контракт.\r\n<br><br>\r\nПо условиям сделки в этом году BLAST возьмет на себя управление Rocket League Championship Series (RLCS) и Fortnite Championship Series (FNCS).\r\n<br><br>\r\nСезон Rocket League 2024 года начнется в январе этого года.', '2024-01-04', 'assets/images/new2.png', 5),
(3, 'Heroic подписала состав по Доте', 'Организация Heroic подписала состав по Доте.\r\n<br><br>\r\nСостав Heroic:<br>\r\n1. Гектор Антонио «K1» Родригез<br>\r\n2. Жоао «4nalog» Джаннини<br>\r\n3. Седрик «Davai Lama» Декмин<br>\r\n4. Элвис «Scofield» Де ла Круз<br>\r\n5. Матеус «KJ» Диниз\r\n<br><br>\r\nТренером команды стал Игор «kaffs» Фуртадо, ранее работавший в Evil Geniuses и Boom.', '2024-01-04', 'assets/images/new3.png', 3),
(4, 'S1mple анонсировал собственную обучающую платформу по CS 2.', 'Александр «s1mple» Костылев объявил о запуске нового проекта.\r\n<br><br>\r\nЭто будет обучающая платформа по CS 2. Релиз – в апреле 2024 года.\r\n<br><br>\r\nS1mple рассказал, что работает над проектом со своим братом. ', '2024-01-13', 'assets/images/new4.png', 2),
(5, 'Стали известны участники Игр будущего по Dota 2 в Казани', 'Организаторы мультиспортивного турнира «Игры будущего – 2024» в Казани анонсировали состав участников турнира по дисциплине Dota 2.\r\n<br><br>\r\nЗа призовой фонд в размере $ 1 млн поведут борьбу 16 коллективов. Помимо четырёх топ-команд из Китая, в Россию приедут Nigma Galaxy с Мираклом и Сумаилом, а также русскоязычный ростер Entity и состав стримеров Echpo4mak.\r\n<br><br>\r\nСостав участников Игр будущего по Dota 2:<br>\r\n1. Hydra (Россия)<br>\r\n2. One Move (Россия)<br>\r\n3. Echpo4mak (Россия)<br>\r\n4. Invictus Gaming (Китай)<br>\r\n5. LGD Gaming (Китай)<br>\r\n6. Xtreme Gaming (Китай)<br>\r\n7. Azure Ray (Китай)<br>\r\n8. beastcoast (Перу)<br>\r\n9. Thunder Awaken (Перу)<br>\r\n10. BOOM Esports (Перу)<br>\r\n11. Nigma Galaxy (Европа)<br>\r\n12. Entity (Европа)<br>\r\n13. Winter Bear (Иран)<br>\r\n14. Neon Esports (Филиппины)<br>\r\n<br>\r\nДве последние команды будут объявлены позже.\r\n<br><br>\r\nИгры будущего пройдут в Казани с 25 февраля по 10 марта. Всего будет представлено свыше 20 видов программы, в том числе CS:GO + лазертаг и Mobile Legends: Bang Bang.', '2024-01-26', 'assets/images/new5.png', 3),
(6, 'Российская Team Spirit стала чемпионом IEM Katowice 2024 по CS 2', 'Российский состав Team Spirit по Counter-Strike 2 выиграл первый топ-турнир нового сезона — Intel Extreme Masters Katowice 2024 в Польше.\r\n<br><br>\r\nВ финале «драконы» уверенно обыграли европейскую FaZe Clan. Матч завершился со счётом 3:0 по картам (13-9 на Nuke, 13-11 MIrage, 13-3 Overpass). В общей сложности Team Spirit одержала семь побед подряд в рамках IEM Katowice.\r\n<br><br>\r\nЗа победу на Intel Extreme Masters в Катовице команда Леонида chopper Вишнякова получила $ 400 тыс., а также прямые инвайты на три топ-турнира — IEM Cologne 2024, BLAST Premier World Final и Esports World Cup 2024.', '2024-02-11', 'assets/images/new6.png', 2),
(7, 'Китайская Xtreme Gaming стала чемпионом Игр будущего по Dota 2', 'Китайская команда Xtreme Gaming выиграла турнир по дисциплине Dota 2 в рамках мультиспортивного ивента Игры будущего – 2024 в Казани.\r\n<br><br>\r\nВ финале коллектив опытных Ame и XinQ переиграл другую команду из Поднебесной — матч с LGD Gaming завершился со счётом 2:0. Xtreme Gaming стала чемпионом Games of Future, получив трофей и главный денежный приз в размере $ 350 тыс.\r\n<br><br>\r\nТретье место также заняла команда из Китая — Invictus Gaming, одолевшая сегодня, 24 февраля, перуанскую BOOM Esports. Сильнейший из русскоязычных коллективов, Entity, остановился на стадии четвертьфинала.', '2024-02-24', 'assets/images/new7.png', 3),
(8, 'The International 2024 по Dota 2 пройдёт в Дании в сентябре', 'Студия Valve опубликовала новую запись в блоге Dota 2, в котором раскрыла первые подробности The International 2024. Чемпионат мира в этот раз пройдёт на Royal Arena в Копенгагене в сентябре вместо привычного в последние годы октября.\r\n<br><br>\r\nВ этот раз в турнире примут участие 16 коллективов вместо 20 — часть команд смогут попасть на турнир через открытые и региональные отборы. Остальные участники будут приглашены напрямую, как в самых первых итерациях турнира.\r\n<br><br>\r\nВсеми деталями The International 2024, включая наличие или отсутствие боевого пропуска или каких-либо других событий, приуроченных к турниру, разработчики поделятся в ближайшие месяцы.', '2024-03-09', 'assets/images/new8.png', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `id_place` int NOT NULL,
  `id_hall` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `places`
--

INSERT INTO `places` (`id_place`, `id_hall`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 5),
(42, 5),
(43, 5),
(44, 5),
(45, 5),
(46, 6),
(47, 6),
(48, 6),
(49, 6),
(50, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions` (
  `id_position` int NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`id_position`, `name`) VALUES
(1, 'Администратор'),
(2, 'Редактор'),
(3, 'Оператор');

-- --------------------------------------------------------

--
-- Структура таблицы `rentals`
--

CREATE TABLE `rentals` (
  `id_rental` int NOT NULL,
  `id_user` int NOT NULL,
  `id_rental_tariff` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `id_discount` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `rentals`
--

INSERT INTO `rentals` (`id_rental`, `id_user`, `id_rental_tariff`, `address`, `start_date`, `end_date`, `id_discount`) VALUES
(1, 1, 1, 'Троицк, Октябрьский пр-кт, 10', '2024-04-22', '2024-04-23', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `rental_tariffs`
--

CREATE TABLE `rental_tariffs` (
  `id_rental_tariff` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_device` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `rental_tariffs`
--

INSERT INTO `rental_tariffs` (`id_rental_tariff`, `name`, `id_device`, `price`) VALUES
(1, 'STANDARD', 1, 2880),
(2, 'GOLD', 2, 3120),
(3, 'PLATINUM', 3, 3360),
(4, 'DIAMOND', 4, 3600),
(5, 'PS5', 5, 4800),
(6, 'VR', 6, 3600);

-- --------------------------------------------------------

--
-- Структура таблицы `tournaments`
--

CREATE TABLE `tournaments` (
  `id_tournament` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `id_game` int NOT NULL,
  `format` varchar(16) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `prize_pool` int NOT NULL,
  `teams_amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tournaments`
--

INSERT INTO `tournaments` (`id_tournament`, `name`, `id_game`, `format`, `date`, `start_time`, `prize_pool`, `teams_amount`) VALUES
(1, 'Dota 2 Tournament', 3, '5x5', '2024-06-01', '10:00:00', 30000, 8),
(2, 'CS 2 Tournament', 3, '5x5', '2024-06-05', '10:00:00', 30000, 8),
(3, 'Valorant Tournament', 3, '5x5', '2024-06-10', '10:00:00', 30000, 8),
(4, 'CS 2 Tournament (2)', 3, '5x5', '2024-07-05', '10:00:00', 60000, 8),
(5, 'Valorant Tournament (2)', 3, '5x5', '2024-07-10', '10:00:00', 60000, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `tournament_participants`
--

CREATE TABLE `tournament_participants` (
  `id_tournament_participant` int NOT NULL,
  `id_tournament` int NOT NULL,
  `team` varchar(32) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tournament_participants`
--

INSERT INTO `tournament_participants` (`id_tournament_participant`, `id_tournament`, `team`, `id_user`) VALUES
(2, 1, 'Dumplings', 1),
(3, 1, 'TestTeam', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `second_name` varchar(32) NOT NULL,
  `patronymic` varchar(32) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone_number` varchar(16) NOT NULL,
  `email_address` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `second_name`, `patronymic`, `birthday`, `phone_number`, `email_address`, `password`) VALUES
(1, 'Михаил', 'Чиненов', 'Дмитриевич', '2004-01-19', '8(968)785-03-04', 'chinenov.misha122@mail.ru', '$2y$10$lhrB/0hLUzkMyDF8eefCDeZG37icW9xocyNOPn1af7YvLLK28DGT6'),
(5, 'Михаил', 'Чиненов', 'Дмитриевич', '2004-01-19', '8(968)785-03-04', 'isip_m.d.chinenov@mpt.ru', '$2y$10$vvMnIN6EFpqEKQfrQmsuIe7hrkRNyl7sFS3fOb4HlMa2yf58KzmWC');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_place` (`id_place`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_discount` (`id_discount`);

--
-- Индексы таблицы `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id_device`);

--
-- Индексы таблицы `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id_discount`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `id_position` (`id_position`);

--
-- Индексы таблицы `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_game`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id_genre`);

--
-- Индексы таблицы `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id_hall`),
  ADD KEY `id_device` (`id_device`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_new`),
  ADD KEY `id_game` (`id_game`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id_place`),
  ADD KEY `id_hall` (`id_hall`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id_position`);

--
-- Индексы таблицы `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id_rental`),
  ADD KEY `id_rental_tariff` (`id_rental_tariff`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `rental_tariffs`
--
ALTER TABLE `rental_tariffs`
  ADD PRIMARY KEY (`id_rental_tariff`),
  ADD KEY `id_device` (`id_device`);

--
-- Индексы таблицы `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id_tournament`),
  ADD KEY `id_game` (`id_game`);

--
-- Индексы таблицы `tournament_participants`
--
ALTER TABLE `tournament_participants`
  ADD PRIMARY KEY (`id_tournament_participant`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tournament` (`id_tournament`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id_booking` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `devices`
--
ALTER TABLE `devices`
  MODIFY `id_device` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id_discount` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id_genre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `halls`
--
ALTER TABLE `halls`
  MODIFY `id_hall` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_new` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `id_place` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `id_position` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id_rental` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `rental_tariffs`
--
ALTER TABLE `rental_tariffs`
  MODIFY `id_rental_tariff` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id_tournament` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tournament_participants`
--
ALTER TABLE `tournament_participants`
  MODIFY `id_tournament_participant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`id_place`) REFERENCES `places` (`id_place`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`id_discount`) REFERENCES `discounts` (`id_discount`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`id_position`) REFERENCES `positions` (`id_position`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genres` (`id_genre`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `halls`
--
ALTER TABLE `halls`
  ADD CONSTRAINT `halls_ibfk_1` FOREIGN KEY (`id_device`) REFERENCES `devices` (`id_device`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`id_hall`) REFERENCES `halls` (`id_hall`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`id_rental_tariff`) REFERENCES `rental_tariffs` (`id_rental_tariff`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `rentals_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `rental_tariffs`
--
ALTER TABLE `rental_tariffs`
  ADD CONSTRAINT `rental_tariffs_ibfk_1` FOREIGN KEY (`id_device`) REFERENCES `devices` (`id_device`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `tournaments`
--
ALTER TABLE `tournaments`
  ADD CONSTRAINT `tournaments_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `tournament_participants`
--
ALTER TABLE `tournament_participants`
  ADD CONSTRAINT `tournament_participants_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tournament_participants_ibfk_2` FOREIGN KEY (`id_tournament`) REFERENCES `tournaments` (`id_tournament`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
