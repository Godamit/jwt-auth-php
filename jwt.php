<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "a8F#9Lq2!mZxP0vE4Rk@W7dY3C1HnUeJ";


function generateJWT($user_id, $email) {
    global $secret_key;

    $payload = [
        "iss" => "localhost",
        "iat" => time(),
        "exp" => time() + (60 * 30),
        "user_id" => $user_id,
        "email" => $email
    ];

    return JWT::encode($payload, $secret_key, 'HS256');
}

function verifyJWT($token) {
    global $secret_key;
    return JWT::decode($token, new Key($secret_key, 'HS256'));
}
