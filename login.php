<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';
require_once __DIR__ . '/jwt.php';

$message = "";
$messageClass = "";

// If already logged in, redirect to dashboard
if (isset($_COOKIE['token'])) {
    try {
        verifyJWT($_COOKIE['token']);
        header("Location: dashboard.php");
        exit;
    } catch (Exception $e) {
        // Token invalid, continue to login
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // fetch user from DB
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        // verify password
        if (password_verify($password, $user["password"])) {

            // generate JWT
            $token = generateJWT($user["id"], $email);

            // store JWT in cookie
            setcookie(
                "token",
                $token,
                time() + (60 * 30), // 30 min
                "/",
                "",
                false,
                true // httponly
            );

            // redirect to dashboard
            header("Location: dashboard.php");
            exit;

        } else {
            $message = "Invalid email or password.";
            $messageClass = "error-msg";
        }
    } else {
        $message = "Invalid email or password.";
        $messageClass = "error-msg";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - JWT Auth</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card">
    <h2>Welcome Back</h2>
    <p>Enter your credentials to access your account.</p>

    <form method="POST">
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <?php if ($message): ?>
        <p class="<?php echo $messageClass; ?>" style="margin-top: 15px;"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <a href="register.php">Don't have an account? Register</a>
    <br>
    <a href="index.php" style="color: #71717a;">Back to Home</a>
</div>

</body>
</html>
