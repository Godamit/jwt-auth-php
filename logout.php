<?php
// destroy JWT cookie
setcookie("token", "", time() - 3600, "/");

// redirect to login
header("Location: login.php");
exit;
