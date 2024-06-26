<?php

require_once 'include/session.php';

if (empty($_SESSION['login']) && empty($_SESSION['password'])) {
    header("Location: /index.php");
    exit;
} else {
    $_SESSION = array();
    session_destroy();
    unset($_SESSION['login']);
    unset($_SESSION['password']);
    header("Location: /index.php");
    exit;
}