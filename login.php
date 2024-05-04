<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="login.css" rel="stylesheet">
</head>

<body>
    <div class="login">
        <div class="nav">
            <h1>Login</h1>
            <button onclick="back()"><i class="fa-solid fa-xmark fa-rotate-90" style="color: #2f3755;"></i></button>
        </div>

        <form method="post">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" placeholder="Email" id="email" name="email" required>
            <br>
            <i class="fa-solid fa-lock"></i>
            <input type="password" placeholder="password" id="password" name="password" required>
            <br>
            <a href="forgot_password.php" id="forgotPassword">forgot password</a><br>
            <input type="Submit" name="Login" id="submit">
        </form>

        <div class="Alternative">
            <div class="Already">
                <p>Don't have an account</p>
                <a href="signup.php" class="signup"> Signup</a>
            </div>
        </div>

        <div class="GorF">
            <div class="line1"></div>
            <h3>Login With</h3>
            <div class="line2"></div>

            <br>
        </div>

        <div class="option">
            <a href="#" class="google"><i class="fa-brands fa-google" style="color: #ffffff;"></i></a>
            <p class="or">or</p>
            <a href="#" class="facebook"><i class="fa-brands fa-facebook" style="color: #ffffff;"></i></a>
        </div>
        
    </div>

    <?php
session_start(); 
$conn = mysqli_connect("localhost", "root", "", "HRMS");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } else {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // Check if the email domain matches admin or user
            if (strpos($email, '@admin.edu.com') !== false) {
                // Admin login
                if ($row['password'] === $password) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['role'] = 'admin'; // Set the user role
                    echo "<script>alert('Login Successfully'); window.location.href = 'adminDashboard.php';</script>";
                    exit;
                } else {
                    $error = "Invalid password. Please try again.";
                }
            } elseif (strpos($email, '@usergmail.com') !== false) {
                // User login
                if ($row['password'] === $password) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['role'] = 'user'; // Set the user role
                    echo "<script>alert('Login Successfully'); window.location.href = 'userDashboard.php';</script>";
                    exit;
                } else {
                    $error = "Invalid password. Please try again.";
                }
            } else {
                // Neither admin nor user domain
                $error = "Invalid email domain.";
            }
        } else {
            $error = "User with this email does not exist. Please sign up.";
        }
    }
}

mysqli_close($conn);
?>

    <script>
        function back(){
            location = 'index.html';
        }
    </script>

<script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>
</body>
</html>