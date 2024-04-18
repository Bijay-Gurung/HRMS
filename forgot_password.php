<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="forgotPassword.css" rel="stylesheet">
    <style>
        .forgot-password {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .forgot-password h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .forgot-password form {
            margin-bottom: 20px;
        }

        .forgot-password input[type="email"],
        .forgot-password input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .forgot-password input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .forgot-password input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: #ff0000;
            margin-top: 10px;
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
    <div class="forgot-password">
        <h1>Forgot Password</h1>
        <form method="post">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" placeholder="Enter your email" id="email" name="email" required>
            <br>
            <input type="submit" name="submit" id="submit" value="Submit">
            <div class="back-to-login">
            <a href="login.php">Back</a>
        </div>
        </form>
        <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        
    </div>

    <?php
        session_start(); 
        // Create connection
        $conn = mysqli_connect("localhost", "root", "", "HRMS");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if reset_token column already exists in users table
        $check_query = "SHOW COLUMNS FROM users LIKE 'reset_token'";
        $result = mysqli_query($conn, $check_query);

        // If the column does not exist, add it to the table
        if (mysqli_num_rows($result) == 0) {
            $alter_query = "ALTER TABLE users ADD reset_token VARCHAR(255)";
            if (!mysqli_query($conn, $alter_query)) {
                die("Error adding reset_token column: " . mysqli_error($conn));
            }
        }

        // Process forgot password form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];

            // Check if email exists in the database
            $sql = "SELECT * FROM users WHERE LOWER(TRIM(email)) = LOWER(TRIM('$email'))";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                // Email exists, generate and send password reset instructions
                // For simplicity, let's assume we generate a random password reset token
                $token = bin2hex(random_bytes(16));

                // Store the token in the database along with the user's email
                $sql_update = "UPDATE users SET reset_token='$token' WHERE email='$email'";
                if (mysqli_query($conn, $sql_update)) {
                    // Send password reset instructions via email (not implemented here)
                    // After sending the instructions, redirect the user to password reset page
                    $_SESSION['reset_email'] = $email;
                    header("Location: password_reset.php");
                    exit;
                } else {
                    $error = "Error updating record: " . mysqli_error($conn);
                }
            } else {
                // Email not found, show error message
                $error = "Email not found. Please try again.";
            }
        }

        mysqli_close($conn);
        ?>

</body>
</html>
