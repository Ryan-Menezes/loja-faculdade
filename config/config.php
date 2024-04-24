<?php

if (!isset($_SESSION)) session_start();

define('URL', 'http://localhost:8080/');

define('DB_SERVER', 'localhost');
define('DB_DATABASE', 'loja');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'utf8mb4');

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/../src/Database.php';
