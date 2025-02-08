<?php
session_start();
include_once("connection.php");
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
    $auth_token = md5(uniqid(rand(), true));
    $expire_date = date("Y-m-d H:i:s", strtotime("+30 minutes"));
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
