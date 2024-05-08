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
            <button id="dashboard" onclick="dashboard()">Dashboard</button>
            <button id="employeeDataManagement" onclick="edm()">Employee Data Management</button>
            <button id="payroll" onclick="pm()">Payroll Management</button>
            <button id="Benefits" onclick="bm()">Benefits Management</button>
            <button id="performanceEvaluation">Performance Evaluation</button>
            <button id="logout" onclick="ae()">Logout</button>

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

                function eac(){
                    location = 'employeeAttendanceChecker.php';
                }

                function bm(){
                    location = 'adminBenefitManagementSystem.php';
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
                
                    $conn = mysqli_connect("localhost", "root", "", "HRMS");

                   
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    
                    $search_query = "";
                    $sql = "SELECT * FROM attendance";

             
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchbar'])) {
                     
                        $search_query = mysqli_real_escape_string($conn, $_POST['searchbar']);

                        $sql = "SELECT * FROM attendance WHERE employee_name LIKE '%$search_query%'";
                    }

                    
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['employee_name'] . "</td>";
                            echo "<td>" . $row['month'] . "</td>";
                            echo "<td>" . $row['week'] . "</td>";
                            echo "<td>" . $row['week_days'] . "</td>"; 
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No attendance records found</td></tr>";
                    }

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
