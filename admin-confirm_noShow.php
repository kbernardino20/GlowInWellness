<?php
$Ref_No = urldecode($_GET['BookingNo']);
$ViewBack = urldecode($_GET['ViewBack']);

if (!empty($Ref_No)) {
    include("db_connect.php");

    // Set the timezone to Sydney, Australia
    date_default_timezone_set('Australia/Sydney');

    // Get today's date in the format dd/mm/yyyy
    $pickup_date = date('d/m/Y');

    // Set the status
    $status = 'No show';

    // Retrieve the service details
    $searchDuration_query = "SELECT * FROM tbl_bookingappointment WHERE Ref_No = '$Ref_No'";
    $Durationresult = $db_connection->query($searchDuration_query);

    if ($Durationresult->num_rows > 0) {
        while ($row = $Durationresult->fetch_assoc()) {
            $Appointment_date = $row['Appointment_date']; 
            $Appointment_time = $row['Appointment_time']; 
            $services = $row['services']; 
            $price = $row['Price']; 
            $bookingDate = $row['booking_date']; 
            $serviceDuration = $row['duration']; 
            $email = $row['email']; 
            $name = $row['name']; 
            $mobile_num = $row['mobile_num']; 
            $user_type = $row['user_type']; 
        }

        // Prepare and bind for tbl_bookinghistory
        $stmt = $db_connection->prepare("INSERT INTO tbl_bookinghistory (Ref_No, Appointment_date, Appointment_time, services, price, Status, booking_date, email, name, mobile_num, duration, user_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $Ref_No, $Appointment_date, $Appointment_time, $services, $price, $status, $bookingDate, $email, $name, $mobile_num, $serviceDuration, $user_type);
        $stmt->execute();

        // Prepare and bind for tbl_adminbookinghistory
        $stmt2 = $db_connection->prepare("INSERT INTO tbl_adminbookinghistory (Ref_No, Appointment_date, Appointment_time, services, price, Status, booking_date, email, name, mobile_num, duration, user_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("ssssssssssss", $Ref_No, $Appointment_date, $Appointment_time, $services, $price, $status, $bookingDate, $email, $name, $mobile_num, $serviceDuration, $user_type);
        $stmt2->execute();

        // Delete the record from tbl_bookingappointment
        $Delete_query = "DELETE FROM tbl_bookingappointment WHERE Ref_No = '$Ref_No'";
        $db_connection->query($Delete_query);

        echo "<script>
            alert('$Ref_No\'s status is now updated!');
            window.location.href='$ViewBack';
        </script>";
    } else {
        echo "<script>alert('No booking found with this reference number.');</script>";
    }

    $stmt->close();
    $stmt2->close();
    $db_connection->close();
}
?>
