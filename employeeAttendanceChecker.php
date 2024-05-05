<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="employeeAttendanceChecker.css" rel="stylesheet">
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

        <div class="searchbar">
            <form method="post">
                <input type="text" placeholder="Search......" id="searchbar" name="searchbar">
                <button type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
            </form>
        </div>

        <div class="employeeAttendance">
            <table id="ea">
                <thead>
                    <tr id="heading">
                        <th>Employee Name</th>
                        <th>Month</th>
                        <th>Week</th>
                        <th>Days</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    // Establish database connection
                    $conn = mysqli_connect("localhost", "root", "", "HRMS");

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Initialize variables to store search query and SQL query
                    $search_query = "";
                    $sql = "SELECT * FROM attendance";

                    // Check if the search form is submitted with a search query
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchbar'])) {
                        // Sanitize user input to prevent SQL injection
                        $search_query = mysqli_real_escape_string($conn, $_POST['searchbar']);

                        // Modify SQL query to include search condition
                        $sql = "SELECT * FROM attendance WHERE employee_name LIKE '%$search_query%'";
                    }

                    // Fetch attendance data
                    $result = mysqli_query($conn, $sql);

                    // Display attendance data in the table
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['employee_name'] . "</td>";
                            echo "<td>" . $row['month'] . "</td>";
                            echo "<td>" . $row['week'] . "</td>";
                            echo "<td>" . $row['week_days'] . "</td>"; // Assuming week_days is stored as a comma-separated string
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No attendance records found</td></tr>";
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>

                </tbody>
            </table>
        </div>

    </section>

    <script src="adminNav.js"></script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>

</body>
</html>
