<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="employeePerformanceEvaluation.css" rel="stylesheet">
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
            <p>Suraj Kunwar</p>
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
        
        <div class="content">
            <div class="title">
                <h3>Performance Evaluation</h3>
            </div>

            <div class="action">
                <form method="post" action="form.php"> <!-- Added action attribute to redirect to form.php -->
                    <button type="submit">Form</button>
                </form>

                <div class="generateReport">
                    <button class="gp" id="gp">Generate Report</button>
                </div>
            </div>

            <div class="report" id="reports" role="dialog">
                <div class="content">
                    <table>
                        <tr id="heading">
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Branch</th>
                            <th>Date</th>
                            <th>Efficiency</th>
                            <th>Performance Average</th>
                        </tr>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "HRMS");

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM pe";
                        $result = mysqli_query($conn, $sql);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>".$row["eid"]."</td>
                                        <td>".$row["ename"]."</td>
                                        <td>".$row["role"]."</td>
                                        <td>".$row["department"]."</td>
                                        <td>".$row["branch"]."</td>
                                        <td>".$row["date"]."</td>
                                        <td>".$row["efficiency"]."</td>
                                        <td>".$row["pa"]."</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No records found</td></tr>";
                        }
                        ?>
                    </table>
                </div>
                <div class="footer">
                    <button id="close">Close</button>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const gp = document.getElementById('gp');
            const modal = document.getElementById('reports');
            const closebtn = document.getElementById('close');

            gp.addEventListener('click', () => {
                modal.style.display = 'block';
            });

            closebtn.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>
</body>
</html>
