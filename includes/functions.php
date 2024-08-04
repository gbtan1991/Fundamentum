<?php
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function redirect($url) {
    // Clear the output buffer to ensure no headers are sent before the redirect
   
        header("Location: $url");
        exit();
    
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function login_required() {
    if (!is_logged_in()) {
        redirect('login.php');
    }
}
?>
