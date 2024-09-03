<?php
session_start();

include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!";


?>
