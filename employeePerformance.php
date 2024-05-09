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
            <button id="dashboard" onclick="dashboard()">Dashboard</button>
            <button id="employeeDataManagement" onclick="edm()">Employee Data Management</button>
            <button id="payroll" onclick="pm()">Payroll Management</button>
            <button id="Benefits" onclick="bm()">Benefits Management</button>
            <button id="performanceEvaluation" onclick="cm()">Performance Evaluation</button>
            <button id="logout" onclick="ae()">Logout</button>

            <script>
                function dashboard(){
                    location = 'userDashboard.php';
                }

                function edm(){
                    location = 'employeeDataManagement.php';
                }

                function pm(){
                    location = 'employeePayroll.php';
                }

                function bm(){
                    location = 'employeeBenefitManagementSystem.php';
                }

                function ae(){
                    location = 'index.html';
                }

                function cm(){
                    location = 'employeePerformance.php';
                }
                
            </script>
        </div>    
        
        
    </section>

    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>
</body>
</html>
