<!DOCTYPE html>
<html>
<head>
    <title>Budget Tracker</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Budget Tracker</h1>
        <?php if (is_logged_in()): ?>
            <nav>
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            </nav>
        <?php else: ?>
            <nav>
                <a href="index.php">Home</a>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            </nav>
        <?php endif; ?>
    </header>
