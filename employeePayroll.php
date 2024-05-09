<?php

$name = "";
$staffID = "";
$sex = "";
$department = "";
$month = "";
$bankName = "";
$accountName = "";
$accountNumber = "";
$phoneNumber = "";
$salary = "";
$ot = "";
$as = "";
$tax = "";
$insurance = "";
$totalDeduction = "";


$conn = mysqli_connect("localhost", "root", "", "HRMS");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$searchName = "";
$searchMonth = "";


if (isset($_POST['search'])) {
    $searchName = validateInput($_POST['searchName']);
    $searchMonth = validateInput($_POST['searchMonth']);
    
  
    $search_sql = "SELECT * FROM payroll WHERE employee_name LIKE '%$searchName%' AND month='$searchMonth'";
    $result = mysqli_query($conn, $search_sql);
} else {

    $search_sql = "SELECT * FROM payroll";
    $result = mysqli_query($conn, $search_sql);
}


function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="employeePayroll.css" rel="stylesheet">

</head>
<body>
    <header>
        <div class="Logo">
            <div id="logo"></div>
            <h3 id="logoName">Innovate Nepal</h3>
        </div>

        <nav>
            <a href="userDashboard.php" id="home">Home</a>
        </nav>

        <div class="userlogo">
            <p>Suraj Kanwar</p>
            <div class="image"></div>
        </div>

        <p class="role">User</p>
    </header>

    <section>
    <div class="sideNavbar">
            <button id="dashboard" onclick="das()">Dashboard</button>
            <button id="employeeDataManagement" onclick="am()">Employee Data Management</button>
            <button id="payroll" onclick="ab()">Payroll Management</button>
            <button id="Benefits" onclick="ac()">Benefits Management</button>
            <button id="performanceEvaluation" onclick="ad()">Performance Evaluation</button>
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

                function ac(){
                    location = 'employeeBenefitManagement.php';
                }

                function oac(){
                    location = 'employeeAttendanceChecker.php';
                }

                function ad(){
                    location = 'employeePerformanceEvaluation.php';
                }

                function ae(){
                    location = 'index.html';
                }
            </script>
        </div>    


        <!-- Search Form -->
        <div class="search">
            <form method="post">
                <input type="text" id="searchName" name="searchName" placeholder="Search by name">
                <input type="month" id="searchMonth" name="searchMonth">
                <button type="submit" id="search" name="search">Search</button>
            </form>
        </div>

        <!-- Payroll Table -->
        <div class="payrollTable">
            <table>
                <tr id="heading">
                    <th>Staff ID</th>
                    <th>Employee Name</th>
                    <th>Month</th>
                    <th>Attendance</th>
                    <th>Leave</th>
                    <th>Bank</th>
                    <th>Account No</th>
                    <th>Account Name</th>
                    <th>Total Deduction</th>
                    <th>Net Pay</th>
                </tr>
                <?php
                // Check if any rows were returned
                if (mysqli_num_rows($result) > 0) {
                    // Display retrieved data in a table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['staff_id'] . "</td>";
                        echo "<td>" . $row['employee_name'] . "</td>";
                        echo "<td>" . $row['month'] . "</td>";
                        echo "<td>" . "not done" . "</td>";
                        echo "<td>" . "not done" . "</td>";
                        echo "<td>" . $row['bank_name'] . "</td>";
                        echo "<td>" . $row['account_number'] . "</td>";
                        echo "<td>" . $row['account_name'] . "</td>";
                        echo "<td>" . $row['total_deduction'] . "</td>";
                        echo "<td>" . $row['net_pay'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // No data found message
                    echo "<tr><td colspan='10'>No data found for

 the selected month.</td></tr>";
                }
                ?>
            </table>
        </div>
    </section>

    <script src="adminNav.js"></script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>

</body>
</html>
