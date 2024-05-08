<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="employeeDataManagement.css" rel="stylesheet">
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

        <div class="content">
            <table id="employeeTable">
                <tr id="heading">
                    <th>Employee Name</th>
                    <th>Branch</th>
                    <th>Role</th>
                    <th>Department</th>
                </tr>

                <?php
                $conn = mysqli_connect("localhost", "root", "", "HRMS");

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM table_1";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $employee_id = $row['id'];
                        echo "<tr>";
                        echo "<td>" . $row['fullname'] . "</td>";
                        echo "<td>" . $row['work_location'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>" . $row['department'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No employees found</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </table>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>

    <script>
        function editEmployee(employee_id) {
            window.location.href = 'pageOne.php?id=' + employee_id;
        }

        function searchEmployees() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchbar");
                filter = input.value.toUpperCase();
                table = document.getElementById("employeeTable");
                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
   
    </script>

</body>
</html>
