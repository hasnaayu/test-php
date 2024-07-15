<?php

$tokens = [];

function generate_token($user)
{
    global $token;
    $token = bin2hex(random_bytes(16));
    if (!isset($token[$user])) {
        $tokens[$user] = [];
    }
    $tokens[$user][] = $token;

    if (count($tokens[$user]) > 10) {
        array_shift($tokens[$user]);
    }

    return $token;
}

function verify_token($user, $token)
{
    global $token;

    if (isset($token[$user])) {
        $index = array_search($token, $token[$user]);
        if ($index != false) {
            unset($tokens[$user][$index]);
            $token[$user] = array_values($token[$user]);
            return true;
        }
    }

    return false;
}

$user = "Username";
echo "Token 1: " . generate_token($user) . "\n";
echo "Token 2: " . generate_token($user) . "\n";

echo verify_token($user, "random token") ? "Valid \n" : "Invalid \n";

$generated_token = generate_token($user);

echo "Token 3: " . generate_token($user) . "\n";
echo verify_token($user, $generated_token) ? "Valid \n" : "Invalid \n";
