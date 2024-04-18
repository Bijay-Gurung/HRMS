<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Confirmation</title>
    <link href="passwordReset.css" rel="stylesheet">
    <style>
        /* passwordReset.css */

.confirmation {
    width: 300px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.confirmation h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.confirmation p {
    font-size: 16px;
    margin-bottom: 20px;
}

.confirmation .back-to-login a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.confirmation .back-to-login a:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    <div class="confirmation">
        <h1>Password Reset Successful</h1>
        <p>Your password has been successfully reset.</p>
        <div class="back-to-login">
            <a href="login.php">Back to Login</a>
        </div>
    </div>
</body>
</html>
