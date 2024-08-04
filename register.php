<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'includes/database.php';
require 'includes/functions.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_username = sanitize_input($_POST["username"]);
    $user_password = sanitize_input($_POST["password"]);
    $user_email = sanitize_input($_POST["email"]);
    $user_mobile_number = sanitize_input($_POST["mobile_number"]);

    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password, email, mobile_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $user_username, $hashed_password, $user_email, $user_mobile_number);

    if ($stmt->execute()) {
        echo "Registration successful. You can now <a href='login.php'>login</a>.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

include 'templates/header.php';
?>

<h2>Register</h2>
<form action="register.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="mobile_number">Mobile Number:</label>
    <input type="text" id="mobile_number" name="mobile_number" required><br><br>

    <input type="submit" value="Register">
</form>

<?php include 'templates/footer.php'; ?>

<?php ob_end_flush(); ?>
