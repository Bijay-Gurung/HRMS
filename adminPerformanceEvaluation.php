<?php
$eid = "";
$ename = "";
$role = "";
$department = "";
$branch = "";
$date = "";
<<<<<<< HEAD
$effeciency = "";
$pa = "";

// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "hrms"; 
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
=======
$efficiency = "";
$pa = "";

$conn = mysqli_connect("localhost", "root", "", "HRMS");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
>>>>>>> 3630c1f10ac08e9c42de791eda1a5518026b1118
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['evaluate'])){
    $eid = isset($_POST['eid']) ? validateInput($_POST['eid']) : "";
    $ename = isset($_POST['ename']) ? validateInput($_POST['ename']) : "";
    $role = isset($_POST['role']) ? validateInput($_POST['role']) : "";
    $department = isset($_POST['department']) ? validateInput($_POST['department']) : "";
    $branch = isset($_POST['branch']) ? validateInput($_POST['branch']) : "";
    $date = isset($_POST['date']) ? validateInput($_POST['date']) : "";
<<<<<<< HEAD
    $effeciency = isset($_POST['effeciency']) ? validateInput($_POST['effeciency']) : "";
    $pa = isset($_POST['pa']) ? validateInput($_POST['pa']) : "";

    $stmt = $db->prepare("INSERT INTO pe(eid, ename, role, department, branch, date,effeciency,pa) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssssss',$eid,$ename,$role,$department,$branch,$date,$effeciency,$pa);
    if($stmt->execute()){
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else{
        echo "<script>alert('Insertion failed: " . $db->error . "');</script>";
=======
    $efficiency = isset($_POST['effeciency']) ? validateInput($_POST['effeciency']) : "";
    $pa = isset($_POST['pa']) ? validateInput($_POST['pa']) : "";

    $sql = "INSERT INTO pe (eid, ename, role, department, branch, date, efficiency, pa) 
            VALUES ('$eid', '$ename', '$role', '$department', '$branch', '$date', '$efficiency', '$pa')";

    if (mysqli_query($conn, $sql)) {
        $message = "Performance evaluation data inserted successfully";
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
>>>>>>> 3630c1f10ac08e9c42de791eda1a5518026b1118
    }
}

// Function to sanitize input
function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<<<<<<< HEAD
=======

>>>>>>> 3630c1f10ac08e9c42de791eda1a5518026b1118
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="adminPerformanceEvaluation.css" rel="stylesheet">
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
            <button id="performanceEvaluation" onclick="pe()">Performance Evaluation</button>
            <button id="logout" onclick="ae()">Logout</button>

            <script>
                function dashboard(){
                    location = 'adminDashboard.php';
                }

                function edm(){
                    location = 'adminEmployeeDataManagement.php';
                }

                function pm(){
                    location = 'adminEmployeePayroll.php';
                }

                function bm(){
                    location = 'adminBenefitManagementSystem.php';
                }

<<<<<<< HEAD
=======
                function pe(){
                    location = 'adminPerformanceEvaluation.php';
                }

>>>>>>> 3630c1f10ac08e9c42de791eda1a5518026b1118
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
                <form method="post">
                    <input type="text" id="eid" name="eid" value="" placeholder="Employee ID" required>
                    <input type="text" id="ename" name="ename" value="" placeholder="Employee Name" required>
                    <input type="text" id="role" name="role" value="" placeholder="Role" required>
                    <input type="text" id="department" name="department" placeholder="Department" required>
                    <input type="text" id="branch" name="branch" placeholder="Branch" required>
                    <input type="date" id="date" name="date" required>
<<<<<<< HEAD
                    <input type="text" id="effeciency" name="effeciency" placeholder="Effeciency" value="" required>
=======
                    <input type="text" id="effeciency" name="effeciency" placeholder="Efficiency" value="" required>
>>>>>>> 3630c1f10ac08e9c42de791eda1a5518026b1118
                    <input type="text" id="pa" name="pa" placeholder="Performance Average" value="" required>

                    <button type="submit" name="evaluate">Evaluate</button>

                    <div class="generateReport">
<<<<<<< HEAD
                        <button class="gp" id="gp">Generate Report</button>
=======
                        <button class =""gp id="gp">Generate Report</button>
>>>>>>> 3630c1f10ac08e9c42de791eda1a5518026b1118
                    </div>
                </form>
            </div>

            <div class="report" id="reports" role="dialog">
                <div class="content">
                    <table>
<<<<<<< HEAD
                        <tr>
=======
                        <tr id="heading">
>>>>>>> 3630c1f10ac08e9c42de791eda1a5518026b1118
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Branch</th>
                            <th>Date</th>
<<<<<<< HEAD
                            <th>Effeciency</th>
                            <th>Performance Average</th>
                        </tr>
                        <?php
                        // Database connection
                        $servername = "localhost";
                        $username = "root"; 
                        $password = ""; 
                        $dbname = "hrms"; 
                        $db = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($db->connect_error) {
                            die("Connection failed: " . $db->connect_error);
                        }

                        $sql = "SELECT * FROM pe";
                        $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>".$row["eid"]."</td>
                                        <td>".$row["ename"]."</td>
                                        <td>".$row["role"]."</td>
                                        <td>".$row["department"]."</td>
                                        <td>".$row["branch"]."</td>
                                        <td>".$row["date"]."</td>
                                        <td>".$row["effeciency"]."</td>
                                        <td>".$row["pa"]."</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No records found</td></tr>";
                        }
                        ?>
                    </table>
                </div>

=======
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
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
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
>>>>>>> 3630c1f10ac08e9c42de791eda1a5518026b1118
                <div class="footer">
                    <button id="close">Close</button>
                </div>
            </div>
        </div>
    </section>

    <script>
        function gr(){
            const gp = document.getElementById('gp');
            const modal = document.getElementById('reports');
            const closebtn = document.getElementById('close');

            gp.addEventListener('click', () => {
                modal.style.display = 'block';
            });

            closebtn.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        }
        gr();
    </script>

    <script src="script.js"></script>
    <script src="adminNav.js"></script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>
</body>
</html>
