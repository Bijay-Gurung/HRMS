<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "HRMS");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission for searching and populating the form fields
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    // Retrieve form inputs
    $searchName = validateInput($_POST['searchName']);
    
    // Search for the existing data based on the employee name
    $search_sql = "SELECT * FROM payroll WHERE employee_name='$searchName'";
    $result = mysqli_query($conn, $search_sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Populate the form fields with the retrieved data
        $name = $row['employee_name'];
        $staffID = $row['staff_id'];
        $sex = $row['sex'];
        $department = $row['department'];
        $month = $row['month'];
        $year = $row['year'];
        $bankName = $row['bank_name'];
        $accountName = $row['account_name'];
        $accountNumber = $row['account_number'];
        $phoneNumber = $row['phone_number'];
        $salary = $row['basic_salary'];
        $ot = $row['over_time'];
        $as = $row['advance_salary'];
        $tax = $row['tax'];
        $insurance = $row['insurance'];
        $totalDeduction = $row['total_deduction'];
    } else {
        // Employee not found
        $error = "Employee not found!";
    }
}

// Process form submission for updating data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve form inputs
    $name = validateInput($_POST['name']);
    $staffID = validateInput($_POST['staffID']);
    $sex = validateInput($_POST['sex']);
    $department = validateInput($_POST['department']);
    $month = validateInput($_POST['month']);
    $year = validateInput($_POST['year']);
    $bankName = validateInput($_POST['bankName']);
    $accountName = validateInput($_POST['accountName']);
    $accountNumber = validateInput($_POST['accountNumber']);
    $phoneNumber = validateInput($_POST['phoneNumber']);
    $salary = validateInput($_POST['salary']);
    $ot = validateInput($_POST['ot']);
    $as = validateInput($_POST['as']);
    $tax = validateInput($_POST['tax']);
    $insurance = validateInput($_POST['insurance']);
    $totalDeduction = validateInput($_POST['totalDeduction']);
    // Calculate net pay
    $netPay = calculateNetPay($salary, $ot, $totalDeduction);
    // Update data in the database
    $update_sql = "UPDATE payroll 
                   SET staff_id='$staffID', sex='$sex', department='$department', month='$month', year='$year', bank_name='$bankName', account_name='$accountName', account_number='$accountNumber', phone_number='$phoneNumber', basic_salary='$salary', over_time='$ot', advance_salary='$as', tax='$tax', insurance='$insurance', total_deduction='$totalDeduction', net_pay='$netPay' 
                   WHERE employee_name='$name'";
    if (mysqli_query($conn, $update_sql)) {
        // Success message
        $message = "Payroll data updated successfully";
    } else {
        // Error message
        $error = "Error updating record: " . mysqli_error($conn);
    }
}

// Function to calculate net pay
function calculateNetPay($basicSalary, $overTime, $totalDeduction) {
    // Calculate net pay (Basic Salary + Over-Time - Total Deduction)
    $netPay = $basicSalary + $overTime - $totalDeduction;
    return $netPay;
}

// Function to validate input data
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
    <link href="adminEmployeePayrollEdit.css" rel="stylesheet">
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
            <button id="performanceEvaluation">performance Evaluation</button>
            <button id="logout">Logout</button>

            <script>
                function dashboard(){
                    window.location.href = 'adminDashboard.php';
                }

                function edm(){
                    window.location.href = 'adminEmployeeDataManagement.php';
                }

                function pm(){
                    window.location.href = 'adminEmployeePayroll.php';
                }
            </script>
        </div>

        <div class="search-container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" placeholder="Search by Name" name="searchName" id="searchName" required>
                <button type="submit" name="search" id="search"><i class="fas fa-search"></i></button>
            </form>
        </div>
        
        <form method="post">
        <div class="form1">
            <h3>Personal Details</h3>
            <div class="f1 name">
                <p>Full Name</p>
                <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>" required>
            </div>

            <div class="f1 staff">
                <p>Staff ID</p>
                <input type="text" id="staffID" name="staffID" value="<?php echo isset($staffID) ? $staffID : ''; ?>" required>
            </div>

            <div class="f1 gender">
                <p>Sex</p>
                <input type="text" id="sex" name="sex" value="<?php echo isset($sex) ? $sex : ''; ?>" required>
            </div>

            <div class="f1 department">
                <p>Department</p>
                <input type="text" id="department" name="department" value="<?php echo isset($department) ? $department : ''; ?>" required>
            </div>
        </div>

        <div class="form2">
            <h3>Bank Detail</h3>

            <div class="f2 month">
                <p>Month</p>
                <input type="text" id="month" name="month" value="<?php echo isset($month) ? $month : ''; ?>" required>
            </div>

            <div class="f2 year">
                <p>Year</p>
                <input type="text" id="year" name="year" value="<?php echo isset($year) ? $year : ''; ?>" required>
            </div>

            <div class="f2 bankName">
                <p>Bank Name</p>
                <input type="text" id="bankName" name="bankName" value="<?php echo isset($bankName) ? $bankName : ''; ?>" required>
            </div>

            <div class="f2 accountName">
                <p>Account Name</p>
                <input type="text" id="accountName" name="accountName" value="<?php echo isset($accountName) ? $accountName : ''; ?>" required>
            </div>

            <div class="f2 accountNumber">
                <p>Account Number</p>
                <input type="text" id="accountNumber" name="accountNumber" value="<?php echo isset($accountNumber) ? $accountNumber : ''; ?>" required>
            </div>

            <div class="f2 phoneNumber">
                <p>Phone Number</p>
                <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo isset($phoneNumber) ? $phoneNumber : ''; ?>" required>
            </div>
        </div>

        <div class="form3">
            <h3 class="monthlyEntities">Monthly Entities</h3>
            
            <div class="f3 basicSalary">
                <p>Basic Salary</p>
                <input type="text" id="salary" name="salary" value="<?php echo isset($salary) ? $salary : ''; ?>" required>
            </div>

            <div class="f3 overTime">
                <p>Over-Time</p>
                <input type="text" id="ot" name="ot" value="<?php echo isset($ot) ? $ot : ''; ?>" required>
            </div>

            <h3 class="deduction">Deduction</h3>

            <div class="f3 advanceSalary">
                <p>Advance Salary</p>
                <input type="text" id="as" name="as" value="<?php echo isset($as) ? $as : ''; ?>" required>
            </div>

            <div class="f3 tax">
                <p>Tax</p>
                <input type="text" id="tax" name="tax" value="<?php echo isset($tax) ? $tax : ''; ?>" required>
            </div>

            <div class="f3 insurance">
                <p>Insurance</p>
                <input type="text" id="insurance" name="insurance" value="<?php echo isset($insurance) ? $insurance : ''; ?>" required>
            </div>

            <div class="f3 totalDeduction">
                <p>Total Deduction</p>
                <input type="text" id="totalDeduction" name="totalDeduction" value="<?php echo isset($totalDeduction) ? $totalDeduction : ''; ?>" required>
            </div>
        </div>

        </div>

        <div class="actions">
            <button type="submit" name="update" id="update">Update</button>
             <button type="submit" name="Back" id="Back" onclick= "window.location.href = 'adminEmployeePayroll.php'">Back</button>
        </div>
        </form>

        
        </div>
    </section>

    <script src="adminNav.js"></script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>

</body>
</html>
