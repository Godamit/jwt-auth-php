
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'db.php';
require_once __DIR__ . '/jwt.php';

$message = "";

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
            // echo $token;
            // exit;
            
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
            $message = "Invalid credentials";
        }
    } else {
        $message = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
<!-- <button onclick="toggleTheme()">Toggle Theme</button> -->


<div class="card login">

<h2>Login</h2>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<p><?php echo $message; ?></p>

<a href="register.php">Create new account</a>

</div>
</body>
</html>
