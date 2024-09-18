<?php

session_start();
include("user_session.php");
// Generate a unique order number starting with GIW followed by an 8-digit random number
$orderNumber = "GIW" . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

// Assuming you have already connected to the database using db_connect.php
include("db_connect.php");

// Retrieve the necessary variables
$email = $_SESSION['email'];
$selectedservice = $_POST['selectedservice'];
$selectedDate = $_POST['selecteddate'];
$selectedTime = $_POST['selectedtime'];
$ServicePrice = $_POST['serviceprice'];
$ServiceDesc = $_POST['servicedesc'];
$formattedDate = date("d/m/Y", strtotime($selectedDate));
$bookingDate = date("d/m/Y"); // Today's date in dd/mm/yyyy format
$cname = $_SESSION['first_name'] ." ". $_SESSION['last_name'];
$Mobnum = $_SESSION['mobile_num'];

// Retrieve the service duration
$searchDuration_query = "SELECT * FROM tbl_services WHERE service = '$selectedservice'";
$Durationresult = $db_connection->query($searchDuration_query);

while ($row = $Durationresult->fetch_assoc()) {
    $serviceDuration = $row['duration']; 
}

// Prepare and bind
$stmt = $db_connection->prepare("INSERT INTO tbl_bookingappointment (Ref_No, Appointment_date, Appointment_time, services, Price, Status, booking_date, email, name, mobile_num, duration, user_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $orderNumber, $formattedDate, $selectedTime, $selectedservice, $ServicePrice, $status, $bookingDate, $email, $cname, $Mobnum, $serviceDuration, $user_type);

// Set the status
$status = 'Confirmed';
$user_type = 'user';

// Execute the statement
if ($stmt->execute()) {
    // JavaScript alert for successful booking
    echo "<script>
        alert('Booking confirmed! Your order number is $orderNumber.');
        window.location.href='user-Booking_Confirmation.php?orderNumber=" . urlencode($orderNumber) . "';
    </script>";
} else {
    // Handle errors here
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$db_connection->close();
?>
