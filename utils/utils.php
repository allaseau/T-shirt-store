<?php

function redirect($url, $permanent = false) {
    if (headers_sent() === false) {
        header("location: $url", true, ($permanent === true ? 301 : 302));
    }
    exit();
}

function prevent_not_connected() {
    $connected = isset($_SESSION['login']);
    if (!$connected) {
        $redirect_url = urlencode($_SERVER['PHP_SELF']);
        redirect('./login.php?redirect=' . $redirect_url);
    }
}

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function logout() {
    session_destroy();
    redirect("./index.php");
}