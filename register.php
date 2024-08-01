<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <h2>Sign up here</h2>
    <form action="reg-process.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="mobile_number">Mobile Number</label>
        <input type="text" name="mobile_number" id="mobile_number" required>
        <br>
        <input type="submit" value="Sign up">

    </form>
    <div>
</body>
</html>