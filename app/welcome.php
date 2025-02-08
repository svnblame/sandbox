<?php
    session_start();
    if ($_SESSION['auth_token'])
    $displayName = $_SESSION['display_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-i">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php if (!empty($displayName)) { ?>
    <div class="container mt-5" id="login_form">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Welcome <?= $displayName; ?>!
                    </div>
                    <div class="card-body">
                        <p class="mb-6">You have successfully logged in!</p>
                        <form action="logout.php">
                            <button type="submit" class="btn btn-primary" id="logout">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="common.js"></script>
</body>
</html>