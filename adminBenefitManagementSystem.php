<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="adminBenefitManagementSystem.css" rel="stylesheet">
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
            </script>
        </div>

        <div class="service">
            <div class="box one">
                <i class="fa-solid fa-suitcase-medical" style="color: #2f3755;"></i>
                <p>Health & Dental Insurance</p>
            </div>

            <div class="box two">
                <i class="fa-solid fa-hand-holding-heart" style="color: #2f3755;"></i>
                <p>Life Insurance</p>
            </div>

            <div class="box three">
                <i class="fa-solid fa-wheelchair" style="color: #2f3755;"></i>
                <p>Long | Short Term Disability</p>
            </div>

            <div class="box four">
                <i class="fa-solid fa-handshake-simple" style="color: #2f3755;"></i>
                <p>Employee Assistance</p>
            </div>

            <div class="box five">
                <i class="fa-solid fa-person-walking-arrow-right" style="color: #2f3755;"></i>
                <p>Leave Benefit</p>
            </div>

            <div class="box six">
                <i class="fa-solid fa-book-open" style="color: #2f3755;"></i>
                <p>Educational Benefits</p>
            </div>

            <div class="box seven">
                <i class="fa-solid fa-sack-dollar" style="color: #2f3755;"></i>
                <p>Retirement Saving</p>
            </div>

            <div class="box eight">
                <i class="fa-solid fa-heart-circle-check" style="color: #2f3755;"></i>
                <p>Wellness Programs</p>
            </div>
        </div>

    </section>

    <?php
        $conn = mysqli_connect("localhost", "root", "", "HRMS");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        function getBenefitDetails() {
            global $conn;
            $sql = "SELECT * FROM benefits";
            $result = mysqli_query($conn, $sql);

            $benefits = [];
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $benefits[] = $row;
                }
            }

            return $benefits;
        }

        function generateBenefitReport() {
            global $conn;

            $sql = "SELECT type, COUNT(*) AS count FROM benefits GROUP BY type";
            $result = mysqli_query($conn, $sql);

            $reportData = [];

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $reportData[] = $row;
                }
            }
            return $reportData;
        }
        ?>


    <script src="adminNav.js"></script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>

</body>
</html>
