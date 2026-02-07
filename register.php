<?php
// show errors during development
ini_set('display_errors', 1);
error_reporting(E_ALL);

// include database connection
require_once __DIR__ . '/db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // basic validation
    if (empty($email) || empty($password)) {
        $message = "All fields are required";
    } else {

        // 1️⃣ check if email already exists
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "Email already exists";
        } else {

            // 2️⃣ hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // 3️⃣ insert user
            $stmt = $conn->prepare(
                "INSERT INTO users (email, password) VALUES (?, ?)"
            );
            $stmt->bind_param("ss", $email, $hashedPassword);

            if ($stmt->execute()) {
                $message = "Registration successful";
            } else {
                $message = "Something went wrong";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card register">

<h2>Register</h2>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

<p><?php echo htmlspecialchars($message); ?></p>

<a href="login.php">Already have an account?</a>

</div>

</body>
</html>
