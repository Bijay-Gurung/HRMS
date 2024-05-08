<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "hrms"; 
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['evaluate'])){
    $eid = isset($_POST['eid']) ? validateInput($_POST['eid']) : "";
    $ename = isset($_POST['ename']) ? validateInput($_POST['ename']) : "";
    $role = isset($_POST['role']) ? validateInput($_POST['role']) : "";
    $department = isset($_POST['department']) ? validateInput($_POST['department']) : "";
    $branch = isset($_POST['branch']) ? validateInput($_POST['branch']) : "";
    $date = isset($_POST['date']) ? validateInput($_POST['date']) : "";

    $stmt = $db->prepare("INSERT INTO pe(eid, ename, role, department, branch, date) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param('ssssss',$eid,$ename,$role,$department,$branch,$date);
    if($stmt->execute()){
        header("Location: performanceReview.php");
        exit();
    } else{
        echo "<script>alert('Insertion failed: " . $db->error . "');</script>";
    }
}

// Function to sanitize input
function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="adminPerformanceEvaluation.css" rel="stylesheet">
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
            <button id="performanceEvaluation" onclick="pe()">Performance Evaluation</button>
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

                function ae(){
                    location = 'index.html';
                }
                
            </script>
        </div>    
        
        <div class="content">
            <div class="title">
                <h3>Performance Evaluation</h3>
            </div>

            <div class="action">
                <form method="post">
                    <input type="text" id="eid" name="eid" value="" placeholder="Employee ID" required>
                    <input type="text" id="ename" name="ename" value="" placeholder="Employee Name" required>
                    <input type="text" id="role" name="role" value="" placeholder="Role" required>
                    <input type="text" id="department" name="department" placeholder="Department" required>
                    <input type="text" id="branch" name="branch" placeholder="Branch" required>
                    <input type="date" id="date" name="date" required>
                    <button type="submit" name="evaluate">Evaluate</button>
                </form>
            </div>

            <div class="performanceList"></div>

            <div class="generateReport">
                <button onclick="gr()">Generate Report</button>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
    <script src="adminNav.js"></script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>
</body>
</html>