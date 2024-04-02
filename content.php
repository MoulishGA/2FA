<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome to the Content Page</h2>
        <p>You have successfully logged in!</p>
    </div>
</body>
</html>