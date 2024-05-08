<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="pageOne.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="Logo">
            <div id="logo"></div>
            <h3 id="logoName">Innovate Nepal</h3>
        </div>

        <nav>
            <a href="adminDashboard.php" id="home">Home</a>
            <a href="adminEmployeeDataManagement.php" id="edm">Employee Data Management</a>
            <a href="#" id="pm">Payroll Management</a>
            <a href="#" id="con">Benefits Management</a>
            <a href="#" id="pe">Performance Evaluations</a>
        </nav>
    </header>

    <div class="search-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
            <input type="text" placeholder="Search..." name="search" required>
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <?php
        $row = [];

        function validateInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
            $conn = mysqli_connect("localhost", "root", "", "HRMS");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $search_query = $_GET['search'];

            $sql = "SELECT * FROM table_1 WHERE fullname LIKE '%$search_query%'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            } else {
                echo "<script>alert('No results found for the given name.');</script>";
            }

            mysqli_close($conn);
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
            $conn = mysqli_connect("localhost", "root", "", "HRMS");
    
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
    
            $search_query = validateInput($_GET['search']);
    
            $sql = "SELECT * FROM table_1 WHERE fullname LIKE '%$search_query%'";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            } else {
                echo "<script>alert('No results found for the given name.');</script>";
            }
    
            mysqli_close($conn);
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fullname'])) {
            $conn = mysqli_connect("localhost", "root", "", "HRMS");
    
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
    
            $id = validateInput($_POST['id']);
            $fullname = validateInput($_POST['fullname']);
            $address = validateInput($_POST['address']);
            $contact = validateInput($_POST['contact']);
            $gender = validateInput($_POST['gender']);
            $emergency_name = validateInput($_POST['name']);
            $emergency_address = validateInput($_POST['emergencyAddress']);
            $emergency_contact = validateInput($_POST['emergencyContact']);
            $title = validateInput($_POST['title']);
            $department = validateInput($_POST['department']);
            $supervisor = validateInput($_POST['supervisor']);
            $work_location = validateInput($_POST['workLocation']);
            $start_date = validateInput($_POST['startDate']);
            $salary = validateInput($_POST['salary']);
            $role = validateInput($_POST['role']);
    
            $sql = "UPDATE table_1 SET fullname='$fullname', address='$address', contact='$contact', gender='$gender', emergency_name='$emergency_name', emergency_address='$emergency_address', emergency_contact='$emergency_contact', title='$title', department='$department', supervisor='$supervisor', work_location='$work_location', start_date='$start_date', salary='$salary', role='$role' WHERE fullname='$fullname'";
    
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Record updated successfully');</script>";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
    
            mysqli_close($conn);
        }
    ?>


    <section>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
            <div class="left">
                <div class="personalDetails">
                    <h3>Personal Details</h3><br>
                    <label for="pp">Upload employee image</label><br>
                    <input type="file" id="pp" name="pp"><br>
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" value="<?php echo isset($row['fullname']) ? $row['fullname'] : ''; ?>" required><br>
                    <input type="text" id="address" name="address" placeholder="Address" value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>" required><br>
                    <input type="text" id="contact" name="contact" placeholder="Contact" value="<?php echo isset($row['contact']) ? $row['contact'] : ''; ?>" required><br>
                    <input type="text" id="gender" name="gender" placeholder="Gender" value="<?php echo isset($row['gender']) ? $row['gender'] : ''; ?>" required><br>
                </div>

                <div class="emergencyContact">
                    <h3>Emergency Contact</h3>
                    <input type="text" id="name" name="name" placeholder="Name" value="<?php echo isset($row['emergency_name']) ? $row['emergency_name'] : ''; ?>" required><br>
                    <input type="text" id="emergencyAddress" name="emergencyAddress" placeholder="Emergency Address" value="<?php echo isset($row['emergency_address']) ? $row['emergency_address'] : ''; ?>" required><br>
                    <input type="text" id="emergencyContact" name="emergencyContact" placeholder="Emergency Contact" value="<?php echo isset($row['emergency_contact']) ? $row['emergency_contact'] : ''; ?>" required>
                </div>

                <div class="next">
                    <button type="submit">Update</button>
                </div>
            </div>
            
            <div class="right">
                <div class="jobInformation">
                    <h3>Job Information</h3>
                    <label for="image_data">Image Data</label><br>
                    <input type="text" id="title" name="title" placeholder="Title" value="<?php echo isset($row['title']) ? $row['title'] : ''; ?>" required><br>
                    <input type="text" id="department" name="department" placeholder="Department" value="<?php echo isset($row['department']) ? $row['department'] : ''; ?>" required><br>
                    <input type="text" id="supervisor" name="supervisor" placeholder="Supervisor" value="<?php echo isset($row['supervisor']) ? $row['supervisor'] : ''; ?>" required><br>
                    <input type="text" id="workLocation" name="workLocation" placeholder="Work Location" value="<?php echo isset($row['work_location']) ? $row['work_location'] : ''; ?>" required><br>
                    <input type="text" id="startDate" name="startDate" placeholder="Start Date" value="<?php echo isset($row['start_date']) ? $row['start_date'] : ''; ?>" required><br>
                    <input type="text" id="salary" name="salary" placeholder="Salary" value="<?php echo isset($row['salary']) ? $row['salary'] : ''; ?>" required><br>
                    <input type="text" id="role" name="role" placeholder="Role" value="<?php echo isset($row['role']) ? $row['role'] : ''; ?>" required>
                </div>
            </div>
        </form>
    </section>
    <footer></footer>

    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>
</body>
</html>
