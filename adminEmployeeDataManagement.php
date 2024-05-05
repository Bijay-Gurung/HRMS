<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="adminEmployeeDataManagement.css" rel="stylesheet">
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

        <div class="searchSection">
            <input type="text" id="searchbar" name="searchbar" placeholder="Search....">
            <button onclick="searchEmployees()"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
        </div>
        <div class="addNewEmployee">
            <button onclick="newEmployee()">Add New Employee</button>
            <script>
                function newEmployee(){
                    window.location.href = 'pageOne.php';
                }
            </script>
        </div>
        <div class="editEmployee">
        <button onclick="window.location.href = 'adminEditEmployee.php'">Edit Employee</button>

        </div>

        <div class="deleteEmployee">
        <button onclick="window.location.href = 'adminDeleteEmployee.php'">Delete Employee</button>
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
    }

    </script>

</body>
</html>
