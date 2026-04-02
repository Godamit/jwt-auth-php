<?php
require 'auth.php'; // protects page
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - JWT Auth</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card">
    <h2>User Dashboard</h2>
    <p>Welcome to your secure area. This page is protected by a JSON Web Token.</p>

    <div class="user-info">
        <span>User Identifier</span>
        <strong>ID: <?php echo htmlspecialchars($user_id); ?></strong>
    </div>

    <div class="user-info">
        <span>Email Address</span>
        <strong><?php echo htmlspecialchars($email); ?></strong>
    </div>

    <div style="margin-top: 30px;">
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>

    <br>
    <a href="index.php" style="color: #71717a;">Back to Home</a>
</div>

</body>
</html>
