<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'fulldrive' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'fulldrive' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'iQCv1PgqXyK1gWbQ' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7T21PtUJkaDYR*v8.z~`JDdn3#E3Vko/T%6[p0wb@/0~1y![a?<95{FdXnJ7r$Zl' );
define( 'SECURE_AUTH_KEY',  'yW~#x[ux-D2?vnt#:N9IZq{zJY!tOgo9-07ut-]U,z5me>~VY&Rr>>G@L@n1UGnf' );
define( 'LOGGED_IN_KEY',    't^_OXk@{B|pT&Ikm5fLQGL_(dn#Fv<s@123JeM&DEn[YMy3aY!yI@6<O*]D6I_%K' );
define( 'NONCE_KEY',        'jv@Q!z|aK*k*3yT5:Z+1@eWiXfW0a:=O@4p!kzG@k:y$hO8U~RWW8P30W#3UYhzS' );
define( 'AUTH_SALT',        '-{48@#ef]Xp[IS}|-gD;_)ngbaQ&Xv.4a8Mb^kt+&P20K<f9S$vfnmD#;0jsb}E!' );
define( 'SECURE_AUTH_SALT', '2o)2#5k#M!X<|-dPoHe_7^T|/0d)7<Eq~8eQ&?xLc6l_+iA5R<J`Bnn-Co%-4++a' );
define( 'LOGGED_IN_SALT',   'm?Wi5:)8&bRms;.bP6NR#:<pk:4k5}J}<}1-+j]0!9caz0|&||Xj:H2QiTPs5.:9' );
define( 'NONCE_SALT',       'i/b><9ZTVn/G?mhB`qW4D:9O+%<-hU^E|hqsnywmW@l]dUrX(yd2?}M^hxIJ)N t' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'fulldrive_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
