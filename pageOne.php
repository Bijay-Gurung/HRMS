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
            <a href="adminEmployeeDataManagement.php" id="home">Home</a>
            <a href="#" id="edm">Employee Data Management</a>
            <a href="#" id="pm">Payroll Management</a>
            <a href="#" id="con">Benefits Management</a>
            <a href="#" id="pe">Performance Evaluations</a>
        </nav>
    </header>

    <section>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="left">
                <div class="personalDetails">
                    <h3>Personal Details</h3><br>
                    <label for="pp">Upload employee image</label><br>
                    <input type="file" id="pp" name="pp" required><br>
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" required><br>
                    <input type="text" id="address" name="address" placeholder="Address" required><br>
                    <input type="text" id="contact" name="contact" placeholder="Contact" required><br>
                    <input type="text" id="martialStatus" name="gender" placeholder="Gender" required>
                </div>

                <div class="emergencyContact">
                    <h3>Emergency Contact</h3>
                    <input type="text" id="name" name="name" placeholder="Name" required><br>
                    <input type="text" id="emergencyAddress" name="emergencyAddress" placeholder="Emergency Address" required><br>
                    <input type="text" id="emergencyContact" name="emergencyContact" placeholder="Emergency Contact" required>
                </div>

                <div class="next">
                    <p>Next</p>
                    <button type="submit">></button>
                </div>
            </div>
            
            <div class="right">
                <div class="jobInformation">
                    <h3>Job Information</h3>
                    <input type="text" id="title" name="title" placeholder="Title" required><br>
                    <input type="text" id="department" name="department" placeholder="Department" required><br>
                    <input type="text" id="supervisor" name="supervisor" placeholder="Supervisor" required><br>
                    <input type="text" id="workLocation" name="workLocation" placeholder="Work Location" required><br>
                    <input type="text" id="startDate" name="startDate" placeholder="Start Date" required><br>
                    <input type="text" id="salary" name="salary" placeholder="Salary" required><br>
                    <input type="text" id="role" name="role" placeholder="Role" required>
                </div>
            </div>
        </form>
    </section>

    <footer></footer>

    <?php
        session_start();

        $conn = mysqli_connect("localhost", "root", "", "HRMS");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fullname = validateInput($_POST['fullname']);
            $address = validateInput($_POST['address']);
            $contact = validateInput($_POST['contact']);
            $gender = validateInput($_POST['gender']);
            $emergencyName = validateInput($_POST['name']);
            $emergencyAddress = validateInput($_POST['emergencyAddress']);
            $emergencyContact = validateInput($_POST['emergencyContact']);

            $title = validateInput($_POST['title']);
            $department = validateInput($_POST['department']);
            $supervisor = validateInput($_POST['supervisor']);
            $workLocation = validateInput($_POST['workLocation']);
            $startDate = validateInput($_POST['startDate']);
            $salary = validateInput($_POST['salary']);
            $role = validateInput($_POST['role']);

            $file_temp = $_FILES['pp']['tmp_name'];
            $file_type = $_FILES['pp']['type'];
            $file_size = $_FILES['pp']['size'];

            if ($file_size > 500000) { 
                $error = "File size is too large. Please upload an image smaller than 500 KB.";
            } elseif (!in_array($file_type, array("image/jpeg", "image/png"))) {
                $error = "Only JPEG and PNG images are allowed.";
            } elseif (!preg_match('/^\d{10}$/', $contact)) { 
                $error = "Contact number must be exactly 10 digits.";
            } else {
                $image_data = addslashes(file_get_contents($file_temp));

                $sql = "INSERT INTO table_1 (fullname, address, contact, gender, emergency_name, emergency_address, emergency_contact, title, department, supervisor, work_location, start_date, salary, role, image_data) 
                VALUES ('$fullname', '$address', '$contact', '$gender', '$emergencyName', '$emergencyAddress', '$emergencyContact', '$title', '$department', '$supervisor', '$workLocation', '$startDate', '$salary', '$role', '$image_data')";

                if (mysqli_query($conn, $sql)) {
                    $message = "New record created successfully";
                    
                    $_POST['fullname'] = $_POST['address'] = $_POST['contact'] = $_POST['gender'] = $_POST['name'] = $_POST['emergencyAddress'] = $_POST['emergencyContact'] = $_POST['title'] = $_POST['department'] = $_POST['supervisor'] = $_POST['workLocation'] = $_POST['startDate'] = $_POST['salary'] = $_POST['role'] = "";
                    
                    header("Location: pageTwo.php");
                    exit;
                } else {
                    $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }

        function validateInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        mysqli_close($conn);
        ?>


    <script>
        function next() {
            location='pageTwo.php';
        }
    </script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>
</body>
</html>
