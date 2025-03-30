<?php
function isLoggedIn() {
    if(isset($_SESSION['user']) && !empty($_SESSION['user']['user_id'])){
     return null;
    }
    else {
    return 0;
    };
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: ../login.php');
        exit();
    }
}

function logout() {
    session_start();
    session_destroy();
    header('Location: ../login.php');
    exit();
}

function isAdmin() {
    if((strtolower($_SESSION['user']['user_fonction']) === 'admin')){
        return 1;
    }   
    else {
        return 0;
    }
}

function isGerant() {
    return isLoggedIn() && (strtolower($_SESSION['user']['user_fonction']) === 'gerant');
}
function is_secretaire(){
    return isLoggedIn() && (strtolower($_SESSION['user']['user_fonction']) === 'sect');
}

function isUser() {
    return isLoggedIn() && !isAdmin() && !isGerant();
}
?>