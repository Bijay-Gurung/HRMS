<?php
// Database connection
$db = new mysqli("localhost", "root", "", "HRMS");


// Check Database Connection
if ($db->connect_error) {
    die("Connection failed" . $db->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="adminDashboard.css" rel="stylesheet">
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
            <button id="performanceEvaluation"  onclick="ad()">Performance Evaluation</button>
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

                function ad(){
                    location = 'employeePerformance.php';
                }

                function eac(){
                    location = 'employeeAttendanceChecker.php';
                }

                function ae(){
                    location = 'index.html';
                }
            </script>
        </div>    

        <?php
                $conn = new mysqli("localhost", "root", "", "HRMS");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT COUNT(*) as total FROM table_1";

                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $totalUsers = $row['total'];

                echo "<p id='numOfUser'>" . $totalUsers . "</p>";

                $conn->close();
                ?>
        <div class="content1">
            <div class="totalEmployees">
                <i class="fa-solid fa-users" style="color: #fff;"></i>
                <h3>Total Employees</h3>
            </div>
            <p id="employees"><?php echo $totalUsers; ?></p>
            

                <?php
                 $conn = new mysqli("localhost", "root", "", "HRMS");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to count males
                $sql_male = "SELECT COUNT(*) as male_count FROM table_1 WHERE gender = 'Male'";
                $result_male = $conn->query($sql_male);
                $row_male = $result_male->fetch_assoc();
                $male_count = $row_male['male_count'];

                // Query to count females
                $sql_female = "SELECT COUNT(*) as female_count FROM table_1 WHERE gender = 'Female'";
                $result_female = $conn->query($sql_female);
                $row_female = $result_female->fetch_assoc();
                $female_count = $row_female['female_count'];

                $conn->close();
                ?>

                <div class="girls">
                    <p>Female: </p>
                    <p><?php echo $female_count; ?></p>
                </div>

                <div class="boys">
                    <p>Male: </p>
                    <p><?php echo $male_count; ?></p>
                </div>

        </div>

        <?php
        $conn = new mysqli("localhost", "root", "", "HRMS");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to count new employees (e.g., hired within the last 30 days)
        $thirty_days_ago = date('Y-m-d', strtotime('-30 days'));
        $sql_new_employees = "SELECT COUNT(*) as new_employee_count FROM table_1 WHERE created_at >= '$thirty_days_ago'";
        $result_new_employees = $conn->query($sql_new_employees);
        $row_new_employees = $result_new_employees->fetch_assoc();
        $new_employee_count = $row_new_employees['new_employee_count'];

        $conn->close();
        ?>

        <div class="content2">
            <div class="newEmployee">
                <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                <h3>New Employee</h3>
            </div>
            <p id="newEmployee"><?php echo $new_employee_count; ?></p>
        </div>


       <div class="content3">
        <div class="GNP">
            <i class="fa-solid fa-arrow-up" style="color: #ffffff;"></i>
            <h3>Gross Net Profit</h3>
        </div>
        <?php
        $conn = new mysqli("localhost", "root", "", "HRMS");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to calculate the sum of net pay from the payroll table
        $sql = "SELECT SUM(net_pay) as total_net_pay FROM payroll";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totalNetPay = $row['total_net_pay'];

        // Display the total net pay
        echo "<p id='grossNetProfit'>" . $totalNetPay . "</p>";

        $conn->close();
        ?>
    </div>


        <div class="content4">
        <div class="present">
            <h3>Present</h3>
            <?php
            $conn = new mysqli("localhost", "root", "", "HRMS");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to count the number of employees marked as present
            $sql_present = "SELECT COUNT(*) as present_count FROM attendance WHERE status = 'P'";
            $result_present = $conn->query($sql_present);
            $row_present = $result_present->fetch_assoc();
            $present_count = $row_present['present_count'];

            echo "<p>" . $present_count . "</p>";

            $conn->close();
            ?>
        </div>

        <div class="absent">
            <h3>Absent</h3>
            <?php
            $conn = new mysqli("localhost", "root", "", "HRMS");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to count the number of employees marked as absent
            $sql_absent = "SELECT COUNT(*) as absent_count FROM attendance WHERE status = 'A'";
            $result_absent = $conn->query($sql_absent);
            $row_absent = $result_absent->fetch_assoc();
            $absent_count = $row_absent['absent_count'];

            echo "<p>" . $absent_count . "</p>";

            $conn->close();
            ?>
        </div>
    </div>

            <div class="EAC" onclick="eac()">
                <i class="fa-solid fa-calendar-days" style="color: #ffffff;"></i>
                <h3>Employee Attendance Checker</h3>
            </div>
        </div>

        
        <div class="content5">
            <div class="searchSection">
                <form method="post">
                    <input type="text" id="searchbar" name="searchbar" placeholder="Search.....">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
                </form>
            </div>
            <div class="employeePerformance">
                <table>
                    <tr id="heading">
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Performance</th>
                    </tr>
                        <tr id="data1">
                            <td><img src="./Images/Bijay.jpg" height="40px" width="40px"></td>
                            <td>Bijay Gurung</td>
                            <td>Fullstack Developer</td>
                            <td><button>Excellent</button></td>
                        </tr>               

                        <tr id="data1">
                            <td><img src="./Images/Bijay.jpg" height="40px" width="40px"></td>
                            <td>Suraj Kanwar</td>
                            <td>Fullstack Developer</td>
                            <td><button>Excellent</button></td>
                        </tr>

                        <tr id="data1">
                            <td><img src="./Images/Bijay.jpg" height="40px" width="40px"></td>
                            <td>Isbin Shrestha</td>
                            <td>Fullstack Developer</td>
                            <td><button>Excellent</button></td>
                        </tr>
                </table>
        </div>

        <div class="content6">
            <h3>To DO List</h3>
            <?php
            $sql = "SELECT * FROM todolist";
            $result = $db->query($sql);
            echo "<div class='Tasks'>";
            if ($result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='new'>";
                    echo "<li>" . $row["task"] . "</li>";
                    echo "</div>";
                }
                echo "</ul>";
            }
            echo "</div>";
            ?>
        </div>
    </section>

    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>
</body>
</html>
