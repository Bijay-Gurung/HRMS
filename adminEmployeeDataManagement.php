<?php
// Check if edit action is requested and employee ID is provided
if(isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    // Get the employee ID from the URL parameter
    $employee_id = $_GET['id'];

    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "HRMS");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch employee details from the database using the employee ID
    $sql = "SELECT * FROM table_1 WHERE id = $employee_id"; // Assuming 'employees' is the table name
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Fetch employee data
        $row = mysqli_fetch_assoc($result);
        // Assign fetched data to variables
        $fullname = $row['fullname'];
        $address = $row['address'];
        $contact = $row['contact'];
        $martialStatus = $row['martial_status'];
        $emergencyName = $row['emergency_name'];
        $emergencyAddress = $row['emergency_address'];
        $emergencyContact = $row['emergency_contact'];
        $title = $row['title'];
        $department = $row['department'];
        $supervisor = $row['supervisor'];
        $workLocation = $row['work_location'];
        $startDate = $row['start_date'];
        $salary = $row['salary'];
        $role = $row['role'];
        $image_data = $row['image_data'];
       
        // Close connection
        mysqli_close($conn);
    } else {
        // Employee not found, redirect to the same page without action parameter
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }
} else {
    // Redirect to the same page if action parameter is not provided
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}
?>

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
            <button id="payroll">Payroll Management</button>
            <button id="Benefits">Benefits Management</button>
            <button id="performanceEvaluation">performance Evaluation</button>
            <button id="logout">Logout</button>

            <script>
                function dashboard(){
                    window.location.href = 'adminDashboard.php';
                }

                function edm(){
                    window.location.href = 'adminEmployeeDataManagement.php';
                }
            </script>
        </div>    

        <div class="searchSection">
            <input type="text" id="searchbar" name="searchbar" placeholder="Search....">
            <button><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
        </div>
        <div class="addNewEmployee">
            <button onclick="newEmployee()">Add New Employee</button>
            <script>
                function newEmployee(){
                    window.location.href = 'pageOne.php';
                }
            </script>
        </div>

        <div class="content">
            <table>
                <tr id="heading">
                    <th>Employee Name</th>
                    <th>Branch</th>
                    <th>Role</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
                <?php
                // Create connection
                $conn = mysqli_connect("localhost", "root", "", "HRMS");

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch data from the database
                $sql = "SELECT * FROM table_1"; // Assuming 'employees' is the table name
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        $employee_id = $row['id']; // Assuming 'id' is the column name for the employee ID
                        echo "<tr>";
                        echo "<td>" . $row['fullname'] . "</td>";
                        echo "<td>" . $row['work_location'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>" . $row['department'] . "</td>";
                        echo "<td>
                                <div class='actions'>
                                    <i class='fa-solid fa-eye' style='color: #ffffff;' onclick='#'></i>
                                    <i class='fa-solid fa-pencil' style='color: #ffffff;' onclick='editEmployee($employee_id)'></i>
                                    <i class='fa-solid fa-trash' style='color: #ffffff;' onclick='deleteEmployee($employee_id)'></i>
                                </div>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No employees found</td></tr>";
                }

                // Close connection
                mysqli_close($conn);
                ?>
            </table>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>

    <script>
        function editEmployee(employee_id) {
            // Redirect to the same page with the action and employee ID as parameters
            window.location.href = '<?php echo $_SERVER['PHP_SELF']; ?>?action=edit&id=' + employee_id;
        }

        function deleteEmployee(employee_id) {
            if (confirm('Are you sure you want to delete this employee?')) {
                window.location.href = '<?php echo $_SERVER['PHP_SELF']; ?>?action=delete&id=' + employee_id;
            }
        }
    </script>

</body>
</html>
