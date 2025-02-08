<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-i">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php if (empty($_SESSION['username'])) { ?>
        <div class="container mt-5" id="login_form">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">
                            <div class="alert" id="error-message" style="display: none;"></div>
                            <form action="login.php">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                                </div>
                                <button type="submit" class="btn btn-primary" id="login">Login</button>
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