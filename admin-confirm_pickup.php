<?php
$Ref_No = isset($_GET['ordernum']) ? $_GET['ordernum'] : '';

if (!empty($Ref_No)) {
    include("db_connect.php");

    // Set the timezone to Sydney, Australia
    date_default_timezone_set('Australia/Sydney');

    // Get today's date in the format dd/mm/yyyy
    $pickup_date = date('d/m/Y');

    // Update the status and pickup_date in the database
    $query = "UPDATE tbl_orderhistory SET status = 'Completed', pickup_date = ? WHERE Ref_No = ?";
    $stmt = $db_connection->prepare($query);
    $stmt->bind_param("ss", $pickup_date, $Ref_No);

    if ($stmt->execute()) {
        echo "<script>
            alert('Customer already picked up the orders. $Ref_No\'s status is now completed!');
            window.location.href='admin-ProductOrders.php';
        </script>";
    } 

    $stmt->close();
    $db_connection->close();
} 
?>
