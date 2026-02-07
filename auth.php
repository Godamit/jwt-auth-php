<?php
require_once __DIR__ . '/jwt.php';

// check if token exists in cookie
if (!isset($_COOKIE['token'])) {
    // no token → not logged in
    header("Location: login.php");
    exit;
}

$token = $_COOKIE['token'];

try {
    // verify token (signature + expiry)
    $decoded = verifyJWT($token);

    // user data from token
    $user_id = $decoded->user_id;
    $email   = $decoded->email;

} catch (Exception $e) {
    // invalid or expired token
    header("Location: login.php");
    exit;
}
