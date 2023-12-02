<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect if already logged in
    exit();
}

$registered = isset($_GET['registered']) && $_GET['registered'] === 'true'; // Check if registered

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php if ($registered) : ?>
        <p>Thank you for registering! Please log in with your new credentials.</p>
    <?php endif; ?>

    <h2>Login</h2>
    <form method="post" action="login.php">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

