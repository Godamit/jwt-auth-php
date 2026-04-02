<?php
require_once __DIR__ . '/jwt.php';

$loggedIn = false;
$user_email = "";

if (isset($_COOKIE['token'])) {
    try {
        $decoded = verifyJWT($_COOKIE['token']);
        $loggedIn = true;
        $user_email = $decoded->email;
    } catch (Exception $e) {
        // Invalid token, treat as not logged in
        setcookie("token", "", time() - 3600, "/");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JWT Auth - Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card">
    <h2>JWT Auth System</h2>

    <?php if ($loggedIn): ?>
        <p>Welcome back, <strong><?php echo htmlspecialchars($user_email); ?></strong>!</p>
        <div style="margin-top: 20px;">
            <a href="dashboard.php" class="btn">Go to Dashboard</a>
            <a href="logout.php" style="color: #ff4444;">Logout</a>
        </div>
    <?php else: ?>
        <p>Securely manage your account with JSON Web Tokens.</p>
        <div style="margin-top: 20px;">
            <a href="login.php" class="btn">Login</a>
            <a href="register.php">Register</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
