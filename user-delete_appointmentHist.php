<?php
include("db_connect.php");

if (isset($_GET['Appointment_date']) && isset($_GET['Appointment_time'])) {
    // Decode the appointment date and time in case they contain special characters
    $Appointment_date = urldecode($_GET['Appointment_date']);
    $Appointment_time = urldecode($_GET['Appointment_time']);

    // Ensure the user is logged in
    session_start();
    
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Prepare the DELETE statement
        $delete_query = $db_connection->prepare("DELETE FROM tbl_bookinghistory WHERE Appointment_time = ? AND Appointment_date = ? AND email = ?");
        $delete_query->bind_param("sss", $Appointment_time, $Appointment_date, $email);

        if ($delete_query->execute()) {
            // If the deletion was successful, redirect to the transaction history page
            header("Location: user-TransactionHistory.php");
            exit();
        } 
        $delete_query->close();
    } 
}
?>