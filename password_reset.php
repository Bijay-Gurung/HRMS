<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link href="passwordReset.css" rel="stylesheet">
            <style>
        .password-reset {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .password-reset h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .password-reset form {
            margin-bottom: 20px;
        }

        .password-reset p {
            margin-top: 10px;
            font-size: 18px;
            text-align: left;
        }

        .password-reset input[type="text"],
        .password-reset input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .password-reset input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .password-reset input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: #ff0000;
            margin-top: 10px;
            text-align: left;
        }

        .back-to-login {
        margin-top: 2px;
}

.back-to-login a {
    display: inline-block;
    width: calc(103% - 10px); 
    padding: 8px;
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
    border-radius: 4px;
    text-decoration: none;
    box-sizing: border-box;
    transition: background-color 0.3s;
}

.back-to-login a:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

    </style>

</head>
<body>
    <div class="password-reset">
        <h1>Password Reset</h1>
        <form method="post">
            <p>Reset Code</p>
            <input type="text" placeholder="Reset Code" id="reset_code" name="reset_code" required>
            <br>
            <p>New Password</p>
            <input type="password" placeholder="New Password" id="new_password" name="new_password" required>
            <br>
            <input type="submit" name="submit" id="submit" value="Reset Password">
        </form>
        <div class="back-to-login">
        <a href="login.php">Back</a>
    </div>
        <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>

    <?php
        session_start(); // Start session
        // Create connection
        $conn = mysqli_connect("localhost", "root", "", "HRMS");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Process password reset form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $reset_code = $_POST['reset_code'];
            $new_password = $_POST['new_password'];

            // Get the email associated with the reset code
            $email = $_SESSION['reset_email'];

            // Check if reset code matches the one in the database
            $sql = "SELECT * FROM users WHERE email='$email' AND reset_token='$reset_code'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                // Reset code matches, update password
                $sql_update = "UPDATE users SET password='$new_password', reset_token=NULL WHERE email='$email'";
                if (mysqli_query($conn, $sql_update)) {
                    // Password updated successfully, redirect to confirmation page
                    header("Location: password_reset_confirmation.php");
                    exit;
                } else {
                    $error = "Error updating password: " . mysqli_error($conn);
                }
            } else {
                // Reset code doesn't match, show error message
                $error = "Invalid reset code. Please try again.";
            }
        }

        mysqli_close($conn);
        ?>
</body>
</html>