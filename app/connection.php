<?php
require_once "helper_functions.php";
$db_auth = config('auth')['db'];

// Database connection parameters
$host = 'mysql-db';      // MySQL hostname within the same Docker network
$user = 'db_user';       // MySQL username
$pass = 'password';      // MySQL user's password
$db   = 'sandbox';       // MySQL database name

// Create a new PDO object to establish a database connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
