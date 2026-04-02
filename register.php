<?php
// show errors during development
ini_set('display_errors', 1);
error_reporting(E_ALL);

// include database connection
require_once __DIR__ . '/db.php';

$message = "";
$messageClass = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // basic validation
    if (empty($email) || empty($password)) {
        $message = "All fields are required";
        $messageClass = "error-msg";
    } else {

        // 1️⃣ check if email already exists
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "Email already exists";
            $messageClass = "error-msg";
        } else {

            // 2️⃣ hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // 3️⃣ insert user
            $stmt = $conn->prepare(
                "INSERT INTO users (email, password) VALUES (?, ?)"
            );
            $stmt->bind_param("ss", $email, $hashedPassword);

            if ($stmt->execute()) {
                $message = "Registration successful! You can now login.";
                $messageClass = "success-msg";
            } else {
                $message = "Something went wrong. Please try again.";
                $messageClass = "error-msg";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - JWT Auth</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card">
    <h2>Create Account</h2>
    <p>Join us today to get started.</p>

    <form method="POST">
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>

    <?php if ($message): ?>
        <p class="<?php echo $messageClass; ?>" style="margin-top: 15px;"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <a href="login.php">Already have an account? Login</a>
    <br>
    <a href="index.php" style="color: #71717a;">Back to Home</a>
</div>

</body>
</html>
