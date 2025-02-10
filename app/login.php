<?php
session_start();
require_once("connection.php");
require_once("helper_functions.php");

$session_timeout = config('auth')['session']['timeout'];

$username = $_POST["username"];
$password = md5($_POST["password"]);

// Fetch data from database
$sql = "SELECT display_name FROM users WHERE name=? AND password=?";
$query = $conn->prepare($sql);
$query->bindParam(1, $username);
$query->bindParam(2, $password);
$query->execute();
$result = $query->fetch();
if ($result) {
    $_SESSION['display_name'] = $result["display_name"];
    $_SESSION['username'] = $username;
//    $auth_token = md5(uniqid(rand(), true));
    $auth_token = bin2hex(random_bytes(32));
    $expire_date = date("Y-m-d H:i:s", strtotime("{$session_timeout} minutes"));
    $sql = "UPDATE users SET auth_token=?, auth_expires=? WHERE name=?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $auth_token);
    $query->bindParam(2, $expire_date);
    $query->bindParam(3, $username);
    $query->execute();
    $_SESSION['auth_token'] = $auth_token;
    $_SESSION['auth_expires'] = $expire_date;
    echo 'true';
} else {
    echo 'false';
}
