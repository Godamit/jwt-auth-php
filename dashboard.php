<?php
require 'auth.php'; // protects page
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>
<?php
require 'auth.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card dashboard">

<h2>Dashboard</h2>

<p><strong>User ID:</strong> <?php echo $user_id; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>

<a href="logout.php">Logout</a>

</div>

</body>
</html>

</html>
