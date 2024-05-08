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

                        <button type="submit">Submit</button>
                    </form>
                </div>

                <div class="footer">
                    <button id="close">Close</button>
                </div>
            </div>

            <div class="LifeInsurance" id="li" role="dialog">
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

                        <label for="ca">Coverage Amount</label>
                        <input type="number" id="ca" name="ca" value="" required>
                        <br>

                        <label for="bene">Beneficiary</label>
                        <input type="text" id="bene" name="bene" value="" required>
                        <br>

                        <button type="submit">Submit</button>
                    </form>

                    <div class="footer">
                        <button id="closetwo">Close</button>
                    </div>
                </div>
            </div>

            <div class="Short-LongTermDisability" id="sltd" role="dialog">
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

                        <label for="stc">Short Term Coverage</label>
                        <input type="text" id="stc" name="stc" value="" required>
                        <br>

                        <label for="ltc">Long Term Coverage</label>
                        <input type="text" id="ltc" name="ltc" value="" required>
                        <br>

                        <label for="wp">Waiting Period</label>
                        <input type="text" id="wp" name="wp" value="" required>
                        <br>

                        <label for="bwp">Benefit Waiting Period</label>
                        <input type="text" id="bwp" name="bwp" value="" required>
                        <br>

                        <label for="ci">Contact Info</label>
                        <input type="text" id="ci" name="ci" value="" required>
                        <br>

                        <button type="submit">Submit</button>
                    </form>

                    <div class="footer">
                        <button id="closethree">Close</button>
                    </div>
                </div>
            </div>
            
            <div class="EmployeeAssistance" id="ea" role="dialog">
                <div class="content">
                    <form method="post">
                        <label for="sp">Service Provider</label>
                        <input type="text" id="sp" name="sp" value="" required>
                        <br>

                        <label for="services">Employee Assistance</label>
                        <input type="text" id="services" name="services" value="" required>
                        <br>

                        <label for="availability">Availability</label>
                        <input type="text" id="availability" name="availability" value="" required>
                        <br>

                        <label for="ci">Contact Info</label>
                        <input type="text" id="ci" name="ci" value="" required>
                        <br>

                        <button type="submit">Submit</button>
                    </form>

                    <div class="footer">
                        <button id="closefour">Close</button>
                    </div>
                </div>
            </div>

            <div class="LeaveBenefit" id="lb" role="dialog">
                <div class="content">
                    <form method="post">
                        <label for="type">Type</label>
                        <input type="text" id="type" name="type" value="" required>
                        <br>

                        <label for="ar">Accural Rate</label>
                        <input type="text" id="ar" name="ar" value="" required>
                        <br>

                        <label for="mal">Max Accural Limit</label>
                        <input type="text" id="mal" name="mal" value="" required>
                        <br>

                        <label for="up">Usage Policy</label>
                        <input type="text" id="up" name="up" value="" required>
                        <br>

                        <label for="ci">Contact Info</label>
                        <input type="text" id="ci" name="ci" value="" required>
                        <br>

                        <button type="submit">Submit</button>
                    </form>

                    <div class="footer">
                        <button id="closefive">Close</button>
                    </div>
                </div>
            </div>

            <div class="EducationalBenefits" id="eb" role="dialog">
                <div class="content">
                    <form method="post">
                        <label for="tr">Tution Reimbursement</label>
                        <input type="text" id="tr" name="tr" value="" required>
                        <br>

                        <label for="pdp">Professional Development Programs</label>
                        <input type="text" id="pdp" name="pdp" value="" required>
                        <br>

                        <label for="ci">Contact Info</label>
                        <input type="text" id="ci" name="ci" value="" required>
                        <br>

                        <button type="submit">Submit</button>
                    </form>

                    <div class="footer">
                        <button id="closeSix">Close</button>
                    </div>
                </div>
            </div>

            <div class="RetirementSaving" id="rs" role="dialog">
                <div class="content">
                    <form method="post">
                        <label for="pn">Plan Name</label>
                        <input type="text" id="pn" name="pn" value="" required>
                        <br>

                        <label for="pt">Plan Type</label>
                        <input type="text" id="pt" name="pt" value="" required>
                        <br>

                        <label for="ec">Employer Contribution</label>
                        <input type="text" id="ec" name="ec" value="" required>
                        <br>

                        <label for="vs">Vesting Schedule</label>
                        <input type="text" id="vs" name="vs" value="" required>
                        <br>

                        <label for="io">Investment Options</label>
                        <input type="text" id="io" name="io" value="" required>
                        <br>

                        <label for="ci">Contact Info</label>
                        <input type="text" id="ci" name="ci" value="" required>
                        <br>

                        <button type="submit">Submit</button>
                    </form>


                    <div class="footer">
                        <button id="closeSeven">Close</button>
                    </div>
                </div>
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
