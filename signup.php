<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="signup.css" rel="stylesheet">
</head>

<body>
    <div class="signup">
        <div class="nav">
            <h1>Signup</h1>
            <button onclick="back()"><i class="fa-solid fa-xmark fa-rotate-90" style="color: #2f3755;"></i></button>
        </div>
        
        <form method="post">
            <i class="fa-solid fa-user"></i>
            <input type="text" placeholder="Username" id="username" name="username" required>
            <br>
            <i class="fa-solid fa-envelope"></i>
            <input type="email" placeholder="Email" id="email" name="email" required>
            <br>
            <i class="fa-solid fa-lock"></i>
            <input type="password" placeholder="password" id="password" name="password" required>
            <br>
            <input type="Submit" name="submit" id="submit">
        </form>

        <div class="Alternative">
            <div class="Already">
                <p>Already have an account</p>
                <a href="login.php" class="login">Login</a>
            </div>
        </div>

        <div class="GorF">
            <div class="line1"></div>
            <h3>Signup With</h3>
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
    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "HRMS");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Insert user data into database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            // Set success message
            echo "<script>alert('Sign up Successfully'); window.location.href = 'login.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
