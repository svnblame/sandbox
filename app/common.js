$(document).ready(function() {
    $("#login").click(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "login.php",
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            success: function(response) {
                if (response == 'true') {
                    // Login successful, you can redirect or perform other actions
                    $("#login_form").fadeOut("normal");
                    setTimeout('window.location.href = "welcome.php"', 1000);
                } else {
                    // Login failed, show error message
                    $("#error-message").addClass("alert-danger");
                    $("#error-message").text("Invalid username or password. Please try again.");
                    $("#error-message").show();
                    $("#login_form").find('input').val('');
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error here
            }
        });
        return false
    });
});
