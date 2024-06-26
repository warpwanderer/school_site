<?php

/* Установка внутренней кодировки в UTF-8 */
mb_internal_encoding("UTF-8");

header('Content-Type: text/html; charset=UTF-8');

//Выводим ошибки связанные с PHP
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
error_reporting(E_ALL &~ E_NOTICE);

//Создаем переменные для подключения

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'test';

$lnk = mysql_connect($dbHost, $dbUser, $dbPass)
or die ('Not connected : ' . mysql_error());
// сделать foo текущей базой данных
mysql_select_db($dbName, $lnk) or die ('Can\'t use foo : ' . mysql_error());
mysql_set_charset('utf8', $lnk);

// Подключаем функции

require_once 'function.php';