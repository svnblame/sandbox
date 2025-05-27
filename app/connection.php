<?php
require_once "helper_functions.php";
$db_auth = config('auth')['db'];

// Database connection parameters
$host = $db_auth['host'];
$user = $db_auth['username'];
$pass = $db_auth['password'];
$db   = $db_auth['name'];

// Create a new PDO object to establish a database connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    return $conn;
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
