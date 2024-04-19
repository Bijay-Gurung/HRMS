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
