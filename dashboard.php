<?php
ob_start();
require 'includes/database.php';
require 'includes/functions.php';
session_start();
login_required();

include 'templates/header.php';

$username = $_SESSION['user'];

echo "<h2>Welcome to your Dashboard, $username</h2>";

include 'templates/footer.php';

ob_end_flush();
?>
