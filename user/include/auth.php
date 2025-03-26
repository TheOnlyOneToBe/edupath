<?php
function isLoggedIn() {
    return isset($_SESSION['user']) && !empty($_SESSION['user']['user_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: /edupath/login.php');
        exit();
    }
}

function logout() {
    session_start();
    session_destroy();
    header('Location: /edupath/login.php');
    exit();
}

function isAdmin() {
    return isLoggedIn() && (strtolower($_SESSION['user']['user_fonction']) === 'admin');
}

function isGerant() {
    return isLoggedIn() && (strtolower($_SESSION['user']['user_fonction']) === 'gerant');
}

function isUser() {
    return isLoggedIn() && !isAdmin() && !isGerant();
}
?>