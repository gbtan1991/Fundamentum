<?php


require 'includes/database.php';
require 'includes/functions.php';

session_start();

if (is_logged_in()) {
    redirect('dashboard.php');
} else {
    redirect('login.php');
}


?>
