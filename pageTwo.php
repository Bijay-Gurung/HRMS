<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="pageTwo.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="Logo">
            <div id="logo"></div>
            <h3 id="logoName">Innovate Nepal</h3>
        </div>

        <nav>
            <a href="adminDashboard.html" id="home">Home</a>
            <a href="#" id="edm">Employee Data Management</a>
            <a href="#" id="pm">Payroll Management</a>
            <a href="#" id="con">Benefits Management</a>
            <a href="#" id="pe">Performance Evaluations</a>
        </nav>
    </header>

    <section>
        <form method="POST" enctype="multipart/form-data">
            <div class="left">
                <div class="jobHistory">
                    <h3>Employee Records</h3>
                    <p>Job History</p>
                    <input type="text" id="jobTitle" name="jobTitle" placeholder="Job Title" required><br>
                    <input type="text" id="organizationName" name="organizationName" placeholder="Organization Name" required><br>
                    <p>Date of Employment</p>
                    <input type="text" id="startDate" name="startDate" placeholder="Start Date" required><br>
                    <input type="text" id="endDate" name="endDate" placeholder="End Date" required><br>
                    <p>Job Description</p><br>
                    <textarea rows="5" cols="25" placeholder="Job Description" id="jobDescription" name="jobDescription" required></textarea>
                </div>
                
                <div class="disciplinaryRecords">
                    <p>Do the employee have any criminal records or have been to jail?</p>
                    <input type="radio" id="y" name="criminalRecords" value="Yes">
                    <label for="y">Yes, he has</label><br>
                    <input type="radio" id="n" name="criminalRecords" value="No">
                    <label for="n"> No, he doesn't have any</label>
                </div>
            </div>

            <div class="right">
                <label for="achievement">Achievement & Accomplishments</label><br>
                <textarea rows="8" cols="60" id="achievement" name="achievement" required></textarea><br>
                <label for="skillsDeveloped">Skills Developed</label><br>
                <textarea rows="8" cols="60" id="skillsDeveloped" name="skillsDeveloped" required></textarea><br>
                <label for="reason">Reason for Leaving</label><br>
                <textarea rows="8" cols="60" id="reason" name="reason" required></textarea><br>
                <p>Any relevant Skills or Certification</p><br>
                <label for="relevantSkills">Relevant Skills</label><br>
                <textarea rows="8" cols="60" id="relevantSkills" name="relevantSkills" required></textarea><br>
                <label for="certificate">Upload employee certificate</label>
                <input type="file" id="certificate" name="certificate" required>
                <input type="submit" id="add" name="add">

                <div class="prev">
                    <label for="prev">Prev</label>
                    <button onclick="prev()"><i class="fa-solid fa-angle-left" style="color: #ffffff;"></i></button>
                </div>

                <script>
                    function prev(){
                        location='pageOne.php';
                    }
                </script>

            </div>
        </form>
        <div class="blank"></div>
    </section>

    <?php
        session_start();

        function validateInput($data) {
            return !empty($data) ? trim($data) : null;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
            
            $jobTitle = validateInput($_POST['jobTitle']);
            $organizationName = validateInput($_POST['organizationName']);
            $startDate = validateInput($_POST['startDate']);
            $endDate = validateInput($_POST['endDate']);
            $jobDescription = validateInput($_POST['jobDescription']);
            $criminalRecords = isset($_POST['criminalRecords']) ? $_POST['criminalRecords'] : null;
            $achievement = validateInput($_POST['achievement']);
            $skillsDeveloped = validateInput($_POST['skillsDeveloped']);
            $reason = validateInput($_POST['reason']);
            $relevantSkills = validateInput($_POST['relevantSkills']);

            $certificate_name = $_FILES['certificate']['name'];
            $certificate_temp = $_FILES['certificate']['tmp_name'];
            $certificate_type = $_FILES['certificate']['type'];
            $certificate_size = $_FILES['certificate']['size'];

            if ($certificate_size > 5000000) { 
                $error = "File size is too large. Please upload a file smaller than 5 MB.";
            } elseif (!in_array($certificate_type, array("application/pdf", "image/jpeg", "image/png"))) {
                $error = "Only PDF, JPEG, and PNG files are allowed.";
            } else {
                $certificate_data = addslashes(file_get_contents($certificate_temp));
           
                $conn = mysqli_connect("localhost", "root", "", "HRMS");

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "INSERT INTO table_2 (jobTitle, organizationName, startDate, endDate, jobDescription, criminalRecords, achievement, skillsDeveloped, reason, relevantSkills, certificate_data) 
                        VALUES ('$jobTitle', '$organizationName', '$startDate', '$endDate', '$jobDescription', '$criminalRecords', '$achievement', '$skillsDeveloped', '$reason', '$relevantSkills', '$certificate_data')";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Employee details added successfully');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
            }
        }
        ?>

    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>
</body>
</html>