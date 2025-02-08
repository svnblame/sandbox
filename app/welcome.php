<?php
    session_start();
    require_once "helper_functions.php";
    require_once "connection.php";

    $authenticated = false;

    $sql = "SELECT auth_token FROM users WHERE name=?";
    $query = $conn->prepare($sql);
    $query->bindParam(1, $_SESSION['username'], PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    $valid_session_user = $user['auth_token'] === $_SESSION['auth_token'];

    $session_timeout = config('auth')['session']['timeout'];
    $auth_expires = date_create($_SESSION['auth_expires']);
    $dt_current = date_create(date('Y-m-d H:i:s'));
    $interval = date_diff($dt_current, $auth_expires);
    $minutes = $interval->days * 24 * 60;
    $minutes += $interval->h * 60;
    $minutes += $interval->i;
    $minutes = (int)$interval->format('%r%i');
    $valiid_session_time = $minutes >= 0 && $minutes <= $session_timeout;

    $authenticated = $valid_session_user && $valiid_session_time;

    $displayName = $_SESSION['display_name'];



if ($authenticated) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-i">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
    <title>Welcome</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5" id="welcome_page">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Welcome <?= $displayName; ?>!
                    </div>
                    <div class="card-body">
                        <p class="mb-6">You have successfully logged in!</p>
                        <p class="mb-6">Your session will expire in <?= $minutes + 1 ?> minutes.</p>
                        <form action="logout.php">
                            <button type="submit" class="btn btn-primary" id="logout">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="common.js"></script>
</body>
</html>
<?php } else {
    session_destroy();
    header('Location: index.php');
} ?>
