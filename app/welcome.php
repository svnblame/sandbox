<?php
    session_start();
    $auth_expires = date_create($_SESSION['auth_expires']);
    $dt_current = date_create(date('Y-m-d H:i:s'));
    $interval = date_diff($dt_current, $auth_expires);
    $interval->format('%r%i');
    $minutes = $interval->days * 24 * 60;
    $minutes += $interval->h * 60;
    $minutes += $interval->i;
    $minutes = (int)$interval->format('%r%i');
    $authenticated = $minutes >= 0 && $minutes <= 5;
    $displayName = $_SESSION['display_name'];

if ($authenticated) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-i">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">
    <title>Welcome</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5" id="login_form">
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
<?php } else header('Location: index.php'); ?>
