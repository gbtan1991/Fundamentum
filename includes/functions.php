<?php
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function generate_uuid() {
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function is_logged_in() {
    return isset($_SESSION['user_uuid']);
}

function login_required() {
    if (!is_logged_in()) {
        redirect('login.php');
    } else {
        redirect('dashboard.php');
    }
}
?>