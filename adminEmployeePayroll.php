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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? validateInput($_POST['name']) : "";
    $staffID = isset($_POST['staffID']) ? validateInput($_POST['staffID']) : "";
    $sex = isset($_POST['sex']) ? validateInput($_POST['sex']) : "";
    $department = isset($_POST['department']) ? validateInput($_POST['department']) : "";
    $month = isset($_POST['month']) ? validateInput($_POST['month']) : "";
    $bankName = isset($_POST['bankName']) ? validateInput($_POST['bankName']) : "";
    $accountName = isset($_POST['accountName']) ? validateInput($_POST['accountName']) : "";
    $accountNumber = isset($_POST['accountNumber']) ? validateInput($_POST['accountNumber']) : "";
    $phoneNumber = isset($_POST['phoneNumber']) ? validateInput($_POST['phoneNumber']) : "";
    $salary = isset($_POST['salary']) ? validateInput($_POST['salary']) : "";
    $ot = isset($_POST['ot']) ? validateInput($_POST['ot']) : "";
    $as = isset($_POST['as']) ? validateInput($_POST['as']) : "";
    $tax = isset($_POST['tax']) ? validateInput($_POST['tax']) : "";
    $insurance = isset($_POST['insurance']) ? validateInput($_POST['insurance']) : "";
    $totalDeduction = isset($_POST['totalDeduction']) ? validateInput($_POST['totalDeduction']) : "";

    function calculateNetPay($basicSalary, $overTime, $totalDeduction) {
        $netPay = (int)$basicSalary + (int)$overTime - (int)$totalDeduction;
        return $netPay;
    }

    $netPay = calculateNetPay($salary, $ot, $totalDeduction);

    $sql = "INSERT INTO payroll (employee_name, staff_id, sex, department, month, bank_name, account_name, account_number, phone_number, basic_salary, over_time, advance_salary, tax, insurance, total_deduction, net_pay) 
    VALUES ('$name', '$staffID', '$sex', '$department', '$month', '$bankName', '$accountName', '$accountNumber', '$phoneNumber', '$salary', '$ot', '$as', '$tax', '$insurance', '$totalDeduction', '$netPay')";

    if (mysqli_query($conn, $sql)) {
        $message = "Payroll data inserted successfully";
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
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
    <link href="adminEmployeePayroll.css" rel="stylesheet">
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
            <button id="dashboard" onclick="dashboard()">Dashboard</button>
            <button id="employeeDataManagement" onclick="edm()">Employee Data Management</button>
            <button id="payroll" onclick="pm()">Payroll Management</button>
            <button id="Benefits" onclick="bm()">Benefits Management</button>
            <button id="performanceEvaluation" onclick="cm()">Performance Evaluation</button>
            <button id="logout" onclick="ae()">Logout</button>

            <script>
                function dashboard(){
                    location = 'adminDashboard.php';
                }

                function edm(){
                    location = 'adminEmployeeDataManagement.php';
                }

                function pm(){
                    location = 'adminEmployeePayroll.php';
                }

                function bm(){
                    location = 'adminBenefitManagementSystem.php';
                }

                function cm(){
                    location = 'adminPerformanceEvaluation.php';
                }

                function ae(){
                    location = 'index.html';
                }
            </script>
        </div>

        <form method="post">
            <div class="form1">
                <h3>Personal Details</h3>

                <div class="f1 name">
                    <p>Full Name</p>
                    <input type="text" id="name" name="name" value="" required>
                </div>

                <div class="f1 staff">
                    <p>Staff ID</p>
                    <input type="text" id="staffID" name="staffID" value="" required>
                </div>

                <div class="f1 gender">
                    <p>Sex</p>
                    <input type="text" id="sex" name="sex" value="" required>
                </div>

                <div class="f1 department">
                    <p>Department</p>
                    <input type="text" id="department" name="department" value="" required>
                </div>
        </div>

        <div class="form2">
            <h3>Bank Detail</h3>

            <div class="f2 month">
                <p>Month</p>
                <input type="month" id="month" name="month" value="" required>
            </div>

            <div class="f2 bankName">
                <p>Bank Name</p>
                <input type="text" id="bankName" name="bankName" value="" required>
            </div>

            <div class="f2 accountName">
                <p>Account Name</p>
                <input type="text" id="accountName" name="accountName" value="" required>
            </div>

            <div class="f2 accountNumber">
                <p>Account Number</p>
                <input type="text" id="accountNumber" name="accountNumber" value="" required>
            </div>

            <div class="f2 phoneNumber">
                <p>Phone Number</p>
                <input type="text" id="phoneNumber" name="phoneNumber" value="" required>
            </div>
        </div>

        <div class="form3">
            <h3 class="monthlyEntities">Monthly Entities</h3>
            
            <div class="f3 basicSalary">
                <p>Basic Salary</p>
                <input type="text" id="salary" name="salary" value="" required>
            </div>

            <div class="f3 overTime">
                <p>Over-Time</p>
                <input type="text" id="ot" name="ot" value="" required>
            </div>

            <h3 class="deduction">Deduction</h3>

            <div class="f3 advanceSalary">
                <p>Advance Salary</p>
                <input type="text" id="as" name="as" value="" required>
            </div>

            <div class="f3 tax">
                <p>Tax</p>
                <input type="text" id="tax" name="tax" value="" required>
            </div>

            <div class="f3 insurance">
                <p>Insurance</p>
                <input type="text" id="insurance" name="insurance" value="" required>
            </div>

            <div class="f3 totalDeduction">
                <p>Total Deduction</p>
                <input type="text" id="totalDeduction" name="totalDeduction" value="" required>
            </div>
        </div>

        <div class="actions">
            <button type="submit" id="submit" name="submit">Submit</button>
            <button type="button" id="edit" onclick="window.location.href = 'adminEmployeePayrollEdit.php'">Edit</button>
            <button type="button" id="delete" onclick="window.location.href = 'adminEmployeePayrollDelete.php'">Delete</button>
            <button type="button" id="print">Print Payslip</button>
        </div>
        </form>


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
