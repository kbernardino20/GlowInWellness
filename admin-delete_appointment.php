<?php
include("db_connect.php");

if (isset($_GET['BookingNo']))  {
    // Decode the appointment date and time in case they contain special characters

    $BookingNo = urldecode($_GET['BookingNo']);
    $DelBack = urldecode($_GET['DelBack']);

    
    // Step 1: Search the record in tbl_bookingappointment
    $search_query = "SELECT * FROM tbl_bookingappointment WHERE Ref_No = '$BookingNo'";
    $result = $db_connection->query($search_query);

    if ($result->num_rows > 0) {
        // Fetch the record
        $row = $result->fetch_assoc();

        $Appointment_date = $row['Appointment_date'];
        $Appointment_time = $row['Appointment_time'];
        $name = $row['name'];
        $email = $row['email'];

        // Step 2: Copy the record to tbl_bookinghistory
        $insert_query = "INSERT INTO tbl_bookinghistory (Ref_No, name, email, Appointment_date, Appointment_time, Status, booking_date, services, Price) 
                         VALUES ('$BookingNo', '$name', '$email', '$Appointment_date', '$Appointment_time', 'Cancelled', '" . $row['booking_date'] . "', '" . $row['services'] . "', '" . $row['Price'] . "')";
        
        $insert_query2 = "INSERT INTO tbl_adminbookinghistory (Ref_No, name, email, Appointment_date, Appointment_time, Status, booking_date, services, Price) 
                         VALUES ('$BookingNo', '$name', '$email', '$Appointment_date', '$Appointment_time', 'Cancelled', '" . $row['booking_date'] . "', '" . $row['services'] . "', '" . $row['Price'] . "')";
        
        if ($db_connection->query($insert_query2) === TRUE) {
            //do nothing
        }

        if ($db_connection->query($insert_query) === TRUE) {
            // Step 3: Delete the record from tbl_bookingappointment
            $delete_query = "DELETE FROM tbl_bookingappointment WHERE Ref_No = '$BookingNo'";
            
            if ($db_connection->query($delete_query) === TRUE) {
                // Send an email notification
                // $to = $email;
                // $subject = "Appointment Cancellation Confirmation";
                // $message = "Dear user,\n\nYour appointment scheduled for $Appointment_date at $Appointment_time has been canceled.\n\nThank you,\nGlowIn Wellness";
                // $headers = "From: noreply@glowinwellness.com.au";

                // if (mail($to, $subject, $message, $headers)) {
                    // Display the alert and redirect
                    echo "<script>
                            alert('Appointment has been cancelled successfully!');
                            window.location.href='$DelBack';
                        </script>";
                // }
        } 
    } 
}
}
?>
