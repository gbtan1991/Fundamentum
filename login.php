<?php


require 'includes/database.php';
require 'includes/functions.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_username = sanitize_input($_POST["username"]);
    $user_password = sanitize_input($_POST["password"]);

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user_username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($user_password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user'] = $user_username;
            redirect('dashboard.php');
        } else {
            $login_error = "Invalid password";
        }
    } else {
        $login_error = "No user found with that username";
    }

    $stmt->close();
}

$conn->close();
?>

<?php include 'templates/header.php'; ?>

<h2>Login</h2>
<?php if (isset($login_error)): ?>
    <p style="color: red;"><?php echo $login_error; ?></p>
<?php endif; ?>
<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <input type="submit" value="Login">
</form>

<?php include 'templates/footer.php'; ?>


