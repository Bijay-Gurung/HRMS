<?php
$ip = "";
$pn = "";
$psd = "";
$ped = "";
$toc = "";
$ca = "";
$da = "";
$cp = "";
$np = "";
$ec = "";
$ip1 = "";
$pn1 = "";
$psd1 = "";
$ped1 = "";
$ca1 = "";
$bene1 = "";
$stc = "";
$ltc = "";
$wp = "";
$bwp = "";
$ci = "";
$sp = "";
$services = "";
$availability = "";
$type = "";
$ar = "";
$mal = "";
$up = "";
$tr = "";
$pdp = "";
$pt = "";
$ec = "";
$vs = "";
$io = "";
$ci = "";

$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'HRMS';

$db = new mysqli($db_host, $db_username, $db_pass, $db_name);

if($db->connect_error){
    die("Connection failed" . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['One'])){
    $ip = isset($_POST['ip']) ? validateInput($_POST['ip']) : "";
    $pn = isset($_POST['pn']) ? validateInput($_POST['pn']) : "";
    $psd = isset($_POST['psd']) ? date("Y-m-d", strtotime($_POST['psd'])) : "";
    $ped = isset($_POST['ped']) ? date("Y-m-d", strtotime($_POST['ped'])) : "";
    $toc = isset($_POST['toc']) ? validateInput($_POST['toc']) : "";
    $ca = isset($_POST['ca']) ? validateInput($_POST['ca']) : "";
    $da = isset($_POST['da']) ? validateInput($_POST['da']) : "";
    $cp = isset($_POST['cp']) ? validateInput($_POST['cp']) : "";
    $np = isset($_POST['np']) ? validateInput($_POST['np']) : "";
    $ec = isset($_POST['ec']) ? validateInput($_POST['ec']) : "";

    $stmt = $db->prepare("INSERT INTO hdi (insuranceProvider, policyNumber, policyStartDate, policyEndDate, typeOfCoverage, coverageAmount, deductibleAmount, coPayment, networkProviders, emergencyContact) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssssssss', $ip,$pn,$psd,$ped,$toc,$ca,$da,$cp,$np,$ec);
    if($stmt->execute()){
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else{
        echo "<script>alert('Insertion failed: " . $db->error . "');</script>";
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Two'])){
    $ip1 = isset($_POST['ip1']) ? validateInput($_POST['ip1']) : "";
    $pn1 = isset($_POST['pn1']) ? validateInput($_POST['pn1']) : "";
    $psd1 = isset($_POST['psd1']) ? validateInput($_POST['psd1']) : "";
    $ped1 = isset($_POST['ped1']) ? validateInput($_POST['ped1']) : "";
    $ca1= isset($_POST['ca1']) ? validateInput($_POST['ca1']) : "";
    $bene1 = isset($_POST['bene1']) ? validateInput($_POST['bene1']) : "";

    $stmt = $db->prepare("INSERT INTO li (insuranceProvider, policyNumber, policyStartDate, policyEndDate, coverageAmount, beneficiary) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param('ssssss', $ip1,$pn1,$psd1,$ped1,$ca1,$bene1);
    if($stmt->execute()){
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else{
        echo "<script>alert('Insertion failed: " . $db->error . "');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Three'])){
    $ip = isset($_POST['ip2']) ? validateInput($_POST['ip2']) : "";
    $pn = isset($_POST['pn2']) ? validateInput($_POST['pn2']) : "";
    $psd = isset($_POST['psd2']) ? date("Y-m-d", strtotime($_POST['psd2'])) : "";
    $ped = isset($_POST['ped2']) ? date("Y-m-d", strtotime($_POST['ped2'])) : "";
    $stc = isset($_POST['stc2']) ? validateInput($_POST['stc2']) : "";
    $ltc = isset($_POST['ltc2']) ? validateInput($_POST['ltc2']) : "";
    $wp = isset($_POST['wp2']) ? validateInput($_POST['wp2']) : "";
    $bwp = isset($_POST['bwp2']) ? validateInput($_POST['bwp2']) : "";
    $ci = isset($_POST['ci2']) ? validateInput($_POST['ci2']) : "";

    $stmt = $db->prepare("INSERT INTO stld (insuranceProvider, policyNumber, policyStartDate, policyEndDate, shortTermCoverage, longTermCoverage, waitingPeriod, benefitWaitingPeriod, contactInfo) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssssss', $ip,$pn,$psd,$ped,$stc,$ltc,$wp,$bwp,$ci);
    if($stmt->execute()){
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else{
        echo "<script>alert('Insertion failed: " . $db->error . "');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Four'])){
    $sp = isset($_POST['sp3']) ? validateInput($_POST['sp3']) : "";
    $services = isset($_POST['services3']) ? validateInput($_POST['services3']) : "";
    $availability = isset($_POST['availability3']) ? validateInput($_POST['availability3']) : "";
    $ci = isset($_POST['ci3']) ? validateInput($_POST['ci3']) : "";

    $stmt = $db->prepare("INSERT INTO ea (serviceProvider, employeeAssistance, availability, contactInfo) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss', $sp,$services,$availability,$ci);
    if($stmt->execute()){
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else{
        echo "<script>alert('Insertion failed: " . $db->error . "');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Five'])){
    $type = isset($_POST['type4']) ? validateInput($_POST['type4']) : "";
    $ar = isset($_POST['ar4']) ? validateInput($_POST['ar4']) : "";
    $mal = isset($_POST['mal4']) ? validateInput($_POST['mal4']) : "";
    $up = isset($_POST['up4']) ? validateInput($_POST['up4']) : "";
    $ci = isset($_POST['ci4']) ? validateInput($_POST['ci4']) : "";

    $stmt = $db->prepare("INSERT INTO lb (type, accuralRate, maxAccuralLimit, usagePolicy, contactInfo) VALUES (?,?,?,?,?)");
    $stmt->bind_param('sssss', $type,$ar,$mal,$up,$ci);
    if($stmt->execute()){
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else{
        echo "<script>alert('Insertion failed: " . $db->error . "');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Six'])){
    $tr = isset($_POST['tr5']) ? validateInput($_POST['tr5']) : "";
    $pdp = isset($_POST['pdp5']) ? validateInput($_POST['pdp5']) : "";
    $ci = isset($_POST['ci5']) ? validateInput($_POST['ci5']) : "";

    $stmt = $db->prepare("INSERT INTO eb (tutionReimbursement, professionalDevelopmentProgram, contactInfo) VALUES (?,?,?)");
    $stmt->bind_param('sss',$tr,$pdp,$ci);
    if($stmt->execute()){
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else{
        echo "<script>alert('Insertion failed: " . $db->error . "');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Seven'])){
    $pn = isset($_POST['pn6']) ? validateInput($_POST['pn6']) : "";
    $pt = isset($_POST['pt6']) ? validateInput($_POST['pt6']) : "";
    $ec = isset($_POST['ec6']) ? validateInput($_POST['ec6']) : "";
    $vs = isset($_POST['vs6']) ? validateInput($_POST['vs6']) : "";
    $io = isset($_POST['io6']) ? validateInput($_POST['io6']) : "";
    $ci = isset($_POST['ci6']) ? validateInput($_POST['ci6']) : "";

    $stmt = $db->prepare("INSERT INTO rs (planName, planType, employerContribution, vestingSchedule, investmentOptions, contactInfo) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param('ssssss',$pn,$pt,$ec,$vs,$io,$ci);
    if($stmt->execute()){
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else{
        echo "<script>alert('Insertion failed: " . $db->error . "');</script>";
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
            <button id="performanceEvaluation" onclick="cm()">Performance Evaluation</button>
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

                function cm(){
                    location = 'adminPerformanceEvaluation.php';
                }

                function ae(){
                    location = 'index.html';
                }
            </script>
        </div>

        <div class="service">
            <div class="box one" id="one"><i class="fa-solid fa-suitcase-medical" style="color: #2f3755;"></i>Health & Dental Insurance</div>

            <div class="box two" id="two"><i class="fa-solid fa-hand-holding-heart" style="color: #2f3755;"></i>Life Insurance</div>

            <div class="box three" id="three"><i class="fa-solid fa-wheelchair" style="color: #2f3755;"></i>Long | Short Term Disability</div>

            <div class="box four" id="four"><i class="fa-solid fa-handshake-simple" style="color: #2f3755;"></i>Employee Assistance</div>

            <div class="box five" id="five"><i class="fa-solid fa-person-walking-arrow-right" style="color: #2f3755;"></i>Leave Benefit</div>

            <div class="box six" id="six"><i class="fa-solid fa-book-open" style="color: #2f3755;"></i>Educational Benefits</div>

            <div class="box seven" id="seven"><i class="fa-solid fa-sack-dollar" style="color: #2f3755;"></i>Retirement Saving</div>
        </div>

        <div class="forms">
            <div class="HealthAndDentalInsurance" id="hdi" role="dialog">
                <div class="content">
                    <form method="post">
                        <label for="ip">Insurance Provider</label>
                        <input type="text" id="ip" name="ip" value="" required>
                        <br>
                      
                        <label for="pn">Policy Number</label>
                        <input type="text" id="pn" name="pn" value="" required>
                        <br>
                        
                        <label for="psd">Policy Start Date</label>
                        <input type="date" id="psd" name="psd" value="" required>
                        <br>
                        
                        <label for="ped">Policy End Date</label>
                        <input type="date" id="ped" name="ped" value="" required>
                        <br>
                       
                        <label for="toc">Type of Coverage</label>
                        <input type="text" id="toc" name="toc" value="" required>
                        <br>
                        
                        <label for="ca">Coverage Amount</label>
                        <input type="number" id="ca" name="ca" value="" required>
                        <br>
                        
                        <label for="da">Deductible Amount</label>
                        <input type="number" id="da" name="da" value="" required>
                        <br>
                        
                        <label for="cp">Co Payment</label>
                        <input type="number" id="cp" name="cp" value="" required>
                        <br>

                        <label for="np">Network Provider</label>
                        <input type="text" id="np" name="np" value="" required>
                        <br>

                        <label for="ec">Emergency Contact</label>
                        <input type="text" id="ec" name="ec" value="" required>
                        <br>

                        <button type="submit" name="One">Submit</button>
                    </form>
                </div>

                <div class="footer">
                    <button id="close">Close</button>
                </div>
            </div>

            <div class="LifeInsurance" id="li" role="dialog">
                <div class="content">
                    <form method="post">
                        <label for="ip1">Insurance Provider</label>
                        <input type="text" id="ip1" name="ip1" value="" required>
                        <br>

                        <label for="pn1">Policy Number</label>
                        <input type="text" id="pn1" name="pn1" value="" required>
                        <br>

                        <label for="psd1">Policy Start Date</label>
                        <input type="date" id="psd1" name="psd1" value="" required>
                        <br>

                        <label for="ped1">Policy End Date</label>
                        <input type="date" id="ped1" name="ped1" value="" required>
                        <br>

                        <label for="ca1">Coverage Amount</label>
                        <input type="number" id="ca1" name="ca1" value="" required>
                        <br>

                        <label for="bene1">Beneficiary</label>
                        <input type="text" id="bene1" name="bene1" value="" required>
                        <br>

                        <button type="submit" name="Two">Submit</button>
                    </form>

                    <div class="footer">
                        <button id="closetwo">Close</button>
                    </div>
                </div>
            </div>

            <div class="Short-LongTermDisability" id="sltd" role="dialog">
                <div class="content">
                    <form method="post">
                        <label for="ip2">Insurance Provider</label>
                        <input type="text" id="ip2" name="ip2" value="" required>
                        <br>

                        <label for="pn2">Policy Number</label>
                        <input type="text" id="pn2" name="pn2" value="" required>
                        <br>

                        <label for="psd2">Policy Start Date</label>
                        <input type="date" id="psd2" name="psd2" value="" required>
                        <br>

                        <label for="ped2">Policy End Date</label>
                        <input type="date" id="ped2" name="ped2" value="" required>
                        <br>

                        <label for="stc2">Short Term Coverage</label>
                        <input type="text" id="stc2" name="stc2" value="" required>
                        <br>

                        <label for="ltc2">Long Term Coverage</label>
                        <input type="text" id="ltc2" name="ltc2" value="" required>
                        <br>

                        <label for="wp2">Waiting Period</label>
                        <input type="text" id="wp2" name="wp2" value="" required>
                        <br>

                        <label for="bwp2">Benefit Waiting Period</label>
                        <input type="text" id="bwp2" name="bwp2" value="" required>
                        <br>

                        <label for="ci2">Contact Info</label>
                        <input type="text" id="ci2" name="ci2" value="" required>
                        <br>

                        <button type="submit" name="Three">Submit</button>
                    </form>

                    <div class="footer">
                        <button id="closethree">Close</button>
                    </div>
                </div>
            </div>
            
            <div class="EmployeeAssistance" id="ea" role="dialog">
                <div class="content">
                    <form method="post">
                        <label for="sp3">Service Provider</label>
                        <input type="text" id="sp3" name="sp3" value="" required>
                        <br>

                        <label for="services3">Employee Assistance</label>
                        <input type="text" id="services3" name="services3" value="" required>
                        <br>

                        <label for="availability3">Availability</label>
                        <input type="text" id="availability3" name="availability3" value="" required>
                        <br>

                        <label for="ci3">Contact Info</label>
                        <input type="text" id="ci3" name="ci3" value="" required>
                        <br>

                        <button type="submit" name="Four">Submit</button>
                    </form>

                    <div class="footer">
                        <button id="closefour">Close</button>
                    </div>
                </div>
            </div>

            <div class="LeaveBenefit" id="lb" role="dialog">
                <div class="content">
                    <form method="post">
                        <label for="type4">Type</label>
                        <input type="text" id="type4" name="type4" value="" required>
                        <br>

                        <label for="ar4">Accural Rate</label>
                        <input type="text" id="ar4" name="ar4" value="" required>
                        <br>

                        <label for="mal4">Max Accural Limit</label>
                        <input type="text" id="mal4" name="mal4" value="" required>
                        <br>

                        <label for="up4">Usage Policy</label>
                        <input type="text" id="up4" name="up4" value="" required>
                        <br>

                        <label for="ci4">Contact Info</label>
                        <input type="text" id="ci4" name="ci4" value="" required>
                        <br>

                        <button type="submit" name="Five">Submit</button>
                    </form>

                    <div class="footer">
                        <button id="closefive">Close</button>
                    </div>
                </div>
            </div>

            <div class="EducationalBenefits" id="eb" role="dialog">
                <div class="content">
                    <form method="post">
                        <label for="tr5">Tution Reimbursement</label>
                        <input type="text" id="tr5" name="tr5" value="" required>
                        <br>

                        <label for="pdp5">Professional Development Programs</label>
                        <input type="text" id="pdp5" name="pdp5" value="" required>
                        <br>

                        <label for="ci5">Contact Info</label>
                        <input type="text" id="ci5" name="ci5" value="" required>
                        <br>

                        <button type="submit" name="Six">Submit</button>
                    </form>

                    <div class="footer">
                        <button id="closeSix">Close</button>
                    </div>
                </div>
            </div>

            <div class="RetirementSaving" id="rs" role="dialog">
                <div class="content">
                    <form method="post">
                        <label for="pn6">Plan Name</label>
                        <input type="text" id="pn6" name="pn6" value="" required>
                        <br>

                        <label for="pt6">Plan Type</label>
                        <input type="text" id="pt6" name="pt6" value="" required>
                        <br>

                        <label for="ec6">Employer Contribution</label>
                        <input type="text" id="ec6" name="ec6" value="" required>
                        <br>

                        <label for="vs6">Vesting Schedule</label>
                        <input type="text" id="vs6" name="vs6" value="" required>
                        <br>

                        <label for="io6">Investment Options</label>
                        <input type="text" id="io6" name="io6" value="" required>
                        <br>

                        <label for="ci6">Contact Info</label>
                        <input type="text" id="ci6" name="ci6" value="" required>
                        <br>

                        <button type="submit" name="Seven">Submit</button>
                    </form>


                    <div class="footer">
                        <button id="closeSeven">Close</button>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <script src="adminNav.js"></script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>

    <script>
        function HDI(){
            const hdi = document.getElementById('one');
            const modal = document.getElementById('hdi');
            const closebtn = document.getElementById('close');

            hdi.addEventListener('click', () => {
                modal.style.display = 'block';
            });

            closebtn.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        }
        HDI();

        function LI(){
            const li = document.getElementById('two');
            const modal = document.getElementById('li');
            const closebtntwo = document.getElementById('closetwo');

            li.addEventListener('click', () => {
                modal.style.display = 'block';
            });

            closebtntwo.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        }
        LI();

        function sltd(){
            const sltd = document.getElementById('three');
            const modal = document.getElementById('sltd');
            const closebtnthree = document.getElementById('closethree');

            sltd.addEventListener('click', () => {
                modal.style.display = 'block';
            });

            closebtnthree.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        }
        sltd();

        function EA(){
            const ea = document.getElementById('four');
            const modal = document.getElementById('ea');
            const closebtnfour = document.getElementById('closefour');

            ea.addEventListener('click', () => {
                modal.style.display = 'block';
            });

            closebtnfour.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        }
        EA();

        function LB(){
            const lb = document.getElementById('five');
            const modal = document.getElementById('lb');
            const closebtnfive = document.getElementById('closefive');

            lb.addEventListener('click', () => {
                modal.style.display = 'block';
            });

            closebtnfive.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        }
        LB();

        
        function EB(){
            const eb = document.getElementById('six');
            const modal = document.getElementById('eb');
            const closebtnsix = document.getElementById('closeSix');

            eb.addEventListener('click', () => {
                modal.style.display = 'block';
            });

            closebtnsix.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        }
        EB();

        function RS(){
            const rs = document.getElementById('seven');
            const modal = document.getElementById('rs');
            const closebtnseven = document.getElementById('closeSeven');

            rs.addEventListener('click', () => {
                modal.style.display = 'block';
            });

            closebtnseven.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        }
        RS();

    </script>
</body>
</html>