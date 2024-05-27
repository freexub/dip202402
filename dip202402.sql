-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 27 2024 г., 17:50
-- Версия сервера: 5.7.39
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dip202402`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1716820666);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/personal/*', 2, NULL, NULL, NULL, 1716820646, 1716820646),
('admin', 1, NULL, NULL, NULL, 1716820658, 1716820658),
('adminAccess', 2, NULL, NULL, NULL, 1716820651, 1716820651);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('adminAccess', '/personal/*'),
('admin', 'adminAccess');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forms`
--

INSERT INTO `forms` (`id`, `name`, `active`) VALUES
(1, 'Выговор', 0),
(2, 'Благодарность', 0),
(3, 'Командировка', 0),
(4, 'Адрес проживания', 0),
(5, 'Повышение квалификации', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `forms_fields`
--

CREATE TABLE `forms_fields` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forms_fields`
--

INSERT INTO `forms_fields` (`id`, `form_id`, `name`, `type`, `active`) VALUES
(7, 1, 'Причина', 'text', 0),
(8, 1, 'Описание', 'textarea', 0),
(16, 2, 'Название', 'text', 0),
(17, 2, 'Описание', 'textarea', 0),
(18, 1, 'Дата', 'data', 0),
(19, 1, 'Номер', 'text', 0),
(20, 3, 'Место назначения', 'text', 0),
(21, 3, 'Причина', 'textarea', 0),
(22, 3, 'Дата отправления', 'data', 0),
(23, 3, 'Дата возвращения', 'data', 0),
(24, 4, 'Город', 'text', 0),
(25, 4, 'Улица', 'text', 0),
(26, 4, 'Номер дома', 'text', 0),
(27, 4, 'Дата регистрации', 'data', 0),
(28, 5, 'Название организация', 'text', 0),
(29, 5, 'Адрес организации', 'text', 0),
(30, 5, 'Дата начала', 'data', 0),
(31, 5, 'Дата окончания', 'data', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `forms_fields_data`
--

CREATE TABLE `forms_fields_data` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forms_fields_data`
--

INSERT INTO `forms_fields_data` (`id`, `form_id`, `user_id`, `content`, `date_create`, `active`) VALUES
(4, 2, 2, '{\"16\":\"\\u0411\\u043b\\u0430\\u0433\\u043e\\u0434\\u0430\\u0440\\u043d\\u043e\\u0441\\u0442\\u044c \\u043e\\u0442 \\u0440\\u0443\\u043a\\u043e\\u0432\\u043e\\u0434\\u0441\\u0442\\u0432\\u0430\",\"17\":\"\\u0417\\u0430 \\u043f\\u0440\\u043e\\u044f\\u0432\\u043b\\u0435\\u043d\\u043d\\u0443\\u044e \\u0441\\u0430\\u043c\\u043e\\u043e\\u0442\\u0432\\u0435\\u0440\\u0436\\u0435\\u043d\\u043d\\u043e\\u0441\\u0442\\u044c, \\u0438 \\u0432\\u044b\\u0441\\u043e\\u043a\\u0438\\u0435 \\u043f\\u0440\\u043e\\u0444\\u0435\\u0441\\u0441\\u0438\\u043e\\u043d\\u0430\\u043b\\u044c\\u043d\\u044b\\u0435 \\u043a\\u0430\\u0447\\u0435\\u0441\\u0442\\u0432\\u0430 \"}', '2024-05-19 06:32:09', 0),
(5, 1, 1, '{\"7\":\"\\u0412\\u044b\\u0433\\u043e\\u0432\\u043e\\u0440 \\u0437\\u0430 \\u043e\\u043f\\u043e\\u0437\\u0434\\u0430\\u043d\\u0438\\u044f\",\"8\":\"\\u0421\\u043e\\u0442\\u0440\\u0443\\u0434\\u043d\\u0438\\u043a \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438\\u043b 3-\\u0435 \\u043e\\u043f\\u043e\\u0437\\u0434\\u0430\\u043d\\u0438\\u0435 \\u0437\\u0430 \\u043c\\u0435\\u0441\\u044f\\u0446\",\"18\":\"17-\\u041c\\u0430\\u0439-2023\",\"19\":\"2\"}', '2023-05-19 13:03:46', 0),
(6, 3, 1, '{\"20\":\"\\u0421\\u043a\\u043b\\u0430\\u0434\\u0441\\u043a\\u0438\\u0435 \\u043f\\u043e\\u043c\\u0435\\u0449\\u0435\\u043d\\u0438\\u044f \\u0432 \\u0433. \\u0411\\u0430\\u043b\\u0445\\u0430\\u0448\",\"21\":\"\\u0410\\u0443\\u0434\\u0438\\u0442\\u043e\\u0440\\u0441\\u043a\\u0430\\u044f \\u043f\\u0440\\u043e\\u0432\\u0435\\u0440\\u043a\\u0430 \\u0438\\u0442\\u043e\\u0433\\u043e\\u0432 \\u0438\\u043d\\u0432\\u0435\\u043d\\u0442\\u0430\\u0440\\u0438\\u0437\\u0430\\u0446\\u0438\\u0438\",\"22\":\"05-\\u0418\\u044e\\u043d-2023\",\"23\":\"08-\\u0418\\u044e\\u043d-2023\"}', '2023-05-20 00:40:32', 0),
(9, 2, 4, '{\"16\":\"\\u0411\\u043b\\u0430\\u0433\\u043e\\u0434\\u0430\\u0440\\u043d\\u043e\\u0441\\u0442\\u044c \\u043e\\u0442 \\u0440\\u0443\\u043a\\u043e\\u0432\\u043e\\u0434\\u0441\\u0442\\u0432\\u0430\",\"17\":\"\\u0425\\u0432\\u0430\\u043b\\u044e!!!!\"}', '2024-05-27 14:24:47', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `about` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `name`, `about`, `active`) VALUES
(1, 'Анализ поля ближней зоны', '<p>При помощи пробника поля ближней зоны были выявлены источники помех и механизмы связи. Для этого были слегка изменены настройки осциллографа, особенно следующие:</p>\r\n\r\n<ul>\r\n	<li>Снижена чувствительность: <strong>5 мВ/дел вместо 1 мВ/дел</strong>. Во время измерения с помощью пробников поля ближней зоны возникают относительно высокие уровни. Чтобы избежать перегрузки необходимо понизить чувствительность</li>\r\n	<li>Изменен масштаб по вертикали: в диалоговом окне настроек БПФ был изменен масштаб вертикальной оси с помощью опции &quot;manual range&quot;, чтобы БПФ спектр полностью отображался на экране и был более читабелен</li>\r\n</ul>\r\n\r\n<p>На следующих страницах приведены фотографии, снимки экрана и пояснения, показывающие способы работы с пробниками поля ближней зоны и обнаружения источников помех.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Итоги выявления ЭМП</strong></span></p>\r\n\r\n<ul>\r\n	<li>На основе результатов измерения поля в дальней зоне с помощью анализа поля ближней зоны и тока РЧП удалось обнаружить источники помех и определить механизмы связи</li>\r\n	<li>Были обнаружены следующие источники помех: процессор (интерфейс RGMII), модули LAN PHY и основной преобразователь напряжения. Дальнейший анализ показал, что синфазные помехи связываются через питание модулей LAN PHY, а также через конвертер сети LAN на кабеле LAN. Связь с кабелем трубки возникает через процессор или как гальваническая связь из-за трассировки платы</li>\r\n	<li>На основе проведенного анализа можно предложить меры по значительному снижению ВЧ излучения, например, фильтрация и согласованная нагрузка, изменения в трассировке платы в районе интерфейса RGMII (обратный тракт для синфазного тока), улучшения заземляющего соединения для экрана кабеля LAN, улучшения системы шины питания (с более низким импедансом) для модулей LAN PHY и процессора, а также улучшения трассировки и изменения в цепи в районе основного преобразователя напряжения</li>\r\n</ul>\r\n', 0),
(3, 'Измерения тока РЧП в соединительных линиях', '<p>На первом этапе проводится измерение уровня помех во всех соединительных линиях и определение максимума. Наибольший ток РЧП протекает через синий кабель LAN (см. рис. 4-9). Этот кабель является критической антенной для устранения связи с дальней зоной. Для измерений использовался токовый пробник с передаточным импедансом 20 дБОм. Предусилитель не использовался. Таким образом, уровень тока РЧП можно вычислить напрямую как отображаемый на экране осциллографа уровень напряжения (в дБмкВ) минус 20 дБ. В описанном ниже примере вычисленный ток равнялся 14 дБмкА (или 5 мкА), исходя из отображаемого уровня напряжения в <strong>34 дБмкВ на 375 МГц.</strong> Это уже критический уровень, согласно оценке.&nbsp;</p>\r\n\r\n<p>Помимо излучений на частоте 250 МГц и 375 МГц, которые были обнаружены в поле дальней зоны, можно также наблюдать и другие излучения, такие как широкополосная помеха на частоте 360 МГц. Последняя, однако, не является проблемой для электромагнитной совместимости (см. измерения поля в дальней зоне) и поэтому в дальнейшем не учитывается.</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_chart`
--

CREATE TABLE `personal_chart` (
  `id` int(11) NOT NULL COMMENT 'Номер',
  `user_id` int(11) NOT NULL COMMENT 'сотрудник',
  `termenal_id` int(11) NOT NULL DEFAULT '1' COMMENT 'Терминал',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата',
  `type` int(2) NOT NULL DEFAULT '0' COMMENT 'Тип'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `personal_chart`
--

INSERT INTO `personal_chart` (`id`, `user_id`, `termenal_id`, `date`, `type`) VALUES
(1, 1, 1, '2024-05-06 07:52:43', 0),
(2, 1, 1, '2024-05-06 17:57:14', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_departments`
--

CREATE TABLE `personal_departments` (
  `id` int(11) NOT NULL COMMENT 'Номер отдела',
  `name` varchar(150) NOT NULL COMMENT 'Название отдела'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `personal_departments`
--

INSERT INTO `personal_departments` (`id`, `name`) VALUES
(1, 'IT отдел'),
(2, 'Служба безопасности'),
(3, 'Кассир'),
(4, 'Директор');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_pages`
--

CREATE TABLE `personal_pages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `about` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `personal_pages`
--

INSERT INTO `personal_pages` (`id`, `name`, `about`, `active`) VALUES
(1, 'Что такое банковские реквизиты?', 'Наименование или Фамилия Имя Отчество клиента\r\nИНН клиента\r\nКПП клиента (обязателен ТОЛЬКО при платежах в бюджет, в остальных случаях может не указываться)\r\nДвадцатизначный номер банковского счета (расчетного, текущего)\r\nНаименование и местонахождение (город) банка, где у клиента открыт счет', 0),
(2, 'Как с нами связаться?', 'Вы можете связаться с нами любым удобным для вас способом\r\n\r\n \r\n\r\nЧерез сайт\r\n\r\nОтправьте заявку в нашу службу поддержки прямо на этом сайте. Для этого нажмите на кнопку Отправить запрос в верхней части страницы, опишите вашу проблему и укажите контактные данные, чтобы мы могли с вами связаться.\r\n\r\nПо электронной почте\r\n\r\nНапишите нам письмо на адрес hello@sirius.kz', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_profile`
--

CREATE TABLE `personal_profile` (
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `full_name` varchar(250) NOT NULL COMMENT 'Полное имя',
  `iin` int(13) NOT NULL COMMENT 'ИИН',
  `adderess` varchar(500) NOT NULL COMMENT 'Адрес',
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания',
  `date_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Последняя дата редактирования',
  `active` int(11) NOT NULL DEFAULT '0' COMMENT 'Статус',
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `personal_profile`
--

INSERT INTO `personal_profile` (`user_id`, `full_name`, `iin`, `adderess`, `date_create`, `date_update`, `active`, `department_id`) VALUES
(1, 'Василий Пупкин', 954455663, 'Проспект Нурсултана-Назарбаева, 50, 17', '2024-03-05 04:46:33', '2024-04-05 05:34:33', 0, 1),
(2, 'Иванов Иван', 12154512, 'ул. Абая, 11/1, 17', '2024-03-05 14:59:08', NULL, 0, 1),
(4, 'Ирина Сергеевна', 22233442, 'ул. Гоголя, 21', '2024-03-05 15:00:17', NULL, 0, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_profile_departments`
--

CREATE TABLE `personal_profile_departments` (
  `id` int(11) NOT NULL COMMENT 'Номер',
  `user_id` int(11) NOT NULL COMMENT 'Сотрудник',
  `department_id` int(11) NOT NULL COMMENT 'Отдел',
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата назначения',
  `date_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата изменения',
  `active` int(11) NOT NULL DEFAULT '0' COMMENT 'Статус'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'W_EjlLE5vy-u092E_bTnctfnOOEe_DjR', '$2y$13$VKmqM6YZJAWFQNMvDPIbXuHXu0fTCpSzeQ7Yg772pQGReBkmG7M4W', 'eV6p-qGDtnT8l_NREOwMvVY3FCuoY3Ml_1547315815', 'k.shtefan@kstu.kz', 10, 1527151406, 1547315815);

-- --------------------------------------------------------

--
-- Структура таблицы `users_group`
--

CREATE TABLE `users_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_group`
--

INSERT INTO `users_group` (`id`, `user_id`, `group_id`, `active`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 4, 1, 0),
(4, 2, 2, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forms_fields`
--
ALTER TABLE `forms_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

--
-- Индексы таблицы `forms_fields_data`
--
ALTER TABLE `forms_fields_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forms_fields_data_ibfk_1` (`form_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_chart`
--
ALTER TABLE `personal_chart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_departments`
--
ALTER TABLE `personal_departments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_profile`
--
ALTER TABLE `personal_profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `forms_fields`
--
ALTER TABLE `forms_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `forms_fields_data`
--
ALTER TABLE `forms_fields_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_chart`
--
ALTER TABLE `personal_chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Номер', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `personal_departments`
--
ALTER TABLE `personal_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Номер отдела', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `personal_profile`
--
ALTER TABLE `personal_profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Пользователь', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
