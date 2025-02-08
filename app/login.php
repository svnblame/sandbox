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
$query->bindParam(1, $username, PDO::PARAM_STR);
$query->bindParam(2, $password, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch();
if (count($result) > 0) {
    $_SESSION['display_name'] = $result["display_name"];
    $_SESSION['username'] = $username;
    $auth_token = md5(uniqid(rand(), true));
    $expire_date = date("Y-m-d H:i:s", strtotime("{$session_timeout} minutes"));
    $sql = "UPDATE users SET auth_token=?, auth_expires=? WHERE name=?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $auth_token, PDO::PARAM_STR);
    $query->bindParam(2, $expire_date, PDO::PARAM_STR);
    $query->bindParam(3, $username, PDO::PARAM_STR);
    $query->execute();
    $_SESSION['auth_token'] = $auth_token;
    $_SESSION['auth_expires'] = $expire_date;
    echo 'true';
} else {
    echo 'false';
}
