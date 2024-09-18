<?php
include("db_connect.php");

if (isset($_GET['Ref_No']))  {
    // Decode the appointment date and time in case they contain special characters
    $Appointment_date = urldecode($_GET['Appointment_date']);  // '29/08/2024'
    $Appointment_time = urldecode($_GET['Appointment_time']);  // '02:00 PM'
    $Ref_No = urldecode($_GET['Ref_No']);

    // Get today's date as a string in 'dd/mm/yyyy' format
    $currentDateString = date('d/m/Y'); // Today's date as 'dd/mm/yyyy'

    // Check if the appointment date is today
    if ($Appointment_date === $currentDateString) {
        // Appointment is today, within 24 hours
        $encodedMessage = urlencode("Appointments within 24 hours cannot be canceled. Please contact Glow In Wellness for assistance.");
        header("Location: user-MyAppointments.php?alert=$encodedMessage");
        exit();
    }

    // Ensure the user is logged in
    session_start();
    $email = $_SESSION['email'];

    // Convert appointment date and time to a DateTime object
    $appointmentDateTime = DateTime::createFromFormat('d/m/Y h:i A', $Appointment_date . ' ' . $Appointment_time);

    // Get the current date and time
    $currentDateTime = new DateTime();

    // Calculate the difference between the appointment date-time and current date-time
    $interval = $currentDateTime->diff($appointmentDateTime);

    // Check if the appointment is within the next 24 hours
    if ($currentDateTime < $appointmentDateTime && $interval->days == 0 && $interval->h < 24) {
        // Appointment is within 24 hours, cannot cancel
        $encodedMessage = urlencode("Appointments within 24 hours cannot be canceled. Please contact Glow In Wellness for assistance.");
        header("Location: user-MyAppointments.php?alert=$encodedMessage");
        exit();
    } 

    // Step 1: Search the record in tbl_bookingappointment
    $search_query = "SELECT * FROM tbl_bookingappointment WHERE Ref_No = '$Ref_No'";
    $result = $db_connection->query($search_query);

    if ($result->num_rows > 0) {
        // Fetch the record
        $row = $result->fetch_assoc();
        $name =  $row['name'];
        $user_type =  $row['user_type'];

        // Step 2: Copy the record to tbl_bookinghistory
        $insert_query = "INSERT INTO tbl_bookinghistory (name, user_type, Ref_No, email, Appointment_date, Appointment_time, Status, booking_date, services, Price) 
                         VALUES ('$name', '$user_type', '" . $row['Ref_No'] . "', '$email', '$Appointment_date', '$Appointment_time', 'Cancelled', '" . $row['booking_date'] . "', '" . $row['services'] . "', '" . $row['Price'] . "')";
        
        $insert_query2 = "INSERT INTO tbl_adminbookinghistory (name, user_type, Ref_No, email, Appointment_date, Appointment_time, Status, booking_date, services, Price) 
                         VALUES ('$name', '$user_type', '" . $row['Ref_No'] . "', '$email', '$Appointment_date', '$Appointment_time', 'Cancelled', '" . $row['booking_date'] . "', '" . $row['services'] . "', '" . $row['Price'] . "')";
        
        if ($db_connection->query($insert_query) === TRUE && $db_connection->query($insert_query2) === TRUE) {
            // Step 3: Delete the record from tbl_bookingappointment
            $delete_query = "DELETE FROM tbl_bookingappointment WHERE Appointment_time = '$Appointment_time' AND Appointment_date = '$Appointment_date' AND email = '$email'";
            
            if ($db_connection->query($delete_query) === TRUE) {
                // Redirect back to the appointment page or another relevant page after successful operations

                $encodedMessage = urlencode("Your appointment on " . $Appointment_date. " " . $Appointment_time . " has been cancelled!");

                // Redirect to product page with the alert message
                header("Location: user-MyAppointments.php?alert=$encodedMessage");
                exit();
            } 
        } 
    } 
}
?>
