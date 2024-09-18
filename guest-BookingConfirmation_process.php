<?php

// Generate a unique order number starting with GIW followed by an 8-digit random number
$orderNumber = "GIW" . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

// Assuming you have already connected to the database using db_connect.php
include("db_connect.php");

// Retrieve the necessary variables

// Retrieve URL parameters
$selectedservice = isset($_GET['selectedservice']) ? urldecode($_GET['selectedservice']) : '';
$selectedDate = isset($_GET['selecteddate']) ? urldecode($_GET['selecteddate']) : '';
$selectedDay = isset($_GET['selectedday']) ? urldecode($_GET['selectedday']) : '';
$selectedTime = isset($_GET['selectedtime']) ? urldecode($_GET['selectedtime']) : '';

$formattedDate = date("d/m/Y", strtotime($selectedDate));

// Retrieve form data
$firstName = isset($_GET['fname']) ? urldecode($_GET['fname']) : '';
$lastName = isset($_GET['lname']) ? urldecode($_GET['lname']) : '';
$mobileNumber = isset($_GET['mobile']) ? urldecode($_GET['mobile']) : '';
$email = isset($_GET['email']) ? urldecode($_GET['email']) : '';


$searchDuration_query = "SELECT * FROM tbl_services WHERE service = '$selectedservice'";
$Durationresult = $db_connection->query($searchDuration_query);

while ($row = $Durationresult->fetch_assoc()) {
    $ServicePrice = $row['price']; 
    $ServiceDesc = $row['service_description']; 
}

$bookingDate = date("d/m/Y"); // Today's date in dd/mm/yyyy format
$cname = $firstName ." ". $lastName;
$Mobnum = isset($_GET['mobile']) ? urldecode($_GET['mobile']) : '';

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
$user_type = 'guest';

// Execute the statement
if ($stmt->execute()) {
    // JavaScript alert for successful booking
    echo "<script>
        alert('Booking confirmed! Your confirmation number is $orderNumber.');
        window.location.href='guest-BookingConfirmation.php?orderNumber=" . urlencode($orderNumber) . "';
    </script>";
} else {
    // Handle errors here
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$db_connection->close();
?>
