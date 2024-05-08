<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benefits</title>
    <link href="employeeBenefitManagement.css" rel="stylesheet"> 
</head>
<body>
<header>
        <div class="Logo">
            <div id="logo"></div>
            <h3 id="logoName">Innovate Nepal</h3>
        </div>

        <nav>
            <a href="UserDashboard.php" id="home">Dashboard</a>
            <a href="employeeDataManagement.php" id="edm">Employee Data Management</a>
            <a href="employeePayroll.php" id="pm">Payroll Management</a>
            <a href="employeeBenefitManagement.php" id="con">Benefits Management</a>
            <a href="#" id="pe">Performance Evaluations</a>
            <a href="index.html">Logout</a>
        </nav>

    </header>

    <section>  

    <?php
        $db_host = 'localhost';
        $db_username = 'root';
        $db_pass = '';
        $db_name = 'HRMS';

        $db = new mysqli($db_host, $db_username, $db_pass, $db_name);

        if($db->connect_error){
            die("Connection failed" . $db->connect_error);
        }

        // Function to sanitize input
        function validateInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Function to retrieve and display data from a table
        function displayTable($tableName, $columnNames) {
            global $db;

            $query = "SELECT * FROM $tableName";
            $result = $db->query($query);

            if ($result->num_rows > 0) {
                echo "<h1>$tableName</h1>";
                echo "<table border='1'>";
                echo "<tr>";
                foreach ($columnNames as $columnName) {
                    echo "<th>$columnName</th>";
                }
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No data found in $tableName table.</p>";
            }
        }

        // Define table names and their corresponding column names
        $tables = array(
            "hdi" => array("SN","Insurance Provider", "Policy Number", "Policy Start Date", "Policy End Date", "Type of Coverage", "Coverage Amount", "Deductible Amount", "Co Payment", "Network Providers", "Emergency Contact"),
            "li" => array("SN","Insurance Provider", "Policy Number", "Policy Start Date", "Policy End Date", "Coverage Amount", "Beneficiary"),
            "stld" => array("SN","Insurance Provider", "Policy Number", "Policy Start Date", "Policy End Date", "Short Term Coverage", "Long Term Coverage", "Waiting Period", "Benefit Waiting Period", "Contact Info"),
            "ea" => array("SN","Service Provider", "Employee Assistance", "Availability", "Contact Info"),
            "lb" => array("SN","Type", "Accrual Rate", "Max Accrual Limit", "Usage Policy", "Contact Info"),
            "eb" => array("SN","Tuition Reimbursement", "Professional Development Programs", "Contact Info"),
            "rs" => array("SN","Plan Name", "Plan Type", "Employer Contribution", "Vesting Schedule", "Investment Options", "Contact Info")
        );

        // Display data for each table
        foreach ($tables as $tableName => $columnNames) {
            displayTable($tableName, $columnNames);
        }

        $db->close();
        ?>

</body>
</html>
<?php
