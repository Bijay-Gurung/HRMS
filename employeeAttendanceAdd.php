<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="employeeAttendanceChecker.css" rel="stylesheet">
    <style>
    .employeeAttendance {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        grid-column-start: 6;
        grid-column-end: 13;
        grid-row-start: 1;
        grid-row-end: 7;
        overflow: hidden;
        overflow-y: scroll;
        box-shadow: 2px 2px 9px #808080;
    }

    /* Form labels */
    .employeeAttendance label {
        font-weight: bold;
    }

    /* Input fields */
    .employeeAttendance input[type="text"],
    .employeeAttendance input[type="month"],
    .employeeAttendance input[type="checkbox"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    /* Checkbox container */
    .employeeAttendance input[type="checkbox"] {
        transform: scale(1.5); /* Increase checkbox size */
        margin-right: 10px; /* Add some spacing between checkbox and label */
    }

    /* Checkbox label */
    .employeeAttendance label[for^="week"] {
        display: inline-block; /* Ensure labels are inline */
        vertical-align: middle; /* Align labels vertically with checkboxes */
        margin-right: 20px; /* Adjust spacing between checkbox and label */
    }

    /* Submit button */
    .employeeAttendance button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .employeeAttendance button[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
</head>
<body>
    <header>
        <div class="Logo">
            <div id="logo"></div>
            <h3 id="logoName">Innovate Nepal</h3>
        </div>

        <nav>
            <a href="adminDashboard.php" id="home">Home</a>
        </nav>

        <div class="userlogo">
            <p>Bijay Gurung</p>
            <div class="image"></div>
        </div>

        <p class="role">Admin</p>
    </header>

    <section>
    <div class="sideNavbar">
            <button id="dashboard" onclick="das()">Dashboard</button>
            <button id="employeeDataManagement" onclick="am()">Employee Data Management</button>
            <button id="payroll" onclick="ab()">Payroll Management</button>
            <button id="Benefits">Benefits Management</button>
            <button id="performanceEvaluation">performance Evaluation</button>
            <button id="logout" onclick="ae()">Logout</button>

            <script>
                function das(){
                    location = 'UserDashboard.php';
                }

                function am(){
                    location = 'employeeDataManagement.php';
                }

                function ab(){
                    location = 'employeePayroll.php';
                }

                function eac(){
                    location = 'employeeAttendanceChecker.php';
                }

                function ae(){
                    location = 'index.html';
                }
            </script>
        </div>  

        <div class="employeeAttendance">
            <?php
            // Establish database connection
            $conn = mysqli_connect("localhost", "root", "", "HRMS");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Escape user inputs for security
                $employee_name = mysqli_real_escape_string($conn, $_POST['employee_name']);
                $month = mysqli_real_escape_string($conn, $_POST['month']);
                $week = mysqli_real_escape_string($conn, $_POST['week']);
                $week_days = implode(", ", $_POST['week_days']); // Convert array to comma-separated string

                // Attempt to insert data into database
                $sql = "INSERT INTO attendance (employee_name, month, week, week_days)
                        VALUES ('$employee_name', '$month', '$week', '$week_days')";

                if (mysqli_query($conn, $sql)) {
                    echo "Attendance recorded successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }

            // Close connection
            mysqli_close($conn);
            ?>

            <form method="post">
                <label for="employee_name">Employee Name:</label><br>
                <input type="text" id="employee_name" name="employee_name" placeholder="Enter employee name"><br><br>

                <label for="month">Month:</label><br>
                <input type="month" id="month" name="month"><br><br>

                <label for="week">Week:</label><br>
                <select id="week" name="week">
                    <option value="Week 1">Week 1</option>
                    <option value="Week 2">Week 2</option>
                    <option value="Week 3">Week 3</option>
                    <option value="Week 4">Week 4</option>
                </select><br><br>
                <label for="week_sunday">Sunday:</label>
                <input type="checkbox" id="week_sunday" name="week_days[]" value="Sunday">
                <label for="week_sunday"></label><br><br>

                <label for="week_monday">Monday:</label>
                <input type="checkbox" id="week_monday" name="week_days[]" value="Monday">
                <label for="week_monday"></label><br><br>

                <label for="week_tuesday">Tuesday:</label>
                <input type="checkbox" id="week_tuesday" name="week_days[]" value="Tuesday">
                <label for="week_tuesday"></label><br><br>

                <label for="week_wednesday">Wednesday:</label>
                <input type="checkbox" id="week_wednesday" name="week_days[]" value="Wednesday">
                <label for="week_wednesday"></label><br><br>

                <label for="week_thursday">Thursday:</label>
                <input type="checkbox" id="week_thursday" name="week_days[]" value="Thursday">
                <label for="week_thursday"></label><br><br>

                <label for="week_friday">Friday:</label>
                <input type="checkbox" id="week_friday" name="week_days[]" value="Friday">
                <label for="week_friday"></label><br><br>

                <label for="week_saturday">Saturday:</label>
                <input type="checkbox" id="week_saturday" name="week_days[]" value="Saturday">
                <label for="week_saturday"></label><br><br>

                <button type="submit">Submit Attendance</button>
            </form>
        </div>

    </section>

    <script src="adminNav.js"></script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>

</body>
</html>
